<?php

class Shopping_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function sessionid()
    {
        return $this->session->userdata('session_id');

        $oldsessid = $this->session->userdata('session_id');
        $newsessid = $this->session->userdata('newsession_id');

        if ($newsessid == "") {
            $newsessid = $this->session->set_userdata('newsession_id', $oldsessid);
        }
        return $newsessid;


    }

    function show_quotation_basket()
    {
        $qry = $this->db->query("SELECT * FROM tempquotationbasket WHERE SessionID = '" . $this->sessionid() . "' ORDER BY `tempquotationbasket`.`ID`  ASC");
        return $qry->result();
    }

    function total_order()
    {
        $price = $this->db->query("SELECT sum(`TotalPrice`+`Print_Total`) as amount FROM temporaryshoppingbasket WHERE SessionID = '" . $this->sessionid() . "'");
        $res = $price->result();
        return $res[0]->amount;
    }

    function cart_count()
    {
        $qry = $this->db->query("SELECT count(*) as total FROM temporaryshoppingbasket WHERE SessionID = '" . $this->sessionid() . "' ORDER BY `temporaryshoppingbasket`.`ID`  ASC");
        $row = $qry->row_array();
        return $row ['total'];
    }

    function show_cart()
    {
        $qry = $this->db->query("SELECT * FROM temporaryshoppingbasket WHERE SessionID = '" . $this->sessionid() . "' ORDER BY `temporaryshoppingbasket`.`ID`  ASC");
        return $qry->result();
    }

    function show_product($pid)
    {
        $qry = $this->db->query("SELECT * FROM products WHERE ProductID  = " . $pid . "");
        return $qry->result_array();
    }

    function delete_product_cart($id)
    {

        $qry = $this->db->query("DELETE FROM temporaryshoppingbasket WHERE ID = $id AND SessionID = '" . $this->sessionid() . "'");
        if ($qry) {
            $qry = $this->db->query("DELETE FROM integrated_attachments WHERE CartID = $id AND SessionID = '" . $this->sessionid() . "'");
            return true;
        }
    }

    function get_deliveryCharges($id)
    {
        $qry = $this->db->query("select `BasicCharges` from `shippingservices` where `ServiceID` = '" . $id . "'");
        $res = $qry->result();
        return $res[0]->BasicCharges;
    }

    function delevery($offshore = NULL)
    {
        $amount = $this->total_order();

        $amount = $amount * 1.2;
        $xmass = $this->shopping_model->is_xmass_labels();
        $printing = $this->printing_count_items();
        $sample = $this->is_order_sample();
        $lba = $this->calculate_lba_in_cart();
        $virtual = $this->is_order_virtual();
        $integrated = $this->is_order_integrated();
        if (($sample == 'sample' || $lba == 'lba' || $virtual == 'virtual') || ($printing > 0 && $offshore['status'] == false)) {
            // AA27 STARTS
                $qry = $this->db->query("select * from shippingservices where ServiceID=20 order by sorting asc");
            // AA27 ENDS
            // AA21 STARTS
                $delivery = $qry->result_array();
                $delivery = $this->getCourierDeliveryCharges($delivery);
                return $delivery;
            // AA21 ENDS
        }
        if ($integrated > 0) {
            $delivery_charges = $this->shopping_model->get_integrated_delivery_charges();
        }
        if ($xmass > 0) {
            // AA27 STARTS
                $qry = $this->db->query("select * from shippingservices where ServiceID=12 order by sorting asc");
            // AA27 ENDS

            return $qry->result_array();
        } else if ($offshore['status'] == true) {

            $condtion = '';
            $serviceid = $offshore['serviceid'];
            $countryid = $this->session->userdata('countryid');

            if (isset($serviceid) and ($serviceid == 13 || $serviceid == 14 || $serviceid == 15)) {
                if ($serviceid == 15) {
                    $freeorder_over = 100;
                } //UK Exception Postcodes
                else if ($serviceid == 13 || $serviceid == 14) {
                    $freeorder_over = 75;
                } //Offshore postcodes
            } else {
                $freeorder_over = $this->home_model->get_db_column('shippingcountries', 'freeorder_over', 'ID', $serviceid);
            }
            if ($amount < $freeorder_over || $integrated > 0) {
                $condtion = ' AND BasicCharges > 0 ';
            }
            $qry = $this->db->query("select * from shippingservices where CountryID=$serviceid $condtion order by BasicCharges asc");
            $result = $qry->result_array();

            if ($printing > 0 && $serviceid == 11 && $amount > 75.00) {
                unset($result[2]);
            } else if ($printing > 0 && $serviceid == 11 && $amount < 75.00) {
                unset($result[1]);
            }

            return $result;
            //$countryid = $this->session->userdata('countryid');
        } else if ($amount < 25.00) {

            // AA27 STARTS
                $qry = $this->db->query("select * from shippingservices where ServiceID!=20 AND CountryID = '1' order by sorting asc");
            // AA27 ENDS

            // AA21 STARTS
                $delivery = $qry->result_array();
                $delivery = $this->getCourierDeliveryCharges($delivery);
                return $delivery;
            // AA21 ENDS

        } else {

            $printing = $this->printing_count_items();
            $lba = $this->calculate_lba_in_cart();
            $virtual = $this->is_order_virtual();

            if ($printing > 0 || $lba == 'lba' || $virtual == 'virtual') {
                $qry = $this->db->query("select * from shippingservices where ServiceID=20");
                // AA21 STARTS
                    $delivery = $qry->result_array();
                    $delivery = $this->getCourierDeliveryCharges($delivery);
                    return $delivery;
                // AA21 ENDS
            } else {
                
                // AA27 STARTS
                    $qry = $this->db->query("select * from shippingservices where CountryID = '1' and ServiceID !=19 order by sorting asc");
                // AA27 ENDS

                // AA21 STARTS
                    $delivery = $qry->result_array();
                    $delivery = $this->getCourierDeliveryCharges($delivery);
                    return $delivery;
                // AA21 ENDS
            }
        }
    }

    // AA21 STARTS
        function getCourierDeliveryCharges($delivery)
        {
            $courier = $this->session->userdata('courier');
            if( (isset($courier) && $courier == 'DPD') && count($delivery) > 0)
            {
                foreach ($delivery as $key => $eachDelivery)
                {
                    if($delivery[$key]['BasicCharges'] > 0){
                        $delivery[$key]['BasicCharges'] = number_format( ($eachDelivery['BasicCharges']+1) , 2);
                    }else{
                        $delivery[$key]['BasicCharges'] = number_format( ($eachDelivery['BasicCharges']) , 2);
                    }
                }
            }
            return $delivery;
        }
    // AA21 ENDS

    function delevery_old($offshore = NULL)
    {

        $amount = $this->total_order();
        $amount = $amount * 1.2;
        $xmass = $this->shopping_model->is_xmass_labels();
        $printing = $this->printing_count_items();
        $sample = $this->is_order_sample();
        $lba = $this->calculate_lba_in_cart();
        $integrated = $this->is_order_integrated();
        if (($sample == 'sample' || $lba == 'lba') || ($printing > 0 && $offshore['status'] == false)) {

            $qry = $this->db->query("select * from shippingservices where ServiceID=20");
            return $qry->result_array();
        }
        if ($integrated > 0) {
            $delivery_charges = $this->shopping_model->get_integrated_delivery_charges();
        }
        if ($xmass > 0) {
            $qry = $this->db->query("select * from shippingservices where ServiceID=12");
            return $qry->result_array();
        } else if ($offshore['status'] == true) {

            $condtion = '';
            $serviceid = $offshore['serviceid'];
            $countryid = $this->session->userdata('countryid');

            if (isset($serviceid) and ($serviceid == 13 || $serviceid == 14 || $serviceid == 15)) {
                if ($serviceid == 15) {
                    $freeorder_over = 100;
                } //UK Exception Postcodes
                else if ($serviceid == 13 || $serviceid == 14) {
                    $freeorder_over = 75;
                } //Offshore postcodes
            } else {
                $freeorder_over = $this->home_model->get_db_column('shippingcountries', 'freeorder_over', 'ID', $serviceid);
            }
            if ($amount < $freeorder_over || $integrated > 0) {
                $condtion = ' AND BasicCharges > 0 ';
            }
            $qry = $this->db->query("select * from shippingservices where CountryID=$serviceid $condtion order by BasicCharges asc");
            $result = $qry->result_array();
            return $result;
            //$countryid = $this->session->userdata('countryid');
        } else if ($amount < 25.00) {
            $qry = $this->db->query("select * from shippingservices where ServiceID!=20 AND CountryID = '1' order by ServiceID asc");
            return $qry->result_array();
        } else {
            $printing = $this->printing_count_items();
            $lba = $this->calculate_lba_in_cart();
            if ($printing > 0 || $lba == 'lba') {
                $qry = $this->db->query("select * from shippingservices where ServiceID=20");
                return $qry->result_array();

            } else {
                $qry = $this->db->query("select * from shippingservices where CountryID = '1' order by ServiceID asc");
                return $qry->result_array();
            }
        }
    }

    function delevery_txt()
    {

        $amount = $this->total_order();
        $amount = $amount * 1.2;
        if ($amount < 25.00) {

            //$delivery_txt = 'Delivery Free over &pound;25.00 ';
            $price = $this->home_model->currecy_converter(25, 'no');
            $delivery_txt = 'Delivery Free over ' . symbol . $price . ' (inc. VAT) 3 - 5 working day service.';
        } else {

            $delivery_txt = ' Free delivery available ';
        }

        return $delivery_txt;

    }

    function order($orderNum)
    {

        $result_qry = $this->db->query("SELECT * FROM orders  WHERE OrderNumber = '$orderNum'  ");
        $result = $result_qry->row_array();
        return $result;
    }

    function order_detail($orderNum)
    {

        $result_qry = $this->db->query(" SELECT * FROM orderdetails  WHERE  ( OrderNumber = '$orderNum' OR OrderNumber LIKE '" . $orderNum . "-S' ) ");
        $result = $result_qry->result_array();
        return $result;
    }

    function customize_image_name($pid)
    {
         $qry = $this->db->query("SELECT Image1 FROM products WHERE ProductID  =  $pid"  );
         return $qry->result_array();

    }

    function get_shipping($id)
    {
        $qry = $this->db->query("SELECT * FROM shippingservices WHERE ServiceID  =  $id ");
        return $qry->row_array();

    }


    function last_order($userId)
    {
        $qry = $this->db->query("SELECT `OrderNumber` FROM `orders` WHERE `UserID` = $userId ORDER BY `OrderDate` DESC Limit 0,1");
        $res = $qry->result();
        return $res;
    }

    function user_email()
    {
        $id = $this->session->userdata('userid');
        $qry = $this->db->query("select UserEmail from customers where UserID='" . $id . "'");
        $res = $qry->result();
        return $res[0]->UserEmail;
    }

    function product_name($pid)
    {
        $qry = $this->db->query("SELECT ProductCategoryName FROM `products` WHERE `ProductID` = '$pid'");
        return $qry->result_array();
    }

    function add_order()
    {

        $usrid = $this->session->userdata('userid');

        if (isset($usrid) && $usrid != '') {
            $b_email = $this->user_email();
        } else {
            $b_email = $this->input->post('email');
        }

        $newsletter = $this->input->post('newslwtter_value');
        if (isset($newsletter) and $newsletter == 'on') {
            $this->home_model->newsletter($b_email);
        }


        $b_pcode = strtoupper($this->input->post('b_pcode'));
        $d_pcode = strtoupper($this->input->post('d_pcode'));

        $b_first_name = ucwords($this->input->post('b_first_name'));
        $b_last_name = ucwords($this->input->post('b_last_name'));
        $b_add1 = ucwords($this->input->post('b_add1'));
        $b_add2 = ucwords($this->input->post('b_add2'));
        $b_city = ucwords($this->input->post('b_city'));
        $b_organization = ucwords($this->input->post('b_organization'));
        $b_county = ucwords($this->input->post('b_county'));
        $d_first_name = ucwords($this->input->post('d_first_name'));
        $d_last_name = ucwords($this->input->post('d_last_name'));
        $d_organization = ucwords($this->input->post('d_organization'));
        $d_add1 = ucwords($this->input->post('d_add1'));
        $d_add2 = ucwords($this->input->post('d_add2'));
        $d_city = ucwords($this->input->post('d_city'));
        $d_county = ucwords($this->input->post('d_county'));


        $billing_title = $this->input->post('billing_title');
        $b_phone_no = $this->input->post('b_phone_no');
        $b_fax = $this->input->post('b_fax');
        $b_ResCom = $this->input->post('b_ResCom');
        $delivery_val = $this->input->post('delivery_val');
        $delivery_title = $this->input->post('title_d');
        $d_email = $this->input->post('d_email');
        $d_phone_no = $this->input->post('d_phone_no');
        $d_fax = $this->input->post('d_fax');
        $d_ResCom = $this->input->post('d_ResCom');
        $paymentway = $this->input->post('paymentway');
        $country = $this->input->post('country');
        $dcountry = $this->input->post('dcountry');
        $second_email = $this->input->post('second_email');


        $b_mobile = $this->input->post('b_mobile');
        $d_mobile_no = $this->input->post('d_mobile_no');


        /* IF set when user already login */
        if (isset($usrid) and $usrid != '') {

            $data = array('BillingTitle' => $billing_title,
                'BillingFirstName' => $b_first_name,
                'BillingLastName' => $b_last_name,
                'BillingAddress1' => $b_add1,
                'BillingTownCity' => $b_city,
                'BillingCountyState' => $b_county,
                'BillingPostcode' => $b_pcode,
                'BillingResCom' => $b_ResCom,
                'DeliveryTitle' => $delivery_title,
                'DeliveryFirstName' => $d_first_name,
                'DeliveryLastName' => $d_last_name,
                'DeliveryAddress1' => $d_add1,
                'DeliveryTownCity' => $d_city,
                'DeliveryCountyState' => $d_county,
                'DeliveryPostcode' => $d_pcode,
                'DeliveryResCom' => $d_ResCom,
                'Deliveryemail' => $d_email,
                'BillingCountry' => $country,
                'DeliveryCountry' => $dcountry,
                'DeliveryAddress2' => $d_add2,
                'BillingAddress2' => $b_add2);


            if ($b_fax) {
                $data = array_merge($data, array('Billingfax' => $b_fax));
            }
            if ($b_organization) {
                $data = array_merge($data, array('BillingCompanyName' => $b_organization));
            }
            if ($b_phone_no) {
                $data = array_merge($data, array('Billingtelephone' => $b_phone_no));
            }

            if ($d_fax) {
                $data = array_merge($data, array('Deliveryfax' => $d_fax));
            }
            if ($d_organization) {
                $data = array_merge($data, array('DeliveryCompanyName' => $d_organization));
            }
            if ($d_phone_no) {
                $data = array_merge($data, array('Deliverytelephone' => $d_phone_no));
            }
            if ($second_email) {
                $data = array_merge($data, array('SecondaryEmail' => $second_email));
            }

            if ($b_mobile) {
                $data = array_merge($data, array('BillingMobile' => $b_mobile));
            }
            if ($d_mobile_no) {
                $data = array_merge($data, array('DeliveryMobile' => $d_mobile_no));
            }

            $delivery_address = array();
            $delivery_address['UserID'] = $usrid;
            $delivery_address['DeliveryTitle'] = $delivery_title;
            $delivery_address['DeliveryFirstName'] = $d_first_name;
            $delivery_address['DeliveryLastName'] = $d_last_name;
            if ($d_organization) {
                $delivery_address = array_merge($delivery_address, array('DeliveryCompanyName' => $d_organization));
            }
            $delivery_address['DeliveryAddress1'] = $d_add1;
            $delivery_address['DeliveryAddress2'] = $d_add2;
            $delivery_address['DeliveryTownCity'] = $d_city;
            $delivery_address['DeliveryCountyState'] = $d_county;
            $delivery_address['DeliveryPostcode'] = $d_pcode;
            $delivery_address['DeliveryCountry'] = $dcountry;
            $delivery_address['DeliveryMobile'] = $d_mobile_no;

            if ($d_phone_no) {
                $delivery_address = array_merge($delivery_address, array('DeliveryTelephone' => $d_phone_no));
            }
            if ($d_fax) {
                $delivery_address = array_merge($delivery_address, array('DeliveryFax' => $d_phone_no));
            }

            if ($d_fax) {
                $delivery_address = array_merge($delivery_address, array('DeliveryFax' => $d_fax));
            }
            $addresses = $this->shopping_model->get_user_addresses($usrid);
            if (count($addresses) == 0) {
                $delivery_address['DeliveryEmail'] = $d_email;
                $this->db->insert('customerdeliverydetails', $delivery_address);
            }

            $this->db->where('UserID', $usrid);
            $this->db->update('customers', $data);


        } else {

            $password = trim($this->input->post('re_customer_password'));
            $data = array('UserTypeID' => '14',
                'UserEmail' => $b_email,
                'UserName' => $b_first_name,
                'BillingTitle' => $billing_title,
                'BillingFirstName' => $b_first_name,
                'BillingLastName' => $b_last_name,
                'BillingCompanyName' => $b_organization,
                'BillingAddress1' => $b_add1,
                'BillingAddress2' => $b_add2,
                'BillingTownCity' => $b_city,
                'BillingCountyState' => $b_county,
                'BillingPostcode' => $b_pcode,
                'Billingtelephone' => $b_phone_no,
                'Billingfax' => $b_fax,
                'BillingResCom' => $b_ResCom,
                'DeliveryTitle' => $delivery_title,
                'DeliveryFirstName' => $d_first_name,
                'DeliveryLastName' => $d_last_name,
                'DeliveryCompanyName' => $d_organization,
                'DeliveryAddress1' => $d_add1,
                'DeliveryAddress2' => $d_add2,
                'DeliveryTownCity' => $d_city,
                'DeliveryCountyState' => $d_county,
                'DeliveryPostcode' => $d_pcode,
                'Deliverytelephone' => $d_phone_no,
                'Deliveryfax' => $d_fax,
                'DeliveryResCom' => $d_ResCom,
                'Deliveryemail' => $d_email,
                'UserPassword' => md5($password),
                'RegisteredDate' => date('Y-m-d'),
                'RegisteredTime' => date('H:i:s'),
                'BillingCountry' => $country,
                'DeliveryCountry' => $dcountry,
                'SecondaryEmail' => $second_email,
                'DeliveryMobile' => $d_mobile_no,
                'BillingMobile' => $b_mobile
            );
            $this->db->insert('customers', $data);
            $uid = $this->db->insert_id();

            $newdata = array('userid' => $uid, 'UserName' => $b_first_name, 'logged_in' => true);
            $this->session->set_userdata($newdata);
            //new code
            $session_id = $this->session->userdata('session_id');
            $this->db->update('flash_user_design', array('UserID' => $userid), array('SID' => $session_id, 'UserID' => 0));
        }

        /*
		$qry = $this->db->query("SELECT maX( `OrderNumber` ) AS OrderNumver  FROM `ordernumber` WHERE 1 ");
		$res = $qry->result_array();
		$last_num = $res[0]['OrderNumver'];
		$order_num = $last_num+1;
		$this->db->query("INSERT INTO ordernumber (OrderNumber) VALUE('$order_num')");
		*/


        $sessionid = $this->session->userdata('session_id');
        $this->db->insert('auto_ordernumber', array('session_id' => $sessionid));
        $order_num = $this->db->insert_id();


        //$OrderNumber = 'AA'.$order_num;
        $user_type = $this->session->userdata('user_type');
        if ($user_type == 'trade') {
            $OrderNumber = 'AT' . $order_num;
        } else {
            $OrderNumber = 'AA' . $order_num;
        }


        $userid = $this->session->userdata('userid');
        $sessionid = $this->session->userdata('session_id');
        $ServiceID = $this->session->userdata('ServiceID');
        $date = time();
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

        $amount = $this->total_order();
        $amount = $amount * 1.2;
        $ip_add = $this->session->userdata('ip_address');

        $lo = $this->last_order($this->session->userdata('userid'));


        $last_order = 'FIRST';
        if (count($lo) > 0) {
            $last_order = $lo[0]->OrderNumber;
        }


        $BasicCharges = $this->session->userdata('BasicCharges');

        $billing_email = $this->user_email();

        /**********-Voucher Code task changes Start-**************/
        $black_friday = $this->shopping_model->check_black_friday_offer($amount);
        if ($black_friday['status'] == false) {
            $wtp_discount = $this->wtp_discount_applied_on_order();
            $voucher = $this->order_discount_applied();
        }
        if ($black_friday['status'] == true) {
            $discount_offer = $black_friday['discount_offer'];
            $voucherOfferd = 'Yes';
            $del = $this->db->delete('voucherofferd_temp', array('SessionID' => $sessionid, 'UserID' => $userid, 'vc_type' => 'BF'));
            $this->db->insert('black_friday', array('userid' => $userid, 'ordernumber' => $OrderNumber));
        } else if ($voucher) {
            $discount_offer = $voucher['discount_offer'];
            $voucherOfferd = 'Yes';
            $del = $this->db->delete('voucherofferd_temp', array('SessionID' => $sessionid, 'UserID' => $userid));
        } else if ($wtp_discount) {
            $discount_offer = $wtp_discount['discount_offer'];
            $voucherOfferd = 'Yes';
            $del = $this->db->delete('voucherofferd_temp', array('SessionID' => $sessionid, 'vc_type' => 'WTP'));
        } else {
            $discount_offer = 0.00;
            $voucherOfferd = 'No';
        }
        $amount = $amount - $discount_offer;
        /**********-Voucher Code task changes End-**************/

        if ($BasicCharges == "5.00") {
            $BasicCharges = "6.00";
        }

        /******************Sample Order implementation***********************/
        $sample = $this->shopping_model->is_order_sample();
        
        // AA25 STARTS
            $courier = "Fedex";
        // AA25 ENDS
        

        if ($sample == 'sample') {
            // AA25 STARTS
                $courier = "";
            // AA25 ENDS
            $status = 33;
            $paymentway = 'Sample Order';
            $OrderNumber = $OrderNumber . '-S';
            $BasicCharges = 0.00;
            $ServiceID = 20;

            $amount = $amount + $discount_offer;
            $discount_offer = 0.00;
            $voucherOfferd = 'No';

        } else {


            $status = 6;
            // AA25 STARTS
                $offshore = $this->product_model->offshore_delviery_charges_WPC($d_pcode, $dcountry);
                if( ($dcountry == 'France') || ($dcountry == 'Luxembourg') || ($dcountry == 'Switzerland') || ($dcountry == 'Belgium') )
                {
                    $courier = "DPD";
                }
                else if( ($offshore['status'] != true) && ($dcountry == 'United Kingdom') )
                {
                    if($this->input->post('courier') != '')
                    {
                        $courier = $this->input->post('courier');
                    }
                }
            // AA25 ENDS
            
        }
        /******************Sample Order implementation***********************/

        $billing_postcode = strtoupper(substr($b_pcode, 0, 2));
        $delivery_postcode = strtoupper(substr($d_pcode, 0, 2));

        $PurchaseOrderNumber = '';
        $Customer_VAT = '';
        $vatnumber = '';
        $vat_exempt = 'no';
        $PurchaseOrderNumber = $this->input->post('PurchaseOrderNumber');

        $VALIDVAT = $this->session->userdata('vat_exemption');
        if (isset($VALIDVAT) and $VALIDVAT == 'yes' and $dcountry != 'United Kingdom') {
            $vatnumber = $this->input->post('vatnumber');
            $vat_exempt = 'yes';
        } else if ($billing_postcode == $delivery_postcode and (strtoupper($delivery_postcode) == 'JE' || strtoupper($delivery_postcode) == 'GY')) {
            $vat_exempt = 'yes';
        }

        $this->session->unset_userdata(array('vat_exemption' => ''));

        $exchange_rate = $this->home_model->get_exchange_rate(currency);
        /************************** Plain Packaging **********************/
        $plainpack = 0;
        $plainpackaging = $this->home_model->get_db_column('customers', 'Label', 'UserID', $userid);
        if (isset($plainpackaging) and $plainpackaging == 1) {
            $plainpack = 1;
        }
        /*****************************************************************/


        $data = array('OrderNumber' => $OrderNumber,
            // AA21 STARTS
                'OrderDeliveryCourier' => $courier,
                'OrderDeliveryCourierCustomer' => $courier,
            // AA21 ENDS
            'SessionID' => $sessionid,
            'OrderDate' => $date,
            'OrderTime' => $date,
            'UserID' => $userid,
            'Label' => $plainpack,
            'PaymentMethods' => $paymentway,
            'OrderShippingAmount' => $BasicCharges,
            'OrderTotal' => $amount,
            'TrackingIP' => $ip_add,
            'BillingTitle' => $billing_title,
            'BillingFirstName' => $b_first_name,
            'BillingLastName' => $b_last_name,
            'BillingCompanyName' => $b_organization,
            'BillingAddress1' => $b_add1,
            'BillingAddress2' => $b_add2,
            'BillingTownCity' => $b_city,
            'BillingCountyState' => $b_county,
            'BillingPostcode' => $b_pcode,
            'BillingCountry' => $country,
            'Billingtelephone' => $b_phone_no,
            'Billingfax' => $b_fax,
            'Billingemail' => $b_email,
            'DeliveryTitle' => $delivery_title,
            'DeliveryFirstName' => $d_first_name,
            'DeliveryLastName' => $d_last_name,
            'DeliveryCompanyName' => $d_organization,
            'DeliveryAddress1' => $d_add1,
            'DeliveryAddress2' => $d_add2,
            'DeliveryTownCity' => $d_city,
            'DeliveryCountyState' => $d_county,
            'DeliveryPostcode' => $d_pcode,
            'DeliveryCountry' => $dcountry,
            'Deliverytelephone' => $d_phone_no,
            'DeliveryMobile' => $d_mobile_no,
            'BillingMobile' => $b_mobile,
            'Deliveryfax' => $d_fax,
            'Deliveryemail' => $d_email,
            'Source' => 'Website',
            'prevOrder' => $last_order,
            'ShippingServiceID' => $ServiceID,
            'BillingResCom' => $b_ResCom,
            'DeliveryResCom' => $d_ResCom,
            'ServiceID' => $ServiceID,
            'OrderStatus' => $status,
            'voucherOfferd' => $voucherOfferd,
            'voucherDiscount' => $discount_offer,
            'CustomOrder' => $vatnumber,
            'vat_exempt' => $vat_exempt,
            'PurchaseOrderNumber' => $PurchaseOrderNumber,
            'SecondaryEmail' => $second_email,
            'exchange_rate' => $exchange_rate,
            'currency' => currency);

        $this->db->insert('orders', $data);

        /******************Sample Order implementation***********************/
        if ($sample == 'mixed') {

            // AA25 STARTS
                $courier = "";
            // AA25 ENDS

            $status = 33;
            $paymentway = 'Sample Order';
            $OrderNumberSample = $OrderNumber . '-S';
            $BasicCharges = 0.00;
            $ServiceID = 20;
            $amount = 0.00;
            $discount_offer = 0.00;
            $voucherOfferd = 'No';

            $mixed_array = array('voucherOfferd' => $voucherOfferd,
                'voucherDiscount' => $discount_offer,
                'OrderStatus' => $status,
                // AA25 STARTS
                    'OrderDeliveryCourier' => $courier,
                    'OrderDeliveryCourierCustomer' => $courier,
                // AA25 ENDS
                'ServiceID' => $ServiceID,
                'OrderNumber' => $OrderNumberSample,
                'PaymentMethods' => $paymentway,
                'OrderTotal' => $amount,
                'OrderShippingAmount' => $BasicCharges);

            $data = array_merge($data, $mixed_array);
            $this->db->insert('orders', $data);
        }

        /******************Sample Order implementation***********************/

        $cart = $this->show_cart();

        foreach ($cart as $c) {
            $print_type = '';
            $pname = $this->product_name($c->ProductID);
            $prodName = $pname[0]['ProductCategoryName'];
            $totalP = $c->TotalPrice * 1.2;
            $menu = $this->menufacture($c->ProductID);
            $manf_id = $menu[0]->ManufactureID;

            $reordercode = $this->product_reordercode($c->ProductID);
            $reordercode = $reordercode[0]['ReOrderCode'];

            $ProductBrand = $this->GetProductBrand($c->ProductID);
            if ($c->ProductID == 0 and $c->source == "LBA") {
                $productnameline = explode("-", $c->p_name);
                $prodd_name = trim($productnameline[0]);
                $prodd_shape = trim($productnameline[1]);
                $prodd_size = trim($productnameline[2]);
                $prodd_category = trim($productnameline[3]);
                $prodd_brand = trim($productnameline[4]);
                $prodd_designID = $c->p_code;

                $prodName = $prodd_name;
                $ProductBrand['ProductBrand'] = $prodd_brand;

            }

            $designedlabels = '';
            if ($c->source == 'printing' && preg_match("/Roll Labels/i", $ProductBrand['ProductBrand'])) {
                $designedlabels = $this->home_model->get_total_printed_labels($c->ID, $c->ProductID);
            }
            $orignalQty = (isset($c->orignalQty) && $c->orignalQty != "") ? $c->orignalQty : '';
            $product_collection = array('is_custom' => $c->is_custom,
                'ProductCategoryName' => $prodName,
                'LabelsPerRoll' => $c->LabelsPerRoll,
                'LabelsPerSheet' => $ProductBrand['LabelsPerSheet'],
                'ReOrderCode' => $reordercode,
                'ManufactureID' => $manf_id,
                'ProductBrand' => $ProductBrand['ProductBrand'],
                'wound' => $c->wound,
                'OrderData' => $c->OrderData,
                'label_application' => $c->label_application,
                'Source' => $c->source,
                'Printing' => $c->Printing,
                'Orintation' => $c->orientation,
                'Print_Type' => $c->Print_Type,
                'FinishType' => $c->FinishType,
                'orignalQty' => $orignalQty,
                'designedlabels' => $designedlabels,
                'design_size' => $prodd_size);
            $prodName = $this->home_model->customize_product_name($product_collection);
            

            if ($c->ProductID  == 0) {
                $data_ins = array_merge($data_ins, array('ProductName' => $c->Product_detail));
            }

            if ($c->ProductID == 0 and $c->source == "LBA") {
                $prodName = $prodd_name . " - " . $prodd_shape . " - " . $prodd_size;
                $manf_id = 'FLDT-' . $c->p_code;
            }

            if (preg_match('/Integrated Labels/is', $ProductBrand['ProductBrand'])) {
                $print_type = $c->OrderData;
            }

            if ($c->OrderData == 'Sample') {
                $print_type = $c->OrderData;
            }


            /************** new code for total labels calculations **********************/
            if ($c->is_custom == 'Yes') {
                $labelspersheet = $c->LabelsPerRoll;
            } else {
                $labelspersheet = $ProductBrand['LabelsPerSheet'];
            }
            $totallabelsused = $c->Quantity * $labelspersheet;
            if ($c->Printing == 'Y') {
                $printedlabelscount = $this->home_model->get_total_printed_labels($c->ID, $c->ProductID);
                if (isset($printedlabelscount) and $printedlabelscount > 0 and $printedlabelscount != '') {
                    $totallabelsused = $printedlabelscount;
                }
            }
            /************** new code for total labels calculations **********************/


            $data_ins = array(
                'UserID' => $userid,
                'ProductID' => $c->ProductID,
                'ProductName' => $prodName,
                'Quantity' => $c->Quantity,
                'Price' => $c->TotalPrice,
                'LabelsPerRoll' => $c->LabelsPerRoll,
                'label_application' => $c->label_application,
                'is_custom' => $c->is_custom,
                'Print_Type' => $print_type,
                'ProductTotal' => $totalP,
                'ManufactureID' => $manf_id,
                'colorcode' => $c->colorcode,
                'labels' => $totallabelsused,
                'user_project_id' => $c->p_code,
                'source' => $c->source
            );

            /*,'Source'=>$c->source*/

            /******************Sample Order implementation***********************/

            if ($c->OrderData == 'Sample') {
                $data_ins = array_merge($data_ins, array('ProductionStatus' => 3));
            }
            if ($sample == 'mixed' && $c->OrderData == 'Sample') {
                $data_ins = array_merge($data_ins, array('OrderNumber' => $OrderNumberSample));
            } else {
                $data_ins = array_merge($data_ins, array('OrderNumber' => $OrderNumber));
            }

            if ($manf_id == 'AADS001') {
                $data_ins = array_merge($data_ins, array('ProductionStatus' => 3, 'ProductOption' => $order_serail));
            }
            
            
             


            if ($c->Printing == 'Y') {
                $source = '';
                if ($c->source == 'flash') {
                    $source = 'flash';
                } else
                    if ($c->source == 'LBA') {
                        $source = 'LBA';
                    } else {
                        $source = $c->source;
                    }

                if ($c->source == 'printing' && !preg_match("/Roll Labels/i", $ProductBrand['ProductBrand'])) {
                    $c->Print_Type = $this->home_model->get_db_column('digital_printing_process', 'Print_Type', 'name', $c->Print_Type);
                }
                $c->Print_Design = '1 Design';
                if ($c->Print_Qty > 1) {
                    $c->Print_Design = 'Multiple Designs';
                }
                
                
                $pressproof = $c->pressproof;
                if( $pressproof == "" || $pressproof == NULL)
                {
                    $pressproof = 0;
                }

                $A4Printing = array('Printing' => $c->Printing,
                    'Print_Type' => $c->Print_Type,
                    'Print_Design' => $c->Print_Design,
                    'Print_Qty' => $c->Print_Qty,
                    'Free' => $c->Free,
                    'Print_UnitPrice' => $c->Print_UnitPrice,
                    'Print_Total' => $c->Print_Total,
                    'user_project_id' => $c->user_project_id,

                    /*'source'=>$source,*/
                    'Wound' => $c->wound,
                    'Orientation' => $c->orientation,
                    'pressproof' => $pressproof,
                    'FinishType' => $c->FinishType,
                    'Product_detail' => $c->Product_detail,
                    'design_service' => $c->design_service,
                    'design_service_charge' => $c->design_service_charge,
                    'design_file' => $c->design_file,
                    'page_location' => $c->page_location);
                if ($c->regmark == "Y") {
                    $A4Printing['regmark'] = "Y";
                }
                $data_ins = array_merge($data_ins, $A4Printing);
            }


            /******************Sample Order implementation***********************/
            
            $this->db->insert('orderdetails', $data_ins);
            $order_serail = $this->db->insert_id();

            if (preg_match('/Integrated Labels/is', $ProductBrand['ProductBrand']) || $c->Printing == 'Y') {
                if ($c->OrderData == 'Black' || $c->OrderData == 'Printed' || $c->Printing == 'Y') {

                    $query = $this->db->query("select count(*) as total from integrated_attachments 
								WHERE ProductID LIKE '" . $c->ProductID . "' AND CartID LIKE '" . $c->ID . "' AND status LIKE 'confirm' ");
                    $query = $query->row_array();
                    if ($query['total'] > 0 || $c->regmark == "Y") {

                        $attach_q = $this->db->query("select * from integrated_attachments 
									WHERE ProductID LIKE '" . $c->ProductID . "' AND CartID LIKE '" . $c->ID . "' AND status LIKE 'confirm' LIMIT 15 ");
                        $attach_q = $attach_q->result();


                        if (preg_match("/SRA3/i", $ProductBrand['ProductBrand'])) {
                            $brand = 'SRA3';
                        } else if (preg_match("/A5/i", $ProductBrand['ProductBrand'])) {
                            $brand = 'A5';
                        } else if (preg_match("/A3/i", $ProductBrand['ProductBrand'])) {
                            $brand = 'A3';
                        } else if (preg_match("/Roll/i", $ProductBrand['ProductBrand'])) {
                            $brand = 'Rolls';
                        } else if (preg_match("/Integrated/i", $ProductBrand['ProductBrand'])) {
                            $brand = 'Integrated';
                        } else {
                            $brand = 'A4';
                        }
                        $fakearray = array();
                        if (!$attach_q and $c->regmark == "Y") {
                            $PDF = $this->db->query("Select PDF from products p INNER JOIN category c on  SUBSTRING_INDEX(p.CategoryID, 'R', 1) = c.CategoryID where SUBSTRING_INDEX(p.CategoryID, 'R', 1) = c.CategoryID and p.ProductID = '" . $c->ProductID . "' LIMIT 1")->row()->PDF;
                            $ex = explode(".", $PDF);
                            $filename = $ex[0] . "_rev." . $ex[1];
                            $fakearray['OrderNumber'] = $OrderNumber;
                            $fakearray['Serial'] = $order_serail;
                            $fakearray['ProductID'] = $c->ProductID;
                            $fakearray['file'] = $filename;
                            $fakearray['print_file'] = $filename;
                            $fakearray['name'] = $manf_id;
                            $fakearray['diecode'] = $manf_id;
                            $fakearray['qty'] = $c->Quantity;
                            $fakearray['labels'] = $c->orignalQty;
                            $fakearray['status'] = 70;
                            $fakearray['source'] = 'web';
                            $fakearray['version'] = 1;
                            $fakearray['approved'] = 1;
                            $fakearray['checklist'] = 1;
                            $fakearray['CO'] = 1;
                            $fakearray['SP'] = 1;
                            $fakearray['CA'] = 1;
                            $fakearray['PF'] = 1;
                            $fakearray['action'] = 0;
                            $fakearray['design_type'] = $c->Print_Type;
                            $fakearray['Brand'] = $brand;
                            $this->db->insert('order_attachments_integrated', $fakearray);
                            /*CO,sp,ca,pf = 1;
										status = 70
										action = 0;
										file = .pdf;
										print_file = .pdf*/
                        }

                        foreach ($attach_q as $int_row) {
                            //new code
                            $checked = ($int_row->source == 'flash') ? '1' : '0';
                            $des_source = ($int_row->source == 'flash') ? 'flash' : 'web';
                            $job_status = ($int_row->source == 'flash') ? 70 : 64;

                            $approve_date_field = ($int_row->source == 'flash') ? time() : 0;

                            $attach_array = array('OrderNumber' => $OrderNumber,
                                'Serial' => $order_serail,
                                'ProductID' => $int_row->ProductID,
                                'file' => $int_row->file,
                                'Thumb' => $int_row->Thumb,
                                'source' => $des_source,
                                'diecode' => $manf_id,
                                'status' => $job_status,
                                'design_type' => $c->Print_Type,
                                'qty' => $int_row->qty,
                                'labels' => $int_row->labels,
                                'name' => $int_row->name,
                                'version' => 1,
                                'CO' => 1,
                                'Brand' => $brand,
                                'approve_date' => $approve_date_field,
                                'checked' => $checked);
                            $this->db->insert('order_attachments_integrated', $attach_array);

                        }
                    }
                }
            }
            //new code
            if ($c->Printing != 'Y' && $c->source == 'flash') {
                $attach_plain = $this->db->query("select * from integrated_attachments 
									WHERE ProductID LIKE '" . $c->ProductID . "' AND CartID LIKE '" . $c->ID . "' AND status LIKE 'plain'");
                $attach_plain = $attach_plain->row_array();

                $array_plain = array('OrderNumber' => $OrderNumber,
                    'Serial' => $order_serail,
                    'ProductID' => $attach_plain['ProductID'],
                    'file' => $attach_plain['file'],
                    'Thumb' => $attach_plain['Thumb'],
                    'source' => 'plain');
                $this->db->insert('order_attachments_integrated', $array_plain);
            }
            
            
            if(isset($c->tempQNoApprovel) && $c->tempQNoApprovel!=""){
                $quoUpdate = array('view_status'=>'Accepted','qOrderNo'=>$OrderNumber,'QuotationStatus'=>'13');
                $this->db->where('QuotationNumber',$c->tempQNoApprovel);
                $this->db->update('quotations',$quoUpdate);

            }
        }

        $Order['OrderNumber'] = $OrderNumber;
        $this->session->set_userdata($Order);

        /***-------- code start for voucher implementations------****/
        /*if ($last_order == "FIRST" && $sample != 'sample') {
            $first_order_offer = $this->db->query("Select  count(UserID) as count from tbl_first_order_offer WHERE Email LIKE '" . $b_email . "'");
            $first_order_offer = $first_order_offer->row_array();
            if (isset($first_order_offer['count']) and $first_order_offer['count'] == 0) {
                //$first_time_array = array('UserID' => $this->session->userdata('userid'), 'Email' => $b_email, 'Date' => time(), 'firstorder' => $OrderNumber, 'Name' => $b_first_name);
                //$this->db->insert('tbl_first_order_offer', $first_time_array);
            }

        }*/

        if ($paymentway == 'purchaseOrder') {
            $imagename = '';
            if (isset($_FILES['file_up']) and $_FILES['file_up'] != '') {
                $config['upload_path'] = PATH;
                $config['allowed_types'] = 'png|doc|docx|pdf|jpg|jpeg|gif';
                $config['max_size'] = '10000';
                $this->load->library('upload', $config);
                $field_name = "file_up";
                if ($this->upload->do_upload($field_name)) {
                    $data = array('upload_data' => $this->upload->data());
                    $imagename = $data['upload_data']['file_name'];
                    $this->db->update('orders', array('po_attachment' => $imagename), array('OrderNumber' => $OrderNumber));
                }
            }

            $parameters = array('OrderNumber' => $OrderNumber,
                'name' => $b_first_name,
                'email' => $b_email,
                'telephone' => $b_phone_no,
                'mobile' => $b_mobile,
                'attachemt' => $imagename);
            $this->send_purcasheorder_attachemts($parameters);


        }
        $this->session->set_userdata("changeDrop", "0");

    }

    function menufacture($id)
    {
        $query = $this->db->query("select  ManufactureID from products  where ProductID='" . $id . "'");
        $res = $query->result();
        return $res;
    }

    function product_reordercode($pid)
    {
        $qry = $this->db->query("SELECT ReOrderCode FROM `products` WHERE `ProductID` = '$pid'");
        return $qry->result_array();
    }

    function GetProductBrand($id)
    {
        $query = $this->db->query("select  ProductBrand,LabelsPerSheet from products  where ProductID='" . $id . "'");
        $res = $query->row_array();
        return $res;
    }

    function emptycartafterConfirm()
    {
        $del = $this->db->delete('temporaryshoppingbasket', array('SessionID' => $this->sessionid()));
        $del = $this->db->delete('integrated_attachments', array('SessionID' => $this->sessionid()));
    }

    /*----------Order confirm email-----------------*/
    function order_confirmation_email()
    {

        $userid = $this->session->userdata('userid');
        $OrderNumber = $this->session->userdata('OrderNumber');
        $query = $this->db->get_where('orders', array('OrderNumber' => $OrderNumber));
        $res = $query->result_array();
        $res = $res[0];

        $VatNumber = "GB 945 0286 20";
        if (isset($res['BillingCountry']) && $res['BillingCountry'] == 'France') {
            $VatNumber = "FR 21 851063453";
        }


        $FirstName = $res['BillingFirstName'];
        $EmailAddress = $res['Billingemail'];
        $date = $res['OrderDate'];
        $time = $res['OrderTime'];
        $OrderDate = date("d/m/Y", $date);
        $OrderTime = date("H:i", $time);
        $PaymentMethod1 = $res['PaymentMethods'];
        $PONUMBER = '';
        if ($res['PurchaseOrderNumber']) {
            $PONUMBER = "<strong>Your PO No : </strong>" . $res['PurchaseOrderNumber'];
        }

        if ($PaymentMethod1 == 'chequePostel') {
            $PaymentMethod = "Pending payment";
            $pamentOrder = 'Via Cheque ';
        }

        if ($PaymentMethod1 == 'creditCard') {
            $pamentOrder = 'Via Credit card';
            $PaymentMethod = "Pending processing";
        }

        if ($PaymentMethod1 == 'purchaseOrder') {
            $pamentOrder = 'Via Purchase order';
            $PaymentMethod = "Pending payment";
        }

        if ($PaymentMethod1 == 'paypal') {
            $pamentOrder = 'Via PayPal';
            $PaymentMethod = "Completed";
        }
        if ($PaymentMethod1 == 'Sample Order') {
            $pamentOrder = 'Sample Order';
            $PaymentMethod = "Sample Order";
        }

        $customer_message = "Thank you for purchasing from AA Labels and we confirm that your order has been received and is being processed for production. Upon completion of your order you will receive a confirmation of despatch email with delivery tracking details and a downloadable PDF VAT invoice.";


        if ($PaymentMethod1 == 'purchaseOrder') {
            $purchase_order_txt = '';
            if ($res['PurchaseOrderNumber']) {
                $purchase_order_txt = "(PO No. " . $res['PurchaseOrderNumber'] . ")";
            }
            $paymentMethod = 'Via Purchase Orders';
            $customer_message = "Thank you for purchasing from AA Labels and we confirm that your order has been received and is currently pending approval of your purchase order " . $purchase_order_txt . ". Upon acceptance of payment by PO your order will be processed for production and after completion you will receive a confirmation of despatch email with delivery tracking details and a downloadable PDF VAT invoice.";
        } elseif ($PaymentMethod1 == 'chequePostel') {

            // AA14 STARTS
            $paymentMethod = 'Via Bank Transfer';
            $customer_message = "<p>Thank you for purchasing from AA Labels and we confirm that your order has been received and is pending payment by bank transfer. Upon receipt of payment your order will be processed for production and after completion you will receive a confirmation of despatch email with delivery tracking details and a downloadable PDF VAT invoice.";

            if ($res['currency'] == "EUR") {
                $customer_message .= "<br /><br /><b style='color:#006da4'>Payment Details EURO Account</b><br />BACS TRANSFER<br />";
                $customer_message .= '<table style="font-size:12px; padding-bottom:10px;" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="15%;">Currency:</td><td width="70%;">EURO</td></tr><tr><td width="15%;">Account Name:</td><td width="70%;">Green Technologies Limited T/A AA Labels</td></tr><tr><td width="15%;">Bank:</td><td width="70%;">HSBC UK COMMERCIAL</td></tr><tr><td width="15%;">A/C No:</td><td width="70%;">84741402</td></tr><tr><td width="15%;">IBAN:</td><td width="70%;">GB62HBUK40127684741402</td></tr><tr><td width="15%;">SWIFT/BIC:</td><td width="70%;">HBUKGB4B</td></tr></table>';
            } else {
                $customer_message .= "<br /><br /><b style='color:#006da4'>Payment Details GBP Account</b><br />BACS TRANSFER<br />";
                $customer_message .= '<table style="font-size:12px; padding-bottom:10px;" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="15%;">Currency:</td><td width="70%;">GBP</td></tr><tr><td width="15%;">Account Name:</td><td width="70%;">Green Technologies Limited T/A AA Labels</td></tr><tr><td width="15%;">Bank:</td><td width="70%;">HSBC UK COMMERCIAL</td></tr><tr><td width="15%;">Sort Code:</td><td width="70%;">40-36-15</td></tr><tr><td width="15%;">A/C No:</td><td width="70%;">52385724</td></tr><tr><td width="15%;">IBAN:</td><td width="70%;">GB27HBUK40361552385724</td></tr><tr><td width="15%;">SWIFT/BIC:</td><td width="70%;">HBUKGB4108R</td></tr></table>';
            }
            // AA14 ENDS


        } elseif ($PaymentMethod1 == 'creditCard') {
            $paymentMethod = 'Via Credit Card';
        } elseif ($PaymentMethod1 == 'paypal') {
            $paymentMethod = 'Via Pay pal';
        } elseif ($PaymentMethod1 == 'PayPal eCheque') {
            $paymentMethod = 'Via PayPal eCheque';

            $customer_message = "Thank you for purchasing from AA Labels and we confirm that your order has been received and is currently pending confirmation of your e-cheque payment from PayPal. Upon receipt of payment your order will be processed for production and after completion you will receive a confirmation of despatch email with delivery tracking details and a downloadable PDF VAT invoice.";
        } elseif ($PaymentMethod1 == 'Sample Order') {
            $paymentMethod = 'Sample Order';
        }

        $websiteOrders = "Website";


        $BillingTitle = $res['BillingTitle'];
        $BillingFirstName = $res['BillingFirstName'];
        $BillingLastName = $res['BillingLastName'];
        $BillingCompanyName = $res['BillingCompanyName'];
        $BillingAddress1 = $res['BillingAddress1'];
        $BillingAddress2 = $res['BillingAddress2'];
        $BillingTownCity = $res['BillingTownCity'];
        $BillingCountyState = $res['BillingCountyState'];
        $BillingPostcode = $res['BillingPostcode'];
        $BillingCountry = $res['BillingCountry'];
        $Billingtelephone = $res['Billingtelephone'];
        $BillingMobile1 = $res['BillingMobile'];
        $Billingfax = $res['Billingfax'];
        $BillingResCom = $res['BillingResCom'];
        //$EmailAddress 		=	$res3['Billingemail'];
        $DeliveryTitle = $res['DeliveryTitle'];
        $DeliveryFirstName = $res['DeliveryFirstName'];
        $DeliveryLastName = $res['DeliveryLastName'];
        $DeliveryCompanyName = $res['DeliveryCompanyName'];
        $DeliveryAddress1 = $res['DeliveryAddress1'];
        $DeliveryAddress2 = $res['DeliveryAddress2'];
        $DeliveryTownCity = $res['DeliveryTownCity'];
        $DeliveryCountyState = $res['DeliveryCountyState'];
        $DeliveryPostcode = $res['DeliveryPostcode'];
        $DeliveryCountry = $res['DeliveryCountry'];
        $DeliveryResCom = $res['DeliveryResCom'];


        $styleBillingCompnay = "";
        $styleDeliveryCompany = "";

        if ($BillingCompanyName != '') {
            $styleBillingCompnay = "<tr><td style='PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; HEIGHT: 30px'>";
            $styleBillingCompnay .= $BillingCompanyName . "</td></tr>";
        }

        if ($DeliveryCompanyName != '') {
            $styleDeliveryCompany = "<tr><td style='PADDING-RIGHT: 0px; PADDING-LEFT: 10px; FONT-SIZE: 11px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; HEIGHT: 30px'>" .
                $styleDeliveryCompany .= $DeliveryCompanyName . "</td></tr>";
        }


        $vatRate = "20.00";
        $DeliveryOption = $this->session->userdata('ServiceName');

        $res['OrderShippingAmount'] = $this->home_model->currecy_converter($res['OrderShippingAmount'], 'no');
        $deliveryChargesExVat = number_format($res['OrderShippingAmount'] / (($vatRate + 100) / 100), 2, '.', '');


        if ($deliveryChargesExVat) {
            $DeliveryExVatCost = $deliveryChargesExVat;
        } else {
            $DeliveryExVatCost = '0.00';
        }

        if ($res['OrderShippingAmount']) {

            $DeliveryIncVatCost = number_format($res['OrderShippingAmount'], 2, '.', '');
        } else {
            $DeliveryIncVatCost = '0.00';
        }
        $OrderTotalExVAT = number_format($res['OrderTotal'] / 1.2, 2);
        $OrderTotalIncVAT = number_format($res['OrderTotal'], 2);
        $CompanyName = "AALABELS";

        //$orderecords = $this->db->get_where('orderdetails', array('OrderNumber' => $OrderNumber));
        //$num_row = $orderecords->num_rows();
        //$info_order = $orderecords->result_array();

        $info_order = $this->order_detail($OrderNumber);


        $TotalQuantity = "";
        $SubTotalExVat1 = "";
        $SubTotalIncVat1 = "";
        $rows = "";
        $i = 0;
        $bgcolor = '';
        foreach ($info_order as $rec) {


            if ($rec['Printing'] == 'Y') {
                $rec['Price'] = $rec['Price'] + $rec['Print_Total'];
                $rec['ProductTotal'] = $rec['ProductTotal'] + ($rec['Print_Total'] * 1.2);
                $A4Printing = $this->home_model->get_printing_service_name($rec['Print_Type'], $rec['regmark']);
                $rec['ProductName'] = $rec['ProductName'] . ' - ' . $A4Printing;
            }


            $rec['Price'] = $this->home_model->currecy_converter($rec['Price'], 'no');
            $rec['ProductTotal'] = $this->home_model->currecy_converter($rec['ProductTotal'], 'no');

            $ProductName = $rec['ProductName'];
            $PriceExVat1 = $rec['Price'];
            $PriceExVat = $PriceExVat1;
            $UnitPrice = number_format(round(($rec['Price'] / $rec['Quantity']), 4), 4, '.', '');
            $PriceIncVat = number_format(($rec['ProductTotal']), 2, '.', '');

            $Quantity = $rec['Quantity'];
            $TotalQuantity += $Quantity;

            $ProductCode = $rec['ProductID'];
            $ManufacturerId = $this->menufacture($ProductCode);
            $ManufacturerId = $ManufacturerId[0]->ManufactureID;

            if ($bgcolor == '') {
                $bgcolor = '#F5F5F5';
            } else {
                $bgcolor = '';
            }


            if ($rec['is_custom'] == 'Yes') {
                $labelspersheet = $rec['LabelsPerRoll'];
            } else {
                $ProductBrand = $this->GetProductBrand($rec['ProductID']);
                $labelspersheet = $ProductBrand['LabelsPerSheet'];
            }


            $totallabelsused = $Quantity * $labelspersheet;

            if ($rec['Printing'] == "Y") {
                $attached_files = $this->db->query(" SELECT SUM(labels) AS total from order_attachments_integrated 
					WHERE Serial LIKE '" . $rec['SerialNumber'] . "'  ");
                $attached_files = $attached_files->row_array();
                if (isset($attached_files['total']) and $attached_files['total'] > 0 and $attached_files['total'] != '') {
                    $totallabelsused = $attached_files['total'];
                }
            }

            if ($PaymentMethod == "Sample Order") {
                $totallabelsused = " - ";
            }

            /*
			$rows .='<tr bgcolor="'.$bgcolor.'" height="25">
						<td valign="top">'.$ManufacturerId.'</td>
						<td valign="top">'.$ProductName.'</td>
						<td align="center" valign="top">'.$totallabelsused.'</td>
						<td align="center" valign="top">'.symbol.number_format($UnitPrice,4).'</td>
						<td align="center" valign="top">'.$Quantity.'</td>
						<td valign="top">'.symbol.$PriceExVat.'</td>
				     </tr>';

			*/
            $rows .= '<tr>
					<td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;">' . $ManufacturerId . '</td>
					<td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;">' . $ProductName . '</td>
					<td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;">' . $Quantity . '</td>
					<td style="font-size:12px; border:1px solid #b3b3b3; border-right:0; border-top:0;">' . symbol . number_format($UnitPrice, 4) . '</td>
					<td style="font-size:12px; border:1px solid #b3b3b3; border-right:1; border-top:0;">' . symbol . $PriceExVat . '</td>
				   </tr>';


            /*$rows .='<tr bgcolor="'.$bgcolor.'" height="25">
						<td valign="top">
							'.$ManufacturerId.'
						</td>
						<td valign="top">

							'.$ProductName.'
						</td>
						<td valign="top">
							'.symbol.number_format($UnitPrice,4).'
						</td>
						<td valign="top">

							'.$Quantity.'
						</td>
						<td valign="top">
							'.symbol.$PriceExVat.'
						</td></tr>';*/


            $SubTotalExVat1 += $PriceExVat;
            $SubTotalIncVat1 += $PriceIncVat;

            $i++;
        }

        $SubTotalExVat = number_format($SubTotalExVat1, 2, '.', '');
        $SubTotalIncVat = number_format($SubTotalIncVat1, 2, '.', '');
        $OrderTotalExVAT1 = $DeliveryExVatCost + $SubTotalExVat;

        $OrderTotalExVAT = number_format($OrderTotalExVAT1, 2, '.', '');
        $OrderTotalIncVAT = number_format(($DeliveryIncVatCost + $SubTotalIncVat1), 2, '.', '');

        $exvatSubtotalExVat = symbol . $SubTotalExVat;
        $exvatSubtotalIncVat = symbol . $SubTotalIncVat;

        $deliveryExVat = symbol . $DeliveryExVatCost;
        $deliveryIncVat = symbol . $DeliveryIncVatCost;

        $gtotalExVat = symbol . $OrderTotalExVAT;
        $gtotalIncVat = symbol . $OrderTotalIncVAT;
        $vatTotal = number_format($OrderTotalIncVAT - $OrderTotalExVAT, 2, '.', '');

        $bill_rc = $res['BillingCompanyName'];
        $del_rc = $res['DeliveryCompanyName'];
        $email = $res['Billingemail'];


        $sql = $this->db->get_where(Template_Table, array('MailID' => '3'));
        $result = $sql->result_array();
        $result = $result[0];
        $mailTitle = $result['MailTitle'];
        $mailName = $result['Name'];
        $from_mail = $result['MailFrom'];
        $mailSubject = $result['MailSubject'] . ' : ' . $OrderNumber;

        $mailText = $result['MailBody'];

        $getfile = FCPATH . 'system/libraries/en/order-confirmation.html';
        $mailText = file_get_contents($getfile);


        $strINTemplate = array("[WEBROOT]", "[FirstName]", "[OrderNumber]", "[OrderDate]", "[OrderTime]", "[PaymentMethod]",
            "[BillingTitle]", "[BillingFirstName]", "[BillingLastName]",
            "[BillingCompanyName]", "[BillingAddress1]", "[BillingAddress2]", "[BillingTownCity]", "[BillingCountyState]",
            "[BillingPostcode]", "[BillingCountry]", "[Billingtelephone]", "[BillingMobile]", "[Billingfax]", "[EmailAddress]",
            "[DeliveryTitle]", "[DeliveryFirstName]", "[DeliveryLastName]", "[DeliveryCompanyName]", "[DeliveryAddress1]",
            "[DeliveryAddress2]", "[DeliveryTownCity]", "[DeliveryCountyState]", "[DeliveryPostcode]", "[DeliveryCountry]",
            "[ProductCode]", "[ProductName]", "[Quantity]", "[PriceExVat]", "[PriceIncVat]", "[SubTotalExVat]", "[SubTotalIncVat]",
            "[OrderSubTotal]", "[DeliveryOption]", "[DeliveryExVatCost]", "[DeliveryIncVatCost]", "[OrderTotalExVAT]",
            "[OrderTotalIncVAT]", "[OrderItems]", "[Currency]", "[Packaging]", "[incvat]", "[exvat]", "[deliveryexvat]",
            "[deliveryincvat]", "[deliveryoption]", "[gtotalExvat]", "[gtotalIncvat]", "[paymentMethods]", "[styleBillingConpnay]",
            "[styleDeliveryConpnay]", "[vatprice]", "[pamentOrder]", "[weborder]", "[BillingResCom]", "[DeliveryResCom]", "[voucherDiscount]", "[PONUMBER]", "[customer_message]", "[VatNumber]");

        $webroot = base_url() . "theme/";
        //----------------------------------------------------------------------------------------------
//        $qry1 = "select `UserID` from `orderdetails` where `OrderNumber` = '" . $OrderNumber . "'";
//        $exe1 = mysql_query($qry1);
//        $res1 = mysql_fetch_array($exe1);
//        $qry2 = "select * from `customers` where `UserID` = '" . $res1['UserID'] . "'";
//        $exe2 = mysql_query($qry2);
//        $res2 = mysql_fetch_array($exe2);

        $qry1 = "select `UserID` from `orderdetails` where `OrderNumber` = '".$OrderNumber."'";
        $exe1 = $this->db->query($qry1);
        $res1 = $exe1->result_array();
        $qry2 = "select * from `customers` where `UserID` = '".$res1['UserID']."'";
        $exe2 = $this->db->query($qry2);
        $res2 = $exe2->result_array();
        //-----------------------------------------------------------------------------------------------

        $vatTotal = number_format($OrderTotalIncVAT - $OrderTotalExVAT, 2, '.', '');
        /*--------------------------Voucher Code--------------------*/
        if ($res['voucherOfferd'] == 'Yes') {
            $voucherDiscount = $this->home_model->currecy_converter($res['voucherDiscount'], 'no');
            $voucher_code = '<tr><td align="right">Discount:</td><td style="color: #006da4; padding-left:10px;" align="right">' . symbol . $voucherDiscount . '</td></tr>';
        } else {
            $voucherDiscount = 0.00;
            $voucher_code = '';
        }
        $gtotalIncVat = number_format($OrderTotalIncVAT - $voucherDiscount, 2, '.', '');
        $gtotalIncVat = symbol . $gtotalIncVat;

        /*--------------------------Voucher Code--------------------*/


        $strInDB = array($webroot, $BillingFirstName, $OrderNumber, $OrderDate, $OrderTime, $PaymentMethod, $BillingTitle,
            $BillingFirstName, $BillingLastName,
            $BillingCompanyName, $BillingAddress1, $BillingAddress2, $BillingTownCity, $BillingCountyState,
            $BillingPostcode, $BillingCountry, $Billingtelephone, $BillingMobile1, $Billingfax, $EmailAddress,
            $DeliveryTitle, $DeliveryFirstName, $DeliveryLastName, $res2['DeliveryCompanyName'], $DeliveryAddress1,
            $DeliveryAddress2, $DeliveryTownCity, $DeliveryCountyState, $DeliveryPostcode, $DeliveryCountry,
            $ManufacturerId, $ProductName, $Quantity, $PriceExVat, $PriceIncVat, $SubTotalExVat, $SubTotalIncVat,
            '', $DeliveryOption, symbol . $DeliveryExVatCost, $DeliveryIncVatCost, $OrderTotalExVAT,
            $OrderTotalIncVAT, $rows, symbol, '', $exvatSubtotalIncVat, $exvatSubtotalExVat, $deliveryExVat, $deliveryIncVat,
            $DeliveryOption, $gtotalExVat, $gtotalIncVat, $PaymentMethod, $styleBillingCompnay, $styleDeliveryCompany, symbol . $vatTotal,
            $pamentOrder, $websiteOrders, $bill_rc, $del_rc, $voucher_code, $PONUMBER, $customer_message, $VatNumber);

        $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);
        $this->load->library('email');
        $email = $this->user_email();
        $this->email->from($from_mail, 'AALABELS');
        $this->email->to($email);
        //$this->email->bcc('gt.pk.manager@gmail.com');
        //$this->email->bcc('web.development@aalabels.com');
        $this->email->bcc('order.aalabels@gmail.com');
        
        $this->email->bcc('customercare@aalabels.com');
        $this->email->subject($mailSubject);
        $this->email->message($newPhrase);
        $this->email->set_mailtype("html");


        if ($PaymentMethod1 == "chequePostel") {
            $this->load->model('accountModel');
            $data['OrderDetails'] = $this->accountModel->OrderDetails($OrderNumber);
            $OrderInfo = $this->accountModel->OrderInfo($OrderNumber);
            $OrderInfo = (array)$OrderInfo[0];

            $site = $OrderInfo['site'];
            $language = ($site == "" || $site == "en") ? "en" : "fr";
            $page = ($language == "en") ? "user/orderconfirm.php" : "user/orderconfirm.php";

            $data['OrderInfo'] = $OrderInfo;
            $data['invoice'] = $this->home_model->get_db_column('invoice', 'InvoiceNumber', 'OrderNumber', $orderID);

            $this->load->library('pdf');
            $this->pdf->load_view($page, $data);
            $this->pdf->render();
            $output = $this->pdf->output();
            $file_location = "pdfs/Order-No-" . $OrderNumber . ".pdf";

            $filename = $file_location;
            $fp = fopen($filename, "a");
            file_put_contents($file_location, $output);

            $file = FCPATH . $filename;
        }

        if ($PaymentMethod1 == "chequePostel") {
            if (file_exists($file)) {
                $this->email->attach($file);
            }
        }


        $this->email->send();

        if (($res['vat_exempt'] == 'no') and ($res['OrderStatus'] == 2 || $res['OrderStatus'] == 32)) {
            //$this->email->send();
        }
        if ($res['OrderStatus'] == 2 || $res['OrderStatus'] == 32) {
            $res['OrderStatus'] = $this->check_printable_order($OrderNumber, $res['OrderStatus']);
        }

        if ($res['OrderStatus'] == 2 || $res['OrderStatus'] == 32) {
            $this->load->library('Custom');
            $this->custom->assign_dispatch_date($OrderNumber);
        }


        $parameters = array('OrderNumber' => $OrderNumber,
            'name' => $BillingFirstName,
            'email' => $email,
            'telephone' => $Billingtelephone,
            'mobile' => $BillingMobile1,
            'OrderStatus' => $res['OrderStatus'],
        );
        $this->send_printing_attachemts($parameters);

        $dele['ServiceID'] = "";
        $dele['ServiceName'] = "";
        $dele['BasicCharges'] = "";
        //$dele['OrderNumber'] = "";
        $dele['valid_voucher'] = "";
        $dele['voucherCode'] = "";
        $dele['off_postcode'] = "";
        $dele['countryid'] = "";
        $dele['vat_exemption'] = "";
        $dele['checkoutdata'] = "";

        $this->session->unset_userdata($dele);
        $this->emptycartafterConfirm();

        if ($PaymentMethod1 == "chequePostel") {
            if (file_exists($file)) {
                @unlink($file);
            }
        }

    }

    function check_printable_order($ordernumber, $OrderStatus = NULL)
    {

        $query = $this->db->query(" select count(*) as total from orderdetails where OrderNumber LIKE '" . $ordernumber . "' AND Printing LIKE 'Y' AND source NOT LIKE 'flash' AND (select ProductBrand from products WHERE products.ProductID =orderdetails.ProductID ) NOT LIKE 'Application Labels' ");
        $row = $query->row_array();
        if ($row['total'] > 0) {
            $this->db->update('orders', array('OrderStatus' => 55), array('OrderNumber' => $ordernumber));
            $status_log = array('OrderNumber' => $ordernumber,
                'OrderStatus_new' => 55,
                'OrderStatus_old' => $OrderStatus,
                'Oprator' => 'AALabels Server',
                'Date' => time());
            $this->db->insert('status_change_log', $status_log);
            $OrderStatus = 55;
        }
        return $OrderStatus;
    }

    function get_status_id($status_text)
    {

        switch ($status_text) {
            case 'ABORT':
                $content = 35;
                break;
            case 'OK':
                $content = 32;
                break;
            case 'MALFORMED':
                $content = 20;
                break;
            case 'INVALID':
                $content = 21;
                break;
            case 'NOTAUTHED':
                $content = 22;
                break;
            case 'REJECTED':
                $content = 23;
                break;
            case 'REGISTERED':
                $content = 24;
                break;
            case 'ERROR':
                $content = 25;
                break;
            case 'Pending':
                $content = 6;
                break;
            case 'Completed':
                $content = 2;
                break;
            case 'FAILED':
                $content = 26;
                break;
            case 'Refunded': /*Case is not covered yet, but for future use only--Nov 03_2011*/
                $content = 131;
                break;
            case 'Reversed': /*Case is not covered yet, but for future use only--Nov 03_2011*/
                $content = 132;
                break;
            case 'Processed': /*Case is not covered yet, but for future use only--Nov 03_2011*/
                $content = 133;
                break;
            case  'Voided' :/*Case is not covered yet, but for future use only--Nov 03_2011*/
                $content = 134;
                break;
            case  'Expired' :/*Case is not covered yet, but for future use only--Nov 03_2011*/
                $content = 135;
                break;
            case  'Denied' :/*Case is not covered yet, but for future use only--Nov 03_2011*/
                $content = 136;
                break;
            case  'Canceled_Reversal' :/*Case is not covered yet, but for future use only--Nov 03_2011*/
                $content = 137;
                break;
            default:
                $content = 138;
                break;
        }
        return $content;
    }

    /**************** first order oucher code ***************/
    function check_discount_applied($newGrandTotal, $perentage = NULL)
    {

        $userid = $this->session->userdata('userid');
        $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "'");
        $res = $qry->row_array();
        if ($res) {
            if ($res['grandtotal'] != $newGrandTotal) {

                $this->update_discount_applied($newGrandTotal, $perentage);

            }
            $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "'");
            $res = $qry->row_array();
        }

        return $res;
    }

    function update_discount_applied($GrandTotal, $perentage = NULL)
    {

        if (isset($perentage) and $perentage != NULL) {
            $discout_perct = number_format($perentage / 100, 2);
        } else {
            $discout_perct = number_format(10 / 100, 2);
        }

        $DsountOff = $GrandTotal * $discout_perct;
        $session_id = $this->session->userdata('session_id');

        $data = array(
            'discount_offer' => $DsountOff,
            'grandtotal' => $GrandTotal,
        );

        $update = $this->db->update('voucherofferd_temp', $data, array('SessionID' => $this->sessionid()));
    }

    function order_discount_applied()
    {
        $userid = $this->session->userdata('userid');
        $res = array();
        if ($userid) {
            $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "' AND UserID = " . $userid . " ");
            $res = $qry->row_array();
        }

        return $res;
    }

    function expire_used_voucher($orderNumber = NULL)
    {

        $valid_voucher = $this->session->userdata('valid_voucher');
        if ($valid_voucher == 'yes' and $orderNumber != NULL) {

            $query = $this->db->query("SELECT voucherOfferd FROM `orders` WHERE  OrderNumber LIKE '" . $orderNumber . "' ");
            $row = $query->row_array();
            if ($row['voucherOfferd'] == 'Yes') {
                $userid = $this->session->userdata('userid');
                $data = array('Used' => '1', 'OrderNumber' => $orderNumber, 'ApplyDate' => time());
                $this->db->where('UserID', $userid);
                $this->db->update('tbl_first_order_offer', $data);
            }

            $array_items = array('valid_voucher' => '', 'voucherCode' => '');
            $this->session->unset_userdata($array_items);


        }
    }


    /*----------------------------------WTP OFFERS---------------------------------------*/

    function wtp_discount_applied_on_order()
    {
        // AA30 STARTS
            $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "' ORDER BY ID DESC LIMIT 1 ");
        // AA30 ENDS
        $res = $qry->row_array();
        return $res;
    }

    function check_wtp_voucher_applied($newGrandTotal, $voucherType)
    {
        // AA30 STARTS
        if ($voucherType == "fldt") {
            $this->updateFLDTCartVoucherDiscount($newGrandTotal);
            $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "' AND vc_type = 'fldt' ORDER BY ID DESC LIMIT 1 ");
            $res = $qry->row_array();
        } else {
            $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "' AND vc_type = 'wtp' ORDER BY ID DESC LIMIT 1 ");
            $res = $qry->row_array();
            if ($res) {
                if ($res['grandtotal'] != $newGrandTotal) {
                    $amount = $this->calculate_total_wtp_amount();
                    $this->update_wtp_discount_voucher($amount);
                }
                $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "' AND vc_type = 'wtp' ORDER BY ID DESC LIMIT 1  ");
                $res = $qry->row_array();
            }
        }
        return $res;
        // AA30 ENDS
    }


    function update_wtp_discount_voucher($GrandTotal)
    {

        $discout_perct = number_format(15 / 100, 2);
        $DsountOff = $GrandTotal * $discout_perct;
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'discount_offer' => $DsountOff,
            'grandtotal' => $GrandTotal,
        );
        // AA30 STARTS
            $update = $this->db->update('voucherofferd_temp', $data, array('SessionID' => $this->sessionid(), 'vc_type' => 'wtp'));
        // AA30 ENDS
    }

    function check_wtp_offer_voucher()
    {

        $session_id = $this->session->userdata('session_id');
        
        // $query = $this->db->query("SELECT count(temporaryshoppingbasket.ProductID) AS total from products INNER JOIN temporaryshoppingbasket ON 
        //                             products.ProductID=temporaryshoppingbasket.ProductID WHERE ManufactureID LIKE '%WTP' AND SessionID = '" . $session_id . "' AND 
        //                             temporaryshoppingbasket.Quantity >= 10000 AND  (ProductBrand LIKE 'A4 Labels') AND (Printing is NULL) OR (Printing != 'Y')  ");

        $query = $this->db->query("SELECT count(temporaryshoppingbasket.ProductID) AS total from products INNER JOIN temporaryshoppingbasket ON 
                                    products.ProductID=temporaryshoppingbasket.ProductID WHERE ManufactureID LIKE '%WTP' AND SessionID = '" . $session_id . "' AND 
                                    temporaryshoppingbasket.Quantity >= 10000 AND  (ProductBrand LIKE 'A4 Labels') AND (Printing != 'Y'  OR Printing IS NULL )  ");

        $row = $query->row_array();


        if (isset($row['total']) and $row['total'] > 0) {
            return true;
        } else {
            // AA30 STARTS
                $update = $this->db->delete('voucherofferd_temp', array('SessionID' => $this->sessionid(), 'UserID' => 0, 'vc_type' => 'wtp'));
            // AA30 ENDS
            return false;
        }
    }

    // AA30 STARTS
    function updateFLDTCartVoucherDiscount($GrandTotal)
    {
        $fldt_total = 0;
        $row = $this->getFldtProductTotal();
        $fldt_total = ($row['fldtTotal'] * 1.2);
        if ($fldt_total <= 50) {
            $DisountOff = number_format( ( $fldt_total) , 2);
        } else {
            $DisountOff = number_format(50, 2);
        }

        $data = array(
            'discount_offer' => $DisountOff,
            'grandtotal' => $GrandTotal,
        );
        $update = $this->db->update('voucherofferd_temp', $data, array('SessionID' => $this->sessionid(), 'vc_type' => 'fldt') );
        return $fldt_total;
    }

    function check_fldt_offer_voucher()
    {
        $data = $this->db->query("SELECT * FROM voucherofferd_temp WHERE vc_type = 'fldt' AND status = 0 ");
        $data_row = $data->result();
        if(count($data_row) == 0)
        {
            $row = $this->getFldtProductTotal();
            if ($row['noOfRows'] > 0) {
                return true;
            } else {
                $update = $this->db->delete('voucherofferd_temp', array('SessionID' => $this->sessionid(), 'UserID' => 0, 'vc_type' => 'fldt'));
                return false;
            }
        }
        else
        {
            return false;
        }

        
    }

    function getFldtProductTotal()
    {
        $get_fldt_total_price = $this->db->query(" SELECT COUNT(*) as noOfRows, SUM(Print_Total+TotalPrice) as fldtTotal FROM `temporaryshoppingbasket` WHERE SessionID = '" . $this->sessionid() . "' AND source = 'LBA' AND ProductID != 0 ");
        return $get_fldt_total_price->row_array();
    }

    // AA30 ENDS

    function calculate_total_wtp_amount()
    {
        $session_id = $this->session->userdata('session_id');
        $query = $this->db->query(" SELECT SUM(TotalPrice) AS total from products INNER JOIN temporaryshoppingbasket ON 
									products.ProductID=temporaryshoppingbasket.ProductID WHERE ManufactureID LIKE '%WTP' AND SessionID = '" . $session_id . "' AND 
									temporaryshoppingbasket.Quantity >= 10000 AND  (ProductBrand LIKE 'A4 Labels')");
        $row = $query->row_array();
        if (isset($row['total']) and $row['total'] != '') {
            return $row['total'] * 1.2;
        } else {
            return 0.00;
        }
    }

    function is_xmass_labels()
    {
        $session_id = $this->session->userdata('session_id');
        $query = $this->db->query(" SELECT COUNT(*) AS total from products INNER JOIN temporaryshoppingbasket ON 
									products.ProductID=temporaryshoppingbasket.ProductID WHERE ManufactureID LIKE '%-XS' AND SessionID = '" . $session_id . "' 
									AND (ProductBrand LIKE 'A4 Labels')");
        $row = $query->row_array();
        return $row['total'];
    }


    /************************* Black Friday Offer **********************************/
    function calculate_plain_order_total()
    {
        $total = 0.00;
        $session_id = $this->session->userdata('session_id');
        $query = $this->db->query(" SELECT SUM(TotalPrice) AS total from products INNER JOIN temporaryshoppingbasket ON 
					products.ProductID=temporaryshoppingbasket.ProductID WHERE SessionID = '" . $session_id . "' AND 
					temporaryshoppingbasket.Printing NOT LIKE 'Y' AND  (ProductBrand LIKE 'Roll Labels' || ProductBrand LIKE 'A4 Labels')");
        $row = $query->row_array();

        $total = $row['total'] * 1.2;
        if ($total > 0) {
            return $total;
        } else {
            return 0;
        }
    }

    function check_black_friday_offer($GrandTotal)
    {

        //$current = date("Y-m-d",time()+(3600*24*30));
        $current = date('Y-m-d');
        $current = date('Y-m-d', strtotime($current));;
        $DateBegin = date('Y-m-d', strtotime("11/24/2017"));
        $DateEnd = date('Y-m-d', strtotime("11/26/2017"));
        $response = array('status' => false);
        return $response;

        $userid = $this->session->userdata('userid');

        if (($current >= $DateBegin) && ($current <= $DateEnd)) {

            $GrandTotal = $this->calculate_plain_order_total();
            $wpep = $this->is_wpep_disocunt_applied();
            if ($wpep > 0) {
                return $response;
            }
            $bf_user = 0;
            $bf_count = $this->b_friday_count();
            if (isset($userid) and $userid != '') {
                $bf_user = $this->b_friday_user_count($userid);
            }

            if ($bf_count < 100 and $bf_user < 2) {
                $disount_applied = $this->apply_black_friday($GrandTotal);
                $response = array('status' => true, 'discount_offer' => $disount_applied['discount_offer']);
            } else {
                $update = $this->db->delete('voucherofferd_temp', array('SessionID' => $this->sessionid(), 'vc_type' => 'BF'));
            }
            //$update = $this->db->update('voucherofferd_temp', $data, array('SessionID' => $this->sessionid()));
        } else {
            $update = $this->db->delete('voucherofferd_temp', array('SessionID' => $this->sessionid(), 'vc_type' => 'BF'));
        }
        return $response;
    }

    function apply_black_friday($GrandTotal)
    {

        $count = $this->wtp_discount_applied_on_order();
        if ($count) {
            $disount_applied = $this->check_discount_applied($GrandTotal, 25);
        } else {
            $userid = $this->session->userdata('userid');
            $discout_perct = number_format(25 / 100, 2);
            $DisountOff = $GrandTotal * $discout_perct;
            $New_grand = number_format(round(($GrandTotal - $DisountOff), 2), 2);
            $date = time();
            $session_id = $this->session->userdata('session_id');
            $GrandTotal = number_format($GrandTotal, 2);

            $feilds = array('vc_type' => 'BF',
                'SessionID' => $session_id,
                'DateLogged' => $date,
                'UserID' => $userid,
                'discount_offer' => $DisountOff,
                'grandtotal' => $GrandTotal);
            $this->db->insert('voucherofferd_temp', $feilds);
            $disount_applied['discount_offer'] = number_format($DisountOff, 2);
        }
        return $disount_applied;
    }

    function b_friday_count()
    {
        $now = date("Y-m-d", time());
        $query = $this->db->query("select count(*) as total from black_friday WHERE DATE(`date`) = '" . $now . "'");
        $row = $query->row_array();
        return $row['total'];
    }

    function b_friday_user_count($userid)
    {
        $query = $this->db->query("select count(*) as total from black_friday WHERE userid LIKE '" . $userid . "' AND DATE(`date`) > DATE('2017-11-24')");
        $row = $query->row_array();
        return $row['total'];
    }

    function is_wpep_disocunt_applied()
    {
        $session_id = $this->session->userdata('session_id');
        $query = $this->db->query(" SELECT COUNT(*) AS total from products INNER JOIN temporaryshoppingbasket ON 
		products.ProductID=temporaryshoppingbasket.ProductID 
                WHERE (ManufactureID LIKE '%WPEP' OR ManufactureID LIKE '%-XS') AND 
                SessionID = '" . $session_id . "' AND (ProductBrand LIKE 'A4 Labels')");
        $row = $query->row_array();
        return $row['total'];

    }

    /******************************************************************/


    function data_layer()
    {

        $class = $this->router->fetch_class();
        $method = $this->router->fetch_method();
        if ($class == 'shopping' and $method == 'orderConfirmation') {

            $orderNum = $this->session->userdata('OrderNumber');
            $data = '';

            $order = $this->data_order_total($orderNum);
            $lines = $this->data_order_details($orderNum);

            $googleproductinfo = '';
            foreach ($lines as $pro) {
                $googleproductinfo .= "{  'sku': '" . $pro->ManufactureID . "',
							   			   'name': '" . $pro->ProductName . "',
									       'price': " . $pro->ProductTotal . ",
									       'quantity': '" . $pro->Quantity . "',  },";

            }

            $tax = '';
            $tax = $order['OrderTotal'] - ($order['OrderTotal'] / 1.2);
            $data = "dataLayer = [{ 'transactionId': '" . $orderNum . "',
									'transactionAffiliation': 'aalabels',
									'transactionTotal': " . number_format($order['OrderTotal'] - $tax, 2) . ",
									'transactionTax': " . number_format($tax, 2) . ",
									'transactionShipping': " . $order['OrderShippingAmount'] . ",
									'transactionProducts': [" . $googleproductinfo . "]
								}];";

            $dele['OrderNumber'] = "";
            $this->session->unset_userdata($dele);

            return $data;

        }
    }

    function data_order_total($order)
    {
        $row = $this->db->query("select OrderTotal,OrderShippingAmount from orders WHERE OrderNumber LIKE '" . $order . "'");
        return $row->row_array();


    }

    function data_order_details($order)
    {
        $row = $this->db->query("select  ManufactureID,ProductName,ProductTotal,Quantity from orderdetails WHERE OrderNumber LIKE '" . $order . "'");
        return $row->result();
    }


    /********** Top cash Back script ********/
    function calculate_topcashback($order_number)
    {

        $query = $this->db->query("SELECT SUM(ProductTotal) as total FROM `orderdetails` Inner JOIN products ON 
		products.ProductID = orderdetails.ProductID WHERE ( ProductBrand LIKE 'A5 Labels' OR ProductBrand LIKE 'A4 Labels' OR ProductBrand LIKE 'A3 Label' OR ProductBrand LIKE 'SRA3 Label' ) AND Printing NOT LIKE 'Y' AND OrderNumber LIKE '" . $order_number . "' ");
        $row = $query->row_array();
        if (isset($row['total']) and $row['total'] > 0) {
            //return ($row['total']/1.2);

            $total = $row['total'] / 1.2;
            return $total;


        } else {
            return 0;
        }
    }

    /********** Top cash Back script ********/


    /******************Sample Order implementation***********************/

    function is_order_sample()
    {

        $sample = $this->sample_count_items();
        $other = $this->standard_count_items();

        if ($sample > 0 and $other == 0) {
            return "sample";
        } else if ($sample > 0 and $other > 0) {
            return "mixed";
        } else {
            return "other";
        }
    }

    function sample_count_items()
    {
        $SID = $this->sessionid();
        $result = $this->db->query("select count(ID) as total from temporaryshoppingbasket WHERE OrderData LIKE 'Sample' 
		AND SessionID LIKE '" . $SID . "' ");
        $row = $result->row_array();
        return $row['total'];

    }

    function standard_count_items()
    {
        $SID = $this->sessionid();
        $result = $this->db->query("select count(ID) as total from temporaryshoppingbasket WHERE OrderData NOT LIKE 'Sample' 
		AND SessionID LIKE '" . $SID . "' ");
        $row = $result->row_array();
        return $row['total'];
    }

    function printing_count_items()
    {
        $SID = $this->sessionid();
        $result = $this->db->query("select count(ID) as total from temporaryshoppingbasket WHERE  Printing LIKE 'Y' 
		AND SessionID LIKE '" . $SID . "' ");
        $row = $result->row_array();
        return $row['total'];
    }

    function send_printing_attachemts($parameters)
    {


        $OrderStatus = $parameters['OrderStatus'];
        $OrderNumber = $parameters['OrderNumber'];
        $name = $parameters['name'];
        $email = $parameters['email'];
        $telephone = (isset($parameters['telephone']) and $parameters['telephone'] != '') ? $parameters['telephone'] : '';
        $mobile = (isset($parameters['mobile']) and $parameters['mobile'] != '') ? $parameters['mobile'] : '';

        $pcount = $this->db->query("SELECT count(*) as total FROM orderdetails WHERE OrderNumber LIKE '" . $OrderNumber . "' AND Printing LIKE 'Y' ");
        $pcount = $pcount->row_array();
        if ($pcount['total'] == 0) {
            return;
        }


        //110
        $q = $this->db->query("SELECT * FROM " . Template_Table . " WHERE MailID ='125'");
        $result = $q->result();
        $mailText = $result[0]->MailBody;
        $mailTitle = $result[0]->MailTitle;
        $mailName = $result[0]->Name;
        $from_mail = $result[0]->MailFrom;
        $mailSubject = $result[0]->MailSubject;

        // $OrderNumber = 'AA58592';

        $this->load->library('email');
        $this->email->from('customercare@aalabels.com', $mailName);
        //$this->email->to('testing.greentech@gmail.com');
        $this->email->subject($mailSubject);
        $this->email->bcc('php.aalabels@gmail.com');
        $this->email->to('customercare@aalabels.com');

        $this->email->set_mailtype("html");

        $query = $this->db->query("Select order_attachments_integrated.ID,ProductID,file,(select ManufactureID from products 
			  WHERE products.ProductID =order_attachments_integrated.ProductID) AS ManufactureID from order_attachments_integrated 
			  where OrderNumber LIKE '$OrderNumber' Order By ProductID ASC");
        $result = $query->result();
        if (count($result) > 0) {

            $attachemnt = '';
            $file = '';
            foreach ($result as $key => $row) {
                if ((isset($result[$key + 1]->ProductID) and $result[$key + 1]->ProductID != $row->ProductID) || $key == 0) {
                    $attachemnt .= '<tr><td colspan="2" align="left" valign="top" bgcolor="#ffffff">
										 <strong>Product Code: ' . $row->ManufactureID . '</strong> <br><br>';
                }
                /*$attachemnt .= '<a target="_blank" href="'.base_url().'theme/integrated_attach/'.$row->file.'">
									<img src="'.base_url().'theme/integrated_attach/'.$row->file.'" width="100" height=""></a>';*/

                $attachemnt .= "<a style='border-left: 1px solid;border-right: 1px solid;border-top: 1px solid;border-bottom: 1px solid; float: left;text-align: center;width: 110px; margin-left:5px;' target='_blank' href='" . base_url() . "attachments/" . md5($row->ID) . "'>
									<img src='" . Assets . "images/icon-download28.png' width='95' > Download</a>";

                if ((isset($result[$key + 1]->ProductID) and $result[$key + 1]->ProductID != $row->ProductID) || count($result) == $key) {
                    $attachemnt .= '</td></tr>';
                }

                /*$file = PATH.'/'.$row->file;
					if(file_exists($file) and $row->file!='') {
						 $this->email->attach($file);
					}*/
            }


        } else {

            $attachemnt = '<tr><td colspan="2" align="left" valign="top" bgcolor="#ffffff">No artwork has been successfully uploaded by the customer, please contact.</td></tr>';

        }

        $strINTemplate = array("[attachments]", "[OrderNumber]", "[Name]", "[Email]", "[Phone]", "[Mobile]");
        $strInDB = array($attachemnt, $OrderNumber, $name, $email, $telephone, $mobile);
        $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);
        $this->email->message($newPhrase);
        $this->email->send();

    }

    /******************Sample Order implementation***********************/
    function country_code($country)
    {
        $countrucode = array('Ireland' => 'IE',
            'Belgium' => 'BE',
            'Denmark' => 'DK',
            'France' => 'FR',
            'Holland' => 'NL',
            'Germany' => 'DE',
            'Sweden' => 'SE',
            'Spain' => 'ES',
            'Switzerland' => 'CH',
            'Luxembourg' => 'LU',
            'United Kingdom' => 'GB');
        //return 'GB';
        return $countrucode[$country];
    }

    function calculate_lba_in_cart()
    {


        $total = $this->standard_count_items();
        $SID = $this->sessionid();
        $result = $this->db->query("select count(ID) as total from temporaryshoppingbasket WHERE  
		(Select ProductBrand From products WHERE temporaryshoppingbasket.ProductID = products.ProductID) LIKE 'Application Labels' 
		AND SessionID LIKE '" . $SID . "' ");
        $row = $result->row_array();
        if ($total == $row['total']) return "lba";
        else return "mixed";

    }


    function send_purcasheorder_attachemts($parameters)
    {

        $OrderNumber = $parameters['OrderNumber'];
        $name = $parameters['name'];
        $email = $parameters['email'];
        $attachemt = $parameters['attachemt'];
        $telephone = (isset($parameters['telephone']) and $parameters['telephone'] != '') ? $parameters['telephone'] : '';
        $mobile = (isset($parameters['mobile']) and $parameters['mobile'] != '') ? $parameters['mobile'] : '';

        $q = $this->db->query("SELECT * FROM " . Template_Table . " WHERE MailID ='129'"); //130
        $result = $q->result();
        $mailText = $result[0]->MailBody;
        $mailTitle = $result[0]->MailTitle;
        $mailName = $result[0]->Name;
        $from_mail = $result[0]->MailFrom;
        $mailSubject = $result[0]->MailSubject;

        $this->load->library('email');
        $this->email->from('customercare@aalabels.com', $mailName);
        $this->email->subject($mailSubject);
        $this->email->to('customercare@aalabels.com');
        // $this->email->bcc('arslan.jd@gmail.com');
        $this->email->set_mailtype("html");

        if ($attachemt != '') {

            $attachemnt = '';
            $path = base_url() . 'theme/integrated_attach/' . $attachemt;
            $attachemnt .= '<tr><td colspan="2" align="left" valign="top" bgcolor="#ffffff">
										 <strong>Copy Of Purchase Order</strong> <br><br>';
            $attachemnt .= "<a style='border-left: 1px solid;border-right: 1px solid;border-top: 1px solid;border-bottom: 1px solid; float: left;text-align: center;width: 110px; margin-left:5px;' target='_blank' href='" . $path . "'>
									<img src='" . Assets . "images/icon-download28.png' width='95' > Download</a>";
            $attachemnt .= '</td></tr>';
        } else {
            $attachemnt = '<tr><td colspan="2" align="left" valign="top" bgcolor="#ffffff">No Copy of Purchase Order is uploaded by customer</td></tr>';
        }

        $strINTemplate = array("[attachments]", "[OrderNumber]", "[Name]", "[Email]", "[Phone]", "[Mobile]");
        $strInDB = array($attachemnt, $OrderNumber, $name, $email, $telephone, $mobile);
        $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);
        $this->email->message($newPhrase);
        $this->email->send();

    }

    /********************* 10% dicounts on Printed Roll Labels ********************/

    function printedroll_discount_applied_on_order()
    {
        $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "'");
        $res = $qry->row_array();
        return $res;
    }

    function check_printedroll_voucher_applied($newGrandTotal)
    {

        $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "'");
        $res = $qry->row_array();
        if ($res) {
            if ($res['grandtotal'] != $newGrandTotal) {

                $amount = $this->calculate_total_printedroll_amount();
                $this->update_printedroll_discount_voucher($amount);

            }
            $qry = $this->db->query("SELECT * FROM voucherofferd_temp WHERE SessionID = '" . $this->sessionid() . "'");
            $res = $qry->row_array();
        }
        return $res;
    }


    function update_printedroll_discount_voucher($GrandTotal)
    {

        $discout_perct = number_format(10 / 100, 2);
        $DsountOff = $GrandTotal * $discout_perct;
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'discount_offer' => $DsountOff,
            'grandtotal' => $GrandTotal,
        );
        $update = $this->db->update('voucherofferd_temp', $data, array('SessionID' => $this->sessionid()));
    }

    function check_printedroll_offer_voucher()
    {
        return false;
        $session_id = $this->session->userdata('session_id');
        $query = $this->db->query(" SELECT count(temporaryshoppingbasket.ProductID) AS total from products INNER JOIN temporaryshoppingbasket ON 
		      						products.ProductID=temporaryshoppingbasket.ProductID WHERE SessionID = '" . $session_id . "' AND 
			   						temporaryshoppingbasket.Printing LIKE 'Y' AND  (ProductBrand LIKE 'Roll Labels')");
        $row = $query->row_array();


        if (isset($row['total']) and $row['total'] > 0) {
            return true;
        } else {
            $update = $this->db->delete('voucherofferd_temp', array('SessionID' => $this->sessionid(), 'UserID' => 0, 'vc_type' => 'printedroll'));
            return false;
        }
    }

    function calculate_total_printedroll_amount()
    {
        return 0.00;
        $session_id = $this->session->userdata('session_id');
        $query = $this->db->query(" SELECT SUM(TotalPrice) AS total from products INNER JOIN temporaryshoppingbasket ON 
									products.ProductID=temporaryshoppingbasket.ProductID WHERE SessionID = '" . $session_id . "' AND 
									temporaryshoppingbasket.Printing LIKE 'Y' AND  (ProductBrand LIKE 'Roll Labels')");
        $row = $query->row_array();
        if (isset($row['total']) and $row['total'] != '') {
            return $row['total'] * 1.2;
        } else {
            return 0.00;
        }
    }

    /*************************************************/
    function grouped_country_list($type)
    {
        $query = $this->db->query("SELECT * FROM `shippingcountries` WHERE `status` = 'active' AND 
		`country_group` LIKE '" . $type . "' ORDER BY name ASC ")->result();
        return $query;
    }

    function is_order_integrated()
    {
        $SID = $this->sessionid();
        $result = $this->db->query("select COUNT(*) as total from temporaryshoppingbasket temp JOIN products pro on temp.ProductID = pro.ProductID WHERE temp.SessionID LIKE '" . $SID . "' AND pro.ProductBrand = 'Integrated Labels' and OrderData != 'Sample' ");
        $row = $result->row_array();
        return $row['total'];
    }

    function get_integrated_delivery_charges()
    {

        $SID = $this->sessionid();
        $int_sheets = $this->db->query("SELECT SUM(Quantity) as qty, t.ProductID FROM `temporaryshoppingbasket` t, products p where p.ProductID = t.ProductID and p.ProductBrand = 'Integrated Labels' and SessionID = '$SID' and t.p_name != 'Delivery Charges'")->row_array();


        $dpd = $this->home_model->get_integrated_delivery($int_sheets['qty']);
        $dpd = $dpd['dpd'];
        return $dpd;

        /*$qry = $this->db->query("SELECT * FROM temporaryshoppingbasket WHERE SessionID = '".$this->sessionid()."' AND p_name ='Delivery Charges'");
		return $qry->result();*/
    }


    /****************** Trade Print Functions***********************/

    function split_trade_order($orderNum)
    {
        $redirect_from = $this->session->userdata('redirect_from');
        if ($redirect_from) {
            $orderDetails = $this->shopping_model->order($orderNum);
            $orderLines = $this->shopping_model->order_detail($orderNum);

            $serials_array = array();
            foreach ($orderLines as $line) {
                if ($line['page_location'] == "Trade Print") {
                } else {
                    $serials_array[] = $line['SerialNumber'];
                }
            }

            if ($serials_array) {
                $sessionid = $this->session->userdata('session_id');
                $this->db->insert('auto_ordernumber', array('session_id' => $sessionid));
                $order_num = $this->db->insert_id();
                $OrderNumber = 'AA' . $order_num;

                $orderTotal = 0;
                foreach ($serials_array as $serial) {
                    $orderTotal += $this->home_model->get_db_column('orderdetails', 'ProductTotal', 'SerialNumber', $serial);

                    $this->db->set('OrderNumber', $OrderNumber);
                    $this->db->where('SerialNumber', $serial);
                    $this->db->update('orderdetails');

                    $this->db->set('OrderNumber', $OrderNumber);
                    $this->db->where('Serial', $serial);
                    $this->db->update('order_attachments_integrated');
                }

                $orderDetails['OrderTotal'] = $orderDetails['OrderTotal'] - $orderTotal;

                $this->db->where('OrderNumber', $orderDetails['OrderNumber']);
                $this->db->update('orders', $orderDetails);

                $AAOrder = $orderDetails;

                unset($AAOrder['OrderID']);
                $AAOrder['OrderNumber'] = $OrderNumber;
                $AAOrder['OrderTotal'] = $orderTotal;
                $this->db->insert('orders', $AAOrder);

                //if order status == 2/32 then check if the line is plain, then change the status to 55.
                if (($AAOrder['OrderStatus'] == 2) || ($AAOrder['OrderStatus'] == 32)) {
                    $this->change_order_status_confirmation($OrderNumber);
                }
            }
        }
    }

    function change_order_status_confirmation($orderNum)
    {

        $plain_query = "select count(*) as total from orderdetails where OrderNumber LIKE '" . $orderNum . "' AND Printing NOT LIKE 'Y' AND source NOT LIKE 'flash' AND (select ProductBrand from products WHERE products.ProductID =orderdetails.ProductID ) NOT LIKE 'Application Labels'";

        $printed_query = "select count(*) as total from orderdetails where OrderNumber LIKE '" . $orderNum . "' AND Printing LIKE 'Y' AND source NOT LIKE 'flash' AND (select ProductBrand from products WHERE products.ProductID =orderdetails.ProductID ) NOT LIKE 'Application Labels'";

        //$plain_order = $this->db->query($plain_query)->row()->total;
        $printed_order = $this->db->query($printed_query)->row()->total;
        if (!$printed_order) {
            $this->db->set('OrderStatus', 2);
            $this->db->where('OrderNumber', $orderNum);
            $this->db->update('orders');
        }
    }


    /****************** ABANDONED CARTS ***********************/
    function abandoned_carts($interval)
    {
        if ($interval == 30) {
            $time = (30 * 60); //fetch 30minutes old carts
            //$time = (1*60); //fetch 1 minute old carts
            $reminder_sent = "reminder_sent_30 = 'N'";
            $minus_day = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        } else if ($interval == 24) {
            $time = (24 * 60 * 60); //fetch 24 hours old cart
            //$time = (2*60); //fetch 2 minute old cart
            //$time = 0;
            $reminder_sent = "reminder_sent = 'N'";
            $minus_day = mktime(date('H'), date('i'), date('s'), date('m'), date('d') - 2, date('Y'));
        }

        $dateTime = date("Y-m-d H:i:s", time() - $time); // all carts order than time
        $MaxDateTime = date("Y-m-d H:i:s", $minus_day); // all orders after 27-11-2018

        //$query = $this->db->query("SELECT DISTINCT(SessionID), UserID FROM temporaryshoppingbasket WHERE OrderTime <= '$dateTime' AND OrderTime >= '$MaxDateTime' AND $reminder_sent AND `userID` != '0' AND `productID` != 0 AND cart_restored = 'N' ORDER by OrderTime DESC LIMIT 0,10")->result();

        $query = $this->db->query("SELECT DISTINCT(SessionID), UserID FROM temporaryshoppingbasket WHERE added_from != 'backoffice' AND OrderTime <= '$dateTime' AND OrderTime >= '$MaxDateTime' AND $reminder_sent AND `userID` != '0' AND `productID` != 0 ORDER by OrderTime DESC LIMIT 0,10")->result();

        return $query;
    }

    function get_user_cart($userID, $sessionID, $interval)
    {
        if ($interval == 30) {
            $time = (30 * 60); //fetch 30minutes old carts
            //$time = (1*60); //fetch 1 minute old carts
            $remindersent = "reminder_sent_30 = 'N'";
            $minus_day = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        } else if ($interval == 24) {
            $time = (24 * 60 * 60); //fetch 24 hours old cart
            //$time = (2*60); //fetch 2 minute old cart
            $remindersent = "reminder_sent = 'N'";
            $minus_day = mktime(date('H'), date('i'), date('s'), date('m'), date('d') - 2, date('Y'));
        }

        $dateTime = date("Y-m-d H:i:s", time() - $time); // all carts order than time
        $MaxDateTime = date("Y-m-d H:i:s", $minus_day); // all orders after 27-11-2018
        //$query = $this->db->query("SELECT * FROM temporaryshoppingbasket WHERE userID = '$userID' AND SessionID = '$sessionID' and OrderTime <= '$dateTime' AND OrderTime >= '$MaxDateTime' AND $remindersent AND cart_restored = 'N' ORDER by OrderTime DESC LIMIT 0,10")->result();
        $query = $this->db->query("SELECT * FROM temporaryshoppingbasket WHERE userID = '$userID' AND SessionID = '$sessionID' and OrderTime <= '$dateTime' AND OrderTime >= '$MaxDateTime' AND $remindersent ORDER by OrderTime DESC LIMIT 0,10")->result();
        //echo $this->db->last_query();
        return $query;
    }

    /*****************************************************/
    function is_order_virtual()
    {
        $virtual = $this->virtual_count_items();
        $other = $this->not_virtual_count_items();
        if ($virtual > 0 and $other == 0) {
            return "virtual";
        } else if ($virtual > 0 and $other > 0) {
            return "mixed";
        } else {
            return "other";
        }
    }

    function virtual_count_items()
    {
        $SID = $this->sessionid();
        $result = $this->db->query("select count(ID) as total from temporaryshoppingbasket WHERE ProductID = 0 AND source = 'LBA' AND SessionID LIKE '" . $SID . "' ");
        $row = $result->row_array();
        return $row['total'];
    }

    function not_virtual_count_items()
    {
        $SID = $this->sessionid();
        $result = $this->db->query("select count(ID) as total from temporaryshoppingbasket WHERE ProductID != 0 AND source != 'LBA' AND SessionID LIKE '" . $SID . "' ");
        $row = $result->row_array();
        return $row['total'];
    }

    /****** User Experience ***********/
    function get_user_addresses($userid)
    {
        $query = "SELECT * FROM `customerdeliverydetails` Where UserID = '$userid' order By CustomerDeliveryID DESC";
        $addresses = $this->db->query($query)->result();
        return $addresses;
    }

    function get_address($addressid)
    {
        $query = "SELECT * FROM `customerdeliverydetails` Where CustomerDeliveryID = '$addressid'";
        $address = $this->db->query($query)->row();
        return $address;
    }

    function browsing_history()
    {
        //$time = (24*60*60); //fetch 24 hours old cart
        $time = (30 * 60); //fetch 2 minute old cart
        //$time = 0;
        $reminder_sent = "reminder_sent = 'N'";
        $minus_day = mktime(date('H'), date('i'), date('s'), date('m'), date('d') - 2, date('Y'));

        $dateTime = date("Y-m-d H:i:s", time() - $time); // all carts order than time
        $MaxDateTime = date("Y-m-d H:i:s", $minus_day); // all orders after 27-11-2018

        $query = $this->db->query("SELECT DISTINCT(SessionID), UserID FROM browsing_history WHERE $reminder_sent AND `userID` != '0' AND `productID` != 0 ORDER by created_at DESC LIMIT 0,10")->result();
        //echo $this->db->last_query() . "<br>";
        return $query;
    }

    function get_user_history($userID)
    {
        //$time = (24*60*60); //fetch 24 hours old cart
        $time = (30 * 60); //fetch 2 minute old cart
        //$time = 0; //fetch 2 minute old cart
        $remindersent = "reminder_sent = 'N'";
        $minus_day = mktime(date('H'), date('i'), date('s'), date('m'), date('d') - 2, date('Y'));

        $dateTime = date("Y-m-d H:i:s", time() - $time); // all carts order than time
        $MaxDateTime = date("Y-m-d H:i:s", $minus_day); // all orders after 27-11-2018
        $query = $this->db->query("SELECT * FROM browsing_history WHERE UserID = '$userID' AND $remindersent ORDER by created_at DESC LIMIT 0,10")->result();
        //echo $this->db->last_query() . "<br>";
        return $query;
    }
// End of Class
}