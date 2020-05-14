<?php

class Users extends CI_Controller
{

    var $is_login = true;
    var $userid = '';

    function __construct()
    {

        parent::__construct();
        $this->userid = $this->session->userdata('userid');
        $this->is_login = $this->session->userdata('logged_in');
        $this->is_logged();

    }

    function is_logged()
    {

        $method = $this->router->fetch_method();
        $class = $this->router->fetch_class();
        if (isset($this->userid) and $this->is_login == true) {
            if ($class == 'users' and ($method == 'index' || $method == 'signup')) {
                redirect(SAURL . "users/user_account/");
            }


        } else {

            if ($class == 'users' and ($method == 'index' || $method == 'signup' || $method == 'logout' || $method == 'act' || $method == 'forgotPassword' || $method == 'changepassword')) {
            } else {
                redirect(SAURL . "users/");
            }


        }
    }

    function index()
    {

        $msg = $this->session->userdata('msg');
        $class = $this->session->userdata('class');
        if (isset($msg) and $msg != '') {
            $data['msg'] = $msg;
            $data['class'] = $class;
            $this->session->set_userdata('msg', '');
            $this->session->set_userdata('class', '');

        }
        $data['main_content'] = 'user/signin';
        $this->load->view('page', $data);

    }

    function signup()
    {
        $page = $this->input->post('page');
        $msg = "error";

        if ($_POST) {

            $captcha = $this->input->post('captcha');
            if (empty($_SESSION['captcha']) and $page != "flash" and $page != "lba" || trim(strtolower($captcha)) != $_SESSION['captcha'] and $page != "flash" and $page != "lba") {
                $data['class'] = 'danger';
                $data['msg'] = '<i class="fa fa-times-circle fa-lg"></i>  The captcha was wrong, please try again';
                $data['failed_reason'] = 'Invalid captcha';
            } else {

                $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customers.UserEmail]|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

                if ($this->form_validation->run() == false) {

                    $data['class'] = 'danger';
                    $data['msg'] = '<i class="fa fa-times-circle fa-lg"></i> ' . validation_errors();
                    $data['failed_reason'] = validation_errors();

                } else {

                    $data['BillingFirstName'] = $this->input->post('firstname', true);
                    $data['DeliveryFirstName'] = $this->input->post('firstname', true);
                    $data['UserName'] = $this->input->post('firstname', true);
                    $data['RegisteredDate'] = date('Y-m-d');
                    $data['RegisteredTime'] = date('H:i:s');
                    $data['BillingLastName'] = $this->input->post('lastname', true);
                    $data['DeliveryLastName'] = $this->input->post('lastname', true);
                    $data['Active'] = 0;
                    $data['DeliveryEmail'] = $this->input->post('email', true);
                    $data['UserEmail'] = $this->input->post('email', true);
                    $data['UserPassword'] = md5($this->input->post('password', true));
                    $data['UserTypeID'] = 14;
                    $data_temp['email'] = $this->input->post('email', true);

                    if ($create = $this->user_model->create_entry($data, $data_temp)) {

                        /*----------Newsletter Subscription---------------*/
                        $newsletter = $this->input->post('newsletter_val');
                        if (isset($newsletter) and $newsletter == 'on') {
                            $this->home_model->newsletter($this->input->post('email'));
                        }
                        /*----------Newsletter Subscription---------------*/
                    }

                    if (isset($page) and ($page == "flash" || $page == "lba")) {
                        $msg = "registered";
                        $userID = $this->home_model->get_db_column("customers", "UserID", "UserEmail", $data['UserEmail']);
                        $newdata = array(
                            'userid' => $userID,
                            'UserName' => $data['BillingFirstName'],
                            'logged_in' => true
                        );
                        $this->session->set_userdata($newdata);
                    }
                    $data['class'] = 'success';
                    $data['msg'] = '<i class="fa fa-check-circle fa-lg"></i> ' . $create;
                }
            }
        }

        if (isset($page) and ($page == "flash" || $page == "lba")) {
            $session_check_id = ($page == "lba") ? "label_id" : "template";
            $template = $this->session->userdata($session_check_id);
            $this->output->set_content_type('application/json');
            $json_data = array('msg' => $msg, 'template' => $template);
            $this->output->set_output(json_encode($json_data));
        } else {
            $data['main_content'] = 'user/signup';
            $this->load->view('page', $data);
        }

    }

    function act($activation_key)
    {

        $response = $this->user_model->activate_account($activation_key);
        $data['class'] = $response['class'];
        $data['msg'] = $response['msg'];
        $data['main_content'] = 'user/signin';
        $this->load->view('page', $data);

    }

    function forgotPassword()
    {

        if ($_POST) {
            $email = $this->input->post('email');
            $response = $this->user_model->forgotpassword($email);
            $data['class'] = $response['class'];
            $data['msg'] = $response['msg'];
        }
        $data['main_content'] = 'user/forgotPassword';
        $this->load->view('page', $data);
    }

//     function changepassword()
//     {
//         $token = $this->input->get('token');
//         $token_explode = explode('-', $token);
//         if ($_POST) {
//              $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
//             $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
//             $data['uid'] = base64_decode($this->input->post('uid'));

//             if ($this->form_validation->run() == false) {
//                 $data['class'] = 'danger';
//                 $data['msg'] = '<i class="fa fa-times-circle fa-lg"></i> ' . validation_errors();
//             } else {
// //usman
//                 $userid = base64_decode($this->input->post('uid'));
//                 $prev_password = $this->db->select('UserPassword')->from('customers')->where('UserID', $userid)->get()->result();
//                 $prev_password = $prev_password[0]->UserPassword;
//                 $password = md5($this->input->post('cpassword'));
//                 if ($prev_password == $password) {
//                     // print_r("sdsd");
//                 $msg = "Password cant be same as your old password.!";
//                 $this->session->set_userdata('msg', ' <i class="fa fa-times-circle fa-lg"></i> ' . $msg);
//                 $this->session->set_userdata('class', 'danger');

//                     $this->session->set_flashdata('message', 'Password cant be same as your old password');
//                     redirect(SAURL . "users/changepassword?token=" . $token);
//                                     // print_r($this->session->userdata('msg'));

//                 } 
//                 $user_name = $this->db->select('CONCAT(BillingFirstName,' . ', BillingLastName) AS name', FALSE)->from('customers')->where('UserID', $userid)->get()->result();
//                 $user_name_check = $user_name[0]->name;
//                 $password_check = $this->input->post('cpassword');
//                 if (strpos(strtolower($password_check), strtolower($user_name_check)) !== false) {
//                     $this->session->set_flashdata('message', 'Your User name cant be in your psassword');
//                     redirect(SAURL . "users/changepassword?token=" . $token);
//                 }
//                  $this->db->where('UserID', $userid);
//                 $don = $this->db->update('customers', array('UserPassword' => $password));
//                 $del = $this->db->delete('forgetpasswordtoken', array('TokenNumber' => $token_explode[0], 'UserID' => $data['uid']));

// //                brute-force new changes
// //                $this->db->select('UserEmail');
// //                $this->db->from('customers');
// //                $this->db->where('UserID', $userid);
// //                $query = $this->db->get_row();

//                 $user_email = $this->db->select('UserEmail')->from('customers')->where('UserID', $userid)->get()->result();

//                 $email = $user_email[0]->UserEmail;
//                   $this->throttle_cleanup($email);

//                 $this->db->set('is_throttle_block', 0, FALSE);
//                 $this->db->where('UserID', $userid);
//                 $this->db->update('customers');


// //usman
//                 $this->session->set_userdata('msg', '<i class="fa fa-check-circle fa-lg"></i> Your password has been successfully changed.');
//                 $this->session->set_userdata('class', 'success');
//                 redirect(SAURL . "users/");

//             }

//         } else if (isset($token) && !empty($token)) {
//             $uid = explode('-', $token);

//             $record = $this->user_model->checkforgot($uid[0], base64_decode($uid[1]));
//             if ($record == true) {
//                 $data['uid'] = $uid[1];
//             } else {
//                 $msg = "You have already changed your password or your link was expired.!";
//                 $this->session->set_userdata('msg', ' <i class="fa fa-times-circle fa-lg"></i> ' . $msg);
//                 $this->session->set_userdata('class', 'danger');
//                 redirect(SAURL . "users/");
//             }

//         } else {
//             redirect(SAURL . "users/");
//         }

//         $data['main_content'] = 'user/newPassword';
//         $this->load->view('page', $data);
//     }
    function changepassword()
    {
        $token = $this->input->get('token');
        $token_explode = explode('-', $token);
        if ($_POST) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
            $data['uid'] = base64_decode($this->input->post('uid'));

            if ($this->form_validation->run() == false) {
                $data['class'] = 'danger';
                $data['msg'] = '<i class="fa fa-times-circle fa-lg"></i> ' . validation_errors();
            } else {
//usman
                $userid = base64_decode($this->input->post('uid'));
                $prev_password = $this->db->select('UserPassword')->from('customers')->where('UserID', $userid)->get()->result();
                $prev_password = $prev_password[0]->UserPassword;
                $password = md5($this->input->post('cpassword'));
                if ($prev_password == $password) {
                    $this->session->set_flashdata('message', 'Password cant be same as your old password');
                    redirect(SAURL . "users/changepassword?token=" . $token);
                }
                $user_name = $this->db->select('CONCAT(BillingFirstName,' . ', BillingLastName) AS name', FALSE)->from('customers')->where('UserID', $userid)->get()->result();
                $user_name_check = $user_name[0]->name;
                $password_check = $this->input->post('cpassword');
                if (strpos(strtolower($password_check), strtolower($user_name_check)) !== false) {
                    $this->session->set_flashdata('message', 'Your User name cant be in your psassword');
                    redirect(SAURL . "users/changepassword?token=" . $token);
                }
                 $this->db->where('UserID', $userid);
                 $don = $this->db->update('customers', array('UserPassword' => $password));
                 $del = $this->db->delete('forgetpasswordtoken', array('TokenNumber' => $token_explode[0], 'UserID' => $data['uid']));

//                brute-force new changes
//                $this->db->select('UserEmail');
//                $this->db->from('customers');
//                $this->db->where('UserID', $userid);
//                $query = $this->db->get_row();

                $user_email = $this->db->select('UserEmail')->from('customers')->where('UserID', $userid)->get()->result();

                $email = $user_email[0]->UserEmail;
                   $this->throttle_cleanup($email);

                $this->db->set('is_throttle_block', 0, FALSE);
                $this->db->where('UserID', $userid);
                $this->db->update('customers');


//usman
                $this->session->set_userdata('msg', '<i class="fa fa-check-circle fa-lg"></i> Your password has been successfully changed.');
                $this->session->set_userdata('class', 'success');
                redirect(SAURL . "users/");

            }

        } else if (isset($token) && !empty($token)) {
            $uid = explode('-', $token);

            $record = $this->user_model->checkforgot($uid[0], base64_decode($uid[1]));
            if ($record == true) {
                $data['uid'] = $uid[1];
            } else {
                $msg = "You have already changed your password or your link was expired.!";
                $this->session->set_userdata('msg', ' <i class="fa fa-times-circle fa-lg"></i> ' . $msg);
                $this->session->set_userdata('class', 'danger');
                redirect(SAURL . "users/");
            }

        } else {
            redirect(SAURL . "users/");
        }

        $data['main_content'] = 'user/newPassword';
        $this->load->view('page', $data);
    }


    public function throttle_cleanup($email )
    {
         $userdata = $this->user_model->email_validate($email);

        if ($userdata > 0) {

//            $formatted_current_time = date("Y-m-d H:i:s", strtotime('-' . (int)$timeout . ' minutes'));
//            $start = '2010-12-16 14:09:44';
//        $modifier =  ' BETWEEN '.$start. 'and ' . "'$formatted_current_time'";
            $this->db->where('email', $email);
//            $this->CI->db->where('created_at >=', $start);
//            $this->CI->db->where('created_at <=', $formatted_current_time);
//        print_r($modifier);die;
            return $this->db->delete('throttles');
        }

    }

    function user_account()
    {

        $data['userdata'] = $this->user_model->get_data();
        $data['group_orders'] = $this->user_model->get_user_orders_status_groupd();
        $data['pending_orders'] = $this->user_model->pending_order_groupby();
        $data['completed_orders'] = $this->user_model->completed_order_groupby();
        $data['order'] = $this->user_model->get_total_order_record();

        $data['main_content'] = 'user/user_account';
        $this->load->view('page', $data);

    }

    function user_address()
    {

        $data['restofworld_list'] = $this->shopping_model->grouped_country_list('ROW');
        $data['europeunion_list'] = $this->shopping_model->grouped_country_list('EUROPEAN UNION');
        $data['europe_list'] = $this->shopping_model->grouped_country_list('EUROPE');

        $data['userdata'] = $this->user_model->get_data();

        $data['main_content'] = 'user/user_address';
        $this->load->view('page', $data);

    }

    function user_orders()
    {

        $filter = '';
        $sort = '';
        $filter_url = '';
        $sort_url = '';

        if (isset($_GET['filter'])) {
            $filter = strtolower($_GET['filter']);
            $filters = array("roll", "a4", "a5", "a3", "sra3", "integrated", "plain", "printed");
            $filter_url = "/?filter=" . $filter;
            if (!in_array($filter, $filters)) {
                $filter = '';
            }
        }
        if (isset($_GET['sort'])) {
            $sort = strtolower($_GET['sort']);
            $sorts = array("date_asc", "date_desc");

            if ($filter == '') {
                $sort_url = "/?sort=" . $sort;
            } else {
                $sort_url = "/?filter=" . $filter . "&sort=" . $sort;
            }

            if (!in_array($sort, $sorts)) {
                $sort = '';
            }
        }

        $this->load->helper('pagination_custom');
        $url = 'users/user_orders';
        $query = $this->user_model->user_orders($filter, $sort);

        $pagination = make_pagination_query($query, $url);

        $data['links'] = $pagination['links'];
        $data['totalrecord'] = $pagination['totalrecord'];
        $data['orders'] = $pagination['result'];
        $data['main_content'] = 'user/user_orders';
        $this->load->view('page', $data);
    }

    function user_orders_old()
    {

        $this->load->helper('pagination_custom');
        $url = 'users/user_orders';
        $query = $this->user_model->user_orders();
        $pagination = make_pagination_query($query, $url);

        $data['links'] = $pagination['links'];
        $data['totalrecord'] = $pagination['totalrecord'];
        $data['orders'] = $pagination['result'];
        $data['main_content'] = 'user/user_orders';
        $this->load->view('page', $data);
    }

    function user_projects()
    {

        $this->load->helper('pagination_custom');
        $url = 'users/user_projects';
        $query = $this->user_model->user_projects();
        $pagination = make_pagination_query($query, $url);

        $data['links'] = $pagination['links'];
        $data['totalrecord'] = $pagination['totalrecord'];
        $data['orders'] = $pagination['result'];

        $data['main_content'] = 'user/user_projects';
        $this->load->view('page', $data);

    }

    function logout()
    {

        $data['userid'] = "";
        $data['logged_in'] = false;
        $data['UserName'] = '';
        $this->session->unset_userdata($data);
        redirect(base_url());
    }


    function billing_method()
    {

        $usrid = $this->session->userdata('userid');

        if ($_POST) {
            $token = $this->input->post('token');
            if (isset($token) and $token != '') {
                require_once(APPPATH . 'libraries/worldpay.php');
                $worldpay = new Worldpay(WP_SERVICE_KEY);
                if (SITE_MODE != 'live') {
                    $worldpay->disableSSLCheck(true);
                } //remove this line after live
                try {
                    $cardDetails = $worldpay->getStoredCardDetails($token);
                    $already_registered = $this->user_model->card_already_registered($cardDetails['maskedCardNumber']);
                    if ($already_registered) {
                        $msg = 'This card is already added in your account.';
                        $this->session->set_userdata('msg', '<i class="fa fa-times-circle fa-lg"></i> ' . $msg);
                        $this->session->set_userdata('class', 'danger');
                        redirect(base_url() . 'users/billing_method');
                    }

                    $count = $this->home_model->get_db_column('saved_wp_tokens', 'count(*)', 'userid', $usrid);
                    $default = 1;

                    if ($count > 0) {
                        $default = 0;
                    }

                    $insert_array = array('userid' => $usrid,
                        'name' => $cardDetails['name'],
                        'expiryMonth' => $cardDetails['expiryMonth'],
                        'expiryYear' => $cardDetails['expiryYear'],
                        'cardIssuer' => $cardDetails['cardIssuer'],
                        'maskedCardNumber' => $cardDetails['maskedCardNumber'],
                        'cardType' => $cardDetails['cardType'],
                        'token' => $token,
                        'is_default' => $default);
                    $this->db->insert('saved_wp_tokens', $insert_array);
                    $this->session->set_userdata('msg', '<i class="fa fa-check-circle fa-lg"></i> Your Card has been successfully Saved.');
                    $this->session->set_userdata('class', 'success');
                } catch (WorldpayException $e) {
                    $this->session->set_userdata('msg', '<i class="fa fa-times-circle fa-lg"></i> ' . $e->getMessage());
                    $this->session->set_userdata('class', 'danger');

                } catch (Exception $e) {
                    $this->session->set_userdata('msg', '<i class="fa fa-times-circle fa-lg"></i> ' . $e->getMessage());
                    $this->session->set_userdata('class', 'danger');
                }
            }

        }

        $msg = $this->session->userdata('msg');
        $class = $this->session->userdata('class');
        if (isset($msg) and $msg != '') {
            $data['msg'] = $msg;
            $data['class'] = $class;
            $this->session->set_userdata('msg', '');
            $this->session->set_userdata('class', '');

        }
        $data['results'] = $this->db->query("Select * from saved_wp_tokens where userid=" . $usrid)->result();

        $data['main_content'] = 'user/billing_method';
        $this->load->view('page', $data);
    }

    function make_default_card()
    {
        $response = array('response' => 'error');
        if (isset($_POST['cardid']) and $_POST['cardid'] != '') {
            $usrid = $this->session->userdata('userid');
            $cardid = $this->input->post('cardid');
            $uid = $this->home_model->get_db_column('saved_wp_tokens', 'userid', 'ID', $cardid);
            if ($uid == $usrid) {
                $this->db->update('saved_wp_tokens', array('is_default' => 0), array('userid' => $usrid));
                $this->db->update('saved_wp_tokens', array('is_default' => 1), array('userid' => $usrid, 'ID' => $cardid));
                $this->session->set_userdata('msg', '<i class="fa fa-check-circle fa-lg"></i> Successfully updated as default card.');
                $this->session->set_userdata('class', 'success');

                $response = array('response' => 'updated');
            }
        }
        echo json_encode($response);
    }

    function delete_card()
    {
        $response = array('response' => 'error');
        if (isset($_POST['cardid']) and $_POST['cardid'] != '') {
            $usrid = $this->session->userdata('userid');
            $cardid = $this->input->post('cardid');
            $uid = $this->home_model->get_db_column('saved_wp_tokens', 'userid', 'ID', $cardid);
            if ($uid == $usrid) {
                $is_default = $this->home_model->get_db_column('saved_wp_tokens', 'is_default', 'ID', $cardid);
                $this->db->delete('saved_wp_tokens', array('ID' => $cardid));
                if ($is_default == 1) {
                    $row = $this->db->query("Select ID from saved_wp_tokens Where userid=$usrid Order BY ID ASC LIMIT 1 ")->row_array();
                    if (isset($row['ID']) and $row['ID'] != '') {
                        $this->db->update('saved_wp_tokens', array('is_default' => 1), array('userid' => $usrid, 'ID' => $row['ID']));
                    }
                }
                $this->session->set_userdata('msg', '<i class="fa fa-check-circle fa-lg"></i> Your card has been deleted successfully .');
                $this->session->set_userdata('class', 'success');
                $response = array('response' => 'updated');
            }
        }
        echo json_encode($response);
    }


}
