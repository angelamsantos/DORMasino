<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings_model extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->library('session');
	}

	public function change_email() {

        $old_email = $this->session->userdata['login_success']['info']['admin_email'];
        $new_email = $this->security->xss_clean($this->input->post('new_email'));

            if ($old_email == $new_email) {

                return false;

            } else {

                // gives UPDATE mytable SET field = field+1 WHERE id = 2
                $this->db->set('admin_email', $new_email);
                $this->db->where('admin_email', $old_email);
                $this->db->update('admin_tbl');

                return true;

            }

    }
}
?>