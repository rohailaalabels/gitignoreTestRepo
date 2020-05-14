<style>
.editor-lead-section {
	padding: 20px 10px !important;
}
.lba-choose-other-design-btn {
	border: #333 solid 2px;
	background: #dddddd;
	color: #000;
}
.lba-checkout-btn {
	float: right;
}
.lba-nav-tabs li a {
	border-radius: 0px !important;
	background-color: #e0e0e0;
	padding: 10px 10px !important;
}
.LBAEditor .nav-tabs {
	float: left;
	border-bottom: 0;
}
.LBAEditor .nav-tabs li {
	float: none;
	margin: 0;
	border-left: 0;
}
.LBAEditor .nav-tabs li a {
	margin-right: 0;
	border: 0;
}
.LBAEditor .nav-tabs li a:hover {
	background-color: #17b1e3;
}
.LBAEditor .nav-tabs li:hover {
	border-color: #17b1e3;
}
.LBAEditor .nav-tabs .glyphicon {
	color: #fff;
}
.LBAEditor .nav-tabs .active .glyphicon {
	color: #333;
}
.LBAEditor .nav-tabs > li.active > a, .LBAEditor .nav-tabs > li.active > a:hover, .LBAEditor .nav-tabs > li.active > a:focus {
	border: 0;
	background: #00b6f0;
}
.LBAEditor .tab-content {
	margin-left: 45px;
}
.LBAEditor .tab-content .tab-pane {
	display: none;
	background-color: #fff;
	padding: 4.0rem;
	overflow-y: auto;
}
.LBAEditor .tab-content .active {
	display: block;
}
.lba-tab-pane {
	text-align: center;
}
.lba-hr {
	display: inline-table;
}
.lba-label-summary-wrapper {
	display: none;
}
.lba-label-summary-heading {
	text-align: center;
	border-bottom: #ccc solid 1px;
	border-top: #ccc solid 1px;
	margin: 10px 0px;
	padding: 5px 0px;
}
.lba-label-summary {
	font-size: 9px;
	border-bottom: #ccc solid 1px;
	padding: 5px 0px;
}
.lba-right-col {
}
.lba-supply {
	padding-bottom: 5px;
}
.editor-checkbox-wrapper label {
	margin-bottom: 0px !important;
	padding: 0;
}
.editor-checkbox {
	position: inherit !important;
	margin-right: 5px !important;
}
.lba-space {
	padding: 10px;
}
.gray-bg {
	background-color: #f1f2f2;
}
.bg-n-border-radius {
	border-radius: 5px;
	background-color: white;
	box-shadow: 0 4px 0 #848484;
	display: block;
	transition: border 0.2s ease-in-out;
}
.lba-thubmnail-image {
	width: 60px;
}
.no-padding {
	padding: 0 !important;
}
.aa-modal .panel-heading {
	background-color:#17b1e3 !important;
}
.labels-form .radio input + i::after {
	border-radius: 50%;
	content: "";
	height: 7px;
	left: 3px;
	top: 3px;
	width: 7px;
}
.bg-n-border-radius {
	box-shadow: none;
}
.roll_prices {
	margin-bottom: 15px;
}
label.supply {
	cursor: pointer;
}
label.supply span {
	font-weight: normal;
}
.lba-editor-price {
	color: #fd4913;
	font-size: 18px;
	font-weight: bold !important;
}
label.supply:hover i {
	border-color: #8dc9e5;
}
.set_box {
	padding: 0;
}
.set_box .set_head {
	padding: 8px 15px;
	border-bottom: 1px solid #ececec;
}
.set_box .set_body {
	padding: 10px 0;
}
.well {
	margin: 0;
	border-radius: 0;
	padding: 10px;
}
span.summary-label {
	font-size: 11px;
	display: block;
}
.summmary-block {
	border-right: 1px solid #ececec;
	margin-bottom:10px;
}
.summmary-block:last-child {
	border: 0;
}
.lba-left-col {
	padding-left: 0;
}
</style>
<div id="aa_loader" class="white-screen" style="display:none;" >
  <div class="loading-gif text-center" style="top:50%; z-index:150;"><img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:160px; height:43px; "> </div>
</div>
<div class="container m-t-b-8">
  <div class="row">
    <div class="col-xs-12  col-sm-6 col-md-8 ">
      <ol class="breadcrumb  m0">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Labels by application / <a href="<?=base_url()?>lba-page/<?=strtolower($category->name)?>">
          <?=$category->name?>
          </a> / <a href="<?=base_url()?>lba-page/<?=strtolower(str_replace(" ","-",$category->name))?>/<?=strtolower(str_replace(" ","-",$category->sub_name))?>">
          <?=$category->sub_name?>
          </a> /
          <?=$category->CID?>
        </li>
      </ol>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4"> </div>
  </div>
</div>
<div class="bgGray LBAEditor">
<div class="container">
  <div class="row">
    <div class="col-md-9 lba-left-col">
    
     <? $is_logged = $this->session->userdata('logged_in'); ?>
     
     
      <div class="bg-n-border-radius lba-space" id="lba_sets_data">
        <ul class="nav nav-tabs lba-nav-tabs">
          <?php $i = 0; foreach($products as $pro):
		    $labels_per_sheet = 0;
			if($pro->available_in == "both"){
			 $tcode = explode(",",$pro->association);
			 $t_code = $tcode[0];
			}elseif($available_in == "Roll"){}
			else{
			 $t_code = $pro->association;
			}
			$labels_per_sheet = $this->home_model->get_db_column('products','LabelsPerSheet','CategoryID',$t_code);
			$imgsrc = LABELER."thumb/".$pro->image;
			
	 // if($is_logged==true){
//	    $userdesigns = $this->home_model->check_user_design($pro->setid,$pro->Designid);
//		if(!empty($userdesigns)){
//		 $imgsrc = LABELER."users/".$userdesigns['Thumb'];
//		 $is_user_design_selected = "true";
//		}
//	  }else{
//	     $imgsrc = LABELER."thumb/".$pro->image;
//		 $is_user_design_selected = "false";
//	  }	
			
		
		
            $i++; ?>
          <li class="<?=($i==1)?'active':''?>"> <a href="#<?=$pro->productID.$pro->type?>" data-toggle="tab" data-productID="<?=$pro->productID?>" data-CID="<?=$pro->CID?>" data-size="<?=$pro->size?>" data-shape ="<?=$pro->shape?>" data-thumbnail="<?=$pro->full_image?>" data-labelspersheet="<?=$labels_per_sheet?>" data-available_in="<?=$pro->available_in?>" data-association="<?=$pro->association?>"> <img onerror='imgError(this);' src="<?=$imgsrc?>" class="lba-thubmnail-image"> </a> </li>
          <?php endforeach;?>
        </ul>
        <div id="myTabContent" class="tab-content">
       <?php $i = 0; foreach($products as $pro): $i++; 
	$imgsrc = (isset($pro->full_image) && $pro->full_image!='')?LABELER."user/".$pro->full_image:LABELER."thumb/".$pro->image;?>
          <div class="tab-pane <?=($i==1)?'active':''?> lba-tab-pane" id="<?=$pro->productID.$pro->type?>"> <img onerror='imgError(this);' src="<?=$imgsrc?>" class="image" style="width:50%">
            <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
              <!-- Button trigger modal -->
       <button type="button" class="btn orangeBg m-t-20 edit_design"  data-label-id="<?=$pro->setid?>" > Edit my design </button>
       <!--data-toggle="modal" data-target="#LoadFlashModal" -->
              <!-- Modal --> 
            </div>
          </div>
          <?php endforeach;?>
        </div>
      </div>
      
      
      
      
    </div>
    <div class="col-md-3 lba-right-col productdetails">
      <div class="row bg-n-border-radius lba-space">
        <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label class="select">
            <select name="material_adhesive" id="material_adhesive">
              <option value="">Select Material & Adhesive</option>
            </select>
            <i></i> </label>
        </div>
        <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label class="input">Add number of Labels
            <input name="printedsheet_input" id="printedsheet_input" class="printedsheet_input" placeholder="Min Qty: 200" type="text">
          </label>
        </div>
        <div class="add_to_cart_wrapper" style="display:none;">
          <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="lba-supply">Supply</div>
            <div class="col-md-12 roll_prices">
              <div class="row">
                <div class="col-md-3 text-center"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/lba-roll-thumb.jpg" class="image"> </div>
                <div class="col-md-9">
                  <label class="check state-success supply">
                  <div class="editor-checkbox-wrapper checkbox">
                    <input type="radio" id="add_option" name="add_option" value="Rolls" class="delivery-group">
                    <i class="rounded-x"></i>On Rolls </div>
                  <span class="lba-editor-price">£80.00</span><br/>
                  <span class="vatoption">Ex</span> VAT<br/>
                  <span class="labelprice">200 Labels, £0.257 per label</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-12 sheet_prices">
              <div class="row">
                <div class="col-md-3 text-center"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/lba-sheet-thumb.jpg" class="image"> </div>
                <div class="col-md-9">
                  <label class="check state-success supply">
                  <div class="editor-checkbox-wrapper checkbox">
                    <input type="radio" id="add_option" name="add_option" value="Sheets" class="delivery-group">
                    <i class="rounded-x"></i>On Sheets </div>
                  <span class="lba-editor-price">£80.00</span><br/>
                  <span class="vatoption">Ex</span> VAT<br/>
                  <span class="labelprice">200 Labels, £0.257 per label</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button type="button" id="" class="btn orangeBg m-t-20 col-lg-12 col-md-12 add_to_cart">Add To Basket <i class="fa fa-shopping-cart"> </i></button>
            </div>
          </div>
        </div>
        <div class="calculate_button_wrapper">
          <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="button" id="" class="btn orangeBg col-lg-12 col-md-12 calculate_printed">Calculate Price <i class="fa fa-calculator"> </i></button>
          </div>
        </div>
        <!--label summary-->
        <div class="labels-form col-lg-12 col-md-12 col-sm-12 col-xs-12 lba-label-summary-wrapper">
          <div class="lba-label-summary-heading">Summary of selected label(s)</div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <img onerror='imgError(this);' src="<?=Assets?>images/lba/hover-thumb-square.jpg" class="image selected_thumbnail img-responsive"> </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <input type="hidden" name="association"  value="" id="association"/>
            <input type="hidden" name="categoryID"  value="" id="categoryID"/>
            <input type="hidden" name="size"  value="" id="size"/>
            <input type="hidden" name="shape"  value="" id="shape"/>
            <input type="hidden" name="available_in"  value="" id="available_in"/>
            <input type="hidden" name="labelspersheet"  value="" id="labelspersheet"/>
            <div class="roll_data">
              <input type="hidden" name="ManufactureID"  value="" class="ManufactureID"/>
              <input type="hidden" name="ProductID"  value="" class="ProductID"/>
              <input type="hidden" name="rawprice"  value="" class="rawprice"/>
              <input type="hidden" name="max_labels"  value="" class="max_labels"/>
              <input type="hidden" value="" class="category_description"  />
            </div>
            <div class="sheet_data">
              <input type="hidden" name="ManufactureID"  value="" class="ManufactureID"/>
              <input type="hidden" name="rawprice" value="" class="rawprice"/>
              <input type="hidden" name="ProductID" value="" class="ProductID"/>
              <input type="hidden" name="max_labels"  value="" class="max_labels"/>
              <input type="hidden" value="" class="category_description"  />
            </div>
            <div class="lba-label-summary">Code: <span class="association"></span></div>
            <div class="lba-label-summary">Design Code: <span class="categoryID"></span></div>
            <div class="lba-label-summary">Size: <span class="size"></span></div>
            <div class="lba-label-summary">Shape: <span class="shape"></span></div>
          </div>
          <hr class="lba-hr">
          </hr>
        </div>
      </div>
    </div>
  </div>
  <div class="row bg-n-border-radius lba-space m-t-20 set_box" id="lba_cart">
    <?=$lba_cart?>
  </div>
</div>
<div class="bgGray lba-top-padding">
  <div class="container">
    <div class="row bg-n-border-radius lba-space editor-lead-section">
      <div class="col-md-6"> <a href="<?=base_url()?>lba-page/" data-role="button" class="btn col-lg-6 col-md-6 lba-choose-other-design-btn">Choose a different design</a> </div>
      <div class="col-md-6">
        <button type="submit" id="" class="btn orangeBg col-lg-6 col-md-6 lba-checkout-btn">Checkout</button>
      </div>
    </div>
  </div>
</div>
<div class="printed-lba-call" style="border:none;">
  <div class="container " >
    <div class="col-md-8 col-sm-12">
      <h2>INFORMATION & ADVICE <br />
        <small>We’re here to help you chose the label that’s right for you.</small></h2>
      <p class="text-justify">If you need assistance or help deciding which label format you require for your application, or the material and adhesive, or size most suited. Please contact our customer care team, via the live-chat facility on the page, our website contact form, telephone, or email and they will be happy to discuss your requirements.</p>
    </div>
    <div class="col-md-4 col-sm-12 "> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/call_opr_1.png"> </div>
  </div>
</div>

<style>
.modal-body {
  padding: 0px !important;
}
</style>
<div class="modal fade aa-modal" id="LoadFlashModal" tabindex="-1" role="dialog" aria-labelledby="LoadFlashModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="width:88%">
    <div class="modal-content no-padding">
      <div class="panel-heading">
        <h3 class="pull-left no-margin"><b>Label Editor</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
        <div class="clear"></div>
      </div>
      <div class="modal-body" id="ajax_editor_content"> Editor will be added here. </div>
      <div class="modal-footer hide">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn orangeBg">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade login-modal aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" style="width:28%">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b id="lba_model_head">Account Login</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div id="login_register_msg">You must login to your account before proceeding.</div>
          <div class="login_form">
            <form class="labels-form" id="login_form" method="post" action="">
              <input type="hidden" name="page" value="lba" />
              <div class="m-t-15">
                <div class="p-l-r-10">
                  <label id="server_error" style=" display:none;" class="error" ></label>
                  <div class=" ">
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="email" placeholder="Enter Email address" name="email" id="email" class="required">
                    </label>
                  </div>
                  <div class=" ">
                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                      <input type="password" placeholder="Enter Password" name="password" id="password" class="required">
                    </label>
                  </div>
                  <div class="">
                    <button style="margin:13px 0; " type="submit" class="btn orangeBg  text-uppercase btn-block">Sign in </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="register_form" style="display:none;">
            <form class="labels-form " id="signup_form"  method="post" action="" >
              <div class=" m-t-b-10 ">
                <div>
                  <div class="col-sm-12">
                    <div class="col-md-12  ">
                      <label class="input"><i class="icon-append fa fa-user"></i>
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" class="required">
                      </label>
                    </div>
                    <div class="col-md-12  ">
                      <label class="input"><i class="icon-append fa fa-user"></i>
                        <input type="text" id="lastname" name="lastname" placeholder="Last  Name" class="required">
                      </label>
                    </div>
                    <div class="col-sm-12  " >
                      <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                        <input type="email" placeholder="Email Address  (Your email address will be your log in ID)" name="email_reg" id="email_reg">
                      </label>
                    </div>
                    <div class="col-sm-12  " >
                      <label class="input"><i class="icon-append fa fa-lock"></i>
                        <input type="password" placeholder="Password" name="password_reg" id="password_reg">
                      </label>
                    </div>
                    <div class="col-sm-12  " >
                      <label class="input"> <i class="icon-append fa fa-lock"></i>
                        <input type="password" placeholder="Confirm Password " name="cpassword" id="cpassword">
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class=" col-sm-12   ">
                      <button type="submit" id="activate-step-2" class="btn orangeBg text-uppercase btn-block"> Register Now </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!--end mat-sep--> 
        </div>
        <div class="modal-footer">
          <a type="button" class="forgot_password pull-left modal-footer-anchor">Forgot Password?</a>
          <a type="button" class="register_new pull-right modal-footer-anchor">Register a new account</a>
          <a type="button" class="login_new modal-footer-anchor" style="display:none;">Login To Account</a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.modal-footer .modal-footer-anchor {
	cursor: pointer;
	color: #17b1e3 !important;
	padding: 12px;
	font-weight: bold;
	font-size: 13px;
	font-family: arial;
}

</style>

<script>

$(document).on("click", ".edit_design", function(e) {
  var label_id = $(this).attr('data-label-id');
    $.ajax({
		url: base+'home/load_flash_panel',
		type:"POST",
		async:"false",
		dataType: "html",
		data:{label_id:label_id,is_user_design_selected:'false'},
		success: function(data){
		if(data){
		 if(data=="login"){
		  $("a.login_new").trigger("click");	
		  $('.login-modal').modal('show');
		 }else{
		  $('#LoadFlashModal').modal('show');
		  $('#ajax_editor_content').html(data);
		 }
		}
	   }  
	});
 });


		$(document).ready(function(){
	  var form = $("#login_form");
		  form.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
		  submitHandler: function(form) {
			  $("#login_form .btn").attr("disabled","disabled").html("Please Wait <i class='fa fa-spin fa-spinner'></i>");
			  	$.post(base+'ajax/user_login', $("#login_form").serialize(), function(data) {
					$("#login_form .btn").removeAttr("disabled").html("Submit Now <i class='fa fa-arrow-circle-right'></i>");
						 if(data.response=='error'){
							$('#server_error').text("Email address or password is invalid!");
							$('#server_error').show();
						 }else{
							update_header_login(data.username);
							$('.login-modal').modal('hide');
							if(data.template !=''){
							  $("[data-label-id='"+data.template+"']").trigger("click");	
							}
					   }
						//swal("Alright!", "invalid login details", "success");  
						return false;   
				},'json');
					   
			return false;
	   }
	});
	

   		var form2 = $("#signup_form");
		form2.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
		rules: {
				password_reg: {
					required: true,
					minlength:8,
					maxlength:20,
				},
				cpassword: {
				  equalTo: "#password_reg"
				},
				 email_reg: {
				 required: true,
				 email: true,
				 onkeyup: false,
				 remote: base+"ajax/is_email_exist"
				}
			},
			messages: {
			 email_reg: {
					remote: $.validator.format("This email address is already taken.")
				}
					
			},
			submitHandler: function(form2) {
				$("#signup_form .btn").attr("disabled","disabled").html("Please Wait <i class='fa fa-spin fa-spinner'></i>");
				var reg_data = {
					'firstname':$("#firstname").val(),
					'lastname':$("#lastname").val(),
					'email':$("#email_reg").val(),
					'password':$("#password_reg").val(),
					'cpassword':$("#cpassword").val(),
					'page':'lba',
				};
				
				$.post(base+'users/signup', reg_data, function(data) {
					data = $.parseJSON(data);
					if(data.msg == "registered"){
						update_header_login($("#firstname").val());
						$('.login-modal').modal('hide');
						if(data.template !=''){
						 $("[data-label-id='"+data.template+"']").trigger("click");	
						}
					}
				},'html');
				return false;
				}
				
			});
			
	
	
	$("a.register_new").click(function(){
		$(".login_form").hide();
		$(".register_new").hide();
		$(".forgot_password").hide();
		$(".register_form").show();
		$(".login_new").css('display','block');
		$("#lba_model_head").html('Create Account');
		
		
	});
	
	$("a.login_new").click(function(){
		$(".login_form").show();
		$(".register_new").show();
		$(".forgot_password").show();
		$(".register_form").hide();
		$(".login_new").css('display','none');
		$("#lba_model_head").html('Account Login');
	});
	$("a.forgot_password").click(function(){
		window.location = base+"users/forgotpassword";
	});
});	
	
	
	
$(document).ready(function(e) {
	$(".lba-nav-tabs .active a").trigger('click');
});
$(document).on('click','.lba-nav-tabs a',function(e){
	var productID = $(this).data('productid');
	var categoryID = $(this).data('cid');
	var size = $(this).data('size');
	var shape = $(this).data('shape');
	var thumbnail = $(this).data('thumbnail');
	var available_in = $(this).data('available_in');
	var association = $(this).data('association');
	var labelspersheet = $(this).data('labelspersheet');
	
	$(".lba-label-summary-wrapper").find(".lba-label-summary .association").text(association);
	$(".lba-label-summary-wrapper").find(".lba-label-summary .categoryID").text(categoryID);
	$(".lba-label-summary-wrapper").find(".lba-label-summary .size").text(size);
	$(".lba-label-summary-wrapper").find(".lba-label-summary .shape").text(shape);
	
	$(".lba-label-summary-wrapper").find("#shape").val(shape);
	$(".lba-label-summary-wrapper").find("#association").val(association);
	$(".lba-label-summary-wrapper").find("#categoryID").val(categoryID);
	$(".lba-label-summary-wrapper").find("#available_in").val(available_in);
	$(".lba-label-summary-wrapper").find("#labelspersheet").val(labelspersheet);
	$(".lba-label-summary-wrapper").find("#size").val(size);
	
	thumbnail = '<?=Assets?>images/lba/'+thumbnail;
	$(".selected_thumbnail").attr('src',thumbnail);
	$('.productdetails').find('.add_to_cart_wrapper').hide();
	$('.productdetails').find('.calculate_button_wrapper').show();
	$('.productdetails').find('#printedsheet_input').focus();

	$("#aa_loader").show();
	$.ajax({
		url: base+'ajax/generate_html_material',
		type:"POST",
		async:"false",
		dataType: "html",
		data:{
				productID:productID,
				categoryID:association,
				available_in:available_in,
			},
		success: function(data)
		{
			if(!data=='')
			{	
				data = $.parseJSON(data); 
				if(data.response=='yes')
				{
					$("#material_adhesive").html(data.select);
					$("#aa_loader").hide();
				}
			}
		}
	});
});
var timer = '';
function show_faded_popover(_this, text){
		$(_this).attr('data-content','');
		$(_this).popover('hide');
		$(_this).popover('destroy');
		$(_this).popover({'placement':'top'});
		$(_this).attr('data-content',text);
		$(_this).popover('show');
		clearTimeout(timer);
		timer = setTimeout(function(){ 
				$(_this).attr('data-content','');
				$(_this).popover('hide');
				$(_this).popover('destroy');
		}, 5000);
}

function is_numeric(mixed_var) {
    var whitespace =
    " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    return (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -1)) && mixed_var !== '' && !isNaN(mixed_var);
}

$(document).on("click", ".calculate_printed", function(e) {
	var menuid =  $.trim($(this).parents('.productdetails').find('#productID').val());
	var categoryID =  $(this).parents('.productdetails').find('#categoryID').val();
	var association =  $(this).parents('.productdetails').find('#association').val();
	var available_in =  $(this).parents('.productdetails').find('#available_in').val();
	var labelspersheet =  $(this).parents('.productdetails').find('#labelspersheet').val();
	var labeltype = '4 Colour Digital Process';
	
	var min_qty = 200;
	var max_qty = 500000;
	var labels = labelspersheet;
	var unitqty =  'Labels';
	var material_adhesive = $(this).parents('.productdetails').find('#material_adhesive').val();
	var input_id = $(this).parents('.productdetails').find('.printedsheet_input');
	var _this = this;
	if(material_adhesive == '')
	{
		swal('Please Select Material & Adhesive');
		$("#material_adhesive").css({'border-color':'red'});
		return false;
	}
	$("#material_adhesive").css({'border-color':'#e5e5e5'});
	var qty =  input_id.val();
	var _this = this;
	if(unitqty == 'Labels'){
		 //var min_qty = parseInt(labels)*min_qty;
		 //var max_qty = parseInt(labels)*max_qty;
	}
	if(!is_numeric(qty) || qty=='' || qty < min_qty){
		   input_id.val(min_qty);
	       show_faded_popover(input_id, 'Quantity has been amended for production as '+min_qty+' labels.');
	}
	else if(qty > max_qty){
			input_id.val(max_qty);
			show_faded_popover(input_id, 'Quantity has been amended for production as '+max_qty+' labels.');
	}
	else{
		if(qty%labels != 0 && unitqty == 'Labels'){
				var multipyer = parseInt(labels) * parseInt(parseInt(qty/labels)+1);
				input_id.val(multipyer);
				var qty = multipyer;
		}
		
		if(unitqty == 'Labels'){
			//qty = parseInt(qty/labels);
		}
		
		$("#aa_loader").show();
		menuid=menuid+material_adhesive;
		$.ajax({
				url: base+'ajax/calculate_lba_prices',
				type:"POST",
				async:"false",
				dataType: "html",
				data:{
					menuid:menuid,
					qty: qty,
					labels: 1,
					material_adhesive:material_adhesive,
					labeltype:labeltype,
					categoryID:categoryID,
					available_in:available_in,
					association:association,
					},
				success: function(data){
				if(!data==''){	
					data = $.parseJSON(data); 
					if(data.response=='yes'){
						if(data.rollprices == "")
						{
							$(_this).parents('.productdetails').find('.roll_prices').hide();
						}
						else
						{
							data.rollprices = $.parseJSON(data.rollprices);
							$(_this).parents('.productdetails').find('.roll_prices').show();
							$(_this).parents('.productdetails').find('.roll_prices .lba-editor-price').html(data.symbol+data.rollprices.rawprice);
							$(_this).parents('.productdetails').find('.roll_prices .vatoption').text(data.vatoption);
							$(_this).parents('.productdetails').find('.roll_prices .labelprice').html(data.rollprices.labelprice);
							$(".roll_data").find(".rawprice").val(data.rollprices.rawprice);				
							$(".roll_data").find(".ManufactureID").val(data.ManufactureID_roll);				
							$(".roll_data").find(".ProductID").val(data.ProductID_roll);				
							$(".roll_data").find(".max_labels").val(data.MaxLabels_roll);	
							$(".roll_data").find(".category_description").val(data.category_description_roll);			
						}
						if(data.sheetprices == "")
						{
							$(_this).parents('.productdetails').find('.sheet_prices').hide();
						}
						else
						{
							data.sheetprices = $.parseJSON(data.sheetprices);
							$(_this).parents('.productdetails').find('.sheet_prices').show();
							$(_this).parents('.productdetails').find('.sheet_prices .lba-editor-price').html(data.symbol+data.sheetprices.rawprice);
							$(_this).parents('.productdetails').find('.sheet_prices .vatoption').text(data.vatoption);
							$(_this).parents('.productdetails').find('.sheet_prices .labelprice').html(data.sheetprices.labelprice);
							$(".sheet_data").find(".rawprice").val(data.sheetprices.rawprice);
							$(".sheet_data").find(".ManufactureID").val(data.ManufactureID_sheet);
							$(".sheet_data").find(".ProductID").val(data.ProductID_sheet);
							$(".sheet_data").find(".max_labels").val(data.MaxLabels_sheet);
							$(".sheet_data").find(".category_description").val(data.category_description_sheet);	
						}
						$(_this).parents('.productdetails').find('.calculate_button_wrapper').hide();
						$(_this).parents('.productdetails').find('.add_to_cart_wrapper').show();
						$("input[name='add_option']").attr('checked', false);
						$("#aa_loader").hide();
						}
					}
				 }
			});
	  }
});

$(document).on('focus','.printedsheet_input',function(e){
	$(this).parents('.productdetails').find('.add_to_cart_wrapper').hide();
	$(this).parents('.productdetails').find('.calculate_button_wrapper').show();
});
$(document).on('change','#material_adhesive',function(e){
	$(this).parents('.productdetails').find('.add_to_cart_wrapper').hide();
	$(this).parents('.productdetails').find('.calculate_button_wrapper').show();
});

$(document).on('click','.add_to_cart',function(e){
	var product_type = $("input[name='add_option']:checked").val();
	var qty = parseInt($("#printedsheet_input").val());
	var category_description = "";
	var cart_data = {};
	if(product_type == undefined)
	{
		swal("Please Select Product Type");
		return false;
	}
	else if(product_type == "Rolls")
	{
		var ManufactureID_roll = $(".roll_data").find('.ManufactureID').val();
		var ProductID_roll = $(".roll_data").find('.ProductID').val();
		var rawprice_roll = parseFloat($(".roll_data").find('.rawprice').val());
		var max_labels_roll = $(".roll_data").find('.max_labels').val();
		category_description = $(".roll_data").find(".category_description").val();
		if(ManufactureID_roll == '' || rawprice_roll == '' || rawprice_roll == 0)
		{
			swal({
				  title: "Out of Stock",
				  text: "Sorry, this product is currently out of stock",
				  type: "warning",
				  showCancelButton: false,
				  confirmButtonClass: "btn orangeBg",
				  confirmButtonText: "OK",
				  closeOnConfirm: true,
				},
				function(isConfirm) {
				  if (isConfirm) {
				  } 
		 	});
			return false;
		}
		else
		{
			cart_data.labels = qty;
			cart_data.menuid = ManufactureID_roll;
			cart_data.prd_id = ProductID_roll;
			cart_data.max_labels = max_labels_roll;
			cart_data.labelfinish = "No Finish";
			cart_data.printing = "6 Colour Digital Process";
			cart_data.presproof = "";
			cart_data.woundoption = "Outside";
			cart_data.orientation = 1;
			cart_data.type = "Rolls";
		}
	}
	else if(product_type == "Sheets")
	{
		var ManufactureID_sheet = $(".sheet_data").find('.ManufactureID').val();
		var rawprice_sheet = parseFloat($(".sheet_data").find('.rawprice').val());
		var ProductID_sheet = $(".sheet_data").find('.ProductID').val();
		var max_labels_sheet = $(".sheet_data").find('.max_labels').val();
		var category_description = $(".sheet_data").find(".category_description").val();
		var labels = $("#labelspersheet").val();
		
		if(ManufactureID_sheet == '' || rawprice_sheet == '' || rawprice_sheet == 0)
		{
			swal({
				  title: "Out of Stock",
				  text: "Sorry, this product is currently out of stock",
				  type: "warning",
				  showCancelButton: false,
				  confirmButtonClass: "btn orangeBg",
				  confirmButtonText: "OK",
				  closeOnConfirm: true,
				},
				function(isConfirm) {
				  if (isConfirm) {
				  } 
		 	});
			return false;
		}
		else
		{
			cart_data.labels = max_labels_sheet;
			cart_data.qty = qty = parseInt(qty/labels);
			cart_data.menuid = ManufactureID_sheet;
			cart_data.prd_id = ProductID_sheet;
			cart_data.labeltype = "Fullcolour";
			cart_data.menuid = ManufactureID_sheet;
		}
	}
	cart_data.source = "LBA";
	$.ajax({
		url: base+'ajax/add_products_incart',
		type:"POST",
		async:"false",
		dataType: "html",
		data: cart_data,
		success: function(data){
			if(!data==''){
				data = $.parseJSON(data); 
				if(data.response=='yes'){
					popup_messages('Printed Labels on '+product_type+' - '+category_description);
					$('#cart').html(data.top_cart);
					$('#lba_cart').html(data.bottom_cart);
				}
			}
		}  
	});
});

function update_header_login(username){
		var name = "<i class='fa fa-user'></i> Welcome "+username;
		$('#update_header').find(".userName").html(name);
		
		var dropdown = "<li class='MyAccount'><a href='<?=SAURL?>users/user_orders/'>Easy Re-Order</a></li>";
		dropdown += "<li class='ReOrder'><a href='<?=SAURL?>users/'>My Account</a></li>";
		dropdown += "<li class='LogOut'><a href='<?=SAURL?>users/logout/'>Logout</a></li>";
		$('.loginRegister').find("ul.dropdown-menu").html(dropdown);
	}
</script> 