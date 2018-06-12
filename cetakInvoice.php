<?php
	require_once __DIR__ . '/vendor/autoload.php';
	// include("MPDF53/mpdf.php");
 
	// $mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
	 
	// $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
	         
	$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8',
		'margin_top' => 5,
		'margin_left' => 10,
		'margin_right' => 10, 
		'format' => [215, 140]]);

	// $mpdf->SetDisplayMode('fullpage');

	$style = file_get_contents('dpenjualan/styleInvoice.css');

	$mpdf->WriteHTML($style,1);

	$mpdf->WriteHTML(file_get_contents('dpenjualan/invoice.php'));

	$mpdf->Output('InvoicePenjualan.php', 'I');
?>