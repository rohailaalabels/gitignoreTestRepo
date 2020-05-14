

 <div class="row lba-space set_box" id="lba_cart">
   <div class="bgGray LBABG-Grey" style="padding-top:10px !important;">
    <div class="container">
  
	
    <div class="ourTeam lba-ourTeam">
      <div class="thumbnail set_box" style="padding-bottom:0px !important;">
        <div class="set_head">
          <h3 class="pr-title" style="color: #17b1e3;">Select your Label shape and size</h3>
          <p>Please select front jar label size that best fits your product</p>
         </div>
        <div class="set_body">
          <div class="row">
	          <div class="col-md-12">
       <?php   foreach($products as $product): 
	   
				if($product->available_in == "both"){
				 $tcode = explode(",",$product->association);
				 $t_code = $tcode[0];
				}elseif($product->available_in == "Roll"){}
				 else{
				 $t_code = $product->association;
				}
				
			    $productname = $this->home_model->get_db_column('category','CategoryName','CategoryID',$t_code);
				$temp = explode("-",$productname);
				$product->size = trim(end($temp));
				$product->size = str_replace('Roll Labels','',$product->size);
		        $imgsrc = LABELER."thumb/".$product->image;
				$gotoid = $product->ID;
				$is_selected = 'false';
			 ?>
             
             <div class="col-md-2" style="padding-bottom:10px;">
              <div class="Thumbnails lba-Thumbnails-height">
	              <h4> <?=ucfirst($product->type)?> Label </h4>
	              <img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive" />
	              <p> <?=$product->size?> </p>
	              <div class="middle">
		              <a class="edit_design" data-label-id="<?=$gotoid?>" data-selected="<?=$is_selected?>">Open in Label Editor</a>
	              </div>
              </div>
             </div>
              
        <? endforeach;?>

                 <input type="hidden" id="edited-label" value="" />
                 <input type="hidden" id="design-selected" value="" />
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>