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
        $this->db->join('contract_tbl','contract_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
    
		$query = $this->db->get();
		return $query;


    }
    public function get_water () {
        $SELECT = "SELECT water_id, water_current, water_tbl.tenant_id, dir_tbl.room_id
                    FROM water_tbl 
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = water_tbl.tenant_id
                    WHERE water_id 
                    IN (SELECT MAX(water_id) 
                    from water_tbl 
                    GROUP by room_id)";
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

    public function get_unpaidwater() {
        $SELECT = "SELECT water_tbl.*, dir_tbl.*, room_tbl.*, tenant_tbl.*
                    FROM water_tbl
                    LEFT JOIN tenant_tbl
                    ON tenant_tbl.tenant_id = water_tbl.tenant_id
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = water_tbl.tenant_id
                    LEFT JOIN room_tbl
                    ON room_tbl.room_id = dir_tbl.room_id
                    WHERE water_tbl.water_status = 0";
        $query = $this->db->query($SELECT);
        return $query;
    }
    
    public function get_unpaidrent() {
        $SELECT = "SELECT rent_tbl.*, dir_tbl.*, room_tbl.*, tenant_tbl.*
                    FROM rent_tbl
                    LEFT JOIN tenant_tbl
                    ON tenant_tbl.tenant_id = rent_tbl.tenant_id
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = rent_tbl.tenant_id
                    LEFT JOIN room_tbl
                    ON room_tbl.room_id = dir_tbl.room_id
                    WHERE rent_tbl.rent_status = 0";
        $query = $this->db->query($SELECT);
        return $query;
    }


    public function insert_bill() {
        foreach ($this->input->post('tenant_id') as $value) {
            $data = array(
                'rent_rate' => $this->input->post('rent_rate'),
                'rent_extra' => $this->input->post('rent_extra'),
                'rent_total' => $this->input->post('rent_total'),
                'rent_status' => 0, //0 for unpaid and 1 for paid
                'rent_due' => $this->input->post('rent_due'),
                'tenant_id' => $value,
            );
            print_r($data);
            $this->db->insert('rent_tbl', $data);

            $data1 = array(
                'water_provider' => $this->input->post('water_provider'),
                'water_previous' => $this->input->post('water_previous'),
                'water_current' => $this->input->post('water_current'),
                'water_cm' => $this->input->post('water_cm'),
                'water_total' => $this->input->post('water_total'),
                'water_status' => 0,
                'water_due' => $this->input->post('water_due'),
                'tenant_id' => $value,
            );
            $this->db->insert('water_tbl', $data1);
        }
    }

    

   
}
?>