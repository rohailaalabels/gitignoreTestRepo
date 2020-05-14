<style>
    .cWhite {
        padding: 12px 0 0 0px;
        color: #006da4 !important;
        font-weight: 600;
    }

    .filterBg {
        background-color: #d9edf7;
    }

    #ajax_artwork_uploads thead {
        background: #17b1e3 none repeat scroll 0 0;
        color: white;
    }

    .panel-body button[data-dismiss='modal'] {
        display: none;
    }

    .discount_price {
        color: black !important;
        font-size: 16px !important;
        text-decoration: line-through !important;
        display: inline !important;
    }

    #total_price b {
        font-size: 22px;
        color: #fd4913;
        font-weight: bold;
    }

    #total_price {
        text-align: right;
    }
</style>
<?php
$filter = '';
$sort = '';
if (isset($_GET['filter'])) {
    $filter = strtolower($_GET['filter']);
}
if (isset($_GET['sort'])) {
    $sort = strtolower($_GET['sort']);
}
?>
<script src="<?= Assets ?>labelfinder/js/jquery-ui.js"></script>
<div id="aa_loader" class="white-screen" style=" display:none;">
    <div class="loading-gif text-center" style="top:50%; z-index:150;"><img onerror='imgError(this);'
                                                                            src="<?= Assets ?>images/loader.gif"
                                                                            class="image"
                                                                            style="width:160px; height:43px; "></div>
</div>
<div class="">
    <div class="container m-t-b-8 ">
        <div class="col-md-8">
            <ol class="breadcrumb  m0">
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                <li class="active">Order History</li>
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
                        <h1>Order History</h1>
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
                            <div class="col-md-12 m-t-10">
                                <div class="filterBg p-l-r-10">
                                    <div class=" row">
                                        <div class="col-md-12 m-t-15">
                                            <div class="">
                                                <div class="labels-form col-xs-12 col-md-2 hidden-sm">
                                                    <div class=" cBlue text-white hidden-xs  hidden-sm">
                                                        <div class="text-uppercase pull-left cWhite"> Filter Orders
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="labels-form col-xs-12 col-md-3 col-sm-5">
                                                    <label class="select">
                                                        <select name="filter_orders" id="filter_orders"
                                                                onchange="filter_orders()">
                                                            <option value="">Filter Orders By</option>
                                                            <option value="roll">Roll Orders</option>
                                                            <option value="a5">A5 Sheet Orders</option>
                                                            <option value="a4">A4 Sheet Orders</option>
                                                            <option value="a3">A3 Sheet Orders</option>
                                                            <option value="sra3">SRA3 Sheet Orders</option>
                                                            <option value="integrated">Integrated Sheet Orders</option>
                                                            <option value="plain">Plain Labels Orders</option>
                                                            <option value="printed">Printed Labels Orders</option>
                                                        </select>
                                                        <i></i> </label>
                                                </div>
                                                <div class="labels-form col-xs-12 col-md-2 col-md-offset-1 hidden-sm">
                                                    <div class=" cBlue text-white hidden-xs hidden-sm">
                                                        <div class="text-uppercase  pull-left cWhite">Sort Orders</div>
                                                    </div>
                                                </div>
                                                <div class=" labels-form col-xs-12 col-sm-5 col-md-3">
                                                    <label class="select">
                                                        <select name="sort_orders" id="sort_orders"
                                                                onchange="sort_orders()">
                                                            <option value="">Sort Orders by</option>
                                                            <option value="date_asc">Date: Oldest Orders First</option>
                                                            <option value="date_desc">Date: Recent Orders First</option>
                                                        </select>
                                                        <i></i> </label>
                                                </div>
                                                <div class="labels-form col-xs-12 col-md-1 col-sm-2">
                                                    <button onclick="window.location.href = '<?= SAURL ?>users/user_orders/';"
                                                            class="btn orangeBg btn-block" role="button"><i
                                                                class="fa fa-refresh"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <? if (count($orders) > 0) {
                                    //echo "<pre>";print_r($orders);echo"</pre>";
                                    foreach ($orders as $rec) {
                                        //echo "<pre>";print_r($rec);echo"</pre>";
                                        if ($rec->StatusTitle == 'Completed') {
                                            $status_class = 'text-success';
                                        } else if ($rec->StatusTitle == 'Pending Payment') {
                                            $status_class = 'text-warning';
                                        } else if ($rec->StatusTitle . 'Pending processing') {
                                            $status_class = 'text-info';
                                        } else {
                                            $status_class = 'text-danger';
                                        }


                                        ?>
                                        <div class="">
                                            <div class="col-md-12 bg-info p-t-b-12">
                                                <div class="<?php if ($rec->OrderStatus == 7) {
                                                    echo 'col-sm-4';
                                                } else {
                                                    echo 'col-sm-8';
                                                } ?>"><strong>Order #</strong>
                                                    <?= $rec->OrderNumber ?>
                                                </div>
                                                <?php if ($rec->OrderStatus == 7) {
                                                    ?>
                                                    <div class="col-sm-4"><img onerror='imgError(this);'
                                                                               src="<?= AURL ?>theme/images/pdf.png"> <a
                                                                href="<?= base_url() ?>ajax/printOrder/<?= $rec->OrderNumber ?>"><strong>Download
                                                                Invoice</strong></a></div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="pull-right m-l-10"><i class="fa fa-calendar "></i>&nbsp;
                                                        <?= date("d/m/y", $rec->OrderDate); ?>
                                                    </div>
                                                    <div class=""> Status: <i
                                                                class="fa fa-circle <?= $status_class ?> "></i>&nbsp;
                                                        <?= $rec->StatusTitle ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive col-md-12 p0 border0">
                                                <table class="table table-bordered table-hover ">
                                                    <thead class="">
                                                    <tr>
                                                        <th style="width:10%;">Code</th>
                                                        <th style="width:5%;">Image</th>
                                                        <th style="width:35%;">Description</th>
                                                        <th style="width:10%;">Qty</th>
                                                        <th style="width:15%;">Price</th>
                                                        <th style="width:15%;">Buy More Get More</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?
                                                    $product_info = $this->user_model->get_order_product_record($rec->OrderNumber);
                                                    $rec->currency = ($rec->currency) ? $rec->currency : 'GBP';
                                                    $rec->exchange_rate = ($rec->exchange_rate) ? $rec->exchange_rate : 1;

                                                    //currency
                                                    //exchange_rate

                                                    $symbol = $this->home_model->get_currecy_symbol($rec->currency);
                                                    $latest_rate = $this->home_model->get_exchange_rate($rec->currency);

                                                    foreach ($product_info as $product) {
                                                        //echo"<pre>";print_r($product);echo"</pre>";
                                                        $product->Price = $product->Price * $rec->exchange_rate;
                                                        $product->Price = number_format(($product->Price), 2, '.', '');
                                                        //$product->Price = $this->home_model->apply_currecy_rate($product->Price,'no');

                                                        $product->Print_Total = $product->Print_Total * $rec->exchange_rate;
                                                        $product->Print_Total = number_format(($product->Print_Total), 2, '.', '');

                                                        $details = $this->user_model->get_product_details($product->ProductID);

                                                        //echo"<pre>";print_r($details);echo"</pre>";
                                                        //new code
                                                        $details['Image1'] = str_replace(".gif", ".png", $details['Image1']);
                                                        $path = Assets . 'images/material_images/' . $details['Image1'];

                                                        if ($product->ProductID == 0 and $product->source == "LBA") {
                                                            $label_image = $this->home_model->get_db_column("lba_sets", "image", "Designid", $product->user_project_id);
                                                            $path = LABELER . "thumb/" . $label_image;
                                                        }

                                                        $img_class = 'img-circle';
                                                        $img_width = '25';
                                                        $product_type = 'Sheets';

                                                        $priceFrom = '';
                                                        $print_type = '';
                                                        $print_type = $product->Print_Type;

                                                        if (preg_match("/Application Labels/i", $details['ProductBrand'])) {
                                                            $min_qty = '1';
                                                            $max_qty = '50000';
                                                            $colorcode = (isset($product->colorcode) and $product->colorcode != '') ? '-' . $product->colorcode : '';
                                                            $designcode = substr($details['ManufactureID'], -4);
                                                            $path = Assets . "images/application/design/" . $designcode . $colorcode . '.png';
                                                            $img_class = '';
                                                            $img_width = '60';
                                                            $product_type = 'Application';
                                                        } else if (preg_match("/A5/i", $details['ProductBrand'])) {
                                                            $min_qty = '25';
                                                            $max_qty = '100000';
                                                            if (preg_match("/PETC/", $details['ManufactureID']) || preg_match("/PETH/", $details['ManufactureID']) || preg_match("/PVUD/", $details['ManufactureID'])) {
                                                        		$min_qty = '5';
                                                        		$max_qty = '100000';
                                                        	} 
	
                                                        } else if (preg_match("/A3/i", $details['ProductBrand'])) {
                                                            $min_qty = '100';
                                                            $max_qty = '100000';
                                                        } else if (preg_match("/SRA3/i", $details['ProductBrand'])) {
                                                            $min_qty = '100';
                                                            $max_qty = '100000';
                                                        } else if (preg_match("/Roll Labels/i", $details['ProductBrand'])) {

                                                            $min_qty = $this->home_model->min_qty_roll($details['ManufactureID']);
                                                            $max_qty = $this->home_model->max_qty_roll($details['ManufactureID']);
                                                            $min_labels_per_roll = $this->home_model->min_labels_per_roll($min_qty);
                                                            $max_labels_per_roll = $this->home_model->max_total_labels_on_rolls($details['LabelsPerSheet']);
                                                            $query = "Select c.categoryID, c.LabelGapAcross,c.Height from category c join products p on SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID and p.ProductID LIKE '" . $product->ProductID . "'";
                                                            $die_details = $this->db->query($query)->row();
                                                            if ($product->is_custom == 'Yes') {
                                                                $details['LabelsPerSheet'] = $product->LabelsPerRoll;
                                                            }


                                                            $sql = $this->user_model->get_sum_of_designed_artworks($rec->OrderNumber, $product->ProductID);
                                                            $no_of_labels_original = $sql['labels'];
                                                            if ($no_of_labels_original == 0) {
                                                                $no_of_labels_original = $details['LabelsPerSheet'] * $product->Quantity;
                                                            }

                                                            $product_type = 'Rolls';

                                                            if ($product->Printing == 'Y') {
                                                                $artworks = $this->home_model->get_attached_atworks_for_order($rec->OrderNumber, $product->ProductID);
                                                                if (count($artworks) > 0) {
                                                                    $i = 0;
                                                                    foreach ($artworks as $upload) {
                                                                        $i++;
                                                                        $artworkfile = AJAXURL . 'theme/integrated_attach/' . $upload->file;
                                                                        if (preg_match("/.pdf/is", $upload->file)) {
                                                                            $artworkpath = AJAXURL . 'theme/site/images/pdf.png';

                                                                            $width_img = '';
                                                                        } else if (preg_match("/.doc/is", $upload->file) || preg_match("/.docx/is", $upload->file)) {
                                                                            $artworkpath = AJAXURL . 'theme/site/images/doc.png';
                                                                            $width_img = '';
                                                                        } else {
                                                                            $artworkpath = AJAXURL . 'theme/integrated_attach/' . $upload->file;
                                                                            $width_img = '';
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            if ($product->Printing == "Y") {
                                                                $collection['labels'] = $details['LabelsPerSheet'] * $product->Quantity;

                                                                if (preg_match("/Roll Labels/i", $details['ProductBrand'])) {
                                                                    $sql = $this->user_model->get_sum_of_designed_artworks($rec->OrderNumber, $product->ProductID);
                                                                    $collection['labels'] = $sql['labels'];
                                                                }
                                                                $collection['manufature'] = $product->ManufactureID;
                                                                $collection['finish'] = $product->FinishType; //
                                                                $collection['rolls'] = $product->Quantity;

                                                                $price_res = $this->home_model->calculate_printing_price($collection);

                                                                $latest_price = $price_res['final_price'];

                                                                if ($collection['finish'] == 'Fullcolour+White') {
                                                                    //if($labeltype == 'Fullcolour+White'){
                                                                    $latest_price = (1.1) * $latest_price;  //full colour +white increase 10%
                                                                }

                                                                $latest_price = number_format(($latest_price * $latest_rate), 2, '.', '');
                                                            } else {
                                                                $latest_price = $this->home_model->calclateprice($details['ManufactureID'], $product->Quantity, $details['LabelsPerSheet']);
                                                                $latest_price = $latest_price['final_price'];

                                                                $latest_price = number_format(($latest_price * $latest_rate), 2, '.', '');
                                                            }

                                                            if ($latest_price != $product->Price) {
                                                                $cost_per_label = round(($latest_price / ($product->Quantity * $details['LabelsPerSheet'])) * 100, 2);
                                                                $priceFrom = 'The latest price is ' . $symbol . $latest_price . ' for  ' . $product->Quantity . ' Rolls, cost per label ' . $cost_per_label . ' pence';
                                                            }


                                                        } else if (preg_match("/Integrated/is", $details['ProductBrand'])) {
                                                            //$min_qty = $this->home_model->min_qty_integrated($details['ManufactureID']);
                                                            //$max_qty = $this->home_model->max_qty_integrated($details['ManufactureID']);
                                                            if (preg_match('/250/', $product->ProductName)) {
                                                                $min_qty = 250;
                                                            } else {
                                                                $min_qty = 1000;
                                                            }
                                                            $max_qty = 500000;

                                                            $price = $this->home_model->single_box_price($details['ManufactureID'], $product->Quantity, $min_qty);
                                                            if (preg_match("/Printed/is", $product->Print_Type)) {
                                                                $printprice = $this->home_model->calculate_printed_sheets($product->Quantity, 'Fullcolour');
                                                                $latest_price = $printprice['price'] + $price['PlainPrice'];
                                                                $print_type = '4 Colour Digital Process';
                                                            } else if (preg_match("/Black/is", $product->Print_Type)) {
                                                                $printprice = $this->home_model->calculate_printed_sheets($product->Quantity, 'Mono');
                                                                $latest_price = $printprice['price'] + $price['PlainPrice'];
                                                                $print_type = 'Monochrome – Black Only';
                                                            } else {
                                                                $latest_price = $price['PlainPrice'];
                                                                $print_type = 'Plain';
                                                            }
                                                            //$print_type ='Plain';
                                                            $product_type = 'Integrated';
                                                            //echo $product->Print_Type;

                                                            $latest_price = number_format(($latest_price * $latest_rate), 2, '.', '');

                                                            if ($latest_price != $product->Price) {
                                                                $cost_per_label = round(($latest_price / ($product->Quantity * $details['LabelsPerSheet'])) * 100, 2);
                                                                $priceFrom = 'The latest price is ' . $symbol . $latest_price . ' for  ' . $product->Quantity . ' sheets, cost per label ' . $cost_per_label . ' pence';
                                                            }
                                                        } else {
                                                            $upd_qty = $product->Quantity;
                                                            if (substr($details['ManufactureID'], -2, 2) == 'XS') {
                                                                $min_qty = '5';
                                                                $max_qty = '100';
                                                                $product_type = 'xmass';
                                                                $disable = true;
                                                            } else {

                                                                if (preg_match("/PETC/", $details['ManufactureID']) || preg_match("/PETH/", $details['ManufactureID']) || preg_match("/PVUD/", $details['ManufactureID'])) {
                                                                    $min_qty = '25';
                                                                    $max_qty = '100000';

                                                                } else {
                                                                    $min_qty = '25';
                                                                    $max_qty = '100000';
                                                                }


                                                                if ($min_qty > $product->Quantity) {
                                                                    $upd_qty = 25;
                                                                }
                                                                //new code
                                                                if ($product->Printing == 'Y' && $product->source == 'flash') {
                                                                    $upd_qty = 1;
                                                                }
                                                            }

                                                            $latest_price = $this->product_model->ajax_price($upd_qty, $details['ManufactureID']);
                                                            $latest_price = $latest_price['custom_price'];
                                                            $latest_price = number_format(($latest_price * $latest_rate), 2, '.', '');
                                                            if ($latest_price != $product->Price) {
                                                                $cost_per_label = round(($latest_price / ($product->Quantity * $details['LabelsPerSheet'])) * 100, 2);
                                                                $priceFrom = 'The latest price is ' . $symbol . $latest_price . ' for  ' . $upd_qty . ' sheets, cost per label ' . $cost_per_label . ' pence';
                                                            }
                                                        }

                                                        //new code
                                                        $plabeltype = '';
                                                        $print_source = '';
                                                        $printing = 'plain';

                                                        if ($product->Printing == 'Y' && $product->source == 'flash') {
                                                            $files = $this->home_model->get_integrated_attachments($product->SerialNumber);
                                                            $path = AJAXURL . '/designer/media/thumb/' . $files['Thumb'];
                                                            $min_qty = '1';
                                                            $max_qty = '50000';
                                                            $plabeltype = $product->Print_Type;
                                                            $print_source = 'flash';
                                                            $printing = $plabeltype;
                                                        }
                                                        //$details['Image1'] = str_replace(".gif",".png",$details['Image1']);
                                                        $total_labels = $product->Quantity * $details['LabelsPerSheet'];
                                                        $sql = $this->user_model->get_sum_of_designed_artworks($rec->OrderNumber, $product->ProductID);
                                                        $total_labels = $sql['labels'];
                                                        if ($total_labels == 0) {
                                                            $total_labels = $details['LabelsPerSheet'] * $product->Quantity;
                                                        }
                                                        $cost_per = number_format(($product->Price / $total_labels), 2, '.', '');
                                                        ?>
                                                        <input type="hidden"
                                                               id="labels_p_sheet<?= $product->SerialNumber ?>"
                                                               value="<?= $details['LabelsPerSheet'] ?>"/>
                                                        <input type="hidden" id="Quantity_<?= $product->SerialNumber ?>"
                                                               value="<?= $product->Quantity ?>"/>
                                                        <input type="hidden"
                                                               id="Quantity_new_<?= $product->SerialNumber ?>"
                                                               value="<?= $product->Quantity ?>"/>
                                                        <input type="hidden"
                                                               id="No_Labels_Original<?= $product->SerialNumber ?>"
                                                               value="<?= $no_of_labels_original ?>"/>
                                                        <input type="hidden" id="min_qty<?= $product->SerialNumber ?>"
                                                               value="<?= $min_qty ?>"/>
                                                        <input type="hidden" id="max_qty<?= $product->SerialNumber ?>"
                                                               value="<?= $max_qty ?>"/>
                                                        <input type="hidden"
                                                               id="min_print_labels<?= $product->SerialNumber ?>"
                                                               value="<?= $min_labels_per_roll ?>"/>
                                                        <input type="hidden"
                                                               id="max_print_labels<?= $product->SerialNumber ?>"
                                                               value="<?= $max_labels_per_roll ?>"/>
                                                        <input type="hidden"
                                                               id="product_type<?= $product->SerialNumber ?>"
                                                               value="<?= $product_type ?>"/>
                                                        <input type="hidden" id="prd_id<?= $product->SerialNumber ?>"
                                                               value="<?= $product->ProductID ?>"/>
                                                        <input type="hidden" id="manufactureID<?= $product->SerialNumber ?>" value="<?= $product->ManufactureID ?>"/>
                                                        <input type="hidden" id="materialCode<?= $product->SerialNumber ?>" value="<?= $this->home_model->getmaterialcode($product->ManufactureID)?>"/>
                                                        
                                                        <input type="hidden"
                                                               id="print_type<?= $product->SerialNumber ?>"
                                                               value="<?= $print_type ?>"/>
                                                        <input type="hidden" id="colorcode<?= $product->SerialNumber ?>"
                                                               value="<?= @str_replace("-", "", $colorcode) ?>"/>
                                                        <input type="hidden" id="labeltype<?= $product->SerialNumber ?>"
                                                               value="<?= $plabeltype ?>"/>
                                                        <input type="hidden"
                                                               id="finishtype<?= $product->SerialNumber ?>"
                                                               value="<?= $product->FinishType ?>"/>
                                                        <input type="hidden" id="printQty<?= $product->SerialNumber ?>"
                                                               value="<?= $product->Print_Qty ?>"/>
                                                        <input type="hidden" id="source<?= $product->SerialNumber ?>" value="<?= $print_source ?>"/>
                                                        <input type="hidden" id="orderNum_<?= $product->SerialNumber ?>"
                                                               value="<?= $rec->OrderNumber ?>"/>
                                                        <input type="hidden" id="cart_id_<?= $product->SerialNumber ?>"
                                                               value=""/>
                                                        <input type="hidden" id="gap_<?= $product->SerialNumber ?>"
                                                               value="<?= $die_details->LabelGapAcross ?>"/>
                                                        <input type="hidden" id="diesize_<?= $product->SerialNumber ?>"
                                                               value="<?= $die_details->Height ?>"/>
                                                        <input type="hidden"
                                                               id="orientation<?= $product->SerialNumber ?>"
                                                               value="<?= $product->Orientation ?>"/>
                                                        <input type="hidden" id="wound<?= $product->SerialNumber ?>"
                                                               value="<?= $product->Wound ?>"/>
                                                        <input type="hidden" value="<?= count($artworks) ?>"
                                                               data-qty="0"
                                                               id="uploadedartworks_<?= $product->SerialNumber ?>"
                                                               data-presproof="<?= $product->pressproof ?>">
                                                        <input type="hidden" id="printing<?= $product->SerialNumber ?>"
                                                               value="<?= $product->Printing ?>"/>
                                                        <input type="hidden" id="regmark<?= $product->SerialNumber ?>"
                                                               value="<?= $product->regmark ?>"/>

                                                        <tr>
                                                            <td style="text-align:center;"><?= $details['ManufactureID'] ?>
                                                                <?php if ($product->ProductID == 0 and $product->source == "LBA") {
                                                                    echo "FLDT-" . $product->user_project_id;
                                                                }
                                                                ?>
                                                                <div class="template-btns">
                                                                    <?php
                                                                    if ($product_type == "Sheets") {
                                                                        $categoryID = $this->home_model->get_db_column('products', 'CategoryID', 'ProductID', $product->ProductID);
                                                                        $pdfFile = $this->home_model->get_db_column('category', 'pdfFile', 'CategoryID', $categoryID);
                                                                        $wordFile = $this->home_model->get_db_column('category', 'wordFile', 'CategoryID', $categoryID);
                                                                        if (isset($pdfFile) and $pdfFile != '') {
                                                                            ?>
                                                                            <a rel="nofollow" data-toggle="tooltip"
                                                                               data-placement="right" title=""
                                                                               href="<?= base_url() ?>download/pdf/<?= $pdfFile ?>"
                                                                               class="btn orangeBg" role="button"
                                                                               data-original-title="Download PDF Template">
                                                                                <i class="fa fa-file-pdf-o f-28"></i>
                                                                            </a>
                                                                            <?php
                                                                        }
                                                                        if (isset($wordFile) and $wordFile != '') {
                                                                            ?>
                                                                            <a data-toggle="tooltip" title=""
                                                                               data-placement="right" rel="nofollw"
                                                                               href="<?= Assets ?>images/office/word/<?= $wordFile ?>"
                                                                               class="btn blueBg" role="button"
                                                                               data-original-title="Download Word Template">
                                                                                <i class="fa f-28 fa-file-word-o "></i>
                                                                            </a>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td style="text-align:center;"><img
                                                                        onerror='imgError(this);'
                                                                        class="<?= $img_class ?>" src="<?= $path ?>"
                                                                        width="<?= $img_width ?>" height=""></td>
                                                            <td>
                                                                <div id="prd_name<?= $product->SerialNumber ?>">
                                                                    <?= $product->ProductName; ?>
                                                                </div>
                                                                <?php if ($product->Printing == 'Y') {
                                                                    $artworks = $this->home_model->get_attached_atworks_for_order($rec->OrderNumber, $product->ProductID);
                                                                    if (count($artworks) > 0) {
                                                                        ?>
                                                                        <hr style="border-top:1px solid #dadada">
                                                                        <p><strong>
                                                                                <?= $this->home_model->get_printing_service_name($product->Print_Type, $product->regmark); ?>
                                                                            </strong></p>
                                                                        <br/>
                                                                        <?php
                                                                    }
                                                                    if (count($artworks) > 0 and $product->regmark != "Y") {
                                                                        foreach ($artworks as $upload) {
                                                                            //$artworkfile = AJAXURL.'theme/integrated_attach/'.$upload->file;
                                                                            if ($rec->OrderStatus == 7) {
                                                                                $artworkfile = Assets . 'printing/chat/softproof/' . $upload->softproof;
                                                                                $artworkpath = $artworkfile;
                                                                            } else {
                                                                                if (preg_match("/.pdf/is", $upload->file)) {
                                                                                    $artworkpath = AJAXURL . 'theme/site/images/pdf.png';
                                                                                    $width_img = '';
                                                                                } else if (preg_match("/.doc/is", $upload->file) || preg_match("/.docx/is", $upload->file)) {
                                                                                    $artworkpath = AJAXURL . 'theme/site/images/doc.png';
                                                                                    $width_img = '';
                                                                                } else {
                                                                                    $artworkpath = AJAXURL . 'theme/integrated_attach/' . $upload->file;
                                                                                    $width_img = '';
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <div class="col-xs-3 col-sm-3 col-md-1 ">
                                                                                <?php if ($rec->OrderStatus == 7): ?>
                                                                                <a href="#"
                                                                                   data-src="<?= $artworkfile ?>"
                                                                                   target="_blank"
                                                                                   class="softproof_modal"
                                                                                   data-toggle="modal"
                                                                                   data-target="#Softproof"
                                                                                   data-jobid="PJ<?= $upload->ID ?>">
                                                                                    <?php else: ?>
                                                                                    <a href="<?= $artworkpath ?>"
                                                                                       target="_blank">
                                                                                        <?php endif;
                                                                                        ?>
                                                                                        <img onerror='imgError(this);'
                                                                                             class="img-responsive"
                                                                                             src="<?= $artworkpath ?>"
                                                                                             height="50" width=""
                                                                                             style="border: 1px solid #17b1e3;"/>
                                                                                    </a>
                                                                                    <p class="ellipsis">
                                                                                        <small>Labels:</small> <small>
                                                                                            <?= $upload->labels ?>
                                                                                        </small></p>
                                                                            </div>
                                                                        <? }
                                                                    }

                                                                }
                                                                ?></td>
                                                            <td style="text-align:center;">
                                                                <div class="labels-form ">
                                                                    <?
                                                                    $enableDisableField = " display:block; ";
                                                                    $productQuantity = $product->Quantity;
                                                                    $sampleQuantityShow = "";
                                                                    $sampleStatus = 0;
                                                                    if($rec->PaymentMethods == 'Sample Order' || $product->Printing == "Y")
                                                                    {
                                                                        $sampleStatus = 1;
                                                                        $enableDisableField = " display:none; ";
                                                                        $sampleQuantityShow = $productQuantity;
                                                                    }?>

                                                                    <input class="allownumeric" style="display:none;" type="hidden" id="sample_order_status<?= $product->SerialNumber ?>" value="<?php echo $sampleStatus;?>" name="sample_order">

                                                                    <?php
                                                                    if (preg_match("/Roll Labels/i", $details['ProductBrand']) && $product->Printing == "Y" && $product->regmark != "Y") {
                                                                        $designs = ($product->Print_Qty > 1) ? 'Designs' : ' Design';
                                                                        $sql = $this->user_model->get_sum_of_designed_artworks($rec->OrderNumber, $product->ProductID);
                                                                        $no_of_labels = $sql['labels'];
                                                                        if ($no_of_labels == 0) {
                                                                            $no_of_labels = $details['LabelsPerSheet'] * $productQuantity;
                                                                        }
                                                                        echo $no_of_labels . " Labels" . "<br>(" . $productQuantity . " Rolls) <br>";
                                                                        if ($product->Print_Qty > 0) {
                                                                            echo $product->Print_Qty . ' ' . $designs;
                                                                        }
                                                                        ?>
                                                                        
                                                                        <label class="input">
                                                                            <input class="allownumeric" style="display:none; <?php echo $enableDisableField;?>" type="text" onkeyup="update_show('<?= $product->SerialNumber ?>','<?= $productQuantity ?>');" id="sheet_qty_<?= $product->SerialNumber ?>" placeholder="<?= $min_qty ?>+" value="<?= $productQuantity; ?>" name="qty">
                                                                            <?php echo $sampleQuantityShow;?>
                                                                        </label>

                                                                        <?php
                                                                    } else if (preg_match("/A4 Labels/i", $details['ProductBrand']) && $product->Printing == "Y") {
                                                                        $designs = ($product->Print_Qty > 1) ? 'Designs' : ' Design';
                                                                        echo $details['LabelsPerSheet'] * $productQuantity . " Labels" . "<br>(" . $productQuantity . " Sheets) <br>";
                                                                        if ($product->Print_Qty > 0) {
                                                                            echo $product->Print_Qty . ' ' . $designs;
                                                                        }
                                                                        ?>
                                                                        <label class="input">
                                                                            <input class="allownumeric" style="display:none; <?php echo $enableDisableField;?>" type="text" onkeyup="update_show('<?= $product->SerialNumber ?>','<?= $productQuantity ?>');" id="sheet_qty_<?= $product->SerialNumber ?>" placeholder="<?= $min_qty ?>+" value="<?= $productQuantity; ?>" name="qty">
                                                                            <?php echo $sampleQuantityShow;?>
                                                                        </label>
                                                                        <?php
                                                                    } else if (preg_match("/A5 Labels/i", $details['ProductBrand']) && $product->Printing == "Y") {
                                                                        $designs = ($product->Print_Qty > 1) ? 'Designs' : ' Design';
                                                                        echo $details['LabelsPerSheet'] * $productQuantity . " Labels" . "<br>(" . $productQuantity . " Sheets) <br>";
                                                                        if ($product->Print_Qty > 0) {
                                                                            echo $product->Print_Qty . ' ' . $designs;
                                                                        }
                                                                        ?>
                                                                        <label class="input">
                                                                            <input class="allownumeric" style="display:none; <?php echo $enableDisableField;?>" type="text" onkeyup="update_show('<?= $product->SerialNumber ?>','<?= $productQuantity ?>');" id="sheet_qty_<?= $product->SerialNumber ?>" placeholder="<?= $min_qty ?>+" value="<?= $productQuantity; ?>" name="qty">
                                                                            <?php echo $sampleQuantityShow;?>
                                                                        </label>
                                                                        <?php
                                                                    } else if (preg_match("/A3 Label/i", $details['ProductBrand']) && $product->Printing == "Y") {
                                                                        $designs = ($product->Print_Qty > 1) ? 'Designs' : ' Design';
                                                                        echo $details['LabelsPerSheet'] * $productQuantity . " Labels" . "<br>(" . $productQuantity . " Sheets) <br>";
                                                                        if ($product->Print_Qty > 0) {
                                                                            echo $product->Print_Qty . ' ' . $designs;
                                                                        }
                                                                        ?>
                                                                        <label class="input">
                                                                            <input class="allownumeric" style="display:none; <?php echo $enableDisableField;?>" type="text" onkeyup="update_show('<?= $product->SerialNumber ?>','<?= $productQuantity ?>');" id="sheet_qty_<?= $product->SerialNumber ?>" placeholder="<?= $min_qty ?>+" value="<?= $productQuantity; ?>" name="qty">
                                                                            <?php echo $sampleQuantityShow;?>
                                                                        </label>
                                                                        <?php
                                                                    } else if (preg_match("/Integrated Labels/i", $details['ProductBrand']) && $product->Printing == "Y") {
                                                                        $designs = ($product->Print_Qty > 1) ? 'Designs' : ' Design';
                                                                        echo $details['LabelsPerSheet'] * $productQuantity . " Labels" . "<br>(" . $productQuantity . " Sheets) <br>";
                                                                        if ($product->Print_Qty > 0) {
                                                                            echo $product->Print_Qty . ' ' . $designs;
                                                                        }
                                                                        ?>
                                                                        <label class="input">
                                                                            <input class="allownumeric" style="display:none; <?php echo $enableDisableField;?>" type="text" onkeyup="update_show('<?= $product->SerialNumber ?>','<?= $productQuantity ?>');" id="sheet_qty_<?= $product->SerialNumber ?>" placeholder="<?= $min_qty ?>+" value="<?= $productQuantity; ?>" name="qty">
                                                                            <?php echo $sampleQuantityShow;?>
                                                                        </label>
                                                                        <?php
                                                                    } else if (substr($details['ManufactureID'], -2, 2) == 'XS') { ?>
                                                                        <label class="select">
                                                                            <select onchange="update_show('<?= $product->SerialNumber ?>','<?= $productQuantity ?>');" id="sheet_qty_<?= $product->SerialNumber ?>" class="" name="width">
                                                                                <option <?= ($productQuantity == 5) ? 'selected="selected"' : '' ?>
                                                                                        value="5">5
                                                                                </option>
                                                                                <option <?= ($productQuantity == 10) ? 'selected="selected"' : '' ?>
                                                                                        value="10">10
                                                                                </option>
                                                                                <option <?= ($productQuantity == 15) ? 'selected="selected"' : '' ?>
                                                                                        value="15">15
                                                                                </option>
                                                                                <option <?= ($productQuantity == 20) ? 'selected="selected"' : '' ?>
                                                                                        value="20">20
                                                                                </option>
                                                                                <option <?= ($productQuantity == 25) ? 'selected="selected"' : '' ?>
                                                                                        value="25">25
                                                                                </option>
                                                                                <option <?= ($productQuantity == 50) ? 'selected="selected"' : '' ?>
                                                                                        value="50">50
                                                                                </option>
                                                                                <option <?= ($productQuantity == 75) ? 'selected="selected"' : '' ?>
                                                                                        value="75">75
                                                                                </option>
                                                                                <option <?= ($productQuantity == 100) ? 'selected="selected"' : '' ?>
                                                                                        value="100">100
                                                                                </option>
                                                                            </select>
                                                                            <i></i> </label>
                                                                    <? } else if ($product->source == "LBA" and $product->ProductID == 0) {
                                                                        echo "1 Design";
                                                                    } else {
                                                                        ?>
                                                                        <label class="input">
                                                                            <input class="allownumeric" style="width:100px; <?php echo $enableDisableField;?>" type="text" onkeyup="update_show('<?= $product->SerialNumber ?>','<?= $productQuantity ?>');" id="sheet_qty_<?= $product->SerialNumber ?>" placeholder="25+" value="<?= $productQuantity; ?>" name="qty">
                                                                            <?php echo $sampleQuantityShow;?>
                                                                        </label>
                                                                    <? }

                                                                    ?>
                                                                </div>
                                                                <a href="javascript:void(0);"
                                                                   onclick="calculate_sheet_price('<?= $product->SerialNumber ?>','<?= $details['ManufactureID'] ?>','<?= $printing ?>');"
                                                                   id="update_btn<?= $product->SerialNumber ?>"
                                                                   style="display:none;" class="clear_b"> <i
                                                                            class="fa fa-refresh"></i> Update </a></td>
                                                            <td style="text-align:center;"><p
                                                                        id="price_<?= $product->SerialNumber ?>">
                                                                    <strong>
                                                                        <? //new code
                                                                        if ($product->Printing == 'Y') {
                                                                            $price = number_format(($product->Price + $product->Print_Total), 2, '.', '');
                                                                            echo $symbol . $price;
                                                                        } else {
                                                                            echo $symbol . $product->Price;
                                                                        }
                                                                        ?>
                                                                    </strong></p>
                                                                <? if ($product->Printing == 'Y' && $product->source != 'flash' && $product->regmark != "Y") { ?>
                                                                    <!--<div style="font-size:13px"> <a class="artwork_uploader" <? if ($priceFrom) { ?> data-placement="left" title="<?= $priceFrom ?>" <? } ?> href="javascript:void(0);" data-target=".artworkModal1" data-toggle="modal" data-productid="<?= $product->SerialNumber ?>" data-actual_productid="<?= $product->ProductID ?>" data-manufactureid="<?= $product->ManufactureID ?>" data-product_type="<?= strtolower($product_type) ?>" data-labelsacross="" data-labelsize=""> Edit and place order </a> </div>-->
                                                                    <div class="m-t-10">
                                                                        <a class="btn btn-xs orangeBg redorderBtn artwork_uploader"
                                                                           href="javascript:void(0);"
                                                                           data-productid="<?= $product->SerialNumber ?>"
                                                                           data-actual_productid="<?= $product->ProductID ?>"
                                                                           data-target=".artworkModal1"
                                                                           data-toggle="modal"
                                                                           data-manufactureid="<?= $product->ManufactureID ?>"
                                                                           data-product_type="<?= strtolower($product_type) ?>"
                                                                           data-labelsacross="" data-labelsize="">
                                                                            Re-Order </a>
                                                                        <!--<a class="btn btn-xs orangeBg redorderBtn printed_reorder_button artwork_uploader" href="javascript:void(0);" data-productid="<?= $product->SerialNumber ?>" data-actual_productid="<?= $product->ProductID ?>" data-manufactureid="<?= $product->ManufactureID ?>" data-product_type="<?= strtolower($product_type) ?>" data-labelsacross="" data-labelsize=""> Re-Order </a>-->
                                                                    </div>
                                                                <? } else if ($product->Printing == 'Y' && $product->source == 'flash') { ?>
                                                                    <div>
                                                                        <a class="btn btn-xs orangeBg redorderBtn" <? if ($priceFrom) { ?> data-toggle="tooltip" data-placement="left" title="<?= $priceFrom ?>" <? } ?>
                                                                           href="javascript:void(0);"
                                                                           onclick="add_integrated_line('<?= $product->SerialNumber ?>','<?= $details['ManufactureID'] ?>');">
                                                                            Re-Order </a></div>
                                                                <? } else if ($product->source == "LBA" and $product->ProductID == 0) {

                                                                } else { ?>
                                                                    <div class="m-t-10">

                                                                        <?php
                                                                        if($rec->PaymentMethods == 'Sample Order')
                                                                        {?>
                                                                            <a class="btn btn-xs orangeBg redorderBtn" href="javascript:void(0);" onclick="sampleToCart('<?= $product->SerialNumber?>');">
                                                                                Re-Order </a></div>
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {?>
                                                                                <a class="btn btn-xs orangeBg redorderBtn" <? if ( ($priceFrom) && ($sampleStatus == 0) ) { ?> data-toggle="tooltip" data-placement="left" title="<?= $priceFrom ?>" <? } ?> href="javascript:void(0);"  onclick="add_item('<?= $product->SerialNumber ?>','<?= $details['ManufactureID'] ?>');">
                                                                                Re-Order </a></div>
                                                                        <?php
                                                                        }
                                                                        
                                                                 } ?></td>
                                                            <td>
                                                                <?php if ($product->source == "LBA" and $product->ProductID == 0): ?>

                                                                <?php else: ?>
                                                                    <div id="save_text<?= $product->SerialNumber ?>">
                                                                        <?= $productQuantity ?>
                                                                        <?= $product_type ?>
                                                                        /
                                                                        <?= $total_labels ?>
                                                                        Labels
                                                                        <?= $symbol . $product->Price; ?>
                                                                        (cost per label
                                                                        <?= $symbol . $cost_per ?>
                                                                        )
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    <? }
                                } else { ?>
                                    <div class="col-md-12 bg-info p-t-b-12">
                                        <h4 style="text-align:center;">No order found in your account</h4>
                                    </div>
                                <? } ?>
                                <div class=" col-md-12 text-center">
                                    <nav>
                                        <ul class="pagination ">
                                            <?= $links ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade layout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span
                            aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">Sorry this product is discontinued. <a href="#myModalLabel"
                                                                                                 class="anchorjs-link"><span
                                class="anchorjs-icon"></span></a></h4>
            </div>
            <div class="col-md-12">
                <p></p>
                <p>We have discontinued this product due to supply issues. We are sure we will have an alternative
                    product that could be suitable for your application. </p>
                <p>Please call our customer care team on 01733 588390 or choose from over 40 different materials. <a
                            id="alter_link" href="#">Click Here</a></p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade artworkModal1 aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content no-padding">
            <div class="panel no-margin">
                <div class="panel-heading">
                    <h3 class="pull-left no-margin"><b>Artwork</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times-circle"></i></button>
                    <div class="clear"></div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div id="artworks_uploads_loader" class="white-screen hidden-xs" style="display:none;">
                            <div class="loading-gif text-center" style="top:26%;left:29%;"><img
                                        onerror='imgError(this);' src="<?= Assets ?>images/loader.gif" class="image"
                                        style="width:139px; height:29px; "></div>
                        </div>
                        <div class="pull-right">
                            <div id="total_price" style=""></div>
                        </div>
                        <input type="hidden" value="" id="productSerial"/>
                        <input type="hidden" value="" id="productType"/>
                        <input type="hidden" value="" id="openTrigger"/>
                        <div id="ajax_artwork_uploads" class=""></div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right"><a href="javascript:void(0);" class="btn orange add_item_reorder"
                                                   data-productserial="" data-manufactureid="" style="display:none;">Confirm
                                & Add to Basket <i class="fa fa-arrow-circle-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Softproof" tabindex="-1" role="dialog" aria-labelledby="SoftproofLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title text-uppercase" id="SoftproofLabel">Print Job Number: <strong id="jobID">Softproof</strong>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 m-b-10">
                        <img onerror='imgError(this);' src="" id="softproof_popup_image" class="img-responsive"
                             style="margin 0 auto;"/>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3 col-md-offset-3">
                            <a href="#" data-role="button" class="btn orangeBg btn-block" id="download_softproof_btn"
                               download>Download</a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" data-role="button" class="btn blueBg btn-block" data-dismiss="modal">Close</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


    


    $(document).on("click", ".add_item_reorder", function () {
        var productserial = $(this).attr('data-productserial');
        var manufactureid = $(this).attr('data-manufactureid');
        //console.log('productserial: '+productserial);
        //console.log('manufactureid: '+manufactureid);
        add_item_reorder_artworks(productserial, manufactureid);
    });

    $(document).on("click", ".softproof_modal", function () {
        var imgpath = $(this).attr('data-src');
        var jobid = $(this).attr('data-jobid');
        $("#softproof_popup_image").attr('src', imgpath);
        $("#download_softproof_btn").attr('href', imgpath);
        $("#jobID").text(jobid);
        $("#softproof_popup_image").aaZoom();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    function update_show(id, val) {

        var qty = $('#sheet_qty_' + id).val();
        if (qty != val) {
            $("#update_btn" + id).show();
        } else {
            $("#update_btn" + id).hide();
        }


    }

    function calculate_sheet_price(id, menuid, line_type) {
        var qty = $('#sheet_qty_' + id).val();
        var labels = $('#labels_p_sheet' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());
        var print_type = $('#print_type' + id).val();

        var prd_id = $('#prd_id' + id).val();
        var type = $('#product_type' + id).val();
        var batch = $('#min_qty' + id).val();
        var regmark = $('#regmark' + id).val();

        if (qty < min_qty || qty > max_qty) {
            alert_box('Please enter quantity from ' + min_qty + ' to ' + max_qty);
            $('#sheet_qty_' + id).focus();
            return false;
        } else if (type == 'Rolls' && qty % min_qty != 0) {
            if (qty % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                //console.log(multipyer+' max '+max_qty);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#sheet_qty_' + id).val(multipyer);
            }

            alert_box("Sorry, these labels are only available in sets of " + min_qty + " rolls. ");
            $('#sheet_qty_' + id).focus();
            return false;

        } else if (type == 'Integrated' && qty % min_qty != 0) {
            if (qty % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(qty / min_qty) + 1);

                console.log(multipyer + ' max ' + max_qty);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#sheet_qty_' + id).val(multipyer);

            }

            alert_box("Sorry, these labels are only available in sets of " + min_qty + " sheets pack. ");
            $('#sheet_qty_' + id).focus();
            return false;

        } else {


            $.ajax({
                url: base + 'ajax/calculate_user_price',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {
                    qty: qty,
                    menuid: menuid,
                    prd_id: prd_id,
                    labels: labels,
                    type: type,
                    print_type: print_type,
                    line_type: line_type,
                    batch: batch,
                    regmark: regmark
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            $('#update_btn' + id).hide();
                            var text = qty + ' ' + type + ' / ' + data.total_labels + ' Labels ' + data.symbol + data.price + ' (cost per label ' + data.symbol + data.labelprice + ' )';
                            $('#save_text' + id).html(text);
                            $('#price_' + id).html('<strong> ' + data.symbol + data.price + ' ' + data.vatoption + '.Vat</strong>');

                        } else if (data.deactive == 'yes') {
                            $('#alter_link').attr('href', data.url);
                            $('.layout').modal('show');

                        }

                    }
                }
            });
        }
    }


    function add_integrated_line(serial, menuid) {
        $.ajax({
            url: base + 'ajax/add_integrated_line',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {serial: serial},
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    if (data.response == 'yes') {
                        add_item(serial, menuid);
                    }
                }
            }
        });
    }


    // SAMPLE MATERIAL ADD TO CART STARTS
    function sampleToCart(id)
    {
        var p_code = $('#prd_id'+id).val();
        var menuid = $('#manufactureID'+id).val();
        var material_code = $('#materialCode'+id).val();


        if (menuid) {
            //change_btn_state(_this,'disable','sample');
            $.ajax({
                url: base + 'ajax/add_sample_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {qty: 1, menuid: menuid, prd_id: p_code, material_code:material_code},
                success: function (data) {
                    if (!data == '') {
                        //change_btn_state(_this,'enable','sample');
                        // $(".requestsample").modal('hide');
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            var sample_txt = "Thank you for requesting a sample which has been added to your basket and upon checkout a free-of-charge A4 sheet of the material chosen will be sent to you. \n\n Please note: This is a material and adhesive sample only and will no not therefore match the label shape and size on this page.";
                            popup_messages(sample_txt);
                            $('#cart').html(data.top_cart);
                            // ecommerce_add_to_cart(_this, 'sample');
                        } else if (data.response == 'failed') {
                            if (data.msg == 'you have reached the maximum sample order limit!') {
                                swal("Maximum limit exceeded", data.msg, "error");
                            } else {
                                swal("Duplicate Sample Sheet", data.msg, "error");
                            }
                        }
                    }
                }
            });
        }
    }
    // SAMPLE MATERIAL ADD TO CART ENDS

    function add_item(id, menuid) {

        var qty = $('#sheet_qty_' + id).val();
        var labels = $('#labels_p_sheet' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());
        var prd_id = $('#prd_id' + id).val();
        var type = $('#product_type' + id).val();
        var prd_name = $('#prd_name' + id).text();
        var print_type = $('#print_type' + id).val();

        var labeltype = $('#labeltype' + id).val();
        var source = $('#source' + id).val();
        var colorcode = $('#colorcode' + id).val();
        var batch = min_qty;
        var regmark = $('#regmark' + id).val();

        var sample_order_status = $('#sample_order_status' + id).val();
        
        
        if (regmark == "Y") {
            regmark = "yes";
        } else {
            regmark = "no";
        }

        if ( (qty < min_qty || qty > max_qty) && (sample_order_status == 0) ) {
            alert_box('Please enter quantity from ' + min_qty + ' to ' + max_qty);
            $('#sheet_qty_' + id).focus();
            return false;
        } else if ((type == 'Rolls' && qty % min_qty != 0) && (sample_order_status == 0)) {
            if (qty % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#sheet_qty_' + id).val(multipyer);
            }


            alert_box("Sorry, these labels are only available in sets of " + min_qty + " rolls. ");
            $('#sheet_qty_' + id).focus();
            return false;

        } else if ((type == 'Integrated' && qty % min_qty != 0) && (sample_order_status == 0)) {
            if (qty % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(qty / min_qty) + 1);

                console.log(multipyer + ' max ' + max_qty);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#sheet_qty_' + id).val(multipyer);

            }

            alert_box("Sorry, these labels are only available in sets of " + min_qty + " sheets pack. ");
            $('#sheet_qty_' + id).focus();
            return false;

        }
        else
        {

            $.ajax({
                url: base + 'ajax/add_to_cart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {
                    qty: qty,
                    menuid: menuid,
                    prd_id: prd_id,
                    labels: labels,
                    type: type,
                    print_type: print_type,
                    colour: colorcode,
                    labeltype: labeltype,
                    source: source,
                    batch: batch,
                    regmark: regmark
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            popup_messages(menuid + ' - ' + prd_name);
                            $('#cart').html(data.top_cart);
                        } else if (data.deactive == 'yes') {
                            $('#alter_link').attr('href', data.url);
                            $('.layout').modal('show');
                        }
                    }
                }
            });
        }
    }

    function add_item_reorder(id, menuid) {
        var qty = $('#Quantity_' + id).val();
        var min_qty = parseInt($('#min_qty' + id).val());
        var max_qty = parseInt($('#max_qty' + id).val());
        var orderNum = $('#orderNum_' + id).val();
        var type = $('#product_type' + id).val();
        var prd_name = $('#prd_name' + id).text();
        var newcartid = $('#cart_id_' + id).val();
        //if(qty < min_qty || qty > max_qty){
        if (type != "Rolls" && (qty < min_qty || qty > max_qty)) {
            alert_box('Please enter quantity from ' + min_qty + ' to ' + max_qty);
            $('#sheet_qty_' + id).focus();
            return false;
        } else if (type == 'Rolls' && qty % min_qty != 0) {
            if (qty % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(qty / min_qty) + 1);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#sheet_qty_' + id).val(multipyer);
            }

            alert_box("Sorry, these labels are only available in sets of " + min_qty + " rolls. ");
            $('#sheet_qty_' + id).focus();
            return false;

        } else if (type == 'Integrated' && qty % min_qty != 0) {
            if (qty % min_qty != 0) {
                var multipyer = min_qty * parseInt(parseInt(qty / min_qty) + 1);

                console.log(multipyer + ' max ' + max_qty);
                if (multipyer > max_qty) {
                    multipyer = max_qty;
                }
                $('#sheet_qty_' + id).val(multipyer);

            }

            alert_box("Sorry, these labels are only available in sets of " + min_qty + " sheets pack. ");
            $('#sheet_qty_' + id).focus();
            return false;

        } else {
            $("#aa_loader").show();
            $("#artworks_uploads_loader").show();
            $.ajax({
                url: base + 'ajax/add_to_cart_reorder',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {
                    serial: id,
                    menuid: menuid,
                    orderNum: orderNum,
                    newcartid: newcartid,
                },
                success: function (data) {
                    if (!data == '') {
                        //console.log(data);
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            $(".artworkModal1").modal('hide');
                            $("#cart_id_" + id).val('');
                            $("#aa_loader").hide();
                            $("#artworks_uploads_loader").hide();
                            popup_messages(menuid + ' - ' + prd_name);
                            $('#cart').html(data.top_cart);
                        } else if (data.deactive == 'yes') {
                            $('#alter_link').attr('href', data.url);
                            $('.layout').modal('show');
                        }
                    }
                }
            });
        }
    }

    $(document).ready(function () {

        $("#filter_orders").val('<?=$filter?>');
        $("#sort_orders").val('<?=$sort?>');

        var filter = $("#filter_orders").val();
        var sort_orders = $("#sort_orders").val();

        if (filter != '' || sort_orders != '') {
            if (filter != '' && sort_orders == '') {
                var filter_url = "/?filter=" + filter;
            }

            if (filter != '' && sort_orders != '') {
                var filter_url = "/?filter=" + filter + "&sort=" + sort_orders;
            }
            if (filter == '' && sort_orders != '') {
                var filter_url = "/?sort=" + sort_orders;
            }

            $("ul.pagination li a").each(function (index, element) {
                $(this).attr("href", $(this).attr("href") + filter_url);
            });
        }
        var form = $("#signup_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                password: "required",
                cpassword: {
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    onkeyup: false,
                    remote: base + "ajax/is_email_exist"
                },
                captcha: {
                    required: true,
                    onkeyup: false,
                    remote: base + "ajax/is_valid_captcha"
                }
            },
            messages: {
                email: {
                    remote: $.validator.format("{0} is already taken.")
                },
                captcha: {
                    remote: "please enter valid captcha!"
                }

            }
        });
    });

    function filter_orders() {
        var filter = $("#filter_orders").val();
        var qstr = '';
        if (filter != '') {
            var qstr = "?filter=" + filter;
        }
        $("#aa_loader").show();
        var url = '<?=AURL . $this->router->fetch_class() . "/" . $this->router->fetch_method();?>' + qstr;
        //console.log(url);
        window.location.href = url;
    }

    function sort_orders() {
        $("#aa_loader").show();
        var filter = $("#filter_orders").val();
        var sort_orders = $("#sort_orders").val();
        var qstr = '';
        if (sort_orders != '') {
            if (filter != '') {
                var qstr = "?filter=" + filter + "&sort=" + sort_orders;
            } else {
                var qstr = "?sort=" + sort_orders;
            }
        }
        var url = '<?=AURL . $this->router->fetch_class() . "/" . $this->router->fetch_method();?>' + qstr;
        window.location.href = url;
    }

    /*****************************************/
    var parent_selector = null;
    $(document).on("click", ".artwork_uploader", function (e) {
        $('.add_item_reorder').hide();
        $("#aa_loader").show();
        $("#openTrigger").val("artwork_uploader");
        //$('#total_price').hide();
        var product_id = $(this).data('productid');
        var cart_id = $('#cart_id_' + product_id).val();
        var print_type = $('#print_type' + product_id).val();
        var manufactureid = $(this).data('manufactureid');
        var labels = $('#labels_p_sheet' + product_id).val();
        var product_type = $(this).data('product_type');

        if (product_type == "rolls") {
            var unitqty = 'Labels' //Sheets Labels
        } else {
            var unitqty = 'Sheets' //Sheets Labels
        }

        var qty = $('#Quantity_' + product_id).val();
        if (qty == '' || qty == 0) {
            var qty = $('#Quantity_new_' + product_id).val();
        }

        var actual_productid = $(this).data('actual_productid');
        var _this = this;
        parent_selector = this;

        $('#ajax_artwork_uploads').html('');
        $('#artworks_uploads_loader').show();
        $.ajax({
            url: base + 'ajax/view_artworks_content',
            type: "POST",
            async: "false",
            data: {
                manfactureid: manufactureid,
                product_id: product_id,
                type: product_type,
                labelspersheet: labels,
                cart_id: cart_id,
                unitqty: unitqty,
                page: 'reorder',
                actual_productid: actual_productid,
                print_type: print_type,
                qty: qty,
            },
            dataType: "html",
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    if (data.total_price != null && data.total_price != '') {
                        total_price = $.parseJSON(data.total_price);
                        $("#total_price").html(total_price.price);
                    }
                    $('#artworks_uploads_loader').hide();
                    $('#ajax_artwork_uploads').html(data.html);
                    $("#aa_loader").hide();
                    $("#productSerial").val(product_id);
                    $("#productType").val(product_type);

                    $('.add_item_reorder').attr('data-productserial', product_id).attr('data-manufactureid', manufactureid);
                    if (cart_id.length == 0 || cart_id == '') {
                        $('#cart_id_' + product_id).val(data.cartid);
                    }

                    $('.add_item_reorder').show();
                    if (product_type == "rolls") {
                        var presproof = $("#uploadedartworks_" + product_id).attr('data-presproof');
                        if (presproof == 0) {
                            $("#pressproof").prop('checked', false);
                        } else {
                            $("#pressproof").prop('checked', true);
                        }
                        $("#Quantity_new_" + product_id).val($("#final_uploaded_labels").val());
                        update_price_new_rolls();
                    } else {
                        update_price_new_sheets();
                    }
                    intialize_progressbar();

                    var openTrigger = $("#openTrigger").val();
                    if (openTrigger == "printed_reorder") {
                        $("#aa_loader").show();
                        $(".add_item_reorder").trigger("click");
                        $("#aa_loader").hide();
                    }
                }
            }
        });
    });
    var old_labels_input;
    var old_roll_labels_input;
    var old_roll_input;
    $(document).on("focus", ".roll_labels_input", function (e) {
        old_roll_labels_input = $(this).val();
    });
    $(document).on("focus", ".input_rolls", function (e) {
        old_roll_input = $(this).val();
    });

    $(document).on("keypress keyup blur", ".labels_input", function (e) {
        if ($(this).val() != old_labels_input) {
            $(this).parents('.upload_row').find('.sheet_updater').show();
        }
    });
    $(document).on("keypress keyup blur", ".roll_labels_input", function (e) {
        var rolls = $(this).parents('.upload_row').find('.input_rolls').val();
        if ($(this).val() != old_roll_labels_input && rolls.length > 0) {
            $(this).parents('.upload_row').find('.roll_updater').show();
            $(this).parents('.upload_row').find('.quantity_updater').show();
        }
    });
    $(document).on("keypress keyup blur", ".input_rolls", function (e) {
        var labels = $(this).parents('.upload_row').find('.roll_labels_input').val();
        if ($(this).val() != old_roll_input && labels.length > 0) {
            $(this).parents('.upload_row').find('.roll_updater').show();
            $(this).parents('.upload_row').find('.quantity_updater').show();
        }
    });

    $(document).on("click", ".add_another_art", function (e) {
        $('.upload_row').show();
        $(this).hide();
        $('#add_another_line').hide();
    });
    $(document).on("click", ".delete_artwork_file", function (event) {
        var id = $(this).attr('id');
        var cartid = $('#cartid').val();
        var productid = $('#cartproductid').val();
        var persheet = $('#labels_p_sheet').val();
        var type = $("#productType").val();
        var gap = '';
        var size = '';
        var productSerial = $("#productSerial").val();
        if (type == "rolls") {
            size = $("#diesize_" + productSerial).val();
            gap = $("#gap_" + productSerial).val();
        }
        var presproof = $('#uploadedartworks_' + productSerial).attr('data-presproof');
        swal({
                title: "Are you sure you want to delete this line",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn orangeBg",
                confirmButtonText: "Yes",
                cancelButtonClass: "btn blueBg m-r-10",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $("#artworks_uploads_loader").show();
                    $.ajax({
                        url: base + 'ajax/delete_material_artworks',
                        type: "POST",
                        async: "false",
                        dataType: "html",
                        data: {
                            fileid: id,
                            cartid: cartid,
                            productid: productid,
                            persheet: persheet,
                            type: type,
                            gap: gap,
                            size: size,
                            presproof: presproof,
                        },
                        success: function (data) {
                            data = $.parseJSON(data);
                            if (!data == '') {
                                update_printed_quantity_box(data.qty, data.designs, data.rolls);
                                $('#ajax_upload_content').html(data.content);

                                intialize_progressbar();
                                if (type == "rolls") {
                                    update_price_new_rolls();
                                } else {
                                    update_price_new_sheets();
                                }
                                $("#artworks_uploads_loader").hide();
                            }
                        }
                    });
                }
            })
    });

    $(document).on("click", ".save_artwork_file", function (e) {
        var _this = this;
        var product_serial = $('#productSerial').val();
        var productType = $('#productType').val();
        var cartid = $('#cartid').val();
        var prdid = $('#cartproductid').val();
        var labelpersheets = $('#labels_p_sheet').val();
        if (productType == 'rolls') {
            var type = 'rolls';
            var size = $("diesize_" + product_serial).val();
            var gap = $("gap_" + product_serial).val();
            var artworkname = $(_this).parents('.upload_row').find('.artwork_name').val();
            var file = $(_this).parents('.upload_row').find('.artwork_file').val();
            var uploadfile = $(_this).parents('.upload_row').find('.artwork_file')[0].files[0];
            var product_id = $(parent_selector).parents('.productdetails').find('.product_id').val();
            var presproof = $(parent_selector).parents('.productdetails').find('#uploadedartworks_' + product_id).attr('data-presproof');

            var response = '';
            response = verify_labels_or_rolls_qty(_this);
            if (response == false) {
                return false;
            }
            var labels = $(_this).parents('.upload_row').find('.roll_labels_input').val();
            var sheets = $(_this).parents('.upload_row').find('.input_rolls').val();
            var lb_txt = 'labels';

            if (file.length == 0) {
                alert_box("Please upload a file before saving. ");
            } else if (labels == 0 || labels == '') {
                alert_box("Please complete line ");
            } else if (artworkname.length == 0) {
                alert_box("please enter artwork name! ");
            } else {
                var uploadfile = $(this).parents('.upload_row').find('.artwork_file')[0].files[0];
                var form_data = new FormData();
                form_data.append("file", uploadfile)
                form_data.append("cartid", cartid);
                form_data.append("productid", prdid);
                form_data.append("labels", labels);
                form_data.append("sheets", sheets);
                form_data.append("artworkname", artworkname);
                form_data.append("persheet", labelpersheets);
                form_data.append("type", type);
                form_data.append("size", size);
                form_data.append("gap", gap);
                form_data.append("presproof", presproof);
                type = uploadfile.type;

                if (type != 'image/png' && type != 'image/jpg' && type != 'image/gif' && type != 'image/jpeg' && type != 'application/pdf' && type != 'application/postscript') {
                    swal("Not Allowed", "We apologise, because this file type cannot be uploaded. \n\n Please retry using one of the following file formats: EPS; GIF; JPEG; JPG; PDF & PNG", "warning");
                    return false;
                } else {
                    upload_printing_artworks(form_data);
                }
            }
        } else {
            var type = 'sheets';
            //var cartunitqty = $('#cartunitqty').val();
            var cartunitqty = 'Sheets';

            var artworkname = $(_this).parents('.upload_row').find('.artwork_name').val();
            var file = $(_this).parents('.upload_row').find('.artwork_file').val();
            var uploadfile = $(_this).parents('.upload_row').find('.artwork_file')[0].files[0];

            var response = '';

            if (cartunitqty == 'Labels') {
                var labels = $(_this).parents('.upload_row').find('.labels_input').val();
                if (labels.length == 0) {
                    var id = $(_this).parents('.upload_row').find('.labels_input');
                    var popover = $(_this).parents('.upload_row').find('.popover').length;
                    if (popover == 0) {
                        show_faded_popover(id, "Minimum " + labelpersheets + " labels are required ");
                    }
                    return false;
                }
                var sheets = parseInt(labels / labelpersheets);
                var lb_txt = 'labels';
            } else {
                var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
                if (sheets.length == 0) {
                    var id = $(_this).parents('.upload_row').find('.labels_input');
                    var popover = $(_this).parents('.upload_row').find('.popover').length;
                    if (popover == 0) {
                        show_faded_popover(id, "Minimum 1 sheet required ");
                    }
                    return false;
                }
                var labels = parseInt(sheets * labelpersheets);
                var lb_txt = 'sheets';
            }

            if (productType == "integrated") {
                var max_qty = parseInt($("#max_qty" + product_serial).val());
                var min_qty = parseInt($("#min_qty" + product_serial).val());
                var batch = min_qty;

                var box_inp = $(_this).parents('.upload_row').find('.labels_input');

                if (sheets == NaN || box_inp.val() == '') {
                    box_inp.val(batch);
                    show_faded_popover(box_inp, "Minimum " + batch + " sheets allowed");
                    return false;
                } else if (sheets < min_qty) {
                    show_faded_popover(box_inp, "Minimum " + batch + " sheets allowed");
                    box_inp.val(min_qty);
                    return false;
                } else if (sheets > max_qty) {
                    box_inp.val(max_qty);
                    show_faded_popover(box_inp, "Maximum " + max_qty + " sheets allowed");
                    return false;
                }

                if (sheets % batch != 0) {
                    if (batch == 250) {
                        sheets = Math.round(sheets / 250) * 250;
                        if (sheets == 0) {
                            sheets = batch;
                        }
                    } else {
                        sheets = Math.round(sheets / 1000) * 1000;
                        if (sheets == 0) {
                            sheets = batch;
                        }
                    }
                    $(box_inp).val(sheets);
                    show_faded_popover(box_inp, "Quantity has been round off to " + sheets);
                    labels = parseInt(sheets * labelpersheets);
                    return false;
                }
                $(".labels_input").trigger("blur");
            }

            if (file.length == 0) {
                alert_box("Please upload a file before saving. ");
            } else if (labels == 0 || labels == '') {
                alert_box("Please complete line ");
            } else if (artworkname.length == 0) {
                alert_box("please enter artwork name! ");
            } else {

                var uploadfile = $(this).parents('.upload_row').find('.artwork_file')[0].files[0];

                var form_data = new FormData();
                form_data.append("file", uploadfile)
                form_data.append("cartid", cartid);
                form_data.append("productid", prdid);
                form_data.append("labels", labels);
                form_data.append("sheets", sheets);
                form_data.append("artworkname", artworkname);
                form_data.append("persheet", labelpersheets);
                form_data.append("type", type);
                form_data.append("unitqty", cartunitqty);
                form_data.append("page", 'reorder');
                type = uploadfile.type;

                if (type != 'image/tiff' && type != 'image/png' && type != 'image/jpg' && type != 'image/gif' && type != 'image/jpeg' && type != 'application/pdf' && type != 'application/postscript') {
                    swal("Not Allowed", "We apologise, because this file type cannot be uploaded. \n\n Please retry using one of the following file formats: EPS; GIF; JPEG; JPG; PDF & PNG", "warning");
                    return false;
                } else {
                    upload_printing_artworks(form_data);
                }
            }
        }
    });

    function upload_printing_artworks(form_data) {
        $.ajax({
            url: base + 'ajax/upload_material_artworks',
            type: "POST",
            async: "false",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            beforeSend: function () {
                $("#upload_pecentage").html(' &nbsp;0%');
                $("#upload_progress").show();
                $('.save_artwork_file').prop('disabled', true);
            },
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', progress, false);
                }
                return myXhr;
            },
            error: function (data) {
                swal('Some error occured please try again');
                intialize_progressbar();
                $("#upload_progress").hide();
                $('.save_artwork_file').prop('disabled', false);
            },
            success: function (data) {
                $('.save_artwork_file').prop('disabled', false);
                data = $.parseJSON(data);
                if (data.response == 'yes') {
                    $('#ajax_upload_content').html(data.content);

                    update_printed_quantity_box(data.qty, data.designs);
                    intialize_progressbar();
                    $("#upload_progress").hide();
                } else {
                    swal('upload failed', data.message, 'error');
                    intialize_progressbar();
                    $("#upload_progress").hide();
                    $('.save_artwork_file').prop('disabled', false);
                }
                var prod_type = $("#productType").val();
                if (prod_type == "rolls") {
                    update_price_new_rolls();
                } else {
                    update_price_new_sheets();
                }
            }
        });
    }

    function update_printed_quantity_box(qty, designs, rolls) {
        var product_serial = $('#productSerial').val();
        $('#uploadedartworks_' + product_serial).val(designs);
        $('#uploadedartworks_' + product_serial).attr('data-qty', qty);
        $('#uploadedartworks_' + product_serial).attr('data-rolls', rolls);
        var old_quantity = parseInt($('#Quantity_new_' + product_serial).val());
        if (qty == null) {
            $('#Quantity_new_' + product_serial).val($('#Quantity_' + product_serial).val());
        }
        if (qty > 0) {
            $('#Quantity_new_' + product_serial).val(qty);
            reset_print_input_buttons(parent_selector);
        }
        //update_artwork_upload_btn(parent_selector, designs);
    }

    $(document).on("click", "#pressproof", function (e) {
        var product_serial = $("#productSerial").val();
        if ($(this).is(':checked')) {
            $('#uploadedartworks_' + product_serial).attr('data-presproof', 1);
        } else {
            $('#uploadedartworks_' + product_serial).attr('data-presproof', 0);
        }
        reset_print_input_buttons(parent_selector);
        update_price_new_rolls();
    });

    function intialize_progressbar() {
        $("#progressbar").progressbar({
            value: 0,
            create: function (event, ui) {
                $(this).removeClass("ui-corner-all").addClass('progress').find(">:first-child").removeClass("ui-corner-left").addClass('progress-bar progress-bar-success');
            }
        });
    }

    function progress(e) {
        if (e.lengthComputable) {
            var max = e.total;
            var current = e.loaded;
            var Percentage = Math.ceil((current * 100) / max);
            $("#progressbar").progressbar("option", "value", Percentage);
            $("#upload_pecentage").html(' &nbsp;' + Percentage + '%');

            if (Percentage >= 100) {
                $("#progressbar").progressbar("option", "value", 100);
                $("#upload_pecentage").html(' &nbsp;100%');
            }
        }
    }

    function total_upload_labels() {
        var total_labels = 0;
        var total_sheets = 0;

        var min_qty = $('#labels_p_sheet').val();
        var unitqty = $('#cartunitqty').val();

        $(".labels_input").each(function (index) {
            if ($(this).val() !== '') {
                if (unitqty == 'Labels') {
                    var labels = parseInt($(this).val());
                    var sheets = parseInt(labels / min_qty);
                    $(this).parents('.upload_row').find('.displaysheets').text(sheets);

                } else {
                    var sheets = parseInt($(this).val());
                    var labels = parseInt(sheets * min_qty);
                    $(this).parents('.upload_row').find('.displaysheets').text(labels);
                }
                total_labels += labels;
                total_sheets += sheets;
            }
        });

        if (total_sheets != 'NaN') {
            if (unitqty == 'Labels') {
                $('.total_user_labels').html(total_sheets);
                $('.total_user_sheet').html(total_labels);
            } else {
                $('.total_user_labels').html(total_labels);
                $('.total_user_sheet').html(total_sheets);
            }

            var labels = parseInt($('#acutal_labels').val());
            var acutal_qty = parseInt($('#acutal_qty').val());
            var labelspersheets = parseInt($('#labels_p_sheet').val());
            var reaming = parseInt(acutal_qty) - parseInt(total_sheets);
            if (reaming < 0) {
                $('.remaing_user_sheets').html('0');
                $('.remaing_user_labels').html('0');
            } else {
                if (unitqty == 'Labels') {
                    $('.remaing_user_sheets').html(reaming * labelspersheets);
                    $('.remaing_user_labels').html(reaming);
                } else {
                    $('.remaing_user_sheets').html(reaming);
                    $('.remaing_user_labels').html(reaming * labelspersheets);
                }
            }
            $('#upload_remaining_labels').val(reaming);
        }
    }

    function verify_labels_or_rolls_qty(id) {
        var product_serial = $("#productSerial").val();
        var prdid = $('#prd_id' + product_serial).val();
        var labelspersheets = $('#labels_p_sheet' + product_serial).val();
        var minlabels = parseInt($('#min_print_labels' + product_serial).val());
        var dieacross = min_rolls = parseInt($('#min_qty' + product_serial).val());
        var min_qty = parseInt(min_rolls * minlabels);
        var max_qty = parseInt($('#max_print_labels' + product_serial).val());


        var rolls = parseInt($(id).parents('.upload_row').find('.input_rolls').val());
        var total_labels = parseInt($(id).parents('.upload_row').find('.roll_labels_input').val());
        var perroll = parseFloat(total_labels / rolls);

        if (isFloat(perroll)) {
            perroll = Math.ceil(perroll);
        }

        var roll_text = 'roll';
        if (rolls > 1) {
            var roll_text = 'rolls';
        }

        if (!is_numeric(total_labels)) {
            var _this = $(id).parents('.upload_row').find('.roll_labels_input');
            show_faded_popover(_this, "Please enter number of labels.");
            $(id).parents('.upload_row').find('.roll_labels_input').val('');
            return false;
        } else if (total_labels == 0) {
            var _this = $(id).parents('.upload_row').find('.roll_labels_input');
            show_faded_popover(_this, "Minimum Label quantity is " + minlabels + " Labels per roll.");
            $(id).parents('.upload_row').find('.roll_labels_input').val('');
            return false;
        } else if (!is_numeric(rolls) || rolls == 0) {
            var _this = $(id).parents('.upload_row').find('.input_rolls');
            show_faded_popover(_this, "Minimum roll quantity is 1 roll.");
            $(id).parents('.upload_row').find('.input_rolls').val('');
            return false;
        } else if (perroll < minlabels) {
            var roll_input_display = $(id).parents('.upload_row').find('.input_rolls').css('display');
            if (roll_input_display == 'block') {
                var requiredlabels = minlabels * rolls
                var _this = $(id).parents('.upload_row').find('.roll_labels_input');
                show_faded_popover(_this, "Quantity has been amended for production as " + requiredlabels + " Labels.");

                $(id).parents('.upload_row').find('.show_labels_per_roll').text(minlabels);
                $(id).parents('.upload_row').find('.roll_labels_input').val(requiredlabels);
                return false;
            } else {
                if (total_labels > labelspersheets) {
                    var expectedrolls = parseFloat(total_labels / labelspersheets);
                    if (isFloat(expectedrolls)) {
                        expectedrolls = Math.ceil(expectedrolls);
                    }
                    labelspersheets = parseInt(total_labels / expectedrolls);

                    var _this = $(id).parents('.upload_row').find('.input_rolls');
                    show_faded_popover(_this, "Quantity has been amended for production as " + expectedrolls + " Rolls.");
                    $(id).parents('.upload_row').find('.show_labels_per_roll').text(labelspersheets);
                    $(id).parents('.upload_row').find('.input_rolls').val(expectedrolls);
                    $(id).parents('.upload_row').find('.quantity_labels').text(expectedrolls);
                    return false;
                } else {
                    if (total_labels < minlabels) {
                        total_labels = minlabels;
                        var _this = $(id).parents('.upload_row').find('.roll_labels_input');
                        show_faded_popover(_this, "Quantity has been amended for production as " + total_labels + " Labels.");
                    } else {
                        var _this = $(id).parents('.upload_row').find('.roll_labels_input');
                        show_faded_popover(_this, "Quantity has been amended for production as 1 Roll.");
                    }
                    $(id).parents('.upload_row').find('.show_labels_per_roll').text(total_labels);
                    $(id).parents('.upload_row').find('.quantity_labels').text(1);
                    $(id).parents('.upload_row').find('.input_rolls').val(1);
                    $(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
                    return false;
                }
            }
        } else if (perroll > labelspersheets) {
            var response = rolls_calculation(min_rolls, labelspersheets, total_labels, 0);
            var total_labels = response['total_labels'];
            var expectedrolls = response['rolls'];
            var labelspersheets = parseInt(total_labels / expectedrolls);

            var infotxt = 'Quantity has been amended for production as ' + expectedrolls + ' rolls and ' + total_labels + ' labels';
            show_faded_popover($(id).parents('.upload_row').find('.roll_labels_input'), infotxt);
            $(id).parents('.upload_row').find('.show_labels_per_roll').text(labelspersheets);
            $(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
            $(id).parents('.upload_row').find('.input_rolls').val(expectedrolls);
            $(id).parents('.upload_row').find('.quantity_labels').text(expectedrolls);
            return false;
        } else {
            var total_labels = parseInt(perroll) * parseInt(rolls);
            $(id).parents('.upload_row').find('.show_labels_per_roll').text(perroll);
            $(id).parents('.upload_row').find('.roll_labels_input').val(total_labels);
        }
        $(id).parents('.upload_row').find('.quantity_updater').hide();
    }

    function rolls_calculation(die_across, max_labels, total_labels, rolls) {
        if (rolls == 0) {
            rolls = parseInt(die_across);
        } else {
            rolls = parseInt(rolls) + parseInt(die_across);
        }
        var per_roll = parseFloat(parseInt(total_labels) / rolls);
        if (per_roll > parseInt(max_labels)) {
            response = rolls_calculation(die_across, max_labels, total_labels, rolls);
            per_roll = response['per_roll'];
            rolls = response['rolls'];
        }
        var data = {per_roll: Math.ceil(per_roll), total_labels: Math.ceil(per_roll) * rolls, rolls: rolls};
        return data;
    }

    $(document).on("click", ".quantity_updater", function (e) {
        verify_labels_or_rolls_qty(this);
        $(this).parents('.upload_row').find('.quantity_updater').hide();
    });

    $(document).on("click", ".quantity_editor", function (e) {
        $(this).hide();
        $(this).parents('.upload_row').find('.quantity_labels').hide();
        $(this).parents('.upload_row').find('.input_rolls').show();
    });

    function isFloat(n) {
        return Number(n) === n && n % 1 !== 0;
    }

    function reset_plain_input_buttons(_this) {
        $(_this).parents('.productdetails').find('.plainprice_box').hide();
        $(_this).parents('.productdetails').find('.add_plain').hide();
        $(_this).parents('.productdetails').find('.plain_save_txt').hide();
        $(_this).parents('.productdetails').find('.diamterinfo').hide();
        $(_this).parents('.productdetails').find('.addprintingoption').addClass('hide');

        $(_this).parents('.productdetails').find('.calculate_plain').show();

    }

    function reset_print_input_buttons(_this) {
        $(_this).parents('.productdetails').find('.printedprice_box').hide();
        $(_this).parents('.productdetails').find('.add_printed').hide();
        $(_this).parents('.productdetails').find('.calculate_printed').show();
    }

    function is_numeric(mixed_var) {
        var whitespace =
            " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
        return (typeof mixed_var === 'number' || (typeof mixed_var === 'string' && whitespace.indexOf(mixed_var.slice(-1)) === -
            1)) && mixed_var !== '' && !isNaN(mixed_var);
    }

    var timer = '';

    function show_faded_popover(_this, text) {
        $(_this).attr('data-content', '');
        $(_this).popover('hide');
        $(_this).popover('destroy');

        $(_this).popover({'placement': 'top'});
        $(_this).attr('data-content', text);
        $(_this).popover('show');
        clearTimeout(timer);
        timer = setTimeout(function () {
            $(_this).attr('data-content', '');
            $(_this).popover('hide');
            $(_this).popover('destroy');
        }, 5000);
    }


    $(document).on("click", ".browse_btn", function (e) {
        $(this).parents('.upload_row').find('.artwork_file').click();
    });
    $(document).on("change", ".artwork_file", function (e) {
        readURL(this);
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (ext == 'docx' || ext == 'doc') {
                $('#preview_po_img').attr('src', '<?=Assets?>images/doc.png');
                $('#preview_po_img').show();
                $('.browse_btn').hide();
            } else if (ext == 'pdf') {
                $('#preview_po_img').attr('src', '<?=Assets?>images/pdf.png');
                $('#preview_po_img').show();
                $('.browse_btn').hide();
            } else if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_po_img').attr('src', e.target.result);
                    $('#preview_po_img').show();
                    $('.browse_btn').hide();
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#preview_po_img').attr('src', '<?=Assets?>images/no-image.png');
                $('#preview_po_img').show();
                $('.browse_btn').hide();
            }
        }
    }

    $(document).on("click", "#preview_po_img", function (e) {

        swal({
                title: 'Are you sure you want to delete this file?',
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn orangeBg",
                confirmButtonText: "No",
                cancelButtonClass: "btn blueBg m-r-10",
                cancelButtonText: "Yes",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    console.log('cancel');
                } else {
                    $('.browse_btn').show();
                    $('#preview_po_img').hide();
                }
            });
    });

    //$(document).on("blur", ".labels_input", function(e) {
    $(document).on("click", ".save_artwork_file, .delete_artwork_file, .sheet_updater", function (e) {
        var min_qty = parseInt($('#labels_p_sheet').val());
        var unitqty = $('#cartunitqty').val();
        unitqty = $.trim(unitqty);

        var labelsQuantity = $(this).closest("tr").find('td:eq(2)').find(".labels_input").val();
        var OBJ = $(this).closest("tr").find('td:eq(2)').find(".labels_input");
        var labels = parseInt(labelsQuantity);


        if (!is_numeric(labels)) {
            show_faded_popover(OBJ, "please enter only numbers ");
            $(this).val('');
            return false;
        } else if (labels == 0 && unitqty == 'Sheets') {
            show_faded_popover(OBJ, "Minimum 1 sheet required ");
            $(this).val('');
            return false;
        } else if ((labels == 0 || labels < min_qty) && unitqty == 'Labels') {
            show_faded_popover(OBJ, "Minimum " + min_qty + " labels are required ");
            $(this).val('');
            return false;
        } else if (labels % min_qty != 0 && unitqty == 'Labels') {
            var multipyer = min_qty * parseInt(parseInt(labels / min_qty) + 1);
            $(this).val(multipyer);
            total_upload_labels();
            show_faded_popover(OBJ, "Quantity has been amended for production as " + multipyer + " Labels.");
            $(this).focus();
            return false;
        } else {
            total_upload_labels();
        }
    });

    $(document).on("click", ".sheet_updater", function (event) {
        var id = $(this).attr('data-id');
        var _this = this;
        var cartid = $('#cartid').val();
        var prdid = $('#cartproductid').val();
        var labelpersheets = $('#labels_p_sheet').val();
        var type = 'sheets';
        var cartunitqty = $('#cartunitqty').val();

        var productType = $("#productType").val();
        var product_serial = $("#productSerial").val();

        var artwork_name = $(this).parents(".upload_row").find(".artwork_name").val();
        var artwork_field = $(this).parents(".upload_row").find(".artwork_name");

        if (artwork_name == "") {
            show_faded_popover(artwork_field, "Please enter artwork name");
            return false;
        }

        if (cartunitqty == 'Labels') {
            var labels = $(_this).parents('.upload_row').find('.labels_input').val();
            if (labels.length == 0 || labels == 0 || labels == '') {
                var id = $(_this).parents('.upload_row').find('.labels_input');
                var popover = $(_this).parents('.upload_row').find('.popover').length;
                if (popover == 0) {
                    show_faded_popover(id, "Minimum " + labelpersheets + " labels are required ");
                }
                return false;
            }
            var sheets = parseInt(labels / labelpersheets);
        } else {
            var sheets = $(_this).parents('.upload_row').find('.labels_input').val();
            if (sheets.length == 0 || sheets == 0 || sheets == '') {
                var id = $(_this).parents('.upload_row').find('.labels_input');
                var popover = $(_this).parents('.upload_row').find('.popover').length;
                if (popover == 0) {
                    show_faded_popover(id, "Minimum 1 sheet required ");
                }
                return false;
            }
            var labels = parseInt(sheets * labelpersheets);
        }

        if (productType == "integrated") {
            var max_qty = parseInt($("#max_qty" + product_serial).val());
            var min_qty = parseInt($("#min_qty" + product_serial).val());
            var batch = min_qty;
            var box_inp = $(_this).parents('.upload_row').find('.labels_input');
            if (sheets == NaN || box_inp.val() == '') {
                box_inp.val(batch);
                show_faded_popover(box_inp, "Minimum " + batch + " sheets allowed");
                return false;
            } else if (sheets < min_qty) {
                show_faded_popover(box_inp, "Minimum " + batch + " sheets allowed");
                box_inp.val(min_qty);
                return false;
            } else if (sheets > max_qty) {
                box_inp.val(max_qty);
                show_faded_popover(box_inp, "Maximum " + max_qty + " sheets allowed");
                return false;
            }
            if (sheets % batch != 0) {
                if (batch == 250) {
                    sheets = Math.round(sheets / 250) * 250;
                    if (sheets == 0) {
                        sheets = batch;
                    }
                } else {
                    sheets = Math.round(sheets / 1000) * 1000;
                    if (sheets == 0) {
                        sheets = batch;
                    }
                }
                $(box_inp).val(sheets);
                show_faded_popover(box_inp, "Quantity has been round off to " + sheets);
                labels = parseInt(sheets * labelpersheets);
                return false;
            }
            $(".labels_input").trigger("blur");
        }
        $("#artworks_uploads_loader").show();
        $.ajax({
            url: base + 'ajax/update_material_artworks',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                id: id,
                cartid: cartid,
                productid: prdid,
                labels: labels,
                sheets: sheets,
                persheet: labelpersheets,
                type: type,
                unitqty: cartunitqty,
            },
            success: function (data) {
                data = $.parseJSON(data);
                if (!data == '') {
                    update_printed_quantity_box(data.qty, data.designs);
                    $('#ajax_upload_content').html(data.content);

                    intialize_progressbar();
                    update_price_new_sheets();
                    $("#artworks_uploads_loader").hide();
                }
            }
        });
    });

    function update_price_new_sheets() {
        //$("#total_price").hide();

        var total_sheets_new = $("#uploaded_sheets").val();
        var productSerial = $("#productSerial").val();
        var qty = $("#Quantity_" + productSerial).val();
        var productID = $("#prd_id" + productSerial).val();
        var labels_p_sheet = $("#labels_p_sheet" + productSerial).val();
        var print_type = $("#print_type" + productSerial).val();
        var cart_id = $("#cart_id_" + productSerial).val();
        var menuid = $("#manufactureID" + productSerial).val();
        var printing = $("#printing" + productSerial).val();
        var min_qty = $("#min_qty" + productSerial).val();
        var product_type = $("#product_type" + productSerial).val();
        if (total_sheets_new == '' || total_sheets_new == 0) {
            total_sheets_new = qty;
            $("#Quantity_" + productSerial).val(total_sheets_new);
        } else {
            $("#Quantity_new_" + productSerial).val(total_sheets_new);
        }

        if (product_type == "Integrated") {
            $.ajax({
                url: base + 'ajax/get_box_price',
                type: "POST",
                data: {
                    manufature: menuid,
                    box: total_sheets_new,
                    print_option: print_type,
                    batch: min_qty,
                    cart_id: cart_id,
                    prd_id: productID
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        var total_price = '<b class="color-orange"> <?=symbol?>' + data.total + ' </b><?=vatoption?> VAT'
                        $("#total_price").html(total_price);
                        intialize_progressbar();
                        $("#total_price").show();
                    }
                }
            });
        } else {
            $.ajax({
                url: base + 'ajax/calculate_sheet_price',
                type: "POST",
                data: {
                    qty: total_sheets_new,
                    menuid: menuid,
                    prd_id: productID,
                    labels: labels_p_sheet,
                    labeltype: print_type,
                    printing: printing,
                    cart_id: cart_id
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        $("#total_price").html(data.price);
                        $("#total_price").find("br").remove();
                        intialize_progressbar();
                        $("#total_price").show();
                    }
                }
            });
        }
    }

    function add_item_reorder_artworks(serial, menuid) {
        var productType = $("#productType").val();

        if (productType == "rolls") {
            var prd_name = $('#prd_name' + serial).text();
            var cart_id = $("#cart_id_" + serial).val();
            var qty = $("#Quantity_new_" + serial).val();
            var id = $("#prd_id" + serial).val();
            var labels = $("#labels_p_sheet" + serial).val();
            var labelfinish = $("#finishtype" + serial).val();
            var printing = $("#print_type" + serial).val();
            var presproof = $("#uploadedartworks_" + serial).attr('data-presproof');
            var woundoption = $("#wound" + serial).val();
            var orientation = $("#orientation" + serial).val();
            var printing_enabled = $("#printing" + serial).val();
            $("#aa_loader").show();
            $("#artworks_uploads_loader").show();

            $.ajax({
                url: base + 'ajax/add_products_incart',
                type: "POST",
                async: "false",
                dataType: "html",
                data: {
                    labels: qty,
                    menuid: menuid,
                    prd_id: id,
                    max_labels: labels,
                    labelfinish: labelfinish,
                    printing: printing,
                    presproof: presproof,
                    cartid: cart_id,
                    woundoption: woundoption,
                    orientation: orientation,
                    printing_enabled: printing_enabled,
                    type: 'Rolls',
                    page: 'reorder',
                },
                success: function (data) {
                    if (!data == '') {
                        data = $.parseJSON(data);
                        if (data.response == 'yes') {
                            $(".artworkModal1").modal('hide');
                            $("#cart_id_" + serial).val('');
                            $("#aa_loader").hide();
                            $("#artworks_uploads_loader").hide();
                            popup_messages(menuid + ' - ' + prd_name);
                            $('#cart').html(data.top_cart);
                        } else if (data.deactive == 'yes') {
                            $('#alter_link').attr('href', data.url);
                            $('.layout').modal('show');
                        }

                    }
                }
            });
        } else {

            // AA10 STARTS
            var total_Of_Sheets = 0;
            $(".artWork_No_Of_Sheets").each(function (index) {
                if ($(this).val() != '' && !Number.isNaN($(this).val())) {
                    total_Of_Sheets += parseInt($(this).val());
                }
            });
            if (total_Of_Sheets < 25) {
                swal({
                    title: "",
                    text: "Minimum 25 sheets required, please adjust remaining sheets in your artworks",
                    confirmButtonColor: '#286090',
                    confirmButtonText: 'Continue',
                    closeOnConfirm: false
                });
                $(".showSweetAlert").css('border-radius', '4px');
                $(".showSweetAlert").css('-webkit-box-shadow', '0 5px 15px rgba(0,0,0,.5)');
                $(".showSweetAlert").css('box-shadow', '0 5px 15px rgba(0,0,0,.5)');
                return;
            }
            // AA10 ENDS


            var qty = $('#Quantity_new_' + serial).val();
            if (qty == '' || qty == 0 || qty == 'undefined') {
                var qty = $('#Quantity_' + serial).val();
            }

            var min_qty = parseInt($('#min_qty' + serial).val());
            var max_qty = parseInt($('#max_qty' + serial).val());
            var orderNum = $('#orderNum_' + serial).val();
            var type = $('#product_type' + serial).val();
            var prd_name = $('#prd_name' + serial).text();
            var newcartid = $('#cart_id_' + serial).val();
            var menuid = $('#manufactureID' + serial).val();
            var printing = $('#printing' + serial).val();
            var print_type = $('#print_type' + serial).val();
            var prodid = $('#prd_id' + serial).val();
            var labels_per_sheet = $('#labels_p_sheet' + serial).val();

            $("#aa_loader").show();
            $("#artworks_uploads_loader").show();

            /*console.log("serial: "+serial);
		console.log("min_qty: "+min_qty);
		console.log("max_qty: "+max_qty);
		console.log("orderNum: "+orderNum);
		console.log("type: "+type);
		console.log("prd_name: "+prd_name);
		console.log("newcartid: "+newcartid);
		console.log("menuid: "+menuid);
		console.log("print_type: "+print_type);
		console.log("prodid: "+prodid);
		console.log("labels_per_sheet: "+labels_per_sheet);*/

            if (productType == "integrated") {
                var counter = parseInt($("#uploadedartworks_" + serial).val());
                if (counter == 0 || counter == '' || counter == NaN) {
                    counter = parseInt($("#printQty" + serial).val());
                }
                $.ajax({
                    url: base + 'ajax/add_integrate_incart',
                    type: "POST",
                    async: "false",
                    dataType: "html",
                    data: {
                        manufature: menuid,
                        box: qty,
                        type: 'printed',
                        print_option: print_type,
                        prdid: prodid,
                        counter: counter,
                        batch: min_qty,
                        cart_id: newcartid,
                        page: 'reorder'
                    },
                    success: function (data) {
                        if (!data == '') {
                            data = $.parseJSON(data);
                            if (data) {
                                $(".artworkModal1").modal('hide');
                                $("#cart_id_" + serial).val('');
                                $("#aa_loader").hide();
                                $("#artworks_uploads_loader").hide();
                                popup_messages(menuid + ' - ' + prd_name);
                                $('#cart').html(data.top_cart);
                            } else if (data.deactive == 'yes') {
                                $('#alter_link').attr('href', data.url);
                                $('.layout').modal('show');
                            }
                        }
                    }
                });
            } else {
                $.ajax({
                    url: base + 'ajax/add_products_incart',
                    type: "POST",
                    async: "false",
                    dataType: "html",
                    data: {
                        qty: qty,
                        menuid: menuid,
                        prd_id: prodid,
                        labeltype: print_type,
                        printing: printing,
                        cartid: newcartid,
                        labels: labels_per_sheet,
                        page: 'reorder'
                    },
                    success: function (data) {
                        if (!data == '') {
                            data = $.parseJSON(data);
                            if (data.response == 'yes') {
                                $(".artworkModal1").modal('hide');
                                $("#cart_id_" + serial).val('');
                                $("#aa_loader").hide();
                                $("#artworks_uploads_loader").hide();
                                popup_messages(menuid + ' - ' + prd_name);
                                $('#cart').html(data.top_cart);
                            } else if (data.deactive == 'yes') {
                                $('#alter_link').attr('href', data.url);
                                $('.layout').modal('show');
                            }
                        }
                    }
                });
            }
            return false;
        }
    }

    function update_price_new_rolls() {
        //$("#total_price").hide();

        var productSerial = $("#productSerial").val();
        var cart_id = $("#cart_id_" + productSerial).val();
        var id = $("#prd_id" + productSerial).val();
        var menuid = $("#manufactureID" + productSerial).val();

        var qty = $("#final_uploaded_labels").val();
        if (qty == '' || qty == 0) {
            qty = $("#No_Labels_Original" + productSerial).val();
            $("#Quantity_new_" + productSerial).val(qty);
            $("#Quantity_" + productSerial).val(qty);
        } else {
            $("#Quantity_new_" + productSerial).val(qty);
        }

        var labelfinish = $("#finishtype" + productSerial).val();
        var labels = $("#labels_p_sheet" + productSerial).val();
        var printing = $("#print_type" + productSerial).val();
        var min_qty = parseInt($("#min_qty" + productSerial).val());
        var minlabels = parseInt($("#min_print_labels" + productSerial).val());
        var max_qty = parseInt($("#max_print_labels" + productSerial).val());
        var min_qty = parseInt(min_qty * minlabels);
        var presproof = $('#uploadedartworks_' + productSerial).attr('data-presproof');
        var upload_qty = parseInt($('#uploadedartworks_' + productSerial).attr('data-qty'));
        var artworks = parseInt($('#uploadedartworks_' + productSerial).val());

        var size = parseInt($('#diesize_' + productSerial).val());
        var gap = parseInt($('#gap_' + productSerial).val());
        var printing_enabled = $("#printing" + productSerial).val();


        var _this = this;
        $.ajax({
            url: base + 'ajax/calculate_roll_price',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                labels: qty,
                menuid: menuid,
                prd_id: id,
                max_labels: labels,
                labelfinish: labelfinish,
                printing: printing,
                printing_enabled: printing_enabled,
                size: size,
                gap: gap,
                presproof: presproof,
                cart_id: cart_id,
            },
            success: function (data) {
                if (!data == '') {
                    data = $.parseJSON(data);
                    if (data.response == 'yes') {
                        $("#total_price").html(data.price);
                        $("#total_price").find("br").remove();
                        intialize_progressbar();
                        $("#total_price").show();
                    }
                }
            }
        });
    }

    $(document).on("click", ".roll_updater", function (event) {
        var id = $(this).attr('data-id');
        var _this = this;
        var productSerial = $("#productSerial").val();
        var size = parseInt($('#diesize_' + productSerial).val());
        var gap = parseInt($('#gap_' + productSerial).val());
        var cartid = $('#cartid').val();
        var prdid = $('#cartproductid').val();
        var labelpersheets = $('#labels_p_sheet').val();
        var type = 'rolls';

        var response = verify_labels_or_rolls_qty(_this);
        if (response == false) {
            return false;
        }
        var labels = $(_this).parents('.upload_row').find('.roll_labels_input').val();
        var sheets = $(_this).parents('.upload_row').find('.input_rolls').val();
        var presproof = $('#uploadedartworks_' + productSerial).attr('data-presproof');

        $.ajax({
            url: base + 'ajax/update_material_artworks',
            type: "POST",
            async: "false",
            dataType: "html",
            data: {
                id: id,
                cartid: cartid,
                productid: prdid,
                labels: labels,
                sheets: sheets,
                persheet: labelpersheets,
                type: type,
                size: size,
                gap: gap,
                presproof: presproof,
            },
            success: function (data) {
                data = $.parseJSON(data);
                if (!data == '') {
                    update_printed_quantity_box(data.qty, data.designs, data.rolls);
                    $('#ajax_upload_content').html(data.content);

                    intialize_progressbar();

                    update_price_new_rolls();
                }
            }
        });

    });

    $(document).on("click", ".printed_reorder_button", function (e) {
        $("#aa_loader").show();
        $("#openTrigger").val("printed_reorder");
        /*$("#add_item_reorder").trigger("click");
	$(".artworkModal1").css("visibility","hidden");
	$("#aa_loader").hide();

	var display = $(".add_item_reorder").css("display");
	console.log(display);
	if(display != "none")
	{
		alert("click now");
	}*/
    });
    /*$(".artworkModal1").on("show.bs.modal",function(e){
	$(".modal-backdrop.in").css("visibility","hidden").css("display","none").css("opacity","0");
	$(".artworkModal1").modal('hide');
});

$(".artworkModal1").on("hidden.bs.modal",function(e){
	$(".artworkModal1").css("visibility","visible");
	$(".modal-backdrop.in").css("visibility","visible").css("display","block");
});*/
</script>