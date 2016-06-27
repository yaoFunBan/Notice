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
                    <a href="index.php"><i class="fa fa-home fa-fw"></i>หน้าแรก</a>
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
                <li>
                    <a href=""><i class="fa fa-table fa-fw"></i>แบบฟอร์มการจองป้าย</a>
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
                             รายการการจองป้าย
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <col width="250">
                                    <col width="250">
                                    <col width="100">
                                    <col width="100">
                                    <col width="100">
                                    <col width="50">
                                    <col width="100">
                                    <thead>
                                        <tr>
                                            <th>ชื่อกิจกรรม</th>
                                            <th>ป้ายที่จอง</th>
                                            <th>วันเริ่มติดตั้ง</th>
                                            <th>วันสุดท้าย</th>
                                            <th>วันรื้อถอนป้าย</th>
                                            <th>สถานะ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <?php
                                        function sel_notice($s_notice,$conn){
                                            if (strlen($s_notice) > 1){
                                                $arr_name = explode("_", $s_notice);
                                                for($i=0;$i<count($arr_name);$i++){
                                                    $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId = ".$arr_name[$i];
                                                    $result = $conn->query($sql_sel_notice);
                                                    $row = $result->fetch_array();
                                                    echo '<li>'.$row[0].'</li>';
                                                }
                                            }else{
                                               $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId = ".$s_notice;
                                               $result = $conn->query($sql_sel_notice);
                                               $row = $result->fetch_array();
                                               echo '<li>'.$row[0].'</li>';
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
                                        
                                        
                                    ?>
                                    <tbody>
                                        <?php
                                            $sql_sel_event = "SELECT * FROM event WHERE user_id = 1";
                                            $result = $conn->query($sql_sel_event);
                                            while ($rows = $result->fetch_array()){
                                            list($Syear, $Smonth, $Sday) = split("-", $rows[4]);
                                            list($Eyear, $Emonth, $Eday) = split("-", $rows[5]);
                                            list($Oyear, $Omonth, $Oday) = split("-", $rows[6]);
                                                echo '<tr class="odd gradeX">';
                                                    echo '<td><a href="Detail_event.php?eId='.$rows[0].'" alt="รายละเอียด" title="รายละเอียด">'.$rows[3].'</td>';
                                                    echo '<td>';
                                                        echo '<ol>';
                                                            echo '<ul>'.sel_notice($rows[2],$conn).'</ul>';
                                                        echo '</ol>';
                                                    echo '</td>';
                                                    echo '<td>'.$Sday.' '.change_mount($Smonth).' '.changeYear($Syear).'</td>';
                                                    echo '<td>'.$Eday.' '.change_mount($Emonth).' '.changeYear($Eyear).'</td>';
                                                    echo '<td>'.$Oday.' '.change_mount($Omonth).' '.changeYear($Oyear).'</td>';
                                                    echo '<td>'.$rows[9].'</td>';
                                                    echo '<td>';
                                                        echo '<a href="edit_form_user.php?eId='.$rows[0].'"><button class="btn btn-outline btn-primary" type="button" style="margin:5px;">แก้ไข</button></a><br>';
                                                        echo '<a href="print_form.php?eId='.$rows[0].'"><button class="btn btn-outline btn-success" type="button" style="margin:5px;">แบบฟอร์มการจอง</button></a><br>';
                                                        echo '<button class="btn btn-outline btn-danger" type="button" style="margin:5px;" onclick="del_event('.$rows[0].')">ลบ</button>';
                                                    echo '</td>';
                                                echo '</tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="show"></div>
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
<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
    $('#dataTables-example').dataTable();
});
</script>

<script>
    function del_event(eId){
//        alert(eId);
        $.ajax({
           url: 'user_sql.php',
           type: 'POST',
           data: {
                eId : eId,
                todo : "del_event"
           },
           success: function (data, textStatus, jqXHR) {
            document.getElementById("show").innerHTML = data;
            location.reload();
           }
        });
    }
</script>


</body>

</html>
