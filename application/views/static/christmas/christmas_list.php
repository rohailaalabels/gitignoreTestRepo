<?
$x = explode("-", $pro->CategoryName);
$catname = $x[0];
$LabelSize = $x[1];
$img_src = Assets . "images/categoryimages/A4Sheets/" . $pro->CategoryImage;
$code = explode('.', $pro->CategoryImage);
$compitable = $this->home_model->avery_equilent($pro->CategoryID);
$pname = explode('-', $pro->ProductName);
//
// $pro->pdfFile =str_replace(".pdf",".zip",$pro->pdfFile);
$pdf = Assets . "images/christmas/pdf/" . $pro->pdfFile;
$doc = Assets . "images/christmas/doc/" . $pro->pdfFile;

if ($pro->FeatureProducts == "Address") {
    $pdf_hide = '';
} else {
    $pdf_hide = 'hide';
}


if ($code[0] == 'AAHT008') {
    $design_option = '<option value=""> Select Design </option>';
    $design_option .= '<option value="Heart Shape Special Gift Label &ndash; White">Heart Shape Special Gift Label &ndash; White </option>';
}


?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
    <div class="thumbnail">
        <h2 class="BlueHeading m-l-10 "><?= $catname ?></span> </h2>
        <div class="text-center col-md-6">
            <img onerror='imgError(this);' class="img-responsive" width="125" height="176" src="<?= $img_src ?>">
            <div class="m-t-20 <?= $pdf_hide ?>">
                <a role="button" class="btn orangeBg" href="<?= $pdf ?>" title="" rel="nofollow"> <i
                            class="fa fa-file-pdf-o f-28"></i> PDF </a>
                <!--    	 <a role="button" class="btn blueBg" href="<?= $doc ?>" rel="nofollw" title="" > <i class="fa f-28 fa-file-word-o "></i> Word </a> -->
            </div>
        </div>
        <div></div>
        <div class="col-md-6 p0 m0">
            <div class="caption2 p0 m0">
                <div class="row">
                    <p class="col-md-12"><strong>Label Size</strong><br>
                        <?= $LabelSize ?></p>
                    <p class="col-md-12"><strong>Code</strong><br>
                        <?= $code[0] ?>
                    </p>

                    <? if ($compitable) { ?>
                        <p class="col-md-12 hide"><strong>Compatible with Avery&reg; templates: </strong><br>
                            <?= str_replace(",", ", ", $compitable) ?> </p>
                    <? } else { ?>
                        <p class="col-md-12 <?= $pdf_hide ?>">&nbsp; <br/><br/><br/></p>
                    <? } ?>
                </div>
                <div class="labels-form">
                    <label class="select">
                        <select id="qty_<?= $pro->ProductID ?>" name="qty_<?= $pro->ProductID ?>">
                            <option value=""> Select Sheets</option>
                            <option value="5">5 Sheets</option>
                            <option value="10">10 Sheets</option>
                            <option value="15">15 Sheets</option>
                            <option value="20">20 Sheets</option>
                            <option value="25">25 Sheets</option>
                            <option value="50">50 Sheets</option>
                            <option value="75">75 Sheets</option>
                            <option value="100">100 Sheets</option>
                        </select>
                        <i></i>
                    </label>


                    <label class="select">
                        <select id="design_<?= $pro->ProductID ?>" name="design_<?= $pro->ProductID ?>">
                            <?= $design_option ?>
                        </select>
                        <i></i>
                    </label>


                </div>
                <input type="hidden" value="<?= $pname[0] ?>" id="prd_name<?= $pro->ProductID ?>"/>
                <button id="add_btn<?= $pro->ProductID ?>"
                        onclick="add_item('<?= $pro->ProductID ?>','<?= $pro->ManufactureID ?>');"
                        class="btn-block btn orange" style=" display:block;" type="button">
                    <i class="fa fa-arrow-circle-right"></i> Add to basket
                </button>

            </div>
        </div>
    </div>
</div>
           