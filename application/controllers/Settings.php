<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Settings_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        } 

    }

    public function index(){

        $this->validate_login();
        
        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $data['email'] = $email;

        $this->load->view('sidebar_view');
        $this->load->view('settings_view', $data);

    }

    public function process_email() {

        $result_email = $this->Settings_model->change_email();

        if(! $result_email) {

            $msg = '<div class="alert alert-danger" role="alert"><center> You entered the same email address! </center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Settings/index');

        } else {	

            $msg = '<div class="alert alert-success" role="alert"><center> Your email was changed successfully! </center></div>';
            $this->session->set_flashdata('msg', $msg);

            $save = $this->input->post('save_email');
            $this->session->set_userdata('save', $save);

            redirect('Logout/index1');

        }
    }

    public function process_password() {

        $result_password = $this->Settings_model->change_password();

        if(! $result_password) {

            $msg = '<div class="alert alert-danger" role="alert"><center> The passwords do not match! </center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Settings/index');
    
        } else {
    
            $msg = '<div class="alert alert-success" role="alert"><center> Your password was changed successfully! </center></div>';
            $this->session->set_flashdata('msg', $msg);

            $save = $this->input->post('save_pass');
            $this->session->set_userdata('save', $save);

            redirect('Logout/index1');
    
        }
            
    }
}
?>
