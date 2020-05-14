

<? $designs = $this->home_model->get_related_designs($category->CID); ?>

<div class="row bg-n-border-radius " id="">
   <div class="bgGray">
    <div class="container">
    
       <div class="lba-mat-slider" style="background:none !important;">
          <div class="panel-body p-l-r-10">
          <h2 class="">Related Items</h2>
         
         
              
            <div class="lbApp-pm lbp-s">
                <div class="pSlider p-t-10 ">
                  <div class="carousel lba-mat slide" id="carouselLBA">
                    <div class="carousel-inner">
                     
                     
        <?   foreach($designs as $row){
               $img_src1 = Assets."images/lba/".$row->full_image;  ?>
                <div class="item active">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="thumbnail">
                            
                   <div class="imgBg  text-center">
                    <img onerror='imgError(this);' class="img-responsive" src="<?=$img_src1?>" alt="" title="">
                   </div> <div class="clear"></div>
                
                 <div class="caption3 text-center">
                     <a href="<?=base_url()?>lba-editor/<?=$row->designID?>/" class="btn-block btn-sm btn orangeBg" role="button" > <i class="fa fa-arrow-circle-right"></i> Use This Design</a>
               </div>
                            <div class="clear"></div>
                          </div>
                        </div>
                      </div>
                     <? } ?>
                    </div>
                    <a class="left carousel-control" href="#carouselLBA" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> <a class="right carousel-control" href="#carouselLBA" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> </div>
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