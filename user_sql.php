<?php
    include './conn.php';
   $todo = $_POST['todo'];
   
   if($todo == "insertUser"){
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $depart = $_POST['depart'];
       $tel = $_POST['tel'];
       
       $sql_insert_users = "INSERT INTO profile (user_fName, user_lName, user_depart, user_tel)"
                          ."VALUES('".$fname."', '".$lname."', '".$depart."', '".$tel."')";
       $result = $conn->query($sql_insert_users);
       
       if($result){
            echo '<label style="color:#4CAF50;">บันทึกสำเร็จ</label>';
        }else{
            echo '<label style="color:red;">บันทึกไม่สำเร็จ</label>';
        }              
   }
   
   if($todo == "del_event"){
       $eId = $_POST['eId'];
       
       $sql_del = "DELETE FROM event WHERE eId = ".$eId;
       $result = $conn->query($sql_del);
       
   }
   
   if($todo == "edit_user"){
       $user_id = $_POST['user_id'];
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $depart = $_POST['depart'];
       $tel = $_POST['tel'];
       
//       print_r($id);
//       echo $id.' '.$fname.' '.$lname.' '.$depart.' '.$tel;
       $sql_update = "UPDATE profile SET user_fName='".$fname."', user_lName='".$lname."', user_depart='".$depart."', user_tel='".$tel."' WHERE user_id = ".$user_id;
//       $sql_update = "UPDATE profile SET user_fName='".$fname."', user_lName='".$lname."', user_depart='".$depart."', user_tel='".$tel."' WHERE user_id = ".$id;
//       
       $result = $conn->query($sql_update);
       if($result){
           echo 'yes';
       }  else {
           echo 'no';
       }
       
   }
?>

