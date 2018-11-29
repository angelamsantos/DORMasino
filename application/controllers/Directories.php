<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directories extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('directories_model');
    }


    public function index() {
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
            'tenant_fb' => $this->input->post('tenant_fb'),
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
        redirect('Directories/index');
    }

    public function deactivate_tenant() {
        $tenant_id = $this->input->post('dtenant_id');
        $this->directories_model->deactivate_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Tenant successfully deactivated!</div>      ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/index');
    }

    public function activate_tenant() {
        $tenant_id = $this->input->post('atenant_id');
        $this->directories_model->activate_tenant($tenant_id);
        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px">Tenant successfully activated!</div> ';
        $this->session->set_flashdata('message', $msg);
        redirect('Directories/index');
    }
}
?>
