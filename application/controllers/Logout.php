<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('Logout_model');
        $this->load->model('Syslogs_model');

    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index(){
        $this->validate_login();
        // Load our view to be displayed
        // to the user
        $this->Logout_model->logout();

            $msg = '<div class="alert alert-success" role="alert"><center>You have logged out successfully!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            $this->Syslogs_model->logout(); 

            $this->load->view('login_view');

    }

    public function index1(){
        // Load our view to be displayed
        // to the user
        $this->Logout_model->logout();

        $save = $this->session->userdata['save'];

        if ($save == "save_email") {

            $msg = '<div class="alert alert-success" role="alert"><center>You have changed your email successfully!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            $this->load->view('login_view');

        } else if ($save == "save_pass") {

            $msg = '<div class="alert alert-success" role="alert"><center>You have changed your password successfully!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            $this->load->view('login_view');


        } else {

            $msg = '<div class="alert alert-success" role="alert"><center>You have logged out successfully!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            $this->Syslogs_model->logout(); 

            $this->load->view('login_view');

        }

    }

}
?>