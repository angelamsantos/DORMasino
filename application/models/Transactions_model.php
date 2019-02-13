<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions_model extends CI_Model {

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
        $this->db->from('room_tbl');
        $this->db->join('floor_tbl', 'room_tbl.floor_id=floor_tbl.floor_id');
        $query = $this->db->get();
        return $query;
    }
    public function get_dir () {
		$this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
        $this->db->join('guardian_tbl','guardian_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('mother_tbl','mother_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('father_tbl','father_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('contract_tbl','contract_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
		$query = $this->db->get();
		return $query;


    }
    public function get_water () {
        $SELECT = "SELECT water_id, water_current, wroom_id 
                    FROM water_tbl 
                    WHERE water_id 
                    IN (SELECT MAX(water_id) 
                    from water_tbl 
                    GROUP by wroom_id ORDER by wroom_id ASC)";
        $query = $this->db->query($SELECT);
        return $query;
    }

    public function get_diruv($r_id) {

		$this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
        $this->db->join('floor_tbl','floor_tbl.floor_id=room_tbl.floor_id', 'LEFT');
        $this->db->join('guardian_tbl','guardian_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('mother_tbl','mother_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('father_tbl','father_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('contract_tbl','contract_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
    
		$this->db->where('dir_tbl.room_id',$r_id);
		$query = $this->db->get();
		return $query;


    }

    public function get_dircount() {
        $this->db->select("room_tbl.room_id");
        $this->db->select("room_tbl.room_number");
        $this->db->select("count(dir_tbl.tenant_id) as num_tenants");
        $this->db->from("room_tbl");
        $this->db->join("dir_tbl", "room_tbl.room_id=dir_tbl.room_id", "LEFT"); 
        $this->db->group_by("room_tbl.room_id");
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

   
}
?>