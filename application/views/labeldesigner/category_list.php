
<div class="row temp-list">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <? $i=1;

    foreach($records as $pro){ $dmclass = '';
				   $fixedclass ='';
							$code = explode('.',$pro->CategoryImage);
						
							if(preg_match("/SRA3/",$pro->CategoryName)){
									
									  $Paper_size = "SRA3 Sheets";
									  $img_src = Assets."images/categoryimages/SRA3Sheets/".$pro->CategoryImage;
									  $width = '208';
								  	  $height = '148';
									  
									    $x=explode("-",$pro->CategoryName);
										$catname = $x[0];
										$LabelSize = $x[1];
								
									$url = 'sra3-sheets';
								
							}
							else if(preg_match("/A3/",$pro->CategoryName)){
									
									   $Paper_size = "A3 Sheets";
									   $img_src = Assets."images/categoryimages/A3Sheets/".$pro->CategoryImage;
									   $width = '208';
								  	   $height = '148';
									   
									    $x=explode("-",$pro->CategoryName);
										$catname = $x[0];
										$LabelSize = $x[1];
										
										$url = 'a3-sheets';
							}
							else{
									  $Paper_size = "A4 Sheets";								  
									  $img_src = Assets."images/categoryimages/A4Sheets/colours/".$pro->ManufactureID;
									  $width = '125';
								  	  $height = '176';
									  
									  $x=explode("-",$pro->CategoryName);
									  $catname = $x[0];
									  $LabelSize = $x[1];
								
									 $url = 'a4-sheets';
								  
							}
							
							
									//new name//
							$catname = $pro->LabelsPerSheet." ".$pro->Shape." Labels per A4 Sheet";
							$ProductCategoryName=explode("-",$pro->ProductCategoryName);	
							$cnt=count($ProductCategoryName)-1;
							$labelSize=$ProductCategoryName[$cnt];
							$LabelSize = '<small>'.$labelSize.'</small>';
							
							$itemcode = $pro->ManufactureID;
					
					
					
							
						 
						   $priceFrom = $this->product_model->batchPrice25($pro->ManufactureID,25);
						   $priceFrom = $this->home_model->currecy_converter($priceFrom, 'yes');	
						   $url = base_url().$url.'/'.strtolower($pro->Shape).'/'.$pro->CategoryID; 
						   
						   
						   
						   $circular_class  = '';   $height_class  = '';
						   if(strtolower($pro->Shape)=='circular'){
						   		$circular_class = 'circilar_top';
								$height_class = 'hide';
						   }
						   $labelimage =base_url().'theme/site/flash/img/'.strtolower($pro->Shape).'.png';
						   
						   
						    if(preg_match("/-/",$pro->ProductName)){
						
							$name = explode(" - ",$pro->ProductName);
						
							$productname = ucwords($name[0])." <br />";
							if(isset($name[1]) and $name[1]!=''){
							$productname .=" <small>".$name[1]."</small>";
							}
						 }
	
						   ?>
    <div class="thumbnail list">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <div class="imgBg text-center">
            <div class="zoom">
              <p> <a href="#" data-toggle="modal" data-target=".layout"  class="layout_specs" id="<?=$pro->CategoryID?>" manufactureid="<?=$pro->ManufactureID?>"> <i class="fa fa-search-plus zoomIcon"></i> </a> </p>
            </div>
            
            <!--  <img onerror='imgError(this);' width="125" height="176" alt="labels Image" 
                          src="http://gtserver/newlabels/theme/site/images/categoryimages/A4Sheets/AAR001.png"> --> 
            <img onerror='imgError(this);' src="<?=$img_src?>.png" alt="<?=$catname?>" title="<?=$catname?>" width="<?=$width?>" height="<?=$height?>" > </div>
        </div>
        <?php
		$comp = $this->home_model->grouping_compatiblity($pro->SpecText7, 'sheet');
		$material_code = $this->home_model->getmaterialcode($pro->ManufactureID);
		$materialinfo = $this->db->query("Select * from material_tooltip_info WHERE material_code LIKE '".$material_code."'")->row_array();
		$group_name = (isset($materialinfo['group_name']) and $materialinfo['group_name']!='')?$materialinfo['group_name']:'';
		?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="caption">
            <h2 class="no-margin"> <b>
              <?=$productname?>
              </b></h2>
            <div class="clear10"></div>
            <div class="row">
              <div class="col-md-6"> <a href="#" id="<?=$pro->ProductID?>" class="technical_specs" data-target=".material" data-toggle="modal" data-original-title="Tecnial Specification">Material Specification <i class="fa fa-info-circle"></i></a> </div>
              <div class="col-md-6"> <a href="#" id="<?=$group_name?>" class="applications" data-target=".lb_applications" data-toggle="modal" data-original-title="Label Applications">Label Applications <i class="fa fa-table" aria-hidden="true"></i> </a> </div>
            </div>
            <div class="clear10"></div>
            <h3 class="no-margin line-height-normal">
              <?=$catname?>
            </h3>
            <div class="clear20"></div>
            <div class="row">
              <p class="col-md-4"><strong>Label Size</strong><br>
                <?=$LabelSize?>
              </p>
              <p class="col-md-3"><strong>Item Code</strong><br>
                <?=$itemcode?>
              </p>
              <p class="col-md-5 printer_tooltip"> <span class="col-md-6">Laser <a data-toggle="tooltip-product" data-placement="top" class="laser_printer_div" title="" data-original-title="<?=$comp['laser_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                <img onerror='imgError(this);' class="laser_printer_img" width="50" src="<?=Assets?>images/<?=$comp['laser_img']?>"  /></span> <span class="col-md-6"> Inkjet <a data-toggle="tooltip-product" data-placement="top" title="" class="inkjet_printer_div" data-original-title="<?=$comp['inkjet_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                <img onerror='imgError(this);' class="inkjet_printer_img" width="50" src="<?=Assets?>images/<?=$comp['inkjet_img']?>"  /></span> </p>
            </div>
            <div class="clear15"></div>
            <div class="price">From <b class="color-orange">
              <?=symbol.$priceFrom?>
              </b> per 25 sheets</div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 pull-right hxw">
          <div class="hxw-thumb"> <small class="left-h <?=$height_class?>">
            <?=$pro->LabelHeight?>
            </small> <small class="top-w <?=$circular_class?>">
            <?=$pro->LabelWidth?>
            </small>
            <div class="clear"></div>
            <img onerror='imgError(this);' src="<?=$labelimage?>"/> </div>
          <div class="clear25" style="font-size:9px;">Over 100 Designs to choose from</div>
          <button class="btn-block btn blueBg load_flash" role="button" data-temp_id="<?=$pro->ProductID?>"> <i class="fa fa-arrow-circle-right"></i> Create Design </button>
        </div>
      </div>
    </div>
    <?  $i++; } ?>
  </div>
</div>
<div class="spinner" style="display:none;text-align:center;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader-spinner.gif" style="width:60px;"/> </div>
<script>
$('[data-toggle="tooltip-product"]').tooltip('destroy');
$('[data-toggle="tooltip-product"]').tooltip();
</script> 
