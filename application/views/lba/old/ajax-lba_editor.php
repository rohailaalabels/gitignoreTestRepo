
      <? $is_logged = $this->session->userdata('logged_in'); ?>
        <ul class="nav nav-tabs lba-nav-tabs">
          <?php $i = 0; foreach($products as $pro):
		    $labels_per_sheet = 0;
			if($pro->available_in == "both"){
			 $tcode = explode(",",$pro->association);
			 $t_code = $tcode[0];
			}elseif($available_in == "Roll"){}
			else{
			 $t_code = $pro->association;
			}
			$labels_per_sheet = $this->home_model->get_db_column('products','LabelsPerSheet','CategoryID',$t_code);
			$imgsrc = LABELER."thumb/".$pro->image;
			$isselected = "false";
	
	//***********//***********//***********//***********		
	  if($is_logged==true){
	    $userdesigns = $this->home_model->check_user_design($pro->set_id,$pro->Designid);
		if(!empty($userdesigns)){
		 $designdata = $this->home_model->get_user_lba_data($userdesigns['DesignID']);	
		 $imgsrc = LABELER."users/".$designdata['Thumb'];
		 $isselected = "true";
		}
	  }
	//***********//***********//***********//***********			
	
		
            $i++; ?>
          <li class="<?=($i==1)?'active':''?>"> <a href="#<?=$pro->productID.$pro->type?>" data-toggle="tab" data-productID="<?=$pro->productID?>" data-CID="<?=$pro->CID?>" data-size="<?=$pro->size?>" data-shape ="<?=$pro->shape?>" data-thumbnail="<?=$pro->full_image?>" data-labelspersheet="<?=$labels_per_sheet?>" data-available_in="<?=$pro->available_in?>" data-association="<?=$pro->association?>" data-labelid="<?=$pro->set_id?>" data-selected="<?=$isselected?>"> <img onerror='imgError(this);' src="<?=$imgsrc?>" class="lba-thubmnail-image"> </a> </li>
          <?php endforeach;?>
        </ul>
        <div id="myTabContent" class="tab-content">
       <?php $i = 0; foreach($products as $pro): $i++; 
	         $imgsrc = LABELER."thumb/".$pro->image;
			 $isselected = "false";
			 $gotoid = $pro->set_id;
	
	//***********//***********//***********//***********		
	  if($is_logged==true){
	    $userdesigns = $this->home_model->check_user_design($pro->set_id,$pro->Designid);
		if(!empty($userdesigns)){
		 $designdata = $this->home_model->get_user_lba_data($userdesigns['DesignID']);	
		 $imgsrc = LABELER."users/".$designdata['Thumb'];
		 $isselected = "true";
		 $gotoid = $designdata['ID'];
		}
	  }
	//***********//***********//***********//***********	
	?>   
	    
	
          <div class="tab-pane <?=($i==1)?'active':''?> lba-tab-pane" id="<?=$pro->productID.$pro->type?>"> <img onerror='imgError(this);' src="<?=$imgsrc?>" class="image" style="width:50%">
            <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
              <!-- Button trigger modal -->
       <button type="button" class="btn orangeBg m-t-20 edit_design"  data-label-id="<?=$gotoid?>" data-selected="<?=$isselected?>" > Edit my design </button>
       <!--data-toggle="modal" data-target="#LoadFlashModal" -->
              <!-- Modal --> 
            </div>
          </div>
          <?php endforeach;?>
        </div>
     