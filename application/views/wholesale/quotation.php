<style>
    .borderPanel {
        border: 1px solid #e4e4e4;
        display: inline-block;
        width: 100%;
    }
</style>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>wholesale/"><i class="fa fa-home"></i></a></li>
                <li><a href="<?= base_url() ?>wholesale/view-products/">Wholesale Products</a></li>
                <li class="active">Review Quotation</li>
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
                        <h3>Review Quotation</h3>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
                    <div class="pull-right"></div>
                </div>
            </div>
        </div>

        <!-- Checkout -->

        <div id="aja_cart" class="thumbnail ">
            <div class="col-sm-12 col-md-12 m-t-10">
                <div class="table-responsive ">
                    <table class="table table-bordered table-hover">
                        <thead class="bgBlueHeading">
                        <tr>
                            <th class="hidden-xs" style="width:50%; " colspan="2">Code / Description</th>
                            <th class="" style="width:20%; text-align:center;">Qty</th>
                            <th style="width:4%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $texvat = 0.00;
                        $delivery_text = '';
                        foreach ($cart_detail as $row) {
                            $disable = false;
                            $A4Printing = '';
                            $prod = $this->shopping_model->show_product($row->ProductID);
                            $sub_inclvat = round($row->TotalPrice, 2);

                            $sub_inclvat = $this->home_model->currecy_converter($sub_inclvat, 'no');


                            $labels = $prod[0]['LabelsPerSheet'];
                            $product_type = 'Sheets';

                            $maxlength = 8;

                            if (preg_match("/A5/i", $prod[0]['ProductBrand'])) {
                                $min_qty = '100';
                                $max_qty = '9000000';
                                $maxlength = 8;
                            } else if (preg_match("/A3/i", $prod[0]['ProductBrand'])) {
                                $min_qty = '100';
                                $max_qty = '9000000';
                                $maxlength = 8;
                            } else if (preg_match("/SRA3/i", $prod[0]['ProductBrand'])) {
                                $min_qty = '100';
                                $max_qty = '9000000';
                            } else if (preg_match("/Roll Labels/i", $prod[0]['ProductBrand'])) {

                                $min_qty = $this->home_model->min_qty_roll($prod[0]['ManufactureID']);
                                $max_qty = '9000000';
                                $product_type = 'Rolls';
                                $maxlength = 5;
                            } else if (preg_match('/Integrated Labels/is', $prod[0]['ProductBrand'])) {
                                $min_qty = $this->home_model->min_qty_integrated($prod[0]['ManufactureID']);
                                $max_qty = $this->home_model->max_qty_integrated($prod[0]['ManufactureID']);
                                $product_type = 'Integrated';

                            } else {

                                $min_qty = '25';
                                $max_qty = '9000000';

                            }


                            $product_collection = array('is_custom' => '',
                                'ProductCategoryName' => $prod[0]['ProductCategoryName'],
                                'LabelsPerRoll' => '',
                                'LabelsPerSheet' => $prod[0]['LabelsPerSheet'],
                                'ReOrderCode' => $prod[0]['ReOrderCode'],
                                'ManufactureID' => $prod[0]['ManufactureID'],
                                'ProductBrand' => $prod[0]['ProductBrand'],
                                'wound' => '',
                                'OrderData' => $row->OrderData);

                            $completeName = $this->home_model->customize_product_name($product_collection);


                            $prod[0]['Image1'] = str_replace(".gif", ".png", $prod[0]['Image1']);

                            ?>
                            <tr>
                                <th class="text-center hidden-xs"><img onerror='imgError(this);'
                                                                       alt="<?= $prod[0]['ManufactureID'] ?>"
                                                                       class="img-circle"
                                                                       src="<?= Assets ?>images/material_images/<?= $prod[0]['Image1'] ?>"
                                                                       width="25" height="25"></th>
                                <td class="hidden-xs"><h2 class="BlueHeading">
                                        <?= $prod[0]['ManufactureID'] ?>
                                    </h2>
                                    <p>
                                        <?= $completeName ?>
                                    </p></td>
                                <td>
                                    <div class="visible-xs ">
                                        <h4>
                                            <?= $prod[0]['ManufactureID'] ?>
                                        </h4>
                                        <div class="breakText">
                                            <p>
                                                <?= $completeName ?>
                                            </p>
                                        </div>
                                    </div>
                                    <input type="hidden" id="labels<?= $row->ID ?>" value="<?= $labels ?>"/>
                                    <input type="hidden" id="min_qty<?= $row->ID ?>" value="<?= $min_qty ?>"/>
                                    <input type="hidden" id="max_qty<?= $row->ID ?>" value="<?= $max_qty ?>"/>
                                    <input type="hidden" id="product_type<?= $row->ID ?>" value="<?= $product_type ?>"/>
                                    <input type="hidden" id="prd_id<?= $row->ID ?>" value="<?= $row->ProductID ?>"/>
                                    <input type="hidden" id="old_qty<?= $row->ID ?>" value="<?= $row->Quantity ?>"/>
                                    <input type="hidden" id="menuid<?= $row->ID ?>"
                                           value="<?= $prod[0]['ManufactureID'] ?>"/>
                                    <div class="col-xs-12 col-sm-12 col-md-12 p0">
                                        <div class="input-group"> <span class="input-group-btn">
                      <button <?= ($disable == true) ? 'disabled="disabled"' : '' ?> id="minus_<?= $row->ID ?>"
                                                                                     class="btn btn-default btn-number minu-qty"
                                                                                     type="button"> <span
                                  class="glyphicon glyphicon-minus"></span> </button>
                      </span>
                                            <input type="text"
                                                   maxlength="<?= $maxlength ?>" <?= ($disable == true) ? 'disabled="disabled"' : '' ?>
                                                   id="qty_<?= $row->ID ?>" value="<?= $row->Quantity ?>"
                                                   class="form-control input-number text-center allownumeric"
                                                   name="quant1">
                                            <span class="input-group-btn">
                      <button <?= ($disable == true) ? 'disabled="disabled"' : '' ?> id="plus_<?= $row->ID ?>"
                                                                                     class="btn btn-default btn-number plus-qty"
                                                                                     type="button"> <span
                                  class="glyphicon glyphicon-plus"></span> </button>
                      </span></div>
                                        <div class="row" style="text-align:center;"><a id="updatebtn_<?= $row->ID ?>"
                                                                                       href="javascript:void(0);"
                                                                                       style="display:none;"
                                                                                       class="clear_b"
                                                                                       onclick="update_item('<?= $row->ID ?>','<?= $prod[0]['ManufactureID'] ?>');">
                                                <i class="fa fa-refresh"></i> Update </a></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-xs-12 col-sm-12 col-md-3 "><a id="<?= $row->ID ?>"
                                                                                  class="btn blueBg delete_quote"
                                                                                  role="button"><i
                                                    class="fa f-20 fa-trash "></i> </a></div>
                                </td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php

        $userid = $this->session->userdata('userid');
        if (isset($userid) and $userid != '') {

            $user = $this->user_model->get_data();
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
            $country = $user['BillingCountry'];


        } else {

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
            $country = '';


        }
        if (isset($error) and $error != '') {
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
                $country = $this->input->post('country');
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
                <div class="setup-content" id="step-2">
                    <div class
                    "">
                    <? if (empty($userid)) { ?>
                        <div class="col-sm-12 p0">
                            <div class="col-sm-12 p0">
                                <h4 class="m-t-b-8 m-l-20 cBlue">Existing Customer</h4>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <div class="bgBlueHeading  ">
                                    <div class="  f-16 "> Login to your account</div>
                                </div>
                                <div class="borderPanel">
                                    <div class="m-t-15">
                                        <div class="p-l-r-10">
                                            <div class="col-md-12">
                                                <label id="server_error" style=" display:none;" class="error"></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                                    <input type="text" placeholder="Enter Email address"
                                                           id="login-email">
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" placeholder="Enter Password"
                                                           id="login-password">
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="login-btn"
                                                        class="btn-u btn-u-sm orange text-uppercase">Sign in &nbsp;
                                                    &nbsp; <i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-10">
                                <hr>
                            </div>
                        </div>
                    <? } ?>
                    <div class="col-sm-12 p0">
                        <h4 class="m-t-b-8 m-l-20 cBlue">Billing Address</h4>
                    </div>
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
                                <i></i> </label>
                        </div>
                        <div class="col-md-8 ">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="b_first_name" placeholder="First Name" id="b_first_name"
                                       value="<?= $billing_fname ?>" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter First Name</b> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" placeholder="Last Name" name="b_last_name" id="b_last_name"
                                       value="<?= $billing_lname ?>" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter Last Name</b> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-phone"></i>
                                <input type="text" placeholder="Phone Number" name="b_phone_no"
                                       value="<?= $billing_pno ?>" id="b_phone_no" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter Phone Number</b> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-phone"></i>
                                <input type="text" placeholder="Mobile Number" name="b_mobile"
                                       value="<?= $billing_mno ?>" id="b_mobile">
                                <b class="tooltip tooltip-bottom-right">Please Enter Mobile Number</b> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" placeholder="Company Name" value="<?= $billing_company ?>"
                                       name="b_organization" id="b_organization">
                                <b class="tooltip tooltip-bottom-right">Please Enter Company Name</b> </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-search"></i>
                                <input type="text" placeholder="Postcode" value="<?= $billing_pcode ?>" name="b_pcode"
                                       id="b_pcode" class="">
                                <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b> <small>Enter your
                                    postcode and select your address from the locations found, using the drop-down
                                    menu.</small> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                <input type="text" placeholder="Address 1" value="<?= $billing_add1 ?>" name="b_add1"
                                       id="b_add1" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                <input type="text" placeholder="Address 2" value="<?= $billing_add2 ?>" name="b_add2"
                                       id="b_add2">
                                <b class="tooltip tooltip-bottom-right">Please Enter Address Line</b> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                                <input type="text" placeholder="City/Town" value="<?= $billing_city ?>" name="b_city"
                                       id="b_city" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter City or Town</b> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                                <input type="text" placeholder="County " value="<?= $billing_county ?>" name="b_county"
                                       id="b_county" class="required">
                                <b class="tooltip tooltip-bottom-right">Please Enter County</b> </label>
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
                                <i></i> </label>
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
                                <i></i> </label>
                        </div>
                        <div class="col-sm-12 ">
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" placeholder="Email" value="<?= $billing_email ?>" name="email"
                                       id="email">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 m-t-10">
                    <hr>
                </div>
                <div class="col-sm-12 m-b-10 m-t-20">
                    <div class="col-xs-6  col-sm-6 col-md-6"></div>
                    <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <div class="pull-right ">
                            <button type="submit" class="btn orange pull-right"> Submit Quotation <i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
<script>


    $(document).on("click", "#login-btn", function (event) {
        var email = $('#login-email').val();
        var password = $('#login-password').val();
        if (email.length > 0 && password.length > 0) {
            $.post(base + 'ajax/user_login', {email: email, password: password, page: 'checkout'}, function (data) {
                if (data.response == 'error') {
                    $('#server_error').text("Email address or password is invalid!");
                    $('#server_error').show();
                } else {
                    if (data.url != '') {
                        window.location.href = '<?=base_url()?>wholesale/view-quotation/';
                    }

                }
                //swal("Alright!", "invalid login details", "success");
                return false;
            }, 'json');
        } else {
            $('#server_error').text("Email address or password is invalid!");
            $('#server_error').show();
        }
    });


    $(document).ready(function () {
        var form = $("#checkout_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                b_phone_no: {
                    phoneUK: true
                },
                b_mobile: {
                    phoneUK: true
                },
            },
            submitHandler: function (form) {
                form.submit();
                return false;
            }
        });
    });


    $(document).on("click", ".plus-qty", function (event) {
        var id = $(this).attr('id');
        var arr = id.split('_');
        var id = arr[1];

        var old = parseInt($('#old_qty' + id).val());
        var qty = parseInt($('#qty_' + id).val());
        var labels = parseInt($('#labels' + id).val());
        var type = $('#product_type' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());


        if (qty < max_qty) {
            if (type == 'Rolls' || type == 'Integrated') {

                if ($('#qty_' + id).val().length > 5) return;

                if (qty % min_qty != 0) {
                    var qty = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                } else {
                    qty = qty + min_qty;
                }
                if (qty > max_qty) {
                    qty = max_qty;
                }
                $('#qty_' + id).val(qty);

            } else if (type == 'xmass') {
                if (qty % min_qty != 0) {
                    var qty = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                } else {

                    if (qty >= 25) {
                        qty = qty + 25;
                    } else {
                        qty = qty + min_qty;
                    }

                }
                if (qty > max_qty) {
                    qty = max_qty;
                }
                $('#qty_' + id).val(qty);

            } else {
                qty = qty + 1;
                $('#qty_' + id).val(qty);
            }
        }
        if (qty != old) {
            $("#updatebtn_" + id).show();
        } else {
            $("#updatebtn_" + id).hide();
        }
    });
    $(document).on("click", ".minu-qty", function (event) {
        var id = $(this).attr('id');
        var arr = id.split('_');
        var id = arr[1];

        var old = parseInt($('#old_qty' + id).val());
        var qty = parseInt($('#qty_' + id).val());
        var labels = parseInt($('#labels' + id).val());
        var type = $('#product_type' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());

        if (qty > min_qty) {

            if (type == 'Rolls' || type == 'Integrated') {

                if (qty % min_qty != 0) {
                    var qty = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                    qty = qty - min_qty;
                } else {
                    qty = qty - min_qty;
                }

                if (qty > max_qty) {
                    qty = max_qty;
                }
                $('#qty_' + id).val(qty);

            } else if (type == 'xmass') {

                if (qty % min_qty != 0) {
                    var qty = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                    qty = qty - min_qty;
                } else {
                    if (qty > 25) {
                        qty = qty - 25;
                    } else {
                        qty = qty - min_qty;
                    }
                }

                if (qty > max_qty) {
                    qty = max_qty;
                }
                $('#qty_' + id).val(qty);

            } else {
                qty = qty - 1;
                $('#qty_' + id).val(qty);
            }

        }

        if (qty != old) {
            $("#updatebtn_" + id).show();
        } else {
            $("#updatebtn_" + id).hide();
        }


    });

    $(document).on("keypress keyup", ".input-number", function (event) {

        var id = $(this).attr('id');
        var arr = id.split('_');
        var id = arr[1];
        var old = parseInt($('#old_qty' + id).val());
        var qty = parseInt($('#qty_' + id).val());

        if (qty != old) {
            $("#updatebtn_" + id).show();
        } else {
            $("#updatebtn_" + id).hide();
        }


    });


    function update_item(id, menuid) {

        var qty = parseInt($('#qty_' + id).val());
        var labels = parseInt($('#labels' + id).val());
        var type = $('#product_type' + id).val();
        var menuid = $('#menuid' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());


        if (type == 'Rolls' && qty < min_qty) {
            alert_box('Please enter the quantity required from ' + min_qty + ' rolls ');
            $('#qty_' + id).focus();
            return false;
        } else if (qty < min_qty) {
            alert_box('Please enter the quantity required from ' + min_qty + ' sheets ');
            $('#qty_' + id).focus();
            return false;
        } else if (type == 'Integrated' && qty % min_qty != 0) {
            if (qty % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#qty_' + id).val(multipyer);
            }
            alert_box("Sorry, these labels are only available in sets of " + min_qty + " sheets pack. ");
            $('#qty_' + id).focus();
            return false;

        } else {
            $.ajax({
                url: base + 'wholesale/update_quotation',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, id: id, labels: labels, type: type},
                success: function (data) {
                    if (data) {
                        window.location.reload();
                        //data = $.parseJSON(data);

                        ///$('#aja_cart').html(data.cart_data);

                    }
                }
            });
        }

    }


    $(document).on("click", ".delete_quote", function (event) {
        var id = $(this).attr('id');
        swal({
                title: "Are you sure you want to Delete.?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn orangeBg",
                confirmButtonText: "Cancel",
                cancelButtonClass: "btn blueBg",
                cancelButtonText: "OK",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    console.log('cancel');
                } else {
                    $.ajax({
                        url: base + 'wholesale/delete_product_cart',
                        type: "POST",
                        async: "false",
                        data: {serial: id},
                        dataType: "json",
                        success: function (data) {
                            window.location.reload();
                        }
                    });
                }
            })
    });


</script>
