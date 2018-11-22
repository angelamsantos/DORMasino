<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout_model extends CI_Model {

    public function __construct() {
		$this->load->database();
		$this->load->library('session');
    }
    
    public function logout() {
        session_destroy;
    }

}
?>