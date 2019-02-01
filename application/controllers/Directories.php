<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directories extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('directories_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {
        $this->validate_login();
        $data['floor']=$this->directories_model->get_floor();
        $data['room']=$this->directories_model->get_room();
        $data['dir']=$this->directories_model->get_dir();
        $data['dir_count']=$this->directories_model->get_dircount();
        $this->load->view('sidebar_view');
        $this->load->view('directories_view', $data);
        
    }

    
    public function create_tenant() {
        $data = array(
            'tenant_email' => $this->input->post('tenant_email'),
            'tenant_password' => md5("123456"),
            'tenant_fname' => $this->input->post('tenant_fname'),
            'tenant_lname' => $this->input->post('tenant_lname'),
            'tenant_address' => $this->input->post('tenant_address'),
            'tenant_birthday' => $this->input->post('tenant_bday'),
            'tenant_school' => $this->input->post('tenant_school'),
            'tenant_course' => $this->input->post('tenant_course'),
            'tenant_cno' => $this->input->post('tenant_cno'),
            'tenant_medical' => $this->input->post('tenant_medical'),
            'tenant_new' => "1",
            'tenant_status' => "1"
        );

        $this->directories_model->create_tenant($data);
        $this->directories_model->create_tenantcontacts($data);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Tenant successfully created!</div>      ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/index');
    }

    public function update_tenant() {
        $tenant_id = $this->input->post('etenant_id');
        $this->directories_model->update_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Tenant successfully edited!</div>      ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/show_tenants');
    }

    public function mr_tenant() {
        $tenant_id = $this->input->post('mr_tenantid');
        $this->directories_model->mr_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Successfully moved a tenant!</div>      ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/show_tenants');
    }

    public function cc_tenant() {
        $tenant_id = $this->input->post('cc_tenantid');
        $this->directories_model->cc_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Successfully changed a tenant\'s contract!</div>      ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/show_tenants');
    }

    public function rp_tenant() {
        $tenant_id = $this->input->post('rp_tenantid');
        $this->directories_model->rp_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Successfully reset tenant\'s password!</div>      ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/show_tenants');
    }

    public function deactivate_tenant() {
        $tenant_id = $this->input->post('dtenant_id');
        $this->directories_model->deactivate_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Tenant successfully deactivated!</div>      ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/show_tenants');
    }

    public function activate_tenant() {
        $tenant_id = $this->input->post('atenant_id');
        $this->directories_model->activate_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Tenant successfully activated!</div> ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/show_tenants');
    }

    public function getRoom() {
        $data['room_id'] = $this->input->post('show_rid');
        $data['room_no'] = $this->input->post('show_rno');

        $this->session->set_userdata('data', $data);

        redirect('Directories/show_tenants');
    }

    public function show_tenants() {
        // $data['room_id'] = $this->input->post('show_rid');
        // $data['room_no'] = $this->input->post('show_rno');
        $r_id = $this->session->userdata['data']['room_id'];
        $r_no = $this->session->userdata['data']['room_no'];
        $data['floor']=$this->directories_model->get_floor();
        $data['room']=$this->directories_model->get_room();
        $data['dir']=$this->directories_model->get_diruv($r_id);
        
       
        $this->load->view('sidebar_view');
        $this->load->view('directoriesusers_view', $data);
        //$this->load->show_tenants($r_id, $r_no);

    }

    public function rooms() {
        $data['floor']=$this->directories_model->get_floor();
        $data['room']=$this->directories_model->get_room();
        $data['dir']=$this->directories_model->get_dir();
        $data['dir_count']=$this->directories_model->get_dircount();
        $this->load->view('sidebar_view');
        $this->load->view('directoriesroom_view', $data);
    }

    public function admin() {
        $this->load->view('sidebar_view');
        $this->load->view('directoriesadmin_view');
    }

    public function fetch_room() {

        $floor_id = $this->input->post('floor_id');

        if($floor_id) {

            echo $this->directories_model->fetch_room($floor_id);

        }
    }

    public function add_room() {

        $floor_id = $this->session->userdata['floor_id'];

        $data = array(
            'room_number' => $this->input->post('arRoomNo'),
            'room_tcount' => $this->input->post('arRoomTcount'),
            'room_price' => $this->input->post('arRoomPrice'),
            'room_status' => 1,
            'floor_id' => $floor_id
        );

        $this->directories_model->record_room($data);

        $msg = '<div class="alert alert-success d-md-flex align-items-md-center" style="font-size:15px;height:35px;margin:0px;"><center>The room was successfully added!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Directories/rooms');

    }

    public function edit_room() {



    }
}
?>
