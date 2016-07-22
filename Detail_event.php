<?php
 include "conn.php";
  session_start();
 $user_id;
 
 if(isset($_SESSION['user_id'])){
     $user_id = $_SESSION['user_id'];
     
     
          $sql_sel_user = "SELECT * FROM profile WHERE user_id = ".$user_id;
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
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
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
            <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             รายละเอียดป้าย
                        </div>
                        <?php
                            $eId = $_GET['eId'];
                            $sql_sel_event = "SELECT * FROM event INNER JOIN profile ON event.user_id = profile.user_id WHERE event.eId = ".$eId;
                            $result = $conn->query($sql_sel_event);
                            $row = $result->fetch_array();
                            list($Syear, $Smonth, $Sday) = split("-", $row[4]);
                            list($Eyear, $Emonth, $Eday) = split("-", $row[5]);
                            list($Oyear, $Omonth, $Oday) = split("-", $row[6]);
                            
                            function sel_notice($s_notice,$conn){
                                if (strlen($s_notice) > 1){
                                    $arr_name = explode("_", $s_notice);
                                    for($i=0;$i<count($arr_name);$i++){
                                        $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId = ".$arr_name[$i];
                                        $result = $conn->query($sql_sel_notice);
                                        $rows = $result->fetch_array();
                                        echo '<li>'.$rows[0].'</li>';
                                    }
                                }else{
                                    $sql_sel_notice = "SELECT nName FROM local_notice WHERE nId = ".$s_notice;
                                    $result = $conn->query($sql_sel_notice);
                                    $rows = $result->fetch_array();
                                    echo '<li>'.$rows[0].'</li>';
                                }
                            }
                            
                            function change_mount($mount){
                                            if($mount == '01'){
                                                return 'มกราคม';
                                            }else if($mount == '02'){
                                                return 'กุมภาพันธ์';
                                            }else if($mount == '03'){
                                                return 'มีนาคม';
                                            }else if($mount == '04'){
                                                return 'เเมษายน';
                                            }else if($mount == '05'){
                                                return 'พฤษภาคม';
                                            }else if($mount == '06'){
                                                return 'มิถุนายน';
                                            }else if($mount == '07'){
                                                return 'กรกฎาคม';
                                            }else if($mount == '08'){
                                                return 'สิงหาคม';
                                            }else if($mount == '09'){
                                                return 'กันยายน';
                                            }else if($mount == '10'){
                                                return 'ตุลาคม';
                                            }else if($mount == '11'){
                                                return 'พฤศจิกายน';
                                            }else if($mount == '12'){
                                                return 'ธันวาคม';
                                            }
                                        }
                                        
                                        function changeYear($year){
                                               return intval($year) + 543 ;
                                        }
                        
                        ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <col width="40">
                                    <col width="200">
                                    <tbody>
                                        <tr>
                                            <td>ชื่อกิจกรรม</td>
                                            <td><?php echo $row[3]?></td>
                                        <tr>
                                            <td>ชื่อ นามสกุลผู้จอง</td>
                                            <td><?php echo $row[11].' '.$row[12]?></td>
                                        </tr>
                                        <tr>
                                            <td>หน่วยงาน/คณะ</td>
                                            <td><?php echo $row[13]?></td>
                                        </tr>
                                         <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td><?php echo $row[14]?></td>
                                        </tr>
                                        <tr>
                                            <td>ป้ายที่จอง</td>
                                            <td>
                                                <?php 
                                                    echo '<ol>';
                                                       echo sel_notice($row[2], $conn);
                                                    echo '</ol>';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>วันเริ่มติดตั้ง</td>
                                            <td><?php echo $Sday.' '.change_mount($Smonth).' '.changeYear($Syear)?></td>
                                        </tr>
                                        <tr>
                                            <td>วันสิ้นสุดการติดตั้ง</td>
                                            <td><?php echo $Eday.' '.change_mount($Emonth).' '.changeYear($Eyear)?></td>
                                        </tr>
                                        <tr>
                                            <td>วันรื้อถอน</td>
                                            <td><?php echo $Oday.' '.change_mount($Omonth).' '.changeYear($Oyear)?></td>
                                        </tr>
                                        <tr>
                                            <td>ตัวอย่างป้าย</td>
                                            <td><img  src="<?php echo $row[7]?>" width="300" height="250"></td>
                                        </tr>
                                        <tr>
                                            <td>รายละเอียดงานหรือกิจกรรม</td>
                                            <td><?php echo $row[8]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                                    echo '<button class="btn btn-outline btn-danger pull-right" type="button" style="margin:5px;" onclick="remove_event('.$eId.')">ลบการจอง</button>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
    </div>
        <!-- end page-wrapper -->

</div>
<!-- end wrapper -->
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/plugins/pace/pace.js"></script>
<script src="assets/scripts/siminta.js"></script>
<!-- Page-Level Plugin Scripts-->
</body>


<script type="text/javascript">
    function remove_event(eId){
//        alert(eId);
        $.ajax({
           url: 'admin_manage_event.php',
           type: 'POST',
           data: {
                eId : eId,
                todo : "remove_eId"
           },
           success: function (data, textStatus, jqXHR) {
                setTimeout(function (){
                document.location.href = "manage_Res_Event.php";
                },2000);
                document.getElementById("show").innerHTML = data;
           }
        });
    }
</script>

</html>
