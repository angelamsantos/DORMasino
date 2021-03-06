<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->library('session');
	}

	public function change_email() {

        $id = $this->session->userdata['login_success']['info']['admin_id'];
        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $new_email = $this->security->xss_clean($this->input->post('new_email'));

            if ($email == $new_email) {

                // date_default_timezone_set('Asia/Manila');
                // $log = date("F j, Y, g:ia").": ". $email . " failed to change their email address.".PHP_EOL;
                // file_put_contents('syslogs/syslogs_settings.txt', $log, FILE_APPEND);

                return false;

            } else {

                // gives UPDATE mytable SET field = field+1 WHERE id = 2
                $this->db->set('admin_email', $new_email);
                $this->db->where('admin_id', $id);
                $this->db->update('admin_tbl');

                // date_default_timezone_set('Asia/Manila');
                // $log = date("F j, Y, g:ia").": ". $email . " successfully changed their email address.".PHP_EOL;
                // file_put_contents('syslogs/syslogs_settings.txt', $log, FILE_APPEND);

                return true;

            }

    }

    public function change_password() {

        $db_password = $this->session->userdata['login_success']['info']['admin_password'];
        $old_password = md5($this->security->xss_clean($this->input->post('old_password')));
        $new_password = md5($this->security->xss_clean($this->input->post('new_password')));
        $confirm_password = md5($this->security->xss_clean($this->input->post('confirm_password')));
        $id = $this->session->userdata['login_success']['info']['admin_id'];
        $email = $this->session->userdata['login_success']['info']['admin_email'];

        if ($db_password == $old_password) {

            if ($new_password == $confirm_password) {

                $this->db->set('admin_password', $confirm_password);
                $this->db->where('admin_id', $id);
                $this->db->update('admin_tbl');

                // date_default_timezone_set('Asia/Manila');
                // $log = date("F j, Y, g:ia").": ". $email . " successfully changed their password.".PHP_EOL;
                // file_put_contents('syslogs/syslogs_settings.txt', $log, FILE_APPEND);

                return true;

            } else {

                // date_default_timezone_set('Asia/Manila');
                // $log = date("F j, Y, g:ia").": ". $email . " failed to change their password.".PHP_EOL;
                // file_put_contents('syslogs/syslogs_settings.txt', $log, FILE_APPEND);
                //new password and confirm password did not match
                return false;

            }

        } else {

            // date_default_timezone_set('Asia/Manila');
            // $log = date("F j, Y, g:ia").": ". $email . " failed to change their password.".PHP_EOL;
            // file_put_contents('syslogs/syslogs_settings.txt', $log, FILE_APPEND);
            //old password did not match
            return false;

        }

    }

}
?>