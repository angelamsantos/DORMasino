<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	// public function __construct() {
	// 	$this->load->database();
	// 	$this->load->library('session');
	// }

	public function login_validate(){

		$username = $this->security->xss_clean($this->input->post('username'));
		$password = md5($this->security->xss_clean($this->input->post('password')));
		$this->db->from('admin_tbl');
		$this->db->join('adcontrol_tbl', 'admin_tbl.admin_id=adcontrol_tbl.admin_id');
		$this->db->where('admin_tbl.admin_email', $username);
		$this->db->where('admin_tbl.admin_password', $password);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			
			$row = $query->row();
			$utype= $row->admin_id;

			$data['info'] = array(

				'admin_id' => $row->admin_id,
				'admin_email' => $row->admin_email,
				'admin_password' => $row->admin_password,
				'admin_type' => $row->admin_type, 
				'admin_fname' => $row->admin_fname,
				'admin_lname' => $row->admin_lname,
				'admin_new' => $row->admin_new,
				'admin_status' => $row->admin_status,
				'date_created' => $row->date_created,
				'admin_empno' => $row->admin_empno,	
				'admin_cno' => $row->admin_cno,
				'admin_attempts' => $row->admin_attempts,
				'adcontrol_dir' => $row->adcontrol_dir,
				'adcontrol_bills' => $row->adcontrol_bills,
				'adcontrol_ann' => $row->adcontrol_ann,
				'adcontrol_msg' => $row->adcontrol_msg,
				'adcontrol_logs' => $row->adcontrol_logs,

			);

			$this->session->set_userdata('login_success', $data);
			$this->session->set_userdata('email', $username);	

			    //$this->db->where('admin_id', $data['info']['admin_id']);
			
			    //$this->db->where('admin_id', $utype);
			    // $query1 = $this->db->get('adcontrol_tbl');

				// //if($query1->num_rows() == 1) {
				// 	$row1 = $query1->row();
				// 	$a['ac'] = array(
				// 				'adcontrol_dir' => $row1->adcontrol_dir,
				// 				'adcontrol_bills' => $row1->adcontrol_bills,
				// 				'adcontrol_ann' => $row1->adcontrol_ann,
				// 				'adcontrol_msg' => $row1->adcontrol_msg, 
				// 				'adcontrol_logs' => $row1->adcontrol_logs,
				// 					);

				// 	$this->session->set_userdata('login_success', $a);
				// 	//return true;
				//}
			
			return true;
				
		// 		// If the previous process did not validate
		// 		// then return false.

		} else {

			return false;

		}

	}

	public function login_checkstatus($admin_id) {
			
		$this->db->where('admin_id', $admin_id);
		$query = $this->db->get('admin_tbl');

		if ($query->num_rows() == 1) {
				
			$row = $query->row();

			if ($row->admin_status == 1) {

				return true;

			} else {

				return false;

			}

		}

	}

}


?>