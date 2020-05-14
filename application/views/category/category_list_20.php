<div class="row">
    <? if (isset($nearest_sizes) and $nearest_sizes != 'disable') { ?>
        <div class="sort-filters nearestBg p-l-r-10">
            <div class="row">
                <div class="col-md-12">
                    <p class="hide_title">Nearest Sizes</p>
                </div>
            </div>
        </div>
    <? } ?>
    <div class="row  dm-row">
        <?
        $i = 1;
        $DL_EnhancedEcomerce = '';
        foreach ($records['list'] as $pro) {
            $fixedclass = '';
            $dmclass = '';
            $code = explode('.', $pro->CategoryImage);
            if (preg_match("/Roll/", $pro->CategoryName)) {
                if ($i % 4 == 0) {
                    $dmclass = 'last-child';
                }
                $Paper_size = "Labels on Rolls";
                $LabelSize = str_replace("Roll Labels", "", $pro->CategoryName);

                $LabelSize = str_replace("Circle", "Diameter", $LabelSize);

                //$img_src = Assets."images/categoryimages/rollimages/ ".$pro->CategoryImage;
                $img_src = Assets . "images/categoryimages/RollLabels/" . $code[0] . ".jpg";
                /*if(!getimagesize($img_src))
                {
                    $img_src = Assets."images/categoryimages/rollimages/".$pro->CategoryImage;
                }*/
                if (preg_match("/search/", uri_string())) {
                    $width = '';
                    $height = '230';
                    $fixedclass = 'heightFix';
                } else {
                    $width = '';
                    $height = '';
                    $custom_class = 'roll_custom';
                }
                $catname = $pro->CategoryName;
                $url = 'roll-labels';

                $starting_ecom_price = '85.17';

            } else if (preg_match("/SRA3/", $pro->CategoryName)) {

                $pro->CategoryImage = str_replace('.png', 'WTP.png', $pro->CategoryImage);

                $Paper_size = "SRA3 Sheets";
                $img_src = Assets . "images/categoryimages/SRA3Sheets/colours/" . $pro->CategoryImage;
                $width = '208';
                $height = '148';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'sra3-sheets';
                $starting_ecom_price = '28.30';

            } else if (preg_match("/A5/", $pro->CategoryName)) {

                $pro->CategoryImage = str_replace('.png', 'WTP.png', $pro->CategoryImage);
                $Paper_size = "A5 Sheets";
                $img_src = Assets . "images/categoryimages/A5Sheets/colours/" . $pro->CategoryImage;
                $width = '210';
                $height = '148.5';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'a5-sheets';
                $starting_ecom_price = '28.66';
            } else if (preg_match("/A3/", $pro->CategoryName)) {

                $pro->CategoryImage = str_replace('.png', 'WTP.png', $pro->CategoryImage);
                $Paper_size = "A3 Sheets";
                $img_src = Assets . "images/categoryimages/A3Sheets/colours/" . $pro->CategoryImage;
                $width = '208';
                $height = '148';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'a3-sheets';
                $starting_ecom_price = '28.30';
            } else {
                $pro->CategoryImage = str_replace('.png', 'WTP.png', $pro->CategoryImage);
                $Paper_size = "A4 Sheets";
                $img_src = Assets . "images/categoryimages/A4Sheets/colours/" . $pro->CategoryImage;
                $width = '125';
                $height = '176';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'a4-sheets';
                $starting_ecom_price = '7.55';

            }

            if (preg_match("/searchResults/", uri_string())) {
                $fixedclass = 'heightFix';
            }


            $LabelSize = str_replace("mm", "", $LabelSize);
            $LabelSize = str_replace("Label Size", "", $LabelSize);
            $LabelSize = str_replace("label size", "", $LabelSize);
            $LabelSize = str_replace("/label Size/is", "", trim($LabelSize));


            if (strpos($LabelSize, '/') !== false) {
                $LabelSizeArray = explode("/", $LabelSize);
                if (isset($LabelSizeArray[0]) and $LabelSizeArray[0] != '') {
                    $LabelSize = "<span title='" . $LabelSize . "'>" . $LabelSizeArray[0] . " <i title='" . $LabelSize . "' class='fa fa-info-circle textBlue'></i>  <span>";
                }
            }
            $url = base_url() . $url . '/' . strtolower($pro->Shape) . '/' . strtolower($pro->CategoryID) . '/'; ?>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-20-p  dm-box <?= $dmclass ?>">
                <div class="thumbnail" style="overflow: hidden !important;">
                    <div class="imgBg <?= $fixedclass ?> text-center"><img onerror='imgError(this);'
                                                                           src="<?= $img_src ?>" alt="<?= $catname ?>"
                                                                           title="<?= $catname ?>" width="<?= $width ?>"
                                                                           height="<?= $height ?>"></div>
                    <div class="caption">
                        <? if (!preg_match("/Roll/", $pro->CategoryName)) { ?>
                            <p class="label_layout"><a href="#" data-toggle="modal" data-target=".layout"
                                                       class="layout_specs" id="<?= $pro->CategoryID ?>"> View Label
                                    Layout</a></p>
                        <? } ?>
                        <?
                        if (!preg_match("/Roll/", $pro->CategoryName)):
                            ?>
                            <h2>
                                <?= $Paper_size; ?>
                            </h2>
                        <? else: ?>
                            <p><a href="#" data-toggle="modal" data-target=".registration_mark"
                                  id="<?= $pro->CategoryID ?>" class="registration_modal_link"
                                  data-shape="<?= strtolower($pro->Shape) ?>">View Registration Mark Option</a></p>
                        <? endif; ?>
                        <p>
                            <?= $catname ?>
                        </p>
                        <div class="row">
                            <p class="<?= (preg_match("/Roll/", $pro->CategoryName)) ? 'col-md-8' : 'col-md-9' ?> col-sm-8">
                                <strong>Label Size (mm)</strong><br>
                                <?= $LabelSize ?>
                                <? $tooltip_title = "";
                                if (($pro->InnerHole) || ($pro->InnerLabel)):
                                    if ($pro->Shape == "Circular") {
                                        $tooltip_title .= $LabelSize = str_replace(".00", "", $pro->Width) . " mm Diameter";
                                    } else {
                                        $tooltip_title .= $LabelSize . " mm";
                                    }
                                    if ($pro->InnerHole):
                                        $tooltip_title .= "<br>" . $pro->InnerHole . " Diameter (Inner Hole)";
                                    endif;
                                    if ($pro->InnerLabel):
                                        $tooltip_title .= "<br>" . $pro->InnerLabel . " Diameter (Inner Label)";
                                        ?>
                                    <? endif; ?>
                                    <a data-toggle="tooltip" data-placement="top" title="" data-html="true"
                                       data-original-title="<?= $tooltip_title ?>" href="javascript:void(0);"><i
                                                class="fa fa-info-circle"></i></a>
                                <? endif; ?>
                            </p>
                            <p class="<?= (preg_match("/Roll/", $pro->CategoryName)) ? 'col-md-4' : 'col-md-3' ?> col-sm-4">
                                <strong>Code</strong><br>
                                <span class="diecode">
              <?= $code[0] ?>
              </span></p>
                        </div>
                        <?
                        if (preg_match("/Roll/", $pro->CategoryName)) {
                            ?>
                            <input type="hidden" name="search_view" value="category"/>
                        <? }
                        if (preg_match("/Roll/", $pro->CategoryName) and 1 == 2) { ?>
                            <input type="hidden" name="search_view" value="category"/>
                            <div class="labels-form">
                                <div class="btn-group btn-block dm-selector"><a id="coresize_<?= $pro->CategoryID ?>"
                                                                                class="btn btn-default btn-block dropdown-toggle coresize loadcoresize"
                                                                                data-cat-id="<?= $pro->CategoryID ?>"
                                                                                data-man-id="<?= $pro->CategoryID ?>"
                                                                                data-toggle="dropdown" data-value="">Core
                                        Size <i class="fa fa-unsorted"></i></a>
                                    <ul class="dropdown-menu btn-block ">
                                        <li><img onerror='imgError(this);' src="<?= Assets ?>images/loader.gif"
                                                 class="image" alt="AA Labels Loader"></li>
                                    </ul>
                                </div>
                                <div class="clear5"></div>
                            </div>
                            <div class="clear15"></div>
                            <? $wholesale_class = 'set-printer';
                            if (isset($wholesale) and $wholesale != '') {
                                $url = 'javascript:void(0);';
                                $wholesale_class = 'wholesale_class';
                            }
                            ?>
                            <a data-prd-id="roll" data-cat-id="<?= $pro->CategoryID ?>" id="<?= $pro->CategoryID ?>"
                               role="button" class="btn-block btn orange <?= $wholesale_class ?>"
                               href="<?= $url ?>"> <i class="fa fa-arrow-circle-right"></i> Select Material </a>
                        <? } else {
                            $wholesale_class = '';
                            if (isset($wholesale) and $wholesale != '') {
                                $url = 'javascript:void(0);';
                                $wholesale_class = 'wholesale_class';
                            }


//              print_r($url);die;

                            ?>

                            <a data-cat-id="<?= $pro->CategoryID ?>" data-prd-id="" id="<?= $pro->CategoryID ?>"
                               role="button" class="btn-block btn orange <?= $wholesale_class ?>" href="<?= $url ?>"> <i
                                        class="fa fa-arrow-circle-right"></i> Select Material </a>
                        <? } ?>
                        <? //if(!preg_match("/Roll/",$pro->CategoryName)){
                        ?>
                        <div class="compare_div labels-form clearfix m-t-10"
                             style="<?= (isset($search_page) and $search_page == 'enabled') ? 'display:none' : '' ?>">
                            <div class="col-md-2 col-xs-2">
                                <label class="checkbox">
                                    <input name="compare_check" class="textOrange approve"
                                           value="<?= $pro->CategoryID ?>" type="checkbox"/>
                                    <i></i></label>
                            </div>
                            <div class="col-md-10 col-xs-10">
                                <button class="btn orangeBg btn-block compare_btn" disabled="disabled">Compare</button>
                            </div>
                        </div>
                        <?php //}
                        ?>
                    </div>
                </div>
            </div>
            <?


            /*******   data layer for enhnced ecomerce ******/

            $DL_EnhancedEcomerce .= "{'id': '" . $pro->CategoryID . "',
									   'name': '" . $pro->CategoryName . "',
									   'price': '" . $starting_ecom_price . "',
									   'brand': 'AALABELS',
									   'category': 'Office Supplies/General Supplies/Labels & Tags',
									   'position': '" . $i . "',
									   'list': 'Category page',
									   },";

            /*******   data layer for enhnced ecomerce ******/


            $i++;
        } ?>
    </div>
</div>
