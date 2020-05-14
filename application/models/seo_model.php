<?php
/*Meta Model For aalabels - Author: Arslan Javaid - 11-05-2016 */ 
class Seo_model extends CI_Model{

	var $desc='';
	var $title='';
	
	function __construct(){

		parent::__construct();
	}
	
	function parse_labels_shape($lang, $shape){
		
		$config_shapes_array = array('a4-sheets'=>'planches-a4',
									 'a3-sheets'=>'planches-a3',
		                             'sra3-sheets'=>'planches-sra3',
									 'roll-labels'=>'etiquettes-rouleaux',
		                             'circular'=>'rond',
									 'heart'=>'coeur',
									 'oval'=>'ovale',
									 'rectangle'=>'rectangle',
									 'oval'=>'ovale',
									 'square'=>'carre',
									 'star'=>'etoile',
									 'perforated'=>'perforated',
									 'triangle'=>'triangle',
									 'construction-site-labels'=>'etiquettes-construction',
									 'educational-labels'=>'etiquettes-education',
									 'electrical-labels'=>'etiquettes-electrique',
									 'fire-safety-labels'=>'etiquettes-securite-incendie',
									 'first-aid-labels'=>'etiquettes-premiers-secours',
									 'food-hygiene-labels-and-signs'=>'etiquettes-signes-nourriture-hygiene',
									 'gas-labels'=>'etiquettes-gaz',
									 'haz-chem-labels'=>'etiquettes-dangers-chimiques',
									 'hazard-and-warning-labels'=>'etiquettes-dangers-avertissements',
									 'home-moving-packs'=>'etiquettes-demenagement',
									 'hospital-and-nursing-labels'=>'etiquettes-hopital-infirmerie',
									 'mandatory-labels-and-signs'=>'etiquettes-signes-obligatoires',
									 'packaging-labels'=>'etiquettes-emballage',
									 'prohibition-labels'=>'etiquettes-interdiction',
									 'recycling-labels'=>'etiquettes-recyclage',
									 'service-and-inspection-labels'=>'etiquettes-services-et-inspections');
		
		
								 
		if($lang == 'fr'){
				if(array_search($shape, $config_shapes_array)){ $shape = array_search($shape, $config_shapes_array);}
		}else{
				$shape = (isset($config_shapes_array[$shape]) and $config_shapes_array[$shape]!='')?$config_shapes_array[$shape]:$shape;	
		}
		return $shape;
	}
	
	function str_replace_first($from, $to, $content)
	{
		$from = '/'.preg_quote($from, '/').'/';
	
		return preg_replace($from, $to, $content, 1);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// This function checks if second segment is not empty then it creates an identical title and description for SEO //
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function seo_urls(){

		$method = $this->router->fetch_method();
		//die($method);				
		if( $this->uri->segment(2) != ''){
			   

			$updated_string = uri_string();
		   
			$updated_string=explode("/", $updated_string, 3);

			if( $method=='material'){
			$updated_string1=explode("/", $updated_string[2], 3);
			$str =	$updated_string1[0];
			$this->title = $this->title . " | " .ucfirst($str) . " " .ucfirst($updated_string1[1]);
			//print_r($this->title);die;
			}
			else{
			$str = rtrim($updated_string[2], '/');

			$str = str_replace(array('/', '-'), ' ', $str);
			
			// $str =	$this->home_model->get_translated_version($str);
  
			$this->title = ucfirst($str) . " | ".$this->title;
			}
			
  
			$this->desc = $this->desc ." ".ucfirst($str);
			}

			//die($this->title);
	}


	
	function get_meta_details($page){
			
			$data = array('title'=>'','desc'=>'','url_fr'=>'','query_string'=>'');
			$qry = $this->db->query("SELECT * from page_meta_tags where page_url LIKE '".$page."' LIMIT 1");
			if($qry->num_rows() > 0){ 
				$res=$qry->result();
				$res[0]->page_title = str_replace('"',"'",$res[0]->page_title);
				$res[0]->page_meta = str_replace('"',"'",$res[0]->page_meta);
				if(isset($res[0]->query_string))
				$data = array('title'=>$res[0]->page_title,'desc'=>$res[0]->page_meta,'url_fr'=>$res[0]->page_url_fr,'query_string' => $res[0]->query_string);
				else
				$data = array('title'=>$res[0]->page_title,'desc'=>$res[0]->page_meta,'url_fr'=>$res[0]->page_url_fr);
			}
			else{
			    $qry = $this->db->query("SELECT * from page_meta_tags where page_url LIKE '".$page."%' LIMIT 1");
				if($qry->num_rows() > 0){ 
				 $res=$qry->result();
			 	 $res[0]->page_title = str_replace('"',"'",$res[0]->page_title);
				 $res[0]->page_meta = str_replace('"',"'",$res[0]->page_meta);
				 if(isset($res[0]->query_string))
				$data = array('title'=>$res[0]->page_title,'desc'=>$res[0]->page_meta,'url_fr'=>$res[0]->page_url_fr,'query_string' => $res[0]->query_string);
				else
				$data = array('title'=>$res[0]->page_title,'desc'=>$res[0]->page_meta,'url_fr'=>$res[0]->page_url_fr);
				}
			}
			return $data;
	}
	function meta_tags(){
		
	 $page = uri_string();
	 $method = $this->router->fetch_method(); //category
	 $class = $this->router->fetch_class(); //home
	 $this->title = '';$this->desc=''; $noindex = '';$fr_shape = '';
	 $alternate_link_fr = '';
	 $hreflang = 'enable';
	 //die($method);
	 if( $class=='home' and $method=='category'){
		
			if(preg_match('/a4-sheets/is',$page))$type = 'A4'; 
			else if(preg_match('/sra3-sheets/is',$page)) $type = 'SRA3';
			else if(preg_match('/a3-sheets/is',$page)) $type = 'A3';
			else if(preg_match('/roll-labels/is',$page)) $type = 'Roll Labels';
			$segment1 = $this->uri->segment(1);
			$segment2 = $this->uri->segment(2);
			
			if(isset($segment2) and $segment2!=''){
				
				$fr_shape =  $this->parse_labels_shape('en', $segment2);
				
				
				$cat_shape = $segment2.' labels';
				$query = $this->db->query("SELECT *, count(*) as total FROM `category_shapes` WHERE shape LIKE '".$cat_shape."' AND type LIKE '".$type."' LIMIT 1  ");
				
				$row = $query->row_array();
					if($row['total']==1){
							$this->title=$row['title'];
							$this->desc = $row['description'];
					}
					
				if($this->title == '')
				$this->title = ucfirst($segment1)." ".$segment2. "  | Next Day Delivery | AA Labels";

				if($this->desc == '')
				$this->desc = $segment1." ".$segment2. " . AA Labels";
					
			}
			else if(isset($segment1) and $segment1!=''){  
					$info = $this->get_meta_details($segment1);
					$this->title = $info['title'];
					$this->desc = $info['desc']; 
					
					
					// AA41 STARTS
						if($segment1 == "a4-sheets" && $segment2 == "") {
		                    $meta_keywords.= '<meta name="keywords" content="A4 Labels">';
		                } else if($segment1 == "a5-sheets" && $segment2 == "") {
		                    $meta_keywords.= '<meta name="keywords" content="Labels on A5 Sheets, Labels for Printing">';
		                } else if($segment1 == "a3-sheets" && $segment2 == "") {
		                    $meta_keywords.= '<meta name="keywords" content="Labels on A3 Sheets, Labels for Printing">';
		                } else if($segment1 == "sra3-sheets" && $segment2 == "") {
		                    $meta_keywords.= '<meta name="keywords" content="Labels on SRA3 Sheets, Labels for Printing">';
		                } else if($segment1 == "roll-labels" && $segment2 == "") {
		                    // AA42 STARTS
		                    	$meta_keywords.= '<meta name="keywords" content="roll labels, labels on a roll">';
		                    // AA42 ENDS
		                }

		            // AA41 ENDS
					
			}
			
		
		$pageurl = explode("/", $page);
		
		$fr_page =  $this->parse_labels_shape('en', $pageurl[1]);
		
		$alternate_link_fr = '/'.$fr_page.'/';
		
		$page = '/'.$pageurl[1].'/'; 
		
		if(isset($fr_shape) and $fr_shape!=''){
			$alternate_link_fr = $alternate_link_fr.$fr_shape.'/';
		}
		
		if(isset($pageurl[2]) and $pageurl[2]!=''){
			$page = $page.$pageurl[2].'/'; 
		}
			
            // AA48 STARTS
			if($segment1 == "a4-sheets" && $segment2 == "oval"){
	            $meta_keywords.= '<meta name="keywords" content="oval labels, oval labels for printing">';
	        } else if($segment1 == "a4-sheets" && $segment2 == "circular") {
	            $meta_keywords.= '<meta name="keywords" content="circle labels, round labels">';
	        } else if($segment1 == "a4-sheets" && $segment2 == "square") {
	            $meta_keywords.= '<meta name="keywords" content="square labels">';
	        } else if($segment1 == "a4-sheets" && $segment2 == "star") {
	            $meta_keywords.= '<meta name="keywords" content="star label">';
	        } else if($segment1 == "a4-sheets" && $segment2 == "anti-tamper") {
	            $meta_keywords.= '<meta name="keywords" content="Anti Tamper Labels">';
	        } else if($segment1 == "a4-sheets" && $segment2 == "rectangle") {
	            $meta_keywords.= '<meta name="keywords" content="rectangle labels">';
	        } else if($segment1 == "a4-sheets" && $segment2 == "triangle"){
	            $meta_keywords.= '<meta name="keywords" content="triangle labels, triangular labels, triangle shaped labels">';
	        }
        // AA48 ENDS
			
	}
	else if( $class=='home' and $method=='material'){
			
			$cate_arr= explode("/",$page);
			$cat = $cate_arr[3];
			$cat_r =  $cate_arr[3];
			
			if(preg_match('/r1|r2|r3|r4|r5/is',$cat)){	
					$new_code_exp=explode("R",strtoupper($cat));
					$cat=$new_code_exp[0];
			}
			
			$qry = $this->db->query("SELECT PageTitle,Metadescription from category where CategoryID LIKE '$cat'");
			$res=$qry->result();
			$this->title=$res[0]->PageTitle;
			$this->desc=$res[0]->Metadescription;
			
			$page = explode("/", $page);
			
			$fr_page =  $this->parse_labels_shape('en', $page[1]);
			$fr_shape =  $this->parse_labels_shape('en', $page[2]);
			
			$alternate_link_fr = '/'.$fr_page.'/'.$fr_shape;
			$alternate_link_fr = $alternate_link_fr.'/'.$cat_r.'/';
			
			
			if(isset($_GET['productid']) and $_GET['productid']!=''){
			         $page = '/'.$page[1].'/'.$page[2];
			}else{
			         $page = '/'.$page[1].'/'.$page[2].'/';
			}

			
			if(strpos($this->title, 'AA Labels') == false)
				$this->title=$this->title."| AA Labels";

			$this->seo_urls();


			
			$hreflang = 'disable';
			
			
			
	}
	else if(preg_match('/integrated-labels/', $page) and $method!='integrated_detail'){
		 
		
		 $alternate_link_fr = '/etiquettes-integrees/'; 
		 $page = '/integrated-labels/';  //
		 $page = uri_string();
		 
		 $segment1 = $this->uri->segment(1);
		 $compatible = $this->uri->segment(2);
		 $compatible = ucfirst($compatible);
		 if(isset($compatible) and $compatible!=''){
			 $noindex  = 'active';
			 $this->desc = 'To view AA Labels range of integrated labels compatible with '.$compatible.' and other e-commerce software solutions. Visit this page and review all options.';
			 $this->title="Integrated labels | ".$compatible." compatible | AA Labels"; $page = '/integrated-labels/';
		 
		 
		 	  $alternate_link_fr .=$this->uri->segment(2).'/';
		 	  $page .= $this->uri->segment(2).'/';
		 
		 }
		 else if(isset($segment1) and $segment1!=''){
					$info = $this->get_meta_details($segment1);
					$this->title = $info['title'];
					$this->desc = $info['desc'];
		 }else{
				  $this->title="Buy blank and custom integrated labels | AA Labels";
		 }
		
	
	
	}
	else if(preg_match('/integrated-labels/', $page) and $method=='integrated_detail'){
		   
		
		   $alternate_link_fr = '/etiquettes-integrees/'; 
		   	$page = '/integrated-labels/';
		   
		    $cat ="";
		    $category = $this->uri->segment(2);
		    if($category){
				$qry = $this->db->query("SELECT PageTitle,Metadescription from category where CategoryID LIKE '$category'");
				$res=$qry->result();
				$this->title=$res[0]->PageTitle;
				$this->desc=$res[0]->Metadescription;
				
				$alternate_link_fr .=$category.'/';
				$page  .=  $category.'/';
			}
			if(strpos($this->title, 'AA Labels') == false)
			$this->title=$this->title."| AA Labels";
		
			$this->seo_urls();

			
	
	}
    else if( $class=='home' and $method=='searchby_printer'){

			$page = '/thermal-printer-roll-labels/';
			$alternate_link_fr = '/rouleaux-etiquettes-imprimantes-thermiques/';

			if($_GET){
				
				$this->title = ucfirst( ($_GET['make']))." | ";
				$this->desc = ucfirst( ($_GET['make']))." ";
			}


			$staticurl =  $this->uri->segment(1);
			$info = $this->get_meta_details($staticurl);
			$this->title = $this->title ." ".$info['title'];
			$this->desc = $info['desc']." ".$this->desc;
				
	} 
	else if( $class=='users'){
			$noindex  = 'active';
	
	    
	}else if($class=='home' and $method=='lba_labels'){
		
		
	  $total_seg =  $this->uri->total_segments();
	  if($total_seg==1){
	   $this->title = 'Professionaly Designed Free Label Templates';
	   $this->desc  = 'Professionally designed and customisable products. Produce great looking labels quickly and order online today for fast delivery';
    
	  }else if($total_seg==2){
	    $info = $this->db->query("SELECT * from lba_categories where link LIKE '".$this->uri->segment($total_seg)."' ")->row_array();
		$this->title = $info['meta_title'];
	    $this->desc  = $info['meta_desc'];
      }else if($total_seg==3){ 
	    $info = $this->db->query("SELECT * from lba_subcategories where link LIKE '".$this->uri->segment($total_seg)."' ")->row_array();
		$this->title = $info['meta_title'];
		$this->desc  = $info['meta_desc'];
		
	  }
	  
		   
		   if($this->title == '')
		   $this->title = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." | Next Day Delivery | AA Labels";

		   if($this->desc == '')
		   $this->desc = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." . AA Labels";
		   
		   $this->seo_urls();
			
           $alternate_link_fr = '';
           
	}	
	else if($class=='home' and $method=='lba_editor'){

		

	  $total_seg =  $this->uri->total_segments();
	  $linkseg = $total_seg -1;
	  $info = $this->db->query("SELECT * from lba_subcategories where link LIKE '".$this->uri->segment($linkseg)."' ")->row_array();
	  $this->title = $info['meta_title'];
	  $this->desc  = $info['meta_desc'];
	  $alternate_link_fr = '';
		
	  if($this->title == '')
	  $this->title = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." | Next Day Delivery | AA Labels";

	  if($this->desc == '')
	  $this->desc = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." . AA Labels";
		   
	  $this->seo_urls();
	    
	}else if( $class=='home' and $method=='applicationlabels'){
			
			$category = $this->uri->segment(2);
			$diecode = $this->uri->segment(3);
			$alternate_link_fr = '/etiquettes-par-usage/';
				
			if(isset($diecode) and $diecode!=''){
				 $qry = $this->db->query("SELECT PageTitle,Metadescription from category where CategoryID LIKE '$diecode'");
				 $res=$qry->result();
				 if(isset($res) and is_array($res)){
					$this->title=(isset($res[0]->PageTitle) and $res[0]->PageTitle!='')?$res[0]->PageTitle:'';
				 	$this->desc=(isset($res[0]->Metadescription) and $res[0]->Metadescription!='')?$res[0]->Metadescription:'';
				 }
				
				$page = '/labels-by-application/'.str_replace(" ","-",trim($category)).'/';
				
				$alternate_link_fr .=  $this->parse_labels_shape('en', $category).'/'.$diecode.'/';
				$alternate_link_fr = str_replace(" ","-",trim($alternate_link_fr));
				
			}
			else if(isset($category) and $category!=''){
				
				 $category = trim(str_replace("-"," ",$category));
				 $qry = $this->db->query("SELECT meta_title,meta_desciption from application_category where name LIKE '$category'");
				 $res=$qry->result();
				 if(isset($res) and is_array($res)){
					  $this->title=(isset($res[0]->meta_title) and $res[0]->meta_title!='')?$res[0]->meta_title:'';
				 	  $this->desc=(isset($res[0]->meta_desciption) and $res[0]->meta_desciption!='')?$res[0]->meta_desciption:'';
				 }
				 
				 $alternate_link_fr .=  $this->parse_labels_shape('en', $category).'/';
				 $alternate_link_fr = str_replace(" ","-",trim($alternate_link_fr));
				 
			}
			
			if(empty($this->title)){
					$staticurl =  $this->uri->segment(1);
					$info = $this->get_meta_details($staticurl);
					$this->title = $info['title'];
					$this->desc = $info['desc'];	
					$alternate_link_fr = "/".$info['url_fr'].'/';
			}
					
	}
	else if( $class=='home' and $method=='labeldesigner'){

		  $page = '/custom-label-tool/';
		  $alternate_link_fr = '/concepteur-etiquette/';
		  
		  $staticurl =  $this->uri->segment(1);
		  
		  $info = $this->get_meta_details($staticurl);
		  $this->title = $info['title'];
		  $this->desc = $info['desc'];	
		
		  $shape =  $this->uri->segment(2);
		  $code =  $this->uri->segment(3);
		  if(isset($shape) and $shape!=''){
		       $alternate_link_fr .=  $this->parse_labels_shape('en', $shape).'/';
		  }
		  if(isset($code) and $code!=''){
		       $alternate_link_fr .= $code.'/';
		  }
		  
		  // AA48 STARTS
	      if($this->uri->segment(1) == "custom-label-tool" && $this->uri->segment(2) == "")
          {
            	$meta_keywords.= '<meta name="keywords" content="custom labels, customised labels">';
          }
		  // AA48 ENDS
		  
		  $this->seo_urls();


		 
	}
	else if( $class=='home' and $method=='print_service'){
	      
		  $page = '/printed-labels/';
		  $alternate_link_fr = '/impression/';
		  $staticurl =  $this->uri->segment(1);
		  
		  // AA48 STARTS
			$staticurl2 =  $this->uri->segment(2);
			if( $staticurl2 && $staticurl2 != '' )
			{
				$staticurl .= "/".$staticurl2;
			}	
				
			$info = $this->get_meta_details($staticurl);

			$this->title = $info['title'];
			$this->desc = $info['desc'];

			if($this->uri->segment(1) == "printed-labels" && $this->uri->segment(2) == "") {
                $meta_keywords.= '<meta name="keywords" content="Printed Sticky Labels, Custom Printed Labels, Printed Labels, stickers printed, sticky label printing, clear label printing, printed labels for bottles">';
            } else if($this->uri->segment(1) == "printed-labels" && $this->uri->segment(2) == "circular") {
                $meta_keywords.= '<meta name="keywords" content="Round Printed Labels">';
            }else{
				$meta_keywords.= '<meta name="keywords" content="Printed Sticky Labels, Custom Printed Labels, Printed Labels, stickers printed, sticky label printing, clear label printing, printed labels for bottles">';
				$this->desc= "Printed Sticky Labels, Custom Printed Labels, Printed Labels, stickers printed, sticky label printing, clear label printing, printed labels for bottles";
			}
            // AA48 ENDS
		
		  $shape =  $this->uri->segment(2);
		  $code =  $this->uri->segment(3);
		  if(isset($shape) and $shape!=''){
		       $alternate_link_fr .=  $this->parse_labels_shape('en', $shape).'/';
		       $page = '/printed-labels/'.$shape.'/';
		  }
		  if(isset($code) and $code!=''){
		       $alternate_link_fr .= $code.'/';
		  }

		  		if($this->title == '')
				$this->title = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." | Next Day Delivery | AA Labels";

				if($this->desc == '')
				$this->desc = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." . AA Labels";
		   
				$this->seo_urls();
		 
	}
	else if( $class=='home' and ( $method=='label_by_adhesive' || $method == 'material_specification' || $method == 'free_sample')){
					
				$url1 =  $this->uri->segment(1);
				$url2 =  $this->uri->segment(2);
				$url3 =  $this->uri->segment(3);

				if($_GET){
					$this->title = ucfirst($_GET['code']) . " | ";
					$this->desc = ucfirst($_GET['code']). " ";
				}
				
				$staticurl = $url1."/".$url2;
				if(isset($url3) and $url3!=''){
		            $staticurl .= "/".$url3;
				}
				
				$staticurl = str_replace("'","", trim($staticurl));

				$info = $this->get_meta_details($staticurl);
				if($info['title']!=""){ 
					$this->title = $info['title'];
					$this->desc = $info['desc'];
					$alternate_link_fr = "/".$info['url_fr'];
				}
			
				

				$page = "/".$url1."/".$url2."/";
				
				// AA51 STARTS
					if( ($url1 == "material-on-sheets") && $url2 == "matt-gold-paper") {
	                    $meta_keywords.= '<meta name="keywords" content="metallic labels">';
	                } else if( ($url1 == "material-on-sheets") && $url2 == "fluorescent-green-paper") {
	                    $meta_keywords.= '<meta name="keywords" content="Fluorescent Labels">';
	                } 
				// AA51 ENDS
				
				if($this->title == '')
				$this->title = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." | Next Day Delivery | AA Labels";

				if($this->desc == '')
				$this->desc = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." . AA Labels";

				if($this->uri->segment(3) == 'products'){
				$this->title = $this->title ."Next Day Delivery | AA Labels";
				$this->desc = "Select from the extensive range available and buy online for fast next day delivery. ".$this->desc."." ;
				}
				
				if($method == 'label_by_adhesive' || $method == 'free_sample'){}
				else if (($this->uri->segment(1)  == 'material-on-sheets' && $this->uri->segment(3) == 'products')
						||($this->uri->segment(1) == 'material-on-rolls' && $this->uri->segment(3) == 'products'))
				$this->seo_urls();

	}
	else if( $class=='home' && $method=='testimonial' ){
			
			$page = '/testmonialdetail.php/';
			$alternate_link_fr = '/avis-clients/';
			
			$pagination_next = '';
			$pagination_prev = '';
			if(isset($_GET['per_page']) and $_GET['per_page']!=''){
					$pagenumber = $_GET['per_page'];
					if($pagenumber > 2){
							$row = $this->db->query(" select COUNT(*) as total from testimonials")->row_array();
							$total_reviews = $row['total'];
							$page_count =  1;
							if($total_reviews > 0){ $page_count = ceil($total_reviews/10);}
							$next_num = $pagenumber+1;
							if($next_num < $page_count ){
								$pagination_next = 	base_url().'testmonialdetail.php?&per_page='.$next_num;	
							}
							$prev_num = $pagenumber-1;
							$pagination_prev =  base_url().'testmonialdetail.php?&per_page='.$prev_num;
					}
					else if($pagenumber == 2){
							$pagination_next = 	base_url().'testmonialdetail.php?&per_page='.($pagenumber+1);
							$pagination_prev =  base_url().'testmonialdetail.php';
					}
					else{
							$pagination_next = 	base_url().'testmonialdetail.php?&per_page=2';
							$pagination_prev =  base_url().'testmonialdetail.php';
					}
					
					$page .=  '?&per_page='.$_GET['per_page'];	
					$alternate_link_fr .= '?&per_page='.$_GET['per_page'];	
					
			}else{
					$pagination_next = base_url().'testmonialdetail.php?&per_page=2';
			}
			
					$staticurl =  $this->uri->segment(1);	
					if(isset($staticurl) and $staticurl!=''){
					 	$info = $this->get_meta_details($staticurl);
						$this->title = $info['title'];
						$this->desc = $info['desc'];
					}
			
				
	}else if( $class=='home' && $method=='index' ){
           $meta_keywords.= '<meta name="keywords" content="Labels Online, labels Remove to stop cannibalisation: printed labels, printed online labels">';

    }
    
    // AA48 STARTS
    else if( $class=='home' && $method=='avery_size_labels' ){

    			$staticurl =  $this->uri->segment(1);

				$info = $this->get_meta_details($staticurl);
				$this->title = $info['title'];
				$this->desc = $info['desc'];
				$alternate_link_fr = "/".$info['url_fr'];
				
				$page = "/".$url1."/".$url2."/";

          	    $meta_keywords.= '<meta name="keywords" content="Avery labels">';

    }
    // AA48 ENDS
	else{	

	    		    $segment1 = $this->uri->segment(1);
					$segment2 = $this->uri->segment(2);
					if( $class=='home' and $method=='newsletter_archive'){
							$staticurl = $segment1; 
							if(isset($segment2) and $segment2!=''){ $staticurl .='/'.$segment2;}else{$staticurl .='/all';}
					}
					else if( $class=='selector' and $method=='category'){
							$staticurl = $segment1; 
							if(isset($segment2) and $segment2!=''){ $staticurl .='/'.$segment2;}else{$staticurl .='/all';}
							
							// AA48 STARTS
								if($segment1 == "templates" && $segment2 == "")
				                {
				                    $meta_keywords.= '<meta name="keywords" content="label template">';
				                }
			                // AA48 ENDS

					}
					else if( $class=='wholesale' and $method=='products'){
							$segment3 = $this->uri->segment(3);
							$staticurl = $segment1; 
							if(isset($segment2) and $segment2!=''){ $staticurl .='/'.$segment2;}
							if(isset($segment3) and $segment3!=''){ $staticurl .='/'.$segment3;}
					}
					else{
							$staticurl =  $this->uri->segment(1);	
						
					} 
					
				if(isset($staticurl) and $staticurl!=''){
				if(preg_match('/advancesearch/is',$staticurl) || preg_match('/sitemap/is',$staticurl)){ $noindex  = 'active';}
					
					$info = $this->get_meta_details($staticurl);
					$this->title = $info['title'];
					$this->desc = $info['desc'];
					if(isset($info['query_string']))
					$query_string = $info['query_string'];
					else
					$query_string = '';

				    if(isset($info['url_fr']) && $info['url_fr'] == "privacy-policy"){
				       $alternate_link_fr = "";
				    }else{
				        $alternate_link_fr = "/".$info['url_fr'].'/';
				    }
					    
				}

				if($this->title == '')
				$this->title = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." | Next Day Delivery | AA Labels";

				if($this->desc == '')
				$this->desc = ucfirst(str_replace('-',' ',$this->uri->segment(1)))." . AA Labels";

				$this->seo_urls();
	}
	
	$alternate_link_en = uri_string();
	
	if(empty($alternate_link_en)){ $alternate_link_en= '/'; }
	
	$trailing_slash_en = (substr($alternate_link_en, -1) != '/')?'/':'';
	$alternate_link_en = $alternate_link_en.''.$trailing_slash_en;
	
	$page_slash = (substr($page, -1) != '/')?'/':'';
	
	$page  = $page.''.$page_slash;
	
	// AA46 STARTS
		$trailing_slash_fr = (substr($alternate_link_fr, -1) != '/')?'/':'';
	// AA46 ENDS
	
	$alternate_link_fr = $alternate_link_fr.''.$trailing_slash_fr;
	
	if($this->title==''){
		$this->title="Buy Labels Online | Next Day Delivery | AA Labels";
	}
	if($this->desc==''){
	    $this->desc ="AA Labels is a 'one-stop shop' for all your label and sticker needs with a comprehensive range of shapes, sizes and colours. We offer Next Day Delivery.";
	}
	
	$meta = '';
	if($noindex=='active'){
		$meta .= '<meta name="robots" content="noindex" />';
	}
	
	$meta .= '<title>'.$this->title.'</title>';
	$meta .= '<meta name="description" content="'.$this->desc.'"/>';
	
	if(isset($pagination_prev) and $pagination_prev!=''){
			$meta .= '<link rel="prev" href="'.$pagination_prev.'" />';
	}
	if(isset($pagination_next) and $pagination_next!=''){
			$meta .= '<link rel="next" href="'.$pagination_next.'" />';
	}
	
// AA46 STARTS
		
		$url1 =  $this->uri->segment(1);
		$alternate_link_en=$this->str_replace_first("/","",$alternate_link_en);
		$alternate_link_fr=$this->str_replace_first('/', '', $alternate_link_fr);
		
		if( isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != '' )
		{	
			if($url1 == 'material-on-sheets' || 
			   $url1 == 'blog' ||
			   $url1 == 'customlabels.php' ||
			   $url1 == 'thermal-printer-roll-labels' ||
			   $url1 == 'material-on-rolls' )
			
			$meta .= '<link rel="canonical" href="'.SAURL.$alternate_link_en.'" />';
			else
			$meta .= '<link rel="canonical" href="'.SAURL.$alternate_link_en."?".$_SERVER['QUERY_STRING'].'" />';	
			
		}
		else
		{
			$meta .= '<link rel="canonical" href="'.SAURL.$alternate_link_en.'" />';
		}
	// AA46 ENDS
	
	if($hreflang == 'enable'){
	
        $meta .= '<link rel="alternate" href="'.SAURL.$alternate_link_en.'" hreflang="x-default" />';
        $meta .= '<link rel="alternate" href="'.SAURL.$alternate_link_en.'" hreflang="en-gb" />';
        
        if($alternate_link_fr!='' and $alternate_link_fr!='//'){
			$meta .= '<link rel="alternate" href="'.SAURL."fr/".$alternate_link_fr.'" hreflang="fr-fr" />';
			$meta .= '<link rel="alternate" href="'.SAURL."be/".$alternate_link_fr.'" hreflang="fr-be" />';
			$meta .= '<link rel="alternate" href="'.SAURL."lu/".$alternate_link_fr.'" hreflang="fr-lu" />';
			$meta .= '<link rel="alternate" href="'.SAURL."ch/".$alternate_link_fr.'" hreflang="fr-ch" />';
        }
	}
	
		if (isset($meta_keywords) && $meta_keywords!=''){
			$meta .= $meta_keywords;
		}
		
		$meta .= '<meta property="og:locale" content="en_GB" />';
		$meta .= '<meta property="og:type" content="website" />';
		$meta .= '<meta property="og:title" content="'.$this->title.'" />';
		$meta .= '<meta property="og:description" content="'.$this->desc.'" />';
		$meta .= '<meta property="og:url" content="'.SAURL.$alternate_link_en.'" />';
		$meta .= '<meta property="og:site_name" content="aalabels.com" />';
		echo $meta;
 }

}