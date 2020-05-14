<div class="row">
 <?    foreach($materials as $rec){
							
							
							$img_class = 'img-Sheet';
							
							$pname=explode('-',$rec->ProductName);
							if($rec->Adhesive=='Removable' || $rec->Adhesive=='Peelable'){
								$adhesive="Peelable";
							}else{
                                                                $adhesive=$rec->Adhesive;
                                                        }
							
							
							
							if(preg_match("/A3/",$rec->ProductBrand)){
								 $min_qty = '25';
								 $max_qty = '50000';
							}
							if(preg_match("/Roll Labels/",$rec->ProductBrand)){
								
								 $min_qty = $this->home_model->min_qty_roll($rec->ManufactureID);
		  						 $max_qty = $this->home_model->max_qty_roll($rec->ManufactureID);
		   
		  						 $img_class = 'img-circle';
							}
							else if(preg_match("/SRA3/",$rec->ProductBrand)){
								 $min_qty = '50';
								   $max_qty = '20000';
							}
							else{
								 $min_qty = '25';
								  $max_qty = '50000';
							}
		
		
							$words = preg_split("/[\s,]+/", $adhesive);
							
							$desc = $rec->ProductCategoryName.". ".$rec->Appearance;
                    		
							$comp = $this->home_model->check_compatibility_grid($rec->SpecText7,$rec->ProductBrand);
							
							$rec->Image1 = str_replace(".gif",".png",$rec->Image1);
							
							
							$max_length = 90;
							if (strlen($desc) > $max_length){
							   $offset = ($max_length - 3) - strlen($desc);
							   $short_desc = substr($desc, 0, strrpos($desc, ' ', $offset)) . '...';
							}else{
								$short_desc = $desc;
							}
							
					?> 
                    
                    
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">        
                <div class="thumbnail  ">
                 <div class="m-t-15">
                  <div class="caption2 col-md-12 m0">
             
                    <!-- <div class="pull-left"> <h4 style="width:215px; height: 36px; " class="cBlue"><?=$pname[0]?></h4> </div>
                      <div class="pull-right LabelTag"><?=$adhesive?><br><small>Adhesive</small></div>
                      <div style="clear:left;"><p><?=$short_desc?></p></div>-->
                      <div class="pull-right LabelTag" style="width:120px;"><?=$adhesive?><br><small>Adhesive</small></div>
                     <div class="pull-left"> <h4 id="prd_name<?=$rec->ProductID?>" style="width:200px;" class="cBlue"><?=$pname[0]?> </h4> </div>
         			 
         			 <div style="clear:left;"><p><?=$short_desc?></p></div>
                               
                               
                               
                        <div>
                                <div >
                                     <div class="col-xs-4">
                                        <div class="row">
                                            <img onerror='imgError(this);' class="m-t-15  <?=$img_class?>" width="46" height="46" alt="" src="<?=Assets?>images/material_images/<?=$rec->Image1?>">
                                        </div>
                                            
                                        </div>
                                      
                                        <div class="col-xs-8">
                                          <?=$comp?>
                                       </div>
                                </div>
                        </div>
                   
                    
                      <? if(preg_match("/Roll Labels/",$rec->ProductBrand)){
					
	if(isset($max_diameter) and $max_diameter!=0 ){
		  $total_labels = $this->home_model->get_max_labels_printer($rec->ManufactureID,$rec->LabelsPerSheet, $max_diameter, $Labelsgap, $height);
	if(isset($total_labels) and $total_labels!=0 and $total_labels <= $rec->LabelsPerSheet){ $rec->LabelsPerSheet = $total_labels; }
						 } ?>
                     
                        <div class="row  heightFixRoll">
                        
                     		 <input type="hidden"  id="max_labels<?=$rec->ProductID?>"  value="<?=$rec->LabelsPerSheet?>"  />  
                              <input type="hidden"  id="min_qty<?=$rec->ProductID?>"  value="<?=$min_qty?>"  />  
                              <input type="hidden"  id="max_qty<?=$rec->ProductID?>"  value="<?=$max_qty?>"  />  
                           
                           <div class="col-xs-12 m-t-b-10 ">
                                             <a href="#" id="<?=$rec->ProductID?>" class="technical_specs" data-target=".material" data-toggle="modal">
                                    			<i class="cBlue  f-20 fa fa-search-plus"></i>
                                    		</a> 
      <small>Click to view material specification</small>
                                            </div>   
                           <div class="col-xs-12 col-sm-12 col-md-12 m-t-10">
                           
                                   	   <p>Enter number of labels and rolls</p>
                                   	 	<div class="col-md-6 p0">
                                       		 <p class="cBlue col-xs-6 p0"><strong>Labels Per Roll</strong>
                                             <input maxlength="4" onfocus="show_calculate_btn(<?=$rec->ProductID?>);"  type="text" 
                                               id="labels_<?=$rec->ProductID?>"  placeholder="100+" 
                                               class="form-control allownumeric" style="width:100px;">
                                               		<small>Maximum labels per roll - <?=$rec->LabelsPerSheet?></small>
                                             </p>
                                        </div>   
                                        <div class="col-md-6 p0">
                                            <p style="padding-left:10px; " class="cBlue col-xs-6 p0">
                                                   <strong style="font-size:12px;">Number of Rolls</strong>
                                                   <input maxlength="3" onfocus="show_calculate_btn(<?=$rec->ProductID?>);" type="text" 
                                                   id="roll_<?=$rec->ProductID?>" placeholder="<?=$min_qty?>+" 
                                                   	class="form-control allownumeric" style="width:100px;">
                                                   <small>Multiples of <?=$min_qty?> only</small>
                                             </p>
                                        </div>   
                               </div>
                               
                               <div id="price_box_<?=$rec->ProductID?>" style=" display:none;" >
                             		  <div class="col-xs-4">	
                                    	  <div style=" display:none;" id="diameter_<?=$rec->ProductID?>" class="priceTextOrange priceText rollLable_icon2">&nbsp;</div>
                                        </div>  
                                    	<div class="col-xs-8">	
                                         <div class="price" id="price_<?=$rec->ProductID?>">&nbsp;</div>
                                         <div class="TextOrange" id="priceText_<?=$rec->ProductID?>">&nbsp;</div>
                                         <div id="delivery_txt<?=$rec->ProductID?>" class="priceTextDelivery text-center">&nbsp;</div>
                                         </div>
                                          
                                         
                                         
                         	  </div> 
                               
                       
                       
                          </div>  
                          
                          
                        <button id="add_btn<?=$rec->ProductID?>" onclick="add_roll_item('<?=$rec->ProductID?>','<?=$rec->ManufactureID?>');" 
                              class="btn pull-right btn-block orangeBg" style=" display:none;" type="button"> Add to basket <i class=" fa fa-cart-plus"></i>
                                  </button>
                                 
                             <button id="cal_btn<?=$rec->ProductID?>" onclick="calculate_roll_price('<?=$rec->ProductID?>','<?=$rec->ManufactureID?>');" 
                              class="btn pull-right btn-block blueBg"  type="button"> Calculate Price <i class="fa fa-calculator"></i>
                           </button>    
					 
					 
                     
					 <? }else{?> 
                     
                   	  
                     
                      <div class="row  heightFix">
                      
                      
                     
                     	  <input type="hidden"  id="labels_p_sheet<?=$rec->ProductID?>"  value="<?=$rec->LabelsPerSheet?>"  />  
                          <input type="hidden"  id="min_qty<?=$rec->ProductID?>"  value="<?=$min_qty?>"  />  
                          <input type="hidden"  id="max_qty<?=$rec->ProductID?>"  value="<?=$max_qty?>"  />  
                              
                              
                     	<div class="m-t-10 col-xs-12 col-sm-12 col-md-12 ">
                                <p class="cBlue pull-left"><strong>Add number of sheets</strong> <br><small>Minimum Order <?=$min_qty?> sheets</small></p>
                                 <input onfocus="show_calculate_btn(<?=$rec->ProductID?>);" id="sheet_qty_<?=$rec->ProductID?>" 
                                         maxlength="5" type="text" style="width:60px;" 
                                         class="form-control pull-right allownumeric" placeholder="<?=$min_qty?>+"> 
                        
                        </div>
                        
                        
                        <div id="price_box_<?=$rec->ProductID?>" style=" display:none;" class="text-center" >
                        	 <div class="price priceM" id="price_<?=$rec->ProductID?>">&nbsp;</div>
                        	 <div id="save_txt<?=$rec->ProductID?>" class="priceTextOrange ">&nbsp;</div>
                              <div class="TextOrange" id="priceText_<?=$rec->ProductID?>">&nbsp;</div>
                             <div id="delivery_txt<?=$rec->ProductID?>" class=" text-center">&nbsp;</div>
                            
                       </div>
                        
  				    </div>
                        
                        <button id="add_btn<?=$rec->ProductID?>" onclick="add_item('<?=$rec->ProductID?>','<?=$rec->ManufactureID?>');" 
                              class="btn pull-right btn-block orangeBg" style=" display:none;" type="button"> Add to basket <i class=" fa fa-cart-plus"></i></button>
                         
                        <button id="cal_btn<?=$rec->ProductID?>" onclick="calculate_sheet_price('<?=$rec->ProductID?>','<?=$rec->ManufactureID?>');" 
                                  class="btn pull-right btn-block blueBg" type="button"> Calculate Price <i class="fa fa-calculator"></i>
                         </button>
                           
                     <? }?>
  
                  </div>
                  </div>
                </div>
            </div>
            
            <?php } ?>
            
    	 </div> 
         
         
	 
                