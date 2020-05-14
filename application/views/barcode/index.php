<style>
table {
	width: 100%;
}
thead, tbody, tr, td, th {
	display: block;
}
tr:after {
	content: ' ';
	display: block;
	visibility: hidden;
	clear: both;
}
tbody {
	height: 300px;
	overflow-y: auto;
}
tbody td, thead th {
	width: 19.2%;
	float: left;
}
table tr td:first-child {
	width: 30%;
}
table tr td:last-child {
	width: 70%;
}
</style>
<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">Barcode & QR Generator</li>
      </ol>
    </div>
  </div>
</div>
<div class="barcodebg printed-lba-a4 ">
  <div class="container ">
    <div class="col-md-8 col-sm-8">
      <h1>Barcode & QR Generator</h1>
      <p class="text-justify">Using our free barcode and QR generator you can create tracking codes for your product labels and customer links for compliance and improved customer communication outcomes. Select from 14 different barcode formats  for product manufacture, inventory control, mailings and other informational purposes. Alternatively create your own QR codes. This App generates QR Codes from free text, URLs, phone numbers, SMS messages, or contacts (vCard). Whether for Barcodes or QR codes, select the required format, enter your information to generate your code, download and save to apply to your labels.</p>
      <p class="row"> <span class="col-md-6 col-sm-6">Barcode Generator <a style="cursor: pointer;color: #ffdcd2;font-style: italic;" data-toggle="modal" data-target=".barcode_popup">read more</a></span> <span class="col-md-6 col-sm-6">QR Generator <a style="cursor: pointer;color: #ffdcd2;font-style: italic;" data-toggle="tooltip-product" data-placement="bottom" data-original-title="A QR code is a two-dimensional barcode that is readable by smartphones. It allows to encode over 4000 Characters in a two dimensional barcode. QR codes may be used to display text to the user, to open a URL, save a contact to the address book or to compose text messages. To read QR codes with your smartphone, you need an appropriate software installed on your phone. For Android-based devices, you can use Barcode Scanner for example. Just search for it in the market. On iOS-Devices like iPhones, there are also QR Code readers available on the AppStore, for Example i-nigma. On Symbian devices, you can use Mobiletag barcodes reader for example.">read more</a></span></p>
    </div>
    <div class="col-md-4 col-sm-4 "> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/barcode.png" alt="Barcode Generator"> </div>
  </div>
</div>



  <? include('main.php');?>

<div class="printed-lba-call ">
  <div class="container ">
    <div class="col-md-8 col-sm-7 col-lg-9">
      <h2>INFORMATION &amp; ADVICE <br>
        <small>We’re here to help you chose the label that’s right for you.</small></h2>
      <p class="text-justify">If you need assistance or advice on which format you require for your label and product application. Please contact our customer care team via the live-chat facility on the page, our website contact form, telephone, or email and they will be happy to discuss your requirements.</p>
    </div>
    <div class="col-md-4 col-sm-5 col-lg-3"> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/call_opr_1.png" alt="Customer Support"> </div>
  </div>
</div>
<div class="modal fade barcode_popup aa-modal in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Barcode Generator</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <p style="font-size:14px !important;">A barcode is the small image of lines (bars) and spaces that is affixed to retail store items, identification cards, and postal mail to identify a particular product number, person, or location. The code uses a sequence of vertical bars and spaces to represent numbers and other symbols. A bar code symbol typically consists of five parts: a quiet zone, a start character, data characters (including an optional check character), a stop character, and another quiet zone.</p>
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width:30%">Barcode Standard</th>
                <th style="width:70%">Uses</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Uniform Product Code (UPC)</td>
                <td>Universal product code seen on almost all retail products in the USA and Canada. </td>
              </tr>
              <tr>
                <td>UPC-E</td>
                <td>Compressed version of UPC code for use on small products.</td>
              </tr>
              <tr>
                <td>European Article Number (EAN-13)</td>
                <td>European Article Numbering international retail product code.</td>
              </tr>
              <tr>
                <td>EAN-8</td>
                <td>Compressed version of EAN code for use on small products.</td>
              </tr>
              <tr>
                <td>Code 39</td>
                <td>The standard for many government barcode specifications. Also known as USD-3 and 3 of 9.</td>
              </tr>
              <tr>
                <td>Code 128</td>
                <td>Very capable code with excellent density and reliability. Often selected over Code 39 because of its density and larger selection of characters.</td>
              </tr>
              <tr>
                <td>POSTNET</td>
                <td>The PostNet barcode is used by the United States Postal Service to automatically sort mail.</td>
              </tr>
              <tr>
                <td>Interleaved 2 of 5</td>
                <td>Widely used in warehouse and industrial applications. The data must consist of an even number of digits.</td>
              </tr>
              <tr>
                <td>EAN-2</td>
                <td>The EAN-2 is a supplement to the EAN-13 and UPC-A barcodes. It is often used on magazines and periodicals to indicate an issue number.</td>
              </tr>
              <tr>
                <td>Identcode</td>
                <td>This code is mainly used by the Deutsche Post AG (DHL). The encoding pattern of this code is Interleaved 2 of 5, but with a different check digit</td>
              </tr>
              <tr>
                <td>ITF-14</td>
                <td>ITF-14 symbols are generally used on packaging levels of a product. The ITF-14 will always encode 14 digits</td>
              </tr>
              <tr>
                <td>Postal Alpha Numeric Encoding Technique</td>
                <td>The Postal Alpha Numeric Encoding Technique (PLANET) barcode was used by the US Postal Service to identify and track pieces of mail during delivery.</td>
              </tr>
              <tr>
                <td>Royal Mail 4-State Customer Code</td>
                <td>RM4SCC (Royal Mail 4-State Customer Code) is the name of the barcode symbology used by the Royal Mail for its Cleanmail service.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
