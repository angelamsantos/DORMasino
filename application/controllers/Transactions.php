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
        $this->Routeguard_model->update_bills();

        $data['floor']=$this->Transactions_model->get_floor();
        $data['room']=$this->Transactions_model->get_room();
        $data['dir']=$this->Transactions_model->get_dir();
        $data['dir_count']=$this->Transactions_model->get_dircount();
        $data['water']=$this->Transactions_model->get_water();
        $data['cm']=$this->Transactions_model->get_cm();
        $data['rtype']=$this->Transactions_model->get_roomtype();
        $data['latest']=$this->Transactions_model->latest_rent();

        //$data['uwater']=$this->Transactions_model->get_unpaidwater();
        $this->load->view('sidebar_view');
        $this->load->view('transactions_view', $data); 
        
    }

    public function edit_water(){

        $this->validate_login();

        $this->Transactions_model->edit_water();
        $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Water rate per m<sup>3</sup> successfully updated!</center></div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('Transactions/index');
    }

    public function payments() {

        $this->validate_login();
        $this->Routeguard_model->payments();

        $data['floor']=$this->Transactions_model->get_floor();
        $data['room']=$this->Transactions_model->get_room();
        $data['dir']=$this->Transactions_model->get_dir();
        $data['dir_count']=$this->Transactions_model->get_dircount();
        $data['water']=$this->Transactions_model->get_unpaidwater();
        $data['rent']=$this->Transactions_model->get_unpaidrent();
        $data['deposit']=$this->Transactions_model->get_unpaiddepo();
        $data['advance']=$this->Transactions_model->get_unpaidadv();
        $data['fee']=$this->Transactions_model->get_fee();
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

        $this->validate_login();
        $this->Routeguard_model->view_transactions();

        $data['floor']=$this->Transactions_model->get_floor();
        $data['room']=$this->Transactions_model->get_room();
        $data['dir']=$this->Transactions_model->get_dir();
        $data['dir_count']=$this->Transactions_model->get_dircount();
        $data['rtrans']=$this->Transactions_model->get_rtrans();
        $data['wtrans']=$this->Transactions_model->get_wtrans();
        $data['atrans']=$this->Transactions_model->get_atrans();
        $data['dtrans']=$this->Transactions_model->get_dtrans();
        $this->load->view('sidebar_view');
        $this->load->view('transactionsrecordsroom_view', $data);
        
    }

    public function insert_bill() {
        
        $this->Transactions_model->insert_bill();
            $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Water bill successfully sent!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/index');
    }
    public function insert_rent() {
        
        $this->Transactions_model->insert_rent();
            $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Rent bill successfully sent!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/index');
    }

    public function edit_bill() {
        
        $this->Transactions_model->edit_bill();
            $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Water bill successfully edited!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/index');
    }

    public function amount_due() {
        header("Content-type: application/json");
        $month = $this->input->post('month');
        $tenant = $this->input->post('tenant');
        $room = $this->input->post('room');

            
        if($month && $tenant && $room) {
            
            $res = $this->Transactions_model->amount_due($month, $tenant, $room);
            $data['a'] = $res['wt'];
            $data['b'] = $res['wi'];
            $data['c'] = $res['wa'];
            $data['d'] = $res['wn'];
            $push= array(
                'wt' => $data['a'],
                'wi' => $data['b'],
                'wa' => $data['c'],
                'wn' => $data['d'],
            );
            header('Content-Type: application/json');
            echo json_encode($push);
        }
    }
 
    public function rent_due() {
        //header("Content-type: application/json");
        $month = $this->input->post('m');
        $tenant = $this->input->post('t');
        $room = $this->input->post('r');

        if($month && $tenant && $room) {

            $res =  $this->Transactions_model->rent_due($month, $tenant, $room);
            $data['a'] = $res['rt'];
            $data['b'] = $res['ri'];
            $data['c'] = $res['ra'];
            $data['d'] = $res['rn'];
            $push= array(
                'rt' => $data['a'],
                'ri' => $data['b'],
                'ra' => $data['c'],
                'rn' => $data['d'],
            );
            header('Content-Type: application/json');
            echo json_encode($push);
            //echo $data['a'];
        }
    }

    public function fee_due() {
        //header("Content-type: application/json");
        $fee = $this->input->post('fee');
        $tenant = $this->input->post('tenant');
        $room = $this->input->post('room');

        if($fee && $tenant && $room) {

            $res =  $this->Transactions_model->fee_due($fee, $tenant, $room);
            $data['a'] = $res['ft'];
            $data['b'] = $res['fi'];
            $data['c'] = $res['fa'];
            $data['d'] = $res['fn'];
            $push= array(
                'ft' => $data['a'],
                'fi' => $data['b'],
                'fa' => $data['c'],
                'fn' => $data['d'],
            );
            header('Content-Type: application/json');
            echo json_encode($push);
            //echo $data['a'];
        }
    }

    public function check_rno() {
        $this->load->model('Transactions_model');
        if($this->Transactions_model->check_rno($this->input->post('rno'))){
            echo "yes";
        } else {
            echo "no";
           }
    }

    public function check_wno() {
        $this->load->model('Transactions_model');
        if($this->Transactions_model->check_wno($this->input->post('wno'))){
            echo "yes";
        } else {
            echo "no";
           }
    }

    public function check_fno() {
        $this->load->model('Transactions_model');
        if($this->Transactions_model->check_fno($this->input->post('fno'))){
            echo "yes";
        } else {
            echo "no";
           }
    }

    public function rent_payment() {
        
        $to_email = $this->input->post('to_email');
        $to_guardianemail = $this->input->post('to_guardianemail');
        
        // $this->Transactions_model->rent_payment();
        $result = $this->Transactions_model->send_mail_rent($to_email, $to_guardianemail);

        if (! $result) {

            $msg = '<div class="alert alert-danger alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Rent payment was not recorded!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/payments');

        } else {

            //$this->load->view('rent_receipt', $data);
            $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Rent payment successfully recorded!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/payments');

        }
        // $data = $this->Transactions_model->rent_payment();
        // $this->load->view('rent_receipt', $data);

    }

    public function water_payment() {
        $to_email = $this->input->post('to_email');
        $to_guardianemail = $this->input->post('to_guardianemail');
        
        // $this->Transactions_model->water_payment();
        $result1 = $this->Transactions_model->send_mail_water($to_email, $to_guardianemail);

        if (! $result1) {

            $msg = '<div class="alert alert-danger alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Water payment was not recorded!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/payments');

        } else {

            $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Water payment successfully recorded!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/payments');

        }
        // $data = $this->Transactions_model->water_payment();
        // $this->load->view('water_receipt', $data);
    }

    public function fees_payment() {
        $to_email = $this->input->post('to_email');
        $to_guardianemail = $this->input->post('to_guardianemail');
        
        // $this->Transactions_model->fee_payment();
        $result2 = $this->Transactions_model->send_mail_fee($to_email, $to_guardianemail);
        
        if (! $result2) {

            $msg = '<div class="alert alert-danger alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Deposit/Advance payment was not recorded!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/payments');

        } else {

            $msg = '<div class="alert alert-success alert-dismissible" style="font-size:15px;margin:0px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>Deposit/Advance payment successfully recorded!</center></div>';
            $this->session->set_flashdata('msg', $msg);
            redirect('Transactions/payments');

        }
        // $data = $this->Transactions_model->fee_payment();
        // $this->load->view('fee_receipt', $data);
    }

    

}
?>
