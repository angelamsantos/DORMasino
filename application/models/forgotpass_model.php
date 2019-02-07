<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class forgotpass_model extends CI_Model{
    
    // function __construct(){
    //     parent::__construct();
	// 	$this->load->database();
    //     $this->load->library('session');
    // }

    public function check_email($email) {

        $this->db->where('admin_email', $email);
        $query = $this->db->get('admin_tbl');
        $result = $query->result();

        foreach ($result as $value) {

            if ($value->admin_email == $email) {

                return true;

            } else {

                return false;

            }

        }

    }

    public function check_vcode($vcode) {

        $email = $this->session->userdata['email'];
        $session_vcode = $this->session->userdata['session_vcode'];

        if ($session_vcode == $vcode) {

            $this->db->set('admin_new', 1);
            $this->db->where('admin_email', $email);
            $this->db->update('admin_tbl');

            return true;

        } else {

            return false;

        }

    }

}