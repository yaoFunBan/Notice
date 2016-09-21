<?php
  include './conn.php';
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-5 col-md-offset-3 text-center logo-margin ">
                <img src="assets/img/logo2.png" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title col-md-offset-4">กรุณาเข้าสู่ระบบ</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="LdapConn.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="Login[Username]" id="username" class="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password"  name="Login[Password]" id="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                                </div>
                                <label style="text-align: center; color: red">การเข้าสู่ระบบใช้รหัสเดียวกันกับการใช้งานอินเตอร์เน็ต</label>
                            </fieldset>
                             <div id="show"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    
    <script type="text/javascript">
          function login(){
              var email = document.getElementById("username").value;
              var pass = document.getElementById("password").value;
              var status = '';
              $.ajax({
                    url: 'user_sql.php',
                    type: 'post',
                    data: {
                        todo : "login",
                        email : email,
                        pass : pass
                    },
                    success: function (data) {
                        status = data+"";
                        if(status.length == 6){
                            document.getElementById("show").innerHTML = "Email ผิดหรือ รหัสผู้ใช้ผิดกรุณาตรวจสอบ";
                            document.getElementById("show").style.color = "red";   
                        }else{
//                            document.getElementById("show").innerHTML = data;  
                            window.location.href = "index.php";
                        }
                        
                   }
               });
          }
    
    </script>

</body>
</html>
