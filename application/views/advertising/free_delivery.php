<? 	 $customer_country = $this->home_model->customer_country_info();
	 if(isset($customer_country) and $customer_country!='United Kingdom'){ 
	 
	 	$totalprice = $this->home_model->currecy_converter(50, 'no');
		
					
					?>

<a href="<?=base_url()?>delivery/">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
  <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
    <div class="AdsFreeDelivery col-sm-12">
      <div class="col-sm-12 col-md-12">
        <div>
          <h2>FREE DELIVERY<span> BELGIUM, DENMARK, FRANCE, GERMANY, HOLLAND, LUXEMBOURG, SWEDEN, SPAIN &amp; SWITZERLAND</span> </h2>
        </div>
      </div>
      <div class="col-sm-12 col-md-12"> <img onerror='imgError(this);' class="img-responsive" width="250" height="177" title="DPD Delivery Van" alt="DPD Delivery Van" src="<?=Assets?>images/dpd.png">
        <p>for orders over <span>
          <?=symbol.$totalprice;?>
          </span> Inc. vat </p>
      </div>
    </div>
  </div>
</div>
</a>
<? }else{
				$totalprice = $this->home_model->currecy_converter(25, 'no'); ?>
<a href="<?=base_url()?>delivery/">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
  <div class="thumbnail p-l-r-10 col-xs-12 col-sm-12 col-md-12">
    <div class="AdsFreeDelivery col-sm-12">
      <div class="col-sm-12 col-md-12">
        <div>
          <h2><span>FREE DELIVERY </span> WORLDWIDE</h2>
        </div>
      </div>
      <div class="col-sm-12 col-md-12"> <img onerror='imgError(this);' class="img-responsive" width="250" height="177" title="DPD Delivery Van" alt="DPD Delivery Van" src="<?=Assets?>images/dpd.png">
        <p>QUAIFYING ORDER VALUES VARY<span style="font-size: 12px;text-transform: none;font-weight: 500;display: block;color: #666666;">
PLEASE CHECK THE DELIVERY &amp;
SHIPING OPTIONS UNDER
“SITELINKS” IN THE PAGE
FOOTER BELOW          
          </span> </p>
      </div>
    </div>
  </div>
</div>
</a>
<? } ?>
