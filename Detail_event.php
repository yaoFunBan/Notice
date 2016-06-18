<?php
 include "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
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
                <h1 class="page-header">แบบฟอร์มการจองป้าย</h1>
            </div>
                <!--end page header -->
        </div>
        <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             รายละเอียดป้าย
                        </div>
                        <?php
                            $eId = $_GET['eId'];
                            $sql_sel_event = "SELECT * FROM event INNER JOIN profile ON event.user_id = profile.user_id WHERE event.eId = ".$eId;
                            $result = $conn->query($sql_sel_event);
                            $row = $result->fetch_array();
                            list($Syear, $Smonth, $Sday) = split("-", $row[4]);
                            list($Eyear, $Emonth, $Eday) = split("-", $row[5]);
                            list($Oyear, $Omonth, $Oday) = split("-", $row[6]);
                            
                            function sel_notice($s_notice,$conn){
                                if (strlen($s_notice) > 1){
                                    $arr_name = explode("_", $s_notice);
                                    for($i=0;$i<count($arr_name);$i++){
                                        $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId = ".$arr_name[$i];
                                        $result = $conn->query($sql_sel_notice);
                                        $rows = $result->fetch_array();
                                        echo '<li>'.$rows[0].'</li>';
                                    }
                                }else{
                                    $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId = ".$s_notice;
                                    $result = $conn->query($sql_sel_notice);
                                    $rows = $result->fetch_array();
                                    echo '<li>'.$rows[0].'</li>';
                                }
                            }
                            
                            function change_mount($mount){
                                            if($mount == '01'){
                                                return 'มกราคม';
                                            }else if($mount == '02'){
                                                return 'กุมภาพันธ์';
                                            }else if($mount == '03'){
                                                return 'มีนาคม';
                                            }else if($mount == '04'){
                                                return 'เเมษายน';
                                            }else if($mount == '05'){
                                                return 'พฤษภาคม';
                                            }else if($mount == '06'){
                                                return 'มิถุนายน';
                                            }else if($mount == '07'){
                                                return 'กรกฎาคม';
                                            }else if($mount == '08'){
                                                return 'สิงหาคม';
                                            }else if($mount == '09'){
                                                return 'กันยายน';
                                            }else if($mount == '10'){
                                                return 'ตุลาคม';
                                            }else if($mount == '11'){
                                                return 'พฤศจิกายน';
                                            }else if($mount == '12'){
                                                return 'ธันวาคม';
                                            }
                                        }
                                        
                                        function changeYear($year){
                                               return intval($year) + 543 ;
                                        }
                        
                        ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <col width="40">
                                    <col width="200">
                                    <tbody>
                                        <tr>
                                            <td>ชื่อกิจกรรม</td>
                                            <td><?php echo $row[3]?></td>
                                        <tr>
                                            <td>ชื่อ นามสกุลผู้จอง</td>
                                            <td><?php echo $row[11].' '.$row[12]?></td>
                                        </tr>
                                        <tr>
                                            <td>หน่วยงาน/คณะ</td>
                                            <td><?php echo $row[13]?></td>
                                        </tr>
                                         <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td><?php echo $row[14]?></td>
                                        </tr>
                                        <tr>
                                            <td>ป้ายที่จอง</td>
                                            <td>
                                                <?php 
                                                    echo '<ol>';
                                                       echo sel_notice($row[2], $conn);
                                                    echo '</ol>';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>วันเริ่มติดตั้ง</td>
                                            <td><?php echo $Sday.' '.change_mount($Smonth).' '.changeYear($Syear)?></td>
                                        </tr>
                                        <tr>
                                            <td>วันสิ้นสุดการติดตั้ง</td>
                                            <td><?php echo $Eday.' '.change_mount($Emonth).' '.changeYear($Eyear)?></td>
                                        </tr>
                                        <tr>
                                            <td>วันรื้อถอน</td>
                                            <td><?php echo $Oday.' '.change_mount($Omonth).' '.changeYear($Oyear)?></td>
                                        </tr>
                                        <tr>
                                            <td>ตัวอย่างป้าย</td>
                                            <td><img  src="<?php echo $row[7]?>" width="300" height="250"></td>
                                        </tr>
                                        <tr>
                                            <td>รายละเอียดงานหรือกิจกรรม</td>
                                            <td><?php echo $row[8]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                                    echo '<button class="btn btn-outline btn-danger pull-right" type="button" style="margin:5px;" onclick="remove_event('.$eId.')">ลบการจอง</button>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
    </div>
        <!-- end page-wrapper -->

</div>
<!-- end wrapper -->
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/plugins/pace/pace.js"></script>
<script src="assets/scripts/siminta.js"></script>
<!-- Page-Level Plugin Scripts-->
</body>


<script type="text/javascript">
    function remove_event(eId){
//        alert(eId);
        $.ajax({
           url: 'admin_manage_event.php',
           type: 'POST',
           data: {
                eId : eId,
                todo : "remove_eId"
           },
           success: function (data, textStatus, jqXHR) {
                setTimeout(function (){
                document.location.href = "manage_Res_Event.php";
                },2000);
                document.getElementById("show").innerHTML = data;
           }
        });
    }
</script>

</html>
