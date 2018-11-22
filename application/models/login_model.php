<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->library('session');
	}

	public function login_validate(){

		// $username = $this->security->xss_clean($this->input->post('username'));
		// $password = $this->security->xss_clean($this->input->post('password'));

		// $this->db->where('u_email', $username);
		// $this->db->where('u_password', $password);

		// $query = $this->db->get('user_tbl');
        return true;
		// if($query->num_rows() == 1) {
		// 	$row = $query->row();
			
		// 	$utype= $row->u_id;

		// 	$data['info'] = array(
		// 					'u_id' => $row->u_id,
		// 					'u_fname' => $row->u_fname,
		// 					'u_lname' => $row->u_lname,
		// 					'u_email' => $row->u_email,
		// 					'u_email' => $row->u_email,
		// 					'u_new' => $row->u_new,
		// 					'u_status' => $row->u_status,
		// 					);
		// 	$this->db->where('u_id', $data['info']['u_id']);

		// 	$query1 = $this->db->get('usergroups_tbl');

		// 	//$this->session->set_userdata('login_success', $data);

		// 	 if($query1->num_rows() == 1) {
		// 	 		$row1 = $query1->row();
		// 			$data['utype'] = array(
		// 					'ut_id' => $row1->ut_id,
		// 					'dept_id' => $row1->dept_id,
		// 					'bc_id' => $row1->bc_id,
							
		// 					);
		// 			$this->session->set_userdata('login_success', $data);
					
					
		// 		}
		// 		// If the previous process did not validate
		// 		// then return false.
		// 		return true;	
		// 	 } else {
		// 	 	return false;
		// 	 }
			 
			 

		}

		public function login_checknew() {
            return true;
			// $username = $this->security->xss_clean($this->input->post('username'));
			// $password = $this->security->xss_clean($this->input->post('password'));

			// $this->db->where('u_email', $username);
			// $this->db->where('u_password', $password);

			// $query = $this->db->get('user_tbl');

			// if($query->num_rows() == 1) {
			// 	$row = $query->row();
				
			// 	$utype= $row->u_id;

			// 	$data['new'] = array(
			// 				'u_id' => $row->u_id,
			// 				'u_fname' => $row->u_fname,
			// 				'u_lname' => $row->u_lname,
			// 				'u_email' => $row->u_email,
			// 				'u_email' => $row->u_email,
			// 				'u_new' => $row->u_new,
			// 				'u_status' => $row->u_status,
			// 				);
			// 	$this->session->set_userdata('login_new', $data);
				
			// }
			// if($data['new']['u_new'] == 0) {

			// 		return false;
			// 	} else {
			// 		return true;
			// 	}
		}

		public function login_checkstatus() {
            return true;
			// $username = $this->security->xss_clean($this->input->post('username'));
			// $password = $this->security->xss_clean($this->input->post('password'));

			// $this->db->where('u_email', $username);
			// $this->db->where('u_password', $password);

			// $query = $this->db->get('user_tbl');

			// if($query->num_rows() == 1) {
			// 	$row = $query->row();
				
			// 	$utype= $row->u_id;

			// 	$data['status'] = array(
			// 				'u_id' => $row->u_id,
			// 				'u_fname' => $row->u_fname,
			// 				'u_lname' => $row->u_lname,
			// 				'u_email' => $row->u_email,
			// 				'u_email' => $row->u_email,
			// 				'u_new' => $row->u_new,
			// 				'u_status' => $row->u_status,
			// 				);
			// 	$this->session->set_userdata('login_new', $data);
				
			// }
			// if($data['status']['u_status'] == "deactivated") {

			// 		return false;
			// 	} else {
			// 		return true;
			// 	}
		}
	}


?>