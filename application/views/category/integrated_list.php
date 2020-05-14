<link href="<?=Assets?>labelfinder/css/filters.css" rel="stylesheet">
<script src="<?=Assets?>labelfinder/js/jquery-ui.js"></script>
<!--<script src="<?=Assets?>labelfinder/js/labelfinder.js?ver=<?=time()?>"></script>-->
<script src="<?=Assets?>dropzone/dropzone.js"></script>
<link rel="stylesheet" href="<?=Assets?>dropzone/dropzone.css">
<style type="text/css">
.mat-sep-2017 .selected-product .pr-detail {
	font-size: 14px;
}
.mat-sep-2017 .selected-product .pr-detail .req-links {
	margin-top: 5px;
}
.mat-may-2017 section article.mat-detail .specs .comp {
	margin-left: 0px;
	margin-top: 30px;
}
.mat-may-2017 section article.mat-tabs .ofq .main-box {
	padding-top: 10px;
	padding-bottom: 10px;
}
.mat-may-2017 section article.mat-tabs .ofq {
	margin-top: 160px;
}
.color_orange {
	color: #fd4913;
}
.final_price {
	text-align: right;
}
.final_price b {
	font-size: 26px;
	display: block;
}
.save_text, .save_text span {
	color: #fd4913;
	font-weight: bold;
	font-size: 16px !important;
}
.mat-may-2017 section article.mat-detail .pr-detail {
/*height: 150px;*/
}
.final_price b {
	font-size: 24px !important;
}
.why-seal img {
	margin: 0 auto;
}
.mat-may-2017 section article.mat-detail .specs .comp a .fa {
	color: #337ab7;
}
.thumbnail h4, .volume_break_section h4 {
	font-size: 16px !important;
	color: #006da4;
	font-weight: bold;
}
.volume_breaks tr th {
	text-align: center;
}
.volume_break_section {
	width: 90%;
	margin: 0 auto;
	text-align: center;
}
.mat-ch {
	border: 0;
	/*border-bottom: 5px solid #e0e0e0;*/
	border-bottom: 0;
}
.mat-may-2017 section article.mat-detail .specs img {
	margin: 0 auto;
}
.mat-may-2017 section article.mat-detail .specs a.technical_specs {
	top: 0px;
}
.aa-modal .panel-body img.thumb-arrow {
	right: auto;
}
.price-btn {
	margin-bottom: 10px;
	margin-right: 10px;
}
.volume_breaks th {
	vertical-align: middle !important;
}
.integrated_tabs img {
	width: 120px;
}
.integrated_tabs a {
	font-weight: 600;
	font-size: 15px;
	color: #222 !important;
	background-color: #d6d6d6 !important;
	border-radius: 0 !important;
}
.integrated_tabs a:hover, .integrated_tabs a:focus {
	background-color: #e8e8e8 !important;
}
.integrated_tabs .tab-content {
	border: 1px solid #ddd;
	padding: 5px;
}
.bggreyThead th {
}
.integrated_tabs th, .integrated_tabs td {
	border-bottom-width: 1px !important;
}
.table-responsive {
	border-radius: 0;
}
.integrated_tabs .nav-tabs {
	border-bottom: 0 !important;
}
.nav-tabs > li > a:hover {
	border-color: transparent;
}
.integrated_tabs small {
	display: block;
	font-weight: 400;
	left: 0px;
	position: absolute;
	top: 18px;
	font-size: 11px;
}
.integrated_tabs ul li:last-child span.title {
	position: relative;
	top: -15px;
	left: -25px;
}
.integrated_tabs .tooltip-inner {
	width: 220px;
}
.plainsheet_unit {
	width: 160px;
}
.mat-may-2017 section article.mat-tabs .ofq b, .mat-may-2017 section article.mat-tabs .ofq small {
	font-size: 12px;
}
.integrated_tabs .nav-tabs > li > a {
	text-align: left;
	padding-top: 5px;
}
.integrated_tabs .nav-tabs > li > a {
	width: 350px;
}
.integrated_tabs li:not(.active) a {
	padding: 6px 15px;
}
@media screen and (min-width:1024px) {
.mat-may-2017 section article.mat-detail .specs {
	font-size: 12px;
	margin-top: 60px;
}
.mat-may-2017 section article.mat-detail .specs .comp {
	margin-left: 0px;
	margin-top: 45px;
}
}
.integrated_tabs li:not(.active) a {
	background: #fff !important;
}
.integrated_tabs li.active a, .integrated_tabs li.active a:hover, .integrated_tabs li.active a:focus {
	background-color: #e8e8e8 !important;
	border-bottom: 1px solid #e8e8e8 !important;
	border: 1px solid #cecece;
}
.integrated_tabs .tab-content {
	border: 1px solid #cecece;
}
</style>
<style>
.dm-box .dm-selector .btn {
	font-size: 13px;
	border: 1px solid #e5e5e5;
	color: #666;
	text-align: left;
}
.dm-box .dm-selector .fa {
	position: absolute;
	right: 10px;
	top: 11px;
}
.dm-box .dm-selector .dropdown-menu a {
	color: #666;
	cursor: pointer;
}
.dm-selector .tooltip {
	font-size: 13px !important;
	width: 290px !important;
}
.dm-selector .tooltip.left .tooltip-arrow {
	border-left-color: #FEF7D8 !important;
}
.dm-selector .tooltip.right .tooltip-arrow {
	border-right-color: #FEF7D8 !important;
}
.dm-selector .tooltip.top .tooltip-arrow {
	border-top-color: #FEF7D8 !important;
}
.dm-selector .tooltip.bottom .tooltip-arrow {
	border-bottom-color: #FEF7D8 !important;
}
.dropdown-menu li .tooltip .tooltip-inner {
	background-color: #FEF7D8;
	border-radius: 4px;
	color: #454545;
	max-width: 381px;
	padding: 8px 15px;
	text-align: justify;
	text-decoration: none;/*  font-style: italic;*/
}
.dm-selector.tooltip.in {
	opacity: 1;
}
.tooltip.right .tooltip-arrow {
	border-right-color: #fff8dc !important;
}

.mat-may-2017 section article.mat-tabs .art-btn
{
	margin-top: 24px;
}
.ovFl thead{
	background: #17b1e3 none repeat scroll 0 0;
	color: white;
}
.mat-may-2017 section article.mat-tabs .art-btn-l {
    margin-top: 5px;
}
</style>
<div class="container m-t-b-8">
  <div class="row">
    <div class="col-xs-12  col-sm-6 col-md-8">
      <ol class="breadcrumb  m0">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="<?=base_url()?>integrated-labels">Integrated Labels</a></li>
        <li class="active">
          <?=$integrate[0]->Shape?>
          Labels</li>
      </ol>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 ">
      <div class="pull-right"> <a role="button" rel="nofollow" class="btn orangeBg" href="<?=base_url()."download/catalog/catalog.pdf";?>"><i class="fa fa-desktop"></i> Virtual Catalogue</a> </div>
    </div>
  </div>
</div>
<div class="bgGray">
  <div class="container">
    <div class="row">
      <div class="mat-sep-2017">
        <? foreach($integrate as $pro){
		 	$labelSize = preg_replace('/Label Size: /','',$pro->specification3);
			$labelSize = preg_replace('/width /i','',$labelSize);
			$labelSize = preg_replace('/height/i','',$labelSize);
			
			$sizearay = explode(',',$labelSize);
			
			$labelSize = implode('<br />',$sizearay);
			/*if(count($sizearay) > 2 ){
			  	$labelSize = $sizearay[0].' , '.$sizearay[1]."<br />";
				$labelSize .=$sizearay[2];
			}*/
			
			 $batchqty = $this->home_model->integrated_batch_qty($pro->ManufactureID);
			 $image = explode(".",$pro->CategoryImage);
			 $imagename = $image[0]."_1.png";
			 $comp = $this->home_model->grouping_compatiblity($pro->labelsCompatiblity, 'sheet');
	 ?>
        <div class="selected-product">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pr-thumb">
              <div class="imgBg text-center"> <img onerror='imgError(this);' src="<?=Assets."images/categoryimages/Integrated/".$pro->CategoryImage;?>" id="int_<?=$pro->CategoryID?>" alt="<?=$imagename?>"  title="<?=$pro->CategoryImage;?>" />
                <div style="position:absolute; left:8px; top:130px;" class="pull-left"> <a id="<?=$pro->CategoryID?>" class="btn blueBg" href="javascript:void(0);" data-original-title="Rotate Image" data-toggle="tooltip"><i class="fa fa-retweet" ></i></a> </div>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="row flexcontainer">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <h1 class="pr-title">
                    <?=$pro->specification1?>
                  </h1>
                  <div class="pr-detail">
                    <div class="row">
                      <p class="col-md-6"><b>Item Code: <span class="pr-code">
                        <?=$pro->ManufactureID?>
                        </span></b></p>
                      <p class="col-md-6"><b>Label Size:</b>
                        <?=$labelSize?>
                      </p>
                    </div>
                    <div class="row">
                      <p class="av-comp col-md-12" style="opacity:1">
                        <? if($comaptible){ echo " <b>Compatible with</b> ";}?>
                        <?=$comaptible?>
                      </p>
                    </div>
                    <div class="req-links">
                      <p> <a role="button" data-target=".layout" data-toggle="modal"> <i class="fa fa-search-plus" aria-hidden="true"></i> Layout Specification</a> </p>
                      <div class="row">
                        <div class="col-xs-12 text-left download-icons"> <a rel="nofollow" data-toggle="tooltip" title="" href="<?=Assets."images/categoryimages/Integrated/pdf/".$pro->WordDoc;?>" role="button" data-original-title="Download PDF Template"> <img onerror='imgError(this);' src="<?=Assets?>images/pdf-icon.png" alt="PDF Icon"> </a> <a data-toggle="tooltip" title="" rel="nofollw" href="<?=Assets."images/categoryimages/Integrated/word/".$pro->WordDoc;?>" role="button" data-original-title="Download Word Template"> <img onerror='imgError(this);' src="<?=Assets?>images/word-icon.png" alt="MS Word Icon"> </a> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 hidden-sm hidden-xs text-center why-seal"> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/30-icon.png" alt="30 Days Moneyback Guarantee">
                  <div class="title m-t-10"> <a href="javascript:void(0);" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" data-content="<div class='col-lg-12 col-md-12 frc-banner'><div class='title'> FAST, RELIABLE &amp; COST EFFECTIVE </div><ul><li>Over 80% of orders despatched same day</li><li>Daily despatch and delivery</li><li>Add the “Next Day” option to your order</li><li>If you need labels quicker, add a PRE 10:30 or 12:00 option for even faster delivery.</li><li>1,000’s of satisfied customers.</li><li>  <img onerror='imgError(this);' src='<?=Assets?>images/iso_14001.png' alt='ISO 9001'> ISO9001 Certified</li><li><img onerror='imgError(this);' src='<?=Assets?>images/iso_9001.png' alt='ISO14001 Certified'> ISO14001 Certified</li> </ul></div>" data-original-title="" title="">Why Buy from AA Labels? <i class="fa fa-info-circle"></i></a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="panel panel-default no-border mat-may-2017">
        <div class="panel-body no-padding">
          <div class="colors_data mat-ch" id="ajax_material_sorting">
            <?php
			$desc = $pro->Appearance;
			$max_length = 300;
			if (strlen($desc) > $max_length){
				 $offset = ($max_length - 3) - strlen($desc);
				 $short_desc = substr($desc, 0, strrpos($desc, ' ', $offset)) . '...';
				 $short_desc .= ' <a style="cursor:pointer;" data-toggle="tooltip-product" data-placement="top" data-original-title="'.$desc.'"><i>Read More</i></a>';
			}else{
				 $short_desc = $desc;
			}
			$promotion = '';
			?>
            <section data-mat-filters="<?=$pro->ColourMaterial?>" data-reset="reset" >
              <div class="row productdetails" data-value="<?=$pro->ProductID?>" data-finish="<?=$pro->LabelFinish?>" 
        data-material="<?=$pro->ColourMaterial?>" >
                <div class="hiddenfields" >
                  <input type="hidden" value="" class="cart_id"  />
                  <input type="hidden" value="<?=$pro->ProductID?>" class="product_id"  />
                  <input type="hidden" value="<?=$pro->ManufactureID?>" class="manfactureid"  />
                  <input type="hidden" value="<?=$pro->LabelsPerSheet?>" class="LabelsPerSheet"  />
                  <input type="hidden" value="" class="digitalprintoption"  />
                  <input type="hidden" value="0" data-qty="0"  id="uploadedartworks_<?=$pro->ProductID?>"  />
                  <input type="hidden" value="<?=$pro->Printable?>" class="PrintableProduct"  />
                </div>
                <article class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mat-detail">
                  <div class="pr-detail height-auto"> <span class="group_name"> Matt White Paper </span><br />
                    <span class="product_name">Matt White Paper</span> <font class="product_description">
                    <?=$short_desc?>
                    </font> </div>
                  <div class="clear"></div>
                  <div class="row specs">
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-2 col-xs-3"> <img onerror='imgError(this);' class="img-responsive product_material_image" src="<?=Assets."images/categoryimages/Integrated/".$pro->CategoryImage;?>" alt="Integrated Labels"> </div>
                    <div class="col-lg-8 col-md-8 col-sm-10 col-xs-9">
                      <div class="row">
                        <div class="col-md-6 no-padding"> <a href="#" id="<?=$pro->ProductID?>" class="technical_specs" data-target=".material" data-toggle="modal" data-original-title="Tecnial Specification">Material Specification <i class="fa fa-info-circle"></i></a> </div>
                        <div class="clear10">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comp">
                                <table class="table printer" border="0" style="border:none;">
                                  <tbody>
                                    <tr>
                                      <td align="left" valign="center" style="font-size:12px; border:none;vertical-align: bottom;width:25%;"><small style="margin-top:10px;font-size:12px;">Printer Compatibility</small></td>
                                      <td  align="left" style="font-size:12px; border:none; width:25%;"> Laser <a data-toggle="tooltip-product" data-placement="top" class="laser_printer_div" title="" data-original-title="<?=$comp['laser_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                                        <img onerror='imgError(this);' class="laser_printer_img" width="50" src="<?=Assets?>images/<?=$comp['laser_img']?>"  /></td>
                                      <td  align="left" style=" font-size:12px;border:none;width:25%;"> Inkjet <a data-toggle="tooltip-product" data-placement="top" title="" class="inkjet_printer_div" data-original-title="<?=$comp['inkjet_text']?>" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a> <br />
                                        <img onerror='imgError(this);' class="inkjet_printer_img" width="50" src="<?=Assets?>images/<?=$comp['inkjet_img']?>"  /></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="clear10"></div>
                    </div>
                  </div>
                </article>
                <article class="col-lg-7 col-md-7 col-sm-12 col-xs-12 mat-tabs">
                  <ul class="nav nav-justified" role="tablist">
                    <li class="col-xs-6 no-padding active plainoption"> <a href="#tab_plain<?=$pro->ProductID?>" aria-controls="" role="tab" data-toggle="tab">Plain Labels</a> </li>
                    <li class="col-xs-6 no-padding printedoption"> <a href="#tab_printed<?=$pro->ProductID?>" aria-controls="" role="tab" data-toggle="tab">Printed Labels</a> </li>
                    <li class="col-xs-6 no-padding"> <a href="#tab_sample<?=$pro->ProductID?>" aria-controls="" role="tab" data-toggle="tab">Material Sample</a> </li>
                  </ul>
                  <div class="tab-content">
                    <div id="tab_plain<?=$pro->ProductID?>" class="tab-pane tabplain active" role="tabpanel">
                      <div class="clear10"></div>
                      <div class="row" style="margin-top: 5px;">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                          <div class="row labels-form"  >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center qty">
                              <div class=""> 
                                <div class="input-group">
                                  <input class="form-control text-center allownumeric box_size" data-toggle="popover" data-content="" placeholder="Enter Sheets" type="text">
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle plainsheet_unit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1000 Sheets Box <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right plain_calculation_unit">
                                      <li><a href="javascript:void(0);" data-batch="250">250 Sheet Pack </a></li>
                                      <li><a href="javascript:void(0);" data-batch="1000">1000 Sheets Box</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class=""> <small class="small_plain_minqty_txt col-xs-6">Min. sheets: <span class="min_qty">1000</span></small></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 quotation">
                          <div class="plainprice_box" style="display:none">
                            <div class="clear"></div>
                            <div class="text-right plainprice_text quantity_text">&nbsp;</div>
                            <div class="text-right plainprice_text persheet_text">&nbsp;</div>
                            <div class="clear"></div>
                            <span class="pull-right final_price"><b class="priceTextOrange color_orange"> £00.00</b><span>Ex VAT</span></span> <span class="pull-right clear textOrange hide">Delivery: <span class="delivery_charges">&nbsp;</span></span>
                            <div class="clear5"></div>
                          </div>
                          <button class="btn orangeBg pull-right calculate_plain" data-int-type="plain" id="calulate_price" type="button" style="margin-top:50px;"> Calculate Price <i class="fa fa-calculator"></i> </button>
                          <button style="display:none;" class="btn orangeBg pull-right add_integrate" data-int-type="plain" type="button"> Add to basket <i class="fa fa-calculator"></i> </button>
                        </div>
                        <div class="col-xs-12 service text-right addprintingoption"> <a href="#tab_printed<?=$pro->ProductID?>" aria-controls="" role="tab" data-toggle="tab" class="apf printpriceoffer hide"> <i class="fa fa-hand-o-right pull-left" aria-hidden="true"></i> <span>Add printing for only <b class="printing_offer_text">
                          <?=symbol?>
                          16.59</b>?</span> </a> </div>
                        <div class="col-xs-12 ofq margin-top-118">
                          <div class="col-xs-4  w-32-p float-left main-box height-70 ">
                            <div class="row">
                              <div class="col-xs-2 no-padding-right ofq-icon"><img onerror='imgError(this);' src="<?=Assets?>images/4oclock.png" /></div>
                              <div class="col-xs-10 line-height-normal no-padding-right ofq-text material_clock">
                                <div class="counter clock_time f-11  ">Order before 16:00<br />
                                  for Next Day Delivery</div>
                                <div class="clear"></div>
                                <small  class="f-11  line-height-normal">Time remaining to next day delivery</small> </div>
                            </div>
                          </div>
                          <div class="col-xs-4 w-32-p float-left main-box height-70 ">
                            <div class="row">
                              <div class="col-xs-2 no-padding-right ofq-icon"><i class="fa fa-truck l-icon" aria-hidden="true"></i></div>
                              <div class="col-xs-10 line-height-normal  no-padding-right ofq-text"> <b>Delivery from
                                <?=symbol.$this->home_model->currecy_converter(5.00, 'no');?>
                                </b><br />
                                <a  class="f-11   " target="_blank" href="<?=base_url()?>delivery/"><span class="glyphicon glyphicon-new-window"></span> Delivery & <br>
                                Shipping Options</a> </div>
                            </div>
                          </div>
                          <div class=" col-xs-4 w-32-p float-left main-box height-70 ">
                            <div class="row">
                              <div class="col-xs-2 no-padding-right ofq-icon"><i class="fa fa-check-square-o l-icon" aria-hidden="true"></i></div>
                              <div class="col-xs-10 line-height-normal  no-padding-right ofq-text"><b class="f-11  ">QUALITY<br />
                                ASSURANCE GUARANTEE <a  target="_blank" href="<?=base_url()?>terms-and-conditions/#qa_anchor"><span class="glyphicon glyphicon-new-window"></span> Read More</a></b></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="tab_printed<?=$pro->ProductID?>" class="tab-pane tabprinted" role="tabpanel">
                      <div class="clear10"></div>
                      <div class="row labels-form">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6">
                          <div class="" style="margin-top:55px;">
                          <div class="text-center qty">
                            <div class="input-group">
                              <input class="form-control text-center allownumeric box_size" data-toggle="popover" data-content="" placeholder="Enter Sheets" type="text">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle plainsheet_unit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1000 Sheets Box <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right plain_calculation_unit">
                                  <li><a href="javascript:void(0);" data-batch="250">250 Sheet Pack </a></li>
                                  <li><a href="javascript:void(0);" data-batch="1000">1000 Sheets Box</a></li>
                                </ul>
                              </div>
                            </div>
                            <div class=""> <small class="small_plain_minqty_txt text-left col-xs-6">Min. sheets: <span class="min_qty">1000</span></small></div>
                          </div>
                          </div>
                          <div class="clear"></div>
                         <input type="hidden" name="" class="print_option" value="plain"/>
                         <div style="margin-top:5px;">
                            <div class="dm-box">
                            <div class="btn-group btn-block dm-selector digital_proccess-d-down"> <a class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown">Select Digital Print Process <i class="fa fa-unsorted"></i></a>
                              <ul class="dropdown-menu btn-block">
                                <li> <a data-toggle="tooltip-digital" data-value="" data-trigger="hover" data-placement="left" title="" data-id="digital"> Select Digital Print Process </a> </li>
                                <?php
                                $a4_prints = $this->home_model->get_digital_printing_process('A4');
                                foreach($a4_prints as $row){
                                        
                                ?>
                                <li> <a data-toggle="tooltip-digital" data-trigger="hover" data-placement="right" title="<?=$row->tooltip_info?>" data-id="digital" data-value="<?=$row->name?>" style="">
                                  <?=$row->name?>
                                  </a> </li>
                                <? } ?>
                              </ul>
                            </div>
                            </div>
                            <a href="#" class="btn btn-primary btn-block art-btn artwork_uploader" data-target=".artworkModal1" data-toggle="modal" data-original-title="Upload Your Artwork"> <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwork</a>
                       </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 quotation">
                          <div class="printedprice_box" style="display:none;margin-top:40px;">
                            <table class="price" width="100%" cellspacing="0" cellpadding="0" border="0">
                              <tbody>
                                <tr class="plainprice" >
                                  <td style=" width:80%;" class="text-left">Plain</td>
                                  <td style=" width:20%;" class="plaintext text-right color-orange"></td>
                                </tr>
                                <tr class="printprice" style="">
                                  <td style=" width:80%;" class="text-left phead"></td>
                                  <td style=" width:20%;" class="printtext text-right color-orange"></td>
                                </tr>
                                <tr class="halfprintprice" style="">
                                  <td style=" width:80%;" class="text-left phead color-orange">Half Price Promotion</td>
                                  <td style=" width:20%;" class="halfprinttext color-orange text-right"></td>
                                </tr>
                                <tr class="no_design" style="">
                                  <td colspan="2" class="text-left phead">3 Design Free</td>
                                </tr>
                                <tr class="desgincharge" style="display:none">
                                  <td style=" width:80%;" class="text-left phead"> Additional Designs
                                    <?
									$each_design_price = symbol.$this->home_model->currecy_converter(DesignPrice, 'yes');
									echo $each_design_price?>
                                    each </td>
                                  <td style=" width:20%;" class="desginprice text-right color-orange"><b class="pr-sm"></b></td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-right total"  style="border:none;"><div class="text-right printedprice_text priceplain">&nbsp;</div>
                                    <div class="clear"></div></td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-right"><div class="printedperlabels_text"></div></td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="clear10"></div>
                          </div>
                          <button class="btn orangeBg pull-right calculate_printed" data-int-type="printed" id="calulate_printed" type="button" style="margin-top:55px;"> Calculate Price <i class="fa fa-calculator"></i> </button>
                          <button style="display:none;" class="btn orangeBg pull-right add_integrate" data-int-type="printed" type="button"> Add to basket <i class="fa fa-calculator"></i> </button>
                        </div>
                      </div>
                    </div>
                    <div id="tab_sample<?=$pro->ProductID?>" class="tab-pane" role="tabpanel">
                      <div class="col-xs-12"> <small> All material samples are supplied on A4 sheets for the purpose of assisting the choice of face-stock colour and appearance. Along with assessing the print quality and application suitability of the adhesive.</small>
                        <div class="clear10"></div>
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12"> <small class="note">Please note: The material sample supplied will not be the shape and size of the label/s shown on this page.</small>
                            <div class="clear5"></div>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"> </div>
                          <div class="col-lg-4 col-md-4 col-sm-3 col-xs-6">
                            <button class="btn orangeBg pull-right rsample" type="button">Add Material Sample </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </section>
          </div>
          <div class="volume_break_section">
            <div id="aa_loader" class="white-screen hidden-xs" style="display:none;">
              <div class="loading-gif text-center" style="top:70%;left:35%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px; " alt="AA Labels Loader"> </div>
            </div>
            <div id="integrated_label_section" class="m-t-b-10 m-t-60">
              <div class="integrated_tabs">
                <ul class="nav nav-tabs nav row"  role="tablist">
                  <li role="presentation" class="active col-sm-6 col-lg-4 col-md-5"><a href="#sheet_box" aria-controls="profile" role="tab" data-toggle="tab"><img onerror='imgError(this);' src="<?=Assets?>images/box_icon.png" alt="Integrated Labels Box"/> <span class="title" data-title="1000 Sheets Box">1,000 Sheet Box</span></a></li>
                  <li role="presentation" class="col-sm-6 col-lg-4 col-md-5"> <a aria-controls="home" role="tab" data-toggle="tab" href="#sheet_pack"> <img onerror='imgError(this);' src="<?=Assets?>images/sheet_icon.png" alt="Integrated Labels Pack"/> <span class="title" data-title="250 Sheets Pack">250 Sheet Dispenser Pack<br />
                    <small>With a useful drop-down dispenser tray, ideal for office use and stationary cupboard storage. </small></span></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane" id="sheet_pack">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover volume_breaks">
                        <thead class="bggreyThead">
                          <tr>
                            <th>Item Code</th>
                            <th>Type</th>
                            <th>Pack</th>
                            <th>Price Per Pack</th>
                            <th>Sheets</th>
                            <th style="line-height: 12px;">Total Price</small></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
						  	$integrated_prices = $this->home_model->update_integrated_table(250,$pro->ManufactureID);
							foreach($integrated_prices as $prices):
								if($prices->Box == 1)
								{
								  $text = "Pack";
								}
								else
								{
								  $text = "Packs";
								}
                                $price = $prices->Price_250;
								$per_sheet = round($price/$prices->Box,2);
                          ?>
                          <tr>
                            <td><?=$prices->ManufactureID?></td>
                            <td><?=$prices->ProductLabel?></td>
                            <td><?=$prices->Box . " ". $text?></td>
                            <td><?=symbol. $this->home_model->currecy_converter($per_sheet)?></td>
                            <td><?=$prices->Sheets?>
                              Sheets</td>
                            <td><?=symbol. $this->home_model->currecy_converter($price)?></td>
                          </tr>
                          <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- end tab content-->
                  <div role="tabpanel" class="tab-pane active" id="sheet_box">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover volume_breaks">
                        <thead class="bggreyThead">
                          <tr>
                            <th>Item Code</th>
                            <th>Type</th>
                            <th>Box</th>
                            <th>Price Per Box</th>
                            <th>Sheets</th>
                            <th style="line-height: 12px;">Total Price</small></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
						  	$integrated_prices = $this->home_model->update_integrated_table(1000,$pro->ManufactureID);
						  	foreach($integrated_prices as $prices):
								if($prices->Box == 1)
								{
								  $text = "Box";
								}
								else
								{
								  $text = "Boxes";
								}
                                $price = $prices->Price_1000;
								$per_box = round($price/$prices->Box,2);
                                ?>
                          <tr>
                            <td><?=$prices->ManufactureID?></td>
                            <td><?=$prices->ProductLabel?></td>
                            <td><?=$prices->Box . " ". $text?></td>
                            <td><?=symbol. $this->home_model->currecy_converter($per_box)?></td>
                            <td><?=$prices->Sheets?>
                              Sheets</td>
                            <td><?=symbol. $this->home_model->currecy_converter($price)?></td>
                          </tr>
                          <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- end tab content--> 
                </div>
              </div>
              <?php //include('integrated_table.php')?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="thumbnail row">
      <? include('integrated_comapatible.php'); ?>
    </div>
  </div>
</div>
<!-- Layout modal -->
<div class="modal fade layout aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Label Layout</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div >
            <div class="col-md-3 text-center"> <img onerror='imgError(this);' src="<?=Assets."images/categoryimages/Integrated/".$pro->CategoryImage;?>" alt="<?=$pro->specification1?>" title="<?=$catname?>" alt="<?=$catname?>" class="m-b-10 design-image"> <img onerror='imgError(this);' src="<?=Assets?>images/thumb-arrow.png" class="thumb-arrow"> </div>
            <div class="col-md-9">
              <table class="table table-bordered table-striped" >
                <tbody>
                  <tr>
                    <td ><strong>Labels Width: </strong></td>
                    <td ><?=$pro->LabelWidth?></td>
                    <td ><strong>Labels Height:</strong></td>
                    <td ><?=$pro->LabelHeight?></td>
                  </tr>
                  <tr>
                    <td><strong>Label Across:</strong></td>
                    <td><?=$pro->LabelAcross?></td>
                    <td><strong>Label Around:</strong></td>
                    <td><?=$pro->LabelAround?></td>
                  </tr>
                  <tr>
                    <td><strong>Top Margin:</strong></td>
                    <td><?=$pro->LabelTopMargin?></td>
                    <td><strong>Bottom Margin:</strong></td>
                    <td><?=$pro->LabelBottomMargin?></td>
                  </tr>
                  <tr>
                    <td><strong>Gap Across:</strong></td>
                    <td><?=$pro->LabelGapAcross?></td>
                    <td><strong>Gap Around:</strong></td>
                    <td><?=$pro->LabelGapAround?></td>
                  </tr>
                  <tr>
                    <td><strong>Left Margin:</strong></td>
                    <td><?=$pro->LabelLeftMargin?></td>
                    <td><strong>Right Margin:</strong></td>
                    <td><?=$pro->LabelRightMargin?></td>
                  </tr>
                  <tr>
                    <td><strong>Corner Radius:</strong></td>
                    <td><?=$pro->LabelCornerRadius?></td>
                    <td>  </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Layout modal -->
<div class="modal fade material aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
        <h4 id="myModalLabel" class="modal-title">AA Labels Technical Specification - <span id="mat_code"></span> <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
      </div>
      <div class="">
        <div >
          <div class="col-md-3 text-center"> <img onerror='imgError(this);' id="material_popup_img" src="" alt="<?=$catname?>" title="<?=$catname?>" width="46" height="46" class="m-t-b-10 img-Sheet-material"> </div>
          <div class="col-md-9">
            <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
              <div class="loading-gif text-center" style="top:26%;left:29%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px; "> </div>
            </div>
            <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>
            <div class="bgGray p-l-r-10"> <small> This summary materials specification for this adhesive label is based on information obtained from the original material manufacturer and is offered in good faith in accordance with AA Labels terms and conditions to determine fitness for use as sheet labels (A4, A3 &amp; SRA3) produced by AA Labels. No guarantee is offered or implied. It is the user's responsibility to fully asses and/or test the label's material and determine its suitability for the label application intended. Measurements and test results on this label's material are nominal. In accordance with a policy of continuous improvement for label products the manufacturer and AA Labels reserves the right to amend the specification without notice. A <a href="<?=base_url()?>labels-materials/">full material specification</a> can be found in the Label Materials section accessed via the Home Page <br>
              Copyright&copy; AA labels 2015</small> </div>
          </div>
        </div>
      </div>
      <div  class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade artworkModal1 aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>Upload Artwork</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <div id="artworks_uploads_loader" class="white-screen hidden-xs" style="display:none;">
              <div class="loading-gif text-center" style="top:26%;left:29%;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px; "> </div>
            </div>
            <div id="ajax_artwork_uploads" class=""></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
/************* Label Finder **********/
var contentbox = $('#ajax_material_sorting');
$( document ).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$("[data-toggle=tooltip-product]").tooltip();
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip-digital"]').tooltip();
	//$('.fnTop').show().slideDown( "fast" );
	//$( ".labels-filters-form" ).slideUp( "fast" );
	//change_text('View Filters');
	<? if(isset($category) and $category!=''){?>
		 	//filter_data('autoload', '');
	<? }?> 
});	

$(document).on("focus", ".box_size,.print_option", function(e) {
	$('.print_price').css("visibility","hidden");
	$('.black_price').css("visibility","hidden");
	$('.plain_price').css("visibility","hidden");
	$('.final_price').css("visibility","hidden");
	$('.add_integrate').hide();
	$('.calculate_plain, .calculate_printed').show();
	$(".plainprice_box").css("display","none");
	$(".printedprice_box").css("display","none");
});

$(document).on("click", ".calculate_plain, .calculate_printed", function(e) {
		
		var type = $(this).data('int-type');
		var print_option = $(this).parents('.tab-pane').find('.print_option').val();
		var box_inp = $(this).parents('.tab-pane').find('.box_size');
		var box = parseInt(box_inp.val());
		var batch = parseInt($('.plainsheet_unit').text());
		var cart_id =  $(this).parents('.productdetails').find('.cart_id').val();
		var prd_id = $(this).parents('.productdetails').find('.product_id').val();
		var min_qty = batch;
		var max_qty = 500000;
		
		var artworks = parseInt($(this).parents('.productdetails').find('#uploadedartworks_'+prd_id).val());
		var upload_qty = parseInt($(this).parents('.productdetails').find('#uploadedartworks_'+prd_id).attr('data-qty'));

		var persheet = '';
		var manufacture = '<?=$integrate[0]->ManufactureID?>';

		var _this = $(this);
		if(box == NaN || box_inp.val() == '')
		{
			//swal("","Please enter number of sheets first","warning");
			box_inp.val(min_qty);
			show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
			return false;
		}
		else if(box < min_qty)
		{
			show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
			box_inp.val(min_qty);
			//swal("","Minimum 100 sheets allowed","warning");
			return false;
		}
		else if(box > max_qty)
		{
			box_inp.val(max_qty);
			show_faded_popover(box_inp, "Maximum "+max_qty+" sheets allowed");
			//swal("","Maximum 200000 sheets allowed","warning");
			return false;
		}
		if(type == 'printed' && print_option == 'plain')
		{
			swal("Please Select","Digital Printing Process","warning");
			return false;
		}
		if(box%batch != 0)
		{
			if(batch == 250)
			{
				box = Math.round(box/250)*250;
			}
			else
			{
				box = Math.round(box/1000)*1000;
			}
			$(box_inp).val(box);
			show_faded_popover(box_inp, "Quantity has been round off to "+box);
		}
		if(type == 'printed' && print_option != 'plain')
		{
			if(artworks > 0 && upload_qty != box && upload_qty!=0){
				$(this).parents('.productdetails').find('.artwork_uploader').click();
				alert_box("You have changed the quantity of Sheets. Please amend quantities against each uploaded artwork.");
				return false;
			}
		}
		change_btn_state(_this,'disable','plain');
		$("#aa_loader").show();
		$.ajax({
				url: base+'ajax/get_box_price',
				type:"post",
				async:"false",
				dataType: "json",
				data:{manufature:manufacture,box:box,print_option:print_option,batch:batch,cart_id:cart_id,prd_id: prd_id},
				success: function(data){
					change_btn_state(_this,'enable','plain');
					if(print_option=="black"){
						$('.print_price').html('');
						$('.plain_price').html(' '+data.symbol+''+data.plain_price);
						$(_this).parents('.tab-pane').find('.black_price').html(' '+data.symbol+''+data.black_price);
					}
					else if(print_option=="printed"){
						$('.black_price').html('');
						$('.plain_price').html(' '+data.symbol+''+data.plain_price);
						$(_this).parents('.tab-pane').find('.print_price').html(' '+data.symbol+''+data.print_price);
					}else{
						$('.print_price').html('');
						$('.black_price').html('');
						$(_this).parents('.tab-pane').find('.plain_price').html(' '+data.symbol+''+data.plain_price);
					}
					
					if(type == 'printed')
					{
						var print_text = "";
						if(data.print_option == "black")
						{
							print_text = "<span>Monochrome - Black Only</span>";
						}
						else if(data.print_option == "printed")
						{
							print_text = "<span class='color_orange'>Full Colour</span>";
						}
						
						$(_this).parents('.tab-pane').find('.print_type').html(print_text).show();
						
						if(data.print_option=='Fullcolour'){
							$(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.phead').text('Printed Full Color');
						}else if(data.print_option=='Mono'){
							$(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.phead').text('Printed Black');
						}

						$(_this).parents('.productdetails').find('.printedprice_box .price .plainprice').find('.plaintext').html('<b class="pr-sm">'+data.symbol+data.plain_price+'</b>');
		
						$(_this).parents('.productdetails').find('.printedprice_box .price .printprice').find('.printtext').html('<b class="pr-sm">'+data.symbol+data.halfprintprice+'</b>');
		
						$(_this).parents('.productdetails').find('.printedprice_box .price .halfprintprice').find('.halfprinttext').html('-<b class="pr-sm">'+data.symbol+data.printprice+'</b>');
				 		
						$(_this).parents('.productdetails').find('.printedprice_box .price .no_design').find('.phead').html(data.artworks+' Design Free');

						$(_this).parents('.productdetails').find('.printedprice_box .price .desgincharge').find('.desginprice').html('<b class="pr-sm">'+data.symbol+data.designprice+'</b>');
						$(_this).parents('.productdetails').find('.printedprice_text').html('<b class="priceTextOrange color_orange"> '+data.symbol+''+data.total+'</b><br><span>'+data.vatoption+' VAT</span>');
			
						$(_this).parents('.productdetails').find('.printedperlabels_text').html(box+" Sheets, " + data.symbol + "" + data.per_sheet+" Per Sheet");
						$(_this).parents('.productdetails').find('.printedprice_box').show();
					
					}
					else
					{
						$(_this).parents('.tab-pane').find('.plainprice_box').css("display","block");
						$(_this).parents('.tab-pane').find('.final_price').html('<b class="priceTextOrange color_orange"> '+data.symbol+''+data.total+'</b><span>'+data.vatoption+' VAT</span>');
						$(_this).parents('.tab-pane').find('.final_price').css("visibility","visible");
	
						$(_this).parents('.tab-pane').find('.delivery_charges').html(data.symbol+''+data.dpd);
						
						$(_this).parents('.tab-pane').find('.quantity_text').html(box+" Sheets");
						$(_this).parents('.tab-pane').find('.persheet_text').html(data.symbol + "" + data.per_sheet+" Per Sheet");
					}
					$(_this).hide();
					$(_this).parents('.tab-pane').find('.add_integrate').show();
					$("#aa_loader").hide();
				}  
			});
});	

$(document).on("click", ".add_integrate", function(e) {
   		
		var type = $(this).data('int-type');
		var print_option = $(this).parents('.tab-pane').find('.print_option').val();
		var box_inp = $(this).parents('.tab-pane').find('.box_size');
		var box = parseInt(box_inp.val());
		var prd_id = $(this).parents('.productdetails').find('.product_id').val();
		var counter = parseInt($(this).parents('.productdetails').find('#uploadedartworks_'+prd_id).val());
		var persheet = $(this).parents('.productdetails').find('.LabelsPerSheet'+prd_id).val();
		
		var batch = parseInt($('.plainsheet_unit').text());
		var max_qty = 500000;
		var manufacture = '<?=$integrate[0]->ManufactureID?>';
		
		var box = parseInt(box_inp.val());
		var artworks = parseInt($(this).parents('.productdetails').find('#uploadedartworks_'+prd_id).val());
		var upload_qty = parseInt($(this).parents('.productdetails').find('#uploadedartworks_'+prd_id).attr('data-qty'));
		var cart_id =  $(this).parents('.productdetails').find('.cart_id').val();
		
		var _this = $(this);
		
		if(box == 'NaN' || box_inp == '')
		{
			swal("","Please enter number of sheets first","warning");
			return false;
		}
		else if(box < batch)
		{
			swal("","Minimum "+batch+" sheets allowed","warning");
			return false;
		}
		else if(box > max_qty)
		{
			swal("","Maximum "+ max_qty +" sheets allowed","warning");
			return false;
		}
		if(type == 'printed' && print_option == 'plain')
		{
			swal("","Please select printing option","warning");
			return false;
		}
		
		if(box%batch != 0)
		{
			if(batch == 250)
			{
				box = Math.round(box/250)*250;
			}
			else
			{
				box = Math.round(box/1000)*1000;
			}
			$(box_inp).val(box);
			show_faded_popover(box_inp, "Quantity has been round off to "+box);
			$(".labels_input").trigger("blur");
			return false;
		}
		if(type == 'printed' && print_option != 'plain')
		{
			if(artworks > 0 && upload_qty != box && upload_qty!=0){
				$(this).parents('.productdetails').find('.artwork_uploader').click();
				alert_box("You have changed the quantity of Sheets. Please amend quantities against each uploaded artwork.");
				return false;
			}
		}
		
		 var manufacture = '<?=$integrate[0]->ManufactureID?>';
		 var productid = '<?=$integrate[0]->ProductID?>';
		 var ProductName = '<?=$integrate[0]->ProductName?>';
		 
		 var designs = $(this).parents('.productdetails').find('#uploadedartworks_'+prd_id).val();
		 
		 if(type == 'printed' && print_option != 'plain' && designs == 0){
			swal({
				  title: "Did you forget something?",
				  text: "You can upload your artwork by clicking on the blue “BACK & ADD ARTWORK” button and continue to place your order.\n\nAlternatively you can proceed to place your order by clicking on the orange “CONTINUE & ADD TO BASKET” button and supply your artwork via email later.",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn orangeBg",
				  confirmButtonText: "CONTINUE & ADD TO BASKET",
				  cancelButtonClass: "btn blueBg",
				  cancelButtonText: "BACK & ADD ARTWORK",
				  closeOnConfirm: false,
				  closeOnCancel: true
				},
				function(isConfirm) {
				  if (isConfirm) {
					 change_btn_state(_this,'disable','plain');
					 $("#aa_loader").show();
					 $.ajax({
						url: base+'ajax/add_integrate_incart',
						type:"post",
						async:"false",
						dataType: "html",
						data:{
							manufature:manufacture,
							box:box,
							type:type,
							print_option:print_option,
							prdid:productid,
							counter:counter,
							batch:batch,
							cart_id:cart_id
						},
						success: function(data){
							data = $.parseJSON(data); 
							if(data){
								change_btn_state(_this,'enable','plain');
								$("#aa_loader").hide();
								fireRemarketingTag('Add to cart');
								ecommerce_add_to_cart(_this);
								update_artwork_upload_btn(_this, 0);
								popup_messages(manufacture+' - '+ProductName);
								$('#cart').html(data.top_cart);
							}
						}
					  });
					}
					popup_messages(manufacture+' - '+ProductName);
			});
		}
		else
		{
			 change_btn_state(_this,'disable','plain');
			 $("#aa_loader").show();
			 $.ajax({
				url: base+'ajax/add_integrate_incart',
				type:"post",
				async:"false",
				dataType: "html",
				data:{
					manufature:manufacture,
					box:box,
					type:type,
					print_option:print_option,
					prdid:productid,
					counter:counter,
					batch:batch,
					cart_id:cart_id
				},
				success: function(data){
					data = $.parseJSON(data); 
					if(data){
						change_btn_state(_this,'enable','plain');
						$("#aa_loader").hide();
						fireRemarketingTag('Add to cart');
						ecommerce_add_to_cart(_this);
						update_artwork_upload_btn(_this, 0);
						popup_messages(manufacture+' - '+ProductName);
						$('#cart').html(data.top_cart);
					}
				}  
			});
		}
   });
   
function ecommerce_add_to_cart(_this){
		<? if(SITE_MODE=='live'){ ?> 
				var prdid = '<?=$integrate[0]->ProductID?>';
				var product_name =  '<?=$integrate[0]->ProductCategoryName?>';
				var category = 'Integrated Labels';	
				var box_inp = $(_this).parents('.tab-pane').find('.box_size');
				var quantity = parseInt(box_inp.val());
				var price = $(_this).parents('.tab-pane').find('.final_price').find('.color_orange').text();
				var price = price.replace ( /[^\d.]/g, '' );
				price = parseFloat(price);
				dataLayer.push({
					  'event': 'addToCart',
					  'ecommerce': {
						'add': {                                
						  'products': [{                        
							'name': product_name,
							'id': prdid,
							'price': price,              
							'brand': 'AALABELS',
							'category': category,
							'quantity': quantity,
						   }]
						}
					  }
				});
		<? } ?>	
}  
  
  
  
$(document).ready(function(){
	$(".dropzone").dropzone({
		 url: "<?=base_url()?>ajax/upload_integrated_files/<?=$pro->ProductID?>",
		 maxFiles: 4,
		 init: function() {
			 this.on("maxfilesexceeded", function(file){
						swal("","You can upload maximum 4 artworks!","warning");
						this.removeFile(file);
			 });
			 this.on("addedfile", function(file) {
					var removeButton = Dropzone.createElement("<button class='btn btn-danger'>Remove</button>");
					//var removeButton = Dropzone.createElement('<div class="dz-error-mark delete_icon" ><span>✘</span></div>');
					var _this = this;
					removeButton.addEventListener("click", function(e) {
						  e.preventDefault();
						  e.stopPropagation();
						  delete_from_folder(file);
						  _this.removeFile(file);
						});
					file.previewElement.appendChild(removeButton);
					
			 });
			 this.on("success", function(file, responseText) {
				if(responseText=='error'){
						this.removeFile(file);
				}else{
						var counter = $('#filecounter').val();
						$('#filecounter').val(parseInt(counter)+1);
						
						var aa = file.previewElement.querySelector("[data-dz-name]");
						aa.innerHTML=responseText;
						console.log($('#filecounter').val());
					}
			}); 
		},
	});
	 
});	
function delete_from_folder(file){
var aa = file.previewElement.querySelector("[data-dz-name]");		
var image = aa.innerHTML;
$.ajax({
		url: base+'ajax/delete_from_folder',
		type:"post",
		async:"false",
		dataType: "html",
		data:{file:image,productid:'<?=$pro->ProductID?>'},
		success: function(data){
				if(data){
					var counter = $('#filecounter').val();
					$('#filecounter').val(parseInt(counter)-1);
					console.log($('#filecounter').val());
				}
		}  
	});
}
$('#print_option').change(function() {
		if($(this).val() == "plain"){
			$('#uploader').hide();
		}else{
			$('#uploader').show();
		}
});



$(document).on("click", ".pull-left > a", function(e) {
		
		var id=$(this).attr('id');
		var curent_class = $(this).attr('class');
		if(curent_class=='btn blueBg'){
			var src = $("#int_"+id).attr('alt');
			$(this).removeClass('btn blueBg');
			$(this).addClass('btn orangeBg');
			$("#int_"+id).attr('src',base+'theme/site/images/categoryimages/Integrated/'+src);
			$(".product_material_image").attr('src',base+'theme/site/images/categoryimages/Integrated/'+src);
			
		}else{
			
			var src = $("#int_"+id).attr('title');
			$(this).removeClass('btn orangeBg');
			$(this).addClass('btn blueBg');
			$("#int_"+id).attr('src',base+'theme/site/images/categoryimages/Integrated/'+src);
			$(".product_material_image").attr('src',base+'theme/site/images/categoryimages/Integrated/'+src);
		}
});

function fireRemarketingTag(page){
	<? if(SITE_MODE=='live123'){?>
			dataLayer.push({'event': 'fireRemarketingTag', 'ecomm_pagetype' : page});
	<? } ?>
}
$(document).on("click", ".technical_specs", function(e) {
	var id =  $(this).parents('.productdetails').find('.product_id').val();
	$('#ajax_tecnial_specifiacation').html('');
	$('#mat_code').html('');
	$('#specs_loader').show();
	$.ajax({
		url: base+'ajax/material_popup/'+id,
		type:"POST",
		async:"false",
		dataType: "html",
		success: function(data){
				if(!data==''){	
				   data = $.parseJSON(data); 
				   $('#material_popup_img').attr('src',data.src);
				   setTimeout(function(){
					  $('#specs_loader').hide();
					  $('#ajax_tecnial_specifiacation').html(data.html);
					   $('#mat_code').html(data.mat_code);
				  },500);
				}
		  }  
	});
});
$(document).on("click", ".applications", function(e) {
	var groupname =  $(this).attr('id');
	$('.ajax_application_chart').html('');
	$('#app_group_name').html('');
	$('#lb_applications_loader').show();
	
	$.ajax({
		url: base+'ajax/application_popup/',
		type:"POST",
		async:"false",
		dataType: "html",
		data:{'groupname':groupname,type:'sheets'},
		success: function(data){
			if(!data==''){	
			   data = $.parseJSON(data); 
			   setTimeout(function(){
				   $('#lb_applications_loader').hide();
				  $('.ajax_application_chart').html(data.html);
				   $('#app_group_name').html(data.group_name);
				   $("b.popup-title").html(data.group_name);
			  },500);
			}
		}  
	});
	
});
$(document).on("click", ".rsample", function(e) {
		var p_code =  $(this).parents('.productdetails').find('.product_id').val();
	 	var menuid =  $(this).parents('.productdetails').find('.manfactureid').val();
		var prd_name = $(this).parents('.productdetails').find('.product_name').text();
		var _this = $(this);
		if(menuid){
			change_btn_state(_this,'disable','sample');
			$.ajax({
						url: base+'ajax/add_sample_to_cart',
						type:"POST",
						async:"false",
						dataType: "html",
						data: {  qty: 1,menuid: menuid,prd_id: p_code},
						success: function(data){
						if(!data==''){
								// $(".requestsample").modal('hide');
								// data = $.parseJSON(data);
								// if(data.response=='yes'){
								// 	change_btn_state(_this,'enable','sample');
								// 	var sample_txt = "Thank you for requesting a sample, an A4 sheet of the material chosen will be sent via the post. \n\n Please note: The label size on the sample will not match the label/s on this page.";
								// 	swal("Material Sample Added to Basket",sample_txt,"success");
								// 	$('#cart').html(data.top_cart);
                            //usman
                            change_btn_state(_this,'enable','sample');
                            $(".requestsample").modal('hide');
                            data = $.parseJSON(data);
                            if(data.response=='yes'){
                                var sample_txt = "Thank you for requesting a sample which has been added to your basket and upon checkout a free-of-charge A4 sheet of the material chosen will be sent to you. \n\n Please note: This is a material and adhesive sample only and will no not therefore match the label shape and size on this page.";
                                //swal("Material Sample Added to Basket",sample_txt,"success");
                                popup_messages(sample_txt);
                                //popup_messages(menuid+' - '+prd_name+' - Sample ');
                                $('#cart').html(data.top_cart);

                                ecommerce_add_to_cart(_this, 'sample');
                            //usman

                            }
								else if(data.response=='failed'){
									swal("Maximum limit exceeded",data.msg,"error");
								}
							}
					 }  
			});
		}
});
/*$('.artworkModal1').on('hidden.bs.modal', function(e){
	var designs = $(this).find("#filecounter").val();
	if(designs > 0)
	{
		var Artwork = 'Design';
		if(designs > 1){
			var Artwork = 'Designs';
		}
		$('.artwork_uploader').switchClass('art-btn','art-btn-l');
		var btnhtml ='<div class="row"><div class="col-xs-4"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>';
			btnhtml +='<div class="col-xs-8"><b>'+designs+' '+Artwork+' Uploaded </b>';
			btnhtml +='<small>Click here to upload further<br>artworks, view or edit.</small></div></div>';
			$('.artwork_uploader').html(btnhtml);
	}
	else
	{
		$('.artwork_uploader').switchClass('art-btn-l','art-btn');
		var btnhtml = '<i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwork';
		$('.artwork_uploader').html(btnhtml);
	}
	$('.tabprinted').find('.box_size').trigger("change");
});*/

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

$(document).on("click", ".plain_calculation_unit li a, .price-btn", function(e) {
	  var selText = $(this).data('batch');
	  var old_val =  $.trim(parseInt($(this).parents('.input-group-btn').find('.dropdown-toggle').text()));
	  	  
	  if( $.trim(old_val) ==  $.trim(selText)){ return true;}
	  
	  if(selText == '250'){
		  $(this).parents('.input-group-btn').find('.dropdown-toggle').html(selText+' Sheets Pack <span class="caret"></span>');
	  }
	  else{
	   		$(this).parents('.input-group-btn').find('.dropdown-toggle').html(selText+' Sheets Box <span class="caret"></span>');
	  }
	 	$('.print_price').css("visibility","hidden");;
		$('.black_price').css("visibility","hidden");;
		$('.plain_price').css("visibility","hidden");;
		$('.final_price').css("visibility","hidden");;
		$('.add_integrate').hide();
		$('.calculate_plain, .calculate_printed').show();
		$(".plainprice_box").css("display","none");
		$('.min_qty').html(selText);
		$('.box_size').val('');
		if(selText == '250')
		{
			$(".integrated_tabs").find("a[href='#sheet_pack']").trigger("click");
		}
		else
		{
			$(".integrated_tabs").find("a[href='#sheet_box']").trigger("click");
		}
		//update_prices_table(selText);
});

function update_prices_table(qty)
{
	var manufactureid = $.trim($(".pr-detail").find(".pr-code").text());
	$("#aa_loader").show();
	$.ajax({
		url: base+'ajax/update_integrated_table',
		type: 'POST',
		dataType: "html",
		data:{
			qty:qty,
			manufactureid:manufactureid
			},
		success:function(data)
		{
			data = $.parseJSON(data);
			$("#aa_loader").hide();
			$("#integrated_label_section").html(data.html);
		}
	});
}

$(document).on("click",".integrated_tabs li:not(.active) a",function(e){
	var plain_active = $(".mat-tabs").find('.plainoption').hasClass("active");
	if(plain_active)
	{
		var qty = $('.tabplain').find(".box_size").val();
	}
	else
	{
		var qty = $('.tabprinted').find(".box_size").val();
	}
	text = $(this).find("span.title").data('title');
	min_qty = parseInt(text);
	$(".min_qty").text(min_qty);
	var type = $(this).attr("href");
	text += " <span class='caret'></span>";
	type = type.substr(1,type.length);
	$(".plainsheet_unit").html(text);
	if(qty != '')
	{
		var plain_active = $(".mat-tabs").find('.plainoption').hasClass("active");
		if(plain_active)
		{
			$(".calculate_plain").trigger("click");
		}
		else
		{
			$(".calculate_printed").trigger("click");
		}
	}
});

/**** NEW ***/

function intialize_progressbar(){
	$("#progressbar").progressbar({
		value: 0,
		create: function( event, ui ) {
			$(this).removeClass("ui-corner-all").addClass('progress').find(">:first-child").removeClass("ui-corner-left").addClass('progress-bar progress-bar-success');
		}
	});
}

$(document).on("click", ".productdetails .dm-selector li a", function(e) {
	var selText = $(this).text();
	var value = $(this).attr('data-value');
	if(value.length > 0){
		 $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <i class="fa fa-unsorted"></i>');
		 $(this).parents('.productdetails').find('.print_option').val(value);
	}else{
		$(this).parents('.btn-group').find('.dropdown-toggle').html('Select Digital Print Process <i class="fa fa-unsorted"></i>');
		$(this).parents('.productdetails').find('.print_option').val('');
	}
	$(this).parents(".productdetails").find(".tabprinted").find(".box_size").trigger("focus");
});

$(document).on("click", ".artwork_uploader", function(e) {
	var cart_id =  $(this).parents('.productdetails').find('.cart_id').val();
	var product_id =  $(this).parents('.productdetails').find('.product_id').val();
	var manfactureid =  $(this).parents('.productdetails').find('.manfactureid').val();
	var labels =  $(this).parents('.productdetails').find('.LabelsPerSheet').val();
	var unitqty =  $(this).parents('.productdetails').find('.printedsheet_unit').text(); //Sheets Labels
	unitqty = $.trim(unitqty);
	var _this = this;
	parent_selector = this;
	$(".popover").hide();
	$('#ajax_artwork_uploads').html('');
	$('#artworks_uploads_loader').show();
	$.ajax({
		url: base+'ajax/view_artworks_content',
		type:"POST",
		async:"false",
		data:{
			manfactureid:manfactureid,
			product_id:product_id,
			type:'A4 Sheets',
			labelspersheet:labels,
			cart_id:cart_id,
			unitqty:unitqty,
		},
		dataType: "html",
		success: function(data){
				if(!data==''){	
					data = $.parseJSON(data); 
					update_printed_quantity_box(data.qty, data.designs);
					$('#artworks_uploads_loader').hide();
					$('#ajax_artwork_uploads').html(data.html);
					intialize_progressbar();
					if(cart_id.length==0 || cart_id==''){
						$(_this).parents('.productdetails').find('.cart_id').val(data.cartid);
					}
				}
		  }  
	});
});

$(document).on("click", ".browse_btn", function(e) {
		$(this).parents('.upload_row').find('.artwork_file').click();
});

$(document).on("change", ".artwork_file", function(e) {
    readURL(this);
	$(this).parents('.upload_row').find('.remove_image_link').show();
});

function readURL(input) {
    if (input.files && input.files[0]) {
		var url = input.value;
		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		if(ext=='docx' || ext=='doc'){
			$('#preview_po_img').attr('src', '<?=Assets?>images/doc.png');
			$('#preview_po_img').show();
			$('.browse_btn').hide();	
		}
		else if(ext=='pdf'){
			$('#preview_po_img').attr('src', '<?=Assets?>images/pdf.png');
			$('#preview_po_img').show();	
			$('.browse_btn').hide();
		}
		else if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#preview_po_img').attr('src', e.target.result);
				$('#preview_po_img').show();
				$('.browse_btn').hide();
			}
			reader.readAsDataURL(input.files[0]);
		}
		else{
				$('#preview_po_img').attr('src', '<?=Assets?>images/no-image.png');
				$('#preview_po_img').show();
				$('.browse_btn').hide();
		}
    }
}

$(document).on("click", ".remove_image_link", function(e) {
	$("#preview_po_img").trigger("click");
});
$(document).on("click", "#preview_po_img", function(e) {
		swal({
		  title: 'Are you sure you want to delete this file?',
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn orangeBg",
		  confirmButtonText: "No",
		  cancelButtonClass: "btn blueBg m-r-10",
		  cancelButtonText: "Yes",
		  closeOnConfirm: true,
		  closeOnCancel: true
		 },
			function(isConfirm) {
			  if (isConfirm) {
				console.log('cancel');
			  } else {
				$('.browse_btn').show();
				$('#preview_po_img').hide();
				$('.remove_image_link').hide();
			 }
		  });
});



var old_labels_input;

var old_roll_labels_input;

var old_roll_input;

$(document).on("focus", ".labels_input", function(e) {
	old_labels_input = $(this).val();
});
	
$(document).on("keypress keyup blur", ".labels_input", function(e) {
		if($(this).val()!=old_labels_input){
			$(this).parents('.upload_row').find('.sheet_updater').show();
		}
});

$(document).on("click", ".add_another_art", function(e) {
		$('.upload_row').show();
		$(this).hide();
		$('#add_another_line').hide();
});

$(document).on("click", ".delete_artwork_file", function(event) {
		  var id = $(this).attr('id');
		  var cartid = $('#cartid').val();
		  var productid = $('#cartproductid').val();
		  var persheet = $('#labels_p_sheet').val();
		  var type = 'a4';
		  var unitqty = $('#cartunitqty').val();

		  unitqty = $.trim(unitqty);
		   swal({
			  title: "Are you sure you want to delete this line",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn orangeBg",
			  confirmButtonText: "Yes",
			  cancelButtonClass: "btn blueBg m-r-10",
			  cancelButtonText: "Cancel",
			  closeOnConfirm: true,
			  closeOnCancel: true
			},
			function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: base+'ajax/delete_material_artworks',
						type:"POST",
						async:"false",
						dataType: "html",
						data:{
							  fileid:id,
							  cartid:cartid,
							  productid:productid,
							  persheet:persheet,
							  type:type,
							  unitqty:unitqty 
						},
						success: function(data){
							data = $.parseJSON(data); 	
							if(!data==''){
								update_printed_quantity_box(data.qty, data.designs);
								$('#ajax_upload_content').html(data.content);
								intialize_progressbar();
							}
						 }  
					});
			  } 
		 })
});

var parent_selector = null;	

$(document).on("blur", ".labels_input", function(e) {
		var min_qty = parseInt($('#labels_p_sheet').val());
		var unitqty = $('#cartunitqty').val();
		unitqty = $.trim(unitqty);
		var labels = parseInt($(this).val());
		if(!is_numeric(labels)){
			show_faded_popover(this, "please enter only numbers ");
			$(this).val('');
			return false;
		}
		else if(labels==0 && unitqty == 'Sheets'){
			show_faded_popover(this, "Minimum 1 sheet required ");
			$(this).val('');
			return false;
		}
		else if((labels==0 || labels < min_qty) && unitqty == 'Labels'){
			show_faded_popover(this, "Minimum "+min_qty+" labels are required ");
			$(this).val('');
			return false;
		}
		else if(labels%min_qty != 0  && unitqty == 'Labels'){
				var multipyer = min_qty * parseInt(parseInt(labels/min_qty)+1);
				$(this).val(multipyer);
				total_upload_labels();
				show_faded_popover(this, "Quantity has been amended for production as "+multipyer+" Labels.");
				$(this).focus();
				return false;
		}
		else{
				total_upload_labels();
		}
});

function total_upload_labels(){
		var total_labels = 0;
		var total_sheets = 0;
		var min_qty = $('#labels_p_sheet').val();
		var unitqty = $('#cartunitqty').val();
		$( ".labels_input" ).each(function( index ) {
				 if($(this).val() !== ''){
					  if(unitqty == 'Labels'){
						  	var labels = parseInt($(this).val());
						  	var sheets = parseInt(labels/min_qty);
							$(this).parents('.upload_row').find('.displaysheets').text(sheets);
					  }else{
					   	 	var sheets = parseInt($(this).val());
						  	var labels = parseInt(sheets*min_qty);
							 
							$(this).parents('.upload_row').find('.displaysheets').text(labels);
					  }
					  total_labels+=labels;
					  total_sheets+=sheets;
				 }
		});

		if(total_sheets!='NaN'){
				if(unitqty == 'Labels' ){
						$('.total_user_labels').html(total_sheets);
						$('.total_user_sheet').html(total_labels);
				}else{
						$('.total_user_labels').html(total_labels);
						$('.total_user_sheet').html(total_sheets);
				}

				var labels = parseInt($('#acutal_labels').val());
				var acutal_qty = parseInt($('#acutal_qty').val());
				var labelspersheets = parseInt($('#labels_p_sheet').val());
				var reaming = parseInt(acutal_qty)-parseInt(total_sheets);
				if(reaming < 0){ $('.remaing_user_sheets').html('0');$('.remaing_user_labels').html('0'); }
				else{ 	
					if(unitqty == 'Labels' ){
							$('.remaing_user_sheets').html(reaming*labelspersheets); 
							$('.remaing_user_labels').html(reaming); 
					}else{
							$('.remaing_user_sheets').html(reaming); 
							$('.remaing_user_labels').html(reaming*labelspersheets); 
					}
				}
				$('#upload_remaining_labels').val(reaming); 
		}
}

$(document).on("click", ".save_artwork_file", function(e) {
	var _this = this;
	var cartid = $('#cartid').val();
	var prdid = $('#cartproductid').val();
	var labelpersheets = $('#labels_p_sheet').val();
	
	var type = 'a4';
	//var cartunitqty = $('#cartunitqty').val();
	var cartunitqty = "Sheets";
	var artworkname = $(_this).parents('.upload_row').find('.artwork_name').val();
	var file = $(_this).parents('.upload_row').find('.artwork_file').val();
	var uploadfile = $(_this).parents('.upload_row').find('.artwork_file')[0].files[0];
	
	var batch = parseInt($('.tabprinted').find('.plainsheet_unit').text());
	var min_qty = batch;
	var max_qty = 500000;
	var box_inp = $(_this).parents('.upload_row').find('.labels_input');
	 
	var response = '';
	
	if(cartunitqty == 'Labels'){
		var labels = $(_this).parents('.upload_row').find('.labels_input').val();
		if(labels.length==0){ 
			var id =$(_this).parents('.upload_row').find('.labels_input');
			var popover =  $(_this).parents('.upload_row').find('.popover').length;
			if(popover == 0){
				show_faded_popover(id, "Minimum "+labelpersheets+" labels are required ");
			}
			return false;
		}
		var sheets = parseInt(labels/labelpersheets);
		var lb_txt = 'labels';
	}else{
		var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
		if(sheets.length==0){ 
			var id = $(_this).parents('.upload_row').find('.labels_input');
			var popover =  $(_this).parents('.upload_row').find('.popover').length;
			if(popover == 0){
				show_faded_popover(id, "Minimum 1 sheet required");	
			}
			return false;
		}
		var labels = parseInt(sheets*labelpersheets);
		var lb_txt = 'sheets';
	}
	if(sheets == NaN || box_inp.val() == '')
	{
		box_inp.val(batch);
		show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
		return false;
	}
	else if(sheets < min_qty)
	{
		show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
		box_inp.val(min_qty);
		$(".labels_input").trigger("blur");
		return false;
	}
	else if(sheets > max_qty)
	{
		box_inp.val(max_qty);
		show_faded_popover(box_inp, "Maximum "+max_qty+" sheets allowed");
		$(".labels_input").trigger("blur");
		return false;
	}
	
	if(sheets%batch != 0)
	{
		if(batch == 250)
		{
			sheets = Math.round(sheets/250)*250;
		}
		else
		{
			sheets = Math.round(sheets/1000)*1000;
		}
		$(box_inp).val(sheets);
		show_faded_popover(box_inp, "Quantity has been round off to "+sheets);
		labels = parseInt(sheets*labelpersheets);
		$(".labels_input").trigger("blur");
		return false;
	}
	
	if(file.length==0){
			alert_box("Please upload a file before saving. ");
	}

	else if(labels==0 || labels==''){
			alert_box("Please complete line ");
	}

	else if(artworkname.length==0){
			alert_box("please enter artwork name! ");
	}
	else{
			var uploadfile = $(this).parents('.upload_row').find('.artwork_file')[0].files[0];
			var form_data = new FormData();                  
				form_data.append("file", uploadfile)
				form_data.append("cartid",cartid);
				form_data.append("productid",prdid);
				form_data.append("labels",labels);
				form_data.append("sheets",sheets);
				form_data.append("artworkname",artworkname);
				form_data.append("persheet",labelpersheets);
				form_data.append("type",type);
				form_data.append("unitqty",cartunitqty);
				type = uploadfile.type;
	
			if(type != 'image/tiff' && type != 'image/png' && type != 'image/jpg' && type != 'image/gif' && type != 'image/jpeg' && type != 'application/pdf' && type != 'application/postscript' ) {
				swal("Not Allowed","We apologise, because this file type cannot be uploaded. \n\n Please retry using one of the following file formats: EPS; GIF; JPEG; JPG; PDF & PNG","warning");
				return false;
			}else{
					upload_printing_artworks(form_data);
			}
	}
});

$(document).on("click", ".sheet_updater", function(event) {
			
	var id = $(this).attr('data-id');
	var _this = this;
	var cartid = $('#cartid').val();
	var prdid = $('#cartproductid').val();
	var labelpersheets = $('#labels_p_sheet').val();
	var type = 'a4';
	//var cartunitqty = $('#cartunitqty').val();
	var cartunitqty = "Sheets";
	
	var batch = parseInt($('.tabprinted').find('.plainsheet_unit').text());
	var min_qty = batch;
	var max_qty = 500000;
	var box_inp = $(_this).parents('.upload_row').find('.labels_input');
	
	var artwork_name = $(this).parents(".upload_row").find(".artwork_name").val();
	var artwork_field = $(this).parents(".upload_row").find(".artwork_name");

	if(artwork_name == "")
	{
		show_faded_popover(artwork_field, "Please enter artwork name");
		return false;
	}
	
	if(cartunitqty == 'Labels'){
		var labels = $(_this).parents('.upload_row').find('.labels_input').val();
		if(labels.length==0 || labels == 0 || labels == ''){ 
			var id =$(_this).parents('.upload_row').find('.labels_input');
			var popover =  $(_this).parents('.upload_row').find('.popover').length;
			if(popover == 0){
				show_faded_popover(id, "Minimum "+labelpersheets+" labels are required ");
			}
			return false;
		}
			var sheets = parseInt(labels/labelpersheets);
	}else{
			var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
			if(sheets.length==0 || sheets == 0 || sheets == ''){ 	 
				var id =$(_this).parents('.upload_row').find('.labels_input');
				var popover =  $(_this).parents('.upload_row').find('.popover').length;
				if(popover == 0){
					show_faded_popover(id, "Minimum 1 sheet required ");	
				}
				return false;
			}
			var labels = parseInt(sheets*labelpersheets);
	}
	
	if(sheets == NaN || box_inp.val() == '')
	{
		box_inp.val(batch);
		show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
		return false;
	}
	else if(sheets < min_qty)
	{
		show_faded_popover(box_inp, "Minimum "+batch+" sheets allowed");
		box_inp.val(min_qty);
		$(".labels_input").trigger("blur");
		return false;
	}
	else if(sheets > max_qty)
	{
		box_inp.val(max_qty);
		show_faded_popover(box_inp, "Maximum "+max_qty+" sheets allowed");
		$(".labels_input").trigger("blur");
		return false;
	}
	
	if(sheets%batch != 0)
	{
		if(batch == 250)
		{
			sheets = Math.round(sheets/250)*250;
		}
		else
		{
			sheets = Math.round(sheets/1000)*1000;
		}
		$(box_inp).val(sheets);
		show_faded_popover(box_inp, "Quantity has been round off to "+sheets);
		labels = parseInt(sheets*labelpersheets);
		$(".labels_input").trigger("blur");
		return false;
	}
	
	$.ajax({
	
				url: base+'ajax/update_material_artworks',
				type:"POST",
				async:"false",
				dataType: "html",
				data:{
					 id:id,
					 cartid:cartid,
					 productid:prdid,
					 labels:labels,
					 sheets:sheets,
					 persheet:labelpersheets,
					 type:type,
					 unitqty:cartunitqty,
					 artwork_name:artwork_name,
				},
				success: function(data){
					data = $.parseJSON(data); 	
					if(!data==''){
						update_printed_quantity_box(data.qty, data.designs);
						$('#ajax_upload_content').html(data.content);
						intialize_progressbar();
					}
				 }  
		});
});


function upload_printing_artworks(form_data){
	$.ajax({
		url: base+'ajax/upload_material_artworks',
		type:"POST",
		async:"false",
		dataType: "html",
		cache:false,
		contentType: false,
		processData: false,
		data:form_data,
		beforeSend: function() {
			$( "#upload_pecentage" ).html(' &nbsp;0%');
			$( "#upload_progress" ).show();
			$('.save_artwork_file').prop('disabled', true);
		},
		xhr: function() {
			var myXhr = $.ajaxSettings.xhr();
			if(myXhr.upload){
				myXhr.upload.addEventListener('progress',progress, false);
			}
			return myXhr;
		},
		error: function(data){
				swal('Some error occured please try again');
				intialize_progressbar();
				$( "#upload_progress" ).hide();
				$('.save_artwork_file').prop('disabled', false);
		},
	
		success: function(data){
			$('.save_artwork_file').prop('disabled', false);
			data = $.parseJSON(data); 
			if(data.response=='yes'){
					$('#ajax_upload_content').html(data.content);
					update_printed_quantity_box(data.qty, data.designs);
					intialize_progressbar();
					$( "#upload_progress" ).hide();
			}else{
					swal('upload failed',data.message, 'error');
					intialize_progressbar();
					$( "#upload_progress" ).hide();
					$('.save_artwork_file').prop('disabled', false);
			}
	 }  
	});

}

function update_printed_quantity_box(qty, designs){
	var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
	$(parent_selector).parents('.productdetails').find('#uploadedartworks_'+product_id).val(designs);
	var unitqty =  'sheets';
	//var unitqty =  $(parent_selector).parents('.productdetails').find('.printedsheet_unit').text();
	var labels =  $(parent_selector).parents('.productdetails').find('.LabelsPerSheet').val();
	unitqty = $.trim(unitqty);
	if(unitqty =='Labels'){
			var sheets = parseInt(qty/labels);
	}else{
			var sheets = qty;
	}
	$(parent_selector).parents('.productdetails').find('#uploadedartworks_'+product_id).attr('data-qty', sheets);
	var old_quantity = parseInt($(parent_selector).parents('.productdetails').find('.tabprinted').find('.box_size').val());	
	if(qty > 0){
		 //$(parent_selector).parents('.productdetails').find('.printedsheet_input').val(qty);
		 $(parent_selector).parents('.productdetails').find('.tabprinted').find('.box_size').val(qty);
		 reset_print_input_buttons(parent_selector);
	}
	update_artwork_upload_btn(parent_selector, designs);
}
function update_artwork_upload_btn(_this, designs){
	if(designs > 0){
			var Artwork = 'Artwork';
			if(designs > 1){
				var Artwork = 'Artworks';
			}
			$(_this).parents('.productdetails').find('.artwork_uploader').switchClass('art-btn','art-btn-l');
			var btnhtml ='<div class="row"><div class="col-xs-4"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>';
				btnhtml +='<div class="col-xs-8"><b>'+designs+' '+Artwork+' Uploaded </b>';
				btnhtml +='<small>Click here to upload further<br>artworks, view or edit.</small></div></div>';
				$(_this).parents('.productdetails').find('.artwork_uploader').html(btnhtml);
	}else{
		    $(_this).parents('.productdetails').find('.artwork_uploader').switchClass('art-btn-l','art-btn');
			var btnhtml = '<i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Click here to Upload Your Artwork';
			$(_this).parents('.productdetails').find('.artwork_uploader').html(btnhtml);
	}
}
function progress(e){
    if(e.lengthComputable){
		var max = e.total;
        var current = e.loaded;
		var Percentage = Math.ceil((current * 100)/max);
		$( "#progressbar" ).progressbar( "option", "value", Percentage );
		$( "#upload_pecentage" ).html(' &nbsp;'+Percentage+'%');

        if(Percentage >= 100)
        {
          	$( "#progressbar" ).progressbar( "option", "value", 100 );
			$( "#upload_pecentage" ).html(' &nbsp;100%'); 
        }
    }  
}
function intialize_progressbar(){
	$("#progressbar").progressbar({
		value: 0,
		create: function( event, ui ) {
			$(this).removeClass("ui-corner-all").addClass('progress').find(">:first-child").removeClass("ui-corner-left").addClass('progress-bar progress-bar-success');
		}
	});
}


function reset_plain_input_buttons(_this){
		$(_this).parents('.productdetails').find('.plainprice_box').hide();
		$(_this).parents('.productdetails').find('.add_integrate').hide();
		$(_this).parents('.productdetails').find('.plain_save_txt').hide();
		$(_this).parents('.productdetails').find('.addprintingoption').hide();
		$(_this).parents('.productdetails').find('.calculate_plain').show();
}

function reset_print_input_buttons(_this){
		$(_this).parents('.productdetails').find('.printedprice_box').hide();
		$(_this).parents('.productdetails').find('.add_integrate').hide();
		$(_this).parents('.productdetails').find('.calculate_printed').show();
		
}
function is_numeric(mixed_var) {
    var whitespace =
    " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    return (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -
        1)) && mixed_var !== '' && !isNaN(mixed_var);
}
</script> 