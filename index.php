<?php
 include "conn.php"
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

                <li class="selected">
                    <a href="index.php"><i class="fa fa-home fa-fw"></i>หน้าแรก</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar fa-fw"></i> ตารางการใช้ป้าย</a>
                </li>
                <li>
                    <a href="login.php"><i class="fa fa-lock fa-fw"></i> เข้าสู่ระบบ</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i>คู่มือการใช้งานระบบ</a>
                </li>
                <li>
                    <a href="Res_Notice.php"><i class="fa fa-table fa-fw"></i>แบบฟอร์มการจองป้าย</a>
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
    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header">
                    <span class="fa fa-home">หน้าแรก</span>
                </h1>
            </div>
            <!--End Page Header -->
        </div>

        <!--        <div class="row">-->
        <!--            <!-- Welcome -->
        <!--            <div class="col-lg-12">-->
        <!--                <div class="alert alert-info">-->
        <!--                    <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>Jonny Deen </b>-->
        <!--                    <i class="fa  fa-pencil"></i><b>&nbsp;2,000 </b>Support Tickets Pending to Answere. nbsp;-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <!--end  Welcome -->
        <!--        </div>-->
        
        <!--query document-->
        <?php
            $sql = "SELECT * FROM documents";
            $query = mysqli_query($conn, $sql);
        ?>
        
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
                                    $i =1;
                                    if($query){
                                        while ($row = mysqli_fetch_array($query)){
                                          echo "<a download='".$row[2]."' href='".$row[2]."'><li>".$row[1]."</li></a>";
                                   
                                        }
                                    }
                                ?>
                            </ol>
                        </div>
                    </div>

                </div>
                <!--                End document-->
                <!--News -->
                <?php
                    $sql_sel = "SELECT * FROM news";
                    $result = $conn->query($sql_sel);
                    while ($row = $result->fetch_array()){
                        echo '<div class="panel panel-primary">';
                            echo '<div class="panel-heading">';
                                echo '<i class="fa fa-clock-o fa-fw"></i>'.$row[1].'';
                            echo '</div>';

                            echo '<div class="panel-body">';
                                echo '<div class="timeline-heading">';
                                    echo '<p>';
                                        echo '<small class="text-muted"><i class="fa fa-time">'.$row[3].'</i></small>';
                                        echo '</p>';
                                echo '</div>';
                                echo '<div class="timeline-body">';
                                echo $row[2];
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    ?>
                <!--End News-->


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


<!--                            <ol>
                                <li>ท่านจะต้องทำการล็อกอิน (Login) เข้าสู่ระบบก่อน เมื่อจะทำการจองใช้ห้อง</li>
                                <li>มหาวิทยาลัยขอนแก่นจะคืนเงินค่าประกันแก่ผู้ได้รับอนุญาติ
                                    หลังรื้อถอนป้ายแล้วเสร็จไม่มีความเสียหายของโครงป้ายจากการติดตั้งป้าย
                                </li>
                                <li>มหาวิทยาลัยขอนแก่นจะไม่รับผิดชอบการสูญหายและความเสียหายใดๆ
                                    ที่เกิดขึ้นจากการติดตั้งป้าย
                                </li>
                                <li>กองสื่อสารองค์กร เป็นผู้กำหนดจุดติดตั้งป้าย</li>
                                <li>กรณีป้ายสำคัญในช่วงเวลาที่ได้รับอนุญาตให้ติดตั้งป้าย
                                    กองสื่อสารองค์กรขอสงวนสิทธิ์ในการติดตั้งทับโดยไม่แจ้งให้ทราบ
                                </li>
                            </ol>-->