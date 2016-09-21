<?php
 include "conn.php";
    if(isset($_GET['eId'])){
        $userId = $_GET['userId'];
        $eId = $_GET['eId'];
        
        $sql_sel = "SELECT * FROM event WHERE eId = ".$eId;
        $result = $conn->query($sql_sel);
        $row = $result->fetch_array();              
        $not_sel = explode("_", $row[2]);
        
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
                    <!-- user image section-->
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
                    if($row_user[8] != "user"){
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
                                                $_SESSION['user_id'] = $row_user[0];
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
                                            <input class="form-control" name="naem_event" id="naem_event" value="<?php echo $row[3]?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>วันเริ่มติดตั้ง</label>
                                                <input class="form-control" name="txtFromDate" id="txtFromDate" value="<?php echo $row[4]?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>วันสิ้นสุด</label>
                                                <input class="form-control" name="txtToDate" id="txtToDate" value="<?php echo $row[5]?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>วันรื้อถอน</label>
                                            <input class="form-control" name="outevent" id="outevent" readonly value="<?php echo $row[6]?>">
                                        </div>
                                        
                                    <?php
                                        $sql_sel = "SELECT * FROM local_notice";
                                        $result = $conn->query($sql_sel);
                                    ?>
                                        <div class="form-group">
                                             <label class="control-label" for="inputSuccess">เลือกป้าย</label>
                                        </div>
                                        <div class="form-group has-success">
                                            <select id="sel_notice" class="sel_notice"  multiple="multiple">
                                                <?php
                                                    $i = 1;
                                                    while ($rows = $result->fetch_array()){
                                                        foreach ($not_sel as $val){
                                                            $sel = '';
                                                            if(in_array($val, $rows[0])){
                                                                $sel = ' selected="selected" ';
                                                            }
                                                        }
                                                        echo '<option '.$sel.' value="'.$rows[0].'">'.$i.'.'.$rows[1].'</option>';
                                                        $i++;
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn tn btn-outline btn-success" onclick="checkDateOverlap()">เช็คป้าย</button>
                                            <label>*กรุณาเลือกวันเริ่มติดตั้งและวันรื้อถอนและป้ายก่อนเช็คป้าย</label>
                                        </div>
                                        <div class="form-group">
                                            <div id="show_repos"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 150px;">
                                                    <?php echo '<img  src="'.$row[7].'">'?>
                                                </div>
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
                                            <textarea class="form-control" id="newsDetail" name="newsDetail" style="resize: none; width: 100; height: 100px;">
                                                <?php echo $row[8]?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                           <button type="button" class="btn btn-success" name="btn_save" id="btn_upload"
                                                   value="upload" onclick="updateEvent()">
                                                บันทึก
                                            </button>
                                        </div>
                                        <div id="show"></div>
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
    var name =  "<?php Print($row[2]);?>";
    var arr_name = name.split("_"); 
//    for(var i=0;i<arr_name.length;i++){
//        $("#sel_notice").val(arr_name[i])
////        console.log(arr_name[i]);
//    }
    for(var i=0;i<arr_name.length;i++){
        $("#sel_notice > option").filter( function() {
            return $(this).val() == arr_name[i]; 
        }).prop('selected', true); //use .prop, not .attr
    }
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
        function updateEvent(){
            var eId = "<?php Print($eId)?>";
            var userId = "<?php Print($userId)?>";
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
            if(document.getElementById("pNotice").files.length == 0 ){
               var formData = new FormData();
               formData.append('Eid', eId);
               formData.append('Ename', Ename);
               formData.append('Estart', Estart);
               formData.append('Eend', Eend);
               formData.append('Eout', Eout);
               formData.append('Edetail', Edetail);
               formData.append('Enotice', json_arr);
               formData.append('todo',"update_notice_n");

               $.ajax({
                   url: 'manageEvent.php',
                   type: 'post',
                   data: formData,
                   contentType: false,       // The content type used when sending data to the server.
                   cache: false,
                   processData: false,
                   success: function (data) {
                        document.getElementById("show").innerHTML = data;
                        setTimeout(function (){
                            window.location.href = "Res_Form.php?eId="+eId+"&userId="+userId;
                        },2000);
                  }
                });   
            }
            
            if(document.getElementById("pNotice").files.length != 0 ){
               var file = fileInput.files[0];
               var formData = new FormData();
               formData.append('Eid', eId);
               formData.append('Ename', Ename);
               formData.append('Estart', Estart);
               formData.append('Eend', Eend);
               formData.append('Eout', Eout);
               formData.append('Edetail', Edetail);
               formData.append('Enotice', json_arr);
               formData.append('Eimage', file);
               formData.append('todo',"update_notice");

               $.ajax({
                   url: 'manageEvent.php',
                   type: 'post',
                   data: formData,
                   contentType: false,       // The content type used when sending data to the server.
                   cache: false,
                   processData: false,
                   success: function (data) {
                        setTimeout(function (){
                          document.location.href = "Res_Form.php?eId="+eId+"&userId="+userId;
                        },2000);
                         document.getElementById("show").innerHTML = data;
                  }
                }); 
            }
        }
        
        function checkDateOverlap(){
            var star_date = $("#txtFromDate").val();
            var out_date = $("#outevent").val();
            var Enotice = $("#sel_notice").val();
            var array = $.map(Enotice, function (value, index) {
                return [value];
            });
            var json_arr = JSON.stringify(array);
            
            $.ajax({
               url : "manageEvent.php",
               type: 'POST',
               data: {
                   todo : "check_notice",
                   sDate: star_date,
                   oDate: out_date,
                   nName: json_arr
               },
               success: function (data) {
                  document.getElementById("show_repos").innerHTML = data;
               }
            });
        }
    </script>

</body>

</html>
