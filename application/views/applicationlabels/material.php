<style>
.giveMeEllipsis {
	text-overflow: ellipsis;
	word-wrap: break-word;
	overflow: hidden;
	max-height: 3.6em;
	line-height: 1.8em;
}
.dropzone .dz-preview {
	margin: 0px;
}
.dropzone .dz-preview .dz-image {
	display: block;
	border-radius: none;
	height: 50px;
	overflow: hidden;
	position: relative;
	width: 50px;
	z-index: 10;
}
.dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
	display: block;
	height: 25px;
	width: 25px;
}
.dropzone .dz-preview.dz-image-preview .dz-details {
	display: none;
}
.dropzone .btn {
	margin-top: 10px;
	cursor: pointer;
}
.mat-ch .detail .form-control {
	padding: 6px 6px !important;
}
.discount_price {
	color: black;
	text-decoration: line-through;
	font-size: 16px;
}
.dm-selector .dropdown-menu a img {
	padding: 5px;
	background: #fff none repeat scroll 0 0;
	border: 5px solid #fff;
	border-radius: 4px;
	box-shadow: 6px 6px 6px rgba(0, 0, 0, 0.50);
	display: none;
	max-width: 189px;
	position: absolute;
	right: -189px;
	top: 0;
	width: 189px;
}
.dm-selector .dropdown-menu a:hover img {
	display: block;
}
</style>
<? 
						   $uri = explode("/",uri_string()); 
							
						   $popup_margin = '';
						   $x=explode("-",$details['CategoryName']);
						   $catname = $x[0];
						   $code = explode('.',$details['CategoryImage']);
						   
						   $newcatname = explode(" ",$details['CategoryName']);
						   $heading = $newcatname[0]." ".$newcatname[2]." ".$newcatname[3]." ".$newcatname[4]." ".$newcatname[5];
						    if($details['Shape_upd'] == "Circular"){
				   	  					$LabelSize =  str_replace("Label Size:","",$details['specification3']); 
				  			}else{
										$LabelSize =  " Width ".$details['LabelWidth']."&nbsp;&nbsp; x &nbsp;Height&nbsp; ".$details['LabelHeight'];
							}
							$Paper_size = "A4 Sheets";								  
							//$img_src = Assets."images/categoryimages/A4Sheets/".$details['CategoryImage'];
							$width = '189';
							$height = '267';
							$box_height = '';
							$pop_width = '189'; $type = "A4";
							
							$code123 = '123ManufactureID';
							
							$designcode = explode("-", $materials[0]->$code123);
							$designcode = $designcode[1];
							$colorcode = ($colour=='yes' )?'-Black':'';
							$img_src = Assets."images/categoryimages/Applications/".$materials[0]->$code123.$colorcode.'.png';
							
							if($details['specification2']=='Pack') {
								$heading = $details['CategoryName'];
								$lgview_src = Assets."images/application/packview/".$materials[0]->$code123.$colorcode.'.png';
								$LabelSize =  str_replace("Label Size:","",$details['specification3']); 
								$LabelSize =  str_replace(",","<br />",$LabelSize); 
								
							}
							
			?>

<div class="">
  <div class="container m-t-b-8 ">
    <div class="row">
      <div class="col-xs-12  col-sm-12 col-md-12 ">
        <ol class="breadcrumb  m0">
          <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
          <li><a href="<?=base_url()?>labels-by-application/">Labels By Application</a></li>
          <li><a href="<?=base_url()?>labels-by-application/<?=$uri[2]?>/">
            <?=ucfirst(str_replace("-"," ",$uri[2]))?>
            </a></li>
          <li>
            <?=$heading?>
          </li>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="panel row">
      <div class="row">
        <div class="col-xs-12  col-sm-12 col-md-12">
          <div class="col-xs-12  col-sm-12 col-md-12  ">
            <h1>
              <?=ucfirst(str_replace("-"," ",$uri[2])).' - '.$details['CategoryName']?>
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row"> 
      <!-- Projects Row -->
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
          <div class="panel panel-default">
            <div class="panel-body p-l-r-10 lbApp-pm">
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 productBg m-t-10">
                <div class="text-center m-t-b-10"> <img onerror='imgError(this);' class="img-responsive design-image" title="<?=$heading?>" alt="<?=$heading?>" src="<?=$img_src?>"> </div>
              </div>
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="m-l-5 m-t-20">
                  <h2 class="BlueHeading">
                    <?=$heading?>
                  </h2>
                  <p><strong>Label Size</strong></p>
                  <p>
                    <?=$LabelSize?>
                  </p>
                  <p><strong>Item code</strong></p>
                  <p>
                    <?=$materials[0]->$code123?>
                    <? if($colour == 'yes' ){?>
                    -<span id="colorcode">Black</span>
                    <? } ?>
                  </p>
                  <? if($details['specification2']!='Pack') {?>
                  <p><strong>Available Sizes</strong></p>
                  <div class="btn-group btn-block dm-selector">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$heading?>
                    <i aria-hidden="true" class="fa fa-sort"></i> </button>
                    <ul class="dropdown-menu">
                      <? if(isset($similar) and count($similar) > 0){
						 foreach($similar as $row){
							$loader = Assets.'images/loader.gif';
							$row->CategoryImage = str_replace(".png","-",$row->CategoryImage);
					  		$path = Assets."images/categoryimages/Applications/".$row->CategoryImage.$row->designcode.$colorcode.'.png'; 
					  		if($row->CategoryID!=$details['CategoryID']){  ?>
                      <li><a href="<?=$url.'/'.strtolower($row->CategoryID)?>/">
                        <?=$row->CategoryName?>
                        <img onerror='imgError(this);' data-src="<?=$path?>" src="<?=$loader?>" alt="<?=$row->CategoryName?>"> </a> </li>
                      <? } }}?>
                    </ul>
                  </div>
                  <? } ?>
                  <br />
                  <div class="row">
                    <? if($colour == 'yes' ){ ?>
                    <div class="col-xs-6  col-sm-6 col-md-6 m-t-15 labels-form">
                      <p><strong>Colour</strong></p>
                      <label class="select" id="">
                        <select name="colour" id="colour" data-code="<?=$materials[0]->$code123?>">
                          <option value="Black">Black</option>
                          <option value="Red">Red</option>
                          <option value="Green">Green</option>
                          <option value="Blue">Blue</option>
                        </select>
                        <i></i> </label>
                    </div>
                    <?  } ?>
                    <? if($details['specification2']=='Pack') {?>
                    <div class="col-xs-4  col-sm-6 col-md-4 m-t-30"> <a data-target=".largeview" data-toggle="modal" class="btn orangeBg " role="button" > <i class="fa f-28 fa-search-plus"></i> Enlarge View </a> </div>
                    <? }else{ ?>
                    <div class="col-xs-4  col-sm-6 col-md-4 m-t-30"> <a data-target=".layout" data-toggle="modal" class="btn blueBg " role="button" > <i class="fa f-28 fa-search-plus"></i> Layout </a> </div>
                    <? } ?>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
          <? count($designs); if(isset($designs) and count($designs) > 2){?>
          <div class="panel panel-default lba-mat-slider">
            <div class="panel-body p-l-r-10">
              <h2 class="text-center">Other Designs</h2>
              <div class="col-xs-1 no-padding"></div>
              <div class="col-xs-10 no-padding">
                <div class="lbApp-pm lbp-s">
                  <div class="pSlider p-t-10 ">
                    <div class="carousel lba-mat slide" id="carouselLBA">
                      <div class="carousel-inner">
                        <?  $class = 'active';
                               foreach($designs as $row){
                                   if($designcode!==$row->designcode){
                                      $row->CategoryImage = str_replace(".png","-",$row->CategoryImage);
                                      $img_src1 = Assets."images/application/design/".$row->designcode.'.png';  ?>
                        <div class="item <?=$class?> ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="thumbnail">
                              <div class="imgBg  text-center"> <img onerror='imgError(this);' class="img-responsive" src="<?=$img_src1?>" alt="<?=$heading?>" title="<?=$heading?>"> </div>
                              <div class="clear"></div>
                              <div class="caption3 text-center">
                                <p><strong>Design Code</strong></p>
                                <p>
                                  <?=$row->designcode?>
                                </p>
                                <a href="<?=$url.'/'.strtolower($row->CategoryID)?>/" class="btn-block btn-sm btn orange" role="button" > <i class="fa fa-arrow-circle-right"></i> Select Designs </a> </div>
                              <div class="clear"></div>
                            </div>
                          </div>
                        </div>
                        <? $class = ''; } }?>
                      </div>
                      <a class="left carousel-control" href="#carouselLBA" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> <a class="right carousel-control" href="#carouselLBA" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> </div>
                    <div class="clear"></div>
                  </div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="col-xs-1 no-padding"></div>
            </div>
          </div>
          <? }else{?>
          <div class="panel panel-default">
            <div class="panel-body p-l-r-10">
              <div id="designer_intro" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-20 ">
                <div>
                  <div class="panel orange-bottom padding-10 print-ad3 " style="border:solid 1px #fd4913">
                    <div>
                      <h2 class=" color-orange m0"> <b>AT AA LABELS</b> </h2>
                      <b class=" line-height-normal">WE PRODUCE A RANGE OF LABELS SUITABLE FOR ALL INKJET ROLL LABEL PRINTERS </b> </div>
                    <div class="col-md-7 p0">
                      <h4 class=" color-orange"> INKJET PRINTERS </h4>
                      <small class="line-height-normal"> You can check label material  and size compatibility by printer model, or contact our 
                      customer care team to discuss your label requirements.</small> </div>
                    <div class="col-md-5">
                      <div class="m-t-10"> <img onerror='imgError(this);' src="<?=Assets?>images/printer-ad-2.png" class="img-responsive " style="height:140px;" alt="Epson Printer"> </div>
                    </div>
                    <div class="phone m-t-30 clear  "> <i class="fa fa-phone"></i> 01733 808 420 </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?  } ?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="">
        <div class="panel panel-default row">
          <div class="panel-body">
            <div class="mat-ch">
              <h3 class="mat-ch-title">Material Details</h3>
              <div class="colors_data">
                <? 
				
				$quantitytype = 'Sheet';
				$packsize = 1;
						
				if($details['specification2']=='Pack'){
						//$labels = $details['123CategoryName'];
						
						
						$quantitytype = 'Pack';	
						$packsize = trim(str_replace("Sheets","",$details['specification1']));
				}
								
								
				
				 foreach($materials as $rec){
							if(preg_match("/Circular/i",$rec->Shape) || preg_match("/Oval/i",$rec->Shape)){
								$img_class = 'img-circle';
							}else{
								$img_class = 'img-Sheet';
							}
							
							
							$pname=explode('-',$rec->ProductName);
							
							if($rec->Adhesive=='Removable' || $rec->Adhesive=='Peelable'){
								$adhesive="Peelable";
							}else{
                                 $adhesive=$rec->Adhesive;
                            }
							
							$min_qty = '1';
							$max_qty = '50000';
							
						
		
							$words = preg_split("/[\s,]+/", $adhesive);
							
							$desc = $rec->ProductCategoryName.". ".$rec->Appearance;
                    		
							$comp = $this->home_model->check_compatibility($rec->SpecText7,$rec->ProductBrand);
							
							$rec->Image1 = str_replace(".gif",".png",$rec->Image1);
							
							
							$max_length = 130;
							if (strlen($desc) > $max_length){
							     $offset = ($max_length - 3) - strlen($desc);
							     $short_desc = substr($desc, 0, strrpos($desc, ' ', $offset)) . '...';
								 $short_desc .= ' to read more place the <a style="cursor:pointer;" title="'.$desc.'"> cursor here.</a>';
							}else{
								 $short_desc = $desc;
							}
							
						
						if (preg_match("/A4 Labels/is", $rec->ProductBrand) and ( preg_match("/WPEP/i", $rec->ManufactureID))) {
						   $short_desc = $short_desc.' <br /> <strong style="color:#fd4913"> Special Offer Save 40% While Stocks Last </strong> ';
						}
								
							
		 		 ?>
                <div class="detail">
                  <div class="row inner">
                    <div class="col-lg-1 col-md-1 col-sm-12 samp text-center"> <img onerror='imgError(this);' class="<?=$img_class?>" src="<?=Assets?>images/material_images/<?=$rec->Image1?>" width="46" height="46" alt="<?=$pname[0]?>"> </div>
                    <div class="col-lg-11 col-md-11 col-sm-12 cont">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <h4 id="prd_name<?=$rec->ProductID?>">
                          <?=$pname[0]?>
                        </h4>
                        <p>
                          <?=$short_desc?>
                        </p>
                        <div class="clear5"></div>
                        <div class="col-md-7 p0">
                          <? if($comp!=''){?>
                          <p ><strong class="comp"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Compatible with:</strong> <small >
                            <?=$comp?>
                            </small> </p>
                          <? } ?>
                        </div>
                        <div class="col-md-5 p0"> <a href="#" id="<?=$rec->ProductID?>" class="technical_specs" data-target=".material" data-toggle="modal" 
                     data-original-title="Tecnial Specification" style="font-size: 12px" > <i aria-hidden="true" class="fa fa-search-plus"></i> <strong> View Material Specification</strong> </a> </div>
                        <div class="pull-right LabelTag <?=str_replace(".png","",$rec->Image1)?> no-margin">
                          <?=$adhesive?>
                          <br>
                          <small>Adhesive</small> </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                          <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row" id="calculations_box<?=$rec->ProductID?>">
                                  <div class="col-lg-8 col-md-8 col-sm-12 add"> <b>Add number of
                                    <?=$quantitytype.'s'?>
                                    </b>
                                    <div class="clear"></div>
                                    <div class="">
                                      <input type="text" onfocus="show_calculate_btn(<?=$rec->ProductID?>);" id="sheet_qty_<?=$rec->ProductID?>" 
                                    class="form-control allownumeric" maxlength="5" placeholder="+<?=$min_qty?>" />
                                    </div>
                                    <div class="clear"></div>
                                    <small>Minimum order
                                    <?=$min_qty.' '.$quantitytype?>
                                    </small> </div>
                                  <div class="clear"></div>
                                  <div class="col-lg-12 col-md-12 col-sm-12 del-f"> <small id="save_txt<?=$rec->ProductID?>">&nbsp;</small>
                                    <div id="delivery_txt<?=$rec->ProductID?>" class="clear " style="font-size:11px; "></div>
                                    &nbsp;</div>
                                </div>
                                <input type="hidden"  id="labels_p_sheet<?=$rec->ProductID?>"  value="<?=$rec->LabelsPerSheet?>"  />
                                <input type="hidden"  id="min_qty<?=$rec->ProductID?>"  value="<?=$min_qty?>"  />
                                <input type="hidden"  id="max_qty<?=$rec->ProductID?>"  value="<?=$max_qty?>"  />
                              </div>
                              <div class="clear10"></div>
                            </div>
                          </div>
                          <div class="col-lg-5 col-md-5 col-sm-12 text-right right-col">
                            <div id="price_box_<?=$rec->ProductID?>" style="display:none;" >
                              <table width="100%" cellspacing="0" cellpadding="0" border="0" class="price">
                                <tbody>
                                  <tr class="total">
                                    <td  class="text-left">&nbsp;</td>
                                    <td><div class="price" id="price_<?=$rec->ProductID?>">&nbsp;</div>
                                      <div class="clear"></div></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" class="text-right"><div class="priceText" id="priceText_<?=$rec->ProductID?>">&nbsp;</div></td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="clear10"></div>
                            </div>
                            <button id="add_btn<?=$rec->ProductID?>" onclick="add_item('<?=$rec->ProductID?>','<?=$rec->ManufactureID?>');"
                class="btn orangeBg" style="display:none;" type="button"> Add to basket <i class="fa fa-calculator"></i> </button>
                            <button id="cal_btn<?=$rec->ProductID?>" onclick="calculate_sheet_price('<?=$rec->ProductID?>','<?=$rec->ManufactureID?>');"
                           class="btn orangeBg" type="button"> Calculate Price <i class="fa fa-calculator"></i> </button>
                            <div class="clear10"></div>
                            <a href="#" id="<?=$rec->ManufactureID?>" data-labels="<?=$rec->LabelsPerSheet?>" class="price_breaks" 
                       data-target=".pbreaks"  data-toggle="modal" data-original-title="Volume Price Breaks"><i aria-hidden="true" class="fa fa-plus-circle"></i> View volume price breaks</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?  }   ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?	 if($details['specification2']=='Pack') {?>
<!-- large view popup -->
<div class="modal fade largeview aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Enlarge View</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div><img onerror='imgError(this);' src="<?=$lgview_src?>" class="img-responsive"  /></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- large view popup -->
<? } ?>

<!-- Layout modal -->
<div class="modal fade layout aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Label Layout</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div id="ajax_layout_spec" class="">
            <? include_once(APPPATH.'views/material/layout_popup.php')?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Layout modal --> 

<!-- Material Detail modal -->
<div class="modal fade material aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
        <h4 id="myModalLabel" class="modal-title">AA Labels Technical Specification - <span id="mat_code"></span> <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
      </div>
      <div class="">
        <div >
          <div class="col-md-3 text-center"> <img onerror='imgError(this);' id="material_popup_img" src="" alt="<?=$catname?>" title="<?=$catname?>" width="46" height="46"  class="m-t-b-10 img-Sheet-material"> </div>
          <div class="col-md-9">
            <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
              <div class="loading-gif text-center" style="top:26%;left:29%;<?=$popup_margin?>"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:63px; " alt="AA Labels Loader"> </div>
            </div>
            <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>
            <div class="bgGray p-l-r-10"> <small> This summary materials specification for this adhesive label is based on information obtained from the original material manufacturer and is offered in good faith in accordance with AA Labels terms and conditions to determine fitness for use as sheet labels (A4, A3 &amp; SRA3) produced by AA Labels. No guarantee is offered or implied. It is the user's responsibility to fully asses and/or test the label's material and determine its suitability for the label application intended. Measurements and test results on this label's material are nominal. In accordance with a policy of continuous improvement for label products the manufacturer and AA Labels reserves the right to amend the specification without notice. A <a href="<?=base_url()?>labels-materials/">full material specification</a> can be found in the Label Materials section accessed via the Home Page <br>
              Copyright&copy; AA labels 2015</small> </div>
          </div>
        </div>
      </div>
      <div  class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Material Detail modal --> 

<!-- Sample Order implementation -->
<div class="modal fade pbreaks aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>VOLUME PRICE BREAKS
            <?=strtoupper($Paper_size)?>
            </b> <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div class="text-center">
            <div id="price_loader" class="white-screen hidden-xs" style="display:none;">
              <div class="loading-gif text-center" style="top:26%;left:29%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:63px;" alt="AA Labels Loader"> </div>
            </div>
            <div class="table-res" id="ajax_price_breaks"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>




$(document).on("change", "#colour", function(e) {
	//var selectedText = $(this).find('option:selected').text();
	var value = $(this).val();
	var imagecode = $(this).attr('data-code');
	$('#colorcode').text(value);
	var imagecode = imagecode+'-'+value;
	$('.design-image').attr("src","<?=Assets?>images/categoryimages/Applications/"+imagecode+".png");
	
	//
	
});

$(document).on("click", ".price_breaks", function(e) {
	var id = $(this).attr('id');
	var labels = $(this).attr('data-labels');
	$('#ajax_price_breaks').html('');
	$('#price_loader').show();
			$.ajax({
				url: base+'ajax/labels_price_breaks',
				type:"POST",
				async:"false",
				data:{mid:id,labels:labels,type:'application'},
				dataType: "html",
				success: function(data){
						if(!data==''){	
								data = $.parseJSON(data); 
									   setTimeout(function(){
										  $('#price_loader').hide();
										  $('#ajax_price_breaks').html(data.html);
									  },500);
						}
				  }  
		});
});
/******************Sample Order implementation***********************/
$(document).on("click", ".technical_specs", function(e) {
	var id = $(this).attr('id');
	$('#ajax_tecnial_specifiacation').html('');
	$('#mat_code').html('');
	$('#specs_loader').show();
			$.ajax({
				url: base+'ajax/material_popup/'+id,
				type:"POST",
				async:"false",
				dataType: "html",
				success: function(data){
						if(!data==''){	
						   data = $.parseJSON(data); 
						   $('#material_popup_img').attr('src',data.src);
						   setTimeout(function(){
							  $('#specs_loader').hide();
							  $('#ajax_tecnial_specifiacation').html(data.html);
							   $('#mat_code').html(data.mat_code);
						  },500);
						}
				  }  
			});
	
});

function show_calculate_btn(id){
	
	$('#cal_btn'+id).show();
	$('#add_btn'+id).hide();
	$('#price_box_'+id).hide();
	
}





function calculate_sheet_price(id,menuid){
	
	var qty = $('#sheet_qty_'+id).val();
	var labels = $('#labels_p_sheet'+id).val();
	var min_qty = parseInt($('#min_qty'+id).val());
	var max_qty = parseInt($('#max_qty'+id).val());
	
	if(qty < min_qty || qty > max_qty){
			alert_box('Please enter quantity from '+min_qty+' to '+max_qty);
	}else{
		
		 $.ajax({
				url: base+'ajax/calculate_sheet_price',
				type:"POST",
				async:"false",
				dataType: "html",
				data: {  qty: qty,menuid: menuid,prd_id: id,labels:labels},
				success: function(data){
				if(!data==''){	
					data = $.parseJSON(data); 
					if(data.response=='yes'){
						
							$('#cal_btn'+id).hide();
							$('#add_btn'+id).show();
							
							$('#save_txt'+id).html(data.save_txt);
							$('#delivery_txt'+id).html(' <i class="cBlue f-20 fa fa-truck"></i> '+data.delivery_txt);
							  
							$('#price_'+id).html(data.price);
							$('#priceText_'+id).html(data.labelprice);
							
							$('#price_box_'+id).show();
		
					}
					
					}
				 }  
			});
	}
}

function add_item(id,menuid){
	
		var qty = $('#sheet_qty_'+id).val();
		var labels = $('#labels_p_sheet'+id).val();
		var min_qty = parseInt($('#min_qty'+id).val());
		var max_qty = parseInt($('#max_qty'+id).val());
		var prd_name = $('#prd_name'+id).text();
		var colour = $('#colour').val();
		if(qty < min_qty || qty > max_qty){
			alert_box('Please enter quantity from '+min_qty+' to '+max_qty);
		}
		else{
					  $.ajax({
						url: base+'ajax/add_to_cart',
						type:"POST",
						async:"false",
						dataType: "html",
						data: {  qty: qty,menuid: menuid,prd_id:id,colour:colour},
						success: function(data){
						if(!data==''){	
								data = $.parseJSON(data); 
								if(data.response=='yes'){
										fireRemarketingTag('Add to cart');
										popup_messages(menuid+' - '+prd_name);
										$('#cart').html(data.top_cart);
						     	}
							}
						 }  
					});
		}
		
}

function fireRemarketingTag(page){
	<? if(SITE_MODE=='live'){?>
			dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype' : page});
	<? } ?>
}
</script> 
<script>
	  
(function(){
  $('.lba-mat .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<2;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());


</script>