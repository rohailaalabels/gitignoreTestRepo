<td class="invoicetable_description_loop invoicetable_tabel_border"
    style=" <?= (isset($print_style) and $print_style != '') ? $print_style : '' ?>"><? $type = $typeshow = $desntype = $this->accountModel->get_printing_service_name($AccountDetail->Print_Type, $AccountDetail->regmark); ?>
    <img onerror='imgError(this);' src="<?= base_url() ?>aalabels/img/dot.png" width="8" height="8"/> <span
            style="margin-left:0px;font-size:10px;">
  <?= $typeshow ?>
  </span> <img onerror='imgError(this);' style="margin-left:10px;" src="<?= base_url() ?>aalabels/img/dot.png" width="8"
               height="8"/> <span style="margin-left:0px;font-size:10px;">
  <?= $AccountDetail->Print_Design ?>
  </span>
    <?
    $free = $AccountDetail->Print_Qty - $AccountDetail->Free;
    if ($AccountDetail->Free >= $AccountDetail->Print_Qty) {
        $free = 0;
    }
    ?>
    <img onerror='imgError(this);' style="margin-left:5px;" src="<?= base_url() ?>aalabels/img/dot.png" width="8"
         height="8"/>&nbsp;
    <? if ($AccountDetail->Print_Design == "1 Design") { ?>
        <b style="color:red;font-size:10px;"> <? echo '&nbsp;&nbsp;' . "1" . " Design " . $desntype; ?> </b>
    <? } else
        if ($AccountDetail->Print_Design == "Multiple Designs") {
            ?>
            <b style="color:red;font-size:10px;"> <? echo '&nbsp;&nbsp;' . $AccountDetail->Print_Qty . " Designs " . $desntype . " ( " . $free . " + " . $AccountDetail->Free . " Free )"; ?> </b>
        <? } ?>
    <? if (preg_match('/roll/is', $AccountDetail->ProductName)) {
        if (isset($AccountDetail->wound) and $AccountDetail->wound != '') {
            $wound = $AccountDetail->wound;
        } else {
            $wound = $AccountDetail->Wound;
        }
        ?>
        <br/>
        <b>Wound:</b>
        <?= $wound ?>
        &nbsp;&nbsp; <b>Orientation:</b>
        <?= $AccountDetail->Orientation ?>
        &nbsp;&nbsp; <b>Finish:</b>
        <?= $AccountDetail->FinishType ?>
        &nbsp;&nbsp; <b>Press proof:</b>
        <?= ($AccountDetail->pressproof == 0) ? 'No' : 'Yes' ?>
    <? }


    if (isset($showartowrks) and $showartowrks == 'Yes' and $AccountDetail->Printing == 'Y') {
        $artowrks = $this->accountModel->get_printed_files($AccountDetail->SerialNumber); ?>
        <? if (count($artowrks) > 0) {
            ?>
            <div>
            <hr/>
            <? foreach ($artowrks as $upload) {

                if (preg_match("/.pdf/is", $upload->file)) {
                    $path = AJAXURL . 'theme/site/images/pdf.png';
                    $width_img = '30';
                } else if (preg_match("/.doc/is", $upload->file) || preg_match("/.docx/is", $upload->file)) {
                    $path = AJAXURL . 'theme/site/images/doc.png';
                    $width_img = '30';
                } else {

                    $path = base_url() . 'theme/integrated_attach/' . $upload->file;
                    $width_img = '50';
                }


                ?>
                <span style="float:left; margin-left:10px;"> <img onerror='imgError(this);' class="" src="<?= $path ?>"
                                                                  height="" width="<?= $width_img ?>">
    <p class="ellipsis"><small>Labels:</small> <small>
      <?= $upload->labels ?>
      </small></p>
    </span>
            <? }
        } ?>
        </div>
    <? } ?></td>
