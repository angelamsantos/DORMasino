<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
       // $this->load->model('home_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        } 

    }

    public function index($msg = NULL){

        $this->validate_login();
        $this->load->view('sidebar_view');
        $data['msg'] = $msg;
        $this->load->view('settings_view', $data);

    }

    public function process() {

        $this->load->model('settings_model');
        $result = $this->settings_model->change_email();

        if(! $result) {

            $msg = "The email addresses are the same.";
            $this->index($msg);

        } else {

            redirect('Logout/index');

        }

    }


}
?>
