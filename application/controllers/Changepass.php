<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepass extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
       // $this->load->model('home_model');
    }

    public function index($msg = NULL){

        $data['msg'] = $msg;
        $this->load->view('changepass_view', $data);

    }

    public function process() {

        $this->load->model('changepass_model');
        $result = $this->changepass_model->change_password();

        if(! $result) {

            $msg = "The passwords do not match!";
            $this->index($msg);
    
        } else {
    
            redirect('Login/index');
    
        }
            
    }

}
?>