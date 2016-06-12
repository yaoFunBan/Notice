<?php
    include './conn.php';
    
    $todo = $_POST['todo'];
    $date = date("d/m/Y");
    $admin = 1;
    if($todo == "insertNews"){
        $title = $_POST['title'];
        $detail = $_POST['desrict'];
        
        $sql_insert = "INSERT INTO news (title, description, newcreate, id_admin) VALUES('".$title."', '".$detail."', '".$date."', '".$admin."')";
        $result = $conn->query($sql_insert);
        if($result){
            echo '<label style="color:#4CAF50;">upload ไฟล์ สำเร็จ</label>';
            header( 'refresh: 1; manageNews.php');
        }else{
            echo '<label style="color:red;">เพิ่มประชาสัมพันธ์สำเร็จ</label>';
        }
    }
    
    if($todo == 'selNews'){
        $nId = $_POST['nId'];
        $sql_sel = "SELECT * FROM news WHERE id_news = ".$nId;
        $result = $conn->query($sql_sel);
        $row = $result->fetch_array();
        echo '<div class="col-lg-12">';
            echo '<form name="editNews" id="editNews" method="post" enctype="multipart/form-data">';
                echo '<div class="form-group">';
                    echo '<label>หัวข้อประชาสัมพันธ์</label>';
                    echo '<input class="form-control" id="editTitle" name="editTitle" placeholder="กรุณาใส่หัวข้อ" value="'.$row[1].'">';
                echo '</div>';
                echo '<div class="form-group">';
                    echo '<label>รายละเอียด</label>';
                    echo '<textarea class="form-control" id="editDetail" name="editDetail" style="resize: none; width: 800; height: 300px;">'.$row[2].'</textarea>';
                echo '</div>';
                echo '<div class="form-group">';
                    echo '<button type="button" class="btn btn-success" name="btn_add" id="btn_add" onclick="updateNews('.$nId.')">เพิ่มประชาสัมพันธ์</button>';
                echo '</div>';
            echo '</form>';
            echo '<div id="showResult"></div>';
        echo '</div>';
//        
        
    }
    
    if($todo == "delNews"){
        $nId = $_POST['nId'];
        $sql_del = "DELETE FROM news WHERE id_news = ".$nId;
        $result = $conn->query($sql_del);
        if($result){
            echo '<label style="color:#4CAF50;">ลบประชาสัมพันธ์สำเร็จสำเร็จ</label>';
            header( 'refresh: 1; manageNews.php');
        }else{
            echo '<label style="color:red;">ไม่สำเร็จ</label>';
        }
    }
    
    
    if($todo == "editNews"){
        $nId = $_POST['nId'];
        $Title = $_POST['eNews'];
        $Datail = $_POST['eDatail'];
        $date = date("Y/m/d H:i:s");
        
        
        $sql_update = "UPDATE news SET title='".$Title."', description='".$Datail."', newcreate='".$date."' WHERE id_news = ".$nId;
        $result = $conn->query($sql_update);
         if($result){
            echo '<label style="color:#4CAF50;">update ข้อมูบสำเร็จ</label>';
            header( 'refresh: 1; manageNews.php');
        }else{
            echo '<label style="color:red;">ไม่สำเร็จ</label>';
        }
        
        
    }
?>

