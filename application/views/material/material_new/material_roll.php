<link rel='stylesheet' href='<?= Assets ?>css/1200px-material-page.css?v=<?php echo time();?>'>

<style>
    .labels-form input.error {
        background: rgb(251, 227, 228);
        border: 1px solid #fbc2c4;
        color: #8a1f11;
    }

    .labels-form label.error {
        color: #8a1f11;
        display: inline-block;
        font-weight: normal;
    }

    .top-head .lng-btn {
        display: inline-block;
        float: right;
        height: 30px;
        margin-left: 0px;
    }

    .top-head .lng-btn a {
        background: none 0 0;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        margin: 0;
        outline: 0 none;
        padding: 1px;
        text-align: center;
    }

    .top-head .lng-btn img {
        margin: 0px 0px 0px 26px;
    }

    @media only screen and (min-width: 1200px) {
        .logoadjustements {
            width: 23% !important;
        }
    }

    @media only screen and (min-width: 1200px) {
        .searchboxadjustment {
            width: 27%;
        }
    }

    @media only screen and (min-width: 1200px) {
        .searchboxadjustment div {
            width: 100%;
        }
    }
</style>
<link href="<?= Assets ?>css/mat-sep-2017.css" rel="stylesheet">
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<style>
    .giveMeEllipsis {
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 3.6em;
        line-height: 1.8em;
    }

    .dropzone .dz-preview {
        margin: 0px;
    }

    .dropzone .dz-preview .dz-image {
        display: block;
        border-radius: none;
        height: 50px;
        overflow: hidden;
        position: relative;
        width: 50px;
        z-index: 10;
    }

    .dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
        display: block;
        height: 25px;
        width: 25px;
    }

    .dropzone .dz-preview.dz-image-preview .dz-details {
        display: none;
    }

    .dropzone .btn {
        margin-top: 10px;
        cursor: pointer;
    }

    .mat-ch .detail .form-control {
        padding: 6px 6px !important;
    }

    .discount_price {
        color: black !important;
        font-size: 16px !important;
        text-decoration: line-through !important;
        display: inline !important;
    }

    .mat_class {
        margin: 5px;
    }

    select option:disabled {
        background: #dedede;
    }

    .ovFl thead {
        background: #17b1e3 none repeat scroll 0 0;
        color: white;
    }

    .productdetails .phead {
        font-size: 12px;
        line-height: normal;
    }

    .dm-box .dm-selector .btn {
        font-size: 13px;
        border: 1px solid #e5e5e5;
        color: #666;
        text-align: left;
    }

    .dm-box .dm-selector .fa {
        position: absolute;
        right: 10px;
        top: 11px;
    }

    .dm-box .dm-selector .dropdown-menu a {
        color: #666;
        cursor: pointer;
    }

    .dm-selector .tooltip {
        font-size: 13px !important;
        width: 290px !important;
    }

    .dm-selector .tooltip.left .tooltip-arrow {
        border-left-color: #FEF7D8 !important;
    }

    .dm-selector .tooltip.right .tooltip-arrow {
        border-right-color: #FEF7D8 !important;
    }

    .dm-selector .tooltip.top .tooltip-arrow {
        border-top-color: #FEF7D8 !important;
    }

    .dm-selector .tooltip.bottom .tooltip-arrow {
        border-bottom-color: #FEF7D8 !important;
    }

    .dropdown-menu li .tooltip .tooltip-inner {
        background-color: #FEF7D8;
        border-radius: 4px;
        color: #454545;
        max-width: 381px;
        padding: 8px 15px;
        text-align: justify;
        text-decoration: none; /*  font-style: italic;*/
    }

    .dm-selector.tooltip.in {
        opacity: 1;
    }

    .tooltip.right .tooltip-arrow {
        border-right-color: #fff8dc !important;
    }

    .productdetails .input-group .form-control {
        height: 38px !important;
    }

    .sweet-alert {
        box-shadow: 0 0 20px;
    }

    .mat-may-2017 section article.mat-detail .specs a.technical_specs {
        top: 0px;
    }

    .mat-may-2017 section article.mat-tabs .ofq {
        margin-top: 140px;
    }

    .flexcontainer {
        display: flex;
    }

    .flexcontainer .why-seal {
        /*position: absolute;

            right: 0px;

            bottom: 0px;*/

    }

    .flexcontainer .why-seal img {
        margin: 0 auto;
    }

    .table.printer {
        font-family: "Open Sans", Helvetica, Arial, sans-serif;
    }

    .sort-filters:before, .sort-filters:after {
        content: " ";
        display: table;
        clear: both;
    }

    .filterBg .labels-form label {
        margin-bottom: 0px;
    }

    .filterBg {
        padding: 15px 10px !important;
        margin-bottom: 0px;
        background: #17b1e3;
        border-radius: 0;
    }

    .filterBg h4 {
        color: #fff;
    }

    .mat-ch {
        border: 0;
    }

    .pr-table {
        width: 100%;
    }

    .pr-table td {
        padding: 0 15px;
        border-right: 1px solid;
        text-align: center;
    }

    .pr-table td:first-child {
        padding-left: 0;
    }

    .pr-table td:last-child {
        border: 0;
    }

    .printer_top_div table tr td {
        padding: 0 !important;
        vertical-align: top;
    }

    .printer_top_div {
        border-left: 1px solid #333;
    }

    .price_promise h1 {
        font-size: 20px;
        font-weight: bold;
        margin: 0 0 10px 0 !important;
    }

    .euro_text_top {
        height: 70px;
        margin-top: 30px;
    }

    .euro_thumbnail {
        margin-top: -25px !important;
    }

    @media (min-width: 1024px) {
        .plainprice_box {
            margin-top: -20px;
        }

        .mat-may-2017 section article.mat-tabs .service {
            margin-top: -20px;
            margin-left: -140px !important;
        }
    }

    .plainprice_box .halfprintprice .phead {
        font-weight: bold;
    }

    .filterBg.desktop-view {
        margin: -15px;
        margin-top: 0px;
        border-top: 5px solid #e0e0e0;
        background: #fff;
    }

    .filterBg.desktop-view.non_euro {
        margin-top: 5px;
    }

    .filterContainer {
        display: inline-flex;
        flex-direction: column-reverse;
        transition: all 2s;
    }
</style>

<style>
    @media screen and (min-width: 768px) {
        .price_promise_div {
            margin-top: -20px;
            margin-bottom: 10px;
        }
    }

    @media screen and (min-width: 1024px) {
        .price_promise_div {
            margin-top: -55px;
            margin-bottom: 10px;
        }
    }
</style>


<div class="">
    <div class="container m-t-b-8">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ol class="breadcrumb  m0">
                    <?= $this->home_model->genrate_breadcrumb('material'); ?>
                    <li class="active">
                        <?= $details['CategoryName'] ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>



<div class="bgGray" style="padding-top:0;">

    <div class="MaterialSeprator">&nbsp;</div>

    <!--  Material Page Content Start  -->
    <div class="container">
        <!--  Material Page Left Filter Start  -->
        <div class="MaterialFilterMain">
            <div class="MaterialFilterBackButton">
                <?php //die('aa');
                $url = explode('/',uri_string()); ?>
                <a href="<?=base_url().$url[1].'/'.$url[2]?>">
                    <i class="fa fa-arrow-circle-left"></i> Back to Shape and Size
                </a>
            </div>

            <div class="switchToggle MaterialFilterToggleButton">
                <div class="FilterDisableEnable"></div>
                <input type="checkbox" id="switch" onclick="FilterSwapping();" value="sbProduct">
                <label for="switch">Toggle</label>
            </div>

            <div class="inputhiddens">
                <input type="hidden" name="categoryId" class="categoryId" value="<?php echo $categoryId; ?>">
                <input type="hidden" name="printingType" class="printingType" value="Rolls">
                <input type="hidden" name="productid" class="productid" value="<?php echo $productid; ?>">
                <input type="hidden" name="filterUses" class="filterUses" value="byProduct">
                <input type="hidden" name="dieCode" class="dieCode" value="<?= ltrim($details['DieCode'], "1-") ?>">
            </div>

            <div id="FilterContainer" class="159">

                <div class="RowDefault pull-left MaterialByProducts">

                    <div class="disablePopupByProduct"></div>

                    <div class="MaterialFilterHeader m-t-12 text-center">Filter by Products</div>
                    <div class="MaterialWhiteBg MaterialFilter">

                        <div class="MaterialFilterTitle FBUResultFound  text-center"></div>

                        <div class="MaterialSaveAndReset">
                            <div class="MaterialSaveSearch MaterialSaveSearchByProduct pull-left">
                                <a href="javascript:;">
                                    <?php
                                    $userID = $this->session->userdata('userid');
                                    if (isset($userID) && $userID != '') {
                                        ?>
                                        <input type="checkbox" id="favourite_heart" class="opacity-0 favouriteProducts favouritebyProducts" value="<?php echo implode(',', $totalFavouritesByProduct); ?>" onclick="filterbyProducts();">
                                        <span class="totalFavouriteCounts">
                                                <?php
                                                if (count($totalFavouritesByProduct) > 0) {
                                                    echo count($totalFavouritesByProduct);
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </span>
                                        <span  id="favourite_heart_span" data-filter="product" class="fa fa-heart-o favouriteProducts favouritebyProducts favouriteHeart" value="<?php echo implode(',', $totalFavouritesByProduct); ?>" ></span>

<!--                                        <i class="fa fa-heart-o"></i>-->
                                        <?php
                                    }
                                    ?>

                                </a>
                            </div>
                            <div class="MaterialResetFilter pull-right resetFilterOutside"><a href="javascript:;" onclick="resetByProducts()"><i class="fa fa-sync-alt"></i> Reset Filter</a></div>
                        </div>
                        <div class="clear"></div>
                        <div class="MaterialFilterListing">

                            <ul>
                                <?php $listing_count = 1; ?>
                                <!-- STATIC FILTERS OPTIONS STARTS FROM HERE -->
                                <li>
                                    <a href="javascript:;"
                                       class=" MaterialFilterLeftProducts MaterialFilterListSingle MaterialFilterListing<?= $listing_count; ?>">
                                        <div class="MaterialFilterLeft  pull-left">Adhesive Type<span> (<?php echo count($adhesives); ?>)</span></div>
                                        <div class="MaterialFilterRight pull-right"><i class="fa fa-chevron-right"></i>
                                        </div>
                                    </a>
                                    <div class="MaterialFilterDropRight FBPParent FBPParent<?= $listing_count; ?>">
                                        <div class="MaterialDropRightHeader">
                                            <div class="MaterialDropRightTitle pull-left">
                                                <h3 class="TitleH3">Adhesive Type<span>- Select 1 or more options.</span></h3>
                                            </div>
                                            <div class="MaterialDropRightClose pull-right" data-counter="<?= $listing_count; ?>" aria-label="Close"><a href="javascript:;">Close</a></div>
                                        </div>
                                        <p class="filter_message_text"><?php echo $filter_message;?> </p>
                                        <div class="MaterialDropRightBody">
                                            <?php
                                            if (isset($adhesives) && $adhesives != '' && count($adhesives) > 0) {
                                                foreach ($adhesives as $key => $adhesive) {
                                                    if ($key % 3 == 0) {
                                                        echo "<div style='clear:both;'></div>";
                                                    } ?>
                                                    <div class="MaterialDropRightBodyCheckbox">
                                                        <label class="DropRightCheckBox DropRightAdhesive"><?php echo $adhesive->adhesive; ?>
                                                            <input type="checkbox" data-filter-type='adhesive' data-filter-val="<?= $adhesive->adhesive ?>" name="FBAP" value="<?= "'" . $adhesive->adhesive . "'"; ?>" class="FBAP FBPATC">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="MaterialDropRightFooter">

                                            <a class="btn orange clearBtn clearBtnByProduct" href="javascript:;" onclick="clearFilterByAT(this)">Clear</a>
                                            <a class="btn ApplyBtn ApplyBtnByProduct" href="javascript:;" onclick="filterbyProducts()">Apply</a>
                                            <div class="resetInsideFilters MaterialResetFilter pull-right"><a href="javascript:;" onclick="resetByProducts()"><i class="fa fa-sync-alt"></i> Reset Filter</a></div>
                                            <!--                                            <a class="btn orange clearBtnByProduct" href="javascript:;">Clear</a>-->
                                            <!--                                            <a class="btn ApplyBtn" href="javascript:;">Apply</a>-->
                                        </div>
                                    </div>
                                    <?php $listing_count++; ?>

                                </li>

                                <li>
                                    <a href="javascript:;"
                                       class=" MaterialFilterLeftProducts MaterialFilterListSingle MaterialFilterListing<?= $listing_count; ?>">

                                        <div class="MaterialFilterLeft  pull-left">Printer Compatibility
                                            <span>(<?php echo count($printers); ?>)</span></div>
                                        <div class="MaterialFilterRight pull-right"><i class="fa fa-chevron-right"></i>
                                        </div>
                                    </a>
                                    <div class="MaterialFilterDropRight FBPParent FBPParent<?= $listing_count; ?>">
                                        <div class="MaterialDropRightHeader">
                                            <div class="MaterialDropRightTitle pull-left">
                                                <h3 class="TitleH3">Printer Compatibility <span>- Select 1 or more options.</span>
                                                </h3>
                                            </div>
                                            <div class="MaterialDropRightClose pull-right" data-counter="<?= $listing_count; ?>" aria-label="Close"><a href="javascript:;">Close</a></div>
                                        </div>
                                        <p class="filter_message_text"><?php echo $filter_message;?> </p>
                                        <div class="MaterialDropRightBody">
                                            <?php
                                            if (isset($printers) && $printers != '' && count($printers) > 0) {
                                                foreach ($printers as $key => $printer) {
                                                    if ($key % 3 == 0) {
                                                        echo "<div style='clear:both;'></div>";
                                                    } ?>
                                                    <div class="MaterialDropRightBodyCheckbox">
                                                        <label class="DropRightCheckBox DropRightPrinter"><?php echo $printer; ?>
                                                            <input type="radio" data-filter-type='printer' data-filter-val="<?= $printer ?>" name="FBAP" value="<?= "'%" . $printer . "%'"; ?>" class="FBAP FBPCC">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="MaterialDropRightFooter">

                                            <a class="btn orange clearBtn clearBtnByProduct  FBPCC" href="javascript:;" onclick="clearFilterByPC(this)">Clear</a>
                                            <a class="btn ApplyBtn ApplyBtnByProduct" href="javascript:;" onclick="filterbyProducts()">Apply</a>
                                            <div class="resetInsideFilters MaterialResetFilter pull-right"><a href="javascript:;" onclick="resetByProducts()"><i class="fa fa-sync-alt"></i> Reset Filter</a></div>

                                            <!--                                            <a class="btn orange clearBtnByProduct" href="javascript:;">Clear</a>-->
                                            <!--                                            <a class="btn ApplyBtn" href="javascript:;">Apply</a>-->
                                        </div>
                                    </div>
                                    <?php $listing_count++; ?>

                                </li>
                                <!-- STATIC FILTERS OPTIONS ENDS FROM HERE -->


                                <!-- DYNAMIC FILTERS + COLOURS OPTIONS STARTS FROM HERE -->
                                <?php
                                if (isset($materials_roll) && $materials_roll != '' && count($materials_roll) > 0) {
                                    foreach ($materials_roll as $keyParent => $material) {
                                        ?>
                                        <li>
                                            <a href="javascript:;"
                                               class="MaterialFilterLeftProducts MaterialFilterListSingle MaterialFilterListing<?= $listing_count; ?>">
                                                <div class="MaterialFilterLeft pull-left"><?php echo $material->M_group_name; ?>
                                                    <span>(<?php echo $material->totalColours; ?>)</span></div>
                                                    <div class="MaterialFilterRight pull-right"><i class="fa fa-chevron-right"></i>
                                                </div>
                                            </a>
                                            <div class="MaterialFilterDropRight FBPParent FBPParent<?= $listing_count; ?>">
                                                <div class="MaterialDropRightHeader">
                                                    <div class="MaterialDropRightTitle pull-left">
                                                        <h3 class="TitleH3"><?php echo $material->M_group_name; ?><span>- Select 1 or more options.</span>
                                                        </h3>
                                                    </div>
                                                    <div class="MaterialDropRightClose pull-right" data-counter="<?= $listing_count; ?>" aria-label="Close"><a href="javascript:;">Close</a></div>
                                                </div>
                                                <p class="filter_message_text"><?php echo $filter_message;?> </p>
                                                <div class="MaterialDropRightBody">
                                                    <?php
                                                    $materialColors = explode($arraySeprator, $material->materialColors);

                                                    $materialColorsGrouped = array();
                                                    foreach ($materialColors as $keygrouped => $value) {
                                                        array_push($materialColorsGrouped, "'" . $value . "'");
                                                    }

                                                    $imploded = implode(',', $materialColorsGrouped);
                                                    $getMaterialByUse = $this->db->query("SELECT material_code,filter_color  FROM material_tooltip_info WHERE mbl_material_group_abr = '" . $material->M_abreviation . "' AND type LIKE '%Rolls%'  AND filter_color IN(" . $imploded . ")   ORDER BY FIELD(filter_color, " . $imploded . ")  ");
                                                    $eachColorMaterials = $getMaterialByUse->result();
                                                    //print_r($materialColors);
                                                    if (isset($materialColors) && $materialColors != '' && count($materialColors) > 0) {
                                                        foreach ($materialColors as $keyMaterials => $materialColor) {
                                                            $productManufactureCodes = "";
                                                            $materialCOdeOnly = "";
                                                            if ($keyMaterials % 3 == 0) {
                                                                echo "<div style='clear:both;'></div>";
                                                            } ?>
                                                            <div class="MaterialDropRightBodyCheckbox">
                                                                <label class="DropRightCheckBox DropRightMaterial"><?php echo $materialColor; ?>

                                                                    <?php

                                                                    $ProductMaterial = "";
                                                                    if (count($eachColorMaterials) > 0) {
                                                                        $eachMatCount = 0;
                                                                        foreach ($eachColorMaterials as $keyEachMaterial => $eachColorMaterial) {
                                                                            if ($eachColorMaterial->filter_color == $materialColor) {
                                                                                if ($eachMatCount != 0) {
                                                                                    $productManufactureCodes .= ',';
                                                                                }

                                                                                $material_code = $this->home_model->getmaterialcode(substr($products[0]->ManufactureID, 0, -1));
                                                                                $productManufactureCodes .= "'" . (str_replace($material_code, "", substr($products[0]->ManufactureID, 0, -1))) . $eachColorMaterial->material_code . "4'";
                                                                                $materialCOdeOnly = $eachColorMaterial->material_code;
                                                                                $eachMatCount++;
                                                                            }
                                                                        }
                                                                    }

                                                                    ?>
                                                                    <input type="checkbox" name="FBP" data-filter-val="<?= $productManufactureCodes ?>" value="<?php echo $productManufactureCodes;?>" onclick="getselectedValues(this, this.value )" class="FBP FBM">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="MaterialDropRightFooter">
                                                    <a class="btn orange clearBtn clearBtnByProduct" href="javascript:;" onclick="clearFilterByProducts(this)">Clear</a>
                                                    <a class="btn ApplyBtn ApplyBtnByProduct" href="javascript:;" onclick="filterbyProducts()">Apply</a>
                                                    <div class="resetInsideFilters MaterialResetFilter pull-right"><a href="javascript:;" onclick="resetByProducts()"><i class="fa fa-sync-alt"></i> Reset Filter</a></div>
                                                </div>
                                                <div style="clear: both;"></div>
                                            </div>
                                            <?php $listing_count++; ?>

                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                                
                                <!-- DYNAMIC FILTERS + COLOURS OPTIONS ENDS FROM HERE -->

                                <!-- SORT BY STATIC FILTERS OPTIONS STARTS FROM HERE -->
                                <li>
                                    <a href="javascript:;" class=" MaterialFilterLeftProducts MaterialFilterListSingle MaterialFilterListing<?= $listing_count; ?>">
                                        <div class="MaterialFilterLeft  pull-left">Sort By</div>
                                        <div class="MaterialFilterRight pull-right"><i class="fa fa-chevron-right"></i>
                                        </div>
                                    </a>
                                    <div class="MaterialFilterDropRight FBPParent FBPParent<?= $listing_count; ?>">
                                        <div class="MaterialDropRightHeader">
                                            <div class="MaterialDropRightTitle pull-left">
                                                <h3 class="TitleH3">Sort By <span>- Select 1 or more options.</span>
                                                </h3>
                                            </div>
                                            <div class="MaterialDropRightClose pull-right" data-counter="<?= $listing_count; ?>" aria-label="Close"><a href="javascript:;">Close</a></div>
                                        </div>
                                        <p class="filter_message_text"><?php echo $filter_message;?> </p>
                                        <div class="MaterialDropRightBody">

                                            <div class="MaterialDropRightBodyCheckbox">
                                                <label class="DropRightCheckBox DropRightSort">Best Selling Products
                                                    <input type="checkbox" class="SBM" value="1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="MaterialDropRightFooter">

                                            <a class="btn orange clearBtn clearBtnByProduct" href="javascript:;" onclick="clearFilterBySort(this)">Clear</a>
                                            <a class="btn ApplyBtn ApplyBtnByProduct" href="javascript:;" onclick="filterbyProducts()">Apply</a>
                                            <div class="resetInsideFilters MaterialResetFilter pull-right"><a href="javascript:;" onclick="resetByProducts()"><i class="fa fa-sync-alt"></i> Reset Filter</a></div>

                                            <!--                                            <a class="btn orange clearBtnByProduct" href="javascript:;">Clear</a>-->
                                            <!--                                            <a class="btn ApplyBtn" href="javascript:;">Apply</a>-->
                                        </div>
                                    </div>
                                    <?php $listing_count++; ?>

                                </li>
                                <!-- SORT BY STATIC FILTERS OPTIONS ENDS FROM HERE -->
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="RowDefault MaterialFilterbyUse">

                    <div class="disablePopupByUse RollMaterialWhiteBgDisabled"></div>

                    <div class="MaterialFilterHeader text-center">Filter by Use</div>
                    <div class="MaterialWhiteBg MaterialFilter">

                        <div class="MaterialFilterTitle FBUResultFound text-center"></div>

                        <div class="MaterialSaveAndReset">
                            <div class="MaterialSaveSearch MaterialSaveSearchByUse pull-left">
                                <a href="javascript:;">
                                    <?php
                                    $userID = $this->session->userdata('userid');
                                    if (isset($userID) && $userID != '') {
                                        ?>
                                        <input type="checkbox" class="opacity-0 favouriteProducts favouriteByUse" id="favourite_heart_use" value="<?php echo implode(',', $totalFavouritesByUse); ?>" onclick="filterbyUse();">
                                        <span class="totalFavouriteCounts">
                                                <?php
                                                if (count($totalFavouritesByUse) > 0) {
                                                    echo count($totalFavouritesByUse);
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </span>
                                        <span data-filter="use"  id="favourite_heart_span_use" class="fa fa-heart-o favouriteProducts favouriteByUse favouriteHeart" value="<?php echo implode(',', $totalFavouritesByUse); ?>"></span>
<!--                                        <i class="fa fa-heart-o"></i>-->
                                        <?php
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="MaterialResetFilter pull-right  resetFilterOutside"><a href="javascript:;" onclick="resetByUse()"><i class="fa fa-sync-alt"></i> Reset Filter</a></div>
                        </div>


                        <div class="clear"></div>
                        <div class="MaterialFilterListing">
                            <ul>


                                <?php
                                if (isset($materialsByUses) && $materialsByUses != '' && count($materialsByUses) > 0) {
                                    foreach ($materialsByUses as $key1 => $materialsByUse) {
                                        ?>

                                        <li>

                                            <a href="javascript:;" class="MaterialFilterLeftUse MaterialFilterListSingle"> 
                                               
                                                <div class="MaterialFilterLeft  pull-left"><?php echo $materialsByUse->category;?>
                                                    <span>(<?php echo $materialsByUse->totalSubCategories; ?>)</span>
                                                </div>
                                                <div class="MaterialFilterRight pull-right"><i class="fa fa-chevron-right"></i>
                                                </div>
                                            </a>

                                            <div class="MaterialFilterDropRight FBUParent">
                                                <div class="MaterialDropRightHeader">
                                                    <div class="MaterialDropRightTitle pull-left">
                                                        <h3 class="TitleH3"><?php echo $materialsByUse->category; ?> </h3>
                                                    </div>
                                                    <div class="MaterialDropRightClose pull-right" aria-label="Close"><a href="javascript:;">Close</a></div>
                                                </div>
                                                <p class="filter_message_text"><?php echo $filter_message;?> </p>
                                                <div class="MaterialDropRightBody">
                                                    <?php
                                                    $counter = 0;
                                                    $getMaterialByUse = $this->db->query("SELECT * FROM filter_by_use_sub WHERE categoryid = $materialsByUse->ID ");
                                                    $resultsSubs = $getMaterialByUse->result();
                                                    if (isset($resultsSubs) && $resultsSubs != '' && count($resultsSubs) > 0) {
                                                        foreach ($resultsSubs as $key2 => $resultsSub) {
                                                            if ($counter % 3 == 0) {
                                                                echo "<div style='clear:both;'></div>";
                                                            } ?>
                                                            <div class="MaterialDropRightBodyCheckbox">
                                                                <label class="DropRightCheckBox"><?php echo $resultsSub->name; ?>
                                                                    <?php
                                                                    $productManufactureCodes = "";
                                                                    $ProductMaterial = "";
                                                                    if (count(explode(",", $resultsSub->mat_rolls)) > 0) {
                                                                        foreach (explode(",", $resultsSub->mat_rolls) as $key => $eachProductMat1) {
                                                                            if ($key != 0) {
                                                                                $productManufactureCodes .= ',';
                                                                            }

                                                                            $material_code = $this->home_model->getmaterialcode(substr($products[0]->ManufactureID, 0, -1));
                                                                            $productManufactureCodes .= "'" . (str_replace($material_code, "", substr($products[0]->ManufactureID, 0, -1))) . $eachProductMat1 . "4'";

                                                                        }
                                                                    }
                                                                    ?>
                                                                    <input type="radio" name="FBU"  data-categoryName="<?php echo $resultsSub->name;?>" value="<?php echo $productManufactureCodes; ?>" class="FBU getSubcatName">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <?php
                                                            $counter++;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="MaterialDropRightFooter">
                                                    <a class="btn orange clearBtnByUse" href="javascript:;" onclick="clearFilterByUse(this)">Clear</a>
                                                    <a class="btn ApplyBtn" href="javascript:;" onclick="filterbyUse()">Apply</a>
                                                    <div class="resetInsideFilters MaterialResetFilter pull-right"><a href="javascript:;" onclick="resetByUse()"><i class="fa fa-sync-alt"></i> Reset Filter</a></div>
                                                </div>
                                                <div style="clear: both;"></div>
                                            </div>
                                        </li>

                                        <?php
                                    }
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  Material Page Left Filter End  -->

        <!--  Material Page Header Start  -->

        <?php
        $newname = explode("(", $details['CategoryName']);
        $showname = explode("-", $newname[0]);
        $name = substr($showname[0], 2);
        $catname = $name;
        $image = explode('.', $details['CategoryImage']);
        $img_chgr = $image[0];
        $imagename = $image[0] . $coreid . ".jpg";
        $material_code = "WTP";
        $diecode = $image[0] . $material_code . preg_replace("/[^0-9]/", "", $coreid) . ".jpg";
        if (isset($productid) and $productid != '') {
            $diecode = $this->home_model->get_db_column('products', 'ManufactureID', 'ProductID', $productid);
            $material_code = $this->home_model->getmaterialcode(substr($diecode, 0, -1));
            $diecode .= ".jpg";
        }
        $wound_option = $this->session->userdata('wound');
        $wound_cate = $this->session->userdata('wound-cat');
        $inside = '';
        if (isset($wound_option) and $wound_option == 'Inside' and strcasecmp(substr($subcat, 0, -2), substr($wound_cate, 0, -2)) == 0) {
            $inside = 'selected="selected"';
        }
        if (isset($wound_option) and $wound_option == 'Inside' and strcasecmp(substr($subcat, 0, -2), substr($wound_cate, 0, -2)) == 0) {
            $popup_image = $img_src = Assets . "images/categoryimages/RollLabels/inside/" . $diecode;
        } else {
            $popup_image = $img_src = Assets . "images/categoryimages/RollLabels/outside/" . $diecode;
        }
        if ($details['Shape_upd'] == "Circular") {
            $Label_size = str_replace("Label Size:", "", $details['specification3']);
        } else {
            $Label_size = " Width " . explode("mm",$details['LabelWidth'])[0].' x Height '.explode("mm",$details['LabelHeight'])[0];
        }
        //$Label_size = preg_replace("/Label Size:/","",$details['specification3']);
        $height = 'auto';
        $pop_width = 'auto';

        if ($details['Shape_upd'] == "Oval" || $details['Shape_upd'] == "oval") {
            $LabelCorner = "N/A";
        } else {
            $LabelCorner = $details['LabelCorner'];
        }
        ?>

        <div class="MaterialHeaderContentMain">
            <div class="MaterialWhiteBg" style="width: 100%;">
                <div class="row RowDefault">
                    <div class="MaterialHeaderImageRoll">
                        <div id="prod_img" class="pr-thumb" style="display: inline;">
                            <img src="<?php echo $img_src; ?>" id="wound_image" alt="" title="">
                        </div>
                    </div>

                    <div class="MaterialHeaderRollDropdowns">
                        <h2 class="TitleH2Red"><?= $details['CategoryName'] ?></h2>
                        <input type="hidden" id="material_code_new" value="<?= $material_code ?>"/>
                        <div class="SelectCoreSize">
                            <span class="coretext">Roll Core Size</span>

                            <?php
                            // $coreSize = $this->session->userdata('coreSize');
                            // $wound = $this->session->userdata('wound');
                            $coreSize = "";
                            $wound = "";
                            ?>
                            <select name="coresize" id="coresize" onchange="coreAndWoundChecker(); coresize(this);" class="originalcolor">
                                <option value="" <?php if ($coreSize == "") {
                                    echo 'selected="selected"';
                                } else {
                                    echo '';
                                } ?>>Select Roll Core Size
                                </option>
                                <option value="R1" <?php if ($coreSize == "R1") {
                                    echo 'selected="selected"';
                                } else {
                                    echo '';
                                } ?>> 1'' (25mm)
                                </option>
                                <option value="R2" <?php if ($coreSize == "R2") {
                                    echo 'selected="selected"';
                                } else {
                                    echo '';
                                } ?>> 1 ½'' (38mm)
                                </option>
                                <option value="R3" <?php if ($coreSize == "R3") {
                                    echo 'selected="selected"';
                                } else {
                                    echo '';
                                } ?>> 1 ¾'' (44.5mm)
                                </option>
                                <option value="R4" <?php if ($coreSize == "R4") {
                                    echo 'selected="selected"';
                                } else {
                                    echo '';
                                } ?>> 3'' (76mm)
                                </option>
                            </select>
                        </div>
                        <div class="SelectCoreSize">
                            <span class="woundtext">Roll Winding Options</span>
                            <select name="woundoption" id="woundoption" onchange="coreAndWoundChecker();">
                                <option value="" selected="selected">Select Roll Winding Option</option>
                                <option value="Outside" <?php if ($wound == "Outside") {
                                    echo 'selected="selected"';
                                } else {
                                    echo '';
                                } ?>> Outside Wound
                                </option>
                                <option value="Inside" <?php if ($wound == "Inside") {
                                    echo 'selected="selected"';
                                } else {
                                    echo '';
                                } ?>> Inside Wound
                                </option>
                            </select>
                        </div>
                    </div>


                    <div class="MaterialHeaderTitleCodeRoll">
                        <h1 class="TitleH2"><?= $details['CategoryName'] ?></h1>
                        <span class="MaterialProductCode">Product Code: <?= ltrim($details['DieCode'], "1-") ?> </span>
                        <div class="MaterialHeaderTableRoll">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="50%">Label Shape:</td>
                                    <td width="50%"><?= $details['Shape_upd'] ?></td>
                                </tr>
                                <tr>
                                    <td width="50%">Leading Edge:</td>
                                    <td width="50%"><?= $details['LeadingEdge'] ?></td>
                                </tr>
                                <tr>
                                    <td width="50%">Label Size mm:</td>
                                    <td width="50%">
                                        <?php echo  $Label_size?>
                                        <? $tooltip_title = "";
                                        if (($details['InnerHole']) || ($details['InnerLabel'])):
                                            if ($details['Shape'] == "Circular") {
                                                $tooltip_title .= $Label_size;
                                            } else {
                                                $tooltip_title .= $LabelSize . " mm";
                                            }
                                            if ($details['InnerHole']):
                                                $tooltip_title .= "<br>" . $details['InnerHole'] . " Diameter (Inner Hole)";
                                            endif;
                                            if ($details['InnerLabel']):
                                                $tooltip_title .= "<br>" . $details['InnerLabel'] . " Diameter (Inner Label)";
                                                ?>
                                            <? endif; ?>
                                            <a data-toggle="tooltip" data-placement="top" title="" data-html="true"
                                               data-original-title="<?= $tooltip_title ?>" href="javascript:void(0);"><i
                                                        class="fa fa-info-circle"></i></a>
                                        <? endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">Corner Radius:</td>
                                    <td width="50%"><?= $LabelCorner ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="MaterialHeaderBadgeDownloadRoll">
                        <div class="MaterialHeaderBadge">
                            <a href="javascript:void(0);">
                                <img src="<?= Assets ?>images/30-icon.png"
                                     alt="30 Days Moneyback Guarantee">
                            </a>
                            <p>If you are not 100% satisfied with your labels, return them to us within 30 days and we
                                will refund your purchase. &nbsp;
                                <a href="<?= base_url().'terms-and-conditions'?>"><i class="fa fa-external-link-alt"></i>read more</a>
                            </p>
                        </div>
                    </div>

                    <div class="MaterialHeaderISOImages">
                        <img src="<?= Assets ?>images/ISO-logos.png?v=1.0" alt="ISO Logos" draggable="false">
                    </div>

                </div>
            </div>
         </div>
        <!--  Material Page Header End  -->

        <!--  Material Page Center Content Start  -->
        <div class="MaterialCenterContentMain">
            
            


            <div id="aa_loader_products" class="white-screen"style="display: none;background: #00000070;width: 100%;height: 100%;position: absolute;z-index: 999;top: 2px;">
                <div class="loading-gif text-center"
                     style="top: 382px;z-index: 168;left: 40%;position: sticky;width: 46%;"><img
                            onerror="imgError(this);" src="https://www.aalabels.com/theme/site/images/loader.gif"
                            class="image" style="width:160px; height:43px; "></div>
            </div>


            <div class="productsMainContainer">
                <?php include "allProductsRolls.php"; ?>
            </div>

            <div class="MaterialPageBanner">


                <div class="aa_loader_LA" class="white-screen"
                     style="position: absolute;top: 0;right: 0;width: 100%;z-index: 999;height: 100%; display: none;background: #FFF; opacity: 0.8">
                    <div class="text-center"
                         style="margin: 80px auto!important;background: rgba(255,255,255,.9) none repeat scroll 0 0;padding: 10px;border-radius: 5px;border: solid 1px #CCC; width: 164px;">
                        <img onerror="imgError(this);" src="<?= Assets ?>images/loader.gif"
                             class="image" style="width:139px; height:29px; " alt="AA Labels Loader">
                    </div>
                </div>

                <div class="modal-message">
                    <p>
                        If you have a label shape and size requirement that you cannot find in our standard range and/or
                        a
                        label application that we have not listed. Please provide the information requested and we will
                        be
                        happy to provide you with a quote for your label.
                    </p>

                    <div class="LabelApplication">
                        <textarea placeholder="Label Application" name="labelApplication" class="specialvalidation" id="labelApplication"></textarea>
                    </div>
                    <div class="LabelApplication">
                        <input type="email" placeholder="Email" name="labelEmail" id="labelEmail">
                    </div>
                    <p class="errorInquery" id="errorinquery">Missing Data Error</p>
                    <div class="LabelApplicationSubmitButton">
                        <a href="javascript:;" onclick="submitCustomQuotes();">Submit</a>
                    </div>
                </div>


                <div class="thankyouLA">
                    <img src="<?= Assets ?>images\icons\success.png"
                         style="width: 90px;margin:auto;display:block;padding:10px;">
                    <h2 style="text-align: center;color:#fd4913;padding:0;margin:5px 15px;">Thank You</h2>
                    <p style="margin: 0;padding: 0; font-size: 15px;">Your query has been sent, our Support Agent will
                        contact you shortly.</p>
                </div>
            </div>
            <script>

                function submitCustomQuotes() {
                    $(".aa_loader_LA").show();
                    var labelApplication = $("#labelApplication").val();
                    var labelEmail = $("#labelEmail").val();

                    if (labelApplication && labelApplication != '')
                    {
                        $("#labelApplication").css("border", "1px solid #CCC");
                        if (labelEmail && labelEmail != '') {
                            if (isEmail(labelEmail)) {
                                $("#labelEmail").css("border", "1px solid #CCC");
                                $("#errorinquery").hide().html("");

                                $.ajax({
                                    url: base + 'ajax/labelInquiry',
                                    type: "POST",
                                    async: "false",
                                    dataType: "html",
                                    data: {'labelApplication': labelApplication, 'labelEmail': labelEmail},
                                    success: function (data) {

                                        data = $.parseJSON(data);
                                        if (data['status'] && data['status'] == true) {
                                            $("#errorinquery").hide().html("");
                                            $(".modal-message").hide();
                                            $(".thankyouLA").show("slide", {direction: "up"}, 800);

                                            setTimeout(function () {
                                                $(".thankyouLA").hide();
                                                $(".modal-message").show("slide", {direction: "down"}, 800);

                                                $("#labelApplication").val("");
                                                $("#labelEmail").val("");

                                            }, 10000);


                                        } else {
                                            $("#errorinquery").show().html("Something Went wrong, Please try again.");
                                        }
                                        $(".aa_loader_LA").hide();
                                    }
                                });
                            } else {
                                $("#labelEmail").css("border", "1px solid red");
                                $("#errorinquery").show().html("Email address is not valid.");
                                $(".aa_loader_LA").hide();
                            }

                        } else {
                            $("#labelEmail").css("border", "1px solid red");
                            $("#errorinquery").show().html("Email address is required.");
                            $(".aa_loader_LA").hide();
                        }
                    } else {
                        $("#labelApplication").css("border", "1px solid red");
                        $("#errorinquery").show().html("Label Application is required.");
                        $(".aa_loader_LA").hide();
                    }

                }

                function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }

            </script>


            <!-- Material Popup -->
            <div class="modal fade in" tabindex="-1" role="dialog" id="MaterialModalPopup">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                                        aria-hidden="true">×</span></button>
                            <h4 id="myModalLabel" class="modal-title">AA Labels Technical Specification - <span
                                        id="mat_code">PVUD</span> <a href="#myModalLabel" class="anchorjs-link"><span
                                            class="anchorjs-icon"></span></a></h4>
                        </div>
                        <div class="">
                            <div>
                                <div class="col-md-3 text-center"><img onerror="imgError(this);" id="material_popup_img"
                                                                       src="<?= Assets ?>images/material_images/Matt_White_Polyethylene_Permanent_Adhesive.png"
                                                                       alt="1 Circular Label per A4 sheet "
                                                                       title="1 Circular Label per A4 sheet "
                                                                       class="m-t-b-10 img-Sheet-material" width="46"
                                                                       height="46"></div>
                                <div class="col-md-9">
                                    <div id="specs_loader" class="white-screen hidden-xs" style="display: none;">
                                        <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                                    onerror="imgError(this);"
                                                    src="https://www.aalabels.com/theme/site/images/loader.gif"
                                                    class="image" style="width:139px; height:29px; "></div>
                                    </div>
                                    <div id="ajax_tecnial_specifiacation" class="specifiacation">
                                        <div>

                                        </div>
                                    </div>
                                    <div class="bgGray p-l-r-10"><small> This summary materials specification for this
                                            adhesive label is based on information obtained from the original material
                                            manufacturer and is offered in good faith in accordance with AA Labels terms
                                            and conditions to determine fitness for use as sheet labels (A4, A3 &amp;
                                            SRA3) produced by AA Labels. No guarantee is offered or implied. It is the
                                            user's responsibility to fully asses and/or test the label's material and
                                            determine its suitability for the label application intended. Measurements
                                            and test results on this label's material are nominal. In accordance with a
                                            policy of continuous improvement for label products the manufacturer and AA
                                            Labels reserves the right to amend the specification without notice. A <a
                                                    href="https://www.aalabels.com/labels-materials/">full material
                                                specification</a> can be found in the Label Materials section accessed
                                            via the Home Page <br>
                                            Copyright© AA labels 2015</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default MaterialModalButton" type="button">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Material Popup -->

        </div>
        <!--  Material Page Center Content End  -->

    </div>
    <!--  Material Page Content End  -->


    <!--get a quote modal STARTS-->
    <div class="modal fade get_a_quote aa-modal" id="get_a_quote" tabindex="-1" role="dialog" aria-labelledby="get_a_quoteModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content no-padding">
      <div class="panel no-margin">
        <div class="panel-heading">
          <h3 class="pull-left no-margin"><b>GET A QUOTE - <span class="material_name">WTDP</span></b> <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <form class="labels-form" id="printing-form" method="post" action="<?=base_url()?>customlabels.php/" enctype="multipart/form-data">
              <input type="hidden" value="printing"  id="page_type"   />
              <h4 class="m-b-10">Please Fill In Your Requirements</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class=" col-md-4">
                    <label class="select">
                      <select id="category" name="category" autocomplete="off" class="required" >
                        <option value="" disabled="disabled">Label Category</option>
                        <option value="Roll" selected="selected">Labels on Roll</option>
                      </select>
                      <i></i> </label>
                  </div>
                  <div class="col-md-4">
                    <label class="select">
                      <select id="shape" name="shape" class="required">
                        <option value="" disabled="disabled">Shape</option>
                        <option value="<?=$details['Shape_upd']?>" selected="selected"><?=$details['Shape_upd']?></option>
                      </select>
                      <i></i> </label>
                  </div>
                  <?php if($details['Shape_upd'] == "Circular"):?>
                  <div class="col-md-2">
                    <label class="input">
                      <input type="text" name="width" id="width" placeholder="Diameter mm" class="required sizespecialvalidation" value="<?=str_replace(" mm","",$details['LabelWidth'])?>">
                    </label>
                  </div>
                  <?php else:?>
                  <div class="col-md-2">
                  <label class="input">
                      <input type="text" name="width" id="width" placeholder="Width mm" class="required sizespecialvalidation" value="<?=str_replace(" mm","",$details['LabelWidth'])?>">
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label class="input">
                      <input type="text" name="height" id="height" placeholder="Height mm" class="required sizespecialvalidation" value="<?=str_replace(" mm","",$details['LabelHeight'])?>">
                    </label>
                    </div>
                  <?php endif;?>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-4">
                    <label class="input">
                      <input type="text" name="quantity" id="quantity" placeholder="Number of labels"  class="required numeric" >
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="select">
                      <select name="material" id="custom_material_list" class="required">
                        <option value="" disabled="">Select Material</option>
                        <option value="Matt White Dissolving Paper - Permanent" selected="selected">Matt White Dissolving Paper - Permanent</option>
                        
                      </select>
                      <i></i> </label>
                  </div>
                  <div class="col-md-4">
                    <label class="select">
                      <select id="printing_required" name="printing_required" >
                        <option value="">Printing Required ?</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <i></i> </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <label class="input">
                      <textarea placeholder="Enter Other Instructions ....." rows="3" class="form-control specialvalidation" name="subject" id="subject"  maxlength="250"></textarea>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row" id="upload_box" style="display:none;">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="input ">
                      <p><strong>Upload Artwork </strong><br>
                        <small> Please note uploaded files must be no larger than 2Mb and to achieve the best results for your finished labels you will need a professional standard of artwork. We require scaled, print-ready studio artwork, supplied in editable PDF or EPS format, with a minimum resolution of 300dpi. No original artwork or image files can be uploaded.</small> </p>
                    </div>
                    <div class="col-xs-6 col-sm-8">
                      <input id="file_up" class="m-t-15" style="display:none;" type="file" name="file_up" accept="image/x-png,image/gif,image/jpeg,application/pdf">
                    </div>
                    <div class="clear10"></div>
                    <div class="col-sm-2 col-xs-4">
                      <button class="btn btn-primary" type="button" onclick="$('#file_up').trigger('click');" > <i class="fa fa-cloud-upload"></i> Upload</button>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <img onerror='imgError(this);' style="display:none; width:50px; height:40px;" id="preview_po_img" class="preview_po_img" src="#" alt="Preview Artwork" />
                        <a href="javascript:void(0);" style="display:none;" class="preview_po_img" onclick="$('#preview_po_img').click();">Remove </a>
                    </div>
                    <hr class="col-sm-12 m-t-b-10 clear">
                  </div>
                </div>
              </div>
              <h4 class="m-b-10">Contact Information</h4>
              <?php 
                $userid = $this->session->userdata('userid');
                if(isset($userid) and $userid != '')
                {
                    $userdetails = $this->user_model->get_data();
                    $full_name =  $userdetails['BillingFirstName'] . " " . $userdetails['BillingLastName'];
                }
              ?>
              <div class="row">
              <div class="col-md-12">
                <div class="col-sm-12 col-md-6">
                  <div class="">
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="text" placeholder="Full Name" name="name" id="name" class="required letters" value="<?=$full_name?>">
                    </label>
                  </div>
                  <div class="">
                    <label class="input"> <i class="icon-append fa fa-envelope"></i>
                      <input type="text" placeholder="Email" name="email" id="email" class="required emailspecialvalidation" value="<?=$userdetails['UserEmail']?>">
                    </label>
                  </div>
                  <div>
                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                      <input type="text" placeholder="Phone" name="phoneNumber" class="required numeric" id="phoneNumber" value="<?=$userdetails['BillingTelephone']?>">
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-12 p0  ">
                    <label class="input">
                      <input type="text" placeholder="Postcode"   name="b_pcode" id="b_pcode" class="required specialvalidation" value="<?=$userdetails['BillingPostcode']?>">
                      <b class="tooltip tooltip-bottom-right">Please Enter Postcode</b> </label>
                  </div>
                  <div class="col-xs-12 col-sm-12 p0  ">
                    <label class="input"> <i class="icon-append fa fa-briefcase"></i>
                      <input type="text" placeholder="Company" name="company" id="b_organization" class="required specialvalidation" value="<?=$userdetails['BillingCompanyName']?>">
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-12 p0  ">
                    <label class="input"> <i class="icon-append fa fa-map"></i>
                      <input type="text" id="b_add1" name="add1" placeholder="Address1" class="required addressspecialvalidation" value="<?=$userdetails['BillingAddress1']?>">
                    </label>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 ">
                  <div>
                    <label class="input"> <i class="icon-append fa fa-map"></i>
                      <input type="text" id="b_add2" name="add2" placeholder="Address2" value="<?=$userdetails['BillingAddress2']?>" class="addressspecialvalidation">
                    </label>
                  </div>
                  <div>
                    <label class="input"> <i class="icon-append fa fa-map"></i>
                      <input type="text"  id="b_city" name="city" value="<?=$userdetails['BillingTownCity']?>" placeholder="City"  class="required specialvalidation">
                    </label>
                  </div>
                  <div>
                    <label class="input"> <i class="icon-append fa fa-map"></i>
                      <input type="text" id="b_county" name="county" value="<?=$userdetails['BillingCountry']?>" placeholder="County"  class="required specialvalidation">
                    </label>
                  </div>
                  <div class=" " >
                    <div>
                      <p class="clear_b" ><strong>Captcha</strong> </p>
                      <img onerror='imgError(this);' style="" src="<?=SAURL?>captcha/simplecaptcha.php" id="captcha_img" width="225"  height"70" alt="Captcha Image"/> </div>
                  </div>
                  <div class="col-xs-6 col-sm-8  col-md-7  ">
                    <label class="input">
                      <input type="text" name="captcha" id="captcha" class="required specialvalidation">
                      <b class="tooltip tooltip-bottom-right">Write the following word.</b> </label>
                  </div>
                  <div class="col-xs-6 col-sm-4 col-md-5  ">
                    <button class="btn btn-block  btn-primary" type="button" onclick="$('#captcha').val('');document.getElementById('captcha_img').src='<?=SAURL?>captcha/simplecaptcha.php?'+Math.random(); document.getElementById('captcha').focus();" id="change-image">Change Word</button>
                  </div>
                  <div class="col-xs-12 col-sm-12  ">
                    <button style="" type="submit" class="btn orange text-uppercase submit_quote">Submit Now &nbsp; &nbsp; <i class="fa fa-arrow-circle-right"></i> </button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


    <script>
        // GET QUOTE STARTS HERE
    $(document).on("click", ".get_a_quote_printed,.get_a_quote_plain", function (e) {
        $(".popover").hide();
        var printing = $(this).data('printing');

        if (printing == "Y") {
            $("#printing_required").val("Yes");
        } else {
            $("#printing_required").val("");
        }
        $("#printing_required").trigger("change");
    });


    $(document).on("click", "#change-image", function (e) {
            $('#captcha').val('');
            $('#captcha_img').attr('src', '<?=SAURL?>captcha/simplecaptcha.php?' + Math.random());
            $('#captcha').focus();
        });

        $(document).on("change", "#category", function (e) {
            $('#custom_material_list').html('<option value="" selectd="selected">Select Material</option>');
        });
        $(document).on("change", "#printing_required", function (e) {
            var val = $(this).val();
            if (val == 'Yes') {
                $('#upload_box').show();
            } else {
                $('#upload_box').hide();
            }
        });

        $(document).on("change", "#shape", function (e) {
            var val = $(this).val();
            var cat = $('#category').val();

            if (val == 'Circular' || val == 'Square') {
                $('#height').hide();
                $('#width').val('');
                $('#height').val('');
            } else {
                $('#width').val('');
                $('#height').val('');
                $('#height').show();
            }

            if (val == 'Circular') {
                $('#width').attr('placeholder', 'Diameter');

            } else {
                $('#width').attr('placeholder', 'Width mm');
            }

            if (val != '' && cat != '') {
                $.ajax({
                    url: base + 'ajax/materail_for_custom/',
                    type: "POST",
                    async: "false",
                    datatype: "html",
                    data: {category: cat, shape: val},
                    success: function (data) {
                        $('#custom_material_list').html(data);

                    }
                });


            } else {
                swal("", "please select category first !", "warning");
            }

        });
        
        var form = $("#printing-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                captcha: {
                    required: true,
                    onkeyup: false,
                    remote: base + "ajax/is_valid_captcha"
                },
                file_up: {
                    extension: "jpg|gif|png|pdf|tiffs|jpeg",
                }
            },
            submitHandler: function (form) {
                //form.submit();
                submit_form();
            }
        });

        function submit_form() {
            var form = $("#printing-form");
            var uploadfile = $('#file_up')[0].files[0];
            var category = $('#category').val();
            var shape = $('#shape').val();
            var width = $('#width').val();
            var height = $('#height').val();
            var quantity = $('#quantity').val();
            var material = $('#custom_material_list').val();
            var printing_required = $('#printing_required').val();
            var subject = $('#subject').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var phoneNumber = $('#phoneNumber').val();
            var b_pcode = $('#b_pcode').val();
            var company = $('#b_organization').val();
            var add1 = $('#b_add1').val();
            var add2 = $('#b_add2').val();
            var city = $('#b_city').val();
            var county = $('#b_county').val();
            var captcha = $('#captcha').val();
            var page = 'wtdp';

            var form_data = new FormData();
            form_data.append("file_up", uploadfile)
            form_data.append("category", category);
            form_data.append("shape", shape);
            form_data.append("width", width);
            form_data.append("height", height);
            form_data.append("quantity", quantity);
            form_data.append("name", name);
            form_data.append("company", company);
            form_data.append("email", email);
            form_data.append("phoneNumber", phoneNumber);
            form_data.append("subject", subject);
            form_data.append("b_pcode", b_pcode);
            form_data.append("material", material);
            form_data.append("add1", add1);
            form_data.append("add2", add2);
            form_data.append("city", city);
            form_data.append("county", county);
            form_data.append("printing_required", printing_required);
            form_data.append("captcha", captcha);
            form_data.append("page", page);
            $.ajax({
                url: base + 'customlabels.php',
                type: "POST",
                async: "false",
                datatype: "html",
                //data:{form_data:form_data},
                processData: false,
                contentType: false,
                data: form_data,
                success: function (data) {
                    data = $.parseJSON(data);
                    if (data.response == "done") {
                        $("#get_a_quote").modal("hide");
                        swal("Thank you!", "Your request has been placed", "success");
                    }
                }
            });
        }

        $(document).on("submit", "#printing-form", function (e) {});
       
        $("#file_up").change(function () {
            readURL(this);
        });
       
        $(document).on("keypress keyup blur", ".numeric", function (e) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $(document).on("keypress keyup blur", ".letters", function (e) {
            return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123);
        });


    
    // GET QUOTE ENDS HERE
    </script>

    <!--get a quote modal ENDS-->

    <div class="modal fade material" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                                aria-hidden="true">×</span></button>
                    <h4 id="myModalLabel" class="modal-title">AA Labels Technical Specification - <span
                                id="mat_code"></span> <a href="#myModalLabel" class="anchorjs-link"><span
                                    class="anchorjs-icon"></span></a></h4>
                </div>
                <div class="">
                    <div>
                        <div class="col-md-3 text-center"><img onerror='imgError(this);' id="material_popup_img" src=""
                                                               alt="<?= $catname ?>" title="<?= $catname ?>" width="46"
                                                               height="46" class="m-t-b-10 img-Sheet-material"></div>
                        <div class="col-md-9">
                            <div id="specs_loader" class="white-screen hidden-xs" style="display:none;">
                                <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                            onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" width="139"
                                            height="29" class="image" style="width:181px; height:181px; "></div>
                            </div>
                            <div id="ajax_tecnial_specifiacation" class="specifiacation"></div>
                            <div class="bgGray p-l-r-10"><small> This summary materials specification for this adhesive
                                    label is based on information obtained from the original material manufacturer and
                                    is offered in good faith in accordance with AA Labels terms and conditions to
                                    determine fitness for use as labels on rolls produced by AA Labels. No guarantee is
                                    offered or implied. It is the user's responsibility to fully asses and/or test the
                                    label's material and determine its suitability for the label application intended.
                                    Measurements and test results on this label's material are nominal. In accordance
                                    with a policy of continuous improvement for label products the manufacturer and AA
                                    Labels reserves the right to amend the specification without notice. A <a
                                            href="<?= base_url() ?>labels-materials/">full material specification</a>
                                    can be found in the Label Materials section accessed via the Home Page <br>
                                    Copyright AA labels 2015</small></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade pbreaks aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content no-padding">
                <div class="panel no-margin">
                    <div class="panel-heading">
                        <h3 class="pull-left no-margin"><b class="pull-left">VOLUME PRICE BREAKS
                                <?= strtoupper($Paper_size) ?>
                            </b>
                            <? if (strtolower($Paper_size) == 'a4 sheets') { ?>
                                <span class="label label-danger pull-left hppp-title-text">(Half Price Print Promotion off prices shown below)</span>
                            <? } ?>
                            <a href="#myModalLabel" class="anchorjs-link"><span class="anchorjs-icon"></span></a></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                    class="fa fa-times-circle"></i></button>
                        <div class="clear"></div>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <div id="price_loader" class="white-screen hidden-xs" style="display:none;">
                                <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                            onerror='imgError(this);' src="<?= Assets ?>images/loader.gif"
                                            class="image" style="width:139px; height:29px; "></div>
                            </div>
                            <div class="table-res table-responsive" id="ajax_price_breaks"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    var filterbase = 0;
    $(document).on("click",".favouriteHeart",function() {

        if ($(this).data("filter") === 'product') {
            $("#favourite_heart").trigger("click");
            if ($("#favourite_heart_span").hasClass("fa-heart-o")) {
                $("#favourite_heart_span").removeClass("fa-heart-o");
                $("#favourite_heart_span").addClass("fa-heart");
            }else{
                $("#favourite_heart_span").addClass("fa-heart-o");
                $("#favourite_heart_span").removeClass("fa-heart");
            }
        }else if($(this).data("filter") === 'use'){
            $("#favourite_heart_use").trigger("click");
            if ($("#favourite_heart_span_use").hasClass("fa-heart-o")) {
                $("#favourite_heart_span_use").removeClass("fa-heart-o");
                $("#favourite_heart_span_use").addClass("fa-heart");
            }else{
                $("#favourite_heart_span_use").addClass("fa-heart-o");
                $("#favourite_heart_span_use").removeClass("fa-heart");
            }
        }

    });
    function filterbyProducts() {
        // $(".MaterialPageBanner").hide();
        $(".FilterDisableEnable").show();
        var FBP = "";
        var FBPC = "";
        var FBAT = "";
        var filterUses = $(".filterUses").val();
        var sortBy = document.getElementsByClassName('SBM');
        var sortByVal = 0;


        var dieCode = $(".dieCode").val();
        var coreSize = $("#coresize").val();
        if (coreSize == "") {
            coreSize = "4";
        }
        coreSize = coreSize.replace(/[^\d.]/g, '');

        var chx = document.getElementsByClassName('FBP');
        var chx_pa = document.getElementsByClassName('FBAP');
        
        var checkboxCheckedCountPc = 0; //printer compatibility
        var checkboxCheckedCountAt = 0; //adhesive type
        $('.MaterialFilterLeftProducts').removeClass("activeFilterClass");

        $(sortBy[0]).parents('li').find('.MaterialFilterLeft').removeClass("activeFilterClass");

        // if (sortBy[0].type == 'checkbox' && sortBy[0].checked) {
        if (sortBy[0].checked) {
            sortByVal = 1;
            $(sortBy[0]).parents('li').find('.MaterialFilterLeftProducts').addClass("activeFilterClass");

        } else {
            sortByVal = 0;
        }
        for (var i = 0; i < chx_pa.length; i++) {
            // if (chx_pa[i].type == 'checkbox' && chx_pa[i].checked) {
            if (chx_pa[i].checked) {

                var filter_type = $(chx_pa[i]).data('filter-type');
                if (filter_type === 'printer') {

                    if (checkboxCheckedCountAt == 0) {
                        FBPC = chx_pa[i].value;
                    } else {
                        FBPC += " OR `SpecText7` LIKE " + chx_pa[i].value;
                    }
                    checkboxCheckedCountAt++;
                    $(chx_pa[i]).parents('li').find('.MaterialFilterLeftProducts').addClass("activeFilterClass");

                } else if (filter_type === 'adhesive') {

                    if (checkboxCheckedCountPc == 0) {
                        FBAT = chx_pa[i].value;
                    } else {
                        FBAT += "," + chx_pa[i].value;
                    }
                    checkboxCheckedCountPc++;
                    $(chx_pa[i]).parents('li').find('.MaterialFilterLeftProducts').addClass("activeFilterClass");

                }

            }
        }

        var checkboxCheckedCount = 0;
        for (var i = 0; i < chx.length; i++) {
            if (chx[i].type == 'checkbox' && chx[i].checked) {
                if (checkboxCheckedCount == 0) {
                    FBP = chx[i].value;
                } else {
                    FBP += "," + chx[i].value;
                }
                checkboxCheckedCount++;
                $(chx[i]).parents('li').find('.MaterialFilterLeftProducts').addClass("activeFilterClass");
            }
        }
        
        
         // AA36 STARTS
                        if(FBP == "")
                        {
                            FBP = "";
                        }
                    // AA36 ENDS

        if(sortedMaterials && (sortedMaterials.length > 0) )
        {
            FBP = sortedMaterials;
        }

        $("#aa_loader_products").show();
        var categoryId = $(".categoryId").val();
        var showFavouritesProducts = false;
        var printingType = $(".printingType").val();
        var productid = $(".productid").val();

         var regmark = " <?php echo $_GET['regmark'];?> ";
         
        var favouriteManufactureIdList = [];
        if ($('.favouritebyProducts').prop("checked") == true) {
            showFavouritesProducts = true;
            var array = $('.favouritebyProducts').val().split(",");
            if (array && array.length > 0) {
                for (start = 0; start < array.length; start++) {
                    favouriteManufactureIdList.push('"' + dieCode + array[start].replace(/'/g, "") + coreSize + '"');
                }
            }

        }

        if (filterbase == 0) {
            if (FBAT != "" && filterbase == 0) {
                filterbase = 'adhesive';
            } else if (FBAT === "" && filterbase != '') {
                if (filterbase === 'adhesive') {
                    filterbase = 0;
                }
            }
            if (FBPC != "" && filterbase == 0) {
                filterbase = 'printer';
            } else if (FBPC === "" && filterbase != '') {
                if (filterbase === 'printer') {
                    filterbase = 0;
                }
            }
            if (FBP != "" && filterbase == 0) {
                filterbase = 'material';
            } else if (FBP === "" && filterbase != '') {
                if (filterbase === 'material') {
                    filterbase = 0;
                }
            }


        }



     // AA36 STARTS
                if(FBP == "")
                {
                    FBP = "";
                }
            // AA36 ENDS



        // alert(filterbase);


        $.ajax({
            url: base + 'ajax/getFilteredProducts',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                'showFavouritesProducts': showFavouritesProducts,
                "categoryId": categoryId,
                "printingType": printingType,
                "productid": productid,
                "FBU": FBP,
                "filterUses": filterUses,
                "filterbase": filterbase,
                "catIdSimple": "<?php echo $catIdSimple;?>",
                "dieCode": dieCode,
                "FBPC": FBPC,
                "FBAT": FBAT,
                "sortBy": sortByVal,
                "favouriteManufactureIdList": favouriteManufactureIdList,
                 "regmark": regmark
            },
            success: function (data) {

                if (data != '') {
                    data = $.parseJSON(data);
                    $(".productsMainContainer").html(data.html);

                    val = $("#woundoption").val();
                    if (val == "") {
                        val = "Outside";
                    }
                    update_wound_images(val);
                    // $('#coresize').trigger('change');
                    
                    if (data.filterBase === 'adhesive') {

                        if (data.filterBaseData.printer_compatibility && data.filterBaseData.printer_compatibility[0] !== null) {
                            var remove_printers = [];
                            var all_printers = [];
                            var count = 0;
                            $(".FBPParent").find('.DropRightPrinter').each(function (i) {
                                var printer_compatible_val = $(this).find('.FBPCC').data('filter-val');
                                all_printers.push(printer_compatible_val);
                                remove_printers.push(printer_compatible_val);
                            });
                            $.each(data.filterBaseData.printer_compatibility, function (index, item) {
                                $.each(remove_printers, function (index, remove_printer) {

                                    if (remove_printer === item) {
                                        var index = remove_printers.indexOf(item);
                                        if (index > -1) {
                                            remove_printers.splice(index, 1);
                                        }
                                    }
                                });
                            });
                            $(".FBPParent").find('.DropRightPrinter').each(function (i) {
                                $(this).css('color', 'black');
                                $(this).find('.FBPCC').attr('disabled', false);
                            });
                            $.each(remove_printers, function (index, remove_val) {
                                $(".FBPParent").find('.DropRightPrinter').each(function (i) {

                                    var printer_val = $(this).find('.FBPCC').data('filter-val');
                                    if (remove_val === printer_val) {
                                        $(this).find('.FBPCC').attr('checked', false);
                                        $(this).find('.FBPCC').attr('disabled', true);
                                        $(this).css('color', 'darkgray');
                                    }

                                });
                            });

                        }

                        if (data.filterBaseData.manufacture_ids && data.filterBaseData.manufacture_ids[0] !== null) {
                            var remove_manufacture_ids = [];
                            var all_manufacture_ids = [];
                            var count = 0;

                            $(".FBPParent").find('.DropRightMaterial').each(function (i) {
                                $(this).find('.FBM').attr('disabled', true);
                                $(this).css('color', 'darkgray');
                            });

                            $.each(data.filterBaseData.manufacture_ids, function (index, remove_val) {


                                $(".FBPParent").find('.DropRightMaterial').each(function (i) {

                                    var material_val = $(this).find('.FBM').data('filter-val');

                                    var re = new RegExp(remove_val, 'img');
                                    if (material_val.match(re)) {
                                        $(this).css('color', 'black');
                                        $(this).find('.FBM').attr('disabled', false);
                                    }
                                });

                            });
                        }


                    } else if (data.filterBase === 'printer') {

                        if (data.filterBaseData.adhesive_type && data.filterBaseData.adhesive_type[0] !== null) {
                            var remove_adhesives = [];
                            var all_adhesives = [];
                            var count = 0;

                            $(".FBPParent").find('.DropRightAdhesive').each(function (i) {
                                $(this).find('.FBPATC').attr('disabled', true);
                                $(this).css('color', 'darkgray');
                            });


                            $.each(data.filterBaseData.adhesive_type, function (index, remove_val) {


                                $(".FBPParent").find('.DropRightAdhesive').each(function (i) {

                                    var adhesive_val = $(this).find('.FBPATC').data('filter-val');

                                    if (remove_val === adhesive_val) {
                                        $(this).css('color', 'black');
                                        $(this).find('.FBPATC').attr('disabled', false);
                                    }
                                });
                            });
                        }

                        if (data.filterBaseData.manufacture_ids && data.filterBaseData.manufacture_ids[0] !== null) {
                            var remove_manufacture_ids = [];
                            var all_manufacture_ids = [];
                            var count = 0;

                            $(".FBPParent").find('.DropRightMaterial').each(function (i) {
                                $(this).find('.FBM').attr('disabled', true);
                                $(this).css('color', 'darkgray');
                            });

                            $.each(data.filterBaseData.manufacture_ids, function (index, remove_val) {

                                $(".FBPParent").find('.DropRightMaterial').each(function (i) {

                                    var material_val = $(this).find('.FBM').data('filter-val');

                                    var re = new RegExp(remove_val, 'img');
                                    if (material_val.match(re)) {
                                        $(this).css('color', 'black');
                                        $(this).find('.FBM').attr('disabled', false);
                                    }
                                });

                            });

                        }


                    } else if (data.filterBase === 'material') {

                        $(".FBPParent").find('.DropRightMaterial').each(function (i) {
                            $(this).find('.FBM').attr('disabled', false);
                            $(this).css('color', 'black');
                        });

                        if (data.filterBaseData.printer_compatibility && data.filterBaseData.printer_compatibility[0] !== null) {
                            var remove_printers = [];
                            var all_printers = [];
                            var count = 0;
                            $(".FBPParent").find('.DropRightPrinter').each(function (i) {
                                var printer_compatible_val = $(this).find('.FBPCC').data('filter-val');
                                all_printers.push(printer_compatible_val);
                                remove_printers.push(printer_compatible_val);
                            });
                            $.each(data.filterBaseData.printer_compatibility, function (index, item) {
                                $.each(remove_printers, function (index, remove_printer) {

                                    if (remove_printer === item) {
                                        var index = remove_printers.indexOf(item);
                                        if (index > -1) {
                                            remove_printers.splice(index, 1);
                                        }
                                    }
                                });
                            });
                            $(".FBPParent").find('.DropRightPrinter').each(function (i) {
                                $(this).css('color', 'black');
                                $(this).find('.FBPCC').attr('disabled', false);
                            });
                            $.each(remove_printers, function (index, remove_val) {
                                $(".FBPParent").find('.DropRightPrinter').each(function (i) {

                                    var printer_val = $(this).find('.FBPCC').data('filter-val');
                                    if (remove_val === printer_val) {
                                        $(this).find('.FBPCC').attr('checked', false);
                                        $(this).find('.FBPCC').attr('disabled', true);
                                        $(this).css('color', 'darkgray');
                                    }

                                });
                            });

                        }

                        if (data.filterBaseData.adhesive_type && data.filterBaseData.adhesive_type[0] !== null) {
                            var remove_adhesives = [];
                            var all_adhesives = [];
                            var count = 0;
                            $(".FBPParent").find('.DropRightAdhesive').each(function (i) {
                                var adhesive_compatible_val = $(this).find('.FBPATC').data('filter-val');
                                all_adhesives.push(adhesive_compatible_val);
                                remove_adhesives.push(adhesive_compatible_val);
                            });
                            $.each(data.filterBaseData.adhesive_type, function (index, item) {
                                $.each(remove_adhesives, function (index, remove_adhesive) {

                                    if (remove_adhesive === item) {
                                        var index = remove_adhesives.indexOf(item);
                                        if (index > -1) {
                                            remove_adhesives.splice(index, 1);
                                        }
                                    }
                                });
                            });
                            $(".FBPParent").find('.DropRightAdhesive').each(function (i) {
                                $(this).css('color', 'black');
                                $(this).find('.FBPATC').attr('disabled', false);
                            });
                            $.each(remove_adhesives, function (index, remove_val) {
                                $(".FBPParent").find('.DropRightAdhesive').each(function (i) {

                                    var adhesive_val = $(this).find('.FBPATC').data('filter-val');
                                    if (remove_val === adhesive_val) {
                                        $(this).find('.FBPATC').attr('checked', false);
                                        $(this).find('.FBPATC').attr('disabled', true);
                                        $(this).css('color', 'darkgray');
                                    }

                                });
                            });

                        }
                    }


                }
                $(document).ready(function () {
                    $(".MaterialCenterContentMain .eachproductContainer:first-child .MaterialWhiteBg .MaterialCenterContentOuter .MaterialCenterContentInner .RowDefault .MaterialViewPrices .btn").click();
                });
                $("#aa_loader_products").hide();
                $(".FilterDisableEnable").slideUp(1000);
            }
        });
    }

    function clearFilterByProducts(_this) {


        if (filterbase === 'material') {
            filterbase = 0;
        }

        $(_this).parents(".FBPParent").find('.FBP').each(function (i) {
            $(this).attr('checked', false);
            getselectedValues($(this), $(this).val());
        });

        $(".FBPParent").find('.DropRightMaterial').each(function (i) {
            $(this).css('color', 'black');
            $(this).find('.FBPCC').attr('disabled', false);
        });
        
        filterbyProducts();
        
    }

    function clearFilterByPC(_this) {

        if (filterbase === 'printer') {
            filterbase = 0;
        }

        $(_this).parents(".FBPParent").find('.FBPCC').each(function (i) {
            $(this).attr('checked', false);
        });


        // $(".FBPParent").find('.DropRightPrinter').each(function (i) {
        //     $(this).css('color', 'black');
        //     $(this).find('.FBPCC').attr('disabled', false);
        // });

        filterbyProducts();
    }

    function clearFilterBySort(_this) {


        $(_this).parents(".FBPParent").find('.SBM').each(function (i) {
            $(this).attr('checked', false);
        });
        // $(".FBPParent").find('.DropRightSort').each(function (i) {
        //     $(this).css('color', 'black');
        //     $(this).find('.SBM').attr('disabled', false);
        // });
        filterbyProducts();
    }

    function clearFilterByAT(_this) {

        if (filterbase === 'adhesive') {
            filterbase = 0;
        }


        $(_this).parents(".FBPParent").find('.FBPATC').each(function (i) {
            $(this).attr('checked', false);
        });
        $(".FBPParent").find('.DropRightAdhesive').each(function (i) {
            $(this).css('color', 'black');
            $(this).find('.FBPATC').attr('disabled', false);
        });
        filterbyProducts();
    }


    // SORTING MATERIAL ARRAY FOR GETTING PRODUCTS SORTABLE FORMAT STARTS FROM HERE
    


    function removeArrayByValues(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
    }

    var sortedMaterials = [];
    function getselectedValues(this_OBJ , materialValues)
    {
        var _this = $(this_OBJ);
        var separatedValues = "";
        var eachValue = "";
        if(_this.prop( "checked" ) == true)
        {
            separatedValues = materialValues.split(",");
            if(separatedValues.length > 1)
            {
                for(start = 0; start<separatedValues.length; start++)
                {
                    if( jQuery.inArray(separatedValues[start], sortedMaterials ) )
                    {
                        sortedMaterials.unshift(separatedValues[start]);
                    }

                }
            }
            else
            {
                if( jQuery.inArray(materialValues, sortedMaterials ) )
                {
                    sortedMaterials.unshift(materialValues);
                }
            }
        }
        else
        {
            separatedValues = materialValues.split(",");
            if(separatedValues.length > 1)
            {
                for(start = 0; start<separatedValues.length; start++)
                {
                    for(i =0; i < sortedMaterials.length;  i++)
                    {
                        if(sortedMaterials[i] == separatedValues[start] )
                        {
                            removeArrayByValues(sortedMaterials, sortedMaterials[i]);
                            // sortedMaterials.splice(i,1);
                        }
                    }
                }
            }
            else
            {
                for(i =0; i < sortedMaterials.length;  i++)
                {
                    if(sortedMaterials[i] == materialValues )
                    {
                        removeArrayByValues(sortedMaterials, sortedMaterials[i]);
                        // sortedMaterials.splice(i,1);
                    }
                }
            }
        }
        // console.log(sortedMaterials);
    }
    // SORTING MATERIAL ARRAY FOR GETTING PRODUCTS SORTABLE FORMAT ENDS FROM HERE

//  Deselect products check mark if filter is'nt applied and click on close button
    $('.MaterialDropRightClose').click(function () {
        var element_count = $(this).data('counter');
        if ($('.MaterialFilterListing' + element_count).hasClass('activeFilterClass')) {

            $(this).attr('checked', true);
        } else {

            $(".FBPParent" + element_count).find('.FBP').each(function (i) {
                $(this).attr('checked', false);
                $(".FBPParent"+i).find('.FBP').each(function(i){
                    $(this).attr('checked', false);
                });
            });
            $(".FBPParent" + element_count).find('.FBAP').each(function (i) {
                $(this).attr('checked', false);
            });
             $(".FBPParent" + element_count).find('.SBM').each(function (i) {
                $(this).attr('checked', false);
            });
        }

        $(".FBPParent").find('.FBP').each(function (i) {
            getselectedValues($(this), $(this).val());
        });

    });

//  Deselect products check mark if filter is'nt applied
    $('.MaterialFilterLeftProducts').click(function () {
        var countLimit = '<?=   $listing_count; ?>';
        for (var i = 1; i < countLimit; i++) {
            if ($('.MaterialFilterListing' + i).hasClass('activeFilterClass')) {
                $(this).attr('checked', true);
            } else {
                $(".FBPParent"+i).find('.FBP').each(function(i){
                    $(this).attr('checked', false);
                });
                $(".FBPParent" + i).find('.FBAP').each(function (i) {
                    $(this).attr('checked', false);
                });
                $(".FBPParent" + i).find('.SBM').each(function (i) {
                    $(this).attr('checked', false);
                });
            }
        }
        
        $(".FBPParent").find('.FBP').each(function (i) {
            getselectedValues($(this), $(this).val());
        });

    });

    function resetByProducts() {

        filterbase = 0;

        $(".FBPParent").find('.SBM').each(function (i) {
            $(this).attr('checked', false);
        });
        $(".FBPParent").find('.FBPCC').each(function (i) {
            $(this).attr('checked', false);
        });

        $(".FBPParent").find('.FBP').each(function (i) {
            $(this).attr('checked', false);
            getselectedValues($(this), $(this).val());
        });
        $(".FBPParent").find('.FBPATC').each(function (i) {
            $(this).attr('checked', false);
        });

        $(".FBPParent").find('.DropRightAdhesive').each(function (i) {
            $(this).css('color', 'black');
            $(this).find('.FBPATC').attr('disabled', false);
        });
        $(".FBPParent").find('.DropRightPrinter').each(function (i) {
            $(this).css('color', 'black');
            $(this).find('.FBPCC').attr('disabled', false);
        });
        $(".FBPParent").find('.DropRightMaterial').each(function (i) {
            $(this).css('color', 'black');
            $(this).find('.FBP').attr('disabled', false);
        });


        $('.favouritebyProducts').attr('checked', false);
        filterbyProducts();
    }

    function filterbyUse() {
        // $(".MaterialPageBanner").hide();
        $(".FilterDisableEnable").show();
        var FBU = "";
        var filterUses = $(".filterUses").val();

        var CategoryName_FBU = "";

        var dieCode = $(".dieCode").val();
        var coreSize = $("#coresize").val();
        if (coreSize == "") {
            coreSize = "4";
        }
        coreSize = coreSize.replace(/[^\d.]/g, '');

        var chx = document.getElementsByClassName('FBU');

        $('.MaterialFilterLeftUse').removeClass("activeFilterClass");
        for (var i = 0; i < chx.length; i++) {
            if (chx[i].type == 'radio' && chx[i].checked) {
                FBU = chx[i].value;
                $(chx[i]).parents('li').find('.MaterialFilterLeftUse').addClass("activeFilterClass");
                
                CategoryName_FBU = $(chx[i]).attr("data-categoryName");
            }
        }
        
        $("#aa_loader_products").show();
        var categoryId = $(".categoryId").val();
         var regmark = " <?php echo $_GET['regmark'];?> ";
        var printingType = $(".printingType").val();
        var productid = $(".productid").val();

        var showFavouritesProducts = false;
        var favouriteManufactureIdList = [];
        if ($('.favouriteByUse').prop("checked") == true) {
            showFavouritesProducts = true;
            var array = $('.favouriteByUse').val().split(",");
            if (array && array.length > 0) {
                for (start = 0; start < array.length; start++) {
                    favouriteManufactureIdList.push('"' + dieCode + array[start].replace(/'/g, "") + coreSize + '"');
                }
            }

        }


        $.ajax({
            url: base + 'ajax/getFilteredProducts',
            type: "POST",
            async: "false",
            dataType: "html",

            data: {
                'showFavouritesProducts': showFavouritesProducts,
                "categoryId": categoryId,
                "printingType": printingType,
                "productid": productid,
                "CategoryName_FBU": CategoryName_FBU,
                "FBU": FBU,
                "filterUses": filterUses,
                "catIdSimple": "<?php echo $catIdSimple;?>",
                "dieCode": dieCode,
                "favouriteManufactureIdList": favouriteManufactureIdList,
                "regmark": regmark
            },


            success: function (data) {
                val = $("#woundoption").val();
                if (val == "") {
                    val = "Outside";
                }
                update_wound_images(val);
                // $('#coresize').trigger('change');
                if (data != '') {
                    data = $.parseJSON(data);
                    $(".productsMainContainer").html(data.html);
                }
                $(document).ready(function () {
                    $(".MaterialCenterContentMain .eachproductContainer:first-child .MaterialWhiteBg .MaterialCenterContentOuter .MaterialCenterContentInner .RowDefault .MaterialViewPrices .btn").click();
                });
                $("#aa_loader_products").hide();
                $(".FilterDisableEnable").slideUp(1000);
            }
        });

    }


    function clearFilterByUse(_this) {
        $(_this).parents(".FBUParent").find('.FBU').each(function (i) {
            $(this).attr('checked', false);
        });
        filterbyUse();

    }

    function resetByUse() {
        $(".FBUParent").find('.FBU').each(function (i) {
            $(this).attr('checked', false);
        });
        $('.favouriteByUse').attr('checked', false);

        filterbyUse();
    }

    function resetByPU() {
        if ($(".filterUses").val() == "byProduct") {
            resetByProducts();
        } else {
            resetByUse();
        }
    }

    function printed_labels(_this)
    {
        //$(_this).parents('.mainContainer').find('.aa_loader').show();
        var _this = $(_this);

        //var no_of_labels = $(_this).parents('.mainContainer').find('.plainsheet_input').val();
         var no_of_labels = $(_this).parents('.mainContainer').find('.plainsheet_input_printing').val(); //waqar
        var available_in = $(_this).parents('.mainContainer').find('.available_in').val();
        var type = $(_this).parents('.mainContainer').find('.type').val();
        var email = $(_this).parents('.mainContainer').find('.email').val();
        var material = $(_this).parents('.mainContainer').find('.material').val();
        var color = $(_this).parents('.mainContainer').find('.color').val();
        var adhesive = $(_this).parents('.mainContainer').find('.adhesive').val();
        var shape = $(_this).parents('.mainContainer').find('.shape').val();
        var min_width = $(_this).parents('.mainContainer').find('.min_width').val();
        var max_width = $(_this).parents('.mainContainer').find('.max_width').val();
        var min_height = $(_this).parents('.mainContainer').find('.min_height').val();
        var max_height = $(_this).parents('.mainContainer').find('.max_height').val();
        

        var no_of_rolls = $(_this).parents('.mainContainer').find('.plainrolls').val();

        /*if(no_of_rolls == 1)
        {
            if(no_of_labels < 150 )
            {
                no_of_labels = 150;
                var input_labels = $(_this).parents('.mainContainer').find('.plainsheet_input');
                show_faded_popover(input_labels, 'Quantity has been amended for production as '+no_of_labels+' labels.');
               
                $(_this).parents('.mainContainer').find('.plainsheet_input').val(no_of_labels);
                $(_this).parents('.mainContainer').find('.plainlabels').val(no_of_labels);
                return false;
            }
        }*/

        if(no_of_labels > 1000000)
        {
            no_of_labels = 1000000;
        }

        var selected_size = $(_this).parents('.mainContainer').find('.selected_size').val();
        var productcode = $(_this).parents('.mainContainer').find('.manfactureid').val();
        var dieCode = $(_this).parents('.mainContainer').find('.dieCode').val();

        var source = $(_this).parents('.mainContainer').find('.source').val();


        var coresize = $("#coresize option:selected").val();
        var woundoption = $("#woundoption option:selected").val();

        dieCode = dieCode+coresize;
        selected_size = selected_size+coresize;

        $.ajax({
            url: base + 'ajax/addPrintingPreferences',
            type: "POST",
            async: "false",
            dataType: "html",
           beforeSend: function() {
                $(_this).parents('.mainContainer').find('.aa_loader').show();
            },
            data: {
                shape: shape,
                min_width: min_width,
                max_width: max_width,
                min_height: min_height,
                max_height: max_height,
                no_of_labels: no_of_labels,
                productcode: productcode,
                no_of_rolls:no_of_rolls,
                dieCode: dieCode,
                coresize:coresize,
                source: source,
                woundoption:woundoption,
                email: email,
                selected_size: selected_size,
                available_in: available_in,
                material: material,
                color: color,
                adhesive: adhesive,
                type: type
            },
            success: function (data) {
                if(data)
                {
                    document.location = "<?php echo base_url();?>material-printed-labels/";
                }
                $(_this).parents('.mainContainer').find('.aa_loader').hide();
            }
        });
    }

    function showHideAddPrint(_this)
    {
        if( $(_this).parents('.mainContainer').find('.registration_mark_option').prop("checked") == false  )
        {
            $(_this).parents('.mainContainer').find('.addprintHead').hide();
            $(_this).parents('.mainContainer').find('.MaterialAddPrintButton').hide();
        }
        else
        {
            $(_this).parents('.mainContainer').find('.addprintHead').show();
            $(_this).parents('.mainContainer').find('.MaterialAddPrintButton').show();
        }
    }
    
    
    coreAndWoundChecker();
    


</script>
