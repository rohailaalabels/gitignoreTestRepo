

 <div class="row bg-n-border-radius lba-space m-t-20 set_box" id="lba_cart">
   <div class="bgGray">
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
		        $imgsrc = LABELER."thumb/".$product->image;
			 ?>

             <div class="col-md-2">
              <div class="Thumbnails">
	              <h4> Title </h4>
	              <img onerror='imgError(this);' src="<?=$imgsrc?>" class="img-responsive" />
	              <p> 85 mm x 40 mm / 85 mm x 10 mm </p>
	              <div class="middle">
		              <a class="edit_design" data-label-id="<?=$product->ID?>" data-selected="false">Add to editor</a>
	              </div>
              </div>
             </div>
               <?=$product->size?>

		  <? endforeach;?>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>