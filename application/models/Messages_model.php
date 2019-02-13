<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages_model extends CI_Model { 

    public function get_floor() {
    
        $query = $this->db->get('floor_tbl');
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
    
		$query = $this->db->get();
		return $query;

    }

    public function fetch_tenant($value) {

        $this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
        $this->db->where('room_tbl.room_id', $value);
        $query = $this->db->get();

        $output = "";

            foreach ($query->result() as $row1) {

                $output .= '<option value="'.$row1->tenant_id.'">'. $row1->tenant_fname.' '. $row1->tenant_lname .'</option>';
                $tenant_id = $this->session->set_userdata('tenant_id[]', $row1->tenant_id);

            }

            return $output;
    }

}
?>