<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpass extends CI_Controller {
    
    // public function validate_login() {

    //     $login = $this->session->userdata('login_success');
    //     if (!isset ($login)) {
    //         redirect('Login');
    //     }

    // }

    public function index() {

        $this->load->view('forgotpass_view');

    }

    public function index2() {

        $this->load->view('forgotpass2_view');

    }

    public function process() {

        $msg = '<div class="alert alert-success" role="alert"><center>Verification code sent. Check your email!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        $email = $this->input->post('email');

        $this->load->model('Forgotpass_model');
        $isValid = $this->Forgotpass_model->check_email($email);

        if(! $isValid) {

            $msg = '<div class="alert alert-danger" role="alert"><center>The email is either not existing or is deactivated!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Forgotpass/index');

        } else {	

            $sent = $this->Forgotpass_model->send_mail($email);

            if($sent) {
                
                redirect('Forgotpass/index2');

            } else {

                $msg = '<div class="alert alert-danger" role="alert"><center>The verification code was not sent.</center></div>';
                $this->session->set_flashdata('msg', $msg);
                redirect('Forgotpass/index');

            }

        }
    }

    public function validation() {

        $vcode = $this->input->post('vcode');

        $this->load->model('Forgotpass_model');
        $isValid = $this->Forgotpass_model->check_vcode($vcode);

        if(! $isValid) {

            $msg = '<div class="alert alert-danger" role="alert"><center>You entered the wrong verification code!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Forgotpass/index2');

        } else {	

            redirect('Changepass/index2');

        }

    }

}
?>