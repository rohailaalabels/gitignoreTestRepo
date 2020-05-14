<?php
if (!empty($a4_materials['data'])) {
    $material = $a4_materials['type'];
    echo "<h2 class='BlueHeading'>Label on sheets (A4, A5, A3 &amp; SRA3) <small>$material</small></h2>";
    foreach ($a4_materials['data'] as $material) {
        $file = str_replace(" ", "-", strtolower($material->color));
        ?>

        <div class="panel panel-default" style="box-shadow: none !important;">
            <div id="Mheading<?= $material->ID ?>" role="tab" class="panel-title_gray">
                <div class=""><a aria-controls="Mcollapse<?= $material->ID ?>" aria-expanded="false"
                                 href="#Mcollapse<?= $material->ID ?>" data-parent="#accordion" data-toggle="collapse"
                                 role="button" class="">
                        <div class="pull-left"><img onerror='imgError(this);' alt="<?= $material->name ?>"
                                                    src="<?= Assets ?>images/material_images/colors/<?= $file ?>.png"
                                                    class="img-responsive material_title_image"/></div>
                        <?= $material->name ?>
                        <br/>
                        <small>
                            <?php if ($material->adhesive != '') {
                                echo "(" . $material->adhesive . " Adhesive)";
                            } ?>
                        </small> </a>
                    <div class="pull-right"><a class="download_pdf_link"
                                               href="<?= Assets ?>material_specs/<?= $material->type ?>/<?= $material->code ?>.pdf"
                                               download="<?= $material->name ?>.pdf"> <img onerror='imgError(this);'
                                                                                           src="<?= Assets ?>images/pdf-icon.png"
                                                                                           class="img-responsive material_title_image download_pdf"/></a>
                    </div>
                </div>
            </div>
        </div>
        <div aria-labelledby="heading<?= $material->ID ?>" role="tabpanel" class="panel-collapse collapse"
             id="Mcollapse<?= $material->ID ?>" aria-expanded="false" style="">
            <div class="panel-body text-justify">
                <? include(APPPATH . '/views/material/specs/' . $material->type . '/' . $material->code . '.php'); ?>
            </div>
        </div>
        </div>
        <?php
    }
}

if (!empty($roll_materials['data'])) {
    $material = $roll_materials['type'];
    echo "<h2 class='BlueHeading'>Labels on Rolls <small>$material</small></h2>";
    foreach ($roll_materials['data'] as $material) {
        $file = str_replace(" ", "-", strtolower($material->color));
        ?>
        <div class="panel panel-default" style="box-shadow: none !important;">
            <div id="Mheading<?= $material->ID ?>" role="tab" class="panel-title_gray">
                <div class=""><a aria-controls="Mcollapse<?= $material->ID ?>" aria-expanded="false"
                                 href="#Mcollapse<?= $material->ID ?>" data-parent="#accordion" data-toggle="collapse"
                                 role="button" class="">
                        <div class="pull-left"><img onerror='imgError(this);' alt="<?= $material->name ?>"
                                                    src="<?= Assets ?>images/material_images/colors/<?= $file ?>.png"
                                                    class="img-responsive material_title_image"/></div>
                        <?= $material->name ?>
                        <br/>
                        <small>
                            <?php if ($material->adhesive != '') {
                                echo "(" . $material->adhesive . " Adhesive)";
                            } ?>
                        </small> </a>
                    <div class="pull-right"><a class="download_pdf_link"
                                               href="<?= Assets ?>material_specs/<?= $material->type ?>/<?= $material->code ?>.pdf"
                                               download="<?= $material->name ?>.pdf"> <img onerror='imgError(this);'
                                                                                           src="<?= Assets ?>images/pdf-icon.png"
                                                                                           class="img-responsive material_title_image download_pdf"/></a>
                    </div>
                </div>
            </div>
        </div>
        <div aria-labelledby="heading<?= $material->ID ?>" role="tabpanel" class="panel-collapse collapse"
             id="Mcollapse<?= $material->ID ?>" aria-expanded="false" style="">
            <div class="panel-body text-justify">
                <? include(APPPATH . '/views/material/specs/' . $material->type . '/' . $material->code . '.php'); ?>
            </div>
        </div>
        </div>
        <?php
    }
}
if (empty($roll_materials['data']) and empty($a4_materials['data'])) {
    ?>
    <h4 class="m-t-60 text-center">No material found with this criteria</h4>
    <?php
}
?>
