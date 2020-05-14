<!-- AA21 STARTS -->
<style>
.delivery_static_table tbody tr td{
        border:none !important;
  }
  .delivery_static_table1 tbody tr td{
        border:none !important;
        padding: 3px; 
  }
  .delivery_static_table_bottom tbody tr td{
        border:none !important;
  }

.label-text-collapse {
  color: #16b1e6 !important;
  text-shadow: none !important;
  font-size: 14px !important;
}
[data-toggle="collapse"].collapsed .if-not-collapsed {
  display: none;
}
[data-toggle="collapse"]:not(.collapsed) .if-collapsed {
  display: none;
}
</style>
<!-- AA21 STARTS -->

<div class="col-sm-4">

<!-- AA21 STARTS -->
    <div class="loader_Delivery">
        <div class="text-center loader_Delivery_inner">
            <img onerror="imgError(this);" src="<?= Assets ?>images\loader.gif" class="image loader_Delivery_inner_image" alt="AA Labels Loader">
        </div>
    </div>
<!-- AA21 ENDS -->

    <div class="panel-default">

        <!-- Default panel contents -->

        <?
        $integrated = $this->shopping_model->is_order_integrated();
        if ($integrated > 0) {
            $delivery_charges = $this->shopping_model->get_integrated_delivery_charges('GB');
            if (isset($delivery_charges) and !empty($delivery_charges)) {
                $delivery_charges = $delivery_charges * 1.2;
            }
        }
        ?>
        

    <!-- AA21 STARTS -->
    <div class="panel-heading" id="shippingCourier"> Shipping Method </div>
        <?php
          $class_DeliveryShow_Hide = "";
          $Message_Show_Hide = "";
          $shippingCourier = "";
          $courier_Show_Hide = "";
          $deliveryTable_bottom = "";

          // $this->session->unset_userdata('courier');
          
          // AA25 STARTS
            $sample = $this->shopping_model->is_order_sample();
          // AA25 ENDS
          $offshore = $this->product_model->offshore_delviery_charges();

          $deliveryCountry = $this->session->userdata['checkoutdata']['DeliveryCountry'];
          
          $class_DeliveryShow_Hide = " display:none; ";
          $Message_Show_Hide = " display:block; ";
          $shippingCourier = "Select Shipping";
          $courier_Show_Hide = " display:none; ";
          $deliveryTable_bottom = " display:none; ";

          // AA25 STARTS
          if( ($offshore['status'] != true) && ($deliveryCountry == 'United Kingdom') && ($sample != 'sample') )
          // AA25 ENDS
          {

            $shippingCourier = "Select Courier";
            $courierSelected = $this->session->userdata('courier');
            if($courierSelected && $courierSelected != '')
            {
              $class_DeliveryShow_Hide = " display:block; ";
              $Message_Show_Hide = " display:none; ";
              $shippingCourier = "Select Courier & Shipping Method";
              $deliveryTable_bottom = " display:block;";
            }
            $courier_Show_Hide = " display:block; ";
          }
          else
          {
              // $courierSelected = $this->session->unset_userdata('courier');
              $class_DeliveryShow_Hide = " display:block; ";
              $Message_Show_Hide = " display:none; ";
              $courier_Show_Hide = " display:none; ";
              $deliveryTable_bottom = " display:none; ";
          }?>
      
          <input type="hidden" name="offshore" id="offshore" value="<?php echo $offshore['status'];?>">
          <!-- AA25 STARTS -->
            <input type="hidden" name="orderstatus" id="orderstatus" value="<?php echo $sample;?>">
          <!-- AA25 ENDS -->

          <script>
            $("#shippingCourier").html('<?php echo $shippingCourier;?>');
          </script>

          <!-- AA27 STARTS -->
            <table style="<?php echo $courier_Show_Hide;?> padding:0px 0px;margin:8px; ">
          <!-- AA27 ENDS -->
            <tbody>
              <tr>


                  <td style="width: 116px;">
                  <label class="radio state-success">
                        <input type="radio" name="courier" value="Fedex" class="courier" <?php if($courierSelected == 'Fedex'){ echo "checked='checked'";}?> >
                        <i class="rounded-x"></i>FedEx
                    </label>
                    
                </td>
                
                <td>
                   <label class="radio state-success">
                        <input type="radio" name="courier" value="DPD" class="courier" <?php if($courierSelected == 'DPD'){ echo "checked='checked'";}?>>
                        <i class="rounded-x"></i>DPD
                    </label> 
                </td>

              

              </tr>
            </tbody>
          </table>
          
          <!-- AA27 STARTS -->
          <p style='<?php echo $Message_Show_Hide;?> padding: 0px 0px 0px 8px;  margin-bottom: 10px; color: #00b6f0; border-bottom: 1px solid #CCC;'>Please select above to view prices</p>
          <p style='<?php echo $Message_Show_Hide;?> padding: 0px 0px 4px 8px;  margin: 20px 0 0 0; cursor: pointer; text-decoration: underline; color: #00b6f0;font-size: 12px;' id="courierPrices" >Please select to view a comparison of available delivery options</p>
          <!-- AA27 ENDS -->
          
          <!-- AA27 STARTS -->
          <table class="table-bordered delivery_static_table" style="<?php echo $Message_Show_Hide;?> font-size: 12px !important;border: none;     margin-left: 5px;  display: none;">
          <!-- AA27 ENDS -->

              <tbody>
                
                <tr>
                  <td class="Heading_delivery_text">Customer Delivery Options</td>
                  <td class="Heading_delivery_text">DPD</td>
                  <td class="Heading_delivery_text">Fedex</td>
                </tr>

                <!-- AA27 STARTS -->
                <tr>
                  <td>Free Delivery 3-5 Working Days</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <!-- AA27 ENDS -->

                <tr>
                  <td>Next Working Day (08:00 - 18:00)</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Next Working Day - Pre 10:30</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Next Working Day - Pre 12:00</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Saturday (08:00 - 18:00)</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Saturday - Pre 10:30</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Saturday - Pre 12:00</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>


                <tr>
                  <td class="Heading_delivery_text" colspan="3">Customer Delivery Services</td>
                  
                  
                </tr>

                <tr>
                  <td>Delivery Tracking <small>(Provided with Confirmation of Despatch email.)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <!-- <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td> -->
                </tr>
                <tr>
                  <td>Redelivery Attempts (3)</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Email Notifications</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>SMS Notifications <small>(Providing a mobile number has been included)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>
                <tr>
                  <td>Delivery Hour</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>
                <tr>
                  <td>Online Proof of Delivery/Signature</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Online Proof of Delivery/Photo if delivered without signature.</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>
                <tr>
                  <td>Rearranged Delivery </td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>

                <tr>
                  <td class="Heading_delivery_text" colspan="3">Additional Services</td>
                  
                  
                </tr>

                <tr>
                  <td>GPS Tracking <small>(Driver Progress/Delivery Route Report)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                  <!-- <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td> -->
                </tr>
                <tr>
                  <td>Mobile Communication <small>(Driver Contact)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>

              </tbody>
          </table>
          <script>
              var slideFlag = 0;
              $("#courierPrices").click(function(){
                if(slideFlag == 0)
                {
                    $(".delivery_static_table").show();
                    slideFlag = 1;
                }
                else
                {
                    $(".delivery_static_table").hide();
                    slideFlag = 0;
                }

              });
          </script>
        <!-- AA21 ENDS -->


        <!-- AA21 STARTS -->
          <table class="table" style='<?php echo $class_DeliveryShow_Hide;?>' >
        <!-- AA21 ENDS -->
            <tbody>
            <?php
            $changeDrop = $this->session->userdata('changeDrop');
            $ServiceID = $this->session->userdata('ServiceID');
            $ServiceName = $this->session->userdata('ServiceName');
            $BasicCharges = $this->session->userdata('BasicCharges');
            $offshore = $this->product_model->offshore_delviery_charges();

            $delivery = $this->shopping_model->delevery($offshore);
            $xmass = $this->shopping_model->is_xmass_labels();
            $texvat = $this->shopping_model->total_order();
            $ship = number_format($texvat * 1.2, 2);
            $ship12 = ($texvat * 1.2);

            $sample = $this->shopping_model->is_order_sample();
            $printing = $this->shopping_model->printing_count_items();

            $virtual = $this->shopping_model->is_order_virtual();

            if ($sample == 'sample') {
                $this->session->set_userdata("ServiceName", "Free delivery 3 - 5 working days");
                $this->session->set_userdata("BasicCharges", "0.00");
                $this->session->set_userdata("ServiceID", "20");
                $BasicCharges = '0.00';
                $ServiceID = '20';
            } else if ($virtual == 'virtual') {
                $this->session->set_userdata("ServiceName", "Virtual Product (No Shipping)");
                $this->session->set_userdata("BasicCharges", "0.00");
                $this->session->set_userdata("ServiceID", "20");
                $BasicCharges = '0.00';
                $ServiceID = '20';
            } else if ($xmass > 0) {
                $this->session->set_userdata("ServiceName", "No charge Christmas Special Offer");
                $this->session->set_userdata("BasicCharges", "0.00");
                $this->session->set_userdata("ServiceID", "12");
                $BasicCharges = '0.00';
                $ServiceID = '12';
            } else if ($offshore['status'] == true) {
                /*$this->session->set_userdata("ServiceName", $offshore['type']);
                $this->session->set_userdata("BasicCharges", $offshore['charges']);
                $this->session->set_userdata("ServiceID", $offshore['serviceid']);
                $BasicCharges=$offshore['charges'];
                $ServiceID=$offshore['serviceid'];*/
            } else if ($printing > 0 && $ship12 < 25) {
                $this->session->set_userdata("BasicCharges", 6.00);
                $BasicCharges = 6.00;
                if (isset($delivery[0]) and $delivery[0]['BasicCharges'] == 0) {
                    $delivery[0]['BasicCharges'] = 6.00;
                    $delivery[0]['ServiceName'] = '3-5 working days delivery';
                }
            } else if ($ship12 < 25 && $ServiceID == '20' && $changeDrop != 1) {
                $this->session->set_userdata("ServiceID", "21");
                $basicCharges = $this->shopping_model->get_deliveryCharges("21");
                $this->session->set_userdata("BasicCharges", "$basicCharges");
                $BasicCharges = "$basicCharges";
            } else if ($ship12 < 25 && $ServiceID == '20' && $integrated > 0) {
                $this->session->set_userdata("ServiceID", "20");
            } else if ($ServiceID == '' && $ship12 > 25 && $changeDrop != 1 && $integrated == 0) {
                $this->session->set_userdata("BasicCharges", "0.00");
                $this->session->set_userdata("ServiceID", "20");
                $BasicCharges = '0.00';
                $ServiceID = '20';
            } else if ($ship12 > 25 && $changeDrop != 1) {
                $this->session->set_userdata("BasicCharges", "0.00");
                $this->session->set_userdata("ServiceID", "20");
                $BasicCharges = '0.00';
                $ServiceID = '20';
            } else if ($ship12 < 25 && $ServiceID == '20' && $changeDrop == 1) {
                $this->session->set_userdata("ServiceID", "19");
                $basicCharges = $this->shopping_model->get_deliveryCharges("19");
                $this->session->set_userdata("BasicCharges", $basicCharges);
                $BasicCharges = "$basicCharges";
            } else if ($ship12 > 25 && $ServiceID == '19' && $changeDrop == 1) {
                $this->session->set_userdata("ServiceID", "20");
                $basicCharges = $this->shopping_model->get_deliveryCharges("20");
                $this->session->set_userdata("BasicCharges", $basicCharges);
                $BasicCharges = "$basicCharges";
            } else if ($ServiceID == '' && $ship12 > 25 && $changeDrop == 1) {
                $this->session->set_userdata("BasicCharges", "0.00");
                $this->session->set_userdata("ServiceID", "20");
                $BasicCharges = '0.00';
                $ServiceID = '20';
            }
            if ($integrated > 0 and $ship <= 25 and $offshore['status'] == false) {
                $integrated_delivery = $this->shopping_model->get_shipping(20);
                array_unshift($delivery, $integrated_delivery);
            }
            $countryid = $this->session->userdata('countryid');
            $ServiceID = $this->session->userdata('ServiceID');

            if ($ServiceID == 20 and $integrated > 0 and $ship < 25) {
                $this->session->set_userdata("ServiceID", "19");
                $basicCharges = $this->shopping_model->get_deliveryCharges("19");
                $basicCharges += $delivery_charges;
                $this->session->set_userdata("BasicCharges", $basicCharges);
                $BasicCharges = "$basicCharges";
                $ServiceID = '19';
            }
            $i = 0;
            $count = count($delivery);
            foreach ($delivery as $key => $dele) {

                if ($integrated > 0 and $dele['ServiceID'] == 20 and $ship < 25) {
                    continue;
                }

                $checked = '';
                if ($dele['ServiceID'] == 19 and $integrated > 0 and $ship < 25) {
                    $dele['ServiceName'] = 'Delivery 3-5 Days (Integrated Labels)';
                } else if ($dele['ServiceID'] == 20 and $integrated > 0 and $ship > 25) {
                    $dele['ServiceName'] = 'Delivery 3-5 Days (Integrated Labels)';
                } else if ($dele['ServiceID'] == 20 and $virtual == 'virtual') {
                    $dele['ServiceName'] = 'Virtual Product (No Shipping)';
                }
                if ($ServiceID == $dele['ServiceID']) {
                    $checked = 'checked="checked"';
                }
                if ($integrated > 0) {
                    $dele['BasicCharges'] += $delivery_charges;
                }
                if ($i == 0) {
                    $basicCharges = $dele['BasicCharges'];
                    if ($BasicCharges == '' || $count == 1 || ($countryid == "Ireland" and $ServiceID == '' and $integrated > 0)) {
                        $this->session->set_userdata("BasicCharges", $basicCharges);
                        $this->session->set_userdata("ServiceID", $dele['ServiceID']);
                        $checked = 'checked="checked"';
                        $BasicCharges = $basicCharges;
                    }
                }
                ?>
                <tr>
                    <td><label class="radio state-success">
                            <input type="radio" id="delivery<?= $dele['ServiceID'] ?>"
                                   name="delivery_option" <?= $checked ?> value="<?= $dele['ServiceID'] ?>"
                                   class="delivery-group">
                            <i class="rounded-x"></i>
                            <?= ucfirst($dele['ServiceName']) ?>
                            <? if ($offshore['status'] == true || $dele['CountryID'] != 1) { ?>
                                <br/>
                                <small> (
                                    <?= $dele['ServiceDescription'] ?>
                                    )</small>
                            <? } ?>
                        </label></td>
                    <td style="text-align:right; width:12%;"><h4 class="textOrange">
                            <? $dele['BasicCharges'] = $this->home_model->currecy_converter($dele['BasicCharges'], 'no');
                            echo symbol . number_format($dele['BasicCharges'], 2); ?>
                        </h4></td>
                </tr>
                <?php $i++;
            } ?>
            <!-- <tr>
                <td colspan="2"><small>Deliveries are made Monday to Friday (excluding Public Holidays) and the above
                        delivery times are therefore working days.</small></td>
            </tr> -->
            </tbody>
        </table>


        <!-- AA27 STARTS -->
        <p style='<?php echo $deliveryTable_bottom;?> padding: 0px 0px 4px 8px;  margin-bottom: 10px; cursor: pointer; text-decoration: underline; color: #00b6f0; font-size: 12px;' id="courierPrices1" >Please select to view a comparison of available delivery options</p>
        <!-- AA27 ENDS -->
          
          <!-- AA27 STARTS -->
          <table class="table-bordered delivery_static_table1" style="<?php echo $deliveryTable_bottom;?> font-size: 12px !important;border: none;     margin-left: 5px; display: none;">
          <!-- AA27 ENDS -->
          
              <tbody>
                
                <tr>
                  <td class="Heading_delivery_text">Customer Delivery Options</td>
                  <td class="Heading_delivery_text">DPD</td>
                  <td class="Heading_delivery_text">Fedex</td>
                </tr>

                <!-- AA27 STARTS -->
                <tr>
                  <td>Free Delivery 3-5 Working Days</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <!-- AA27 ENDS -->


                <tr>
                  <td>Next Working Day (08:00 - 18:00)</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Next Working Day - Pre 10:30</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Next Working Day - Pre 12:00</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Saturday (08:00 - 18:00)</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Saturday - Pre 10:30</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Saturday - Pre 12:00</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>


                <tr>
                  <td class="Heading_delivery_text" colspan="3">Customer Delivery Services</td>
                  
                  
                </tr>

                <tr>
                  <td>Delivery Tracking <small>(Provided with Confirmation of Despatch email.)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <!-- <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td> -->
                </tr>
                <tr>
                  <td>Redelivery Attempts (3)</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Email Notifications</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>SMS Notifications <small>(Providing a mobile number has been included)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>
                <tr>
                  <td>Delivery Hour</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>
                <tr>
                  <td>Online Proof of Delivery/Signature</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>
                <tr>
                  <td>Online Proof of Delivery/Photo if delivered without signature.</td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>
                <tr>
                  <td>Rearranged Delivery </td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                </tr>

                <tr>
                  <td class="Heading_delivery_text" colspan="3">Additional Services</td>
                  
                  
                </tr>

                <tr>
                  <td>GPS Tracking <small>(Driver Progress/Delivery Route Report)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                  <!-- <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td> -->
                </tr>
                <tr>
                  <td>Mobile Communication <small>(Driver Contact)</small></td>
                  <td align="center"><i class="fa fa-check-circle" style="font-size: 15px;color: green;"></i></td>
                  <td align="center"><i class="fa fa-times-circle" style="font-size: 15px;color: red;"></i></td>
                </tr>

              </tbody>
          </table>
          <script>
              var slideFlag1 = 0;
              $("#courierPrices1").click(function(){
                if(slideFlag1 == 0)
                {
                    $(".delivery_static_table1").show();
                    slideFlag1 = 1;
                }
                else
                {
                    $(".delivery_static_table1").hide();
                    slideFlag1 = 0;
                }

              });
          </script>
        <!-- AA21 ENDS -->

    </div>
</div>
<div class="col-sm-4">
    <div class="panel-default">

        <!-- Default panel contents -->

        <div class="panel-heading">Shipping Charges</div>

        <!-- Table -->

        <table class="table">
            <tbody>
            <?php

            $BasicCharges = $this->home_model->currecy_converter($BasicCharges, 'no');
            if ($integrated > 0 and ($BasicCharges == '' || $BasicCharges == 0.00)) {
                $BasicCharges += $delivery_charges;
                $this->session->set_userdata('BasicCharges', $BasicCharges);
            }
            if ($BasicCharges != 0.00) {
                ?>
                <tr>
                    <td>Ex. Vat:
                        <h4 class="textOrange">
                            <?php /*?><?=symbol.number_format($BasicCharges+$IntBasicCharges/1.2,2);?><?php */
                            ?>
                            <?= symbol . number_format($BasicCharges / 1.2, 2); ?>
                        </h4></td>
                    <td style="text-align:right;">Inc. Vat:
                        <h4 class="textOrange">
                            <?php /*?><?=symbol.number_format($BasicCharges+$IntBasicCharges,2);?><?php */
                            ?>
                            <?= symbol . number_format($BasicCharges, 2); ?>
                        </h4></td>
                </tr>
            <? } ?>
            <tr>
                <td class="bg-info">Total Shipping Charges:</td>
                <td class="bg-info" style="text-align:right;"><h3 class="textBlue">
                        <?php /*?><?=symbol.number_format($BasicCharges+$IntBasicCharges,2)?><?php */ ?>
                        <?= symbol . number_format($BasicCharges, 2) ?>
                    </h3></td>
            </tr>
            </tbody>
        </table>
        <!-- AA21 STARTS -->
          <div>
            <small>Deliveries are made Monday to Friday (excluding Public Holidays) and the above delivery times are therefore working days.</small>
          </div>
        <!-- AA21 ENDS -->

    </div>
</div>
<?

if (isset($sample) and $sample == 'sample') {
    echo "<script>$('.paymentInputs11').hide();$('#confirmbtn').show(); var paymentoption = 'sample';</script>";
} else {
    echo "<script>var paymentoption = '';</script>";
}
if (isset($offshore['serviceid']) and $offshore['serviceid'] == 14 || $offshore['serviceid'] == 15) {
    echo "<script>$('#delivertimeynote').show();$('#offshoredeliverynote').show();$('.ukvatbox').hide();</script>";
} else if ($offshore['status'] == true) {
    echo "<script>$('#delivertimeynote').hide();$('#offshoredeliverynote').hide();</script>";
} else {
    echo "<script>$('#delivertimeynote').show();$('#offshoredeliverynote').hide();$('.ukvatbox').hide();</script>";
}
$charges = $this->session->userdata('BasicCharges');
if ($integrated > 0 and (!isset($charges) || $charges == 0 || $charges == '')) {

}
?>
<script>
    if (typeof reset_paypal_payments === "function") {
        reset_paypal_payments();
    }
</script> 
