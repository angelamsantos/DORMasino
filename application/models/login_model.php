<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->library('session');
	}

	public function login_validate(){

		 $username = $this->security->xss_clean($this->input->post('username'));
		 $password = md5($this->security->xss_clean($this->input->post('password')));

		 $this->db->where('admin_email', $username);
		 $this->db->where('admin_password', $password);

		 $query = $this->db->get('admin_tbl');
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
		 					);
		 	$this->db->where('admin_id', $data['info']['admin_id']);

		// 	$query1 = $this->db->get('usergroups_tbl');

		 	$this->session->set_userdata('login_success', $data);

		// 	 if($query1->num_rows() == 1) {
		// 	 		$row1 = $query1->row();
		// 			$data['utype'] = array(
		// 					'ut_id' => $row1->ut_id,
		// 					'dept_id' => $row1->dept_id,
		// 					'bc_id' => $row1->bc_id,
							
		// 					);
		// 		$this->session->set_userdata('login_success', $data);
					
				$admin = $this->session->userdata['login_success']['info']['admin_email'];

				date_default_timezone_set('Asia/Manila');
				$log = date("F j, Y, g:ia").": ". $admin . " successfully logged in to the system.".PHP_EOL;
				file_put_contents('syslogs/syslogs_login.txt', $log, FILE_APPEND);
					
				return true;
					
		// 		// If the previous process did not validate
		// 		// then return false.
		 			
		 	 } else {

				$admin = $this->input->post('username');

				date_default_timezone_set('Asia/Manila');
				$log = date("F j, Y, g:ia").": ". $admin . " failed to log in to the system.".PHP_EOL;
				file_put_contents('syslogs/syslogs_login.txt', $log, FILE_APPEND);

				return false;

		 	 }
			 
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