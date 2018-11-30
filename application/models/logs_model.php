<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logs_model extends CI_Model { 

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

    public function record_visitor($data) {

        $this->db->insert('vlogs_tbl', $data);

    }

    public function get_vlogs() {

        $this->db->from('vlogs_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=vlogs_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=vlogs_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');

        $query = $this->db->get();
		return $query;

    }

    public function update_out($vlogs_in) {
        
        date_default_timezone_set("Asia/Manila");
        $date = date('Y-m-d H:i:s');
        
        $this->db->set('vlogs_out', $date);
        $this->db->where('vlogs_in', $vlogs_in);
        $this->db->update('vlogs_tbl');

        unset($row2);

    }

    // public function get_dir ($room_id) {
       
	//     $this->db->from('dir_tbl');
	//     $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
    //     $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');

    //     $this->db->where('dir_tbl.room_id', $room_id);
    //     $query = $this->db->get();
    //     $output = '<option value="">Select Tenant</option>';
    //     foreach($query->result() as $row) {

    //         $output.= '<option value="'.$row->tenant_id.'">'.$row->tenant_fname.'</option>';

    //     } return $output;
    // }

}
?>