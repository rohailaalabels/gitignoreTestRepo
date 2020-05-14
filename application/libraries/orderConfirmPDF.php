<?php
ini_set('memory_limit','3500M');
ob_start(); 
require_once('tcpdf/config/lang/eng.php');
		require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set some language-dependent strings
$pdf->setLanguageArray($l);
//$pdf->SetFont('verdana', '', 8);
// add a page
$pdf->AddPage();

//$pdf->Image('images/logo-top-1.jpg', 7, 20, 31, 8, '','','' ,false,50);
//==========Add LOGO Image================\\


$page_contents ='<style>
body
{
font-family:Arial, Helvetica, sans-serif;
}
</style><center>
<table cellspacing="0" cellpadding="0" width="550">
<tbody>
<tr>
<td>

<table width="550">
<tbody>
<tr>
<td colspan="2"><img alt="" src="http://www.aalabels.com/labels_ci/theme/images/logo.png"/> </td>
<td style=" FONT-SIZE: 14px;"><span style="color:#8DCBF0;"><br><br>Order Number: </span><B style="color:#153E54;">AA57687</B></td>
</tr>

<tr>
<td align="left" valign="top" style=" FONT-SIZE: 14px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" width="32.7%">

<table width="100%" border="0" cellspacing="0" cellpadding="2" style="color:#163E58;">
<tbody>
<tr>
<td align="left" style=" FONT-SIZE: 14px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">AA Labels,</td>
</tr>
<tr>
<td style=" FONT-SIZE: 14px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">Boongate</td>
</tr>
<tr>
<td style=" FONT-SIZE: 14px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">Fengate</td>
</tr>
<tr>
<td style=" FONT-SIZE: 14px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">Peterborough</td>
</tr>
<tr>
<td style=" FONT-SIZE: 14px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">PE1 5PA</td>
</tr>
</tbody>
</table>
</td>
<td align="right" valign="top" width="32.5%">
<table width="100%" border="0">
<tbody>
<tr>
<td height="10" align="right" style=" FONT-SIZE: 14px; color:#8DCBF0;">Phone:&nbsp;&nbsp; </td>
</tr>
<tr>
<td height="12" align="right"  style="FONT-SIZE:12px;color:#8DCBF0;">Email:</td>
</tr>
<tr>
<td height="10" align="right"  style="FONT-SIZE:12px;color:#8DCBF0;">VAT No:&nbsp;&nbsp; </td>
</tr>
</tbody>
</table>

</td>
<td align="left" valign="top" width="32.7%">
<table width="100%" border="0">
<tbody>
<tr>
<td height="10" align="left" style="FONT-SIZE:12px;color:#153E54;">&nbsp;&nbsp;01733 588 390</td>
</tr>
<tr>
<td height="12" align="left">
	<a href="mailto:customercare@aalabels.com" style=" font-size:12px; text-decoration:none;color:#153E54;">customercare@aalabels.com</a></td>
</tr>
<tr>
<td height="10" align="left" style="FONT-SIZE:12px;color:#153E54;">&nbsp;&nbsp;945 0286 20</td>
</tr>
</tbody>
</table>
</td>
</tr>






<tr>
<td valign="top" align="left" width="31%">

<table style="BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid;BORDER-BOTTOM: #cccccc 1px solid; HEIGHT: 300px" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="FONT-WEIGHT: bold; FONT-SIZE: 14px; padding-left:10px;COLOR: #FFF; HEIGHT: 8px; border-bottom:#CCCCCC 1px solid; BACKGROUND-COLOR: #3b95ca" align="left" colspan="2" background="#3b95ca"><br> &nbsp;&nbsp; Order Details </td>
</tr>



<tr>
<td width="50%" nowrap style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; height:10px; PADDING-BOTTOM: 0px;PADDING-TOP: 0px;  color:#173d56;">&nbsp;</td>
<td width="50%" style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; height:10px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; "> &nbsp;</td>
</tr>



<tr>
<td width="50%" nowrap style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; height:10px; PADDING-BOTTOM: 0px;PADDING-TOP: 0px;  color:#173d56;">&nbsp;&nbsp;<strong>Order Number:</strong></td>
<td width="50%" style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; height:10px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; ">AA57687</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; height:10px; PADDING-TOP: 0px;color:#173d56;">&nbsp;&nbsp;<strong>Order:</strong></td>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; height:10px; PADDING-TOP: 0px; "><p>Credit card</p></td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; height:10px; PADDING-TOP: 0px; color:#173d56;">&nbsp;&nbsp;<strong>Time:</strong></td>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; height:10px; PADDING-TOP: 0px; ">11:37 AM</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: height:10px; 0px; color:#173d56;">&nbsp;&nbsp;<strong>Date:</strong></td>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px; ">19/03/2013</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: height:10px; 0px;color:#173d56;">&nbsp;&nbsp;<strong>Order Type:</strong></td>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px; ">Pending processing</td>
</tr>

<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px;height:10px; "><strong> &nbsp;&nbsp; </strong></td>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px;"></td>
</tr>

</tbody>
</table>
</td>
<td valign="top" align="left" width="1.7%">&nbsp;</td>
<td valign="top" align="left" width="31%">

<table width="100%" style="BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid; BORDER-BOTTOM: #cccccc 1px solid; " cellspacing="0" cellpadding="0">
<tbody>

<tr>
<td height="8" align="left" style="FONT-WEIGHT: bold; FONT-SIZE: 14px; padding-left:10px;COLOR: #fff; HEIGHT:8px; border-bottom:#CCCCCC 1px solid; BACKGROUND-COLOR: #3b95ca" ><br> &nbsp;&nbsp; Billing Address </td>
</tr>

<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px; ">&nbsp;</td>
</tr>


<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px; "> &nbsp;&nbsp; Mr.&nbsp;Binish&nbsp;Kiran</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px; "> &nbsp;&nbsp; Nokia</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px;height:10px; "> &nbsp;&nbsp; Mughalpura&nbsp;Lahore</td>
</tr>
<tr>
<td style="PADDING-RIGHT:0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px;height:10px; "> &nbsp;&nbsp; Lahore&nbsp;abc</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px;"> &nbsp;&nbsp; PE1 5PW</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px;height:10px; "> &nbsp;&nbsp; UK</td>
</tr>
</tbody>
</table>
</td>
<td valign="top" align="left" width="1.7%">&nbsp;</td>
<td valign="top" align="left" width="32.7%">

<table width="100%" style="BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid;  BORDER-BOTTOM: #cccccc 1px solid; " cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="FONT-WEIGHT: bold; FONT-SIZE: 14px; padding-left:10px;COLOR: #fff; HEIGHT:8px; border-bottom:#CCCCCC 1px solid; BACKGROUND-COLOR: #3b95ca" align="left"><br> &nbsp;&nbsp; Delivery Address </td>
</tr>

<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px; ">&nbsp;</td>
</tr>

<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px; "> &nbsp;&nbsp; Mr.&nbsp;Binish&nbsp;Kiran</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px;"> &nbsp;&nbsp; Nokia</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px;"> &nbsp;&nbsp; Mughalpura&nbsp;Lahore</td>
</tr>
<tr>
<td style="PADDING-RIGHT:0px; PADDING-LEFT:10px; FONT-SIZE:11px; PADDING-BOTTOM:0px; PADDING-TOP: 0px; height:10px;"> &nbsp;&nbsp; Lahore&nbsp;abc</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px;"> &nbsp;&nbsp; PE1 5PW</td>
</tr>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; height:10px;"> &nbsp;&nbsp; UK</td>
</tr>
</tbody>
</table>

</td>
</tr>

</tbody>
</table>

<table width="550" height="20"><tr><td></td></tr></table>



<table width="98%" cellspacing="0" cellpadding="0" style="border:#CCCCCC 1px solid;">
<tbody><tr style="BACKGROUND-COLOR: #3B95CA; height:30px; color:#FFF;">
<td width="13%" style="PADDING-LEFT: 10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid;"><b>Product Code</b></td>
<td width="56%" style="PADDING-LEFT: 10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid;border-left:#CCCCCC 1px solid;"><b>Description</b></td>
<td width="13%" style="text-align:center; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;"><b>Unit Price</b></td>
<td width="8%" style="text-align:center; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;"><b>Qty</b></td>
<td width="10%" style="PADDING-LEFT: 10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">&nbsp;<b>Line total</b></td>
</tr> 
 
					<tr bgcolor="#F5F5F5" height="25">
						<td style="PADDING-LEFT: 10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid;">
							AAK008MOP
						</td>
						<td style="PADDING-LEFT: 10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid;border-left:#CCCCCC 1px solid;">
							Matt White Opaque - Permanent A4 Sheet Labels - 8 Address - 90 mm x 60 mm
						</td>
						<td style="text-align:center; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">
							£0.10
						</td>
						<td style="text-align:center; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">
							
							25000
						</td>
						<td style="PADDING-LEFT: 10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">
							&nbsp;£2524.76
						</td></tr>
							
<tr height="10px;" style="background-color:#FFFFFF">
<td colspan="2">&nbsp;</td>
<td align="right" colspan="2" bgcolor="#FFFFFF" style="PADDING-RIGHT:10px; FONT-SIZE:12px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">Delivery:&nbsp;</td>
<td bgcolor="#FFFFFF" style="PADDING-LEFT:10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">&nbsp;£4.17</td>
</tr>
<tr height="10px;" style="background-color:#FFFFFF">
<td colspan="2">&nbsp;</td>
<td align="right" colspan="2" bgcolor="#EEEEEE" style="PADDING-RIGHT:10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">Sub Total:&nbsp;</td>
<td bgcolor="#EEEEEE" style="PADDING-LEFT:10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">&nbsp;£2528.93</td>
</tr>
<tr height="10px;" style="background-color:#FFFFFF">
<td colspan="2">&nbsp;</td>
<td align="right" colspan="2" bgcolor="#FFFFFF" style="PADDING-RIGHT:10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">VAT @ 20.00%&nbsp;</td>
<td bgcolor="#FFFFFF" style="PADDING-LEFT:10px; FONT-SIZE: 14px; border-bottom:#CCCCCC 1px solid; border-left:#CCCCCC 1px solid;">&nbsp;£505.78</td>
</tr>
<tr height="10px;" style="background-color:#FFFFFF">
<td colspan="2" align="right" style="PADDING-RIGHT:10px; FONT-SIZE: 14px; color:#1c4865;"><strong>Paid by: Credit card</strong> &nbsp; &nbsp;</td>
<td align="right" colspan="2" bgcolor="#EEEEEE" style="PADDING-RIGHT:10px; FONT-SIZE: 14px; border-left:#CCCCCC 1px solid;"><b>Total:</b>&nbsp;</td>
<td bgcolor="#EEEEEE" style="PADDING-LEFT:10px; FONT-SIZE: 14px; border-left:#CCCCCC 1px solid;">&nbsp;<b>£3034.71</b></td>
</tr>
</tbody></table>




<table width="550" height="20"><tr><td></td></tr></table>




<table cellspacing="0" cellpadding="0" width="98%">
<tbody>
<tr>
<td style="PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 14px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">
	<p>&nbsp;</p>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody><tr>
<td align="left" style="padding-bottom:8px; LINE-HEIGHT:16px; FONT-SIZE: 14px;">
	Please note that our Free Delivery is a 3 - 5 working day service and the cut off time for next day orders is 3pm. Orders placed after 3pm will be despatched the next working day. </td>
</tr>
<tr>
<td align="left" style="padding-bottom:8px; LINE-HEIGHT:8px; FONT-SIZE: 14px;">
 If you have any queries about your order please contact us on the details above.
</td>
</tr>
<tr>
<td align="left" style="padding-bottom:12px; LINE-HEIGHT:8px; FONT-SIZE: 14px;">
 Thank you for your order
</td>
</tr>
<tr>
<td align="left" style="FONT-SIZE: 14px; color:#1D4868;">
 <p style="LINE-HEIGHT:8px; color:#1c4865; font-size:20px; font-weight:bold;">AA Labels team </p>
</td>
</tr>
</tbody></table>
 
</td>
</tr>
</tbody>
</table>






</td>
</tr>
</tbody>
</table>
</center>
';
ob_clean();
$pdfPhrase = $page_contents;
$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($pdfPhrase, true, 0, true, 0);
$pdf->lastPage();
//$pdf->SetProtection(array('print'));
$pdf->Output('pdfs/OrderConfirmation_'.$OrderNumber.'.pdf', 'D');