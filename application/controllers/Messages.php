<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('Messages_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {

        $this->validate_login();

        $data['floor']=$this->Messages_model->get_floor();
        $data['room']=$this->Messages_model->get_room();
        $data['dir']=$this->Messages_model->get_dir();

        $this->load->view('sidebar_view');
        $this->load->view('messages_view', $data);

    }

    public function fetch_tenant() {

        $room_id = $this->input->post('room_id');

        foreach ($room_id as $value) {

            // if($value) {

                echo $this->Messages_model->fetch_tenant($value);

            // }
        }

        
    }


}
?>
