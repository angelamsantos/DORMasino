<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller{

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('sidebar_view');
        $this->load->view('requests_view');
    }

}
?>