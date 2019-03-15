<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('Requests_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {

        $this->validate_login();
        $this->Routeguard_model->view_reqs();

        $data['reqs']=$this->Requests_model->get_reqs();

        $this->load->view('sidebar_view');
        $this->load->view('requests_view', $data);

    }

    public function approve() {

        $id = $this->input->post('req_id');
        $requestBtn = $this->input->post('requestBtn');

            if ($requestBtn == "approve") {

                $this->Requests_model->approve_req($id);

                $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Request approved!</center></div>';
                $this->session->set_flashdata('msg', $msg);

            } else {

                $this->Requests_model->reject_req($id);

                $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Request rejected!</center></div>';
                $this->session->set_flashdata('msg', $msg);

            }

        redirect('Requests/index');

    }

    public function return() {

        $id = $this->input->post('req_id');
        $this->Requests_model->return_req($id);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Borrowed item returned!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Requests/index');

    }

}
?>