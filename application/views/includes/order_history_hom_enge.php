<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
<style>
.panel-body button[data-dismiss='modal'] {
	display: none;
}
.discount_price {
	color: black !important;
	font-size: 16px !important;
	text-decoration: line-through !important;
	display: inline !important;
}
#total_price b {
	font-size: 22px;
	color: #fd4913;
	font-weight: bold;
}
#total_price {
	text-align: right;
}
#ajax_artwork_uploads thead {
	background: #17b1e3 none repeat scroll 0 0;
	color: white;
}
.more_artworks_home {
	border: 1px solid grey;
	height: 55px;
	white-space: normal;
	text-align: center;
	font-size: 13px;
	line-height: 15px;
	padding: 4px 0;
	border-radius: 4px;
}
.more_artworks_home span {
	display: block;
}
.line_artwork_thumb {
	height: 55px !important;
	width: 55px;
}
.line_artwork_thumb {
	border-radius: 4px;
}
.view_more_designs:hover {
	text-decoration: none;
	color: #333;
}
.view_more_designs {
	color: #333;
}
.continue_btn {
	display: none;
}
#order_histoy_carousel .item {
	position: relative;
	z-index: 100;
	-webkit-backface-visibility: hidden;
}
/* end fix */
#order_histoy_carousel .owl-nav > div {
	margin-top: -26px;
	position: absolute;
	top: 50%;
	color: #cdcbcd;
}
#order_histoy_carousel .owl-nav i {
	font-size: 52px;
}
#order_histoy_carousel .owl-nav .owl-prev {
	left: -30px;
}
#order_histoy_carousel .owl-nav .owl-next {
	right: -30px;
}
#order_histoy_carousel .owl-item {
	border-right: 1px solid #e0e0e0;
	padding: 6px;
	padding-bottom: 0;
}
.order_history_div .carousel-wrap {
	padding: 0 3%;
}
p.price_txt {
    position: absolute;
    bottom: 4px;
    right: 10px;
}
</style>
<?php 
	$recent_lines = $this->user_model->get_user_recent_lines();
	if($recent_lines)
	{
?>
<div id="ac_loader" class="white-screen" style="display:none;position:relative;" >
  <div class="loading-gif text-center" style="top: 106px;left: 43%;"> <img onerror='imgError(this);' alt="AA Labels Loader" src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:43px; "> </div>
</div>
<div class="ourTeam">
  <div class="container">
    <div class="">
      <div class="thumbnail m0 p0" style="margin-top:20px !important;margin-bottom:0px !important;padding-bottom:0px !important; border:none;">
        <div class="clearfix">
          <div class="browing_history_home" style="background:none !important;">
            <div class="p-l-r-10 order_history_div">
              <p class="browing_history_title_home">Purchase History <span><a href="<?=base_url();?>users/user_orders">View All</a></span></p>
              <div class="">
                <div class="carousel-wrap browsing_history_carousel_wrap">
                  <div class="owl-carousel" id="order_histoy_carousel">
                    <?
					
					foreach ($recent_lines as $line)
						{
							$prod = $this->shopping_model->show_product($line->ProductID);
							//echo"<pre>";print_r($prod);echo"</pre>";
							$orientation = $wound = $isCustom = '';
							$FinishType = "No Finish";
							$orignalQty = $line->Quantity;
							$shape = strtolower($prod[0]['Shape'])."/";
							$categoryID = $prod[0]['CategoryID'];
							$parameter = "?productid=".$line->ProductID;
							$details = $this->user_model->get_product_details($line->ProductID);
							
							$print_type = '';
							$print_type = $plabeltype = $line->Print_Type;
							if(preg_match("/SRA3/i",$prod[0]['ProductBrand'])){
									$product_type = "SRA3";
									$url_type = "sra3-sheets";
									$path = Assets."images/categoryimages/SRA3Sheets/colours/".$prod[0]['ManufactureID'].".png";
									$min_qty = '100';
									$max_qty = '20000';
								}
								else if(preg_match("/A3/i",$prod[0]['ProductBrand'])){
									 $product_type = "A3";
									 $url_type = "a3-sheets";
									 $path = Assets."images/categoryimages/A3Sheets/colours/".$prod[0]['ManufactureID'].".png";
									 $min_qty = '100';
									 $max_qty = '50000';
								}
								else if(preg_match("/Roll Labels/i",$prod[0]['ProductBrand'])){
										$product_type = 'Rolls';
										$path = Assets."images/categoryimages/RollLabels/outside/".$prod[0]['ManufactureID'].".jpg";
										$url_type = "roll-labels";
										$orientation = 01;
										$wound = "Y";
										$isCustom = 'Yes';
										
										$min_qty = $this->home_model->min_qty_roll($details['ManufactureID']); 
										$max_qty = $this->home_model->max_qty_roll($details['ManufactureID']); 
										$min_labels_per_roll = $this->home_model->min_labels_per_roll($min_qty);
										$max_labels_per_roll = $this->home_model->max_total_labels_on_rolls($details['LabelsPerSheet']);
										
										$query = "Select c.categoryID, c.LabelGapAcross,c.Height from category c join products p on SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID and p.ProductID LIKE '".$line->ProductID."'";
										$die_details = $this->db->query($query)->row();
										if($line->is_custom=='Yes'){
											$details['LabelsPerSheet'] =  $line->LabelsPerRoll;
										}
										
								}
								else if(preg_match('/Integrated Labels/is',$prod[0]['ProductBrand'])){
										$product_type = 'Integrated'; 
										$image = $this->home_model->get_db_column("category","CategoryImage","CategoryID",$prod[0]['CategoryID']);
										$url_type = "integrated-labels";
										$path = Assets."images/categoryimages/Integrated/".$image;
										$orignalQty = 1000;
										$shape = '';
										$parameter = '';
										
										if(preg_match('/250/',$line->ProductName))
										{
											$min_qty = 250;
										}
										else
										{
											$min_qty = 1000;
										}
										$max_qty = 500000;
										
										if(preg_match("/Printed/is",$line->Print_Type)){
											$print_type = '4 Colour Digital Process';
										}
										else if(preg_match("/Black/is",$line->Print_Type)){
											$print_type = 'Monochrome – Black Only';
										}
								}
								else{
										$url_type = "a4-sheets";
										$product_type = 'A4'; 
										$path = Assets."images/categoryimages/A4Sheets/colours/".$prod[0]['ManufactureID'].".png";
								}
								if($line->labeltype == "plain")
								{
									$printing_option = "N";
									$source_option = "N";
									$printing_type = "N";
								}
								else
								{
									$printing_option = "Y";
									$source_option = "printing";
									$printing_type = "Monochrome - Black Only";
								}
								
								$product_collection = array('is_custom'=>$isCustom,
										 'ProductCategoryName'=>$prod[0]['ProductCategoryName'],
										 'LabelsPerRoll'=>$row->LabelsPerRoll,
										 'LabelsPerSheet'=>$prod[0]['LabelsPerSheet'],
										 'ReOrderCode'=>$prod[0]['ReOrderCode'],
										 'ManufactureID'=>$prod[0]['ManufactureID'],
										 'ProductBrand'=>$prod[0]['ProductBrand'],
										 'wound'=>$wound,
										 'Source'=>$source_option,
										 'Printing'=>$printing_option,
										 'Orintation'=>$orientation,
										 'Print_Type'=>$printing_type,
										 'FinishType'=>$FinishType,
										 'orignalQty'=>$orignalQty,
										 'ProductID'=>$line->ProductID);
										 //echo"<pre>";print_r($product_collection);echo"</pre>";
										 
							$completeName = $this->home_model->customize_product_name($product_collection);
							
							$sql = $this->user_model->get_sum_of_designed_artworks($line->OrderNumber, $line->ProductID);
							$no_of_labels_original = $sql['labels'];
							if($no_of_labels_original == 0)
							{
								$no_of_labels_original = $details['LabelsPerSheet']*$line->Quantity;
							}
							
							if(substr($categoryID,-2,1)=='R')
							{
								if(preg_match('/r1|r2|r3|r4|r5/is',$categoryID))
								{
									$new_code_exp=explode("R",$categoryID);
									$categoryID=$new_code_exp[0];
								}
								$Roll = $this->home_model->min_qty_roll($prod[0]['ManufactureID']);
								//$price = $this->home_model->calclateprice($prod[0]['ManufactureID'],$Roll,100);
								//$price = $price['final_price'];
								$data['min_labels'] = $Roll*100;
							}
							else
							{
								if(preg_match('/A4/',$prod[0]['ProductBrand']))
								{
									$qty_count = 25;
								}
								else
								{
									$qty_count = 100;
								}
								//$price = $this->product_model->ajax_price($qty_count,$prod[0]['ManufactureID']);
								//$price = $price['custom_price'];
							}
							
							$price = $line->Price + $line->Print_Total;
							$col_class = "col-md-3";
							$col_class_img = "col-md-3";
							$col_class_text = "col-md-9";
							$div_class = $div_class1 = $div_class2 = "";
							$complete_name_div = "order_complete_name";
							
							if($line->Printing == "Y")
							{
								$col_class = "col-md-6";
								$col_class_img = "col-md-2";
								$col_class_text = "col-md-10";
								$div_class = "row";
								$div_class1 = "col-md-6";
								$div_class2 = "col-md-6 text-right";
								$complete_name_div = "order_complete_name_printed";
								$data_merge = "data-merge='2'";
								$line_typee = "printed";
							}
							else
							{
								$data_merge = "";
								$line_typee = "plain";
							}
							
							?>
                    <div class="item <? //=$col_class?> col_line" <?=$data_merge?>>
                      <input type="hidden" id="OrderNumber" value="<?=$line->OrderNumber?>" />
                      <input type="hidden" id="SerialNumber" value="<?=$line->SerialNumber?>" />
                      <input type="hidden" id="ManufactureID" value="<?=$line->ManufactureID?>" />
                      <input type="hidden" id="ProductID" value="<?=$line->ProductID?>" />
                      <input type="hidden" id="prd_name<?=$line->SerialNumber?>" value="<?=$line->ProductName;?>"/>
                      <input type="hidden" id="cart_id_<?=$line->SerialNumber?>" value=""/>
                      <input type="hidden"  id="labels_p_sheet<?=$line->SerialNumber?>"  value="<?=$details['LabelsPerSheet']?>"  />
                      <input type="hidden"  id="Quantity_<?=$line->SerialNumber?>"  value="<?=$line->Quantity?>"  />
                      <input type="hidden"  id="Quantity_new_<?=$line->SerialNumber?>"  value="<?=$line->Quantity?>"  />
                      <input type="hidden"  id="No_Labels_Original<?=$line->SerialNumber?>"  value="<?=$no_of_labels_original?>"  />
                      <input type="hidden"  id="min_qty<?=$line->SerialNumber?>"  value="<?=$min_qty?>"  />
                      <input type="hidden"  id="max_qty<?=$line->SerialNumber?>"  value="<?=$max_qty?>"  />
                      <input type="hidden"  id="min_print_labels<?=$line->SerialNumber?>"  value="<?=$min_labels_per_roll?>"  />
                      <input type="hidden"  id="max_print_labels<?=$line->SerialNumber?>"  value="<?=$max_labels_per_roll?>"  />
                      <input type="hidden"  id="product_type<?=$line->SerialNumber?>"  value="<?=$product_type?>"  />
                      <input type="hidden"  id="prd_id<?=$line->SerialNumber?>"  value="<?=$line->ProductID?>"  />
                      <input type="hidden"  id="manufactureID<?=$line->SerialNumber?>"  value="<?=$line->ManufactureID?>"  />
                      <input type="hidden"  id="print_type<?=$line->SerialNumber?>"  value="<?=$print_type?>"  />
                      <input type="hidden"  id="labeltype<?=$line->SerialNumber?>"  value="<?=$plabeltype?>"  />
                      <input type="hidden"  id="finishtype<?=$line->SerialNumber?>"  value="<?=$line->FinishType?>"  />
                      <input type="hidden"  id="printQty<?=$line->SerialNumber?>"  value="<?=$line->Print_Qty?>"  />
                      <input type="hidden"  id="source<?=$line->SerialNumber?>"  value="<?=$print_source?>"  />
                      <input type="hidden" id="orderNum_<?=$line->SerialNumber?>"  value="<?=$line->OrderNumber?>"  />
                      <input type="hidden" id="cart_id_<?=$line->SerialNumber?>" value=""/>
                      <input type="hidden" id="gap_<?=$line->SerialNumber?>" value="<?=$die_details->LabelGapAcross?>"/>
                      <input type="hidden" id="diesize_<?=$line->SerialNumber?>" value="<?=$die_details->Height?>"/>
                      <input type="hidden" id="orientation<?=$line->SerialNumber?>" value="<?=$line->Orientation?>"/>
                      <input type="hidden" id="wound<?=$line->SerialNumber?>" value="<?=$line->Wound?>"/>
                      <input type="hidden" value="<?=count($artworks)?>" data-qty="0" id="uploadedartworks_<?=$line->SerialNumber?>" data-presproof="<?=$line->pressproof?>">
                      <input type="hidden"  id="printing<?=$line->SerialNumber?>"  value="<?=$line->Printing?>"  />
                      <input type="hidden"  id="regmark<?=$line->SerialNumber?>"  value="<?=$line->regmark?>"  />
                      <input type="hidden"  id="sheet_qty_<?=$line->SerialNumber?>"  value="<?=$line->Quantity?>"  />
                      <div class="image_thumbnail <?=$col_class_img?>"> <img src="<?=$path?>" class="img-responsive" onerror='imgError(this);' /> </div>
                      <div class="order_line_description <?=$col_class_text?>">
                        <div class="<?=$div_class?>">
                          <div class="history_manufacture_top <?=$div_class1?>"> <strong>Order #:</strong>
                            <?=$line->OrderNumber?>
                          </div>
                          <div class="history_manufacture_top <?=$div_class2?>">
                            <?=date('jS F Y',$line->OrderDate)?>
                          </div>
                        </div>
                        <hr />
                        <div class="browsing_middle"> <span class="<?=$complete_name_div?>">
                          <?php
									$max_length = 100;
									if (strlen($completeName) > $max_length and $line_typee=="plain"){
										 $offset = ($max_length - 3) - strlen($completeName);
										 $short_desc = substr($completeName, 0, strrpos($completeName, ' ', $offset)) . '...';
										 $short_desc .= ' <a style="cursor:pointer;" data-toggle="tooltip" data-placement="top" data-original-title="'.$completeName.'"><i>Read More</i></a>';
									}else{
										 $short_desc = $completeName;
									}
									//$short_desc = $completeName;
									echo $short_desc?>
                          <hr />
                          </span>
                          <?php
						  $classs="";
						  if($line->Printing == "Y" and $line->regmark !="Y")
							{
								
								$artworks = $this->home_model->get_attached_atworks_for_order($line->OrderNumber, $line->ProductID);
								if(count($artworks) > 0 and $line->regmark != "Y"){
									if($line_typee == "plain")
									{
										$classs="";
									}
									else
									{
										$classs="yes_artworks";
									}
									?>
                          <div class="row">
                            <?
									$iteration = 0;
									$show_more = "no";
								   foreach($artworks as $upload){
									   $iteration++;
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
									   if($iteration <4)
									   {
								   ?>
                            <div class="col-xs-3 col-sm-3 col-md-3"> <img onerror='imgError(this);' class="img-responsive line_artwork_thumb" src="<?=$artworkpath?>" height="50" width="" style="border: 1px solid #17b1e3;"/>
                              <p class="ellipsis"><small>
                                <?=$upload->labels?>
                                Labels</small></p>
                            </div>
                            <? 	}
										else
										{
											$show_more = "yes";
										}
									}
							   }
							   else
							   {
									if($line_typee == "plain")
									{
										$classs="";
									}
									else
									{
										$classs="no_artworks";
									}
							   }
							   if($show_more == "yes")
							   {
							?>
                            <div class="col-xs-3 col-sm-3 col-md-3 more_artworks_home"> <a href="javascript:void(0);" class="view_more_designs" data-productID="<?=$line->SerialNumber?>">View<span>
                              <?=count($artworks) - 3;?>
                              more</span> designs</a> </div>
                            <?
										}
									?>
                          </div>
                          <?
									}else if($line->regmark == "Y"){?>
                          <strong>Printing Service (Plain Registration Mark)</strong>
                          <? } ?>
                          <p class="text-right price_txt clear <?=$classs?>"><strong>
                            <?=symbol.$price?>
                            </strong></p>
                        </div>
                      </div>
                      <div class="browsing_bottom col-md-12 text-center">
                        <div class="col-md-4 text-left">
                          <? if($line->Printing=='Y' && $line->source!='flash' && $line->regmark != "Y"){?>
                          <a class="artwork_uploader continue_place_order" href="javascript:void(0);" data-target=".artworkModal1" data-toggle="modal" data-productid="<?=$line->SerialNumber?>" data-actual_productid="<?=$line->ProductID?>" data-manufactureid="<?=$line->ManufactureID?>" data-product_type="<?=strtolower($product_type)?>" data-labelsacross="" data-labelsize="">Edit</a>
                          <? } else {?>
                          <a href="<?=base_url();?>users/user_orders/" class="btn btn-link btn-sm continue_place_order">Edit</a>
                          <? } ?>
                        </div>
                        <div class="col-md-8 text-right"> 
                          <!--<a href="<?=base_url().$url_type."/".$shape.$categoryID.$parameter;?>" class="btn orangeBg btn-sm continue_place_order">Re-Order</a>-->
                          <? if($line->Printing=='Y' && $line->source!='flash' && $line->regmark != "Y"){?>
                          <a class="btn btn-xs orangeBg redorderBtn printed_reorder_button artwork_uploader" href="javascript:void(0);" data-productid="<?=$line->SerialNumber?>" data-actual_productid="<?=$line->ProductID?>" data-manufactureid="<?=$line->ManufactureID?>" data-product_type="<?=strtolower($product_type)?>" data-labelsacross="" data-labelsize=""> Re-Order </a>
                          <? } else {?>
                          <a href="javascript:void(0);" class="btn btn-xs orangeBg redorderBtn" onclick="add_item('<?=$line->SerialNumber?>','<?=$line->ManufactureID?>');" >Re-Order</a>
                          <? } ?>
                        </div>
                      </div>
                    </div>
                    <?
						}
						?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="modal fade artworkModal1 aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Artwork</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <div id="artworks_uploads_loader" class="white-screen hidden-xs" style="display:none;">
              <div class="loading-gif text-center" style="top:26%;left:29%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px; "> </div>
            </div>
            <div class="pull-right">
              <div id="total_price" style=""></div>
            </div>
            <input type="hidden" value="" id="productSerial" />
            <input type="hidden" value="" id="productType" />
            <input type="hidden" value="" id="openTrigger" />
            <div id="ajax_artwork_uploads" class=""></div>
          </div>
          <div class="col-md-12">
            <div class="pull-right"> <a href="javascript:void(0);" class="btn orange add_item_reorder" data-productserial="" data-manufactureid="" style="display:none;">Confirm & Add to Basket <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("click",".line_reorder",function(e){
	var productserial = $(this).parents('.col_line').find("#SerialNumber").val();
	var manufactureid = $(this).parents('.col_line').find("#ManufactureID").val();
	add_item_reorder_artworks(productserial, manufactureid);
	
});

$(document).on("click",".add_item_reorder",function(){
	var productserial = $(this).attr('data-productserial');
	var manufactureid = $(this).attr('data-manufactureid');
	add_item_reorder_artworks(productserial, manufactureid);
});

function add_item_reorder_artworks(serial,menuid)
{
	var productType = $("#productType").val();
	
	if(productType == "rolls")
	{
		var prd_name = $('#prd_name'+serial).val();
		var cart_id = $("#cart_id_"+serial).val();
		var qty = $("#Quantity_new_"+serial).val();
		var id = $("#prd_id"+serial).val();
		var labels = $("#labels_p_sheet"+serial).val();
		var labelfinish = $("#finishtype"+serial).val();
		var printing = $("#print_type"+serial).val();
		var presproof = $("#uploadedartworks_"+serial).attr('data-presproof');
		var woundoption = $("#wound"+serial).val();
		var orientation = $("#orientation"+serial).val();
		var printing_enabled = $("#printing"+serial).val();
		$("#aa_loader").show();
		$("#artworks_uploads_loader").show();
		
		$.ajax({
			url: base+'ajax/add_products_incart',
			type:"POST",
			async:"false",
			dataType: "html",
			data: {
				   labels: qty,
				   menuid: menuid,
				   prd_id: id,
				   max_labels:labels,
				   labelfinish:labelfinish,
				   printing:printing,
				   presproof:presproof,
				   cartid:cart_id,
				   woundoption:woundoption,
				   orientation:orientation,
				   printing_enabled:printing_enabled,
				   type:'Rolls',
				   page:'reorder',
			},
			success: function(data)
			{
				if(!data=='')
				{  
					data = $.parseJSON(data); 
					if(data.response=='yes'){
						$(".artworkModal1").modal('hide');
						$("#cart_id_"+serial).val('');
						$("#aa_loader").hide();
						$("#artworks_uploads_loader").hide();
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
	else
	{
		var qty = $('#Quantity_new_'+serial).val();
		if(qty == '' || qty == 0 || qty == 'undefined')
		{
			var qty = $('#Quantity_'+serial).val();
		}
		
		var min_qty = parseInt($('#min_qty'+serial).val());
		var max_qty = parseInt($('#max_qty'+serial).val());
		var orderNum = $('#orderNum_'+serial).val();
		var type = $('#product_type'+serial).val();
		var prd_name = $('#prd_name'+serial).val();
		var newcartid = $('#cart_id_'+serial).val();
		var menuid = $('#manufactureID'+serial).val();
		var printing = $('#printing'+serial).val();
		var print_type = $('#print_type'+serial).val();
		var prodid = $('#prd_id'+serial).val();
		var labels_per_sheet = $('#labels_p_sheet'+serial).val();
	
		$("#aa_loader").show();
		$("#artworks_uploads_loader").show();
		
		/*console.log("serial: "+serial);
		console.log("min_qty: "+min_qty);
		console.log("max_qty: "+max_qty);
		console.log("orderNum: "+orderNum);
		console.log("type: "+type);
		console.log("prd_name: "+prd_name);
		console.log("newcartid: "+newcartid);
		console.log("menuid: "+menuid);
		console.log("print_type: "+print_type);
		console.log("prodid: "+prodid);
		console.log("labels_per_sheet: "+labels_per_sheet);*/
		
		 if(productType == "integrated")
		{
			var counter = parseInt($("#uploadedartworks_"+serial).val());
			if(counter == 0 || counter == '' || counter == NaN)
			{
				counter = parseInt($("#printQty"+serial).val());
			}
			$.ajax({
				url: base+'ajax/add_integrate_incart',
				type:"POST",
				async:"false",
				dataType: "html",
				data: {
					manufature: menuid,
					box: qty,
					type: 'printed',
					print_option: print_type,
					prdid: prodid,
					counter: counter,
					batch: min_qty,
					cart_id: newcartid,
					page: 'reorder'
				},
				success: function(data){
				if(!data==''){	
						data = $.parseJSON(data);
						if(data){
							$(".artworkModal1").modal('hide');
							$("#cart_id_"+serial).val('');
							$("#aa_loader").hide();
							$("#artworks_uploads_loader").hide();
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
		else
		{
			$.ajax({
				url: base+'ajax/add_products_incart',
				type:"POST",
				async:"false",
				dataType: "html",
				data: {
					qty: qty,
					menuid: menuid,
					prd_id: prodid,
					labeltype: print_type,
					printing: printing,
					cartid: newcartid,
					labels: labels_per_sheet,
					page: 'reorder'
				},
				success: function(data){
					if(!data==''){	
						data = $.parseJSON(data);
						if(data.response=='yes'){
							$(".artworkModal1").modal('hide');
							$("#cart_id_"+serial).val('');
							$("#aa_loader").hide();
							$("#artworks_uploads_loader").hide();
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
		return false;
	}
}

function add_item(id,menuid){
		var qty = $('#sheet_qty_'+id).val();
		var labels = $('#labels_p_sheet'+id).val();
		var min_qty = parseInt($('#min_qty'+id).val());
		var max_qty = parseInt($('#max_qty'+id).val());
		var prd_id = $('#prd_id'+id).val();
		var type = $('#product_type'+id).val();
		var prd_name = $('#prd_name'+id).val();
		var print_type = $('#print_type'+id).val();
		var labeltype = $('#labeltype'+id).val();
		var source = $('#source'+id).val();
		var colorcode = $('#colorcode'+id).val();
		var batch = min_qty;
		var regmark = $('#regmark'+id).val();
		if(regmark == "Y")
		{
			regmark = "yes";
		}
		else
		{
			regmark = "no";
		}
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
				data: {  qty: qty,menuid: menuid,prd_id: prd_id,labels:labels,type:type,print_type:print_type,colour:colorcode,labeltype:labeltype,source:source,batch:batch,regmark:regmark},
				success: function(data){
				if(!data==''){
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
		}
}



/*********** PRINTED ************/
var parent_selector = null;	
$(document).on("click", ".artwork_uploader", function(e) {
	$('.add_item_reorder').hide();
	$("#aa_loader").show();
	$("#openTrigger").val("artwork_uploader");
	//$('#total_price').hide();
	var product_id = $(this).data('productid');
	var cart_id =  $('#cart_id_'+product_id).val();
	var print_type = $('#print_type'+product_id).val();
	var manufactureid =  $(this).data('manufactureid');
	var labels = $('#labels_p_sheet'+product_id).val();
	var product_type = $(this).data('product_type');

	if(product_type == "rolls")
	{
		var unitqty = 'Labels' //Sheets Labels
	}
	else
	{
		var unitqty = 'Sheets' //Sheets Labels
	}

	var qty = $('#Quantity_'+product_id).val();
	if(qty == '' || qty == 0)
	{
		var qty = $('#Quantity_new_'+product_id).val();
	}
	
	var actual_productid = $(this).data('actual_productid');
	var _this = this;
	parent_selector = this;
	
	$('#ajax_artwork_uploads').html('');
	$('#artworks_uploads_loader').show();
		$.ajax({
			url: base+'ajax/view_artworks_content',
			type:"POST",
			async:"false",
			data:{
					 manfactureid:manufactureid,
					 product_id:product_id,
					 type:product_type,
					 labelspersheet:labels,
					 cart_id:cart_id,
					 unitqty:unitqty,
					 page:'reorder',
					 actual_productid:actual_productid,
					 print_type:print_type,
					 qty:qty,
				 },
			dataType: "html",
			success: function(data){
					if(!data==''){	
						data = $.parseJSON(data);
						if(data.total_price != null && data.total_price != '')
						{
							total_price = $.parseJSON(data.total_price);
							$("#total_price").html(total_price.price);
						}
						$('#artworks_uploads_loader').hide();
						$('#ajax_artwork_uploads').html(data.html);
						$("#aa_loader").hide();
						$("#productSerial").val(product_id);
						$("#productType").val(product_type);
						
						$('.add_item_reorder').attr('data-productserial',product_id).attr('data-manufactureid',manufactureid);
						if(cart_id.length==0 || cart_id==''){
							$('#cart_id_'+product_id).val(data.cartid);
						}
						
						$('.add_item_reorder').show();
						if(product_type == "rolls")
						{
							var presproof = $("#uploadedartworks_"+product_id).attr('data-presproof');
							if(presproof == 0)
							{
								$("#pressproof").prop('checked', false);
							}
							else
							{
								$("#pressproof").prop('checked', true);
							}
							$("#Quantity_new_"+product_id).val($("#final_uploaded_labels").val());
							update_price_new_rolls();
						}
						else
						{
							update_price_new_sheets();
						}
						intialize_progressbar();
						
						var openTrigger = $("#openTrigger").val();
						if(openTrigger == "printed_reorder")
						{
							$("#aa_loader").show();
							$(".add_item_reorder").trigger("click");
							$("#aa_loader").hide();
						}
					}
			  }  
		});
});
var old_labels_input;
var old_roll_labels_input;
var old_roll_input;
$(document).on("focus", ".roll_labels_input", function(e) {
	old_roll_labels_input = $(this).val();
});
$(document).on("focus", ".input_rolls", function(e) {
	old_roll_input = $(this).val();
});
	
$(document).on("keypress keyup blur", ".labels_input", function(e) {
	if($(this).val()!=old_labels_input){
		$(this).parents('.upload_row').find('.sheet_updater').show();
	}
});
$(document).on("keypress keyup blur", ".roll_labels_input", function(e) {
	var rolls = $(this).parents('.upload_row').find('.input_rolls').val();
	if($(this).val()!=old_roll_labels_input  && rolls.length > 0){
		$(this).parents('.upload_row').find('.roll_updater').show();
		$(this).parents('.upload_row').find('.quantity_updater').show();
	}
});
$(document).on("keypress keyup blur", ".input_rolls", function(e) {
	var labels = $(this).parents('.upload_row').find('.roll_labels_input').val();
	if($(this).val()!=old_roll_input && labels.length > 0){
		$(this).parents('.upload_row').find('.roll_updater').show();
		$(this).parents('.upload_row').find('.quantity_updater').show();
	}
});

$(document).on("click", ".add_another_art", function(e) {
	$('.upload_row').show();
	$(this).hide();
	$('#add_another_line').hide();
});
$(document).on("click", ".delete_artwork_file", function(event) {
		  var id = $(this).attr('id');
		  var cartid = $('#cartid').val();
		  var productid = $('#cartproductid').val();
		  var persheet = $('#labels_p_sheet').val();
		  var type = $("#productType").val();
		  var gap = '';
		  var size = '';
		  var productSerial = $("#productSerial").val();
		  if(type == "rolls")
		  {
			 size = $("#diesize_"+productSerial).val(); 
			 gap = $("#gap_"+productSerial).val(); 
		  }
		  var presproof = $('#uploadedartworks_'+productSerial).attr('data-presproof');
		   swal({
			  title: "Are you sure you want to delete this line",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn orangeBg",
			  confirmButtonText: "Yes",
			  cancelButtonClass: "btn blueBg m-r-10",
			  cancelButtonText: "Cancel",
			  closeOnConfirm: true,
			  closeOnCancel: true
			},
			function(isConfirm) {
			  if (isConfirm) {
				  			$("#artworks_uploads_loader").show();
							$.ajax({
								url: base+'ajax/delete_material_artworks',
								type:"POST",
								async:"false",
								dataType: "html",
								data:{
									  fileid:id,
									  cartid:cartid,
									  productid:productid,
									  persheet:persheet,
									  type:type,
									  gap:gap,
									  size:size,
									  presproof:presproof,
								},
								success: function(data){
									data = $.parseJSON(data); 	
									if(!data==''){
										//update_printed_quantity_box(data.qty, data.designs, data.rolls);
										$('#ajax_upload_content').html(data.content);
										
										intialize_progressbar();
										if(type == "rolls")
										{
											update_price_new_rolls();
										}
										else
										{
											update_price_new_sheets();	
										}
										$("#artworks_uploads_loader").hide();
									}
								 }  
							});
			  } 
		 })
});

$(document).on("click", ".save_artwork_file", function(e) {
	var _this = this;
	var product_serial = $('#productSerial').val();
	var productType = $('#productType').val();
	var cartid = $('#cartid').val();
	var prdid = $('#cartproductid').val();
	var labelpersheets = $('#labels_p_sheet').val();
	if(productType == 'rolls')
	{
		var type = 'rolls';
		var size = $("diesize_"+product_serial).val();
		var gap = $("gap_"+product_serial).val();
		var artworkname = $(_this).parents('.upload_row').find('.artwork_name').val();
		var file = $(_this).parents('.upload_row').find('.artwork_file').val();
		var uploadfile = $(_this).parents('.upload_row').find('.artwork_file')[0].files[0];
		var product_id =  $(parent_selector).parents('.productdetails').find('.product_id').val();
		var presproof = $(parent_selector).parents('.productdetails').find('#uploadedartworks_'+product_id).attr('data-presproof');
		
		var response = '';
		response = verify_labels_or_rolls_qty(_this);
		if(response==false){ return false;}	
		var labels = $(_this).parents('.upload_row').find('.roll_labels_input').val();
		var sheets = $(_this).parents('.upload_row').find('.input_rolls').val();
		var lb_txt = 'labels';
		
		if(file.length==0){
				alert_box("Please upload a file before saving. ");
		}
		else if(labels==0 || labels==''){
				alert_box("Please complete line ");
		}
		else if(artworkname.length==0){
				alert_box("please enter artwork name! ");
		}
		else{
				var uploadfile = $(this).parents('.upload_row').find('.artwork_file')[0].files[0];
				var form_data = new FormData();                  
					form_data.append("file", uploadfile)
					form_data.append("cartid",cartid);
					form_data.append("productid",prdid);
					form_data.append("labels",labels);
					form_data.append("sheets",sheets);
					form_data.append("artworkname",artworkname);
					form_data.append("persheet",labelpersheets);
					form_data.append("type",type);
					form_data.append("size",size);
					form_data.append("gap",gap);
					form_data.append("presproof",presproof);
					type = uploadfile.type;
				
				if(type != 'image/png' && type != 'image/jpg' && type != 'image/gif' && type != 'image/jpeg' && type != 'application/pdf' && type != 'application/postscript' ) {
					swal("Not Allowed","We apologise, because this file type cannot be uploaded. \n\n Please retry using one of the following file formats: EPS; GIF; JPEG; JPG; PDF & PNG","warning");
					return false;
				}else{
						upload_printing_artworks(form_data);
				}
		}
	}
	else
	{
		var type = 'sheets';
		//var cartunitqty = $('#cartunitqty').val();
		var cartunitqty = 'Sheets';
		
		var artworkname = $(_this).parents('.upload_row').find('.artwork_name').val();
		var file = $(_this).parents('.upload_row').find('.artwork_file').val();
		var uploadfile = $(_this).parents('.upload_row').find('.artwork_file')[0].files[0];
		
		var response = '';
		
		if(cartunitqty == 'Labels'){
				var labels = $(_this).parents('.upload_row').find('.labels_input').val();
				if(labels.length==0){ 
					var id =$(_this).parents('.upload_row').find('.labels_input');
					var popover =  $(_this).parents('.upload_row').find('.popover').length;
					if(popover == 0){
						show_faded_popover(id, "Minimum "+labelpersheets+" labels are required ");
					}
					return false;
				}
				var sheets = parseInt(labels/labelpersheets);
				var lb_txt = 'labels';
		}else{
				var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
				if(sheets.length==0){ 
					var id =$(_this).parents('.upload_row').find('.labels_input');
					var popover =  $(_this).parents('.upload_row').find('.popover').length;
					if(popover == 0){
						show_faded_popover(id, "Minimum 1 sheet required ");	
					}
					return false;
				}
				var labels = parseInt(sheets*labelpersheets);
				var lb_txt = 'sheets';
		}
		
		if(productType == "integrated")
		{
			var max_qty = parseInt($("#max_qty"+product_serial).val());
			var min_qty = parseInt($("#min_qty"+product_serial).val());
			var batch = min_qty;
			
			var box_inp = $(_this).parents('.upload_row').find('.labels_input');
			
			if(sheets == NaN || box_inp.val() == '')
			{
				box_inp.val(batch);
				show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
				return false;
			}
			else if(sheets < min_qty)
			{
				show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
				box_inp.val(min_qty);
				return false;
			}
			else if(sheets > max_qty)
			{
				box_inp.val(max_qty);
				show_faded_popover(box_inp, "Maximum "+max_qty+" sheets allowed");
				return false;
			}
			
			if(sheets%batch != 0)
			{
				if(batch == 250)
				{
					sheets = Math.round(sheets/250)*250;
					if(sheets == 0)
					{
						sheets = batch;
					}
				}
				else
				{
					sheets = Math.round(sheets/1000)*1000;
					if(sheets == 0)
					{
						sheets = batch;
					}
				}
				$(box_inp).val(sheets);
				show_faded_popover(box_inp, "Quantity has been round off to "+sheets);
				labels = parseInt(sheets*labelpersheets);
				return false;
			}
			$(".labels_input").trigger("blur");
		}
		
		if(file.length==0){
				alert_box("Please upload a file before saving. ");
		}
		else if(labels==0 || labels==''){
				alert_box("Please complete line ");
		}
		else if(artworkname.length==0){
				alert_box("please enter artwork name! ");
		}
		else{
				
				var uploadfile = $(this).parents('.upload_row').find('.artwork_file')[0].files[0];
				
				var form_data = new FormData();                  
					form_data.append("file", uploadfile)
					form_data.append("cartid",cartid);
					form_data.append("productid",prdid);
					form_data.append("labels",labels);
					form_data.append("sheets",sheets);
					form_data.append("artworkname",artworkname);
					form_data.append("persheet",labelpersheets);
					form_data.append("type",type);
					form_data.append("unitqty",cartunitqty);
					form_data.append("page",'reorder');
					type = uploadfile.type;
			
				if(type != 'image/tiff' && type != 'image/png' && type != 'image/jpg' && type != 'image/gif' && type != 'image/jpeg' && type != 'application/pdf' && type != 'application/postscript' ) {
					swal("Not Allowed","We apologise, because this file type cannot be uploaded. \n\n Please retry using one of the following file formats: EPS; GIF; JPEG; JPG; PDF & PNG","warning");
					return false;
				}else{
						upload_printing_artworks(form_data);
				}
		}
	}
});

function upload_printing_artworks(form_data){
$.ajax({
	url: base+'ajax/upload_material_artworks',
	type:"POST",
	async:"false",
	dataType: "html",
	cache:false,
	contentType: false,
	processData: false,
	data:form_data,
	beforeSend: function() {
		$( "#upload_pecentage" ).html(' &nbsp;0%');
		$( "#upload_progress" ).show();
		$('.save_artwork_file').prop('disabled', true);
	},
	xhr: function() {
			var myXhr = $.ajaxSettings.xhr();
			if(myXhr.upload){
				myXhr.upload.addEventListener('progress',progress, false);
			}
			return myXhr;
	},
	error: function(data){
			swal('Some error occured please try again');
			intialize_progressbar();
			$( "#upload_progress" ).hide();
			$('.save_artwork_file').prop('disabled', false);
	},
	success: function(data){
		$('.save_artwork_file').prop('disabled', false);
		data = $.parseJSON(data); 
		if(data.response=='yes'){
				$('#ajax_upload_content').html(data.content);
				
				//update_printed_quantity_box(data.qty, data.designs);
				intialize_progressbar();
				$( "#upload_progress" ).hide();
		}else{
				swal('upload failed',data.message, 'error');
				intialize_progressbar();
				$( "#upload_progress" ).hide();
				$('.save_artwork_file').prop('disabled', false);
		}
		var prod_type = $("#productType").val();
		if(prod_type == "rolls")
		{
			update_price_new_rolls();
		}
		else
		{
			update_price_new_sheets();
		}
 }  
});
}
$(document).on("click", "#pressproof", function(e) {
	var product_serial = $("#productSerial").val();
	if ($(this).is(':checked')) {
		$('#uploadedartworks_'+product_serial).attr('data-presproof', 1);
	}else{
		$('#uploadedartworks_'+product_serial).attr('data-presproof', 0);
	}
	reset_print_input_buttons(parent_selector);
	update_price_new_rolls();	
});	
function intialize_progressbar(){
	$("#progressbar").progressbar({
		value: 0,
		create: function( event, ui ) {
			$(this).removeClass("ui-corner-all").addClass('progress').find(">:first-child").removeClass("ui-corner-left").addClass('progress-bar progress-bar-success');
		}
	});
}
function progress(e){
    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;
		var Percentage = Math.ceil((current * 100)/max);
      	$( "#progressbar" ).progressbar( "option", "value", Percentage );
		$( "#upload_pecentage" ).html(' &nbsp;'+Percentage+'%');
	
        if(Percentage >= 100)
        {
          	$( "#progressbar" ).progressbar( "option", "value", 100 );
			$( "#upload_pecentage" ).html(' &nbsp;100%'); 
        }
    }  
}
function total_upload_labels(){
		var total_labels = 0;
		var total_sheets = 0;
		
		var min_qty = $('#labels_p_sheet').val();
		var unitqty = $('#cartunitqty').val();
		
		$( ".labels_input" ).each(function( index ) {
				 if($(this).val() !== '' ){
					  if(unitqty == 'Labels' ){
						  	 var labels = parseInt($(this).val());
						  	 var sheets = parseInt(labels/min_qty);
							 $(this).parents('.upload_row').find('.displaysheets').text(sheets);
					 	  	
					  }else{
					   	 	 var sheets = parseInt($(this).val());
						  	 var labels = parseInt(sheets*min_qty);	
							 $(this).parents('.upload_row').find('.displaysheets').text(labels);
					  }
					  total_labels+=labels;
					  total_sheets+=sheets;
				 }
		});
		
		if(total_sheets!='NaN'){
				if(unitqty == 'Labels' ){
						$('.total_user_labels').html(total_sheets);
						$('.total_user_sheet').html(total_labels);
				}else{
						$('.total_user_labels').html(total_labels);
						$('.total_user_sheet').html(total_sheets);
				}
				
				var labels = parseInt($('#acutal_labels').val());
				var acutal_qty = parseInt($('#acutal_qty').val());
				var labelspersheets = parseInt($('#labels_p_sheet').val());
				var reaming = parseInt(acutal_qty)-parseInt(total_sheets);
				if(reaming < 0){ $('.remaing_user_sheets').html('0');$('.remaing_user_labels').html('0'); }
				else{ 	
						if(unitqty == 'Labels' ){
								$('.remaing_user_sheets').html(reaming*labelspersheets); 
								$('.remaing_user_labels').html(reaming); 
						}else{
								$('.remaing_user_sheets').html(reaming); 
								$('.remaing_user_labels').html(reaming*labelspersheets); 
						}
				}
				$('#upload_remaining_labels').val(reaming); 
		}
}
function verify_labels_or_rolls_qty(id){
		var product_serial = $("#productSerial").val();
		var prdid =  $('#prd_id'+product_serial).val();
		var labelspersheets =  $('#labels_p_sheet'+product_serial).val();
		var minlabels = parseInt($('#min_print_labels'+product_serial).val());
		var dieacross = min_rolls = parseInt($('#min_qty'+product_serial).val());
		var min_qty = parseInt(min_rolls*minlabels);
		var max_qty = parseInt($('#max_print_labels'+product_serial).val());
		
		
		var rolls = parseInt($(id).parents('.upload_row').find('.input_rolls').val());
		var total_labels = parseInt($(id).parents('.upload_row').find('.roll_labels_input').val());
		var perroll = parseFloat(total_labels/rolls);
		
		if(isFloat(perroll)){  perroll = Math.ceil(perroll);}
		
		var roll_text = 'roll';
		if(rolls > 1){ var roll_text = 'rolls';}
		
		if(!is_numeric(total_labels)){
			var _this = $(id).parents('.upload_row').find('.roll_labels_input');
			show_faded_popover(_this, "Please enter number of labels.");
			$(id).parents('.upload_row').find('.roll_labels_input').val('');
			return false;
		}
		else if(total_labels == 0){
			var _this = $(id).parents('.upload_row').find('.roll_labels_input');
			show_faded_popover(_this, "Minimum Label quantity is "+minlabels+" Labels per roll.");
			$(id).parents('.upload_row').find('.roll_labels_input').val('');
			return false;
		}
		else if(!is_numeric(rolls) || rolls == 0){
			var _this = $(id).parents('.upload_row').find('.input_rolls');
			show_faded_popover(_this, "Minimum roll quantity is 1 roll.");
			$(id).parents('.upload_row').find('.input_rolls').val('');
			return false;
		}
		else if(perroll < minlabels){
			var roll_input_display = $(id).parents('.upload_row').find('.input_rolls').css('display');
			if( roll_input_display== 'block'){
				var requiredlabels = minlabels*rolls
				var _this = $(id).parents('.upload_row').find('.roll_labels_input');
				show_faded_popover(_this, "Quantity has been amended for production as "+requiredlabels+" Labels.");
				
				$(id).parents('.upload_row').find('.show_labels_per_roll').text(minlabels);
				$(id).parents('.upload_row').find('.roll_labels_input').val(requiredlabels);
				return false;
			}else{
			   if(total_labels > labelspersheets){
					var expectedrolls = parseFloat(total_labels/labelspersheets);
					if(isFloat(expectedrolls)){  expectedrolls = Math.ceil(expectedrolls);}
					labelspersheets = parseInt(total_labels/expectedrolls);
					
					var _this = $(id).parents('.upload_row').find('.input_rolls');
					show_faded_popover(_this, "Quantity has been amended for production as "+expectedrolls+" Rolls.");
					$(id).parents('.upload_row').find('.show_labels_per_roll').text(labelspersheets);
					$(id).parents('.upload_row').find('.input_rolls').val(expectedrolls);
					$(id).parents('.upload_row').find('.quantity_labels').text(expectedrolls);
					return false; 
			   }
			   else{
					 if(total_labels < minlabels){
						total_labels = minlabels;
						var _this = $(id).parents('.upload_row').find('.roll_labels_input');
						show_faded_popover(_this, "Quantity has been amended for production as "+total_labels+" Labels.");
					 }else{
						 var _this = $(id).parents('.upload_row').find('.roll_labels_input');
						 show_faded_popover(_this, "Quantity has been amended for production as 1 Roll.");
					 }
					 $(id).parents('.upload_row').find('.show_labels_per_roll').text(total_labels);
					 $(id).parents('.upload_row').find('.quantity_labels').text(1);
					 $(id).parents('.upload_row').find('.input_rolls').val(1);
					 $(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
					 return false;  
			   }
			}
		}
		else if(perroll > labelspersheets){
			var response =  rolls_calculation(min_rolls, labelspersheets, total_labels, 0);
			var total_labels 	=  response['total_labels'];
			var expectedrolls  =  response['rolls'];
			var labelspersheets = parseInt(total_labels/expectedrolls);
			
			var infotxt = 'Quantity has been amended for production as '+expectedrolls+' rolls and '+total_labels+' labels';	
			show_faded_popover($(id).parents('.upload_row').find('.roll_labels_input'), infotxt);
			$(id).parents('.upload_row').find('.show_labels_per_roll').text(labelspersheets);
			$(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
			$(id).parents('.upload_row').find('.input_rolls').val(expectedrolls);
			$(id).parents('.upload_row').find('.quantity_labels').text(expectedrolls);
			return false;
		}else{
			var total_labels = parseInt(perroll)*parseInt(rolls);
			$(id).parents('.upload_row').find('.show_labels_per_roll').text(perroll);
			$(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
		}
		$(id).parents('.upload_row').find('.quantity_updater').hide();
}

function rolls_calculation(die_across, max_labels, total_labels, rolls){
		if(rolls==0){ rolls = parseInt(die_across);}else{ rolls = parseInt(rolls)+parseInt(die_across); }
		var per_roll = parseFloat(parseInt(total_labels)/rolls);
		if(per_roll > parseInt(max_labels)){
			 response = rolls_calculation(die_across, max_labels, total_labels, rolls);
			 per_roll = response['per_roll'];
			 rolls    = response['rolls'];
		}
		var data = {per_roll:Math.ceil(per_roll), total_labels:Math.ceil(per_roll)*rolls, rolls:rolls};
		return data;
}

$(document).on("click", ".quantity_updater", function(e) {
	verify_labels_or_rolls_qty(this);
	$(this).parents('.upload_row').find('.quantity_updater').hide();
});

$(document).on("click", ".quantity_editor", function(e) {
	$(this).hide();
	$(this).parents('.upload_row').find('.quantity_labels').hide();
	$(this).parents('.upload_row').find('.input_rolls').show();
});

function isFloat(n){
    return Number(n) === n && n % 1 !== 0;
}
function reset_plain_input_buttons(_this){
		$(_this).parents('.productdetails').find('.plainprice_box').hide();
		$(_this).parents('.productdetails').find('.add_plain').hide();
		$(_this).parents('.productdetails').find('.plain_save_txt').hide();
		$(_this).parents('.productdetails').find('.diamterinfo').hide();
		$(_this).parents('.productdetails').find('.addprintingoption').addClass('hide');
		
		$(_this).parents('.productdetails').find('.calculate_plain').show();
		
}
function reset_print_input_buttons(_this){
		$(_this).parents('.productdetails').find('.printedprice_box').hide();
		$(_this).parents('.productdetails').find('.add_printed').hide();
		$(_this).parents('.productdetails').find('.calculate_printed').show();
}
function is_numeric(mixed_var) {
    var whitespace =
    " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    return (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -
        1)) && mixed_var !== '' && !isNaN(mixed_var);
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


$(document).on("click", ".browse_btn", function(e) {
		$(this).parents('.upload_row').find('.artwork_file').click();
});
$(document).on("change", ".artwork_file", function(e) {
    readURL(this);
});
function readURL(input) {

if (input.files && input.files[0]) {
		var url = input.value;
		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		if(ext=='docx' || ext=='doc'){
			$('#preview_po_img').attr('src', '<?=Assets?>images/doc.png');
			$('#preview_po_img').show();
			$('.browse_btn').hide();	
		}
		else if(ext=='pdf'){
			$('#preview_po_img').attr('src', '<?=Assets?>images/pdf.png');
			$('#preview_po_img').show();	
			$('.browse_btn').hide();
		}
		else if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#preview_po_img').attr('src', e.target.result);
				$('#preview_po_img').show();
				$('.browse_btn').hide();
			}
			reader.readAsDataURL(input.files[0]);
		}
		else{
				$('#preview_po_img').attr('src', '<?=Assets?>images/no-image.png');
				$('#preview_po_img').show();
				$('.browse_btn').hide();
		}
    }
}

$(document).on("click", "#preview_po_img", function(e) {
	
		swal({
		  title: 'Are you sure you want to delete this file?',
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn orangeBg",
		  confirmButtonText: "No",
		  cancelButtonClass: "btn blueBg m-r-10",
		  cancelButtonText: "Yes",
		  closeOnConfirm: true,
		  closeOnCancel: true
		 },
			function(isConfirm) {
			  if (isConfirm) {
						console.log('cancel');
			  } else {
						$('.browse_btn').show();
						$('#preview_po_img').hide();
			 }
		  });
});

$(document).on("blur", ".labels_input", function(e) {
		var min_qty = parseInt($('#labels_p_sheet').val());
		var unitqty = $('#cartunitqty').val();
		unitqty = $.trim(unitqty);
		var labels = parseInt($(this).val());
		
		if(!is_numeric(labels)){
			show_faded_popover(this, "please enter only numbers ");
			$(this).val('');
			return false;
		}
		else if(labels==0 && unitqty == 'Sheets'){
			show_faded_popover(this, "Minimum 1 sheet required ");
			$(this).val('');
			return false;
		}
		else if((labels==0 || labels < min_qty) && unitqty == 'Labels'){
			show_faded_popover(this, "Minimum "+min_qty+" labels are required ");
			$(this).val('');
			return false;
		}
		else if(labels%min_qty != 0  && unitqty == 'Labels'){
				var multipyer = min_qty * parseInt(parseInt(labels/min_qty)+1);
				$(this).val(multipyer);
				total_upload_labels();
				show_faded_popover(this, "Quantity has been amended for production as "+multipyer+" Labels.");
				$(this).focus();
				return false;
		}
		else{
				total_upload_labels();
		}
});

$(document).on("click", ".sheet_updater", function(event) {
	var id = $(this).attr('data-id');
	var _this = this;
	var cartid = $('#cartid').val();
	var prdid = $('#cartproductid').val();
	var labelpersheets = $('#labels_p_sheet').val();
	var type = 'sheets';
	var cartunitqty = $('#cartunitqty').val();
	
	var productType = $("#productType").val();
	var product_serial = $("#productSerial").val();
	
	var artwork_name = $(this).parents(".upload_row").find(".artwork_name").val();
	var artwork_field = $(this).parents(".upload_row").find(".artwork_name");

	if(artwork_name == "")
	{
		show_faded_popover(artwork_field, "Please enter artwork name");
		return false;
	}
	
	if(cartunitqty == 'Labels'){
		var labels = $(_this).parents('.upload_row').find('.labels_input').val();
		if(labels.length==0 || labels == 0 || labels == ''){ 
			var id =$(_this).parents('.upload_row').find('.labels_input');
			var popover =  $(_this).parents('.upload_row').find('.popover').length;
			if(popover == 0){
				show_faded_popover(id, "Minimum "+labelpersheets+" labels are required ");
			}
			return false;
		}
			var sheets = parseInt(labels/labelpersheets);
	}else{
			var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
			if(sheets.length==0 || sheets == 0 || sheets == ''){ 	 
				var id =$(_this).parents('.upload_row').find('.labels_input');
				var popover =  $(_this).parents('.upload_row').find('.popover').length;
				if(popover == 0){
					show_faded_popover(id, "Minimum 1 sheet required ");	
				}
				return false;
			}
			var labels = parseInt(sheets*labelpersheets);
	}
	
	if(productType == "integrated")
	{
		var max_qty = parseInt($("#max_qty"+product_serial).val());
		var min_qty = parseInt($("#min_qty"+product_serial).val());
		var batch = min_qty;
		var box_inp = $(_this).parents('.upload_row').find('.labels_input');
		if(sheets == NaN || box_inp.val() == '')
		{
			box_inp.val(batch);
			show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
			return false;
		}
		else if(sheets < min_qty)
		{
			show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
			box_inp.val(min_qty);
			return false;
		}
		else if(sheets > max_qty)
		{
			box_inp.val(max_qty);
			show_faded_popover(box_inp, "Maximum "+max_qty+" sheets allowed");
			return false;
		}
		if(sheets%batch != 0)
		{
			if(batch == 250)
			{
				sheets = Math.round(sheets/250)*250;
				if(sheets == 0)
				{
					sheets = batch;
				}
			}
			else
			{
				sheets = Math.round(sheets/1000)*1000;
				if(sheets == 0)
				{
					sheets = batch;
				}
			}
			$(box_inp).val(sheets);
			show_faded_popover(box_inp, "Quantity has been round off to "+sheets);
			labels = parseInt(sheets*labelpersheets);
			return false;
		}
		$(".labels_input").trigger("blur");
	}
	$("#artworks_uploads_loader").show();
	$.ajax({
		url: base+'ajax/update_material_artworks',
		type:"POST",
		async:"false",
		dataType: "html",
		data:{
			 id:id,
			 cartid:cartid,
			 productid:prdid,
			 labels:labels,
			 sheets:sheets,
			 persheet:labelpersheets,
			 type:type,
			 unitqty:cartunitqty,
		},
		success: function(data){
			data = $.parseJSON(data); 	
			if(!data==''){
				//update_printed_quantity_box(data.qty, data.designs);
				$('#ajax_upload_content').html(data.content);
				
				intialize_progressbar();
				update_price_new_sheets();
				$("#artworks_uploads_loader").hide();
			}
		}
	});
});
function update_price_new_sheets()
{
	//$("#total_price").hide();
	
	var total_sheets_new = $("#uploaded_sheets").val();
	var productSerial = $("#productSerial").val();
	var qty = $("#Quantity_"+productSerial).val();
	var productID = $("#prd_id"+productSerial).val();
	var labels_p_sheet = $("#labels_p_sheet"+productSerial).val();
	var print_type = $("#print_type"+productSerial).val();
	var cart_id = $("#cart_id_"+productSerial).val();
	var menuid = $("#manufactureID"+productSerial).val();
	var printing = $("#printing"+productSerial).val();
	var min_qty = $("#min_qty"+productSerial).val();
	var product_type = $("#product_type"+productSerial).val();
	if(total_sheets_new == '' || total_sheets_new == 0)
	{
		total_sheets_new = qty;
		$("#Quantity_"+productSerial).val(total_sheets_new);	
	}
	else
	{
		$("#Quantity_new_"+productSerial).val(total_sheets_new);
	}
	
	if(product_type == "Integrated")
	{
		$.ajax({
			url: base+'ajax/get_box_price',
			type:"POST",
			data: {
					manufature: menuid,
					box: total_sheets_new,
					print_option: print_type,
					batch: min_qty,
					cart_id: cart_id,
					prd_id: productID
			},  
			success: function(data){
				if(!data==''){
					data = $.parseJSON(data);
					var total_price = '<b class="color-orange"> <?=symbol?>'+data.total+' </b><?=vatoption?> VAT'
					$("#total_price").html(total_price);
					intialize_progressbar();
					$("#total_price").show();
				}
			}
		});
	}
	else
	{
		$.ajax({
			url: base+'ajax/calculate_sheet_price',
			type:"POST",
			data: {
				qty: total_sheets_new,
				menuid: menuid,
				prd_id: productID,
				labels:labels_p_sheet,
				labeltype:print_type,
				printing:printing,
				cart_id:cart_id
			},  
			success: function(data){
				if(!data==''){
					data = $.parseJSON(data); 	
					$("#total_price").html(data.price);
					$("#total_price").find("br").remove();
					intialize_progressbar();
					$("#total_price").show();
				}
			}
		});
	}
}
function update_price_new_rolls()
{
	//$("#total_price").hide();
	
	var productSerial = $("#productSerial").val();
	var cart_id = $("#cart_id_"+productSerial).val();
	var id = $("#prd_id"+productSerial).val();
	var menuid =  $("#manufactureID"+productSerial).val();
	
	var qty = $("#final_uploaded_labels").val();
	if(qty == '' || qty == 0)
	{
		qty = $("#No_Labels_Original"+productSerial).val();
		$("#Quantity_new_"+productSerial).val(qty);	
		$("#Quantity_"+productSerial).val(qty);	
	}
	else
	{
		$("#Quantity_new_"+productSerial).val(qty);
	}
	
	var labelfinish = $("#finishtype"+productSerial).val();
	var labels = $("#labels_p_sheet"+productSerial).val();
	var printing = $("#print_type"+productSerial).val();
	var min_qty = parseInt($("#min_qty"+productSerial).val());
	var minlabels = parseInt($("#min_print_labels"+productSerial).val());
	var max_qty = parseInt($("#max_print_labels"+productSerial).val());
	var min_qty = parseInt(min_qty*minlabels);
	var presproof = $('#uploadedartworks_'+productSerial).attr('data-presproof');
	var upload_qty = parseInt($('#uploadedartworks_'+productSerial).attr('data-qty'));
	var artworks = parseInt($('#uploadedartworks_'+productSerial).val()); 
	
	var size = parseInt($('#diesize_'+productSerial).val()); 
	var gap = parseInt($('#gap_'+productSerial).val()); 
	var printing_enabled = $("#printing"+productSerial).val();
	
	
	var _this = this;
	$.ajax({
		url: base+'ajax/calculate_roll_price',
		type:"POST",
		async:"false",
		dataType: "html",
		data: {
			   labels: qty,
			   menuid: menuid,
			   prd_id: id,
			   max_labels:labels,
			   labelfinish:labelfinish,
			   printing:printing,
			   printing_enabled:printing_enabled,
			   size:size,
			   gap:gap,
			   presproof:presproof,
			   cart_id:cart_id,
		},
		success: function(data){
		if(!data==''){	
			data = $.parseJSON(data); 
			if(data.response=='yes'){
				$("#total_price").html(data.price);
				$("#total_price").find("br").remove();
				intialize_progressbar();
				$("#total_price").show();
				$("#aa_loader").hide();
			}
		 }
		}  
	});
}
$(document).on("click", ".roll_updater", function(event) {
	var id = $(this).attr('data-id');
	var _this = this;
	var productSerial = $("#productSerial").val();
	var size = parseInt($('#diesize_'+productSerial).val()); 
	var gap = parseInt($('#gap_'+productSerial).val()); 
	var cartid = $('#cartid').val();
	var prdid = $('#cartproductid').val();
	var labelpersheets = $('#labels_p_sheet').val();
	var type = 'rolls';
		
	var response = verify_labels_or_rolls_qty(_this);
	if(response==false){ return false;}
	var labels = $(_this).parents('.upload_row').find('.roll_labels_input').val();
	var sheets = $(_this).parents('.upload_row').find('.input_rolls').val();
	var presproof = $('#uploadedartworks_'+productSerial).attr('data-presproof');
	
	$.ajax({
		url: base+'ajax/update_material_artworks',
		type:"POST",
		async:"false",
		dataType: "html",
		data:{
			 id:id,
			 cartid:cartid,
			 productid:prdid,
			 labels:labels,
			 sheets:sheets,
			 persheet:labelpersheets,
			 type:type,
			 size:size,
			 gap:gap,
			 presproof:presproof,
		},
		success: function(data){
			data = $.parseJSON(data); 	
			if(!data==''){
				//update_printed_quantity_box(data.qty, data.designs, data.rolls);
				$('#ajax_upload_content').html(data.content);
				
				intialize_progressbar();
				
				update_price_new_rolls();
			}
		 }  
	});

});

$(document).on("click",".printed_reorder_button",function(e){
	$("#aa_loader").show();
	$("#openTrigger").val("printed_reorder");
	/*$("#add_item_reorder").trigger("click");
	$(".artworkModal1").css("visibility","hidden");
	$("#aa_loader").hide();
	
	var display = $(".add_item_reorder").css("display");
	console.log(display);
	if(display != "none")
	{
		alert("click now");
	}*/
});

$(document).on("click",".view_more_designs",function(e){
	var serialNumber = $(this).data("productid");
	$("#openTrigger").val('artwork_uploader');
	$(".continue_place_order[data-productid="+serialNumber+"]").click();
});
</script>