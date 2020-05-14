<style type="text/css">
.labels-form .row {
	margin: 10px 0px;
}
.barcode_sec h3 {
	color: #17b1e3 !important;
}
.barcode_sec {
	border-bottom: 1px dashed #c7c7c7;
	border-left: 0;
	border-right: 0;
	padding: 20px 0 !important;
}
.barcode_sec.qr {
	border-top: 1px dashed #c7c7c7;
}
.barcode_sec p {
	font-size: 12px;
}
#barcode_result img {
	padding-top: 0px;
	max-width: 100%;
}
#bcode_image {
	max-width: 100%;
}
.barcode_result_div {
	visibility: hidden;
}
.tooltip-inner {
	text-align: justify;
	padding: 7px 7px;
	background: #fff8dc;
	color: #1b1b1b;
	opacity: 1;
	box-shadow: 3px 3px 3px rgba(0,0,0,.3);
	text-shadow: none;
}
.tooltip.bottom .tooltip-arrow {
	border-bottom-color: #fff8dc;
}
.tooltip.in {
	opacity: 1;
}

.barcodebg {
    background-image: url(<?=Assets?>images/header/bar-code-bg.jpg);
    background-position: center top;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 20px 0 0;
    text-shadow: 2px 2px 0 rgba(150, 150, 150, 0.32);
}
.printed-lba-a4 h1 {
    color: #fff;
    font-size: 26px;
    font-weight: bold;
}
</style>
<div class="bgGray">
  <div class="container">
    <nav class="prLbSteps-nav">
      <ul>
        <li class="col-sm-4 col-xs-12 no-padding prLbSteps-step-active prLbSteps-step-selected"> <a class="col-xs-12 no-padding show_barcode" tabindex="-1">
          <div class="col-xs-2 no-padding-left"><span class="cnt">1</span></div>
          <div class="col-xs-9 no-padding stepText"> Barcode Generator </div>
          </a> </li>
        <li class="col-sm-4 col-xs-12 no-padding prLbSteps-step-active"> <a class="col-xs-12 no-padding show_qr" tabindex="-1">
          <div class="col-xs-2 no-padding-left"><span class="cnt">2</span></div>
          <div class="col-xs-10 no-padding stepText"> QR Generator </div>
          </a> </li>
      </ul>
    </nav>
    <div id="barcode_section">
      <div class=" thumbnail">
        <form class="labels-form form-horizontal" id="barcode_form">
          <div class="col-sm-6 m-t-10">
            <div class="bgBlueHeading">
              <div class="f-16"> Choose a Barcode Type:</div>
            </div>
            <div class="borderPanel">
              <div class="m-t-15">
                <div class="p-l-r-10">
                  <div class="barcode_sec select_type">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" id="barcode_type" value="upca" data-title="UPC-A" data-example="012345678905" data-text="Universal product code seen on almost all retail products in the USA and Canada" data-max="11">
                          <i></i> <span>UPC-A</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" id="barcode_type" value="upce" data-title="UPC-E" data-example="01234565" data-text="Compressed version of UPC code for use on small products." data-max="7">
                          <i></i> <span>UPC-E</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" id="barcode_type" value="ean13" data-title="EAN-13" data-example="012345678905" data-text="European Article Numbering international retail product code." data-max="12">
                          <i></i> <span>EAN-13</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" id="barcode_type" value="ean8" data-title="EAN-8" data-example="01234565" data-text="Compressed version of EAN code for use on small products." data-max="7">
                          <i></i> <span>EAN-8</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" id="barcode_type" value="code39" data-title="Code 39" data-example="ABC123" data-text="The standard for many government barcode specifications. Also known as USD-3 and 3 of 9." data-max="20">
                          <i></i> <span>Code 39</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" id="barcode_type" value="code128" data-title="Code 128" data-example="ABxy12$" data-text="Very capable code with excellent density and reliability. Often selected over Code 39 because of its density and larger selection of characters." data-max="20">
                          <i></i> <span>Code 128</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="postnet" data-title="PostNet" data-example="327503" data-text="The PostNet barcode is used by the United States Postal Service to automatically sort mail." data-max="11">
                          <i></i> <span>PostNet</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="interleaved" data-title="Interleaved 2 of 5" data-example="0123456789" data-text="Widely used in warehouse and industrial applications. The data must consist of an even number of digits." data-max="20">
                          <i></i> <span>Interleaved 2 of 5</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="ean2" data-title="EAN-2" data-example="36" data-text="The EAN-2 is a supplement to the EAN-13 and UPC-A barcodes. It is often used on magazines and periodicals to indicate an issue number." data-max="2">
                          <i></i> <span>EAN-2</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="ean5" data-title="EAN-5" data-example="12345" data-text="The EAN-5 is a supplement to the EAN-13 barcode used on books. It is used to give a suggestion for the price of the book." data-max="5">
                          <i></i> <span>EAN-5</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="identcode" data-title="Identcode" data-example="12321456987" data-text="This code is mainly used by the Deutsche Post AG (DHL). The encoding pattern of this code is Interleaved 2 of 5, but with a different check digit" data-max="11">
                          <i></i> <span>Identcode</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="itf14" data-title="ITF-14" data-example="9562473014365" data-text="ITF-14 symbols are generally used on packaging levels of a product. The ITF-14 will always encode 14 digits" data-max="13">
                          <i></i> <span>ITF-14</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="planet" data-title="PLANET" data-example="1249563087153" data-text="The Postal Alpha Numeric Encoding Technique (PLANET) barcode was used by the US Postal Service to identify and track pieces of mail during delivery" data-max="13">
                          <i></i> <span>PLANET</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="barcode_type" value="royalmail" data-title="RM4SCC" data-example="5733062519487" data-text="RM4SCC (Royal Mail 4-State Customer Code) is the name of the barcode symbology used by the Royal Mail for its Cleanmail service" data-max="13">
                          <i></i> <span>RM4SCC</span> </label>
                      </div>
                    </div>
                    <p class="error_type text-danger"></p>
                  </div>
                  <div class="col-md-12 col-xs-12 barcode_sec">
                    <div class="col-md-9">
                      <h3 class="bcode_title">UPC-A</h3>
                      <p class="bcode_text">Universal product code seen on almost all retail products in the USA and Canada.</p>
                    </div>
                    <div class="col-md-3 text-center"> <strong>Example:</strong><br>
                      <img onerror='imgError(this);' src="<?=Assets?>images/barcode_examples/upca.png" id="bcode_image" alt="UPCA Barcode"/> </div>
                  </div>
                  <div class="col-md-12 col-xs-12 barcode_sec">
                    <div class="">
                      <label for="barcode_data" class="col-sm-3 control-label">Barcode Data: </label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="barcode_data" maxlength="30">
                        <strong>Example: <span class="example-format">0123456789</span></strong>
                        <p class="error_data_qr text-danger"></p>
                        <div id="error_message" class="alert-danger m-t-10 p-l-r-15" style="display:none;"><i class="fa fa-times"></i> <span></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12 barcode_sec">
                    <div class="">
                      <label for="barcode_size" class="col-sm-3 control-label">Barcode Size: </label>
                      <div class="col-sm-6">
                        <select class="form-control" name="barcode_size" id="barcode_size">
                          <option value="">Select Size</option>
                          <option value="small">Small</option>
                          <option value="medium">Medium</option>
                          <option value="large">Large</option>
                        </select>
                        <p class="error_size text-danger"></p>
                      </div>
                    </div>
                  </div>
                  <div>
                    <button style="margin:13px 0;" type="button" class="btn form-control orange text-uppercase generate_barcode">Generate Barcode &nbsp; <i class="fa fa-arrow-circle-right"></i> </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="col-sm-6 m-t-10">
          <div class="bgBlueHeading  ">
            <div class="f-16"> Barcode </div>
          </div>
          <div class="borderPanel">
            <div class="m-t-15">
              <div class="p-l-r-10">
                <div class="text-center barcode_result_div height-qr"  >
                  <div id="aa_loader" class="white-screen" style=" display:none;">
                    <div class="loading-gif text-center" style="z-index:150;left: 30%;top: 20%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px; " alt="AA Labels Loader"> </div>
                  </div>
                  <div id="barcode_result"> <img onerror='imgError(this);' class="center-block img-responsive" src="" alt="Barcode"/> <a href="" style="margin:13px 0;" type="submit" data-role="button" class="btn orange text-uppercase" download="barcode.png">Download Barcode &nbsp; <i class="fa fa-arrow-circle-down"></i> </a> </div>
                </div>
              </div>
            </div>
          </div>
           <div class=" m-t-20">
               <img onerror='imgError(this);' class="center-block img-responsive" src="<?=Assets?>images/header/barcode-printer.jpg" alt="Barcode Printer"/>
            </div>
           
           <p class=" m-t-20">This is a free service and does not include any guarantee or technical support for barcodes or QR's. Which are also general and not unique codes. Users should always seek advice regarding the replication of unique codes.</p>
          
        </div>
      </div>
    </div>
    <div id="qr_section" style="display:none">
      <div class=" thumbnail">
        <form class="labels-form form-horizontal" id="qr_form">
          <div class="col-sm-6 m-t-10">
            <div class="bgBlueHeading">
              <div class="f-16"> Choose a Content Type:</div>
            </div>
            <div class="borderPanel">
              <div class="m-t-15   ">
                <div class="p-l-r-10">
                  <div class="qr_sec select_type_qr">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="qrcode_type" id="qrcode_type" value="contact_info">
                          <i></i> <span>Contact Information</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="qrcode_type" id="qrcode_type" value="sms">
                          <i></i> <span>SMS</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="qrcode_type" id="qrcode_type" value="email" data-title="Email" data-example="myname@mydomain.com">
                          <i></i> <span>Email Address</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="qrcode_type" id="qrcode_type" value="plain_text" data-title="Plain Text" data-example="This is a demo text">
                          <i></i> <span>Plain Text</span> </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="qrcode_type" id="qrcode_type" value="phone" data-title="Phone" data-example="(000)-000-0000">
                          <i></i> <span>Phone Number</span> </label>
                      </div>
                      <div class="col-md-6">
                        <label class="radio" style="font-size:12px; text-align:justify !important;">
                          <input type="radio" class="textOrange validate-required" name="qrcode_type" id="qrcode_type" value="url" data-title="URL" data-example="http://www.example.com">
                          <i></i> <span>URL</span> </label>
                      </div>
                    </div>
                    <p class="error_type_qr text-danger"></p>
                  </div>
                  <div class="col-md-12 col-xs-12 barcode_sec qr plain_text" style="">
                    <div class="">
                      <label for="qr_data" class="col-sm-3 control-label">Plain Text: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="qr_data">
                        <strong>Example:</strong> <span class="example-format">Ths is the demo text</span>
                        <p class="error_data_qr text-danger"></p>
                        <div class="error_message_qr alert-danger m-t-10 p-l-r-15" style="display:none;"><i class="fa fa-times"></i> <span></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12 barcode_sec qr contact_info" style="display:none">
                    <div class="error_message_qr alert-danger p-l-r-15 m-b-30" style="display:none;"><i class="fa fa-times"></i> <span></span></div>
                    <div class="form-group">
                      <label for="contact_name" class="col-sm-3 control-label">Name: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_name">
                        <p class="error_data_qr text-danger"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_company" class="col-sm-3 control-label">Company: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_company">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_number" class="col-sm-3 control-label">Phone Number: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_number">
                        <p class="error_data_qr text-danger"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_email" class="col-sm-3 control-label">Email: </label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control" id="contact_email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_address" class="col-sm-3 control-label">Street Address: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_city" class="col-sm-3 control-label">City: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_city">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_state" class="col-sm-3 control-label">State: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_state">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_zip" class="col-sm-3 control-label">Zip Code: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_zip">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_website" class="col-sm-3 control-label">Website: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_website">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_notes" class="col-sm-3 control-label">Notes: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_notes">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12 barcode_sec qr sms_qr" style="display:none">
                    <div class="form-group">
                      <label for="sms_number" class="col-sm-3 control-label">Number: </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="sms_number">
                        <p class="error_data_qr text-danger"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="qr_message" class="col-sm-3 control-label">Message: </label>
                      <div class="col-sm-7">
                        <textarea class="form-control" id="sms_body"></textarea>
                        <p class="error_data_qr text-danger"></p>
                        <div class="error_message_qr alert-danger m-t-10 p-l-r-15" style="display:none;"><i class="fa fa-times"></i> <span></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12 barcode_sec">
                    <div class="">
                      <label for="qr_size" class="col-sm-3 control-label">QR Code Size: </label>
                      <div class="col-sm-7">
                        <select class="form-control" name="qrcode_size" id="qrcode_size">
                          <option value="">Select Size</option>
                          <option value="small">Small</option>
                          <option value="medium">Medium</option>
                          <option value="large">Large</option>
                        </select>
                        <p class="error_size_qr text-danger"></p>
                      </div>
                    </div>
                  </div>
                  <div>
                    <button style="margin:13px 0;" type="button" class="btn  orange text-uppercase generate_qr">Generate QR Code &nbsp; <i class="fa fa-arrow-circle-right"></i> </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="col-sm-6 m-t-10">
          <div class="bgBlueHeading  ">
            <div class="f-16">QR Code</div>
          </div>
          <div class="borderPanel">
            <div class="m-t-15">
              <div class="p-l-r-10">
                <div class="text-center barcode_result_div height-qr">
                  <div id="aa_loader_qr" class="white-screen" style=" display:none;">
                    <div class="loading-gif text-center" style="z-index:150;left: 30%;top: 20%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px;" alt="AA Labels Loader"> </div>
                  </div>
                  <div id="qr_result"> <img onerror='imgError(this);' class="center-block img-responsive" src="" alt="Download Barcode"/> <a href="" style="margin:13px 0;" type="submit" data-role="button" class="btn orange text-uppercase" download="barcode.png">Download QR Code &nbsp; <i class="fa fa-arrow-circle-down"></i> </a> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="m-t-10"><img onerror='imgError(this);' class="center-block img-responsive" src="<?=Assets?>images/header/barcode-printer.jpg" alt="Barcode Generator"/></div>
          
          
          
        </div>
      </div>
    </div>
    <!--end qr--> 
  </div>
</div>

<script>
$(document).ready(function() {
	$('[data-toggle="tooltip-product"]').tooltip();
});
$(document).on("click",".show_barcode",function(e){
	$(".show_barcode").parent("li").addClass("prLbSteps-step-selected");
	$(".show_qr").parent("li").removeClass("prLbSteps-step-selected");
	
	$("#barcode_section").show();
	$("#qr_section").hide();
});

$(document).on("click",".show_qr",function(e){
	$(".show_qr").parent("li").addClass("prLbSteps-step-selected");
	$(".show_barcode").parent("li").removeClass("prLbSteps-step-selected");
	
	$("#qr_section").show();
	$("#barcode_section").hide();
});


/* BARCODE START*/
$("#barcode_form").submit(function(e) {
    $(".generate_barcode").click();
	e.preventDefault();
});
$("input[name=barcode_type]").on("change",function(e){
	$(".select_type").removeClass("has-error");
	$(".error_type").text(" ");
	
	var sel = $('input[name=barcode_type]:checked');
	
	$(".bcode_title").text(sel.data("title"));
	$(".example-format").text(sel.data("example"));
	$(".bcode_text").text(sel.data("text"));
	$("#barcode_data").attr("maxlength",sel.data("max"));
	$("#barcode_data").val('').focus();
	
	
	var image = '<?=Assets?>images/barcode_examples/'+sel.val()+'.png';
	$("#bcode_image").attr("src",image);
});

$(document).on("click",".generate_barcode",function(e){
	
	$(".select_type").removeClass("has-error");
	$('#barcode_data').removeClass("error");
	$("#barcode_size").parent().removeClass("has-error");
	$(".error_type, .error_data, .error_size").text(" ");
	$("#error_message").hide();
	
	var type = $('input[name=barcode_type]:checked').val();
	var data = $('#barcode_data').val();
	var size = $('#barcode_size').val();
	var error = false;
	
	if(type == undefined)
	{
		$(".select_type").addClass("has-error");	
		$(".error_type").text("This field is required");
		error = true;
		alert_box('Please check the form again');

	}
	if(data == "")
	{
		$("#barcode_data").addClass("error");
		$(".error_data").text("This field is required");
		error = true;
		alert_box('Please check the form again');
	}
	if(size == "")
	{
		$('#barcode_size').parent().addClass("has-error");
		$(".error_size").text("This field is required");
		error = true;
		alert_box('Please check the form again');
	}
	
	if(!error)
	{
		$("#aa_loader").show();
		$.ajax({
				url: base+'barcode/generate_barcode',
				type:"POST",
				async:"false",
				dataType: "html",
				data:{
					type: type,
					data: data,
					size: size
					},
				success: function(data){
					d = new Date();
					data = $.parseJSON(data);
					$("#aa_loader").hide();
					if(data.response=='yes'){
						var imageurl = "<?=Assets?>images/barcodes/generated_barcode.png?"+d.getTime();
						$("#barcode_result img").attr("src",imageurl);
						$("#barcode_result a").attr("download",data.file_name);
						$("#barcode_result a").attr("href",imageurl);
						
						$(".barcode_result_div").removeClass("barcode_result_div");
						$("#aa_loader").hide();
						$('html, body').animate({ scrollTop: $('#barcode_form').height()+500 }, 500);
					}
					else
					{
						$("#error_message span").text(data.message);
						$("#error_message").show();
					}
				}
		});
	}
});
/* END BARCODE */

/* START QR CODE */
$("#qr_form").submit(function(e) {
    e.preventDefault();
	$(".generate_qr").click();
	
});
$("input[name=qrcode_type]").on("change",function(e){
	$(".select_type_qr, .sms_qr").removeClass("has-error");
	$(".error_type_qr").text(" ");
	
	var sel = $('input[name=qrcode_type]:checked');
	var title = sel.data("title");
	var example = sel.data("example");
	
	$("#qr_data").val('');
	$("#qr_data").focus();
	
	var type = sel.val();
	
	if(type == "contact_info")
	{
		$(".contact_info").show();
		$(".sms_qr").hide();
		$(".plain_text.qr").hide();
	}
	else if(type == "sms")
	{
		$(".sms_qr").show();
		$(".plain_text.qr").hide();
		$(".contact_info").hide();		
	}
	else if(type == "email" || type == "plain_text" || type == "phone" || type == "url")
	{
		$("label[for='qr_data']").text(title+":");
		$(".example-format").text(example);
		$(".plain_text.qr").show();
		$(".sms_qr").hide();
		$(".contact_info").hide();
	}
	

});
$(document).on("click",".generate_qr",function(e){
	$(".select_type_qr, .sms_qr").removeClass("has-error");
	$("#qrcode_size").parent().removeClass("has-error");
	$("#qr_data, #contact_number, #contact_name").removeClass("error");
	$(".error_message_qr").hide();
	$(".error_type_qr, .error_data_qr, .error_size_qr").text(" ");
	
	var sms = $("#sms_body").val();
	var number = $("#sms_number").val();;
	
	var type = $('input[name=qrcode_type]:checked').val();
	var size = $('#qrcode_size').val();
	var data = $('#qr_data').val();
	
	/*CONTACT INFORMATION VALUES */
	
	var contact_name = $("#contact_name").val();
	var contact_company = $("#contact_company").val();
	var contact_number = $("#contact_number").val();
	var contact_email = $("#contact_email").val();
	var contact_address = $("#contact_address").val();
	var contact_city = $("#contact_city").val();
	var contact_state = $("#contact_state").val();
	var contact_zip = $("#contact_zip").val();
	var contact_website = $("#contact_website").val();
	var contact_notes = $("#contact_notes").val();
	
	var error = false;
	
	if(type == "sms")
	{
		if(sms == "" || number == "")
		{
			$(".sms_qr").addClass("has-error");	
			error = true;
			alert_box('Please check the form again');
		}
		data = "no";
	}
	else if(type == "contact_info")
	{
		data = "no";
		if(contact_name == "")
		{
			$("#contact_name").addClass("error");
		}
		
		if(contact_number == "")
		{
			$("#contact_number").addClass("error");
		}
	}
	
	if(type == undefined)
	{
		$(".select_type_qr").addClass("has-error");	
		$(".error_type_qr").text("This field is required");
		error = true;
		alert_box('Please check the form again');
	}
	if(data == "")
	{
		$("#qr_data").addClass("error");
		$(".error_data_qr").text("This field is required");
		error = true;
		alert_box('Please check the form again');
	}
	if(size == "")
	{
		$('#qrcode_size').parent().addClass("has-error");
		$(".error_size_qr").text("This field is required");
		error = true;
		alert_box('Please check the form again');
	}
	
	if(!error)
	{
		$("#aa_loader,#aa_loader_qr").show();
		$.ajax({
				url: base+'barcode/generate_qrcode',
				type:"POST",
				async:"false",
				dataType: "html",
				data:{
					type: type,
					data: data,
					size: size,
					sms:sms,
					number: number,
					contact_name:contact_name,
					contact_company:contact_company,
					contact_number:contact_number,
					contact_email:contact_email,
					contact_address:contact_address,
					contact_city:contact_city,
					contact_state:contact_state,
					contact_zip:contact_zip,
					contact_website:contact_website,
					contact_notes:contact_notes,
					},
				success: function(data){
					d = new Date();
					data = $.parseJSON(data);
					$("#aa_loader,#aa_loader_qr").hide();
					if(data.response=='yes'){
						var imageurl = "<?=Assets?>images/barcodes/generated_qrcode.png?"+d.getTime();
						$("#qr_result img").attr("src",imageurl);
						$("#qr_result a").attr("download",data.file_name);
						$("#qr_result a").attr("href",imageurl);
						
						$(".barcode_result_div").removeClass("barcode_result_div");
						$("#aa_loader,#aa_loader_qr").hide();
						$('html, body').animate({ scrollTop: $('#barcode_form').height()+500 }, 500);
					}
					else
					{
						$(".error_message_qr span").text(data.message);
						$(".error_message_qr").show();
						error = true;
						$('html, body').animate({ scrollTop: $('#barcode_form').height()+500 }, 500);
					}
				}
		});
	}
});
/* END QR CODE */

</script>