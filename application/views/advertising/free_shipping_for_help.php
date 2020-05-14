

<? 	$customer_country = $this->home_model->customer_country_info();
	 if(isset($customer_country) and $customer_country!='United Kingdom'){ ?>
	
	<div class="col-xs-12  col-sm-4 col-md-4 ">
      <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
        <div class="AdsFreeShipping col-sm-12">
        <div class=" col-sm-12 col-xs-12 col-lg-4 col-md-4 ">
<div class=" col-md-12">
        <div class="roll-ads">
              <div class=" text-center">
              <div class="col-sm-5 text-center">
              <img onerror='imgError(this);'   class="" src="<?=Assets?>images/ld-img.png" alt=""></div>
              <div class="col-sm-7 hidden-xs text-center">
              <img onerror='imgError(this);'  class="" src="<?=Assets?>images/ld-img-3.png" alt=""></div>
               <div class="clear m-t-b-8"></div>
              <a href="<?=base_url()?>custom-label-tool" class="btn  orangeBg"> Start Designing Labels <i class="fa fa-paint-brush"></i></a> 
              </div>
          </div>
    </div> </div>
      </div>
    </div>
    </div>
<? }else{?>
   
   
   
  <div class="row"> 
<div class="col-xs-12  col-sm-12 col-md-12 ">
  <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
    <div class="roll-ads col-sm-12">
      <div class=" ">
<div class=" ">
        <div class="">
              <div class=" ">
              <div class="col-sm-12 text-center">
              <img onerror='imgError(this);'   class="" src="<?=Assets?>images/ld-img_04.png" alt="Create your own labels"></div>
              <div class="col-sm-12 hidden-xs text-center">
              <img onerror='imgError(this);'  class="" src="<?=Assets?>images/ld-img-3.png" alt="Create your own labels"></div>
               <div class="clear m-t-b-8 text-center"></div>
               <div class="text-center p-t-10"><a href="<?=base_url()?>custom-label-tool/" class="btn  orangeBg"> Start Designing Labels <i class="fa fa-paint-brush"></i></a> </div>
              
              </div>
          </div>
    </div> </div>
      
    </div>
  </div>
</div>
</div>

<style>
.roll-ads {
    background: rgba(0, 0, 0, 0) url("<?=Assets?>images/ld-img-2.png") no-repeat scroll 0 0 / cover ;
    border-radius: 6px;
    /*box-shadow: 0 4px 0 #848484;*/
    display: inline-block;
    
    padding: 10px !important;
    
}
</style>
<? } ?>