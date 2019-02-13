<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('Transactions_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {
        $this->validate_login();
        $data['floor']=$this->Transactions_model->get_floor();
        $data['room']=$this->Transactions_model->get_room();
        $data['dir']=$this->Transactions_model->get_dir();
        $data['dir_count']=$this->Transactions_model->get_dircount();
        $data['water']=$this->Transactions_model->get_water();

        $this->load->view('sidebar_view');
        $this->load->view('transactions_view', $data);
        
    }

    public function payments() {
        $this->validate_login();
        $data['floor']=$this->Transactions_model->get_floor();
        $data['room']=$this->Transactions_model->get_room();
        $data['dir']=$this->Transactions_model->get_dir();
        $data['dir_count']=$this->Transactions_model->get_dircount();
        $data['water']=$this->Transactions_model->get_unpaidwater();
        $data['rent']=$this->Transactions_model->get_unpaidrent();
        
        $this->load->view('sidebar_view');
        $this->load->view('payments_view', $data);
        
    }

    public function getRoom() {
        $data['room_id'] = $this->input->post('show_rid');
        $data['room_no'] = $this->input->post('show_rno');

        $this->session->set_userdata('data', $data);

        redirect('Transactions/show_tenants');
    }

    

    public function show_tenants() {
        // $data['room_id'] = $this->input->post('show_rid');
        // $data['room_no'] = $this->input->post('show_rno');
        $r_id = $this->session->userdata['data']['room_id'];
        $r_no = $this->session->userdata['data']['room_no'];
        $data['floor']=$this->Transactions_model->get_floor();
        $data['room']=$this->Transactions_model->get_room();
        $data['dir']=$this->Transactions_model->get_diruv($r_id);
        
       
        $this->load->view('sidebar_view');
        $this->load->view('transactionsuser_view', $data);
        //$this->load->show_tenants($r_id, $r_no);

    }

    public function records_room() {
        $data['floor']=$this->Transactions_model->get_floor();
        $data['room']=$this->Transactions_model->get_room();
        $data['dir']=$this->Transactions_model->get_dir();
        $data['dir_count']=$this->Transactions_model->get_dircount();
        $this->load->view('sidebar_view');
        $this->load->view('transactionsrecordsroom_view', $data);
        
    }

    public function insert_bill() {
             
         $this->Transactions_model->insert_bill();
            $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Bill successfully updated!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/index');
    }

    

}
?>
