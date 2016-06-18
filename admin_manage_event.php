<?php
  
  include './conn.php';
  
  $todo = $_POST['todo'];
 
  if($todo == 'accept'){
     $eId = $_POST['eId'];
     $status = $_POST['status'];
     
     $sql_update = "UPDATE event SET status = '".$status."' WHERE eId = ".$eId;
     $result = $conn->query($sql_update);
     if($result){
        echo "update สถานะการจองสำเร็จ";
        header("refresh: 2; url=manage_Res_Event.php");
        exit(0);
     }else{
        echo "update สถานะการจองไม่สำเร็จ";
        header("Refresh:0");
     }
 }
 
 if($todo == 'unaccept'){
     $eId = $_POST['eId'];
     $status = $_POST['status'];
     
     $sql_update = "UPDATE event SET status = '".$status."' WHERE eId = ".$eId;
     $result = $conn->query($sql_update);
     if($result){
        echo "update สถานะการจองสำเร็จ";
        header("refresh: 2; url=manage_Res_Event.php");
        exit(0);
     }else{
        echo "update สถานะการจองไม่สำเร็จ";
        header("Refresh:0");
     }
 }
 
 
 if($todo == "update_notice_n"){
        $eId = $_POST["Eid"];
        $Ename = $_POST["Ename"];
        $Estart = $_POST["Estart"];
        $Eend = $_POST["Eend"];
        $Eout = $_POST["Eout"];
        $Edetail = $_POST["Edetail"];
        $nId = json_decode($_POST['Enotice']);
        
        $str_notice = implode("_", $nId);
        
        $sql_update_event = "UPDATE event SET nIds='".$str_notice."', eName='".$Ename."', eStart='".$Estart."', eEnd='".$Eend."',"
                . "eOut = '".$Eout."', eDetail= '".$Edetail."' WHERE eId = ".$eId;
        
        $result = $conn->query($sql_update_event);
        if($result){
            echo '<label style="color:#4CAF50;">แก้ไขรายการสำเร็จ</label>';
        }else{
            echo '<label style="color:red;">ไม่สำเร็จ</label>';
        }
    }
    
    if($todo == "update_notice"){
         $eId = $_POST["Eid"];
        $Ename = $_POST["Ename"];
        $Estart = $_POST["Estart"];
        $Eend = $_POST["Eend"];
        $Eout = $_POST["Eout"];
        $Edetail = $_POST["Edetail"];
        $nId = json_decode($_POST['Enotice']);
        $Eimage = $_FILES["Eimage"]['name'];
        
        $str_notice = implode("_", $nId); // nId1_nId2_nId3
            
        $filename = time().'_'.rand(1, 9999).'.'.end(explode(".", $Eimage));
        $pathImage = $pathImage. basename($filename);
        
        $sql_update_event = "UPDATE event SET nIds='".$str_notice."', eName='".$Ename."', eStart='".$Estart."', eEnd='".$Eend."',"
                . "eOut = '".$Eout."', eDetail= '".$Edetail."', eImage='".$pathImage."'  WHERE eId = ".$eId;
        
        if((move_uploaded_file($_FILES['Eimage']['tmp_name'], $pathImage))){
            $result = $conn->query($sql_update_event);
            if($result){
                echo '<label style="color:#4CAF50;">แก้ไขรายการสำเร็จ1</label>';
            }else{
                echo '<label style="color:red;">ไม่สำเร็จ</label>';
            }
        }
    }
    
    
    if($todo == "remove_eId"){
        $eId = $_POST['eId'];
        
        $sql_del = "DELETE FROM event WHERE eId =".$eId;
        $result = $conn->query($sql_del);
    }
?>

