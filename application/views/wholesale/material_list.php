<?
foreach ($materials as $rec) {
    if (preg_match("/Circular/i", $rec->Shape) || preg_match("/Oval/i", $rec->Shape)) {
        $img_class = 'img-circle';
    } else {
        $img_class = 'img-Sheet';
    }

    $pname = explode('-', $rec->ProductName);

    if ($rec->Adhesive == 'Removable' || $rec->Adhesive == 'Peelable') {
        $adhesive = "Peelable";
    } else {
        $adhesive = $rec->Adhesive;
    }


    if (preg_match("/A5/", $rec->ProductBrand)) {
        $min_qty = '100';
        $max_qty = '9000000';

    } else if (preg_match("/A3/", $rec->ProductBrand)) {
        $min_qty = '100';
        $max_qty = '9000000';

    } else if (preg_match("/Roll Labels/", $rec->ProductBrand)) {
        $min_qty = $this->home_model->min_qty_roll($rec->ManufactureID);
        $max_qty = '9000000';

    } else if (preg_match("/SRA3/", $rec->ProductBrand)) {
        $min_qty = '100';
        $max_qty = '9000000';
    } else {
        $min_qty = '25';
        $max_qty = '9000000';
    }


    $words = preg_split("/[\s,]+/", $adhesive);

    $desc = $rec->ProductCategoryName . ". " . $rec->Appearance;

    $comp = $this->home_model->check_compatibility($rec->SpecText7, $rec->ProductBrand);

    $rec->Image1 = str_replace(".gif", ".png", $rec->Image1);


    $max_length = 130;
    if (strlen($desc) > $max_length) {
        $offset = ($max_length - 3) - strlen($desc);
        $short_desc = substr($desc, 0, strrpos($desc, ' ', $offset)) . '...';
        $short_desc .= ' to read more place the <a style="cursor:pointer;" title="' . $desc . '"> cursor here.</a>';
    } else {
        $short_desc = $desc;
    }


    ?>


    <div class="detail">
        <div class="row inner">
            <div class="col-lg-1 col-md-1 col-sm-12 samp text-center">
                <img onerror='imgError(this);' class="<?= $img_class ?>"
                     src="<?= Assets ?>images/material_images/<?= $rec->Image1 ?>" width="46" height="46">
            </div>
            <div class="col-lg-11 col-md-11 col-sm-12 cont">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4 id="prd_name<?= $rec->ProductID ?>"> <?= $pname[0] ?> </h4>
                    <p><?= $short_desc ?></p>
                    <div class="clear5"></div>
                    <? if ($comp != '') { ?>
                        <small class="comp">Compatible with <?= $comp ?></small><br/>
                    <? } ?>
                    <br/>
                    <a href="#" id="<?= $rec->ProductID ?>" class="technical_specs" data-target=".material"
                       data-toggle="modal"
                       data-original-title="Tecnial Specification"> View Material Specification </a>

                    <div class="pull-right LabelTag <?= str_replace(".png", "", $rec->Image1) ?> no-margin"><?= $adhesive ?>
                        <br>
                        <small>Adhesive</small></div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">

                    <? if (preg_match("/Roll Labels/", $rec->ProductBrand)) { ?>
                        <input type="hidden" id="max_labels<?= $rec->ProductID ?>" value="<?= $rec->LabelsPerSheet ?>"/>
                        <input type="hidden" id="min_qty<?= $rec->ProductID ?>" value="<?= $min_qty ?>"/>
                        <input type="hidden" id="max_qty<?= $rec->ProductID ?>" value="<?= $max_qty ?>"/>

                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                Enter number of labels and rolls
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <p class="cBlue pull-left"><strong>Labels Per Roll</strong>
                                            <input maxlength="4" type="text" id="labels_<?= $rec->ProductID ?>"
                                                   placeholder="100+"
                                                   class="form-control allownumeric">


                                            <small>Maximum labels per roll - <?= $rec->LabelsPerSheet ?></small></p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <p class="cBlue pull-left"><strong style="font-size:12px;">Number of
                                                Rolls</strong>

                                            <input maxlength="5" type="text" id="roll_<?= $rec->ProductID ?>"
                                                   placeholder="<?= $min_qty ?>+"
                                                   class="form-control allownumeric">

                                            <small>Minimum order <?= $min_qty ?> rolls</small></p>
                                    </div>

                                    <div class="clear"></div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 del-f">
                                        <div id="delivery_txt<?= $rec->ProductID ?>"></div>&nbsp;
                                    </div>


                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 text-right right-col">
                                <div class="clear20"></div>
                                <button id="add_btn<?= $rec->ProductID ?>"
                                        onclick="add_roll_item('<?= $rec->ProductID ?>','<?= $rec->ManufactureID ?>');"
                                        class="btn orangeBg" type="button"> Add to Quotation <i
                                            class="fa fa-calculator"></i></button>


                                <div class="clear10"></div>

                            </div>
                        </div>


                    <? } else { ?>


                        <div class="row">

                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="row">

                                    <div class="col-lg-10 col-md-10 col-sm-12">

                                        <div class="row" id="calculations_box<?= $rec->ProductID ?>">
                                            <div class="col-lg-9 col-md-9 col-sm-12 add"><b>Add number of sheets</b>
                                                <div class="clear"></div>
                                                <small>Minimum order <?= $min_qty ?> sheets</small></div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <input type="text" id="sheet_qty_<?= $rec->ProductID ?>"
                                                       class="form-control allownumeric" maxlength="8"
                                                       placeholder="<?= $min_qty ?>+"/>
                                            </div>

                                            <div class="clear"></div>
                                        </div>


                                        <input type="hidden" id="labels_p_sheet<?= $rec->ProductID ?>"
                                               value="<?= $rec->LabelsPerSheet ?>"/>
                                        <input type="hidden" id="min_qty<?= $rec->ProductID ?>"
                                               value="<?= $min_qty ?>"/>
                                        <input type="hidden" id="max_qty<?= $rec->ProductID ?>"
                                               value="<?= $max_qty ?>"/>
                                    </div>

                                    <div class="clear10"></div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 text-right right-col">


                                <button id="add_btn<?= $rec->ProductID ?>"
                                        onclick="add_item('<?= $rec->ProductID ?>','<?= $rec->ManufactureID ?>');"
                                        class="btn orangeBg" type="button"> Add to Quotation <i
                                            class="fa fa-calculator"></i></button>

                                <div class="clear10"></div>

                            </div>
                        </div>

                    <? } ?>

                </div>


            </div>
        </div>
    </div>

<? } ?>
