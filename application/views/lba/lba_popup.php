


<?  $cart_detail = $this->home_model->fetch_user_lba_cart(); 
    if(count($cart_detail) > 0){
	 $max_index = max(array_keys($cart_detail));
	 $recomnd = $this->home_model->fetch_recommended_labels($cart_detail[$max_index]->LabelID); 
   ?>
     
     
     
 <div class="row lba-space set_box" id="lba_cart">
   <div class="bgGray LBABG-Grey" style="padding:10px 0;">
    <div class="container">
    	<div class="row">
      <div class="ourTeam lba-ourTeam col-md-9">
      <div class="thumbnail set_box" style="padding-bottom:0px !important;">
        <div class="set_head">
          <h3 class="pr-title" style="color: #17b1e3;">Associated Shapes and sizes</h3>
          <p>Please select front jar label size that best fits your product</p>
         </div>
           <div class="set_body">
             <div class="row">
	          <div class="col-md-12">
           
           <? foreach($recomnd as $list){ 
		      if($list->available_in == "both"){
				 $tcode = explode(",",$list->association);
				 $t_code = $tcode[0];
				}else{
				 $t_code = $list->association;
				}
				
			    $productname = $this->home_model->get_db_column('category','CategoryName','CategoryID',$t_code);
				$temp = explode("-",$productname);
				$list->size = trim(end($temp));
				$list->size = str_replace('Roll Labels','',$list->size);
		        $imgsrc = LABELER."thumb/".$list->image;
				$gotoid = $list->ID;
				$is_selected = 'false';
				
		   ?>  
           
            <?
              //***********//***********//***********//***********		
			  if($is_logged==true){
				$userdesigns = $this->home_model->check_user_design($list->ID);
				if(!empty($userdesigns)){
				 $designdata = $this->home_model->get_user_lba_data($userdesigns['DesignID']);	
				 $imgsrc = LABELER."users/".$designdata['Thumb'];
				 $is_selected = 'true';
				 $gotoid = $userdesigns['DesignID'];
				}
			  }
			 //***********//***********//***********//***********	
		   ?>
           
           
              
              <div class="col-md-4">
                <div class="Thumbnails">
	              <h4> <?=ucfirst($list->type)?> Label </h4>
	              <img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive" />
	              <p> <?=$list->size?> </p>
	              <div class="middle">
		              <a class="edit_design" data-label-id="<?=$gotoid?>" data-selected="<?=$is_selected?>">Add to editor</a>
	              </div>
              </div>
             </div>
		
    <? } ?>
  
   
                </div>
              </div>
            </div>
          </div>
        </div>
    
    
    
     <div class="ourTeam lba-ourTeam col-md-3">
      <div class="thumbnail set_box" style="padding-bottom:0px !important;">
        <div class="set_head">
          <h3 class="pr-title" style="color: #17b1e3;">Saved Designs</h3>
          <p>Please select front jar label size that best fits your product</p>
         </div>
           <div class="set_body">
             <div class="row">
	          <div class="col-md-12">
           
          <?  
		   $lba_cart = $this->home_model->fetch_user_lba_cart(); 
		   foreach($lba_cart as $cart){ 
		     $labeldata = $this->home_model->get_lba_one_labels_data($cart->LabelID);
			   
			    if($labeldata['available_in'] == "both"){
				 $tcode = explode(",",$labeldata['association']);
				 $t_code = $tcode[0];
				}else if($labeldata['available_in'] == "Roll"){}
				 else{
				 $t_code = $labeldata['association'];
				}
				
			    $productname = $this->home_model->get_db_column('category','CategoryName','CategoryID',$t_code);
				$temp = explode("-",$productname);
				$labeldata['size'] = trim(end($temp));
				$labeldata['size'] = str_replace('Roll Labels','',$labeldata['size']);
				
				$designdata = $this->home_model->get_user_lba_data($cart->DesignID);	
				$imgsrc = LABELER."users/".$designdata['Thumb'];
				$is_selected = 'true';
				$gotoid = $cart->DesignID;
				
		   ?>  
           
               <div class="col-md-4">
                <div class="Thumbnails">
	              <h4> <?=ucfirst($labeldata['type'])?> Label </h4>
	              <img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive" />
	              <p> <?=$labeldata['size']?> </p>
	              <div class="middle">
		           <a class="edit_design" data-label-id="<?=$gotoid?>" data-selected="<?=$is_selected?>">Add to editor</a><br /><br />
                   <a onclick="cart_panel(<?=$gotoid?>,<?=$is_selected?>)">Add to cart</a>
	              </div>
              </div>
             </div>
		
    <? } ?>
  
   
                </div>
              </div>
            </div>
          </div>
        </div>
        
        </div>
        

      </div>
    </div>
  </div>
   <? } ?>