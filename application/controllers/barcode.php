<?php
class Barcode extends CI_Controller{
	function __construct()
	{	
		parent::__construct();
		
	}
    function generate_barcode()
	{
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		
		$type = $this->input->post('type');
		$b_data = strtoupper($this->input->post('data'));
		$size = $this->input->post('size');
		$b_size = 1;
		
		$font = FCPATH.'theme/site/fonts/sansation.ttf';

		if($size == "small")
		{
			$b_size = 1;
		}
		else if($size == "medium")
		{
			$b_size = 2;
		}
		else if($size == "large")
		{
			$b_size = 3;
		}
		
		$data = array(
					'response'=> 'no',
					'message'=> 'Unexpected Error..!! Try Again.'
				);
		$renderer = array('text' => $b_data, 'barHeight'=> 40, 'factor'=> $b_size,'font'=> $font,'fontSize'=>9);
		$renderer_options = array();
		if($type == "upca")
		{
			if(strlen($b_data) == 11)
			{
				if(!preg_match("/^[0-9]{0,11}$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only numbers 0-9 allowed for this code.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('upca', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Must contain 11 characters'
				);
			}
		}
		else if($type == "upce")
		{
			if(strlen($b_data) == 7)
			{
				if(!preg_match("/^[0-9]{0,7}$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only numbers 0-9 allowed for this code.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('upce', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Must contain 7 characters'
				);
			}
		}
		else if($type == "ean13")
		{
			if(strlen($b_data) == 12)
			{
				if(!preg_match("/^[0-9]{0,12}$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only numbers 0-9 allowed for this code.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('ean13', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Must contain 12 characters'
				);
			}
		}
		
		else if($type == "ean8")
		{
			if(strlen($b_data) == 7)
			{
				if(!preg_match("/^[0-9]{0,7}$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only numbers 0-9 allowed for this code.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('ean8', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Must contain 7 characters'
				);
			}
		}
		else if($type == "code128")
		{
			$file = Zend_Barcode::draw('code128', 'image', $renderer, $renderer_options);
			$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
			
			$data = array(
				'response'=> 'yes',
				'image'=> $b_data
			);
		}
		else if($type == "code39")
		{
				if(!preg_match("/^[0-9A-Za-z\ \-\.\$\/\+\%]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: 0-9 A-Z and -.$/+% are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('code39', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
		}
		else if($type == "interleaved")
		{
			if(strlen($b_data) % 2 == 0)
			{
				if(!preg_match("/^[0-9]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only integers [0-9] are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('code25interleaved', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Only Even Length of characters. 11, 2252, 338445'
				);
			}
		}
		else if($type == "postnet")
		{
			$lengths = array('5','6','9','11');
			if(in_array(strlen($b_data),$lengths))
			{
				if(!preg_match("/^[0-9]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only integers [0-9] are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('postnet', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Enter 5/6/9/11 characters'
				);
			}
		}
		
		else if($type == "ean2")
		{
			if(strlen($b_data) <= 2)
			{
				if(!preg_match("/^[0-9]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only integers [0-9] are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('ean2', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Only 2 Integers'
				);
			}
		}
		else if($type == "ean5")
		{
			if(strlen($b_data) <= 5)
			{
				if(!preg_match("/^[0-9]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only integers [0-9] are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('ean5', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Maximum 5 Integers'
				);
			}
		}
		
		else if($type == "identcode")
		{
			if(strlen($b_data) <= 11)
			{
				if(!preg_match("/^[0-9]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only integers [0-9] are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('identcode', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Maximum 11 Integers'
				);
			}
		}
		else if($type == "itf14")
		{
			if(strlen($b_data) <= 13)
			{
				if(!preg_match("/^[0-9]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only integers [0-9] are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('itf14', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Maximum 13 Integers'
				);
			}
		}
		else if($type == "planet")
		{
			if(strlen($b_data) == 11 || strlen($b_data) == 13)
			{
				if(!preg_match("/^[0-9]+$/",$b_data))
				{
					$data = array(
						'response'=> 'no',
						'message'=> 'Invalid Format: Only integers [0-9] are allowed.'
					);
				}
				else
				{
					$file = Zend_Barcode::draw('planet', 'image', $renderer, $renderer_options);
					$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
					
					$data = array(
						'response'=> 'yes',
						'image'=> $b_data
					);
				}
			}
			else
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Please enter 11 / 13 characters'
				);
			}
		}
		else if($type == "royalmail")
		{
			if(!preg_match("/^[0-9A-Z]+$/",$b_data))
			{
				$data = array(
					'response'=> 'no',
					'message'=> 'Invalid Format: [0-9] [A-Z] are allowed.'
				);
			}
			else
			{
				$file = Zend_Barcode::draw('royalmail', 'image', $renderer, $renderer_options);
				$store_image = imagepng($file,"theme/site/images/barcodes/generated_barcode.png");
				
				$data = array(
					'response'=> 'yes',
					'image'=> $b_data
				);
			}
		}
	
	    $b_data = str_replace(' ', '', $b_data); 
		$data['file_name'] = $type.preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($b_data)).".png";
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
	function set_barcode()
	{
		$temp = "58269EERR5482";
		
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		$file = Zend_Barcode::render('code128', 'image', array('text' => $temp, 'barHeight'=> 50, 'factor'=> 1,'fontSize'=>'16'), array());
	}
	
	
	
	
	function generate_qrcode()
	{
		$this->load->library('ciqrcode');
		$level = "L"; // L M Q H;
		$q_size = "5"; // 1-10

		$type = $this->input->post('type');
		$q_data = $this->input->post('data');
		$size = $this->input->post('size');
		
		//SMS
		
		$number = $this->input->post('number');
		$sms = $this->input->post('sms');
		
		//CONTACT INFORMATION
		
		$contact_name = $this->input->post('contact_name');
		$contact_company = $this->input->post('contact_company');
		$contact_number = $this->input->post('contact_number');
		$contact_email = $this->input->post('contact_email');
		$contact_address = $this->input->post('contact_address');
		$contact_city = $this->input->post('contact_city');
		$contact_state = $this->input->post('contact_state');
		$contact_zip = $this->input->post('contact_zip'); 
		$contact_website = $this->input->post('contact_website');
		$contact_notes = $this->input->post('contact_notes');
		
		
		if($size == "small")
		{
			$q_size = 5;
		}
		else if($size == "medium")
		{
			$q_size = 8;
		}
		else if($size == "large")
		{
			$q_size = 10;
		}
		
		$path = Assets."images/barcodes/generated_qrcode.png";
		
		$params['level'] = $level;
		$params['size'] = $q_size;
		$params['savename'] = FCPATH.'theme/site/images/barcodes/generated_qrcode.png';
		
		$data = array(
					'response'=> 'no',
					'message'=> 'Unexpected Error..!! Try Again.'
				);

		if($type == "email")
		{
			if(filter_var($q_data, FILTER_VALIDATE_EMAIL))
			{
				$params['data'] = "mailto:".strtolower($q_data);
				if($this->ciqrcode->generate($params))
				{
					$data = array(
						'response'=> 'yes',
						'image'=> $path
					);

				}
			}
			else
			{
				$data = array(
				'response'=> 'no',
				'message'=> 'Please enter a valid email'
				);
			}
		}
		else if($type == "phone")
		{
			if(preg_match("/^[0-9\ \-\+\.\(\)]+$/",$q_data))
			{
				$params['data'] = "tel:".$q_data;
				
				if($this->ciqrcode->generate($params))
				{
					$data = array(
						'response'=> 'yes',
						'image'=> $path
					);

				}
			}
			else
			{
				$data = array(
				'response'=> 'no',
				'message'=> 'Please Provide a valid contact number'
				);
			}
		}
		else if($type == "plain_text")
		{
			$params['data'] = $q_data;
			
			if($this->ciqrcode->generate($params))
			{
				$data = array(
					'response'=> 'yes',
					'image'=> $path
				);

			}
		}
		else if($type == "url")
		{
			if(filter_var($q_data, FILTER_VALIDATE_URL))
			{
				$params['data'] = strtolower($q_data);
				if($this->ciqrcode->generate($params))
				{
					$data = array(
						'response'=> 'yes',
						'image'=> $path
					);
				}
			}
			else
			{
				$data = array(
				'response'=> 'no',
				'message'=> 'Please enter a valid URL'
				);
			}
		}
		else if($type == "sms")
		{
			if(preg_match("/^[0-9\ \-\+\.\(\)]+$/",$number))
			{
				$params['data'] = "smsto:".$number.":".$sms;
				if($this->ciqrcode->generate($params))
				{
					$data = array(
						'response'=> 'yes',
						'image'=> $path
					);
					$q_data = $number;
				}
			}
			else
			{
				$data = array(
				'response'=> 'no',
				'message'=> 'Please Provide a valid contact number'
				);
			}
		}
		else if($type == "contact_info")
		{
			if(preg_match("/^[0-9\ \-\+\.\(\)]+$/",$contact_number))
			{
				$name         = $contact_name; 
				$phone        = $contact_number; 
				$orgName      = $contact_company; 
			
				$email        = $contact_email; 
			
				$addressLabel     = 'Address'; 
				$addressStreet    = $contact_address; 
				$addressTown      = $contact_city; 
				$addressPostCode  = $contact_zip; 
			
				$codeContents  = 'BEGIN:VCARD'."\n"; 
				$codeContents .= 'VERSION:2.1'."\n"; 
				$codeContents .= 'FN:'.$name."\n"; 
				$codeContents .= 'ORG:'.$orgName."\n"; 
			
				$codeContents .= 'TEL;WORK;VOICE:'.$phone."\n"; 
							
				$codeContents .= 'ADR;TYPE=work;'. 
					'LABEL="'.$addressLabel.'":' 
					.$addressStreet.';' 
					.$addressTown.';' 
					.$addressPostCode.';' 
				."\n"; 
				$codeContents .= 'NOTE:'.$contact_notes."\n";
			
				$codeContents .= 'EMAIL:'.$email."\n"; 
			
				$codeContents .= 'END:VCARD';
				 
				$params['data'] = $codeContents;
				
				if($size == "small")
				{
					$params['size'] = 3;
				}
				else if($size == "medium")
				{
					$params['size'] = 5;
				}
				else if($size == "large")
				{
					$params['size'] = 7;
				}
				
				if($this->ciqrcode->generate($params))
				{
					$data = array(
						'response'=> 'yes',
						'image'=> $path
					);
					$q_data = $contact_name;

				}
			}
			else
			{
				$data = array(
				'response'=> 'no',
				'message'=> 'Please Provide a valid contact number'
				);
			}
		}
		
		
		$data['file_name'] = $type."_".preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($q_data)).".png";
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
	
	
	function set_qr($data)
	{
		$this->load->library('ciqrcode');

		$params['data'] = $data;
		$params['level'] = 'L'; // L M Q H;
		$params['size'] = 5; // 1-10
		$params['savename'] = FCPATH.'tes.png';
		$this->ciqrcode->generate($params);
		
		echo '<img src="'.base_url().'tes.png" />';
	}
}