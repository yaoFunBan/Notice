<?php

include './mpdf/mpdf.php';

$html_data = file_get_contents("print_form.php");
$html = substr($html_data, 12, strlen($html_data)-27);
$style_data = file_get_contents("assets/plugins/bootstrap/bootstrap.css");


$mpdf = new mPDF();
// Make it DOUBLE SIDED document
$mpdf->mirrorMargins = 1;

$mpdf->bleedMargin = 4;


$mpdf->h2toc = array(); 

$mpdf->WriteHTML($style_data, 1);
$mpdf->AddPageByArray(array('suppress' => 'on'));

$mpdf->WriteHTML($frontmatter_data, 2);

$mpdf->WriteHTML($html, 2);

//$mpdf->SetTitle("Title");
//$mpdf->SetAuthor("Author");
$mpdf->SetCreator("Booktype");

$mpdf->Output();

?>


