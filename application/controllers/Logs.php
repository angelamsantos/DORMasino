<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends CI_Controller {

	// function __construct(){
    //     parent::__construct();
	// 	$this->load->helper(array('form', 'url'));
	// 	//$this->load->library('form_validation');
	// 	$this->load->library('session');
    //    // $this->load->model('home_model');
    // }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {
        
        $this->validate_login();

        $this->load->model('logs_model');
        $data['query'] = $this->logs_model->get_room_number();
        // $data['query1'] = $this->logs_model->get_tenant_name();
        $this->load->view('sidebar_view');
        $this->load->view('logs_view', $data);
        
    }

    public function process() {

        // $this->load->model('logs_model');
        // $result = $this->logs_model->get_db();

    }

}
?>
