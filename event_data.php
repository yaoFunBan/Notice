<?php
    header("Content-type:application/json; charset=UTF-8");          
    header("Cache-Control: no-store, no-cache, must-revalidate");         
    header("Cache-Control: post-check=0, pre-check=0", false);    
    include './conn.php';

    $color = "";    
    $arr_eId = array(); 
    $count = 0;
    if($_POST['gData']){
        if(isset($_POST['nId'])){
            $nId = $_POST['nId'];
            $sql_sel_notice = "SELECT eId, nIds FROM event";
            $result_notice = $conn->query($sql_sel_notice);
            while( $row = $result_notice->fetch_array()){
                $arr_nIds = explode("_", $row[1]);
                if(in_array($nId, $arr_nIds)){
                    $arr_eId[$count] = $row[0];
                    $count++;
                }
            }
            
            for($i = 0;$i<count($arr_eId);$i++){
                $sql_sel_event = "select * from event where eId = ".$arr_eId[$i];
                $result = $conn->query($sql_sel_event);
                while($rows = $result->fetch_object()){
                    if($rows->status == "wait"){
                        $color = "#FFFF8D";
                    }else if($rows->status == "accept"){
                        $color = "#64DD17";
                    }else if($rows->status == "unaccept"){
                        $color = "#FF8F00";
                    }else if($rows->status == "time out"){
                        $color = "#D84315";
                    }
                    $json_data[$i] = array(
                        "id"=>$rows->eId,
                        "title"=>$rows->eName,
                        "start"=>$rows->eStart,
                        "end"=>$rows->eOut,
                        "color"=>$color,
                        "textColor"=>"#000000"
                    );
                }
            }
            
                $json = json_encode($json_data);
                if(isset($_GET['callback']) && $_GET['callback']!=""){    
                    echo $_GET['callback']."(".$json.");";        
                }else{    
                    echo $json;    
                }
                
        }else{
            $sql_sel_event = "SELECT * FROM event";
             $result = $conn->query($sql_sel_event);
            while($rows = $result->fetch_object()){
                if($rows->status == "wait"){
                    $color = "#FFFF8D";
                }else if($rows->status == "accept"){
                    $color = "#64DD17";
                }else if($rows->status == "unaccept"){
                    $color = "#FF8F00";
                }else if($rows->status == "time out"){
                    $color = "#D84315";
                }
                $json_data[] = array(
                    "id"=>$rows->eId,
                    "title"=>$rows->eName,
                    "start"=>$rows->eStart,
                    "end"=>$rows->eOut,
                    "color"=>$color,
                    "textColor"=>"#000000"
                );
            }
            $json = json_encode($json_data);
            if(isset($_GET['callback']) && $_GET['callback']!=""){    
                echo $_GET['callback']."(".$json.");";        
            }else{    
                echo $json;    
            }
        }

           
    }
    
?>
