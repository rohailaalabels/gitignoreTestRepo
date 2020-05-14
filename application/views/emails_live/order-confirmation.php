<table width="632px" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Arial;">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><a href="http://www.aalabels.com/" style="padding:0 10px; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; text-decoration:none;">HOME</a> <a href="http://www.aalabels.com/aboutus/" style="padding:0 10px;; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; margin-left:5px; text-decoration:none;">ABOUT</a> <a href="https://www.aalabels.com/contact-us/" style="padding:0 10px; line-height:30px; float:left; font-size:14px; font-weight:bold; background-color:#fd4913; color:#fff; text-align:center; margin-left:5px; text-decoration:none;">CONTACT</a></td>
          <td align="right"><a href="http://www.aalabels.com/" style="text-decoration:none;"><img onerror='imgError(this);' src="http://www.aalabels.com/theme/site/images/logo.png" border="0" style="outline:0;" height="60px" /></a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td bgcolor="#17b1e3" align="center" style="font-size:16px; font-weight:bold; color:#fff; padding:5px;">ORDER CONFIRMATION
      <?=$OrderInfo['OrderNumber']?></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td style="font-size:12px; padding-bottom:3px;" align="right"> VAT No. GB 945 0286 20 </td>
  </tr>
  <tr>
    <td style="font-size:12px; padding-bottom:3px;" align="right"> Order Number: <b style="color:#006da4;"><?php echo $OrderInfo['OrderNumber'];   ?></b></td>
  </tr>
  <tr>
    <td style="font-size:12px;" align="right"> Date & Time: <?php echo date('jS F Y', $OrderInfo['OrderDate']); ?> <?php echo date('h:i:s A', $OrderInfo['OrderTime']); ?></td>
  </tr>
  <tr>
    <td height="10px"></td>
  </tr>
  <tr>
    <td style="font-size:12px; padding-bottom:5px;">Dear
      <?=$OrderInfo['BillingFirstName'].' '.$OrderInfo['BillingLastName']?></td>
  </tr>
  <tr>
    <td style="font-size:12px; padding-bottom:10px;">Thank you for choosing to purchase from AA Labels. We confirm that your online order has been received and is being processed for production. </td>
  </tr>
  <tr>
    <td style="font-size:12px; padding-bottom:3px;">Your order details are as follows:</td>
  </tr>
  <tr>
    <td style="font-size:12px; color:#17b1e3; font-weight:bold">(Please note this is not a VAT invoice)</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="font-size:12px;"><b style="color:#006da4;">Billing Address</b><br>
            <strong >
            <?=$OrderInfo['BillingFirstName'].' '.$OrderInfo['BillingLastName']?>
            </strong><br>
            <?=$OrderInfo['BillingCompanyName']?>
            <br>
            <?=$OrderInfo['BillingAddress1']?>
            ,
            <?=$OrderInfo['BillingAddress2']?>
            , <br>
            <?=$OrderInfo['BillingTownCity']?>
            ,
            <?=$OrderInfo['BillingCountyState']?>
            , <br>
            <?=$OrderInfo['BillingPostcode']?>
            ,
            <?=$OrderInfo['BillingCountry']?>
            <br></td>
          <td style="font-size:12px;"><b style="color:#006da4;">Delivery Address</b><br>
            <strong >
            <?=$OrderInfo['DeliveryFirstName'].' '.$OrderInfo['DeliveryLastName']?>
            </strong><br>
            <?=$OrderInfo['DeliveryCompanyName']?>
            <br>
            <?=$OrderInfo['DeliveryAddress1']?>
            ,
            <?=$OrderInfo['DeliveryAddress2']?>
            , <br>
            <?=$OrderInfo['DeliveryTownCity']?>
            ,
            <?=$OrderInfo['DeliveryCountyState']?>
            , <br>
            <?=$OrderInfo['DeliveryPostcode']?>
            ,
            <?=$OrderInfo['DeliveryCountry']?>
            <br></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td style="font-size:14px; font-weight:bold; color:#fff; padding:5px;" bgcolor="#006da4" align="center">Order Details</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="5px">
        <tr>
          <td bgcolor="#e9e8e8" style="font-size:12px; font-weight:bold; color:#006da4; border:1px solid #b3b3b3; border-right:0;">Product Code </td>
          <td bgcolor="#e9e8e8" style="font-size:12px; font-weight:bold; color:#006da4; border:1px solid #b3b3b3; border-right:0;">Description </td>
          <td bgcolor="#e9e8e8" style="font-size:12px; font-weight:bold; color:#006da4; border:1px solid #b3b3b3; border-right:0;">Quantity </td>
          <td bgcolor="#e9e8e8" style="font-size:12px; font-weight:bold; color:#006da4; border:1px solid #b3b3b3; border-right:0;">Unit Price </td>
          <td bgcolor="#e9e8e8" style="font-size:12px; font-weight:bold; color:#006da4; border:1px solid #b3b3b3;">Line Total </td>
        </tr>
        <?
		   $OrderInfo['currency']  = (isset($OrderInfo['currency']) && $OrderInfo['currency']!='')?$OrderInfo['currency']:'GBP';
		   $exchange_rate   = (isset($OrderInfo['exchange_rate']) && $OrderInfo['exchange_rate']!=0)?$OrderInfo['exchange_rate']:1;
		   $symbol = $this->home_model->get_currecy_symbol($OrderInfo['currency']); 
		   if($exchange_rate==0){ $exchange_rate = 1;}
		  ?>
        <?    $total_exvat = 0; $total_invat = 0; $i = 0;
		 foreach ($OrderDetails as $AccountDetail){
		 
		 
		 $prodname = $AccountDetail->ProductName;
		 
		 if($AccountDetail->Printing=="Y"){
		   $AccountDetail->Price = $AccountDetail->Price+$AccountDetail->Print_Total;
		   $frprint = $this->home_model->get_printing_service_name($AccountDetail->Print_Type, $AccountDetail->regmark);
		   $prodname.= "- <b>Printing Service ( ".$frprint." )</b>";
		 }
		 
		
		 
		 $unitprice = $AccountDetail->Price/$AccountDetail->Quantity;
		 $price = $AccountDetail->Price;
		 $subcat+= $AccountDetail->Price;
		 
		 if($AccountDetail->ManufactureID=="PRL1"){
            $result = $this->home_model->get_details_roll_quotation($AccountDetail->Prl_id);
		    $prodname ='<b>Shape:</b> '.$result['shape'].' &nbsp;&nbsp;
						<b>Material:</b> '.$result['material'].' &nbsp;&nbsp;
						<b>Printing:</b> '.$result['printing'].' &nbsp;&nbsp;
						<b>Finishing:</b> '.$result['finishing'].' &nbsp;&nbsp;
						<b>No. Designs:</b> '.$result['no_designs'].' &nbsp;&nbsp;
						<b>No. Rolls:</b> '.$result['no_rolls'].' &nbsp;&nbsp;
						<b>No. labels:</b> '.$result['no_labels'].' &nbsp;&nbsp;
						<b>Core Size:</b> '.$result['coresize'].' &nbsp;&nbsp;
						<b>Wound:</b> '.$result['wound'].' &nbsp;&nbsp;
						<b>Notes:</b> '.$result['notes'].' &nbsp;&nbsp;';
		 }
		 
		  if($AccountDetail->ManufactureID=="SCO1"){
			  $custominfo = $this->home_model->fetch_custom_die_order($AccountDetail->SerialNumber);
              $prodname.=' -<b>Format:</b> '.$custominfo['format'].'&nbsp;&nbsp;  <b>Shape:</b> '.$custominfo['shape'].'&nbsp;&nbsp; <b>Width:</b> '.$custominfo['width'].' mm';
		                if($custominfo['shape']!="Circle"){
                           $prodname.='&nbsp;&nbsp; <b>Height:</b> '.$custominfo['height'].' mm&nbsp;&nbsp';
                        }  
		   $euridie = ($custominfo['iseuro']==1)?"Yes":"No";
           $prodname.='<b>No. labels / Die:</b> '.$custominfo['labels'].' &nbsp;&nbsp; <b>Euro Die:</b> '.$euridie;
		  }
		
  ?>
        <tr>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"><?=$AccountDetail->ManufactureID?></td>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"><?=$prodname?></td>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"><?=$AccountDetail->Quantity?></td>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"><?=symbol.number_format($unitprice*$exchange_rate,4)?></td>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-top:0; color:#fd4913;"><?=symbol.number_format($price*$exchange_rate,2,'.','')?></td>
        </tr>
        <?  if($AccountDetail->ManufactureID=="SCO1" && $AccountDetail->Linescompleted==0){
         $assoc = $this->home_model->fetch_custom_die_association($custominfo['ID']);
	   ?>
        <? foreach($assoc as $rowp){?>
        <tr>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"></td>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"><b>
            <?=$rowp->material?>
            </b> -
            <?=$this->home_model->get_mat_name($rowp->material);?>
            -
            <?=$rowp->labeltype?>
            Labels
            <?  if($rowp->labeltype=="printed"){ 
              echo ' - '.$rowp->printing.' - '.$rowp->designs.' Designs ';
              if($custominfo['format']=="Roll"){
                echo ' <br> with label finish '.$rowp->finish;
             }
         }?>
            <? if($custominfo['format']=="Roll"){
               echo ' - '.$rowp->rolllabels.' labels - core size '.$rowp->core.' mm - '.$rowp->wound.' wound';
             }
		?></td>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"><?=$rowp->qty?></td>
          <? $materialprice = $rowp->plainprice+$rowp->printprice; ?>
          <? $unitmaterialprice = $materialprice/$rowp->qty; ?>
          <? $subcat+= $materialprice; ?>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;"><?=symbol.number_format($unitmaterialprice*$exchange_rate,4)?></td>
          <td style="font-size:12px; border:1px solid #b3b3b3; border-top:0; color:#fd4913;"><?=symbol.number_format($materialprice*$exchange_rate,2,'.','')?></td>
        </tr>
        <? } ?>
        <? } ?>
        <? } ?>
      </table></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:12px;">
        <tr>
          <td align="right">Sub-Total:</td>
          <td style="color: #fd4913; padding-left:10px;" align="right"><?=symbol.number_format($subcat*$exchange_rate,2,'.','')?></td>
        </tr>
        <tr>
          <td height="5px"></td>
        </tr>
        <?  if($OrderInfo['voucherOfferd']=='Yes'){
				$voucherDiscount =  $this->home_model->currecy_converter($OrderInfo['voucherDiscount'],'no');
				$voucher_code = '<tr><td align="right">Discount:</td><td style="color: #006da4; padding-left:10px;" align="right">'.symbol.$voucherDiscount.'</td></tr>';
			}
			else{
			  $voucherDiscount = 0.00;
			  $voucher_code = '';
			}
			?>
        <?=$voucher_code?>
        <tr>
          <td height="5px"></td>
        </tr>
        <? $shipexvat = $OrderInfo['OrderShippingAmount']/1.2; ?>
        <tr>
          <td align="right">Delivery:</td>
          <td style="color: #006da4; padding-left:10px;" align="right"><?=symbol.number_format($shipexvat,2,'.','')?></td>
        </tr>
        <tr>
          <td height="5px"></td>
        </tr>
        <tr>
          <td height="5px"></td>
        </tr>
        <?
    $exvattotao = $shipexvat + $subcat; 
	$inctotal = $exvattotao *1.2; 
	
	if($voucherDiscount>0){
	 $inctotal = $inctotal - $voucherDiscount;
	}
	
	$vatcount =  $inctotal - $exvattotao;
    if($OrderInfo['vat_exempt']=='yes'){
        $inctotal =  $inctotal/1.2; 
		$vatcount = 0;
    }
  ?>
        <tr>
          <td align="right">VAT @ 20%:</td>
          <td style="color: #fd4913; padding-left:10px;" align="right"><?=symbol.number_format($vatcount,2,'.','')?></td>
        </tr>
        <tr>
        <tr>
          <td height="5px"></td>
        </tr>
        <td align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:12px;">
              <tr>
                <td  width="55%" align="right">Paid By:</td>
                <td style="color: #fd4913; padding-left:10px;"><?=$OrderInfo['PaymentMethods']?></td>
                <td align="right">Total:</td>
              </tr>
            </table></td>
          <td style="color: #fd4913; padding-left:10px;" align="right"><?=symbol.number_format($inctotal,2,'.','')?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td  style="font-size:12px; text-align:justify">Online orders are processed for production and delivery between Monday to Friday (excluding UK public holidays) and all deliveries are carried out by courier. If you have selected the free delivery option for your order it will be despatched and delivered within 3 to 5 working days (working days are defined as Monday to Friday, excluding weekends and UK public holidays) in the UK. If delivery is outside of the UK please refer to the link below.</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td  style="font-size:12px; text-align:justify">We currently deliver to addresses in the UK, Ireland and mainland Europe <a href="http://www.aalabels.com/delivery/" style="color:#006da4;">Delivery & Shipping</a> and a signature is required as proof of delivery/receipt. If you are unavailable when delivery is attempted a card will be left with information about further delivery arrangements, or collection. If you have provided a mobile telephone number you will also receive SMS texts regarding your delivery allowing you to communicate and change delivery arrangements with the courier company.</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td  style="font-size:12px; text-align:justify">If you have any questions regarding your order, then please do not hesitate to contact us quoting the  order reference number from the top of the page.</td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
        <tr>
          <td><b>Customer Care Team</b> Tel. 01733 588390</td>
          <td align="right">Email : <a style="color:#006da4;" href="mailto:customercare@aalabels.com">customercare@aalabels.com</a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="20px"></td>
  </tr>
  <tr>
    <td><img onerror='imgError(this);' src="http://www.aalabels.com/theme/site/images/email_banner.jpg" width="100%" /></td>
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
    <td style="font-size:12px;" align="center">23 Wainman Road, Peterborough PE2 7BU<br>
      www.aalabels.com</td>
  </tr>
</table>
