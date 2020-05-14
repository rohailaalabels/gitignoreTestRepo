<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Throttle
{
    public function __construct()
    {
         $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->model('user_model');
     }

    /* *
     * throttles multiple connections attempts to prevent abuse
     * @param int $type type of throttle to perform.
     *
     */
    public function throttle_login($email, $type = 0, $limit = 5, $timeout = 30)
    {
//        $email =   filter_var($email, FILTER_VALIDATE_EMAIL);
//        print_r($email);die;

        //clean up login attempts older than specified time
        $this->throttle_cleanup($email, $timeout, $type );
        $attempts = 0;


 //        $attempts = $this->CI->db->throttle_model->where(['ip' => $this->CI->input->ip_address(), 'type' => $type])->count();
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->CI->db->where('email', $email);
            $attempts = $this->CI->db->count_all_results('throttles');
         if ($attempts > $limit) {
             $this->CI->db->set('is_throttle_block', 1, FALSE);
             $this->CI->db->where('UserEmail', $email);
             $this->CI->db->update('customers');


             $this->CI->db->select('created_at');
             $this->CI->db->where('email', $email);
             $this->CI->db->order_by("id", "desc");
             $result = $this->CI->db->get('throttles')->row();
             $final = strtotime(date('Y-m-d H:i:s')) -  strtotime($result->created_at);
             $selectedTime = "00:00:00";
             $threshhold_time = strtotime("+15 minutes", strtotime($selectedTime));
             $remaining_minutes = $threshhold_time - $final;

             $minutes = date('i:s',  $remaining_minutes);
             $result = array();
             $result['minutes'] = $minutes;
             return ($result);

//            show_error('Too many attempts. Try back after ' . $minutes . ' minutes.', 503, 'Attempt failed');

         }else{
             if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 $userdata = $this->CI->user_model->email_validate($email);
                 if ($userdata > 0) {
                     $data = array(
                         'ip' => $this->CI->input->ip_address(),
                         'type' => $type,
                         'email' => $email,
                         'created_at' => date('Y-m-d H:i:s')
                     );

                     $this->CI->db->insert('throttles', $data);

                     $this->CI->db->set('is_throttle_block', 0, FALSE);
                     $this->CI->db->where('UserEmail', $email);
                     $this->CI->db->update('customers');
                 }
             }


         }

        return $attempts; // return current number of attempted logins
        }
    }

    /**
     * Cleans up old throttling attempts based on throttle timeout
     *
     * @param $timeout
     * @return result of query
     */
    public function throttle_cleanup($email,$timeout, $type)
    {
        $userdata = $this->CI->user_model->email_validate($email);
        if ($userdata > 0) {
            $formatted_current_time = date("Y-m-d H:i:s", strtotime('-' . (int)$timeout . ' minutes'));
            $start = '2010-12-16 14:09:44';
//        $modifier =  ' BETWEEN '.$start. ' and ' . "'$formatted_current_time'";
            $this->CI->db->where('email', $email);
            $this->CI->db->where('created_at >=', $start);
            $this->CI->db->where('created_at <=', $formatted_current_time);
//        print_r($modifier);die;
            return $this->CI->db->delete('throttles');
        }

    }


}