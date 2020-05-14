<style>
hr {
	background: #cacaca;
	color: #cacaca;
	line-height: normal;
	height: 1px !important;
	width: 100%;
	clear: both;
	display: block;
	border: 0 !important;
	margin-top: 5px;
	margin-bottom: 5px;
}
.m-t-15 {
	margin-top: 10px !important;
}
.disabled_check, .disabled_check:hover input, .disabled_check:hover input:hover {
	color: #cecece !important;
	cursor: default !important;
}
.disabled_check:hover i {
	border-color: #e5e5e5 !important;
}
.editor-checkbox-wrapper {
	margin-bottom: 5px !important;
}
.labels-form label {
	margin-bottom: 0px;
}
</style>

<div class="bgGray LBAEditor" style="padding:10px 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-9 lba-left-col">
        <div class="bg-n-border-radius lba-space" id="lba_sets_data" style="height:488px;">
          <ul class="nav nav-tabs lba-nav-tabs">
          </ul>
          <?php 
		    $labels_per_sheet = 0;
			$designdata = $this->home_model->get_user_lba_data($labelid);	
			$labeldata = $this->home_model->get_lba_one_labels_data($designdata['label_id']);
			
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
				
			$labels_per_sheet = $this->home_model->get_db_column('products','LabelsPerSheet','CategoryID',$t_code);
			//$imgsrc = LABELER."thumb/".$labeldata['image'];
			//$gotoid = $labeldata['ID'];
			
			$imgsrc = LABELER."users/".$designdata['Thumb'];
		 ?>
        
        
          <a id="triger" class="hide" data-productID="" data-CID="<?=$labeldata['category']?>" data-size="" data-shape ="<?=$labeldata['shape']?>" data-thumbnail="<?=$labeldata['full_image']?>" data-labelspersheet="<?=$labels_per_sheet?>" data-available_in="<?=$labeldata['available_in']?>" data-association="<?=$labeldata['association']?>" data-labelid="<?=$labelid?>" data-selected="<?=$isselected?>"></a>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active lba-tab-pane" id=""> <img onerror='imgError(this);' src="<?=$imgsrc?>" class="image" style="width:44%;">
              <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                <!-- Button trigger modal -->
                <button type="button" class="btn orangeBg m-t-20 edit_design"  data-label-id="<?=$labelid?>" data-selected="true"> Edit my design </button>
                <!--data-toggle="modal" data-target="#LoadFlashModal" --> 
                <!-- Modal --> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <? $design_detail = $this->home_model->get_lba_designs($labeldata['Designid']);?>
      <div class="col-md-3 lba-right-col productdetails">
        <div class="row bg-n-border-radius lba-space" style="height:488px;">
          <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-15 m-b-15">
            <p style="margin-bottom:15px">
              <?=$design_detail['description']?>
              <br>
              <?=$labeldata['size']?>
              <?=ucfirst($labeldata['type'])?>
              Label</p>
            <label class="select">
              <select name="material_adhesive" id="material_adhesive">
                <option value="">Select Material & Adhesive</option>
                <?  $matdata = explode(',',$design_detail['materials']);
                    foreach($matdata as $key => $val) {
                     $vals[$key] = trim($val);
					 $materilname = $this->home_model->get_db_column('material_tooltip_info','label_name','material_code',$vals[$key]); ?>
					 <option value="<?=$vals[$key]?>"><?=$materilname?></option>
                 <?  } ?>
              </select>
              <i></i> </label>
          </div>
          <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-15 m-b-15">
            <label class="input">
              <input name="printedsheet_input" id="printedsheet_input" class="printedsheet_input" placeholder="Qty" type="text">
            </label>
          </div>
          <div class="add_to_cart_wrapper" style="display:none;">
            <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="lba-supply"></div>
              <div class="col-md-6 roll_prices">
                <div class="row">
                  <div class="col-md-6 text-center" style="margin-bottom:15px;"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/lba-roll-thumb.jpg" class="image"> </div>
                  <div class="col-md-12">
                    <label class="check state-success supply">
                    <div class="editor-checkbox-wrapper checkbox">
                      <input type="radio" id="add_option" name="add_option" value="Rolls" class="delivery-group">
                      <i class="rounded-x"></i>On Rolls </div>
                    <span class="lba-editor-price">£80.00</span><br/>
                    <span class="vatoption">Ex</span> VAT<br/>
                    <span class="labelprice">200 Labels, £0.257 per label</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 roll_prices_more">
                <div class="row">
                  <div class="col-md-6 text-center" style="margin-bottom:15px;"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/lba-roll-thumb.jpg" class="image"> </div>
                  <div class="col-md-12">
                    <div class="editor-checkbox-wrapper checkbox disabled_check">
                      <input type="radio" id="add_option" name="add_option" value="Rolls" class="delivery-group disabled" disabled>
                      <i class="rounded-x"></i>On Rolls </div>
                    To purchase labels on rolls please enter quantity <span class="min_qty_die">100</span> or more </div>
                </div>
              </div>
              <div class="col-md-6 sheet_prices">
                <div class="row">
                  <div class="col-md-6 text-center" style="margin-bottom:15px;"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/lba-sheet-thumb.jpg" class="image"> </div>
                  <div class="col-md-12">
                    <label class="check state-success supply">
                    <div class="editor-checkbox-wrapper checkbox">
                      <input type="radio" id="add_option" name="add_option" value="Sheets" class="delivery-group">
                      <i class="rounded-x"></i>On Sheets </div>
                    <span class="lba-editor-price">£80.00</span><br/>
                    <span class="vatoption">Ex</span> VAT<br/>
                    <span class="labelprice">200 Labels, £0.257 per label</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="">
              <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" id="" class="btn orangeBg col-lg-12 col-md-12 add_to_cart" style="margin-bottom: 31px;">Add To Basket <i class="fa fa-shopping-cart"> </i></button>
              </div>
            </div>
          </div>
          <div class="calculate_button_wrapper">
            <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12  m-t-15 m-b-15">
              <button type="button" id="" class="btn orangeBg col-lg-12 col-md-12 calculate_printed">Calculate Price <i class="fa fa-calculator"> </i></button>
            </div>
          </div>
          <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-15 m-b-15" id="freedeliveryuk">
            <hr />
            <div class="text-center" style="padding:28px 16px !important;">
              <div class="clear"></div>
              <h4 style="color:#fd4913;font-size: 19px;"><b>FREE UK DELIVERY</b></h4>
              <div class="clear"></div>
              <h4 style="padding-top: 15px;">on orders over </h4>
              <p><b style="color:#fd4913;font-size: 24px;"> £25.00 </b> Inc.VAT</p>
              <div class="clear10"></div>
              
            </div>
            <hr />
          </div>
          
          <!--label summary-->
          <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12 lba-label-summary-wrapper">
            <div class="lba-label-summary-heading">Summary of selected label(s)</div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/hover-thumb-square.jpg" class="image selected_thumbnail img-responsive"> </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <input type="hidden" name="association"  value="" id="association"/>
              <input type="hidden" name="categoryID"  value="" id="categoryID"/>
              <input type="hidden" name="size"  value="" id="size"/>
              <input type="hidden" name="shape"  value="" id="shape"/>
              <input type="hidden" name="available_in"  value="" id="available_in"/>
              <input type="hidden" name="labelspersheet"  value="" id="labelspersheet"/>
              <input type="hidden" name="label_id"  value="" id="label_id"/>
              <input type="hidden" name="isselected"  value="" id="isselected"/>
              <div class="roll_data">
                <input type="hidden" name="ManufactureID"  value="" class="ManufactureID"/>
                <input type="hidden" name="ProductID"  value="" class="ProductID"/>
                <input type="hidden" name="rawprice"  value="" class="rawprice"/>
                <input type="hidden" name="max_labels"  value="" class="max_labels"/>
                <input type="hidden" value="" class="category_description"  />
              </div>
              <div class="sheet_data">
                <input type="hidden" name="ManufactureID"  value="" class="ManufactureID"/>
                <input type="hidden" name="rawprice" value="" class="rawprice"/>
                <input type="hidden" name="ProductID" value="" class="ProductID"/>
                <input type="hidden" name="max_labels"  value="" class="max_labels"/>
                <input type="hidden" value="" class="category_description"  />
              </div>
              <div class="lba-label-summary">Code: <span class="association"></span></div>
              <div class="lba-label-summary">Design Code: <span class="categoryID"></span></div>
              <div class="lba-label-summary">Size: <span class="size"></span></div>
              <div class="lba-label-summary">Shape: <span class="shape"></span></div>
            </div>
            <hr class="lba-hr">
            </hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(e) {
	$("#triger").trigger('click');
  });
</script>