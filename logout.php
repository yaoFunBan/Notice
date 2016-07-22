<?php
    session_start();
    unset($_SESSSION['user_id']); // clear session
    unset($_SESSION['username']);
     unset($_SESSION['status']);
    session_destroy();
    
    header("location: login.php");
?>

