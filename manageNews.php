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

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่ม/ลบ/แก้ไข ประชาสัมพันธ์</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href="assets/css/main-style.css" rel="stylesheet"/>
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet"/>
    
    <script type="text/javascript">
        function InsertNews(){
            var title = $("#titleNews").val();
            var desri = $("#newsDetail").val();
            
            var form = new FormData();
            form.append('todo',"insertNews");
            form.append('title', title);
            form.append('desrict', desri);
            
            $.ajax({
               url: 'sqlNews.php',
               data: form,
               type: 'POST',
               contentType: false, 
               cache: false,
               processData: false,
               success: function (data) {
                   document.getElementById("showdata").innerHTML = data;
                    setTimeout(function () {
                            window.location.href = "manageNews.php"; //will redirect to your blog page (an ex: blog.html)
                    }, 2000); 
               }
            });
        }
        
        
        function delNews(nId){
            $.ajax({
               url:'sqlNews.php',
               data:{
                   todo: "delNews",
                   nId: nId
               },
               type: 'POST',
               success: function (data) {
                   document.getElementById("showSelect").innerHTML = data;
                    setTimeout(function () {
                            window.location.href = "manageNews.php"; //will redirect to your blog page (an ex: blog.html)
                    }, 2000); 
               }
            });
        }
        
        function editNews(nId){
            $.ajax({
               url:'sqlNews.php',
               data:{
                   todo: "selNews",
                   nId: nId
               },
               type: 'POST',
               success: function (data) {
                   document.getElementById("showSelect").innerHTML = data;
               }
            });
        }
        
        function updateNews(nId){
            var eNews = $("#editTitle").val();
            var eDetail = $("#editDetail").val();
            
            $.ajax({
               url : 'sqlNews.php',
               type : 'post',
               data:{
                   todo: 'editNews',
                   nId: nId,
                   eNews: eNews,
                   eDatail: eDetail
               },
               success: function (data) {
                   document.getElementById("showResult").innerHTML = data;
               }
            });
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
        <?php 
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
                </li>

                <li>
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
                               $_SESSION['user_id'] = $row_user[0];
                        echo '</a>';
                    ?>
                </li>
                <li class="active">
                     <ul class="nav nav-second-level">
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
                                    echo '<a href="editDoc.php">';
                                        echo 'เพิ่ม/ลบ/แก้ไขเอกสาร';
                                        $_SESSION['user_id'] = $row_user[0];
                                    echo '</a>';
                                echo '</li>';
                                echo '<li class="selected">';
                                    echo '<a href="manageNews.php">';
                                        echo 'เพิ่ม/แก้ไข/ลบ ประชาสัมพันธ์';
                                          $_SESSION['user_id'] = $row_user[0];
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
                    <!-- second-level-items -->
                </li>
            </ul>
            <!-- end side-menu -->
        </div>
        <!-- end sidebar-collapse -->
    </nav>
    <!-- end navbar side -->

    <!--  page-Document -->
    <div id="page-wrapper">
        <div class="row">
            <!-- page Document -->
            <div class="col-lg-12">
                <h1 class="page-header">เพิ่ม/ลบ/แก้ไข ประชาสัมพันธ์</h1>
            </div>
            <!--end page header -->
        </div>
        <?php
            
            $sql_sel = "SELECT * FROM news";
            $result = $conn->query($sql_sel);
        ?>
        
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        ประชาสัมพันธ์ทั้งหมด
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form name="fomeInsert" id="fomeInsert" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                  <table class="table">
                                        <col width="300">
                                        <col width="20">
                                        <col width="20">
                                        <tr>
                                            <th>ชื่อเรื่องประชาสัมพันธ์</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tbody>
                                            <?php
                                                while ($rows = $result->fetch_array()){
                                                    echo '<tr>';
                                                        echo '<td>';
                                                        echo '<label>'.$rows[1].'</label>';
                                                        echo '</td>';
                                                        echo '<td>';
                                                            echo '<div class="form-group">';
                                                                echo '<button type="button" class="btn btn-success" name="btn_edit" id="btn_edit" value="'.$rows[0].'" onclick="editNews('.$rows[0].')">แก้ไข</button>';
                                                            echo '</div>';
                                                        echo '</td>';
                                                         echo '<td>';
                                                            echo '<div class="form-group">';
                                                                echo '<button type="button" class="btn btn-danger" name="btn_del" id="btn_del" value="'.$rows[0].'" onclick="delNews('.$rows[0].')">ลบ</button>';
                                                            echo '</div>';
                                                        echo '</td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                </table>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div id="showSelect"></div>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>      
        

        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        เพิ่มข่าวประชาสัมพันธ์
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form name="addNews" id="addNews" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>หัวข้อประชาสัมพันธ์</label>
                                        <input class="form-control" id="titleNews" name="titleNews" placeholder="กรุณาใส่หัวข้อ">
                                    </div>
                                    <div class="form-group">
                                        <label>รายละเอียด</label>
                                        <textarea class="form-control" id="newsDetail" name="newsDetail" style="resize: none; width: 800; height: 300px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" name="btn_add" id="btn_add" onclick="InsertNews()">เพิ่มประชาสัมพันธ์</button>
                                    </div>
                                </form>
                                <div id="showdata"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
    </div>

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
<script src="assets/scripts/jasny-bootstrap.min.js"></script>


</body>

</html>


