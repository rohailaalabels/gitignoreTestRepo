<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('make_pagination'))
{
    function make_pagination($table,$totl_records,$baseurl, $column = NULL , $columnVal = NULL)
    {
      
	 $CI = get_instance();
	 
	 $CI->load->model('home_model');
	 
	    $config = array();

		$config["base_url"] = base_url() . $baseurl;
	 	$config["total_rows"] = $totl_records;
	    $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['num_links'] = 5;
		
		$data['totalrecord'] = $config["total_rows"];
		
		// die("testing");
		
	  	/*$config = array();
        $config["base_url"] = base_url() . $baseurl;
        $config["total_rows"] = $CI->home_model->count_records($table);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['num_links'] = 2;*/
	    
		/*---------------------*/
		// First Links
		$config['first_link'] = FALSE;
		//$config['first_tag_open'] = '<li>';
		//$config['first_tag_close'] = '</li>';
		
		// Last Links
		$config['last_link'] = FALSE;
		//$config['last_tag_open'] = '<li>';
		//$config['last_tag_close'] = '</li>';
		
		// Next Link
		$config['next_link'] = '»';
		//$config['next_tag_open'] = '<li class="next-link">';
		//$config['next_tag_close'] = '</li>';
		
		// Previous Link
		$config['prev_link'] = '«';
		//$config['prev_tag_open'] = '<li class="prev_link">';
		//$config['prev_tag_close'] = '</li>';
		
		// Current Link
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		
		// Digit Link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';	
		
		

		/*--------------------*/
		
        $CI->pagination->initialize($config);

        $page = ($CI->uri->segment(3)) ? $CI->uri->segment(3) : 0;
        $data["results"] = $CI->home_model->fetch_records($config["per_page"], $page,$table,$column,$columnVal);
		
        $data["links"] = $CI->pagination->create_links();
		
		
		
		return $data;
	    
    }   
}

/////////////////////////////////////////////

if ( ! function_exists('make_pagination_query'))
{
    
    function make_pagination_query($query,$baseurl,$segment=NULL,$query_string=NULL,$page=NULL)
    {
		
	

	 $CI = get_instance();
	 
	 $CI->load->model('home_model');
	 	
	  $CI->load->library('Pagination');
	 
	    $config = array();

		$config["base_url"] = base_url() .$baseurl;
	 	$config["total_rows"] = $CI->home_model->count_records_query($query);
	    
		
		
		//if(isset($_GET['per_page']) and $_GET['per_page']!='') $config["per_page"] = $_GET['per_page']; else  $config["per_page"] = 10;
		
		if($page != NULL and $page == "lba")
		{
			$config["per_page"] = 15;
        }
		else
		{
			$config["per_page"] = 10;
        }
        
        if($segment!=NULL and $segment!=''){
			$config["uri_segment"] = $segment;
			 $page = ($CI->uri->segment($segment)) ? $CI->uri->segment($segment) : 0;
		}
		else{
			$config["uri_segment"] = 3;
			
			 $page = ($CI->uri->segment(3)) ? $CI->uri->segment(3) : 0;
		
			 
			// $data['end'] = $page+6;
			// $data['start'] = ($page+6)-5;
			
		}
		
		$config['num_links'] = 5;
		$config['use_page_numbers']	= TRUE;
		
		if($query_string){
			$config['page_query_string'] = TRUE;
		//	$page = $page*5;
			if(isset($_GET['per_page']) and $_GET['per_page']!='') $page = $_GET['per_page']; else  $page = 0;
			//$page = $page*5;
			
			
		}else{
			$config['page_query_string'] = FALSE;
		}
		
		$data['totalrecord'] = $config["total_rows"];
	
		//die($config["total_rows"]);
		
	  	/*$config = array();
        $config["base_url"] = base_url() . $baseurl;
        $config["total_rows"] = $CI->home_model->count_records($table);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['num_links'] = 2;*/
	    
		/*---------------------*/
		// First Links
		$config['first_link'] = '««';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		// Last Links
		$config['last_link'] = '»»';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		
		// Next Link
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		// Previous Link
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		// Current Link
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		// Digit Link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';	
		
		

		/*--------------------*/
		
        $CI->pagination->initialize($config);
        $page = $page-1;
	$page = ($page < 0)?0:$page;
    	 // echo  $query.' limit '.($page*10).' , '.$config["per_page"]; 
       
        $data["result"] = $CI->home_model->fetch_records_query($config["per_page"], $page*$config['per_page'],$query);
        
        $data["per_page"] = $config["per_page"];
		
        $data["links"] = $CI->pagination->create_links();
		
		return $data;
	    
    } 
    function make_pagination_query_old($query,$baseurl,$segment=NULL,$query_string=NULL)
    {
		
	

	 $CI = get_instance();
	 
	 $CI->load->model('home_model');
	 	
	  $CI->load->library('Pagination');
	 
	    $config = array();

		$config["base_url"] = base_url() .$baseurl;
	 	$config["total_rows"] = $CI->home_model->count_records_query($query);
	    
		
		
		//if(isset($_GET['per_page']) and $_GET['per_page']!='') $config["per_page"] = $_GET['per_page']; else  $config["per_page"] = 10;
		
		$config["per_page"] = 10;
        if($segment!=NULL and $segment!=''){
			$config["uri_segment"] = $segment;
			 $page = ($CI->uri->segment($segment)) ? $CI->uri->segment($segment) : 0;
		}
		else{
			$config["uri_segment"] = 3;
			
			 $page = ($CI->uri->segment(3)) ? $CI->uri->segment(3) : 0;
		
			 
			// $data['end'] = $page+6;
			// $data['start'] = ($page+6)-5;
			
		}
		
		$config['num_links'] = 5;
		$config['use_page_numbers']	= TRUE;
		
		if($query_string){
			$config['page_query_string'] = TRUE;
		//	$page = $page*5;
			if(isset($_GET['per_page']) and $_GET['per_page']!='') $page = $_GET['per_page']; else  $page = 0;
			//$page = $page*5;
			
			
		}else{
			$config['page_query_string'] = FALSE;
		}
		
		$data['totalrecord'] = $config["total_rows"];
	
		//die($config["total_rows"]);
		
	  	/*$config = array();
        $config["base_url"] = base_url() . $baseurl;
        $config["total_rows"] = $CI->home_model->count_records($table);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['num_links'] = 2;*/
	    
		/*---------------------*/
		// First Links
		$config['first_link'] = '««';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		// Last Links
		$config['last_link'] = '»»';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		
		// Next Link
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		// Previous Link
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		// Current Link
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		// Digit Link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';	
		
		

		/*--------------------*/
		
        $CI->pagination->initialize($config);
        $page = $page-1;
	$page = ($page < 0)?0:$page;
    	 // echo  $query.' limit '.($page*10).' , '.$config["per_page"]; 
       
        $data["result"] = $CI->home_model->fetch_records_query($config["per_page"], $page*10,$query);
		
        $data["links"] = $CI->pagination->create_links();
		
		return $data;
	    
    }   
}