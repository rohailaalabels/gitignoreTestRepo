<?php

class Flash_api extends CI_Controller
{

    var $upload_path = '';
    var $designer_path = '';
    var $design_image_path = '';
    var $gallery_path = '';
    var $shape_path = '';
    var $documen_path = '';
    var $fonts_path = '';

    function __construct()
    {
        parent::__construct();
        //header("Access-Control-Allow-Origin: *");
        //$this->load->model('flash_model');

        $this->upload_path = base_url() . 'designer/media/user_define/';
        $this->design_image_path = base_url() . 'designer/media/design/';
        $this->gallery_path = base_url() . 'designer/media/gallery/';
        $this->shape_path = base_url() . 'designer/media/shapes/';
        $this->documen_path = $_SERVER['DOCUMENT_ROOT'];
        $this->fonts_path = base_url() . 'theme/site/flash/fonts.swf';
        $this->Assets = base_url() . 'theme/site/';


    }

    function index()
    {
        echo base_url();
        echo $this->documen_path;
    }

    function config()
    {

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?>
					<data>
					<sizes_xml_path 			 value="' . base_url() . 'theme/site/flash/xml/get_standard_sizes.xml"			/>
					<fonts_path 			     value="' . base_url() . 'theme/site/flash/Fonts.swf"			/>
					<design_categories_path	     value="' . base_url() . 'flash_api/get_designs_categories"		/>
					<design_path				 value="' . base_url() . 'flash_api/get_designs"					/>
					<template_settings_path	     value="' . base_url() . 'flash_api/get_template"				    />
					<design_settings_path		 value="' . base_url() . 'flash_api/get_design_settings"			/>
					<gallery_path				 value="' . base_url() . 'flash_api/gallery"						/>
					<shapes_path				 value="' . base_url() . 'flash_api/viewshapes"		      />
					<save_image_path			 value="' . base_url() . 'flash_api/save_design_images"/>
					<admin_side_save_values		 value="' . base_url() . 'flash_api/save_admin_design"	/>
					<navigate_path			     value="http://gtserver/flash/design"	/>
					<uploaded_images_folder_path value="' . $this->upload_path . '"	 />
					<sign_in                     value="' . base_url() . 'flash_api/signin"		      />
					<sign_up                     value="' . base_url() . 'flash_api/signup"		      />
					<forgotPassword              value="' . base_url() . 'flash_api/forgotPassword"		      />
					<user_side_save_values       value="' . base_url() . 'flash_api/save_user_design"		      />
					<user_projects		         value="' . base_url() . 'flash_api/user_saved_templates"		      />
					<delete_user_template        value="' . base_url() . 'flash_api/delete_user_template"		      />
					<user_gallery                value="' . base_url() . 'flash_api/user_gallery"		      />
					<check_user_login            value="' . base_url() . 'flash_api/user_login_checker"		      />
					<get_user_designs_xml        value="' . base_url() . 'flash_api/get_user_designs_xml"		      />
					<suggested_templates         value="' . base_url() . 'flash_api/suggested_templates_xml"      />
					<save_buy_print_images       value="' . base_url() . 'flash_api/save_buy_print_images"      />
					<calculate_price             value="' . base_url() . 'flash_api/calculate_price"      />
					<add_to_cart                 value="' . base_url() . 'flash_api/add_to_cart"      />
					<admin_suggest_templates     value="' . base_url() . 'flash_api/admin_suggest_templates"      />
					<update_admin_design_one     value="' . base_url() . 'flash_api/update_admin_design_one"      />
					<update_admin_design_all     value="' . base_url() . 'flash_api/update_admin_design_all"      />
					<fetch_all_association_list  value="' . base_url() . 'flash_api/fetch_all_association_list"      />
					<help_url                    value="' . base_url() . 'custom-label-tool-help"      />
					<update_project_name         value="' . base_url() . 'flash_api/update_project_name"      />
					</data>';
        echo $html;

    }


    function get_template()
    {

        $temp_id = $this->input->get('temp_id');

        if (!isset($temp_id) and $temp_id == '') {
            $temp_id = $this->input->post('temp_id');
        }
        if (isset($temp_id) and $temp_id != '') {


            $qry = "SELECT * from products p , category  c where SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID 
					     AND  p.ProductID = $temp_id";
            $row = $this->db->query($qry);
            $details = $row->row_array();

            $x = explode("-", $details['CategoryName']);
            $catname = $x[0];
            $code = explode('.', $details['CategoryImage']);
            $code = $code[0];

            if (preg_match("/SRA3/i", $details['ProductBrand'])) {
                $Paper_size = "SRA3 Sheets";
                $size = 'sra3';
            } else if (preg_match("/A5/i", $details['ProductBrand'])) {
                $Paper_size = "A5 Sheets";
                $size = 'a5';
            } else if (preg_match("/A3/i", $details['ProductBrand'])) {
                $Paper_size = "A3 Sheets";
                $size = 'a3';
            } else if (preg_match("/Roll/i", $details['ProductBrand'])) {
                exit();
            } else if (preg_match("/Integrated/i", $details['ProductBrand'])) {
                exit();
            } else {
                $Paper_size = "A4 Sheets";
                $size = 'a4';
            }


            $details['LabelWidth'] = $details['LabelWidth'];
            $height = $details['LabelHeight'];
            $label_type = "";
            $label_inner_width = "";
            $label_inner_height = "";
            $swf_path = '';
            $bleed_size = '';
            $label_double_inner_width = '';
            $label_double_inner_height = '';


            if (preg_match("/AABCL08/i", $details['CategoryImage'])) {
                $label_type = 'square_rectangle_circle';
                $inner = explode(" (", $details['LabelWidth']);
                $inner2 = explode(" (", $details['LabelHeight']);
                $details['LabelWidth'] = $inner[0];
                $height = $inner2[0];
                $label_inner_width = str_replace(") mm", "", $inner[1]);
                $label_inner_height = $label_inner_width;
            } else
                if (preg_match("/AAMM01/i", $details['CategoryImage'])) {
                    $label_type = 'double_square_rectangle';
                    $label_inner_width = '';
                    $label_inner_height = $label_inner_width;
                    $label_double_inner_width = str_replace(" mm", "", $details['LowerLabelWidth']);
                    $label_double_inner_height = str_replace(" mm", "", $details['LowerLabelHeight']);
                } else
                    if (preg_match("/AACR01/i", $details['CategoryImage'])) {
                        $label_type = 'triple_circle';
                        $label_inner_width = '51';
                        $label_inner_height = $label_inner_width;
                        $label_double_inner_width = '76';
                        $label_double_inner_height = $label_double_inner_width;
                    } else

                        if ($details['Shape_upd'] == "Circular") {
                            $height = $details['LabelWidth'];
                            if (preg_match("/[)]/is", str_replace(" mm", "", $details['LabelWidth']))) {
                                $label_type = 'double_circle';
                                $inner = explode("(", $details['LabelWidth']);

                                $details['LabelWidth'] = $inner[0];
                                $height = $details['LabelWidth'];

                                $label_inner_width = str_replace(") mm", "", $inner[1]);
                                $label_inner_height = str_replace(") mm", "", $inner[1]);

                            } else {
                                $label_type = 'single_circle';
                            }

                        } else if (preg_match("/rectangle/is", $details['Shape_upd']) || preg_match("/square/is", $details['Shape_upd'])) {
                            $label_type = 'square_rectangle';
                        } else if ($details['Shape_upd'] == "Oval") {
                            $label_type = 'single_circle';
                        } else {
                            $label_type = 'swf_shape';
                            $swf_path = base_url() . 'designer/media/irregular/';
                        }

            if (preg_match("/AAD048/i", $details['CategoryImage'])) {
                $label_type = 'perforated_single_circle';
                $swf_path = "";
            }

            if (preg_match("/AACR01/i", $details['CategoryImage'])) {
                $section = explode('.', $details['Width']);
                $details['LabelWidth'] = $section[0];
                $section = explode('.', $details['Height']);
                $details['LabelHeight'] = $section[0];
            } else {
                $details['LabelWidth'] = str_replace(" mm", "", $details['LabelWidth']);
                $details['LabelHeight'] = str_replace(" mm", "", $details['LabelHeight']);
            }
            if (preg_match("/AAM003/i", $details['CategoryImage'])) {
                $label_type = 'swf_shape';
                $swf_path = base_url() . 'designer/media/irregular/';

            }


            $pdf = base_url() . "theme/site/images/office/pdf/" . $details['pdfFile'];
            $word = base_url() . "theme/site/images/office/word/" . $details['WordDoc'];

            if (preg_match("/&frasl;/is", $details['LabelGapAround'])) {
                $field_data = explode(' &frasl; ', $details['LabelGapAround']);
                $gaparound = str_replace(" mm", "", $field_data[0]);
                $extragaparound = str_replace(" mm", "", $field_data[1]);
            } else {
                $gaparound = str_replace(" mm", "", $details['LabelGapAround']);
                $extragaparound = 0;
            }

            $gapacross = str_replace(" mm", "", $details['LabelGapAcross']);
            $labelgapacross = 0;
            if (preg_match("/SRA3/i", $details['ProductBrand']) || preg_match("/A3/i", $details['ProductBrand']) || preg_match("/A5/i", $details['ProductBrand'])) {
                if (preg_match("/&frasl;/is", $details['LabelGapAcross'])) {
                    $field_data = explode(' &frasl; ', $details['LabelGapAcross']);
                    $gapacross = str_replace(" mm", "", $field_data[0]);
                    $labelgapacross = str_replace(" mm", "", $field_data[1]);
                } else {
                    $labelgapacross = str_replace(" mm", "", $details['LabelGapAcross']);
                    $gapacross = 0;
                }
            }

            $currency = currency;
            if ($currency == "EUR") {
                $symbol = '€';
            } else if ($currency == "USD") {
                $symbol = '$';
            } else {
                $symbol = '£';
            }

            if (preg_match("/SRA3/i", $details['ProductBrand']) || preg_match("/A3/i", $details['ProductBrand']) || preg_match("/A5/i", $details['ProductBrand'])) {
                $print_price = $symbol . '8.39';
                $print_qty = '1';
                $plain_price = $symbol . '5.53';
                $plain_qty = '100';
            } else {
                $print_price = $symbol . '8.39';
                $print_qty = '1';
                $plain_price = $symbol . '5.53';
                $plain_qty = '25';
            }


            $is_manual = ($details['is_manual'] == "N") ? 'false' : 'true';

            $materilcode = $this->home_model->getmaterialcode($details['ManufactureID']);
            $colorcode = $this->home_model->gethexacode($materilcode);
            $hasmaterial = ($colorcode == "ffffff") ? 'false' : 'true';


            if ($is_manual == 'false') {  // is_manual
                header("Content-Type:text/xml");
                echo '<?xml version="1.0" encoding="utf-8"?>
						<data>
							<template>
							    <is_manual>' . $is_manual . '</is_manual>
						    	<id>' . $details['ProductID'] . '</id>	
							    <size>' . $size . '</size>	
								<category>' . $details['CategoryID'] . '</category>
								<code>' . $details['ManufactureID'] . '</code>
								<has_material_color>' . $hasmaterial . '</has_material_color>
								<material_color>' . $colorcode . '</material_color>
								<total_labels>' . $details['LabelsPerSheet'] . '</total_labels>
								<name>' . $Paper_size . '</name>
								<desc>' . $catname . '</desc>
								<template_type>' . $details['Shape_upd'] . '</template_type>
								<label_type>' . $label_type . '</label_type>
								<label_shape_path>' . $swf_path . '</label_shape_path>
								<label_width>' . $details['LabelWidth'] . '</label_width>
								<label_height>' . str_replace(" mm", "", $height) . '</label_height>
								<label_inner_width>' . $label_inner_width . '</label_inner_width>
								<label_inner_height>' . $label_inner_height . '</label_inner_height>
								<label_double_inner_width>' . $label_double_inner_width . '</label_double_inner_width>
								<label_double_inner_height>' . $label_double_inner_height . '</label_double_inner_height>
								<label_across>' . str_replace(" mm", "", $details['LabelAcross']) . '</label_across>
								<label_around>' . str_replace(" mm", "", $details['LabelAround']) . '</label_around>
								<gap_across>' . $gapacross . '</gap_across>
								<extra_gap_across>' . $labelgapacross . '</extra_gap_across>
								<gap_around>' . $gaparound . '</gap_around>
								<extra_gap_around>' . $extragaparound . '</extra_gap_around>
								<top_margin>' . str_replace(" mm", "", $details['LabelTopMargin']) . '</top_margin>
								<bottom_margin>' . str_replace(" mm", "", $details['LabelBottomMargin']) . '</bottom_margin>
								<left_margin>' . str_replace(" mm", "", $details['LabelLeftMargin']) . '</left_margin>
								<right_margin>' . str_replace(" mm", "", $details['LabelRightMargin']) . '</right_margin>
								<corner_radius>' . str_replace(" mm", "", $details['LabelCornerRadius']) . '</corner_radius>
								<pdf>' . $pdf . '</pdf>
								<word>' . $word . '</word>
								<print_price>' . $print_price . '</print_price>
								<print_qty>' . $print_qty . '</print_qty>
								<plain_price>' . $plain_price . '</plain_price>
								<plain_qty>' . $plain_qty . '</plain_qty>
								
							</template>
						</data>';
            } else { // is_manual
                $compare = explode('.', $details['CategoryImage']);
                $a4dies = $this->db->query('select * from flash_manual_labels where die LIKE "' . $compare[0] . '" ')->result();

                header("Content-Type:text/xml");
                $html = '<?xml version="1.0" encoding="utf-8"?><data>
			     <template>
				 <is_manual>' . $is_manual . '</is_manual>
				 <id>' . $details['ProductID'] . '</id>
				 <size>' . $size . '</size>
				 <category>' . $details['CategoryID'] . '</category>
				 <code>' . $details['ManufactureID'] . '</code>
				 <has_material_color>' . $hasmaterial . '</has_material_color>
				 <material_color>' . $colorcode . '</material_color>
				 <template_type>' . $details['Shape_upd'] . '</template_type>
				 <pdf>' . $pdf . '</pdf>
				 <word>' . $word . '</word>
				 <print_price>' . $print_price . '</print_price>
				 <print_qty>' . $print_qty . '</print_qty>
				 <plain_price>' . $plain_price . '</plain_price>
				 <plain_qty>' . $plain_qty . '</plain_qty>
			   	 <labels>';

                foreach ($a4dies as $rowp) {
                    $is_swf_path_image = "";
                    $is_swf_path_bleed = "";
                    if (isset($rowp->image) && $rowp->image != "") {
                        $is_swf_path_image = base_url() . 'designer/media/irregular/' . $rowp->image;
                        $is_swf_path_bleed = base_url() . 'designer/media/irregular/' . $rowp->bleed_image;
                    }
                    $html .= '<label>
						<name></name>
						<desc>desc</desc>
						<label_type>' . $rowp->label_type . '</label_type>
						<label_shape_path>' . $is_swf_path_image . '</label_shape_path>
						<label_bleed_path>' . $is_swf_path_bleed . '</label_bleed_path>
						<label_width>' . $rowp->width . '</label_width>
						<label_height>' . $rowp->height . '</label_height>
						<label_inner_width>' . $rowp->inner_width . '</label_inner_width>
						<label_inner_height>' . $rowp->inner_height . '</label_inner_height>
						<label_xPos>' . $rowp->x_pos . '</label_xPos>
						<label_yPos>' . $rowp->y_pos . '</label_yPos>
						<corner_radius>' . $rowp->corner_radius . '</corner_radius>
						<bleed_area>' . $rowp->bleed_area . '</bleed_area>
						</label>';

                }

                $html .= '</labels></template></data>';
                echo $html;
            } // is_manual

        }
    }

    function suggested_templates_xml()
    {
        header("Content-Type:text/xml");

        $temp_id = $_REQUEST['temp_id'];
        if (isset($temp_id) and $temp_id != '') {

            $result = $this->get_shapes($temp_id);
            if (empty($result)) {
                header("Content-Type:text/xml");
                echo $html = '<?xml version="1.0" encoding="utf-8"?><data></data>';
                die();
            }

            $condition = "";

            if (isset($result[2]->ProductID) && $result[2]->ProductID != "") {
                $condition = 'AND (p.ProductID = ' . $result[0]->ProductID . ' or p.ProductID = ' . $result[1]->ProductID . ' or p.ProductID = ' . $result[2]->ProductID . ')';
            } else
                if (isset($result[1]->ProductID) && $result[1]->ProductID != "") {
                    $condition = 'AND (p.ProductID = ' . $result[0]->ProductID . ' or p.ProductID = ' . $result[1]->ProductID . ')';
                } else {
                    $condition = 'AND (p.ProductID = ' . $result[0]->ProductID . ')';
                }

            $qry = "SELECT * from products p , category  c where SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID $condition  and p.ProductID !=0 ";
            $row = $this->db->query($qry);
            $detail = $row->result();


            header("Content-Type:text/xml");
            $html = '<?xml version="1.0" encoding="utf-8"?><data>';

            foreach ($detail as $details) {
                $x = explode("per", $details->CategoryName);
                $catname = $x[0];
                $code = explode('.', $details->CategoryImage);
                $code = $code[0];


                if (preg_match("/SRA3/i", $details->ProductBrand)) {
                    $Paper_size = "SRA3 Sheets";
                    $size = 'sra3';
                } else if (preg_match("/A5/i", $details->ProductBrand)) {
                    $Paper_size = "A5 Sheets";
                    $size = 'a5';
                } else if (preg_match("/A3/i", $details->ProductBrand)) {
                    $Paper_size = "A3 Sheets";
                    $size = 'a3';
                } else if (preg_match("/Roll/i", $details->ProductBrand)) {
                    exit();
                } else if (preg_match("/Integrated/i", $details->ProductBrand)) {
                    exit();
                } else {
                    $Paper_size = "A4 Sheets";
                    $size = 'a4';
                }


                $details->LabelWidth = $details->LabelWidth;
                $height = $details->LabelHeight;
                $label_type = "";
                $label_inner_width = "";
                $label_inner_height = "";
                $swf_path = '';
                $bleed_size = '';
                $label_double_inner_width = '';
                $label_double_inner_height = '';

                if (preg_match("/AABCL08/i", $details->CategoryImage)) {
                    $label_type = 'square_rectangle_circle';
                    $inner = explode(" (", $details->LabelWidth);
                    $inner2 = explode(" (", $details->LabelHeight);
                    $details->LabelWidth = $inner[0];
                    $height = $inner2[0];
                    $label_inner_width = str_replace(") mm", "", $inner[1]);
                    $label_inner_height = $label_inner_width;
                } else
                    if (preg_match("/AAMM01/i", $details->CategoryImage)) {
                        $label_type = 'double_square_rectangle';
                        $label_inner_width = '';
                        $label_inner_height = $label_inner_width;
                        $label_double_inner_width = str_replace(" mm", "", $details['LowerLabelWidth']);
                        $label_double_inner_height = str_replace(" mm", "", $details['LowerLabelHeight']);
                    } else
                        if (preg_match("/AACR01/i", $details->CategoryImage)) {
                            $label_type = 'triple_circle';
                            $label_inner_width = '51';
                            $label_inner_height = $label_inner_width;
                            $label_double_inner_width = '76';
                            $label_double_inner_height = $label_double_inner_width;
                        } else

                            if ($details->Shape_upd == "Circular") {
                                $height = $details->LabelWidth;
                                if (preg_match("/[)]/is", str_replace(" mm", "", $details->LabelWidth))) {
                                    $label_type = 'double_circle';
                                    $inner = explode("(", $details->LabelWidth);

                                    $details->LabelWidth = $inner[0];
                                    $height = $details->LabelWidth;

                                    $label_inner_width = str_replace(") mm", "", $inner[1]);
                                    $label_inner_height = str_replace(") mm", "", $inner[1]);

                                } else {
                                    $label_type = 'single_circle';
                                }

                            } else if (preg_match("/rectangle/is", $details->Shape_upd) || preg_match("/square/is", $details->Shape_upd)) {
                                $label_type = 'square_rectangle';
                            } else if ($details->Shape_upd == "Oval") {
                                $label_type = 'single_circle';
                            } else {
                                $label_type = 'swf_shape';
                                $swf_path = base_url() . 'designer/media/irregular/';
                                $bleed_size = $details['topbody_blockA'];
                            }

                if (preg_match("/AAD048/i", $details->CategoryImage)) {
                    $label_type = 'perforated_single_circle';
                    $swf_path = "";
                }
                if (preg_match("/AAM003/i", $details->CategoryImage)) {
                    $label_type = 'swf_shape';
                    $swf_path = base_url() . 'designer/media/irregular/';
                    echo "i am here to find bug";

                }

                $details->LabelWidth = str_replace(" mm", "", $details->LabelWidth);
                $details->LabelHeight = str_replace(" mm", "", $details->LabelHeight);

                $pdf = base_url() . "theme/site/images/office/pdf/" . $details->pdfFile;
                $word = base_url() . "theme/site/images/office/word/" . $details->WordDoc;

                if (preg_match("/&frasl;/is", $details->LabelGapAround)) {
                    $field_data = explode(' &frasl; ', $details->LabelGapAround);
                    $gaparound = str_replace(" mm", "", $field_data[0]);
                    $extragaparound = str_replace(" mm", "", $field_data[1]);
                } else {
                    $gaparound = str_replace(" mm", "", $details->LabelGapAround);
                    $extragaparound = 0;
                }

                $gapacross = str_replace(" mm", "", $details->LabelGapAcross);
                $labelgapacross = 0;
                if (preg_match("/SRA3/i", $details->ProductBrand) || preg_match("/A3/i", $details->ProductBrand) || preg_match("/A5/i", $details->ProductBrand)) {
                    if (preg_match("/&frasl;/is", $details->LabelGapAcross)) {
                        $field_data = explode(' &frasl; ', $details->LabelGapAcross);
                        $gapacross = str_replace(" mm", "", $field_data[0]);
                        $labelgapacross = str_replace(" mm", "", $field_data[1]);
                    } else {
                        $labelgapacross = str_replace(" mm", "", $details->LabelGapAcross);
                        $gapacross = 0;
                    }
                }

                $is_manual = ($details->is_manual == "N") ? 'false' : 'true';


                if ($is_manual == 'false') {
                    $html .= '

							<template>
							    <is_manual>' . $is_manual . '</is_manual>
							    <id>' . $details->ProductID . '</id>	
							    <size>' . $size . '</size>	
								<category>' . $details->CategoryID . '</category>
								<code>' . $code . '</code>
								<total_labels>' . $details->LabelsPerSheet . '</total_labels>
								<name>' . $Paper_size . '</name>
								<desc>' . $catname . '</desc>
								<template_type>' . $details->Shape_upd . '</template_type>
								<label_type>' . $label_type . '</label_type>
								<label_shape_path>' . $swf_path . '</label_shape_path>
								<label_width>' . $details->LabelWidth . '</label_width>
								<label_height>' . str_replace(" mm", "", $height) . '</label_height>
								<label_inner_width>' . $label_inner_width . '</label_inner_width>
								<label_inner_height>' . $label_inner_height . '</label_inner_height>
								<label_double_inner_width>' . $label_double_inner_width . '</label_double_inner_width>
								<label_double_inner_height>' . $label_double_inner_height . '</label_double_inner_height>
								<label_across>' . str_replace(" mm", "", $details->LabelAcross) . '</label_across>
								<label_around>' . str_replace(" mm", "", $details->LabelAround) . '</label_around>
								<gap_across>' . $gapacross . '</gap_across>
								<extra_gap_across>' . $labelgapacross . '</extra_gap_across>
								<gap_around>' . $gaparound . '</gap_around>
								<extra_gap_around>' . $extragaparound . '</extra_gap_around>
								<top_margin>' . str_replace(" mm", "", $details->LabelTopMargin) . '</top_margin>
								<bottom_margin>' . str_replace(" mm", "", $details->LabelBottomMargin) . '</bottom_margin>
								<left_margin>' . str_replace(" mm", "", $details->LabelLeftMargin) . '</left_margin>
								<right_margin>' . str_replace(" mm", "", $details->LabelRightMargin) . '</right_margin>
								<corner_radius>' . str_replace(" mm", "", $details->LabelCornerRadius) . '</corner_radius>
								<pdf>' . $pdf . '</pdf>
								<word>' . $word . '</word>
							</template>';
                } else {

                    $compare = explode('.', $details->CategoryImage);
                    $a4dies = $this->db->query('select * from flash_manual_labels where die LIKE "' . $compare[0] . '" ')->result();

                    $html .= '
						 <template>
						 <is_manual>' . $is_manual . '</is_manual>
						 <id>' . $details->ProductID . '</id>
						 <size>' . $size . '</size>
						 <category>' . $details->CategoryID . '</category>
						 <code>' . $details->ManufactureID . '</code>
						 <template_type>' . $details->Shape_upd . '</template_type>
						 <pdf>' . $pdf . '</pdf>
						 <word>' . $word . '</word>
						 <labels>';

                    foreach ($a4dies as $rowp) {
                        $is_swf_path_image = "";
                        $is_swf_path_bleed = "";
                        if (isset($rowp->image) && $rowp->image != "") {
                            $is_swf_path_image = base_url() . 'designer/media/irregular/' . $rowp->image;
                            $is_swf_path_bleed = base_url() . 'designer/media/irregular/' . $rowp->bleed_image;
                        }
                        $html .= '<label>
						<name></name>
						<desc>desc</desc>
						<label_type>' . $rowp->label_type . '</label_type>
						<label_shape_path>' . $is_swf_path_image . '</label_shape_path>
						<label_bleed_path>' . $is_swf_path_bleed . '</label_bleed_path>
						<label_width>' . $rowp->width . '</label_width>
						<label_height>' . $rowp->height . '</label_height>
						<label_inner_width>' . $rowp->inner_width . '</label_inner_width>
						<label_inner_height>' . $rowp->inner_height . '</label_inner_height>
						<label_xPos>' . $rowp->x_pos . '</label_xPos>
						<label_yPos>' . $rowp->y_pos . '</label_yPos>
						<corner_radius>' . $rowp->corner_radius . '</corner_radius>
						<bleed_area>' . $rowp->bleed_area . '</bleed_area>
						</label>';
                    }
                    $html .= '</labels></template>';
                }
            }

            $html .= '</data>';
            echo $html;
        }
    }

    function get_shapes($product)
    {

        $sql = $this->db->query("select p.Shape_upd,p.ProductBrand,c.Width,c.Height from products p, category c where SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID and p.ProductID = '$product' ");
        $result = $sql->row_array();


        $shape = "p.Shape_upd NOT LIKE '" . $result['Shape_upd'] . "' and(p.Shape_upd  LIKE 'Circular' || p.Shape_upd  LIKE 'rectangle' || p.Shape_upd  LIKE 'square' || p.Shape_upd  LIKE 'Oval')";
        //$shape  = $result['Shape_upd'];
        $brand = $result['ProductBrand'];
        $width = $result['Width'];
        $Height = $result['Height'];
        $h1 = $Height - 100;
        $h2 = $Height + 100;
        $w1 = $width - 100;
        $w2 = $width + 100;


        $qry = "SELECT DISTINCT (p.Shape_upd), p.ProductID FROM products p, category  c where SUBSTRING_INDEX( p.CategoryID, 'R', 1 ) = c.CategoryID and c.FlashActive LIKE 'Y' and p.ProductBrand LIKE '$brand' and $shape and  (c.Width BETWEEN '$w1' AND '$w2' or c.Height BETWEEN '$h1' AND '$h2' ) group by p.Shape_upd LIMIT 0,3";
        $row = $this->db->query($qry);
        $detail = $row->result();
        //print_r($detail); die();
        return $detail;


    }


    //*******-----------*************-----------************-------------************------------************-------------

    function fetch_all_association_list()
    {
        $is_associated = 'false';
        $design_id = $this->input->post('design_id');

        $qry = $this->db->query("select associate_id from flash_designs where ID = '" . $design_id . "' ");
        $qry = $qry->row_array();
        $design_associate_id = $qry['associate_id'];

        $qry = $this->db->query("select * from flash_designs where associate_id = '" . $design_associate_id . "'");
        $sql1 = $qry->result();
        if (count($sql1) > 1) {
            $is_associated = 'true';
        }


        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?>';
        $html .= '<result is_associated="' . $is_associated . '">';
        foreach ($sql1 as $row) {
            $html .= '<product p_id="' . $row->CategoryID . '"  d_id="' . $row->ID . '" />';
        }
        $html .= '</result>';
        echo $html;


    }


    function update_admin_design_one()
    {

        $is_associated = 'false';
        $response = 'false';
        $design_id = $this->input->post('design_id');
        $design_image = $this->input->post('design_image');
        $xml_string = $this->input->post('xml_string');

        $xml_string = $this->replace_xml_string($xml_string);

        $qry = $this->db->query("select * from flash_designs where ID = '" . $design_id . "'");
        $sql = $qry->row_array();

        if ($sql['ID'] == $sql['associate_id']) {
            $query = $this->db->query("select * from flash_designs where associate_id = '" . $design_id . "' and  ID != '" . $design_id . "' ORDER BY ID ASC  limit 1");
            $data = $query->row_array();
            if (isset($data['ID']) && $data['ID'] != '') {
                $this->db->where('associate_id', $design_id);
                $this->db->update('flash_designs', array('associate_id' => $data['ID']));
            }
        }

        $items = array(
            'CategoryID' => $sql['CategoryID'],
            'tCode' => $sql['tCode'],
            'design_category_id' => $sql['design_category_id'],
            'design_sub_category_id' => $sql['design_sub_category_id'],
            'design_image' => $design_image,
            //'xml_string'=>$xml_string
        );

        $this->db->insert('flash_designs', $items);
        $id = $this->db->insert_id();

        /************* XML DESIGN SETTINGS - Arslan *****************/
        $this->save_xml_file($id, $xml_string, 'system');
        /***********************************************************/

        $this->db->where('ID', $id);
        $this->db->update('flash_designs', array('associate_id' => $id));

        $url = $this->documen_path . '/designer/media/design/';
        $file = $sql['design_image'];
        @unlink($url . $file);


        $this->db->where('ID', $design_id);
        $this->db->delete('flash_designs');

        $response = 'true';

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" associate_id="' . $id . '" design_id="' . $id . '" ></result>';
        $html .= '</data>';
        echo $html;

    }


    function update_admin_design_all()
    {

        $response = 'false';
        $design_id = $this->input->post('design_id');
        $design_image = $this->input->post('design_image');
        $xml_string = $this->input->post('xml_string');

        $xml_string = $this->replace_xml_string($xml_string);

        $query = $this->db->query("select * from flash_designs where ID = '" . $design_id . "'");
        $output = $query->row_array();

        $url = $this->documen_path . '/designer/media/design/';
        $file = $output['design_image'];
        @unlink($url . $file);

        $items =
            array(
                'design_image' => $design_image,
                // 'xml_string'=>$xml_string
            );

        /************* XML DESIGN SETTINGS - Arslan *****************/
        $this->save_xml_file($design_id, $xml_string, 'system');
        /***********************************************************/


        $this->db->where('ID', $design_id);
        $this->db->update('flash_designs', $items);

        $qry = $this->db->query("select * from flash_designs where ID = '" . $design_id . "'");
        $sql = $qry->row_array();
        $associate_id = $sql['associate_id'];

        $response = 'true';

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" associate_id="' . $associate_id . '" design_id="' . $design_id . '" ></result>';
        $html .= '</data>';
        echo $html;
    }


    function save_admin_design()
    {
        $response = 'false';

        if ($_POST) {

            $associate_id = $this->input->post('design_associate_id'); // // default 0
            $is_associate = $this->input->post('is_associate'); // // default 0

            $temp_id = $this->input->post('temp_id');
            $t_code = $this->input->post('t_code');

            /********/ /********/ /********/ /********/ /********/

            $design_id = $this->input->post('design_id');   // default 0
            $design_category_id = $this->input->post('design_category_id');   //''
            $design_sub_category_id = $this->input->post('design_sub_category_id');   //''
            $design_image = $this->input->post('design_image');
            $xml_string = $this->input->post('xml_string');

            $xml_string = $this->replace_xml_string($xml_string);

            /********/ /********/ /********/ /********/ /********/

            $items =
                array(
                    'CategoryID' => $temp_id,
                    'tCode' => $t_code,
                    'design_category_id' => $design_category_id,
                    'design_sub_category_id' => $design_sub_category_id,
                    'design_image' => $design_image,
                    //'xml_string'=>$xml_string,
                );

            if (isset($is_associate) and ($is_associate == true || $is_associate == 'true')) {
                $items = array_merge($items, array('associate_id' => $associate_id));
            }

            $this->db->insert('flash_designs', $items);
            $id = $this->db->insert_id();

            if (isset($is_associate) and ($is_associate == false || $is_associate == 'false')) {
                $this->db->where('ID', $id);
                $this->db->update('flash_designs', array('associate_id' => $id));
            }

            if ($id) {
                $response = 'true';
                $design_id = $id;
                $associate_id = $id;

                /************* XML DESIGN SETTINGS - Arslan *****************/
                $this->save_xml_file($design_id, $xml_string, 'system');
                /***********************************************************/

            }

            if (isset($is_associate) and ($is_associate == true || $is_associate == 'true')) {
                $associate_id = $associate_id;
            }

        }

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" associate_id="' . $associate_id . '" design_id="' . $design_id . '" ></result>';
        $html .= '</data>';
        echo $html;
    }


    function save_design_images()
    {


        $img_name = $_REQUEST['img_name'];
        $img_type = $_REQUEST['img_type']; //(admin, user) || (sheet, canvas)
        $user_id = $_REQUEST['user_id'];
        $user_type = $_REQUEST['user_type'];
        $status = 'false';
        $filename = '';

        if (isset($user_type) && $user_type == "user" && $img_type == 'canvas') {
            $url = $this->documen_path . '/designer/media/thumb/';
        } else
            if (isset($user_type) && $user_type == "user" && $img_type == 'sheet') {
                $url = $this->documen_path . '/designer/media/sheets/';;
            } else
                if (isset($user_type) && $user_type == "admin" && $img_type == 'canvas') {
                    $url = $this->documen_path . '/designer/media/design/';

                } else
                    if (isset($img_type) && $img_type == "gallery") {
                        $url = $this->documen_path . '/designer/media/user_define/';
                    } else
                        if (isset($img_type) && $img_type == 'pdf') {
                            $url = $this->documen_path . '/theme/integrated_attach/';
                        }


        if ($img_type == 'canvas' OR $img_type == 'sheet' OR $img_type == 'pdf') {
            $img_data = file_get_contents('php://input');
            $img_data = substr($img_data, 0, strlen($img_data));
            $filename = $url . $img_name;
            if (file_put_contents($filename, $img_data) != false) {
                $filename = $img_name;
                $status = 'true';
            }
        } else if (!empty($_FILES)) {
            $response = $this->upload_images('Filedata', $url, $img_name);
            if ($response != 'error') {
                if (isset($img_type) and $img_type == 'gallery') {
                    $items = array(
                        'UserID' => $user_id,
                        'image' => $img_name,
                    );
                    $this->db->insert('flash_user_gallery', $items);
                }
                $status = 'true';
                $filename = $response;
            }
        }

        echo $status;
    }


    function upload_images($field_name, $folder = NULL, $img_name)
    {

        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'png|jpg|jpeg|gif';
        $config['max_size'] = '10000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';
        $config['file_name'] = $img_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($field_name)) {
            //return $this->upload->display_errors();
            return "error";
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }

    function get_designs_categories()
    {

        $is_admin = $_REQUEST['isAdmin'];
        $t_code = $_REQUEST['t_code'];
        $is_admin = 'true';

        $desgin = ($is_admin == 'true') ? $this->category() : $this->web_category($t_code);

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        foreach ($desgin as $row) {
            $sub = ($is_admin == 'true') ? $this->subcategory($row->ID) : $this->web_subcategory($row->ID, $t_code);
            if ($sub != false) {
                $html .= '<category id="' . $row->ID . '" name="' . $row->name . '">';
                foreach ($sub as $p) {
                    $html .= '<sub_cate name="' . $p->name . '" id="' . $p->ID . '"/>';
                }
                $html .= '</category>';
            }
        }

        $html .= '</data>';
        echo $html;
    }

    function category()
    {
        $query = $this->db->query("SELECT * FROM `flash_designs_category` WHERE status LIKE 'active'");
        return $query->result();
    }

    function web_category($t_code)
    {
        $query = $this->db->query('SELECT * FROM flash_designs f inner join flash_designs_category c on f.design_category_id = c.ID where c.status LIKE "active" and f.tCode LIKE "' . $t_code . '" group by f.design_category_id ');
        return $query->result();
    }

    function subcategory($id)
    {
        $query = $this->db->query("SELECT * FROM `flash_designs_subcategory` WHERE parent_category =$id AND status LIKE 'active'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function web_subcategory($id, $t_code)
    {
        $query = $this->db->query("SELECT * FROM flash_designs f inner join flash_designs_subcategory c on f.design_sub_category_id = c.ID where c.status LIKE 'active' and  f.design_category_id LIKE $id and f.tCode LIKE '" . $t_code . "' group by f.design_sub_category_id");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    function get_designs()
    {
        $html = '';
        header("Content-Type:text/xml");

        $t_code = $this->input->get('t_code');;
        if (!isset($t_code) and $t_code == '') {
            $t_code = $this->input->post('t_code');
        }

        $category_id = $this->input->get('category_id');;
        if (!isset($category_id) and $category_id == '') {
            $category_id = $this->input->post('category_id');
        }

        $sub_cate_id = $this->input->get('sub_cate_id');;
        if (!isset($sub_cate_id) and $sub_cate_id == '') {
            $sub_cate_id = $this->input->post('sub_cate_id');
        }

        $is_admin = $this->input->get('is_admin');;


        $html .= '<?xml version="1.0" encoding="utf-8"?>';
        $html .= '<data>';

        $desings = $this->fetch_design($sub_cate_id, $t_code);

        if (isset($is_admin) and $is_admin == 'true') {
            $html .= '<design>
						<id>new</id>
						<image>' . $this->design_image_path . 'new_design.jpg</image>
						<name>Start with Blank Template</name>
					</design>';
        }

        if ($is_admin != 'true') {
            $html .= '<design>
						<id>new</id>
						<image>' . $this->design_image_path . 'new_design.jpg</image>
						<name>Start with a Blank Design</name>
					</design>';

            $html .= '<design>
				<id>saved</id>
				<image>' . $this->design_image_path . 'save_design.jpg</image>
				<name>My Saved Designs</name>
			</design>';

            //	for($i=1;$i<=4;$i++){
//				$html .= '<design>
//						<id>new</id>
//						<image>'.$this->design_image_path.$i.'.jpg</image>
//						<name>Design no. 9482'.$i.'</name>
//					</design>';
//
//				}
        }

        if ($desings != false) {
            foreach ($desings as $row) {

                $path = $this->design_image_path . $row->design_image;
                $html .= '<design>
								<id>' . $row->ID . '</id>
								<design_associate_id>' . $row->associate_id . '</design_associate_id>
								<image>' . $path . '</image>
								<name>Design No.' . $row->ID . '</name>
							</design>';
            }
        }
        $html .= '</data>';
        echo $html;


    }

    function fetch_design($id = NULL, $temp = NULL)
    {

        $condition = '';
        if (isset($id) and $id != NULL and $id != '') {
            $condition = " WHERE design_sub_category_id = $id and tCode LIKE '$temp'";
        }
        $query = $this->db->query("select * from flash_designs $condition");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_design_settings()
    {

        $design_id = $this->input->get('design_id');
        if (!isset($design_id) and $design_id == '') {
            $design_id = $this->input->post('design_id');
        }
        $temp_id = $this->input->get('temp_id');;
        if (!isset($temp_id) and $temp_id == '') {
            $temp_id = $this->input->post('temp_id');
        }

        header("Content-Type:text/xml");


        /************* XML DESIGN SETTINGS - Arslan *****************/
        $xml_string = $this->read_xml_file($design_id, 'system');
        echo $xml_string = $this->replace_xml_string($xml_string);
        /***********************************************************/

        /*$query = $this->db->query("SELECT xml_string FROM  `flash_designs` WHERE ID = $design_id ");
			$row = $query->row_array();
			if(isset($row['xml_string']) and $row['xml_string']!=''){
				echo $xml_string = $this->replace_xml_string($row['xml_string']);
			}*/
    }


    function gallery()
    {
        $desgin = $this->gallary_category();
        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        foreach ($desgin as $row) {
            $sub = $this->gallary_subcategory($row->ID);
            if ($sub != false) {
                $html .= '<category name="' . $row->name . '">';
                foreach ($sub as $p) {
                    $gal = $this->gallary_images($p->ID);
                    if ($gal != false) {
                        $html .= '<sub_category name="' . $p->name . '" >';
                        foreach ($gal as $g) {
                            $html .= '<image_path>' . $this->gallery_path . $g->image . '</image_path>';
                        }

                        $html .= '</sub_category>';
                    }
                }
                $html .= '</category>';
            }
        }
        echo $html .= '</data>';


    }

    function gallary_category()
    {
        $query = $this->db->query("select * from flash_gallery_category where status like 'active'  ORDER BY name ASC");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    function gallary_subcategory($id)
    {
        $query = $this->db->query("select * from flash_gallery_subcategory WHERE parent_category=$id and  status like 'active' ORDER BY name ASC");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    function gallary_images($id)
    {
        $query = $this->db->query("select * from flash_gallary WHERE sub_gallary_id=$id order by ID desc");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }


//-------------------------------------------------------------KAMRAN SHAPE CODE---------------------------------------------------------------------------------


    function viewshapes()
    {

        $allcategories = $this->getcategory();
        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $path = $this->shape_path;

        foreach ($allcategories as $category) {

            $html .= '<category name="' . $category->Name . '">';
            $shapes = $this->getshapes($category->ID);

            foreach ($shapes as $allshapes) {
                $icon = $allshapes->icon;
                $shape = $allshapes->Shape;
                $fill = (0 == $allshapes->fill) ? 'false' : 'true';
                $stroke = (0 == $allshapes->stroke) ? 'false' : 'true';

                $html .= '<shape>';
                $html .= '<icon>' . $path . $icon . '</icon>';
                $html .= '<shape>' . $path . $shape . '</shape>';
                $html .= '<canFillEnable>' . $fill . '</canFillEnable>';
                $html .= '<canStrokeEnable>' . $stroke . '</canStrokeEnable>';
                $html .= '</shape>';

            }


            $html .= '</category>';
        }

        echo $html .= '</data>';
    }


    function getcategory()
    {
        $qry = $this->db->query("select * from flash_shape_category where active LIKE 'Y'");
        return $qry->result();
    }

    function getshapes($id)
    {
        $qry = $this->db->query("select * from flash_shapes where CategoryID = '$id' and active = 1");
        return $qry->result();
    }

//-------------------------------------------------------------KAMRAN SIGIN CODE---------------------------------------------------------------------------------


    function signin()
    {

        $response = "false";
        $userid = "";

        $user_email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $isRemember = $_REQUEST['isRemember'];
        $password = md5($password);


        $query = $this->db->query("SELECT *,count(UserEmail) as total FROM customers WHERE UserEmail = '$user_email' AND UserPassword = '$password'");
        $userdata = $query->row_array();


        if ($userdata['total'] > 0) {

            $newdata = array(
                'userid' => $userdata['UserID'],
                'UserName' => $userdata['BillingFirstName'],
                'logged_in' => true
            );

            $this->session->set_userdata($newdata);
            $userid = $this->session->userdata('userid');
            //new coding
            $session_id = $this->session->userdata('session_id');
            $this->db->update('flash_user_design', array('UserID' => $userid), array('SID' => $session_id, 'UserID' => 0));
            //new coding
            $response = "true";

        }

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" id="' . $userid . '"></result>';
        $html .= '</data>';
        echo $html;

    }


//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------

    function signup()
    {

        $response = "false";
        $id = "";

        if ($_REQUEST) {
            $val = $_REQUEST['email'];
            $counter = $this->email_validate($val);
            if ($counter > 0) {
                header("Content-Type:text/xml");
                $html = '<?xml version="1.0" encoding="utf-8"?><data>';
                $html .= '<result success="' . $response . '" id="' . $id . '"></result>';
                $html .= '</data>';
                echo $html;
                die();
            }
        }

        if ($_REQUEST) {
            $data['BillingFirstName'] = $_REQUEST['first_name'];
            $data['DeliveryFirstName'] = $_REQUEST['first_name'];
            $data['UserName'] = $_REQUEST['first_name'];
            $data['RegisteredDate'] = date('Y-m-d');
            $data['RegisteredTime'] = date('H:i:s');
            $data['BillingLastName'] = $_REQUEST['last_name'];
            $data['DeliveryLastName'] = $_REQUEST['last_name'];
            $data['Active'] = 0;
            $data['DeliveryEmail'] = $_REQUEST['email'];
            $data['UserEmail'] = $_REQUEST['email'];
            $data['UserPassword'] = md5($_REQUEST['password']);
            $data['UserTypeID'] = 14;
            $data_temp['email'] = $_REQUEST['email'];


            $str = $this->db->insert_string('customers', $data);
            $query = $this->db->query($str);
            if ($query) {

                $act_code = md5(rand(0, 1000) . 'uniquefrasehere');
                $temp = $this->db->query("SELECT * FROM customers WHERE UserEmail = '" . $data_temp['email'] . "'");
                $res = $temp->result_array();
                $id = $res[0]['UserID'];
                $activate['UserID'] = $res[0]['UserID'];
                $activate['account_token_number'] = $act_code;
                $activate['account_token_email'] = $data_temp['email'];
                $activate['reg_time'] = time();

                $str_tmp = $this->db->insert_string('account_activation', $activate);
                $query_tmp = $this->db->query($str_tmp);
                if ($query_tmp) {

                    $mail_template = $this->email_template(103);
                    $mailTitle = $mail_template[0]['MailTitle'];
                    $mailName = $mail_template[0]['Name'];
                    $from_mail = $mail_template[0]['MailFrom'];
                    $mailSubject = $mail_template[0]['MailSubject'];
                    $mailText = $mail_template[0]['MailBody'];

                    $url = base_url('theme') . '/';
                    $code = base64_encode($res[0]['UserID']);
                    $link = base_url() . 'users/act/' . $act_code . '-' . $code;

                    $strINTemplate = array('[WEBROOT]', "[UserName]", "[link]", "[email]");
                    $strInDB = array($url, $res[0]['BillingFirstName'], $link, $data_temp['email']);
                    $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);

                    $this->load->library('email');
                    $this->email->from('support@aalabels.com', 'AALABELS');
                    $this->email->to($data_temp['email']);
                    $this->email->subject($mailSubject);
                    $this->email->message($newPhrase);
                    $this->email->set_mailtype("html");
                    $this->email->send();

                }
                $response = "true";

            }

        }

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" id="' . $id . '"></result>';
        $html .= '</data>';
        echo $html;

    }


//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------

    function email_template($mailid)
    {
        $where = "mailid = $mailid";
        $qry = $this->db->query("SELECT * FROM " . Template_Table . " WHERE " . $where . "");
        return $qry->result_array();
    }

    function email_validate($val)
    {
        $qry = $this->db->query("SELECT count(*) as total FROM  `customers` WHERE  `UserEmail` =  '" . $val . "'");
        $res = $qry->row_array();
        return $res['total'];

    }


//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------

    function forgotPassword()
    {
        $email = $_REQUEST['email'];
        $response = 'false';

        $qry = $this->db->query("SELECT * FROM customers WHERE UserEmail = '" . $email . "'");
        $rec = $qry->num_rows();
        if ($rec != 0) {
            $res = $qry->result_array();
            $act_code = md5(rand(0, 1000) . 'uniquefrasehere');

            $activate['UserID'] = $res[0]['UserID'];
            $activate['TokenNumber'] = $act_code;
            $activate['UserEmail'] = $email;
            $activate['TokenTime'] = time();

            $str_tmp = $this->db->insert_string('forgetpasswordtoken', $activate);
            $query_tmp = $this->db->query($str_tmp);

            if ($query_tmp) {
                $mail_template = $this->email_template(2);
                $mailTitle = $mail_template[0]['MailTitle'];
                $mailName = $mail_template[0]['Name'];
                $from_mail = $mail_template[0]['MailFrom'];
                $mailSubject = $mail_template[0]['MailSubject'];
                $mailText = $mail_template[0]['MailBody'];
                $url = base_url('theme') . '/';
                $code = base64_encode($res[0]['UserID']);
                $link = base_url() . 'users/changepassword?token=' . $act_code . '-' . $code;
                $strINTemplate = array('[WEBROOT]', "[EmailAddress]", "[password]");
                $strInDB = array($url, $email, $link);
                $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);

                $this->load->library('email');
                $this->email->from($from_mail, 'AALABELS');
                $this->email->to($email);
                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");
                $this->email->send();
                $response = 'true';
            }
        }

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '"></result>';
        $html .= '</data>';
        echo $html;

    }

//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------

    function save_user_design()
    {

        $response = 'false';
        $value = '';

        if ($_REQUEST) {
            $temp_id = $_REQUEST['temp_id'];
            $design_id = $_REQUEST['user_project_id'];   //''
            $user_id = $_REQUEST['user_id'];   //''
            $project_name = $_REQUEST['project_name'];   //''
            $design_image = $_REQUEST['sheet_image'];
            $canvas_image = $_REQUEST['canvas_image'];
            $xml_string = $_REQUEST['xml_string'];
            $xml_string = $this->replace_xml_string($xml_string);

            $session_id = $this->session->userdata('session_id');
            $is_template = $_REQUEST['is_template_selected'];
            // new coding
            if (!isset($user_id) || ($user_id) == '') {
                $user_id = 0;
            }
            // new coding
            $design_type = (isset($is_template) && $is_template == "true") ? 'Temp' : 'LD';

            if (isset($design_id) and $design_id) {

                /************* XML DESIGN SETTINGS - Arslan *****************/
                $this->save_xml_file($design_id, $xml_string, 'user');
                /***********************************************************/

                $items = array('Name' => $project_name,
                    'xml_string' => $xml_string,
                    'Thumb' => $canvas_image,
                );
                $this->db->where('ID', $design_id);
                $this->db->update('flash_user_design', $items);
                $response = 'true';
                $value = $design_id;


            } else {
                $items = array('CategoryID' => $temp_id,
                    'SID' => $session_id,
                    'Thumb' => $canvas_image,
                    'xml_string' => $xml_string,
                    'UserID' => $user_id,
                    'Type' => $design_type,
                    'Name' => $project_name,
                    'status' => 'Y'
                );
                $this->db->insert('flash_user_design', $items);
                $id = $this->db->insert_id();
                if ($id) {
                    $response = 'true';
                    $value = $id;

                    /************* XML DESIGN SETTINGS - Arslan *****************/
                    $this->save_xml_file($id, $xml_string, 'user');
                    /***********************************************************/

                }
            }

        }

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" id="' . $value . '"></result>';
        $html .= '</data>';
        echo $html;


    }

//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------

    function user_saved_templates()
    {

        $userid = $_REQUEST['user_id'];
        $is_template = $_REQUEST['is_template_selected'];
        $design_type = (isset($is_template) && $is_template == "true") ? 'Temp' : 'LD';
        $sql = $this->db->query("select * from flash_user_design where UserID = '$userid' and status ='Y' and Type = '" . $design_type . "'");
        $results = $sql->result();


        $html = "";
        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';


        foreach ($results as $result) {


            $img = $result->Thumb;
            $url = base_url() . 'designer/media/thumb/' . $img;


            $html .= '<project>';
            $html .= '<name>' . $result->Name . '</name>';
            $html .= '<template_id>' . $result->CategoryID . '</template_id>';
            $html .= '<user_project_id>' . $result->ID . '</user_project_id>';
            $html .= '<project_image_path>' . $url . '</project_image_path>';
            $html .= '</project>';
        }


        $html .= '</data>';
        echo $html;

    }


//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------
    function delete_user_template()
    {

        $userid = $_REQUEST['user_id'];
        $user_project_id = $_REQUEST['user_project_id'];

        $is_template = $this->db->query("select * from flash_user_design where ID = '$user_project_id'")->row_array();
        $design_type = (isset($is_template['Type']) && $is_template['Type'] == "Temp") ? 'Temp' : 'LD';

        $this->db->where('ID', $user_project_id);
        $this->db->delete('flash_user_design');

        $sql = $this->db->query("select * from flash_user_design where UserID = '$userid' and status ='Y' and Type = '" . $design_type . "'");
        $results = $sql->result();

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';

        foreach ($results as $result) {

            $img = $result->Thumb;
            $url = base_url() . 'designer/media/thumb/' . $img;

            $html .= '<project>';
            $html .= '<name>' . $result->Name . '</name>';
            $html .= '<template_id>' . $result->CategoryID . '</template_id>';
            $html .= '<user_project_id>' . $result->ID . '</user_project_id>';
            $html .= '<project_image_path>' . $url . '</project_image_path>';
            $html .= '</project>';

        }

        echo $html .= '</data>';

    }


//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------

    function user_gallery()
    {

        $userid = $_REQUEST['user_id'];
        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';


        $sql = $this->db->query("select * from flash_user_gallery where UserID = '$userid'");
        $results = $sql->result();

        foreach ($results as $result) {
            $path = $this->upload_path . $result->image;
            $html .= '<image_path>' . $path . '</image_path>';

        }
        echo $html .= '</data>';

    }


    function user_login_checker()
    {
        $response = "false";
        $id = "";
        $UserName = "";

        $user = $this->session->userdata('userid');
        $login = $this->session->userdata('logged_in');

        if (isset($user) and $login == true) {
            $id = $user;
            $response = "true";
            $UserName = $this->session->userdata('UserName');
        }


        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" id="' . $id . '" username="' . $UserName . '"></result>';
        $html .= '</data>';
        echo $html;

    }


    function get_user_designs_xml()
    {

        $design_id = $this->input->get('design_id');
        if (!isset($design_id) and $design_id == '') {
            $design_id = $this->input->post('design_id');
        }

        header("Content-Type:text/xml");

        /************* XML DESIGN SETTINGS - Arslan *****************/
        $xml_string = $this->read_xml_file($design_id, 'user');
        echo $xml_string = $this->replace_xml_string($xml_string);
        /***********************************************************/


        /*$query = $this->db->query("SELECT  xml_string FROM  `flash_user_design` WHERE ID = $design_id ");
			$row = $query->row_array();
			if(isset($row['xml_string']) and $row['xml_string']!=''){
				echo  $xml_string  = $this->replace_xml_string($row['xml_string']);
			}*/
    }


//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------

    function get_temp_design()
    {

        $temp_design_id = $_REQUEST['temp_design_id'];

        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?>';

        $qry = "SELECT * from flash_temp_design where ID ='$temp_design_id' ";
        $row = $this->db->query($qry);
        $detail = $row->row_array();

        echo $xml_string = $this->replace_xml_string($detail['xml_string']);
    }


//-------------------------------------------------------------KAMRAN SIGNUP CODE---------------------------------------------------------------------------------


    function save_buy_print_images()
    {
        $img_name = $_REQUEST['img_name'];
        $img_type = $_REQUEST['img_type'];
        $saved_canvas_id = $_REQUEST['saved_canvas_id'];
        $response = 'false';

        $url = ($img_type == 'canvas') ? PATH . '/canvas/' : PATH . '/';

        $placeholder = ($img_type == 'canvas') ? 'Thumb' : 'file';

        $img_data = file_get_contents('php://input');
        $img_data = substr($img_data, 0, strlen($img_data));
        $filename = $url . $img_name;
        if (file_put_contents($filename, $img_data) != false) {
            $filename = $img_name;
            $response = 'true';
        }


        if (isset($saved_canvas_id) && $saved_canvas_id != "") {
            $this->db->where('ID', $saved_canvas_id);
            $this->db->update('integrated_attachments', array($placeholder => $filename));

        } else {
            $this->db->insert('integrated_attachments', array($placeholder => $filename));
            $saved_canvas_id = $this->db->insert_id();

        }


        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" id="' . $saved_canvas_id . '"></result>';
        $html .= '</data>';
        echo $html;

    }

    function ProductBrand($id)
    {
        $query = $this->db->query("select  ProductBrand from products  where ManufactureID='" . $id . "'");
        $res = $query->row_array();
        return $res['ProductBrand'];
    }


    function calculate_price()
    {

        $response = 'false';
        $html = '';
        $print_type = '';
        if ($_REQUEST) {

            $qty = $_REQUEST['qty'];
            $menu = $_REQUEST['menuid'];
            $labels = $_REQUEST['labels'];
            $labeltype = $_REQUEST['labeltype'];
            $productid = $_REQUEST['temp_id'];
            $print_type = $_REQUEST['print_type'];

            $save_txt = '';
            $price = '';
            $ProductBrand = $this->ProductBrand($menu);
            if (isset($labeltype) and $labeltype == 'printed') {
                $minqty = 0;
            } else {
                $minqty = 24;
            }


            if (isset($qty) and ($qty > $minqty and $qty <= 50000)) {
                $data = $this->product_model->ajax_price($qty, $menu);
                //$data2=$this->product_model->ajax_second_price($qty,$menu);

                $price = $data['custom_price'];
                $printprice = 0.00;
                $designprice = 0.00;
                $printoption = 'plain';

                if ($labeltype == 'printed') {


                    if ($qty < 25) {

                        $data = $this->product_model->calculate_lba_price($qty, $menu);
                        $price = $data['plainprice'];
                        $designprice = 0.00;
                        $printprice = $data['printprice'];
                        if ($print_type == 'black') {
                            $printprice = $data['printprice'] - ($data['printprice'] * 0.05);   // 5% discount if Mono Printing
                        }

                    } else {
                        //$printprice = $this->home_model->calculate_printed_sheets($qty,$print_type,1);
                        $printprice = $this->home_model->calculate_printed_sheets($qty, $print_type, 1, 'A4 Label', $menu);

                        $designprice = $printprice['desginprice'];
                        $printprice = $printprice['price'];
                        $printoption = 'printed';
                    }


                }

                //$price1  = $data2['custom_price1'];
                $price = $this->home_model->currecy_converter($price, 'yes');
                $printprice = $this->home_model->currecy_converter($printprice, 'yes');
                $designprice = $this->home_model->currecy_converter($designprice, 'yes');

                $plain = number_format($price, 2, '.', '');
                $price = $designprice + $printprice + $price;
                $price = number_format($price, 2, '.', '');

                if (preg_match("/A4 Labels/is", $ProductBrand) and (preg_match("/WPEP/i", $menu))) {
                    //$wpep_discount = (($plain) * (40 / 100));
                    //$price = number_format(($price - $wpep_discount),2,'.','');
                }

                $response = 'true';
            }

            $currency = currency;
            if ($currency == "EUR") {
                $symbol = '€';
            } else if ($currency == "USD") {
                $symbol = '$';
            } else {
                $symbol = '£';
            }

            $price = number_format($price, 2, '.', '');
            header("Content-Type:text/xml");
            $html = '<?xml version="1.0" encoding="utf-8"?><data>';
            $html .= '<result success="' . $response . '" price="' . $price . '" vatoption="' . vatoption . ' VAT" symbol="' . $symbol . '"></result>';
            $html .= '</data>';
            echo $html;

        }
    }


    function add_to_cart()
    {


        $response = 'false';
        $print_type = '';
        if ($_POST) {

            $qty = $this->input->post('qty');
            $menu = $this->input->post('menuid');
            $productid = $this->input->post('temp_id');
            $LabelsPerRoll = $this->input->post('labels');
            $labeltype = $this->input->post('labeltype');
            $print_type = $this->input->post('print_type');
            $user_project_id = $this->input->post('user_project_id');

            if ($print_type == 'black') {
                $print_type = 'Mono';
            }

            $SID = $this->session->userdata('session_id');
            $img_name = $this->input->post('img_name');
            $pdf_name = $this->input->post('pdf_name');

            $design = 1;
            $A4Printing = array();


            /*****************WPEP Offer************/
            $wpep_discount = 0.00;
            $data = $this->product_model->ajax_price($qty, $menu);
            $total = $data['custom_price'];

            $ProductBrand = $this->ProductBrand($menu);
            if (preg_match("/A4 Labels/i", $ProductBrand) and (preg_match("/WPEP/i", $menu))) {
                //$data['custom_price'] = ($data['custom_price']*1.2);
                //$wpep_discount = (($data['custom_price'])*(40/100));
                //$total = $data['custom_price']-$wpep_discount;
                //$total = $total/1.2;
            }
            /*****************WPEP Offer************/


            /****************Printed Labels Options*************/
            if (isset($labeltype) and $labeltype == 'printed') {

                $designprice = 0.00;
                if ($qty < 25) {

                    $data = $this->product_model->calculate_lba_price($qty, $menu);
                    $total = $data['plainprice'];
                    $designprice = 0.00;
                    $printprice = $data['printprice'];
                    if ($print_type == 'Mono') {
                        $printprice = $data['printprice'] - ($data['printprice'] * 0.05);   // 5% discount if Mono Printing
                    }

                } else {
                    $printprice = $this->home_model->calculate_printed_sheets($qty, $print_type, $design, 'A4 Label', $menu);
                    $designprice = $printprice['desginprice'];
                    $printprice = $printprice['price'];
                    $printprice = $printprice + $designprice;
                }

                $Print_Design = '1 Design';

                $A4Printing = array('Printing' => 'Y',
                    'Print_Type' => $print_type,
                    'Print_Design' => $Print_Design,
                    'Free' => 1,
                    'Print_Qty' => $design,
                    'Print_UnitPrice' => $printprice,
                    'Print_Total' => $printprice,
                    'user_project_id' => $user_project_id);

            }
            /****************Printed Labels Options*************/

            $unit_price = $total / $qty;
            $SID = $this->shopping_model->sessionid();
            $items = array('SessionID' => $SID,
                'ProductID' => $productid,
                'OrderTime' => 'NOW()',
                'Quantity' => $qty,
                'orignalQty' => $qty,
                'UnitPrice' => $unit_price,
                'TotalPrice' => $total,
                'LabelsPerRoll' => $LabelsPerRoll,
                'source' => 'flash');
            $items = array_merge($items, $A4Printing);
            $this->db->insert('temporaryshoppingbasket', $items);


            if ($this->db->insert_id()) {

                //$thumb = str_replace('.png','_thumb.png',$img_name);
                $status = (isset($labeltype) and $labeltype == 'printed') ? 'confirm' : 'plain';

                $items_array = array(
                    'CartID' => $this->db->insert_id(),
                    'file' => $pdf_name,
                    'Thumb' => $img_name,
                    'qty' => $qty,
                    'labels' => $LabelsPerRoll * $qty,
                    'SessionID' => $SID,
                    'ProductID' => $productid,
                    'status' => $status,
                    'source' => 'flash'
                );
                $this->db->insert('integrated_attachments', $items_array);
            }


            $response = 'true';

        }
        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '"></result>';
        $html .= '</data>';
        echo $html;

    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_product($temp_id)
    {
        $sql = $this->db->query("select * from category where CategoryID LIKE '%" . $temp_id . "%'");
        $result = $sql->row_array();
        return $result;
    }

    function admin_suggest_templates()
    {
        $design_associate_id = $_REQUEST['design_associate_id'];
        $temp_id = $_REQUEST['cate_id'];

        if (isset($temp_id) and $temp_id != '') {

            $product = $this->get_product($temp_id);
            $shape = $product['Shape_upd'];
            $width = $product['Width'];
            $height = $product['Height'];

            $widther = $product['Width'];
            $heighter = $product['Height'];


            $condition = 'Shape_upd LIKE "' . $shape . '" and labelCategory NOT LIKE "Application Labels" and FlashActive LIKE "Y" and CategoryActive LIKE "Y" and CategoryID NOT LIKE "' . $temp_id . '"  and (shape  LIKE "Circular" || shape  LIKE "rectangle" || shape  LIKE "square" || shape  LIKE "Oval") ';
            if ($shape == 'Oval' || $shape == 'Rectangle') {

                if ($width > $height) {
                    $condition .= 'and width > height';
                } else {
                    $condition .= 'and height > width';
                }
            }


            $qry = "SELECT * from category  where $condition";
            $row = $this->db->query($qry);
            $detail = $row->result();


            header("Content-Type:text/xml");
            $html = '<?xml version="1.0" encoding="utf-8"?><data>';

            foreach ($detail as $details) {
                $new_width = 0;
                $new_height = 0;
                $range = 0.15;

                $x = explode("per", $details->CategoryName);
                $catname = $x[0];
                $code = explode('.', $details->CategoryImage);
                $code = $code[0];

                $sql2 = $this->db->query("SELECT ProductID,LabelsPerSheet,ProductBrand FROM products WHERE CategoryID LIKE '%" . $details->CategoryID . "%' LIMIT 0 , 1");
                $pro = $sql2->row_array();


                if (preg_match("/SRA3/i", $pro['ProductBrand'])) {
                    $Paper_size = "SRA3 Sheets";
                    $size = 'sra3';
                } else if (preg_match("/A5/i", $pro['ProductBrand'])) {
                    $Paper_size = "A5 Sheets";
                    $size = 'a5';
                } else if (preg_match("/A3/i", $pro['ProductBrand'])) {
                    $Paper_size = "A3 Sheets";
                    $size = 'a3';
                } else if (preg_match("/Roll/i", $pro['ProductBrand'])) {
                    exit();
                } else if (preg_match("/Integrated/i", $pro['ProductBrand'])) {
                    exit();
                } else {
                    $Paper_size = "A4 Sheets";
                    $size = 'a4';
                }


                $height = $details->LabelHeight;
                $label_type = "";
                $label_inner_width = "";
                $label_inner_height = "";
                $swf_path = '';
                $swf_path = '';
                $bleed_size = '';
                $label_double_inner_width = '';
                $label_double_inner_height = '';


                if (preg_match("/AABCL08/i", $details->CategoryImage)) {
                    $label_type = 'square_rectangle_circle';
                    $inner = explode(" (", $details->LabelWidth);
                    $inner2 = explode(" (", $details->LabelHeight);
                    $details->LabelWidth = $inner[0];
                    $height = $inner2[0];
                    $label_inner_width = str_replace(") mm", "", $inner[1]);
                    $label_inner_height = $label_inner_width;
                } else
                    if (preg_match("/AAMM01/i", $details->CategoryImage)) {
                        $label_type = 'double_square_rectangle';
                        $label_inner_width = '';
                        $label_inner_height = $label_inner_width;
                        $label_double_inner_width = str_replace(" mm", "", $details->LowerLabelWidth);
                        $label_double_inner_height = str_replace(" mm", "", $details->LowerLabelHeight);
                    } else
                        if (preg_match("/AACR01/i", $details->CategoryImage)) {
                            $label_type = 'triple_circle';
                            $label_inner_width = '51';
                            $label_inner_height = $label_inner_width;
                            $label_double_inner_width = '76';
                            $label_double_inner_height = $label_double_inner_width;
                        } else

                            if ($details->Shape_upd == "Circular") {
                                $height = $details->LabelWidth;
                                if (preg_match("/[)]/is", str_replace(" mm", "", $details->LabelWidth))) {
                                    $label_type = 'double_circle';
                                    $inner = explode("(", $details->LabelWidth);

                                    $details->LabelWidth = $inner[0];
                                    $height = $details->LabelWidth;

                                    $label_inner_width = str_replace(") mm", "", $inner[1]);
                                    $label_inner_height = str_replace(") mm", "", $inner[1]);

                                } else {
                                    $label_type = 'single_circle';
                                }

                            } else if (preg_match("/rectangle/is", $details->Shape_upd) || preg_match("/square/is", $details->Shape_upd)) {
                                $label_type = 'square_rectangle';
                            } else if ($details->Shape_upd == "Oval") {
                                $label_type = 'single_circle';
                            } else {
                                $label_type = 'swf_shape';
                                $swf_path = base_url() . 'designer/media/irregular/';
                                $bleed_size = $details->topbody_blockA;
                            }

                if (preg_match("/AAD048/i", $details->CategoryImage)) {
                    $label_type = 'perforated_single_circle';
                    $swf_path = "";
                }

                if (preg_match("/AACR01/i", $details->CategoryImage)) {
                    $section = explode('.', $details->Width);
                    $details->LabelWidth = $section[0];
                    $section = explode('.', $details->Height);
                    $details->LabelHeight = $section[0];
                } else {
                    $details->LabelWidth = str_replace(" mm", "", $details->LabelWidth);
                    $details->LabelHeight = str_replace(" mm", "", $details->LabelHeight);
                }

                if (preg_match("/&frasl;/is", $details->LabelGapAround)) {
                    $field_data = explode(' &frasl; ', $details->LabelGapAround);
                    $gaparound = str_replace(" mm", "", $field_data[0]);
                    $extragaparound = str_replace(" mm", "", $field_data[1]);
                } else {
                    $gaparound = str_replace(" mm", "", $details->LabelGapAround);
                    $extragaparound = 0;
                }

                $gapacross = str_replace(" mm", "", $details->LabelGapAcross);
                $labelgapacross = 0;
                if (preg_match("/SRA3/i", $pro['ProductBrand']) || preg_match("/A3/i", $pro['ProductBrand']) || preg_match("/A5/i", $pro['ProductBrand'])) {
                    if (preg_match("/&frasl;/is", $details->LabelGapAcross)) {
                        $field_data = explode(' &frasl; ', $details->LabelGapAcross);
                        $gapacross = str_replace(" mm", "", $field_data[0]);
                        $labelgapacross = str_replace(" mm", "", $field_data[1]);
                    } else {
                        $labelgapacross = str_replace(" mm", "", $details->LabelGapAcross);
                        $gapacross = 0;
                    }
                }

                $pdf = base_url() . "theme/site/images/office/pdf/" . $details->pdfFile;
                $word = base_url() . "theme/site/images/office/word/" . $details->WordDoc;

                $image = $this->Assets . 'images/categoryimages/A4Sheets/' . $details->CategoryImage;
                $status = 'true';
                $is_associated = 'false';
                $is_manual = ($details->is_manual == "N") ? 'false' : 'true';

                //******////*********/////**********////**************//////********////**************//////

                if ($status == 'true') {
                    if (isset($design_associate_id) && $design_associate_id != '' && $design_associate_id != 0) {
                        $fdesigns = $this->db->query("select tCode from flash_designs where associate_id = '" . $design_associate_id . "'");
                        $fdesigns = $fdesigns->result();
                        foreach ($fdesigns as $rowp) {
                            if ($rowp->tCode == $details->CategoryID) {
                                $is_associated = 'true';
                            }
                        }
                    }

                    if ($is_manual == 'false') {
                        $html .= '
						        <template is_associated="' . $is_associated . '">
							    <id>' . $pro['ProductID'] . '</id>	
							    <size>' . $size . '</size>	
								<category>' . $details->CategoryID . '</category>
								<code>' . $code . '</code>
								<image>' . $image . '</image>
								<total_labels>' . $pro['LabelsPerSheet'] . '</total_labels>
								<name>' . $Paper_size . '</name>
								<desc>' . $catname . '</desc>
								<template_type>' . $details->Shape_upd . '</template_type>
								<label_type>' . $label_type . '</label_type>
								<label_shape_path>' . $swf_path . '</label_shape_path>
								<label_width>' . $details->LabelWidth . '</label_width>
								<label_height>' . str_replace(" mm", "", $height) . '</label_height>
								<label_inner_width>' . $label_inner_width . '</label_inner_width>
								<label_inner_height>' . $label_inner_height . '</label_inner_height>
								<label_double_inner_width>' . $label_double_inner_width . '</label_double_inner_width>
								<label_double_inner_height>' . $label_double_inner_height . '</label_double_inner_height>
								<label_across>' . str_replace(" mm", "", $details->LabelAcross) . '</label_across>
								<label_around>' . str_replace(" mm", "", $details->LabelAround) . '</label_around>
								<gap_across>' . $gapacross . '</gap_across>
								<extra_gap_across>' . $labelgapacross . '</extra_gap_across>
								<gap_around>' . $gaparound . '</gap_around>
								<extra_gap_around>' . $extragaparound . '</extra_gap_around>
								<top_margin>' . str_replace(" mm", "", $details->LabelTopMargin) . '</top_margin>
								<bottom_margin>' . str_replace(" mm", "", $details->LabelBottomMargin) . '</bottom_margin>
								<left_margin>' . str_replace(" mm", "", $details->LabelLeftMargin) . '</left_margin>
								<right_margin>' . str_replace(" mm", "", $details->LabelRightMargin) . '</right_margin>
								<corner_radius>' . str_replace(" mm", "", $details->LabelCornerRadius) . '</corner_radius>
								<pdf>' . $pdf . '</pdf>
								<word>' . $word . '</word>
							</template>';
                    } else {
                        // is_manual
                        $compare = explode('.', $details->CategoryImage);
                        $a4dies = $this->db->query('select * from flash_manual_labels where die LIKE "' . $compare[0] . '" ')->result();

                        $html .= '<template>
					 <is_manual>' . $is_manual . '</is_manual>
					 <id>' . $pro['ProductID'] . '</id>
					 <size>' . $size . '</size>
					 <category>' . $details->CategoryID . '</category>
					 <code>' . $details->ManufactureID . '</code>
					 <template_type>' . $details->Shape_upd . '</template_type>
					  <image>' . $image . '</image>
					 <pdf>' . $pdf . '</pdf>
					 <word>' . $word . '</word>
					 <labels>';

                        foreach ($a4dies as $rowp) {
                            $is_swf_path_image = "";
                            $is_swf_path_bleed = "";
                            if (isset($rowp->image) && $rowp->image != "") {
                                $is_swf_path_image = base_url() . 'designer/media/irregular/' . $rowp->image;
                                $is_swf_path_bleed = base_url() . 'designer/media/irregular/' . $rowp->bleed_image;
                            }
                            $html .= '<label>
						<name></name>
						<desc>desc</desc>
						<label_type>' . $rowp->label_type . '</label_type>
						<label_shape_path>' . $is_swf_path_image . '</label_shape_path>
						<label_bleed_path>' . $is_swf_path_bleed . '</label_bleed_path>
						<label_width>' . $rowp->width . '</label_width>
						<label_height>' . $rowp->height . '</label_height>
						<label_inner_width>' . $rowp->inner_width . '</label_inner_width>
						<label_inner_height>' . $rowp->inner_height . '</label_inner_height>
						<label_xPos>' . $rowp->x_pos . '</label_xPos>
						<label_yPos>' . $rowp->y_pos . '</label_yPos>
						<corner_radius>' . $rowp->corner_radius . '</corner_radius>
						<bleed_area>' . $rowp->bleed_area . '</bleed_area>
						</label>';

                        }
                        $html .= '</labels></template>';
                    }

                }
            }
            $html .= '</data>';
            echo trim($html);
        }

    }


    function update_project_name()
    {

        $temp_id = '';
        $response = 'false';
        if ($_REQUEST) {
            $temp_id = $_REQUEST['user_project_id'];
            $project_name = $_REQUEST['project_name'];
            $this->db->where('ID', $temp_id);
            $this->db->update('flash_user_design', array('Name' => $project_name));
            $response = 'true';
        }
        header("Content-Type:text/xml");
        $html = '<?xml version="1.0" encoding="utf-8"?><data>';
        $html .= '<result success="' . $response . '" id="' . $temp_id . '"></result>';
        $html .= '</data>';
        echo $html;
    }

    function replace_xml_string($xml_string)
    {
        if (SITE_MODE == 'live') {
            $xml_string = str_replace("demozp37ren1v46lk4f1tq61hzi7/newlabels/", '', $xml_string);
        }
        return $xml_string;
    }

    function save_xml_file($id, $content, $type)
    {
        $dom = new DOMDocument;
        //$dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($content);
        if ($type == 'user') {
            $path = $this->documen_path . '/designer/media/xml_user_files/';
            @unlink($path . 'users_designs_' . $id . '.xml');
            $dom->save($path . 'users_designs_' . $id . '.xml');
        } else {
            $path = $this->documen_path . '/designer/media/xml_design_files/';
            @unlink($path . 'flash_designs_' . $id . '.xml');
            $dom->save($path . 'flash_designs_' . $id . '.xml');
        }

    }

    function read_xml_file($id, $type)
    {
        if ($type == 'user') {
            $path = $this->documen_path . '/designer/media/xml_user_files/users_designs_' . $id . '.xml';
        } else {
            $path = $this->documen_path . '/designer/media/xml_design_files/flash_designs_' . $id . '.xml';
        }

        return $xml = file_get_contents($path);
    }



//SELECT c.* ,p.ProductID,p.LabelsPerSheet from category c inner join  products p on p.CategoryID = c.CategoryID
//WHERE c.Shape_upd LIKE "Square"
//AND c.labelCategory NOT LIKE "Application Labels"
//AND c.FlashActive LIKE "Y"
//AND c.CategoryActive LIKE "Y"
//AND c.CategoryID NOT LIKE "T314"
//group by c.CategoryID


}