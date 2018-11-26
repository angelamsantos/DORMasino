<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpass extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		// $this->load->library('form_validation');
        // $this->load->library('session');
    }

    // public function validate_login() {

    //     $login = $this->session->userdata('login_success');
    //     if (!isset ($login)) {
    //         redirect('Login');
    //     }

    // }

    public function index($msg = NULL) {

        $data['msg'] = $msg;
        $this->load->view('forgotpass_view', $data);

    }

    public function index2() {

        $msg="You entered the wrong verification code!";
        $data['msg'] = $msg;
        $this->load->view('forgotpass2_view', $data);

    }

    public function process() {

        $email = $this->input->post('email');

        $this->load->model('forgotpass_model');
        $isValid = $this->forgotpass_model->check_email($email);

        if(! $isValid) {

            $msg = "The email is either not existing or is deactivated!";
            $this->index($msg);

        } else {	

            $this->load->helper('string');
            $sent = $this->forgotpass_model->send_mail($email);

            if($sent) {

                $msg="";
                $data['msg'] = $msg;
                $this->load->view('forgotpass2_view', $data);

            } else {

                $msg = "The verification code was not sent.";
                $this->index($msg);

            }

        }
    }

    public function validation() {

        $vcode = $this->input->post('vcode');

        $this->load->model('forgotpass_model');
        $isValid = $this->forgotpass_model->check_vcode($vcode);

        if(! $isValid) {

            $msg = "";
            $this->index2($msg);

        } else {	

            redirect('Changepass/index');

        }

    }

}