<?php
 include "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href="assets/css/main-style.css" rel="stylesheet"/>
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet"/>
    <link href="assets/css/multiple-select.css" rel="stylesheet"/>
    
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    
    <link href="assets/css/bootstrap-multiselect.css" rel="stylesheet"/>
    
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
    <?php
        $user_id = 1;
        $sql_sel = "SELECT * FROM profile WHERE user_id=".$user_id;
        $result = $conn->query($sql_sel);
        $rows = $result->fetch_array();
        
    ?>
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
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           โปรไฟล์ผู้ใช้
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <col width="20">
                                    <col width="200">
                                    <tbody>
                                        <tr>
                                            <td>ชื่อ</td>
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control" id="fuser" class="fuser" value="<?php echo $rows[1]?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>นามสกุล</td>
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control" id="luser" class="luser" value="<?php echo $rows[2]?>">
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>หน่วยงาน/คณะ</td>
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control" id="depart_user" class="depart_user" value="<?php echo $rows[3]?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td>
                                                <div class="form-group ">
                                                    <input class="form-control" id="tel_user" class="tel_user" value="<?php echo $rows[4]?>">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-lg-offset-5">
                                    <?php
                                        echo '<button class="btn btn-outline btn-success" type="button" style="margin:5px;" onclick="edit_profile('.$user_id.')" >แก้ไข</button>';
                                    ?>
                                </div>
                            </div>
                            <div id="show"></div>
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
<!-- Page-Level Plugin Scripts-->
</body>

<script type="text/javascript">
    
    function edit_profile(user_id){
        var fname = $("#fuser").val();
        var lname = $("#luser").val();
        var duser = $("#depart_user").val();
        var tuser = $("#tel_user").val();
        $.ajax({
           url: 'user_sql.php',
           type: 'POST',
           data: {
                user_id : user_id,
                todo : "edit_user",
                fname: fname,
                lname: lname,
                depart: duser,
                tel: tuser,
           },
           success: function (data) {
            document.getElementById("show").innerHTML = data;
            location.reload();
           }
        });
    }
    
</script>

</html>
