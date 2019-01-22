<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements extends CI_Controller{

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index(){

        $this->load->model('announcements_model');
        $this->validate_login();
        $data['ann']=$this->announcements_model->get_ann();

        $this->load->view('sidebar_view');
        $this->load->view('announcements_view', $data);

    }

    public function process() {

        $this->load->model('announcements_model');

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $data = array(
            'ann_content' => $this->input->post('content'),
            'admin_id' => $admin_id
        );

        $this->announcements_model->publish($data);

        redirect('Announcements/index');

    }
}
?>
