<div class="row lba-space set_box" id="lba_cart">
  <div class="bgGray LBABG-Grey" style="padding-top:10px !important;">
    <div class="container">
      <div class="ourTeam lba-ourTeam">
        <div class="thumbnail set_box" style="padding-bottom:0px !important;">
          <div class="set_head">
            <h1 class="pr-title" style="color: #17b1e3;">Select Your Label Shape & Size</h1>
            <p>Please select from the front (Brand & Product), back (Ingredient/Informational), lid and wrap-around labels available for your product packaging. Alternatively view more shapes and sizes available to use by selecting the option lower down this page.</p>
          </div>
          <div class="set_body">
            <div class="row">
              <div class="col-md-12">
                <?php
				$i = 0;
				foreach($products as $product){
				if($product->available_in == "both"){
				 $tcode = explode(",",$product->association);
				 $t_code = $tcode[0];
				}elseif($product->available_in == "Roll"){
				 $t_code = $product->association;   
				}else{
				 $t_code = $product->association;
				}
				
			    $productname = $this->home_model->get_db_column('category','CategoryName','CategoryID',$t_code);
				$temp = explode("-",$productname);
				$product->size = trim(end($temp));
				$product->size = str_replace('Roll Labels','',$product->size);
		        $imgsrc = LABELER."thumb/".$product->image;
				if($i==0)
				{
					$cover_image = $imgsrc;
					$coverid = $product->image;
				}
				$gotoid = $product->ID;
				$is_selected = 'false';
			 ?>
                <div class="col-md-<?=$product->col_md?>" style="padding-bottom:10px;">
                  <div class="Thumbnails lba-Thumbnails-height">
                    <h4>
                      <?=ucfirst($product->type)?>
                      Label </h4>
                    <div class="img-text-adjst"><img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive" /></div>
                    <p>
                      <?=$product->size?>
                    </p>
                    <div class="middle"> <a class="edit_design" data-label-id="<?=$gotoid?>" data-selected="<?=$is_selected?>">Open in Label Editor</a> </div>
                  </div>
                </div>
                <? $i++;};?>
                <div class="col-md-2" style="padding-bottom:10px;">
                  <div class="Thumbnails lba-Thumbnails-height trigger_modal" data-designid="<?=$products[0]->Designid?>" data-setid="<?=$products[0]->ID?>" data-coverid="<?=$coverid?>">
                    <div class="more-sizes-link"><img src="<?=Assets?>images/lba/custom-shape.png" class="img-responsive"></div>
                    <p class="modal_trigger_p" style="padding-top:0;"> View more shapes and sizes for this design and have our studio prepare the template for only
                      <?=symbol.$this->home_model->currecy_converter(5.00)?> ex VAT
                    </p>
                  </div>
                </div>
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
<style>
.img-text-adjst{
	max-height:170px !important;
	margin:0 auto;
	height:170px;
}
</style>
