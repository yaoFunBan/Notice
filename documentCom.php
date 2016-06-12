<?php
 include './conn.php';
 
 $todo = $_POST['todo'];
if($todo == "del"){
    $val = $_POST['row'];
    $sql_sel = "SELECT * FROM documents WHERE dId = ".$val;
    $sql_del = "DELETE FROM documents WHERE dId = ".$val;
    $result = mysqli_query($conn, $sql_sel);
    if($result){
        $row = mysqli_fetch_array($result);
        $removed = unlink($row[2]);
        $name = $row[1];
        if($removed){
            $resulted = mysqli_query($conn, $sql_del);
            if($result){

                echo '<label style="color:red;">*ไฟล์ '.$name.' ถูกลบแล้ว</label>';
                header( 'refresh: 1; insertDoc.php');
            }
        }
    }
    
}
?>

