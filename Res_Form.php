<?php
 include "conn.php";
 session_start();
if(isset($_GET['eId'])){
    $eId = $_GET['eId'];
    $userId = $_GET['userId'];
    
     $sql_sel_user = "SELECT * FROM profile WHERE user_id = ".$userId;
     $result = $conn->query($sql_sel_user);
     $row_user = $result->fetch_array();   
}else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href="assets/css/main-style.css" rel="stylesheet"/>
    <!-- Page-Level CSS -->
    <style type="text/css">
        .table th {
            text-align: center;   
         }
    </style>
    
    <script type="text/javascript">
        function edit_event(eId, $userId){
            
            var newUrl = "edit_form.php?eId="+eId.toString()+"&userId="+$userId;
            document.location.href = newUrl;
        }
    </script>    
    
</head>
<body>
<!--  wrapper -->
<div id="wrapper">
    <!-- navbar top -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
        <!-- navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="assets/img/logo.png" alt=""/>
            </a>
        </div>
        <?php 
                echo '<ul class="nav navbar-top-links navbar-right">';
                    echo '<li class="dropdown">';
                        echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">';
                            echo '<i class="fa fa-user fa-3x"></i>';
                        echo '</a>';
//                        <!-- dropdown user-->
                        echo '<ul class="dropdown-menu dropdown-user">';
                            echo '<li><a href="profile_user.php"><i class="fa fa-user fa-fw"></i>';
                                echo 'โปรไฟล์';
                                $_SESSION['user_id'] = $row_user[0];
                            echo '</a></li>';
                            echo '<li><a href="list_event_user.php?userId="'.$row_user[0].'"><i class="fa fa-gear fa-fw"></i>รายการจองป้าย</a>';
                            echo '</li>';
                            echo '<li class="divider"></li>';
                            echo '<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>';
                            echo '</li>';
                            echo '</ul>';
//                        <!-- end dropdown-user -->
                    echo '</li>';
//                    <!-- end main dropdown -->
            echo '</ul>';
//        <!-- end navbar-top-links -->
        ?>
        <!-- end navbar-top-links -->

    </nav>
    <!-- end navbar top -->

    <!-- navbar side -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- side-menu -->
            <ul class="nav" id="side-menu">
                <li>
                    <!-- user image section-->
                   <?php
                            echo '<div class="user-section">';
                                echo '<div class="user-section-inner">';
                                    echo '<img src="assets/img/user.jpg" alt="">';
                                echo '</div>';
                                echo '<div class="user-info">';
                                    echo '<div><strong>'.$row_user[2].'</strong></div>';
                                    echo '<div class="user-text-online">';
                                        echo '<span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                    ?>
                    <!--end user image section-->
                </li>

                <li>
                    <a href="index.php"><i class="fa fa-home fa-fw"></i>
                        หน้าแรก
                        <?php 
                            if(isset($_SESSION['user_id'])){
                                $_SESSION['user_id'] = $row_user[0];
                            }
                        ?>
                    </a>
                </li>
                <li>
                    <a href="list_revs_notice.php"><i class="fa fa-calendar fa-fw"></i> 
                        ตารางการใช้ป้าย
                        <?php 
                            if(isset($_SESSION['user_id'])){
                                $_SESSION['user_id'] = $row_user[0];
                            }
                        ?>
                    </a>
                </li>
                <li>
                    <a href="login.php"><i class="fa fa-lock fa-fw"></i> เข้าสู่ระบบ</a>
                </li>
                <li>
                    <?php
                        echo '<a href="Res_Notice.php"><i class="fa fa-table fa-fw"></i>';
                            echo 'แบบฟอร์มการจองป้าย';
                               $_SESSION['user_id'] = $row_user[0];
                        echo '</a>';
                    ?>
                </li>
                <?php
                    if($row_user[8] != "user"){
                        echo '<li>';
                            echo '<a href="#"><i class="fa fa-book fa-fw"></i> ผู้ดูแลระบบ<span class="fa arrow"></span></a>';
                            echo '<ul class="nav nav-second-level">';
                                echo '<li>';
                                    echo '<a href="#"><i class="fa fa-book fa-fw"></i>จัดการการจอง<span class="fa arrow"></span></a>';
                                    echo '<ul class="nav nav-third-level">';
                                        echo '<li>';
                                            echo '<a href="manage_Res_Event.php">';
                                                echo 'ยังไม่อนุมัติ';
                                                $_SESSION['user_id'] = $row_user[0];
                                            echo '</a>';
                                        echo '</li>';
                                        echo '<li>';
                                            echo '<a href="manage_res_accept.php">';
                                                echo 'อนุมัติแล้ว';
                                                $_SESSION['user_id'] = $row_user[0];
                                            echo '</a>';
                                        echo '</li>';
                                    echo '</ul>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="manageNotice.php">';
                                        echo 'เพิ่ม/ลบ/แก้ไขป้าย';
                                        $_SESSION['user_id'] = $row_user[0];
                                    echo '</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="editDoc.php">';
                                        echo 'เพิ่ม/ลบ/แก้ไขเอกสาร';
                                        $_SESSION['user_id'] = $row_user[0];
                                    echo '</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="manageNews.php">';
                                        echo 'เพิ่ม/แก้ไข/ลบ ประชาสัมพันธ์';
                                          $_SESSION['user_id'] = $row_user[0];
                                    echo '</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="Manual.php">';
                                        echo 'คู่มือการใช้งานระบบ';
                                          $_SESSION['user_id'] = $row_user[0];
                                    echo '</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    }
                ?>
            </ul>
            <!-- end side-menu -->
        </div>
        <!-- end sidebar-collapse -->
    </nav>
    <!-- end navbar side -->
    
    <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!--end page header -->
            </div>
        <?php
//            $eId = $_GET['eId'];
//            $eId = 5;
            $sql = "SELECT * FROM event WHERE eId =  ".$eId;
            $result = $conn->query($sql);
            $row = $result->fetch_array();
            $sql_user = "SELECT * FROM profile WHERE user_id = ".$row[1];
//            $sql_user = "SELECT * FROM profile WHERE user_id = 2";
            $result2 = $conn->query($sql_user);
            $row_user = $result2->fetch_array();
            
            $notice = explode("_", $row[2]);
            $c1 = 0; // count is width 6 and heigth 2.4
            $c2 = 0; // count is width 8.4 and heigth 3.6
            $c3 = 0; // count is width 5 and heigth 2.4
            $c4 = 0; // etc.
            $local1 = array();
            $local2 = array();
            $local3 = array();
            $local4 = array();
            for($i = 0;$i < count($notice); $i++){
                $sel_notice = "SELECT * FROM local_notice WHERE nId = ".$notice[$i];
                $result3 = $conn->query($sel_notice);
                $row3 = $result3->fetch_array();
                if(($row3[2] == '6') && ($row3[3] == '2.4')){
                    $local1[$c1] = $notice[$i];
                    $c1++;
                }else if(($row3[2] == '8.4') && ($row3[3] == '3.6')) {
                    $local2[$c2] = $notice[$i];
                    $c2++;
                }else if((($row3[2] == '5')) && ($row[3] == '2.4')) {
                    $local3[$c3] = $notice[$i];
                    $c3++;
                }else{
                    $local4[$c4] = $notice[$i];
                    $c4++;
                }
               
            }
            
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           แบบฟอร์มการจองป้าย
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" id="eventForm" name="eventForm">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label>ข้าพเจ้า.............<?php echo $row_user[1]."...". $row_user[2]."...".$row_user[3];?>..................คณะ/หน่วยงาน............<?php echo $row_user[6]?>......โทรศัพท์.....<?php echo $row_user[7]?>.....</label>
                                        </div>
                                        <div class="form-group">
                                            <table class="table table-striped table-bordered table-hover">
                                                <col width="250">
                                                <col width="60">
                                                <thead>
                                                    <tr>
                                                        <th>ประเภทสื่อที่ขออนุญาต</th>
                                                        <th>จุดติดตั้ง</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" value=""> ติดแผ่นป้ายไวนิล  บนโครงเหล็ก 
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>(ขนาดมาตรฐานของ มข. 2.4 x 6 เมตร,3.6x 8.4 เมตร,2.4 x 5 เมตร )</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>1. ขนาด กว้าง...........6...........เมตร ยาว.........2.4........เมตร   จำนวน......<?php echo $c1;?>.......จุด</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ol>
                                                                <?php
                                                                    for($i=0;$i<count($local1); $i++){
                                                                        $sql_sel_notice1 = "SELECT nName FROM local_notice WHERE nId = ". $local1[$i];
                                                                        $result_name = $conn->query($sql_sel_notice1);
                                                                        $name = $result_name->fetch_array();
                                                                        echo '<li>'.$name[0].'</li>';
                                                                    }
                                                                ?>
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label>2. ขนาด กว้าง...........8.4...........เมตร ยาว........3.6........เมตร   จำนวน......<?php echo $c2;?>.......จุด</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ol>
                                                                <?php
                                                                    for($i=0;$i<count($local2); $i++){
                                                                        $sql_sel_notice1 = "SELECT nName FROM local_notice WHERE nId = ". $local2[$i];
                                                                        $result_name = $conn->query($sql_sel_notice1);
                                                                        $name = $result_name->fetch_array();
                                                                        echo '<li>'.$name[0].'</li>';
                                                                    }
                                                                ?>
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label>3. ขนาด กว้าง...........5............เมตร ยาว.........2.4........เมตร   จำนวน......<?php echo $c3;?>.......จุด</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ol>
                                                                <?php
                                                                    for($i=0;$i<count($local3); $i++){
                                                                        $sql_sel_notice1 = "SELECT nName FROM local_notice WHERE nId = ". $local3[$i];
                                                                        $result_name = $conn->query($sql_sel_notice1);
                                                                        $name = $result_name->fetch_array();
                                                                        echo '<li>'.$name[0].'</li>';
                                                                    }
                                                                ?>
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" value=""> อื่น ๆ 
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                 <input type="text" class="form-control" name="etc_txt" id="etc_txt">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>(ขนาดมาตรฐานของ มข. 2.4 x 6 เมตร,3.6x 8.4 เมตร,2.4 x 5 เมตร )</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>1. ขนาด กว้าง..........................เมตร ยาว.....................เมตร   จำนวน.............จุด</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ol>
                                                                <?php
                                                                    for($i=0;$i<count($local4); $i++){
                                                                        $sql_sel_notice1 = "SELECT nName FROM local_notice WHERE nId = ". $local4[$i];
                                                                        $result_name = $conn->query($sql_sel_notice1);
                                                                        $name = $result_name->fetch_array();
                                                                        echo '<li>'.$name[0].'</li>';
                                                                    }
                                                                ?>
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php 
                                           list($Syear, $Smonth, $Sday) = split("-", $row[4]);
                                           list($Eyear, $Emonth, $Eday) = split("-", $row[5]);
                                           list($Oyear, $Omonth, $Oday) = split("-", $row[6]);
                                           
                                           function chageMount($mount){
                                               if($mount == "01"){
                                                   return "มกราคม";   
                                               }else if($mount == "02"){
                                                   return "กุมภาพันธ์";
                                               }else if($mount == "03"){
                                                   return "มีนาคม";
                                               }else if($mount == "04"){
                                                   return "เมษายน";
                                               }else if($mount == "05"){
                                                   return "พฤษภาคม";
                                               }else if($mount == "06"){
                                                   return "มิถุนายน";
                                               }else if($mount == "07"){
                                                   return "กรกฎาคม";
                                               }else if($mount == "08"){
                                                   return "สิงหาคม";
                                               }else if($mount == "09"){
                                                   return "กันยายน";
                                               }else if($mount == "10"){
                                                   return "ตุลาคม";
                                               }else if($mount == "11"){
                                                   return "พฤศจิกายน";
                                               }else if($mount == "12"){
                                                   return "ธันวาคม";
                                               }
                                           }
                                           
                                           function changeYear($year){
                                               return intval($year) + 543 ;
                                           }
                                           
                                            function DateDiff($strDate1,$strDate2)
                                            {
                                                return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
                                            }
                                        ?>
                                       
                                        <div class="form-group">
                                            <label contenteditable="true">สำหรับกิจกรรม...............<?php echo $row[3]?>.....................................… (แนบข้อความและแบบป้ายประกอบการขออนุญาต) </label>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <?php echo 'ตั้งแต่วันที่..'.$Sday.'..เดือน.......'.chageMount($Smonth).'.......พ.ศ...........'.changeYear($Syear).'...........' ?>
                                            </label>
                                            <label>
                                                <?php echo 'ตั้งแต่วันที่..'.$Eday.'..เดือน.......'.chageMount($Emonth).'.......พ.ศ...........'.changeYear($Eyear).'...........' ?>
                                            </label>
                                            <label>
                                                รวมระยะเวลาขอติดตั้ง.....<?php  echo DateDiff($row[4],$row[5])?>.....วัน
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                โดยจะทำการรื้อถอนให้แล้วเสร็จใน <?php echo 'ตั้งแต่วันที่..'.$Oday.'..เดือน.......'.chageMount($Omonth).'.......พ.ศ...........'.changeYear($Oyear).'...........' ?>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <p>
                                                กรณีป้ายโฆษณาที่ติดตั้งไว้ได้ก่อให้เกิดความเสียหายต่อชีวิต ร่างกาย หรือทรัพย์สินของบุคคลอื่นไม่ว่ากรณีใดๆก็ตาม   ผู้ได้รับอนุญาตจะต้องรับผิดชอบต่อความเสียหายที่เกิดขึ้นนั้น
                                            </p>
                                            <p style="text-indent: 50px">ข้าพเจ้ายินดีปฏิบัติตามระเบียบ ประกาศ และเงื่อนไขของมหาวิทยาลัยขอนแก่นทุกประการ</p>
                                            <p style="text-indent: 50px">จึงเรียนมาเพื่อโปรดพิจารณาอนุญาต   จักขอบคุณยิ่ง</p>
                                            
                                        </div>
                                        <div class="form-group col-md-offset-5">
                                            <?php
                                            echo '<button type="button" class="btn btn-success" name="btn_edit" id="btn_edit"
                                                    value="upload" onclick="edit_event('.$eId.', '.$userId.')">
                                            แก้ไข
                                            </button>'
                                        ?>
                                            <!--<a href="list_event_user.php">-->
                                                <button type="button" class="btn btn-success" name="btn_save" id="btn_upload"
                                                        value="upload" onclick="movertolist()">
                                                    บันทึก
                                                </button>
                                            <!--</a>-->
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

</div>
<!-- end wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/plugins/pace/pace.js"></script>
<script src="assets/scripts/siminta.js"></script>

<script type="text/javascript">
    function movertolist(){
        var userId = "<?php Print($userId)?>";
        
        setTimeout(function (){
            document.location.href = "list_event_user.php?userId="+userId;
        },2000);
    }
</script>

</body>

</html>
