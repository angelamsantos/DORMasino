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
        $this->load->view('sidebar_view');
        $this->load->view('directories_view', $data);
        
    }

    public function create_tenant() {
        $data = array(
            'tenant_email' => $this->input->post('tenant_email'),
            'tenant_password' => md5(1234),
            'tenant_fname' => $this->input->post('tenant_fname'),
            'tenant_lname' => $this->input->post('tenant_lname'),
            'tenant_birthday' => $this->input->post('tenant_bday'),
            'tenant_course' => $this->input->post('tenant_course'),
            'tenant_cno' => $this->input->post('tenant_cno'),
            'tenant_new' => "1",
            'tenant_status' => "1"
        );

        $this->directories_model->create_tenant($data);
        $this->directories_model->create_tenantguardian($data);
    }
}
?>
