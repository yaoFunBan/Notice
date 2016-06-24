<?php
 include "conn.php"
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
        function edit_event(eId){
            
            var newUrl = "edit_form.php?eId="+eId.toString();
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
        <!-- end navbar-header -->
        <!-- navbar-top-links -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- main dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="top-label label label-danger">3</span><i class="fa fa-envelope fa-3x"></i>
                </a>
                <!-- dropdown-messages -->
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong><span class=" label label-danger">Andrew Smith</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong><span class=" label label-info">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong><span class=" label label-success">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- end dropdown-messages -->
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="top-label label label-success">4</span> <i class="fa fa-tasks fa-3x"></i>
                </a>
                <!-- dropdown tasks -->
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- end dropdown-tasks -->
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="top-label label label-warning">5</span> <i class="fa fa-bell fa-3x"></i>
                </a>
                <!-- dropdown alerts-->
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i>New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i>Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i>New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- end dropdown-alerts -->
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-3x"></i>
                </a>
                <!-- dropdown user-->
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile_user.php"><i class="fa fa-user fa-fw"></i>โปรไฟล์</a>
                    </li>
                    <li><a href="list_event_user.php"><i class="fa fa-gear fa-fw"></i>รายการจองป้าย</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                </ul>
                <!-- end dropdown-user -->
            </li>
            <!-- end main dropdown -->
        </ul>
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
                    <div class="user-section">
                        <div class="user-section-inner">
                            <img src="assets/img/user.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <div>Jonny <strong>Deen</strong></div>
                            <div class="user-text-online">
                                <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                            </div>
                        </div>
                    </div>
                    <!--end user image section-->
                </li>

                <li>
                    <a href="#"><i class="fa fa-home fa-fw"></i>หน้าแรก</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar fa-fw"></i> ตารางการใช้ป้าย</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-lock fa-fw"></i> เข้าสู่ระบบ</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i>คู่มือการใช้งานระบบ</a>
                </li>
                <li class="selected">
                    <a href="#"><i class="fa fa-table fa-fw"></i>แบบฟอร์มการจองป้าย</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> ผู้ดูแลระบบ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="manage_Res_Event.php">จัดการการจอง</a>
                        </li>
                        <li>
                            <a href="manageNotice.php">เพิ่ม/ลบ/แก้ไขป้าย</a>
                        </li>
                        <li>
                            <a href="editDoc.php">เพิ่ม/ลบ/แก้ไขเอกสาร</a>
                        </li>
                        <li>
                            <a href="manageNews.php">เพิ่ม/แก้ไข/ลบ ประชาสัมพันธ์</a>
                        </li>
                        <li>
                            <a href="#">สถิติ</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
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
            $eId = 3;
            $sql = "SELECT * FROM event WHERE eId =  ".$eId;
            $result = $conn->query($sql);
            $row = $result->fetch_array();
            $sql_user = "SELECT * FROM profile WHERE user_id = ".$row[1];
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
                                            <label>ข้าพเจ้า.............<?php echo $row_user[1]." ". $row_user[2];?>..................คณะ/หน่วยงาน............<?php echo $row_user[3]?>......โทรศัพท์.....<?php echo $row_user[4]?>.....</label>
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
                                                    value="upload" onclick="edit_event('.$eId.')">
                                            แก้ไข
                                            </button>'
                                        ?>
                                        <button type="button" class="btn btn-success" name="btn_save" id="btn_upload"
                                                 value="upload">
                                            บันทึก
                                        </button>
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

</body>

</html>
