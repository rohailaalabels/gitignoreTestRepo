<?php
class Selector extends CI_Controller{
	function __construct()
	{	
		parent::__construct();
		
	}
	
   
   
   
   
   function category($shape=NULL){
		
		  if(isset($shape) && $shape!=""){
		    $brand = "A4 Labels";
			$data['category']  = "A4";
		    $data['shape'] = $shape;
			
	         $condition = " p.ProductBrand LIKE '".$brand."' AND CategoryActive='Y' AND c.Shape LIKE '".$shape."' AND p.activeFlash LIKE 'Y' AND ManufactureID LIKE '%WTP%' ";
	         
			 $data['records'] = $this->home_model->fetch_dies_data($condition);
			 $data['records']['shapes'] = $shape_list = $this->home_model->category_shapes($condition);
			 $data['records']['labels'] = $this->home_model->category_lables_persheet($condition);
			
		 }else{
		  $data['category']  = "";
		  $data['shape'] = "";	
		 }
		
		$data['main_content'] = 'selector/index';
		$this->load->View('page',$data);
	 }
	 
  
  
    function load_flash_panel(){
	    $temp_id = $this->input->post('temp_id');
		$this->session->set_userdata('template',$temp_id);
		
	    $data['temp_id'] = $temp_id;
	    $theHTMLResponse = $this->load->View('selector/flash_panel', $data);
	    echo  $theHTMLResponse;
	 }
	 
	 function change_selection(){
	  $temp_id = $this->input->post('temp_id');
	  $this->session->set_userdata('template',$temp_id);
	  
	  $data['select'] = $this->home_model->get_selected_template($temp_id);
	  $theHTMLResponse = $this->load->View('selector/selected_panel', $data);
	  echo  $theHTMLResponse;
	 }
	 
	 function search_diecode(){
	  
	  $response = "false";
	  $theHTMLResponse = "";
	  $diecode = $this->input->post('diecode');
	  $view = $this->input->post('view');
	  
	 if($view=="slider"){ 
	    $template = $this->session->userdata('template');
	    if(isset($template) && $template!=""){
		 $data['select'] = $this->home_model->get_selected_template($template);
	    } 	
	 }
	 
	  $result = $this->db->query("select distinct(CategoryID) from products where ManufactureID LIKE '%".$diecode."%' AND activeFlash LIKE 'Y' and (ProductBrand LIKE 'SRA3 Label' || ProductBrand LIKE 'A3 Label' || ProductBrand LIKE 'A4 Labels')")->result();
	
	   if(isset($result) && !empty($result)){
		   $response = "true";
		   $data['result'] = $result;
		  
		 if($view=="slider"){ 
		   $theHTMLResponse = $this->load->View('selector/search_category_list', $data, true); 
		 }else{
		   $theHTMLResponse = $this->load->View('selector/search', $data, true); 
		 }
	   }
	   
	      
	          $json_data = array(
				'response' => $response,
                'html' => $theHTMLResponse);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($json_data));
	   
	 }



	 
	 
	function templateselection(){
	
			
        if ($_POST) {

            $shape = $width = $height = '';

            $min_width = 0;
            $max_width = 0;
            $min_height = 0;
            $max_height = 0;
            $width_option = '';
            $height_option = '';
			
			$orderby = '';


            $category = $this->input->post('category');
            $shape_sel = $this->input->post('shape');
            
            $width_sel = $this->input->post('width');
            $height_sel = $this->input->post('height');
            $height_sel = $this->input->post('height');
            $page = $this->input->post('page');
			$trigger = $this->input->post('trigger');
			$cornerradius = $this->input->post('cornerradius');
			$opposite = $this->input->post('opposite');
			
			// new code
			$div_open = $this->input->post('div_open');
			$condtion = '';
			$brands_list = '';
			$view = '';
			$opposite_width = '';
			$opposite_height = '';
			
			$brand = $this->home_model->make_productBrand_condtion($category);
			$condtion .= "c.CategoryActive = 'Y' AND c.Shape != '' AND p.ProductBrand LIKE '" .$brand. "' AND c.is_template = 'Y' AND p.activeFlash LIKE 'Y' AND ManufactureID LIKE '%WTP' ";
			
			if(isset($cornerradius) and $cornerradius=='sharp'){ 			 //0 radius
				$condtion .= " AND (c.LabelCornerRadius LIKE '0 mm' )";	
			}
			
			if(isset($cornerradius) and $cornerradius=='rounded'){ 			 // greater than 0 radius
				$condtion .= " AND (c.LabelCornerRadius NOT LIKE '0 mm' )";	
			}
			
			
			$option_text = 'Label Shape';
           
            if (isset($shape_sel) and strlen($shape_sel) > 0) {
                $shape = " AND c.Shape LIKE '" . $shape_sel . "' ";
            }

            if (isset($width_sel) and strlen($width_sel) > 0) {
                $width = " AND c.Width LIKE '" . $width_sel . "' ";
            }
            if (isset($height_sel) and strlen($height_sel) > 0) {
                $height = " AND c.Height LIKE '" . $height_sel . "' ";
            }

            $shape_list = $shape_list = $this->home_model->category_shapes($condtion);
		    $shape_option = $this->home_model->genrate_shapes($shape_list,$shape_sel);
	       
                $height_min = $this->input->post('height_min');
                $height_max = $this->input->post('height_max');

                $width_min = $this->input->post('width_min');
                $width_max = $this->input->post('width_max');


                 if (isset($width_min) and $width_min != '' and $width_min > 0) {
                   		
						if(isset($opposite) and $opposite=='true'){
							 $opposite_height = " AND FLOOR(c.Height) >= ".floor($width_min);
						}
						$width = " AND FLOOR(c.Width) >= ".floor($width_min);
				}
                if (isset($width_max) and $width_max != '' and $width_max > 0) {
                   
				 	    $width .= " AND CEIL(c.Width) <= " . ceil($width_max). " ";
					    if(isset($opposite) and $opposite=='true'){
							 $opposite_height .= " AND FLOOR(c.Height) <= ".ceil($width_max);
						}
				}

               
			
		 
		        if ($shape_sel != 'Circular' and $shape_sel != 'Square') {

				 if (isset($height_min) and $height_min != '' and $height_min > 0) {
			   
					$height = " AND FLOOR(c.Height) >= " . floor($height_min). " ";
					if(isset($opposite) and $opposite=='true'){
							$opposite_width = " AND  CEIL(c.Width) >= " . floor($height_min);
					}
				}
				 if (isset($height_max) and $height_max != '' and $height_max > 0) {
					
						$height .= " AND CEIL(c.Height) <= " . ceil($height_max);
						if(isset($opposite) and $opposite=='true'){
								$opposite_width .= " AND  CEIL(c.Width) <= " . ceil($height_max);
						}
				}


               $heightcondtion = $condtion . $shape . $width;

              if (isset($trigger) and $trigger == 'autoload') {
                 $heightcondtion = $heightcondtion . $height;
              }

                    $height_range = $this->home_model->get_min_width_height('c.Height', $heightcondtion);
                    $min_height = $height_range['min'];
                    $max_height = $height_range['max'];
                }



                $widthcondtion = $condtion . $shape . $height;
                if (isset($trigger) and $trigger == 'autoload') {
                    $widthcondtion = $widthcondtion . $width;
                }
                $width_range = $this->home_model->get_min_width_height('c.Width', $widthcondtion);

                $min_width = $width_range['min'];
                $max_width = $width_range['max'];

             




            $width_height = $height . $width;
			$groupby = '';
			$theHTMLResponse = '';
			
			if(isset($opposite) and $opposite=='true'){
			 if($opposite_width!='' and $opposite_height!=''){
			   $width_height =   ' AND ( ( 1 = 1 '.$width. $height .' ) OR  ( 1 = 1 '.$opposite_width . $opposite_height.' ) ) '; 
			 }
		   }
			
			$final_condition = $condtion . $shape . $width_height;
            
            $count = $this->home_model->labelfinder_counter($final_condition,$groupby,$div_open);
			
             $limiter = ($div_open=='slide')?'75':'12';
			 $data['records'] = $this->home_model->fetch_dies_data($final_condition, '');
			 $count =  $data['records']['num_row'];
				
				if($div_open=='slide'){
					$template = $this->session->userdata('template');
					if(isset($template) && $template!=""){
					  $data['select'] = $this->home_model->get_selected_template($template);
					}	
					$theHTMLResponse = $this->load->view('selector/slider_category_list', $data, true);
					
				}else{
				  $theHTMLResponse = $this->load->view('selector/category', $data, true);
				}
                   		
				  if ($count == 0) {
                    $theHTMLResponse = '<div class="row"><div class="thumbnail">';
                    $theHTMLResponse .='<div class="col-sm-2 col-md-2 col-lg-2 norecords"><h3><i class="fa fa-5x fa-warning"></h3></i></div>';
                    $theHTMLResponse .='<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 ">';
                    $theHTMLResponse .='<h2  style="text-align:center;">No Results  </h2>';
                    $theHTMLResponse .='<h3  style="text-align:center;">Change your criteria using the filtering options above</h3></div>';
                    $theHTMLResponse .='</div></div>';
                }
         

        
            $json_data = array('response' => 'yes',
				'shapes' => $shape_option,
                'width' => $width_option,
                'height' => $height_option,
                'shapes' => $shape_option,
                'count' => $count,
                'min_width' => floor($min_width),
                'max_width' => ceil($max_width),
                'min_height' => floor($min_height),
                'max_height' => ceil($max_height),
				'view' => $view,
				'count_format' => number_format($count, 0),
                'html' => $theHTMLResponse);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($json_data));
        }
    
	
	} 
	

		 


   function emailtest()
    {  
        
        die();
        
        $email = 'kami.ramzan77@gmail.com'; 

        $msg = "We have not find your email address in our record. Please check your email spelling if not then kindly register with us";
        $class = 'danger';
        $qry = $this->db->query("SELECT * FROM customers WHERE UserEmail = '" . $email . "'");
        $rec = $qry->num_rows();
        if ($rec != 0) {
            $res = $qry->result_array();
            $act_code = md5(rand(0, 1000) . 'uniquefrasehere');

            $activate['UserID'] = $res[0]['UserID'];
            $username = $res[0]['BillingFirstName'];
            $activate['TokenNumber'] = $act_code;
            $activate['UserEmail'] = $email;
            $activate['TokenTime'] = time();

            $str_tmp = $this->db->insert_string('forgetpasswordtoken', $activate);
            $query_tmp = $this->db->query($str_tmp);

            if ($query_tmp) {
                $mail_template = $this->user_model->email_template(2);
                $mailTitle = $mail_template[0]['MailTitle'];
                $mailName = $mail_template[0]['Name'];
                $from_mail = $mail_template[0]['MailFrom'];
                $mailSubject = $mail_template[0]['MailSubject'];
                $mailText = $mail_template[0]['MailBody'];
                $url = base_url('theme') . '/';
                $code = base64_encode($res[0]['UserID']);
                $link = base_url() . 'users/changepassword?token=' . $act_code . '-' . $code;


                $getfile = FCPATH . 'system/libraries/en/forgot-password.html';
                $mailText = file_get_contents($getfile);
                $strINTemplate = array('[WEBROOT]', "[EmailAddress]", "[password]", "[BillingFirstName]");
                $strInDB = array($url, $email, $link, $username);
                $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);


               
                $this->load->library('email');
                $this->email->from('customercare@aalabels.com', 'AALABELS');
                $this->email->to($email);
                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");
                
    
                
                if($this->email->send()){
                $msg = "A link has been sent to your email address.
							Please follow the instructions in this email to continue. <br>
							If you have not received this email please call us on 01733 588 390,
							Please also check your Junk Mail folder.";
                echo "success";
                }else{
                    echo $this->email->print_debugger();
                }
            }
        }
       
    }


















}