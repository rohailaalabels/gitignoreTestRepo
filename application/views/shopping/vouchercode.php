<div class="Lblue">
    <div class="row">
        <div class="">
            <div class="pull-left">
                <div> Voucher Code</div>
            </div>
            <div class="pull-right"><i class="fa f-20 fa-tag"></i></div>
        </div>
    </div>
</div>
<div class="row p-t-b-12 ">
    <div class="text-center <?= $apply_voucher_class ?>"><a id="<?= $removebtn ?>" href="javascript:void(0);"><strong>Remove
                Voucher Code?</strong></a></div>

    <!-- (AA30 STARTS) -->
    <div class=" m-l-20  <?= $no_voucher_class ?> "><a class="showHideVoucherForm"><strong>Have a Voucher Code?</strong></a></div>
    <div class="p-t-b-12 voucherForm <?= $no_voucher_class ?>">
    <!-- (AA30 ENDS) -->

        <form class="labels-form" id="voucherFormConatiner">
            <div class="col-md-12">
                <div class="col-sm-8 ">
                    <label class="input m0">

                        <!-- (AA30 STARTS) -->
                        <input type="text" name="voucher_code" value="<?php //echo $vouchertext; ?>" id="voucher_code" placeholder="Enter Voucher Code">
                        <!-- (AA30 ENDS) -->

                        <b class="tooltip tooltip-bottom-right">Needed to enter the Voucher Code</b> </label>
                </div>
                <div class="col-sm-4">

                    <!-- (AA30 STARTS) -->
                    <button id="<?= $applybtn ?>" class="btn btn-primary applyVoucherCode" type="button">Apply</button>
                    <!-- (AA30 STARTS) -->

                </div>
            </div>

            <!-- (AA30 STARTS) -->
            <div class="col-sm-11 m-l-5"><small>if you have a promotional voucher code, please enter it here and click Apply. </small></div>
            <!-- (AA30 STARTS) -->

        </form>
    </div>
    <div class="p-t-b-12 <?= $apply_voucher_class ?>">
        <div align="center" class="text-center">
            <h2>Discount:
                <?= $disuntoffer ?>
            </h2>
        </div>
    </div>
</div>