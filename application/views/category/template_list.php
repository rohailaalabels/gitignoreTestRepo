<div class="row">
    <div class="row">
        <? foreach ($records['list'] as $pro) {

            $code = explode('.', $pro->CategoryImage);

            if (preg_match("/SRA3/", $pro->CategoryName)) {

                $Paper_size = "SRA3 Sheets";
                $img_src = Assets . "images/categoryimages/SRA3Sheets/" . $pro->CategoryImage;
                $width = '208';
                $height = '148';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];
            } else if (preg_match("/A5/", $pro->CategoryName)) {
                $Paper_size = "A5 Sheets";
                $img_src = Assets . "images/categoryimages/A5Sheets/" . $pro->CategoryImage;
                $width = '210';
                $height = '148.5';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];
            } else if (preg_match("/A5/", $pro->CategoryName)) {
                $Paper_size = "A3 Sheets";
                $img_src = Assets . "images/categoryimages/A3Sheets/" . $pro->CategoryImage;
                $width = '208';
                $height = '148';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];
            } else {
                $Paper_size = "A4 Sheets";
                $img_src = Assets . "images/categoryimages/A4Sheets/" . $pro->CategoryImage;
                $width = '125';
                $height = '176';

                $x = explode("-", $pro->CategoryName);
                $catname = $x[0];
                $LabelSize = $x[1];

                $pdffile = $pro->pdfFile;
                $wordfile = $pro->wordFile;


            } ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                <div class="thumbnail">
                    <div class="zoom">
                        <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                              id="<?= $pro->CategoryID ?>"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
                    </div>
                    <div class="imgBg text-center"><img onerror='imgError(this);' src="<?= $img_src ?>"
                                                        alt="<?= $catname ?>" title="<?= $catname ?>"
                                                        width="<?= $width ?>" height="<?= $height ?>"></div>
                    <div class="caption">
                        <h2>
                            <?= $Paper_size ?>
                        </h2>
                        <p>
                            <?= $catname ?>
                        </p>
                        <div class="row">
                            <p class="col-md-8"><strong>Label Size</strong><br>
                                <?= $LabelSize ?>
                            </p>
                            <p class="col-md-4"><strong>Code</strong><br>
                                <?= $code[0] ?>
                            </p>
                        </div>
                        <div class="col-xs-12 row "><a rel="noindex, nofollow" role="button" class="btn orangeBg"
                                                       href="<?= base_url() . "download/pdf/" . $pro->pdfFile; ?>"> <i
                                        class="fa fa-file-pdf-o f-20"></i> </a> </a> <a role="button" class="btn blueBg"
                                                                                        rel="noindex, nofollow"
                                                                                        href="<?= Assets ?>images/office/word/<?= $pro->wordFile ?>">
                                <i class="fa f-20 fa-file-word-o "></i> </a></div>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>
