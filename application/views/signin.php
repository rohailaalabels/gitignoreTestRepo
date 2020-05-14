<style>
 .email-address-password-incorrect-alert-user{
    background:
#fbe3e4;
text-align: center;
border-radius: 4px;
margin-top: 0px;
margin-bottom: 10px;
padding: 9px;
font-size: 13px;
color:
#ff000b;
}
#main_throttle_signin{
    margin-top: 35px;
}
</style>
<div class="">
<div class="container m-t-b-8 ">
<div class="col-md-8">
<ol class="breadcrumb  m0">
  <li><a href="#"><i class="fa fa-home"></i></a></li>
  
  <li class="active">Sign In</li>
</ol>
</div>

</div>
</div>
<div class="signinBg text-center">
 <div class="container">
            <h1>Sign in</h1>
            <p>customercare@aalabels.com</p>
        </div>
    </div>
<div class="bgGray">
<div class="container">


 		

<div class=" thumbnail">
<div >
		 <? if(isset($msg) and $msg!=''){?>
                
                      <div class="alert alert-block alert-<?=$class?> fade in">
                            <button class="close cross-button" type="button" data-dismiss="alert"> × </button>
                            <p class="m-l-10"><?=$msg?></p>
                        </div>
                    
		  <? }?>


                    
           <div class="  ">
                 <form class="labels-form" id="login_form" method="post" action=""> 
                  <input type="hidden" name="page" value="login"  />    
                        <div class="col-sm-6 m-t-10">
                            
                                <div class="bgBlueHeading  ">
                                	<div class=" f-16 "> Login your account </div>
                                </div>
                                <div class="borderPanel"> 
                                
                                    <div class="m-t-15">
                                          <div class="p-l-r-10">
                                               <div style="display: none;" class=" email-address-password-incorrect-alert-user">
                                        <span class="error">Your user email ID or password is incorrect.</span>
                                    </div>
                                            <!--<label id="server_error" style=" display:none;" class="error" ></label>-->
                                          
                                              <div class=" ">
                                              <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input type="email" placeholder="Enter Email address" name="email" id="email" class="required" required >
                                              </label>
                                              </div> 
                                         <div class=" ">
                                         <label class="input">
                                         <i class="icon-append fa fa-lock"></i>
                                         <input type="password" placeholder="Enter Password" name="password" id="password" class="required" required >
                                         </label>
                                         </div>
                                            <div class=" ">
                                                <label class="pull-right">
                                                <a class="TextGray" href="<?=SAURL?>users/forgotpassword/">Forgot Your Password ?</a> </label>
                                            </div>
                                            
                                            
                                            
                                            
                                           <div id="main_throttle_signin">
                                                  <div class="email-address-password-incorrect-alert-user">
                                                      <div class="row">

                                                          <div class="_3hYZM">
                                                             <b><h5 class="line-height-normal" data-test="message-title">  Please reset your password</h5></b>
                                                              <div data-test="message-body">
                                                                  <p>
                                                                      <span class="line-height-normal">This account is locked due to a number of failed attempts to sign in.</span>
                                                                      <a href="<?= AURL ?>users/forgotpassword/" data-test="forgot-password-link">
                                                                          <span>Please reset your password</span>
                                                                      </a>
                                                                  </p>
                                                              </div>
                                                          </div>
                                                      </div>

                                                  </div>
                                              </div> 
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-12 col-xs-12 ">
                                            <label class="checkbox" style="font-size:12px; text-align:justify !important;">
                                            	  <input type="checkbox" class="textOrange validate-required" name="newsletter_val" >
                                                  <i></i> <span >I would like to receive newsletters and information on offers and discount vouchers to the email address provided. In agreeing to receive communication from time-to-time, AA Labels assures you that your contact details will remain confidential and will not be shared with any third-party. </span> 
                                            </label>	
                                            </div>
                                            <div>
                                          
                                               <button  style="margin:13px 0; " type="submit" class="btn  orange text-uppercase ">Sign in &nbsp; &nbsp; 
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
                <div class="  f-16"> Create An Account </div>
                </div>
                <div class="borderPanel"> 
                <div class="m-t-15">
                  <div class="p-l-r-10">
                  <div class="text-center">
                  <h4 class="Textblack">Register an account with AA Labels</h4><br>
                <br>
                  <img onerror='imgError(this);' class="m-t-15" src="<?=Assets?>images/logo.png" alt="" > </div>
                 <div style="margin-top: 69px">
                                 <label class="pull-right">
                                 <i class="fa fa-5x fa-user-plus cBlue"></i> </label>
                    </div>
                  <div>
                     <a href="<?=SAURL?>users/signup/" style="margin:12px 0 11px 0; " class="btn orange text-uppercase m-t-30">
                            Sign up now &nbsp; &nbsp; <i class="fa fa-arrow-circle-right"></i> 
                     </a>
                     </div>
                 
                    </div>
                  </div>
               </div>   
            </div>
          </div>

      </div>                
    </div>
  </div>
</div>


<script>
	$(document).ready(function() {

        // var count = 1;
        $('#main_throttle_signin').hide();

		  var form = $("#login_form");
		 	  form.validate({ errorPlacement: function errorPlacement(error, element) { element.after(error); },
		 	  submitHandler: function(form) {
                  if ($('#email').val() === "" || $('#password').val() === "") {
                      $('.email-address-password-incorrect-alert-user').show();
                  }
				 	$.post(base+'ajax/user_login', $("#login_form").serialize(), function(data) {
							if(data.response=='error'){

                                if (data.remaining_time !== 0 && data.remaining_time !== null) {
                                    timer2 = data.remaining_time;

                                    $('#main_throttle_signin').show();
                                    $('#login_height').css("min-height","291px");

                                } else {
                                    $('#main_throttle_signin').hide();
                                    $('#login_height').css("min-height","208px");

                                }



                                $('.email-address-password-incorrect-alert-user').css("display","block");

									
									<? if(SITE_MODE=='live'){?>
										dataLayer.push({'event': 'user-login-fail'});
									<? } ?>
									
							}else{
							    
							            <? if(SITE_MODE=='live'){?>
										      dataLayer.push({'event': 'user-login-success','user-id':+data.userid  });
									    <? } ?>
									
										if(data.url){
											window.location.href=data.url;
										}else{
											window.location.href=base+'users/user_account';
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