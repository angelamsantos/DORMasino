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

        $data['reqs']=$this->Requests_model->get_reqs();

        $this->load->view('sidebar_view');
        $this->load->view('requests_view', $data);

    }

    public function process() {

        $id = $this->input->post('req_id');
        $this->Requests_model->complete($id);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Request successfully completed!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Requests/index');

    }

}
?>