<?php
 include "conn.php"
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูล</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/main-style.css" rel="stylesheet"/>
    <link href="assets/css/logincss.css" rel="stylesheet"/>
    
    
    <script type="text/javascript">
        function insertUser(){
            var fname = $("#user_fname").val();
            var lname = $("#user_lname").val();
            var depart = $("#user_depart").val();
            var tel = $("#user_tel").val();
            
            if(fname == ""){
                document.getElementById("user_fname").focus();
            }else if(lname == ""){
                document.getElementById("user_lname").focus();
            }else if(depart == ""){
                document.getElementById("user_depart").focus();
            }else if(tel == ""){
                document.getElementById("user_tel").focus();
            }else{
                $.ajax({
                  url: 'user_sql.php',
                  type: 'post',
                  data: {
                      fname: fname,
                      lname: lname,
                      depart: depart,
                      tel: tel,
                      todo: 'insertUser'
                  },
                  success: function (data) {
                      document.getElementById("result").innerHTML = data;
                      setTimeout(function () {
                       window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
                    }, 2000); //will call the function after 2 secs.

                  }
                });
            }
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
    </nav>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="login-box">
                        <div class="social-login">
                            กรอกข้อมูลผู้ใช้
                        </div>
                        <form class="email-login" method="POST" >
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <input class="form-control" name="user_fname" id="user_fname" placeholder="กรุณากรอกชื่อ">
                            </div>
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input class="form-control" name="user_lname" id="user_lname" placeholder="กรุณากรอกนามสกุล">
                            </div>
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input class="form-control" name="user_lname" id="user_lname" placeholder="กรุณากรอกนามสกุล">
                            </div>
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input class="form-control" name="user_lname" id="user_lname" placeholder="กรุณากรอกนามสกุล">
                            </div>
                            <div class="form-group">
                                <label>หน่วยงาน/คณะ</label>
                                <input class="form-control" name="user_depart" id="user_depart" placeholder="กรุณากรอกหน่วยงาน/คณะ">
                            </div>
                            <div class="form-group">
                                <label>เบอร์โทรศัพท์</label>
                                <input class="form-control" name="user_tel" id="user_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์">
                            </div>
                            <div class="u-form-group">
                                <button type="button" onclick="insertUser()">บันทึก</button>
                            </div>
                            <div id="result"></div>
                        </form>
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
</body>

</html>
