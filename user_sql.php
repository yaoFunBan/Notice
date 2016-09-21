<?php
    include './conn.php';
    session_start(); 
    $todo = $_POST['todo'];
   
   if($todo == "register"){
       $fName = $_POST['fname'];//
       $lName = $_POST['lname'];//
       $user = $_POST['user'];
       $depart = $_POST['depart'];//
       $tel = $_POST['tel'];//
       $title = $_POST['title'];
       $status = "user";//
      

       $sql_register_user = "INSERT INTO profile (title, user_fName, user_lName, Username, user_depart, user_tel, pro_status)"
               ."VALUES ('".$title."', '".$fName."', '".$lName."', '".$user."', '".$depart."', '".$tel."', '".$status."')";
       
            $result = $conn->query($sql_register_user);

             if($result){
                 $_SESSION['user_id'] = $user;
             }else{
                 echo '<label style="color:red;">สมัครสมาชิกไม่สำเร็จ</label>';
            }   
       
   }
   
   // login
   if($todo == "login"){
       $Email = $_POST['email'];
       $pass = $_POST['pass'];
       $flag = TRUE;
     
       $password = hash("sha256", $pass);
       $sql_login_user = "SELECT * FROM profile WHERE Email = '".$Email."' AND password = '".$password."'";
       
       $result = $conn->query($sql_login_user);
       if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_array();
            echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].' '.$row[6].' '.$row[7];
//            $response['status'] = 'success';
       }else{
           $flag= FALSE;
            echo 'error';
       }
       
       if($flag){
           $_SESSION['user_id'] = $row[0];
           $_SESSION['status'] = $row[8];
           header("Location:index.php"); 
       }
       
   }
   
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
       $fName = $_POST['fname'];//
       $lName = $_POST['lname'];//
       $depart = $_POST['depart'];//
       $tel = $_POST['tel'];//
       $title = $_POST['title'];
       
       
//       print_r($id);
//       echo $id.' '.$fname.' '.$lname.' '.$depart.' '.$tel;
       $sql_update = "UPDATE profile SET title='".$title."', user_fName='".$fName."', user_lName='".$lName."'"
               .", user_depart='".$depart."', user_tel='".$tel."' WHERE user_id = ".$user_id;
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

