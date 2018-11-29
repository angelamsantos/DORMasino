<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logs_model extends CI_Model { 

    public function get_room_number() {

        $query = $this->db->query("SELECT room_id, room_number FROM room_tbl");
        return $query;

    }

    public function get_dir ($room_id) {
       
		$this->db->from('dir_tbl');
	    $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');

        $this->db->where('dir_tbl.room_id', $room_id);
        $query = $this->db->get();
        $output = '<option value="">Select Tenant</option>';
        foreach($query->result() as $row) {

            $output.= '<option value="'.$row->tenant_id.'">'.$row->tenant_fname.'</option>';

        } return $output;
    }

    // public function get_tenant() {

    //     $result = $this->db->select("tenant_fname")->where("room_id", $room_id)->get("tenant_tbl")->result();
    //     echo json_encode($result);

    // }

}
?>