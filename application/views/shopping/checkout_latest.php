<? $animate = $this->session->userdata('animate');
if (isset($animate) and $animate == 'yes') {
    echo "<script>$(window).load(function() { $('html, body').animate({ scrollTop: $('#aja_cart').height()+250 }, 1000); });</script> ";
    $this->session->unset_userdata('animate', '');
} ?>
<script src="<?= Assets ?>js/cart.js?ver=<?= time() ?>"></script>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Checkout</li>
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
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
                    <div class="pull-right">
                        <a role="button" class="btn orange pull-right" href="<?= base_url() ?>">
                            <i class="fa fa-arrow-circle-left faa-horizontal animated"></i>&nbsp; Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout -->
        <div id="aja_cart" class="thumbnail ">
            <? include('cart.php'); ?>
        </div>

        <? $usertype = $this->input->get('checkout');
        $userid = $this->session->userdata('userid');
        $show_newsletter = 'Yes';

        if ($usertype == '' and $userid == ''){
            ?>

            <div class=" thumbnail">
                <div>
                    <div class=" m-t-b-10 ">
                        <form class="labels-form" id="login_form" method="post" action="">
                            <input type="hidden" name="page" value="checkout"/>
                            <div class="col-sm-6 m-t-10">
                                <div class="bgBlueHeading  ">
                                    <div class="  f-16 "> Login to your account</div>
                                </div>
                                <div class="borderPanel">

                                    <div class="m-t-15">
                                        <div class="p-l-r-10">
                                            <label id="server_error" style=" display:none;" class="error"></label>

                                            <div class=" ">
                                                <label class="input">
                                                    <i class="icon-append fa fa-user"></i>
                                                    <input type="email" placeholder="Enter Email address" name="email"
                                                           id="email" class="required">
                                                </label>
                                            </div>
                                            <div class=" ">
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" placeholder="Enter Password" name="password"
                                                           id="password" class="required">
                                                </label>
                                            </div>
                                            <div class=" ">
                                                <label class="pull-right">
                                                    <a class="TextGray" href="<?= base_url() ?>users/forgotPassword">Forgot
                                                        Your Password ?</a> </label>
                                            </div>
                                            <div>

                                                <button style="margin-top:43px; " type="submit"
                                                        class="btn-u btn-u-sm orange text-uppercase">Sign in &nbsp;
                                                    &nbsp;
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
                                <div class="  f-16"> Checkout As Guest</div>
                            </div>
                            <div class="borderPanel">
                                <div class="m-t-15">
                                    <div class="p-l-r-10">
                                        <div class="text-center">
                                            <h4 class="Textblack">Don't have a account with AA Labels</h4>
                                            <img onerror='imgError(this);' class="m-t-15"
                                                 src="<?= Assets ?>images/logo.png"></div>
                                        <div class="">

                                            <a href="<?= base_url() ?>transactionregistration.php?checkout=guest"
                                               class="btn orange text-uppercase m-t-30">
                                                Checkout As Guest &nbsp; &nbsp; <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            <label class="pull-right">
                                                <i class="fa fa-5x fa-user-plus cBlue"></i> </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <script>
                    $(document).ready(function () {
                        var loginform = $("#login_form");
                        loginform.validate({
                            errorPlacement: function errorPlacement(error, element) {
                                element.after(error);
                            },
                            submitHandler: function (loginform) {
                                $.post(base + 'ajax/user_login', $("#login_form").serialize(), function (data) {
                                    if (data.response == 'error') {
                                        $('#server_error').text("Email address or password is invalid!");
                                        $('#server_error').show();
                                    } else {
                                        if (data.url != '') {
                                            window.location.href = data.url;
                                        }

                                    }
                                    //swal("Alright!", "invalid login details", "success");
                                    return false;
                                }, 'json');

                                return false;
                            }
                        });
                    });
                </script>
            </div>


            <?
        }
        else{


        if (isset($userid) and $userid != '') {

            $user = $this->user_model->get_data();


            if (isset($user['UserEmail']) and $user['UserEmail'] != '') {
                $query = $this->db->query("select count(*) AS Total from email_addresses WHERE email LIKE '" . $user['UserEmail'] . "'");
                $query = $query->row_array();
                if (isset($query['Total']) and $query['Total'] > 0) {
                    $show_newsletter = 'no';
                }
            }


            $show_pass = 'No';

            $billing_email = $user['UserEmail'];
            $billing_fname = ucwords($user['BillingFirstName']);
            $billing_lname = ucwords($user['BillingLastName']);
            $billing_pno = ucwords($user['BillingTelephone']);
            $billing_mno = ucwords($user['BillingMobile']);
            $billing_pcode = ucwords($user['BillingPostcode']);
            $billing_add1 = ucwords($user['BillingAddress1']);
            $billing_add2 = ucwords($user['BillingAddress2']);
            $billing_city = ucwords($user['BillingTownCity']);
            $billing_company = ucwords($user['BillingCompanyName']);
            $billing_county = ucwords($user['BillingCountyState']);
            $res_b = ucwords($user['BillingResCom']);

            $delivery_email = $user['DeliveryEmail'];
            $delivery_fname = ucwords($user['DeliveryFirstName']);
            $delivery_lname = ucwords($user['DeliveryLastName']);
            $delivery_pno = ucwords($user['DeliveryTelephone']);
            $delivery_mno = ucwords($user['DeliveryMobile']);
            $delivery_pcode = ucwords($user['DeliveryPostcode']);
            $delivery_add1 = ucwords($user['DeliveryAddress1']);
            $delivery_add2 = ucwords($user['DeliveryAddress2']);
            $delivery_city = ucwords($user['DeliveryTownCity']);
            $delivery_company = ucwords($user['DeliveryCompanyName']);
            $delivery_county = ucwords($user['DeliveryCountyState']);
            $res_d = ucwords($user['DeliveryResCom']);

            $country = $user['BillingCountry'];
            $dcountry = $user['DeliveryCountry'];

        } else {

            $show_pass = '';

            $billing_email = '';
            $billing_fname = '';
            $billing_lname = '';
            $billing_pno = '';
            $billing_fno = '';
            $billing_mno = '';
            $billing_pcode = '';
            $billing_add1 = '';
            $billing_add2 = '';
            $billing_city = '';
            $billing_company = '';
            $billing_county = '';
            $res_b = '';

            $delivery_email = '';
            $delivery_fname = '';
            $delivery_lname = '';
            $delivery_pno = '';
            $delivery_fno = '';
            $delivery_mno = '';
            $delivery_pcode = '';
            $delivery_add1 = '';
            $delivery_add2 = '';
            $delivery_city = '';
            $delivery_company = '';
            $delivery_county = '';
            $res_d = '';
            $country = '';
            $dcountry = '';


        }

        ?>

        <? if (isset($error) and $error != '') {
            if (!isset($errortype)) {
                $billing_email = $this->input->post('email');
                $billing_fname = $this->input->post('b_first_name');
                $billing_lname = $this->input->post('b_last_name');
                $billing_pno = $this->input->post('b_phone_no');
                $billing_fno = $this->input->post('b_fax');
                $billing_pcode = $this->input->post('b_pcode');
                $billing_add1 = $this->input->post('b_add1');
                $billing_add2 = $this->input->post('b_add2');
                $billing_city = $this->input->post('b_city');
                $billing_company = $this->input->post('b_organization');
                $billing_county = $this->input->post('b_county');
                $res_b = $this->input->post('b_ResCom');

                $delivery_email = $this->input->post('d_email');
                $delivery_fname = $this->input->post('d_first_name');
                $delivery_lname = $this->input->post('d_last_name');
                $delivery_pno = $this->input->post('d_phone_no');
                $delivery_company = $this->input->post('d_organization');

                $delivery_fno = $this->input->post('d_fax');
                $delivery_pcode = $this->input->post('d_pcode');
                $delivery_add1 = $this->input->post('d_add1');
                $delivery_add2 = $this->input->post('d_add2');
                $delivery_city = $this->input->post('d_city');
                $delivery_county = $this->input->post('d_county');
                $res_d = $this->input->post('d_ResCom');

                $country = $this->input->post('country');
                $dcountry = $this->input->post('dcountry');
            }
            ?>
            <div id="validation_errors" role="alert" class="alert alert-danger alert-dismissible fade in">
                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <? if (empty($errortype)) { ?>
                    <strong>Validation error! </strong> Please fix following error.<br/>
                <? } ?>
                <?= $error ?>
            </div>
            <script>$('html, body').animate({scrollTop: $("#validation_errors").offset().top - 100}, 1000);</script>
        <? } ?>

        <div class=" thumbnail">
            <form method="post" id="checkout_form" class="labels-form " action="">
                <ul class="nav orderStep setup-panel">
                    <li class="active"><a href="#step-1">
                            <i class="fa fa-envelope f-20 p-t-b"></i>
                            <p class="list-group-item-text">Billing</p>
                        </a></li>
                    <li class="disabled"><a href="#step-2">
                            <i class="fa fa-map-marker p-t-b f-20"></i>
                            <p class="list-group-item-text">Delivery</p>
                        </a></li>
                    <li class="disabled"><a href="#step-3">
                            <i class="fa fa-truck p-t-b f-20"></i>
                            <p class="list-group-item-text">Shipping</p>
                        </a></li>
                    <li class="disabled"><a href="#step-4">
                            <i class="fa fa-gbp p-t-b f-20"></i>
                            <p class="list-group-item-text">Review &amp; Pay</p>
                        </a></li>
                    <li class="disabled"><a href="#">
                            <i class="fa fa-check-circle p-t-b f-20"></i>
                            <p class="list-group-item-text">confirm</p>
                        </a></li>
                </ul>

                <div class="setup-content" id="step-1">
                    <div class
                    "">
                    <div class="col-sm-12 p0">
                        <h4 class="m-t-b-8 m-l-20 cBlue">Billing Address</h4></div>
                    <div class="col-sm-4">

                        <div class="col-md-4 ">
                            <label class="select">
                                <select name="billing_title" id="title">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Miss.">Miss.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Ms.</option>
                                    <option value="Rev.">Rev.</option>
                                </select>
                                <i></i>
                            </label>
                        </div>
                        <div class="col-md-8 ">

                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" name="b_first_name" placeholder="First Name" id="b_first_name"
                                       value="<?= $billing_fname ?>" class="required"> <b
                                        class="tooltip tooltip-bottom-right">Please Enter First Name</b>
                            </label>

                        </div>


                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" placeholder="Last Name" name="b_last_name" id="b_last_name"
                                       value="<?= $billing_lname ?>" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter Last Name</b>
                            </label>
                        </div>


                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-phone"></i>
                                <input type="text" placeholder="Phone Number" name="b_phone_no"
                                       value="<?= $billing_pno ?>" id="b_phone_no" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter Phone Number</b>
                            </label>
                        </div>

                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-phone"></i>
                                <input type="text" placeholder="Mobile Number" name="b_mobile"
                                       value="<?= $billing_mno ?>" id="b_mobile">
                                <b class="tooltip tooltip-bottom-right">Please Enter Mobile Number</b>

                            </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" placeholder="Company Name" value="<?= $billing_company ?>"
                                       name="b_organization" id="b_organization">
                                <b class="tooltip tooltip-bottom-right">Please Enter Company Name</b>

                            </label>
                        </div>


                    </div>

                    <div class="col-sm-4">
                        <div class="col-sm-12 ">
                            <label class="input">
                                <!--   <a style="color:#fd4913;" href="javascript:void(0);" id="BillingsearchButton11" class="icon-append fa fa-search"></a>-->
                                <i class="icon-append fa fa-search"></i>
                                <input type="text" placeholder="Postcode" value="<?= $billing_pcode ?>" name="b_pcode"
                                       id="b_pcode" class="">
                                <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b>
                                <small>Enter your postcode and select your address from the locations found, using the
                                    drop-down menu.</small>
                            </label>

                            <!--<div id="selectBillingDiv" style="display:none">
                              <label class="select">
                                   <select id="billingaddressListSelect"></select>
                                   <i></i>
                               </label>
                           </div>-->


                        </div>
                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="text" placeholder="Address 1" value="<?= $billing_add1 ?>" name="b_add1"
                                       id="b_add1" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b>
                            </label>
                        </div>


                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="text" placeholder="Address 2" value="<?= $billing_add2 ?>" name="b_add2"
                                       id="b_add2">
                                <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b>
                            </label>
                        </div>


                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-map-marker"></i>
                                <input type="text" placeholder="City/Town" value="<?= $billing_city ?>" name="b_city"
                                       id="b_city" class="required"> <b class="tooltip tooltip-bottom-right">Please
                                    Enter City or Town</b>

                            </label>
                        </div>


                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa-map-marker"></i>
                                <input type="text" placeholder="County " value="<?= $billing_county ?>" name="b_county"
                                       id="b_county" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter County</b>
                            </label>
                        </div>


                    </div>

                    <div class="col-sm-4">


                        <div class="col-sm-12 ">
                            <label class="select">
                                <select name="country" id="country" class="required">
                                    <option value="">Select Country</option>
                                    <option <?= ($country == 'United Kingdom') ? 'selected="selected"' : '' ?>
                                            value="United Kingdom">United Kingdom
                                    </option>
                                    <option <?= ($country == 'Ireland') ? 'selected="selected"' : '' ?> value="Ireland">
                                        Ireland
                                    </option>
                                    <option <?= ($country == 'Belgium') ? 'selected="selected"' : '' ?> value="Belgium">
                                        Belgium
                                    </option>
                                    <option <?= ($country == 'Denmark') ? 'selected="selected"' : '' ?> value="Denmark">
                                        Denmark
                                    </option>
                                    <option <?= ($country == 'France') ? 'selected="selected"' : '' ?> value="France">
                                        France
                                    </option>
                                    <option <?= ($country == 'Holland') ? 'selected="selected"' : '' ?> value="Holland">
                                        Holland
                                    </option>
                                    <option <?= ($country == 'Germany') ? 'selected="selected"' : '' ?> value="Germany">
                                        Germany
                                    </option>
                                    <option <?= ($country == 'Luxembourg') ? 'selected="selected"' : '' ?>
                                            value="Luxembourg">Luxembourg
                                    </option>
                                    <option <?= ($country == 'Sweden') ? 'selected="selected"' : '' ?> value="Sweden">
                                        Sweden
                                    </option>
                                    <option <?= ($country == 'Spain') ? 'selected="selected"' : '' ?> value="Spain">
                                        Spain
                                    </option>
                                    <option <?= ($country == 'Switzerland') ? 'selected="selected"' : '' ?>
                                            value="Switzerland">Switzerland
                                    </option>
                                </select>
                                <i></i>
                            </label>
                        </div>

                        <div class="col-sm-12 ">
                            <label class="select">
                                <select name="b_ResCom" id="b_ResCom" class="required">
                                    <option value="">Resi/Com</option>
                                    <option <? if ($res_b == '1') {
                                        echo 'selected="selected"';
                                    } ?> value="1">Residential
                                    </option>
                                    <option <? if ($res_b == '2') {
                                        echo 'selected="selected"';
                                    } ?> value="2">Commercial
                                    </option>
                                </select>
                                <i></i>
                            </label>
                        </div>

                        <? if ($show_pass == 'No') { ?>

                            <div class="col-sm-12 ">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope-o"></i>
                                    <input type="email" placeholder="Email" value="<?= $billing_email ?>"
                                           disabled="disabled" name="email_valid" id="email_valid">
                                    <b class="tooltip tooltip-bottom-right">Email</b>
                                </label>
                            </div>


                        <? } else { ?>

                            <div class="col-sm-12 ">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope-o"></i>
                                    <input type="email" placeholder="Email" value="<?= $billing_email ?>" name="email"
                                           id="email">

                                </label>
                            </div>


                            <div class="col-sm-12 ">
                                <label class="input">
                                    <i class="icon-append fa fa-lock"></i>
                                    <input type="password" placeholder="Password" id="customer_password"
                                           name="customer_password"/>
                                </label>
                            </div>


                            <div class="col-sm-12 ">
                                <label class="input">
                                    <i class="icon-append fa fa-lock"></i>
                                    <input type="password" placeholder="Confirm Password " id="re_customer_password"
                                           name="re_customer_password"/>

                                </label>
                            </div>

                        <? }

                        if ($show_newsletter == 'Yes') {
                            ?>

                            <div class="col-sm-12 ">
                                <label class="checkbox"><input type="checkbox" checked="" name="newslwtter_value"
                                                               class="textOrange" id="newslwtter_value">
                                    <i></i>I'd like to be contacted with the latest news, offers and discount voucher
                                    from AA Labels. </label>
                            </div>

                        <? } ?>

                        <div class="col-sm-12 ">
                            <label class="input">
                                <i class="icon-append fa fa fa-bank"></i>
                                <input type="text" placeholder="Purchase Order Number" name="PurchaseOrderNumber"
                                       id="PurchaseOrderNumber">
                            </label>
                        </div>


                    </div>


                </div>

                <div class="col-sm-12 m-t-10">
                    <hr>
                </div>
                <div class="col-sm-12 m-b-10 m-t-20">

                    <div class="col-xs-6  col-sm-6 col-md-6">
                        <div class="col-xs-6  col-sm-6 col-md-6  ">
                            <div class="pull-left ">
                                <a href="<?= base_url() ?>shoppingcart.php" id="see" class="btn blue2 pull-left">
                                    <i class="fa fa-arrow-circle-left"></i> Back to Cart
                                </a>

                            </div>
                        </div>

                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <div class="pull-right ">
                            <button type="button" id="activate-step-2" class="btn orange pull-right">
                                Delivery Address <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
        </div>

        <div class="setup-content" id="step-2">
            <div class
            "">
            <div class="col-sm-12 p0">
                <h4 class="m-t-b-8 m-l-20 cBlue">Delivery Address</h4></div>
            <div class="">
                <div class="col-sm-12 m-l-10 m-b-10  ">
                    <label class="checkbox"><input type="checkbox" name="delivery_val" class="textOrange"
                                                   id="delivery_val">
                        <i></i>Auto Fill Same as Billing Address? </label>
                </div>
            </div>

            <div class="col-sm-4">

                <div class="col-md-4 ">
                    <label class="select">
                        <select name="title_d" id="title_d">
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Miss.">Miss.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Ms.</option>
                            <option value="Rev.">Rev.</option>
                        </select>
                        <i></i>
                    </label>
                </div>
                <div class="col-md-8 ">

                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        <input type="text" placeholder="First Name" id="d_first_name" name="d_first_name"
                               value="<?= $delivery_fname ?>" class="required">
                        <b class="tooltip tooltip-bottom-right">Please Enter First Name</b> </label>

                </div>


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        <input type="text" placeholder="Last Name" name="d_last_name" value="<?= $delivery_lname ?>"
                               id="d_last_name" class="required"><b class="tooltip tooltip-bottom-right">Please Enter
                            Last Name</b>

                    </label>
                </div>


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-phone"></i>
                        <input type="text" placeholder="Phone Number" name="d_phone_no" value="<?= $delivery_pno ?>"
                               id="d_phone_no" class="required"><b class="tooltip tooltip-bottom-right">Please Enter
                            Phone Number</b>

                    </label>
                </div>


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-phone"></i>
                        <input type="text" placeholder="Mobile Number" name="d_mobile_no" value="<?= $delivery_mno ?>"
                               id="d_mobile_no"><b class="tooltip tooltip-bottom-right">Please Enter Mobile Number</b>

                    </label>
                </div>


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        <input type="text" placeholder="Company Name" name="d_organization"
                               value="<?= $delivery_company ?>" id="d_organization"> <b
                                class="tooltip tooltip-bottom-right">Please Enter Company Name</b>

                    </label>
                </div>


            </div>

            <div class="col-sm-4">


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-search"></i>
                        <!-- <a style="color: #fd4913;" href="javascript:void(0);" id="DeliverysearchButton" class="icon-append fa fa-search"></a>-->
                        <input type="text" placeholder="Postcode" name="d_pcode" value="<?= $delivery_pcode ?>"
                               id="d_pcode" class="">
                        <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b>
                        <small>Enter your postcode and select your address from the locations found, using the drop-down
                            menu.</small>
                    </label>

                    <!--<div id="selectDeliveryDiv" style="display:none">
                         <label class="select">
                              <select id="DeliveryaddressListSelect"></select>
                              <i></i>
                          </label>
                      </div>-->
                </div>


                <!--<div class="col-sm-12 " >
                                  <label class="input">
                                        <i class="icon-append fa fa-search"></i>
                                        <input type="text" placeholder="Postcode" name="d_pcode" value="<?= $delivery_pcode ?>" id="d_pcode" class="required">
                                        <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b>
                                    </label>
                             
                                
							</div>-->
                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-envelope-o"></i>
                        <input type="text" placeholder="Address 1" name="d_add1" value="<?= $delivery_add1 ?>"
                               id="d_add1" class="required"><b class="tooltip tooltip-bottom-right">Please Enter Address
                            Line</b>

                    </label>
                </div>


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-envelope-o"></i>
                        <input type="text" placeholder="Address 2" value="<?= $delivery_add2 ?>" name="d_add2"
                               id="d_add2">
                        <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b>
                    </label>
                </div>


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-map-marker"></i>
                        <input type="text" placeholder="City/Town" value="<?= $delivery_city ?>" name="d_city"
                               id="d_city" class="required">
                        <b class="tooltip tooltip-bottom-right">Please Enter City or Town</b>
                    </label>
                </div>


                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-map-marker"></i>
                        <input type="text" placeholder="County " value="<?= $delivery_county ?>" name="d_county"
                               id="d_county" class="required">
                        <b class="tooltip tooltip-bottom-right">Please Enter County</b>
                    </label>
                </div>


            </div>

            <div class="col-sm-4">


                <div class="col-sm-12">
                    <label class="select">
                        <select name="dcountry" id="dcountry" class="required">
                            <option data-value="GB" <?= ($dcountry == 'United Kingdom') ? 'selected="selected"' : '' ?>
                                    value="United Kingdom">United Kingdom
                            </option>
                            <option data-value="IE" <?= ($dcountry == 'Ireland') ? 'selected="selected"' : '' ?>
                                    value="Ireland">Ireland
                            </option>
                            <option data-value="BE" <?= ($dcountry == 'Belgium') ? 'selected="selected"' : '' ?>
                                    value="Belgium">Belgium
                            </option>
                            <option data-value="DK" <?= ($dcountry == 'Denmark') ? 'selected="selected"' : '' ?>
                                    value="Denmark">Denmark
                            </option>
                            <option data-value="FR" <?= ($dcountry == 'France') ? 'selected="selected"' : '' ?>
                                    value="France">France
                            </option>
                            <option data-value="NL" <?= ($dcountry == 'Holland') ? 'selected="selected"' : '' ?>
                                    value="Holland">Holland
                            </option>
                            <option data-value="DE" <?= ($dcountry == 'Germany') ? 'selected="selected"' : '' ?>
                                    value="Germany">Germany
                            </option>
                            <option data-value="LU" <?= ($dcountry == 'Luxembourg') ? 'selected="selected"' : '' ?>
                                    value="Luxembourg">Luxembourg
                            </option>
                            <option data-value="SE" <?= ($dcountry == 'Sweden') ? 'selected="selected"' : '' ?>
                                    value="Sweden">Sweden
                            </option>
                            <option data-value="ES" <?= ($dcountry == 'Spain') ? 'selected="selected"' : '' ?>
                                    value="Spain">Spain
                            </option>
                            <option data-value="CH" <?= ($dcountry == 'Switzerland') ? 'selected="selected"' : '' ?>
                                    value="Switzerland">Switzerland
                            </option>
                        </select>
                        <i></i>
                    </label>
                </div>


                <div class="col-sm-12 ">
                    <label class="select">
                        <select name="d_ResCom" id="d_ResCom" class="required">
                            <option value="">Resi/Com</option>
                            <option <? if ($res_d == '1') {
                                echo 'selected="selected"';
                            } ?> value="1">Residential
                            </option>
                            <option <? if ($res_d == '2') {
                                echo 'selected="selected"';
                            } ?> value="2">Commercial
                            </option>
                        </select>
                        <i></i>
                    </label>
                </div>
                <div class="col-sm-12 ">
                    <label class="input">
                        <i class="icon-append fa fa-envelope-o"></i>
                        <input type="email" placeholder="Email" value="<?= $delivery_email ?>" name="d_email"
                               id="d_email" class="required">

                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 m-t-10">
            <hr>
        </div>
        <div class="col-sm-12 m-b-10 m-t-20">


            <div class="pull-left m-t-10 m-b-10 m-r-5">

                <small> <strong>SMS:</strong> If you would like to receive text messages about your orders despatch
                    progress and delivery options, while on route with the courier. Then please do not forget to provide
                    the mobile phone number, to be used.</small>

            </div>


            <div class="col-xs-6  col-sm-6 col-md-6">
                <div class="col-xs-6  col-sm-6 col-md-6  ">
                    <div class="pull-left ">
                        <button id="previous_1" type="button" class="btn blue2 pull-left">
                            <i class="fa fa-arrow-circle-left"></i> Back to Billing
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="pull-right ">
                    <button type="button" id="activate-step-3" class="btn orange pull-right">
                        Shipping <i class="fa fa-arrow-circle-right"></i>
                    </button>

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
                            <td id="shippind_address_1">141 Woodhead Road</td>
                        </tr>
                        <tr>
                            <td>City/Town:</td>
                            <td id="shippind_city">BRADFORD</td>
                        </tr>
                        <tr>
                            <td>County:</td>
                            <td id="shippind_county">West Yorkshire</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <td>Post Code:</td>
                            <td id="shippind_postcode">bd7 2bl</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="ajax_delivery">
                <?php include('delivery_charges.php'); ?>
            </div>

            <div style="display:none;" class="col-sm-12 ukvatbox">


                <div class="col-md-3 no-padding">


                    <div class="input-group"><span id="vat_cc" class="input-group-addon">&nbsp;</span>
                        <input type="text" id="vatnumber" name="vatnumber" placeholder="Enter VAT number"
                               class="form-control">
                    </div>


                </div>
                <div class="col-md-4">
                    <button class="btn orange" id="vat_validator" type="button"> Verify</button>
                </div>
                <div class="col-md-12">
                    <p id="vat_name"></p>
                    <p id="vat_address"></p>
                </div>
                <div class="clear10"></div>
                <div class="col-md-8">
                    As you are not a UK customer for the purpose of exempting VAT from your purchase, please provide
                    a valid VAT number for your business and VAT will be excluded from your order.
                </div>
                <div class="clear10"></div>
                <div class="col-md-8">
                    <label class="checkbox"><input type="checkbox" name="unreg_vat" value="yes" class="textOrange">
                        <i></i>If you are not registered for VAT please tick here to proceed and UK VAT will be charged.
                    </label>
                </div>

            </div>

        </div>

        <div id="delivertimeynote" class="col-sm-12 m-t-10">
            <div><p><small> <strong>Please note:</strong>
                        Orders placed before 16:00 qualify for next day delivery, providing this is not a weekend or
                        public holiday.
                        Orders placed after 16:00 will be treated as having been received the day after placement in
                        production terms and the
                        next working day will be calculated accordingly. For Saturday delivery orders must also be
                        placed before 16:00 on
                        the preceding Friday. </small></p></div>
            <hr>
        </div>

        <div id="offshoredeliverynote" class="col-sm-12 m-t-10" style="display:none;">
            <div>
                <h4>Exception &amp; Offshore Deliveries</h4>
                <p>Please be aware that delivery to an address considered an exception postcode will incur a delivery
                    charge of &pound;11.75 plus VAT. Postcodes which classify as exception postcodes on mainland UK are
                    decided by our couriers.
                    <br/></p>

            </div>
        </div>


        <div class="col-sm-12 m-b-10 m-t-20">

            <div class="col-xs-6  col-sm-6 col-md-6">
                <div class="col-xs-6  col-sm-6 col-md-6  ">
                    <div class="pull-left ">
                        <button type="button" id="previous_2" class="btn blue2 pull-left">
                            <i class="fa fa-arrow-circle-left"></i> Delivery
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="pull-right ">
                    <button type="button" id="activate-step-4" class="btn orange pull-right">Review &amp; Pay
                        <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="setup-content" id="step-4">

        <div class="">
            <h4 class="m-t-b-8 m-l-20 cBlue">Review Order </h4>
        </div>
        <div class="col-sm-12 m-t-30">
            <div class="col-sm-6">
                <div>
                    <strong class="textBlue">Billing Detail </strong>
                    <p id="billing_name_review"></p>
                    <span id="billing_address_review"></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div>
                    <strong class="textBlue">Delivery Detail </strong>
                    <p id="delivery_name_review"></p>
                    <span id="delivery_address_review"></span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 m-t-30 paymentdiv"
             style=" <?= (isset($sample) and $sample == 'sample') ? 'display:none;' : '' ?>">
            <div class="col-sm-6">
                <img onerror='imgError(this);' class="img-responsive" alt="payment methods"
                     src="<?= Assets ?>images/visa-icon2.png">
                <div id='paymentSection'></div>

                <div class="paymentInputs">
                    <strong class="textBlue">Payment Type</strong>

                    <p class="m-t-10"><label class="radio borderRadius ">
                            <input type="radio" class="" id="worldpay" value="creditCard" name="paymentway">
                            <i class="rounded-x m-l-10"></i>&nbsp; <strong>
                                Pay by Credit / Debit Card </strong>

                            <img onerror='imgError(this);' style="float:right;" src="<?= Assets ?>images/worldpay.png"
                                 class="img-responsive">
                        </label>
                    </p>

                    <p class="m-t-10"><label class="radio borderRadius ">
                            <input type="radio" class="" id="paypal" value="paypal" name="paymentway"> <i
                                    class="rounded-x m-l-10"></i>&nbsp; <strong>
                                Pay by PayPal </strong>

                            <img onerror='imgError(this);' style="float:right;margin-top: -7px;"
                                 src="<?= Assets ?>images/paypal.png" class="img-responsive">
                        </label>
                    </p>


                    <p class="m-t-10">
                        <label class="radio borderRadius ">
                            <input type="radio" id="pushase" value="purchaseOrder" name="paymentway">
                            <i class="rounded-x m-l-10"></i>&nbsp;
                            <strong>Pay by Purchase Order <span class="fa-3x fa fa-bank pull-right"></span></strong><br>
                            <small> (Government Offices &amp; Educational Organisations only)</small>
                        </label>
                    </p>
                    <p class="m-t-10">
                        <small> Please note that your order will not be processed until we receive a signed copy of your
                            official Purchase Order via post to: AA Labels, 23 Wainman Road, Peterborough PE2 7BU or
                            email: <a href="mailto:customercare@aalabels.com">customercare@aalabels.com</a> </small>
                    </p>
                </div>


            </div>

            <div class="col-sm-6">

                <div class="textBlue m-b-6">
                    <strong class="">Order Summary</strong>
                </div>

                <div id="ajax_order_summary">
                    <? include('order_summary.php'); ?>
                </div>


            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="col-sm-6 paymentInputs">
                <p class="m-t-10"><img onerror='imgError(this);' src="<?= Assets ?>images/icons2.jpg" alt="" width="423"
                                       height="84" class="img-responsive"></p>
            </div>

            <div class="col-sm-6 m-t-20 paymentInputs">

                <div class="col-sm-12  ">
                    <label class="checkbox"><input type="checkbox" name="confirm_check" value="yes" class="textOrange">
                        <i></i> All our products are made to order. Please tick here to confirm that
                        you have checked your order carefully before proceeding any further.
                    </label>
                </div>
                <div class="col-sm-12 ">
                    <label class="checkbox"><input type="checkbox" name="agree_term" id="agree_term" class="textOrange">
                        <i></i></label>
                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I have read and agree to the
                    <a href="#" data-target=".delivery_info" data-toggle="modal" class="textOrange">Term and
                        Conditions</a> of sale.
                </div>


            </div>

        </div>


        <div class="col-sm-12 m-t-10">
            <hr>
        </div>

        <div class="col-sm-12 m-b-10 m-t-20">

            <div class="col-xs-6  col-sm-6 col-md-6">
                <div class="col-xs-6  col-sm-6 col-md-6  ">
                    <div class="pull-left ">
                        <button type="button" id="previous_3" class="btn blue2 pull-left"><i
                                    class="fa fa-arrow-circle-left"></i> Shipping
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <div class="pull-right ">
                    <button type="submit" id="confirmbtn" class="btn orange pull-right paymentInputs">
                        Confirm Order <i class="fa fa-arrow-circle-right"></i>
                    </button>

                    <button type="button" id="worlpaybtn" class="btn orange pull-right" style="display:none">
                        Pay Now <i class="fa fa-arrow-circle-right"></i>
                    </button>


                </div>
            </div>
        </div>


    </div>


    </form>


</div>

<? } ?>


<div class="modal fade delivery_info" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">Green Technologies Ltd t/a AA Labels - www.aalabels.com <a
                            href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h4>
            </div>
            <div class="">
                <? include('deliveryinfo.php'); ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>


</div>
</div>
<!--<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>-->

<script>


    var oldpcode = '';
    var oldcountry = '';
    var VATNumber = 'invalid';

    $(document).on("change", "#vatnumber", function (e) {
        $('#vat_name').html('');
        $('#vat_address').html('');
        VATNumber = 'invalid';
    });

    $(document).on("click", "#vat_validator", function (e) {
        var vatnumber = $('#vatnumber').val();
        var country = $('#dcountry').val();
        if (vatnumber.length > 0) {
            $.ajax({
                url: base + 'ajax/validate_vat',
                type: "POST",
                async: "false",
                data: {country: country, vatNumber: vatnumber},
                dataType: "json",
                success: function (data) {
                    if (data.status == 'valid') {
                        VATNumber = 'valid';
                        $('#vat_name').html('<strong>Name: </strong>' + data.name);
                        $('#vat_address').html('<strong>Address: </strong>' + data.address);

                    } else {
                        $('#vat_name').html('');
                        $('#vat_address').html('');
                        swal("", "please enter a valid VAT number", "warning");
                        VATNumber = 'invalid';
                    }
                }
            });
        } else {
            VATNumber = 'invalid';
            $('#vat_name').html('');
            $('#vat_address').html('');
            swal("", "please enter a valid VAT number", "warning");

        }
    });

    function validate_form() {

        if (paymentoption == 'sample') {
            $("#pushase").prop("checked", true);
        }
        var paymentway = $('input[name=paymentway]:checked').val();
        var confirm_check = $('input[name=confirm_check]:checked').val();
        var terms = $('input[name=agree_term]:checked').val();


        if (typeof paymentway == "undefined") {
            alert_box("Please select one of the payment options");
            return false;
        } else if (typeof confirm_check == "undefined") {
            alert_box("Please confirm that you have checked your order carefully!");
            return false;
        } else if (typeof terms == "undefined") {
            alert_box("Please accept the terms and conditions");
            return false;
        } else {
            return true;
        }

    }

    $(document).ready(function () {
        var form = $("#checkout_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                customer_password: "required",
                re_customer_password: {
                    equalTo: "#customer_password"
                },
                email: {
                    required: true,
                    email: true,
                    remote: base + "ajax/is_email_exist"
                },
                b_phone_no: {
                    phoneUK: true
                },
                b_mobile: {
                    phoneUK: true
                },
                d_phone_no: {
                    phoneUK: true
                },
                d_mobile_no: {
                    phoneUK: true
                }
            },
            messages: {
                email: {
                    remote: $.validator.format("This email address is already taken.")
                }
            },
            submitHandler: function (form) {

                if (validate_form() == true) {

                    /****************/
                    var _vtel = document.createElement('input');
                    _vtel.value = VATNumber;
                    _vtel.type = 'hidden';
                    _vtel.name = 'VALIDVAT';
                    form.appendChild(_vtel);
                    /*****************/

                    var paymentway = $('input[name=paymentway]:checked').val();
                    if (paymentway == 'creditCard') {
                        worldPay(form);
                        return false;
                    } else {
                        form.submit();
                        return true;
                    }


                } else {
                    console.log('validation error');
                    return false;
                }
            }
        });

        var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {


                form.validate().settings.ignore = ":disabled,:hidden";
                if (form.valid() == true) {
                    //navListItems.closest('.active').children('a').removeClass('orange2');
                    update_review_address();
                    navListItems.closest('li').removeClass('active');
                    $item.addClass('active');
                    allWells.hide();
                    $target.show();
                } else {
                    //navListItems.closest('.active').children('a').addClass('orange2');
                }
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        /***** Billing page btn ***/
        $('#activate-step-2').on('click', function (e) {
            form.validate().settings.ignore = ":disabled,:hidden";
            if (form.valid() == true) {
                $('ul.setup-panel li:eq(1)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-2"]').trigger('click');
                //$('ul.setup-panel li a:eq(1)').trigger('click');
                // $(this).remove();
            }
        })

        /***** Delivery page btn ***/
        $('#activate-step-3').on('click', function (e) {

            form.validate().settings.ignore = ":disabled,:hidden";
            if (form.valid() == true) {
                update_review_address();
                $('ul.setup-panel li:eq(2)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            }
        })

        /***** Shipping page btn ***/
        $('#activate-step-4').on('click', function (e) {

            var vatnumber = $('#vatnumber').val();
            var country = $('#dcountry').val();

            //alert("yes");
            var delivery = $('input[name=delivery_option]:checked').val();
            if (typeof delivery == "undefined") {
                alert_box("Please select Shipping Method first");
                return false;
            } else if (country != '' && country != 'United Kingdom') {
                unreg_vat = $('input[name=unreg_vat]');
                if (VATNumber == 'invalid' && unreg_vat.is(":unchecked")) {
                    swal("", "Please enter a valid VAT number, or tick the box to proceed and pay UK VAT", "warning");
                    return false;
                }
            }

            $('ul.setup-panel li:eq(3)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-4"]').trigger('click');
            update_review_address();

        })

        $('#previous_1').on('click', function (e) {
            $('ul.setup-panel li a[href="#step-1"]').trigger('click');
        })
        $('#previous_2').on('click', function (e) {
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        })
        $('#previous_3').on('click', function (e) {
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        })

        <? if(isset($errortype) and $errortype == 'payment'){?>
        $('#activate-step-4').click();
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li:eq(3)').addClass('active');
        <? }?>


    });


    function update_review_address() {

        var title = $('#title').val();
        var b_first = $('#b_first_name').val();
        var b_last = $('#b_last_name').val();

        var b_address = $('#b_add1').val();
        var b_city = $('#b_city').val();
        var b_pcode = $('#b_pcode').val();
        var b_county = $('#country').val();


        var d_title = $('#title_d').val();
        var d_first = $('#d_first_name').val();
        var d_last = $('#d_last_name').val();
        var d_address = $('#d_add1').val();
        var d_city = $('#d_city').val();
        var d_pcode = $('#d_pcode').val();
        var d_county = $('#d_county').val();


        var d_pcode = $('#d_pcode').val();
        var d_county = $('#d_county').val();


        var country = $('#country').val();
        var dcountry = $('#dcountry').val();
        $('#shipping_country').html(dcountry);
        $('#shippind_postcode').html(d_pcode);

        $('#billing_name_review').html(title + ' ' + b_first + ' ' + b_last);
        $('#billing_address_review').html(b_address + ', ' + b_city + ', ' + b_pcode + ', ' + b_county + ', ' + country);

        $('#delivery_name_review').html(d_title + ' ' + d_first + ' ' + d_last);
        $('#delivery_address_review').html(d_address + ', ' + d_city + ', ' + d_pcode + ', ' + dcountry + ', ' + dcountry);

        $('#shippind_address_1').html(d_address);
        $('#shippind_city').html(d_city);
        $('#shippind_county').html(d_county);


        if (oldpcode != d_pcode || oldcountry != dcountry) {

            if (dcountry != 'United Kingdom' && dcountry != '') {
                $('#delivertimeynote').hide();
                $('#offshoredeliverynote').hide();
                $('.ukvatbox').show();
                var cc_code = $("#dcountry option:selected").attr('data-value');
                $('#vat_cc').html(cc_code);

            } else {
                $('#delivertimeynote').show();
                $('.ukvatbox').hide();
            }


            $.ajax({
                url: base + 'ajax/setpostcode',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {postocde: d_pcode, country: dcountry},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            $('#ajax_delivery').html(data.delivey);
                            $('#ajax_order_summary').html(data.orderSummary);
                        }
                    }
                }
            });
            oldpcode = d_pcode;
            oldcountry = dcountry
        }


        //

    }


    $('input[name=paymentway]').change(function () {

        if ($(this).val() == "paypal" || $(this).val() == "creditCard") {
            $('#confirmbtn').html('Pay Now <i class="fa fa-arrow-circle-right"></i>');
        } else {
            $('#confirmbtn').html('Confirm Order <i class="fa fa-arrow-circle-right"></i>');
        }

    });

    $(document).on("change", "input[name=delivery_option]", function (e) {

        var deliveryid = $(this).val();
        if (deliveryid) {
            $.ajax({
                url: base + 'ajax/update_delevery',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {deliveryid: deliveryid},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            $('#ajax_delivery').html(data.delivey);
                            $('#ajax_order_summary').html(data.orderSummary);

                        }
                    }
                }
            });
        }
    });

    $("#delivery_val").change(function () {
        if (this.checked) {
            $('#d_first_name').val($('#b_first_name').val());
            $('#title_d').val($('#title').val());
            $('#d_email').val($('#email_valid').val());
            $('#d_last_name').val($('#b_last_name').val());
            $('#d_phone_no').val($('#b_phone_no').val());
            $('#d_mobile_no').val($('#b_mobile').val());
            $('#d_ResCom').val($('#b_ResCom').val());
            $('#d_pcode').val($('#b_pcode').val());
            $('#d_add1').val($('#b_add1').val());
            $('#d_add2').val($('#b_add2').val());
            $('#d_city').val($('#b_city').val());
            $('#d_organization').val($('#b_organization').val());
            $('#d_county').val($('#b_county').val());
            $('#dcountry').val($('#country').val());

        } else {
            $('#d_first_name').val('');
            $('#title_d').val('');
            $('#d_email').val('');
            $('#d_last_name').val('');
            $('#d_phone_no').val('');
            ;
            $('#d_mobile_no').val('');
            $('#d_ResCom').val('');
            $('#d_pcode').val('');
            $('#d_add1').val('');
            $('#d_add2').val('');
            $('#d_city').val('');
            $('#d_organization').val('');
            $('#d_county').val('');
            $('#dcountry').val('');


        }
    });


    function worldPay(form) {
        //L_C_b385ff75-3a94-47ab-b7fc-84984f9f6d28
        //T_C_7e9f67ea-a8bb-4489-836a-841c10290d8d
        Worldpay.useTemplateForm({
            'clientKey': 'L_C_b385ff75-3a94-47ab-b7fc-84984f9f6d28',
            'form': form,
            'saveButton': false,
            'templateOptions': {images: {enabled: false}, dimensions: {width: false, height: 265,}},
            'paymentSection': 'paymentSection',
            'display': 'inline',  //modal inline
            'callback': function (obj) {
                if (obj && obj.token) {
                    var _el = document.createElement('input');
                    _el.value = obj.token;
                    _el.type = 'hidden';
                    _el.name = 'token';
                    form.appendChild(_el);
                    form.submit();
                }
            },
            'beforeSubmit': function () {
                document.getElementById('worlpaybtn').disabled = true;
                return true;
            },
            'validationError': function (obj) {
                document.getElementById('worlpaybtn').disabled = null;
            },
        });

        $(".paymentInputs").hide();
        $("#paymentSection").show();
        $("#worlpaybtn").show();
    }

    $('#worlpaybtn').click(function () {
        Worldpay.submitTemplateForm();
    });

</script>
<script src="https://cdn.worldpay.com/v1/worldpay.js"></script>