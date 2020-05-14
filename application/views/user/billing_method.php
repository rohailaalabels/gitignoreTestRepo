<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Billing Methods</li>
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
                        <h3> Billing Methods</h3>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
                    <div class="pull-right">
                        <a role="button" id="worlpaybtn" class="btn orange pull-right"><i
                                    class="fa fa-credit-card faa-horizontal animated"></i>
                            &nbsp; Add New Card </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Checkout -->

        <!-- Order Form -->
        <div class=" thumbnail">
            <div>

                <? if (isset($msg) and $msg != '') { ?>
                    <div class="alert alert-block alert-<?= $class ?> fade in mb-5">
                        <button class="close cross-button" type="button" data-dismiss="alert"> ×</button>
                        <p class="m-l-10"><?= $msg ?></p>
                    </div>

                <? } ?>


                <div role="tabpanel" class="">

                    <? include('user_menu.php') ?>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="col-md-12 m-t-10">

                                <div class="table-responsive col-md-12 p0 border0">
                                    <table class="table table-bordered table-hover ">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center" style="width:5%;">#</th>
                                            <th class="text-center" style="width:20%;">Credit Card</th>
                                            <th class="text-center" style="width:10%;">Details</th>
                                            <th class="text-center" style="width:10%;">Expiry</th>
                                            <th class="text-center" style="width:5%;">Default</th>
                                            <th class="text-center" style="width:10%;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <? $i = 0;
                                        if (count($results) > 0) {
                                            foreach ($results as $row) {
                                                $i++; ?>
                                                <tr id="main70">
                                                    <td class="text-center"
                                                        style="vertical-align: middle"><?= $i ?></td>
                                                    <td class="text-center"
                                                        style="vertical-align:middle"><?= $row->maskedCardNumber ?></td>
                                                    <td class="text-center"
                                                        style="vertical-align:middle"><?= str_replace("_", " ", $row->cardType) ?></td>
                                                    <td class="text-center"
                                                        style="vertical-align:middle"><?= $row->expiryMonth ?>
                                                        -<?= $row->expiryYear ?></td>
                                                    <td class="text-center"
                                                        style="vertical-align:middle"><?= ($row->is_default == 1) ? 'Yes' : '' ?></td>
                                                    <td class="text-center">
                                                        <a class="btn blueBg make_default" data-id="<?= $row->ID ?>"
                                                           rel="nofollow" title="Make Default"><i
                                                                    class="fa fa-check-square-o"></i></a>
                                                        <a class="btn orangeBg delete_card" data-id="<?= $row->ID ?>"
                                                           title="Delete Card"><i class="fa f-28 fa-trash-o "></i></a>
                                                    </td>
                                                </tr>
                                            <? }
                                        } else { ?>
                                            <tr>
                                                <td class=" text-center" colspan="6">No Saved Credit/Debit Card Found.
                                                </td>
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
    </div>


</div>

<div class="modal fade delivery_info" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">Add New Credit/Debit Card <a href="#myModalLabel"
                                                                                       class="anchorjs-link"><span
                                class="anchorjs-icon"></span></a></h4>
            </div>
            <div class=" text-center">
                <div id="aa_loader" class="white-screen" style=" display:block;">
                    <div class="loading-gif text-center" style="top:30%; left:35%; z-index:150;">
                        <img onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image"
                             style="width:139px; height:29px; ">
                    </div>
                </div>

                <form class="labels-form" id="add_form" method="post" action="">
                    <div id="paymentSection"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn blueBg" id="savecard" style="display:none;" type="button">Save Credit Card</button>
                <!-- <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>-->
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on("click", ".make_default", function (e) {
        var id = $(this).attr('data-id');

        swal({
                title: 'Do you want to make this card as a default',
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
                } else {
                    $.post(base + 'users/make_default_card', {cardid: id}, function (data) {
                        if (data.response == 'error') {
                            swal('Updation', 'Try Again ! unable to update ', 'warning');
                        } else {
                            window.location.reload();
                        }
                    }, 'json');

                }
            });

    });
    $(document).on("click", ".delete_card", function (e) {
        var id = $(this).attr('data-id');

        swal({
                title: 'Are you sure you want to Delete.?',
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
                } else {
                    $.post(base + 'users/delete_card', {cardid: id}, function (data) {
                        if (data.response == 'error') {
                            swal('Updation', 'Try Again ! unable to delete ', 'warning');
                        } else {
                            window.location.reload();
                        }
                    }, 'json');
                }
            });
    });


    function worldPay() {
        Worldpay.useTemplateForm({
            'clientKey': '<?=WP_Public_KEY?>',
            'form': 'add_form',
            'saveButton': false,
            'reusable': true,
            'templateOptions': {images: {enabled: false}, dimensions: {width: false, height: 265,}},
            'paymentSection': 'paymentSection',
            'display': 'inline',  //modal inline
            'callback': function (obj) {
                if (obj && obj.token) {
                    $('#aa_loader').show();
                    var _el = document.createElement('input');
                    _el.value = obj.token;
                    _el.type = 'hidden';
                    _el.name = 'token';
                    document.getElementById('add_form').appendChild(_el);
                    document.getElementById('add_form').submit();
                }
            },
            'beforeSubmit': function () {
                $('#aa_loader').show();
                return true;
            },
            'validationError': function (obj) {
                $('#aa_loader').hide();
            },
        });
        $("#paymentSection").show();
        $("#savecard").show();
    }

    var myVar;

    $('#worlpaybtn').click(function () {
        clearTimeout(myVar);
        worldPay();
        $('.delivery_info').modal('show');
        myVar = setTimeout(function () {
            $('#aa_loader').hide()
        }, 3000);
    });

    $('#savecard').click(function () {
        Worldpay.submitTemplateForm();
    });


</script>
<script src="https://cdn.worldpay.com/v1/worldpay.js"></script>