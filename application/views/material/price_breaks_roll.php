<table class="table table-striped p-5">
    <tr class="info" height="28">
        <td align="center">NO. ROLLS</td>
        <td align="center">NO. LABELS</td>
        <td align="center">PRICE PER LABEL</td>
        <td align="center">TOTAL</td>
    </tr>
    <?
    $i = 1;
    foreach ($breaks as $row) {
        $latest_price = $this->home_model->calclateprice($mid, $row->Rolls, $LabelsPerSheet);
        $price = $latest_price['final_price'];
        $price = $this->home_model->currecy_converter($price, 'yes');
        $labels = $row->Rolls * $LabelsPerSheet;
        $perlabelprice = number_format($price / $labels, 4, '.', '');
        ?>
        <tr>
            <td align="left"><?= $row->Rolls ?></td>
            <td align="left"><?= $labels ?></td>
            <td align="center"><?= symbol . $perlabelprice ?></td>
            <td align="left"><?= symbol . $price ?> <?= vatoption ?> Vat</td>
        </tr>

        <? $i++;
    } ?>
</table>
