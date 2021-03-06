<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpass_model extends CI_Model{
    
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

    public function send_mail($email) {

        $number = random_string('numeric', 6);

        //Load email library
        $this->load->library('email');
    
        //SMTP & mail configuration
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'dormasino20182019@gmail.com';
        $config['smtp_pass']    = 'dormasino123';
        $config['charset']    = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
    
        //Email content
    
        $to_email = $email; 
    
        $htmlContent = '<h1>DORMasino Forgot Password</h1>';
        $htmlContent .= '<p>Verification code: </p>';
        $htmlContent .= '<p>'. $number .'</p>';
    
        $this->email->to($to_email);
        $this->email->from('dormasino20182019@gmail.com','DORMasino');
        $this->email->subject('DORMasino Forgot Password');
        $this->email->message($htmlContent);
    
        //Send email
        if ($this->email->send()) {

            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('session_vcode', $number);
            return true;
            
		} else {

            return false;
            
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