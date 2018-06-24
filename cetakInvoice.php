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
		'margin_bottom' => 5,
		'format' => [215, 140]]);

	// $mpdf->SetDisplayMode('fullpage');

	$style = file_get_contents('dpenjualan/styleInvoice.css');

	$mpdf->WriteHTML($style,1);

	$mpdf->SetHTMLFooter('
		<table width="100%" style="vertical-align: bottom; font-family: serif; 
		    font-size: 8pt; color: #000000;">
		    <tr>
		        <td width="50%">{DATE j-m-Y}</td>
		        <td width="50%" align="right">Hal {PAGENO}/{nbpg}</td>
		    </tr>
		</table>','O');

	$mpdf->SetHTMLFooter('
		<table width="100%" style="vertical-align: bottom; font-family: serif; 
		    font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
		    <tr>
		        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Hal {PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right; ">{DATE j-m-Y}</td>
		    </tr>
		</table>', 'E');

	$mpdf->WriteHTML(file_get_contents('dpenjualan/invoice.php'));

	$mpdf->Output('InvoicePenjualan.pdf', 'I');
?>