<div class="">
  <div class="container m-t-b-8 ">
    <div class="row">
      <div class="col-xs-12  col-sm-6 col-md-8 ">
        <ol class="breadcrumb  m0">
          <li><a href="https://www.aalabels.com/"><i class="fa fa-home"></i></a></li>
          <li class="active">Quotation Approval</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="row">
      <div class="col-xs-12  col-sm-12 col-md-12">
        <div class="thumbnail p-l-r-10">
          <div class="row" style="background-color: #17b1e3 ;font-size: 15px;color: #fff;font-weight: bold;margin-left: 2px;margin-right: 2px;padding: 6px;text-align: center;text-transform: uppercase;">
            <?=$title?>
          </div>
          <div class="row">
            <div class="col-md-4 col-xs-12" style="list-style: none;
    float: right;
    font-size: 15px;
    line-height: 1.7;
    margin-top: 6px;
    margin-bottom: 6px;">
              <li><strong>VAT No:</strong> GB 945 0286 20</li>
              <li><strong>Quotation Number:</strong>
                <?=$quotation[0]->QuotationNumber?>
              </li>
              <li><strong>Date & Time:</strong>
                <?= date('jS F Y',$quotation[0]->QuotationDate)?>
                <?=date('h:m:s',$quotation[0]->QuotationDate)?>
              </li>
            </div>
          </div>
          <div class="row" style="margin-left:7px;margin-right: 7px;">
            <h4 class="cblack">Dear Customer,</h4>
            <p class="text-justify">Thank you for your enquiry.</p>
            <p class="text-justify"> Please find attached our quotation for the labels required. If we can be of any further assistance or you require
              additional information, please do not hesitate to contact us. </p>
          </div>
          <div class="row" style="margin-left: 0px;margin-right: 0px;list-style:none;">
            <div class="col-md-6 col-xs-12">
              <h4 class="cBlue">Billing Address</h4>
              <li>
                <h4 class="cblack">
                  <?=$quotation[0]->BillingFirstName.' '.$quotation[0]->BillingLastName?>
                </h4>
              </li>
              <li>
                <?=$quotation[0]->BillingCompanyName?>
              </li>
              <li>
                <?=$quotation[0]->BillingAddress1?>
              </li>
              <li>
                <?=$quotation[0]->BillingAddress2?>
              </li>
              <li>
                <?=$quotation[0]->BillingPostcode?>
                ,
                <?=$quotation[0]->BillingCountyState?>
                .</li>
            </div>
            <div class="col-md-6 col-xs-12">
              <h4 class="cBlue">Delivery Address</h4>
              <li>
                <h4 class="cblack">
                  <?=$quotation[0]->DeliveryFirstName.' '.$quotation[0]->DeliveryLastName?>
                </h4>
              </li>
              <li>
                <?=$quotation[0]->DeliveryCompanyName?>
              </li>
              <li>
                <?=$quotation[0]->DeliveryAddress1?>
              </li>
              <li>
                <?=$quotation[0]->DeliveryAddress2?>
              </li>
              <li>
                <?=$quotation[0]->DeliveryPostcode?>
                ,
                <?=$quotation[0]->DeliveryCountyState?>
                .</li>
            </div>
          </div>
          <div class="m-t-10">
            <div class="table-responsive ">
              <table class="table table-bordered table-hover">
                <thead class="bgBlueHeading">
                  <tr>
                    <th class="text-center" style="border-right:1px solid #fff !important;" colspan="6" ><?=$mainTitle?></th>
                  </tr>
                </thead>
                <thead style="background-color: #e3e3e3; border: 1px solid black;">
                  <tr>
                    <th>PRODUCT</th>
                    <th class="text-center" style="border-right:1px solid #b9b9b9 !important;">DESCRIPTION</th>
                    <!--<th style="border-right:1px solid #b9b9b9 !important;">DESCRIPTION</th>-->
                    <th class="text-center" style="border-right:1px solid #b9b9b9 !important;">QUANTITY</th>
                    <th class="text-center" style="border-right:1px solid #b9b9b9 !important;">UNIT PRICE</th>
                    <th class="text-center" style="border-right:1px solid #b9b9b9 !important;">LINE TOTAL</th>
                    <th class="text-center" style="border-right:1px solid #b9b9b9 !important;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?
				$currency = (isset($_SESSION['currency']) and $_SESSION['currency'] != '') ? $_SESSION['currency'] : 'GBP';
                $symbol = (isset($_SESSION['symbol']) and $_SESSION['symbol'] != '') ? $_SESSION['symbol'] : '&pound;';
				$exchange_rate = $this->home_model->get_exchange_rate($currency);
				?>
             
			 
			 <?php
				$extPrice = 0;
				$sc  = 0;
				foreach ($quotationDetails as $key => $quotationDetail) {
					$extPrice = $extPrice + $quotationDetail->Price + $quotationDetail->Print_Total;
				?>
                
                
                   <tr>
                    <td class="text-center labels-form"><b>
                      <?= $quotationDetail->ManufactureID ?>
                      </b></td>
                    <td><?= $quotationDetail->ProductName ?></td>
                    <?php if($quotationDetail->Printing != 'Y'){?>
                    <td style="text-align:center"><?= $quotationDetail->Quantity ?>
                      
                      <input value="<?= $quotationDetail->Print_Type ?>" id="digital<?= $key ?>" type="hidden">
                      <input value="<?= $quotationDetail->Orientation ?>" id="Orientation<?= $key ?>" type="hidden">
                      <input value="<?= $quotationDetail->FinishType ?>" id="finish<?= $key ?>" type="hidden">
                      <input value="<?= $quotationDetail->FinishType ?>" id="wound<?= $key ?>" type="hidden">
                      <input value="<?= $quotationDetail->Print_Qty ?>" id="design<?= $key ?>" type="hidden">
                      <input value="<?= $quotationDetail->Printing ?>" id="printer<?= $key ?>" type="hidden">
                      <input value="<?= $quotationDetail->orignalQty ?>" id="totalLabels<?= $key ?>" type="hidden"></td>
                    <?php } else{?>
                    <td  style="text-align:center"><?= $quotationDetail->Quantity ?></td>
                    <?php } ?>
                    
                    
                    <td id="labels0"><?=$symbol?>
                      <?= number_format($quotationDetail->Price / $quotationDetail->Quantity,2,'.','')  ?></td>
                    <td><?= $symbol ?>
                      <?= number_format($quotationDetail->Price * $exchange_rate, 2,'.','') ?></td>
                    <td id="line_<?=$quotationDetail->SerialNumber?>" >
                    <? if($quotationDetail->active=="c" || $quotation[0]->QuotationStatus != 37){ echo "<a class='btn orange pull-right' style='width: 100%;'>Added</a>"; }else{ ?>    
                        
                    <a href="javascript:void(0);" class="btn orangeBg pull-right" onclick="SetQuotationToCart(<?=$quotationDetail->SerialNumber?>,'<?= $quotationDetail->ProductName ?>','<?= $quotationDetail->ProductID ?>','<?=$quotation[0]->UserID;?>','<?=$tm;?>','<?= $quotationDetail->Quantity ?>','<?= $quotationDetail->orignalQty ?>','<?= $quotation[0]->QuotationTotal ?>','<?=$dates?>','<?= $quotationDetail->LabelsPerRoll; ?>','<?= $quotationDetail->colorcode; ?>','<?= $quotationDetail->is_custom; ?>','<?= $quotationDetail->wound; ?>','<?=$quotationDetail->Printing; ?>','<?= $quotationDetail->Print_Total; ?>','<?= $quotationDetail->Print_Type; ?>','<?= $quotationDetail->FinishType; ?>','<?=$quotationDetail->Print_Design; ?>','<?= $quotationDetail->Print_Qty; ?>','<?= $quotationDetail->Free; ?>','<?= $quotation[0]->Source; ?>','<?=$quotationDetail->Orientation; ?>','<?=$quotationDetail->Price?>');">Add to Basket <i class="fa fa-calculator"></i></a>
                    <? } ?>
                    </td>
                  </tr>
                  <?php if($quotationDetail->Printing == 'Y'){?>
                  <tr>
                    <td class="text-center labels-form"></td>
                    <?php include(APPPATH . 'views/emails/generate_text_line.php'); ?>
                    <td style="text-align:center"><?= $quotationDetail->Print_Qty ?></td>
                    <td></td>
                    <td><?=$symbol?>
                      <?= $quotationDetail->Print_Total ?></td>
                    <td>---</td>
                  </tr>
                  <?php }?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="row ">
              <div class="col-md-8"> </div>
              <div class="col-md-2  text-left" style="list-style:none;font-weight:bold;line-height: 1.7;padding-left: 45px;">
                <li>DELIVERY :</li>
                <li>SUB-TOTAL :</li>
                <?php if($quotation[0]->vat_exempt == 'yes'){?>
                <li>VAT EXEMPT :</li>
                <?php } else {?>
                <li>VAT @ 20% :</li>
                <?php } ?>
                <li style="color:#fd4913;">GRAND TOTAL :</li>
              </div>
              <div class="col-md-2 pull-right text-right" style="list-style:none;font-weight:bold;line-height: 1.7;padding-right: 32px;">
                <?

$deliveryamount = $quotation[0]->QuotationShippingAmount /1.2;
$subtotal = $sc + $extPrice + $deliveryamount;
$grandfinaltotal = $subtotal * 1.2;
$vatvalue = $grandfinaltotal - $subtotal;

if($quotation[0]->vat_exempt == 'yes'){
 $grandfinaltotal = $subtotal;   
}
?>
                <li>
                  <?= $symbol ?>
                  <?= number_format($deliveryamount * $exchange_rate, 2,'.','') ?>
                </li>
                <li>
                  <?= $symbol ?>
                  <?=number_format($subtotal* $exchange_rate, 2,'.','');?>
                </li>
                <?php if($quotation[0]->vat_exempt == 'yes'){?>
                <li> -
                  <?=$symbol?>
                  <?php  echo number_format($vatvalue * $exchange_rate, 2,'.',''); ?>
                </li>
                <?php } else{?>
                <li>
                  <?=$symbol?>
                  <?php  echo number_format($vatvalue * $exchange_rate, 2,'.',''); ?>
                </li>
                <?php } ?>
                <li style="color:#fd4913;">
                  <?=$symbol?>
                  <?php  echo number_format($grandfinaltotal * $exchange_rate, 2,'.',''); ?>
                </li>
              </div>
            </div>
            <?php if($quotation[0]->vat_exempt == 'yes'){
                            $vat = 'Y';
                        }else{
                            $vat = 'N';
                        }

                        ?>
          
          <? if($quotation[0]->QuotationStatus == 37){ ?>
          
            <div class="row m-t-15">
              <div class="col-xs-3 col-sm-3 pull-right "> 
               
                <button type="button" onclick="ConvertAllQoutation('<?=$quotation[0]->QuotationNumber?>');"   class="btn orangeBg btn-block ">Add to Basket</button>
              </div>
              <div class="col-xs-3 col-sm-3 pull-right ">
                <button type="button" onclick="showDeclineNotePopUp()"  class="btn orangeBg btn-block compare_btn services-form">Decline with Notes</button>
              </div>
              <div class="col-xs-3 col-sm-3 pull-right ">
                <button type="button" id="activate-step-2" onclick="accept_pay('<?=$quotation[0]->QuotationNumber?>');" class="btn orange pull-right btn-block">Accept and Pay Later</button>
              </div>
              <!--                            <div   class="col-xs-3 col-sm-3 pull-right paypal_selection_box" id="paypal-button-checkout">--> 
              <!----> 
              <!--                            </div>--> 
              
            </div>
            
         <? } ?>   
            
            
          </div>
          <!-- /.row --> 
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-md" id="decline_with_note" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-md">
    <div class="modal-content blue-background">
      <div class="modal-header checklist-header" style="    border-bottom: 0px;">
        <div class="col-md-12">
          <h4 class="modal-title checklist-title" id="myLargeModalLabel" style="text-align: center;font-size: 20px;font-weight: bold;color: #333;">Decline Notes</h4>
          <p class="timeline-detail text-center">Please enter the notes here.</p>
        </div>
      </div>
      <div class="modal-body p-t-0">
        <div class="panel-body">
          <style>
                            .custom-die-input {
                                width: 97%;
                                border: 1px solid #cccccc;
                                border-radius: 4px;
                                height: 33px;
                                color: #666666;
                                margin-bottom: 4px;
                                padding-left: 6px;
                            }

                            .blue-text-field {
                                border: 1px solid #cccccc !important;
                                width: 97%;
                            }

                            .m-r-3 {
                                margin-right: 3%;
                            }
                        </style>
          <div class="col-12 no-padding">
            <input type="hidden" id="number" value="<?=$quotation[0]->QuotationNumber?>">
            <div class="divstyle" style="margin-bottom:5px;"><b class="label"></b>
              <input type="text" name="die_title" id="die_title" placeholder="Enter Title Here"
                                       class=" custom-die-input">
            </div>
          </div>
          <div class="col-12 no-padding" style="margin-bottom: 17px;">
            <textarea class="form-control blue-text-field" name="die_note" rows="5" id="die_note" placeholder="Enter Description Here"></textarea>
          </div>
          <div class="row"> <span>
            <button id="ad_nt" type="button" onclick="addDeclineNote()"
class="btn orangeBg btn-block compare_btn services-form" style="width: 25%;margin: 0% 38%;">Submit</button>
            </span></div>
        </div>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>


<script>
 function showDeclineNotePopUp(){
	$('#decline_with_note').modal('show');
}
		
		
function SetQuotationToCart(SerialNumber,ProductName,ProductID,UserID,tm,Quantity,orignalQty,TotalPrice,dates,LabelsPerRoll,colorcode,is_custom,wound,Printing,Print_Total,Print_Type,FinishType,Print_Design,Print_Qty,Free,source,orientation,price) {
swal({

title: "Are You Sure You want to Add Product in Basket?",
text: "",
type: "warning",
showCancelButton: true,
confirmButtonClass: "btn orangeBg",
confirmButtonText: "Yes",
cancelButtonClass: "btn blueBg",
cancelButtonText: "Cancel",
closeOnConfirm: true,
closeOnCancel: true
},
function(isConfirm) {
if (isConfirm) { 
 $.ajax({
	type: "post",
	url: base + "email/quotationToCart",
	data: {
	'SerialNumber': SerialNumber,
	'ProductID': ProductID,
	'UserID': UserID,
	'OrderTime': tm,
	'Quantity': Quantity,
	'orignalQty': orignalQty,
	'Price':price,
	'TotalPrice': TotalPrice,
	'OrderData': dates,
	'LabelsPerRoll': LabelsPerRoll,
	'colorcode': colorcode,
	'is_custom':is_custom,
	'wound': wound,
	'Printing': Printing,
	'Print_Total': Print_Total,
	'Print_Type': Print_Type,
	'FinishType': FinishType,
	'Print_Design': Print_Design,
	'Print_Qty': Print_Qty,
	'Free': Free,
	'source': source,
	'orientation': orientation

    },
    dataType: 'html',
     success: function (data) {
      $('#line_'+SerialNumber).html('<a class="btn orange pull-right" style="width: 100%;">Added</a>');     
	  swal(ProductName,'Added to basket Successfully','success');
	 
	 }
    });
    }
   }
  );
}

        
        function addDeclineNote(){
            var title = $('#die_title').val();
            var note = $('#die_note').val();
            var orderNumber =  $('#number').val();

            if(title == null || title ==""){
                show_faded_popover('die_title','please Add Title');
                return false;
            }

            if(note == null || note ==""){
                show_faded_popover('die_note','please Add Note'); 
                return false;
            }

            $.ajax({

                url: base+'email/addDeclineNote',
                type:"POST",
                async:"false",
                dataType: "html",
                data: {title:title,note:note,orderNumber:orderNumber},
                success: function(data){
				$('#decline_with_note').modal('hide');
				
				swal({

					title: "Quotation decline Successfully",
					text: "",
					type: "success",
					showCancelButton: true,
					confirmButtonClass: "btn orangeBg",
					confirmButtonText: "Yes"
				   },
					
					function(isConfirm) {
					if (isConfirm) { 
					  window.location = "https://www.aalabels.com/";
					  }
				    }	
	              );
		        }
             });
           }
  
  var timer = '';

  function show_faded_popover(_this, text){

		$(_this).attr('data-content','');

		$(_this).popover('hide');

		$(_this).popover('destroy');

		

		$(_this).popover({'placement':'top'});

		$(_this).attr('data-content',text);

		$(_this).popover('show');

		clearTimeout(timer);

		timer = setTimeout(function(){ 

				$(_this).attr('data-content','');

				$(_this).popover('hide');

				$(_this).popover('destroy');

		}, 5000);

}


function ConvertAllQoutation(id){
	
swal({
	title: "Are You Sure add to basket?",
	text: "",
	type: "warning",

	showCancelButton: true,
	confirmButtonClass: "btn orangeBg",
	confirmButtonText: "Yes",
	cancelButtonClass: "btn blueBg",
	cancelButtonText: "Cancel",
	closeOnConfirm: true,
	closeOnCancel: true
},

function(isConfirm) {

	if (isConfirm) {
		
		 $.ajax({
			type: "post",
			url: base + "email/ConvertAllQoutation",
			data: {
			'quotationid': id
			},
			dataType: 'html',
			success: function (data) {
			   swal({
				   title: "Success",
					text: "Add to basket Successfully.",
					type: "success",
					showCancelButton: true,
					confirmButtonClass: "btn orangeBg",
					confirmButtonText: "OK",
					},
					function(isConfirm) {
					 if(isConfirm) {
					   window.location = "https://www.aalabels.com/transactionregistration.php";
					  } 
					}
				  ); 
			 },
		  });
	   }
    }
   ); 
 }
 
 
function accept_pay(orderNumber){
			
			swal({
				title: 'Are you sure you want to Accept this Quotation?',
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn orangeBg",
				confirmButtonText: "Yes",
				
				closeOnConfirm: true,
				closeOnCancel: true
			},
				 function(isConfirm) {
				if(isConfirm){
					
					$.ajax({

						url: base+'email/accept_pay',
						type:"POST",
						async:"false",
						dataType: "html",
						data: {
								orderNumber:orderNumber
							  },

						success: function(data){
					
							swal({
								title: 'Quotation approved successfully?',
								type: "success",
								showCancelButton: true,
								confirmButtonClass: "btn orangeBg",
								confirmButtonText: "YES",
						
								closeOnConfirm: true,
								closeOnCancel: true
							},
								 function(isConfirm) {
								if (isConfirm) {
									window.location = "https://www.aalabels.com";		   
								} 
							});
						
		
						}
			
					});
				
				} 
			});
			
		}
 
 
 
</script> 
