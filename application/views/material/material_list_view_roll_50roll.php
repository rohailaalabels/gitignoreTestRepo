<?    
			
			//PGCR  PGCP
 			
			$a4_prints = $this->home_model->get_digital_printing_process('Roll');
			foreach($materials as $rec){
							
		
		if($details['Shape'] == "Rectangle")
		{
			$l_group = $this->home_model->get_rectangle_group($details['LabelWidth'], $details['LabelHeight']);
		}
		
		$type = 'Rolls';	
		$condition = " type LIKE '".$type."' AND finish_type LIKE '".$rec->LabelFinish."' AND material_type LIKE '".$rec->ColourMaterial."'";
		$colours = $this->home_model->grouping_material_colours($condition);	
		$grouped_adhesive = $this->home_model->grouping_material_adhesive($condition);
		
		$cryogenic =$this->home_model->search_adhesive_in_array($grouped_adhesive, 'Adhesive', 'Cryogenic');
		$freezer =$this->home_model->search_adhesive_in_array($grouped_adhesive,   'Adhesive', 'Freezer');
		$heatrest =$this->home_model->search_adhesive_in_array($grouped_adhesive,  'Adhesive', 'Heat Resistant');
		$hightack =$this->home_model->search_adhesive_in_array($grouped_adhesive,  'Adhesive', 'High Tack');
		$permanent =$this->home_model->search_adhesive_in_array($grouped_adhesive, 'Adhesive', 'Permanent');
		$removable =$this->home_model->search_adhesive_in_array($grouped_adhesive, 'Adhesive', 'Peelable');
		$sealable =$this->home_model->search_adhesive_in_array($grouped_adhesive,  'Adhesive', 'Resealable');
		$superperm =$this->home_model->search_adhesive_in_array($grouped_adhesive, 'Adhesive', 'Super Permanent');		
		$waterres =$this->home_model->search_adhesive_in_array($grouped_adhesive,  'Adhesive', 'Water Resistant');	

		$keys = array_keys($colours);
		$last = end($keys);

		if(isset($colours[$last]->LabelColor) and $colours[$last]->LabelColor != $rec->LabelColor and count($colours) > 1 and empty($productid)){
			$condition = " LabelFinish LIKE '".$rec->LabelFinish."' AND ColourMaterial LIKE '".$rec->ColourMaterial."' 
			AND LabelColor LIKE '".trim($colours[$last]->LabelColor)."' AND CategoryID LIKE '".$rec->CategoryID."' 
			AND Adhesive LIKE '".$rec->Adhesive."'";
			$result = $this->db->query("Select * from products where $condition LIMIT 1")->result();
			if(count($result) > 0){
				$rec = $result[0];
			}
		}
		$min_qty = $this->home_model->min_qty_roll($rec->ManufactureID);
		$max_qty = $this->home_model->max_qty_roll($rec->ManufactureID);
		
		$max_labels = $this->home_model->max_total_labels_on_rolls($rec->LabelsPerSheet);
		$min_labels_per_roll = $this->home_model->min_labels_per_roll($min_qty);
		
		$material_code = $this->home_model->getmaterialcode(substr($rec->ManufactureID,0,-1));
		//$mat_image = Assets.'images/material_images/Roll/'.$material_code.'.png';
		$mat_image = Assets."images/categoryimages/RollLabels/outside/".$rec->ManufactureID.".jpg";
		if(isset($wound_option) and $wound_option == 'Inside' and strcasecmp(substr($subcat, 0, -2), substr($wound_cate, 0, -2)) == 0)
		{
			$mat_image = Assets."images/categoryimages/RollLabels/inside/".$rec->ManufactureID.".jpg";
		}
		
		/*
		if(!getimagesize($mat_image))
		{
			if($details['Shape_upd'] =="Rectangle")
			{
				$mat_image = Assets.'images/material_images/Roll/rectangle/'.$l_group.'/'.$material_code.'.png';
			}
			else
			{
				$mat_image = Assets.'images/material_images/Roll/'.strtolower($details['Shape'])."/".$material_code.'.png';
			}
		}
		*/
		
		$materialinfo = $this->db->query("Select * from material_tooltip_info WHERE material_code LIKE '".$material_code."'")->row_array();
		$desc = (isset($materialinfo['tooltip_info']) and $materialinfo['tooltip_info']!='')?$materialinfo['tooltip_info']:'';
		$rec->Material1 = (isset($materialinfo['short_name']) and $materialinfo['short_name']!='')?$materialinfo['short_name']:'';
		$group_name = (isset($materialinfo['group_name']) and $materialinfo['group_name']!='')?$materialinfo['group_name']:'';
		
		if (preg_match("/WASP/i", $rec->ManufactureID)) {
			$comp = 'Commercial Inkjet (UV Inks Only), many  Laser (but not all, sample and test advised) and Thermal Transfer Printers.'; 
		}
		
		$max_length = 150;
		if (strlen($desc) > $max_length){
			 $offset = ($max_length - 3) - strlen($desc);
			 $short_desc = substr($desc, 0, strrpos($desc, ' ', $offset)) . '...';
			 $short_desc .= ' <a style="cursor:pointer;" data-toggle="tooltip-product" data-placement="top" data-original-title="'.$desc.'"><i>Read More</i></a>';
		}else{
			 $short_desc = $desc;
		}
		
		$promotion = '';
		if (preg_match("/HGP/i", $rec->ManufactureID)) {
			  $promotion =' <br /> <strong style="color:#fd4913"> Special Offer Save 30% While Stocks Last </strong> ';
		} 
		
		$comp = $this->home_model->grouping_compatiblity($rec->SpecText7 , 'roll');
		
		if(isset($max_diameter) and $max_diameter!=0 ){
			$total_labels = $this->home_model->get_max_labels_printer($rec->ManufactureID,$rec->LabelsPerSheet, $max_diameter, $Labelsgap, $height);
			if(isset($total_labels) and $total_labels!=0 and $total_labels <= $rec->LabelsPerSheet){ $rec->LabelsPerSheet = $total_labels; }
		} 
		 		 ?>
<section  data-mat-filters="<?=$rec->ColourMaterial?>" data-reset="reset" >
  <div class="row productdetails roll-products" data-value="<?=$rec->ProductID?>" data-finish="<?=$rec->LabelFinish?>" 
        data-material="<?=$rec->ColourMaterial?>" >
    <div class="hiddenfields" >
      <input type="hidden" value=""  class="cart_id"  />
      <input type="hidden" value="<?=$rec->ProductID?>" class="product_id"  />
      <input type="hidden" value="<?=$rec->ManufactureID?>" class="manfactureid"  />
      <input type="hidden" value="<?=$rec->LabelsPerSheet?>" class="LabelsPerSheet"  />
      <input type="hidden" value="" class="digitalprintoption"  />
      <input type="hidden" value="<?=$min_labels_per_roll?>"  class="minimum_printed_labels"  />
      <input type="hidden" value="<?=$max_labels?>"  class="maximum_printed_labels"  />
      <input type="hidden" value="<?=$min_qty?>"  class="minimum_quantities"  />
      <input type="hidden" value="<?=$max_qty?>"  class="maximum_quantities"  />
      <input type="hidden" value="0" data-qty="0" data-presproof="0" data-rolls="0"  id="uploadedartworks_<?=$rec->ProductID?>"  />
      <input type="hidden" value="<?=$rec->Printable?>"  class="PrintableProduct"  />
      <input type="hidden" value="1" class="orientation"  />
      <input type="hidden" value="<?=$rec->ProductCategoryName?>" class="category_description"  />
    </div>
    <article class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mat-detail">
      <div class="pr-detail"> <span class="group_name">
        <?=$group_name?>
        </span><br />
        <span class="product_name">
        <?=$rec->Material1?>
        </span> <font class="product_description">
        <?=$short_desc?>
        <?=$promotion?>
        </font> </div>
      <div class="clear"></div>
      <div class="row specs">
        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3"> <img class="img-responsive product_material_image" src="<?=$mat_image?>" > </div>
        <div class="col-lg-9 col-md-9 col-sm-10 col-xs-8">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-5">
              <div class="labels-form">
                <label class="select no-margin">
                  <select class="product_adhesive" >
                    <option value="" disabled="disabled" selected="selected">Select Adhesive </option>
                    <option <?=$cryogenic?> <?=($rec->Adhesive=='Cryogenic')?'selected="selected"':''?>  
                                 value="Cryogenic">Cryogenic</option>
                    <option <?=$freezer?>   <?=($rec->Adhesive=='Freezer')?'selected="selected"':''?>  
                                 value="Freezer">Freezer</option>
                    <option <?=$heatrest?> <?=($rec->Adhesive=='Heat Resistant')?'selected="selected"':''?>  
                                 value="Heat Resistant"> Heat Resistant</option>
                    <option <?=$hightack?> <?=($rec->Adhesive=='High Tack')?'selected="selected"':''?>  
                                 value="High Tack">High Tack</option>
                    <option <?=$permanent?> <?=($rec->Adhesive=='Permanent')?'selected="selected"':''?>  
                                 value="Permanent">Permanent</option>
                    <option <?=$removable?> <?=($rec->Adhesive=='Peelable')?'selected="selected"':''?>  
                                 value="Peelable">Peelable</option>
                    <option <?=$sealable?> <?=($rec->Adhesive=='Resealable')?'selected="selected"':''?>  
                                 value="Resealable">Re-sealable</option>
                    <option <?=$superperm?> <?=($rec->Adhesive=='Super Permanent')?'selected="selected"':''?>  
                                 value="Super Permanent">Super Permanent</option>
                    <option <?=$waterres?> <?=($rec->Adhesive=='Water Resistant')?'selected="selected"':''?>  
                                 value="Water Resistant">Water Resistant</option>
                  </select>
                  <i></i> </label>
              </div>
            </div>
          </div>
          <div class="clear10"></div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                <div class="col-md-6"> <a href="#" id="<?=$rec->ProductID?>" class="technical_specs" data-target=".material" data-toggle="modal" data-original-title="Tecnial Specification"> Material Specification <i class="fa fa-info-circle"></i> </a> </div>
                <div class="col-md-6"> <a href="#" id="<?=$group_name?>" class="applications" data-target=".lb_applications" data-toggle="modal" data-original-title="Tecnial Specification"> Label Applications <i class="fa fa-table" aria-hidden="true"></i> </a> </div>
              </div>
            </div>
          </div>
          <div class="clear10"></div>
          <ul class="clr-thumbs colourpicker">
            <?
					   foreach($colours as $row){
						    $active_colour = '';
						    $colourclass = 	strtolower(str_replace(" ","_",$row->LabelColor));	
							$colourclass = 	strtolower(str_replace("-","_",$colourclass));
							if($row->LabelColor == $rec->LabelColor){
								$active_colour = 'active';
							}

							if($details['Shape_upd'] =="Rectangle")
							{
								$colour_icon = Assets.'images/material_images/colours/rolls/rectangle/'.$l_group."/".$row->imagecode.'.png';
							}
							else
							{
								$colour_icon = Assets.'images/material_images/colours/rolls/'.strtolower($details['Shape'])."/".$row->imagecode.'.png';
							}

							
							//if (getimagesize($colour_icon) == false){
							//	$colour_icon = Assets.'images/material_images/colours/rolls/white.png';
							//}
							
						
						   ?>
            <li class="<?=$active_colour?> data-reset-colour" data-toggle="tooltip" data-placement="top" 
                      data-original-title="<?=$row->colour_name?>" data-colour-filters="<?=$row->LabelColor?>"  > <a class="mat_<?=$colourclass?>" data-value="<?=$row->LabelColor?>" href="javascript:void(0);"> <img class="img-responsive" src="<?=$colour_icon?>"></a> </li>
            <? } ?>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comp">
          <table class="table printer" border="0" style="border:none;">
            <tbody>
              <tr>
                <td align="left" valign="center" style="font-size:12px; border:none;vertical-align: middle;width:25%"><small style="margin-top:10px;font-size:12px;">Printer Compatibility</small></td>
                <td  align="left" style=" font-size:12px;border:none;width:25%;"> Inkjet <a data-toggle="tooltip-product" data-placement="top" title="" class="inkjet_printer_div" data-original-title="<?=$comp['inkjet_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                  <br />
                  <img class="inkjet_printer_img" width="50" src="<?=Assets?>images/<?=$comp['inkjet_img']?>"  /></td>
                <td  align="left" style=" font-size:12px;border:none;width:25%;"> Direct<br />
                  Thermal <a data-toggle="tooltip-product" data-placement="top" title="" class="direct_printer_div"  data-original-title="<?=$comp['d_thermal_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                  <img class="direct_printer_img" width="50" src="<?=Assets?>images/<?=$comp['d_thermal_img']?>"  /></td>
                <td align="left" style=" font-size:12px;border:none;width:25%;"> Thermal<br />
                  Transfer <a data-toggle="tooltip-product" data-placement="top" title="" class="thermal_printer_div" data-original-title="<?=$comp['thermal_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                  <img class="thermal_printer_img" width="50" src="<?=Assets?>images/<?=$comp['thermal_img']?>"  /></td>
                <td align="left" style="font-size:12px; border:none; width:25%;visibility:hidden;"> Laser <a data-toggle="tooltip-product" data-placement="top" class="laser_printer_div" title="" data-original-title="<?=$comp['laser_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                  <br />
                  <img class="laser_printer_img" width="50" src="<?=Assets?>images/<?=$comp['laser_img']?>"  /></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </article>
    <article class="col-lg-7 col-md-7 col-sm-12 col-xs-12 mat-tabs">
      <ul class="nav nav-justified" role="tablist">
        <li class="col-xs-4 no-padding active plainoption"> <a href="#tab_plain<?=$rec->ProductID?>" aria-controls="" role="tab" data-toggle="tab">Plain Labels</a> </li>
        <li class="col-xs-4 no-padding printedoption <?=($rec->Printable=='N')?'hide':''?>"> <a href="#tab_printed<?=$rec->ProductID?>" aria-controls="" role="tab" data-toggle="tab">Printed Labels</a> </li>
        <li class="col-xs-4 no-padding"> <a href="#tab_sample<?=$rec->ProductID?>" aria-controls="" role="tab" data-toggle="tab">Material Sample</a> </li>
      </ul>
      <div class="tab-content">
        <div id="tab_plain<?=$rec->ProductID?>" class="tab-pane tabplain active" role="tabpanel">
          <div class="row p-t-10" style="margin-top:45px;">
            <div class="col-xs-12 ofq hidden-sm hidden-xs">
              <div class="col-xs-4 main-box">
                <div class="row">
                  <div class="col-xs-2 no-padding-right"><img src="<?=Assets?>images/4oclock.png" /></div>
                  <!--<div class="col-xs-10  no-padding-right"><b>Order before 16:00 for Next Day Delivery</b></div>-->
                  <div class="col-xs-10  no-padding-right ofq-text material_clock">
                    <div class="counter clock_time">Order before 16:00 for Next Day Delivery</div>
                    <div class="clear"></div>
                    <small style="font-size:8px;">Time remaining to next day delivery</small> </div>
                </div>
              </div>
              <div class="col-xs-4 main-box">
                <div class="row">
                  <div class="col-xs-2 no-padding-right"><i class="fa fa-truck l-icon" aria-hidden="true"></i></div>
                  <div class="col-xs-10  no-padding-right"> <b>Free Delivery on Orders over
                    <?=symbol.$this->home_model->currecy_converter(25.00, 'no');?>
                    </b> <a style="font-size:7px;" target="_blank" href="<?=base_url()?>delivery/"><span class="glyphicon glyphicon-new-window"></span> Delivery & Shipping Options</a> </div>
                </div>
              </div>
              <div class="col-xs-4 main-box">
                <div class="row">
                  <div class="col-xs-2 no-padding-right"><i class="fa fa-check-square-o l-icon" aria-hidden="true"></i></div>
                  <div class="col-xs-10  no-padding-right"><b>QUALITY ASSURANCE GUARANTEE</b></div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                  <p><strong>Labels Per Roll</strong>
                    <input maxlength="4"  type="text" placeholder="100+" class="form-control allownumeric plainlabels" >
                    <small>Max labels per roll -
                    <?=$rec->LabelsPerSheet?>
                    </small> </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                  <p> <strong style="font-size:12px;">Number of Rolls</strong>
                    <input maxlength="3" type="text" placeholder="<?=$min_qty?>+" class="form-control allownumeric plainrolls" >
                    <small>Multiples of
                    <?=$min_qty?>
                    only</small> </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
                  <div style="display:none;" class="rollLable_icon no-margin diamterinfo"></div>
                </div>
                <div class="clear"></div>
                <!--<div class="col-lg-12 col-md-12 col-sm-12 del-f">
                                        <div id="delivery_txt49165"></div>&nbsp;</div>--> 
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 quotation">
              <div class="clear15"></div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding hidden-lg hidden-md hidden-sm">
                <div style="display:none;" class="rollLable_icon no-margin diamterinfo"></div>
              </div>
              <div class="clear5 hidden-lg hidden-md hidden-sm"></div>
              <div class="plainprice_box" style="display:none">
                <div class="text-right plainprice_text priceplain">&nbsp;</div>
                <div class="clear="></div>
                <div class="clear"></div>
                <span class="pull-right plainperlabels_text text-right">&nbsp;</span>
                <div class="clear"></div>
              </div>
              <button style="display:none;" class="btn orangeBg pull-right add_plain" type="button"> Add to basket <i class="fa fa-calculator"></i> </button>
              <button class="btn orangeBg pull-right calculate_plain" type="button"> Calculate Price <i class="fa fa-calculator"></i> </button>
              <div class="clear"></div>
              <a href="#" class="price_breaks pull-right text-right" 
                             data-target=".pbreaks" data-toggle="modal" data-original-title="Volume Price Breaks">View volume price breaks</a> </div>
            <div class="clear"></div>
            <div class="service">
              <div class="addprintingoption hide pull-right"> <a href="#tab_printed<?=$rec->ProductID?>" aria-controls="" role="tab" data-toggle="tab" class="apf printpriceoffer"> <i class="fa fa-hand-o-right pull-left" aria-hidden="true"></i> <span>Add printing for only <b class="printing_offer_text">
                <?=symbol?>
                16.59</b>?</span> </a> </div>
            </div>
            <div class="col-xs-12 ofq hidden-lg hidden-md">
              <div class="col-xs-4 main-box">
                <div class="row">
                  <div class="col-xs-2 no-padding-right ofq-icon"><img src="<?=Assets?>images/4oclock.png" /></div>
                  <!--<div class="col-xs-10  no-padding-right ofq-text"><b>Order before 16:00 for Next Day Delivery</b></div>-->
                  <div class="col-xs-10  no-padding-right ofq-text material_clock">
                    <div class="counter clock_time">Order before 16:00 for Next Day Delivery</div>
                    <div class="clear"></div>
                    <small style="font-size:8px;">Time remaining to next day delivery</small> </div>
                </div>
              </div>
              <div class="col-xs-4 main-box">
                <div class="row">
                  <div class="col-xs-2 no-padding-right ofq-icon"><i class="fa fa-truck l-icon" aria-hidden="true"></i></div>
                  <div class="col-xs-10  no-padding-right ofq-text"> <b>Free Delivery on Orders over
                    <?=symbol.$this->home_model->currecy_converter(25.00, 'no');?>
                    </b> <a style="font-size:7px;" target="_blank" href="<?=base_url()?>delivery/"><span class="glyphicon glyphicon-new-window"></span> Delivery & Shipping Options</a> </div>
                </div>
              </div>
              <div class="col-xs-4 main-box">
                <div class="row">
                  <div class="col-xs-2 no-padding-right ofq-icon"><i class="fa fa-check-square-o l-icon" aria-hidden="true"></i></div>
                  <div class="col-xs-10  no-padding-right ofq-text"><b>QUALITY ASSURANCE GUARANTEE</b></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="tab_printed<?=$rec->ProductID?>" class="tab-pane tabprinted" role="tabpanel">
          <div class="row" style="margin-top:70px">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center qty">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                      <input maxlength="6"  type="text" placeholder="Enter Labels" class="form-control allownumeric printlabels" >
                      <small>Minimum labels
                      <?=$min_labels_per_roll*$min_qty?>
                      </small>
                      </p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                      <div class="dm-box">
                        <div class="btn-group btn-block dm-selector digital_proccess-d-down"> <a class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown">Select Digital Print Process <i class="fa fa-unsorted"></i></a>
                          <ul class="dropdown-menu btn-block">
                            <li> <a data-toggle="tooltip-digital" data-value="" data-trigger="hover" data-placement="left" title="" 
                                        data-id="digital">Select Digital Print Process </a> </li>
                            <?php 
                                foreach($a4_prints as $row){
									$white_digital_style ='';
									$white_digital = '6 Colour Digital Process + White';
									if(preg_match("/PGCP/is", $rec->ManufactureID) || preg_match("/PGCR/is", $rec->ManufactureID)){
										if($white_digital!=$row->name){
											$white_digital_style = ' display:none; ';
										}
									} ?>
                            <li style=" <?=$white_digital_style?>" > <a data-toggle="tooltip-digital" data-trigger="hover" data-placement="right" title="<?=$row->tooltip_info?>" 
                                     data-id="digital" data-value="<?=$row->name?>">
                              <?=$row->name?>
                              </a></li>
                            <? } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="dm-box">
                    <div class="btn-group btn-block dm-selector"> <a class="btn btn-default btn-block dropdown-toggle orientationselector"  data-toggle="dropdown" data-value="">Orientation 01<i class="fa fa-unsorted"></i></a>
                      <ul class="dropdown-menu btn-block">
                        <li class="outsideorientation"> <a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the outside of the roll. Text and image printed across the roll. Top of the label off first." data-id="orientation1" data-value="1"> Orientation 01 <img src="<?=Assets?>images/loader.gif"> </a> </li>
                        <li class="outsideorientation"><a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the outside of the roll. Text and image printed across the roll. Bottom of the label off first." data-id="orientation2" data-value="2"> Orientation 02 <img src="<?=Assets?>images/loader.gif"></a></li>
                        <li class="outsideorientation"><a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the outside of the roll. Text and image printed around the roll. Right-hand edge of the label off first." data-id="orientation3" data-value="3"> Orientation 03 <img src="<?=Assets?>images/loader.gif"></a></li>
                        <li class="outsideorientation"><a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the outside of the roll. Text and image printed across the roll. Bottom of the label off first." data-id="orientation4" data-value="4"> Orientation 04 <img src="<?=Assets?>images/loader.gif"></a></li>
                        <li class="insideorientation"><a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the inside of the roll. Text and image printed across the roll. Bottom of the label off first." data-id="orientation5" data-value="5"> Orientation 05 <img src="<?=Assets?>images/loader.gif"></a></li>
                        <li class="insideorientation"><a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the inside of the roll. Text and image printed across the roll. Top of the label off first." data-id="orientation6" data-value="6"> Orientation 06 <img src="<?=Assets?>images/loader.gif"> </a></li>
                        <li class="insideorientation"><a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the inside of the roll. Text and image printed around the roll. Left-hand edge of the label off first." data-id="orientation7" data-value="8"> Orientation 07 <img src="<?=Assets?>images/loader.gif"> </a></li>
                        <li class="insideorientation"><a data-toggle="tooltip-orintation" data-trigger="hover" data-placement="right" title="Labels on the inside of the roll. Text and image printed around the roll. Right-hand edge of the label off first." data-id="orientation8" data-value="8"> Orientation 08 <img src="<?=Assets?>images/loader.gif"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labels-form">
                  <label class="select">
                    <select name="finish" class="labelfinish">
                      <option selected="selected" value="">Select Label Finish</option>
                      <option value="No Finish">No Finish</option>
                      <option value="Gloss Lamination">Gloss Lamination</option>
                      <option value="Matt Lamination">Matt Lamination</option>
                      <option value="Matt Varnish">Matt Varnish</option>
                      <option value="Gloss Varnish">Gloss Varnish</option>
                    </select>
                    <i></i> </label>
                </div>
              </div>
              <div class="clear"></div>
              <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-7 col-xs-12"> <a href="#" class="btn btn-primary art-btn btn-block artwork_uploader" 
                                     data-target=".artworkModal1" data-toggle="modal" data-original-title="Upload Your Artwork"> <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwork</a> </div>
              </div>
              <!--<div class="row artwork_uploader"> 
                     <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
                        <a href="#" class="btn btn-primary art-btn btn-block artwork_uploader" data-target=".artworkModal1" data-toggle="modal" data-original-title="Upload Your Artwrok">
                                     <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwrok</a>
                    </div>                  
				</div>--> 
              
              <!-- <a href="#" class="btn btn-primary art-btn artwork_uploader" 
                     data-target=".artworkModal1" data-toggle="modal" data-original-title="Upload Your Artwrok">
                     <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwrok</a>--> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 quotation"> 
              <!-- <div class="clear15"></div>-->
              <div class="printedprice_box" style="display:none;">
                <table class="price" width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr class="printprice" style="">
                      <td style=" width:80%;" class="text-left phead"></td>
                      <td style=" width:20%;" class="printtext text-right color-orange"></td>
                    </tr>
                    <tr class="inkprice" style="">
                      <td style=" width:80%;" class="text-left phead">Full Colour Print Price</td>
                      <td style=" width:20%;" class="printtext text-right color-orange">0.00</td>
                    </tr>
                    <tr class="halfprintprice" style="">
                      <td style=" width:80%;" class="text-left phead color-orange">Half Price Promotion</td>
                      <td style=" width:20%;" class="halfprinttext color-orange text-right">-<b class="pr-sm">0.00</b></td>
                    </tr>
                    <tr class="pressproofprice" style="">
                      <td style=" width:80%;" class="text-left phead">Press Proof Charges</td>
                      <td style=" width:20%;" class="pressprooftext text-right color-orange"></td>
                    </tr>
                    <tr class="additionalcharge" style="">
                      <td style=" width:80%;" class="text-left phead"> Additional Charges </td>
                      <td style=" width:20%;" class="desginprice text-right color-orange"><b class="pr-sm"></b></td>
                    </tr>
                    <tr class="additionalrolls" style="">
                      <td colspan="2" class="text-left phead">3 additional rolls</td>
                    </tr>
                    <tr>
                      <td colspan="2" class="text-right total"  style="border:none;"><div class="text-right printedprice_text priceplain">&nbsp;</div>
                        <div class="clear"></div></td>
                    </tr>
                    <tr>
                      <td colspan="2" class="text-right"><div class="printedperlabels_text"></div></td>
                    </tr>
                  </tbody>
                </table>
                <div class="clear10"></div>
              </div>
              <button style="display:none;" class="btn orangeBg pull-right add_printed" type="button"> Add to basket <i class="fa fa-calculator"></i> </button>
              <button class="btn orangeBg pull-right calculate_printed" type="button"> Calculate Price <i class="fa fa-calculator"></i> </button>
              <div class="clear"></div>
              <!--<a href="#" class="price_breaks pull-right" 
                             data-target=".pbreaks" data-toggle="modal" data-original-title="Volume Price Breaks">View volume price breaks</a>--> 
              
            </div>
          </div>
        </div>
        <div id="tab_sample<?=$rec->ProductID?>" class="tab-pane" role="tabpanel">
          <div class="col-xs-12"> <small class="sample"> All material samples are supplied on a strip of roll labels for the purpose of assisting the choice of face-stock colour and appearance. Along with assessing the print quality and application suitability of the adhesive.</small>
            <div class="clear10"></div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12"> <small class="note sample">Please note: The material sample supplied will not be the shape and size of the label/s shown on this page.</small>
                <div class="clear5"></div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"> </div>
              <div class="col-lg-4 col-md-4 col-sm-3 col-xs-6">
                <button class="btn orangeBg pull-right rsample" type="button">Add Material Sample </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>
<?  }   ?>
