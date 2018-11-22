<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		//$this->load->library('form_validation');
		//$this->load->library('session');
       // $this->load->model('home_model');
    }

    public function index(){
        $this->load->view('sidebar_view');
        $this->load->view('announcements_view');
    }
}
?>
