<style>
    .modal-link {
        cursor: pointer;
    }

    .small, small {
        font-size: 75%;
    }
</style>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Delivery</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="printed-lba-a4 ">
    <div class="container ">
        <div class="col-md-8 col-sm-8  ">
             <h1>DELIVERY OPTIONS</h1>
            <p class="text-justify"> We offer a free delivery service on all plain and printed label orders (excluding
                Integrated Label Sheets) over
                <?= symbol . $this->home_model->currecy_converter(25, 'no'); ?>
                Inc. VAT in the UK (mainland only, excluding exception postcodes and NI). If you need your plain label
                order fulfilled faster, there are a range of other next-day delivery options available as shown
                below.</p>
            <p class="text-justify">We also deliver throughout Europe and countries elsewhere in the world as shown in
                the lists provided on this page.</p>
            <p class="text-justify">Our delivery service is provided by a leading international courier company with an
                extensive UK network and an unrivalled ground based service to Europe, plus an air-express service to
                the rest of the world. With a choice to track and amend your delivery options en-route, you order is
                safe and securely delivered.</p>
        </div>
        <div class="col-md-4 col-sm-4 m-t-s-25 m-t-m-3"><img onerror='imgError(this);' alt="Delivery"
                                                             class="img-responsive"
                                                             src="<?= Assets ?>images/header/delivery.PNG"></div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-8 col-md-8 col-lg-9">
                <div class="thumbnail p-l-r-10">
                    <div class="m-t-10">
                        <div class="table-responsive ">
                            <table class="table table-bordered table-hover">
                                <thead class="bgBlueHeading">
                                <tr>
                                    <th class="text-center" style="width:40%;border-right:1px solid #fff !important;"
                                        colspan="2">Delivery Option
                                    </th>
                                    <th class="text-center" style="width:25%;border-right:1px solid #fff !important;">
                                        Description
                                    </th>
                                    <th class="text-center" style="width:20%;border-right:1px solid #fff !important;">
                                        Delivery Time
                                    </th>
                                    <th class="text-center" style="width:15%;">Cost
                                        <?= vatoption ?>
                                        VAT
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);'
                                                                 alt="Free Delivery Plain & Printed Labels " width="52"
                                                                 height="53" src="<?= Assets ?>images/free_i.png"></th>
                                    <td>Free Delivery Plain & Printed Labels <br/>
                                        <small>(Excluding Integrated Labels)</small></td>
                                    <td>UK Mainland only; <br>
                                        Orders must be over
                                        <?= symbol . $this->home_model->currecy_converter(25, 'no'); ?>
                                        (inc VAT)
                                    </td>
                                    <td>3-5 Working Days</td>
                                    <td><strong class="textOrange">
                                            <?= symbol ?>
                                            0.00</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' alt="Next Working Day"
                                                                 width="52" height="53"
                                                                 src="<?= Assets ?>images/nextday_i.png"></th>
                                    <td>Next Working Day<br>
                                        Plain Labels <small>(For Integrated Labels the price for next day
                                            delivery will be shown on the checkout pages.)</small></td>
                                    <td>UK Mainland only; <br>
                                        Order must be placed before 16:00
                                    </td>
                                    <td>Next Working Day <br>
                                        08:00 to 18:00
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(5, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);'
                                                                 alt="Next Working Day/Pre 10:30" width="52" height="53"
                                                                 src="<?= Assets ?>images/pre-10_i.png"></th>
                                    <td>Next Working Day/Pre 10:30 <br>
                                        Plain Labels <small>(For Integrated Labels the price for this delivery service
                                            will be shown on the checkout pages.)</small></td>
                                    <td>UK Mainland only; <br>
                                        Order must be placed before 16:00
                                    </td>
                                    <td>Next Working Day <br>
                                        before 10:30
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(15.50, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Next Working Day/Pre 12:00"
                                                                 src="<?= Assets ?>images/pre-12_i.png"></th>
                                    <td>Next Working Day/Pre 12:00<br>
                                        Plain Labels <small>(For Integrated Labels the price for this delivery service
                                            will be shown on the checkout pages.)</small></td>
                                    <td>UK Mainland only;<br>
                                        Order must be placed before 16:00
                                    </td>
                                    <td>Next Working Day <br>
                                        before 12:00
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(10, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Saturday" src="<?= Assets ?>images/sat.png"></th>
                                    <td>Saturday<br>
                                        Plain Labels <small>(For Integrated Labels the price for this delivery service
                                            will be shown on the checkout pages.)</small></td>
                                    <td>UK Mainland only. Order must be placed before 16:00 on the preceeding Friday
                                    </td>
                                    <td>Between 09:00 and 18:00</td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(15.50, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Saturday Pre-10:30"
                                                                 src="<?= Assets ?>images/sat.png"></th>
                                    <td>Saturday Pre-10:30<br>
                                        Plain Labels <small>(For Integrated Labels the price for this delivery service
                                            will be shown on the checkout pages.)</small></td>
                                    <td>UK Mainland only. Order must be placed before 16:00 on the preceding Friday.
                                    </td>
                                    <td>Before 10:30</td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(25, 'yes'); ?>
                                        </strong><br/></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Saturday Pre-12:00"
                                                                 src="<?= Assets ?>images/sat.png"></th>
                                    <td>Saturday Pre-12:00<br>
                                        Plain Labels <small>(For Integrated Labels the price for this delivery service
                                            will be shown on the checkout pages.)</small></td>
                                    <td>UK Mainland only. Order must be placed before 16:00 on the preceding Friday.
                                    </td>
                                    <td>Before 12:00</td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(18, 'yes'); ?>
                                        </strong><br/></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Free Delivery"
                                                                 src="<?= Assets ?>images/free_i.png"></th>
                                    <td>Free Delivery <br>
                                        Plain & Printed Labels <small>(Excluding Integrated Labels)</small></td>
                                    <td>UK Exception Postcodes<br>
                                        Orders must be over
                                        <?= symbol . $this->home_model->currecy_converter(100, 'no'); ?>
                                        (inc VAT)
                                    </td>
                                    <td>3-5 Working Days</td>
                                    <td><strong class="textOrange">
                                            <?= symbol ?>
                                            0.00</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Integrated Labels"
                                                                 src="<?= Assets ?>images/free_i.png"></th>
                                    <td>Integrated Labels</td>
                                    <td>Integrated Labels Delivery Rates<br/>
                                        <a class="modal-link" data-toggle="modal"
                                           data-target="#IntegratedLabelsDelivery"> View details </a></td>
                                    <td>3-5 Working Days</td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(5.00, 'no'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="3-5 Working Days"
                                                                 src="<?= Assets ?>images/free_i.png"></th>
                                    <td>Integrated Labels</td>
                                    <td>Integrated Labels Delivery Rates for International Orders<br/>
                                        <a class="modal-link" data-toggle="modal"
                                           data-target="#IntegratedLabelsDeliveryOffshore"> View details </a></td>
                                    <td>3-5 Working Days</td>
                                    <td>Varies<br/>
                                        <a class="modal-link" data-toggle="modal"
                                           data-target="#IntegratedLabelsDeliveryOffshore"> View list </a></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="UK Exception Postcodes"
                                                                 src="<?= Assets ?>images/delivery_i.png"></th>
                                    <td>UK Exception Postcodes <br/>
                                        Plain & Printed Labels <small>(For Integrated Labels the price for this delivery
                                            service will be shown on the checkout pages.)</small></td>
                                    <td>This charge applies if the delivery postcode is in a location that is considered
                                        to be a
                                        2 day standard service by the courier companies used for delivery. <br/>
                                        <a class="modal-link" data-toggle="modal" data-target="#UKException2day"> View
                                            list </a></td>
                                    <td>2 Working Days <br>
                                        Between 09:00 and 18:00
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(12.50, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Next Working Day UK"
                                                                 src="<?= Assets ?>images/nextday_i.png"></th>
                                    <td>Next Working Day UK Exception Postcodes Plain Labels<br/>
                                        <small>(For Integrated Labels the price for this delivery service will be shown
                                            on the checkout pages.)</small></td>
                                    <td>This additional charge applies if the UK Exception Postcode is eligible for next
                                        day delivery. Please refer to the list below. <br/>
                                        <a data-target="#UKException" data-toggle="modal" class="modal-link"> View
                                            list </a></td>
                                    <td>Next Working Day <br/>
                                        08:00 – 18:00
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(24, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Free Delivery Plain & Printed Labels"
                                                                 src="<?= Assets ?>images/free_i.png"></th>
                                    <td>Free Delivery Plain & Printed Labels<br/>
                                        <small>(Excluding Integrated Labels)</small></td>
                                    <td>UK offshore Postcodes<br>
                                        Orders must be over
                                        <?= symbol . $this->home_model->currecy_converter(100, 'no'); ?>
                                        (inc VAT)
                                    </td>
                                    <td>3-5 Working Days</td>
                                    <td><strong class="textOrange">
                                            <?= symbol ?>
                                            0.00</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Standard Delivery Plain & Printed Labels"
                                                                 src="<?= Assets ?>images/2-days_i.png"></th>
                                    <td>Standard Delivery Plain & Printed Labels<br/>
                                        <small>(For Integrated Labels the price for this delivery service will be shown
                                            on the checkout pages.)</small></td>
                                    <td>For all UK offshore post codes.<br/>
                                        <a class="modal-link" data-toggle="modal" data-target="#UKOffshoreIreland"> View
                                            list </a></td>
                                    <td>2 Working Days <br>
                                        between 08:00 and 18:00
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(12.5, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Next Working Day Delivery Plain Labels"
                                                                 src="<?= Assets ?>images/nextday_i.png"></th>
                                    <td>Next Working Day Delivery Plain Labels<br/>
                                        <small>(For Integrated Labels the price for this delivery service will be shown
                                            on the checkout pages.)</small></td>
                                    <td>For all UK offshore post codes. <br/>
                                        <a data-target="#UKOffshoreIrelandB" data-toggle="modal" class="modal-link">
                                            View list </a></td>
                                    <td>Next Working Day <br/>
                                        08:00 – 18:00
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(24, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Free Delivery Plain & Printed Labels"
                                                                 src="<?= Assets ?>images/free_i.png"></th>
                                    <td>Free Delivery Plain & Printed Labels<br/>
                                        <small>(Excluding Integrated Labels)</small></td>
                                    <td>Northern Ireland Postcodes<br>
                                        Orders must be over
                                        <?= symbol . $this->home_model->currecy_converter(75, 'no'); ?>
                                        (inc VAT)
                                    </td>
                                    <td>3-5 Working Days</td>
                                    <td><strong class="textOrange">
                                            <?= symbol ?>
                                            0.00</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="Standard Delivery Plain & Printed Labels"
                                                                 src="<?= Assets ?>images/2-days_i.png"></th>
                                    <td>Standard Delivery Plain & Printed Labels<br/>
                                        <small>(For Integrated Labels the price for this delivery service will be shown
                                            on the checkout pages.)</small></td>
                                    <td>Northern Ireland From date of order placed before 16:00<br/>
                                        <a data-target="#IrelandPostCodes" data-toggle="modal" class="modal-link"> View
                                            list </a></td>
                                    <td>2 Working Days<br>
                                        08:00 – 18:00
                                    </td>
                                    <td><strong class="textOrange">
                                            <?= symbol . $this->home_model->currecy_converter(10, 'yes'); ?>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="EU & Europe Plain & Printed Labels"
                                                                 src="<?= Assets ?>images/2-5days_i.png"></th>
                                    <td>EU & Europe Plain & Printed Labels<br/>
                                        <small>(For Integrated Labels the price for this delivery service will be shown
                                            on the checkout pages.)</small></td>
                                    <td>For delivery charges to countries in EU & Europe. <a
                                                data-target="#Europedelivery" data-toggle="modal" class="modal-link">
                                            View list </a></td>
                                    <td>Varies <br>
                                        <a data-target="#Europedelivery" data-toggle="modal" class="modal-link"> View
                                            list </a></td>
                                    <td>Varies <br>
                                        <a data-target="#Europedelivery" data-toggle="modal" class="modal-link"> View
                                            list </a></td>
                                </tr>
                                <tr>
                                    <th class="text-center"><img onerror='imgError(this);' width="52" height="53"
                                                                 alt="ROW Plain & Printed Labels"
                                                                 src="<?= Assets ?>images/2-5days_i.png"></th>
                                    <td>ROW<br/>
                                        Plain & Printed Labels<br/>
                                        <small>(For Integrated Labels the price for this delivery service will be shown
                                            on the checkout pages.)</small></td>
                                    <td>For delivery charges to ROW. <a data-target="#Rowdelivery" data-toggle="modal"
                                                                        class="modal-link"> View list </a></td>
                                    <td>Varies <br>
                                        <a data-target="#Rowdelivery" data-toggle="modal" class="modal-link"> View
                                            list </a></td>
                                    <td>Varies <br>
                                        <a data-target="#Rowdelivery" data-toggle="modal" class="modal-link"> View
                                            list </a></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="modal fade d-modal" id="UKException2day" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">UK Exception Postcodes</h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive ">
                                                    <table width="100%" class="table table-bordered table-striped">
                                                        <thead class="bgBlueHeading">
                                                        <tr>
                                                            <th class="" colspan="6" style="width:24%;"> DPD postcodes
                                                                two day service<br>
                                                                Locations considered remote e.g. Peninsulas and small
                                                                islands, might on
                                                                occasion take longer than two days for delivery.
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th width="18%" align="center" class="text-center">AB</th>
                                                            <td width="13%" align="center">31-35</td>
                                                            <td width="13%" align="center">41-54</td>
                                                            <td width="10%" align="center">&nbsp;</td>
                                                            <td width="14%" align="center">52</td>
                                                            <td width="32%" align="center">ABERDEEN</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">AB</th>
                                                            <td align="center">36-38</td>
                                                            <td align="center">55-56</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">83</td>
                                                            <td align="center">Scottish Highlands</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">FK</th>
                                                            <td align="center">17-21</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">85</td>
                                                            <td align="center">ARGYLL</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">G</th>
                                                            <td align="center">83</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">50</td>
                                                            <td align="center">GLASGOW</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">HS</th>
                                                            <td align="center">1-9</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">83</td>
                                                            <td align="center">Scottish Highlands</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">IV</th>
                                                            <td colspan="3" align="center">ALL</td>
                                                            <td align="center">83</td>
                                                            <td align="center">Scottish Highlands</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">KA</th>
                                                            <td align="center">27</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">86</td>
                                                            <td align="center">ARRAN</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">KA</th>
                                                            <td align="center">28</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">85</td>
                                                            <td align="center">ARGYLL</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">KW</th>
                                                            <td align="center">0-14</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">83</td>
                                                            <td align="center">Scottish Highlands</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">PA</th>
                                                            <td align="center">20-78</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">85</td>
                                                            <td align="center">ARGYLL</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">PH</th>
                                                            <td align="center">15-18</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">57</td>
                                                            <td align="center">DUNDEE</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">PH</th>
                                                            <td align="center">19-29</td>
                                                            <td align="center">32-33</td>
                                                            <td align="center">45-48</td>
                                                            <td align="center">83</td>
                                                            <td align="center">Scottish Highlands</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">PH</th>
                                                            <td align="center">30-31</td>
                                                            <td align="center"> 34-44</td>
                                                            <td align="center">49-99</td>
                                                            <td align="center">85</td>
                                                            <td align="center">ARGYLL</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade d-modal" id="UKException" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">UK Exception Postcodes</h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive ">
                                                    <table width="100%" class="table table-bordered table-striped">
                                                        <thead class="bgBlueHeading">
                                                        <tr>
                                                            <th class="" colspan="6" style="width:24%;">UK exception
                                                                post codes qualifying for DPD next day delivery.
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th width="18%" align="center" class="text-center">AB</th>
                                                            <td width="13%" align="center">31-35</td>
                                                            <td width="13%" align="center">41-54</td>
                                                            <td width="10%" align="center">&nbsp;</td>
                                                            <td width="14%" align="center">52</td>
                                                            <td width="32%" align="center">ABERDEEN</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">G</th>
                                                            <td align="center">83</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">50</td>
                                                            <td align="center">GLASGOW</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">HS</th>
                                                            <td align="center">1-9</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">83</td>
                                                            <td align="center">SCOTTISH HIGHLANDS</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">IV</th>
                                                            <td colspan="3" align="center">ALL</td>
                                                            <td align="center">83</td>
                                                            <td align="center">SCOTTISH HIGHLANDS</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">KA</th>
                                                            <td align="center">27</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">86</td>
                                                            <td align="center">ARRAN</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">KA</th>
                                                            <td align="center">28</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">85</td>
                                                            <td align="center">ARGYLL</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">PA</th>
                                                            <td colspan="2" align="center">21 &amp; 41 - 78</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">85</td>
                                                            <td align="center">ARGYLL</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">PH</th>
                                                            <td align="center">19-26</td>
                                                            <td align="center">32-33</td>
                                                            <td align="center">&nbsp;</td>
                                                            <td align="center">83</td>
                                                            <td align="center">SCOTTISH HIGHLANDS</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">PH</th>
                                                            <td colspan="3" align="center">49 - 50</td>
                                                            <td align="center">85</td>
                                                            <td align="center">ARGYLL</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade d-modal" id="UKOffshoreIreland" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">UK Offshore</h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive ">
                                                    <table width="100%" class="table table-bordered table-striped">
                                                        <thead class="bgBlueHeading">
                                                        <tr>
                                                            <th class="" colspan="6" style="width:24%;">DPD postcodes
                                                                two day service<br>
                                                                UK offshore
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th align="center" class="text-center">GY</th>
                                                            <td colspan="3" align="center">1 – 10</td>
                                                            <td align="center">72</td>
                                                            <td align="center">GUERNSEY (Inc. Alderney, Herm & Sark)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">IM</th>
                                                            <td colspan="3" align="center">1 – 9</td>
                                                            <td align="center">73</td>
                                                            <td align="center">ISLE OF MAN</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">JE</th>
                                                            <td colspan="4" align="center">2 – 3</td>
                                                            <td align="center">JERSEY</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">KW</th>
                                                            <td colspan="3" align="center">15-17</td>
                                                            <td align="center">82</td>
                                                            <td align="center">ORKNEY</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">TR</th>
                                                            <td colspan="3" align="center">21-25</td>
                                                            <td align="center">37</td>
                                                            <td align="center">ISLES OF SCILLY</td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" class="text-center">ZE</th>
                                                            <td colspan="3" align="center">1 – 3</td>
                                                            <td align="center">82</td>
                                                            <td align="center">SHETLAND</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade d-modal" id="UKOffshoreIrelandB" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">UK Offshore </h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive ">
                                                    <div class="table-responsive ">
                                                        <table width="100%" class="table table-bordered table-striped">
                                                            <thead class="bgBlueHeading">
                                                            <tr>
                                                                <th class="" colspan="6" style="width:24%;"> A next
                                                                    working day delivery service is only currently
                                                                    available for the Channel Islands
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th align="center" class="text-center">GY</th>
                                                                <td colspan="3" align="center">1 – 10</td>
                                                                <td align="center">72</td>
                                                                <td align="center">GUERNSEY (Inc. Alderney, Herm &
                                                                    Sark)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="center" class="text-center">JE</th>
                                                                <td colspan="4" align="center">2 – 3</td>
                                                                <td align="center">JERSEY</td>
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
                            <div class="modal fade d-modal" id="IrelandPostCodes" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Nothern Ireland</h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive ">
                                                    <div class="table-responsive ">
                                                        <table width="100%" class="table table-bordered table-striped">
                                                            <thead class="bgBlueHeading">
                                                            <tr>
                                                                <th colspan="6" style="width:24%;"> A next working day
                                                                    delivery service is only currently available for
                                                                    Nothern Ireland
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th align="center" class="text-center">BT</th>
                                                                <td colspan="4" align="center">1 – 17</td>
                                                                <td align="center">BELFAST</td>
                                                            </tr>
                                                            <tr>
                                                                <th align="center" class="text-center">BT</th>
                                                                <td colspan="4" align="center">18 – 28</td>
                                                                <td align="center">OTHER - NORTHERN IRELAND</td>
                                                            </tr>
                                                            <tr>
                                                                <th align="center" class="text-center">BT</th>
                                                                <td colspan="4" align="center">29</td>
                                                                <td align="center">BELFAST INTERNATIONAL AIRPORT &
                                                                    CRUMLIN
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="center" class="text-center">BT</th>
                                                                <td colspan="4" align="center">30 – 94</td>
                                                                <td align="center">OTHER – NORTHERN IRELAND</td>
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
                            <div class="modal fade d-modal" id="Europedelivery" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">European Union & Europe</h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive ">
                                                    <table width="100%" class="table table-bordered table-striped">
                                                        <thead class="bgBlueHeading">
                                                        <tr>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #fff !important;">Delivery
                                                                Option
                                                            </th>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #fff !important;">
                                                                Requirements
                                                            </th>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #fff !important;">Transit
                                                                Time
                                                            </th>
                                                            <th class="text-center">Cost Ex VAT</th>
                                                        </tr>
                                                        </thead>
                                                        <thead class="bgBlueHeading">
                                                        <tr>
                                                            <th colspan="4"
                                                                style="border-top:1px solid #fff !important;"
                                                                class="text-left">EUROPE - EU
                                                            </th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <? $europeunion_list = $this->shopping_model->grouped_country_list('EUROPEAN UNION');
                                                        foreach ($europeunion_list as $row) { ?>
                                                            <tr>
                                                                <td class="info" style="font-weight:bold;" colspan="4"
                                                                    align=""><?= ucfirst($row->name) ?></td>
                                                            </tr>

                                                            <?php
                                                            // (AA2 STARTS)
                                                            // IF COUNTRY NAME IS  "Spain - Canary Islands", THEN DO NOT SHOW FREE DELIVERY, ELSE SHOW FREE DELIVERY ON ALL COUNTRIES....
                                                            if ($row->name != 'Spain - Canary Islands') {
                                                                ?>
                                                                <tr>
                                                                    <td align="">Free Delivery</td>
                                                                    <td align="">
                                                                        <!-- <?= $row->name ?> - -->
                                                                        Orders must be over
                                                                        <?= symbol . $this->home_model->currecy_converter($row->freeorder_over, 'no'); ?>
                                                                        (Inc VAT)
                                                                    </td>
                                                                    <td style="vertical-align: middle;" rowspan="2"
                                                                        class="text-center">
                                                                        <?php
                                                                        if (empty($row->max_deliverydays)):
                                                                            echo $row->deliverydays;

                                                                        else:
                                                                            echo $row->deliverydays . ' - ' . $row->max_deliverydays;
                                                                        endif;
                                                                        ?>
                                                                        Working Days
                                                                    </td>
                                                                    <td class="text-center"><?= symbol ?>
                                                                        0.00
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            // (AA2 ENDS)
                                                            ?>


                                                            <tr>
                                                                <td align="">Paid Delivery</td>
                                                                <td align="">
                                                                    <?php
                                                                    if ($row->name != 'Spain - Canary Islands') {
//                                                                        echo "-";
                                                                        echo symbol . $charges = $this->home_model->currecy_converter($row->charges + $row->additional_charge, 'yes');
                                                                        echo " per parcel";
                                                                        if ($row->additional_charge > 0) {
                                                                            echo "( Including &pound; " . $row->additional_charge . " Custom Charges )";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>

                                                                <td class="text-center">
                                                                    <?php
                                                                    if ($row->name == 'Spain - Canary Islands'):
                                                                    echo "TBA/Quotation Req";
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    else:
                                                                        echo symbol . $charges;
                                                                    endif;
                                                                    ?>
                                                                </td>
                                                            </tr>

                                                            <? if ($row->name == 'Ireland') { ?>
                                                                <tr>
                                                                    <td align="">Next Working Day</td>
                                                                    <td align="">Plain Labels (For Integrated Labels the
                                                                        price for next day delivery
                                                                        will be shown on the checkout pages.)
                                                                    </td>
                                                                    <td class="text-center">Next Working Day 08:00 to
                                                                        18:00
                                                                    </td>
                                                                    <td class="text-center"> <?= symbol . $this->home_model->currecy_converter(25.00, 'yes'); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="">Next Working Day/Pre 12:00</td>
                                                                    <td align="">Plain Labels (For Integrated Labels the
                                                                        price for this delivery service will be shown on
                                                                        the checkout pages.)
                                                                    </td>
                                                                    <td class="text-center">Next Working Day before
                                                                        12:00
                                                                    </td>
                                                                    <td class="text-center"> <?= symbol . $this->home_model->currecy_converter(72.50, 'yes'); ?></td>
                                                                </tr>
                                                            <? } ?>

                                                        <? } ?>
                                                        <thead class="bgBlueHeading">
                                                        <tr>
                                                            <th colspan="4" class="text-left">EUROPE - OTHER</th>
                                                        </tr>
                                                        </thead>
                                                        <? $europe_list = $this->shopping_model->grouped_country_list('EUROPE');
                                                        foreach ($europe_list as $row) { ?>
                                                            <tr>
                                                                <td class="info" style="font-weight:bold;" colspan="4"
                                                                    align="">
                                                                    <?= $row->name ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="">Free Delivery</td>
                                                                <td align="">
                                                                    <!-- <?= $row->name ?> -->
                                                                    Orders must be over
                                                                    <?= symbol . $this->home_model->currecy_converter($row->freeorder_over, 'no'); ?>
                                                                    (Inc VAT)
                                                                </td>
                                                                <td rowspan="2" style="vertical-align: middle;"
                                                                    class="text-center">
                                                                    <?php
                                                                    if (empty($row->max_deliverydays)):
                                                                        echo $row->deliverydays;

                                                                    else:
                                                                        echo $row->deliverydays . ' - ' . $row->max_deliverydays;
                                                                    endif;
                                                                    ?>
                                                                    Working Days
                                                                </td>
                                                                <td class="text-center"><?= symbol ?>
                                                                    0.00
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="">Paid Delivery</td>
                                                                <td align="">
                                                                    <!-- <?= $row->name ?> - -->
                                                                    <?= symbol . $charges = $this->home_model->currecy_converter($row->charges + $row->additional_charge, 'yes'); ?>
                                                                    per parcel
                                                                    <? if ($row->additional_charge > 0) { ?>
                                                                        ( Including &pound;
                                                                        <?= $row->additional_charge ?>
                                                                        Custom Charges )
                                                                    <? } ?></td>
                                                                <!--                                                                <td class="text-center">--><? //= $row->deliverydays ?>
                                                                <!--                                                                    Working Days-->
                                                                <!--                                                                </td>-->
                                                                <td class="text-center"><?= symbol . $charges; ?></td>
                                                            </tr>
                                                        <? } ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade d-modal" id="Rowdelivery" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">ROW </h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive ">
                                                    <div class="table-responsive ">
                                                        <table width="100%" class="table table-bordered table-striped">
                                                            <thead class="bgBlueHeading">
                                                            <tr>
                                                                <th class="text-center"
                                                                    style="border-right:1px solid #fff !important;">
                                                                    Delivery Option
                                                                </th>
                                                                <th class="text-center"
                                                                    style="border-right:1px solid #fff !important;">
                                                                    Requirements
                                                                </th>
                                                                <th class="text-center"
                                                                    style="border-right:1px solid #fff !important;">
                                                                    Transit Time
                                                                </th>
                                                                <th class="text-center"
                                                                    style="border-right:1px solid #fff !important;">Cost
                                                                    Ex VAT
                                                                </th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?
                                                            $restofworld_list = $this->shopping_model->grouped_country_list('ROW');
                                                            foreach ($restofworld_list as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td class="info" style="font-weight:bold;"
                                                                        colspan="4" align=""><?= $row->name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="">Free Delivery</td>
                                                                    <td align="">
                                                                        Orders must be over
                                                                        <?= symbol . $this->home_model->currecy_converter($row->freeorder_over, 'yes'); ?>
                                                                        (Ex VAT)
                                                                    </td>
                                                                    <td rowspan="2" style="vertical-align: middle;"
                                                                        class="text-center">
                                                                        <?php
                                                                        if (empty($row->max_deliverydays)):
                                                                            echo $row->deliverydays;

                                                                        else:
                                                                            echo $row->deliverydays . ' - ' . $row->max_deliverydays;
                                                                        endif;
                                                                        ?>
                                                                        Working Days
                                                                    </td>
                                                                    <td class="text-center"><?= symbol ?>
                                                                        0.00
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="">Paid Delivery</td>
                                                                    <td align="">
                                                                        <?= symbol . $charges = $this->home_model->currecy_converter($row->charges + $row->additional_charge, 'yes'); ?>
                                                                        per parcel
                                                                        <? if ($row->additional_charge > 0) { ?>
                                                                            ( Including &pound;
                                                                            <?= $row->additional_charge ?>
                                                                            Custom Charges )
                                                                        <? } ?></td>
                                                                    <!--                                                                    <td class="text-center">--><? //= $row->deliverydays ?>
                                                                    <!--                                                                        Working Days-->
                                                                    <!--                                                                    </td>-->
                                                                    <td class="text-center"><?= symbol . $charges; ?></td>
                                                                </tr>
                                                            <? } ?>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade d-modal" id="IntegratedLabelsDelivery" tabindex="-1" role="dialog"
                                 aria-labelledby="IntegratedLabelsDelivery">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Integrated Labels - Delivery
                                                Charges</h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive">
                                                    <div class="table-responsive">
                                                        <table width="100%" class="table table-bordered table-striped">
                                                            <thead class="bgBlueHeading">
                                                            <tr>
                                                                <th class="text-center"
                                                                    style="border-right:1px solid #fff !important;">NO.
                                                                    SHEETS
                                                                </th>
                                                                <th class="text-center"
                                                                    style="border-right:1px solid #fff !important;">
                                                                    BOXED
                                                                </th>
                                                                <th class="text-center"
                                                                    style="border-right:1px solid #fff !important;">
                                                                    BOXED & PALLETED
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td align="" class="text-right">100 - 4,000</td>
                                                                <td class="text-right"><?= symbol . $this->home_model->currecy_converter('5.00'); ?>
                                                                    Ex VAT
                                                                </td>
                                                                <td class="text-right">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">4,001 - 8,000</td>
                                                                <td class="text-right"><?= symbol . $this->home_model->currecy_converter('9.95'); ?>
                                                                    Ex VAT
                                                                </td>
                                                                <td class="text-right">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">8,001 – 12,000</td>
                                                                <td class="text-right"><?= symbol . $this->home_model->currecy_converter('14.95'); ?>
                                                                    Ex VAT
                                                                </td>
                                                                <td class="text-right">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">12,001 – 16,000</td>
                                                                <td class="text-right"><?= symbol . $this->home_model->currecy_converter('19.95'); ?>
                                                                    Ex VAT
                                                                </td>
                                                                <td class="text-right">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">16,001 – 20,000</td>
                                                                <td class="text-right"><?= symbol . $this->home_model->currecy_converter('24.95'); ?>
                                                                    Ex VAT
                                                                </td>
                                                                <td class="text-right">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">20,001 – 24,000</td>
                                                                <td class="text-right"><?= symbol . $this->home_model->currecy_converter('29.95'); ?>
                                                                    Ex VAT
                                                                </td>
                                                                <td class="text-right">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">24,001 – 28,000</td>
                                                                <td class="text-right"><?= symbol . $this->home_model->currecy_converter('34.95'); ?>
                                                                    Ex VAT
                                                                </td>
                                                                <td class="text-right">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">28,001 – 52,000</td>
                                                                <td class="text-right"></td>
                                                                <td class="text-right">Half Pallet<br/>
                                                                    <?= symbol . $this->home_model->currecy_converter('40.00'); ?>
                                                                    Ex VAT
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="" class="text-right">52,001 – 100,000</td>
                                                                <td class="text-right"></td>
                                                                <td class="text-right">Full Pallet<br/>
                                                                    <?= symbol . $this->home_model->currecy_converter('50.00'); ?>
                                                                    Ex VAT
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <p>When ordering quantities of 28,000 sheets (28 boxes) and more
                                                            please ensure that you are able to receive a palleted
                                                            delivery.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade d-modal" id="IntegratedLabelsDeliveryOffshore" tabindex="-1"
                                 role="dialog" aria-labelledby="IntegratedLabelsDeliveryOffshore">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Integrated Labels - Delivery
                                                Charges</h4>
                                        </div>
                                        <div class="modal-body no-padding">
                                            <div class="well">
                                                <div class="table-responsive">
                                                    <h4 class="blue">HALF & FULL PALLETS OF INTEGRATED LABELS</h4>
                                                    <p><strong>Description</strong>: A4 paper sheets (80gsm) complete
                                                        with 1, 2 or 3 removable self-adhesive label sections. Packaged
                                                        in boxes of 1,000 sheets.</p>
                                                    <p><strong>Box dimensions</strong>: 225mm (W) x 330mm (L) x 160mm
                                                        (H)<br/>
                                                        <strong>Weight: </strong> c. 6.94Kg<br/>
                                                        All prices are ex VAT and in £UK </p>
                                                    <table width="100%" class="table table-bordered table-striped">
                                                        <thead class="bgBlueHeading">
                                                        <tr>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #fff !important;">Country
                                                            </th>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #fff !important;">Half
                                                                Pallet (Ex Vat)
                                                            </th>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #fff !important;">Full
                                                                Pallet (Ex Vat)
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td align="" class="text-center">Austria</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('165'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('275'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Belgium</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('135'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('175'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Denmark</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('165'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('200'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Finland</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('240'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('380'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">France</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('175'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('265'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Germany</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('165'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('265'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Italy</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('210'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('330'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Ireland</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('85'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('95'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Luxembourg</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('150'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter('170'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Netherlands</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(160, 'yes'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(195, 'yes'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Norway</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(405, 'yes'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(500, 'yes'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Portugal</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(210, 'yes'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(305, 'yes'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Spain</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(185, 'yes'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(330, 'yes'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Sweden</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(260, 'yes'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(375, 'yes'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="" class="text-center">Switzerland</td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(175, 'yes'); ?></td>
                                                            <td class="text-center"><?= symbol . $this->home_model->currecy_converter(265, 'yes'); ?></td>
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
                    </div>
                    <div class="m-t-15 col-xs-9 col-sm-10 col-md-10 ">
                        <div>
                            <h4 class="cBlue">Delivery Times</h4>
                            <p class="text-justify">The delivery times shown are from the point of your order being
                                dispatched and should not be interpreted as the order fulfilment time, other than in the
                                case of next–day orders placed before 16:00 on a working day.</p>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-2 col-md-2 m-t-60 text-center"><img onerror='imgError(this);'
                                                                                    class="img-responsive" width="77"
                                                                                    height="78"
                                                                                    src="<?= Assets ?>images/delivery_lg_i.png">
                    </div>
                    <div class="m-t-15 col-xs-9 col-sm-10 col-md-10 ">
                        <div>
                            <h4 class="cBlue">UK Exception & Offshore Postcodes</h4>
                            <p class="text-justify">Please be aware that deliveries to exception and offshore postcodes
                                will incur an additional delivery charge. Postcodes which classify as exception
                                postcodes are decided by our couriers. If you would like to know which postcodes fall
                                within this category please click on the “view list "in the exception postcodes section.
                                Alternatively call our customer service team and they will assist you further. </p>
                            <p>You can also enter your delivery details at the checkout and the delivery charges will
                                adjust automatically if the delivery address is an exception or offshore postcode.</p>
                            <p>Please be assured that we continuously work with courier companies to try and obtain the
                                best rates possible for these delivery charges.</p>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-2 col-md-2 m-t-60 text-center"><img onerror='imgError(this);'
                                                                                    class="img-responsive" width="77"
                                                                                    height="78"
                                                                                    src="<?= Assets ?>images/delivery_lg_i.png">
                    </div>
                    <div class="m-t-15 col-xs-9 col-sm-10 col-md-10 ">
                        <div>
                            <h4 class="cBlue">Custom Labels/Printing Services</h4>
                            <p class="text-justify">The fulfilment of custom label and/or printed label orders is
                                generally within 3 – 5 working days from the approval of artwork/design for printing or
                                a new label size and/or layout. However our objective is to always deliver your labels
                                as quickly as possible.</p>
                            <p class="text-justify">In some cases, production of custom labels can be delayed due to
                                unforeseen circumstances. In the event of this happening, we will contact you with a
                                revised completion date. </p>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-2 col-md-2 m-t-60 text-center"><img onerror='imgError(this);'
                                                                                    class="img-responsive" width="77"
                                                                                    height="78"
                                                                                    src="<?= Assets ?>images/3-days_i.png">
                    </div>
                    <div></div>
                </div>
                <!-- /.row -->
            </div>
            <!-- Advertising Banners for free delivery start-->
            <? $this->load->view('advertising/free_delivery'); ?>
            <? $this->load->view('advertising/free_shipping'); ?>
            <!-- Advertising Banners for free delivery end-->

        </div>
    </div>
</div>
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
