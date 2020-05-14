<?php
/* Author: Arslan Javaid
   Date: 16-06-16 
*/

class Wholesale extends CI_Controller
{

    function Wholesale()
    {
        parent::__construct();

    }

    function labour_cost()
    {

        $labels = 150024;
        $por_discount = $this->home_model->calculate_discount($labels, 'RR120070WGP4');
        print_r($por_discount);
        echo "<br/>";
        echo "Labour Cost: " . $labour_cost = $this->home_model->labour_cost_roll(2, $labels);
        echo "<br/>";

        echo "Material Cost: " . $material_sqr_cost = $this->home_model->material_sqr_cost('RR120070WGP');

        echo "<br/>";

        echo "Sqaure Meter Cost: " . $sqaure_meter = ($labels * (120 * 70) / 1000000);
        echo "<br/>";
        echo "Material Cost PSM: " . $material_cost = ($material_sqr_cost) * $sqaure_meter;
        echo "<br/>";

        echo $price = $this->home_model->calculate_print_material('RR120070WGP4', $labels, '', 76);
        die();
    }

    function show_cart()
    {
        $session_id = $this->shopping_model->sessionid();
        $qry = $this->db->query("SELECT * FROM tempquotationbasket WHERE SessionID = '" . $session_id . "' ORDER BY `tempquotationbasket`.`ID`  ASC");
        return $qry->result();
    }


    function index()
    {
        $data['cart_detail'] = $this->show_cart();
        $data['main_content'] = 'wholesale/index';
        $this->load->view('page', $data);
    }

    function quotation()
    {

        $data['cart_detail'] = $this->show_cart();
        if (count($data['cart_detail']) == 0) {
            redirect(base_url() . 'wholesale/');
        }

        $data['main_content'] = 'wholesale/quotation';

        if ($_POST) {

            $usrid = $this->session->userdata('userid');
            if (empty($usrid)) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[customers.UserEmail]');
            }

            $this->form_validation->set_rules('b_first_name', 'First Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_last_name', 'Last Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_phone_no', 'Phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_fax', 'Fax', 'trim|xss_clean');
            $this->form_validation->set_rules('b_pcode', 'Postcode', 'trim|xss_clean');
            $this->form_validation->set_rules('b_add1', 'Address1', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_city', 'City', 'trim|required|xss_clean');
            $this->form_validation->set_rules('b_organization', 'Company', 'trim|xss_clean');
            $this->form_validation->set_rules('b_county', 'County', 'trim|required|xss_clean');

            if ($this->form_validation->run() == false) {
                $data['error'] = validation_errors();
            } else {

                $billing_title = $this->input->post('billing_title');
                $b_first_name = $this->input->post('b_first_name');
                $b_last_name = $this->input->post('b_last_name');
                $b_phone_no = $this->input->post('b_phone_no');
                $b_fax = $this->input->post('b_fax');
                $b_pcode = $this->input->post('b_pcode');
                $b_add1 = $this->input->post('b_add1');
                $b_add2 = $this->input->post('b_add2');
                $b_city = $this->input->post('b_city');
                $b_organization = $this->input->post('b_organization');
                $b_county = $this->input->post('b_county');
                $b_ResCom = $this->input->post('b_ResCom');
                $country = $this->input->post('country');
                $b_mobile = $this->input->post('b_mobile');
                $email = $this->input->post('email');

                $Customer = array('UserEmail' => $email,
                    'RegisteredDate' => date('Y-m-d'),
                    'RegisteredTime' => date('H:i:s'),
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
                    'BillingTelephone' => $b_phone_no,
                    'BillingMobile' => $b_mobile,

                    'DeliveryTitle' => $billing_title,
                    'DeliveryFirstName' => $b_first_name,
                    'DeliveryLastName' => $b_last_name,
                    'DeliveryCompanyName' => $b_organization,
                    'DeliveryAddress1' => $b_add1,
                    'DeliveryAddress2' => $b_add2,
                    'DeliveryTownCity' => $b_city,
                    'DeliveryCountyState' => $b_county,
                    'DeliveryCountry' => $country,
                    'DeliveryPostcode' => $b_pcode,
                    'DeliveryTelephone' => $b_phone_no,
                    'DeliveryMobile' => $b_mobile,
                    'Active' => 1
                );
                if (empty($UserID)) {
                    $rs = $this->db->get_where('customers', array('UserEmail' => $email))->result();
                    if (isset($rs[0]->UserEmail) and $rs[0]->UserEmail != '') {
                        $userid = $rs[0]->UserID;
                        $useremail = $rs[0]->UserEmail;
                    } else {
                        $this->db->insert('customers', $Customer);
                        $userid = $this->db->insert_id();
                        $useremail = $email;
                    }
                } else {
                    $userid = $UserID;
                }


                $QNo = $this->getQuoteNum();
                $QuotationNo = 'AAQ' . $QNo;
                $session_id = $this->shopping_model->sessionid();

                $Quotation = array('QuotationNumber' => $QuotationNo,
                    'SessionID' => $session_id,
                    'QuotationDate' => time(),
                    'QuotationTime' => time(),
                    'UserID' => $userid,
                    'QuotationShippingAmount' => 0.00,
                    'QuotationTotal' => 0.00,

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
                    'BillingTelephone' => $b_phone_no,
                    'BillingMobile' => $b_mobile,
                    'Billingemail' => $email,

                    'DeliveryTitle' => $billing_title,
                    'DeliveryFirstName' => $b_first_name,
                    'DeliveryLastName' => $b_last_name,
                    'DeliveryCompanyName' => $b_organization,
                    'DeliveryAddress1' => $b_add1,
                    'DeliveryAddress2' => $b_add2,
                    'DeliveryTownCity' => $b_city,
                    'DeliveryCountyState' => $b_county,
                    'DeliveryCountry' => $country,
                    'DeliveryPostcode' => $b_pcode,
                    'DeliveryTelephone' => $b_phone_no,
                    'DeliveryMobile' => $b_mobile,

                    'Registered' => 'Yes',
                    'QuotationStatus' => '37',
                    'ShippingServiceID' => 0,
                    'ProcessedBy' => 'Wholesale',
                    'Source' => 'Website',
                    'Q2OStatus' => 6,
                );

                $this->db->insert('quotations', $Quotation);

                $cart_detail = $this->show_cart();

                foreach ($cart_detail as $cartdata) {

                    $prod = $this->shopping_model->show_product($cartdata->ProductID);
                    $product_collection = array('is_custom' => $cartdata->is_custom,
                        'ProductCategoryName' => $prod[0]['ProductCategoryName'],
                        'LabelsPerRoll' => $cartdata->LabelsPerRoll,
                        'LabelsPerSheet' => $prod[0]['LabelsPerSheet'],
                        'ReOrderCode' => $prod[0]['ReOrderCode'],
                        'ManufactureID' => $prod[0]['ManufactureID'],
                        'ProductBrand' => $prod[0]['ProductBrand'],
                        'wound' => $cartdata->wound,
                        'OrderData' => $cartdata->OrderData);

                    $completeName = $this->home_model->customize_product_name($product_collection);
                    $QDetail = array('QuotationNumber' => $QuotationNo,
                        'CustomerID' => $userid,
                        'ProductID' => $cartdata->ProductID,
                        'ProductName' => $completeName,
                        'Quantity' => $cartdata->Quantity,
                        'Price' => 0.00,
                        'ProductTotalVAT' => 0.00,
                        'ProductTotal' => 0.00,
                        'active' => 'N',
                        'LabelsPerRoll' => $cartdata->LabelsPerRoll,
                        'is_custom' => $cartdata->is_custom,
                        'wound' => $cartdata->wound);
                    $this->db->insert('quotationdetails', $QDetail);
                    $this->db->delete('tempquotationbasket', array('SessionID' => $session_id));


                }
                $this->quote_confirmation($QuotationNo);

                redirect(base_url() . 'wholesale/quote-confirm/');
                //$data['main_content'] = 'wholesale/custom_thanks';

            }
        }
        $this->load->view('page', $data);
    }

    function quote_confirm()
    {
        $data['main_content'] = 'wholesale/custom_thanks';
        $this->load->view('page', $data);
    }

    public function getQuoteNum()
    {

        $this->db->select_max('QuotationID');
        $highValue = $this->db->get('quotations')->result();
        $highestValue = $highValue[0]->QuotationID;
        if ($highestValue) {
            $highestValue++;
            $newEntry = array('Quotation' => $highestValue);
        }
        return $newEntry['Quotation'];
    }


    function products($category = NULL)
    {
        $data['cart_detail'] = $this->show_cart();
        if (empty($category)) {
            $category = 'A4';
        }
        if ($category == 'roll') {
            $category = 'Roll';
        } else {
            $category = strtoupper($category);
        }
        $data['category'] = $category;
        $data['shape'] = '';
        $data['main_content'] = 'wholesale/labelsfinder';
        $this->load->view('page', $data);
    }

    function material($catid, $productid = NULL)
    {

        $printer_condition = '';
        $other_material_option = '';
        $data['other_materials'] = '';
        $type = 'a4';

        if (preg_match('/^c/i', $catid)) {
            $catid = strtoupper($catid);
            $core = 'R1';
            if (substr($catid, -2, 1) == 'R') {
                if (preg_match('/r1|r2|r3|r4|r5/is', $catid)) {
                    $new_code_exp = explode("R", $catid);
                    $catid = $new_code_exp[0];
                    $core = 'R' . $new_code_exp[1];
                }
            }
            $condition = " CategoryID ='$catid'";
            $data['details'] = $this->home_model->fetch_category_details($catid);
            if (isset($productid) and $productid != '') {
                $menuid = $this->home_model->getManufactureID($productid);
                $coreid = substr($menuid, -1);
                $core = 'R' . $coreid;
                $data['coreid'] = $core;
            } else {
                $data['coreid'] = $core;
            }
            $data['rollcores'] = $this->home_model->roll_core_sizes($catid, $core);
            $catid = $catid . $core;
            $data['subcat'] = $catid;
            $type = 'roll';

        } else {
            $data['details'] = $this->home_model->fetch_category_details($catid);
            $data['compitable'] = $this->home_model->avery_equilent($catid);
        }


        if (isset($productid) and $productid != '') {
            $condition = " CategoryID ='$catid' AND ProductID <> '$productid'";
            $data['productid'] = $productid;
            $data['materials'] = $this->home_model->fetch_sheets_materials($catid, $productid);
            $data['filter'] = 'disabled';
            $data['paper'] = $this->home_model->distinct_material_paper($condition);
            $data['adhesive'] = $this->home_model->distinct_material_adhisive($condition);
            $data['color'] = $this->home_model->distinct_material_color($condition);

        } else {
            $condition = " CategoryID ='$catid' " . $printer_condition;
            $data['filter'] = '';
            $data['paper'] = $this->home_model->distinct_material_paper($condition);
            $data['adhesive'] = $this->home_model->distinct_material_adhisive($condition);
            $data['color'] = $this->home_model->distinct_material_color($condition);
            $data['materials'] = $this->home_model->ajax_material_sorting($condition);
            //$data['materials'] = $this->home_model->fetch_sheets_materials($catid,);
        }


        if ($type == 'roll') {
            $theHTMLResponse = $this->load->view('wholesale/material_roll', $data, true);
        } else {
            $theHTMLResponse = $this->load->view('wholesale/material', $data, true);
        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('html' => $theHTMLResponse)));
    }

    function add_to_quotation()
    {

        if ($_POST) {

            $type = $this->input->post('type');
            $qty = $this->input->post('qty');
            $menu = $this->input->post('menuid');
            $productid = $this->input->post('prd_id');

            $wound = 'N';
            $is_custom = 'No';
            $LabelsPerRoll = '';

            if (isset($type) and $type == 'Rolls') {

                $labels = $this->input->post('labels');
                $is_custom = 'Yes';
                $LabelsPerRoll = $labels;
                $woundoption = $this->session->userdata('wound');
                $wound_cat = $this->session->userdata('wound-cat');

                if (isset($wound_cat) and $woundoption == 'Inside') {
                    $response = $this->home_model->check_wound_option($productid, $wound_cat);
                    if ($response == true) {
                        $wound = 'Y';
                    }
                }
            } else {

            }

            $SID = $this->shopping_model->sessionid();
            $items = array('SessionID' => $SID,
                'ProductID' => $productid,
                'OrderTime' => 'NOW()',
                'Quantity' => $qty,
                'wound' => $wound,
                'is_custom' => $is_custom,
                'LabelsPerRoll' => $LabelsPerRoll);
            $this->db->insert('tempquotationbasket', $items);

            $topbasket_data = $this->ajax_topbasket_load();
            $topcart_data = $this->ajax_topcart_load();
            echo json_encode(array('response' => 'yes', 'top_cart' => $topcart_data, 'top_basket' => $topbasket_data));
        }
    }

    function ajax_topbasket_load()
    {

        $theHTMLResponse = $this->load->view('includes/top_cart', '', true);
        $this->output->set_content_type('application/json');
        return $theHTMLResponse;
    }

    function ajax_topcart_load()
    {
        $theHTMLResponse = '';
        $data['cart_detail'] = $this->show_cart();
        if (count($data['cart_detail']) > 0) {
            $theHTMLResponse = $this->load->view('wholesale/quote_cart', $data, true);
            $this->output->set_content_type('application/json');

        }
        return $theHTMLResponse;
    }


    function update_quotation()
    {

        if ($_POST) {

            $id = $this->input->post('id');
            $qty = $this->input->post('qty');
            $menu = $this->input->post('menuid');
            $productid = $this->input->post('prd_id');
            $SID = $this->shopping_model->sessionid();
            $items = array('Quantity' => $qty);
            $this->db->update('tempquotationbasket', $items, array('ID' => $id, 'SessionID' => $SID));

            //$topcart_data = $this->ajax_topcart_load();
            echo json_encode(array('response' => 'yes', 'top_cart' => ''));
        }
    }

    function delete_product_cart()
    {
        if ($_POST) {
            $serial = $this->input->post('serial');
            $SID = $this->shopping_model->sessionid();
            $this->db->delete('tempquotationbasket', array('ID' => $serial, 'SessionID' => $SID));

            $topcart_data = $this->ajax_topcart_load();
            echo json_encode(array('response' => 'yes', 'top_cart' => $topcart_data));

        }
    }


    function quote_confirmation($quotenumber = NULL)
    {

        //$quotenumber = 'AAQ194';
        $quotedetails = $this->db->query("select * from quotationdetails WHERE QuotationNumber LIKE '" . $quotenumber . "'");
        $quotedetails = $quotedetails->result();

        $info_quote = $this->db->query("select * from quotations WHERE QuotationNumber LIKE '" . $quotenumber . "'");
        $info_quote = $info_quote->row_array();


        $q = $this->db->query("SELECT * FROM " . Template_Table . " WHERE MailID ='128'");
        $adhesive = '';
        $result = $q->result();
        $mailTitle = $result[0]->MailTitle;
        $mailName = $result[0]->Name;
        $from_mail = $result[0]->MailFrom;
        $mailSubject = $result[0]->MailSubject;
        $mailText = $result[0]->MailBody;

        $i = 0;
        $bgcolor = '';
        $rows = '';
        foreach ($quotedetails as $rec) {
            if ($bgcolor == '') {
                $bgcolor = '#F5F5F5';
            } else {
                $bgcolor = '';
            }

            $ManufacturerId = $this->shopping_model->menufacture($rec->ProductID);
            $ManufacturerId = $ManufacturerId[0]->ManufactureID;

            $rows .= '<tr bgcolor="' . $bgcolor . '" height="25">
											<td valign="top">' . $ManufacturerId . '</td>
											<td valign="top">' . $rec->ProductName . '</td>
											<td valign="top" align="center">' . $rec->Quantity . '</td>
										</tr>';

        }

        $strINTemplate = array("[NAME]",
            "[Company]",
            "[address1]",
            "[city]",
            "[county]",
            "[postcode]",
            "[Country]",
            "[Email]",
            "[Phone]",
            "[itemsDetails]",
            "[QuoteNumber]",
            "[RequestDate]",
            "[RequestTime]",
        );

        $name = $info_quote['BillingFirstName'] . ' ' . $info_quote['BillingLastName'];
        $address1 = $info_quote['BillingAddress1'];
        $company = $info_quote['BillingCompanyName'];
        $city = $info_quote['BillingTownCity'];
        $county = $info_quote['BillingCountyState'];
        $postcode = $info_quote['BillingPostcode'];
        $country = $info_quote['BillingCountry'];
        $email = $info_quote['Billingemail'];
        $phone = $info_quote['Billingtelephone'];

        $strInDB = array($name,
            $company,
            $address1,
            $city,
            $county,
            $postcode,
            $country,
            $email,
            $phone,
            $rows,
            $quotenumber,
            date("d/m/Y"),
            date("h:i"));

        $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);
        $this->load->library('email');
        $this->email->from($from_mail, $mailName);
        $this->email->to($email);
        $this->email->subject($mailSubject);
        $this->email->message($newPhrase);
        $this->email->cc('customercare@aalabels.com');
        $this->email->set_mailtype("html");
        $this->email->send();

    }
    //end of Controller class
}
