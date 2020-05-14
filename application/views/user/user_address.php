<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li class="active">User Address</li>
      </ol>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="panel">
      <div class="row">
        <div class="col-xs-7  col-sm-8 col-md-7">
          <div class="col-xs-12  col-sm-6 col-md-6 m-l-10 ">
            <h3 > User Address</h3>
          </div>
        </div>
        <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
          <div class="pull-right"> <a role="button" class="btn orange pull-right" href="<?=base_url()?>shoppingcart.php"><i class="fa fa-shopping-cart faa-horizontal animated"></i> &nbsp; View Basket </a> </div>
        </div>
      </div>
    </div>
    
    <!-- Checkout --> 
    
    <!-- Order Form -->
    <div class=" thumbnail">
      <div >
        <div role="tabpanel" class="">
          <? include('user_menu.php')?>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="col-md-12 m-t-30">
                <div class="col-md-6 col-sm-6">
                  <div class=" m-l-10 m-t-b-10" >
                    <h4 class="textBlue">Billing Address</h4>
                  </div>
                  <table class="table">
                    <tbody>
                      <tr class="border0">
                        <th width="88" scope="row">Name:</th>
                        <td width="311"><? echo $userdata['BillingTitle']." ".$userdata['BillingFirstName']." ".$userdata['BillingLastName']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Company:</th>
                        <td><?=$userdata['BillingCompanyName']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Address:</th>
                        <td><? echo $userdata['BillingAddress1']." ".$userdata['BillingAddress2']."</br>".$userdata['BillingTownCity']." , ".$userdata['BillingCountyState']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Postcode:</th>
                        <td><?=$userdata['BillingPostcode']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Contact:</th>
                        <td><?=$userdata['UserEmail']." , ".$userdata['BillingMobile']?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="m-t-b-10">
                    <button style="" type="submit" class="btn orange text-uppercase" onclick="show_hide('deliv_info_edit','bill_info_edit','home');">Edit Billing Address &nbsp; &nbsp; <i class="fa fa-edit"></i> </button>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class=" m-l-10 m-t-b-10" >
                    <h4 class="textBlue">Delivery Address</h4>
                  </div>
                  <table class="table">
                    <tbody>
                      <tr class="border0">
                        <th width="88" scope="row">Name:</th>
                        <td width="311"><? echo $userdata['DeliveryTitle']." ".$userdata['DeliveryFirstName']." ".$userdata['DeliveryLastName']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Company:</th>
                        <td><?=$userdata['DeliveryCompanyName']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Address:</th>
                        <td><? echo $userdata['DeliveryAddress1']." ".$userdata['DeliveryAddress2']."</br>".$userdata['DeliveryTownCity']." , ".$userdata['DeliveryCountyState']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Postcode:</th>
                        <td><?=$userdata['DeliveryPostcode']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Contact:</th>
                        <td><?=$userdata['DeliveryEmail']." , ".$userdata['DeliveryMobile']?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="m-t-b-10">
                    <button style="" type="submit" class="btn orange text-uppercase" onclick="show_hide('bill_info_edit','deliv_info_edit','home');">Edit Delivery Address &nbsp; &nbsp; <i class="fa fa-edit"></i> </button>
                  </div>
                </div>
              </div>
            </div>
            <div  style="display:none;" id="bill_info_edit">
              <form class="labels-form" method="post" id="billing-form">
                <div class="col-sm-12 p0">
                  <h4 class="m-t-b-8 m-l-20 cBlue">Billing Address</h4>
                </div>
                <div class="col-sm-4">
                  <div class="col-md-4 ">
                    <label class="select">
                      <select name="billing_title" id="title">
                        <option <?php if($userdata['BillingTitle']=='Mr.'){ ?> selected <?php } ?> value="Mr.">Mr.</option>
                        <option <?php if($userdata['BillingTitle']=='Mrs.'){ ?> selected <?php } ?> value="Mrs.">Mrs.</option>
                        <option <?php if($userdata['BillingTitle']=='Ms.'){ ?> selected <?php } ?> value="Ms.">Ms.</option>
                        <option <?php if($userdata['BillingTitle']=='Miss.'){ ?> selected <?php } ?> value="Miss.">Miss.</option>
                        <option <?php if($userdata['BillingTitle']=='Dr.'){ ?> selected <?php } ?> value="Dr.">Dr.</option>
                        <option <?php if($userdata['BillingTitle']=='Prof.'){ ?> selected <?php } ?> value="Prof.">Ms.</option>
                        <option <?php if($userdata['BillingTitle']=='Rev.'){ ?> selected <?php } ?> value="Rev.">Rev.</option>
                      </select>
                      <i></i> </label>
                  </div>
                  <div class="col-md-8 ">
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="text" name="b_first_name" placeholder="First Name" id="b_first_name" class="required" value="<?=$userdata['BillingFirstName']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the First Name</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="text" placeholder="Last Name" name="b_last_name" id="b_last_name" class="required" value="<?=$userdata['BillingLastName']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Last Name</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                      <input type="text" placeholder="Phone Number" name="b_phone_no" id="b_phone_no" class="required" value="<?=$userdata['BillingTelephone']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Phone Number</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                      <input type="text" placeholder="Mobile Number" name="b_mobile" id="b_mobile" value="<?=$userdata['BillingMobile']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Mobile Number</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="text" placeholder="Company Name" name="b_organization" id="b_organization" value="<?=$userdata['BillingCompanyName']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Company Name</b> </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="col-sm-12 " >
                    <label class="input"> <a href="javascript:void(0);" id="BillingsearchButton" class="icon-append fa fa-search"></a>
                      <input type="text" placeholder="Postcode" name="b_pcode" id="b_pcode" class="required" value="<?=$userdata['BillingPostcode']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Postcode</b> </label>
                    <div id="selectBillingDiv" style="display:none">
                      <label class="select">
                        <select id="billingaddressListSelect">
                        </select>
                        <i></i> </label>
                    </div>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                      <input type="text" placeholder="Address 1" name="b_add1"  id="b_add1" 	 class="required" value="<?=$userdata['BillingAddress1']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Address 1</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                      <input type="text" placeholder="Address 2" name="b_add2" id="b_add2" value="<?=$userdata['BillingAddress2']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Address 2</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                      <input type="text" placeholder="City/Town" name="b_city" id="b_city" class="required" value="<?=$userdata['BillingTownCity']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the City/Town</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                      <input type="text" placeholder="County " name="b_county" id="b_county" class="required" value="<?=$userdata['BillingCountyState']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the County</b> </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="col-sm-12 " >
                    <label class="select">
                      <select name="b_country" id="b_country" class="required">
                        <option value="">Select Country </option>
                        <optgroup label="UK">
                        <option <?=($userdata['BillingCountry']=='United Kingdom')?'selected="selected"':''?>  
                                        value="United Kingdom">United Kingdom</option>
                        </optgroup>
                        <optgroup label="EUROPEAN UNION">
                        <? 
									foreach($europeunion_list as $row){?>
                        <option <?=($userdata['BillingCountry']==$row->name)?'selected="selected"':''?> 
                                        value="<?=$row->name?>">
                        <?=$row->name?>
                        </option>
                        <? }?>
                        </optgroup>
                        <optgroup label="EUROPE">
                        <? 
									foreach($europe_list as $row){?>
                        <option <?=($userdata['BillingCountry']==$row->name)?'selected="selected"':''?> 
                                        value="<?=$row->name?>">
                        <?=$row->name?>
                        </option>
                        <? }?>
                        </optgroup>
                        <optgroup label="Others">
                        <? 
									foreach($restofworld_list as $row){?>
                        <option <?=($userdata['BillingCountry']==$row->name)?'selected="selected"':''?> 
                                         value="<?=$row->name?>">
                        <?=$row->name?>
                        </option>
                        <? }?>
                        </optgroup>
                      </select>
                      <i></i> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                      <input type="email" placeholder="Email" name="b_email" id="b_email" disabled="disabled" value="<?=$userdata['UserEmail']?>" >
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Email</b> </label>
                  </div>
                  <div class="clearfix">
                  <div class="col-xs-6">
                    <button style="" type="submit" class="btn btn-block blueBg text-uppercase" >Save  &nbsp; &nbsp; <i class="fa fa-edit"></i> </button>
                  </div>
                  <div class="col-xs-6">
                    <button style="" type="reset" class=" btn btn-block orangeBg  text-uppercase" onclick="show_hide('deliv_info_edit','home','bill_info_edit');">Cancel&nbsp; &nbsp; <i class="fa fa-edit"></i></button>
                  </div>
                  </div>
                </div>
              </form>
            </div>
            <form class="labels-form" method="post" id="delivery-form">
              <div class"" style="display:none;" id="deliv_info_edit">
                <div class="col-sm-12 p0">
                  <h4 class="m-t-b-8 m-l-20 cBlue">Delivery Address</h4>
                </div>
                <div class="col-sm-4">
                  <div class="col-md-4 ">
                    <label class="select">
                      <select name="title_d" id="delivery_title">
                        <option <?php if($userdata['DeliveryTitle']=='Mr.'){ ?> selected <?php } ?> value="Mr.">Mr.</option>
                        <option <?php if($userdata['DeliveryTitle']=='Mrs.'){ ?> selected <?php } ?> value="Mrs.">Mrs.</option>
                        <option <?php if($userdata['DeliveryTitle']=='Ms.'){ ?> selected <?php } ?> value="Ms.">Ms.</option>
                        <option <?php if($userdata['DeliveryTitle']=='Miss.'){ ?> selected <?php } ?> value="Miss.">Miss.</option>
                        <option <?php if($userdata['DeliveryTitle']=='Dr.'){ ?> selected <?php } ?> value="Dr.">Dr.</option>
                        <option <?php if($userdata['DeliveryTitle']=='Prof.'){ ?> selected <?php } ?> value="Prof.">Ms.</option>
                        <option <?php if($userdata['DeliveryTitle']=='Rev.'){ ?> selected <?php } ?> value="Rev.">Rev.</option>
                      </select>
                      <i></i> </label>
                  </div>
                  <div class="col-md-8 ">
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="text" placeholder="First Name" id="d_first_name" name="d_first_name"  class="required" value="<?=$userdata['DeliveryFirstName']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the First Name</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="text" placeholder="Last Name" name="d_last_name" id="d_last_name" class="required" value="<?=$userdata['DeliveryLastName']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Last Name</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                      <input type="text" placeholder="Phone Number" name="d_phone_no" id="d_phone_no" class="required" value="<?=$userdata['DeliveryTelephone']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Phone Number</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                      <input type="text" placeholder="Mobile Number" name="d_mobile_no" id="d_mobile_no" value="<?=$userdata['DeliveryMobile']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Mobile Number</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="text" placeholder="Company Name" name="d_organization" id="d_organization" value="<?=$userdata['DeliveryCompanyName']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Company Name</b> </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="col-sm-12 " >
                    <label class="input"> <a href="javascript:void(0);" id="DeliverysearchButton" class="icon-append fa fa-search"></a>
                      <input type="text" placeholder="Postcode" name="d_pcode" id="d_pcode" class="required" value="<?=$userdata['DeliveryPostcode']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Postcode</b> </label>
                    <div id="selectDeliveryDiv" style="display:none">
                      <label class="select">
                        <select id="DeliveryaddressListSelect">
                        </select>
                        <i></i> </label>
                    </div>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                      <input type="text" placeholder="Address 1" name="d_add1"  id="d_add1" class="required" value="<?=$userdata['DeliveryAddress1']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Address 1</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                      <input type="text" placeholder="Address 2" name="d_add2" id="d_add2" value="<?=$userdata['DeliveryAddress2']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Address 2</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                      <input type="text" placeholder="City/Town" name="d_city" id="d_city" class="required" value="<?=$userdata['DeliveryTownCity']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the City/Town</b> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                      <input type="text" placeholder="County " name="d_county" id="d_county" class="required" value="<?=$userdata['DeliveryCountyState']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the County</b> </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="col-sm-12 " >
                    <label class="select">
                      <select name="d_country" id="d_country" class="required">
                        <option value="">Select Country </option>
                        <optgroup label="UK">
                        <option <?=($userdata['DeliveryCountry']=='United Kingdom')?'selected="selected"':''?>  value="United Kingdom">United Kingdom</option>
                        </optgroup>
                        <optgroup label="EUROPEAN UNION">
                        <? 
									foreach($europeunion_list as $row){?>
                        <option <?=($userdata['DeliveryCountry']==$row->name)?'selected="selected"':''?> value="<?=$row->name?>">
                        <?=$row->name?>
                        </option>
                        <? }?>
                        </optgroup>
                        <optgroup label="EUROPE">
                        <? 
									foreach($europe_list as $row){?>
                        <option <?=($userdata['DeliveryCountry']==$row->name)?'selected="selected"':''?> value="<?=$row->name?>">
                        <?=$row->name?>
                        </option>
                        <? }?>
                        </optgroup>
                        <optgroup label="Others">
                        <? 
									foreach($restofworld_list as $row){?>
                        <option <?=($userdata['DeliveryCountry']==$row->name)?'selected="selected"':''?> value="<?=$row->name?>">
                        <?=$row->name?>
                        </option>
                        <? }?>
                        </optgroup>
                      </select>
                      <i></i> </label>
                  </div>
                  <div class="col-sm-12 " >
                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                      <input type="email" placeholder="Email" name="d_email" id="d_email"  class="required" value="<?=$userdata['DeliveryEmail']?>">
                      <b class="tooltip tooltip-bottom-right">Needed to enter the Email</b> </label>
                  </div>
                  <div class="clearfix">
                    <div class="col-xs-6">
                      <button style="" type="submit" class="btn btn-block blueBg text-uppercase">Save  &nbsp; &nbsp; <i class="fa fa-edit"></i> </button>
                    </div>
                    <div class="col-xs-6">
                      <button style="" type="reset" class="btn btn-u btn-block orangeBg  text-uppercase" onclick="show_hide('deliv_info_edit','home','bill_info_edit');">Cancel&nbsp; &nbsp; <i class="fa fa-edit"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function show_hide(a,b,c){
		$('#'+c).hide('fast');
		$('#'+a).hide('fast');
		$('#'+b).show('fast');
		
}
	
	
	$(document).ready(function() {
		
		 var form = $("#delivery-form");
		 	  form.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
			  	rules: {
						
						 email: {
						 required: true,
						 email: true,
						 
						}
					},
					  submitHandler: function(form) {
				 	$.post(base+'ajax/ajax_update_delivery_info', $("#delivery-form").serialize(), function(data) {
							if(data.response=='error'){
									swal('Updation','Try Again ! unable to update Data ','warning');
							}else{
								
							window.location.href=base+"users/user_address";
						}
							//swal("Alright!", "invalid login details", "success");  
							return false;   
					},'json');
						   
				return false;
  		   }
					
  		});
		
		  var form = $("#billing-form");
		 	  form.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
			  	submitHandler: function(form) {
				 
				
					$.post(base+'ajax/ajax_update_billing_info', $("#billing-form").serialize(), function(data) {
							
							if(data.response=='error'){
									swal('Updation','Try Again ! unable to update Data ','warning');
							}else{
								
								window.location.href=base+"users/user_address";
						}
							//swal("Alright!", "invalid login details", "success");  
							return false;   
					},'json');
						   
				return false;
  		   }
					
  		});
		
		
	});				
</script>