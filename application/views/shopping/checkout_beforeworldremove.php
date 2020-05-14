<script src="https://cdn.worldpay.com/v1/worldpay.js"></script>
<style>
.normal_checkout{
    background: #f5f5f5 none repeat scroll 0 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
}
.mobileBody #_el_input_nameoncard input{
	width:50%!important;
}
#aja_cart .p0 {
	padding: 0 !important;
}
</style>
<? $animate = $this->session->userdata('animate');
    if(isset($animate) and $animate=='yes'){
   	echo "<script>$(window).load(function() { $('html, body').animate({ scrollTop: $('#aja_cart').height()+250 }, 1000); });</script> ";
	$this->session->unset_userdata('animate',''); 
} ?>  
<script src="<?=Assets?>js/cart.js?ver=<?=time()?>"></script> 
<div class="">
            <div class="container m-t-b-8 ">
                    <div class="col-md-8">
                            <ol class="breadcrumb  m0">
                                  <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
                                  <li class="active">Checkout</li>
                            </ol>
                    </div>
            </div>
    </div>
<div class="bgGray">
<div class="container">
        <div class="panel">
                    <div class="row">
                            <div class="col-xs-7  col-sm-8 col-md-7">
                                <div class="col-xs-12  col-sm-6 col-md-6  ">
                                    <h1>Checkout</h1>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
                                    <div class="pull-right">
                                        <a role="button" class="btn orange pull-right" href="<?=base_url()?>">
                                                <i class="fa fa-arrow-circle-left faa-horizontal animated"></i>&nbsp; Continue Shopping
                                        </a>
                                    </div>
                            </div>
                    </div>
        </div>
<!-- Checkout -->
        <div id="aja_cart" class="thumbnail ">
              <? include('cart.php');?>
        </div>
       
    <?  $usertype = $this->input->get('checkout');
		$userid = $this->session->userdata('userid');
		$show_newsletter = 'Yes';
		
		if($usertype=='' and $userid==''){
			?>
			       
  		      <div class=" thumbnail">
			<div >
               <div class=" m-t-b-10 ">
                     <form class="labels-form" id="login_form" method="post" action=""> 
                      <input type="hidden" name="page" value="checkout"  />    
                            <div class="col-sm-6 m-t-10">
                                    <div class="bgBlueHeading  ">
                                        <div class="  f-16 "> Login to your account </div>
                                    </div>
                                    <div class="borderPanel"> 
                                    
                                        <div class="m-t-15">
                                              <div class="p-l-r-10">
                                                <label id="server_error" style=" display:none;" class="error" ></label>
                                              
                                                  <div class=" ">
                                                  <label class="input">
                                                    <i class="icon-append fa fa-user"></i>
                                                    <input type="email" placeholder="Enter Email address" name="email" id="email" class="required">
                                                  </label>
                                                  </div> 
                                             <div class=" ">
                                             <label class="input">
                                             <i class="icon-append fa fa-lock"></i>
                                             <input type="password" placeholder="Enter Password" name="password" id="password" class="required">
                                             </label>
                                             </div>
                                                <div class=" ">
                                                    <label class="pull-right">
                                                    <a class="TextGray" href="<?=SAURL?>users/forgotpassword">Forgot Your Password ?</a> </label>
                                                </div>
                                                <div>
                                              
                                                   <button  style="margin-top:43px; " type="submit" class="btn-u btn-u-sm orange text-uppercase">Sign in &nbsp; &nbsp; 
                                                         <i class="fa fa-arrow-circle-right"></i>
                                                   </button>
                                                </div>
                                             </div>
                                         </div>
                                     </div>   
                            </div>
                            
                                   </form>
                    <div class="col-sm-6 m-t-10">
                    <div class="bgBlueHeading  ">
                    <div class="  f-16"> Checkout As Guest </div>
                    </div>
                    <div class="borderPanel"> 
                    <div class="m-t-15">
                      <div class="p-l-r-10">
                          <div class="text-center">
                          <h4 class="Textblack">Don't have a account with AA Labels</h4>
                          <img onerror='imgError(this);' class="m-t-15" src="<?=Assets?>images/logo.png"> </div>
                          <div class="">
                          
                                         <a href="<?=SAURL?>transactionregistration.php?checkout=guest" class="btn orange text-uppercase m-t-30">
                                                Checkout As Guest &nbsp; &nbsp; <i class="fa fa-arrow-circle-right"></i> 
                                         </a>
                             
                                         <label class="pull-right">
                                         <i class="fa fa-5x fa-user-plus cBlue"></i> </label>
                            </div>
                        </div>
                      </div>
                   </div>   
                </div>
              </div>

      </div> 
      
      
<script>
	$(document).ready(function() {
		  var loginform = $("#login_form");
		 	  loginform.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
		 	  submitHandler: function(loginform) {
				 	$.post(base+'ajax/user_login', $("#login_form").serialize(), function(data) {
							if(data.response=='error'){
									$('#server_error').text("Email address or password is invalid!");
									$('#server_error').show();
							}else{
								if(data.url!=''){
									window.location.href = data.url;
								}
								
						}
							//swal("Alright!", "invalid login details", "success");  
							return false;   
					},'json');
						   
				return false;
  		   }
  		});
	});	
</script>               
    </div>
             

			
		<? 
		}
		else{
			
			
			if(isset($userid) and $userid!=''){
					
					$user = $this->user_model->get_data();
					
					
					if(isset($user['UserEmail']) and $user['UserEmail']!=''){
						$query = $this->db->query("select count(*) AS Total from email_addresses WHERE email LIKE '".$user['UserEmail']."'");
				   		$query = $query->row_array();
						if(isset($query['Total']) and $query['Total'] > 0){ 
							$show_newsletter = 'no';
						}	   
				   	}
                  	
				  
				  
					
					$show_pass = 'No';
					
					$billing_email   = $user['UserEmail'];
					$billing_fname   =  ucwords($user['BillingFirstName']);
					$billing_lname 	 =  ucwords($user['BillingLastName']);
					$billing_pno 	 =  ucwords($user['BillingTelephone']);
					$billing_mno 	 =  ucwords($user['BillingMobile']);
					$billing_pcode 	 =  ucwords($user['BillingPostcode']);
					$billing_add1 	 =  ucwords($user['BillingAddress1']);
					$billing_add2 	 =  ucwords($user['BillingAddress2']);
					$billing_city 	 =  ucwords($user['BillingTownCity']);
					$billing_company =  ucwords($user['BillingCompanyName']);
					$billing_county  =  ucwords($user['BillingCountyState']);
					//$res_b			 =  ucwords($user['BillingResCom']);
					
					$delivery_email      =  $user['DeliveryEmail'];
					$delivery_fname      =  ucwords($user['DeliveryFirstName']);
					$delivery_lname 	 =  ucwords($user['DeliveryLastName']);
					$delivery_pno 	     =  ucwords($user['DeliveryTelephone']);
					$delivery_mno 	     =  ucwords($user['DeliveryMobile']);
					$delivery_pcode 	 =  ucwords($user['DeliveryPostcode']);
					$delivery_add1 	     =  ucwords($user['DeliveryAddress1']);
					$delivery_add2 	     =  ucwords($user['DeliveryAddress2']);
					$delivery_city 	     =  ucwords($user['DeliveryTownCity']);
					$delivery_company    =  ucwords($user['DeliveryCompanyName']);
					$delivery_county     =  ucwords($user['DeliveryCountyState']);
					//$res_d			     =  ucwords($user['DeliveryResCom']);
					
					$country			 =  	$user['BillingCountry'];
					$dcountry			     =  $user['DeliveryCountry'];
					
					$second_email		 =  $user['SecondaryEmail'];
					
			
			}else{
				
					$show_pass =  '';
					
					$billing_email   =  '';
					$billing_fname   =  '';
					$billing_lname 	 =  '';
					$billing_pno 	 =  '';
					$billing_fno 	 =  '';
					$billing_mno 	 =  '';
					$billing_pcode 	 = '';
					$billing_add1 	 =  '';
					$billing_add2 	 =  '';
					$billing_city 	 =  '';
					$billing_company =  '';
					$billing_county  =  '';
					$res_b			 =  '';
					
					$delivery_email      =  '';
					$delivery_fname      =  '';
					$delivery_lname 	 =  '';
					$delivery_pno 	     =  '';
					$delivery_fno 	     =  '';
					$delivery_mno 	     =  '';
					$delivery_pcode 	 =  '';
					$delivery_add1 	     =  '';
					$delivery_add2 	     =  '';
					$delivery_city 	     =  '';
					$delivery_company    = '';
					$delivery_county     =  '';
					$res_d			     =  '';
					$country = '';
					$dcountry = '';
					$second_email = '';
				
				
				
				
				
				
			}
			
			?>
		
  	<? if(isset($error) and $error!=''){
						 if(!isset($errortype)){   
									$billing_email = $this->input->post('email');
									$billing_fname = $this->input->post('b_first_name');
									$billing_lname = $this->input->post('b_last_name');
									$billing_pno = $this->input->post('b_phone_no');
									$billing_fno = $this->input->post('b_fax');
									$billing_pcode = $this->input->post('b_pcode');
									$billing_add1 = $this->input->post('b_add1');
									$billing_add2 = $this->input->post('b_add2');
									$billing_city = $this->input->post('b_city'); 
									$billing_company = $this->input->post('b_organization');
									$billing_county = $this->input->post('b_county');
									//$res_b = $this->input->post('b_ResCom');
									
									$delivery_email = $this->input->post('d_email');
									$delivery_fname = $this->input->post('d_first_name');
									$delivery_lname = $this->input->post('d_last_name');
									$delivery_pno = $this->input->post('d_phone_no');
									$delivery_company = $this->input->post('d_organization');
									
									$delivery_fno = $this->input->post('d_fax');
									$delivery_pcode = $this->input->post('d_pcode');
									$delivery_add1 = $this->input->post('d_add1');
									$delivery_add2 = $this->input->post('d_add2');
									$delivery_city = $this->input->post('d_city');
									$delivery_county = $this->input->post('d_county');
									//$res_d = $this->input->post('d_ResCom');
									
									$country = $this->input->post('country');
									$dcountry = $this->input->post('dcountry');
									


									$second_email = $this->input->post('second_email');
									
									
						  }		
							?>
      <div class="col-md-12">                      
      <div id="validation_errors" role="alert" class="alert alert-danger alert-dismissible fade in">
          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
          	 <? if(empty($errortype)){?>
          		<strong>Validation error! </strong> Please fix following error.<br />
                <? } ?>
          	<?=$error?>
      </div>
      </div>
      
      <script>$('html, body').animate({scrollTop: $("#validation_errors").offset().top-100}, 1000);</script>
      <? } ?>
    
    <div class=" thumbnail">
		<form  method="post" id="checkout_form" class="labels-form " enctype="multipart/form-data"  action="">
    			   <ul class="nav orderStep setup-panel">
                <li class="active"><a href="#step-1">
                    <i class="fa fa-envelope f-20 p-t-b"></i>
                    <p class="list-group-item-text">Billing</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <i class="fa fa-map-marker p-t-b f-20"></i>
                    <p class="list-group-item-text">Delivery</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <i class="fa fa-truck p-t-b f-20"></i>
                    <p class="list-group-item-text">Shipping</p>
                </a></li>
                 <li class="disabled"><a href="#step-4">
                    <i class="fa fa-gbp p-t-b f-20"></i>
                    <p class="list-group-item-text">Review &amp; Pay</p>
                </a></li>
                 <li class="disabled"><a href="#">
                    <i class="fa fa-check-circle p-t-b f-20"></i>
                    <p class="list-group-item-text">Confirm</p>
                </a></li>
            </ul>	
        
        		 <div class="setup-content" id="step-1">
      				 <div class"">
                        <div class="col-sm-12 p0">
                        <h4 class="m-t-b-8 m-l-20 cBlue">Billing Address</h4></div>
                        <div class="col-sm-4">
                         
                                   <div class="col-md-4 ">
                                    <label class="select">
                                        <select name="billing_title" id="title">
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Miss.">Miss.</option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Prof.">Ms.</option>
                                            <option value="Rev.">Rev.</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </div>
                                    <div class="col-md-8 ">
                                       
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                  <input type="text" name="b_first_name" placeholder="First Name" id="b_first_name" value="<?=$billing_fname?>" class="required"> <b class="tooltip tooltip-bottom-right">Please Enter First Name</b>
                                </label>
                  
                                    </div>
                                    
                             
                                
                              
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                  <input type="text" placeholder="Last Name" name="b_last_name" id="b_last_name" value="<?=$billing_lname?>"  class="required">
                           <b class="tooltip tooltip-bottom-right">Please Enter Last Name</b>             
                                    </label>
                                </div>
                                
                                <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Phone Number" name="b_phone_no" value="<?=$billing_pno?>"  id="b_phone_no" class="required">
             <b class="tooltip tooltip-bottom-right">Please Enter Phone Number</b>                           
                                    </label>
                                </div>
                               
                              <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Mobile Number" name="b_mobile" value="<?=$billing_mno?>"  id="b_mobile">
                                        <b class="tooltip tooltip-bottom-right">Please Enter Mobile Number</b>
                                        
                                    </label>
                              </div>
                              <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Company Name" value="<?=$billing_company?>"  name="b_organization" id="b_organization">
                                        <b class="tooltip tooltip-bottom-right">Please Enter Company Name</b>
                                        
                                    </label>
                                </div>
                       
                            
                        </div>
                        
                       <div class="col-sm-4">
                       
                       <div class="col-sm-12 " >
                              <label class="select">
                                  <select name="country" id="country" class="required">
                                    <option value="">Select Country </option>
                                    <optgroup label="UK">
                                    <option data-value="GB" <?=($country=='United Kingdom')?'selected="selected"':''?>  value="United Kingdom">United Kingdom</option></optgroup>
                                   
                                    
                                    <optgroup label="EUROPEAN UNION">
                                    
                                    <? 
									foreach($europeunion_list as $row){?>
									<option data-value="<?=$row->c_code?>" data-vat="EUROPEAN UNION" <?=($country==$row->name)?'selected="selected"':''?> value="<?=$row->name?>"><?=$row->name?></option>
									<? }?>
                                     </optgroup>
                                     <optgroup label="EUROPE">
                                     <? 
									foreach($europe_list as $row){?>
									<option <?=($country==$row->name)?'selected="selected"':''?> data-vat="EUROPE" value="<?=$row->name?>"><?=$row->name?></option>
									<? }?>
                                     </optgroup>
                                     
                                    <optgroup label="ROW"><? 
									foreach($restofworld_list as $row){?>
									<option data-value="<?=$row->c_code?>" data-vat="ROW"  <?=($country==$row->name)?'selected="selected"':''?> value="<?=$row->name?>"><?=$row->name?></option>
									<? }?>
                                     </optgroup>
                                     
                                     
                                     
                                    </select>
                                   <i></i>
                                </label>
                             </div>
                             
                             
                          <div class="col-sm-12 " >
                                  <label class="input">
                                     
                                         <i class="icon-append fa fa-search"></i>
                                        <input type="text" placeholder="Postcode" value="<?=$billing_pcode?>"  name="b_pcode" id="b_pcode" class="required is_country_sel">
                                        <b  class="tooltip tooltip-bottom-right">Enter your postcode and select your address from the locations found, using the drop-down menu.</b>

                                    </label>
                                    
                          </div>                              
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="text" placeholder="Address 1" value="<?=$billing_add1?>"  name="b_add1"  id="b_add1" 	 class="required is_country_sel"> 
                     <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b>                   
                                    </label>
                                </div>
                                
                                
                                
                               
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="text" placeholder="Address 2" value="<?=$billing_add2?>" class="is_country_sel"  name="b_add2" id="b_add2">
                            <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b>            
                                    </label>
                                </div>
                               
                                
                                
                                
                       
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-map-marker"></i>
                                        <input type="text" placeholder="City/Town" value="<?=$billing_city?>"  name="b_city" id="b_city" class="required is_country_sel"> <b class="tooltip tooltip-bottom-right">Please Enter City or Town</b>
                                        
                                    </label>
                                </div>
                      
                          
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-map-marker"></i>
                                        <input type="text" placeholder="County " class="is_country_sel" value="<?=$billing_county?>"  name="b_county" id="b_county" >
                     <b class="tooltip tooltip-bottom-right">Please Enter County</b>                   
                                    </label>
                                </div>
                       
                            
                        </div>
                        
                        <div class="col-sm-4">
                               
                           <? if($show_pass=='No'){?>
							  
                                <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="email" placeholder="Email" value="<?=$billing_email ?>" disabled="disabled"  name="email_valid" id="email_valid" >
                                <b class="tooltip tooltip-bottom-right">Email</b>        
                                    </label>
                                </div>
                                
							  
							<? }else{?>
                                       
                               <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="email" placeholder="Email" value="<?=$billing_email ?>"  name="email" id="email" >
                                        
                                    </label>
                                </div>
                                
                        
                                <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" placeholder="Password" id="customer_password" name="customer_password" />
                                 </label>
                                </div>
                      
                          
                               <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" placeholder="Confirm Password " id="re_customer_password" name="re_customer_password" />
                                        
                                    </label>
                                </div>
                                
                                <? } ?> 
								
							
                            
                            <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="email" placeholder="Secondary Email" value="<?=$second_email ?>"  name="second_email" id="second_email" >
                                		<small>Please complete if a copy of the VAT invoice is required e.g. accounts dept.</small>        
                                    </label>
                            </div>
                            
                            
                            
                            <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa fa-bank"></i>
                                        <input type="text" placeholder="Purchase Order Number" name="PurchaseOrderNumber" 
                                        id="PurchaseOrderNumber" >
                                    </label>
                                </div>
                                
                                
                            
                        </div>
                        
                        
                           <? 	if($show_newsletter=='Yes'){?>
                                 <div class="col-sm-12 " >
                                  <h4 class="BlueHeading m-b-10">Newsletter Sign-Up</h4> 
                                    <label class="checkbox"><input type="checkbox" checked="" name="newslwtter_value" class="textOrange" id="newslwtter_value">
                                    <i></i>I would like to receive newsletters and information on offers and discount vouchers to the email address provided. In agreeing to receive communication from time-to-time, AA Labels assures you that your contact details will remain confidential and will not be shared with any third-party.</label>
                                </div>
                                
                       		<? } ?>
                            
                            
                         
                       
                        </div>
                 
                	 <div class="col-sm-12 m-t-10" >
                    		<hr > 
                     </div>
                     <div class="col-sm-12 m-b-10 m-t-20" >
             	
                         <div class="col-xs-12  col-sm-6 col-md-6">
                                        <div class="col-xs-12  col-sm-6 col-md-6  ">
                                                <div class="col-xs-12 pull-left no-padding">
                                                        <a href="<?=base_url()?>shoppingcart.php"  id="see" class="btn blue2 pull-left btn-block">
                                                              <i class="fa fa-arrow-circle-left"></i> Back to Cart
                                                         </a>
                                                
                                                </div>
                                        </div>
                            
                         </div>
                         <div class="clear10 hidden-sm hidden-md hidden-lg"></div>
             
                        <div class="col-xs-12 col-sm-6 col-md-6 ">
                                <div class="col-xs-12 col-sm-6 pull-right ">
                                        <button type="button"  id="activate-step-2" class="btn orange pull-right btn-block"> 
                                        Delivery Address   <i class="fa fa-arrow-circle-right"></i> </button>
                                </div>
                         </div>
					</div>
				 </div>
                
                 <div class="setup-content" id="step-2">
      				 <div class"">
                        <div class="col-sm-12 p0">
                        <h4 class="m-t-b-8 m-l-20 cBlue">Delivery Address</h4></div>
                       <div class="">
                            <div class="col-sm-12 m-l-10 m-b-10  " >
                                <label class="checkbox"><input type="checkbox"  name="delivery_val" class="textOrange" id="delivery_val">
                                <i></i>Auto Fill Same as Billing Address? </label>
                            </div>
                       </div>
                       <div class="col-sm-6">
                         
                                   <div class="col-md-4 ">
                                    <label class="select">
                                        <select name="title_d" id="title_d">
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Miss.">Miss.</option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Prof.">Ms.</option>
                                            <option value="Rev.">Rev.</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </div>
                                    <div class="col-md-8 ">
                                       
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                    <input type="text" placeholder="First Name" id="d_first_name" name="d_first_name" value="<?=$delivery_fname?>"  class="required"><b class="tooltip tooltip-bottom-right">Please Enter First Name</b></label>
                  
                                    </div>
                                    
                             
                                
                              
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Last Name" name="d_last_name" value="<?=$delivery_lname?>" id="d_last_name" class="required"><b class="tooltip tooltip-bottom-right">Please Enter Last Name</b>             
                                        
                                    </label>
                                </div>
                                
                                
                                
                               
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Phone Number" name="d_phone_no" value="<?=$delivery_pno?>" id="d_phone_no" class="required"><b class="tooltip tooltip-bottom-right">Please Enter Phone Number</b>             
                                        
                                    </label>
                                </div>
                               
                                
                                
                                
                       
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Mobile Number" name="d_mobile_no" value="<?=$delivery_mno?>" id="d_mobile_no"><b class="tooltip tooltip-bottom-right">Please Enter Mobile Number</b>             
                                        
                                    </label>
                                </div>
                      			
                                <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="email" placeholder="Email" value="<?=$delivery_email?>" name="d_email" id="d_email"  class="required">
                                        
                                    </label>
                                </div>	
                          
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Company Name" name="d_organization" value="<?=$delivery_company?>" id="d_organization"> <b class="tooltip tooltip-bottom-right">Please Enter Company Name</b>             
                                        
                                    </label>
                                </div>
                        </div>
                       
                       <div class="col-sm-6">
                        <div class="col-sm-12" >
                           <label class="select">
                                  <select name="dcountry" id="dcountry" class="required">
                                    <option value="">Select Country </option>
                                    <optgroup label="UK">
                                    <option data-value="GB" <?=($dcountry=='United Kingdom')?'selected="selected"':''?>  value="United Kingdom">United Kingdom</option></optgroup>
                                   
                                    
                                    <optgroup label="EUROPEAN UNION">
                                    
                                    <? 
									foreach($europeunion_list as $row){?>
									<option data-value="<?=$row->c_code?>" data-vat="EUROPEAN UNION" <?=($dcountry==$row->name)?'selected="selected"':''?> value="<?=$row->name?>"><?=$row->name?></option>
									<? }?>
                                     </optgroup>
                                     <optgroup label="EUROPE">
                                     <? 
									foreach($europe_list as $row){?>
									<option <?=($dcountry==$row->name)?'selected="selected"':''?> data-vat="EUROPE"  value="<?=$row->name?>"><?=$row->name?></option>
									<? }?>
                                     </optgroup>
                                     
                                    <optgroup label="ROW"><? 
									foreach($restofworld_list as $row){?>
									<option data-value="<?=$row->c_code?>" data-vat="ROW"  <?=($dcountry==$row->name)?'selected="selected"':''?> value="<?=$row->name?>"><?=$row->name?></option>
									<? }?>
                                     </optgroup>
                                     
                                     
                                     
                                    </select>
                                   <i></i>
                                </label>
                            		</div>
                         
                         <div class="col-sm-12 " >
                                  <label class="input">
                                         <i class="icon-append fa fa-search"></i>
                                    
                                              <input type="text" placeholder="Postcode" name="d_pcode" value="<?=$delivery_pcode?>" id="d_pcode" class="required is_dcountry_sel">
                                        <b  class="tooltip tooltip-bottom-right">Enter your postcode and select your address from the locations found, using the drop-down menu.</b>
 
                                    </label>
                                    
                                  
                      </div>
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="text" placeholder="Address 1" name="d_add1" value="<?=$delivery_add1?>"  id="d_add1" 	 
                                        class="required is_dcountry_sel"><b class="tooltip tooltip-bottom-right">Please Enter Address Line</b>             
                                        
                                    </label>
                                </div>
                                
                                
                                
                               
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="text" placeholder="Address 2" value="<?=$delivery_add2?>" class="is_dcountry_sel"  name="d_add2" id="d_add2">
                                        <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b>             
                                    </label>
                                </div>
                               
                                
                                
                                
                       
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-map-marker"></i>
                                        <input type="text" placeholder="City/Town" value="<?=$delivery_city?>"  name="d_city" id="d_city" class="required is_dcountry_sel">
           <b class="tooltip tooltip-bottom-right">Please Enter City or Town</b>                                          
                                    </label>
                                </div>
                      
                          
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-map-marker"></i>
                                        <input type="text" placeholder="County" class="is_dcountry_sel" value="<?=$delivery_county?>"  name="d_county" id="d_county">
                        <b class="tooltip tooltip-bottom-right">Please Enter County</b>                             
                                    </label>
                                </div>
                       
                            
                        </div>
                     </div>
                 	<div class="col-sm-12 m-t-10" >
                    		<hr > 
                     </div>
                     <div class="col-sm-12 m-b-10 m-t-20" >


                    <div class="pull-left m-t-10 m-b-10 m-r-5">
                          
                     <small>   <strong>SMS:</strong> If you would like to receive text messages about your orders despatch progress and delivery options, while on route with the courier. Then please do not forget to provide the  mobile phone number, to be used.</small> 
                         
                        </div>


             				<div class="col-xs-12  col-sm-6 col-md-6">
                                    <div class="col-xs-12  col-sm-6 col-md-6  ">
                                            <div class="col-xs-12 pull-left no-padding">
                                                <button id="previous_1" type="button" class="btn blue2 pull-left btn-block">
                                                	<i class="fa fa-arrow-circle-left"></i> Back to Billing 
                                                </button>
                                           </div>
                                    </div>
							</div>
                            <div class="clear10 hidden-sm hidden-md hidden-lg"></div>
							<div class="col-xs-12 col-sm-6 col-md-6 ">
									<div class="col-xs-12 col-sm-6 pull-right ">
 									<button type="button"  id="activate-step-3" class="btn orange pull-right btn-block"> 
                                    		Shipping <i class="fa fa-arrow-circle-right"></i>  
                                    </button>

                               	 </div>
                            </div>
					</div>
				 </div>
                 
              	 <div class="setup-content" id="step-3">
                        
                      <div class="">
                          <h4 class="m-t-b-8 m-l-20 cBlue">Shipping </h4>
                          <div class="col-sm-4">
                            <div class="panel-default"> 
                              <!-- Default panel contents -->
                              <div class="panel-heading">Shipping Address</div>
                              
                              <!-- Table -->
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td>Address:</td> 
                                    <td id="shippind_address_1">141 Woodhead Road </td>
                                  </tr>
                                  <tr>
                                    <td >City/Town:</td>
                                    <td id="shippind_city">BRADFORD</td>
                                  </tr>
                                  <tr>
                                    <td>County:</td>
                                    <td id="shippind_county">West Yorkshire</td>
                                  </tr>
                                  <tr>
                                    <td>Country</td>
                                      <td  id="shipping_country">United Kingdom</td>
                                  </tr>
                                  <tr>
                                    <td>Post Code:</td>
                                    <td id="shippind_postcode">bd7 2bl</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>  
                         <div id="ajax_delivery">
                             <?php include('delivery_charges.php');?>   
                         </div>
                         
                         <div style="display:none;"  class="col-sm-12 ukvatbox">
                             <div class="col-md-8">
                              <label class="checkbox"><input type="checkbox" id="unreg_vat"  name="unreg_vat" value="yes" class="textOrange">
                                <i></i>If you have a VAT number and qualify for exemption on this order. Please tick this box, enter the number below and verify.</label>
                             </div>
                             <div class="clear10"></div>        
                             
                             <div class="col-md-3 no-padding">
                                <div class="input-group"> <span id="vat_cc" class="input-group-addon">&nbsp;</span> 
                                 <input type="text" id="vatnumber" disabled="disabled" name="vatnumber" placeholder="Enter VAT number" class="form-control"> 
                                 </div>
                             </div>
                             <div class="col-md-2">
                                        <button class="btn orange btn-block" disabled="disabled" id="vat_validator" type="button"> Verify </button>
                            </div>
                            <div class="col-md-12">
                               <h5 id="vat_name"></h5>
                            </div>
                    		<div class="clear10 hidden-sm hidden-md hidden-lg"></div>
                             <div class="col-md-8 hide">
                                As you are not a UK customer for the purpose of exempting VAT from your purchase, please provide
                                a valid VAT number for your business and VAT will be excluded from your order.
                            </div>
                                    
                                  
                     </div>
                     
                     
                     
                     </div>
                     
                     <div id="delivertimeynote" class="col-sm-12 m-t-10" >
                     <div><p><small> <strong>Please note:</strong> 
                    		 Orders placed before 16:00 qualify for next day delivery, providing this is not a weekend or UK public holiday. Orders received after 16:00 will be treated as having been received the next working day after placement, in production planning terms and the next working day for delivery will be calculated accordingly. For a Saturday delivery the order must also be placed before 16:00 on the Friday before. </small></p></div>
                    	<hr > 
                     </div>

              <div id="offshoredeliverynote" class="col-sm-12 m-t-10" style="display:none;">
                   <div >
                   
                      <h4>Exception &amp; Offshore Deliveries</h4>
                      <p>Please be aware that delivery to an address considered an exception postcode will incur a delivery 
                      charge of <?  echo symbol.$this->home_model->currecy_converter(11.75, 'no'); ?> 
                       plus VAT. Postcodes which classify as exception postcodes on mainland UK are decided by our couriers.
                      <br /></p>
                   
                  </div>
             </div>
                     
                        
           			 
                     <div class="col-sm-12 m-b-10 m-t-20" >
             	
                         <div class="col-xs-12  col-sm-6 col-md-6">
                                        <div class="col-xs-12  col-sm-6 col-md-6  ">
                                                <div class="col-xs-12 pull-left no-padding ">
                                                   <button type="button" id="previous_2"  class="btn blue2 pull-left btn-block">
                                                   <i class="fa fa-arrow-circle-left"></i> Delivery  </button>
                                                </div>
                                        </div>
                            
                         </div>
                         <div class="clear10 hidden-sm hidden-md hidden-lg"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6 ">
                                <div class="col-xs-12 col-sm-6 pull-right ">
                                  <button type="button" id="activate-step-4" class="btn orange pull-right btn-block">Review &amp; Pay 
                                	  <i class="fa fa-arrow-circle-right"></i> 
                                  </button>
                                </div>
                         </div>
					</div>

               </div>
               
             	 <div class="setup-content" id="step-4">
                   
           
<div class="col-sm-12 col-xs-12 col-md-6 m-t-20 paymentdiv" style=" <?=(isset($sample) and $sample=='sample')?'display:none;':''?>" >
 <strong class="textBlue">Payment Method</strong>
 
 
<!--<img onerror='imgError(this);' class="img-responsive" alt="payment methods" src="<?=Assets?>images/visa-icon2.png">-->

  
               
                 
                  <div class="paymentInputs11">
                  
                   
                   <div class="m-t-10">
                   	<label class="radio borderRadius ">
                       <input type="radio" class="" id="worldpay" value="creditCard"  name="paymentway"> 
                       <i class="rounded-x m-l-10"></i>&nbsp; 
                       <strong>Pay by Credit / Debit Card </strong>
                       <img onerror='imgError(this);' style="float:right;" src="<?=Assets?>images/worldpay.png" class="img-responsive hidden-xs hidden-sm">
                       </label>
                <? 
				   if(isset($userid) and $userid!=''){
						 $cards = $this->user_model->get_user_saved_cards();
						  if(count($cards) > 0){  ?>
						 <div class="col-md-7">
                               <label class="cardsonfile select m-t-10" style="display:none; margin-bottom:0px;">
                                    <select name="creditcard" id="creditcard" class="required">
                                      <option  value="">Select your saved credit cards</option>
                                       <? foreach($cards as $row){
                                           //$cardname = $row->maskedCardNumber;
										    $cardname =  explode("_",$row->cardType);
											$cardname = $cardname[0].' '.$row->maskedCardNumber;
										   //$cardname = '( '.str_replace("_"," ",$row->cardType).' ) '.$row->maskedCardNumber;
                                           ?>
                                        <option <?=($row->is_default == 1)?'selected':''?>  value="<?=$row->token?>"><?=$cardname?></option>
                                       <? } ?>
                                      <!-- <option value="not-on-file"> Pay with a new card</option>-->
                                    </select>
                                    <i></i> 
                              </label>
						</div>
                       <div class="col-md-5">     
                         <label class="cvcinput input m-t-10" style="display:none; margin-bottom:0px;">
                            <i class="icon-append fa fa-key"></i>
                            <input type="text" size="4" placeholder="CVC Number" autocomplete="off" value="" id="cvcnumb"  class="required">
                        </label>
                      </div>  
               		 <div class="col-md-7 m-t-10 cardsonfile paywithnewcard" style="display:none;">
                     	<a href="javascript:void(0);" class="textBlue paywithnewcardbtn">Pay with new card</a>
              		 </div>
                     <div class="clear"></div>
                     
             <? } } ?> 
            
          <div class="retain_card_opt m-l-10 m-t-10" style="display:none;">
                   <label class="checkbox pull-right" style=" position:absolute; margin-left:410px; margin-top:15px !important;" >
                        <input type="checkbox" value="0" name="retain_cards" id="retain_cards" class="textOrange"><i></i>
                   </label>
                   <p style="font-size:11px;"> Your card details are securely stored with Worldpay enabling future purchases. However if you would prefer not to have your card details retained please tick this box.</p> 
             </div>
             
             <div class="col-md-12 col-sm-12">
          		 <div class="ps_container">
<style>.mobileBody #_el_input_nameoncard input{width:50%!important;}</style>
<script>
var sheet = window.document.styleSheets[0];sheet.insertRule('.mobileBody #_el_input_nameoncard input { width: 20%!important; }', sheet.cssRules.length);
</script>
                  <div id="paymentSection"></div>
                  </div>
              </div>
                  
                  
                  <div class="col-md-7 m-t-10 paywithexistingcards" style="display:none;">
                     	<a href="javascript:void(0);" class="textBlue paywithexistingcardsbtn">Pay using saved credit cards</a>
              	  </div>
                 <div class="clear"></div> 
                  
           </div>  
                   
                    <p class="m-t-10"><label class="radio borderRadius ">
                       <input type="radio" class="" id="paypal" value="paypal"  name="paymentway"> 
                       <i class="rounded-x m-l-10"></i>&nbsp; <strong>
                     		 Pay by PayPal <!--<small>&nbsp;&nbsp; Please Note <img onerror='imgError(this);' src="<?=Assets?>images/GBP.jpg"> GBP (&pound;) only.</small>-->
                       </strong>
                       	<img onerror='imgError(this);' style="float:right;margin-top: -7px;" src="<?=Assets?>images/paypal.png" class="img-responsive hidden-xs hidden-sm">
                       </label>
                   </p>
                   
                   
                       <p class="m-t-10">
                            <label class="radio borderRadius ">
                            <input type="radio" id="pushase" value="purchaseOrder"  name="paymentway"> 
                            	<i class="rounded-x m-l-10"></i>&nbsp; 
                                <strong>Pay by Purchase Order </strong><br>
                                <small> *(Government Departments, Ministries & Offices only e.g. Education, Emergency Services, Local Authorities, NHS etc.)</small>  
                            </label>
                      </p>
                            
                     <div id="uploader_po" style="display:none;">      
                         <div class="col-xs-8 col-sm-4"> <input class="m-t-15" type="file" style="display:none;" name="file_up" id="file_up"></div>
                         <div class="clear10"></div> 
                         <div class="col-xs-4 col-sm-8  ">
                           <button class="btn btn-primary" type="button" onclick="$('#file_up').trigger('click');" >
                                <i class="fa fa-cloud-upload"></i> Upload Purchase Order
                           </button>
                         </div>
                         <div class="col-xs-4 col-sm-4  ">
                         		<img onerror='imgError(this);' width="60" height="" style="display:none;"  id="preview_po_img" src="#" alt="Preview Purchase Order" />
                         </div>
                         <div class="clear10"></div>
                     </div>
                  
                  
                    
                            
                            <p style="display:none;" class="m-t-10 purchaseordertxt">
                           <small>* Please note: Your order will not be processed until we receive a signed copy of the official Purchase Order via email at <a href="mailto:customercare@aalabels.com">customercare@aalabels.com</a> or post to: AA Labels, 23 Wainman Road, Peterborough PE2 7BU</small>
                            </p>
                      </div>
          
              
              <div class="clear10"></div>
         			 <div class="col-sm-12 secure-ssl-seal text-center m-t-20">
                    	<img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/godaddy-secure-ssl-seal.png" alt="">
                     </div>
          
           </div>
           
           
           <div class="col-sm-12 col-xs-12 col-md-6 m-t-30">
                   <div class="col-sm-12">
                                   <strong class="textBlue">Billing Detail</strong>
                                   <p id="billing_name_review"></p>
                                   <span id="billing_address_review"></span>
             	  </div>
                   <div class="col-sm-12 m-t-20">
                            <strong class="textBlue">Delivery Detail </strong>
                             <p id="delivery_name_review"></p>
                             <span id="delivery_address_review"></span>
                   </div>
                   <div class="col-sm-12">
                  	      <div class="clear10"></div>
                          <div class="textBlue m-b-6 m-t-30" >
                            <strong class="">Order Summary</strong>
                          </div>
                  	     <div id="ajax_order_summary">
                                <? include('order_summary.php');?>
                         </div> 
                  </div> 
                  <div class="col-sm-12 paymentInputs11 normal_checkout m-t-30">
                         <div class="col-sm-12 " >
                           <label class="checkbox"><input type="checkbox" name="agree_term" id="agree_term" class="textOrange">  <i></i></label>
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I have read and agree to the 
                          <a href="#" data-target=".delivery_info" data-toggle="modal" class="textOrange">Terms &amp; Conditions</a> of sale. 
                        </div>
                   </div>
           </div>
                   
                   
                   
           <div class="clear"></div>
           <div class="col-sm-12 ">
                    
           </div>
           <div class="col-sm-12 m-t-10" ><hr ></div>
                	 <div class="col-sm-12 m-b-10 m-t-20">
                         <div class="col-xs-12  col-sm-6 col-md-6">
                                <div class="col-xs-12 col-sm-6 col-md-6 no-padding ">
                                  <div class="col-xs-12 pull-left no-padding ">
                                     <button type="button" id="previous_3"  class="btn blue2 pull-left btn-block">
                                     <i class="fa fa-arrow-circle-left"></i> Shipping </button>
                                     
                                     <button type="button" id="back_to_payment" style="display:none;"  class="btn blue2 pull-left btn-block">
                                     <i class="fa fa-arrow-circle-left"></i> Back to Payment Method </button>
                                     
                                  </div>
                                </div>
                            <div class="clear10 hidden-sm hidden-md hidden-lg"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 ">
                            <div class="col-xs-12 col-sm-6 pull-right no-padding "> 
                              <button type="submit"  id="confirmbtn" class="btn orange pull-right paymentInputs btn-block">
                              	Confirm Order <i class="fa fa-arrow-circle-right"></i> 
                              </button>
                              
                              <button type="button"  id="worlpaybtn" class="btn orange pull-right btn-block" style="display:none">
                              	<img onerror='imgError(this);' id="world_loader_icon" style="display:none;" src="<?=Assets?>images/ring.gif" /> 
                                Pay Now <i class="fa fa-arrow-circle-right"></i> 
                              </button>
                            </div>
                         </div>
					</div>
		 </div>
    
    
       </form>
                    
            
</div>

       <? } ?>




<div class="modal fade delivery_info" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
        <h4 id="myModalLabel" class="modal-title">Green Technologies Ltd t/a AA Labels - www.aalabels.com <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
      </div>
      <div class="">
        <? include('deliveryinfo.php');?>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
      </div>
    </div>
  </div>
</div>





</div>
</div>
<form action="" id="payment_form" method="post">
	<input data-worldpay="token" id="worldpay_token" type="hidden" value="" />
	<input data-worldpay="cvc" id="worldpay_cvc" type="hidden" size="4" value="" /> 
</form>

<form action="" id="worldpay_form" method="post">
	<input type="hidden" id="aaaabbbbbbbbdddd" />
</form>

<script>



function readURL(input) {

    if (input.files && input.files[0]) {
		var url = input.value;
		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		if(ext=='docx' || ext=='doc'){
			$('#preview_po_img').attr('src', '<?=Assets?>images/doc.png');
			$('#preview_po_img').show();	
		}
		else if(ext=='pdf'){
			$('#preview_po_img').attr('src', '<?=Assets?>images/pdf.png');
			$('#preview_po_img').show();	
		}
		else if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
			
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#preview_po_img').attr('src', e.target.result);
				$('#preview_po_img').show();
			}
			reader.readAsDataURL(input.files[0]);
		}
		else{
				$('#preview_po_img').attr('src', '<?=Assets?>images/no-image.png');
				$('#preview_po_img').show();
		}
    }
}

$("#file_up").change(function(){
    readURL(this);
});




var oldpcode = '';
var oldcountry = '';
var VATNumber = 'invalid';

$(document).on("change", "#vatnumber", function(e) {
	$('#vat_name').html('');
	VATNumber = 'invalid';
});





/*****  Changes ***********/
	$(document).on("change", "#country", function(e) {
		var billingcountry = $(this).val();
		var b_groupcountry = $("#country option:selected").attr('data-vat');
		if(billingcountry.length > 0){
			$('#dcountry').val(billingcountry);
			if(b_groupcountry =='EUROPEAN UNION'){
				 $('.ukvatbox').show();	 
				 $( "input[name=unreg_vat]" ).prop( "checked", false);
			}else{
				 $('.ukvatbox').hide();	 
				 $( "input[name=unreg_vat]" ).prop( "checked", true);
			}
		}
	});
	$(document).on("change", "#dcountry", function(e) {
		var deliverycountry = $(this).val();
		var billingcountry = $('#country').val();
		
		var cc_code = $("#country option:selected").attr('data-value');
		$('#vat_cc').html(cc_code);
		
		var b_groupcountry = $("#country option:selected").attr('data-vat');
		var d_groupcountry = $("#dcountry option:selected").attr('data-vat');
		
		if(b_groupcountry =='EUROPEAN UNION'){
				 $('.ukvatbox').show();
				 $( "input[name=unreg_vat]" ).prop( "checked", false);
				 $('#vat_validator').prop('disabled', true);
			  	 $('#vatnumber').prop('disabled', true);
		}
		else{
			  if(billingcountry!='United Kingdom' && deliverycountry=='United Kingdom'){
				  swal("","Because the delivery address for this order is in the UK, it does not qualify as an “export order” and is not therefore exempt from UK VAT.","warning");
			  }
			  else if(billingcountry=='United Kingdom' && deliverycountry!='United Kingdom'){
			  	swal("","Because the billing address for this order is in the UK, it does not qualify as an “export order” and is not therefore exempt from UK VAT.","warning");
			  }
			  $('#vatnumber').val('');
			  $('.ukvatbox').hide();
			  $( "input[name=unreg_vat]" ).prop( "checked", false);
			  $('#vat_validator').prop('disabled', true);
			  $('#vatnumber').prop('disabled', true);
			  
		}
	});
/*****  Changes ***********/


$(document).on("change", "input[name=unreg_vat]", function(e) {
		if($(this).is(":checked")){
			$('#vatnumber').val('');
			$('#vat_name').html('');
			$('#vat_address').html('');
			$('#vat_validator').prop('disabled', false);
			$('#vatnumber').prop('disabled', false);
				if(VATNumber =='valid'){
						$.ajax({
							url: base+'ajax/reset_validate_vat',
							type:"POST",
							async:"false",
							data: {  vatvalidate: 'reset'},
							dataType: "html",
							success: function(data){
								if(!data==''){	
									data = $.parseJSON(data);
									$('#ajax_order_summary').html(data.orderSummary);
									VATNumber = 'invalid';
								}
							}
						});
				}
	
		}else{
			$('#vat_name').html('');
			$('#vat_address').html('');
			$('#vatnumber').val('');
			$('#vat_validator').prop('disabled', true);
			$('#vatnumber').prop('disabled', true);
		}
});



$(document).on("click", "#vat_validator", function(e) {
		var vatnumber = $('#vatnumber').val();
		var country = $('#dcountry').val();
		<? if(isset($userid) and $userid!=''){ ?>
			var email = $('#email_valid').val();
		<? }else{?> 
			var email = $('#email').val();
		<? }?>
		
		if(vatnumber.length > 0){
				$.ajax({
						url: base+'ajax/validate_vat',
						type:"POST",
						async:"false",
						data: {  country: country,vatNumber: vatnumber,email:email},
						dataType: "html",
						success: function(data){
						data = $.parseJSON(data); 
						if(data.status=='valid'){
							VATNumber = 'valid';
								$('#vat_name').html(data.vatmessage);
								$('#ajax_order_summary').html(data.orderSummary);
							}else{
								$('#vat_name').html('');
								swal("","please enter a valid VAT number","warning");
								VATNumber = 'invalid';
							}
						 }  
					});	
		}else{
				VATNumber = 'invalid';
				$('#vat_name').html('');
				swal("","please enter a valid VAT number","warning");
		}
  });
  	

function validate_form(){
	
	if(paymentoption=='sample'){
	 	 $( "#pushase" ).prop( "checked", true );
	 }
	var paymentway = $('input[name=paymentway]:checked').val();
	//var confirm_check = $('input[name=confirm_check]:checked').val();
	var terms = $('input[name=agree_term]:checked').val();
	
	 
	if(typeof  paymentway =="undefined" ){
			alert_box("Please select one of the payment options");
			return false;
	}
	else if(typeof  terms =="undefined" ){
			alert_box("Please accept the terms and conditions");
			$('.normal_checkout').css('background','#fff2f2');
			$('.normal_checkout').css('border','1px solid #ff0000');
			return false;
	}else{
			$('.normal_checkout').css('background','#f5f5f5');
			$('.normal_checkout').css('border','1px solid #ccc');
			return true;	
	}
		
}

	$(document).ready(function() {
		  var form = $("#checkout_form");
		  form.validate({
						errorPlacement: function errorPlacement(error, element) { element.after(error); },
						rules: {
							 customer_password: {
								required: true,
								minlength:8,
								maxlength:20,
							 },
							 re_customer_password: {
							  equalTo: "#customer_password"
							 },
							 email: {
							 required: true,
							 email: true,
							 remote: base+"ajax/is_email_exist"
							}
					},
					messages: {
                     	email: {
                            remote: $.validator.format("This email address is already taken.")
                        }
                    },
					submitHandler: function(form) {
						if(validate_form()==true){
								var paymentway = $('input[name=paymentway]:checked').val();
								if(paymentway=='creditCard'){
									var creditcard =  $('#creditcard').val();
									if( typeof creditcard!=='undefined' && creditcard != '' && creditcard != 'not-on-file'){
											$('#worldpay_token').val(creditcard);
											$('#worldpay_cvc').val($('#cvcnumb').val());
											
											var loader_icon = $('#world_loader_icon').clone();
											$('#confirmbtn').html(loader_icon);
											$('#confirmbtn').append(' Please Wait....');
											$('#world_loader_icon').show();
											document.getElementById('confirmbtn').disabled = true;
											$('#payment_form').submit();
											return false;
									
									}else{
											//save_session_data();
											worldPay(document.getElementById('worldpay_form'));
											return false;
									}
								}else{
										form.submit();
										return true;
								}
								
								
							
						}else{
							console.log('validation error');	
							return false;
						}
			   }
		});
	
	var navListItems = $('ul.setup-panel li a'),
       	 allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
			
			
				form.validate().settings.ignore = ":disabled,:hidden";
				if(form.valid()==true){
						//navListItems.closest('.active').children('a').removeClass('orange2');
						update_review_address();
						navListItems.closest('li').removeClass('active');
						$item.addClass('active');
						allWells.hide();
						$target.show();
                        var pagetypevalue = navListItems.closest('.active').children('a').text();
						fireRemarketingTag(pagetypevalue);
			}else{
						//navListItems.closest('.active').children('a').addClass('orange2');
			}
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
   /***** Billing page btn ***/
   $('#activate-step-2').on('click', function(e) {
		form.validate().settings.ignore = ":disabled,:hidden";
		if(form.valid()==true){
			$('ul.setup-panel li:eq(1)').removeClass('disabled');
     		$('ul.setup-panel li a[href="#step-2"]').trigger('click');
			 //$('ul.setup-panel li a:eq(1)').trigger('click');
       		// $(this).remove();
		}
	})
	
	/***** Delivery page btn ***/
	 $('#activate-step-3').on('click', function(e) {
		 
		form.validate().settings.ignore = ":disabled,:hidden";
			if(form.valid()==true){
				update_review_address();
				$('ul.setup-panel li:eq(2)').removeClass('disabled');
				$('ul.setup-panel li a[href="#step-3"]').trigger('click');
			}
	 })
	
	
	/***** Shipping page btn ***/
	 $('#activate-step-4').on('click', function(e) {
        
		var vatnumber = $('#vatnumber').val();
		var country = $('#dcountry').val();
		var b_groupcountry = $("#country option:selected").attr('data-vat');
		
		
		//alert("yes");
		var delivery = $('input[name=delivery_option]:checked').val();
		if(typeof  delivery =="undefined"){
			alert_box("Please select Shipping Method first");
			return false;
		}
		else if(b_groupcountry == 'EUROPEAN UNION'){
				unreg_vat = $('input[name=unreg_vat]');
				if(VATNumber=='invalid' && unreg_vat.is(":checked")){
					swal("","Please enter a valid VAT number, or uncheck the box to proceed and pay UK VAT","warning");
					 return false;
				}
		}
		
		$('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
		update_review_address();
       
    })
	
	 $('#previous_1').on('click', function(e) { 
			$('ul.setup-panel li a[href="#step-1"]').trigger('click'); 
	 })
	 $('#previous_2').on('click', function(e) { 
			$('ul.setup-panel li a[href="#step-2"]').trigger('click'); 
	 })
	 $('#previous_3').on('click', function(e) { 
			$('ul.setup-panel li a[href="#step-3"]').trigger('click'); 
	 })
	 
	  <?
	   if(isset($errortype) and $errortype=='payment'){?>
			$('#activate-step-4').click();
			$('ul.setup-panel li:eq(1)').removeClass('disabled');
			$('ul.setup-panel li:eq(2)').removeClass('disabled');
			$('ul.setup-panel li:eq(3)').addClass('active');
			$('html, body').animate({scrollTop: $("#step-4").offset().top-100}, 1000);
	<? }?>
	
		
});
		 
   
   function update_review_address(){
	   
	  			var title = $('#title').val();
				var b_first = $('#b_first_name').val();
				var b_last = $('#b_last_name').val();
				
				var b_address = $('#b_add1').val();
				var b_city = $('#b_city').val();
				var b_pcode = $('#b_pcode').val();
				var b_county = $('#country').val();
				
				
				
				var d_title = $('#title_d').val();

				var d_first = $('#d_first_name').val();
				var d_last = $('#d_last_name').val();
				var d_address = $('#d_add1').val();
				var d_city = $('#d_city').val();
				var d_pcode = $('#d_pcode').val();
				var d_county = $('#d_county').val();
				
				
				var d_pcode = $('#d_pcode').val();
				var d_county = $('#d_county').val();
			
				
				var country = $('#country').val();
				var dcountry = $('#dcountry').val();
				$('#shipping_country').html(dcountry);
				$('#shippind_postcode').html(d_pcode);
							
				$('#billing_name_review').html(title+' '+b_first+' '+b_last);
				$('#billing_address_review').html(b_address+', '+b_city+', '+b_pcode+', '+b_county+', '+country);
				
				$('#delivery_name_review').html(d_title+' '+d_first+' '+d_last);
				$('#delivery_address_review').html(d_address+', '+d_city+', '+d_pcode+', '+dcountry+', '+dcountry);
				
				$('#shippind_address_1').html(d_address);
				$('#shippind_city').html(d_city);
				$('#shippind_county').html(d_county);
				
				
				
				if(oldpcode!=d_pcode || oldcountry!=dcountry){
					
					var b_vatgroup = $("#country option:selected").attr('data-vat');
					var d_vatgroup = $("#dcountry option:selected").attr('data-vat');
					
					if(b_vatgroup == 'EUROPEAN UNION'){
							$('#delivertimeynote').hide();
							$('#offshoredeliverynote').hide();
							$('.ukvatbox').show();
							var cc_code = $("#country option:selected").attr('data-value');
							$('#vat_cc').html(cc_code);
							
					}else{
							$('#delivertimeynote').show();
							$('.ukvatbox').hide();
                            $( "input[name=unreg_vat]" ).prop( "checked", false);                                  
					}
					

					
					$.ajax({
							url: base+'ajax/setpostcode',
							type:"POST",
							async:"false",
							dataType: "html",
							data: { postocde:d_pcode,country:dcountry,bpcode:b_pcode,bgroup:b_vatgroup,dgroup:d_vatgroup},
							success: function(data){
							if(!data==''){	
									data = $.parseJSON(data); 
									if(data.response=='yes'){
										$('#ajax_delivery').html(data.delivey);
										$('#ajax_order_summary').html(data.orderSummary);
								  }
								}
							 }  
						});	
					oldpcode=d_pcode;
					oldcountry=dcountry
				}
		
		//   
	   
  }
  
  
  $('input[name=paymentway]').change(function() {
	 
	  if($(this).val() == "creditCard"){
		 	
			$('#uploader_po').hide();
			$('.purchaseordertxt').hide();
			
			
			if(worldpayinitialize == 1){
					 $(".paymentInputs").hide();
					 $("#confirmbtn").hide();
					 $("#worlpaybtn").show();
					 $("#paymentSection").show();
					 var creditcard = $('#creditcard').val();
					 if(typeof creditcard != 'undefined' && creditcard != ''){
							$(".paywithexistingcards").show();
							$('.retain_card_opt').hide();
					 }else{
					 		$('.retain_card_opt').show();
					 
					 }
					 $(".secure-ssl-seal").hide();
			}else{
					
					$('#confirmbtn').html('Pay Now <i class="fa fa-arrow-circle-right"></i>');
					$('.cardsonfile').show();
					show_cvc_option(); 
			}
			document.getElementById('confirmbtn').disabled = null;
		}
		else if($(this).val() == "paypal"){
			$('#confirmbtn').html('Pay Now <i class="fa fa-arrow-circle-right"></i>');
			$('#uploader_po').hide();
			$('.purchaseordertxt').hide();
			
			$('.cardsonfile').hide();
			$('.cardsonfile').hide();
			$('.retain_card_opt').hide();
			$('.cvcinput').hide();
			document.getElementById('confirmbtn').disabled = null;
			
			$(".paymentInputs").show();
    		$("#paymentSection").hide();
			$("#worlpaybtn").hide();
			$("#confirmbtn").show();
			$(".paywithexistingcards").hide();
			
			$(".secure-ssl-seal").show();
			
			
			
			
			
		}else{
			
			$(".paywithexistingcards").hide();
			$('.retain_card_opt').hide();
			$('#uploader_po').show();
			$('.purchaseordertxt').show();
			
			$('#confirmbtn').html('Confirm Order <i class="fa fa-arrow-circle-right"></i>');
			$('.cardsonfile').hide();
			$('.cvcinput').hide();
			document.getElementById('confirmbtn').disabled = null;
			
			$(".paymentInputs").show();
    		$("#paymentSection").hide();
			$("#worlpaybtn").hide();
			$("#confirmbtn").show();
			$(".secure-ssl-seal").show();
	
		}
  });
  
  function show_cvc_option(){
 	 var creditcard = $('#creditcard').val();
	 if(typeof creditcard != 'undefined' && creditcard != '' && creditcard != 'not-on-file'){
			$('.cvcinput').show();
			$('.paywithnewcard').show();
			$('.retain_card_opt').hide();
			$(".secure-ssl-seal").show();
			
	 }else{ 	
			$('.paywithnewcard').hide();	
	 		$('.cvcinput').hide();
			$('.retain_card_opt').show();
			load_worldpay_form();
	 }
	 $('#confirmbtn').html('Pay Now <i class="fa fa-arrow-circle-right"></i>');
 	 document.getElementById('confirmbtn').disabled = null;

  }
  $(document).on("change", "#creditcard", function(e) {
		show_cvc_option();
  });
  
  $(document).on("change", "input[name=delivery_option]", function(e) {
		var deliveryid = $(this).val();
		if(deliveryid){
				$.ajax({
							url: base+'ajax/update_delevery',
							type:"POST",
							async:"false",
							dataType: "html",
							data: {  deliveryid: deliveryid},
							success: function(data){
							if(!data==''){	
									data = $.parseJSON(data); 
									if(data.response=='yes'){
										$('#ajax_delivery').html(data.delivey);
										$('#ajax_order_summary').html(data.orderSummary);
										
								}
								}
							 }  
						});	
		}
  });
  
  $("#delivery_val").change(function() {
    if(this.checked) {
			$('#d_first_name').val($('#b_first_name').val());
			$('#title_d').val($('#title').val());	
			$('#d_email').val($('#email_valid').val());	
			$('#d_last_name').val($('#b_last_name').val());	
			$('#d_phone_no').val($('#b_phone_no').val());	
			$('#d_mobile_no').val($('#b_mobile').val());	
			//$('#d_ResCom').val($('#b_ResCom').val());	
			$('#d_pcode').val($('#b_pcode').val());	
			$('#d_add1').val($('#b_add1').val());	
			$('#d_add2').val($('#b_add2').val());	
			$('#d_city').val($('#b_city').val());	
			$('#d_organization').val($('#b_organization').val());	
			$('#d_county').val($('#b_county').val());	
			$('#dcountry').val($('#country').val());   
		
	}else{
			$('#d_first_name').val('');
			$('#title_d').val('');
			$('#d_email').val('');
			$('#d_last_name').val('');
			$('#d_phone_no').val('');;	
			$('#d_mobile_no').val('');
			//$('#d_ResCom').val('');
			$('#d_pcode').val('');	
			$('#d_add1').val('');
			$('#d_add2').val('');	
			$('#d_city').val('');
			$('#d_organization').val('');
			$('#d_county').val('');
			$('#dcountry').val('');
	}
});


$(document).on("change", "#dcountry", function(e) {
    		$('#d_pcode').val('');	
			$('#d_add1').val('');
			$('#d_add2').val('');	
			$('#d_city').val('');
			$('#d_organization').val('');
			$('#d_county').val('');
});
$(document).on("change", "#country", function(e) {
     		$('#b_pcode').val('');	
			$('#b_add1').val('');	
			$('#b_add2').val('');	
			$('#b_city').val('');	
			$('#b_organization').val('');	
			$('#b_county').val('');	
});

$(document).on("change", "#retain_cards", function(e) {
	  if(this.checked) {
	  			$(this).val(1);
	  }else{
	  			$(this).val(0);
	  }	
});



function fireRemarketingTag(page){
	page = $.trim(page);
	if(page=='Billing'){ var page = 'Billing information';}
	else if(page=='Delivery'){ var page = 'Delivery information'; }
	else if(page=='Shipping'){ var page = 'Shipping information'; }
	else if(page=='Review & Pay'){ var page = 'Review &amp; pay'; }
	<? if(SITE_MODE=='live'){?>
			dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype' : page});
	<? } ?>
}

var worldpayinitialize = 0;

function worldPay(form){
	//$("#paymentSection").find('img').show();
	 
	Worldpay.useTemplateForm({
    'clientKey':'<?=WP_Public_KEY?>',
    'form':form,
	'saveButton':false,
	'reusable':true,
	'templateOptions': {images:{enabled:false},dimensions:{width:false,height:265,}},
        'paymentSection':'paymentSection',
        'display':'inline',  //modal inline
        'callback': function(obj) {
			if (obj && obj.token) {
				
				$('#creditcard').val('not-on-file');
				
			    document.getElementById('worlpaybtn').disabled = true;
				document.getElementById('previous_3').disabled = true;
				document.getElementById('back_to_payment').disabled = true;
				
				var loader_icon = $('#world_loader_icon').clone();
				$('#worlpaybtn').html(loader_icon);
				$('#worlpaybtn').append(' Please Wait....');
				$('#world_loader_icon').show();
				    
				var _el = document.createElement('input');
				_el.value = obj.token;
				_el.type = 'hidden';
				_el.name = 'token';
				
				var form = document.getElementById('checkout_form');
				form.appendChild(_el);
				form.submit();
			}
        },
        'beforeSubmit': function() {
			document.getElementById('worlpaybtn').disabled = true;
			$('#world_loader_icon').show();
            return true;
        },
		'validationError': function(obj) {
		
			$('#confirmbtn').html('Pay Now <i class="fa fa-arrow-circle-right"></i>');
 	 		document.getElementById('confirmbtn').disabled = null;
			
			document.getElementById('worlpaybtn').disabled = null;
			$('#world_loader_icon').hide();
	    },   
      });
	
	//$('#previous_3').hide();
	//$('#back_to_payment').show();
	
	$(".cardsonfile").hide();
	$(".paymentInputs").hide();
    $("#paymentSection").show();
	$("#worlpaybtn").show();
	
	var creditcard = $('#creditcard').val();
	if(typeof creditcard != 'undefined' && creditcard != ''){
		$(".paywithexistingcards").show();
		$('.retain_card_opt').hide();
	}else{
		$('.retain_card_opt').show();
	}
	
	document.getElementById('confirmbtn').disabled = null;
	worldpayinitialize = 1;
}

$('#worlpaybtn').click(function() {
	if(validate_form()==true){
	 	Worldpay.submitTemplateForm();
	}
});

function worldpayReuseable(){
		    var form = document.getElementById('payment_form');
			Worldpay.setClientKey('<?=WP_Public_KEY?>');
			Worldpay.useForm(form, function(status, response) {
				if (response.error || status!=200) {
							document.getElementById('confirmbtn').disabled = null;
							$('#world_loader_icon').hide();
							$('#confirmbtn').html(' Pay Now <i class="fa fa-arrow-circle-right"></i>');
							swal("",response.error.message,"error");
							return false;
			    }else {
							var checkout = document.getElementById('checkout_form');
							checkout.submit();
							return true;
			    }
            }, true);
}

$(document).ready(function() {
		worldpayReuseable();
});

$(document).on("focus", ".is_country_sel", function(e) {
	var  country = $('#country').val();
	if(country ==''){
		 swal("","Please select billing country first","warning");
		 e.preventDefault();
		 return false;
	}
});
$(document).on("focus", ".is_dcountry_sel", function(e) {
	var  country = $('#dcountry').val();
	if(country ==''){
		 swal("","Please select delivery country first","warning");
		 e.preventDefault();
		 return false;
	}
});
$(document).on("click", ".paywithexistingcardsbtn", function(e) {
		save_session_data();
		window.location.reload();
});

$(document).on("click", ".paywithnewcardbtn", function(e) {
	//$('#creditcard option[value="not-on-file"]').prop('selected', 'selected').change();
	load_worldpay_form();
});
function load_worldpay_form(){
	$('.retain_card_opt').show();
	$('.paywithnewcard').hide();	
	$('.cvcinput').hide();
	$(".secure-ssl-seal").hide();
	save_session_data();
	worldPay(document.getElementById('worldpay_form'));
}

function save_session_data(){
	<? if(isset($userid) and $userid!=''){ ?>
			$.post( base+'ajax/save_checkout_session_data', $( "#checkout_form" ).serialize(), function( data ) {
			}, "json");
	<? } ?>			
}
</script>