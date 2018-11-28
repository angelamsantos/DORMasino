<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller { 

    // function __construct(){
    //     parent::__construct();
	// 	$this->load->helper(array('form', 'url'));
	// 	$this->load->library('form_validation');
    //     $this->load->library('session');
    // }

    public function index(){
        // Load our view to be displayed
        // to the user
        $this->load->model('logout_model');
        $this->logout_model->logout();
        
        redirect('Login');
    }
}
?>