<?php //
include("./mpdf/mpdf.php");
include './conn.php';


$html_data = file_get_contents("print_form.php");
$html = substr($html_data, 30, strlen($html_data)-27);
$style_data = file_get_contents("./mpdf/print.css");


$mpdf = new mPDF('th', 'A4', '0', 'thsarabunnew', 20, 15, 30, 30);


$mpdf->WriteHTML($style_data, 1);
//$mpdf->WriteHTML($frontmatter_data, 2);

$mpdf->WriteHTML($html, 2);

$mpdf->Output();

?>


