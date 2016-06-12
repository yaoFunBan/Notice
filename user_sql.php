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
?>

