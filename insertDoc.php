<?php

include "conn.php";

$path = "documents/";
if(isset($_FILES['file']['name'])){
    $namefile = $_FILES['file']['name'];
    $name = time() . '_'.rand(1,99999).'.'.end(explode(".", $namefile));
    $namef = explode(".", $namefile);
    $path = $path. basename($name);
    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
     $sql = "INSERT INTO documents (nameDoc, pathDoc) VALUES('" . $namef[0] . "', '" . $path . "')";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo '<label style="color:#4CAF50;">upload ไฟล์ สำเร็จ</label>';
            header( 'refresh: 1; insertDoc.php');
        }else{
            echo '<label style="color:#4CAF50;">ไม่สารมารถอ upload ไฟล์ได้</label>';
        }     
    }                  
}else{
    echo '<label style="color:red;">ไม่สารมารถอ upload ไฟล์ได้</label>';
}

?>