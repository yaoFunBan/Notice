<?php
    include './conn.php';

    $todo = $_POST['todo'];
    
    $pathImage = "imageNot/";
    //insert name width heigth notice into DB and move file in directory documents
    if($todo == "InsertNotice"){
        $pName = $_POST['pName'];
        $pWidth = $_POST['pWidth'];
        $pHeigth = $_POST['pHeigth'];

        
        $file = $_FILES['file']['name'];
        $filename = time().'_'.rand(1, 9999).'.'.end(explode(".", $file));
        
        $pathImage = $pathImage. basename($filename);
        if(move_uploaded_file($_FILES['file']['tmp_name'], $pathImage)){
            $sql_Insert_notice = "INSERT INTO local_notice (nName, nWidth, nHeigth, nPath)"
                                 ."VALUES('".$pName."', '".$pWidth."',  '".$pHeigth."', '".$pathImage."')";
            
            if($conn->query($sql_Insert_notice)){
               echo '<label style="color:#4CAF50;">เพิ่มป้ายในระบบสำเร็จ</label>';
            header( 'refresh: 0; manageNotice.php');
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
        }
    }
    
    // select form edit notice and delete
    if($todo == "sel_Notice"){
        $id = $_POST['selId'];
        $sel_notice = "SELECT * FROM local_notice WHERE nId = ".$id;
        $result = $conn->query($sel_notice);
        $row = $result->fetch_array();        
        echo '<div class="form-group">';
             echo '<label>ชื่อป้าย</label>';
             echo '<input id="selName" name="selName" class="form-control" value="'.$row[1].'">';
        echo '</div>';
        echo '<div class="form-group">';
            echo '<label>ความกว้าง</label>';
            echo '<input id="selWidth" name="selWidth" class="form-control"  value="'.$row[2].'">';
        echo '</div>';
        echo '<div class="form-group">';
            echo '<label>ความสูง</label>';
            echo '<input id="selHeigth" name="selHeigth" class="form-control"  value="'.$row[3].'">';
        echo '</div>';
        echo '<div class="form-group">';
            echo '<div class="fileinput fileinput-new" data-provides="fileinput">';
                echo '<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 500px; height: 350px;">';
                    echo '<img  src="'.$row[4].'">';
                echo '</div>';
                    echo '<div>';
                        echo '<span class="btn btn-default btn-file">';
                        echo '<span class="fileinput-new">เลือกรูปป้าย</span>';
                        echo '<span class="fileinput-exists">เปลี่ยนรูป</span>';
                            echo '<input type="file" name="selFile" id="selFile" values="'.$row[4].'">';
                        echo '</span>';
                        echo '<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบ</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="form-group">';
                echo '<div class="col-lg-6">';
                    echo '<button type="button" class="btn btn-success" name="btn_edit" id="btn_edit"
                                                     value="upload" onclick="edit_Notice('.$id.')">';
                        echo 'แก้ไขป้าย';
                    echo '</button>';
                echo '</div>';
                echo '<div class="col-lg-6">';
                    echo '<button type="button" class="btn btn-danger" name="btn_del" id="btn_del"
                                                     value="upload" onclick="del_Notice('.$id.')">';
                        echo 'ลบป้าย';
                    echo '</button>';
                echo '</div>';
            echo '</div>';
            echo '<div id="showEdit" class="col-lg-12"></div>';
       
    }
    
    //update name width and heigth
    if($todo == "editNotice"){
        $nName = $_POST['pName'];
        $nWidth = $_POST['pWidth'];
        $nHeight = $_POST['pHeigth'];
        $nId = $_POST['nId'];
        
        $file = $_FILES['file']['name'];
        $filename = time().'_'.rand(1, 9999).'.'.end(explode(".", $file));
        
        $pathImage = $pathImage. basename($filename);
        if(move_uploaded_file($_FILES['file']['tmp_name'], $pathImage)){
            $sql_update = "UPDATE local_notice SET nName='".$nName."', nWidth='".$nWidth."', nHeigth='".$nHeight."', "
                    . "nPath='".$pathImage."' WHERE nId = ".$nId;
            $result = $conn->query($sql_update);
            if($result){
                echo '<label style="color:#4CAF50;">Update ป้ายสำเร็จ</label>';
                header( 'refresh: 0; manageNotice.php');
            }else{
                echo '<label style="color:red;">ไม่สำเร็จ</label>';
            }
        }
        
    }
    
    //update all
    if($todo == "updateNWH"){
        $nName = $_POST['pName'];
        $nWidth = $_POST['pWidth'];
        $nHeight = $_POST['pHeigth'];
        $nId = $_POST['nId'];
        
        $sql_update = "UPDATE local_notice SET nName='".$nName."', nWidth='".$nWidth."', nHeigth='".$nHeight."' WHERE nId = ".$nId;
        $result = $conn->query($sql_update);
        if($result){
            echo '<label style="color:#4CAF50;">Update ป้ายสำเร็จ</label>';
            header( 'refresh: 0; manageNotice.php');
        }else{
            echo '<label style="color:red;">ไม่สำเร็จ</label>';
        }
    }
    
    //delete row 
    if($todo == "del_Notice"){
        $nId = $_POST['selId'];
        $sql_sel = "SELECT nPath FROM local_notice WHERE nId=".$nId;
        $sql_del = "DELETE FROM local_notice WHERE nId=".$nId;
        $result = $conn->query($sql_sel);
        $row = $result->fetch_array();
        $removed = unlink($row[0]);
        if($removed){
            $del = $conn->query($sql_del);
            if($del){
                echo '<label style="color:#4CAF50;">ลบป้ายสำเร็จ</label>';
                header( 'refresh: 0; manageNotice.php');
            }else{
                echo '<label style="color:red;">ไม่สำเร็จ</label>';
            }
        }
        
    }
?>
