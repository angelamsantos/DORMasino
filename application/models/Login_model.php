<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	// public function __construct() {
	// 	$this->load->database();
	// 	$this->load->library('session');
	// }

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
			 
			$this->session->set_userdata('login_success', $data);
			$this->session->set_userdata('email', $username);

		// 	$query1 = $this->db->get('admin_tbl');

		// 	 if($query1->num_rows() == 1) {
		// 	 		$row1 = $query1->row();
		// 			$data['utype'] = array(
		// 					'ut_id' => $row1->ut_id,
		// 					'dept_id' => $row1->dept_id,
		// 					'bc_id' => $row1->bc_id,
							
		// 					);
		// 		$this->session->set_userdata('login_success', $data);
					
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