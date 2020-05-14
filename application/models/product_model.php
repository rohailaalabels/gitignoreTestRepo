<?php

/**
 * Class Product_model
 */
class Product_model extends CI_Model
{
    /**
     * Product_model constructor.
     */
    function __construct()
    {
        parent::__construct();

    }

    /**
     * @param $actual_price
     * @param $bulk_price
     * @return float|int
     */
    function label_price_per($actual_price, $bulk_price)
    {
        $diff_price = $actual_price - $bulk_price;
        $save_price = 0;
        if ($actual_price > 0) {
            $save_price = ($diff_price / $actual_price) * 100;
        }
        return $save_price;
    }

    /**
     * @param $id
     * @return array
     */
    function Is_ProductBrand_roll($id)
    {

        $query = $this->db->query("select  ProductBrand,LabelsPerSheet from products  where ManufactureID='" . $id . "'");
        $res = $query->row_array();

        if (preg_match("/Roll Labels/i", $res['ProductBrand'])) {
            $roll = 'yes';
        } else {
            $roll = 'No';
        }
        return array('Roll' => $roll, 'LabelsPersheet' => $res['LabelsPerSheet'], 'ProductBrand' => $res['ProductBrand']);

    }

    /**
     * @param $catid
     * @return string
     */
    function jars_products($catid)
    {
        $subcat = $this->db->query("Select `SubCategoryID` from category where CategoryID LIKE '" . $catid . "'");
        $subcat = $subcat->row_array();
        $sub_array = explode(",", $subcat['SubCategoryID']);
        return $rel_cat_string = "'" . implode("','", $sub_array) . "'";


    }

    /**
     * @param $data
     * @return array
     */
    function lba_pack_details($data)
    {

        $quantitytype = 'Sheet';
        $packsize = 1;
        if (isset($data['ManufactureID']) and $data['ManufactureID'] != '') {
            $condition = " ManufactureID LIKE '" . $data['ManufactureID'] . "' ";
        } else {
            $condition = " ProductID LIKE '" . $data['ProductID'] . "' ";
        }
        $result = $this->db->query(" SELECT specification2,specification1 FROM `products` 
			INNER JOIN category ON category.CategoryID = products.CategoryID WHERE   $condition ")->row_array();
        if (isset($result['specification2']) and $result['specification2'] == 'Pack') {
            $quantitytype = 'Pack';
            $packsize = trim(str_replace("Sheets", "", $result['specification1']));
        }
        return array('packsize' => $packsize, 'Type' => $quantitytype);

    }

    /**
     * @param $qty
     * @param $code
     * @return array
     */
    function calculate_lba_price($qty, $code)
    {
        //$diecode =  substr($code, 0, -4);
        $result = $this->db->query("select price from lba_prices WHERE sheets = $qty");
        $result = $result->row_array();
        $printprice = $result['price'];

        $result = $this->db->query("select SheetPrice from tbl_product_batchprice WHERE ManufactureID = '$code' AND  BatchID = 1");
        $result = $result->row_array();
        $materialprice = $result['SheetPrice'];

        $materialprice = $this->home_model->check_price_uplift($materialprice);

        $materialprice = $materialprice * $qty;
        $postage = 0.99;
        $total = number_format(($printprice + $materialprice + $postage), 2, '.', '');
        return array('custom_price' => $total, 'printprice' => $printprice, 'plainprice' => ($materialprice + $postage));
    }

    function calculate_a5_discount($quantity=0)
    {
        $table = 'a5_printing_discounts';
        $rows = $this->db->query("SELECT
                                        *
                                    FROM
                                        $table");
        $results = $rows->result_array();
        $discount = 0;
        foreach ($results as $record)
        {
            if ($quantity >= $record['min_labels'] AND $quantity < $record['max_labels'])
            {
                $discount = $record['percentage'];
            }
        }

        return $discount;
    }

    /**
     * @param integer $qty Product Quantity
     * @param string $id Product Code
     * @param string $ProductBrand Product Brand Name
     * @return array
     */
    function ajax_price($qty, $id, $ProductBrand = null)
    {
//        error_reporting(0);
        $discount = 0;
        if (isset($ProductBrand) AND trim($ProductBrand) === 'A5 Labels') {
            $areaDifferenceSQM = 0.03267; // Area Difference is the extra area in SQM incurred in A4 Sheet
            $marginDifferenceCost = 0.223; // Margin Difference Cost is the extra cost incurred to manufacturer A4 Sheet
            //$discount = $this->calculate_a5_discount($qty);
        }

        $custom_price = 0;
        if (substr($id, -2, 2) == 'XS') {
            $row = $this->db->query("Select count(*) as total,`Price` from xmass_prices where Qty LIKE '" . $qty . "' LIMIT 1");
            $result = $row->row_array();
            if ($result['total'] == 1) {
                $custom_price = number_format($result['Price'] / 1.2, 2, '.', '');
                $custom_price = number_format($custom_price, 2, '.', '');
                $data = array('custom_price' => $custom_price);
            } else {
                $data = array('custom_price' => 4.15);
            }
            return $data;
        }
        $roll = $this->Is_ProductBrand_roll($id);
        if ($roll['Roll'] == 'yes') {
            $custom_price = $this->home_model->calclateprice($id, $qty, $roll['LabelsPersheet']);
            $custom_price = number_format(round($custom_price['final_price'], 2), 2, '.', '');
            $custom_price = number_format(round($custom_price, 2), 2, '.', '');
            $data = array('custom_price' => $custom_price);
            return $data;
        }
        if ($roll['ProductBrand'] == 'Application Labels') {
            $response = $this->lba_pack_details(array('ManufactureID' => $id));
            $qty = $qty * $response['packsize'];
            if ($qty < 25) {
                return $this->calculate_lba_price($qty, $id);
            }
        }

        $case = '';
        $q = $this->db->query("SELECT
                                tbl.ManufactureID,
                                tbl.BatchID,
                                tbl.SetupCost,
                                tbl.SheetPrice,
                                batch.BatchQty
                            FROM
                                tbl_product_batchprice tbl,
                                tbl_batch batch
                            WHERE
                                tbl.ManufactureID = '$id' AND tbl.BatchID = batch.BatchID
                            ORDER BY
                                batch.BatchQty ASC");
        $row = $q->result_array();

        $arrsize = count($row);
        $flag = 0;
        for ($traverse = 0; $traverse < $arrsize - 1; $traverse++) {
            if ($qty < 100) {
                $flag = 1;
                $oppertunity_quan = $row[0]['BatchQty'];
                $oppertunity_sheet = $row[0]['SheetPrice'];
                $oppertunity_total = $oppertunity_quan * $oppertunity_sheet;
                $sheetprice = $row[0]['SheetPrice'];
                $setupcost = $row[0]['SetupCost'];
                $custom_price = ($sheetprice * $qty) + $setupcost;

                $totalSQM = $areaDifferenceSQM * $qty;
                $marginCost = $totalSQM * $marginDifferenceCost;
            }
            if ($qty >= $row[$traverse]['BatchQty'] && $qty < $row[$traverse + 1]['BatchQty']) {
                $flag = 1;
                $batch = $row[$traverse]['BatchQty'];
                $setupcost = $row[$traverse + 1]['SetupCost'];
                if ($qty == $row[$traverse]['BatchQty']) {
                    $sheetprice = $row[$traverse]['SheetPrice'];
                    $batch = $row[$traverse]['BatchQty'];
                    $custom_price = ($sheetprice * $qty);

                    $totalSQM = $areaDifferenceSQM * $batch;
                    $marginCost = $totalSQM * $marginDifferenceCost;
                    break;
                } else {
                    $sheetprice = $row[$traverse + 1]['SheetPrice'];
                    $sheetprice1 = $row[$traverse]['SheetPrice'];
                    $batch = $row[$traverse]['BatchQty'];
                    $custom_price = ($sheetprice * $qty) + $setupcost;
                    $custom_price1 = $sheetprice1 * $batch;

                    $totalSQM = $areaDifferenceSQM * $batch;
                    $marginCost = $totalSQM * $marginDifferenceCost;
                    if ($custom_price < $custom_price1) {
                        $custom_price = $custom_price1 + (($qty - $batch) * $sheetprice);

                        $totalSQM = $areaDifferenceSQM * $batch;
                        $marginCost = $totalSQM * $marginDifferenceCost;
                    }

                    if (substr($row[$traverse]['ManufactureID'], 0, 2) == "SR" || substr($row[$traverse]['ManufactureID'], 0, 2) == "sr") {
                        $custom_price = $custom_price1 + (($qty - $batch) * $sheetprice);
                        $totalSQM = $areaDifferenceSQM * $batch;
                        $marginCost = $totalSQM * $marginDifferenceCost;
                    }
                    $oppertunity_quan = $row[$traverse + 1]['BatchQty'];
                    $oppertunity_sheet = $row[$traverse + 1]['SheetPrice'];
                    $oppertunity_total = $oppertunity_quan * $oppertunity_sheet;
                    break;
                }
            }
        }

        if ($flag == 0) {
            if (isset($row[$traverse])) {
                $sheetprice = $row[$traverse]['SheetPrice'];
                $setupcost = $row[$traverse]['SetupCost'];
                if ($qty == $row[$traverse]['BatchQty']) {
                    $batch = $row[$traverse]['BatchQty'];
                    $custom_price = ($sheetprice * $qty);

                    $totalSQM = $areaDifferenceSQM * $batch;
                    $marginCost = $totalSQM * $marginDifferenceCost;
                } else {
                    $batch = $row[$traverse]['BatchQty'];
                    $custom_price = ($sheetprice * $qty) + $setupcost;

                    $totalSQM = $areaDifferenceSQM * $batch;
                    $marginCost = $totalSQM * $marginDifferenceCost;
                }
            }
        }
        
        $marginCost = 0; //Bypass a5 price

        if ($roll['ProductBrand'] == 'Application Labels') {
            $printprice = $this->home_model->calculate_printed_sheets($qty, 'Fullcolour', 1);
            $custom_price = $custom_price + $printprice['price'];
        }

        $custom_price = $this->home_model->check_price_uplift($custom_price);
        $custom_price = $custom_price - $marginCost; // Margin Cost is the extra cost incurred in A4 Sheet (So subtract extra cost to achieve A5 cost)
        $custom_price = $custom_price - ($custom_price * ($discount/100)); // Apply discount

        $custom_price = number_format(round($custom_price, 2), 2, '.', '');
        $custom_price = number_format(round($custom_price, 2), 2, '.', '');
        
         //bypass a5 price
        if (isset($ProductBrand) AND trim($ProductBrand) === 'A5 Labels') {
            $custom_price = $custom_price / 2;
        }
        
        
        
        $data = array('custom_price' => $custom_price);

        return $data;
    }

    /**
     * @param $qty
     * @param $id
     * @return array
     */
    function ajax_second_price($qty, $id)
    {
        $q = $this->db->query("select tbl.ManufactureID,tbl.BatchID,tbl.SetupCost,tbl.SheetPrice,batch.BatchQty from tbl_product_batchprice tbl,tbl_batch batch 	where tbl.ManufactureID='$id' and tbl.BatchID= batch.BatchID AND BatchQty >  '$qty' ORDER BY batch.BatchQty ASC limit 2 ");
        $res = $q->result_array();
        $count = count($res);
        $c = 0;
        if ($count > 0) {
            if ($res[0]['BatchQty'] > 25) {
                $setupcost1 = $res[0]['SetupCost'];
            } else {
                $setupcost1 = '';
            }
            $oppertunity_quan = $res[0]['BatchQty'];
            $oppertunity_sheet = $res[0]['SheetPrice'];
            $oppertunity_total = ($oppertunity_quan * $oppertunity_sheet);
            $custom_price = $oppertunity_total + $setupcost1;
        } else {
            $oppertunity_quan = '';
            $oppertunity_total = '';
        }
        if ($count > 1) {
            if ($res[1]['BatchQty'] > 25) {
                $setupcost2 = $res[1]['SetupCost'];
            } else {
                $setupcost2 = '';
            }
            $oppertunity_quan1 = $res[1]['BatchQty'];
            $oppertunity_sheet1 = $res[1]['SheetPrice'];
            $oppertunity_total1 = ($oppertunity_quan1 * $oppertunity_sheet1);
            $custom_price1 = $oppertunity_total1 + $setupcost2;
        } else {
            $oppertunity_quan1 = '';
            $oppertunity_total1 = '';
        }

        $oppertunity_total = $this->home_model->check_price_uplift($oppertunity_total);
        $oppertunity_total1 = $this->home_model->check_price_uplift($oppertunity_total1);


        $data = array('custom_qty1' => $oppertunity_quan, 'custom_price1' => $oppertunity_total, 'custom_qty2' => $oppertunity_quan1, 'custom_price2' => $oppertunity_total1);
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    function min_price($id)
    {
        $q = $this->db->query("select MIN(batch.BatchQty) as min_price,SheetPrice from tbl_product_batchprice tbl,
		 tbl_batch batch where tbl.ManufactureID='" . $id . "' and tbl.BatchID= batch.BatchID");
        $res = $q->result_array();
        return $res;
    }

    /**
     * @param $manuId
     * @param null $qty
     * @return float|int|string
     */
    function batchPrice25($manuId, $qty = NULL)
    {

        if (isset($qty) and $qty != NULL) {
        } else {
            $qty = 25;
        }


        $priceqry = $this->db->query("select tbl.ManufactureID,tbl.BatchID,tbl.SetupCost,tbl.SheetPrice,batch.BatchQty from tbl_product_batchprice tbl,tbl_batch batch where tbl.ManufactureID='" . $manuId . "' and tbl.BatchID= batch.BatchID");

        $res1 = $priceqry->row_array();

        $totalprice = $qty * $res1['SheetPrice'];

        $totalprice = $this->home_model->check_price_uplift($totalprice);


        $totalprice = number_format($totalprice, 2, '.', '');
        //die($totalprice);
        return $totalprice;
    }

    /**
     * @return mixed
     */
    function avery_label_equalent_link()
    {


        $query = $this->db->query("SELECT DISTINCT(c.CategoryName),c.CategoryID,c.CategoryName,a.AverySizes,c.Shape FROM tbl_avery_compatible a,
		 category c, products p WHERE c.CategoryID = p.CategoryID and a.AverySizes=  'Y' AND c.CategoryID = a.CategoryID ORDER BY  p.LabelsPerSheet ASC ");
        $result = $query->result();
        $i = 0;

        foreach ($result as $row) {
            $query3 = $this->db->query("SELECT AveryCode FROM tbl_avery_compatible WHERE CategoryID = '$row->CategoryID' and AverySizes = 'Y'");
            $res3 = $query3->result();
            $row->CategoryID;

            $cats = explode(",", $res3[0]->AveryCode);
            $j = 0;
            foreach ($cats as $catid) {
                if ($catid != "" and strlen($catid) > 1) {
                    $tempcatarray[$i . $j][0] = $catid;
                    $tempcatarray[$i . $j][1] = $row->CategoryName;
                    $tempcatarray[$i . $j][2] = $row->CategoryID;
                    $tempcatarray[$i . $j][3] = $row->Shape;
                }
                $j++;
            }

            $i++;
        }
        //array_multisort($tempcatarray,SORT_STRING,SORT_ASC, $tempcatarray);
        @array_multisort($tempcatarray, SORT_STRING, SORT_ASC, $tempcatarray);
        return $tempcatarray;
    }

    /**
     * @param null $username
     * @param null $phoneno
     * @param null $email
     * @return int|string
     */
    function addcheckoutenquiry($username = NULL, $phoneno = NULL, $email = NULL)
    {


        $userID = 0;
        $userID = $this->session->userdata('userid');

        $quotenumber = $this->getMax();
        $this->db->query("insert into customlabelsquotes set
		 QuoteNumber='" . $quotenumber . "',
		 UserID='" . $userID . "',
		 RequestStatus='11',
		 RequestDate=now(),
		 RequestTime=now(),
		 Source='Checkout',
                 `ip_address`='" . $this->session->userdata('ip_address') . "',
                 `Billingemail`='" . filter_var($email, FILTER_SANITIZE_EMAIL)  . "',
		 `BillingTelephone`='" . filter_var($phoneno, FILTER_SANITIZE_STRING) . "',
		 `BillingFirstName`='" . filter_var($username, FILTER_SANITIZE_STRING)  . "',
		  TotalQuantity='0'");
        $this->db->query("insert into customlabelsdetails set
		QuoteNumber='" . $quotenumber . "'");
        return $quotenumber;
    }

    /**
     * @return int|string
     */
    function getMax()
    {
        $q = $this->db->query("SELECT MAX(id) as id FROM customlabelsnumber");
        $result = $q->result();
        $maxNumber = $result[0]->id + 1;
        $maxNumber = "E" . $maxNumber;                                                        /*	concat with prefix		*/
        $q = $this->db->query("insert into  customlabelsnumber set customLabelsNumber='" . $maxNumber . "'");
        return $maxNumber;
    }

    /**
     * @param $str
     * @return string
     */
    function clear_string($str)
    {
        $str = strip_tags($str);
        $str = nl2br($str);
        $str = mysqli_real_escape_string($str);
        return $str;
    }

    /**
     * @return array
     */
    function save_print_request()
    {

        $material = '';
        $category = $this->input->post('category');
        $shape = $this->input->post('shape');
        $diameter = $this->input->post('diameter');
        $width = $this->input->post('width');
        $height = $this->input->post('height');
        $quantity = $this->input->post('quantity');
        $custom_width = $this->input->post('custom_width');

        $material = $this->input->post('material');

        $custom_height = $this->input->post('custom_height');
        $name = $this->input->post('name');
        $company = $this->input->post('company');


        $add1 = $this->input->post('add1');
        $add2 = $this->input->post('add2');
        $city = $this->input->post('city');
        $county = $this->input->post('county');


        $email = $this->input->post('email');
        $phoneNumber = $this->input->post('phoneNumber');
        $subject = $this->input->post('subject');
        $pcode = $this->input->post('b_pcode');
        $file_up = $this->input->post('file_up');

        $maxQuoteNumber = $this->getMax();


        if ($shape == 'Circular' || $shape == 'Square') {
            if ($custom_width) {
                $width = $custom_width;
            } else {
                $width = $diameter;
            }
            $height = $diameter;
        } else {
            if ($custom_height) {
                $height = $custom_height;
            }
            if ($custom_width) {
                $width = $custom_width;
            }
        }

        $labelDetail = array(
            'QuoteNumber' => $maxQuoteNumber,
            'Shape' => $shape,
            'category' => $category,
            'RectangleHight' => $height,
            'RectangleWidth' => $width,
            'OtherInstruction' => $subject,
            'TotalLabelsReq ' => $quantity,
            'Material' => $material,
        );

        $labelDetailquotes = array(
            'QuoteNumber' => $maxQuoteNumber,
            'Source' => 'Label Printing',
            'RequestStatus' => 11,
            'RequestDate' => date('y-m-d'),
            'TotalQuantity' => $quantity,
            'BillingFirstName' => $name,
            'BillingPostcode' => $pcode,
            'Billingemail' => $email,
            'BillingTelephone' => $phoneNumber,
            'BillingAddress1' => $add1,
            'BillingAddress2' => $add2,
            'BillingTownCity' => $city,
            'BillingCountyState' => $county,
            'ip_address' => $this->session->userdata('ip_address'),
        );

        $this->db->set('RequestTime', 'NOW()', FALSE);
        $this->db->insert('customlabelsquotes', $labelDetailquotes);
        $this->db->insert('customlabelsdetails', $labelDetail);


        if ($shape == 'Circular') {
            $size = 'Diameter : ' . $width . ' mm';
        } else if ($shape == 'Square') {
            $size = 'Height : ' . $height . ' mm';
        } else {
            $size = $width . ' mm  X  ' . $height . ' mm';
        }

        // error_reporting(1);

        $config['upload_path'] = CUSTOMPATH;
        $config['allowed_types'] = 'png|doc|docx|pdf|jpg|jpeg|gif';
        $config['max_size'] = '10000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';
        $this->load->library('upload', $config);
        $field_name = "file_up";
        $imagename = "";

        if ($this->upload->do_upload($field_name)) {
            $data = array('upload_data' => $this->upload->data());
            $imagename = $data['upload_data']['file_name'];
            $data_file_up = array('QuoteNumber' => $maxQuoteNumber, 'UploadedFile' => $imagename);
            $this->db->insert('customlabelsfiles', $data_file_up);
        }


        $q = $this->db->query("SELECT * FROM " . Template_Table . " WHERE MailID ='107'");
        $adhesive = '';
        $result = $q->result();
        $mailTitle = $result[0]->MailTitle;
        $mailName = $result[0]->Name;
        $from_mail = $result[0]->MailFrom;
        $mailSubject = $result[0]->MailSubject;
        $mailText = $result[0]->MailBody;
        $bgcolor = 'bgcolor="#ffffff"';


        $name = $this->input->post('name');
        $company = $this->input->post('company');
        $email = $this->input->post('email');
        $phoneNumber = $this->input->post('phoneNumber');
        $subject = $this->input->post('subject');


        $image_path = '';
        $attachemnt = '';
        $printing = '';
        //$path=$_SERVER["DOCUMENT_ROOT"];
        $file = CUSTOMPATH . $imagename;
        if (file_exists($file) and $imagename != '') {
            //$image_path = '<img src="'.base_url()."CustomLabelsFiles/".$imagename.'" title="No Image Provided" height="210" width="210">';
            $attachemnt = '<tr><td colspan="2" align="center" valign="top" bgcolor="#ffffff"><strong>Labels to be printed with Attached Image<br>';
            $attachemnt .= '<img src="' . base_url() . "theme/integrated_attach/" . $imagename . '" width="136" height="108">      </strong></td></tr>';
            $printing = 'Yes';
        }

        $strINTemplate = array("[attachment]", "[WEBROOT]", "[plname]", "[plemail]", "[ponenNmber]", "[plnature]", "[print_labelImage]", "[category]", "[shape]", "[labelSize]", "[quantity]", "[postcode]", "[address1]", "[city]", "[county]", "[printing]", "[labelmaterial]");
        $strInDB = array($attachemnt, base_url() . "theme/", ucwords($name), $email, $phoneNumber, $subject, $image_path, $category, $shape, $size, $quantity, $pcode, $add1, $city, $county, $printing, $material);

        $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);
        $filename = base_url() . "theme/integrated_attach/" . $imagename;
        $this->load->library('email');
        $this->email->from($from_mail, $mailName);
        $this->email->to($email);
        $this->email->subject($mailSubject);
        $this->email->message($newPhrase);
        $this->email->cc('customercare@aalabels.com');

        $this->email->set_mailtype("html");
        if (file_exists($file) and $imagename != '') {
            $this->email->attach($file);
        }
        $this->email->send();
        $msg = 'Thank you, we have received your request our sales team will contact you within 24 hrs.';
        return array('class' => 'success', 'msg' => $msg);
    }


    /**
     * @return array
     */
    function save_piggy_back_request()
    {


        $category = $this->input->post('category');
        $base_label_shape = $this->input->post('base_label_shape');
        $secondary_label_shape = $this->input->post('secondary_label_shape');
        $base_width = $this->input->post('base_width');
        $base_height = $this->input->post('base_height');
        $secondary_width = $this->input->post('secondary_width');
        $secondary_height = $this->input->post('secondary_height');
        $quantity = $this->input->post('no_secondary_labels');
        $name = $this->clean($this->input->post('name', true));
        $company = '';
        $email = $this->input->post('email');
        $phoneNumber = $this->clean($this->input->post('phone', true));
        $mobNumber = $this->clean($this->input->post('mob_num', true));
        $subject = $this->clean($this->input->post('subject', true));
        $additional_requirements = $this->clean($this->input->post('additional_requirements', true));
        $pcode = '';
        $file_up = $this->input->post('file_up');
        $material = 'matt-white vellum paper piggyback';

        $add1 = '';
        $add2 = '';
        $city = '';
        $county = '';

        $PrintingRequired = '';


        $maxQuoteNumber = $this->getMax();


        if ($base_label_shape == 'Circular' || $base_label_shape == 'Square') {
            $base_height = $base_width;
        }
        if ($secondary_label_shape == 'Circular' || $secondary_label_shape == 'Square') {
            $secondary_height = $secondary_width;
        }

        $piggy_back = new stdClass();
        $piggy_back->base_label_shape = $base_label_shape;
        $piggy_back->base_width = $base_width;
        $piggy_back->base_height = $base_height;
        $piggy_back->secondary_label_shape = $secondary_label_shape;
        $piggy_back->secondary_width = $secondary_width;
        $piggy_back->secondary_height = $secondary_height;
        $piggy_back->additional_requirements = $additional_requirements;

        $piggy_back = json_encode($piggy_back);

        $labelDetail = array(
            'QuoteNumber' => $maxQuoteNumber,
            'piggyback_details' => $piggy_back,
            'Shape' => '',
            'category' => $category,
            'RectangleHight' => '',
            'RectangleWidth' => '',
            'OtherInstruction' => $subject,
            'TotalLabelsReq ' => $quantity,
            'Material' => $material,
            'PrintingRequired' => $PrintingRequired
        );

        $labelDetailquotes = array(
            'QuoteNumber' => $maxQuoteNumber,
            'Source' => 'piggyback enquiry',
            'RequestStatus' => 11,
            'RequestDate' => date('y-m-d'),
            'TotalQuantity' => $quantity,
            'BillingFirstName' => $name,
            'BillingPostcode' => $pcode,
            'Billingemail' => $email,
            'BillingTelephone' => $phoneNumber,
            'BillingFax' => $mobNumber,
            'BillingAddress1' => $add1,
            'BillingAddress2' => $add2,
            'BillingTownCity' => $city,
            'BillingCountyState' => $county,
            'ip_address' => $this->session->userdata('ip_address'),
        );

        $this->db->set('RequestTime', 'NOW()', FALSE);
        $this->db->insert('customlabelsquotes', $labelDetailquotes);
        $this->db->insert('customlabelsdetails', $labelDetail);

//
//        if ($shape == 'Circular') {
//            $size = 'Diameter : ' . $width . ' mm';
//        } else if ($shape == 'Square') {
//            $size = 'Height : ' . $height . ' mm';
//        } else {
//            $size = $width . ' mm  X  ' . $height . ' mm';
//        }
//
//        $width = $width . ' mm';
//        $height = $height . ' mm';

        // error_reporting(1);

        $config['upload_path'] = CUSTOMPATH;
        $config['allowed_types'] = 'png|doc|docx|pdf|jpg|jpeg|gif';
        $config['max_size'] = '10000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';
        $this->load->library('upload', $config);
        $field_name = "file_up";
        $imagename = "";
        $printing = $PrintingRequired;
        if ($this->upload->do_upload($field_name)) {
            $data = array('upload_data' => $this->upload->data());
            $imagename = $data['upload_data']['file_name'];
            $data_file_up = array('QuoteNumber' => $maxQuoteNumber, 'UploadedFile' => $imagename);
            $this->db->insert('customlabelsfiles', $data_file_up);
            $printing = 'Yes';
        }


//        $q = $this->db->query("SELECT * FROM " . Template_Table . " WHERE MailID ='109'");
//        $adhesive = '';
//        $result = $q->result();
//        $mailTitle = $result[0]->MailTitle;
//        $mailName = $result[0]->Name;
//        $from_mail = $result[0]->MailFrom;
//        $mailSubject = $result[0]->MailSubject;
//        $mailText = $result[0]->MailBody;
//        $bgcolor = 'bgcolor="#ffffff"';
//
//        $getfile = FCPATH . 'system/libraries/en/quotaion-request.html';
//        $mailText = file_get_contents($getfile);
//
//
//        $name = $this->input->post('name');
//        $company = $this->input->post('company');
//        $email = $this->input->post('email');
//        $phoneNumber = $this->input->post('phoneNumber');
//        $subject = $this->input->post('subject');
//
//
//        $image_path = '';
//        $attachemnt = '';
//
//        //$path=$_SERVER["DOCUMENT_ROOT"];
//        $file = CUSTOMPATH . $imagename;
//
//        if (file_exists($file) and $imagename != '') {
//            //$image_path = '<img src="'.base_url()."CustomLabelsFiles/".$imagename.'" title="No Image Provided" height="210" width="210">';
//            $attachemnt = '<tr><td colspan="2" align="center" valign="top" bgcolor="#ffffff"><strong>Labels to be printed with Attached Image<br>';
//            $attachemnt .= '<img src="' . base_url() . "theme/integrated_attach/" . $imagename . '" width="136" height="108"></strong></td></tr>';
//            $printing = 'Yes';
//        }
//
//
//        $special_instructions = '';
//        if (isset($subject) and $subject != '') {
//            $special_instructions = '<tr style="text-align:left"><td colspan="7" style="font-size:12px; border:1px solid #b3b3b3;border-top:0;">Special Instructions:</td></tr>';
//        }
//
//
//        $strINTemplate = array("[attachment]", "[WEBROOT]", "[NAME]", "[Email]", "[Company]", "[QuoteNumber]", "[Phone]", "[RequestDate]", "[RequestTime]", "[category]", "[shape]", "[Material]", "[Width]", "[Hight]", "[quantity]", "[printing]", "[address1]", "[city]", "[county]", "[postcode]", "[special_instructions]");
//        $strInDB = array($attachemnt, base_url() . "theme/", $name, $email, $company, $maxQuoteNumber, $phoneNumber, date('jS F Y'), date('h:i:s A'), $category, $shape, $material, $width, $height, $quantity, $printing, $add1, $city, $county, $pcode, $special_instructions);
//
//
//        $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);
//        $filename = base_url() . "theme/integrated_attach/" . $imagename;
//        $this->load->library('email');
//        $this->email->from($from_mail, $mailName);
//        $this->email->to($email);
//        $this->email->subject($mailSubject);
//        $this->email->message($newPhrase);
//        $this->email->cc('customercare@aalabels.com');
//        //	$this->email->bcc('kami.ramzan77@gmail.com');
//
//        $this->email->set_mailtype("html");
//        if (file_exists($file) and $imagename != '') {
//            $this->email->attach($file);
//        }
//        $this->email->send();
        $msg = 'Thank you, we have received your request our sales team will contact you within 24 hrs.';
        return array('class' => 'success', 'msg' => $msg);
    }


    /**
     * @return array
     */
    function save_custom_request()
    {


        $category = $this->input->post('category');
        $shape = $this->input->post('shape');
        $width = $this->input->post('width');
        $height = $this->input->post('height');
        $quantity = $this->input->post('quantity');
        $name = $this->clean($this->input->post('name', true));
        $company = $this->clean($this->input->post('company', true));
        $email = $this->input->post('email');
        $phoneNumber = $this->clean($this->input->post('phoneNumber', true));
        $subject = $this->clean($this->input->post('subject', true));
        $pcode = $this->clean($this->input->post('b_pcode', true));
        $file_up = $this->input->post('file_up');
        $material = $this->input->post('material');

        $add1 = $this->clean($this->input->post('add1', true));
        $add2 = $this->clean($this->input->post('add2', true));
        $city = $this->clean($this->input->post('city', true));
        $county = $this->clean($this->input->post('county', true));

        $PrintingRequired = $this->input->post('printing_required');


        $maxQuoteNumber = $this->getMax();


        if ($shape == 'Circular' || $shape == 'Square') {
            $height = $width;
        }
        $labelDetail = array(
            'QuoteNumber' => $maxQuoteNumber,
            'Shape' => $shape,
            'category' => $category,
            'RectangleHight' => $height,
            'RectangleWidth' => $width,
            'OtherInstruction' => $subject,
            'TotalLabelsReq ' => $quantity,
            'Material' => $material,
            'PrintingRequired' => $PrintingRequired
        );

        $labelDetailquotes = array(
            'QuoteNumber' => $maxQuoteNumber,
            'Source' => 'Custom Label Printing',
            'RequestStatus' => 11,
            'RequestDate' => date('y-m-d'),
            'TotalQuantity' => $quantity,
            'BillingFirstName' => $name,
            'BillingPostcode' => $pcode,
            'Billingemail' => $email,
            'BillingTelephone' => $phoneNumber,
            'BillingAddress1' => $add1,
            'BillingAddress2' => $add2,
            'BillingTownCity' => $city,
            'BillingCountyState' => $county,
            'ip_address' => $this->session->userdata('ip_address'),
        );

        $this->db->set('RequestTime', 'NOW()', FALSE);
        $this->db->insert('customlabelsquotes', $labelDetailquotes);
        $this->db->insert('customlabelsdetails', $labelDetail);


        if ($shape == 'Circular') {
            $size = 'Diameter : ' . $width . ' mm';
        } else if ($shape == 'Square') {
            $size = 'Height : ' . $height . ' mm';
        } else {
            $size = $width . ' mm  X  ' . $height . ' mm';
        }

        $width = $width . ' mm';
        $height = $height . ' mm';

        // error_reporting(1);

        $config['upload_path'] = CUSTOMPATH;
        $config['allowed_types'] = 'png|doc|docx|pdf|jpg|jpeg|gif';
        $config['max_size'] = '10000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';
        $this->load->library('upload', $config);
        $field_name = "file_up";
        $imagename = "";
        $printing = $PrintingRequired;
        if ($this->upload->do_upload($field_name)) {
            $data = array('upload_data' => $this->upload->data());
            $imagename = $data['upload_data']['file_name'];
            $data_file_up = array('QuoteNumber' => $maxQuoteNumber, 'UploadedFile' => $imagename);
            $this->db->insert('customlabelsfiles', $data_file_up);
            $printing = 'Yes';
        }


        $q = $this->db->query("SELECT * FROM " . Template_Table . " WHERE MailID ='109'");
        $adhesive = '';
        $result = $q->result();
        $mailTitle = $result[0]->MailTitle;
        $mailName = $result[0]->Name;
        $from_mail = $result[0]->MailFrom;
        $mailSubject = $result[0]->MailSubject;
        $mailText = $result[0]->MailBody;
        $bgcolor = 'bgcolor="#ffffff"';

        $getfile = FCPATH . 'system/libraries/en/quotaion-request.html';
        $mailText = file_get_contents($getfile);


        $name = $this->input->post('name');
        $company = $this->input->post('company');
        $email = $this->input->post('email');
        $phoneNumber = $this->input->post('phoneNumber');
        $subject = $this->input->post('subject');


        $image_path = '';
        $attachemnt = '';

        //$path=$_SERVER["DOCUMENT_ROOT"];
        $file = CUSTOMPATH . $imagename;

        if (file_exists($file) and $imagename != '') {
            //$image_path = '<img src="'.base_url()."CustomLabelsFiles/".$imagename.'" title="No Image Provided" height="210" width="210">';
            $attachemnt = '<tr><td colspan="2" align="center" valign="top" bgcolor="#ffffff"><strong>Labels to be printed with Attached Image<br>';
            $attachemnt .= '<img src="' . base_url() . "theme/integrated_attach/" . $imagename . '" width="136" height="108"></strong></td></tr>';
            $printing = 'Yes';
        }


        $special_instructions = '';
        if (isset($subject) and $subject != '') {
            $special_instructions = '<tr style="text-align:left"><td colspan="7" style="font-size:12px; border:1px solid #b3b3b3;border-top:0;">Special Instructions:</td></tr>';
        }


        $strINTemplate = array("[attachment]", "[WEBROOT]", "[NAME]", "[Email]", "[Company]", "[QuoteNumber]", "[Phone]", "[RequestDate]", "[RequestTime]", "[category]", "[shape]", "[Material]", "[Width]", "[Hight]", "[quantity]", "[printing]", "[address1]", "[city]", "[county]", "[postcode]", "[special_instructions]");
        $strInDB = array($attachemnt, base_url() . "theme/", $name, $email, $company, $maxQuoteNumber, $phoneNumber, date('jS F Y'), date('h:i:s A'), $category, $shape, $material, $width, $height, $quantity, $printing, $add1, $city, $county, $pcode, $special_instructions);


        $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);
        $filename = base_url() . "theme/integrated_attach/" . $imagename;
        $this->load->library('email');
        $this->email->from($from_mail, $mailName);
        $this->email->to($email);
        $this->email->subject($mailSubject);
        $this->email->message($newPhrase);
        $this->email->cc('customercare@aalabels.com');
        //	$this->email->bcc('kami.ramzan77@gmail.com');

        $this->email->set_mailtype("html");
        if (file_exists($file) and $imagename != '') {
            $this->email->attach($file);
        }
        $this->email->send();
        $msg = 'Thank you, we have received your request our sales team will contact you within 24 hrs.';
        return array('class' => 'success', 'msg' => $msg);
    }


    /**
     * @param $string
     * @return string|string[]|null
     */
    function clean($string)
    {
        $string = strip_tags($string);
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }


    /**
     * @return array
     */
    function save_contactus_request()
    {
        $name = $this->clean($this->input->post('name', true));
        $phone = $this->clean($this->input->post('phone', true));
        $subject = $this->clean($this->input->post('subject', true));
        $email = $this->input->post('email');
        $inquiry = $this->input->post('inquiry');
        $newsletter = $this->input->post('check_box');
        $pcode = $this->clean($this->input->post('b_pcode', true));
        $company = $this->clean($this->input->post('company', true));
        $add1 = $this->clean($this->input->post('add1', true));
        $add2 = $this->clean($this->input->post('add2', true));
        $city = $this->clean($this->input->post('city', true));
        $county = $this->clean($this->input->post('county'));

        if ($newsletter == 'on') {
            $this->home_model->newsletter($this->input->post('email'));
        }

        $material_sel = $this->input->post('material_selection');

        $materials = '';
        if (is_array($material_sel)) {
            $materials = implode(' , ', $material_sel);
        }

        /*---------- start enquiry work-----------------*/
        $maxQuoteNumber = $this->getMax();

        $enquiryData = array(
            'QuoteNumber' => $maxQuoteNumber,
            'BillingFirstName' => $name,
            'Billingemail' => $email,
            'BillingTelephone' => $phone,
            'Source ' => 'Contactus',
            'RequestStatus' => 11,
            'RequestDate' => date('y-m-d'),
            'BillingPostcode' => $pcode,
            'BillingCompanyName' => $company,
            'BillingAddress1' => $add1,
            'BillingAddress2' => $add2,
            'BillingTownCity' => $city,
            'BillingCountyState' => $county,
            'ip_address' => $this->session->userdata('ip_address'),
        );


        $othher_instr = " Nature of Enquiry: \n " . $inquiry;
        $othher_instr .= "\n------------------------------------";
        if ($materials) {
            $othher_instr .= "\n Sample Materials: \n " . $materials;
            $othher_instr .= "\n-------------------------------------";
        }

        $othher_instr .= "\n Other Instructions: \n " . $subject;

        $customlabelsdetails = array(
            'QuoteNumber' => $maxQuoteNumber,
            'OtherInstruction' => $othher_instr
        );
        $this->db->set('RequestTime', 'NOW()', FALSE);
        $this->db->insert('customlabelsquotes', $enquiryData);
        $this->db->insert('customlabelsdetails', $customlabelsdetails);


        /*---------- end enquiry work-----------------*/
        $getfile = FCPATH . 'system/libraries/en/contact.html';
        $mailText = file_get_contents($getfile);


        $strINTemplate = array("[QuoteNumber]", "[NAME]", "[Company]", "[address1]", "[address2]", "[postcode]", "[city]", "[county]", "[Phone]", "[Email]", "[Subject]", "[Message]", "[RequestDate]", "[RequestTime]");
        $strInDB = array($maxQuoteNumber, $name, $company, $add1, $add2, $pcode, $city, $county, $phone, $email, $inquiry, $othher_instr, date('jS F Y'), date('h:i:s A'));
        $EmailMessage = str_replace($strINTemplate, $strInDB, $mailText);


        $this->load->library('email');
        $this->email->from('support@aalabels.com', 'Contact Us Email by ' . $name);
        $this->email->to('customercare@aalabels.com');

        // $this->email->bcc('kami.ramzan77@gmail.com');
        $this->email->set_mailtype("html");
        $this->email->subject('Contact Us Email');
        $this->email->message($EmailMessage);
        $this->email->send();
        $msg = 'Thank you, you have successfully submitted request !';
        return array('class' => 'success', 'msg' => $msg);


    }

    /**
     * @param $type
     * @param null $shape
     * @return mixed
     */
    function get_xmass_products($type, $shape = NULL)
    {

        if (isset($shape) and $shape != NULL) {
            $qry2 = $this->db->query("SELECT c.CategoryID,c.specification1,c.specification2,c.specification3,c.pdfFile,
			c.wordFile, c.CategoryName, c.CategoryImage,c.LabelWidth,c.LabelHeight,c.Shape,p.ProductName,p.ManufactureID,p.ProductID,FeatureProducts 
			FROM category c , products p WHERE SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID and c.Shape LIKE '" . $shape . "' 
			and FeatureProducts LIKE '" . $type . "' Order by LabelsPerSheet DESC");

        } else {
            $qry2 = $this->db->query("SELECT c.CategoryID,c.specification1,c.specification2,c.specification3,c.pdfFile,
			c.wordFile, c.CategoryName, c.CategoryImage,c.LabelWidth,c.LabelHeight,c.Shape,p.ProductName,p.ManufactureID,p.ProductID,FeatureProducts 
			FROM category c , products p WHERE SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID AND FeatureProducts LIKE '" . $type . "' 
			Order by LabelsPerSheet DESC");
        }


        return $qry2->result();
    }

    /**
     * @param $type
     * @return mixed
     */
    function get_xmass_design($type)
    {
        $qry2 = $this->db->query("SELECT * from xmass_design WHERE category LIKE '" . $type . "' ORDER BY SEQ ASC");
        return $result = $qry2->result();
    }

    /**
     * @param $mid
     * @return mixed
     */
    function buypage($mid)
    {
        $condition = '';
        if (substr($mid, 0, 2) == 'SR' || substr($mid, 0, 2) == 'A3') {
            $condition = ' batch.BatchQty >= 100 AND';
        } else if (preg_match("/PETC/", $mid) || preg_match("/PETH/", $mid) || preg_match("/PVUD/", $mid)) {
            $condition = ' batch.BatchQty <= 5000 AND';
        }
        $priceqry = $this->db->query("select tbl.ManufactureID,tbl.BatchID,tbl.SetupCost,tbl.SheetPrice,batch.BatchQty from tbl_product_batchprice tbl,
		  tbl_batch batch where $condition tbl.ManufactureID='" . $mid . "' and tbl.BatchID= batch.BatchID ORDER BY `batch`.`BatchQty` ASC");
        $res1 = $priceqry->result();
        return $res1;
    }

    /******************** offshore Delivery ************************/
    function offshore_delviery_charges()
    {
        $postcode = $this->session->userdata('off_postcode');
        $countryid = $this->session->userdata('countryid');
        // AA21 STARTS
        $DeliveryCountry = $this->session->userdata['checkoutdata']['DeliveryCountry'];
        // AA21 ENDS

        $data = array('status' => false);
        // AA21 STARTS
        if (isset($DeliveryCountry) and ($DeliveryCountry != '') and $DeliveryCountry != 'United Kingdom') {
            $id = $this->getcountry_charges($DeliveryCountry);
            // AA21 ENDS
            $data = array('status' => true, 'type' => '', 'charges' => '', 'serviceid' => $id);
        } else if (isset($postcode) and $postcode != '') {

            $postcode = preg_replace('/\s+/', '', $postcode);
            $response = $this->postcode_validator($postcode);
            $digits_2 = substr($postcode, 0, 2);
            $digits_3 = substr($postcode, 0, 3);
            $digits_4 = substr($postcode, 0, 4);


            $query = " SELECT *,count(*) as total FROM `offshore_charges` 
				WHERE (postcode LIKE '" . $digits_2 . "' AND (length=2 OR length LIKE 'all' )) OR
				(postcode LIKE '" . $digits_3 . "' AND length=3) OR (postcode LIKE '" . $digits_4 . "' AND length=4) OR (REPLACE(postcode,' ','') 
				LIKE '" . $postcode . "') LIMIT 1 ";
            $query = $this->db->query($query);
            $row = $query->row_array();
            $type = ' Offshore Delivery ';
            if (isset($row['total']) and $row['total'] > 0) {
                $data = array('status' => true, 'type' => '', 'charges' => '', 'serviceid' => $row['type']);
            }
        }
        return $data;
    }

    // AA21 STARTS

    /**
     * @param $DeliveryCountryPostCode
     * @param $deliveryCountryid
     * @return array
     */
    function offshore_delviery_charges_WPC($DeliveryCountryPostCode, $deliveryCountryid)
    {
        $postcode = $DeliveryCountryPostCode;
        $countryid = $deliveryCountryid;
        $data = array('status' => false);

        if (isset($countryid) and ($countryid != '') and $countryid != 'United Kingdom') {
            $id = $this->getcountry_charges($countryid);
            $data = array('status' => true, 'type' => '', 'charges' => '', 'serviceid' => $id);
//            echo "If Condition";
        } else if (isset($postcode) and $postcode != '') {

            $postcode = preg_replace('/\s+/', '', $postcode);
            $response = $this->postcode_validator($postcode);
            $digits_2 = substr($postcode, 0, 2);
            $digits_3 = substr($postcode, 0, 3);
            $digits_4 = substr($postcode, 0, 4);


            $query = " SELECT *,count(*) as total FROM `offshore_charges` 
                WHERE (postcode LIKE '" . $digits_2 . "' AND (length=2 OR length LIKE 'all' )) OR
                (postcode LIKE '" . $digits_3 . "' AND length=3) OR (postcode LIKE '" . $digits_4 . "' AND length=4) OR (REPLACE(postcode,' ','') 
                LIKE '" . $postcode . "') LIMIT 1 ";
            $query = $this->db->query($query);
            $row = $query->row_array();
            $type = ' Offshore Delivery ';
            if (isset($row['total']) and $row['total'] > 0) {
                $data = array('status' => true, 'type' => '', 'charges' => '', 'serviceid' => $row['type']);
            }
        }
        return $data;
    }

    // AA21 ENDS

    /**
     * @param $toCheck
     * @return bool
     */
    function postcode_validator(&$toCheck)
    {

        // Permitted letters depend upon their position in the postcode.
        $alpha1 = "[abcdefghijklmnoprstuwyz]";                          // Character 1
        $alpha2 = "[abcdefghklmnopqrstuvwxy]";                          // Character 2
        $alpha3 = "[abcdefghjkpmnrstuvwxy]";                            // Character 3
        $alpha4 = "[abehmnprvwxy]";                                     // Character 4
        $alpha5 = "[abdefghjlnpqrstuwxyz]";                             // Character 5
        $BFPOa5 = "[abdefghjlnpqrst]{1}";                               // BFPO character 5
        $BFPOa6 = "[abdefghjlnpqrstuwzyz]{1}";                          // BFPO character 6

        // Expression for BF1 type postcodes
        $pcexp[0] = '/^(bf1)([[:space:]]{0,})([0-9]{1}' . $BFPOa5 . $BFPOa6 . ')$/';

        // Expression for postcodes: AN NAA, ANN NAA, AAN NAA, and AANN NAA with a space
        $pcexp[1] = '/^(' . $alpha1 . '{1}' . $alpha2 . '{0,1}[0-9]{1,2})([[:space:]]{0,})([0-9]{1}' . $alpha5 . '{2})$/';

        // Expression for postcodes: ANA NAA
        $pcexp[2] = '/^(' . $alpha1 . '{1}[0-9]{1}' . $alpha3 . '{1})([[:space:]]{0,})([0-9]{1}' . $alpha5 . '{2})$/';

        // Expression for postcodes: AANA NAA
        $pcexp[3] = '/^(' . $alpha1 . '{1}' . $alpha2 . '{1}[0-9]{1}' . $alpha4 . ')([[:space:]]{0,})([0-9]{1}' . $alpha5 . '{2})$/';

        // Exception for the special postcode GIR 0AA
        $pcexp[4] = '/^(gir)([[:space:]]{0,})(0aa)$/';

        // Standard BFPO numbers
        $pcexp[5] = '/^(bfpo)([[:space:]]{0,})([0-9]{1,4})$/';

        // c/o BFPO numbers
        $pcexp[6] = '/^(bfpo)([[:space:]]{0,})(c\/o([[:space:]]{0,})[0-9]{1,3})$/';

        // Overseas Territories
        $pcexp[7] = '/^([a-z]{4})([[:space:]]{0,})(1zz)$/';

        // Anquilla
        $pcexp[8] = '/^ai-2640$/';

        // Load up the string to check, converting into lowercase
        $postcode = strtolower($toCheck);

        // Assume we are not going to find a valid postcode
        $valid = false;

        // Check the string against the six types of postcodes
        foreach ($pcexp as $regexp) {

            if (preg_match($regexp, $postcode, $matches)) {

                // Load new postcode back into the form element
                $postcode = strtoupper($matches[1] . ' ' . $matches [3]);

                // Take account of the special BFPO c/o format
                $postcode = preg_replace('/C\/O([[:space:]]{0,})/', 'c/o ', $postcode);

                // Take acount of special Anquilla postcode format (a pain, but that's the way it is)
                if (preg_match($pcexp[7], strtolower($toCheck), $matches)) $postcode = 'AI-2640';

                // Remember that we have found that the code is valid and break from loop
                $valid = true;
                break;
            }
        }

        // Return with the reformatted valid postcode in uppercase if the postcode was
        // valid
        //  echo $postcode;
        if ($valid) {
            $toCheck = $postcode;
            return true;
        } else return false;


    }


    /**
     * @param $countryid
     * @return mixed
     */
    function getcountry_charges($countryid)
    {
        $result = $this->db->query("Select charges,ID from shippingcountries WHERE name LIKE '" . $countryid . "'");
        $row = $result->row_array();
        return $row['ID'];
    }

    /******************** offshore Delivery ************************/

    function get_static_material_list($type = '', $material = '', $adhesive = '', $color = '')
    {
        if ($type != '') {
            $this->db->where('type', $type);
        }
        if ($material != '') {
            $this->db->like('material', $material, 'after');
        }
        if ($color != '') {
            $this->db->like('color', $color, 'both');
        }

        if ($adhesive != '') {
            $this->db->where('adhesive', $adhesive);
        }

        $this->db->order_by('seq', 'ASC');
        $this->db->where('group_id >', '0');
        $db = $this->db->get('static_materials');
        return $db->result();
    }

    /**
     * @param $column
     * @param string $material
     * @param string $color
     * @return mixed
     */
    function get_material_columns($column, $material = '', $color = '')
    {
        $this->db->distinct();
        $this->db->select($column);
        if ($material != '') {
            $this->db->where("material", $material);
            $this->db->order_by('material', 'ASC');
        }
        if ($color != '') {
            $this->db->where("color", $color);
            $this->db->order_by('color', 'ASC');

        }
        $q = $this->db->get('static_materials');
        return $q->result();
    }

    /**
     * @param $list
     * @param $field
     * @param $name
     * @param null $selec
     * @return string
     */
    function make_material_dropdown($list, $field, $name, $selec = NULL)
    {
        $text = '';
        $option = '';
        $value = '';
        $option = '<option value="" > ' . $name . ' </option>';
        foreach ($list as $a_row) {
            $selected = '';
            if ($a_row->$field == $selec) {
                $selected = 'selected="selected"';
            }
            $value = $a_row->$field;
            $option .= '<option value="' . $a_row->$field . '" ' . $selected . '>' . ucfirst($value) . ' ' . $text . '</option>';
        }
        return $option;
    }

    /**
     * @param $type
     * @return mixed
     */
    function get_material_groups($type)
    {
        $this->db->order_by('seq', 'ASC');
        $this->db->where('group_type', $type);
        $this->db->where('active', '1');
        $q = $this->db->get('static_materials_groups');
        return $q->result();
    }

    /**
     * @param $group_id
     * @param $group_type
     * @return mixed
     */
    function get_materials_by_group($group_id, $group_type)
    {
        $this->db->order_by('seq', 'ASC');
        $this->db->where('type', $group_type);
        $this->db->where('group_id', $group_id);
        $q = $this->db->get('static_materials');
        return $q->result();
    }


// end of product Model
}