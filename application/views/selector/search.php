<div class="row">
    <div class="row  dm-row">
        <?

        foreach ($result as $row) {

            $pro = $this->db->query("select * from category inner join products on products.CategoryID = category.CategoryID Where category.CategoryID LIKE '" . $row->CategoryID . "'")->row_array();

            $i = 1;
            $classu = ($i == 1) ? 'active' : '';

            $fixedclass = '';
            $dmclass = '';
            $code = explode('.', $pro['CategoryImage']);

            if (preg_match("/SRA3/", $pro['CategoryName'])) {

                $Paper_size = "SRA3 Sheets";
                $img_src = Assets . "images/categoryimages/SRA3Sheets/" . $pro['CategoryImage'];
                $width = '208';
                $height = '148';

                $x = explode("-", $pro['CategoryName']);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'sra3-sheets';

            } else if (preg_match("/A5/", $pro['CategoryName'])) {

                $Paper_size = "A5 Sheets";
                $img_src = Assets . "images/categoryimages/A5Sheets/" . $pro['CategoryImage'];
                $width = '210';
                $height = '148.5';

                $x = explode("-", $pro['CategoryName']);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'a5-sheets';
            } else if (preg_match("/A3/", $pro['CategoryName'])) {

                $Paper_size = "A3 Sheets";
                $img_src = Assets . "images/categoryimages/A3Sheets/" . $pro['CategoryImage'];
                $width = '208';
                $height = '148';

                $x = explode("-", $pro['CategoryName']);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'a3-sheets';
            } else {
                $Paper_size = "A4 Sheets";
                $img_src = Assets . "images/categoryimages/A4Sheets/" . $pro['CategoryImage'];
                $width = '125';
                $height = '176';

                $x = explode("-", $pro['CategoryName']);
                $catname = $x[0];
                $LabelSize = $x[1];

                $url = 'a4-sheets';

            }

            if (preg_match("/searchResults/", uri_string())) {
                $fixedclass = 'heightFix';
            }


            $url = base_url() . $url . '/' . strtolower($pro['Shape']) . '/' . strtolower($pro['CategoryID']) . '/';
            ?>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3  dm-box">
                <div class="thumbnail">
                    <? if (!preg_match("/Roll/", $pro['CategoryName'])) { ?>
                        <div class="zoom">
                            <p>
                                <a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                                   id="<?= $pro['CategoryID'] ?>">
                                    <i class="fa fa-search-plus zoomIcon"></i>
                                </a>
                            </p>
                        </div>
                    <? } ?>


                    <div class="imgBg <?= $fixedclass ?> text-center">
                        <img onerror='imgError(this);' src="<?= $img_src ?>" alt="<?= $catname ?>"
                             title="<?= $catname ?>" width="<?= $width ?>" height="<?= $height ?>"></div>
                    <div class="caption">
                        <h2><?= $Paper_size ?></h2>
                        <p><?= $catname ?></p>
                        <div class="row">
                            <p class="<?= (preg_match("/Roll/", $pro['CategoryName'])) ? 'col-md-8' : 'col-md-9' ?> ">
                                <strong>Label Size</strong><br><?= $LabelSize ?></p>
                            <p class="<?= (preg_match("/Roll/", $pro['CategoryName'])) ? 'col-md-4' : 'col-md-3' ?>">
                                <strong>Code</strong><br> <?= $code[0] ?> </p>
                        </div>

                        <a role="button" class="btn-block btn orange load_flash"
                           data-temp_id="<?= $pro['ProductID'] ?>">
                            <i class="fa fa-arrow-circle-right"></i> Select Template
                        </a>


                    </div>
                </div>
            </div>
        <? } ?>

    </div>
</div>