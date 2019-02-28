<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directories extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('Directories_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {
        $this->validate_login();
        
        $data['floor']=$this->Directories_model->get_floor();
        $data['room']=$this->Directories_model->get_room();
        $data['dir']=$this->Directories_model->get_dir();
        $data['dir_count']=$this->Directories_model->get_dircount();
        $data['type']=$this->Directories_model->get_type();
        $data['rtype']=$this->Directories_model->get_roomtype();
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
            'tenant_status' => "1",
            'type_id' => $this->input->post('type_id'),
        );

        $this->Directories_model->create_tenant($data);
        $this->Directories_model->create_tenantcontacts($data);

        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Tenant successfully created! Kindly settle the deposit and advance fees in the payments section.</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/index');
    }

    public function update_tenant() {
        $tenant_id = $this->input->post('etenant_id');
        $this->Directories_model->update_tenant($tenant_id);
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Tenant successfully edited!</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/show_tenants');
    }

    public function mr_tenant() {
        $tenant_id = $this->input->post('mr_tenantid');
        $this->Directories_model->mr_tenant($tenant_id);
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Successfully moved a tenant!</center></div>      ';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/show_tenants');
    }

    public function cc_tenant() {
        $tenant_id = $this->input->post('cc_tenantid');
        $this->Directories_model->cc_tenant($tenant_id);
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Successfully changed a tenant\'s contract!</center></div>      ';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/show_tenants');
    }

    public function rp_tenant() {
        $tenant_id = $this->input->post('rp_tenantid');
        $this->Directories_model->rp_tenant($tenant_id);
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Successfully reset tenant\'s password!</center></div>      ';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/show_tenants');
    }

    public function deactivate_tenant() {
        $tenant_id = $this->input->post('dtenant_id');
        $this->Directories_model->deactivate_tenant($tenant_id);
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Tenant successfully deactivated!</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/show_tenants');
    }

    public function activate_tenant() {
        $tenant_id = $this->input->post('atenant_id');
        $this->Directories_model->activate_tenant($tenant_id);
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Tenant successfully activated!</center></div> ';
        $this->session->set_flashdata('msg', $msg);
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
        $data['floor']=$this->Directories_model->get_floor();
        $data['room']=$this->Directories_model->get_room();
        $data['dir']=$this->Directories_model->get_diruv($r_id);
        $data['type']=$this->Directories_model->get_type();
        $data['rtype']=$this->Directories_model->get_roomtype();
        $this->load->view('sidebar_view');
        $this->load->view('directoriesusers_view', $data);
        //$this->load->show_tenants($r_id, $r_no);

    }

    public function rooms() {
        $data['floor']=$this->Directories_model->get_floor();
        $data['room']=$this->Directories_model->get_room();
        $data['dir']=$this->Directories_model->get_dir();
        $data['dir_count1']=$this->Directories_model->get_dircount1();
        $this->load->view('sidebar_view');
        $this->load->view('directoriesroom_view', $data);
    }

    public function admin() {
        $data['admin']=$this->Directories_model->get_admin();
        // $adir = $this->session->userdata['admin']['info']['adcontrol_dir'];
        // $abill = $this->session->userdata['admin']['info']['adcontrol_bills'];
        // $aann = $this->session->userdata['admin']['info']['adcontrol_ann'];
        // $amsg = $this->session->userdata['admin']['info']['adcontrol_msg'];
        // $alog = $this->session->userdata['admin']['info']['adcontrol_logs'];
        $this->load->view('sidebar_view');
        $this->load->view('directoriesadmin_view', $data);
    }

    public function fetch_room() {

        $floor_id = $this->input->post('floor_id');

        if($floor_id) {

            echo $this->Directories_model->fetch_room($floor_id);

        }
    }

    public function add_room() {

        $floor_id = $this->session->userdata['floor_id'];

        $data = array(
            'room_number' => $this->input->post('arRoomNo'),
            'room_tcount' => $this->input->post('arRoomTcount'),
            'room_price' => $this->input->post('arRoomPrice'),
            'room_extra' => $this->input->post('arRoomExtra'),
            'room_status' => 1,
            'floor_id' => $floor_id
        );

        $this->Directories_model->record_room($data);

        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>The room was successfully added!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Directories/rooms');

    }

    public function update_room() {

        $room_id = $this->input->post('room_id');
        $this->Directories_model->update_room($room_id);
        
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>The room was successfully edited!</center></div>      ';
        $this->session->set_flashdata('msg', $msg);

        redirect('Directories/rooms');

    }

    public function deactivate_room() {

        $room_id = $this->input->post('droom_id');
        $this->Directories_model->deactivate_room($room_id);

        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>The room was successfully deactivated!</center></div>      ';
        $this->session->set_flashdata('msg', $msg);

        redirect('Directories/rooms');

    }

    public function activate_room() {

        $room_id = $this->input->post('aroom_id');
        $this->Directories_model->activate_room($room_id);

        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>The room was successfully activated!</center></div>      ';
        $this->session->set_flashdata('msg', $msg);

        redirect('Directories/rooms');

    }

    public function add_admin() {
        //$a = $this->input->post('dir_arr');
        $this->Directories_model->add_admin();
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Admin successfully created!</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/admin');
    }

    public function edit_admin() {
        //$a = $this->input->post('dir_arr');
        $this->Directories_model->edit_admin();
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Admin successfully edited!</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/admin');
    }

    public function deactivate_admin() {
        //$a = $this->input->post('dir_arr');
        $this->Directories_model->deac_admin();
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Admin successfully deactivated!</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/admin');
    }

    public function activate_admin() {
        //$a = $this->input->post('dir_arr');
        $this->Directories_model->act_admin();
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Admin successfully activated!</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Directories/admin');
    }
}
?>
