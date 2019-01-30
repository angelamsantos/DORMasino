<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('logs_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {
          
        $this->validate_login();
        $data['vlogs']=$this->logs_model->get_vlogs();
        $data['floor']=$this->logs_model->get_floor();
        $data['room']=$this->logs_model->get_room();
        $data['dir']=$this->logs_model->get_dir();
        
        $this->load->view('sidebar_view');
        $this->load->view('logs_view', $data);
        
    }

    public function fetch_tenant() {

        $room_id = $this->input->post('room_id');

        if($room_id) {

            echo $this->logs_model->fetch_tenant($room_id);

        }
    }

    public function process() {

        $tenant_id = $this->session->userdata['tenant_id'];

        $data = array(
            'vlogs_name' => $this->input->post('vlogs_name'),
            'vlogs_relation' => $this->input->post('vlogs_relation'),
            'vlogs_purpose' => $this->input->post('vlogs_purpose'),
            'vlogs_id_presented' => $this->input->post('vlogs_id_presented'),
            'tenant_id' => $tenant_id
        );

        $this->logs_model->record_visitor($data);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px;"><center>Visitor successfully recorded!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Logs/index');

    }

    public function out() {
        $this->load->model('logs_model');

        $vlogs_in = $this->input->post('vlogs_in');
        $this->logs_model->update_out($vlogs_in);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Visitor timed out!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Logs/index');

    }

    // public function get_tenant() {

    //     $room_id = $this->input->post('room_id');

    //     if($room_id) {

    //         echo $this->logs_model->get_dir($room_id);

    //     }

    // }

    // public function process($room_id) {

    //     $this->db->from('dir_tbl');
	//     $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
    //     $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');

    //     $result = $this->db->where('dir_tbl.room_id', $room_id)->get()->result();
    //     echo json_encode($result);

    // }

}
?>
