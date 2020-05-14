<? 	 $customer_country = $this->home_model->customer_country_info();
	 if(isset($customer_country) and $customer_country!='United Kingdom'){
	 
	 	$totalprice = $this->home_model->currecy_converter(50, 'no');
		
					
					?>
     
<a href="<?=base_url()?>delivery">
<div class="col-xs-12 col-sm-4 col-md-4">
  <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
    <div class="AdsFreeDelivery col-sm-12">
      <div class="col-sm-12 col-md-12">
        <div>
          <h2 class="text-white">FREE DELIVERY<span> BELGIUM, DENMARK, FRANCE, GERMANY, HOLLAND, LUXEMBOURG, SWEDEN, SPAIN &amp; SWITZERLAND</span> </h2>
        </div>
      </div>
      <div class="col-sm-12 col-md-11 col-md-offset-1"> <img onerror='imgError(this);' class="img-responsive" width="250" height="177" title="DPD Delivery Van" alt="DPD Delivery Van" src="<?=Assets?>images/dpd.png">
        <p>for orders over <span><?=symbol.$totalprice;?></span> Inc. vat </p>
      
      </div>
    </div>
  </div>
</div>
</a>

<? }else{
				$totalprice = $this->home_model->currecy_converter(25, 'no'); ?>


<a href="<?=base_url()?>delivery/">
<div class="">
  <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
    <div class="AdsFreeDelivery col-sm-12">
      <div class="col-sm-12 col-md-12">
        <div>
          <h2 class="text-white"><span>FREE DELIVERY </span> UK MAINLAND</h2>
        </div>
      </div>
      <div class="col-sm-5 col-lg-9 col-md-12 m-l-l-45 m-l-s-31-p"> <img onerror='imgError(this);' class="img-responsive" width="250" height="177" title="DPD Delivery Van" alt="DPD Delivery Van" src="<?=Assets?>images/dpd.png">
        <p>for orders over <span><?=symbol.$totalprice;?></span> Inc. vat </p>
      
      </div>
    </div>
  </div>
</div>
</a>


						
<? } ?>