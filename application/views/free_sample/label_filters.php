<div class="row">
  <div class="lf-pos">
    <div class="thumbnail orange-bottom no-margin no-padding-bottom" style="min-height: 73px;">
      <div class="finderNote row fnTop">
        <div class="col-md-12 text-center">
          <p class="no-margin">The label filter enables you to select and view products that closely match your search criteria through the use of search tools. Click on the “VIEW FILTERS”  button below to begin using.</p>
        </div>
      </div>
      <form class="labels-form labels-filters-form  m-t-10">
        <input type="hidden" value="finder"  id="page_type"   />
        <input type="hidden" value="product"  id="view"   />
        <input type="hidden" value="<?=(isset($printer_width) and $printer_width!='')?$printer_width:''?>"  id="printer_width"   />
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div id="categorybox" class="col-lg-12 col-md-12 col-sm-12">
            <!--<div class="labelF"> Label Category </div>-->
            <label class="select">
              <select id="newcategory" name="category" autocomplete="off">
                <option value="">Label Category</option>
                <option <? if($category=='A5'){ echo 'selected="selected"';}?>      value="A5">Labels on A5 Sheet</option>
                <option <? if($category=='A4'){ echo 'selected="selected"';}?>      value="A4">Labels on A4 Sheet</option>
                <option <? if($category=='Avery'){ echo 'selected="selected"';}?>   value="Avery">Labels on A4 Sheets - Avery Sizes</option>
                <option <? if($category=='A3'){ echo 'selected="selected"';}?>      value="A3">Labels on A3 Sheet</option>
                <option <? if($category=='SRA3'){ echo 'selected="selected"';}?>    value="SRA3">Labels on SRA3 Sheet</option>
                <option <? if($category=='Roll'){ echo 'selected="selected"';}?>    value="Roll">Labels on Roll</option>
                <option <? if($category=='thermal'){ echo 'selected="selected"';}?> value="thermal">Labels for Thermal Printers</option>
                <option <? if($category=='Integrated'){ echo 'selected="selected"';}?> value="Integrated">Integrated Labels</option>
              </select>
              <i></i> </label>
          </div>
          <div style="display:none;" class="col-lg-6 col-md-6 col-sm-12 integratedbrands">
            <div class="labelF"> Brand Compatible </div>
            <label class="select">
              <select id="brands" name="brands" autocomplete="off" class="nlabelfilter">
                <option value="">Select Brand</option>
                <?php  if(isset($compatible) and $compatible=='yes' and isset($catdata['CategoryName'])){?>
                <option selected="selected" value="<?=$catdata['CategoryName']?>">
                <?=$catdata['CategoryName']?>
                </option>
                <? }?>
              </select>
              <i></i> </label>
          </div>
          <div style="display:none;" class="col-lg-4 col-md-4 col-sm-12 thermaloptions">
            <div class="labelF"> Manufaturer </div>
            <label class="select">
              <select id="manufaturer" name="manufaturer" autocomplete="off">
                <option value="">Select Manufaturer</option>
                <?  if(isset($make_option) and $make_option!='') echo $make_option; ?>
              </select>
              <i></i> </label>
          </div>
          <div style="display:none;" class="col-lg-4 col-md-4 col-sm-12 thermaloptions">
            <div class="labelF"> Model </div>
            <label class="select">
              <select id="model" name="model" class="nlabelfilter" autocomplete="off">
                <option value="">Select Model</option>
                <?  if(isset($model_option) and $model_option!='') echo $model_option; ?>
              </select>
              <i></i> </label>
          </div>
          <div class="clear"></div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="shape_text" class="labelF"> Label Shapes </div>
            <!-- <div class="tooltip fade top in" role="tooltip" style="top:-12px; left:-28px; display:block">Single Integrated</div>-->
            <input type="hidden" id="shape" value="<?=($shape)?$shape:''?>" />
            <div id="shapes_box">
              <button type="button" disabled="disabled" class="btn_shape circular"  data-toggle="tooltip" title="Circular"></button>
              <button type="button" disabled="disabled" class="btn_shape rectangle" data-toggle="tooltip" title="Rectangle"></button>
              <button type="button" disabled="disabled" class="btn_shape square"    data-toggle="tooltip" title="Square"></button>
              <button type="button" disabled="disabled" class="btn_shape oval"      data-toggle="tooltip" title="Oval"></button>
              <button type="button" disabled="disabled" class="btn_shape star"      data-toggle="tooltip" title="Star"></button>
              <button type="button" disabled="disabled" class="btn_shape heart"     data-toggle="tooltip" title="Heart"></button>
              <button type="button" disabled="disabled" class="btn_shape triangle"  data-toggle="tooltip" title="Triangle"></button>
            </div>
          </div>
          <div class="clear15"></div>
          <div id="width_box" class="col-lg-6 col-md-6 col-sm-12">
            <div id="width_box_text" class="labelF"> Label Width <small>(mm)</small></div>
            <div class="">
              <label class="input pull-left" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Min width" id="width_min" name="width_min">
              </label>
              <label class="input pull-right" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Max width" id="width_max" name="width_max">
              </label>
            </div>
            <div class="lablefilterslider" style="clear:left;">
              <div id="width_slider" class="slider sliderRange sliderBlue"></div>
            </div>
          </div>
          <div id="height_box" class="col-lg-6 col-md-6 col-sm-12">
            <div class="labelF"> Label Height <small>(mm)</small></div>
            <div class="">
              <label class="input pull-left" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Min height" id="height_min" name="height_min">
              </label>
              <label class="input pull-right" style="width:40%">
                <input type="text" class="control_input allowdecimal" placeholder="Max height" id="height_max" name="height_max">
              </label>
            </div>
            <div class="lablefilterslider" style="clear:left;">
              <div id="height_slider" class="slider sliderRange sliderBlue"></div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 m-t-15 m-b-30">
            <label class="checkbox">
              <input type="checkbox" id="opposite_dimension" checked="checked"  name="opposite_dimension" value="0" class="textOrange">
              <i></i> Include opposite dimensions in the search criteria e.g. Height for Width </label>
          </div>
          <div id="cornerradius_box" class="col-lg-12 col-md-12 col-sm-12 m-t-15 no-padding" style="display:none;">
            <div class="col-lg-3 col-md-3 col-sm-12 no-margin-left m-t-15 labelF"> Corner Radius </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
              <label class="select">
                <select name="cornerradius" id="cornerradius" class="nlabelfilter">
                  <option  value="">Select Label Corner</option>
                  <option value="sharp">Sharp corner</option>
                  <option value="rounded">Rounded corner</option>
                </select>
                <i></i> </label>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 selected_material_box">
          <div class="mat-sep-2017">
            <div class="selected-product">
              <h3 class="group_name">Your Material Selection</h3>
              <div class="row selected-mat m-t-10" style="display:flex;">
                <div class="col-lg-5 col-md-5 col-sm-3 col-xs-4 pr-thumb text-center">
                  <? if($category=='Roll'){  $imagepath = Assets.'images/material_images/roll/'.$info['material_code'].'.png';}
							else{$imagepath = Assets.'images/material_images/sheets/'.$info['material_code'].'.png';}?>
                  <img onerror='imgError(this);' src="<?=$imagepath?>" class="sm-th img-responsive" /> </div>
                <div class="col-lg-7 col-md-7 col-sm-9 col-xs-8">
                  <h2 class="pr-title">
                    <?=$info['short_name']?>
                  </h2>
                  <div class="pr-detail">
                    <p>
                      <?=$info['tooltip_info']?>
                    </p>
                    <a href="#" id="<?=$productid?>" class="technical_specs_header" data-target=".material"
                                     data-toggle="modal" data-original-title="Tecnial Specification"> <i class="fa fa-info-circle"></i> View Material Specification</a>
                    <div class="clear10"></div>
                    <?php
					$url = base_url().$this->uri->segment(1)."/".$this->uri->segment(2);
					?>
                    <button class="btn blue2 pull-right edit_material_option" type="button" data-url="<?=$url?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Back to Materials </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 material_filter_box" style="display:none;">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="labelF"> Label Finish </div>
            <label class="select">
              <select name="finish" id="finish" class="nlabelfilter">
                <option value="<?=$LabelFinish?>">Select Labels Finish</option>
              </select>
              <i></i> </label>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="labelF"> Label Colour </div>
            <label class="select">
              <select name="color" id="color" class="nlabelfilter">
                <option value="<?=$LabelColor?>">Select Labels Colour </option>
              </select>
              <i></i> </label>
          </div>
          <div class="clear"></div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="labelF"> Label Adhesive </div>
            <input type="hidden" id="adhesive" value="<?=$Labeladhesive?>" />
            <div id="adhesive_box">
              <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
              <label>Permanent</label>
              <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
              <label>Freezer</label>
              <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
              <label>High Tack</label>
              <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
              <label>Peelable</label>
              <input class="adhesive_checkbox" disabled="disabled" type="checkbox">
              <label>Re-Sealable</label>
            </div>
          </div>
          <div class="clear25"></div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="labelF"> Label Material </div>
            <label class="select">
              <select name="material" id="material" class="nlabelfilter">
                <option value="<?=$ColourMaterial?>">Select Labels Material</option>
              </select>
              <i></i> </label>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="labelF"> Printer / Copier Type </div>
            <label class="select">
              <select name="printer" id="printer"  class="nlabelfilter">
                <option value="">Select Printer / Copier Type</option>
              </select>
              <i></i> </label>
          </div>
          <div class="clear"></div>
          <div class="col-lg-8 col-md-8 col-sm-12 m-t-15">
            <div class="cBlueF no-margin no-padding sizefound">
              <p class="no-padding"> <span id="label_counter1">0</span>
                <label style=" font-weight:normal;" class="viewtype">Products</label>
                found</p>
            </div>
            <div class="clear5"></div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12  m-t-15"> <a href="javascript:void(0);" class="btn btn-block blue2 reset_button" role="button"> <i class="fa fa-refresh"></i> Reset</a>
            <div class="clear10"></div>
          </div>
        </div>
        <div class="clear"></div>
        <div class="col-lg-12 col-md-12 col-sm-12" style="display:none">
          <div class="col-lg-4 col-md-3 col-sm-12"> </div>
          <div class="col-xs-5">
            <div class=" cBlueF">
              <p class=""> <span id="label_counter1">0</span>
                <label style=" font-weight:normal;" class="viewtype">Products</label>
                found</p>
            </div>
          </div>
          <div class="col-xs-2 res-btn m-t-20 m-b-20 pull-right"> <a href="javascript:void(0);" class="btn btn-block blue2 reset_button" role="button"> <i class="fa fa-refresh"></i> Reset</a> </div>
        </div>
        <div class="clear"></div>
        <input type="hidden" value="0" id="product_count" />
        <input type="hidden" value="0" id="start_limit" />
        <!--<div class="clear"></div>
          <div class="finderNote row">
          <div class="col-md-12 text-center">
           <b>Define or expand your search further</b>
          <div class="clear"></div>
          <p class="no-margin">
          The label filter enables you to select and view products that closely match your search criteria through the use of search tools.</p>
          </div>
        </div>-->
      </form>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
      <button class="show-h"><span><i aria-hidden="true" class="fa fa-bars"></i>
      <div class="clea"></div>
      HIDE FILTERS</span></button>
    </div>
  </div>
</div>
