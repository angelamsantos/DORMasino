<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class forgot_password_model extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        $this->load->library('session');
    }