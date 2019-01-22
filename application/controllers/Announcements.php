<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		//$this->load->library('form_validation');
		$this->load->library('session');
       // $this->load->model('home_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index(){

        $this->validate_login();
        $this->load->view('sidebar_view');
        $this->load->view('announcements_view');

    }

    public function process() {

        $this->load->model('announcements_model');

        $admin_id = $this->session

        $data = array(
            'ann_content' => $this->input->post('content'),
            'admin_id' => $admin_id
        );

        $this->announcements_model->publish($data);

        redirect('Announcements/index');

    }
}
?>
