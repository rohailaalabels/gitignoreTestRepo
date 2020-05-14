
<style>
	.p-l-r-10 {
		padding: 0 !important;
	}
	.lba-mat-slider .lbp-s .thumbnail .caption3 {
		margin-top: 25px !important;
	}
	.lba-mat-slider .lbp-s .thumbnail .imgBg {
		margin-top: 25px;
	}
.item img:hover{
	opacity: 0.5 !important;
	transform: scale(1.05);
}
</style>
<? $designs = $this->home_model->get_related_designs($category->CID); ?>

<div class="row bg-n-border-radius " id="">
   <div class="bgGray">
    <div class="container">
    
       <div class="lba-mat-slider" style="background:none !important;">
          <div class="panel-body p-l-r-10">
          <h2 class="RelatedProducts"><?=$category->sub_name?>
          <? if($category->parent_category==1){ echo "Bottle"; }else if($category->parent_category==2){ echo "Jar"; }else if($category->parent_category==3){ echo "Packaging"; } ?>
          
          Label Designs</h2>
         
         
              
            <div class="lbApp-pm lbp-s">
                <div class="pSlider p-t-10 ">
                  <div class="carousel  carousel-showmanymoveone slide" id="carousel123">
                    <div class="carousel-inner">
                     
                     
        <?  $i=1;
		   foreach($designs as $row){
               $classu = ($i==1)?'active':'';
			   $img_src1 = Assets."images/lba/".$row->full_image; 
			   	$shapesize = $this->db->query("SELECT COUNT(*) as count from lba_sets WHERE Designid = '".$row->designID."'")->row();
				$shapesize = $shapesize->count;
				?>
                <div class="item  <?=$classu?>">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px;">
                  <div class="thumbnail">
                            
                   <div class="imgBg  text-center">
                    <img onerror='imgError(this);' class="img-responsive" src="<?=$img_src1?>" alt="" title="">
                  <br />  <b><?=$shapesize?> Shapes and Sizes</b> <br />
                   </div> <div class="clear"></div>
                
                 <div class="caption3 text-center RelatedCaption">
                     
                     <a href="<?=base_url()?>lba-editor/<?=$row->designID?>/" class="btn-block btn-sm btn orange" role="button" > <i class="fa fa-arrow-circle-right"></i> Select Design</a>
               </div>
                            <div class="clear"></div>
                          </div>
                        </div>
                      </div>
                     <? $i++; } ?>
                    </div>
                    
                     <a class="left carousel-control" href="#carousel123" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> 
                     <a class="right carousel-control" href="#carousel123" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 
                     </div>
                  <div class="clear"></div>
                </div>
            </div>


 				 <div class="clear"></div>
           
            </div>
            <div class="col-xs-1 no-padding"></div>
          </div>
          
          </div>
          
             </div>
                </div>
                   </div>
                   
                   <script>
	  
(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
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
