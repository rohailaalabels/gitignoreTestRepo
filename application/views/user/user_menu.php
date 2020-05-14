<style>

.T-blue	 {
    border-bottom: 2px solid #17b1e3;

}

.T-blue li.active a	 {   -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #ffffff;
    border-color: #17b1e3 #17b1e3 transparent;
    border-image: none;
    border-style: solid;
    border-width: 2px;
    color: #17b1e3;
    cursor: default;
	margin-bottom: -2px;
	font-size: 14px;
	font-weight:bold; 
	float:none !important; 
}

.T-blue li.active a:hover	 {   
-moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #ffffff;
    border-color: #17b1e3 #17b1e3 transparent;
    border-image: none;
    border-style: solid;
    border-width: 2px;
    color: #17b1e3;
    cursor: default;
	font-size: 14px;
	font-weight:bold; 
	float:none !important; 
}

.T-blue > li > a, .nav > li > a:focus {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #f5f5f5;
    border-color: #e0e0e0 #e0e0e0 transparent;
    border-image: none;
    border-style: solid;
    border-width: 2px;
    color: #bcbcbc;
	float:none !important; 
   
	
	font-weight:bold; 
}

.T-blue > li > a:hover, .nav > li > a:focus {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #f5f5f5;
    border-color: #e0e0e0 #e0e0e0 transparent;
    border-image: none;
    border-style: solid;
    border-width: 2px;
    color: #bcbcbc;
    float:none !important; 
	
	font-weight:bold; 
}

.T-blue > li > a {
  padding: 3px 9px !important;
}


</style>



<? $method = $this->router->fetch_method();?>

<!--<ul class="nav orderStep bg_tab_step " role="tablist">
  <li role="presentation" <? if($method=='user_account') echo 'class="active"';?>  >
  		 	<a href="<?=SAURL?>users/user_account" > <i class="fa fa-user p-t-b"></i>
    		<p >My Account</p>
    </a> </li>
  <li role="presentation" <? if($method=='user_orders') echo 'class="active"';?> > 
  			<a href="<?=SAURL?>users/user_orders" ><i class="fa fa-history  p-t-b"></i>
   		   <p >Order history</p>
    </a> </li>
  <li role="presentation" <? if($method=='user_address') echo 'class="active"';?> > 
  			<a href="<?=SAURL?>users/user_address" ><i class="fa fa-envelope p-t-b"></i>
    		<p >Addresses</p>
    </a> </li>
 <li role="presentation" <? if($method=='user_projects') echo 'class="active"';?> > 
  			<a href="<?=base_url()?>users/user_projects" ><i class="fa fa-paint-brush p-t-b"></i>
    		<p >Projects</p>
    </a> </li>
</ul>-->



<ul class="nav nav-tabs T-blue text-center"  role="tablist">
  <li  role="presentation" class="col-md-3 col-lg-20-p col-sm-3 no-padding col-xs-12 <?=($method=='user_account')?'active':''?>"  >
  		 	<a href="<?=SAURL?>users/user_account" > <i class="fa fa-2x fa-user p-t-b"></i>
    				<p >My Account</p>
   			 </a>
  </li>
  
    <li  role="presentation" class="col-md-3  col-lg-20-p col-sm-3 no-padding col-xs-12 <?=($method=='billing_method')?'active':''?>"  >
  		 	<a href="<?=SAURL?>users/billing_method" > <i class="fa fa-2x fa-credit-card p-t-b"></i>
    				<p >Billing Method</p>
   			 </a>
  </li>
  
  
  <li role="presentation" class="col-md-3 col-lg-20-p col-sm-3 no-padding col-xs-12 <?=($method=='user_orders')?'active':''?>" >
         <a href="<?=SAURL?>users/user_orders" ><i class="fa fa-2x fa-history  p-t-b"></i>
            <p >Order history</p>
        </a> 
  </li>
  <li role="presentation" class="col-md-3 col-lg-20-p col-sm-3 no-padding col-xs-12 <?=($method=='user_address')?'active':''?>" >
     	<a href="<?=SAURL?>users/user_address" ><i class="fa fa-2x fa-envelope p-t-b"></i>
  	  		<p >Addresses</p>
    	</a>
     </li>
     
       <? if(!$this->agent->is_mobile()){ ?> 
      <li role="presentation" class="col-md-2 col-lg-20-p   no-padding col-xs-12 <?=($method=='user_projects')?'active':''?>" >
     	<a href="<?=SAURL?>users/user_projects" ><i class="fa fa-2x fa-paint-brush p-t-b"></i>
  	  		<p>My Saved Designs</p>
    	</a>
     </li>
 	 <? } ?>
    
</ul>