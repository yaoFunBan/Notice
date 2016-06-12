<?php
    include './conn.php';
    $todo = $_POST['todo'];
    $pathImage = "exampleNotice/";
    if($todo == "resv_notice"){
        $user_id = 3;
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
        $ins_revs = "INSERT INTO event (user_id, nIds, eName, eStart, eEnd, eOut, eImage, eDetail, status)"
                     ."VALUES('".$user_id."', '".$str_notice."', '".$Ename."', '".$Estart."', '".$Eend."', '".$Eout."',"
                     . "'".$pathImage."', '".$Edetail."', 'wait')";
        
        if(move_uploaded_file($_FILES['Eimage']['tmp_name'], $pathImage)){
            if($conn->query($ins_revs)){
               echo '<label style="color:#4CAF50;">เพิ่มป้ายในระบบสำเร็จ</label>';
            }else{
                echo "Error:  <br>";
            }
        }
        
        
    }
    
?>
