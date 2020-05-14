<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Flash_model extends CI_Model{

	
	function __construct(){

		parent::__construct();
	}

	function getcategory(){
	$qry = $this->db->query("select * from flash_shape_category where active LIKE 'Y'");
	return $qry->result();	
	}
	
	function getshapes($id){
	$qry = $this->db->query("select * from flash_shapes where CategoryID = '$id'");
	return $qry->result();	
	}
	
	
	
	
	
	
	
	
	
	
	
 
 
 
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */