<style>
    .password-validation-span-text {
        font-size: 12px;
    }

    .password-validation-span-text-alert {
        font-size: 12px;
        color: #8a1f11;
    }

    .m-t-b-10-input {
        margin-bottom: 10px;
    }
</style>
<!--usman-->
<script type="text/javascript" src="<?= Assets ?>js/password_strengthen_plugin.js"></script>
<!--usman-->

<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">User Account</li>
            </ol>
        </div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col-xs-7  col-sm-8 col-md-7">
                    <div class="col-xs-12  col-sm-6 col-md-6 m-l-10 ">
                        <h1> User Account</h1>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
                    <div class="pull-right"><a role="button" class="btn orange pull-right"
                                               href="<?= base_url() ?>shoppingcart.php"><i
                                    class="fa fa-shopping-cart faa-horizontal animated"></i> &nbsp; View Basket </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout -->

        <!-- Order Form -->
        <div class=" thumbnail">
            <div>
                <div role="tabpanel" class="">
                    <? include('user_menu.php') ?>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="col-md-12 m-t-30">
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="fa-border p-t-b-10 text-center">
                                            <div id="ordergrouped" class="chart-height-md" style=" height:250px;"></div>
                                        </div>
                                        <? foreach ($group_orders as $orders) {

                                            if ($orders->StatusTitle == 'Completed') {
                                                $class = 'gType';
                                            } else if ($orders->StatusTitle == 'Production') {
                                                $class = 'pType';
                                            } else if ($orders->StatusTitle == 'Cancel') {
                                                $class = 'rType';
                                            } else if ($orders->StatusTitle == 'Pending Payment') {
                                                $class = 'yType';
                                            }

                                            ?>
                                            <div class="m-t-10">
                                                <div class="<?= $class ?> col-md-3">
                                                    <p>
                                                        <?= $orders->StatusTitle ?>
                                                    </p>
                                                    <h2>
                                                        <?= $orders->TOTAL ?>
                                                    </h2>
                                                </div>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="fa-border p-t-b-10 text-center">
                                            <div id="mob-desktop" class="chart-height-md" style=" height:250px;"></div>
                                        </div>
                                        <div class="m-t-10">
                                            <div class="bType col-md-3">
                                                <p>Total Order</p>
                                                <h2>
                                                    <?= $order['NumberOfOrders'] ?>
                                                </h2>
                                            </div>
                                            <div class="yType col-md-3">
                                                <p>Pending Order</p>
                                                <h2 id="pending_total">0</h2>
                                            </div>
                                            <div class="gType col-md-3">
                                                <p>Completed Order</p>
                                                <h2 id="complete_total">0</h2>
                                            </div>
                                            <div class="bType col-md-3">
                                                <p>Order Year</p>
                                                <h2>
                                                    <?= date("Y") ?>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 m-t-30 ">
                                <div class="col-sm-6 m-t-30">
                                    <div>
                                        <h4 class="textBlue">Account Information</h4>
                                        <p><strong>Name:</strong> <br>
                                            <?= $userdata['BillingTitle'] . ' ' . $userdata['BillingFirstName'] . ' ' . $userdata['BillingLastName'] ?>
                                        </p>
                                        <p><strong>User Email:</strong> <br>
                                            <?= $userdata['UserEmail'] ?>
                                        </p>
                                        <p><strong>Registered Date:</strong> <br>
                                            <?= $userdata['RegisteredDate'] ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6 m-t-30">
                                    <!--                    usman-->
                                    <div id="pwd-container">
                                        <!-- usman-->
                                        <div class="col-md-12">
                                            <h4 class="textBlue">Password Reset </h4>
                                        </div>
                                        <form class="labels-form" id="update_form" method="post" action="">
                                            <div class="col-sm-12  ">
                                                <label class="input"> <i class="showCurrentPassword icon-append fa fa-eye"></i>
                                                    <input type="password" name="current_pass" id="current_pass"
                                                           placeholder="Current Password" class="required">
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter the Current
                                                        Pass</b> </label>
                                            </div>
                                            <div class="col-sm-12  m-t-b-10-input">
                                                <label class="input" style="margin-bottom: 5px;"> <i
                                                            class="showPassword icon-append fa fa-eye"></i>
                                                    <input type="password" name="password" id="password"
                                                           placeholder="Password">
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter the New
                                                        Password</b> </label>
                                                <!--  usmnan-->
<!--                                                <span class="password-validation-span-text">Password must have between 8 and 20 characters, a lowercase letter, an uppercase letter, a number, one symbol i.e. ! &amp; * @ # ?</span>-->
                                                <input type="hidden" value="left" class="pop_position_class">
                                                <div class="pwstrength_viewport_progress"></div>


                                                <!--usman-->
                                            </div>
                                            <div class="col-sm-12 m-t-b-10-input">
                                                <label class="input" style="margin-bottom: 5px;"> <i
                                                            class="showConfirmPassword icon-append fa fa-eye"></i>
                                                    <input type="password" name="cpassword" id="cpassword"
                                                           placeholder="Confirm Password ">
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter the New
                                                        Password</b> </label>
<!--                                                <span class="password-validation-span-text-alert">Your password did not match</span>-->
                                            </div>
                                            <div class="col-sm-12">
                                                <button style="" type="submit" id=""
                                                        class="btn btn-block orange text-uppercase"> Update Password
                                                    &nbsp; &nbsp; <i class="fa fa-refresh"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="col-md-6 ">
                                <div class=" m-l-10 m-t-b-10">
                                    <h4 class="textBlue">Billing Address</h4>
                                </div>
                                <table class="table">
                                    <tbody>
                                    <tr class="border0">
                                        <th width="88" scope="row">Name:</th>
                                        <td width="311">Mr. Johan Smith</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company:</th>
                                        <td>Online Book Store</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address:</th>
                                        <td>141 Woodhead Road, Bradford, West Yorkshire, UK</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Postcode:</th>
                                        <td>bd7 2bl</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contact:</th>
                                        <td>Johan@gmail.com, +123 4567 890</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="m-t-b-10">
                                    <button style="" type="submit" class="btn-u btn-u-sm orange text-uppercase">Edit
                                        Billing Address &nbsp; &nbsp; <i class="fa fa-edit"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class=" m-l-10 m-t-b-10">
                                    <h4 class="textBlue">Delivery Address</h4>
                                </div>
                                <table class="table">
                                    <tbody>
                                    <tr class="border0">
                                        <th width="88" scope="row">Name:</th>
                                        <td width="311">Mr. Johan Smith</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company:</th>
                                        <td>Online Book Store</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address:</th>
                                        <td>141 Woodhead Road, Bradford, West Yorkshire, UK</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Postcode:</th>
                                        <td>bd7 2bl</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contact:</th>
                                        <td>Johan@gmail.com, +123 4567 890</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="m-t-b-10">
                                    <button style="" type="submit" class="btn-u btn-u-sm orange text-uppercase">Edit
                                        Delivery Address &nbsp; &nbsp; <i class="fa fa-edit"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= Assets ?>js/flot/jquery.flot.js"></script>
<script src="<?= Assets ?>js/flot/jquery.flot.pie.min.js"></script>
<script src="<?= Assets ?>js/flot/jquery.flot.tooltip.min.js"></script>
<script>

    //for changing cursor
    $('.showCurrentPassword, .showPassword, .showConfirmPassword').mouseenter(function(){
        $('.showCurrentPassword, .showPassword, .showConfirmPassword').css('cursor', 'pointer');
    });

    //for current password hide/show
    $('.showCurrentPassword').click(function () {
        if ($('#current_pass').attr('type') === 'password') {
            $('#current_pass').attr('type', 'text');
        } else {
            $('#current_pass').attr('type', 'password');
        }
    });

    //for new confirm password hide/show
    $('.showPassword').click(function () {
        if ($('#password').attr('type') === 'password') {
            $('#password').attr('type', 'text');
            $('.showPassword').addClass('fa-eye-slash');
        } else {
            $('#password').attr('type', 'password');
            $('.showPassword').addClass('fa-eye');
            $('.showPassword').removeClass('fa-eye-slash');
        }
    });

    //for confirm password hide/show
    $('.showConfirmPassword').click(function () {
        if ($('#cpassword').attr('type') === 'password') {
            $('#cpassword').attr('type', 'text');
        } else {
            $('#cpassword').attr('type', 'password');
        }
    });


    var $grid_color = "#eee";
    var $border_color = "#e1e8ed";
    var $default_black = "#666";
    var $red = "#3693cf";

    $(function () {

        var data, chartOptions;

        data = [

            <?     foreach($group_orders as $orders){?>
            {label: "<?=$orders->StatusTitle?>", data: <?=$orders->TOTAL?> },
            <? } ?>

        ];

        chartOptions = {
            series: {
                pie: {
                    show: true,
                    innerRadius: .4,
                    stroke: {
                        width: 0,
                    }
                }
            },
            shadowSize: 0,
            legend: {
                show: false,
            },

            tooltip: true,

            tooltipOpts: {
                content: '%s: %y'
            },

            grid: {
                hoverable: true,
                clickable: false,
                borderWidth: 1,
                tickColor: $border_color,
                borderColor: $grid_color,
            },
            shadowSize: 0,
            colors: ['#fb6e52', '#a0d468', '#fc0', '#e75b8d'],
        };

        var holder = $('#ordergrouped');

        if (holder.length) {
            $.plot(holder, data, chartOptions);
        }
    });
    $(function () {

        var d1, d2, data, chartOptions;

        d1 = [
            <?
            $pending = 0;
            if(count($pending_orders) > 0){
            foreach($pending_orders as $pro){
            $pending += $pro->total;
            $date = date('Y') . '-' . $pro->Month . '-1';
            ?>
            [<?=strtotime($date) * 1000?>, <?=$pro->total?>],
            <?    }
            }else {
            for($i = 0; $i <= 12;$i++){
            $date = date('Y') . '-' . $i . '-1'; ?>
            [<?=strtotime($date) * 1000?>, 0],
            <? } }?>


        ];

        d2 = [

            <?
            $complete = 0;
            if(count($completed_orders) > 0){
            foreach($completed_orders as $pro){
            $complete += $pro->total;
            $date = date('Y') . '-' . $pro->Month . '-1';
            ?>
            [<?=strtotime($date) * 1000?>, <?=$pro->total?>],
            <?    }
            }else {
            for($i = 0; $i <= 12;$i++){
            $date = date('Y') . '-' . $i . '-1'; ?>
            [<?=strtotime($date) * 1000?>, 0],
            <? } }?>


        ];


        data = [{
            label: 'Pending',
            data: d1
        }, {
            label: 'Completed',
            data: d2
        }];

        chartOptions = {
            xaxis: {
                mode: "time",
                tickSize: [1, "month"],
                monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                tickLength: 0
            },
            grid: {
                hoverable: true,
                clickable: false,
                borderWidth: 1,
                tickColor: $border_color,
                borderColor: $grid_color,
            },
            bars: {
                show: true,
                barWidth: 24 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 1,
                order: true,
                lineWidth: 0,
                fillColor: {colors: [{opacity: 1}, {opacity: 1}]}
            },
            shadowSize: 0,
            tooltip: true,
            tooltipOpts: {
                content: '%s: %y'
            },
            colors: ['#fc0', '#a0d468'],
        }

        var holder = $('#mob-desktop');

        if (holder.length) {
            $.plot(holder, data, chartOptions);
        }
    });

    $('#pending_total').text('<?=$pending?>');
    $('#complete_total').text('<?=$complete?>');


    $(document).ready(function () {
        var form = $("#update_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            //usman
            rules: {
                password: "required",
                password: {
                    required: true,
                    onkeyup: false,
                    remote: base + "ajax/is_password_exist"
                },
                cpassword: {
                    equalTo: "#password"
                }
            }, messages: {
                password: {
                    remote: $.validator.format("Password cant be same as your old password or account name.")
                },
            },
            submitHandler: function (form) {
                $.post(base + 'ajax/user_password_ajax', $("#update_form").serialize(), function (data) {
                    swal("", data.msg, data.class);
                    $("#update_form").find("input[type=text],input[type=password],textarea").val("");
                    return false;
                }, 'json');

                return false;
            }
            //   usman
        });
    });
</script>