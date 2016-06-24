<?php
 include "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
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
            <!-- main dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="top-label label label-danger">3</span><i class="fa fa-envelope fa-3x"></i>
                </a>
                <!-- dropdown-messages -->
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong><span class=" label label-danger">Andrew Smith</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong><span class=" label label-info">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong><span class=" label label-success">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- end dropdown-messages -->
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="top-label label label-success">4</span> <i class="fa fa-tasks fa-3x"></i>
                </a>
                <!-- dropdown tasks -->
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- end dropdown-tasks -->
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="top-label label label-warning">5</span> <i class="fa fa-bell fa-3x"></i>
                </a>
                <!-- dropdown alerts-->
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i>New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i>Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i>New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- end dropdown-alerts -->
            </li>

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
                    <a href="#"><i class="fa fa-home fa-fw"></i>หน้าแรก</a>
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
                <li class="selected">
                    <a href="#"><i class="fa fa-table fa-fw"></i>แบบฟอร์มการจองป้าย</a>
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
                           แบบฟอร์มการจองป้าย
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" id="eventForm" name="eventForm">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ชื่องาน/กิจกรรม</label>
                                            <input class="form-control" name="naem_event" id="naem_event" placeholder="กรุณากรอกชื่องาน/กิจกรรม">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>วันเริ่มติดตั้ง</label>
                                                <input class="form-control" name="txtFromDate" id="txtFromDate" placeholder="กรุณากรอกวันเริ่มการจอง">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>วันสิ้นสุด</label>
                                                <input class="form-control" name="txtToDate" id="txtToDate" placeholder="กรุณากรอกวันสิ้นสุดการจอง">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>วันรื้อถอน</label>
                                            <input class="form-control" name="outevent" id="outevent" readonly >
                                        </div>
                                         <div class="form-group">
                                            <button type="button" class="btn tn btn-outline btn-success" onclick="checkDateOverlap()">เช็คป้าย</button>
                                        </div>
                                    <?php
                                        $sql_sel = "SELECT * FROM local_notice";
                                        $result = $conn->query($sql_sel);
                                    ?>
                                        <div class="form-group">
                                             <label class="control-label" for="inputSuccess">เลือกป้าย</label>
                                        </div>
                                        <div class="form-group has-success">
                                            <select id="sel_notice"  multiple="multiple" name="sel_notice[]">
                                                <?php
                                                    $i = 1;
                                                    while ($rows = $result->fetch_array()){
                                                        echo '<option value="'.$rows[0].'">'.$i.'.'.$rows[1].'</option>';
                                                        $i++;
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 150px;"></div>
                                                <div>
                                                  <span class="btn btn-default btn-file">
                                                      <span class="fileinput-new">เลือกรูปป้าย</span>
                                                      <span class="fileinput-exists">เปลี่ยนรูป</span>
                                                      <input type="file" name="pNotice" id="pNotice"></span>
                                                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="pNotice">ลบ</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>รายละเอียด</label>
                                            <textarea class="form-control" id="newsDetail" name="newsDetail" style="resize: none; width: 100; height: 100px;"></textarea>
                                        </div>
                                        <div class="form-group">
                                           <button type="button" class="btn btn-success" name="btn_save" id="btn_upload"
                                                   value="upload" onclick="insertEvent()">
                                                บันทึก
                                            </button>
                                        </div>
                                        <div id="show"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="display_notice">
                                        </div>
                                     </div>
                                </form>
                            </div>
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
<script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="assets/plugins/morris/morris.js"></script>
<script src="assets/scripts/jasny-bootstrap.min.js"></script>
<script src="assets/scripts/bootstrap-datepicker.js"></script>
<script src="assets/scripts/jquery-ui.min.js"></script>
<!--<script src="assets/scripts/jquery.min.js"></script>-->
<script src="assets/scripts/multiple-select.js"></script>

<script>
    $(function() {
        $('#sel_notice').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            
        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#txtFromDate").datepicker({
            numberOfMonths: 2,
            todayBtn: "linked",
            language: "th",
            autoclose: true,
            todayHighlight: true,
            dateFormat: 'yy-mm-dd',
            onSelect: function(selected) {
              $("#txtToDate").datepicker("option","minDate", selected);
            }
        });
        $("#txtToDate").datepicker({ 
            numberOfMonths: 2,
            todayBtn: "linked",
            language: "th",
            autoclose: true,
            todayHighlight: true,
            dateFormat: 'yy-mm-dd',
            onSelect: function(selected) {
               $("#txtFromDate").datepicker("option","maxDate", selected);
               var outDate = $("#txtToDate").datepicker('getDate');
               outDate.setDate(outDate.getDate()+3);
               
               $("#outevent").datepicker('setDate', outDate);
//               $("input[name='test']").val(selected);
            }  
        });
    });
    
</script>
<script type="text/javascript">
    $(function () {
        $("#outevent").datepicker({
            dateFormat: 'yy-mm-dd',
            beforeShow: function (input, inst) 
            { 
                if($(input).attr('readonly') !== undefined ) {
                    if(inst.o_dpDiv === undefined) {
                        inst.o_dpDiv = inst.dpDiv;
                    }
                    inst.dpDiv = $('<div style="display: none;"></div>');
                } else {
                    if(inst.o_dpDiv !== undefined) {
                        inst.dpDiv = inst.o_dpDiv;
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
        function insertEvent(){
            var Ename = $("#naem_event").val();
            var Estart = $("#txtFromDate").val();
            var Eend = $("#txtToDate").val();
            var Eout = $("#outevent").val();
            var Enotice = $("#sel_notice").val();
            var fileInput = document.getElementById("pNotice");
            var Edetail = $("#newsDetail").val();
            var array = $.map(Enotice, function (value, index) {
                return [value];
            });
            var json_arr = JSON.stringify(array);
            
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('Ename', Ename);
            formData.append('Estart', Estart);
            formData.append('Eend', Eend);
            formData.append('Eout', Eout);
            formData.append('Edetail', Edetail);
            formData.append('Enotice', json_arr);
            formData.append('Eimage', file);
            formData.append('todo',"resv_notice")
            
            $.ajax({
                url: 'manageEvent.php',
                type: 'post',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,
                processData: false,
                success: function (data) {
                      document.getElementById("show").innerHTML = data;
               }
             });
        }
        
        
        function checkDateOverlap(){
            var star_date = $("#txtFromDate").val();
            var out_date = $("#outevent").val();
            
            $.ajax({
               url : "manageEvent.php",
               type: 'POST',
               data: {
                   todo : "check_notice",
                   sDate: star_date,
                   oDate: out_date
               },
               success: function (data) {
                  document.getElementById("display_notice").innerHTML = data;
               }
            });
        }
    </script>
    
    
</body>

</html>
