<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepass extends CI_Controller {

	// function __construct(){
    //     parent::__construct();
	// 	$this->load->helper(array('form', 'url'));
	// 	$this->load->library('form_validation');
	// 	$this->load->library('session');
    //    // $this->load->model('home_model');
    // }

    public function index(){

        $this->load->view('changepass_view');

    }

    public function index2(){

        $this->load->view('changepass2_view');

    }

    public function process() {
        
        $this->load->model('Changepass_model');
        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];
        $result = $this->Changepass_model->change_password($admin_id);

        if(! $result) {

            $msg = '<div class="alert alert-danger" role="alert"> The passwords do not match! </div>';
            $this->session->set_flashdata('msg', $msg);
    
        } else {
    
            $msg = '<div class="alert alert-success" role="alert"> You have changed your password successfully! </div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Login/index');
    
        }
            
    }

    public function process1() {
        
        $this->load->model('Changepass_model');
        $result = $this->Changepass_model->change_password($email);

        if(! $result) {

            $msg = '<div class="alert alert-danger" role="alert"> The passwords do not match! </div>';
            $this->session->set_flashdata('msg', $msg);
    
        } else {
    
            $msg = '<div class="alert alert-success" role="alert"> You have changed your password successfully! </div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Login/index');
    
        }
            
    }

}
?>