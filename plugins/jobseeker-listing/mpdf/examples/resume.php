<?php


$html = '';
ob_start()?>


	<div class="left">
		left
	</div>
	<div class="right">
		<h1 class="heading-v-1"> personal statement </h1>
	</div>


<?php
$html .= ob_get_clean();

//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");
// $mpdf=new mPDF(); 
$mpdf=new mPDF('utf-8', array(459, 882), 0, '', 0, 0, 0, 0, 0, 0);
$stylesheet = file_get_contents('resume.css');
$mpdf->WriteHTML($stylesheet,1);
// $mpdfObj->SetFont('opensans');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>