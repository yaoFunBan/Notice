<?php
 include "conn.php";
 require_once './mpdf/mpdf.php';
 
 $eId = 1; 
 $sql_sel = "SELECT * FROM profile WHERE user_id = 1";
 $result = $conn->query($sql_sel);
 $row = $result->fetch_array();

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>-->
    <!--<link href="assets/css/print.css" rel="stylesheet"/>-->
</head>
<?php
 ob_start(); 
?>
<body>
<!--  wrapper -->
<tocentry level="1" content="The Middle Ages"><bookmark content="The Middle Ages" /></tocentry>
    <div class="container">
         <div class="row">
             <div style="text-align: right;">เลขที่......./.......</div>
         </div>
        <div class="row">
            <div class="col-lg-12" style="text-align: center">
                <label><h4>แบบคำขออนุญาตปิดประกาศ ติดตั้งป้ายประชาสัมพันธ์ ภายในมหาวิทยาลัยขอนแก่น</h4></label>
            </div>
        </div>
        <br>
        <div class="row">
            <label id="hStory">เรื่อง</label> <label>ขออนุญาตติดตั้งป้ายประชาสัมพันธ์ ภายในมหาวิทยาลัยขอนแก่น</label>
        </div>
        <div class="row">
            <label><span id="hStory">เรียน</span> ผู้ช่วยอธิการบดีฝ่ายสื่อสารองค์กร (ผ่านหัวหน้างานบริหารงานทั่วไป)</label>
        </div>
            <label><span id="hStory">ข้าพเจ้า</span>...........<?php echo $row[1].'..'.$row[2]?>.....................</label>
            <label><span id="hStory">หน่วยงาน</span>..........<?php echo $row[3]?>......<span id="hStory">เบอร์โทร</span>.....<?php echo $row[4]?>.....</label>
        <div class="form-group">
            <table class="table table-bordered" >
                <thead>
                    <tr>
                        <th class="text-center">ประเภทสื่อที่ขออนุญาต</th>
                        <th class="text-center">จุดติดตั้ง</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 2%">
                           <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> ติดแผ่นป้ายไวนิล  บนโครงเหล็ก 
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    (ขนาดมาตรฐานของ มข. 2.4 x 6 เมตร,3.6x 8.4 เมตร,2.4 x 5 เมตร )
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    1. ขนาด กว้าง............6..............เมตร ยาว..........2.4...........เมตร<br>จำนวน.............จุด
                                </label>
                            </div>
                        </td>
                        <td style="padding: 2%"></td>
                    </tr>
                    <tr>
                        <td style="padding: 2%">
                            <div class="form-group">
                                <label>
                                    2. ขนาด กว้าง............8.4...........เมตร ยาว..........3.6...........เมตร<br>จำนวน.............จุด
                                </label>
                            </div>
                        </td>
                        <td style="padding: 2%"></td>
                    </tr>
                    <tr>
                        <td style="padding: 2%">
                            <div class="form-group">
                                <label>
                                    3. ขนาด กว้าง............5..............เมตร ยาว..........2.4...........เมตร<br>จำนวน.............จุด
                                </label>
                            </div>
                        </td>
                        <td style="padding: 2%"></td>
                    </tr>
                    <tr>
                        <td style="padding: 2%">
                            <div class="form-group">
                                <label>
                                    <img src="assets/img/unchecked_checkbox.png" width="15" height="15"> <label>อิ่นๆ.......................................................................................</label><br>
                                </label>
                                <div class="form-group">
                                    <label>
                                    ขนาด กว้าง...............................เมตร ยาว.............................เมตร<br>จำนวน.................จุด
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td style="padding: 2%"></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <h4>สำหรับกิจกรรม</h4>
                <label>......................................................................................(แนบข้อความและแบบป้ายประกอบการขออนุญาต)</label>
            </div>
            <div class="form-group">
                <span id="hStory">ตั้งแต่</span> <label>วันที่............เดือน.......................พ.ศ.................ถึง วันที่............เดือน.......................พ.ศ..................</label>
            </div>
            <div class="form-group">
                <span id="hStory">โดยจะทำการรื้อถอนให้แล้วเสร็จใน </span> <label>วันที่.............................เดือน.............................พ.ศ.............................</label>
            </div>
            <div class="form-group" style="text-indent: 15%">
                <label>กรณีป้ายโฆษณาที่ติดตั้งไว้ได้ก่อให้เกิดความเสียหายต่อชีวิต ร่างกาย หรือทรัพย์สินของบุคคล<br>อื่นไม่ว่ากรณีใดๆก็ตาม   ผู้ได้รับอนุญาตจะต้องรับผิดชอบต่อความเสียหายที่เกิดขึ้นนั้น</label>
            </div>
            <div class="form-group" style="text-indent: 15%">
                <label>ข้าพเจ้ายินดีปฏิบัติตามระเบียบ ประกาศ และเงื่อนไขของมหาวิทยาลัยขอนแก่นทุกประการ</label>
            </div>
            <div class="form-group" style="text-indent: 15%">
                <label>จึงเรียนมาเพื่อโปรดพิจารณาอนุญาต   จักขอบคุณยิ่ง</label>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row" style="text-align: right;">
                <label>ลงชื่อ..................................................................ผู้ขออนุญาติ</label>
            </div>
            <div class="row" style="text-align: right;">
                <label>(............................................................................................)</label>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <label id="hStory">หมายเหตุ ระยะเวลาการขอติดตั้งแต่ละครั้ง / กิจกรรม ไม่เกิน  7 วัน</label>
            </div>
            <div class="row">
                <table class="table table-bordered">
                    <col width="100">
                    <col width="100">
                    <col width="100">
                    <col width="100">
                    <tbody>
                        <tr>
                            <td style="padding: 2%">
                                <div class="row"><label id="hStory">1.เรียน ผู้ช่วยอธิการบดี<br>ฝ่ายกิจการทั่วไป</label></div>
                                <div class="row">
                                    <label>งานประชาสัมพันธ์ได้<br>ตรวจสอบ ดังนี้ </label>
                                </div>
                                <ol>
                                    <li>
                                        <label id="hStory">ประเภทการขอ<br>อนุญาต</label>
                                        <br>
                                        <br>
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> กิจกรรมภายในและ<br>บริการชุมชน<br>  
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> กิจกรรมที่เกี่ยวข้องกับ<br>เชิงพาณิชย์
                                    </li>
                                    <br>
                                    <li>
                                        <label id="hStory">ค่าใช้จ่ายในการติดตั้ง</label>
                                        <br>
                                        <br>
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ประเมินค่าธรรมเนียม <br>ราคา........................บาท<br>
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ค่าประกันการติดตั้ง <br>...............................บาท
                                    </li>
                                </ol>
                                <div class="row" id="intable">
                                    <label>จึงเรียนมาเพื่อโปรดพิจารณา</label>
                                </div>
                                <div class="row" id="intable">
                                    <label>ลงชื่อ..................………….......</label>
                                </div>
                                <div class="row" id="intable">
                                    <label>(นางสาวชลวภรณ์  ชูกลิ่น)</label>
                                </div>
                                <div class="row">
                                    <label>ผู้ตรวจสอบ</label>
                                </div>
                                <br>
                                <div class="row" id="intable">
                                    <label>วันที่........../........../..........</label>
                                </div>
                                <br>
                                <br>
                                <div class="row" id="intable">
                                    <label>ลงชื่อ..................………….......</label>
                                </div>
                                <div class="row" id="intable">
                                    <label>(นางสถาพร นาวานุเคราะห์)</label>
                                </div>
                                <div class="row" id="intable">
                                   <label>หัวหน้างานบริหารงานทั่วไป</label>
                                </div>
                                <br>
                                <div class="row" style="text-align: center;">
                                    <label>วันที่........../........../..........</label>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                            <td style="padding: 2%">
                                <div class="row"><label id="hStory">2.เรียน หัวหน้างาน<br>บริหารงานทั่วไป</label></div>
                                <div class="row">
                                    <label>เพื่อโปรดดำเนินการ</label>
                                    <div class="row">
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> อนุญาต ดำเนินการ<br>ตามเสนอ โดย 
                                    </div>
                                    <div class="row">
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ยกเว้นค่าธรรมเนียม
                                    </div>
                                    <div class="row">
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ลดหย่อนค่าธรรมเนียม<br>คงเหลือ......................บาท
                                    </div>
                                    <div class="row">
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ตามราคาประเมิน
                                    </div>
                                    <div class="row">
                                        <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ไม่อนุญาต เนื่องจาก
                                    </div>
                                    <p>..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    ..............................................<br>
                                    </p>
                                    <br>
                                    <div class="row" id="intable">
                                    <label>ลงชื่อ..................………….......</label>
                                    </div>
                                    <div class="row" id="intable">
                                        <label>(นางสถาพร นาวานุเคราะห์)</label>
                                    </div>
                                    <div class="row" id="intable">
                                       <label>หัวหน้างานบริหารงานทั่วไป</label>
                                    </div>
                                    <br>
                                    <div class="row" style="text-align: center;">
                                        <label>วันที่........../........../..........</label>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                            <td style="padding: 2%">
                                <div class="row"><label id="hStory">3.ในกรณีที่ต้อง<br>จ่ายค่าธรรมเนียม)  เรียน<br> ผู้ช่วยอธิการบดีสื่อสารองค์กร</label></div>
                                <label>ผู้ขออนุญาตได้<br>ดำเนินการจ่าย<br>ค่าธรรมเนียมแล้วตาม<br>รายละเอียด ดังนี้</label>
                                <div class="row">
                                    <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ชำระค่าธรรมเนียม<br>ตามใบเสร็จรับเงิน<br>
                                        เล่มที่..................………….......<br>เลขที่..................………….......<br>
                                        จำนวนเงิน..................………….......บาท          
                                </div>
                                <div class="row" id="intable">
                                    <label>จึงเรียนมาเพื่อโปรดพิจารณา</label>
                                </div>
                                <div class="row" id="intable">
                                    <label>ลงชื่อ..................………….......</label>
                                </div>
                                <div class="row" id="intable">
                                    <label>(..................………….......)</label>
                                </div>
                                <div class="row">
                                    <label>..................………….......</label>
                                </div>
                                <br>
                                <div class="row" id="intable">
                                    <label>วันที่........../........../..........</label>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                            <td style="padding: 2%">
                                <div class="row"><label id="hStory">4.เรียน   หัวหน้างาน<br>รักษาความปลอดภัย</label></div>
                                <label>ผู้ขออนุญาตได้<br>ดำเนินการตามผลการ<br>พิจารณา ดังนี้</label>
                                <div class="row">
                                    <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ชำระค่าธรรมเนียม<br>ตามใบเสร็จรับเงิน<br>
                                        เล่มที่ ..................…………..................<br>เลขที่..................…………..................
                                </div>
                                <div class="row">
                                    <img src="assets/img/unchecked_checkbox.png" width="15" width="15"/> ชำระค่าประกัน<br>การติดตั้งตาม<br>ใบเสร็จรับเงิน<br> เล่มที่ ..................…………..................<br>เลขที่..................…………..................
                                </div>
                                <div class="row" id="intable">
                                    <label>เพื่อโปรดทราบ และดำเนิน<br>การประทับตราอนุญาตการติดตั้งป้าย ต่อไป</label>
                                </div>
                                <div class="row" id="intable">
                                    <label>ลงชื่อ..................…………..................</label>
                                </div>
                                <div class="row" id="intable">
                                    <label>(นางสถาพร นาวานุเคราะห์)</label>
                                </div>
                                <div class="row">
                                    <label>หัวหน้างานบริหารงานทั่วไป</label>
                                </div>
                                <br>
                                <div class="row" id="intable">
                                    <label>วันที่........../........../..........</label>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>    
                    </tbody>    
                </table>
                <div class="row" style="text-align: right;">
                    <label id="hStory" style="text-align: right">สอบถามรายละเอียดเพิ่มเติมได้ที่  40147 (ชลวภรณ์)</label>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    $stylesheet = file_get_contents('assets/css/print.css'); // external css
    $pdf = new mPDF('th', 'A4', '0', 'thsarabunnew', 20, 15, 5, 30);
    $pdf->SetAutoFont(AUTOFONT_THAIVIET);
    $pdf->SetDisplayMode('fullpage');
    $pdf->WriteHTML($stylesheet,1);
    $pdf->WriteHtml($html, 2);
    $pdf->Output();
?>