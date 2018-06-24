<?php

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$mpdf->useOddEven = 1;    // Use different Odd/Even headers and footers and mirror margins

// Define the Headers before writing anything so they appear on the first page
$mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    My document
</div>','O');
$mpdf->SetHTMLHeader('<div style="border-bottom: 1px solid #000000;">My document</div>','E');

$mpdf->SetHTMLFooter('
<table width="100%" style="vertical-align: bottom; font-family: serif; 
    font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">My document</td>
    </tr>
</table>');  // Note that the second parameter is optional : default = 'O' for ODD

$mpdf->SetHTMLFooter('
<table width="100%" style="vertical-align: bottom; font-family: serif; 
    font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
    <tr>
        <td width="33%"><span style="font-weight: bold; font-style: italic;">My document</span></td>
        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right; ">{DATE j-m-Y}</td>
    </tr>
</table>', 'E');

$mpdf->WriteHTML('Hello World');

$mpdf->Output();
