<?php
/* Author: Arslan Javaid
   Date: 16-06-15 
*/

class Shopping extends CI_Controller
{

    function Shopping()
    {
        parent::__construct();
        $this->load->library('paypal');

    }

    function index()
    {

        $this->merge_plo_cart();

        $count = $this->shopping_model->cart_count();
        if ($count == 0) {
            redirect(base_url());
        }
        $data['cart_detail'] = $this->shopping_model->show_cart();
        $data['main_content'] = 'shopping/shopping';
        $this->load->view('page', $data);

    }

    function checkout()
    {

        $this->merge_plo_cart();

        $count = $this->shopping_model->cart_count();
        if ($count == 0) {
            redirect(base_url());
        }
        $worldpayerror = $this->session->userdata('worldpayerror');
        if (isset($worldpayerror) and $worldpayerror != '') {
            $this->home_model->save_log('worldpay_error', array('error' => $worldpayerror));
            $worldpayerror = $worldpayerror . ' <br />Unfortunately there was a problem with the 3DS authorising process and payment for your order has not been received. We apologise that this has occurred but if you contact our customer care team via the online chat facility, Tel. +44 (0)1733 588 390 during office hours (08:30 – 17:30GMT Monday – Friday), or email: customercare@aalabels.com They should be able to take payment and process your order for despatch, or alternatively provide details of other payment methods accepted.';
            $this->session->unset_userdata('worldpayerror', '');
            $data['errortype'] = 'payment';
            $data['error'] = $worldpayerror;
        }

        $payment_redirection = $this->session->userdata('payment_redirection');
        if (isset($payment_redirection) and $payment_redirection != '') {
            $this->session->unset_userdata('payment_redirection', '');
            $data['errortype'] = 'payment';
        }


        if ($_POST) {

            $usrid = $this->session->userdata('userid');
            if (empty($usrid)) {
                $this->form_validation->set_rules('email', 'Billing Email', 'trim|required|xss_clean|valid_email|is_unique[customers.UserEmail]');
            }

            $this->form_validation->set_rules('b_first_name', 'Billing First Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_last_name', 'Billing Last Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_phone_no', 'Billing Phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_fax', 'Billing Fax', 'trim|xss_clean');
            $this->form_validation->set_rules('b_pcode', 'Billing Postcode', 'trim|xss_clean');
            $this->form_validation->set_rules('b_add1', 'Billing Address1', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_city', 'Billing City', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_organization', 'Billing Company', 'trim|xss_clean');
            $this->form_validation->set_rules('b_county', 'Billing County', 'trim|required|xss_clean');

            $this->form_validation->set_rules('d_email', 'Delivery Email', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('d_first_name', 'Delivery First Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('d_last_name', 'Delivery Last Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('d_phone_no', 'Delivery Phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('d_fax', 'Delivery Fax', 'trim|xss_clean');
            $this->form_validation->set_rules('d_pcode', 'Delivery postcode', 'trim|xss_clean');

            $this->form_validation->set_rules('d_add1', 'Delivery Address1', 'trim|required|xss_clean');
            $this->form_validation->set_rules('d_city', 'Delivery City', 'trim|required|xss_clean');
            $this->form_validation->set_rules('d_organization', 'Delivery Company', 'trim|xss_clean');
            $this->form_validation->set_rules('d_county', 'Delivery County', 'trim|required|xss_clean');

            if ($this->form_validation->run() == false) {
                $data['error'] = validation_errors();

            } else {
                $orderNum = $this->session->userdata('OrderNumber');
                if (isset($orderNum) and $orderNum != '') {
                    $orderNum = array('OrderNumber' => '');
                    $this->session->set_userdata($orderNum);
                    unset($orderNum);
                }
                $paymentway = $this->input->get_post('paymentway');
                $sample = $this->shopping_model->is_order_sample();
                $this->shopping_model->add_order();
                if (isset($paymentway) && $paymentway == "creditCard" and $sample != 'sample') {
                    $data['errortype'] = 'payment';
                    $data['error'] = $this->worldpay();
                } else if (isset($paymentway) && $paymentway == "paypal" and $sample != 'sample') {
                    $data['errortype'] = 'payment';
                    $data['error'] = $this->capture_paypal_payment();
                    //$data['error'] = $this->paypal();
                    //redirect(SAURL.'shopping/payment-authorization/');
                } else {
                    redirect(SAURL . 'shopping/orderconfirmation');
                }
            }
        }

        $data['restofworld_list'] = $this->shopping_model->grouped_country_list('ROW');
        $data['europeunion_list'] = $this->shopping_model->grouped_country_list('EUROPEAN UNION');
        $data['europe_list'] = $this->shopping_model->grouped_country_list('EUROPE');


        /***************** Latest PayPal Integerations *********************/
        $sandbox_status = 'sandbox'; //sandbox
        if (SITE_MODE == 'live') {
            $sandbox_status = 'live';
        }
        $credentials = array('sandbox_status' => $sandbox_status);
        $this->load->library('rest_paypal', $credentials);
        $data['clientid'] = $this->rest_paypal->getclientid();
        $data['environment'] = $this->rest_paypal->environment();
        /**********************************************************************/


        $data['cart_detail'] = $this->shopping_model->show_cart();
        $data['main_content'] = 'shopping/checkout';
        $this->load->view('page', $data);

    }

    function orderConfirmation()
    {
        // $orderNum =  'AA58748';
        // $this->session->set_userdata('OrderNumber',$orderNum);

        $dele['orderCode'] = "";
        $this->session->unset_userdata($dele);
        $this->session->unset_userdata('orderCode');

        // AA21 STARTS
            $this->session->unset_userdata("courier");
        // AA21 ENDS

        // AA30 STARTS
            $status = $this->db->query("UPDATE voucherofferd_temp SET status = 0 WHERE SessionID = '".($this->session->userdata('session_id'))."' AND vc_type = 'fldt' ");
        // AA30 ENDS

        $orderNum = $this->session->userdata('OrderNumber');
        if (isset($orderNum) and $orderNum != '') {
            //if(SITE_MODE=='live'){
            $this->shopping_model->order_confirmation_email();
            //}
            $data['order'] = $this->shopping_model->order($orderNum);
            $data['order_detail'] = $this->shopping_model->order_detail($orderNum);
            $data['main_content'] = 'shopping/orderConfirm';
            $this->load->view('page', $data);
            $this->shopping_model->split_trade_order($orderNum);

        } else {
            redirect(base_url());
        }
    }

    function print_order($orderNum = NULL)
    {
        $orderNum = str_replace('SWSAPM', '', $orderNum);
        $data['order'] = $this->shopping_model->order($orderNum);
        $data['order_detail'] = $this->shopping_model->order_detail($orderNum);
        $this->load->view('shopping/print_order', $data);
    }


    function getOrder($order)
    {
        $query = $this->db->query("SELECT * FROM `orders` WHERE  OrderNumber LIKE '" . $order . "' ");
        $row = $query->row_array();
        return $row;
    }


    /********************  New payment integration methods*********************/
    function worldpay()
    {

        require_once(APPPATH . 'libraries/worldpay.php');

        $usrid = $this->session->userdata('userid');
        $creditcard = $this->input->post('creditcard');
        $token = $this->input->post('token');
        if (isset($creditcard) and $creditcard != '' and $creditcard != 'not-on-file' and $usrid != '') {
            $token = $this->input->post('creditcard');
        }

        if (isset($token) and $token != '') {

            $invoice_no = $this->session->userdata('OrderNumber');
            $orderInfo = $this->shopping_model->order($invoice_no);
            $amount = $orderInfo['OrderTotal'] + $orderInfo['OrderShippingAmount'];
            if (isset($orderInfo['vat_exempt']) and $orderInfo['vat_exempt'] == 'yes') {
                $amount = $amount / 1.2;
            }

            $amount = $this->home_model->currecy_converter($amount, 'no');
            $amount = round($amount * 100);

            try {
                $bcountryCode = $this->shopping_model->country_code($orderInfo['BillingCountry']);
                $dcountryCode = $this->shopping_model->country_code($orderInfo['DeliveryCountry']);
                
                 $billing_name = $orderInfo['BillingFirstName'].' '.$orderInfo['BillingLastName'];
                 $billing_name = $this->clean($billing_name);

                $worldpay = new Worldpay(WP_SERVICE_KEY);
                if (SITE_MODE != 'live') {
                    $worldpay->disableSSLCheck(true); //remove this line after live
                }
                
                
                
                
                
                 //'is3DSOrder' => true,

                $response = $worldpay->createOrder(array(
                    'token' => $token,
                    'amount' => $amount,
                    'currencyCode' => currency,
                    'name' => $billing_name,
                   
                    'orderDescription' => 'AAlabels Products',
                    'customerOrderCode' => $invoice_no,
                    'shopperEmailAddress' => $orderInfo['Billingemail'],
                    'billingAddress' => array(
                        'address1' => $orderInfo['BillingAddress1'],
                        'address2' => $orderInfo['BillingAddress2'],
                        'postalCode' => $orderInfo['BillingPostcode'],
                        'city' => $orderInfo['BillingTownCity'],
                        'state' => $orderInfo['BillingCountyState'],
                        'countryCode' => $bcountryCode,

                    ),
                    'deliveryAddress' => array(
                        'address1' => $orderInfo['DeliveryAddress1'],
                        'address2' => $orderInfo['DeliveryAddress2'],
                        'postalCode' => $orderInfo['DeliveryPostcode'],
                        'city' => $orderInfo['DeliveryTownCity'],
                        'state' => $orderInfo['DeliveryCountyState'],
                        'countryCode' => $dcountryCode,

                    ),

                ));

                $this->home_model->save_log('worldpay', $response);
                if (isset($response['redirectURL']) and ($response['paymentStatus'] == 'PRE_AUTHORIZED')) {

                    /************* Save Customer Card Details*******************/
                    $this->save_credit_card($token);
                    /**********************************************************/

                    $this->session->set_userdata('orderCode', $response['orderCode']);
                    //$oneTime3DsToken = $response['oneTime3DsToken'];
                   
                    $redirectURL = $response['redirectURL'];
                    $returnURL = SAURL . 'shopping/worldpaycallback/';

                    echo '<body onload="document.frm1.submit()">';
                    echo '<div style="margin:0 auto;width:50%; text-align:center; font-size:18px;">
								  <img src="' . Assets . 'images/loader.gif" width="160" height="43" class="image">
								  <p>This page should forward you to your own card issuer for identification. 
								  If your browser does not start loading the page, press the Submit button.</p>
								  <form name="frm1" method="POST" id="checkout_form" action="' . $redirectURL . '" >';
                     //echo '<input type="hidden" name="PaReq" value="' . $oneTime3DsToken . '" /> ';
                    echo '<input type="hidden" name="TermUrl" value="' . $returnURL . '" /> ';
                    echo '<input type="hidden" name="MD" value="' . $invoice_no . '" /> ';
                    echo '<button type="submit"> Submit</button>';
                    echo '</form></div></body>';
                    die();


                } else if (isset($response['paymentStatus']) && $response['paymentStatus'] == 'SUCCESS') {

                    /************* Save Customer Card Details*******************/
                    $this->save_credit_card($token);
                    /**********************************************************/


                    $orderInfo = $this->shopping_model->order($response['customerOrderCode']);
                    $amount = $orderInfo['OrderTotal'] + $orderInfo['OrderShippingAmount'];
                    if (isset($orderInfo['vat_exempt']) and $orderInfo['vat_exempt'] == 'yes') {
                        $amount = $amount / 1.2;
                    }


                    $array = array('type' => 'worldpay',
                        'OrderNumber' => $response['customerOrderCode'],
                        'payment' => $amount,
                        'time' => time());
                    $this->db->insert('order_payment_log', $array);


                    //$response['customerOrderCode'] = str_replace("-TEST","",$response['customerOrderCode']);
                    $this->db->where('OrderNumber', $response['customerOrderCode']);
                    $this->db->update("orders", array('OrderStatus' => 2, 'YourRef' => $response['orderCode'], 'Payment' => 1));
                    redirect(SAURL . 'shopping/orderconfirmation');
                } else {
                    return $response['paymentStatusReason'];
                }


            } catch (WorldpayException $e) {
                return $e->getMessage();
            }

        }
    }
    
    
    function clean($string)
    {

        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    }

    function worldpaycallback()
    {

        require_once(APPPATH . 'libraries/worldpay.php');

        if (isset($_POST['PaRes']) and $_POST['PaRes'] != '') {
            $orderCode = $this->session->userdata('orderCode');
            if (isset($orderCode) and $orderCode != '') {

                //	$dele['orderCode'] = "";
                //	$this->session->unset_userdata($dele);
                $worldpay = new Worldpay(WP_SERVICE_KEY);

                if (SITE_MODE != 'live') {
                    $worldpay->disableSSLCheck(true); //remove this line after live
                }
                try {

                    $response = $worldpay->getOrder($orderCode);
                    if (isset($response['paymentStatus']) && $response['paymentStatus'] != "SUCCESS") {

                        $response = $worldpay->authorise3DSOrder($orderCode, $_POST['PaRes']);
                        $this->home_model->save_log('worldpay_response', $response);
                        if (isset($response['paymentStatus']) && $response['paymentStatus'] == 'SUCCESS') {


                            if (isset($response['customerOrderCode']) and $response['customerOrderCode'] != '') {
                                $orderInfo = $this->shopping_model->order($response['customerOrderCode']);
                                $amount = $orderInfo['OrderTotal'] + $orderInfo['OrderShippingAmount'];
                                if (isset($orderInfo['vat_exempt']) and $orderInfo['vat_exempt'] == 'yes') {
                                    $amount = $amount / 1.2;
                                }

                                $array = array('type' => 'worldpay',
                                    'OrderNumber' => $response['customerOrderCode'],
                                    'payment' => $amount,
                                    'time' => time());
                                $this->db->insert('order_payment_log', $array);

                                $this->db->where('OrderNumber', $response['customerOrderCode']);
                                $this->db->update("orders", array('OrderStatus' => 2, 'YourRef' => $orderCode, 'Payment' => 1));
                            }


                            redirect(SAURL . 'shopping/orderconfirmation');

                        } else {
                            $this->session->set_userdata('worldpayerror', 'There was a problem authorising 3DS order ');
                        }

                    } else if (isset($response['paymentStatus']) && $response['paymentStatus'] == "SUCCESS") {
                        redirect(SAURL . 'shopping/orderconfirmation');
                    }

                } catch (WorldpayException $e) {
                    $this->session->set_userdata('worldpayerror', $e->getMessage());
                }
            }
        }
        redirect(SAURL . 'transactionregistration.php');

    }


    function paypal()
    {

        $paypal_credentials = array('API_username' => API_username,
            'API_password' => API_password,
            'API_signature' => API_signature,
            'sandbox_status' => sandbox_status);
        $this->load->library('paypal_ec', $paypal_credentials);

        $invoice_no = $this->session->userdata('OrderNumber');
        if (isset($invoice_no) and $invoice_no != '') {
            $orderInfo = $this->shopping_model->order($invoice_no);
            $data['order_detail'] = $this->shopping_model->order_detail($invoice_no);
            $data['order'] = $orderInfo;
            $amount = $orderInfo['OrderTotal'] + $orderInfo['OrderShippingAmount'];
            if (isset($orderInfo['vat_exempt']) and $orderInfo['vat_exempt'] == 'yes') {
                $amount = $amount / 1.2;
            }

            $amount = $this->home_model->currecy_converter($amount, 'no');
            $amount = number_format($amount, 2, ".", "");
            $to_buy = array(
                'desc' => "Payment recived against OrderNumber#" . $invoice_no,
                'currency' => currency,
                'jobid' => $invoice_no,
                'email' => $orderInfo['Billingemail'],
                'type' => 'sale',
                'return_URL' => base_url() . 'shopping/paypalcallback/',
                'cancel_URL' => base_url() . 'shopping/paypalcallback/',
                'get_shipping' => false);

            $temp_product = array(
                'name' => 'Labels from AAlabels',
                'quantity' => 1,
                'amount' => $amount);


            $to_buy['products'][] = $temp_product;
            $set_ec_return = $this->paypal_ec->set_ec($to_buy);
            if (isset($set_ec_return['ec_status']) && ($set_ec_return['ec_status'] === true)) {
                $this->paypal_ec->redirect_to_paypal($set_ec_return['TOKEN']);
            } else {
                return $this->session->userdata('curl_error_msg');
            }
        }
    }

    function paypalcallback()
    {

        $paypal_credentials = array('API_username' => API_username,
            'API_password' => API_password,
            'API_signature' => API_signature,
            'sandbox_status' => sandbox_status);
        $this->load->library('paypal_ec', $paypal_credentials);
        $token = $_GET['token'];


        if (isset($token) and $token != '') {
            $get_ec_return = $this->paypal_ec->get_ec($token);
            if (isset($get_ec_return['ec_status']) && ($get_ec_return['ec_status'] === true)) {
                $payer_id = (isset($_GET['PayerID']) and $_GET['PayerID'] != '') ? $_GET['PayerID'] : '';
                $ec_details = array(
                    'token' => $token,
                    'payer_id' => $payer_id,
                    'currency' => currency,
                    'amount' => $get_ec_return['PAYMENTREQUEST_0_AMT'],
                    'type' => 'sale');


                $do_ec_return = $this->paypal_ec->do_ec($ec_details);

                $invoice_no = $this->session->userdata('OrderNumber');
                $logdata = "<pre>\r\n" . print_r($do_ec_return, true) . '</pre>';
                $paypal_array = array('OrderNumber' => $invoice_no, 'PaypalStatus' => $logdata);
                $this->db->insert('paypal_status_debug', $paypal_array);

                if (isset($do_ec_return['ec_status']) && ($do_ec_return['ec_status'] === true)) {

                    $oldstatus = $this->home_model->get_db_column('orders', 'OrderStatus', 'OrderNumber', $invoice_no);
                    if (isset($invoice_no) and $invoice_no != '' and $oldstatus == 6) {

                        if ($do_ec_return['PAYMENTINFO_0_PAYMENTSTATUS'] == 'Completed') {
                            $this->db->where('OrderNumber', $invoice_no);
                            $this->db->update('orders', array('OrderStatus' => '2',
                                'YourRef' => $do_ec_return['PAYMENTINFO_0_TRANSACTIONID'],
                                'Payment' => 1));
                        } else if ($do_ec_return['PAYMENTINFO_0_PAYMENTSTATUS'] == 'Pending'
                            and $do_ec_return['PAYMENTINFO_0_PENDINGREASON'] == 'echeck') {

                            $this->db->where('OrderNumber', $invoice_no);
                            $this->db->update('orders', array('OrderStatus' => '61',
                                'YourRef' => $do_ec_return['PAYMENTINFO_0_TRANSACTIONID'],
                                'Payment' => 1));
                        }


                    }

                    redirect(SAURL . 'shopping/orderconfirmation');

                } else {
                    redirect(SAURL . 'transactionregistration.php');
                }
            } else {
                redirect(SAURL . 'transactionregistration.php');
            }
        } else {
            redirect(SAURL . 'transactionregistration.php');
        }

    }



    /********************  New payment integration methods*********************/

    /********************  New payment integration methods  *********************/
    private function save_credit_card($token)
    {
        $retain_cards = $this->input->post('retain_cards');
        if (isset($retain_cards) and $retain_cards == 1) {
            return;
        }
        $count = $this->home_model->get_db_column('saved_wp_tokens', 'count(*)', 'token', $token);
        if ($count == 0) {
            $usrid = $this->session->userdata('userid');
            $count = $this->home_model->get_db_column('saved_wp_tokens', 'count(*)', 'userid', $usrid);
            $default = 1;
            if ($count > 0) {
                $default = 0;
            }
            require_once(APPPATH . 'libraries/worldpay.php');
            $worldpay = new Worldpay(WP_SERVICE_KEY);
            if (SITE_MODE != 'live') {
                $worldpay->disableSSLCheck(true);
            } //remove this line after live
            try {
                $cardDetails = $worldpay->getStoredCardDetails($token);
                $validation = $this->check_existing_card($cardDetails, $token, $usrid);
                if ($validation == "false") {
                    $insert_array = array('userid' => $usrid,
                        'name' => $cardDetails['name'],
                        'expiryMonth' => $cardDetails['expiryMonth'],
                        'expiryYear' => $cardDetails['expiryYear'],
                        'cardIssuer' => $cardDetails['cardIssuer'],
                        'maskedCardNumber' => $cardDetails['maskedCardNumber'],
                        'cardType' => $cardDetails['cardType'],
                        'token' => $token,
                        'is_default' => $default);
                    $this->db->insert('saved_wp_tokens', $insert_array);
                }
            } catch (WorldpayException $e) {
            } catch (Exception $e) {
            }
        }
    }

    function check_card_for_user($usrid, $cardDetails)
    {
        return $this->db->query("select * from saved_wp_tokens where userid = $usrid and maskedCardNumber LIKE '" . $cardDetails . "' ")->result();
    }


    function check_existing_card($cardDetails, $token, $usrid)
    {
        $update = "false";
        $reponse = "false";
        $currentdate = $cardDetails['expiryYear'];
        $currentmonth = $cardDetails['expiryMonth'];

        $card = $this->check_card_for_user($usrid, $cardDetails['maskedCardNumber']);
        if (count($card) > 0) {
            $reponse = "true";

            foreach ($card as $row) {
                $carddate = $row->expiryYear;
                $cardmonth = $row->expiryMonth;

                if ($currentdate > $carddate) {
                    $update = "true";
                } else if ($currentdate == $carddate) {
                    if ($currentmonth > $cardmonth) {
                        $update = "true";
                    }
                }

                if ($update == "true") {
                    $array = array('expiryMonth' => $currentmonth, 'expiryYear' => $currentdate, 'token' => $token);
                    $this->db->where('ID', $row->ID);
                    $this->db->update('saved_wp_tokens', $array);
                }
            }
        }
        return $reponse;
    }

    /***********************************Paypal Hosted Solution ***********************************************/
    function hostedpaypal()
    {

        $this->load->library('paypal');
        $invoice_no = $this->session->userdata('OrderNumber');

        if (isset($invoice_no) and $invoice_no != '') {

            $orderInfo = $this->shopping_model->order($invoice_no);
            $data['order_detail'] = $this->shopping_model->order_detail($invoice_no);
            $data['order'] = $orderInfo;

            $amount = $orderInfo['OrderTotal'] + $orderInfo['OrderShippingAmount'];
            if (isset($orderInfo['vat_exempt']) and $orderInfo['vat_exempt'] == 'yes') {
                $amount = $amount / 1.2;
            }

            $this->paypal->setBtnVars("subtotal", $amount);
            $this->paypal->setBtnVars("description", $invoice_no);
            $this->paypal->setItemName("item_name", $invoice_no);
            $this->paypal->setBtnVars("custom", $invoice_no);

            $this->paypal->setBtnVars("billing_title", $orderInfo['BillingTitle']);
            $this->paypal->setBtnVars("billing_first_name", $orderInfo['BillingFirstName']);
            $this->paypal->setBtnVars("billing_last_name", $orderInfo['BillingLastName']);
            $this->paypal->setBtnVars("billing_address1", $orderInfo['BillingAddress1']);
            $this->paypal->setBtnVars("billing_address2", $orderInfo['BillingAddress2']);
            $this->paypal->setBtnVars("billing_city", $orderInfo['BillingTownCity']);
            $this->paypal->setBtnVars("billing_state", $orderInfo['BillingCountyState']);
            $this->paypal->setBtnVars("billing_zip", $orderInfo['BillingPostcode']);
            $this->paypal->setBtnVars("billing_company_name", $orderInfo['BillingCompanyName']);
            $this->paypal->setBtnVars("billing_fax", $orderInfo['Billingfax']);
            $this->paypal->setBtnVars("billing_telephone", $orderInfo['Billingtelephone']);

            $this->paypal->setBtnVars("title", $orderInfo['DeliveryTitle']);
            $this->paypal->setBtnVars("first_name", $orderInfo['DeliveryFirstName']);
            $this->paypal->setBtnVars("last_name", $orderInfo['DeliveryLastName']);
            $this->paypal->setBtnVars("address1", $orderInfo['DeliveryAddress1']);
            $this->paypal->setBtnVars("address2", $orderInfo['DeliveryAddress2']);
            $this->paypal->setBtnVars("city", $orderInfo['DeliveryTownCity']);
            $this->paypal->setBtnVars("state", $orderInfo['DeliveryCountyState']);
            $this->paypal->setBtnVars("zip", $orderInfo['DeliveryPostcode']);
            $this->paypal->setBtnVars("company_name", $orderInfo['DeliveryCompanyName']);
            $this->paypal->setBtnVars("fax", $orderInfo['Deliveryfax']);
            $this->paypal->setBtnVars("telephone", $orderInfo['Deliverytelephone']);
            $this->paypal->setBtnVars("return", base_url() . "shopping/hostedpaypalcallback/"); //add returnURL
            $this->paypal->setBtnVars("cancel_return", base_url() . "shopping/hostedpaypalcallback/"); //add cancel_return
            $this->paypal->setBtnVars("notify_url", base_url() . "shopping/hostedpaypalcallback/"); //add notify_url

            try {
                $data['_paypal'] = $this->paypal->getResult($invoice_no, "BMCreateButton");
            } catch (Exception $c) {
                echo 'Caught exception: ', $c->getMessage(), "\n";
            }

            $data['main_content'] = 'shopping/paypal';
            $this->load->view('page', $data);

        } else {
            redirect(base_url());
        }

    }


    function hostedpaypalcallback()
    {

        $invoice_no = $this->session->userdata('OrderNumber');
        if (isset($invoice_no) and $invoice_no != '') {
            $tx = $_REQUEST['tx'];


            $paypal_url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-synch&tx=' . $tx . '&at=sNEaxy6_4F-iLH8HJ7qVc9oy8yQLIGnsLP3LYL34IhSH9SNVAm3dzJSQtHK';
            //$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-synch&tx='.$tx.'&at=P1OOzjYxjohMejf5L0PAyI5Lybq2PIy7D0AM_mOzU7HtJuEGwB2YzoRmkau';

            $curl = curl_init($paypal_url);
            $data = array("cmd" => "_notify-synch", "tx" => $tx, "at" => "sNEaxy6_4F-iLH8HJ7qVc9oy8yQLIGnsLP3LYL34IhSH9SNVAm3dzJSQtHK");
            $data_string = json_encode($data);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            //curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 1);
            $headers = array('Content-Type: application/x-www-form-urlencoded', 'Host: www.paypal.com', 'Connection: close');
            curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($curl);
            $lines = explode("\n", $response);
            $keyarray = array();
            error_reporting(0);
            $paypal_array = array('OrderNumber' => $invoice_no, 'PaypalStatus' => $response);
            $this->db->insert('paypal_status_debug', $paypal_array);

            if (strcmp($lines[0], "SUCCESS") == 0) {

                for ($i = 1; $i < count($lines); $i++) {
                    list($key, $val) = explode("=", $lines[$i]);
                    $keyarray[urldecode($key)] = urldecode($val);
                }

                $oldstatus = $this->home_model->get_db_column('orders', 'OrderStatus', 'OrderNumber', $invoice_no);
                if (isset($invoice_no) and $invoice_no != '' and $oldstatus == 6) {

                    if ($keyarray['payment_status'] == "Completed") {
                        $this->db->where('OrderNumber', $invoice_no);
                        $this->db->update('orders', array('OrderStatus' => '2',
                            'YourRef' => $keyarray['txn_id'],
                            'Payment' => 1));
                    } else if ($keyarray['payment_status'] == 'Pending' and $keyarray['pending_reason'] == 'echeck') {
                        $this->db->where('OrderNumber', $invoice_no);
                        $this->db->update('orders', array('OrderStatus' => '61',
                            'YourRef' => $keyarray['txn_id'],
                            'Payment' => 1));
                    }
                }
                redirect(SAURL . 'shopping/orderconfirmation');

            } else {
                $this->session->set_userdata('paymentfailed', $invoice_no);
                redirect(base_url() . 'shopping');

                $dele['ServiceID'] = "";
                $dele['ServiceName'] = "";
                $dele['BasicCharges'] = "";
                $dele['OrderNumber'] = "";

                $this->session->unset_userdata($dele);
            }
        } else {
            redirect(base_url());
        }

    }

    /********************  New Paypal payment integration methods  *********************/

    function intialize_paypal_payment()
    {

        $response = array('response' => 404);
        if ($_POST) {

            $sandbox_status = 'live'; //sandbox
            if (SITE_MODE == 'live') {
                $sandbox_status = 'live';
            }
            $credentials = array('sandbox_status' => $sandbox_status);
            $this->load->library('rest_paypal', $credentials);
            $data['clientid'] = $this->rest_paypal->getclientid();


            $userid = $this->session->userdata('userid');
            $sessionid = $this->session->userdata('session_id');
            $ServiceID = $this->session->userdata('ServiceID');

            if (isset($userid) && !empty($userid)) {
                $userid = $userid;
            } else {
                $userid = "";
            }
            if (isset($ServiceID) && !empty($ServiceID)) {
                $ServiceID = $ServiceID;
            } else {
                $ServiceID = "21";
            }
            if (isset($BasicCharges) && !empty($BasicCharges)) {
                $BasicCharges = $BasicCharges;
            } else {
                $BasicCharges = "6.00";
            }

            $amount = $this->shopping_model->total_order();
            $amount = $amount * 1.2;

            $BasicCharges = $this->session->userdata('BasicCharges');
            $voucher = '';


            $black_friday = $this->shopping_model->check_black_friday_offer($amount);
            if ($black_friday['status'] == false) {
                $wtp_discount = $this->shopping_model->wtp_discount_applied_on_order();
                if (isset($userid) and $userid != '') {
                    $voucher = $this->shopping_model->order_discount_applied();
                }
            }
            if ($black_friday['status'] == true) {
                $discount_offer = $black_friday['discount_offer'];
                $voucherOfferd = 'Yes';
            } else if ($voucher) {
                $discount_offer = $voucher['discount_offer'];
                $voucherOfferd = 'Yes';
            } else if ($wtp_discount) {
                $discount_offer = $wtp_discount['discount_offer'];
                $voucherOfferd = 'Yes';
            } else {
                $discount_offer = 0.00;
                $voucherOfferd = 'No';
            }

            $amount = $amount - $discount_offer + $BasicCharges;


            $b_pcode = strtoupper($this->input->post('b_pcode'));
            $d_pcode = strtoupper($this->input->post('d_pcode'));

            $billing_postcode = strtoupper(substr($b_pcode, 0, 2));
            $delivery_postcode = strtoupper(substr($d_pcode, 0, 2));
            $vat_exempt = '';

            $VALIDVAT = $this->session->userdata('vat_exemption');
            if (isset($VALIDVAT) and $VALIDVAT == 'yes' and $dcountry != 'United Kingdom') {
                $vat_exempt = 'yes';
            } else if ($billing_postcode == $delivery_postcode and (strtoupper($delivery_postcode) == 'JE' || strtoupper($delivery_postcode) == 'GY')) {
                $vat_exempt = 'yes';
            }

            if (isset($vat_exempt) and $vat_exempt == 'yes') {
                $amount = $amount / 1.2;
            }

            //$amount = number_format($amount,2,".","");

            $usrid = $this->session->userdata('userid');
            if (isset($usrid) && $usrid != '') {
                $b_email = $this->shopping_model->user_email();
            } else {
                $b_email = $this->input->post('email');
            }


            $amount = $this->home_model->currecy_converter($amount, 'no');
            $amount = number_format($amount, 2, ".", "");


            $data_array = array('description' => "Payment Against Customer:" . $b_email,
                'total' => $amount,
                'currency' => currency,
                'item_name' => "AA Labels Products",
                'cancel_url' => base_url(),
                'return_url' => base_url(),);
            $expressCheckoutdata = $this->rest_paypal->expressCheckoutdata($data_array);
            $access_token = $this->rest_paypal->getAccessToken();

            $this->session->set_userdata('access_token', $access_token);
            $paymentid = $this->rest_paypal->getPaymentID($access_token, $expressCheckoutdata);
            $response = array('response' => 200, 'paymentID' => $paymentid);
            //$approval_url = $this->rest_paypal->getApprovalURL($access_token , $expressCheckoutdata );
            //$response = array('response'=>200,'url'=>$approval_url);
        }
        echo json_encode($response);
    }

    function capture_paypal_payment()
    {


        if ($_POST) {
            $PayerID = $this->input->post('PayerID');
            $paymentID = $this->input->post('paymentID');
            if (isset($PayerID) and $PayerID != '' and isset($paymentID) and $paymentID != '') {
                $sandbox_status = 'live'; //sandbox
                if (SITE_MODE == 'live') {
                    $sandbox_status = 'live';
                }
                $credentials = array('sandbox_status' => $sandbox_status);
                $this->load->library('rest_paypal', $credentials);
                $result = $this->rest_paypal->doPayment($paymentID, $PayerID, NULL);

                $invoice_no = $this->session->userdata('OrderNumber');
                $logdata = "<pre>\r\n" . print_r($result, true) . '</pre>';
                $paypal_array = array('OrderNumber' => $invoice_no, 'PaypalStatus' => $logdata);
                $this->db->insert('paypal_status_debug', $paypal_array);

                if ($result['http_code'] == 200 || $result['http_code'] == 201) {
                    $state = $result['json']['transactions'][0]['related_resources'][0]['sale']['state']; //completed
                    $txn_id = $result['json']['id'];

                    //$oldstatus = $this->home_model->get_db_column('orders','OrderStatus', 'OrderNumber',$invoice_no);
                    if (isset($invoice_no) and $invoice_no != '') {

                        $reason_code = $result['json']['transactions'][0]['related_resources'][0]['sale']['reason_code']; //completed

                        if ($state == 'completed') {


                            $orderInfo = $this->shopping_model->order($invoice_no);
                            $amount = $orderInfo['OrderTotal'] + $orderInfo['OrderShippingAmount'];

                            if (isset($orderInfo['vat_exempt']) and $orderInfo['vat_exempt'] == 'yes') {
                                $amount = $amount / 1.2;
                            }

                            $array = array('type' => 'paypal',
                                'OrderNumber' => $invoice_no,
                                'payment' => $amount,
                                'time' => time());
                            $this->db->insert('order_payment_log', $array);


                            $this->db->where('OrderNumber', $invoice_no);
                            $this->db->update('orders', array('OrderStatus' => '2',
                                'YourRef' => $txn_id,
                                'Payment' => 1));
                        } else if ($state == 'pending' and $reason_code == 'ECHECK') {

                            $this->db->where('OrderNumber', $invoice_no);
                            $this->db->update('orders', array('OrderStatus' => '6',
                                'PaymentMethods' => 'PayPal eCheque',
                                'YourRef' => $txn_id,
                                'Payment' => 1));
                        }

                        redirect(SAURL . 'shopping/orderconfirmation');

                    }
                } else {

                    $this->session->set_userdata('worldpayerror', 'There is a problem to authorising the payment ');
                }
            } else {

                $this->session->set_userdata('worldpayerror', 'There is a problem to authorising the payment ');
                redirect(SAURL . 'transactionregistration.php');
            }

        }


        redirect(SAURL . 'transactionregistration.php');


    }

    /***************************************************************************/

    function merge_plo_cart()
    {
        $plo_sessionID = $_COOKIE['ci_session_plo'];
        $redirect_from = $_GET['redirectfrom'];

        if (isset($plo_sessionID) and $plo_sessionID != '') {
            $this->db->where('id', $plo_sessionID);
            $sess_data = $this->db->get('ci_session_plo')->row()->data;
            $sess_data = unserialize(serialize($sess_data));

            $aa_sessionID = $this->shopping_model->sessionid();

            $update_data = array();
            $update_data['SessionID'] = $aa_sessionID;

            $where = "SessionID = '$plo_sessionID'";
            $this->db->where($where);
            $this->db->update('temporaryshoppingbasket', $update_data);
            $this->db->update('integrated_attachments', $update_data);

            $plo_loggedin_user = $_COOKIE['plo_loggedin_user'];
            if (isset($plo_loggedin_user) and $plo_loggedin_user != '') {
                $username = $this->home_model->get_db_column('customers', 'BillingFirstName', 'UserID', $plo_loggedin_user);
                $newdata = array(
                    'userid' => $plo_loggedin_user,
                    'UserName' => $username,
                    'logged_in' => true,
                    'user_type' => 'trade',
                );
                $this->session->set_userdata($newdata);
            }
        }
        $redirect_from = $_COOKIE['redirectfrom'];
        if (isset($redirect_from) and $redirect_from == "plo") {
            $this->session->set_userdata("redirect_from", "plo");
        }
    }


    //end of Controller class
}
