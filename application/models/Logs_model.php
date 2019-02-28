<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs_model extends CI_Model { 

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

    public function record_visitor($data) {

        $this->db->insert('vlogs_tbl', $data);

    }

    public function get_vlogs() {
  
        $this->db->from('vlogs_tbl');
        $this->db->order_by('vlogs_id', 'desc');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=vlogs_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=vlogs_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');

        $query = $this->db->get();
		return $query;

    }

    public function fetch_tenant($room_id) {

        $this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
        $this->db->where('room_tbl.room_id', $room_id);
        $query = $this->db->get();

        $output = '<option value="">Select Tenant</option>';

            foreach ($query->result() as $row1) {

                $output .= '<option value="'.$row1->tenant_id.'">'. $row1->tenant_fname.' '. $row1->tenant_lname .'</option>';

            } 

            $tenant_id = $this->session->set_userdata('tenant_id', $row1->tenant_id);
            return $output;
    }

    public function update_out($id) {
        
        date_default_timezone_set("Asia/Manila");
        $date = date('Y-m-d H:i:s');
        
        $value = array('vlogs_out'=>$date);
        $this->db->where('vlogs_id', $id);
        $this->db->update('vlogs_tbl', $value);
        
        // print($id);

    }

    public function send_msg($tenant_id, $vlogs_name, $vlogs_relation, $vlogs_purpose) {

        $msg_subject = "New Visitor!";
        $msg_body = "This is to inform you that you have a visitor named $vlogs_name, your $vlogs_relation. Purpose: $vlogs_purpose";

        $data = array(
            'msg_subject' => $msg_subject,
            'msg_body' => $msg_body,
            'msg_status' => 0
        );

        $this->db->insert('msg_tbl', $data);

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];
        $msg_id = $this->db->insert_id();

        $data1 = array(
            'send_type' => 1,
            'send_status' => 0,
            'send_archive' => 0,
            'msg_id' => $msg_id,
            'admin_id' => $admin_id,
            'tenant_id' => $tenant_id
        );

        $this->db->insert('send_tbl', $data1);

    }

}
?>