<?php
    header("Content-type:application/json; charset=UTF-8");          
    header("Cache-Control: no-store, no-cache, must-revalidate");         
    header("Cache-Control: post-check=0, pre-check=0", false);    
    include './conn.php';
        $eId = -1;
        $color = "";    
    if($_GET['gData']){
        if(isset($_GET['eId'])){
            $eId = $_GET['eId'];
//            echo "<script type='text/javascript'>alert('$eId');</script>";
            $sql_sel_event = "SELECT * FROM event WHERE nIds LIKE '%5%'";
        }  else {
            $sql_sel_event = "SELECT * FROM event";    
        }

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
    
?>
