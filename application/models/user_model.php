<?php

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function validate_login($user_email, $password)
    {
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

            $query = $this->db->query("SELECT *,count(UserEmail) as total FROM customers WHERE UserEmail = '$user_email' AND UserPassword = '$password' AND is_throttle_block = 0");
            return $query->row_array();
        }
    }

    function email_validate($val)
    {
        if (filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $qry = $this->db->query("SELECT count(*) as total FROM  `customers` WHERE  `UserEmail` =  '" . $val . "'");
            $res = $qry->row_array();
            return $res['total'];
        }
    }

    function email_template($mailid)
    {
        $where = "mailid = $mailid";
        $qry = $this->db->query("SELECT * FROM " . Template_Table . " WHERE " . $where . "");
        return $qry->result_array();
    }

    function get_data()
    {

        $qry = $this->db->query("SELECT * FROM  `customers` WHERE  `UserID` =  '" . $this->session->userdata('userid') . "'");
        $res = $qry->row_array();
        return $res;
    }

    function get_user_orders_status_groupd()
    {

        $qry = $this->db->query("SELECT `StatusTitle`,count(OrderStatus) AS TOTAL FROM `orders` 
									  INNER JOIN dropshipstatusmanager ON orders.OrderStatus=dropshipstatusmanager.StatusID 
								 	 WHERE `UserID` =  '" . $this->session->userdata('userid') . "' AND (OrderStatus=7 OR OrderStatus=33 OR OrderStatus=6 OR OrderStatus=27) 
									 Group BY StatusTitle");
        $res = $qry->result();
        return $res;


    }

    function pending_order_groupby()
    {
        $query = "SELECT Month( FROM_UNIXTIME(`OrderDate`) ) AS 'Month', count( OrderStatus ) AS total FROM orders
				  INNER JOIN dropshipstatusmanager ON orders.OrderStatus = dropshipstatusmanager.StatusID
				  WHERE Year( FROM_UNIXTIME(`OrderDate`) ) = 2014
				  AND OrderStatus =6 AND `UserID` =  '" . $this->session->userdata('userid') . "'
				  GROUP BY Month( FROM_UNIXTIME(`OrderDate`) )";
        $qry = $this->db->query($query);
        $res = $qry->result();
        return $res;
    }

    function completed_order_groupby()
    {
        $query = "SELECT Month( FROM_UNIXTIME(`OrderDate`) ) AS 'Month', count( OrderStatus ) AS total FROM orders
				      INNER JOIN dropshipstatusmanager ON orders.OrderStatus = dropshipstatusmanager.StatusID
				      WHERE Year( FROM_UNIXTIME(`OrderDate`) ) = 2014
				      AND OrderStatus =7 AND `UserID` =  '" . $this->session->userdata('userid') . "'
				      GROUP BY Month( FROM_UNIXTIME(`OrderDate`) )";


        $qry = $this->db->query($query);
        $res = $qry->result();
        return $res;
    }

    function get_total_order_record()
    {
        $qry = $this->db->query("SELECT SUM(OrderTotal) AS OrderTotal,Count(*) AS NumberOfOrders  FROM  `orders` WHERE Domain NOT LIKE '123' 
		AND `UserID` =  '" . $this->session->userdata('userid') . "'");
        $res = $qry->row_array();
        return $res;
    }

    function validate_userpass($password)
    {
        $query = $this->db->query("SELECT * FROM customers WHERE UserID = '" . $this->session->userdata('userid') . "' AND UserPassword = '$password'");
        if ($query->num_rows === 1) {
            return true;
        } else {
            return false;
        }
    }

    function update_user_pass($pass)
    {

        $userid = $this->session->userdata('userid');
        $data = array('UserPassword' => $pass);
        $don = $this->db->update('customers', $data, array('UserID' => $userid));
        return "Your password has been successfully updated...!";

    }

    function user_orders($filter = '', $sort = '')
    {

        //echo "filter: ".$filter."<br>";
        //echo "sort: ".$sort."<br>";
        //exit;

        $userid = $this->session->userdata('userid');
        $where = " orders.`UserID` =  '" . $userid . "' AND Domain NOT LIKE '123'";
        $q_sort = " ORDER BY`orders`.`OrderID` DESC";

        $like = '';
        $query = '';

        if ($filter != '') {
            if ($filter == "roll") {
                $and = " orderdetails.`ProductName` LIKE '%Roll%'";
            } else if ($filter == "a4") {
                $and = " orderdetails.`ManufactureID` LIKE 'AA%' AND orderdetails.`ProductName` NOT LIKE '%integrated%'";
            } else if ($filter == "a5") {
                $and = " orderdetails.`ManufactureID` LIKE 'A5%' AND orderdetails.`ProductName` LIKE '%A5%'";
            } else if ($filter == "a3") {
                $and = " orderdetails.`ManufactureID` LIKE 'A3%' AND orderdetails.`ProductName` LIKE '%A3%'";
            } else if ($filter == "sra3") {
                $and = " orderdetails.`ManufactureID` LIKE 'SR%' AND orderdetails.`ProductName` LIKE '%SRA3%'";
            } else if ($filter == "integrated") {
                $and = " orderdetails.`ManufactureID` LIKE 'AAIL%' AND orderdetails.`ProductName` LIKE '%integrated%'";
            } else if ($filter == "printed") {
                //$like = " AND orderdetails.`Printing` = 'Y'";
                $and = " orderdetails.`Printing` = 'Y'";
            } else if ($filter == "plain") {
                //$like = " AND orderdetails.`Printing` != 'Y'";
                $and = " orderdetails.`Printing` != 'Y'";
            }


            $like = "AND (SELECT COUNT(*) FROM orderdetails WHERE orders.orderNumber = orderdetails.orderNumber AND " . $and . ") > 0";

            if ($sort == "date_asc") {
                $q_sort = " ORDER BY`orders`.`OrderDate` ASC";
            } else if ($sort == "date_desc") {
                $q_sort = " ORDER BY`orders`.`OrderDate` DESC";
            }

            $query = "Select * from orders INNER JOIN dropshipstatusmanager ON orders.OrderStatus = dropshipstatusmanager.StatusID WHERE " . $where . $like . $q_sort;
        } else {
            if ($sort == "date_asc") {
                $q_sort = "ORDER BY`orders`.`OrderDate` ASC";
            } else if ($sort == "date_desc") {
                $q_sort = "ORDER BY`orders`.`OrderDate` DESC";
            }

            $query = "Select * from orders INNER JOIN dropshipstatusmanager ON  orders.OrderStatus = dropshipstatusmanager.StatusID WHERE " . $where . $q_sort;
        }
        //echo($query);exit;
        return $query;
    }

    function user_orders_old()
    {

        $userid = $this->session->userdata('userid');
        $where = " orders.`UserID` =  '" . $userid . "' AND Domain NOT LIKE '123'";
        $query = "Select * from orders INNER JOIN dropshipstatusmanager ON  orders.OrderStatus = dropshipstatusmanager.StatusID
								    WHERE " . $where . " ORDER BY`orders`.`OrderID` DESC";
        /*$query = $this->db->query("Select * from orders INNER JOIN dropshipstatusmanager ON  orders.OrderStatus = dropshipstatusmanager.StatusID
                                    WHERE ".$where." ORDER BY`orders`.`OrderID` DESC limit 5");
        $res 	= $query->result();*/
        return $query;
    }

    function isProductActive($productId)
    {
        $query = $this->db->query("SELECT Count(*) as Record FROM `products` Where ManufactureID='" . $productId . "' AND `Activate` LIKE 'Y'");
        $result = $query->row_array();
        return $result['Record'];

    }


    function get_Menu_ID($prdID)
    {
        $query = $this->db->query("SELECT ManufactureID from products WHERE  ProductID ='" . $prdID . "'");
        $record = $query->result_array();
        return $record[0]['ManufactureID'];
    }

    function get_order_product_record($orderNumber)
    {
        //$qry 	= $this->db->query("SELECT * FROM  `orderdetails` WHERE  `OrderNumber` =  '".$orderNumber."' AND ProductID !=0");
        $qry = $this->db->query("SELECT * FROM  `orderdetails` WHERE  `OrderNumber` =  '" . $orderNumber . "'");
        $res = $qry->result();
        return $res;

    }

    function create_entry($data, $data_temp)
    {

        $str = $this->db->insert_string('customers', $data);
        $query = $this->db->query($str);
        if ($query) {

            $act_code = md5(rand(0, 1000) . 'uniquefrasehere');
            $temp = $this->db->query("SELECT * FROM customers WHERE UserEmail = '" . $data_temp['email'] . "'");
            $res = $temp->result_array();
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


                $getfile = FCPATH . 'system/libraries/en/account-setup.html';
                $mailText = file_get_contents($getfile);

                $url = base_url('theme') . '/';
                $code = base64_encode($res[0]['UserID']);
                $link = base_url() . 'users/act/' . $act_code . '-' . $code;

                $strINTemplate = array('[WEBROOT]', "[UserName]", "[link]", "[email]", "[date]", "[time]");
                $strInDB = array($url, $res[0]['BillingFirstName'], $link, $data_temp['email'], date("d/m/Y"), date("g:i A"));
                $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);

                $this->load->library('email');
                $this->email->from('support@aalabels.com', 'AALABELS');
                $this->email->to($data_temp['email']);
                //	$this->email->bcc('kami.ramzan77@gmail.com');
                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");
                $this->email->send();

            }
        }

        $msg = "An Activation Email has been sent to your email address. Please follow the instructions in this email to continue.";
        $msg .= "If you have not received this email please call us on 01733 588 390, Please also check your Junk Mail folder.";
        return $msg;


    }

    function get_product_details($prdID)
    {
        $query = $this->db->query("SELECT ProductBrand,ManufactureID,LabelsPerSheet,Image1 from products WHERE  ProductID ='" . $prdID . "'");
        //$query = $this->db->query("SELECT * from products WHERE  ProductID ='".$prdID."'");
        return $query->row_array();

    }

    public function UpdateDB($tblName, $customer_array, $userid)
    {

        $this->db->where('UserId', $userid);
        $res = $this->db->update($tblName, $customer_array);
        return $res;
    }


    function activate_account($activation)
    {
        $result = explode('-', $activation);
        $act_code = $result[0];
        $userid = base64_decode($result[1]);

        $qry = $this->db->query("SELECT * FROM account_activation WHERE UserID = " . $userid . " AND  account_token_number ='" . $act_code . "'");
        if ($qry->num_rows() > 0) {
            $data = array('Active' => 1);
            $don = $this->db->update('customers', $data, array('UserID' => $userid));
            if ($don) {

                $del = $this->db->delete('account_activation', array('UserID' => $userid));
                $temp = $this->db->query("SELECT * FROM customers WHERE UserID = " . $userid . "");
                $res = $temp->result_array();

                $mail_template = $this->email_template(1);
                $mailTitle = $mail_template[0]['MailTitle'];
                $mailName = $mail_template[0]['Name'];
                $from_mail = $mail_template[0]['MailFrom'];
                $mailSubject = $mail_template[0]['MailSubject'];
                $mailText = $mail_template[0]['MailBody'];


                $getfile = FCPATH . 'system/libraries/en/register.html';
                $mailText = file_get_contents($getfile);

                $url = base_url('theme') . '/';
                $strINTemplate = array('[WEBROOT]', "[UserName]", "[EmailAddress]", "[date]", "[time]");
                $strInDB = array($url, $res[0]['BillingFirstName'], $res[0]['UserEmail'], date("d/m/Y"), date("g:i A"));
                $newPhrase = str_replace($strINTemplate, $strInDB, $mailText);


                $this->load->library('email');
                $this->email->from('customercare@aalabels.com', 'AALABELS');
                $this->email->to($res[0]['UserEmail']);
                //	$this->email->bcc('kami.ramzan77@gmail.com');
                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");

                if ($this->email->send()) {
                    $data['class'] = 'success';
                    $data['msg'] = '<i class="fa fa-check-circle fa-lg"></i> Your account is successfully activated. If you have any query, please call us on 01733 588 390;';
                }
            } else {
                $data['class'] = 'danger';
                $data['msg'] = '<i class="fa fa-times-circle fa-lg"></i> You have already activated of your account or your activation period is expired.!';
            }

        } else {
            $data['class'] = 'danger';
            $data['msg'] = '<i class="fa fa-times-circle fa-lg"></i> You have already activated of your account or your activation period is expired.!';
        }

        return $data;

    }


    function forgotpassword($email)
    {

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
                $mail_template = $this->email_template(2);
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
                $this->email->from($from_mail, 'AALABELS');
                $this->email->to($email);
                //	$this->email->bcc('kami.ramzan77@gmail.com');
                $this->email->subject($mailSubject);
                $this->email->message($newPhrase);
                $this->email->set_mailtype("html");
                $this->email->send();
                $msg = "A link has been sent to your email address.
							Please follow the instructions in this email to continue. <br>
							If you have not received this email please call us on 01733 588 390,
							Please also check your Junk Mail folder.";
                $class = 'success';
            }
        }
        return array('class' => $class, 'msg' => $msg);
    }


    function checkforgot($token, $id)
    {
        $qry = $this->db->query("SELECT * FROM forgetpasswordtoken WHERE TokenNumber = '" . $token . "' AND UserID = $id");
        $num_row = $qry->num_rows();
        if ($num_row != 0) {
 			// $del = $this->db->delete('forgetpasswordtoken', array('TokenNumber' => $token, 'UserID' => $id));
             return true;
        } else {
            return false;
        }
    }


    public function getMax()
    {
        $q = $this->db->query("SELECT MAX(id) as id FROM customlabelsnumber");
        $result = $q->result();
        $maxNumber = $result[0]->id + 1;
        $maxNumber = "E" . $maxNumber;
        $q = $this->db->query("insert into  customlabelsnumber set customLabelsNumber='" . $maxNumber . "'");
        return $maxNumber;
    }

    public function quote_fill($customer_array)
    {
        $str = $this->db->insert_string('contactus', $customer_array);
        $query = $this->db->query($str);
        return $query;

    }

    function user_projects()
    {

        $userid = $this->session->userdata('userid');
        $query = "Select * from flash_user_design  WHERE UserID = '$userid' and status = 'Y' and Type = 'LD' ORDER BY ID";
        return $query;
    }

    /***************** NEW FUNCTION
     *******************************************/

    function get_order_product_record_by_serial($serial)
    {
        $qry = $this->db->query("SELECT * FROM  `orderdetails` WHERE  `SerialNumber` =  '" . $serial . "'");
        $res = $qry->result();
        return $res;

    }

    function get_sum_of_designed_artworks($orderNum, $ProductID)
    {
        $q = $this->db->query("select SUM(labels) AS labels from order_attachments_integrated WHERE ProductID = '" . $ProductID . "' AND OrderNumber = '" . $orderNum . "' ORDER BY ID ASC");

        $sql = $q->row_array();
        return $sql;
    }


    function card_already_registered($number)
    {
        $userid = $this->session->userdata('userid');
        $query = $this->db->query(" Select count(*) as total from saved_wp_tokens WHERE userid=$userid AND maskedCardNumber LIKE '" . $number . "' ");
        $row = $query->row_array();
        if (isset($row['total']) and $row['total'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_user_saved_cards()
    {
        $userid = $this->session->userdata('userid');
        $result = $this->db->query(" Select * from saved_wp_tokens WHERE userid=$userid ")->result();
        return $result;
    }

    /**UX **/
    function get_user_orders_count()
    {
        $userid = $this->session->userdata('userid');
        $where = " orders.`UserID` =  '" . $userid . "' AND Domain NOT LIKE '123'";
        $query = "Select count(*) as count_orders from orders WHERE " . $where . ";";
        $records = $this->db->query($query)->row();
        return $records->count_orders;
    }

    function get_user_recent_lines($limit = 5)
    {
        $userid = $this->session->userdata('userid');
        $query = "SELECT o.OrderDate, od.* FROM `orderdetails` as od inner join orders as o on od.OrderNumber = o.OrderNumber Where od.UserID LIKE '" . $userid . "' Order BY o.OrderTime DESC Limit " . $limit;
        return $this->db->query($query)->result();
    }

    function get_line_by_serial($SerialNumber)
    {
        $query = "SELECT* FROM `orderdetails` Where SerialNumber LIKE '" . $SerialNumber . "'";
        return $this->db->query($query)->row();
    }
}

