<!-- New Printed Labels CSS Start -->
<style>
   /* The container */
   .containerr {
       display: block;
       position: relative;
       padding-left: 15px;
       margin-bottom: 12px;
       cursor: pointer;
       font-weight: normal;
       font-size: 12px;
       color: #333;
       -webkit-user-select: none;
       -moz-user-select: none;
       -ms-user-select: none;
       user-select: none;
   }
   /* Hide the browser's default radio button */
   .containerr input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
  }
  /* Create a custom radio button */
  .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 12px;
      width: 12px;
      background-color:#fff;
border: 1px solid #999;
  }
  /* On mouse-over, add a grey background color */
  .containerr:hover input ~ .checkmark {
      background-color: #00b7f1;
  }
  /* When the radio button is checked, add a blue background */
  .containerr input:checked ~ .checkmark {
      background-color:#fff;
      border: 1px solid #999;
  }
  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
      content: "";
      position: absolute;
      display: none;
  }
  /* Show the indicator (dot/circle) when checked */
  .containerr input:checked ~ .checkmark:after {
      display: block;
  }
  /* Style the indicator (dot/circle) */
  .containerr .checkmark:after {
    top: 1px;
    left: 1px;
    width: 8px;
    height: 8px;
    background:#00b7f1;
}
.blue-tag {
    height: 43px;
    width: auto !important;
    color: #000;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    padding-top: 7px;
    margin-right: 10px;
    border: 1px solid #16b1e6;
    vertical-align: middle;
    background: none;
    border-radius: 4px;
}

.incpadding {
    padding: 10px 12px !important;
}
.f12{
    font-size: 12px;
    width: 210px;
}
.margin-top-20{
    margin-top: 20px;
}
.product-heading-printed-labels{
    font-size: 12px;
    font-weight: bold;
    color:#00b7f1;
}
.f14-printedlabels{
    font-size: 14px;
}
.f16-printedlabels{
    font-size: 16px;
}
.f12-labels{
    font-size: 12px;
}
.mt-15{
    margin-top: 15px;
}
.SpecialLblHead {
    font-size: 13px !important;
}

.InfinityNumber {
    font-size: 30px;
    color: #333333;
}

.rTapNumber327505 {
    font-size: 30px;
    color: #333333;
}

.nopadding {
    padding-left: 0 !important;
}

.SpecialLabelContainer {
    padding: 20px;
    margin-bottom: 15px;
}

.bg-n-border-radius {
    border-radius: 5px;
    background-color: white;
    box-shadow: 0 4px 0 #848484;
    display: block;
    transition: border 0.2s ease-in-out;
}

.lba-header {
    background-image: none;
    border-top: solid 1px #ececec;
    padding: 20px 0px;
}

.lba-header h2 {
    color: #16b1e6;
    text-shadow: none;
}

.lba-header p {
    color: #333333;
    text-shadow: none;
}

.SpecialLabelContainer h3 {
    font-weight: bold;
    color: #16b1e6;
    margin: 0;
    font-size: 22px;
    margin-bottom: 20px;
}

.SpecialLabelGray {
    background: #f2f2f2;
    padding: 20px;
}

.SpecialLabelGray h4 {
    color: #333333;
    font-weight: bold;
    border-bottom: solid 1px #cccccc;
    padding-bottom: 20px;
    margin-bottom: 0;
}

.SpecialLabelGray p {
    padding: 20px 0;
    margin-bottom: 0px;
    text-align: justify;
}

.SpecialLbl-ReadMoreBtn {
    float: left;
    margin-bottom: 10px;
}

.ReadMore-Special {
    padding: 10px 20px !important;
}

.SpecialLbl-BuyNow button {
    padding: 10px 20px !important;
    margin-top: 0;
}

.ReadMoreMain {
    background: #A7A7A7;
    padding: 17px;
    color: #fff;
    float: left;
    position: absolute;
    top: 0;
    right: 0;
    display: none;
    cursor: default;
    height: 245px;
    width: 100%;
    padding-right: 30px;
}

.ReadMoreMain p {
    padding: 0 !important;
}

.ReadMoreMain span {
    margin-right: 55px;
}

.ReadMoreClose {
    position: absolute;
    right: 5px;
    top: 5px;
    font-size: 14px;
    background: #fd4913;
    border-radius: 20px;
    border: 1px solid #dd3705;
    width: 22px;
    text-align: center;
    line-height: 18px;
    height: 22px;
    cursor: pointer;
}

.HeatResistLbl {
    height: 405px;
}

.ReadMoreMain ul li {
    line-height: 1.35;
}

.AdhesivesLbl {
    height: 520px;
}

.WaterResist {
    margin: 20px 0;
}

.WaterresistLbl {
    height: 317px;
}

.DissolvingLbl {
    height: 295px;
}

.HazchemLbl {
    height: 265px;
}

.WineLbl {
    height: 265px;
}

@media screen and (min-width: 1024px) and (max-width: 1024px) {
    .CryogenicLbl {
        margin-top: -16px;
        height: 260px;
    }
}

@media screen and (min-width: 577px) and (max-width: 768px) {
    .CryogenicLbl {
        height: 310px;
    }

    .HeatResistLbl {
        height: 565px;
    }

    .DissolvingLbl {
        height: 400px;
    }

    .SecurityLbl {
        height: 265px;
    }

    .WeatherproofLbl {
        height: 275px;
    }

    .AdhesivesLbl {
        height: 740px;
    }

    .WaterresistLbl {
        height: 420px;
    }

    .HazchemLbl {
        height: 355px;
    }

    .WineLbl {
        height: 340px;
    }

    .BlackoutLbl {
        height: 310px;
    }

    .GlossfinshLbl {
        height: 320px;
    }

    .FilmicLbl {
        height: 300px;
    }

    .RecycledLbl {
        height: 265px;
    }

    .RemoveableLbl {
        height: 320px;
    }
}

@media screen and (max-width: 576px) {
    .SpecialLabelGray {
        padding: 10px;
    }

    .nopadding {
        padding: 0 !important;
    }

    .SpecialLabelGray p {
        text-align: justify;
    }

    .SpecialLabelGray h4 {
        padding-bottom: 10px !important;
    }

    .ReadMoreMain span {
        margin-right: 0;
    }

    .ReadMore-Special {
        padding: 10px !important;
    }

    .CryogenicLbl {
        height: 575px;
        /*overflow: scroll;*/
    }

    .HeatResistLbl {
        height: 1105px;
        overflow: scroll;
    }

    .DissolvingLbl {
        height: 757px;
        overflow: scroll;
    }

    .FabricLbl {
        height: 542px;
        overflow: scroll;
    }

    .SecurityLbl {
        height: 561px;
        overflow: scroll;
    }

    .WeatherproofLbl {
        height: 560px;
        overflow: scroll;
    }

    .AdhesivesLbl {
        height: 1582px;
        /*height: 890px;*/
        overflow: scroll;
    }

    .WaterresistLbl {
        height: 710px;
        overflow: scroll;
    }

    .HazchemLbl {
        height: 635px;
        overflow: scroll;
    }

    .WineLbl {
        height: 611px;
        overflow: scroll;
    }

    .BlackoutLbl {
        height: 607px;
        overflow: scroll;
    }

    .GlossfinshLbl {
        height: 650px;
        overflow: scroll;
    }

    .FilmicLbl {
        height: 615px;
        overflow: scroll;
    }

    .RecycledLbl {
        height: 560px;
        overflow: scroll;
    }

    .RemoveableLbl {
        height: 633px;
        /*overflow: scroll;*/
    }

    .OnMobileLbl {
        margin-top: 10px !important;
    }

    .ReadMoreMain {
        padding-top: 30px;
        padding-right: 17px;
    }

    .ReadMoreClose {
        top: 5px;
    }

    .blue-tag {
        margin-right: 0px;
    }
}

@media screen and (max-width: 360px) {
    .CryogenicLbl {
        height: 425px;
        overflow: scroll;
    }

    .HeatResistLbl {
        height: 828px;
        overflow: scroll;
    }

    .DissolvingLbl {
        height: 592px;
        overflow: scroll;
    }

    .FabricLbl {
        height: 412px;
        overflow: scroll;
    }

    .SecurityLbl {
        height: 412px;
        overflow: scroll;
    }

    .WeatherproofLbl {
        height: 430px;
        overflow: scroll;
    }

    .AdhesivesLbl {
        height: 1200px;
        overflow: scroll;
    }

    .WaterresistLbl {
        height: 498px;
        overflow: scroll;
    }

    .HazchemLbl {
        height: 487px;
        overflow: scroll;
    }

    .WineLbl {
        height: 498px;
        overflow: scroll;
    }

    .BlackoutLbl {
        height: 412px;
        overflow: scroll;
    }

    .GlossfinshLbl {
        height: 520px;
        overflow: scroll;
    }

    .FilmicLbl {
        height: 483px;
        overflow: scroll;
    }

    .RecycledLbl {
        height: 430px;
        overflow: scroll;
    }

    .RemoveableLbl {
        height: 502px;
        overflow: scroll;
    }
}

.whiteBg2 {
    display: none !important;
}

/**** NEW CODE ****/
.blue-tag small {
    display: block;
    font-size: 11px;
    font-weight: normal;
    margin-top: -4px;
}

.blue-tag {
    height: 53px;
}

.ReadMore-Special {
    padding: 16px 20px !important;
}

.incpadding {
    padding: 16px 12px !important;
}

@media screen and (max-width: 1024px) {
    .blue-tag small {
        font-size: 10px;
    }
}

@media screen and (max-width: 480px) {
    .blue-tag {
        margin-top: 10px;
    }
}
</style>
<!-- New Printed Labels CSS End -->
<div class="container m-t-b-8 ">
    <div class="row">
        <div class="col-xs-12  col-sm-6 col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Specialist Label Materials</li>
            </ol>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 "></div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <!-- start -->
        <div class="row">
            <div class="bg-n-border-radius SpecialLabelContainer col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn-block btn blue2 step-back f12" data-value="1" role="button"> <i class="fa fa-chevron-left"></i> Back to Material & Quantity </a>
                    </div>
                </div>
                <div class="row margin-top-20">
                    <div class="col-md-9">
                        <div class="col-md-2"><img onerror='imgError(this);' class="img-responsive" src="<?= Assets ?>images/categoryimages/RollLabels/RC000205.jpg"></div>    
                        <div class="col-md-9">
                            <span class="product-heading-printed-labels">Fluorescent Green Paper</span><br>
                            <span>Roll Labels<br>
                                Product Code: RR210297, Label Size (mm): 210 x 294,<br>
                                Rectangular, Corner Radius: Round 1 mm Radius.<br>
                            Permanent Adhesive.</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row f14-printedlabels">
                            <div class="col-md-7">
                                <span>Number of Rolls</span><br>
                                <span>Label Per Roll</span><br>
                                <span>Total number of labels</span>
                            </div>
                            <div class="col-md-2">
                                <span>:</span><br>
                                <span>:</span><br>
                                <span>:</span>
                            </div>
                            <div class="col-md-3 text-right">
                                <span>5</span><br>
                                <span>1000</span><br>
                                <span>5000</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row f16-printedlabels">
                            <div class="col-md-7">
                                <span>Plain Labels</span><br>
                            </div>
                            <div class="col-md-2">
                                <span></span><br>
                            </div>
                            <div class="col-md-3 text-right">
                                <span>£13.55</span><br>
                            </div>
                        </div>
                        <div class="row text-right">
                            <span class="col-md-12 f12-labels">3000 Labels 0.083 per label</span>
                        </div>
                    </div>
                </div>
                <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group mt-15">
                    <div class="panel panel-default" style="box-shadow: none !important;">
                        <div id="headingOne" role="tab" class="panel-title_gray">
                            <div class=""><a role="button" >
                                Select Digital Printing Process
                            </a></div>
                        </div>
                        <div class="panel-collapse collapse in">
                            <div class="panel-body">
                                <label class="containerr">One
                                  <input type="radio" checked="checked" name="radio">
                                  <span class="checkmark"></span>
                              </label>
                              <label class="containerr">Two
                                  <input type="radio" name="radio">
                                  <span class="checkmark"></span>
                              </label>
                              <label class="containerr">Three
                                  <input type="radio" name="radio">
                                  <span class="checkmark"></span>
                              </label>
                              <label class="containerr">Four
                                  <input type="radio" name="radio">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default" style="box-shadow: none !important;">
                    <div id="headingTwo" role="tab" class="panel-title_gray">
                        <div><a aria-controls="collapse24" aria-expanded="false" href="#collapse24" data-parent="#accordion" data-toggle="collapse" role="button" class="collapsed"> <i class="fa fa-info-circle"></i>
                        Do you offer volume discounts? </a></div>
                    </div>
                    <div aria-labelledby="heading24" role="tabpanel" class="panel-collapse collapse" id="collapse24" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="pull-right"><i class="fa f-100 fa fa-tag "></i></div>
                            <p>Yes all of our label and print prices include volume
                                related price breaks, which means that the more you
                                order the lower the unitary price and the greater
                            the value for money of your purchase.</p>
                            <p>The price breaks will display each time that you
                                enter a sheet or roll quantity, enabling you to see
                            the next volume discount.</p>
                            <p>
                            </p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <div class="printed-lba-call ">
            <div class="container ">
                <div class="col-md-8 col-sm-8 col-lg-9">
                    <h2>INFORMATION &amp; ADVICE<br>
                        <small>We’re here to help</small></h2>
                        <p class="text-justify">If you need assistance or advice regarding our delivery and shipping options. Please
                            contact our customer care team via the live chat facility on the page, our website contact form,
                        telephone, or email and they will be happy to discuss your delivery requirements.</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-3"><img onerror='imgError(this);' class="img-responsive"
                        src="<?= Assets ?>images/header/call_opr_1.png"></div>
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
        <script>
            function readMore(readMoreId) {
                $("#" + readMoreId).show();
            }

            $('body').click(function (e) {
                if (!$(e.target).hasClass('readMore-btn')) {
                    $(".ReadMoreMain").hide();
                }
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>