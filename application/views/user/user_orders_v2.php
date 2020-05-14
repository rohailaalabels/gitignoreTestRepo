<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Order History</li>
      </ol>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="panel">
      <div class="row">
        <div class="col-xs-7  col-sm-8 col-md-7">
          <div class="col-xs-12  col-sm-6 col-md-6 m-l-10 ">
            <h1> Order History</h1>
          </div>
        </div>
        <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
          <div class="pull-right"> <a role="button" class="btn orange pull-right" href="<?=base_url()?>shoppingcart.php"><i class="fa fa-shopping-cart faa-horizontal animated"></i> &nbsp; View Basket </a> </div>
        </div>
      </div>
    </div>
    
    <!-- Checkout --> 
    
    <!-- Order Form -->
    <div class=" thumbnail">
      <div >
        <div role="tabpanel" class="">
          <? include('user_menu.php')?>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="col-md-12 m-t-10">
                <? if(count($orders) > 0){
					//echo "<pre>";print_r($orders);echo"</pre>";
					foreach($orders as $rec){
			 		//echo "<pre>";print_r($rec);echo"</pre>";
						 if($rec->StatusTitle=='Completed'){
								$status_class = 'text-success'; 
						 }
						 else if($rec->StatusTitle=='Pending Payment'){
							$status_class = 'text-warning'; 
						 }
						 else if($rec->StatusTitle=='Pending processing'){
							$status_class = 'text-info'; 
						 }else{
							$status_class = 'text-danger'; 
						 }
			 
			
			 ?>
                <div class="" >
                  <div class="col-md-12 bg-info p-t-b-12">
                    <div class="<?php if($rec->OrderStatus == 7) {echo 'col-sm-4';}else{ echo 'col-sm-8';}?>"> <strong>Order #</strong>
                      <?=$rec->OrderNumber?>
                    </div>
                    <?php if($rec->OrderStatus == 7)
					{
					?>
                    <div class="col-sm-4">
                    	<img onerror='imgError(this);' src="<?=AURL?>theme/images/pdf.png"> <a href="<?=base_url()?>ajax/printOrder/<?=$rec->OrderNumber?>"><strong>Download Invoice</strong></a>
                    </div>
                    <?php
					}
					?>
                    <div class="col-md-4">
                      <div class="pull-right m-l-10"> <i class="fa fa-calendar "></i>&nbsp;
                        <?=date("d/m/y", $rec->OrderDate);?>
                      </div>
                      <div class=""> <i class="fa fa-circle <?=$status_class?> "></i>&nbsp;
                        <?=$rec->StatusTitle?>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive col-md-12 p0 border0">
                    <table class="table table-bordered table-hover ">
                      <thead class="">
                        <tr>
                          <th style="width:10%;">Code</th>
                          <th style="width:5%;">Image</th>
                          <th style="width:35%;">Description</th>
                          <th style="width:10%;">Qty</th>
                          <th style="width:15%;">Price</th>
                          <th style="width:15%;">Buy More Get More</th>
                        </tr>
                      </thead>
                      <tbody>
                        <? 
						$product_info = $this->user_model->get_order_product_record($rec->OrderNumber); 
						
						$rec->currency  = ($rec->currency)?$rec->currency:'GBP';
						$rec->exchange_rate  = ($rec->exchange_rate)?$rec->exchange_rate:1;
						
						
						//currency
						//exchange_rate
						
						$symbol = $this->home_model->get_currecy_symbol($rec->currency);
						$latest_rate = $this->home_model->get_exchange_rate($rec->currency);
						
						foreach($product_info as $product) {
							//echo"<pre>";print_r($product);echo"</pre>";
							$product->Price = $product->Price*$rec->exchange_rate;
							$product->Price = number_format(($product->Price),2,'.','');
							//$product->Price = $this->home_model->apply_currecy_rate($product->Price,'no');
							
							$product->Print_Total = $product->Print_Total*$rec->exchange_rate;
							$product->Print_Total = number_format(($product->Print_Total),2,'.','');
							
							$details = $this->user_model->get_product_details($product->ProductID);
							//echo"<pre>";print_r($details);echo"</pre>";
							//new code
							$details['Image1'] = str_replace(".gif",".png",$details['Image1']);
							$path = Assets.'images/material_images/'.$details['Image1'];
							$img_class = 'img-circle';
							$img_width = '25';
							$product_type = 'Sheets';
							
							$priceFrom = '';
							$print_type = '';
							$print_type = $product->Print_Type;
							
							if(preg_match("/Application Labels/i",$details['ProductBrand'])){
								 $min_qty = '1';
								 $max_qty = '50000';
									 $colorcode = (isset($product->colorcode) and $product->colorcode!='')?'-'.$product->colorcode:'';
                                                                 $designcode = substr($details['ManufactureID'], -4);
								 $path = Assets."images/application/design/".$designcode. $colorcode.'.png';
								 $img_class = ''; 
								 $img_width = '60';
								 $product_type = 'Application';
							}
                            else if(preg_match("/A3/i",$details['ProductBrand'])){
								 $min_qty = '100';
								 $max_qty = '50000';
														}
							else if(preg_match("/SRA3/i",$details['ProductBrand'])){
									$min_qty = '100';
								    $max_qty = '20000';
							}
							else if(preg_match("/Roll Labels/i",$details['ProductBrand'])){
								
									$min_qty = $this->home_model->min_qty_roll($details['ManufactureID']); 
		            				$max_qty = $this->home_model->max_qty_roll($details['ManufactureID']); 
									if($product->is_custom=='Yes'){
										$details['LabelsPerSheet'] =  $product->LabelsPerRoll;
							}
							$product_type = 'Rolls';
							
							if($product->Printing=='Y'){
								$artworks = $this->home_model->get_attached_atworks_for_order($rec->OrderNumber, $product->ProductID);
						 if(count($artworks) > 0){
							 $i = 0;
                               foreach($artworks as $upload){
								   $i++;
                                  if(preg_match("/.pdf/is",$upload->file)){
								  	 	  $artworkpath = AJAXURL.'theme/site/images/pdf.png';
										  $width_img = '';	
								   }
								   else if(preg_match("/.doc/is",$upload->file) || preg_match("/.docx/is",$upload->file)){
								  	 	   $artworkpath = AJAXURL.'theme/site/images/doc.png';
										   $width_img = '';	
								   }else{
								  		  $artworkpath = AJAXURL.'theme/integrated_attach/'.$upload->file;
										  $width_img = '';	
								   }
                      		 }
                           }
					 
			   		
					
					}
					
					if($product->Printing == "Y")
					{
						$collection['labels'] 	  = $details['LabelsPerSheet']*$product->Quantity; 
						$collection['manufature'] = $product->ManufactureID;
						$collection['finish']     = $product->FinishType; //
						$collection['rolls']      = $product->Quantity; 
						
						$price_res = $this->home_model->calculate_printing_price($collection);
						
						$latest_price =$price_res['final_price'];
						
						if($collection['finish'] == 'Fullcolour+White'){
						//if($labeltype == 'Fullcolour+White'){
							$latest_price = (1.1)*$latest_price;  //full colour +white increase 10% 
						}
						
						$latest_price = number_format(($latest_price*$latest_rate),2,'.','');
					}
					else
					{
						$latest_price = $this->home_model->calclateprice($details['ManufactureID'],$product->Quantity,$details['LabelsPerSheet']);
							$latest_price = $latest_price['final_price'];
							
							$latest_price = number_format(($latest_price*$latest_rate),2,'.','');
					}
							
							
							if($latest_price!=$product->Price){
								$cost_per_label = round(($latest_price/($product->Quantity*$details['LabelsPerSheet']))*100,2); 
								$priceFrom = 'The latest price is '.$symbol.$latest_price.' for  '.$product->Quantity.' Rolls, cost per label '.$cost_per_label.' pence';	
							}
									
									
								
							}
							else if(preg_match("/Integrated/is",$details['ProductBrand'])){
									$min_qty = $this->home_model->min_qty_integrated($details['ManufactureID']); 
		            				$max_qty = $this->home_model->max_qty_integrated($details['ManufactureID']);
									$price = $this->home_model->single_box_price($details['ManufactureID'],$product->Quantity);
									if(preg_match("/Printed/is",$product->Print_Type)){
										$printprice = $this->home_model->calculate_printed_sheets($product->Quantity, 'Fullcolour');
										$latest_price =   $printprice['price']+$price['PlainPrice'];
										$print_type ='Printed';
									}
									else if(preg_match("/Black/is",$product->Print_Type)){
										$printprice = $this->home_model->calculate_printed_sheets($product->Quantity, 'Mono');
										$latest_price = $printprice['price']+$price['PlainPrice'];
										$print_type ='Black'; 
									}
									else{
										$latest_price = $price['PlainPrice'];
										$print_type ='Plain';
									}
							
									$product_type = 'Integrated'; 
									//echo $product->Print_Type;
									
							$latest_price = number_format(($latest_price*$latest_rate),2,'.','');
							
									
							if($latest_price!=$product->Price){
								$cost_per_label = round(($latest_price/($product->Quantity*$details['LabelsPerSheet']))*100,2); 
								$priceFrom = 'The latest price is '.$symbol.$latest_price.' for  '.$product->Quantity.' sheets, cost per label '.$cost_per_label.' pence';	
							}
						}
							else{
								
								
								$upd_qty = $product->Quantity;
								
								
								if(substr($details['ManufactureID'],-2,2)=='XS'){
										$min_qty = '5';
										$max_qty = '100';
										$product_type = 'xmass'; 
										$disable = true;
								}else{
									
									if(preg_match("/PETC/",$details['ManufactureID']) || preg_match("/PETH/",$details['ManufactureID']) || preg_match("/PVUD/",$details['ManufactureID']) ){
											$min_qty = '25';
								  			$max_qty = '5000';
								  
									}else{
											$min_qty = '25';
											$max_qty = '50000';
									}


									if($min_qty > $product->Quantity){
										$upd_qty = 25;
									}
									//new code
									if($product->Printing=='Y' && $product->source=='flash'){
								     $upd_qty = 1;
								    }
								}
								
							$latest_price = $this->product_model->ajax_price($upd_qty,$details['ManufactureID']); 
							$latest_price = $latest_price['custom_price'];	
								
							$latest_price = number_format(($latest_price*$latest_rate),2,'.','');
							
							if($latest_price!=$product->Price){
								$cost_per_label = round(($latest_price/($product->Quantity*$details['LabelsPerSheet']))*100,2); 
								$priceFrom = 'The latest price is '.$symbol.$latest_price.' for  '.$upd_qty.' sheets, cost per label '.$cost_per_label.' pence';	
							}
						}
						//new code
						 $plabeltype ='';$print_source =''; $printing = 'plain';
					     if($product->Printing=='Y' && $product->source=='flash'){
						    $files = $this->home_model->get_integrated_attachments($product->SerialNumber);
							$path = AJAXURL.'/designer/media/thumb/'.$files['Thumb'];		  
							$min_qty = '1';
							$max_qty = '50000';
							$plabeltype = $product->Print_Type; 
							$print_source = 'flash';
							$printing = $plabeltype;
						    
						 }
						 
							//$details['Image1'] = str_replace(".gif",".png",$details['Image1']);
							$total_labels = $product->Quantity*$details['LabelsPerSheet'];
							$cost_per = number_format(($product->Price/$total_labels),2,'.',''); 
						?>
                      <input type="hidden"  id="labels_p_sheet<?=$product->SerialNumber?>"  value="<?=$details['LabelsPerSheet']?>"  />
                      <input type="hidden"  id="Quantity_<?=$product->SerialNumber?>"  value="<?=$product->Quantity?>"  />
                      <input type="hidden"  id="min_qty<?=$product->SerialNumber?>"  value="<?=$min_qty?>"  />
                      <input type="hidden"  id="max_qty<?=$product->SerialNumber?>"  value="<?=$max_qty?>"  />
                      <input type="hidden"  id="product_type<?=$product->SerialNumber?>"  value="<?=$product_type?>"  />
                      <input type="hidden"  id="prd_id<?=$product->SerialNumber?>"  value="<?=$product->ProductID?>"  />
                      <input type="hidden"  id="print_type<?=$product->SerialNumber?>"  value="<?=$print_type?>"  />
                      <input type="hidden"  id="colorcode<?=$product->SerialNumber?>"  value="<?=@str_replace("-","",$colorcode)?>"  />
                      <input type="hidden"  id="labeltype<?=$product->SerialNumber?>"  value="<?=$plabeltype?>"  />
                      <input type="hidden"  id="source<?=$product->SerialNumber?>"  value="<?=$print_source?>"  />
                      <input type="hidden"  id="orderNum_<?=$product->SerialNumber?>"  value="<?=$rec->OrderNumber?>"  />
                     <tr>
                        <td style="text-align:center;"><?=$details['ManufactureID']?></td>
                        <td style="text-align:center;"><img onerror='imgError(this);' class="<?=$img_class?>" src="<?=$path?>" width="<?=$img_width?>" height=""></td>
                        <td><div id="prd_name<?=$product->SerialNumber?>"><?=$product->ProductName;?></div>
                          <?php if($product->Printing=='Y'){
						$artworks = $this->home_model->get_attached_atworks_for_order($rec->OrderNumber, $product->ProductID);
						if(count($artworks) > 0){?>
                          <hr style="border-top:1px solid #dadada">
                          <p><strong><?=$this->home_model->get_printing_service_name($product->Print_Type);?></strong></p>
                          <br />
                          <?php
						  }
						 if(count($artworks) > 0){
                               foreach($artworks as $upload){
                                  if(preg_match("/.pdf/is",$upload->file)){
								  	 	  $artworkpath = AJAXURL.'theme/site/images/pdf.png';
										  $width_img = '';	
								   }
								   else if(preg_match("/.doc/is",$upload->file) || preg_match("/.docx/is",$upload->file)){
								  	 	   $artworkpath = AJAXURL.'theme/site/images/doc.png';
										   $width_img = '';	
								   }else{
								  		  $artworkpath = AJAXURL.'theme/integrated_attach/'.$upload->file;
										  $width_img = '';	
								   }
								   
								   
                               
                               ?>
                          <div class="col-xs-2 col-sm-2 col-md-2 "> <img onerror='imgError(this);' class="img-responsive" src="<?=$artworkpath?>" height="50" width="">
                            <p class="ellipsis"><small>Labels:</small> <small>
                              <?=$upload->labels?>
                              </small></p>
                          </div>
                          <? }
                           }
					 
			   		}
					?></td>
                        <td style="text-align:center;"><div class="labels-form ">
                            <? 
							if(preg_match("/Roll Labels/i",$details['ProductBrand']) && $product->Printing =="Y"){
								$designs = ($product->Print_Qty > 1)?'Designs':' Design';
								echo $details['LabelsPerSheet']*$product->Quantity . " Labels" . "<br>(" . $product->Quantity . " Rolls) <br>"; if($product->Print_Qty > 0){echo $product->Print_Qty . ' ' . $designs;}
							
							?>
                            <label class="input">
                              <input class="allownumeric" style="display:none" type="text" onkeyup="update_show('<?=$product->SerialNumber?>','<?=$product->Quantity?>');" 
                                      id="sheet_qty_<?=$product->SerialNumber?>" placeholder="<?=$min_qty?>+" value="<?=$product->Quantity;?>" name="qty">
                            </label>
                            <?php
							}
							else if(preg_match("/A4 Labels/i", $details['ProductBrand']) && $product->Printing =="Y"){
								$designs = ($product->Print_Qty > 1)?'Designs':' Design';
								echo $details['LabelsPerSheet']*$product->Quantity . " Labels" . "<br>(" . $product->Quantity . " Sheets) <br>"; if($product->Print_Qty > 0){echo $product->Print_Qty . ' ' . $designs;}
							?>
                            <label class="input">
                              <input class="allownumeric" style="display:none" type="text" onkeyup="update_show('<?=$product->SerialNumber?>','<?=$product->Quantity?>');" 
                                      id="sheet_qty_<?=$product->SerialNumber?>" placeholder="<?=$min_qty?>+" value="<?=$product->Quantity;?>" name="qty">
                            </label>
                            <?php
							}
							else if(preg_match("/A3 Label/i", $details['ProductBrand']) && $product->Printing =="Y"){
								$designs = ($product->Print_Qty > 1)?'Designs':' Design';
								echo $details['LabelsPerSheet']*$product->Quantity . " Labels" . "<br>(" . $product->Quantity . " Sheets) <br>"; if($product->Print_Qty > 0){echo $product->Print_Qty . ' ' . $designs;}
							?>
                            <label class="input">
                              <input class="allownumeric" style="display:none" type="text" onkeyup="update_show('<?=$product->SerialNumber?>','<?=$product->Quantity?>');" 
                                      id="sheet_qty_<?=$product->SerialNumber?>" placeholder="<?=$min_qty?>+" value="<?=$product->Quantity;?>" name="qty">
                            </label>
                            <?php
							}
							else if(preg_match("/Integrated Labels/i", $details['ProductBrand']) && $product->Printing =="Y"){
								$designs = ($product->Print_Qty > 1)?'Designs':' Design';
								echo $details['LabelsPerSheet']*$product->Quantity . " Labels" . "<br>(" . $product->Quantity . " Sheets) <br>"; if($product->Print_Qty > 0){echo $product->Print_Qty . ' ' . $designs;}
							?>
                            <label class="input">
                              <input class="allownumeric" style="display:none" type="text" onkeyup="update_show('<?=$product->SerialNumber?>','<?=$product->Quantity?>');" 
                                      id="sheet_qty_<?=$product->SerialNumber?>" placeholder="<?=$min_qty?>+" value="<?=$product->Quantity;?>" name="qty">
                            </label>
                            <?php
							}
							else if(substr($details['ManufactureID'],-2,2)=='XS'){ ?>
                            <label class="select">
                              <select onchange="update_show('<?=$product->SerialNumber?>','<?=$product->Quantity?>');" 
                                      id="sheet_qty_<?=$product->SerialNumber?>" class="" name="width">
                                <option <?=($product->Quantity==5)?'selected="selected"':''?>  value="5">5 </option>
                                <option <?=($product->Quantity==10)?'selected="selected"':''?> value="10">10</option>
                                <option <?=($product->Quantity==15)?'selected="selected"':''?> value="15">15</option>
                                <option <?=($product->Quantity==20)?'selected="selected"':''?> value="20">20</option>
                                <option <?=($product->Quantity==25)?'selected="selected"':''?> value="25">25</option>
                                <option <?=($product->Quantity==50)?'selected="selected"':''?> value="50">50</option>
                                <option <?=($product->Quantity==75)?'selected="selected"':''?> value="75">75</option>
                                <option <?=($product->Quantity==100)?'selected="selected"':''?> value="100">100</option>
                              </select>
                              <i></i> </label>
                            <? }
								else
								{								
							?>
                            <label class="input">
                              <input class="allownumeric" style="width:100px;" type="text" onkeyup="update_show('<?=$product->SerialNumber?>','<?=$product->Quantity?>');" 
                                  id="sheet_qty_<?=$product->SerialNumber?>" placeholder="25+" value="<?=$product->Quantity;?>" name="qty">
                            </label>
                            <? } 
							
							?>
                          </div>
                          <a href="javascript:void(0);" onclick="calculate_sheet_price('<?=$product->SerialNumber?>','<?=$details['ManufactureID']?>','<?=$printing?>');"
                           id="update_btn<?=$product->SerialNumber?>" style="display:none;" class="clear_b" > <i class="fa fa-refresh"></i> Update </a></td>
                        <td style="text-align:center;"><p id="price_<?=$product->SerialNumber?>"><strong>
                            <?  //new code
							   if($product->Printing=='Y'){
							   $price = number_format(($product->Price+$product->Print_Total),2,'.','');
							     echo $symbol.$price; 
                               }else{
							     echo $symbol.$product->Price;
							   } 
							?>
                            </strong></p>
                          <? if($product->Printing=='Y' && $product->source!='flash'){?>
                          <div> <a  <? if($priceFrom){?> data-toggle="tooltip" data-placement="left" title="<?=$priceFrom?>" <? }?>
                                href="javascript:void(0);" onclick="add_item_reorder('<?=$product->SerialNumber?>','<?=$details['ManufactureID']?>');" > <i class="fa fa-shopping-cart"></i> Add to Cart </a> </div>
                          <? } else if($product->Printing=='Y' && $product->source=='flash'){?>
                          <div> <a  <? if($priceFrom){?> data-toggle="tooltip" data-placement="left" title="<?=$priceFrom?>" <? }?> href="javascript:void(0);" onclick="add_integrated_line('<?=$product->SerialNumber?>','<?=$details['ManufactureID']?>');" > <i class="fa fa-shopping-cart"></i> Add to Cart </a> </div>
                          <? }else{ ?>
                          <div> <a <? if($priceFrom){?> data-toggle="tooltip" data-placement="left" title="<?=$priceFrom?>" <? }?>
                                     href="javascript:void(0);" onclick="add_item('<?=$product->SerialNumber?>','<?=$details['ManufactureID']?>');" > <i class="fa fa-shopping-cart"></i> Add to Cart </a> </div>
                          <? }?></td>
                        <td><div id="save_text<?=$product->SerialNumber?>">
                            <?=$product->Quantity?>
                            <?=$product_type?>
                            /
                            <?=$total_labels?>
                            Labels
                            <?=$symbol.$product->Price;?>
                            (cost per label
                            <?=$symbol.$cost_per?>
                            ) </div></td>
                      </tr>
                      <? } ?>
                        </tbody>
                      
                    </table>
                  </div>
                </div>
                <? } }else{?>
                <div class="col-md-12 bg-info p-t-b-12">
                  <h4 style="text-align:center;">No order found in your account</h4>
                </div>
                <? } ?>
                <div class=" col-md-12 text-center">
                  <nav>
                    <ul class="pagination ">
                      <?=$links?>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade layout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md ">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
        <h4 id="myModalLabel" class="modal-title">Sorry this product is discontinued. <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
      </div>
      <div class="col-md-12">
        <p></p>
        <p>We have discontinued this product due to supply issues. We are sure we will have an alternative product that could be suitable for your application. </p>
        <p>Please call our customer care team on 01733 588390 or choose from over 40 different materials. <a id="alter_link" href="#">Click Here</a> </p>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
      </div>
    </div>
  </div>
</div>
<script>

$(function () {
	
  $('[data-toggle="tooltip"]').tooltip()
})


function update_show(id,val){
   
	var qty = $('#sheet_qty_'+id).val();
    if(qty != val){
			$("#update_btn"+id).show();
    }else{
        	$("#update_btn"+id).hide();
	}
	

}	
function calculate_sheet_price(id,menuid,line_type){
	
		var qty = $('#sheet_qty_'+id).val();
		var labels = $('#labels_p_sheet'+id).val();
		var min_qty = parseInt($('#min_qty'+id).val());
		var max_qty = parseInt($('#max_qty'+id).val());
		var print_type = $('#print_type'+id).val();
		
		var prd_id = $('#prd_id'+id).val();
		var type = $('#product_type'+id).val();
					
		if(qty < min_qty || qty > max_qty){
				alert_box('Please enter quantity from '+min_qty+' to '+max_qty);
				$('#sheet_qty_'+id).focus();
				return false;
		}
		else if(type=='Rolls' && qty%min_qty != 0){
				if(qty%min_qty != 0){
						var multipyer = min_qty * parseInt(parseInt(qty/min_qty)+1);
						
						console.log(multipyer+' max '+max_qty);
						if(multipyer > max_qty) {
							multipyer = max_qty;
						}
						$('#sheet_qty_'+id).val(multipyer);
						
				}
			
				alert_box("Sorry, these labels are only available in sets of "+min_qty+" rolls. ");
				$('#sheet_qty_'+id).focus();
				return false;
			
		}
		else if(type=='Integrated' && qty%min_qty != 0){
				if(qty%min_qty != 0){
						var multipyer = min_qty * parseInt(parseInt(qty/min_qty)+1);
						
						console.log(multipyer+' max '+max_qty);
						if(multipyer > max_qty) {
							multipyer = max_qty;
						}
						$('#sheet_qty_'+id).val(multipyer);
						
				}
			
				alert_box("Sorry, these labels are only available in sets of "+min_qty+" sheets pack. ");
				$('#sheet_qty_'+id).focus();
				return false;
			
		}
		else{
		
			
		 $.ajax({
				url: base+'ajax/calculate_user_price',
				type:"POST",
				async:"false",
				dataType: "html",
				data: {  qty: qty,menuid: menuid,prd_id: prd_id,labels:labels,type:type,print_type:print_type,line_type:line_type},
				success: function(data){
				if(!data==''){	
					data = $.parseJSON(data); 
					if(data.response=='yes'){
							$('#update_btn'+id).hide();
						    var text = qty+' '+type+' / '+data.total_labels+' Labels '+data.symbol+data.price+' (cost per label '+data.symbol+data.labelprice+' )';
							$('#save_text'+id).html(text);
							$('#price_'+id).html('<strong> '+data.symbol+data.price+' '+data.vatoption+'.Vat</strong>');
							
					}
					else if(data.deactive=='yes'){
						$('#alter_link').attr('href',data.url);
						$('.layout').modal('show');
						
					}
					
					}
				 }  
			});
	}
}


     function add_integrated_line(serial,menuid){
		 
	      $.ajax({
				url: base+'ajax/add_integrated_line',
				type:"POST",
				async:"false",
				dataType: "html",
				data: {serial:serial},
				success: function(data){
				if(!data==''){	
					data = $.parseJSON(data); 
					if(data.response=='yes'){
					   add_item(serial,menuid);
					}
			    }
			}  
		});
	  }

function add_item(id,menuid){
	
		var qty = $('#sheet_qty_'+id).val();
		var labels = $('#labels_p_sheet'+id).val();
		var min_qty = parseInt($('#min_qty'+id).val());
		var max_qty = parseInt($('#max_qty'+id).val());
		var prd_id = $('#prd_id'+id).val();
		var type = $('#product_type'+id).val();
		var prd_name = $('#prd_name'+id).text();
		var print_type = $('#print_type'+id).val();
		
		var labeltype = $('#labeltype'+id).val();
		var source = $('#source'+id).val();
		var colorcode = $('#colorcode'+id).val();
		
		if(qty < min_qty || qty > max_qty){
				alert_box('Please enter quantity from '+min_qty+' to '+max_qty);
				$('#sheet_qty_'+id).focus();
				return false;
		}
		else if(type=='Rolls' && qty%min_qty != 0){
				if(qty%min_qty != 0){
						var multipyer = min_qty * parseInt(parseInt(qty/min_qty)+1);
						if(multipyer > max_qty) {
							multipyer = max_qty;
						}
						$('#sheet_qty_'+id).val(multipyer);
				}
				
				
			
				alert_box("Sorry, these labels are only available in sets of "+min_qty+" rolls. ");
				$('#sheet_qty_'+id).focus();
				return false;
			
		}
		else if(type=='Integrated' && qty%min_qty != 0){
				if(qty%min_qty != 0){
						var multipyer = min_qty * parseInt(parseInt(qty/min_qty)+1);
						
						console.log(multipyer+' max '+max_qty);
						if(multipyer > max_qty) {
							multipyer = max_qty;
						}
						$('#sheet_qty_'+id).val(multipyer);
						
				}
			
				alert_box("Sorry, these labels are only available in sets of "+min_qty+" sheets pack. ");
				$('#sheet_qty_'+id).focus();
				return false;
			
		}
		else{
			
					 $.ajax({
						url: base+'ajax/add_to_cart',
						type:"POST",
						async:"false",
						dataType: "html",
						data: {  qty: qty,menuid: menuid,prd_id: prd_id,labels:labels,type:type,print_type:print_type,colour:colorcode,labeltype:labeltype,source:source},
						success: function(data){
						if(!data==''){	
								data = $.parseJSON(data);
								//console.log(data); 
								if(data.response=='yes'){
											popup_messages(menuid+' - '+prd_name);
											$('#cart').html(data.top_cart);
								}
								else if(data.deactive=='yes'){
									$('#alter_link').attr('href',data.url);
									$('.layout').modal('show');
								}
							}
						 }  
					});
		}
}

function add_item_reorder(id,menuid)
{
	var qty = $('#Quantity_'+id).val();
	var min_qty = parseInt($('#min_qty'+id).val());
	var max_qty = parseInt($('#max_qty'+id).val());
	var orderNum = $('#orderNum_'+id).val();
	var type = $('#producType_'+id).val();
	var prd_name = $('#prd_name'+id).text();
	if(qty < min_qty || qty > max_qty){
			alert_box('Please enter quantity from '+min_qty+' to '+max_qty);
			$('#sheet_qty_'+id).focus();
			return false;
	}
	else if(type=='Rolls' && qty%min_qty != 0){
			if(qty%min_qty != 0){
					var multipyer = min_qty * parseInt(parseInt(qty/min_qty)+1);
					if(multipyer > max_qty) {
						multipyer = max_qty;
					}
					$('#sheet_qty_'+id).val(multipyer);
			}
			
			alert_box("Sorry, these labels are only available in sets of "+min_qty+" rolls. ");
			$('#sheet_qty_'+id).focus();
			return false;
		
	}
	else if(type=='Integrated' && qty%min_qty != 0){
		if(qty%min_qty != 0){
				var multipyer = min_qty * parseInt(parseInt(qty/min_qty)+1);
				
				console.log(multipyer+' max '+max_qty);
				if(multipyer > max_qty) {
					multipyer = max_qty;
				}
				$('#sheet_qty_'+id).val(multipyer);
				
		}
	
		alert_box("Sorry, these labels are only available in sets of "+min_qty+" sheets pack. ");
		$('#sheet_qty_'+id).focus();
		return false;
		
	}
	else{
	
		 $.ajax({
			url: base+'ajax/add_to_cart_reorder',
			type:"POST",
			async:"false",
			dataType: "html",
			data: {
				serial: id,
				menuid: menuid,
				orderNum:orderNum,
				},
			success: function(data){
			if(!data==''){	
			//console.log(data); 
					data = $.parseJSON(data);
					if(data.response=='yes'){
								popup_messages(menuid+' - '+prd_name);
								$('#cart').html(data.top_cart);
					}
					else if(data.deactive=='yes'){
						$('#alter_link').attr('href',data.url);
						$('.layout').modal('show');
					}
				}
			 }  
		});
	}}

$(document).ready(function() {
		  var form = $("#signup_form");
		 	  form.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
			  	rules: {
						password: "required",
						cpassword: {
						  equalTo: "#password"
						},
						 email: {
						 required: true,
						 email: true,
						 onkeyup: false,
						 remote: base+"ajax/is_email_exist"
						},
						 captcha: {
						 required: true,
						 onkeyup: false,
						 remote: base+"ajax/is_valid_captcha"
						}
					},
					messages: {
                     email: {
                            remote: $.validator.format("{0} is already taken.")
                        },
				 	 captcha: {
                            remote: "please enter valid captcha!"
                        }
							
                    }
  		});
	});	
</script>