<?php
 include "conn.php"
?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่ม/ลบ/แก้ไขไฟล์</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href="assets/css/main-style.css" rel="stylesheet"/>
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet"/>
    
    <script>
        function del_Notice(id_notice){
            $.ajax({
               url: 'sqlnotice.php',
               type: 'post',
               data: {
                 todo: "del_Notice",
                 selId: id_notice
               },
               success: function (data) {
                     document.getElementById("showEdit").innerHTML = data;
                }
            });
        }
        function edit_Notice(id_notice){
          var pName = document.getElementById("selName").value;
          var pWidth = document.getElementById("selWidth").value;
          var pHeigth = document.getElementById("selHeigth").value;
          if(document.getElementById("selFile").files.length == 0 ){
             $.ajax({
              url: 'sqlnotice.php',
              type: 'post',
              data: {
                  pName: pName,
                  pWidth: pWidth,
                  pHeigth: pHeigth,
                  todo: "updateNWH",
                  nId: id_notice
              }, 
              success: function (data) {
                     document.getElementById("showEdit").innerHTML = data;
              }
          });
          }else{
           var fileInput = document.getElementById("selFile");
           var file = fileInput.files[0];
           var formData = new FormData();
            formData.append('file', file);
            formData.append('pName', pName);
            formData.append('pWidth', pWidth);
            formData.append('pHeigth', pHeigth);
            formData.append('todo', "editNotice");
            formData.append('nId', id_notice);
            
          $.ajax({
              url: 'sqlnotice.php',
              type: 'post',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,
              processData: false,
              success: function (data) {
                     document.getElementById("showEdit").innerHTML = data;
              }
          });
          } 
        }
        
        
        function sel_Notice(id_notice){
            $.ajax({
               url: 'sqlnotice.php',
               type: 'post',
               data: {
                 todo: "sel_Notice",
                 selId: id_notice
               },
               success: function (data) {
                     document.getElementById("show2").innerHTML = data;
                }
               
            });
        }
        function insertNotice(){
          var fileInput = document.getElementById("pNotice");
          var pName = document.getElementById("pName").value;
          var pWidth = document.getElementById("pWidth").value;
          var pHeigth = document.getElementById("pHeigth").value;
          
          document.getElementById("NotiName").innerHTML = "";
          document.getElementById("NotiWid").innerHTML = "";
           document.getElementById("NotiHig").innerHTML = "";
           document.getElementById("NotiImg").innerHTML = "";
           
          if(pName == ""){
              document.getElementById("pName").focus();
              document.getElementById("NotiName").innerHTML = "*กรุณากรอกชื่อป้าย";
              document.getElementById("NotiName").style.color = "red";
          }else if(pWidth == ""){
              document.getElementById("pWidth").focus();
              document.getElementById("NotiWid").innerHTML = "*กรุณากรอกความกว้างชองป้าย";
              document.getElementById("NotiWid").style.color = "red";
          }else if(pHeigth == ""){
              document.getElementById("pHeigth").focus();
              document.getElementById("NotiHig").innerHTML = "*กรุณากรอกความสูงชองป้าย";
              document.getElementById("NotiHig").style.color = "red";
          }else if(document.getElementById("pNotice").files.length == 0){
              document.getElementById("NotiImg").innerHTML = "*กรุณาเลือกรูปภาพ";
              document.getElementById("NotiImg").style.color = "red";
          }else{
          
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('file', file);
            formData.append('pName', pName);
            formData.append('pWidth', pWidth);
            formData.append('pHeigth', pHeigth);
            formData.append('todo', "InsertNotice");


             $.ajax({
                url: 'sqlnotice.php',
                type: 'post',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,
                processData: false,
                success: function (data) {
                     document.getElementById("show").innerHTML = data;
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
                <li class="active">
                    <a href="#"><i class="fa fa-book fa-fw"></i> ผู้ดูแลระบบ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="manage_Res_Event.php">จัดการการจอง</a>
                        </li>
                        <li class="selected">
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

    <!--  page-Document -->
    <div id="page-wrapper">
        <div class="row">
            <!-- page Document -->
            <div class="col-lg-12">
                <h1 class="page-header">เพิ่ม/ลบ/แก้ไข ป้าย</h1>
            </div>
            <!--end page header -->
        </div>

        <!--    Insert Document Into database -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        เพิ่มป้าย ประชาสัมพันธ์
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form name="fomeInsert" id="fomeInsert" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                   <div class="form-group">
                                            <label>ชื่อป้าย</label>
                                            <input id="pName" name="pName" class="form-control"  placeholder="กรุณากรอกชื่อกป้าย">
                                            <div id="NotiName"></div>
                                   </div>
                                    <div class="form-group">
                                            <label>ความกว้าง</label>
                                            <input id="pWidth" name="pWidth" class="form-control"  placeholder="กรุณากรอกความกว้างของป้าย">
                                            <div id="NotiWid"></div>
                                    </div>
                                    <div class="form-group">
                                            <label>ความสูง</label>
                                            <input id="pHeigth" name="pHeigth" class="form-control"  placeholder="กรุณากรอกความสูงของป้าย">
                                            <div id="NotiHig"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 500px; height: 350px;"></div>
                                            <div>
                                              <span class="btn btn-default btn-file">
                                                  <span class="fileinput-new">เลือกรูปป้าย</span>
                                                  <span class="fileinput-exists">เปลี่ยนรูป</span>
                                                  <input type="file" name="pNotice" id="pNotice"></span>
                                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบ</a>
                                            </div>
                                        </div>
                                        <div id="NotiImg"></div>
                                    </div>
                                    <div class="form-group">
                                         <button type="button" class="btn btn-success" name="btn_upload" id="btn_upload"
                                                 value="upload" onclick="insertNotice()">
                                            เพิ่มป้าย
                                        </button>
                                    </div>
                                   <div id="show" class="col-lg-12"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>      
        
        <?php
            $sql_sel = "SELECT * FROM local_notice";
            $result = $conn->query($sql_sel);
            
        ?>
        <!--    Delete Document Into database -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        แก้ไข/ลบ ป้ายประชาสัมพันธ์
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form name="sel_form" id="sel_form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Selects</label>
                                        <select class="form-control" id="selNotice" name="selName" onchange="sel_Notice(this.value)">
                                            <option selected disabled>กรุณาเลือกป้าย</option>
                                            <?php
                                                $i = 1;
                                                while ($rows = $result->fetch_array()){
                                                    echo '<option value="'.$rows[0].'">'.$i.'.'.$rows[1].'</option>';
                                                    $i++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div id="show2" class="col-lg-12"></div>
                                </form>
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

