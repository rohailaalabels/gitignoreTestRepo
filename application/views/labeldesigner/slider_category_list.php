  <div class="col-xs-12">
    <div class="panel row">
      <div class="lbApp-pm lbp-s">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pSlider p-t-10 ">

                    <?
					   if(preg_match("/SRA3/",$select['CategoryName'])){
								$oPaper_size = "SRA3 Sheets";
								$oimg_src = Assets."images/categoryimages/SRA3Sheets/".$select['CategoryImage'];
								$owidth = '190';
								$oheight = '150';
								
								$x=explode("-",$select['CategoryName']);
								$ocatname = $x[0];
								$oLabelSize = $x[1];
								$url = 'sra3-sheets';
						}else if(preg_match("/A3/",$select['CategoryName'])){
								$oPaper_size = "A3 Sheets";
								$oimg_src = Assets."images/categoryimages/A3Sheets/".$select['CategoryImage'];
								$owidth = '190';
								$oheight = '150';
								
								$x=explode("-",$select['CategoryName']);
								$ocatname = $x[0];
								$oLabelSize = $x[1];
								$url = 'a3-sheets';
					   }else{
						        $oPaper_size = "A4 Sheets";
						        $oimg_src = Assets."images/categoryimages/A4Sheets/colours/".$select['ManufactureID'];
								$owidth = '125';
								$oheight = '176';
								
								$x=explode("-",$select['CategoryName']);
								$ocatname = $x[0];
								$oLabelSize = $x[1];
								$url = 'a3-sheets';
								
					   }
						   
					    $code = explode('.',$select['CategoryImage']);
					    $ourl = base_url().$url.'/'.strtolower($select['Shape']).'/'.$select['CategoryID']; 
						
						
						
						$priceFrom = $this->product_model->batchPrice25($select['ManufactureID'],25);
				    	$opriceFrom = $this->home_model->currecy_converter($priceFrom, 'yes');
					   
						 
						   if(strtolower($select['Shape'])=='circular'){
						   		$ocircular_class = 'circilar_top';
								$oheight_class = 'hide';
						   }
						   
						   $olabelimage =base_url().'theme/site/flash/img/'.strtolower($select['Shape']).'.png';
						   
						   
						    if(preg_match("/-/",$select['ProductName'])){
						
							$name = explode(" - ",$select['ProductName']);
						
							$oproductname = ucwords($name[0])." <br />";
							if(isset($name[1]) and $name[1]!=''){
							  $oproductname .=" <small>".$name[1]."</small>";
							}
						 }
						 
						 ?>
    
       
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p-t-10">
        <div id="selection">
                
                  <div class="thumbnail" style="border:2px solid #fd4913">
                    <div class="zoom" style="display: none;">
                      <p> <a href="#" data-toggle="modal" data-target=".layout" class="layout_specs" id="<?=$select['CategoryID']?>"> <i class="fa fa-search-plus zoomIcon"></i> </a> </p>
                    </div>
                    <div class="imgBg  text-center">  <img onerror='imgError(this);' src="<?=$oimg_src?>.png" alt="<?=$ocatname?>" title="<?=$ocatname?>" width="<?=$owidth?>" height="<?=$oheight?>" > </div>
                    <div class="caption3">
                      <h2><?=$oproductname?><br></h2>
                      <p><?=$ocatname?></p>
                      <div class="row">
                        <p class="col-md-7"><strong>Label Size</strong><br>
                          <small><?=$oLabelSize?></small></p>
                        <p class="col-md-5 p0"><strong>Item Code</strong><br>
                          <?=$code[0]?></p>
                        <p class="col-md-12"> From <strong class="f-20 textBlue"><?=symbol.$opriceFrom?></strong> per 25 sheets </p>
                      </div>
                      <a class="btn-block btn orange selected_design" role="button" data-temp_id="<?=$select['ProductID']?>"> <i class="fa fa-arrow-circle-right"></i> Continue with Existing <br />Selection</a> </div>
                    <div class="clear"></div>
                  </div>
                
              </div>
       </div>   
       
       
         
              
       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 p-t-10 "> 
       <div class="col-xs-12">
           
          <div class="carousel carousel-showmanymoveone slide" id="carousel123">
            <div class="carousel-inner">
            
            
             <? $i=1; 
			    foreach($records as $pro){ $dmclass = '';
                     $classu = ($i==1)?'active':'';
					 $fixedclass ='';
					 $code = explode('.',$pro->CategoryImage);
					 $i++;
					 
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
            
              <div class="item <?=$classu?>">
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <div class="zoom" style="display: none;">
                      <p> <a href="#" data-toggle="modal" data-target=".layout" class="layout_specs" id="<?=$pro->CategoryID?>"> <i class="fa fa-search-plus zoomIcon"></i> </a> </p>
                    </div>
                    <div class="imgBg  text-center">  <img onerror='imgError(this);' src="<?=$img_src?>.png" alt="<?=$catname?>" title="<?=$catname?>" width="<?=$width?>" height="<?=$height?>" > </div>
                    <div class="caption3">
                      <h2><?=$productname?><br></h2>
                      <p><?=$catname?></p>
                      <div class="row">
                        <p class="col-md-7"><strong>Label Size</strong><br>
                          <small><?=$LabelSize?></small></p>
                        <p class="col-md-5 p0"><strong>Item Code</strong><br>
                          <?=$itemcode?></p>
                        <p class="col-md-12"> From <strong class="f-20 textBlue"><?=symbol.$priceFrom?></strong> per 25 sheets </p>
                      </div>
                      <a class="btn-block btn orange apply_design" role="button" data-temp_id="<?=$pro->ProductID?>" data-cat="<?=$pro->CategoryID?>"> <i class="fa fa-arrow-circle-right"></i> Select and Apply </a> </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
              
             <? } ?> 
      
         
            </div>
            <a class="left carousel-control" href="#carousel123" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> <a class="right carousel-control" href="#carousel123" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> </div></div></div>
   
            
            </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>

          
      </div>
    </div>
  </div>

<script>
	  
(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<3;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
       /* itemToClone = $(this).siblings(':first');*/
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());


</script> 
