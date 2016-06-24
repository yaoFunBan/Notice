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
    
    
    if($todo == "update_notice_n"){
        $eId = $_POST["Eid"];
        $Ename = $_POST["Ename"];
        $Estart = $_POST["Estart"];
        $Eend = $_POST["Eend"];
        $Eout = $_POST["Eout"];
        $Edetail = $_POST["Edetail"];
        $nId = json_decode($_POST['Enotice']);
        
        $str_notice = implode("_", $nId);
        
        $sql_update_event = "UPDATE event SET nIds='".$str_notice."', eName='".$Ename."', eStart='".$Estart."', eEnd='".$Eend."',"
                . "eOut = '".$Eout."', eDetail= '".$Edetail."' WHERE eId = ".$eId;
        
        $result = $conn->query($sql_update_event);
        if($result){
            echo '<label style="color:#4CAF50;">แก้ไขรายการสำเร็จ</label>';
        }else{
            echo '<label style="color:red;">ไม่สำเร็จ</label>';
        }
    }
    
    if($todo == "update_notice"){
         $eId = $_POST["Eid"];
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
        
        $sql_update_event = "UPDATE event SET nIds='".$str_notice."', eName='".$Ename."', eStart='".$Estart."', eEnd='".$Eend."',"
                . "eOut = '".$Eout."', eDetail= '".$Edetail."', eImage='".$pathImage."'  WHERE eId = ".$eId;
        
        if((move_uploaded_file($_FILES['Eimage']['tmp_name'], $pathImage))){
            $result = $conn->query($sql_update_event);
            if($result){
                echo '<label style="color:#4CAF50;">แก้ไขรายการสำเร็จ1</label>';
            }else{
                echo '<label style="color:red;">ไม่สำเร็จ</label>';
            }
        }
    }
    
    if($todo == "check_notice"){
        $sDate = $_POST['sDate'];
        $oDate = $_POST['oDate'];
       
        //เช็คแช่วงวันที่นี้มีป้ายไหนถูกใช้บ้าง
        $sql_sel_event = "SELECT nIds, eStart, eOut FROM event WHERE eStart <= '".$oDate."' AND eOut >='".$sDate."'";
        $result_event = $conn->query($sql_sel_event);
        if($result_event->num_rows){
            echo '<div class="table-responsive">';
                echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
                    echo '<col width="100">';
                    echo '<col width="100">';
                    echo '<col width="100">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>ชื่อป้าย</th>';
                            echo '<th>วันเริ่ม</th>';
                            echo '<th>วันรื้อถอน</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($rs_event = $result_event->fetch_array()){
                        $notice = explode("_",$rs_event[0]);
                        list($Syear, $Smonth, $Sday) = split("-", $rs_event[1]);
                        list($Oyear, $Omonth, $Oday) = split("-", $rs_event[2]);
                        for($i=0;$i<count($notice);$i++){
                            $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId =".$notice[$i];
                            $result_notice = $conn->query($sql_sel_notice);
                            $notice_name = $result_notice->fetch_array();
                                echo '<tr>';
                                    echo '<td>'.$notice_name[0].'</td> ';
                                    echo '<td>'.$Sday.' '.  change_mount($Smonth).' '.  changeYear($Syear).'</td> ';
                                    echo '<td>'.$Oday.' '.  change_mount($Omonth).' '.  changeYear($Oyear).'</td>';
                                echo '</tr>';
                        }
                    }
                    echo '<tbody>';
                echo '</table>';
            echo '</div>';
        }else{
            echo '<label style="color:#64DD17;">วันที่เลือกไม่มีป้ายถูกใช้</label>';
        }         
    }
    
    function change_mount($mount){
                                            if($mount == '01'){
                                                return 'ม.ค.';
                                            }else if($mount == '02'){
                                                return 'ก.พ.';
                                            }else if($mount == '03'){
                                                return 'มี.ค.';
                                            }else if($mount == '04'){
                                                return 'เม.ย.';
                                            }else if($mount == '05'){
                                                return 'พ.ค.';
                                            }else if($mount == '06'){
                                                return 'มิ.ย.';
                                            }else if($mount == '07'){
                                                return 'ก.ค.';
                                            }else if($mount == '08'){
                                                return 'ส.ค.';
                                            }else if($mount == '09'){
                                                return 'ก.ย.';
                                            }else if($mount == '10'){
                                                return 'ต.ค.';
                                            }else if($mount == '11'){
                                                return 'พ.ย.';
                                            }else if($mount == '12'){
                                                return 'ธ.ค.';
                                            }
                                        }
                                        
    function changeYear($year){
        return intval($year) + 543 ;
    }
    
    
    function check_date_overlap($sDateA,$sDateB,$eDateA,$eDateB){
        if(($sDateA <= $eDateB) && ($eDateA >= $sDateB)){
            return true;
        }
        
        return false;
    }
    
?>
