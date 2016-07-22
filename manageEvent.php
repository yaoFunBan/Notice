<?php
    include './conn.php';
    $todo = $_POST['todo'];
    $k = 0;    
    $pathImage = "exampleNotice/";
    if($todo == "resv_notice"){
        $user_id = $_POST['user_id'];
        $Ename = $_POST["Ename"];
        $Estart = $_POST["Estart"];
        $Eend = $_POST["Eend"];
        $Eout = $_POST["Eout"];
        $Edetail = $_POST["Edetail"];
        $nId = json_decode($_POST['Enotice']);
        $Eimage = $_FILES["Eimage"]['name'];
        $today = date("Y-m-d");
       
        $str_notice = implode("_", $nId); // nId1_nId2_nId3
            
        $filename = time().'_'.rand(1, 9999).'.'.end(explode(".", $Eimage));
         
        $pathImage = $pathImage. basename($filename);
        $ins_revs = "INSERT INTO event (user_id, nIds, eName, eStart, eEnd, eOut, eImage, eDetail, status, revs_date)"
                     ."VALUES('".$user_id."', '".$str_notice."', '".$Ename."', '".$Estart."', '".$Eend."', '".$Eout."',"
                     . "'".$pathImage."', '".$Edetail."', 'wait', '".$today."')";
        
        if(move_uploaded_file($_FILES['Eimage']['tmp_name'], $pathImage)){
            if($conn->query($ins_revs)){
                $sql_sel_eid = "select eId from event where eName = '".$Ename."'";
                $result_query = $conn->query($sql_sel_eid);
                $row_eId = $result_query->fetch_array();
                echo $row_eId[0];
            }else{
                echo "Error:  <br>";
            }
        }
    }
    
    function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
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
        $nId = json_decode($_POST['nName']);
        
        $str_not = implode(",", $nId);

        $arr_nId = array();
        $arr_nId = check_equals_notice($str_not, $conn, $sDate, $oDate);
        
        list($Syear, $Smonth, $Sday) = split("-", $sDate);
        list($Oyear, $Omonth, $Oday) = split("-", $oDate);

//        echo count($arr_nId);
        if((count($arr_nId)>0 ) && $arr_nId[0] != "overlap" && $arr_nId[0] != "unoverlap"){
            for($i=0;$i<count($arr_nId);$i++){
                $sql_sel_event = "select nName from local_notice where nId = ".$arr_nId[$i];
                $result_event = $conn->query($sql_sel_event);
                $rs = $result_event->fetch_array();
                    echo '<label>'.$rs[0].'</label> <label style="color:#64DD17;"> สามารถใช้ได้ในวันที่ </label> ';
                    echo '<label>'.$Sday.' '.change_mount($Smonth).' '.changeYear($Syear).' ถึง '.$Oday.' '.change_mount($Omonth).' '.changeYear($Oyear);
                    echo '</label><br>';
            }
        }else if($arr_nId[0] == "unoverlap" || count($arr_nId) == 0){
            echo '<label style="color:#64DD17;"> ทุกป้ายสามารถใช้ได้ในวันที่ </label> ';
            echo '<label>'.$Sday.' '.change_mount($Smonth).' '.changeYear($Syear).' ถึง '.$Oday.' '.change_mount($Omonth).' '.changeYear($Oyear).'';
        }
       
        //เช็คแช่วงวันที่นี้มีป้ายไหนถูกใช้บ้าง
//        $sql_sel_event = "SELECT nIds, eStart, eOut FROM event WHERE eStart <= '".$oDate."' AND eOut >='".$sDate."'";
//        $result_event = $conn->query($sql_sel_event);
//        if($result_event->num_rows){
//            echo '<div class="table-responsive">';
//                echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
//                    echo '<col width="100">';
//                    echo '<col width="100">';
//                    echo '<col width="100">';
//                    echo '<thead>';
//                        echo '<tr>';
//                            echo '<th>ชื่อป้าย</th>';
//                            echo '<th>วันเริ่ม</th>';
//                            echo '<th>วันรื้อถอน</th>';
//                        echo '</tr>';
//                    echo '</thead>';
//                    echo '<tbody>';
//                    while ($rs_event = $result_event->fetch_array()){
//                        $notice = explode("_",$rs_event[0]);
//                        list($Syear, $Smonth, $Sday) = split("-", $rs_event[1]);
//                        list($Oyear, $Omonth, $Oday) = split("-", $rs_event[2]);
//                        for($i=0;$i<count($notice);$i++){
//                            $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId =".$notice[$i];
//                            $result_notice = $conn->query($sql_sel_notice);
//                            $notice_name = $result_notice->fetch_array();
//                                echo '<tr>';
//                                    echo '<td>'.$notice_name[0].'</td> ';
//                                    echo '<td>'.$Sday.' '.  change_mount($Smonth).' '.  changeYear($Syear).'</td> ';
//                                    echo '<td>'.$Oday.' '.  change_mount($Omonth).' '.  changeYear($Oyear).'</td>';
//                                echo '</tr>';
//                        }
//                    }
//                    echo '<tbody>';
//                echo '</table>';
//            echo '</div>';
//        }else{
//            echo '<label style="color:#64DD17;">วันที่เลือกไม่มีป้ายถูกใช้</label>';
//        }         
    }
    
    
    function check_equals_notice($nId, $conn, $sDate, $oDate){
        $sql_sel_nId = "SELECT eId, nIds FROM event WHERE eStart <= '".$oDate."' AND eOut >='".$sDate."'";
        list($Syear, $Smonth, $Sday) = split("-", $sDate);
        list($Oyear, $Omonth, $Oday) = split("-", $oDate);
        
        
        $arr_nId = explode(",", $nId);
        $result = $conn->query($sql_sel_nId);
        $arr_eId = array();
        $temp_arr = array();
        
        $k = 0;
        $l = 0;
        $cou = 1;
        if($result->num_rows){
            while ($rs = $result->fetch_array()){
                $ev_nId = explode("_", $rs[1]);
                    for($j=0;$j<count($arr_nId);$j++){
                        if(in_array($arr_nId[$j], $ev_nId)){
                            // ป้ายไม่สามารถใช้ได้
                            if(!in_array($arr_nId[$j], $temp_arr)){
                                $sql_sel_notice = "select nName from local_notice where nId =".$arr_nId[$j];
                                $result_notice = $conn->query($sql_sel_notice);
                                $row = $result_notice->fetch_array();
                                $temp_arr[$l] = $arr_nId[$j];
                                $l++;
                                    echo $cou.'.<label>'.$row[0].'</label> <label style="color:red;"> ไม่สามารถใช้ได้ในวันที่ </label> ';
                                    echo '<label>'.$Sday.' '.change_mount($Smonth).' '.changeYear($Syear).' ถึง '.$Oday.' '.change_mount($Omonth).' '.changeYear($Oyear);
                                    echo '</label><br>';
                                    $cou++;
                            }
                        }else{
                            //ป้ายสามารถใข้ได้
                            if(!in_array($arr_nId[$j], $arr_eId)){
                                $arr_eId[$k] = $arr_nId[$j];
                                $k++;
                           }
                        }
                    }
            }
        }else{
           return array_values($arr_eId);
        }
        
//        if($k > 0){
//            $arr_eId = array_diff($arr_eId, $temp_arr);
//            return array_values($arr_eId);
//        }

        $arr_eId = array_diff($arr_eId, $temp_arr);
        array_values($arr_eId);
        if((count($arr_eId) == 0 )&& (count($arr_nId)) == count($temp_arr)){
  //            echo "overlap";
              return $arr_eId = array("overlap"); 
        }else if((count($arr_nId)) == count($arr_eId)){
  //            echo 'unoverlap';
              return $arr_eId = array("unoverlap");
        }else{
            return array_values($arr_eId);;
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
        echo $sDateA.' '.$eDateA.''.$sDateB.''.$eDateB.'<br>';
        if(($sDateA <= $eDateB) && ($eDateA >= $sDateB)){
           return "overlap";
        }else{
           return "unoverlap";
        }
    }
    
?>
