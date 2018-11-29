<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('logs_model');
		// $this->load->helper(array('form', 'url'));
		//$this->load->library('form_validation');
		// $this->load->library('session');
       // $this->load->model('home_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {
        
        $this->validate_login();
        $data['room'] = $this->logs_model->get_room_number();
        // $data['dir'] = $this->logs_model->get_dir();
        // $data['tenant'] = $this->logs_model->get_tenant();
        $data['room_id'] = $this->input->post('room_id');
        $data['tenant'] = $this->logs_model->get_dir($data['room_id']);
        
        $this->load->view('sidebar_view');
        $this->load->view('logs_view', $data);
        
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
