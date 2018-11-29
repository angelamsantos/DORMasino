<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('transactions_model');
    }

    // public function validate_login() {

    //     $login = $this->session->userdata('login_success');
    //     if (!isset ($login)) {
    //         redirect('Login');
    //     }

    // }

    public function index() {
        $data['floor']=$this->transactions_model->get_floor();
        $data['room']=$this->transactions_model->get_room();
        $data['dir']=$this->transactions_model->get_dir();
        $data['dir_count']=$this->transactions_model->get_dircount();
        $this->load->view('sidebar_view');
        $this->load->view('transactions_view', $data);
        
    }
}
?>
