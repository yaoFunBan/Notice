<?php
 include "conn.php";
 session_start();
 if(isset($_SESSION['user_id'])){
     $user = $_SESSION['user_id'];
 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูลผู้ใช้</title>
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
                    <!--end user image section-->
                </li>

                <li>
                    <a href="index.php"><i class="fa fa-home fa-fw"></i>หน้าแรก</a>
                </li>
                <li>
                    <a href="list_revs_notice.php"><i class="fa fa-calendar fa-fw"></i> ตารางการใช้ป้าย</a>
                </li>
                <li>
                    <a href="login.php"><i class="fa fa-lock fa-fw"></i> เข้าสู่ระบบ</a>
                </li>

                <li>
                    <a href="Manual.php"><i class="fa fa-book fa-fw"></i>
                        คู่มือการใช้งานระบบ
                        <?php 
                            if(isset($_SESSION['user_id'])){
                                $_SESSION['user_id'] = $row_user[0];
                            }
                        ?>
                    </a>
                <li>
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
                    <!-- Form Elements -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           สมัครสมาชิก
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" onsubmit="return checkEmptyInput()" action="sql_register.php?todo=insert" method="POST">
                                        <div class="form-group">
                                            <label for="firstName" class="col-sm-2 control-label">Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="username" name="username" placeholder="ชื่อ" class="form-control" autofocus readonly value="<?php echo $user?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstName" class="col-sm-2 control-label">ชื่อ</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="firstName" placeholder="ชื่อ" class="form-control" autofocus name="firstName">
                                                <span class="help-block" id="NotiFname"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstName" class="col-sm-2 control-label">นามสกุล</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="lastName" placeholder="นามสกุล" class="form-control" autofocus name="lastName">
                                                <span class="help-block" id="NotiLname"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthDate" class="col-sm-2 control-label" >หน่วยงาน/คณะ</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="depart" class="form-control" name="depart">
                                                <span class="help-block" id="NotDepart"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthDate" class="col-sm-2 control-label">เบอร์โทรติดต่อ</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tel" class="form-control" name="tel">
                                                <span class="help-block" id="NotiTel"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">คำนำหน้าชื่อ</label>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="titleRadio" name="titleRadio" value="นาง">นาง
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="titleRadio" name="titleRadio" value="นางสาว">นางสาว
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="titleRadio" name="titleRadio" value="นาย">นาย
                                                        </label>
                                                    </div>
                                                    <span class="help-block" id="NotiTitle"></span>
                                                </div>
                                            </div>
                                        </div> <!-- /.form-group -->

                                        <div class="form-group">
                                            <div class="col-sm-9 col-sm-offset-2">
                                                <button type="submit" class="btn btn-primary btn-block" >บันทึก</button>
                                                 <span class="help-block" id="data"></span>
                                            </div>
                                        </div>
                                    </form> <!-- /form -->
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
<script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="assets/plugins/morris/morris.js"></script>
<script src="assets/scripts/jquery-ui.min.js"></script>    
<script src="assets/scripts/ajaxrequest.js"></script>
   
</body>

<script type="text/javascript">

    function checkEmptyInput(){
       var username = document.getElementById("username").value
       var fName = document.getElementById("firstName").value;
       var LName = document.getElementById("lastName").value;
       var depart = document.getElementById("depart").value;
       var tel = document.getElementById("tel").value;
       var title;
       var chPass = false;
       var chRadio = false;
       var chEmail = false;
       
       
        
        chRadio = checkEmptyRadio();
       
       
        if(fName == ""){
              document.getElementById("firstName").focus();
              document.getElementById("NotiFname").innerHTML = "*กรุณากรอกชื่อ";
              document.getElementById("NotiFname").style.color = "red";
              return false;
        }else if(LName == ""){
              document.getElementById("lastName").focus();
              document.getElementById("NotiLname").innerHTML = "*กรุณากรอกนามสกุล";
              document.getElementById("NotiLname").style.color = "red";
              return false;
        }else if(depart == ""){
              document.getElementById("depart").focus();
              document.getElementById("NotDepart").innerHTML = "*กรุณากรอก หน่วยงาน หรือ คณะ";
              document.getElementById("NotDepart").style.color = "red"; 
              return false;
        }else if(tel == ""){
              document.getElementById("tel").focus();
              document.getElementById("NotiTel").innerHTML = "*กรุณากรอก เบอร์โทร";
              document.getElementById("NotiTel").style.color = "red";
              return false;
        }else if(chRadio == false){
              document.getElementById("NotiTitle").innerHTML = "*กรุณาเลือกคำนำหน้าชื่อ";
              document.getElementById("NotiTitle").style.color = "red";
              return false
        }
    }
     
    function checkEmptyRadio(){
        var flag = true;
        $(':radio').each(function () {
            name = $(this).attr('name');
            if (flag && !$(':radio[name="' + name + '"]:checked').length) {
                flag = false;
            }
        });
//        alert(flag);
        return flag;
    }
    
   
</script>

</html>
