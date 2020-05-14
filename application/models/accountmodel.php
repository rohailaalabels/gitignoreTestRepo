<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class accountModel extends CI_Model {

    public function unpaidOrders() {

        
            
   
            $query = $this->db->query("select * from orders where (orders.Payment='0' or orders.Payment='2')and ((OrderTotal<>'0.00')and(OrderStatus ='7'or OrderStatus ='8')or(PaymentMethods ='specialOrders'and OrderStatus !='27'))order by OrderID desc ");
        

        return $query->result();
    }

    public function paidOrders($limit, $offset) {
        if ($offset) {
            $query = $this->db->query("select * from orders WHERE Payment=1 AND((OrderTotal<>'0.00')and OrderStatus ='7'or OrderStatus ='8'or PaymentMethods ='specialOrders')order by OrderID desc LIMIT $limit OFFSET $offset");
        } else {
            $query = $this->db->query("select * from orders WHERE Payment=1 AND((OrderTotal<>'0.00')and OrderStatus ='7'or OrderStatus ='8'or PaymentMethods ='specialOrders')order by OrderID desc LIMIT $limit");
        }
        return $query->result();
    }

    public function returnRows() {

        $query = $this->db->query("select * from orders where (orders.Payment='0' or orders.Payment='2')and ((OrderTotal<>'0.00')and(OrderStatus ='7'or OrderStatus ='8')or(PaymentMethods ='specialOrders'and OrderStatus !='27'))");
        return $query;
    }

    public function PaidreturnRows() {

        $query = $this->db->query("select * from orders WHERE Payment=1 AND((OrderTotal<>'0.00')and OrderStatus ='7'or OrderStatus ='8'or PaymentMethods ='specialOrders')order by OrderID desc");
        return $query;
    }

    public function AccountDetails() {
        $orderID = end($this->uri->segments);
        $query = $this->db->get_where('orderdetails', array('OrderNumber' => $orderID));
        return $query->result();
    }

    public function AccountInfo() {
        $orderID = end($this->uri->segments);
        $query = $this->db->get_where('orders', array('OrderNumber' => $orderID));
        return $query->result();
    }
    public function getstatus($id) {
         
        $query = $this->db->get_where('dropshipstatusmanager', array('StatusID' => $id));
        return $query->result();
    }

    public function unpaidOrdersLoad() {
        $search = $_POST['search'];

        $query = $this->db->query("select * from orders where (orders.Payment='0' or orders.Payment='2')and orders.BillingFirstName LIKE '" . '%' . $search . '%' . "' and ((OrderTotal<>'0.00')and(OrderStatus ='7'or OrderStatus ='8')or(PaymentMethods ='specialOrders'and OrderStatus !='27'))order by OrderID desc");
        return $query->result();
    }
	
	
    public function changestatus($id,$status){
        $update = array(
            'Payment' => $status,
        );
        
        $this->db->where('OrderID',$id);
        $this->db->update('orders',$update);
    }
	

    public function manufactureid($domain,$id)
    {
        if($domain=='123'){$ManufactureID='123ManufactureID';}else{$ManufactureID='ManufactureID';}
        $this->db->select($ManufactureID);
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        $row = $query->result();
        return $row[0]->$ManufactureID;
    }
	
	public function LabelsPerSheet($id){
        $this->db->select('LabelsPerSheet');
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        $row = $query->result();
        return $row[0]->LabelsPerSheet;
    }
	
	
	 /******************Pending Payment Order implementation***********************/ 
	 
	 
	 function customer($USERID){
	 $qry = $this->db->query("select * from customers where UserID = '$USERID'");
	 return $qry->row_array();
	 	 
	 }
	 
	 function get_currecy_symbol($code){
			 $sql = $this->db->query("select symbol from exchange_rates where currency_code LIKE '".$code."'");
			 $sql = $sql->row_array();
			 return $sql['symbol'];
	}
	
	function ReplaceHtmlToString_($text ){

		$utf8 = array(
        '/[áàâãªä]/u'   =>   'a',
        '/[ÁÀÂÃÄ]/u'    =>   'A',
        '/[ÍÌÎÏ]/u'     =>   'I',
        '/[íìîï]/u'     =>   'i',
        '/[éèêë]/u'     =>   'e',
        '/[ÉÈÊË]/u'     =>   'E',
        '/[óòôõºö]/u'   =>   'o',
        '/[ÓÒÔÕÖ]/u'    =>   'O',
        '/[úùûü]/u'     =>   'u',
        '/[ÚÙÛÜ]/u'     =>   'U',
        '/ç/'           =>   'c',
        '/Ç/'           =>   'C',
        '/ñ/'           =>   'n',
        '/Ñ/'           =>   'N',
        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
        '/[“”«»„]/u'    =>   ' ', // Double quote
        '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
    );
    	return $string =  preg_replace(array_keys($utf8), array_values($utf8), $text);
	}
	
	public function calculate_total_printed_labels($serial){
		
		$query = $this->db->query(" SELECT SUM(labels) AS total from order_attachments_integrated WHERE Serial LIKE '".$serial."'  ");
		$row = $query->row_array();	
		return $row['total'];
   }
   
   public function get_details_roll_quotation($id){
		$query = $this->db->query("SELECT * from roll_print_basket WHERE SerialNumber = '$id' ");
		$row = $query->row_array();	
		return $row;
	}
	
	public function OrderDetails($orderID) {
        if(empty($orderID)){
	        $orderID = end($this->uri->segments);
         }
        $query = $this->db->get_where('orderdetails', array('OrderNumber' => $orderID));
        return $query->result();

    }

    public function OrderInfo($orderID) {
        if(empty($orderID)){
	        $orderID = end($this->uri->segments);
        }
        $query = $this->db->get_where('orders', array('OrderNumber' => $orderID));
        return $query->result();
    }
	
	public function get_printing_service_name($process){
			
			if($process == 'Fullcolour'){
					$A4Printing = ' 4 Colour Digital Process ';
			}
			else if($process == 'Mono' || $process == 'Monochrome – Black Only'){
					$A4Printing = ' Monochrome &ndash; Black Only ';
			}else{
				
					
					$A4Printing = $process;
			}
			return $A4Printing;
			
	}
	
	public function get_printed_files($serial){
	  $q = $this->db->query(" select * from quotation_attachments_integrated  WHERE Serial LIKE '".$serial."'  ");
	  return $q->result(); 
  }
  public function getproductimg($id, $colorcode=NULL){
		$query = $this->db->select('Image1,ProductBrand,ManufactureID')
							->where('ProductID',$id)
							->get('products');
		$data = $query->row_array();
		
		if($id==0){
			 $img = "High_Gloss_Permanent_Adhesive.png";
			 return base_url().'theme/images/images_products/material_images/'.$img; 
		}
		else if(preg_match('/Application Labels/', $data['ProductBrand'])){
				 $designcode = substr( $data['ManufactureID'], -4); 
				 return Assets."images/application/design/".$designcode.$colorcode.'.png';
		}
		else{      
						 //$data['Image1'] = trim(str_replace(".gif",".png",$data['Image1']));
						 $data['Image1'] = str_replace(" ","",$data['Image1']);
						  return base_url().'theme/images/images_products/material_images/'.$data['Image1'];
			   }
		
		
	}
	function is_Sample_Order($order_no){
		
		$check_sample_order = $this->db->query("select PaymentMethods from orders where OrderNumber like '".$order_no."'")->row();
		if(count($check_sample_order) > 0 ){
			if($check_sample_order->PaymentMethods == 'Sample Order'){
				return '&ndash;';
			}else{
				return false;
			}
		}
	}
	
	
	
}

?>
