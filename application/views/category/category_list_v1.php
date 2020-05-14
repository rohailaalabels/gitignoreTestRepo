    <div class="row">
              <div class="row  dm-row"> 
               <?    $i=1; 
			    foreach($records['list'] as $pro){
				   $fixedclass =''; $dmclass = '';
							$code = explode('.',$pro->CategoryImage);
						
							if(preg_match("/Roll/",$pro->CategoryName)){
								 if($i%4 == 0){ $dmclass = 'last-child';}
								 $Paper_size = "Labels on Rolls";
						  		 $LabelSize =  str_replace("Roll Labels","",$pro->CategoryName);
								 $img_src = Assets."images/categoryimages/rollimages/".$pro->CategoryImage;
								
								if(preg_match("/search/",uri_string())){
										 $width = '';
										 $height = '160';
										 $fixedclass = 'heightFix';
								 }else{
										 $width = '200';
										 $height = '205';
								  }
								 
								 $catname =$pro->CategoryName;
								 
								 $url = 'roll-labels';
								 
								
							}
							else if(preg_match("/SRA3/",$pro->CategoryName)){
									
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
									  $img_src = Assets."images/categoryimages/A4Sheets/".$pro->CategoryImage;
									  $width = '125';
								  	  $height = '176';
									  
									  $x=explode("-",$pro->CategoryName);
									  $catname = $x[0];
									  $LabelSize = $x[1];
								
									 $url = 'a4-sheets';
								  
							}
							
							if(preg_match("/searchResults/",uri_string())){
										 $fixedclass = 'heightFix';
							}
								
								
						   $url = base_url().$url.'/'.strtolower($pro->Shape).'/'.strtolower($pro->CategoryID).'/';  
								  
							 ?>   
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3  dm-box <?=$dmclass?>">          
                            <div class="thumbnail">
                              <? if(!preg_match("/Roll/",$pro->CategoryName)){?>
                              	<div class="zoom">
                                        <p>
                                        	<a href="#" data-toggle="modal" data-target=".layout"  class="layout_specs" id="<?=$pro->CategoryID?>" >
                                        		<i class="fa fa-search-plus zoomIcon"></i>
                                            </a>
                                        </p>
                                </div>
                                <? } ?>
                                
                                
                                
                                <div class="imgBg <?=$fixedclass?> text-center">
                                	<img onerror='imgError(this);'   src="<?=$img_src?>" alt="<?=$catname?>" title="<?=$catname?>" width="<?=$width?>" height="<?=$height?>" ></div>
                                <div class="caption">
                                    <h2><?=$Paper_size?></h2>
                                    <p><?=$catname?></p>
                                <div class="row">
  <p class="<?=(preg_match("/Roll/",$pro->CategoryName))?'col-md-8':'col-md-9'?> "><strong>Label Size</strong><br><?=$LabelSize?></p>
  <p  class="<?=(preg_match("/Roll/",$pro->CategoryName))?'col-md-4':'col-md-3'?>" ><strong>Code</strong><br> <?=$code[0]?> </p>
                                </div>
                             <? if(preg_match("/Roll/",$pro->CategoryName)){  ?>
                                    
                                 <div class="labels-form">
                                      <div class="btn-group btn-block dm-selector"> 
                                      <a id="coresize_<?=$pro->CategoryID?>" class="btn btn-default btn-block dropdown-toggle coresize" 
                                      data-toggle="dropdown"  data-value="" >  Select Core Size 
                                        <i class="fa fa-unsorted"></i></a>
                                        <ul class="dropdown-menu btn-block">
                                           <?=$this->home_model->genrate_rollcore_images($pro->CategoryID);?>
                                        </ul>
                                      </div>
                                  </div>
                				  <div class="clear15"></div>
                                  
                                  
                                  <? $wholesale_class = 'set-printer';
									 if(isset($wholesale) and $wholesale!=''){
										$url = 'javascript:void(0);';
										$wholesale_class = 'wholesale_class';
								 	 } 
									 ?>
                                     
                                     

                                             <a data-prd-id="roll" data-cat-id="<?=$pro->CategoryID?>" id="<?=$pro->CategoryID?>" role="button" class="btn-block btn orange <?=$wholesale_class?>" 
                                                    href="<?=$url?>"> <i class="fa fa-arrow-circle-right"></i> Select Material
                                             </a>
                                 <? }else{
									 
									 
											 $wholesale_class = '';
											if(isset($wholesale) and $wholesale!=''){
												$url = 'javascript:void(0);';
												$wholesale_class = 'wholesale_class';
											}
											
											
									 
									 ?> 
                                 
                                               <a data-cat-id="<?=$pro->CategoryID?>" data-prd-id="" id="<?=$pro->CategoryID?>"  role="button" class="btn-block btn orange <?=$wholesale_class?>" 
                                    href="<?=$url?>"> <i class="fa fa-arrow-circle-right"></i> Select Material
                                 </a>
                                 
                                 <? } ?>  
                                 
                              </div>
                          </div>
                    </div> 
                
                <? $i++; } ?>
            </div>
        </div>
