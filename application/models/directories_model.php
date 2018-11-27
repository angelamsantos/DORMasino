<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class directories_model extends CI_Model {

	public function __construct()
    {		
        		parent::__construct();  
                $this->load->database();
				$this->load->library('session');
    }

    public function get_floor() {
       
        $query = $this->db->get('floor_tbl');
       // print_r($query);
        return $query;
    }

    public function get_room() {
        $query = $this->db->get('room_tbl');
        return $query;
    }

    public function get_dir () {
		$this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
		$this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
		//$this->db->where('taskassigned_tbl.u_id',$u_id);
		$query = $this->db->get();
		return $query;


    }
    
    // public function get_floor2() {
    //     $this->db->from('floor_tbl');
	// 	$this->db->join('dir_tbl','dir_tbl.floor_id=floor_tbl.floor_id', 'LEFT');
    //     $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
    //     $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
	// 	//$this->db->where('taskassigned_tbl.u_id',$u_id);
	// 	$query = $this->db->get();
	// 	return $query;
    // }

    public function create_tenant($data) {
        $this->db->insert('tenant_tbl', $data);
    }

    public function create_tenantguardian() {
        $tenant_id = $this->db->insert_id();

        $data = array(
            'guardian_name' => $this->input->post('guardian_name'),
            'guardian_cno' => $this->input->post('guardian_cno'),
            'guardian_email' => $this->input->post('tenant_fname'),
        );
    }

}
?>