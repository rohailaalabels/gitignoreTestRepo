<style>
    .zoomIcon {
        padding-top: 45px;
    }
</style>
<div class="festiveBg text-center">
    <div class="container ">
        <div class="col-md-4"><img onerror='imgError(this);' src="<?= Assets ?>images/chrismas.png" width="273"
                                   height="146" alt="Merry Christmas"></div>
        <div align="center" class="christmasOffer  col-md-4">
            <p>5 Sheets of <br>
                <small>festive address labels </small><br>
                for only £4.99 inc. Postage & VAT </p>
        </div>
        <div class="col-md-4"><img onerror='imgError(this);' src="<?= Assets ?>images/2016.png" width="273"
                                   height="146"></div>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-12 col-md-12 ">
                <div class="thumbnail p-l-r-10">
                    <h2 class="BlueHeading ">Christmas labels</h2>
                    <p class="text-justify"> This Christmas stop writing and start sticking with festive full-colour
                        labels. Use for letters, packages, gifts and more. Whether for personal or
                        commercial use we will have a seasonal label to suit and if you cannot find what you need from
                        the standard range we can assist in designing and
                        producing the perfect label required. </p>
                    <h2 class="BlueHeading ">Christmas address labels</h2>
                    <p class="text-justify"> Choose from four designs for your Christmas address/return address labels.
                        You can choose from three popular sizes, all the same design on the sheets or all four included
                        on each sheet. Just download the adapted templates from this page and add the address to create
                        and print for a wonderful festive finishing touch on your cards and gift mailings this
                        year. </p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="1"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_01.jpg"
                                                               alt="Season Greetings"></div>
                            </div>
                            <p class="blueText">Star</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="2"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_02.jpg"
                                                               alt="Season Greeting"></div>
                            </div>
                            <p class="blueText">Reindeer</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="3"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_03.jpg"
                                                               alt="Season Greeting"></div>
                            </div>
                            <p class="blueText">Bauble</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="4"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_04.jpg"></div>
                            </div>
                            <p class="blueText">Christmas Tree</p>
                        </div>
                    </div>
                    <h2 class="BlueHeading ">Select Christmas address labels on A4 sheets</h2>
                    <div class="row">
                        <?php $design_option = $address_opt;
                        foreach ($address as $pro) {
                            include('christmas_list.php');
                        } ?>
                    </div>
                    <h2 class="BlueHeading ">Especially at Christmas – promotional & gift/packaging labels</h2>
                    <p class="text-justify"> Whether you want to add to the shelf appeal of selected products or just
                        brighten up your gift wrapping these circular and heart shaped labels are an ideal way of
                        getting into the festive spirit and delighting your customers with that special personal
                        touch. </p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="5"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_05.jpg"></div>
                            </div>
                            <p class="blueText">Round Special Gift Labels <br>
                                Red &amp; White </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="7"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_07.jpg"></div>
                            </div>
                            <p class="blueText">Round Merry Christmas Labels <br>
                                Purple &amp; Cream </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="8"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_08.jpg"></div>
                            </div>
                            <p class="blueText">Round Christmas &amp; New Year Labels <br>
                                Red &amp; Black </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="6"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_06.jpg"></div>
                            </div>
                            <p class="blueText">Heart Special Gift Labels <br>
                                Red &amp; White</p>
                        </div>
                    </div>
                    <div class="row">
                        <? $design_option = $heart_opt;
                        foreach ($packaging1 as $pro) {
                            include('christmas_list.php');
                        }

                        $design_option = $packaging_opt;

                        foreach ($packaging2 as $pro) {
                            include('christmas_list.php');
                        }

                        ?>
                    </div>
                    <p>Please note that because of the sheet layout on heart shape AAHT008 this design is only available
                        with a white background. </p>
                    <h2 class="BlueHeading ">Special delivery gift labels</h2>
                    <p>Thrill children and loved ones on Christmas morning with these personalised gift labels from
                        Santa's helpers and have some fun along the way. </p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="9"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_09.jpg"></div>
                            </div>
                            <!-- <p class="blueText">Special Delivery Gift</p>-->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="11"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_11.jpg"></div>
                            </div>
                            <!--   <p class="blueText">Special Delivery Gift</p>-->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="10"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_10.jpg"></div>
                            </div>
                            <!--<p class="blueText">Special Delivery Gift</p>-->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="thumbnail hoverme">
                                <div class="zoom">
                                    <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                          id="12"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                                </div>
                                <div class=" text-center"><img onerror='imgError(this);' width="228" height="125"
                                                               src="<?= Assets ?>images/christmas/pro_12.jpg"></div>
                            </div>
                            <!-- <p class="blueText">Special Delivery Gift</p>-->
                        </div>
                    </div>
                    <div class="row">
                        <? $design_option = $delivery_list;
                        foreach ($delivery as $pro) {
                            include('christmas_list.php');
                        }
                        ?>
                    </div>
                </div>
                <div class="thumbnail  ">
                    <div class=" p-l-r-10">
                        <h2 class="BlueHeading text-center">Prices (Inc. Postage, Packing & VAT)</h2>
                        <div class="col-md-12 text-center">
                            <ul class="list-unstyled" style="font-size:14px;">
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 5 Sheets
                                    <span class="textBlue m-l-10">&pound;4.99 </span></li>
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 10 Sheets
                                    <span class="textBlue m-l-10">&pound;6.79 </span></li>
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 15 Sheets
                                    <span class="textBlue m-l-10">&pound;9.99 </span></li>
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 20 Sheets
                                    <span class="textBlue m-l-10">&pound;12.99 </span></li>
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 25 Sheets
                                    <span class="textBlue m-l-10">&pound;15.49 </span></li>
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 50 Sheets
                                    <span class="textBlue m-l-10">&pound;24.99 </span></li>
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 75 Sheets
                                    <span class="textBlue m-l-10">&pound;34.99 </span></li>
                                <li class="col-xs-12 col-sm-6 col-md-3"><i class="fa fa-check-circle "></i> 100 Sheets
                                    <span class="textBlue m-l-10">&pound;39.99 </span></li>
                            </ul>
                            <p class="text-center">Prices on label quantities in excess of 100 sheets and information on
                                reprographic charges for the personalisation of messages and mail merge services are
                                available upon application. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
</div>
</div>

<!-- Layout modal -->
<div class="modal fade layout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div id="ajax_layout_spec"></div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Layout modal -->

<script>
    $(document).ready(function () {
        apply_hover_effect();
    });

    function apply_hover_effect() {
        $('.hoverme').hover(
            function () {
                $(this).find('.zoom').slideDown(250); //.fadeIn(250)
            },
            function () {
                $(this).find('.zoom').slideUp(250); //.fadeOut(205)
            }
        );
    }


    $(document).on("click", ".layout_specs", function (e) {
        var id = $(this).attr('id');
        $('#ajax_layout_spec').html('<div class="text-center"><img onerror='
        imgError(this);
        '  src="<?=Assets?>images/christmas/pro_0' + id + '_lg.jpg"></div>'
    )
        ;
    });


    function add_item(id, menuid) {

        var qty = $('#qty_' + id).val();
        var prd_name = $('#prd_name' + id).val();
        var design = $('#design_' + id).val();

        if (qty.length == 0) {
            alert_box('Please select quantity before add to basket ');
        } else if (design.length == 0) {
            alert_box('Please select desing for printing before add to basket ');
        } else {

            $.ajax({
                url: base + 'ajax/add_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: qty, menuid: menuid, prd_id: id, design: design},
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            popup_messages(menuid + ' - ' + prd_name + ' ' + design);
                            $('#cart').html(data.top_cart);
                        }
                    }
                }
            });
        }

    }


</script>