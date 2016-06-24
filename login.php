<?php
  include './conn.php';
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
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="../assets/img/logo.png" alt=""/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">กรุณาเข้าสู่ระบบ</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="รหัสเข้าใช้งานอินเตอร์เน็ต" name="username" id="username" class="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button class="btn btn-lg btn-success btn-block" type="submit" >Login</button>
                            </fieldset>
                        </form>
                    </div>
                    <div id="row">
                        <label style="margin:5px 5px;">**เข้าสู่ระบบด้วยรหัสเข้าใช้อินเตอร์เน็ตของมหาวิทยาลัยขอนแก่น</label>
                    </div>
                </div>
                <div id="show"></div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>
<?php
    if(isset($_POST['username'])){
        $user = $_POST['username'];
        $sql_check_user = "SELECT * FROM profile WHERE user_name ='".$user."' ";
        $result = $conn->query($sql_check_user);
//        $result->execute();
//        echo $result->fetchColumn();
        if($result->rowCount > 0){
            $row = $result->fetch_array();
//            header("Location:index.php");
             echo $row[5];
        }else{
//            echo 'dddd';
//            header("Location:loginf.php");
        }
    }
?>
</html>
