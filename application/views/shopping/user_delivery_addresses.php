<div class="clearfix" style="margin-top:20px;">
    <? foreach ($addresses as $add): ?>
        <div class="col-md-4 col-sm-6">
            <div class="address_box">
                <h4>
                    <?= $add->DeliveryTitle ?> <?= $add->DeliveryFirstName ?>
                    <?= $add->DeliveryLastName ?>
                </h4>
                <p>
                    <?= $add->DeliveryAddress1 ?>
                    <?= $add->DeliveryAddress2 ?>
                </p>
                <p>
                    <?= $add->DeliveryTownCity ?>,
                    <?= $add->DeliveryCountyState ?>
                    <?= $add->DeliveryPostcode ?>,
                </p>
                <p>
                    <?= $add->DeliveryCountry ?>
                </p>
                <div class="clearfix">
                    <div class="col-md-12 p0 deliver_btn_col"><a href="javascript:void(0);"
                                                                 class="btn btn-block orangeBg deliver_button"
                                                                 data-addressid="<?= $add->CustomerDeliveryID ?>">Deliver
                            to this address</a></div>
                    <div class="col-md-6 col-sm-6 edit_button_col"><a href="javascript:void(0);"
                                                                      class="btn btn-sm btn-block orange edit_address_button"
                                                                      data-addressid="<?= $add->CustomerDeliveryID ?>">Edit</a>
                    </div>
                    <div class="col-md-6 col-sm-6 delete_button_col"><a href="javascript:void(0);"
                                                                        class="btn btn-sm btn-block orange delete_address_button"
                                                                        data-addressid="<?= $add->CustomerDeliveryID ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach;
    //if(count($addresses) < 3):?>
    <div class="col-md-4 col-sm-6">
        <div class="address_box">
            <div class="add_new_address_box"><a href="javascript:void(0);" class="add_icon_link text-center">
                    <img src="<?= Assets ?>images/add_address_icon.png" class="img-responsive"/>
                </a> <a href="javascript:void(0);" class="add_new_address btn btn-sm orange btn-block"
                        style="margin-top: 30px;display: block;"> Add New Address</a></div>
        </div>
    </div>
    <? //endif;?>
</div>
<!-- end row-->