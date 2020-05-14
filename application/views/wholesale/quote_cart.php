<div class="ws-vyq"><a class="vyq-btn slide-toggle"><img onerror='imgError(this);'
                                                         src="<?= Assets ?>images/vyq-btn.png"></a>
    <div class="ws-vyq-box">
        <ul class="ws-vyq-box-inner">
            <li class="LblueH p-t-b-10"><span>
        <?= count($cart_detail) ?>
        Items added <span class="pull-right"><i class="fa fa-cart-plus"></i></span></span></li>
            <li style="height:243px; overflow-y:scroll;">
                <table style="width:100%" class="table-striped">
                    <tbody>
                    <?
                    foreach ($cart_detail as $row) {
                        $prod = $this->shopping_model->show_product($row->ProductID);
                        $prod[0]['Image1'] = str_replace(".gif", ".png", $prod[0]['Image1']);
                        $Product_Name = explode("-", $prod[0]['ProductName']);
                        $x = explode("-", $prod[0]['ProductCategoryName']);

                        ?>
                        <tr class="miniCartProduct">
                            <td valign="top" style="" class="p-t-b-10 text-center hidden-xs">
                                <div class="hidden-xs"><img onerror='imgError(this);' style="margin-left:3px;"
                                                            class="img-circle-cart"
                                                            src="<?= Assets ?>images/material_images/<?= $prod[0]['Image1'] ?>"
                                                            width="25" height="25"></div>
                            </td>
                            <td valign="top" style="">
                                <div> <span>
                  <?= $Product_Name[0] ?>
                  <span>
                  <?= $Product_Name[1]; ?>
                  </span></span> <span><small>
                  <? if (isset($x[3]) and $x[3] != '') {
                      echo $x[3];
                  } ?>
                  </small></span></div>
                            </td>
                            <td valign="top" style=""><span><small> X
                <?= $row->Quantity ?>
                </small></span></td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
            </li>
            <li class="footerC"><a href="<?= base_url() ?>wholesale/view-quotation/"
                                   class="btn btn-lg btn-block orangeBg">Review Quotation <i
                            class="fa fa-arrow-circle-right"></i></a></li>
        </ul>
    </div>
</div>
