<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directories extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
        //$this->load->model('directories_model');
    }

    public function index(){
        // $data['floor']=$this->directories_model->get_floor();
        // $data['room']=$this->directories_model->get_room();
        // $data['dir']=$this->directories_model->get_dir();
        $this->load->view('sidebar_view');
        $this->load->view('directories2_view');
    }
}
?>
