<?php
 include "conn.php";
 session_start(); 
 $inheader = FALSE;
 if(isset($_SESSION['user_id'])){
     $inheader = TRUE;
     
     $sql_sel_user = "SELECT * FROM profile WHERE user_id = ".$_SESSION['user_id'];
     $result = $conn->query($sql_sel_user);
     $row_user = $result->fetch_array();     
 }
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href="assets/css/main-style.css" rel="stylesheet"/>
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <link href="assets/plugins/timeline/timeline.css" rel="stylesheet"/>
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
            if($inheader){
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
            }
        ?>
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
                       if($inheader){
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
                       }
                    ?>
                    <!--end user image section-->
                </li>

                <li class="selected">
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
                            if ($inheader){
                                 $_SESSION['user_id'] = $row_user[0];
                            }
                        echo '</a>';
                    ?>
                </li>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] != "user"){
                        echo '<li class="active">';
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
                                 echo '<li class="selected">';
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
    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header">
                    <span class="fa fa-home">เอกสารและคู่มือการใช้งาน</span>
                </h1>
            </div>
            <!--End Page Header -->
        </div>
        
        <div class="row">
            <div class="col-lg-9">

                <!--                Start Document-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i>เอกสารและคู่มือการใช้งาน
                    </div>

                    <div class="panel-body">
                        <div class="timeline-heading">
                        </div>
                        <div class="timeline-body">
                            <ol>
                                <?php
                                    if($row_user[8] != "user"){
                                        echo "<a download='documents/ManualAdmin.docx' href='documents/ManualAdmin.docx'><li>คู่มือการใช้งานสำหรับผู้ดูแลระบบ</li></a>";
                                    }
                                ?>
                            </ol>
                        </div>
                    </div>

                </div>

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
<!-- Page-Level Plugin Scripts-->
<script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="assets/plugins/morris/morris.js"></script>
<script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
