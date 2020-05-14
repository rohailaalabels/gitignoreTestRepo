<?

$texvat = $this->shopping_model->total_order();
$wtp_discount = $this->shopping_model->wtp_discount_applied_on_order();

$valid_voucher = $this->session->userdata('valid_voucher');

$discount_offer = 0.00;


if ($valid_voucher == 'yes') {
    $voucher = $this->shopping_model->order_discount_applied();
    if (isset($voucher['discount_offer'])) {
        $discount_offer = $voucher['discount_offer'];
    }
} else if ($wtp_discount) {
    $discount_offer = $wtp_discount['discount_offer'];
}


//$ServiceName = $this->session->userdata('ServiceName');
$ServiceID = $this->session->userdata('ServiceID');
if ($ServiceID == '' && empty($ServiceID)) {
    $ServiceID = 21;
}
$ship_info = $this->shopping_model->get_shipping($ServiceID);
$ServiceName = $ship_info['ServiceName'];
$BasicCharges = $this->session->userdata('BasicCharges');

$texvat = $texvat * 1.2;
$texvat = $texvat - $discount_offer;

$texvat = $this->home_model->currecy_converter($texvat, 'no');
$BasicCharges = $this->home_model->currecy_converter($BasicCharges, 'no');
?>

<div class="panel-default fa-border ">
    <table class="table">
        <tbody>
        <tr>
            <td class="borderR0">Sub Total<br></td>
            <td class="borderR0" style="text-align:right;"><h4
                        class=""><?php echo symbol . number_format($texvat, 2, '.', ''); ?></h4></td>
        </tr>
        <tr>
            <?php
            $virtual = $this->shopping_model->is_order_virtual();

            if ($virtual == "virtual") {
                $ServiceName = "Virtual Product (No Shipping)";
            }

            ?>
            <td class=""><?= $ServiceName ?></td>
            <td style="text-align:right;"><h4 class="">
                    <?= symbol . $BasicCharges ?>
                </h4></td>
        </tr>
        <? $vat_exemption_charges = 0.00;


        $vat_exemption = $this->session->userdata('vat_exemption');
        if (isset($vat_exemption) and $vat_exemption == 'yes') {
            $vat_exemption_charges = $texvat + $BasicCharges - ($texvat + $BasicCharges) / 1.2;

            ?>
            <tr>
                <td class="">Exempt VAT Charges</td>
                <td style="text-align:right;"><h3 class=""> -
                        <?= symbol . number_format($vat_exemption_charges, 2, '.', '') ?>
                    </h3></td>
            </tr>
        <? } ?>
        <tr>
            <td class="textOrange">Total (
                <?= currency ?>
                )
            </td>
            <td style="text-align:right;"><h3
                        class="textOrange"><?php echo symbol . number_format($BasicCharges + $texvat - $vat_exemption_charges, 2, '.', ''); ?></h3>
            </td>
        </tr>
        </tbody>
    </table>
</div>
