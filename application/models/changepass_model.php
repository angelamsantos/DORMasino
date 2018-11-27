<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class changepass_model extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->library('session');
	}

	public function update($data, $email) {

        if(!empty($data) && !empty($email)){

            $update = $this->db->update('admin_tbl', $data, array('admin_email'=>$email));
            return $update?true:false;

        } else {

            return false;

        }
    }

	public function change_password() {

		$email = $this->session->userdata['email'];
        $new_password = md5($this->security->xss_clean($this->input->post('new_password')));
        $confirm_password = md5($this->security->xss_clean($this->input->post('confirm_password')));

        if ($new_password == $confirm_password) {

            $data = array('admin_password' => $confirm_password, 'admin_new' => 0 );
			$this->update($data, $email);

            date_default_timezone_set('Asia/Manila');
            $log = date("F j, Y, g:ia").": ". $email . " successfully changed their password.".PHP_EOL;
            file_put_contents('syslogs/syslogs_settings.txt', $log, FILE_APPEND);

            return true;

        } else {

            date_default_timezone_set('Asia/Manila');
            $log = date("F j, Y, g:ia").": ". $email . " failed to change their password.".PHP_EOL;
            file_put_contents('syslogs/syslogs_settings.txt', $log, FILE_APPEND);
            //new password and confirm password did not match
            return false;

        }
 
	}

}
?>
