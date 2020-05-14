<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Customer Questionnaire</li>
      </ol>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
   
   <!-- <div class="panel">
      <div class="row">
        <div class="col-xs-7  col-sm-8 col-md-7">
          <div class="col-xs-12  col-sm-6 col-md-6 m-l-5   ">
            <h1>Customer Questionnaire</h1>
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
    </div>-->
   
   
   
   <div class="panel">
        <div class="col-sm-6 col-md-6 pull-left">
            <h1>Customer Questionnaire</h1>
        </div>
        <div class="col-sm-6 col-md-6 p-l-r-15 pull-right">
          <a role="button" class="btn orange pull-right" href="<?=base_url()?>">
           <i class="fa fa-arrow-circle-left faa-horizontal animated"></i>&nbsp; Continue Shopping </a>
           <div class="clear10"></div>
        </div>
         <div class="clear"></div>
      </div>



 
      	
    
    <!-- Checkout -->
 
    <div class=" thumbnail">
    
         <? if(isset($msg) and $msg!=''){?> 
                <div role="alert" class="alert alert-<?=$class?> alert-dismissible fade in">
                  <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                     <?=$msg?>
                </div>
       	  <? } ?>
          
          
    <form name="questinare_form" id="questinare_form" method="post"  class="labels-form " action="">
      <div class="">
        <ul class="nav feedbackStep setup-panel ">
          <li class="active"><a href="#step-1"> <i class="fa fa-2x fa-briefcase p-t-b"></i> </a></li>
          <li class="disabled"><a href="#step-2"> <i class="fa fa-2x fa-coffee p-t-b"></i> </a></li>
          <li class="disabled"><a href="#step-3"> <i class="fa fa-2x fa-cubes p-t-b"></i> </a></li>
          <li class="disabled"><a href="#step-4"> <i class="fa fa-2x fa-envelope p-t-b"></i> </a></li>
        </ul>
        <div class="setup-content" id="step-1">

            <div class="">
              <div class="col-sm-12 p0">
                <h2 class="m-t-b-8 m-l-20 BlueHeading">Business Type</h2>
                <p class="m-t-b-8 m-l-20">Please select the option that most closely describes your industry sector and business activity</p>
              </div>
              <div class="col-sm-4">
                <div class="col-md-12 ">
                  <label class="select">
                    <select name="busness_type"  id="busness_type" class="required">
                      <option value="">Select</option>
                       <?php foreach($bussnes_type as $option){?>
							<option value="<?=$option->SubType?>"><?=$option->Type?></option>
						<? }?>
                    </select>
                    <i></i> </label>
                </div>
                <div class="col-md-12">
                  <label class="select">
                    <select id="sub_busness_type" name="sub_busness_type" class="required">
                     <option value="" selected="selected">Select</option>
                     </select>
                    <i></i> </label>
                </div>
                
              </div>
              
              <div class="col-sm-4">
                <div class="col-md-12">
                  <label class="input">
<textarea id="busness_other" name="busness_other" placeholder="Enter Other Instructions ....." rows="3" class="form-control hide required">
</textarea>
                  </label>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="text-center "> <i class="fa f-150  fa-users"></i> </div>
              </div>
            </div>
          
          
          
          <div class="col-sm-12 m-b-10" >
            <hr >
            <div class="col-xs-6  col-sm-6 col-md-6"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
              <div class="pull-right ">
                <button type="button" id="activate-step-2" class="btn m-t-15 orange pull-right"> Next <i class="fa fa-arrow-circle-right"></i> </button>
              </div>
            </div>
          </div>
        </div>
        
        
        
        <div class="setup-content" id="step-2">
         
            <div class="">
              <div class="col-sm-12 p0">
                 <h2 class="m-t-b-8 m-l-20 BlueHeading">Application</h2>
                <p class="m-t-b-8 m-l-20">Please indicate how you are using labels by ticking the relevant check boxes below</p>
              </div>
              
              <hr class="col-lg-12 m-t-b-10"> <!--border-line-->
         
        <!--first column--> 
            <!-- first section-->
              <div class="col-sm-4 p0">
              
              
              	
                                 
               <!-- second section-->
                <div>
                  <p class="m-t-b-8 m-l-20 m-t-10 ">Ceramic Labels</p>
                </div>
                
                <?php foreach($application_type2 as $option2){?>
                <div class="col-sm-12 m-l-10 m-b-10">
                  <label class="checkbox">
  <input id="application_array" name="application_array[]" type="checkbox" class="textOrange app_checked" value="<?=$option2->ID?>">
                    <i></i><?=$option2->Title?></label>
                </div>
                 <? }?>
                
                <!-- Third section-->
                <div>
                  <p class="m-t-b-8 m-l-20 m-t-10 ">Educational Labels</p>
                </div>
                
                <?php foreach($application_type3 as $option3){?>
                <div class="col-sm-12 m-l-10 m-b-10  " >
                  <label class="checkbox">
 <input id="application_array" name="application_array[]" type="checkbox" class="textOrange app_checked" value="<?=$option3->ID?>">
                    <i></i><?=$option3->Title?></label>
                </div>
                 <? }?>
                 
                 
                 
                  <div  >
                  <p class="m-t-b-8 m-l-20 m-t-10 ">Electrical Labels</p>
                </div>
                 <?php foreach($application_type4 as $option4){?>
                <div class="col-sm-12 m-l-10 m-b-10  " >
                  <label class="checkbox">
  <input id="application_array" name="application_array[]" type="checkbox" class="textOrange app_checked" value="<?=$option4->ID?>">
                    <i></i><?=$option4->Title?></label>
                </div>
                <? }?>
                
           </div> <!--first column Ends--> 
              
             
             
             
              
           <!--Second column-->    
              <div class="col-sm-4 p0 ">
               
                
                
                 <!-- second section-->
                 <div>
                  <p class="m-t-b-8 m-l-20 m-t-10 ">Fire Extinguisher Labels</p>
                </div>
                 <?php foreach($application_type5 as $option5){?>
               <div class="col-sm-12 m-l-10 m-b-10  " >
                  <label class="checkbox">
 <input id="application_array" name="application_array[]" type="checkbox" class="textOrange app_checked" value="<?=$option5->ID?>">
                    <i></i><?=$option5->Title?></label>
                </div>
                <? }?>
                
                
                
                <div>
                  <p class="m-t-b-8 m-l-20 m-t-10 ">General Labels</p>
                </div>
                
                
                <?php foreach($application_type as $option1){?>
                <div class="col-sm-12 m-l-10 m-b-10  " >
                  <label class="checkbox">
 <input id="application_array" name="application_array[]" type="checkbox" class="textOrange app_checked" value="<?=$option1->ID?>">
                    <i></i><?=$option1->Title?></label>
                </div>
                 <? }?>
             </div><!--Second column Ends-->    
             
             
              
              
         <!--Third column-->      
              <div class="col-sm-4 p0 ">
                <div>
                  <p class="m-t-b-8 m-l-20 m-t-10 ">Pharmaceutical Labels</p>
                </div>
                  <?php foreach($application_type6 as $option6){?>
                <div class="col-sm-12 m-l-10 m-b-10  " >
                  <label class="checkbox">
 <input id="application_array" name="application_array[]" type="checkbox" class="textOrange app_checked" value="<?=$option6->ID?>">
                    <i></i><?=$option6->Title?></label>
                </div>
              <? }?>  
              </div>  <!--Third column Ends-->      
              
              
              
              <hr class="col-lg-12 m-t-b-10">
              
              
              
              <div class="col-sm-4 p0">
                <div  >
                  <h4 class=" m-l-20 m-b-10  cBlue">Do you print on the labels?</h4>
                </div>
                <div class="col-sm-12  m-l-10 m-b-10  " >
                  <label class="radio state-success col-sm-4">
                    <input type="radio" name="print_labels_btn" id="print_labels_btn1" value="1">
                    <i class="rounded-x"></i> Yes </label>
                  <label class="radio col-sm-8 ">
                    <input type="radio" name="print_labels_btn" id="print_labels_btn1" value="0">
                    <i class="rounded-x"></i> No</label>
                </div>
              </div>
              
              
              
              
              <div class="col-sm-8 p0">
                <div  >
                  <h4 class=" m-l-20 m-b-10  cBlue">If no, do you use third-party print service?</h4>
                </div>
                <div class="col-sm-12  m-l-10 m-b-10  " >
                  <label class="radio state-success col-sm-2">
      <input type="radio" name="third_party_btn1" id="third_party_btn1" value="1" class="radio_checker">
                    <i class="rounded-x"></i> Yes </label>
                  <label class="radio col-sm-10 ">
    <input type="radio" name="third_party_btn1" id="third_party_btn1" value="0" class="radio_checker">
                    <i class="rounded-x"></i> No</label>
                </div>
              </div>
            </div>
        
          
          
          
          
          
          <div class="col-sm-12 m-b-10" >
            <hr >
            <div class="col-xs-6  col-sm-6 col-md-6">
              <div class="col-xs-6  col-sm-6 col-md-6  ">
                <div class="pull-left ">
                  <button id="previous_1" type="button" class="btn m-t-15 blue2 pull-left"><i class="fa fa-arrow-circle-left"></i> Previous </button>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
              <div class="pull-right ">
                <button type="button" id="activate-step-3" class="btn orange m-t-15 pull-right"> Next <i class="fa fa-arrow-circle-right"></i> </button>
              </div>
            </div>
          </div>
        </div>
        <div class="setup-content" id="step-3">
        
            <div class="">
              <div class="col-sm-12 p0">
                 <h2 class="m-t-b-8 m-l-20 BlueHeading">Product Range </h2>
                <p class="m-t-b-8 m-l-20">What products from the following list have you used and/or might consider using in the future?</p>
              </div>
              <div class="col-sm-12">
                <div class="col-md-4 ">
                  <label class="select">
                    <select name="product_type" id="product_type" class="required">
                <option value="">Select product type</option>
                <option value="flat">Flat Sheet Labels</option>
                <option value="A4">A4 Sheets</option>
                <option value="A3">A3 Sheets</option>
                <option value="SRA3">SRA3 Sheets</option>
                <option value="Roll">Roll Labels</option>
                    </select>
                    <i></i> </label>
                </div>
                
                <div class="col-md-4 ">
                  <label class="select">
                    <select name="matr_type" id="matr_type" class="required">
                      <option value="">Select Material Type</option>
                      <? foreach($matt_type as $mat){
							echo "<option value=".$mat->SubId.">".$mat->title."</option>"; 
						}
					?>
                    </select>
                    <i></i> </label>
                </div>
                <div class="col-md-4 ">
                  <label class="select">
                    <select id="sub_mat_type" name="sub_mat_type" class="required">
                     <option value="" selected="selected">Select Adhesive</option>
                    </select>
                    <i></i> </label>
                </div>
              </div>
              <hr class="col-lg-12 m-t-b-10">
              <div class="col-sm-12 p0">
                 <h2 class="m-t-b-8 m-l-20 BlueHeading">Reasons for choosing AA Labels</h2>
                <p class="m-t-b-8 m-l-20">Please tell us the three most important aspects of our products and service by ranking them 1 to 3 in the relevant  boxes below (1 being the highest priority and 3 the lesser consideration):</p>
              </div>
              <div class="col-sm-12">
            
            	<? 
				
				 foreach( $chosing_type as $chosing){ ?>
				 <div class="col-md-4 ">
                 
                  <div>
                    <div class="col-md-8"> <?=$chosing->Title?></div>
                    <div class="col-md-4">
                      <label class="select">
                        <select name="rating_val[]" class="rating-group" >
                         <option value="" >Rating</option>
                         <option value="1">01</option>
                          <option value="2">02</option>
                          <option value="3">03</option>
                        </select>
                        <i></i> </label>
                    </div>
                     </div>
                </div>
                   <? }?> 
                 
                
                
               		<label style="display:none;" id="custom_rating_error" >This field is required.</label>
               
              </div>
              
              
              
              <div class="col-md-12">
                <p class="m-t-b-8 m-l-20">If you have Selected a value (between 1 – 3) in the OTHER column, could you please provide a brief explanation.</p>
              </div>
              <div class="col-sm-12">
                <div class="col-md-12">
                  <label class="input">
    
      				  <textarea name="reason_other" id="reason_other" placeholder="Enter Other Instructions ....." rows="6" class="form-control"></textarea>
                  </label>
                </div>
              </div>
            </div>
         
          <div class="col-sm-12 m-b-10" >
            <hr >
            <div class="col-xs-6  col-sm-6 col-md-6">
              <div class="col-xs-6  col-sm-6 col-md-6  ">
                <div class="pull-left ">
                  <button id="previous_2" type="button" class="btn blue2 m-t-15 pull-left"><i class="fa fa-arrow-circle-left"></i> Previous </button>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
              <div class="pull-right ">
  <button type="button" id="activate-step-4" class="btn orange m-t-15 pull-right">Next <i class="fa fa-arrow-circle-right"></i> </button>
              </div>
            </div>
          </div>
        </div>
        <div class="setup-content" id="step-4">
         
            <div class="">
              <div class="col-sm-12 p0">
                 <h2 class="m-t-b-8 m-l-20 BlueHeading">Company/Individual Details</h2>
                <p class="m-t-b-8 m-l-20">Thank you for taking the time to complete this brief questionnaire which helps us to better understand the ways in which we can continually improve the service delivery to our customers.</p>
              </div>
              <div class="col-sm-8">
                <div class="col-sm-12 ">
                  <label class="input"> <i class="icon-append fa fa-briefcase"></i>
                    <input type="text" id="c_name" name="c_name" placeholder="Name Of The Company" >
                    
                    <b class="tooltip tooltip-bottom-right">Needed to enter the Name of the Company</b>
                  </label>
                </div>
                <div class="col-sm-6 ">
                  <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input type="text" id="name" name="name" placeholder="Name" class="required">
                    <b class="tooltip tooltip-bottom-right">Needed to enter the Full Name</b>
                  </label>
                </div>
                <div class="col-sm-6 ">
                  <label class="input"> <i class="icon-append fa fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Email Address" class="required">
                    <b class="tooltip tooltip-bottom-right">Needed to enter the Email Address</b>
                  </label>
                </div>
                <div class="col-sm-6 ">
                  <label class="input"> <i class="icon-append fa fa-user-plus"></i>
     <input type="text" id="desgnation" name="desgnation" placeholder="Your Position Within The Organisation" class="required"><b class="tooltip tooltip-bottom-right">Needed to enter the Your Position Within The Organisation</b>
                  </label>
                </div>
                <div class="col-sm-6 ">
                  <label class="input"> <i class="icon-append fa fa-phone"></i>
                    <input type="text" id="tel" name="tel" placeholder="Phone" class="required">
                     <b class="tooltip tooltip-bottom-right">Needed to enter the Phone</b>
                  </label>
                </div>
                <div class="text-right ">
                <a href="#" data-target=".delivery_info" data-toggle="modal" class="textOrange">AA Labels Privacy Policy</a>
                
                  </div>
              </div>
              <div class="col-sm-4">
                <div class="text-center "> <i class="fa f-150  fa-paper-plane "></i> </div>
              </div>
            </div>
         
          <div class="col-sm-12 m-b-10" >
            <hr >
            <div class="col-xs-6  col-sm-6 col-md-6">
              <div class="col-xs-6  col-sm-6 col-md-6  "> </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
              <div class="pull-right ">
   <button type="submit" id="activate-step-5" class="btn orange m-t-15 pull-right">Submit Now <i class="fa fa-arrow-circle-right"></i>
                </button>
                
              </div>
            </div>
          </div>
        </div>
      </div>
       </form>
    </div>
  </div>
</div>



<div class="modal fade delivery_info" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
        <h4 id="myModalLabel" class="modal-title">Green Technologies Ltd t/a AA Labels - www.aalabels.com <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
      </div>
      <div class="">
        <? /*include('deliveryinfo.php'); */ include(APPPATH.'views/shopping/deliveryinfo.php'); ?>
        
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
      </div>
    </div>
  </div>
</div>


<script>


			
			
 $(document).on("change", "#busness_type", function(e) {
	
	var busness_type = $('#busness_type').val();
	if(busness_type!=0 || busness_type!=''){
	 	$.ajax({
				  url: "<?=base_url()?>ajax/get_bussines_subtype",
				  dataType:"html",
				  type:'POST',
				  data:{ids:busness_type},
				  success: function(data){
				  if(data){
				$('#sub_busness_type').html(data);
				
				
				}
			}
	});  ///\\\   Ajax End	
}else{
	   $('#sub_busness_type').empty();
	} 
  	
	
  });
  
  $(document).on("change", "#sub_busness_type", function(e) {
	  var business_type = $('#sub_busness_type').val();
	  if(business_type=="other"){
  		 $('#busness_other').removeClass('form-control hide').addClass('form-control');
	 }else{
  		 $('#busness_other').removeClass('form-control').addClass('form-control hide');	 
	}
	});
  
  
  
  $(document).on("change", "#matr_type", function(e) {
	var matr_type = $('#matr_type').val();
	var product_type = $('#product_type').val();
	if(product_type==0 || product_type==''){
	alert('Select Product Type First');	
	return false;
	}
	if(matr_type!=0 || matr_type!=''){
	$.ajax({
				  url: "<?=base_url()?>ajax/get_material_subtype",
				  dataType:"html",
				  type:'POST',
				  data:{ids:matr_type},
				  success: function(data){
				  if(data){
					  $('#sub_mat_type').html(data);
			
				}
			}
		 });  // Ajax End	
		
}else{
$('#sub_mat_type').empty();
		
		
	}
 }); 
	
$(document).ready(function() {
			var err_val=0;
		  var form = $("#questinare_form");
		  form.validate({
					errorPlacement: function (error, element) {
						//alert(error.text());
						var id = element.attr('class');
						
						if(id.match('rating-group')){
							//console.log('element : '+id+' error : '+error.text());
							//swal("","Please select at least 1 of these Rating fields.","danger"); return false;
							//alert("please select one field");return false;
							if(err_val==0){
								//$('#custom_rating_error').html(' Please select at least 1 of these Rating fields. ');
								//$('#custom_rating_error').css('display','block');
								swal("","Please select at least 1 of these Rating fields.","warning");  return false;err_val = 1;
								//console.log('element : '+id+' error : '+error.text()); 
							}else{ return false;}
							
						}else{
								err_val = 0;
								element.after(error);
						}
						return false;
						
					},
					//errorPlacement: function errorPlacement(error, element) {  },
					rules: {
						    "rating_val[]": {
								  require_from_group: [1, ".rating-group"],
							},
							tel:{
							    required: true,
     							phoneUK: true
							}
					},
					onclick: false,
					onfocusout: false,
					/*message:{
						"rating_val[]": "please select at least 1 of the rating fields."
					},*/
					submitHandler: function(form) {
						if(form.valid()==true){
								console.log('form is about to submit');
								form.submit();
								return true;
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
		navListItems.closest('li').removeClass('active');
		$item.addClass('active');
		allWells.hide();
		$target.show();
		//err_val = 0;
		}
    }
  });
    
    $('ul.setup-panel li.active a').trigger('click');
    
   /***** Billing page btn ***/
   $('#activate-step-2').on('click', function(e) {
	form.validate().settings.ignore = ":disabled,:hidden";
	       if(form.valid()==true){
			//  err_val = 0;
			$('ul.setup-panel li:eq(1)').removeClass('disabled');
     		$('ul.setup-panel li a[href="#step-2"]').trigger('click');
			
		}	
	})
	
	/***** Delivery page btn ***/
	 $('#activate-step-3').on('click', function(e) {
		form.validate().settings.ignore = ":disabled,:hidden";
	    if(form.valid()==true){ 
		//err_val = 0;
		var total= $('[name="application_array[]"]:checked').length;
	     
		 
		var option2 = $("input[name='print_labels_btn1']:checked").val();
		var option3 = $("input[name='third_party_btn1']:checked").val();
	
	    if(total==0){
		swal("Alert","Select Atleast one Option","warning");
		return false;
		}
	    if(option2=="undefined" && option3=="undefined"){
		swal("Alert","Select Printing Service","warning");	
		return false;	
		}
		if(option2==0 && option3=="undefined"){
		swal("Alert","Select Printing Service","warning");	
		return false;
		}
	    
		$('ul.setup-panel li:eq(2)').removeClass('disabled');
		$('ul.setup-panel li a[href="#step-3"]').trigger('click');
		}	
	
	 })
	
	/***** Shipping page btn ***/
	 $('#activate-step-4').on('click', function(e) {
       form.validate().settings.ignore = ":disabled,:hidden";
	    if(form.valid()==true){ 
		err_val = 0;
		$('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
		}
	})
	
	 $('#previous_1').on('click', function(e) { 
			$('ul.setup-panel li a[href="#step-1"]').trigger('click'); 
	 })
	 $('#previous_2').on('click', function(e) { 
			$('ul.setup-panel li a[href="#step-2"]').trigger('click'); 
	 })
	
});		
</script>