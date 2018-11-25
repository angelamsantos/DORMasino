<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_Password extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {

        $this->validate_login();

    }

}