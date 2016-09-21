<?php
    include './conn.php';
    session_start(); 
    
    $todo = $_GET['todo'];
    
    if($todo == "insert"){
       $fName = $_POST['firstName'];
       $lName = $_POST['lastName'];
       $user = $_POST['username'];
       $depart = $_POST['depart'];
       $tel = $_POST['tel'];
       $title = $_POST['titleRadio'];
       $status = "user";
       
//       print_r($_POST);
        $sql_register_user = "INSERT INTO profile (title, user_fName, user_lName, Username, user_depart, user_tel, pro_status)"
               ."VALUES ('".$title."', '".$fName."', '".$lName."', '".$user."', '".$depart."', '".$tel."', '".$status."')";
       
        $result = $conn->query($sql_register_user);

             if($result){
                 $_SESSION['user_id'] = $user;
                  header( "location: index.php" );
                  exit(0);
             }else{
                 echo '<label style="color:red;">สมัครสมาชิกไม่สำเร็จ</label>';
            }  
    }
?>

