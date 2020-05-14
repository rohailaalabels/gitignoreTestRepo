<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->session->unset_userdata("redirect_from");
        $name = 'redirectfrom';
        $value = '';
        setcookie($name, $value, 0, '/', '');
        $this->load->library('pagination');
    }

    function index()
    {
        if($this->uri->total_segments() != 0){
        	redirect('','refresh');
    	}
        //$condtion = "c.CategoryActive = 'Y' AND c.Shape != ''";
        //$data['count'] = $this->home_model->labelfinder_counter($condtion);
        $counter = $this->db->query(" SELECT count(*) as total FROM products WHERE Activate = 'Y' ")->row_array();
        $data['count'] = $counter['total'];

        $data['main_content'] = 'index';
        $this->load->View('page', $data);
    }
    
    function index2()
    {

        //$condtion = "c.CategoryActive = 'Y' AND c.Shape != ''";
        //$data['count'] = $this->home_model->labelfinder_counter($condtion);
        //$counter = $this->db->query(" SELECT count(*) as total FROM products WHERE Activate = 'Y' ")->row_array();
        //$data['count'] = $counter['total'];

        $data['main_content'] = 'index_home';
        $this->load->View('page');
    }

    function category_old($type = NULL, $shape = NULL)
    {
        if ($type == NULL) {
            $type = 'A4';
        }
        $brand = $this->home_model->make_productBrand_condtion($type);
        if ($shape != NULL) {
            $condition = " p.ProductBrand LIKE '" . $brand . "' AND CategoryActive='Y' AND c.Shape LIKE '" . $shape . "' ";
        } else {
            $condition = " p.ProductBrand LIKE '" . $brand . "' AND CategoryActive='Y'";
        }
        $data['records'] = $this->home_model->fetch_dies_data($condition);

        $data['records']['shapes'] = array();
        $data['records']['labels'] = array();

        //$data['records']['shapes'] = $shape_list = $this->home_model->category_shapes($condition);
        //$data['records']['labels'] = $this->home_model->category_lables_persheet($condition);

        if ($shape == "") {
            if ($type == 'Roll') {
                $data['heading'] = " LABELS";
                // ON ROLLS
            } else {
                $data['heading'] = " LABELS ON $type SHEETS";
            }
        } else {
            $data['heading'] = "Order " . $this->home_model->get_heading($shape);
        }
        $data['description'] = $this->home_model->get_footer_description($type, $shape);

        $data['type'] = $type;
        $data['shape'] = $shape;

        $data['main_content'] = 'category/category';

        $this->load->View('page', $data);

    }
    
     function category($type = NULL, $shape = NULL)
    {
        if ($type == NULL) {
            $type = 'A4';
        }
        $brand = $this->home_model->make_productBrand_condtion($type);
        if ($shape != NULL) {
            $condition = " p.ProductBrand LIKE '" . $brand . "' AND CategoryActive='Y' AND c.Shape LIKE '" . $shape . "' ";
        } else {
            $condition = " p.ProductBrand LIKE '" . $brand . "' AND CategoryActive='Y'";
        }
        $data['records'] = $this->home_model->fetch_dies_data($condition);
        //die(print_r($data['records']));
        $data['records']['shapes'] = array();
        $data['records']['labels'] = array();

        //$data['records']['shapes'] = $shape_list = $this->home_model->category_shapes($condition);
        //$data['records']['labels'] = $this->home_model->category_lables_persheet($condition);

        if ($shape == "") {
            
            if ($type == 'Roll')
            {
               // AA41 STARTS
                     $data['heading'] = " Order Labels on a Roll Online";
                // AA41 ENDS
            }
            else
            {
               // AA41 STARTS
                    if ( preg_match("/a5/i", $type) ) {
                        $data['heading'] = " All Labels on ".$type." Sheets ";
                    } else if ( preg_match("/a4/i", $type) ) {
                        $data['heading'] = " Discover Our Range Of  ".$type." Label Sheets ";
                    }  else if ( preg_match("/a3/i", $type) ) {
                        $data['heading'] = " All Labels on ".$type." Sheets ";
                    }  else if ( preg_match("/sra3/i", $type) ) {
                        $data['heading'] = " All Labels on ".$type." Sheets ";
                    }  else if ( preg_match("/roll-labels/i", $type) ) {
                        $data['heading'] = " All Labels on Sheets ";
                    } 
                // AA41 ENDS
            }

        } else {
            
            // AA33 STARTS
                // $data['heading'] = "Order " . $this->home_model->get_heading($shape);
                if ($type == 'Roll') {
                    $data['heading'] = $this->home_model->get_heading($shape);
                } else {
                       // AA48 STARTS
                    if (preg_match("/square/i", $shape) && $type == "A4"){
                        $data['heading'] = $this->home_model->get_heading($shape) . " On ".$type." Sheets";
                    } else if (preg_match("/circular/i", $shape) && $type == "A4"){
                        $data['heading'] = "Order ".$this->home_model->get_heading($shape) . " Sheets Online";
                    } else if (preg_match("/star/i", $shape) && $type == "A4"){
                        $data['heading'] =  "Star Labels On ".$type." Sheets";
                    } else if (preg_match("/anti-tamper/i", $shape) && $type == "A4"){
                        $data['heading'] =  "Anti-Tamper Labels Available On ".$type." Sheets";
                    } else if (preg_match("/rectangle/i", $shape) && $type == "A4"){
                        $data['heading'] =  $this->home_model->get_heading($shape). " On ".$type." Sheets";
                    }
                    // AA48 STARTS
                    else if (preg_match("/triangle/i", $shape) && $type == "A4"){
                        $data['heading'] =  $this->home_model->get_heading($shape). " On ".$type." Sheets";
                    }
                    // AA48 STARTS
                    else {
                        $data['heading'] = $this->home_model->get_heading($shape) . " for Printing On ".$type." Sheets";
                    }
                    // AA48 ENDS
                }
            // AA33 ENDS

        }
        $data['description'] = $this->home_model->get_footer_description($type, $shape);
        //die(print_r($data['description']));
        $data['type'] = $type;
        $data['shape'] = $shape;

        $data['main_content'] = 'category/category';

        $this->load->View('page', $data);

    }

    function freeTemplates($type = NULL)
    {

        if ($type == NULL) {
            $type = 'A4';
        }

        $brand = $this->home_model->make_productBrand_condtion($type);
        $condition = " p.ProductBrand LIKE '" . $brand . "' AND CategoryActive='Y'";
        $data['type'] = $type;
        $data['records'] = $this->home_model->fetch_dies_data($condition);
        $data['records']['labels'] = $this->home_model->category_lables_persheet($condition);
        $data['main_content'] = 'category/templates';
        $this->load->View('page', $data);
    }

    function searchResults()
    {
        $query = $this->input->get('q');
        $page = $this->input->get('page');

        if (isset($page) and $page == 'printer') {

            $data['records']['list'] = $this->home_model->auto_search_printer(100);
            $data['type'] = 'printer';
        } else {
            $response = $this->home_model->auto_search('page');
            $data['records']['list'] = $response['results'];
            $data['type'] = $response['tbl'];
        }

        $data['main_content'] = 'category/search';
        $this->load->view('page', $data);
    }

    function avery_size_labels()
    {
        //$condition = " c.categoryID LIKE 'T16' AND CategoryActive='Y'";
        //$data['records'] = $this->home_model->fetch_dies_data($condition);
        $query = $this->db->query("SELECT c.CategoryID,c.specification1,c.specification2,c.specification3,c.pdfFile,c.wordFile, 
								 c.CategoryName, c.CategoryImage,c.LabelWidth,c.LabelHeight,c.Shape,p.ProductName,p.ManufactureID FROM tbl_avery_compatible a,
		 category c, View_Products p WHERE c.CategoryID = p.CategoryID and a.AverySizes=  'Y' AND c.CategoryID = a.CategoryID GROUP BY c.CategoryID  ORDER BY  p.LabelsPerSheet ASC ");
        $data['records'] = $query->result();


        $data['main_content'] = 'category/avery_labels';
        $data['tempcatarray'] = $this->product_model->avery_label_equalent_link();
        $this->load->View('page', $data);
    }

    function material_old($catid, $productid = NULL)
    {
        $printer_condition = '';
        $other_material_option = '';
        $data['other_materials'] = '';
        $productid = filter_var($this->input->get('productid'), FILTER_VALIDATE_INT);
        $regmark = $this->input->get('regmark');
        if ($regmark != "yes") {
            $regmark = "no";
        }
        if (preg_match('/^c/i', $catid)) {
            $catid = strtoupper($catid);
            $core = 'R1';
            $coreinURL = '';
            if (substr($catid, -2, 1) == 'R') {

                if (preg_match('/r1|r2|r3|r4|r5/is', $catid)) {
                    $new_code_exp = explode("R", $catid);
                    $catid = $new_code_exp[0];
                    $core = 'R' . $new_code_exp[1];
                    $coreinURL = $core = 'R' . $new_code_exp[1];
                }

            }
            $condition = " CategoryID ='$catid'";
            $data['details'] = $this->home_model->fetch_category_details($catid);
            if (isset($productid) and $productid != '') {

                $menuid = $this->home_model->getManufactureID($productid);
                $coreid = substr($menuid, -1);
                $coreinURL = $core = 'R' . $new_code_exp[1];

                /********* New product code selection code ********/
                if (isset($new_code_exp[1]) and $new_code_exp[1] != '') {
                    $defaultcore = 'R' . $coreid;
                    if ($coreinURL != $defaultcore) {
                        $core = 'R' . $new_code_exp[1];
                        $menuid = substr($menuid, 0, -1);
                        $menuid = $menuid . $new_code_exp[1];
                        $productid = $this->home_model->get_db_column('products', 'ProductID', 'ManufactureID', $menuid);
                    }
                }
                /*************************************************/

                $data['coreid'] = $core;
            } else {
                $data['coreid'] = $core;
            }

            $data['rollcores'] = $this->home_model->roll_core_sizes($catid, $core);
            $catid = $catid . $core;
            $data['subcat'] = $catid;
            $data['coreinURL'] = $coreinURL;
            $data['main_content'] = 'material/material_roll';


            $printer = $this->input->get('printer');
            if (isset($printer) and $printer != '') {

                $data['printer_model'] = urldecode($printer);

                $query = $this->db->query("SELECT method FROM `printers_model` WHERE model LIKE '" . urldecode($printer) . "' LIMIT 1 ");
                $model_array = $query->row_array();
                $method = str_replace("/", "<br>", $model_array['method']);

                //$printer_condition = 'AND (';


                if (preg_match("/\bThermal Transfer\b/i", $method)) {
                    $printer_condition .= " SpecText7 LIKE '%Thermal Transfer%' OR";
                    $other_material_option .= " SpecText7 NOT LIKE '%Thermal Transfer%' AND";
                }
                if (preg_match("/\bInkjet\b/i", $method)) {
                    $printer_condition .= "  SpecText7 LIKE '%Inkjet%' OR";
                    $other_material_option .= " SpecText7 NOT LIKE '%Inkjet%' AND";
                }
                if (preg_match("/\bDirect Thermal\b/i", $method)) {
                    $printer_condition .= " SpecText7 LIKE '%Direct Thermal%' OR";

                    if ($other_material_option) {
                        $other_material_option .= " SpecText7 NOT LIKE '%Direct Thermal%' AND";
                    } else {
                        $other_material_option = "";
                    }
                }

                if ($printer_condition) {
                    $printer_condition = " AND ( " . substr($printer_condition, 0, -2) . " )";
                }

                if ($other_material_option) {
                    $other_material_option = " AND ( " . substr($other_material_option, 0, -3) . " )";
                    $other_material_option = " CategoryID ='$catid' " . $other_material_option;
                    //$data['other_materials'] = $this->home_model->ajax_material_sorting($other_material_option);
                    $data['othermaterials'] = $this->home_model->grouping_material_listing($other_material_option);
                }

            }


        } else {

            $data['details'] = $this->db->get_where('category', array('CategoryID' => $catid, 'CategoryActive' => 'Y'))->row_array();

//            $data['details'] = $this->home_model->fetch_category_details($catid);


            $AveryCode = $this->db->select('AveryCode')->get_where('tbl_avery_compatible', array('CategoryID' => $catid, 'AverySizes' => 'Y'))->row_array();
            if (isset($AveryCode)) {
                $data['compitable'] = $AveryCode['AveryCode'];
            }
//             else{
//                $data['compitable'] = '';
//            }

//            $data['compitable'] = $this->home_model->avery_equilent($catid);
//            print_r($data['compitable']);die;

            $data['main_content'] = 'material/material';
        }
        if (isset($productid) and $productid != '') {

            $condition = " CategoryID ='$catid' AND ProductID <> '$productid'";
            $data['productid'] = $productid;
//            converted method in Codeigniter ARO
            $data['materials'] = $this->home_model->fetch_sheets_materials($catid, $productid);


            //         $query  = "SELECT * FROM table where a=%s AND b LIKE %s LIMIT %d";
//         $result = paraQuery($query, $a, "%$b%", $limit);

            $query = "SELECT * FROM `products` WHERE CategoryID =%s AND ProductID <> %s AND  Activate='Y' 
		GROUP BY CONCAT(LabelFinish,'',ColourMaterial) order by priority asc ";
            $data['othermaterials'] = $this->home_model->prepairedQuery($query, $catid, $productid);
//           echo '<pre>'; print_r($data['othermaterials']);die;
//                     print_r("SELECT * FROM `products` WHERE CategoryID =%s AND ProductID <> %s AND  Activate='Y'
//		GROUP BY CONCAT(LabelFinish,'',ColourMaterial) order by priority asc");echo"<br>";

//            $data['othermaterials'] = $this->home_model->grouping_material_listing($condition);
//            echo '<pre>'; print_r($data['othermaterials']);die;

//            print_r(count(    $data['othermaterials']));die;

            $data['filter'] = '';

            if ($data['details']['labelCategory']) {
                $brand = str_replace("Labels", "", $data['details']['labelCategory']);
                $brand = str_replace("labels", "", $brand);
                $brand = str_replace("Label", "", $brand);
                $brand = str_replace(" ", "", $brand);
                $brand = trim($brand);
                if (preg_match("/roll/is", $brand)) {
                    $brand = 'Rolls';
                }
                $newcondition = " type LIKE '" . $brand . "'";
                $newconditionn = " ProductBrand LIKE '%" . $brand . "%	'";
                if ($data['materials']['ColourMaterial']) {
                    $newcondition .= " AND material_type LIKE '" . $data['materials']['ColourMaterial'] . "'";
                }
                if ($data['materials']['LabelFinish']) {
                    $newcondition .= " AND finish_type LIKE '" . $data['materials']['LabelFinish'] . "'";
                }
                //if($data['materials']['LabelColor']){}
            }

            if (isset($data['details']['CategoryID']) and $data['details']['CategoryID'] != '') {
                $data['paper'] = $this->filter_model->distinct_material_paper($newcondition, $brand);
                $data['adhesive'] = array();
                //$data['adhesive'] = $this->filter_model->distinct_material_adhisive($newconditionn);
                $data['color'] = $this->filter_model->distinct_material_color($newcondition, $brand);

            }
            //$data['paper'] = $this->home_model->distinct_material_paper($condition);
            //$data['adhesive'] = $this->home_model->distinct_material_adhisive($condition);
            //$data['color'] = $this->home_model->distinct_material_color($condition);

        } else {
            $condition = " CategoryID ='$catid' " . $printer_condition;
            $data['filter'] = '';

            //$data['paper'] = $this->home_model->distinct_material_paper($condition);
            //$data['adhesive'] = $this->home_model->distinct_material_adhisive($condition);
            //$data['color'] = $this->home_model->distinct_material_color($condition);

            if ($data['details']['labelCategory']) {
                $brand = str_replace("Labels", "", $data['details']['labelCategory']);
                $brand = str_replace("labels", "", $brand);
                $brand = str_replace("Label", "", $brand);
                $brand = str_replace(" ", "", $brand);
                $brand = trim($brand);
                if (preg_match("/roll/is", $brand)) {
                    $brand = 'Rolls';
                }
                //$newcondition = " type LIKE '".$brand."'" ;
                //$newcondition = '1=1 ';
                $newcondition = " type LIKE '%" . $brand . "%'";
                $newconditionn = " ProductBrand LIKE '%" . $brand . "% '";
            }

            if (isset($data['details']['CategoryID']) and $data['details']['CategoryID'] != '') {
                $data['paper'] = $this->filter_model->distinct_material_paper($newcondition, $brand);
                //$data['adhesive'] = $this->filter_model->distinct_material_adhisive($newconditionn);
                $data['adhesive'] = array();
                $data['color'] = $this->filter_model->distinct_material_color($newcondition, $brand);
                $data['finish'] = $this->filter_model->distinct_finish_type($newcondition);
//                condition is commented out so use manual
//                $condition = " CategoryID ='$catid' ".$printer_condition;

                $data['materials'] = $this->home_model->grouping_material_listing($condition);
                //$data['materials'] = $this->home_model->fetch_sheets_materials($catid,);
            }
        }
        $shape_in_url = $this->uri->segment(2);
        if (!isset($data['details']['CategoryID']) and $data['details']['CategoryID'] == '') {
            $this->get_nearest_category($catid);
        } else if (isset($shape_in_url) and strtolower($data['details']['Shape']) != strtolower($shape_in_url)) {
            $url = $this->uri->segment(1);
            $diecode = $this->uri->segment(3);
            $product = '';
            if (isset($productid) and $productid != '') {
                $product = '?productid=' . $productid;
            }
            $link = base_url() . $url . '/' . strtolower($data['details']['Shape']) . '/' . $diecode . $product;
            header("HTTP/1.1 302 Found");
            header("Location:" . $link);
            exit();
            //redirect($link, 'location', 302);
        }
        $data['regmark'] = $regmark;
        $SID = $this->shopping_model->sessionid();
        $items_array = array('SessionID' => $SID, 'status' => 'temp');
        $this->db->delete('integrated_attachments', $items_array);

        $this->load->View('page', $data);
    }


    function material($catid, $productid = NULL)
    {   //die('raza');
        $this->session->set_userdata("filterUses", "byProduct");

        $type = "";
        $productsCondition = "";
        $printingType = "Sheets";
        $filterUses = "byProduct";

        $printer_condition = '';
        $other_material_option = '';
        $data['other_materials'] = '';

		// $productid = $this->input->get('productid');
        $productid = filter_var($this->input->get('productid'), FILTER_VALIDATE_INT);

        $regmark = $this->input->get('regmark');

        if ($regmark != "yes") {
            $regmark = "no";
        }

        if ( (substr($catid, -2, 1) == 'R') || (substr($catid, -2, 1) == 'r') ) {
            if (preg_match('/r1|r2|r3|r4|r5/is', $catid)) {
                
                
                $new_code_exp = explode(substr($catid, -2, 1), $catid);
                $catid = $new_code_exp[0];
                $core = 'R' . $new_code_exp[1];
                $coreinURL = $core = 'R' . $new_code_exp[1];
                
                 if( ($core != "R4") && (isset($productid) and $productid != '') )
                    {
                        $productsConditionByPId = " ProductID = '$productid' ";
                        $getProductData = $this->home_model->getProducts($productsConditionByPId);
                        
                        if( substr( $getProductData[0]->ManufactureID , -1, 1) != 4 )
                        {

                            $manufactureIdProductId = rtrim($getProductData[0]->ManufactureID, "123")."4";
                            $getProductData = $this->home_model->getProductID($manufactureIdProductId);
                            $productid = $getProductData;

                        }
                    }
                 
            }
        }
        
        $catid = strtoupper($catid);
        $catidSimple = $catid;
        $data['catIdSimple'] = $catid;
        

        // $catid = strtoupper($catid);
        // $data['catIdSimple'] = $catid;
        // $catidSimple = $catid;

        $data['filter_message'] = "Because material surfaces and labels applications vary, unless you know the type of label required, we always recommend the testing of adhesives via the provision of our FOC sample service, before purchasing.";


        // CHECK IF ROLL STARTS
        if (preg_match('/^c/i', $catid)) {

            $core = 'R4';
            // $coreSize = $this->session->userdata('coreSize');
            // if(isset($coreSize) && $coreSize != '')
            // {
            // 	$core = $coreSize;
            // }

            $coreinURL = '';
            if (substr($catid, -2, 1) == 'R') {
                if (preg_match('/r1|r2|r3|r4|r5/is', $catid)) {
                    $new_code_exp = explode("R", $catid);
                    $catid = $new_code_exp[0];
                    $core = 'R' . $new_code_exp[1];
                    $coreinURL = $core = 'R' . $new_code_exp[1];
                }
            }
            $data['coreid'] = $core;
            $condition = " CategoryID ='$catid' ";
            $data['details'] = $this->home_model->fetch_category_details($catid);

            $data['rollcores'] = $this->home_model->roll_core_sizes($catid, $core);
            $catid = $catid . $core;
            $data['subcat'] = $catid;
            $data['coreinURL'] = $coreinURL;
            // $data['main_content'] = 'material/material_roll';
            $materialConditions = " mbl_material_group_name != ''  AND type LIKE  '%Rolls%'  ";
            $data['materials_roll'] = $this->home_model->getFilterMaterials($materialConditions);
            $data['main_content'] = 'material/material_new/material_roll';

            $data['sheetRollType'] = "Rolls";
            $printingType = "Rolls";
            $adhesiveCondition = " adhesive != '' AND type LIKE '%Rolls%' ";
            $materialConditions = " mbl_material_group_name != '' AND type LIKE '%Rolls%' ";
            $productsCondition .= " Activate = 'Y' AND CategoryID ='$catid' ";
            $materialbyUseCondition = " active = 1 ";
            $materialbyUseSubCondition = " categoryid != '' ";

        } else {
            $data['details'] = $this->home_model->fetch_category_details($catid);
            $data['main_content'] = 'material/material_new/material';
            $data['sheetRollType'] = "Sheets";

            $adhesiveCondition = " adhesive != '' AND type NOT LIKE '%Rolls%' ";
            $materialConditions = " mbl_material_group_name != '' AND type NOT LIKE '%Rolls%' ";
            $productsCondition = " Activate = 'Y' AND CategoryID ='$catid' ";
            $materialbyUseCondition = " active = 1 ";
            $materialbyUseSubCondition = " categoryid != '' ";
        }
        // CHECK FOR OTHERS ENDS

        $data['adhesives'] = $this->home_model->getAdhesives($adhesiveCondition);
        $data['printers'] = $this->home_model->getPrinters($printingType);
        $data['materials'] = $this->home_model->getFilterMaterials($materialConditions);
        $data['arraySeprator'] = ",";
        $data['materialsByUses'] = $this->home_model->getMaterialByUse($materialbyUseCondition);
        $data['materialsByUsesSub'] = $this->home_model->getMaterialByUseSub($materialbyUseSubCondition);

        // GROUP BY CONCAT(LabelFinish,'',ColourMaterial)
        if (isset($productid) and $productid != '') {
            $productsCondition .= " AND ProductID != '$productid' ";
            $productsConditionByPId = " Activate = 'Y' AND ProductID = '$productid' ";
            $data['productById'] = $this->home_model->getProducts($productsConditionByPId);
        }
      
        $data['products'] = $this->home_model->getProducts($productsCondition);
        $data['dieDetails'] = $this->home_model->fetch_category_details($catid);
        $data['categoryId'] = $catid;
        $data['productid'] = $productid;

        // GET TOTAL FOURITE PRODUCTS COUNT BY USER ID STARTS
        $userId = $this->session->userdata("userid");
        if (isset($userId) && $userId != '') {
            $data['totalFavouritesByProduct'] = $this->home_model->getUserFavouriteTotalCount("byProduct", $catidSimple, $catid, ltrim($data['details']['DieCode'], "1-"), $this->session->userdata("userid"), $printingType);
            $data['totalFavouritesByUse'] = $this->home_model->getUserFavouriteTotalCount("byUse", $catidSimple, $catid, ltrim($data['details']['DieCode'], "1-"), $this->session->userdata("userid"), $printingType);
        } else {
            $data['totalFavouritesByUse'] = 0;
            $data['totalFavouritesByProduct'] = 0;
        }

        $shape_in_url = $this->uri->segment(2);
        if (!isset($data['details']['CategoryID']) and $data['details']['CategoryID'] == '') {
            $this->get_nearest_category($catid);
        } else if (isset($shape_in_url) and strtolower($data['details']['Shape']) != strtolower($shape_in_url)) {
            $url = $this->uri->segment(1);
            $diecode = $this->uri->segment(3);
            $product = '';
            if (isset($productid) and $productid != '') {
                $product = '?productid=' . $productid;
            }
            $link = base_url() . $url . '/' . strtolower($data['details']['Shape']) . '/' . $diecode . $product;
            header("HTTP/1.1 302 Found");
            header("Location:" . $link);
            exit();
        }

        $data['regmark'] = $regmark;
        $SID = $this->shopping_model->sessionid();
        $items_array = array('SessionID' => $SID, 'status' => 'temp');
        $this->db->delete('integrated_attachments', $items_array);
        $this->load->View('page', $data);
    }

    // AA20 STARTS
    function getProductsAGainstCoreSize()
    {
        $catid = $catid . $core;
        $productsCondition .= " Activate = 'Y' AND CategoryID ='$catid' ";
        $data['products'] = $this->home_model->getProducts($productsCondition);
    }
    // AA20 ENDS

    function get_nearest_category($catid)
    {
        $link = '';
        $query = $this->db->query("select count(*) as total,CategoryID,Shape,CategoryName,Width from category where CategoryID = '$catid' LIMIT 1");
        $row = $query->row_array();

        if ($row['total'] == 1) {

            if (preg_match("/Roll/", $row['CategoryName'])) {
                $url = 'roll-labels';
                $condition = 'Roll';
            } else if (preg_match("/SRA3/", $row['CategoryName'])) {
                $url = 'sra3-sheets';
                $condition = 'SRA3';
            } else if (preg_match("/A5/", $row['CategoryName'])) {
                $url = 'a5-sheets';
                $condition = 'A5';
            } else if (preg_match("/A3/", $row['CategoryName'])) {
                $url = 'a3-sheets';
                $condition = 'A3';
            } else {
                $url = 'a4-sheets';
                $condition = 'A4';
            }

            $shape = $row['Shape'];
            $query = $this->db->query("select CategoryID from category WHERE Shape LIKE '" . $row['Shape'] . "' 
				AND Width > " . ($row['Width'] - 100) . " AND  Width < " . ($row['Width'] + 100) . " AND  CategoryName LIKE '%" . $condition . "%' 
				AND CategoryActive='Y' ORDER BY Width ASC  LIMIT 1");
            $row = $query->row_array();

            if (isset($row['CategoryID']) and $row['CategoryID'] != '') {
                $link = base_url() . $url . '/' . strtolower($shape) . '/' . strtolower($row['CategoryID']) . '/';
            }
        }
        if ($link == '') {
            // $link = $_SERVER["PHP_SELF"];
            $type = $this->uri->segment(1);
            $shape = $this->uri->segment(2);
            if (isset($type) and $type != '' and isset($shape) and $shape != '') {
                $link = $type . '/' . $shape;
            } else if (isset($type)) {
                $link = $type;
            }
            $link = base_url() . $link . '/';

        }
        redirect($link, 'location', 302);
    }


    function jarlabels()
    {
        $page = "";
        $url = uri_string();
        if (preg_match('/polyester-labels/', $url)) {
            $data['heading'] = 'Polyester Labels for Laser & Inkjet Printers';
            $catid = 'T12';
            $word = 'Polyester';
            $page = "polyester-jar.php";
        } elseif (preg_match('/jam-jar-labels/', $url)) {
            $page = "jam-jar.php";
            $catid = 'T8';
            $word = 'Jam Jar';
            $data['heading'] = 'Blank Jam Jar Labels for Jam & Chutney Jars';
        } elseif (preg_match('/herb-spice-jar-labels/', $url)) {
            $page = "spices-jar.php";
            $catid = 'T9';
            $word = 'Spice Jar';
            $data['heading'] = 'Blank Sticky Labels for Spice & Herb Jars';
        } elseif (preg_match('/sweet-jar-labels/', $url)) {
            $page = "sweet-jar.php";
            $catid = 'T10';
            $word = 'Sweet Jar';
            $data['heading'] = 'Blank Sweet Jar Labels';
        } elseif (preg_match('/honey-jar-labels/', $url)) {
            $page = "hony-jar.php";
            $catid = 'T11';
            $word = 'Honey Jar';
            $data['heading'] = 'Blank Honey Jar Labels';
        }

        $data['word'] = $word;
        $data['catid'] = $catid;
        $data['content_page'] = $page;
        if ($word == 'Polyester') {
            $condition = " p.ColourMaterial_upd = 'Polyester' AND p.Activate = 'Y' AND p.ProductBrand LIKE 'A4 Labels' AND CategoryActive='Y'";
            $data['records'] = $this->home_model->fetch_dies_data($condition, '', 'limit 100');
        } else {
            $rel_cat_string = $this->product_model->jars_products($catid);
            $condition = " c.CategoryID IN(" . $rel_cat_string . ") AND p.ProductBrand LIKE 'A4 Labels' AND CategoryActive='Y'";
            $data['records'] = $this->home_model->fetch_dies_data($condition);
        }

        $data['main_content'] = 'category/jarslabels.php';
        $this->load->View('page', $data);

    }

    function labelfinder()
    {
        $category = $shape = $color = $diameter = $width = $height = '';
        $category = $this->input->get('category');
        $shape = $this->input->get('shape');
        $color = $this->input->get('color');
        $diameter = $this->input->get('diameter');
        $width = $this->input->get('width');
        $height = $this->input->get('height');

        $data['category'] = $category;
        $data['shape'] = $shape;
        $data['color'] = $color;
        $data['height'] = $height;
        $data['width'] = $width;
        $data['diameter'] = $diameter;

        $condtion = "c.CategoryActive = 'Y' AND c.Shape != ''";
        $groupby = '';
        $brand = '';
        if (isset($category) and $category != '') {

            $brand = $this->home_model->make_productBrand_condtion($category);

            if ($category == 'Roll') {
                $groupby = " Group By LEFT( p.ManufactureID, CHAR_LENGTH( p.ManufactureID ) -1 ) ";
            }
        }
        $condtion = " c.CategoryActive = 'Y' AND p.ProductBrand LIKE '" . $brand . "' ";

        if (isset($category)) {
            $data['count'] = 0;
        } else {
            $data['count'] = $this->home_model->labelfinder_counter($condtion, $groupby);
        }

        $data['main_content'] = 'labelfinder/labelsfinder';
        $this->load->View('page', $data);

    }

    function searchby_printer()
    {

        $data['printer'] = $this->home_model->get_printer();
        $model_option = '';
        $make = '';
        $model = '';
        $make_option = '';
        $width = '';
        $shape = '';
//		$make_sel = $this->input->get('make');
        $make_sel = filter_var($this->input->get('make'), FILTER_SANITIZE_STRING);

        $model_sel = filter_var(urldecode($this->input->get('model')),FILTER_SANITIZE_STRING);
        $shape = urldecode($this->input->get('shape'));
        foreach ($data['printer'] as $row) {
            $seleted = '';
            if (strtolower($make_sel) == strtolower($row->ManufacturerCode)) {
                $seleted = 'selected="selected"';
            }
            $make_option .= '<option ' . $seleted . ' value="' . urlencode($row->ManufacturerCode) . '" >' . $row->Name . '</option>';
        }


        if (isset($make_sel) and $make_sel != '') {
            $model = $this->home_model->get_printer_model($make_sel);

            foreach ($model as $row) {
                $seleted = '';
                if (strtolower($model_sel) == strtolower($row->model)) {
                    $seleted = 'selected="selected"';
                }
                $model_option .= '<option ' . $seleted . ' value="' . urlencode($row->model) . '" >' . $row->Name . '</option>';
            }

        }
        if (isset($model_sel) and $model_sel != '') {

            $query = $this->db->query("SELECT * FROM `printers_model` WHERE model LIKE '" . $model_sel . "'");
            $row = $query->row_array();
            $width = $row['PrintWidth'];
            if (!isset($row['PrintWidth']) and $row['PrintWidth'] == '') {
                $condition = " p.ProductBrand LIKE 'Roll Labels' AND c.CategoryActive='Y' AND 1=0";
            } else {
                $condition = " p.ProductBrand LIKE 'Roll Labels' AND c.CategoryActive='Y' AND c.Width <= $width";

            }


            $data['records'] = $this->home_model->fetch_dies_data($condition);
            $data['printer_model'] = $row;
        }


        $data['shape'] = $shape;
        $data['printer_width'] = $width;
        $data['make_list'] = $model;
        $data['model_option'] = $model_option;
        $data['make_option'] = $make_option;

        $data['main_content'] = 'roll_printer/search_by_printer';
        $this->load->view('page', $data);

    }

    function integrated($cat = NULL, $compatible = NULL)
    {
        if ($compatible == 'yes') {
            $cat = str_replace("-", " ", $cat);
            $qry = "select SubCategoryID,CategoryName,CategoryImage,CategoryID,Shape from category 
			where CategoryName LIKE '%" . $cat . "%' LIMIT 1";

        } else {
            $qry = "select SubCategoryID,CategoryName,CategoryID,CategoryImage,Shape from category where CategoryID LIKE '" . $cat . "' LIMIT 1";
            $compatible = '';

        }
        $query = $this->db->query($qry);
        $row = $query->row_array();
        //echo"<pre>";print_r($row);echo"</pre>";exit;
        if (isset($row['SubCategoryID']) and $row['SubCategoryID'] != '') {
            $releted_arr = explode(",", $row['SubCategoryID']);
            $rel_prd_string = "'" . implode("','", $releted_arr) . "'";
            $condition = " p.CategoryID IN (" . $rel_prd_string . ") AND CategoryActive='Y'";
            if ($cat == 'T813') {
                $condition = " p.CategoryID IN (" . $rel_prd_string . ") ";
            }
        } else {
            $condition = " p.ProductBrand LIKE 'Integrated Labels' AND CategoryActive='Y' AND c.Shape NOT LIKE 'Full Sheet Integrated' ";
            $condition1 = " p.ProductBrand LIKE 'Integrated Labels' AND c.Shape LIKE 'Full Sheet Integrated' ";
            $data['fullsheet'] = $this->home_model->fetch_dies_data($condition1);

        }
        $data['compatible_list'] = $this->home_model->integrated_comaptible_list();
        $data['print_sheets'] = $this->home_model->fetch_print_sheets();
        $data['compatible'] = $compatible;
        $data['catdata'] = $row;


        if ($cat == 'T813') {
            $fqry2 = $this->db->query("SELECT c.CategoryID,c.specification1,c.specification2,c.specification3,c.pdfFile,c.wordFile,
				c.CategoryName,c.CategoryImage,c.LabelWidth,c.LabelHeight,c.Shape,p.ProductName,p.ManufactureID,
				p.ProductID,p.SpecText7,p.ProductBrand FROM category c , products p 
				WHERE SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID AND " . $condition . " 
				GROUP BY c.CategoryID Order by LabelsPerSheet,p.ManufactureID ASC ");
            $data['integrate'] = array('num_row' => $fqry2->num_rows(), 'list' => $fqry2->result());
        } else {
            $data['integrate'] = $this->home_model->fetch_dies_data($condition);
        }


        $data['fullsheet_integrated'] = '';
        if ($cat != 'T813') {
            $wheree = " and CategoryID != 'T813'";
        }
        $other_condition = "SELECT SubCategoryID FROM `category` WHERE `CategoryDescription` LIKE 'Integrated Labels' AND CategoryID != '$cat' $wheree";
        $query = $this->db->query($other_condition);

        $subcategories = '';

        foreach ($query->result() as $res) {
            $subcategories .= $res->SubCategoryID . ",";
        }
        $releted_arr = explode(",", $subcategories);
        $rel_prd_string = "'" . implode("','", $releted_arr) . "'";
        $condition = " p.CategoryID IN (" . $rel_prd_string . ") AND CategoryActive='Y'";
        if ($cat == '') {
            $data['other'] = '';
        } else {
            $data['other'] = $this->home_model->fetch_dies_data($condition);
        }
        if ($cat != 'T813') {
            $fullsheet_condition = "SELECT SubCategoryID FROM `category` WHERE `CategoryDescription` LIKE 'Integrated Labels' AND CategoryID = 'T813'";
            $query = $this->db->query($fullsheet_condition);

            $subcategories = '';
            foreach ($query->result() as $res) {
                $subcategories .= $res->SubCategoryID . ",";
            }
            $releted_arr = explode(",", $subcategories);
            $rel_prd_string = "'" . implode("','", $releted_arr) . "'";
            $condition = " p.CategoryID IN (" . $rel_prd_string . ") ";
            //$data['fullsheet_integrated'] = $this->home_model->fetch_dies_data($condition);

            $fqry2 = $this->db->query("SELECT c.CategoryID,c.specification1,c.specification2,c.specification3,c.pdfFile,c.wordFile,
				c.CategoryName,c.CategoryImage,c.LabelWidth,c.LabelHeight,c.Shape,p.ProductName,p.ManufactureID,
				p.ProductID,p.SpecText7,p.ProductBrand FROM category c , products p 
				WHERE SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID AND " . $condition . " 
				GROUP BY c.CategoryID Order by LabelsPerSheet,p.ManufactureID ASC ");
            $data['fullsheet_integrated'] = array('num_row' => $fqry2->num_rows(), 'list' => $fqry2->result());


        }

        $data['main_content'] = 'category/integrated';
        $this->load->view('page', $data);
    }

    function integrated_detail($cat)
    {
        
        if($cat=="t1005"){
        	header( "HTTP/1.1 410 Gone" );
            header("Location:https://www.aalabels.com/integrated-labels/");    
        }
         
        $query = $this->db->query("select CategoryName as name,CategoryImage as image from category where SubCategoryID LIKE '%" . $cat . "%' 
		AND CategoryActive LIKE 'Y' AND `specification3` = 'Integrated'  LIMIT 5");
        $result = $query->result();

        $comaptible = '';
        if (count($result) > 0) {
            foreach ($result as $row) {
                //$comaptible.='<img width="84" height="auto" src="'.Assets.'images/icons/'.$row->image.'" title="'.$row->image.'" alt="'.$row->image.'">';
                $comaptible .= '<img src="' . Assets . 'images/icons/' . $row->image . '" title="' . $row->image . '" alt="' . $row->image . '">';
            }
        }
        $data['compatible_list'] = $this->home_model->integrated_comaptible_list();
        $data['comaptible'] = $comaptible;
        $data['integrate'] = $this->home_model->for_integrate($cat);
        $manufactureID = $data['integrate'][0]->ManufactureID;

        $query = $this->db->query("select *,Box_1000 as Box from integrated_labels_prices where ManufactureID LIKE '" . $manufactureID . "' and Price_1000 != '0'");
        $integrated_prices = $query->result();
        $data['batch'] = 1000;
        $data['integrated_prices'] = $integrated_prices;
        $data['main_content'] = 'category/integrated_list';
        $this->load->view('page', $data);
    }

    function printing()
    {
        if ($_POST) {
            $captcha = $this->input->post('captcha');
            if (empty($_SESSION['captcha']) || trim(strtolower($captcha)) != $_SESSION['captcha']) {
                $data['class'] = 'danger';
                $data['msg'] = 'Invalid captcha, please try again !';
            } else {
                $response = $this->product_model->save_print_request();
                $data['class'] = $response['class'];
                $data['msg'] = $response['msg'];
            }
        }
        $data['main_content'] = 'printing/printing_labels';
        $this->load->view('page', $data);
    }

    function customlabels()
    {

        $data['main_content'] = 'printing/custom_labels';
        if ($_POST) {

            $captcha = $this->input->post('captcha');
            if (empty($_SESSION['captcha']) || trim(strtolower($captcha)) != $_SESSION['captcha']) {
                $data['class'] = 'danger';
                $data['msg'] = 'Invalid captcha, please try again !';
            } else {
                $response = $this->product_model->save_custom_request();
                $data['class'] = $response['class'];
                $data['msg'] = $response['msg'];
                $data['main_content'] = 'printing/custom_thanks';
                $page = $this->input->post('page');
                if (isset($page) and $page == "wtdp") {
                    $array = array('response' => 'done');
                    echo json_encode($array);
                    exit;
                }
            }
        }

        $this->load->view('page', $data);
    }

    function faq()
    {
        $data['main_content'] = 'static/faq';
        $this->load->view('page', $data);
    }

    function delivery()
    {
        $data['main_content'] = 'static/delivery';
        $this->load->view('page', $data);
    }

    function contactus()
    {
        if ($_POST) {

            $captcha = $this->input->post('captcha');
            if (empty($_SESSION['captcha']) || trim(strtolower($captcha)) != $_SESSION['captcha']) {
                $data['class'] = 'danger ';
                $data['msg'] = '<p class="m-l-10">Invalid captcha, please try again !</p>';
            } else {
                $countrucodelist = $this->home_model->allow_countries();
                $country = $this->session->userdata('visitor_country');
                if (isset($country) and in_array(strtoupper($country), $countrucodelist)) {
                    $company = '';
                    $company = $this->input->post('company');
                    if ($company != 'google') {
                        $response = $this->product_model->save_contactus_request();
                        $data['class'] = $response['class'];
                        $data['msg'] = $response['msg'];
                    }
                }

            }
        }
        $query = $this->db->query("SELECT * FROM `batch_material`");
        $data['material_list'] = $query->result();
        $data['main_content'] = 'static/contact';
        $this->load->view('page', $data);
    }

    function aboutus()
    {
        $data['main_content'] = 'static/about_us';
        $this->load->view('page', $data);
    }

    function customer_care()
    {
        $data['main_content'] = 'static/customer-care';
        $this->load->view('page', $data);
    }

    function newsletter()
    {
        if ($_POST) {

            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email');
            if ($this->form_validation->run() == false) {
                $data['msg'] = validation_errors();
                $data['class'] = 'danger';

            } else {

                $email = $this->input->post('email');
                $this->db->like('email', $email);
                $this->db->from('email_addresses');
                $count = $this->db->count_all_results();
                if ($count != 0) {
                    $qry = $this->db->delete('email_addresses', array('email' => $email));
                    $data['msg'] = " Your email address Unsubscribed form our newsletter subscription list successfully!";
                    $data['class'] = 'success';
                } else {
                    $data['msg'] = " This email address already Unsubscribed form our newsletter subscription list!";
                    $data['class'] = 'danger';
                }
            }
        }
        $data['main_content'] = 'static/newsletter';
        $this->load->view('page', $data);
    }

    function sitemap()
    {
        $data['main_content'] = 'static/sitemap';
        $this->load->view('page', $data);
    }

    function termsConditions()
    {
        $data['main_content'] = 'static/terms';
        $this->load->view('page', $data);
    }

    function testimonial()
    {

        $this->load->helper('pagination_custom');
        $url = 'testmonialdetail.php?';
        $query = " select * from testimonials where site like 'en' order by date desc";
        $pagination = make_pagination_query($query, $url, '', 'yes');

        $data['links'] = $pagination['links'];
        $data['totalrecord'] = $pagination['totalrecord'];
        $data['testimonials'] = $pagination['result'];

        $data['main_content'] = 'static/testimonials';
        $this->load->view('page', $data);
    }

    function applicationlabelsoldone()
    {
        $data['main_content'] = 'static/application';
        $this->load->view('page', $data);
    }


    function questionaire()
    {
        error_reporting(E_ALL);
        if ($_POST) {

            $busness_other = '';
            $application = $this->input->post('application_array');
            $application = implode(",", $application);
            $bussinsess = $this->input->post('sub_busness_type');
            if ($bussinsess == 'other') {
                $busness_other = $this->input->post('busness_other');
            }
            $print_labels = $this->input->post('print_labels_btn');
            $third_party = $this->input->post('third_party_btn1');
            $product_type = $this->input->post('product_type');
            $matt_type = $this->input->post('sub_mat_type');
            $matr_type = $this->input->post('matr_type');
            $date = time();
            $reason_other = $this->input->post('reason_other');
            $busness_other = $this->input->post('busness_other');
            $rating_val = $this->input->post('rating_val');
            $rating_val = implode(",", $rating_val);
            $sub_fin_col = $this->input->post('sub_fin_col');

            $otherapplication = $this->input->post('other_app');
            if (isset($otherapplication) && $otherapplication != "") {
                $otherapplication = $otherapplication;
            } else {
                $otherapplication = '';
            }


            $data_array = array('bussiness_type' => $bussinsess,
                'application' => $application,
                'print_labels_btn' => $print_labels,
                'third_party_btn' => $third_party,
                'product_type' => $product_type,
                'sub_mat' => $matt_type,
                'matr_type' => $matr_type,
                'date' => $date,
                'busness_other' => $busness_other,
                'sub_finish_col' => $sub_fin_col,
                'rating_val' => $rating_val,
                'reason_other' => $reason_other,
                'otherapplication' => $otherapplication
            );
            /********************  Update file ***********************/
            $usrid = $this->session->userdata('userid');
            if (isset($usrid) and $usrid != '') {

                $query = $this->db->query(" select * from customers WHERE UserID LIKE '" . $usrid . "'");
                $row = $query->row_array();

                $customer_data = array('company_name' => $row['BillingCompanyName'],
                    'telephone' => $row['BillingTelephone'],
                    'name' => $row['BillingFirstName'] . ' ' . $row['BillingLastName'],
                    'email' => $row['UserEmail']);
                $data_array = array_merge($data_array, $customer_data);
            }

            /********************  Update file ***********************/


            $this->db->insert('questionare_form', $data_array);
            $id = $this->db->insert_id();
            if ($id) {

                $this->session->set_userdata('feedback', 'Yes');
                redirect(base_url());

            }

        }

        $query = $this->db->query("SELECT * FROM `bussines_type` Where parent LIKE 'Yes' ");
        $data['bussnes_type'] = $query->result();

        $appquery = $this->db->query("SELECT * FROM `application_type` where Parent = 0 order by Type ASC  ");
        $data['application_type'] = $appquery->result();


        $materials = $this->db->query("SELECT * FROM `materials_type` Where parent LIKE 'Yes'");
        $data['matt_type'] = $materials->result();

        $fin_col = $this->db->query("SELECT * FROM `materials_type` Where parent LIKE 'Y'");
        $data['fin_col'] = $fin_col->result();

        $chosing_type = $this->db->query("SELECT * FROM `chosing_type`");
        $data['chosing_type'] = $chosing_type->result();


        $data['main_content'] = 'static/customer_feedback';
        $this->load->view('page', $data);
    }


    function my404()
    {
        $this->output->set_status_header('404');
        $data['main_content'] = 'static/page_404';
        $this->load->view('page', $data);
    }

    function material_info()
    {
        $data['main_content'] = 'static/material';
        $this->load->view('page', $data);
    }

    function email_note()
    {
        $data['main_content'] = 'static/emailnote';
        $this->load->view('page', $data);
    }

    function promotions()
    {
        $data['main_content'] = 'static/promotions';
        $this->load->view('page', $data);
    }

    function test_password()
    {
        $data['main_content'] = 'user/newPassword';

//        $data['main_content']='static/test_password';
        $this->load->view('page', $data);
    }

    function christmas()
    {

        $data['address'] = $this->product_model->get_xmass_products('Address');
        $data['packaging1'] = $this->product_model->get_xmass_products('Packaging', 'Heart');
        $data['packaging2'] = $this->product_model->get_xmass_products('Packaging', 'Circular');
        $data['delivery'] = $this->product_model->get_xmass_products('Delivery');


        $address_list = $this->product_model->get_xmass_design('Address');
        $data['address_opt'] = $this->home_model->make_html_option($address_list, 'name', 'Select Design', '');

        $Heart_list = $this->product_model->get_xmass_design('Heart');
        $data['heart_opt'] = $this->home_model->make_html_option($Heart_list, 'name', 'Select Design', '');

        $Packaging_list = $this->product_model->get_xmass_design('Packaging');
        $data['packaging_opt'] = $this->home_model->make_html_option($Packaging_list, 'name', 'Select Design', '');


        $delivery_list = $this->product_model->get_xmass_design('Delivery');
        $data['delivery_list'] = $this->home_model->make_html_option($delivery_list, 'name', 'Select Design', '');


        $data['main_content'] = 'static/christmas/christmas';
        $this->load->view('page', $data);
    }

    /************** Voucher code implmentations**********************/
    function vouchercode($userid = NULL)
    {

        $time = time();
        if (isset($userid) and $userid != '') {

            $str1 = 'nasdhasdkjkfsldkfsdkflskdfllkdfsasd2D2D2D';
            $str2 = 'nasdhasdkj56554kkjdkakflskdfllkdfsasd2D2D2D';
            $userid = str_replace($str1, '', $userid);
            $userid = str_replace($str2, '', $userid);
            $query = $this->db->query("SELECT * FROM `tbl_first_order_offer` WHERE  UserID LIKE '" . $userid . "' ");
            $row = $query->row_array();
            $expiry = $row['SendingDate'] + (60 * 60 * 24 * 89);
            if (isset($row['SendingDate']) and $time < $expiry) {

                if ($row['Used'] == 0) {
                    $this->session->set_userdata('valid_voucher', 'yes');
                    $this->session->set_userdata('userid', $row['UserID']);
                    $this->session->set_userdata('UserName', $row['Name']);
                    $this->session->set_userdata('logged_in', true);
                    $this->session->set_userdata('voucherCode', 'AAVCS05');
                    $msg = "congrat";
                    $this->session->set_userdata('voucher_msg', $msg);

                } else {

                    $msg = "You have already used this voucher code";
                    $this->session->set_userdata('voucher_msg', $msg);

                }

            } else {
                $msg = "Sorry this link has beed expired";
                $this->session->set_userdata('voucher_msg', $msg);

            }
        }
        redirect(base_url());
    }


    function send_voucher_customer($userid)
    {


        $query = "SELECT * FROM `tbl_first_order_offer` Where UserID =$userid AND Used = '0' 
			AND type LIKE 'first_order' ORDER BY `ID` DESC LIMIT 1 ";


        $result = $this->db->query($query);
        $row = $result->result();
        $count = count($row);
        if ($count > 0) {

            $config = array('protocol' => 'smtp', 'smtp_host' => 'inkpraa4.memset.net', 'smtp_port' => 465, 'smtp_crypto' => 'ssl',
                'smtp_user' => 'newsletter@aalabels.com', 'smtp_pass' => 'lg*r!{!?#q6t',
                'mailtype' => 'html', 'charset' => 'iso-8859-1');


            $email_row = $this->db->query("Select * from " . Template_Table . " where MailID =111");
            $email_row = $email_row->row_array();
            $html = $email_row['MailBody'];
            $MailSubject = $email_row['MailSubject'];
            $MailFrom = $email_row['MailFrom'];

            $strINTemplate = array("[FirstName]", "[VoucherLink]");
            $this->load->library('email', $config);
            $this->email->from($MailFrom, 'AALABELS');
            $this->email->set_mailtype("html");
            $this->email->subject($MailSubject);

            $i = 0;
            $userids = '';

            foreach ($row as $list) {
                $link = '';
                $link = "redeem-voucher-code-aalabels-nasdhasdkjkfsldkfsdkflskdfllkdfsasd2D2D2D" . $list->UserID . "nasdhasdkj56554kkjdkakflskdfllkdfsasd2D2D2D";
                $link = base_url() . $link;
                $strInDB = array($list->Name, $link);
                $newPhrase = str_replace($strINTemplate, $strInDB, $html);
                //$this->email->cc('arslan.jd@gmail.com');
                 $this->email->cc('umair.aalabels@gmail.com');
                $this->email->to($list->Email);
                $this->email->message($newPhrase);
                $this->email->send();
                $userids .= $list->UserID . ", ";
                $i++;
            }
            $array_sent = array('UserIDs' => $userids, 'Date' => time(), 'Count' => $i);
            $this->db->insert('daily_vouchersent_log', $array_sent);

        }

    }

    function send_daily_voucher()
    {
        $date = date("d-m-Y", time());
        $query = "SELECT * FROM `tbl_first_order_offer` Where FROM_UNIXTIME( `SendingDate` , '%d-%m-%Y' ) LIKE '" . $date . "' AND Used = '0' 
			AND type LIKE 'first_order' ORDER BY `ID` DESC LIMIT 50 ";

        /*
			$query = "SELECT * FROM `tbl_first_order_offer` Where UserID =643778 AND Used = '0'
			AND type LIKE 'first_order' ORDER BY `ID` DESC LIMIT 1 ";  */


        $result = $this->db->query($query);
        $row = $result->result();
        $count = count($row);
        if ($count > 0) {

            $config = array('protocol' => 'smtp', 'smtp_host' => 'aalabels.com', 'smtp_port' => 465, 'smtp_crypto' => 'ssl',
                'smtp_user' => 'newsletter@aalabels.com', 'smtp_pass' => 'lg*r!{!?#q6t',
                'mailtype' => 'html', 'charset' => 'iso-8859-1');


            $email_row = $this->db->query("Select * from " . Template_Table . " where MailID =111");
            $email_row = $email_row->row_array();
            $html = $email_row['MailBody'];
            $MailSubject = $email_row['MailSubject'];
            $MailFrom = $email_row['MailFrom'];

            $strINTemplate = array("[FirstName]", "[VoucherLink]");
            $this->load->library('email', $config);
            $this->email->from($MailFrom, 'AALABELS');
            $this->email->set_mailtype("html");
            $this->email->subject($MailSubject);

            $i = 0;
            $userids = '';

            foreach ($row as $list) {
                $link = '';
                $link = "redeem-voucher-code-aalabels-nasdhasdkjkfsldkfsdkflskdfllkdfsasd2D2D2D" . $list->UserID . "nasdhasdkj56554kkjdkakflskdfllkdfsasd2D2D2D";
                $link = base_url() . $link;
                $strInDB = array($list->Name, $link);
                $newPhrase = str_replace($strINTemplate, $strInDB, $html);
                //$this->email->cc('arslan.jd@gmail.com');
                $this->email->to($list->Email);
                $this->email->message($newPhrase);
                $this->email->send();
                $userids .= $list->UserID . ", ";
                $i++;
            }
            $array_sent = array('UserIDs' => $userids, 'Date' => time(), 'Count' => $i);
            $this->db->insert('daily_vouchersent_log', $array_sent);

        }

    }


    function signup_newsletter()
    {

        if ($_POST) {

            $email = $this->input->post('email');
            $response = $this->home_model->newsletter($email);
            if ($response) {

                $first_order_offer = $this->db->query("Select  count(UserID) as count from tbl_first_order_offer WHERE Email LIKE '" . $email . "'");
                $first_order_offer = $first_order_offer->row_array();
                if (isset($first_order_offer['count']) and $first_order_offer['count'] == 0) {
                    $customer = $this->db->query("Select UserID,BillingFirstName from customers WHERE UserEmail LIKE '" . $email . "'");
                    $customer = $customer->row_array();

                    if (isset($customer['UserID']) and $customer['UserID'] != 0) {
                        if ($customer['BillingFirstName'] != '' and $customer['BillingFirstName'] != 0) {
                            $fname = $customer['BillingFirstName'];
                        } else {
                            $fname = ' Customer ';
                        }

                        $item_array = array('UserID' => $customer['UserID'],
                            'Email' => $email,
                            'Date' => time(),
                            'SendingDate' => time(),
                            'Name' => $fname
                        );
                        $this->db->insert('tbl_first_order_offer', $item_array);
                        $id = $this->db->insert_id();
                        if ($id) {
                            $config = array('protocol' => 'smtp', 'smtp_host' => 'inkpraa4.memset.net', 'smtp_port' => 465, 'smtp_crypto' => 'ssl',
                                'smtp_user' => 'newsletter@aalabels.com', 'smtp_pass' => 'lg*r!{!?#q6t',
                                'mailtype' => 'html', 'charset' => 'iso-8859-1');

                            $email_row = $this->db->query("Select * from " . Template_Table . " where MailID =124");
                            $email_row = $email_row->row_array();
                            $html = $email_row['MailBody'];
                            $MailSubject = $email_row['MailSubject'];
                            $MailFrom = $email_row['MailFrom'];

                            $strINTemplate = array("[FirstName]", "[VoucherLink]");
                            $this->load->library('email', $config);
                            $this->email->from($MailFrom, 'AALABELS');
                            $this->email->set_mailtype("html");
                            $this->email->subject($MailSubject);
                            $link = "redeem-voucher-code-aalabels-nasdhasdkjkfsldkfsdkflskdfllkdfsasd2D2D2D" . $customer['UserID'] . "nasdhasdkj56554kkjdkakflskdfllkdfsasd2D2D2D";
                            $link = base_url() . $link;
                            $strInDB = array($fname, $link);
                            $newPhrase = str_replace($strINTemplate, $strInDB, $html);

                            $this->email->to($email);
                            $this->email->message($newPhrase);
                            $this->email->send();
                            $array_sent = array('UserIDs' => $customer['UserID'], 'Date' => time(), 'Count' => 1);
                            $this->db->insert('daily_vouchersent_log', $array_sent);
                        }
                    }
                }
            }
        }
        echo "aalabels";
    }

    /************** Voucher code implmentations**********************/
    function get_shape_for_printing()
    {

        $type = $this->input->post('catt_type');
        if ($type == 'Labels on Roll') {

            $query = "SELECT c.Shape_upd FROM products p, category c WHERE SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID AND c.CategoryActive = 'Y' 
			AND c.Shape_upd != '' AND p.Price != '' AND p.ProductBrand LIKE 'Roll labels' GROUP BY c.Shape_upd ORDER BY c.Shape_upd ASC";

        } else if ($type == 'Labels on SRA3 Sheets') {

            $query = "SELECT c.Shape_upd FROM products p, category c WHERE c.CategoryID = p.CategoryID AND c.CategoryActive = 'Y' AND c.Shape_upd != ''
						  AND  p.Activate = 'Y'  AND p.Price != '' AND p.ProductBrand LIKE 'SRA3 Label' GROUP BY c.Shape_upd ORDER BY c.Shape_upd ASC";
        } else if ($type == 'Labels on A5 Sheet') {

            $query = "SELECT c.Shape_upd FROM products p, category c WHERE c.CategoryID = p.CategoryID AND c.CategoryActive = 'Y' AND 
						 c.Shape_upd != '' AND  p.Activate = 'Y'  AND p.Price != '' AND p.ProductBrand LIKE 'A5 Labels' GROUP BY c.Shape_upd ORDER BY c.Shape_upd ASC";
        } else if ($type == 'Labels on A3 Sheet') {

            $query = "SELECT c.Shape_upd FROM products p, category c WHERE c.CategoryID = p.CategoryID AND c.CategoryActive = 'Y' AND 
						 c.Shape_upd != '' AND  p.Activate = 'Y'  AND p.Price != '' AND p.ProductBrand LIKE 'A3 Label' GROUP BY c.Shape_upd ORDER BY c.Shape_upd ASC";
        } else {
            $query = "SELECT c.Shape_upd FROM products p, category c WHERE c.CategoryID = p.CategoryID AND c.CategoryActive = 'Y' AND c.Shape_upd != '' 
					  AND ( p.Activate = 'Y' OR p.Activate = 'y' ) AND p.Price != '' AND ( p.ProductBrand NOT LIKE 'SRA3 Label' AND p.ProductBrand NOT LIKE 'A3 Label'
					  AND p.ProductBrand NOT LIKE 'A5 Labels' AND p.ProductBrand NOT LIKE 'Roll labels' ) GROUP BY c.Shape_upd ORDER BY c.Shape_upd ASC";

        }

        $shape = $this->db->query($query);
        $result = $shape->result();
        $option = '<option id="sel_shape" value="" >Select Shape</option>';
        foreach ($result as $row) {
            $option .= '<option value="' . $row->Shape_upd . '" >' . $row->Shape_upd . '</option>';
        }
        echo $option;

    }

    function materail_for_custom()
    {
        $type = $this->input->post('catt_type');
        $shape = $this->input->post('shape');
        if ($type == 'Labels on Roll') {

            $query = "SELECT DISTINCT (ProductName) AS name from products WHERE ProductName!='' AND ( Activate = 'Y' OR Activate = 'y' ) 
			AND ProductBrand LIKE 'Roll labels' AND Shape_upd LIKE '" . $shape . "' GROUP BY ProductName ORDER BY ProductName ASC";

        } else if ($type == 'Labels on SRA3 Sheets') {

            $query = "SELECT DISTINCT (ProductName) AS name from products WHERE ProductName!='' AND ( Activate = 'Y' OR Activate = 'y' ) 
				   AND ProductBrand LIKE 'SRA3 Label' AND Shape_upd LIKE '" . $shape . "' GROUP BY ProductName ORDER BY ProductName ASC";
        } else if ($type == 'Labels on A5 Sheet') {
            $query = "SELECT DISTINCT (ProductName) AS name from products WHERE ProductName!='' AND ( Activate = 'Y' OR Activate = 'y' ) 
				 AND ProductBrand LIKE 'A5 Labels' AND Shape_upd LIKE '" . $shape . "' GROUP BY ProductName ORDER BY ProductName ASC";
        } else if ($type == 'Labels on A3 Sheet') {
            $query = "SELECT DISTINCT (ProductName) AS name from products WHERE ProductName!='' AND ( Activate = 'Y' OR Activate = 'y' ) 
				 AND ProductBrand LIKE 'A3 Label' AND Shape_upd LIKE '" . $shape . "' GROUP BY ProductName ORDER BY ProductName ASC";
        } else {
            $query = "SELECT DISTINCT (ProductName) AS name from products WHERE ProductName!='' AND ( Activate = 'Y' OR Activate = 'y' ) AND  
			   ( ProductBrand NOT LIKE 'SRA3 Label' AND ProductBrand NOT LIKE 'A5 Labels' AND ProductBrand NOT LIKE 'A3 Label' AND ProductBrand NOT LIKE 'Roll labels' ) 
			    AND Shape_upd LIKE '" . $shape . "' GROUP BY ProductName ORDER BY ProductName ASC";
        }

        $shape = $this->db->query($query);
        $result = $shape->result();
        $option = '<option value="" >Select Material </option>';
        foreach ($result as $row) {
            $option .= '<option value="' . str_replace("&#39;", "", $row->name) . '" >' . str_replace("&#39;", "", $row->name) . '</option>';
        }
        echo $option;
    }

    function labeldesigner($project_id = NULL, $temp_id = NULL)
    {   //die($temp_id);
        //die($project_id);
        $category = $shape = $color = $diameter = $width = $height = '';
        $data = array();

        if ($project_id == 'shape') {
            $data['category'] = $category;
            $data['shape'] = $shape;
            $data['color'] = $color;
            $data['height'] = $height;
            $data['width'] = $width;
            $data['diameter'] = $diameter;
        } else {


            $category = $this->input->get('category');
            $shape = $this->input->get('shape');
            $color = $this->input->get('color');
            $diameter = $this->input->get('diameter');
            $width = $this->input->get('width');
            $height = $this->input->get('height');

            $data['category'] = $category;
            $data['shape'] = $shape;
            $data['color'] = $color;
            $data['height'] = $height;
            $data['width'] = $width;
            $data['diameter'] = $diameter;
            //print_r($category);die();
            $condtion = "c.CategoryActive = 'Y' AND c.Shape != '' AND c.FlashActive = 'Y'";
            $groupby = '';
            $brand = '';
            if (isset($category) and $category != '') {

                $brand = $this->home_model->make_productBrand_condtion($category);
                if ($category == 'Roll') {
                    $groupby = " Group By LEFT( p.ManufactureID, CHAR_LENGTH( p.ManufactureID ) -1 ) ";
                }
            }

            $condtion = " c.CategoryActive = 'Y' AND p.ProductBrand LIKE '" . $brand . "' AND c.FlashActive = 'Y' ";

            if (isset($category)) {
                $data['count'] = 0;
            } else {
                $data['count'] = $this->home_model->labelfinder_counter($condtion, $groupby);
            }

            if (isset($project_id) && $project_id != "" && $project_id != "designer") {
                $project = $this->home_model->get_user_flash_project($project_id);
                $data['project'] = $project;
                $data['project_id'] = $project_id;
            }

            if (isset($project_id) && $project_id == "designer") {
              //echo   $data['temp_id'] = $temp_id;
                $data['project_id'] = $project_id;
            }

        }


        $data['project_id'] = $project_id;
        $data['main_content'] = 'labeldesigner/labeldesigner';
        $this->load->View('page', $data);

    }


    function design_help()
    {
        $data['main_content'] = 'labeldesigner/help';
        $this->load->View('page', $data);
    }

    function applicationlabels($level = NULL, $name = NULL, $tcode = NULL)
    {

        $data['main_content'] = 'applicationlabels/index';
        $data['page'] = '';
        $data['maincategory'] = '';
        $data['url'] = '';
        $data['colour'] = '';
        $data['breadcrum'] = $this->home_model->get_lba_breadcrumb();

        $url = explode("/", uri_string());
        if (isset($level) and $level == 1) {
            $name = str_replace("-", " ", $name);


            $query = $this->db->query("Select sub_category from application_category WHERE name LIKE '" . $name . "'");
            $row = $query->row_array();
            $data['maincategory'] = $row['sub_category'];
            if (isset($row['sub_category']) and $row['sub_category'] != '') {

                $data['subcatresults'] = $this->home_model->fetch_child_category($row['sub_category']);
                $cateids = '';
                foreach ($data['subcatresults'] as $row) $cateids .= $row->SubCategoryID . ',';
                $cateids = trim($cateids);
                if (isset($tcode) and $tcode != '') {
                    $designcode = substr($tcode, -4);
                    $data['similar'] = $this->home_model->fetch_child_subcategory($cateids, $designcode);
                    //$data['designs'] =  $this->home_model->fetch_category_designs($cateids);
                    $data['designs'] = $this->home_model->fetch_similar_category_designs($tcode, $cateids);
                    $data['url'] = base_url() . $url[1] . '/' . $url[2];
                    $data['details'] = $this->home_model->fetch_category_details($tcode);
                    $data['compitable'] = $this->home_model->avery_equilent($tcode);
                    $condition = " CategoryID ='" . $tcode . "'";
                    $data['colour'] = ($data['details']['FeaturedProducts'] == 1) ? 'yes' : '';
                    $data['materials'] = $this->home_model->ajax_material_sorting($condition);
                    $data['main_content'] = 'applicationlabels/material';
                } else {
                    $data['page'] = 'design';
                    $data['records'] = $this->home_model->fetch_category_designs($cateids);
                    $data['url'] = base_url() . $url[1] . '/' . $url[2];

                }


            }
        } else if (isset($level) and $level == 2) {

            $name = str_replace("-", " ", $name);
            $query = $this->db->query("Select SubCategoryID from category WHERE CategoryName LIKE '" . $name . "' AND  CategoryActive LIKE 'Y' ");
            $row = $query->row_array();
            if (isset($tcode) and $tcode != '') {
                $designcode = substr($tcode, -4);
                $data['similar'] = $this->home_model->fetch_child_subcategory($row['SubCategoryID'], $designcode);
                $data['designs'] = $this->home_model->fetch_category_designs($row['SubCategoryID']);
                $data['url'] = base_url() . $url[1] . '/' . $url[2] . '/' . $url[3];
                $data['details'] = $this->home_model->fetch_category_details($tcode);
                $data['compitable'] = $this->home_model->avery_equilent($tcode);
                $condition = " CategoryID ='" . $tcode . "'";
                $data['materials'] = $this->home_model->ajax_material_sorting($condition);
                $data['main_content'] = 'applicationlabels/material';
            } else if (isset($row['SubCategoryID']) and $row['SubCategoryID'] != '') {
                $data['step2'] = 'appSteps-step-active';
                $data['page'] = 'design';
                $data['url'] = base_url() . $url[1] . '/' . $url[2] . '/' . $url[3];
                $data['records'] = $this->home_model->fetch_category_designs($row['SubCategoryID']);
            }
        }
        $this->load->View('page', $data);
    }

    function print_service()
    {
        //$this->db->query("Delete from temporaryshoppingbasket");
        //$this->db->query("Delete from integrated_attachments");

        //$this->db->query("Delete from temporaryshoppingbasket WHERE SessionID LIKE '%-PRJB%' ");
        //$this->db->query("Delete from integrated_attachments WHERE SessionID  LIKE '%-PRJB%' ");

        $condtion = " c.CategoryActive = 'Y' AND c.Shape != '' AND p.ProductBrand LIKE 'A4 Labels' ";
        $shape_list = $this->home_model->category_shapes($condtion);
        $shapes = $this->home_model->genrate_shapes($shape_list, 'Rectangle');
        $data['shapes'] = str_replace('data-toggle="tooltip"', '', $shapes);
        $shapes_plain = array();
        foreach ($shape_list as $shapee) {
            $shapes_plain[] = $shapee->Shapes;
        }
        $data['shapes_plain'] = $shapes_plain;
        $data['main_content'] = 'print_service/index';
        $this->load->View('page', $data);
    }

    function material_print_service()
    {
        $condtion = " c.CategoryActive = 'Y' AND c.Shape != '' AND p.ProductBrand LIKE 'A4 Labels' ";
        $shape_list = $this->home_model->category_shapes($condtion);
        $shapes = $this->home_model->genrate_shapes($shape_list, 'Rectangle');
        $data['shapes'] = str_replace('data-toggle="tooltip"', '', $shapes);
        $shapes_plain = array();
        foreach ($shape_list as $shapee) {
            $shapes_plain[] = $shapee->Shapes;
        }
        $data['shapes_plain'] = $shapes_plain;
        $data['main_content'] = 'material_print_service/index';
        $this->load->View('page', $data);
    }


    function artwork_approval($order, $language)
    {
        $order = strtoupper($order);

        if (SITE_MODE == 'live') {
            //$order = md5($order);
        }

        $data['result'] = $this->home_model->get_artwork_jobs($order);
        $data['total'] = $this->home_model->count_artwork_jobs($order);
        $data['language'] = $language;

        if (empty($data['result'])) {
            $data['result'] = $this->home_model->get_all_artwork_jobs($order);
            $this->session->set_userdata('alreadysent', '');
            $data['main_content'] = 'print_service/softproof/' . $language . '/approve_summary';
            $this->load->View('page', $data);
        } else {
            $this->home_model->versionrecord($data['result']['ID']);
            $data['main_content'] = 'print_service/softproof/' . $language . '/softproof';
            $this->load->View('page', $data);
        }
    }

    function artwork_help()
    {
        $data['main_content'] = 'print_service/artwork_help';
        $this->load->View('page', $data);
    }

    function newsletter_archive($newsletter = NULL)
    {


        $file = '';
        if (isset($newsletter) and $newsletter == 'we-are-moving') {
            $file = 'we_are_moving';
        } else if (isset($newsletter) and $newsletter == 'october-campaigns-2015') {
            $file = 'october_campaigns_2015';
        } else if (isset($newsletter) and $newsletter == 'christmas-campaigns-2015') {
            $file = 'christmas_campaigns_2015';
        } else if (isset($newsletter) and $newsletter == 'june-2016') {
            $file = 'june_2016';
        } else if (isset($newsletter) and $newsletter == 'october-2016') {
            $file = 'october_2016';
        } else if (isset($newsletter) and $newsletter == 'november-2016') {
            $file = 'november_2016';
        } else if (isset($newsletter) and $newsletter == 'christmas-and-new-year-2017') {
            $file = 'christmas_and_new_year_2017';
        } else if (isset($newsletter) and $newsletter == 'january-2017') {
            $file = 'january_2017';
        } else if (isset($newsletter) and $newsletter == 'june-2017') {
            $file = 'june_2017';
        } else if (isset($newsletter) and $newsletter == 'new-material-pages') {
            $file = 'materail_pages';
        } else if (isset($newsletter) and $newsletter == 'black-friday-2017') {
            $file = 'black_friday_2017';
        } else if (isset($newsletter) and $newsletter == 'christmas-and-new-year-2018') {
            $file = 'christmas_and_new_year_2018';
        } else if (isset($newsletter) and $newsletter == 'spring-2018') {
            $file = 'spring_2018';
        } else if (isset($newsletter) and $newsletter == 'summer-2018') {
            $file = 'summer_2018';
        } else if (isset($newsletter) and $newsletter == 'gdpr') {
            $file = 'gdpr';
        } else if (isset($newsletter) and $newsletter == 'black-friday-and-cyber-monday') {
            $file = 'black-friday-and-cyber-monday';
        } else if (isset($newsletter) and $newsletter == 'late-summer-2019') {
            $file = 'late-summer-2019';
        }


        $data['file'] = $file;
        $data['main_content'] = 'static/newsletter_archive';
        $this->load->View('page', $data);
    }

    //***************************//*****************************//***************************//*****************************

    public function die_approval($serial)
    {
        $data['data'] = $this->approval($serial);
        if (count($data['data']) == 0) {
            redirect('home');
        }
        $data['main_content'] = 'customdies/index';
        $this->load->view('page', $data);
    }

    public function approval($serial)
    {
        $query = $this->db->query("select * from flexible_dies where md5(SerialNumber) = '" . $serial . "' and Status = 67 ")->row_array();
        return $query;
    }


    public function die_approved()
    {

        $serial = $this->input->post('serial');
        $bool = $this->input->post('bool');
        $feedback = $this->input->post('feedback');

        $version = $this->db->query("select ID,version from flexible_dies where SerialNumber = '" . $serial . "'")->row_array();

        if ($bool == 1) {
            $array = array('Status' => 75, 'version' => $version['version'], 'CA' => 1, 'OD' => 1, 'S_SA' => 1, 'Time' => time());
            $this->dieapproval(1, $serial);
        } else if ($bool == 0) {
            $array = array('Status' => 37, 'version' => $version['version'] + 1, 'SA' => 0, 'CA' => 0, 'Time' => time());
            $this->dieapproval(0, $serial);
        }

        if (isset($feedback) && $feedback != "") {
            $this->db->insert('flexible_die_comments', array('serial' => $version['ID'], 'comment' => $feedback, 'Operator' => 0, 'Time' => time()));
        }

        $this->db->where('SerialNumber', $serial);
        $this->db->update('flexible_dies', $array);
        $this->email_approval_data($serial);
        $this->checkfordespatchdate($serial, $version['OrderNumber']);
        echo 'updated';

    }


    public function checkfordespatchdate($serial, $ordernumber)
    {
        $result = $this->db->query("select ID from flexible_dies_info where OID = '" . $serial . "' ")->row_array();
        $id = $result['ID'];

        $sum = $this->db->query("select * from flexible_dies_mat where labeltype LIKE 'printed' and OID = $id ")->num_rows();
        if ($sum == 0) {
            $this->load->library('Custom');
            $this->custom->assign_dispatch_date($ordernumber);
        }
    }



    public function dieapproval($type, $serial)
    {
        $result = $this->db->query("select * from flexible_dies where SerialNumber = '" . $serial . "' ")->row_array();

        $msg = ($type == 1) ? "Approved" : "Rejected";
        $submsg = ($type == 1) ? "Approval" : "Rejection";
        $sender_email = 'steve@aalabels.com';
        $subject_email = 'Custom Die - ' . $submsg;

        $body = 'Custom die with tempcode ' . $result['tempcode'] . ' has been ' . $msg . '. Please Review Backoffice for Futher information and Customer Comments.';

        $this->load->library('email');
        $this->email->initialize(array('mailtype' => 'html',));
        $this->email->subject($subject_email);
        $this->email->from('customercare@aalabels.com', 'Aalabels');
        $this->email->to($sender_email);
        //$this->email->cc('kami.ramzan77@gmail.com');
        $this->email->message($body);
        $this->email->send();
    }


    public function email_approval_data($serial)
    {
        $result = $this->db->query("select * from flexible_dies where SerialNumber = '" . $serial . "' ")->row_array();
        $orderinfo = $this->db->query("select BillingFirstName,Billingemail from orders where OrderNumber = '" . $result['OrderNumber'] . "' ")->row_array();

        $sender_email = $orderinfo['Billingemail'];
        $cc_email = 'data.aalabels@gmail.com';
        $subject_email = 'Custom Die - Feedback Summary';

        $data['order'] = $result['OrderNumber'];
        $data['serial'] = $serial;
        $data['username'] = $orderinfo['BillingFirstName'];
        $data['email'] = $orderinfo['Billingemail'];
        $data['date'] = date("dS F Y");
        $data['time'] = date("g:i A");


        $data['result'] = $result;
        $body = $this->load->view('customdies/approve_summary.php', $data, TRUE);
        $this->load->library('email');
        $this->email->initialize(array('mailtype' => 'html',));
        $this->email->subject($subject_email);
        $this->email->from('customercare@aalabels.com', 'Aalabels');
        $this->email->to($sender_email);
        //$this->email->cc($cc_email);
        $this->email->message($body);
        $this->email->send();
    }

    //***************************//*****************************//***************************//*****************************

    function barcode()
    {
        $data['main_content'] = 'barcode/index';
        $this->load->View('page', $data);
    }


    function material_specification($type, $material, $page = NULL)
    {
        //die('r');
	    // print_r($type.'<br>');
	    // print_r($material.'<br>');
	    // print_r($page.'<br>');die;
        $material = ucwords(str_replace("-", " ", $material));
        if (isset($_GET['productid'])) {
            $productid = filter_var($this->input->get('productid'), FILTER_VALIDATE_INT);

//            $productid = $this->input->get('productid');
            $data['productid'] = $productid;
        }

//        $query = "SELECT * FROM material_tooltip_info where short_name LIKE %s";
//        $info = $this->home_model->prepairedQueryRow($query, "%$material%");

//         print_r($result);die;

        $info = $this->db->query("Select * from material_tooltip_info WHERE short_name LIKE '" . $material . "'")->row_array();
//         print_r($info);die;

        if (isset($_GET['code'])) {
//            $code = $this->input->get('code');
            $code = filter_var($this->input->get('code'), FILTER_SANITIZE_STRING);

            $info = $this->db->query("Select * from material_tooltip_info WHERE material_code LIKE '" . $code . "'")->row_array();

//            $query = "SELECT * FROM material_tooltip_info where material_code LIKE %s";
//            $info = $this->home_model->prepairedQueryRow($query, "%$code%");


        }
//         $query  = "SELECT * FROM table where a=%s AND b LIKE %s LIMIT %d";
//         $result = paraQuery($query, $a, "%$b%", $limit);
        //die($this->db->last_query());
        $code = $info['material_code'];

        $data['group_type'] = $type;

        if ($type == 'rolls') {
            $catid = 'c798R1';
            $type = "Roll";
            $productid = 'RC000025' . $code . '1';
        } else {
            $catid = "t16";
            $type = 'A4';
            $productid = 'AAS008' . $code;
        }

        $data['type'] = $type;
        $data['info'] = $info;
        $data['catid'] = $catid;

        $condition = " CategoryID ='$catid' ";

//        $query = "SELECT * FROM products where ManufactureID  =%s";
//        $product = $this->home_model->prepairedQueryRow($query, $productid);
//        $productid = $product['ProductID'];

        $productid = $this->home_model->get_db_column('products', 'ProductID', 'ManufactureID', $productid);
        //echo $this->db->last_query();
        $data['productid'] = $productid;

        $data['LabelFinish'] = '';
        $data['ColourMaterial'] = '';
        $data['LabelColor'] = '';
        $data['Labeladhesive'] = '';

//        $data['LabelColor'] = $product['LabelColor'];
//        $data['ColourMaterial'] = $product['ColourMaterial'];
//        $data['LabelFinish'] = $product['LabelFinish'];

        $data['LabelColor'] = $this->home_model->get_db_column('products', 'LabelColor', 'ProductID', $productid);
        $data['ColourMaterial'] = $this->home_model->get_db_column('products', 'ColourMaterial', 'ProductID', $productid);
        $data['LabelFinish'] = $this->home_model->get_db_column('products', 'LabelFinish', 'ProductID', $productid);

        if ($page == 'products') {
            $data['material_code'] = $code;
            /*echo"<pre>";print_r($productid);echo"</pre>";exit;*/
//            $data['LabelColor'] = $product['LabelColor_upd'];
//            $data['ColourMaterial'] = $product['ColourMaterial_upd'];
//            $data['LabelFinish'] = $product['LabelFinish_upd'];
//            $data['Labeladhesive'] = $product['adhesive'];

            $data['LabelColor'] = $this->home_model->get_db_column('products', 'LabelColor_upd', 'ProductID', $productid);
            $data['ColourMaterial'] = $this->home_model->get_db_column('products', 'ColourMaterial_upd', 'ProductID', $productid);
            $data['LabelFinish'] = $this->home_model->get_db_column('products', 'LabelFinish_upd', 'ProductID', $productid);
            $data['Labeladhesive'] = $this->home_model->get_db_column('products', 'adhesive', 'ProductID', $productid);
            $data['main_content'] = 'material_specification/products';
            //echo"<pre>";print_r($data);echo"</pre>";exit;
            $this->load->view('page', $data);
        } elseif ($page == 'all') {
            $colour_material = $data['ColourMaterial'];
            $condition = " CategoryID ='$catid' ";
            //$data['paper']     = $this->home_model->distinct_material_paper($condition);
            //$data['adhesive']  = $this->home_model->distinct_material_adhisive($condition);
            //$data['color']     = $this->home_model->distinct_material_color($condition);


            if ($type == "Roll") {
                $brand = "Rolls";
            } else {
                $brand = "A4";
            }

//            $filter_group_skip = "SELECT * FROM material_tooltip_info where material_code  =%s";
//            $product = $this->home_model->prepairedQueryRow($query, $code);
//            $filter_group_skip = $product['filter_group'];

            $filter_group_skip = $this->home_model->get_db_column('material_tooltip_info', 'filter_group', 'material_code', $code);

            $newcondition = "filter_group != '$filter_group_skip'";

            $data['paper'] = $this->filter_model->distinct_material_paper($newcondition, $brand);
            //echo $this->db->last_query();exit;
            //$data['adhesive'] = $this->filter_model->distinct_material_adhisive($condition);
            $data['color'] = $this->filter_model->distinct_material_color($newcondition, $brand);
            $data['brand'] = $brand;


            $condition .= " AND ColourMaterial LIKE '$colour_material'";
            $data['materials'] = $this->home_model->grouping_material_listing($condition);
            //echo($this->db->last_query());

            $condition = " CategoryID ='$catid' ";
            $condition .= " AND ColourMaterial NOT LIKE '$colour_material'";
            $data['othermaterials'] = $this->home_model->grouping_material_listing($condition);
            //echo"<pre>";print_r($colour_material);echo"</pre>";
            //echo"<pre>";print_r($data);echo"</pre>";exit;
            //echo($this->db->last_query());exit;
            $data['main_content'] = 'material_specification/material';
            $this->load->view('page', $data);
        } else {

            if ($type == "Roll") {
                $brand = "Rolls";
            } else {
                $brand = "A4";
            }

//            $filter_group_skip = "SELECT * FROM material_tooltip_info where material_code  =%s";
//            $product = $this->home_model->prepairedQueryRow($query, $code);
//            $filter_group_skip = $product['filter_group'];

            $filter_group_skip = $this->home_model->get_db_column('material_tooltip_info', 'filter_group', 'material_code', $code);

            $newcondition = "filter_group != '$filter_group_skip'";

            $data['paper'] = $this->filter_model->distinct_material_paper($newcondition, $brand);
            //echo $this->db->last_query();exit;
            //$data['adhesive'] = $this->filter_model->distinct_material_adhisive($newcondition);
            $data['color'] = $this->filter_model->distinct_material_color($newcondition, $brand);
            $data['brand'] = $brand;


            //$data['paper']     = $this->home_model->distinct_material_paper($condition);
            //$data['adhesive']  = $this->home_model->distinct_material_adhisive($condition);
            //$data['color']     = $this->home_model->distinct_material_color($condition);

            //echo"<pre>";print_r($data);echo"</pre>";exit;

            //$condition .= " AND ProductID <> '$productid' AND LabelFinish != '".$data['LabelFinish']."' AND  LabelColor !='".$data['LabelColor']."'";


            //$condition .= " AND ProductID != '$productid' AND LabelFinish != '".$data['LabelFinish']."'  AND LabelColor !='".$data['LabelColor']."'";
            $condition .= " AND ProductID != '$productid'";


            $data['othermaterials'] = $this->home_model->grouping_material_listing($condition);
            //echo $this->db->last_query();
            $data['materials'] = $this->home_model->fetch_sheets_materials($catid, $productid);
            $data['main_content'] = 'material_specification/material';
            //echo"<pre>";print_r($data);echo"</pre>";exit;
            $this->load->view('page', $data);
        }


    }

    function label_by_adhesive($type, $material, $page = NULL)
    {

        $data['top_heading'] = str_replace("-", " ", $material);
        $matt = $material;
        $material = ucwords(str_replace("-", " ", $material));
        $info = $this->db->query("Select * from material_tooltip_info WHERE material_name LIKE '" . $material . "'")->row_array();
        $data['group_type'] = $type;
        $data['head_desc'] = $info ['tooltip_info_spec_sheets'];

        if ($type == 'rolls') {
            $catid = 'c798R1';
            $type = "Roll";
            $productid = 'RC000025';
        } else {
            $catid = "t16";
            $type = 'A4';
            $productid = 'AAS008';
        }

        $data['type'] = $type;
        $data['info'] = $info;
        $data['catid'] = $catid;

        $condition = " CategoryID ='$catid' AND Adhesive LIKE '$material'";
        $query = "Select * From products Where `CategoryID` = '$catid' AND `Adhesive` LIKE '$material' Order By `productID` desc LIMIT 1";
        $product_data = $this->db->query($query);
        $product_data = $product_data->row_array();
        $productid = $product_data['ProductID'];
        $data['productid'] = $productid;
        $data['LabelFinish'] = '';
        $data['ColourMaterial'] = '';
        $data['LabelColor'] = '';
        $data['Labeladhesive'] = '';
        $data['material_code'] = $info['material_code'];
        if ($page == 'products') {
            $data['LabelColor'] = '';//$this->home_model->get_db_column('products','LabelColor_upd', 'ProductID',$productid);
            $data['ColourMaterial'] = '';//$this->home_model->get_db_column('products','ColourMaterial_upd', 'ProductID',$productid);
            $data['LabelFinish'] = '';//$this->home_model->get_db_column('products','LabelFinish_upd', 'ProductID',$productid);
            $data['Labeladhesive'] = $material; //$this->home_model->get_db_column('products','adhesive', 'ProductID',$productid).',';
            $data['main_content'] = 'labels_adhesive/products';
            //echo"<pre>";print_r($data);echo"</pre>";exit;
            $this->load->view('page', $data);

        } else {
            $data['paper'] = $this->home_model->distinct_material_paper($condition);
            $data['adhesive'] = $this->home_model->distinct_material_adhisive($condition);
            $data['color'] = $this->home_model->distinct_material_color($condition);
            $condition = " CategoryID ='$catid' AND Adhesive LIKE '$material'";
            $data['materials'] = $this->home_model->grouping_material_listing($condition);
            $condition = " CategoryID ='$catid' AND Adhesive NOT LIKE '$material'";
            $condition .= " AND ProductID <> '$productid'";
            $data['othermaterials'] = $this->home_model->grouping_material_listing($condition);
            //$data['materials'] = $this->home_model->fetch_sheets_adhesive($material, $catid);
            //die($this->db->last_query());
            //echo"<pre>";print_r($data['materials']);echo"</pre>";exit;
            //echo"<pre>";print_r($data['othermaterials']);echo"</pre>";exit;
            $data['main_content'] = 'labels_adhesive/adhesive';
            $this->load->view('page', $data);
        }
        //$this->output->enable_profiler(TRUE);
    }

    function free_sample($type = NULL)
    {
        $info = array();
        $code = "WTP";
        $info['material_code'] = $code;
        $data['group_type'] = $type;
        if ($type == 'rolls') {
            $catid = 'c798R1';
            $type = "Roll";
            $productid = 'RC000025' . $code . '1';
        } else {
            $catid = "t16";
            $type = 'A4';
            $productid = 'AAS008' . $code;
        }

        $data['type'] = $type;
        $data['info'] = $info;
        $data['catid'] = $catid;

        $condition = " CategoryID = '$catid' ";
        $productid = $this->home_model->get_db_column('products', 'ProductID', 'ManufactureID', $productid);
        $data['productid'] = $productid;

        $data['LabelColor'] = $this->home_model->get_db_column('products', 'LabelColor_upd', 'ProductID', $productid);
        $data['ColourMaterial'] = $this->home_model->get_db_column('products', 'ColourMaterial_upd', 'ProductID', $productid);
        $data['LabelFinish'] = $this->home_model->get_db_column('products', 'LabelFinish_upd', 'ProductID', $productid);
        $data['paper'] = $this->home_model->distinct_material_paper($condition);
        $data['adhesive'] = $this->home_model->distinct_material_adhisive($condition);
        $data['color'] = $this->home_model->distinct_material_color($condition);
        $condition = " CategoryID ='$catid'";
        $data['materials'] = $this->home_model->grouping_material_listing($condition);

        //$data['materials'] = $this->home_model->fetch_sheets_materials($catid);
        //echo"<pre>";print_r($data);echo"</pre>";exit;
        $data['main_content'] = 'free_sample/free_sample';
        $this->load->view('page', $data);
    }

    function new_printed_labels()
    {
        $data['main_content'] = 'static/new_printed_labels';
        $this->load->view('page', $data);
    }

    function specialist_labels()
    {
        $data['main_content'] = 'static/specialist_labels';
        $this->load->view('page', $data);
    }

    function privacy()
    {
        $data['main_content'] = 'static/privacy';
        $this->load->view('page', $data);
    }

    /////////////////////////////////////**********************************////////////////////////////////**********


    function lba_labels($name = NULL, $sub_cat = NULL, $cat = NULL)
    {
        $condition = "";

        if ($name) {
            // $name = str_replace("-"," ",$name);
            $condition = " AND cat.link LIKE '%" . $name . "%'";
        }
        if ($sub_cat) {

            // $sub_cat = str_replace("-"," ",$sub_cat);
            $condition .= " AND sub.link LIKE '%" . $sub_cat . "%'";
        }
        if ($cat) {
            $condition .= " AND sub.CID LIKE '%" . $cat . "%'";
        }
        if (!empty($name)) {

            $query = "Select *,cat.link as link1,sub.link as link2 FROM lba_design des JOIN lba_subcategories sub on sub.CID = des.categoryID JOIN lba_categories cat ON sub.parent_category = cat.ID WHERE sub.CID != '' $condition AND sub.active like 'Y' AND des.active like 'Y'  order by des.designID desc";
        } else {

            $query = "SELECT `lba_subcategories`.`ID`, `lba_subcategories`.`CID` as categoryID, `lba_subcategories`.`link`, `lba_subcategories`.`sub_name`, `lba_categories`.`name` as `parent_name`, `lba_categories`.`link` as `parent_link` FROM `lba_subcategories` inner join `lba_categories` on `lba_categories`.`ID` = `lba_subcategories`.`parent_category` WHERE `lba_subcategories`.`active` = 'Y'";
        }
        /* AND sub.active like 'Y' AND des.active like 'Y' */

        $this->load->helper('pagination_custom');
        $url = 'free-label-design-templates?';
        if ($name) {
            $url = 'free-label-design-templates/' . $name . '?';
        }
        if ($sub_cat) {
            $url = 'free-label-design-templates/' . $name . '/' . $sub_cat . '?';
        }
        $pagination = make_pagination_query($query, $url, '', 'yes', 'lba');
        $data['links'] = $pagination['links'];
        $data['totalrecord'] = $pagination['totalrecord'];
        $data['products'] = $pagination['result'];
        if (!empty($name)) {
            $data['main'] = 'sub';
        } else
            $data['main'] = 'main';

        $data['main_content'] = 'lba/lba_page';

        $data['starting'] = (isset($_GET['per_page']) and $_GET['per_page'] != '') ? $_GET['per_page'] * $pagination['per_page'] - $pagination['per_page'] + 1 : 1;
        $data['ending'] = (isset($_GET['per_page']) and $_GET['per_page'] != '') ? $_GET['per_page'] * $pagination['per_page'] : $pagination['per_page'];
        if ($data['ending'] > $data['totalrecord']) {
            $data['ending'] = $data['totalrecord'];
        }
        //echo"<pre>";print_r($data);echo"</pre>";exit;
        $this->load->view('page', $data);
    }


    function lba_editor($cat1 = NULL, $cat2 = NULL, $designID = NULL)
    {
        if ($designID == NULL) {
            redirect("free-label-design-templates");
        }
        $materials = '';
        if ($designID != NULL) {
            if (isset($_GET['uic']) && $_GET['uic'] != "") {
                $abandondata = $this->home_model->get_abandon_labels_data($_GET['uic']);
                $data['directid'] = (isset($abandondata['saved_id']) && $abandondata['saved_id'] != 0) ? $abandondata['saved_id'] : $abandondata['label_id'];
                $data['directselect'] = (isset($abandondata['saved_id']) && $abandondata['saved_id'] != 0) ? "true" : "false";
            }
            $products = $this->home_model->get_lba_labels_data($designID);
            $data['products'] = $products;
            $category = $this->home_model->get_lba_die_data($designID);
            $data['category'] = $category;
            $data['designID'] = $designID;
            $data['link1'] = $cat1;
            $data['link2'] = $cat2;
        }

        $data['main_content'] = 'lba/lba_editor';
        $data['lba_cart'] = $this->load->view('lba/lba_cart', '', true);
        $this->load->view('page', $data);
    }

    function lba_sets_data()
    {
        $labelid = $this->input->post('labelid');
        $is_user_design_selected = $this->input->post('is_user_design_selected');
        // if($is_user_design_selected=="true"){
//	     $userdata = $this->home_model->get_user_lba_data($labelid);
//		 $labelid = $userdata['label_id'];
//	   }

        $data['is_logged'] = $this->session->userdata('logged_in');
        $data['labelid'] = $labelid;

        $lba_cart = $this->ajax_upperpanel_load($data);
        $lba_recomend = $this->ajax_bottomcart_load();
        echo json_encode(array('response' => 'yes', 'upper_panel' => $lba_cart, 'recommend_panel' => $lba_recomend));

    }

    function ajax_email_abandon_cart()
    {
        $userID = $this->session->userdata('userid');
        $labelid = $this->input->post('label_id');
        $is_user_design_selected = $this->input->post('is_user_design_selected');

        if (isset($userID) and $userID != '') {
            $data['is_logged'] = $this->session->userdata('logged_in');
            $data['labelid'] = $labelid;

            $lba_cart = $this->ajax_upperpanel_load($data);
            $lba_recomend = $this->ajax_bottomcart_load();
            echo json_encode(array('response' => 'yes', 'upper_panel' => $lba_cart, 'recommend_panel' => $lba_recomend));
        } else {
            echo json_encode(array('response' => 'login', 'upper_panel' => '', 'recommend_panel' => ''));
        }
    }

    function ajax_upperpanel_load($data)
    {
        $theHTMLResponse = $this->load->view('lba/lba_cart', $data, true);
        $this->output->set_content_type('application/json');
        return $theHTMLResponse;
    }

    function ajax_bottomcart_load()
    {
        $theHTMLResponse = $this->load->view('lba/lba_recomend', '', true);
        $this->output->set_content_type('application/json');
        return $theHTMLResponse;
    }


    function delete_user_design()
    {
        $id = $this->input->post('id');
        if (isset($id) && $id != '0' && $id != '') {
            $this->db->where('ID', $id);
            $this->db->delete('lba_user_design');

            // new function
            $this->home_model->delete_abandon_design($id);
            echo "deleted";
        }
    }


    function load_flash_panel()
    {
        $userID = $this->session->userdata('userid');
        $label_id = $this->input->post('label_id');
        $is_user_design_selected = $this->input->post('is_user_design_selected');
        $add = $this->input->post('add');

        $this->session->set_userdata('label_id', $label_id);

        if (isset($userID) and $userID != '') {
            if (isset($add) && $add == "yes") {
                if (isset($is_user_design_selected) && $is_user_design_selected == "false") {
                    $this->check_abandon_design($label_id);
                }
            }
        }

        $data['temp_id'] = $label_id;
        $data['is_user_design_selected'] = $is_user_design_selected;
        $theHTMLResponse = $this->load->View('lba/flash_panel', $data);
        echo $theHTMLResponse;
    }


    function check_abandon_design($label_id)
    {
        $userID = $this->session->userdata('userid');
        $cart_reminder = $this->home_model->get_db_column('customers', 'design_reminder', 'UserID', $userID);
        if ($cart_reminder == "Y") {
            $count = $this->check_for_duplicate_label($label_id);
            if ($count == 0) {
                $this->db->insert('lba_abandon_designs', array('user_id' => $userID, 'label_id' => $label_id, 'type' => 'A'));
            }
        }
    }

    function check_for_duplicate_label($label_id)
    {
        $userID = $this->session->userdata('userid');
        $qry = $this->db->query("select count(*) as total from lba_abandon_designs where label_id = $label_id and user_id = $userID and  	cart_restored = 'N'")->row_array();
        return $qry['total'];
    }


    /******************** ABANDONED DESIGNS ******************************/
    function abandoned_designs()
    {
        $cart_interval = 30;
        $reminder_sent = "reminder_sent_30";
        $emailtype = $this->input->get('emailtype');
        $emailtype = ($emailtype == "saved") ? "B" : "A";
        $interval = $this->input->get('interval');
        $interval_email = "&interval=30";
        if (isset($interval) and $interval == 24) {
            $cart_interval = $interval;
            $reminder_sent = "reminder_sent";
            $interval_email = "&interval=24";
        }
        $carts = $this->home_model->abandoned_designs($cart_interval, $emailtype);
        $mailSubject = $newPhrase = "";
        foreach ($carts as $cart) {
            $userID = $cart->UserID;
            $userEmail = $this->home_model->get_db_column('customers', 'UserEmail', 'UserID', $userID);

            if (isset($userEmail) and $userEmail != '') {
                $data['cart_detail'] = $this->home_model->get_user_abandon_designs($userID, $cart_interval, $emailtype);
                $data['UserName'] = $this->home_model->get_db_column("customers", "BillingFirstName", "UserID", $userID);
                $data['interval_email'] = $interval_email;
                $unsubscribe_link = base_url() . "home/unsubscribe_designs?uid=" . md5($userID);
                $data['unsubscribe_link'] = $unsubscribe_link;
                $mailSubject = "You have Unused/Unsaved Label Design!";
                $newPhrase = $this->load->view('lba/email_cart_' . $emailtype, $data, true);
                //echo"". $newPhrase;exit;
                $this->load->library('email');
                $this->email->from('support@aalabels.com', 'AALABELS');
                $this->email->to($userEmail);
                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");
                $this->email->send();
                //echo $reminder_sent;exit;

                $this->db->where('user_id', $userID);
                $this->db->where('type', $emailtype);
                $data = array(
                    $reminder_sent => 'Y',
                );
                $this->db->update('lba_abandon_designs', $data);
            }
        }
    }

    public function continue_design()
    { //error_reporting(E_ALL);
        $uid = $this->input->get('uid');
        $int = $this->input->get('interval');
        $reminder_sent = (isset($int) and $int == 30) ? "reminder_sent_30" : "reminder_sent";

        $this->db->where('MD5(ID)', $uid);
        $data = array(
            'cart_restored' => 'Y',
            $reminder_sent => 'Y'
        );
        $this->db->update('lba_abandon_designs', $data);

        $abandonlabeldata = $this->home_model->get_abandon_labels_data($uid);
        $url = base_url() . "free-label-design-templates/";

        if (!empty($abandonlabeldata)) {
            $labeldata = $this->home_model->get_lba_one_labels_data($abandonlabeldata['label_id']);
            $category = $this->home_model->get_lba_die_data($labeldata['Designid']);
            $url = base_url() . "free-label-design-templates/" . $category->link . "/" . strtolower(str_replace(" ", "-", $category->urlink)) . "/" . $labeldata['Designid'] . "?uic=" . $uid;
        }
        // echo $url; die();
        redirect($url);
    }

    public function unsubscribe_designs()
    {
        $uid = $this->input->get('uid');
        $this->db->where('MD5(UserID)', $uid);
        $data = array(
            'design_reminder' => 'N',
        );
        $this->db->update('customers', $data);

        $this->db->where('MD5(user_id)', $uid);
        $data = array(
            'reminder_sent' => 'Y',
            'reminder_sent_30' => 'Y',
            'cart_restored' => 'Y',
        );
        $this->db->update('lba_abandon_designs', $data);
        redirect(base_url());
    }

    function special_offer_materials()
    {
        $info = array();
        $code = "WTP";
        $info['material_code'] = 'WTP';
        $catid = "T16";
        $type = 'A4';
        $data['group_type'] = $type;

        $productid = 'AAS008' . $code;

        $data['type'] = $type;
        $data['info'] = $info;
        $data['catid'] = $catid;

        $condition = " CategoryID = '$catid' ";
        $productid = $this->home_model->get_db_column('products', 'ProductID', 'ManufactureID', $productid);
        $data['productid'] = $productid;

        $data['LabelColor'] = $this->home_model->get_db_column('products', 'LabelColor_upd', 'ProductID', $productid);
        $data['ColourMaterial'] = $this->home_model->get_db_column('products', 'ColourMaterial_upd', 'ProductID', $productid);
        $data['LabelFinish'] = $this->home_model->get_db_column('products', 'LabelFinish_upd', 'ProductID', $productid);
        $data['paper'] = $this->home_model->distinct_material_paper($condition);
        $data['adhesive'] = $this->home_model->distinct_material_adhisive($condition);
        $data['color'] = $this->home_model->distinct_material_color($condition);
        $condition = " CategoryID ='$catid'";
        $data['materials'] = $this->home_model->grouping_material_listing($condition);

        $data['main_content'] = 'material/special_offers';
        $this->load->view('page', $data);
    }

    function hs_codes()
    {
        $data['main_content'] = 'static/hs_codes';
        $this->load->view('page', $data);
    }

    function piggy_back_labels()
    {
//        $a = $_SERVER['DOCUMENT_ROOT'].'/CustomLabelsFiles/';
//        print_r($a);die;
        $data['main_content'] = 'static/piggy-back-labels';

        if ($_POST) {
//            echo"<pre>";print_r($this->input->post());die;
            $captcha = $this->input->post('captcha');
            if (empty($_SESSION['captcha']) || trim(strtolower($captcha)) != $_SESSION['captcha']) {
                $data['class'] = 'danger';
                $data['msg'] = 'Invalid captcha, please try again !';
            } else {

                $response = $this->product_model->save_piggy_back_request();
                $data['class'] = $response['class'];
                $data['msg'] = $response['msg'];
                $data['piggyback_labels'] = true;
                $data['main_content'] = 'printing/custom_thanks';
                $page = $this->input->post('page');
//                if(isset($page) and $page == "wtdp")
//                {
//                    $array = array('response'=>'done');
//                    echo json_encode($array);exit;
//                }
            }
        }


        $this->load->view('page', $data);
    }

    /******************** ABANDONED CARTS ******************************/
    function abandoned_carts()
    {
        $cart_interval = 30;
        $reminder_sent = "reminder_sent_30";
        $interval = $this->input->get('interval');
        $interval_email = "&interval=30";
        if (isset($interval) and $interval == 24) {
            $cart_interval = $interval;
            $reminder_sent = "reminder_sent";
            $interval_email = "&interval=24";
        }
        $carts = $this->shopping_model->abandoned_carts($cart_interval);
        $mailSubject = $newPhrase = "";
        foreach ($carts as $cart) {
            $userID = $cart->UserID;
            $SessionID = $cart->SessionID;
            $userEmail = $this->home_model->get_db_column('customers', 'UserEmail', 'UserID', $userID);

            if (isset($userEmail) and $userEmail != '') {
                $data['cart_detail'] = $this->shopping_model->get_user_cart($userID, $SessionID, $cart_interval);
                $data['UserName'] = $this->home_model->get_db_column("customers", "BillingFirstName", "UserID", $userID);
                $complete_link = base_url() . "home/continue_cart?uid=" . md5($userID) . "&sid=" . $SessionID . $interval_email;
                $unsubscribe_link = base_url() . "home/unsubscribe_cart?uid=" . md5($userID);
                $data['complete_link'] = $complete_link;
                $data['unsubscribe_link'] = $unsubscribe_link;
                $mailSubject = "You have left something in your basket!";
                $newPhrase = $this->load->view('shopping/email_cart', $data, true);
                //echo"". $newPhrase;
                $this->load->library('email');
                $this->email->from('support@aalabels.com', 'AALABELS');
                $this->email->to($userEmail);
                //$this->email->to('php.aalabels@gmail.com');
                $this->email->bcc('php.aalabels@gmail.com');

                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");
                $this->email->send();
                //echo $reminder_sent;exit;

                $this->db->where('UserID', $userID);
                $this->db->where('SessionID', $SessionID);
                $data = array(
                    $reminder_sent => 'Y',
                );
                $this->db->update('temporaryshoppingbasket', $data);
            }
        }
    }

    public function continue_cart()
    {
        $uid = $this->input->get('uid');
        $int = $this->input->get('interval');
        $sid = $this->input->get('sid');

        $this->db->where('MD5(UserID)', $uid);
        $this->db->where('ProductID !=', '0');
        $this->db->where('SessionID', $sid);

        if (isset($int) and $int == 30) {
            $this->db->where('reminder_sent_30', 'Y');
        } else if (isset($int) and $int == 24) {
            $this->db->where('reminder_sent', 'Y');
        }

        $MaxDateTime = date("Y-m-d H:i:s", mktime(0, 0, 0, 11, 27, 2018)); // all orders after 27-11-2018
        $this->db->where('OrderTime >=', $MaxDateTime);

        $data = array(
            'cart_restored' => 'Y',
            'SessionID' => $this->shopping_model->sessionid()
        );
        $this->db->update('temporaryshoppingbasket', $data);

        $this->db->where('SessionID', $sid);
        $data = array(
            'SessionID' => $this->shopping_model->sessionid()
        );
        $this->db->update('integrated_attachments', $data);
        redirect("shopping/checkout");
    }

    public function unsubscribe_cart()
    {
        $uid = $this->input->get('uid');
        $this->db->where('MD5(UserID)', $uid);
        $data = array(
            'cart_reminder' => 'N',
        );
        $this->db->update('customers', $data);


        $this->db->where('MD5(UserID)', $uid);
        $data = array(
            'reminder_sent' => 'Y',
        );
        $this->db->update('temporaryshoppingbasket', $data);

        redirect(base_url());
    }

    public function unsubscribe_login($userid)
    {
        $this->db->where('MD5(UserID)', $userid);
        $data = array(
            'login_reminder' => 'N',
        );
        $this->db->update('customers', $data);
        $this->db->where('MD5(UserID)', $userid);
        $this->db->delete('login_token');
        redirect(base_url());
    }

    /*****************************************************************/

    function blog($cat_slug = NULL, $post_slug = NULL)
    {
        if ($cat_slug == NULL) {
            $cat_slug = 'recent';
        }
        $config = array();
        if ($cat_slug != NULL && $cat_slug != "recent") {
            $L_slug = $cat_slug;
        } else {
            $L_slug = "";
        }

        $config["base_url"] = AURL . "blog/" . $L_slug . '?';
        $config["total_rows"] = count($this->home_model->get_blog_posts($cat_slug, 10000000000, 0));
        $config["per_page"] = 5;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string'] = true;

        $config['full_tag_open'] = '<ul class="pagination pagination-md">';
        $config['full_tag_close'] = '</ul>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_link'] = '«';
        $config['prev_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_link'] = '»';
        $config['next_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        //$config['anchor_class'] = 'class="page-link" ';
        $config['data_page_attr'] = 'class="page-link waves-effect waves-effect "';


        $p = $this->input->get('page');
        $page = ($p) ? $p : 0;


        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();


        $blog_categories = $this->home_model->get_blog_categories();
        $category_title = $single_post = $file = "";

        if ($cat_slug != NULL) {
            $slug_type = $this->home_model->check_slug_type($cat_slug);
        }

        if ($post_slug == NULL and $slug_type == "category") {
            //get posts by category slug
            //$posts = $this->home_model->get_blog_posts($cat_slug);

            $posts = $this->home_model->get_blog_posts($cat_slug, $config["per_page"], $page);

            $category_title = $this->home_model->get_db_column("blogcategories", "category_title", "category_slug", $cat_slug);
        } else if ($post_slug != NULL) {
            //get post data
            $single_post = $this->home_model->get_single_post($post_slug);
            $file = $single_post->slug;
        } else {
            //show recent posts
            //$posts = $this->home_model->get_blog_posts('recent');
            $posts = $this->home_model->get_blog_posts('recent', $config["per_page"], $page);
        }

        $data['file'] = $file;
        $data['cat_slug'] = $cat_slug;
        $data['post_slug'] = $post_slug;
        $data['category_title'] = $category_title;
        $data['posts'] = $posts;
        $data['single_post'] = $single_post;
        $data['blog_categories'] = $blog_categories;
        $data['main_content'] = 'blog/main';
        $this->load->View('page', $data);
    }

    /*****************************************************************/
    function browsing_history()
    {
        $carts = $this->shopping_model->browsing_history();
        $mailSubject = $newPhrase = "";
        foreach ($carts as $cart) {
            $userID = $cart->UserID;
            $SessionID = $cart->SessionID;
            $userEmail = $this->home_model->get_db_column('customers', 'UserEmail', 'UserID', $userID);

            if (isset($userEmail) and $userEmail != '') {
                $data['cart_detail'] = $this->shopping_model->get_user_history($userID);
                $data['UserName'] = $this->home_model->get_db_column("customers", "BillingFirstName", "UserID", $userID);
                //echo "<pre>";print_r($data);echo"</pre>";
                $unsubscribe_link = base_url() . "home/unsubscribe_history?uid=" . md5($userID);

                $mailSubject = "Your browsing history!";
                $newPhrase = $this->load->view('shopping/browsing_history_email', $data, true);
                $this->load->library('email');
                $this->email->from('support@aalabels.com', 'AALABELS');
                $this->email->to($userEmail);
                //$this->email->bcc('shoaib.aalabels@gmail.com');

                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");
                $this->email->send();
                //echo $reminder_sent;exit;

                $this->db->where('UserID', $userID);
                $this->db->where('SessionID', $SessionID);
                $data = array(
                    'reminder_sent' => 'Y',
                );
                $this->db->update('browsing_history', $data);
            }
        }
    }

    function labels_and_environment()
    {
        $data['main_content'] = 'static/labels-and-environment';
        $this->load->View('page', $data);
    }

}