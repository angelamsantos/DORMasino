<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

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
        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $data['email'] = $email;
        $data['msg'] = $msg;
        $this->load->view('settings_view', $data);

    }

    public function process_email() {

        $this->load->model('settings_model');
        $result_email = $this->settings_model->change_email();

        if(! $result_email) {

            $msg = "You entered the same email address!";
            $this->index($msg);

        } else {	

            redirect('Logout/index');

        }
    }

    public function process_password() {

        $this->load->model('settings_model');
        $result_password = $this->settings_model->change_password();

        if(! $result_password) {

            $msg = "The passwords do not match!";
            $this->index($msg);
    
        } else {
    
            redirect('Logout/index');
    
        }
            
    }
}
?>
