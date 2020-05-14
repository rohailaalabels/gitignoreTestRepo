<script src="<?=Assets?>js/steps/modernizr-2.6.2.min.js"></script>
<script src="<?=Assets?>js/steps/jquery-1.11.1.min.js"></script>
<script src="<?=Assets?>js/jquery.validate.js"></script> 
<!--<script src="<?=Assets?>js/steps/jquery.steps.js"></script> -->


<script>


		
				
			
					
					
					
$(document).ready(function() {
	
		$("#checkout_form").validate();
	      var form = $("#checkout_form");
				   form.validate({
						errorPlacement: function errorPlacement(error, element) { element.after(error); },
						rules: {
							confirm: {
								equalTo: "#password"
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
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
		
		form.validate().settings.ignore = ":disabled,:hidden";
		//if(form.valid()==true){
			$('ul.setup-panel li:eq(1)').removeClass('disabled');
     		$('ul.setup-panel li a[href="#step-2"]').trigger('click');
			 //$('ul.setup-panel li a:eq(1)').trigger('click');
       		// $(this).remove();
		//}
								
        
    })
	
	
	 $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        //$(this).remove();
    })
	
	 $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        $(this).remove();
    })
	
	 $('#activate-step-5').on('click', function(e) { 
        $('ul.setup-panel li:eq(4)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-5"]').trigger('click');
        $(this).remove();
    })
	
	 $('#activate-step-6').on('click', function(e) { 
        $('ul.setup-panel li:eq(5)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-6"]').trigger('click');
        $(this).remove();
    })
	
	
	     });

</script>


 


<div class="">
<div class="container m-t-b-8 ">
<div class="col-md-8">
<ol class="breadcrumb  m0">
  <li><a href="#"><i class="fa fa-home"></i></a></li>
  
  <li class="active">Shopping Cart</li>
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
<h3>Shopping Cart</h3>
</div>

</div><div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
<div class="pull-right">

<a role="button" class="btn orange pull-right" href="#"><i class="fa fa-arrow-circle-left faa-horizontal animated"></i>&nbsp; Continue Shopping</a>
</div>
</div>
</div>
</div>



<div class=" thumbnail">
<div class="">


	<form  method="post" id="checkout_form" class="labels-form ">
    
				
                
              <ul class="nav orderStep setup-panel">
                <li class="active"><a href="#step-1">
                    <i class="fa fa-envelope p-t-b"></i>
                    <p class="list-group-item-text">Billing</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <i class="fa fa-map-marker p-t-b"></i>
                    <p class="list-group-item-text">Delivery</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <i class="fa fa-truck p-t-b"></i>
                    <p class="list-group-item-text">Shipping</p>
                </a></li>
                 <li class="disabled"><a href="#step-4">
                    <i class="fa fa-gbp p-t-b"></i>
                    <p class="list-group-item-text">Review &amp; Pay</p>
                </a></li>
                 <li class="disabled"><a href="#step-5">
                    <i class="fa fa-check-circle p-t-b"></i>
                    <p class="list-group-item-text">confirm</p>
                </a></li>
            </ul>
            
            
                	
       	
                    	<div class="setup-content" id="step-1">
       						 <div class="">
                        <div class="col-sm-12 p0">
                        <h4 class="m-t-b-8 m-l-20 cBlue">Billing Address</h4></div>
                        <div class="col-sm-4">
                         
                                   <div class="col-md-4 ">
                                    <label class="select">
                                        <select name="gender">
                                            <option disabled="" selected="" value="0">Mr.</option>
                                            <option value="1">Mrs.</option>
                                            <option value="2">Dr.</option>
                                            <option value="3">Other</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </div>
                                    <div class="col-md-8 ">
                                       
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                    <input type="text" name="firstName" placeholder="First Name" class="required">
                                </label>
                  
                                    </div>
                                    
                             
                                
                              
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="required">
                                        
                                    </label>
                                </div>
                                
                                
                                
                               
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Phone Number" id="phone" name="phone" class="required">
                                        
                                    </label>
                                </div>
                               
                                
                                
                                
                       
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        <input type="text" placeholder="Mobile Number" id="mobile" name="mobile" >
                                        
                                    </label>
                                </div>
                      
                          
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Company Name" id="company" name="company" >
                                        
                                    </label>
                                </div>
                       
                            
                        </div>
                        
                       <div class="col-sm-4">
                          <div class="col-sm-12 " >
                                  <label class="input">
                                        <i class="icon-append fa fa-search"></i>
                                        <input type="text" placeholder="postcode" id="postcode" name="postcode" class="required">
                                        <b class="tooltip tooltip-bottom-right">Needed to enter the Postcode</b>
                                    </label>
                        </div>                              
                        
                        <div class="col-sm-12 " >
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="text" placeholder="Address 1" name="username">
                                
                            </label>
                        </div>
                        <div class="col-sm-12 " >
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="text" placeholder="Address 1" name="username">
                                
                            </label>
                        </div>
                        <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-map-marker"></i>
                                        <input type="text" placeholder="City/Town" name="username">
                                        
                                    </label>
                        </div>
                      
                          
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-map-marker"></i>
                                        <input type="text" placeholder="County " name="username">
                                        
                                    </label>
                                </div>
                       
                            
                        </div>
                        
                        <div class="col-sm-4">
                          <div class="col-sm-12 " >
                                  <label class="select">
                                        <select name="gender">
                                            <option value="0" selected="" disabled="">Country</option>
                                            <option value="1">UK</option>
                                            <option value="2">USA</option>
                                            <option value="3">UAE</option>
                                        </select>
                                        <i></i>
                                    </label>
                             
                                
</div>                              
                                  <div class="col-sm-12 " >
                                   <label class="select">
                                        <select name="gender">
                                    <option value="0" selected="" disabled="">Resi/Com </option>
                                    <option value="1">Residential</option>
                                    <option value="2">Commercial</option>
                                    <option value="3">UAE</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </div>
                                
                                
                                
                               
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        <input type="email" placeholder="Email" name="email" id="email" class="required">
                                        
                                    </label>
                                </div>
                               
                                
                                
                                
                       
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="text" placeholder="Password" name="username">
                                        
                                    </label>
                                </div>
                      
                          
                                  <div class="col-sm-12 " >
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" placeholder="Confirm Password " name="username">
                                        
                                    </label>
                                </div>
                                
                                <div class="col-sm-12 " >
                                    <label class="checkbox"><input type="checkbox" checked="" name="remember" class="textOrange"><i></i>I'd like to be contacted with the latest news, offers and discount voucher from AA Labels. </label>
                                </div>
                                
                       
                            
                        </div>
                        
                         
                       
                        </div>
                        	  <div class="col-sm-12 m-b-10" >
               
               <hr > 

<div class="col-xs-6  col-sm-6 col-md-6">
<div class="col-xs-6  col-sm-6 col-md-6  ">
<div class="pull-left ">
 <button type="button"  id="see" class="btn blue2 pull-left"><i class="fa fa-arrow-circle-left"></i> Back to Cart </button>

</div>
</div>

</div><div class="col-xs-6 col-sm-6 col-md-6 ">
<div class="pull-right ">
 <button type="button" id="activate-step-2" class="btn orange pull-right"> Delivery Address <i class="fa fa-arrow-circle-right"></i> </button>

</div>
</div>
</div>
  						 </div>
    				
                  		 
                   
                    <div class="setup-content" id="step-2">
                               <div class="">
                                           <div class="col-sm-4 p0">
                                            <h4 class="m-t-b-8 m-l-20 cBlue">Delivery Address</h4>
                                            </div>
                                            <div class="">
                                                    
                                                    <div class="col-sm-12 m-l-10 m-b-10  " >
                                                        <label class="checkbox"><input type="checkbox" checked="" name="remember" class="textOrange"><i></i>Auto Fill Same as Billing Address? </label>
                                                    </div></div>
                                            <div class="col-sm-4">
                                              
                                                       <div class="col-md-4">
                                                        <label class="select">
                                                            <select name="gender">
                                                                <option disabled="" selected="" value="0">Mr.</option>
                                                                <option value="1">Mrs.</option>
                                                                <option value="2">Dr.</option>
                                                                <option value="3">Other</option>
                                                            </select>
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                        <div class="col-md-8 ">
                                                           
                                                    <label class="input">
                                                        <i class="icon-append fa fa-user"></i>
                                                        <input type="text" name="firstName" placeholder="First Name">
                                                    </label>
                                      
                                                        </div>
                                                        
                                                 
                                                    
                                                  
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-user"></i>
                                                            <input type="text" placeholder="Last Name" name="username">
                                                            
                                                        </label>
                                                    </div>
                                                    
                                                    
                                                    
                                                   
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-phone"></i>
                                                            <input type="text" placeholder="Phone Number" name="username">
                                                            
                                                        </label>
                                                    </div>
                                                   
                                                    
                                                    
                                                    
                                           
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-phone"></i>
                                                            <input type="text" placeholder="Mobile Number" name="username">
                                                            
                                                        </label>
                                                    </div>
                                          
                                              
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-user"></i>
                                                            <input type="text" placeholder="Company Name" name="username">
                                                            
                                                        </label>
                                                    </div>
                                           
                                                
                                            </div>
                                            
                                           <div class="col-sm-4">
                                              <div class="col-sm-12 " >
                                                      <label class="input">
                                                            <i class="icon-append fa fa-search"></i>
                                                            <input type="text" placeholder="Username" name="username">
                                                            <b class="tooltip tooltip-bottom-right">Needed to enter the Postcode</b>
                                                        </label>
                                                 
                                                    
                    </div>                              
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-envelope-o"></i>
                                                            <input type="text" placeholder="Address 1" name="username">
                                                            
                                                        </label>
                                                    </div>
                                                    
                                                    
                                                    
                                                   
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-envelope-o"></i>
                                                            <input type="text" placeholder="Address 1" name="username">
                                                            
                                                        </label>
                                                    </div>
                                                   
                                                    
                                                    
                                                    
                                           
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-map-marker"></i>
                                                            <input type="text" placeholder="City/Town" name="username">
                                                            
                                                        </label>
                                                    </div>
                                          
                                              
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-map-marker"></i>
                                                            <input type="text" placeholder="County " name="username">
                                                            
                                                        </label>
                                                    </div>
                                           
                                                
                                            </div>
                                            
                                            <div class="col-sm-4">
                                              <div class="col-sm-12 " >
                                                      <label class="select">
                                                            <select name="gender">
                                                                <option value="0" selected="" disabled="">Country</option>
                                                                <option value="1">UK</option>
                                                                <option value="2">USA</option>
                                                                <option value="3">UAE</option>
                                                            </select>
                                                            <i></i>
                                                        </label>
                                                 
                                                    
                    </div>                              
                                                      <div class="col-sm-12 " >
                                                       <label class="select">
                                                            <select name="gender">
                    <option value="0" selected="" disabled="">Resi/Com </option>
                    <option value="1">Residential</option>
                    <option value="2">Commercial</option>
                    <option value="3">UAE</option>
                                                            </select>
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                    
                                                    
                                                    
                                                   
                                                      <div class="col-sm-12 " >
                                                        <label class="input">
                                                            <i class="icon-append fa fa-envelope-o"></i>
                                                            <input type="text" placeholder="Email" name="username">
                                                            
                                                        </label>
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
                            <td>141 Woodhead Road </td>
                            </tr>
                          <tr>
                            <td>City/Town:</td>
                            <td>BRADFORD</td>
                            </tr>
                          <tr>
                            <td>County:</td>
                            <td>West Yorkshire</td>
                            </tr>
                          <tr>
                            <td>Country</td>
                            <td>UK</td>
                          </tr>
                          <tr>
                            <td>Post Code:</td>
                            <td>bd7 2bl</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                                       
                                            
                                        </div>
                                        
                                       <div class="col-sm-4">
                                    <div class="panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Shipping Method </div>
                
                      <!-- Table -->
                      <table class="table">
                        <tbody>
                          <tr>
                            <td><label class="radio state-success"><input type="radio" checked="" name="radio"><i class="rounded-x"></i> Free Delivery 3-5 Working Days </label></td>
                            <td style="text-align:right; width:12%;"><h4 class="textOrange">£6.00</h4></td>
                            </tr>
                          <tr>
                            <td><label class="radio state-success"><input type="radio" checked="" name="radio"><i class="rounded-x"></i> Next Working Day 8am to 6pm </label></td>
                            <td style="text-align:right;"><h4 class="textOrange">£6.00</h4></td>
                          </tr>
                          <tr>
                            <td><label class="radio state-success"><input type="radio" checked="" name="radio"><i class="rounded-x"></i>Pre Next Working Day before 12pm</label></td>
                            <td style="text-align:right;"><h4 class="textOrange">£6.00</h4></td>
                          </tr>
                          <tr>
                            <td><label class="radio state-success"><input type="radio" checked="" name="radio"><i class="rounded-x"></i> Pre Next Working Day before 10.30am</label></td>
                           <td style="text-align:right;"><h4 class="textOrange">£6.00</h4></td>
                          </tr>
                          <tr>
                            <td><label class="radio state-success"><input type="radio" checked="" name="radio"><i class="rounded-x"></i> Next 2 Working Days between 9am and 5pm </label></td>
                            <td style="text-align:right;"><h4 class="textOrange">£6.00</h4></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>     
                                            
                                        </div>
                                         <div class="col-sm-4">
                                    <div class="panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">Shipping Charges </div>
                
                      <!-- Table -->
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>Ex. Vat:</td>
                            <td style="text-align:right;"><h4 class="textOrange">£6.00</h4></td>
                          </tr>
                          <tr>
                            <td>Inc. Vat:</td>
                            <td style="text-align:right;"><h4 class="textOrange">£6.00</h4></td>
                            </tr>
                          <tr>
                            <td class="bg-info" >Total Shipping Charges:</td>
                           <td class="bg-info" style="text-align:right;"><h3 class="textBlue">£6.00</h3></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>     
                                            
                                        </div>
                                        
                                        
                                        
                                         
                                       
                            </div>
                                        
                                        
                           
                                    
                                   
                                        
                                <hr >    
              
                    
                        
                    </div>
                  
                  		   
                     
                    <div class="setup-content" id="step-4">
                                                   
                                        <div class="">
                                        <h4 class="m-t-b-8 m-l-20 cBlue">Review Order </h4>
                                        
                            </div>
                            <div class="col-sm-12 m-t-30">
                                        <div class="col-sm-6">
                                          
                      <div>
                       <strong class="textBlue">Billing Detail </strong>
                       <p>Mr. Johan Smith</p>
                       13 hardwick Court Lonthorpe Peterborough PE3 9PW
                      </div>
                                       
                                            
                                        </div>
                                        <div class="col-sm-6">
                                          
                      <div>
                        <strong class="textBlue">Delivery Detail </strong>
                       <p>Mr. Johan Smith</p>
                       13 hardwick Court Lonthorpe Peterborough PE3 9PW
                      </div>
                                       
                                            
                                        </div>
                                        
                           </div>
                           
                           <div class="col-sm-12 m-t-30">
                                        <div class="col-sm-6">
                                          
                      <div>
                       <strong class="textBlue">Payment Type</strong>
                       
                       <p class="m-t-10"><label class="radio borderRadius "><input type="radio" checked="" name="radio"> <i class="rounded-x m-l-10"></i>&nbsp; <strong>Pay by PayPal or Credit / Debit Card </strong></label></p>
                       
                       
                       <p class="m-t-10"><label class="radio borderRadius "><input type="radio" checked="" name="radio"> <i class="rounded-x m-l-10"></i>&nbsp; <strong>Pay by Purchase Order</strong><small> (schools and colleges only)</small>  </label></p>
                       <p class="m-t-10"><small>Please note that your order will not be processed until we received a 
                hard copy of your Official Purchase Order by post, fax, or email.</small></p>
                
                
                      </div>
                                       
                                            
                                        </div>
                                        <div class="col-sm-6">
                                          
                      <div class="textBlue m-b-6" >
                        <strong class="">Order Summary</strong>
                       
                      </div>
                      <div class="panel-default fa-border ">
                      <!-- Default panel contents -->
                      
                
                      <!-- Table -->
                      <table class="table">
                        <tbody>
                          <tr >
                            <td class="borderR0">Subtotal<br></td>
                            <td class="borderR0" style="text-align:right;"><h4 class="">£6.00</h4></td>
                          </tr>
                          <tr>
                            <td>Shipping Charges</td>
                            <td style="text-align:right;"><h4 class="">£6.00</h4></td>
                          </tr>
                          <tr>
                            <td class="" >Next Working Day 9am – 5pm</td>
                            <td style="text-align:right;"><h4 class="">£6.00</h4></td>
                          </tr>
                          <tr>
                            <td class="textOrange" >Total (GBP)</td>
                            <td style="text-align:right;"><h3 class="textOrange">£6.00</h3></td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                                       
                                            
                                        </div>
                                        
                           </div>
                                  
                                  
                                  <div class="col-sm-12 ">
                                        <div class="col-sm-6">
                                          
                      <p class="m-t-10"><img onerror='imgError(this);' src="images/icons2.jpg" alt="" width="423" height="84" class="img-responsive"></p>
                                       
                                            
                                        </div>
                                        <div class="col-sm-6 m-t-20">
                                          
                    <div class="col-sm-12  " >
                                                    <label class="checkbox"><input type="checkbox" checked="" name="remember" class="textOrange"><i></i> All our products are made to order. Please tick here to confirm that 
                you have checked your order carefully before proceeding any further. </label>
                                                </div>
                                                <div class="col-sm-12 " >
                                                    <label class="checkbox"><input type="checkbox" checked="" name="remember" class="textOrange"><i></i> I have read and agree to the <span class="textOrange">Term and Conditions</span> of sale.  </label>
                                                </div>
                                       
                                            
                                        </div>
                                        
                           </div>
                                      
                                   
                                        
                                   <hr >          
               
                    </div>
              
                   	    
                
                    <div class="setup-content" id="step-5">
                       
                                                   
                                        <div class="">
                                        <h4 class="m-t-b-8 m-l-20 cBlue">Order Number: AA989651</h4>
                                        <div class="col-sm-12">
                                        <div  class="alert alert-success  ">
                      <button  class="close" ><i class="fa fa-check-circle-o"></i></button>
                      <strong>Thanks!</strong> Your order has successfully received. Order acknowledgement has been sent to your email  address.
                    </div>
                    
                                         </div>
                                       <div class="">
                
                
                
                
                <div class="col-sm-8 m-t-10">
                <div class="table-responsive ">
                <table class="table table-bordered table-hover">
                      <thead class="bgBlueHeading">
                        <tr>
                          <th class="" colspan="2" style="width:46%; ">Code / Description</th>
                          <th style="width:12%;">Ex. Vat </th>
                          <th style="width:12%;">Inc. Vat</th>
                          <th style="width:12%;">Qty</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class=""><img onerror='imgError(this);' src="images/products/m1.jpg" alt="" width="46" height="46"></th>
                          <td><h4>AAQ006WTP</h4>
                            <p>Matt White - Permanent A4 Sheet Labels 6 Address - 90 mm x 64.5 mm </p></td>
                          <td style="text-align:center;"><strong>£2007.78</strong> </td>
                          <td><strong>£1007.78</strong>  </td>
                          <td><strong>100</strong></td>
                        </tr>
                        <tr>
                          <th class=""><img onerror='imgError(this);' src="images/products/m1.jpg" alt="" width="46" height="46"></th>
                          <td><h4>AAQ006WTP</h4>
                            <p>Matt White - Permanent A4 Sheet Labels 6 Address - 90 mm x 64.5 mm </p></td>
                          <td style="text-align:center;"><strong>£2007.78</strong></td>
                          <td><strong>£1007.78</strong></td>
                          <td><strong>100</strong></td>
                        </tr>
                        <tr>
                          <th class=""><img onerror='imgError(this);' src="images/products/m1.jpg" alt="" width="46" height="46"></th>
                          <td><h4>AAQ006WTP</h4>
                            <p>Matt White - Permanent A4 Sheet Labels 6 Address - 90 mm x 64.5 mm </p></td>
                          <td style="text-align:center;"><strong>£2007.78</strong></td>
                          <td><strong>£1007.78</strong></td>
                          <td><strong>100</strong></td>
                        </tr>
                        <tr>
                          <th class=""><img onerror='imgError(this);' src="images/products/m1.jpg" alt="" width="46" height="46"></th>
                          <td><h4>AAQ006WTP</h4>
                            <p>Matt White - Permanent A4 Sheet Labels 6 Address - 90 mm x 64.5 mm </p></td>
                          <td style="text-align:center;"><strong>£2007.78</strong></td>
                          <td><strong>£1007.78</strong></td>
                          <td><strong>100</strong></td>
                        </tr>
                        <tr>
                          <th class=""><img onerror='imgError(this);' src="images/products/m1.jpg" alt="" width="46" height="46"></th>
                          <td><h4>AAQ006WTP</h4>
                            <p>Matt White - Permanent A4 Sheet Labels 6 Address - 90 mm x 64.5 mm </p></td>
                          <td style="text-align:center;"><strong>£2007.78</strong></td>
                          <td><strong>£1007.78</strong></td>
                          <td><strong>100</strong></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                
                <div class="col-sm-4 m-t-10">
                
                
                
                
                
                
                
                
                <div class="bgOrangeHeading">
                <div>
                 <i class="fa f-20 fa-calculator "></i> Cart Summary 
                </div>
                
                           
                               </div>
                              <div class="borderPanel"> 
                        <div class="Lblue ">
                        <div class="row">
                    <div class="">
                    <div class="pull-left">
                       <div>Sub Total</div>
                       </div>
                       
                       <div class="pull-right">
                       <i class="fa f-20 fa-cart-plus"></i>
                       </div> 
                        
                        </div>
                        </div>
                        
                      
                
                      
                    </div>
                    
                    <div class="row p-t-b-12">
                    <div class="">
                    <div class="pull-left">
                        <p>Ex. Vat</p>
                        <h2>£72.49</h2>
                       </div>
                       
                       <div class="pull-right">
                        <p>Ex. Vat</p>
                        <h2>£72.49</h2>
                       </div> 
                        
                        </div>
                        </div>
                        
                        <div class="Lblue ">
                        <div class="row">
                    <div class="">
                    <div class="pull-left">
                       <div>Delivery Charges</div>
                       </div>
                       
                       <div class="pull-right">
                       <i class="fa f-20 fa-truck"></i>
                       </div> 
                        
                        </div>
                        </div>
                        
                      
                
                      
                    </div>
                    
                    <div class="row p-t-b-12">
                    <div class="">
                    <div class="pull-left">
                        <p>Ex. Vat</p>
                        <h2>£7.00</h2>
                       </div>
                       
                       <div class="pull-right">
                        <p>Ex. Vat</p>
                        <h2>£8.00</h2>
                        
                       </div> 
                        <p class="text-center col-sm-12 textOrange">Next Working Day 9am – 5pm</p>
                        </div>
                        </div>
                        
                        
                        <div class="Lblue ">
                        <div class="row">
                    <div class="">
                    <div class="pull-left">
                       <div>Grand Total</div>
                       </div>
                       
                       <div class="pull-right">
                       <i class="fa f-20 fa-calculator"></i>
                       </div> 
                        
                        </div>
                        </div>
                        
                      
                
                      
                    </div>
                        <div class="row p-t-b-12">
                    <div class="">
                    <div class="pull-left">
                        <p class="hide">Ex. Vat</p>
                        <h3 class="text-danger">£72.49</h3>
                       </div>
                       
                       <div class="pull-right hide">
                        <p>Ex. Vat</p>
                        <h2>£72.49</h2>
                       </div> 
                        
                        </div>
                        </div>
                     </div>   
                </div>
                
                <div class="col-sm-12 m-t-30">
                                        <div class="col-sm-6">
                                          
                <div>
                <strong class="textBlue">Billing Detail </strong>
                <p><strong>Mr. Johan Smith</strong><br>
                3 hardwick Court Lonthorpe Peterborough PE3 9PW<br>
                Online Book Store<br>
                Residential<br>
                123456789<br>
                johan@gmail.com</p>
                      </div>
                                       
                                            
                                        </div>
                                        <div class="col-sm-6">
                                          
                      <div >
                        <strong class="textBlue">Delivery Detail </strong>
                       <p><strong>Mr. Johan Smith</strong><br>
                3 hardwick Court Lonthorpe Peterborough PE3 9PW<br>
                Online Book Store<br>
                Residential<br>
                123456789<br>
                johan@gmail.com</p>
                      </div>
                                       
                                            
                                        </div>
                                        
                           </div> 
                <div class="col-sm-12 m-t-30">
                                        <div class="col-sm-6">
                                          
                      <div class="m-t-101" >
                        
                       <p>Pay by Purchase Order (schools and colleges only)</p>
                       <div class="m-t-10">
                
                <a href="print.html" class="btn orange" role="button">Print Order Confirmation &nbsp; <i class="fa fa-print "></i></a>
                </div>
                      </div>
                                       
                                            
                                        </div>
                                        <div class="col-sm-6">
                                          
                      <div >
                        <strong class="textBlue">Customer Feedback</strong>
                        <div class="pull-right m-l-5"><i class="  fa fa-smile-o textOrange fa-10x faa-horizontal animated"></i></div> <p>We continuously work to imporve our customer service and rely on your feedback for this. Please share your experience with us by completing a short survey that will only take a few minutes and entering yourself in our prize draw for free labels worth £50 off yur next order </p>
                      </div>
                      
                      <div class="m-t-10">
                
                <a role="button" class="btn btn-danger" href="#">Not Now &nbsp; <i class="fa fa-times "></i></a>
                <a role="button" class="btn btn-success" href="#">Continue &nbsp; <i class="fa fa-check  "></i></a>
                </div>
                                       
                                            
                                        </div>
                                        
                           </div>
                </div>
                                        
                                         
                                       
                                        </div>
                                        
                                        
                           
                                    
                                   <hr >          
                                        
                    
                    </div>
            
    	
   
    </form>            
</div>





<form class="labels-form " id="0111" enctype="text/plain" method="post" action="" novalidate>                            
<div class=" ">
  		<div class="col-sm-8 p0 ">
   				 <img onerror='imgError(this);' src="<?=Assets?>images/pentone_banner.jpg" alt="" width="750" height="268" class="img-responsive">
        </div>
        <div class="col-sm-4 ">
                    <div class="p-l-r-10">
                               <div class="m-t-b-9 ">
                               <h3>Contact us for a quote</h3>
                     </div>
                      <div class="">
                              <label class="input">
                                      <i class="icon-append fa fa-user"></i>
                                      <input type="text" name="firstName" placeholder="Name">
                              </label>
                     </div>
                     <div class="">
                             <label class="input">
                             <i class="icon-append fa fa-phone"></i>
                             <input type="text" name="pass" placeholder="Phone">
                             </label>
                     </div>
                     <div class="">
                             <label class="input">
                             <i class="icon-append fa fa-envelope"></i>
                             <input type="text" name="pass" placeholder="Email">
                             </label>
                     </div>
                                                
                  <div>
               <button class="btn-u btn-u-sm orange text-uppercase" type="submit" style="">submit quote &nbsp; &nbsp; <i class="fa fa-arrow-circle-right"></i> </button>
            </div>
         </div>
      </div>
  </div>
 </form>
</div>                
</div>
                   
                
                
    
    

</div>
</div>