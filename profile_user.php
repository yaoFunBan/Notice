<?php
 include "conn.php";
 
  session_start();
 if(isset($_SESSION['user_id'])){
     
     $userId = $_SESSION['user_id'];
     
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
        <?php 
                echo '<ul class="nav navbar-top-links navbar-right">';
                    echo '<li class="dropdown">';
                        echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">';
                            echo '<i class="fa fa-user fa-3x"></i>';
                        echo '</a>';
//                        <!-- dropdown user-->
                        echo '<ul class="dropdown-menu dropdown-user">';
                            echo '<li><a href="#"><i class="fa fa-user fa-fw"></i>โปรไฟล์</a>';
                            echo '</li>';
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

    </nav>
    <!-- end navbar top -->

    <!-- navbar side -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- side-menu -->
            <ul class="nav" id="side-menu">
                <li>
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
                                echo $row_user[0];
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
                    if(isset($_SESSION['status']) && $_SESSION['status'] != "user"){
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
                                                echo $_SESSION['user_id'] = $row_user[0];
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
                                    echo '<a href="#">';
                                        echo 'เพิ่ม/ลบ/แก้ไขเอกสาร';
                                    echo '</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="manageNews.php">';
                                        echo 'เพิ่ม/แก้ไข/ลบ ประชาสัมพันธ์';
                                          $_SESSION['user_id'] = $row_user[0];
                                    echo '</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="Stat.php">';
                                        $_SESSION['user_id'] = $row_user[0];
                                        echo 'สรุปการจองป้าย';
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
    <?php
        $sql_sel = "SELECT * FROM profile WHERE user_id=".$userId;
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           โปรไฟล์ผู้ใช้
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="firstName" class="col-sm-2 control-label">ชื่อ</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="firstName" placeholder="ชื่อ" class="form-control" autofocus value="<?php echo $rows[2]?>">
                                                <span class="help-block" id="NotiFname"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstName" class="col-sm-2 control-label">นามสกุล</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="lastName" placeholder="นามสกุล" class="form-control" autofocus value="<?php echo $rows[3]?>">
                                                <span class="help-block" id="NotiLname"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthDate" class="col-sm-2 control-label">หน่วยงาน/คณะ</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="depart" class="form-control" value="<?php echo $rows[5]?>">
                                                <span class="help-block" id="NotDepart"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthDate" class="col-sm-2 control-label">เบอร์โทรติดต่อ</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tel" class="form-control" value="<?php echo $rows[6]?>">
                                                <span class="help-block" id="NotiTel"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">คำนำหน้าชื่อ</label>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="titleRadio" name="titleRadio" value="นาง" <?php echo ($rows[1]=='นาง')?'checked':'' ?>>นาง
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="titleRadio" name="titleRadio" value="นางสาว" <?php echo ($rows[1]=='นางสาว')?'checked':'' ?>>นางสาว
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="titleRadio" name="titleRadio" value="นาย" <?php echo ($rows[1]=='นาย')?'checked':'' ?>>นาย
                                                        </label>
                                                    </div>
                                                    <span class="help-block" id="NotiTitle"></span>
                                                </div>
                                            </div>
                                        </div> <!-- /.form-group -->

                                        <div class="form-group">
                                            <div class="col-sm-9 col-sm-offset-2">
                                                <button type="button" class="btn btn-primary btn-block" onclick="edit_profile(<?php echo $user_id;?>)">แก้ไข</button>
                                                 <span class="help-block" id="data"></span>
                                            </div>
                                        </div>
                                    </form> <!-- /form -->
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
        var fname = $("#firstName").val();
        var lname = $("#lastName").val();
        var depart = $("#depart").val();
        var tel = $("#tel").val();
        var title = $("#luser").val(); 
        
        var radio = document.getElementsByName("titleRadio");
        for (var i = 0, length = radio.length; i < length; i++) {
            if (radio[i].checked) {
                title = radio[i].value;
                break;
            }
        }
        $.ajax({
           url: 'user_sql.php',
           type: 'POST',
           data: {
                user_id : user_id,
                todo : "edit_user",
                fname: fname,
                lname: lname,
                depart: depart,
                tel: tel,
                title: title
           },
           success: function (data) {
            document.getElementById("show").innerHTML = data;
            location.reload();
           }
        });
    }
    
</script>

</html>
