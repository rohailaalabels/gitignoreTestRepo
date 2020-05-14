<? foreach ($make_list as $row) {
    $row->method = str_replace("/", ",", $row->method);

    error_reporting(0);

    if (getimagesize(Assets . 'images/printer/model/' . $row->image) !== false) {
        $src = Assets . 'images/printer/model/' . $row->image;
    } else {
        $src = Assets . 'images/no-image.png';

    }
    if ($row->specfication != "") {
        $spec = substr($row->specfication, 0, 100);
    } else {
        $spec = "";
    }


    ?>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4 ">
        <div class="thumbnail">
            <div class=" text-center"><img onerror='imgError(this);' width="185" height="155" title="<?= $row->Name ?>"
                                           src="<?= $src ?>" alt="<?= $row->Name ?>"></div>
            <div class="caption3">
                <h2>
                    <?= $row->Name ?>
                </h2>
                <p><small>
                        <?= $spec ?>
                    </small></p>
                <div class="row">
                    <p class="col-md-12"><strong>Compatibility:</strong>
                        <?= $row->method ?>
                    </p>
                    <p class="col-md-12"><strong>Maximum Print Size:</strong>
                        <?= $row->PrintWidth ?>
                        mm</p>
                </div>
                <a href="<?= base_url() ?>thermal-printer-roll-labels?make=<?= urlencode($row->ManufacturerCode) ?>&model=<?= urlencode($row->model) ?>"
                   id="<?= $row->model ?>"
                   role="button" class="btn-block btn orange"><i class="fa fa-arrow-circle-right"></i> Select </a></div>
        </div>
    </div>
<? } ?>
