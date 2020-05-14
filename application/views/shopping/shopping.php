<script src="<?= Assets ?>js/cart_live.js?ver=<?= time() ?>"></script>

<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Shopping Cart</li>
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
                        <h3 class="order_confirmation_text">Shopping Cart</h3>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-4 col-md-5 p-l-r-15">
                    <div class="pull-right"><a role="button" class="btn orange pull-right"
                                               href="<?= SAURL ?>transactionregistration.php"><i
                                    class="fa fa-arrow-circle-right faa-horizontal animated"></i>&nbsp; Checkout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout -->

        <div id="aja_cart" class="thumbnail ">
            <? include('cart.php'); ?>
        </div>
        <div class=" thumbnail">
            <div>
                <? include('enquiryform.php'); ?>
            </div>
        </div>
    </div>
</div>
<? $paymentfailed = $this->session->userdata('paymentfailed');
if (isset($paymentfailed) and $paymentfailed != '') { ?>
    <div class="modal fade hide" id="modalAds2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content " style="background: #17b1e3">
                <div class="m-t-15">
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                </div>
                <div class="col-lg-2 m-t-60 "><i class="  fa fa-gbp fa-10x text-white faa-horizontal animated"></i>
                </div>
                <div class="col-lg-9 m-b-10  text-white ">
                    <h3>Order Processing Failed </h3>
                    <h4>Your Order(#
                        <?= $paymentfailed ?>
                        ) has been failed due to payment, please try again or call our customer Careteam. </h4>
                    <button type="button" class="btn orangeBg " data-dismiss="modal">Close</button>
                </div>
                <div class="modal-footer  border0"> &nbsp;</div>
            </div>
        </div>
    </div>
    <script>
        $(window).load(function () {
            $('#modalAds2').modal('show');
            $('#modalAds2').removeClass('hide');
        });
    </script>
    <? $this->session->unset_userdata('paymentfailed', '');
} ?>
