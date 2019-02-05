<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout_model extends CI_Model {

    // public function __construct() {
	// 	$this->load->database();
	// 	$this->load->library('session');
    // }
    
    public function logout() {

        $admin = $this->session->userdata['login_success']['info']['admin_email'];

        if (isset ($admin)) {
            
            date_default_timezone_set('Asia/Manila');
            $log  = date("F j, Y, g:ia").": ". $admin . " logged out from the system".PHP_EOL;
            file_put_contents('syslogs/syslogs_logout.txt', $log, FILE_APPEND);

            $this->session->sess_destroy();

        } else {

            redirect('Login');

        }

    }

}
?>