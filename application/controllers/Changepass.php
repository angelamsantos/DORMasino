<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepass extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Changepass_model');
    }

    public function index(){

        $this->load->view('changepass_view');

    }

    public function index2(){

        $this->load->view('changepass2_view');

    }

    public function process() {
        
        $result = $this->Changepass_model->change_password();

        if(! $result) {

            $msg = '<div class="alert alert-danger" role="alert"><center>The passwords do not match!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Changepass/index');
    
        } else {
    
            $msg = '<div class="alert alert-success" role="alert"><center>You have changed your password successfully!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Login/index');
    
        }
            
    }

    public function process1() {
        
        $result = $this->Changepass_model->change_password();

        if(! $result) {

            $msg = '<div class="alert alert-danger" role="alert"><center>The passwords do not match!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            
            redirect('Changepass/index2');
    
        } else {
    
            $msg = '<div class="alert alert-success" role="alert"><center>You have changed your password successfully!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Login/index');
    
        }
            
    }

}
?>