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
        return $query->result();
    }

    public function get_room() {
        $query = $this->db->get('room_tbl');
        return $query->result();
    }

    public function get_dir () {
		$this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
		$this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
		//$this->db->where('taskassigned_tbl.u_id',$u_id);
		$query = $this->db->get();
		return $query->result();


	}

}
?>