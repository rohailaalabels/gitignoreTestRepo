<?php 	$method = $this->router->fetch_method();
		$class =  $this->router->fetch_class();
		if(($method=='printing' || $method=='customlabels')){
			$phonetapclass = '';
		}else{
			$phonetapclass = 'rTapNumber327505';
		}
?>


<? 	$customer_country = $this->home_model->customer_country_info();
	 if(isset($customer_country) and $customer_country!='United Kingdom'){ ?>
	
	<div class="col-xs-12  col-sm-4 col-md-4 col-lg-3 ">
      <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
        <div class="AdsFreeShipping col-sm-12">
          <div class="col-sm-12 col-md-12">
          <h2>IN A HURRY? <small class="text-justify">If you need your labels quickly, then instead of free delivery there is the option of using the paid, standard delivery service.</small> </h2>
          </div>
          <div class="col-sm-12 col-md-12">
          	        <div class="col-sm-12 col-md-12"> <img onerror='imgError(this);' title="Faster Delviery" alt="Faster Delviery" src="<?=Assets?>images/faster_delivery.png">
             <p class="text-justify">The production cut-off for the calculation of working days in delivery terms is 16:00 If your order is placed before this time, then the next day is the first working day. </p>
          
          </div>
        </div>
      </div>
    </div>
  </div>
<? }else{?>
   
   
<style>
.AdsFreeShipping h2 small {
    line-height: normal;
}    
</style>   
   
<div class="col-xs-12  col-sm-4 col-md-4 col-lg-3">
  <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
    <div class="AdsFreeShipping col-sm-12">
      <div class="col-sm-12 col-md-12">
      <h2>FAST ORDER FULFILLMENT<small class="text-justify">We understand that sometimes  our  customers are in a hurry for their labels and we do everything within our power to ensure your label orders are produced and despatched quickly.</small> </h2>
      </div>
      <div class="col-sm-12 col-md-12"> <img onerror='imgError(this);' style="height:165px;"  class="img-responsive" width="250" height="250" title="Same Working day" alt="Same Working day" src="<?=Assets?>images/delivery_box.png">
        <p class="text-justify">We regularly produce label orders for satisfied customers in > 40 countries worldwide.</p>
<a class="btn orangeBg" title="AALabels Delivery Options" href="<?=base_url()?>delivery/" >Delivery Options</a>
      
      </div>
    </div>
  </div>
</div>
<? } ?>