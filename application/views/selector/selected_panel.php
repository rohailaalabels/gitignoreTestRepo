<?
if (preg_match("/SRA3/", $select['CategoryName'])) {
    $oPaper_size = "SRA3 Sheets";
    $oimg_src = Assets . "images/categoryimages/SRA3Sheets/" . $select['CategoryImage'];
    $owidth = '190';
    $oheight = '150';

    $x = explode("-", $select['CategoryName']);
    $ocatname = $x[0];
    $oLabelSize = $x[1];
    $url = 'sra3-sheets';
} else if (preg_match("/A5/", $select['CategoryName'])) {
    $oPaper_size = "A5 Sheets";
    $oimg_src = Assets . "images/categoryimages/A5Sheets/" . $select['CategoryImage'];
    $owidth = '210';
    $oheight = '148.5';

    $x = explode("-", $select['CategoryName']);
    $ocatname = $x[0];
    $oLabelSize = $x[1];
    $url = 'a5-sheets';
} else if (preg_match("/A3/", $select['CategoryName'])) {
    $oPaper_size = "A3 Sheets";
    $oimg_src = Assets . "images/categoryimages/A3Sheets/" . $select['CategoryImage'];
    $owidth = '190';
    $oheight = '150';

    $x = explode("-", $select['CategoryName']);
    $ocatname = $x[0];
    $oLabelSize = $x[1];
    $url = 'a3-sheets';
} else {
    $oPaper_size = "A4 Sheets";
    $oimg_src = Assets . "images/categoryimages/A4Sheets/" . $select['CategoryImage'];
    $owidth = '125';
    $oheight = '176';

    $x = explode("-", $select['CategoryName']);
    $ocatname = $x[0];
    $oLabelSize = $x[1];
    $url = 'a4-sheets';

}

$code = explode('.', $select['CategoryImage']);
$ourl = base_url() . $url . '/' . strtolower($select['Shape']) . '/' . $select['CategoryID'];

?>

<div class="col-xs-12 col-sm-6 col-md-12">
    <div class="thumbnail" style="border:2px solid #fd4913">
        <div class="zoom" style="display: none;">
            <p><a href="#" data-toggle="modal" data-target=".layout" class="layout_specs"
                  id="<?= $select['CategoryID'] ?>"> <i class="fa fa-search-plus zoomIcon"></i> </a></p>
        </div>
        <div class="imgBg  text-center"><img onerror='imgError(this);' src="<?= $oimg_src ?>" alt="<?= $ocatname ?>"
                                             title="<?= $ocatname ?>" width="<?= $owidth ?>" height="<?= $oheight ?>">
        </div>
        <div class="caption3">
            <h2>
                <?= $oPaper_size ?>
                <br>
                <small>
                    <?= $ocatname ?>
                </small></h2>
            <div class="row">
                <p class="col-md-7"><strong>Label Size</strong><br>
                    <small>
                        <?= $oLabelSize ?>
                    </small></p>
                <p class="col-md-5 p0"><strong>Item Code</strong><br>
                    <?= $code[0] ?>
                </p>
            </div>
            <a class="btn-block btn orange selected_design" role="button" data-temp_id="<?= $select['ProductID'] ?>"> <i
                        class="fa fa-arrow-circle-right"></i> Continue with Existing <br/>
                Selection</a></div>
        <div class="clear"></div>
    </div>
</div>
