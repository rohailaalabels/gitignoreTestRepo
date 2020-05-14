<head>
<meta charset="utf-8" />
</head>
<style>
body {
	width: 100%;
	background-color: #ffffff;
	margin: 0;
	padding: 20px 0;
	-webkit-font-smoothing: antialiased;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #687074;
}
table {
	border-collapse: collapse;
	background-color: #fff;
}
a {
	color: #00a9e0;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
 @media only screen and (max-width: 640px) {
body[yahoo] .deviceWidth {
	width: 440px!important;
	padding: 0;
}
body[yahoo] .center {
	text-align: center!important;
}
}
 @media only screen and (max-width: 479px) {
body[yahoo] .deviceWidth {
	width: 280px!important;
	padding: 0;
}
body[yahoo] .center {
	text-align: center!important;
}
}
.cart_table tr td {
	border: solid 1px #ebebeb;
	padding: 10px;
}
.cart_table th {
	border: 0;
	border-collapse: collapse;
	background: #17b1e3;
	color: #fff !important;
}
.cart_table th h4 {
	color: #fff !important;
}
.cart_table td {
	padding: 10px !important;
	border: 1px solid #ececec;
}
.cart_table tr:nth-child(even) {
	background: #fbfbfb;
}
</style>
<table width="632px" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Arial;">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><a href="https://www.aalabels.com/" style="padding:0 10px; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; text-decoration:none;">HOME</a> <a href="https://www.aalabels.com/aboutus/" style="padding:0 10px;; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; margin-left:5px; text-decoration:none;">ABOUT</a> <a href="https://www.aalabels.com/contact-us/" style="padding:0 10px; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; margin-left:5px; text-decoration:none;">CONTACT</a></td>
          <td align="right"><a href="http://www.aalabels.com/" style="text-decoration:none;"><img onerror='imgError(this);' src="http://www.aalabels.com/theme/site/images/logo.png" border="0" style="outline:0;" height="60px" /></a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td bgcolor="#17b1e3" align="center" style="padding: 40px 5px;"><h1 style="font-size: 32px;color: #fff;font-family: Arial, sans-serif;font-weight: normal;">UNSAVED DESIGNS</h1>
      <p style="font-size: 17px;color: #fff;font-family: Arial, sans-serif;font-weight: normal;"> Save your design and/or proceed to checkout
 </p></td>
  </tr>
  <tr>
    <td bgcolor="#e9e8e8" style="text-align: center;font-size: 15px;font-weight: bold;color: #006da4;padding: 8px;font-family: Arial, sans-serif;"> UNSAVED DESIGNS </td>
  </tr>
  
  
  
  
  
  <? foreach($cart_detail as $row){
	    $labeldata = $this->home_model->get_lba_one_labels_data($row->label_id);
	  
		if($labeldata['available_in'] == "both"){
		 $tcode = explode(",",$labeldata['association']);
		 $t_code = $tcode[0];
		}else{
		 $t_code = $labeldata['association'];
		}
		
		$productname = $this->home_model->get_db_column('category','CategoryName','CategoryID',$t_code);
		$temp = explode("-",$productname);
		$labeldata['size'] = trim(end($temp));
		$labeldata['size'] = str_replace('Roll Labels','',$labeldata['size']);
		$imgsrc = LABELER."thumb/".$labeldata['image'];
		
		$design_detail = $this->home_model->get_lba_designs($labeldata['Designid']);
		
		$complete_link = base_url()."home/continue_design?uid=".md5($row->ID).$interval_email;
	 ?>
     
    <tr>
    <td>
    <table width="100%" border="0">
  <tr>
    <td width="78px">
       <a href="<?=$complete_link?>" target="_blank">
        <img onerror='imgError(this);' style="padding-left: 13px;padding-top: 14px;padding-right:2px;" src="<?=$imgsrc?>" width="76" height="76" alt="Product Image" />
       </a>
    </td>
    <td style="font-size: 12px;color: #056da3;padding-top: 64px;text-decoration: underline;">
    <a href="<?=$complete_link?>" target="_blank"><?=$design_detail['description']?> 
    <br /><?=$labeldata['size']?> <?=ucfirst($labeldata['type'])?> Label </a></td>
  </tr>
</table>

    </td>
  </tr>
  
  <? } ?>
  
  
  
  <tr>
    <td><hr style="border: .5px solid #e9e8e8;" /></td>
  </tr>
  
  
  
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td style="font-size:12px; padding-bottom:5px;text-align:center"><p style="font-size: 13px;text-align: center;color: #222222;">We have received a system alert that you have either left our Free Label Design Templates page without saving your design, or without placing a saved design into the basket.
</p>
      <p style="font-size: 13px;text-align: center;color: #222222;">If you require assistance then please do not hesitate to contact our customer care team.</p>
      <p style="font-size: 13px;text-align: center;color: #222222;">Tel. 01733 588390<br />
        Email: <a style="color: #006ca2 !important;text-decoration: underline;">customercare@aalabels.com</a></p></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><img onerror='imgError(this);' src="http://www.aalabels.com/theme/site/images/email_banner2.jpg" width="100%" /></td>
  </tr>
  <tr>
    <td height="5px"></td>
  </tr>
  <tr>
    <td style="font-size:10px;">Disclaimer: This e-mail and attachments are intended for the above name(d) only and may contain information that is legally privileged. If you are not the intended recipient or have received this e-mail in error, please inform the sender by pressing the reply button, and delete the e-mail immediately afterwards. Any opinions expressed via e-mail are solely those of the individual and do not necessarily reflect those of AA Labels.</td>
  </tr>
  <tr>
    <td height="5px"></td>
  </tr>
  <tr>
    <td style="font-size:10px;">All e-mails are scanned for Viruses when sent, but AA Labels. do not take any legal responsibility for data lost as a result of opening or forwarding this e-mail, we recommend that the recipient takes any precautions they consider appropriate before opening e-mails.</td>
  </tr>
  <tr>
    <td height="5px"></td>
  </tr>
  <tr>
    <td style="font-size:10px;text-align:center">If you don't want to recieve abandoned cart notifications, you can <a href="<?=$unsubscribe_link?>" target="_blank">unsubscribe</a>.</td>
  </tr>
  <tr>
    <td height="5px"></td>
  </tr>
</table>
