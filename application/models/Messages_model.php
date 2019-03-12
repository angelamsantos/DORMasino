<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages_model extends CI_Model { 

    public function record_count_inbox() {

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $this->db->where('send_archive', 0);
        $this->db->where('send_type', 0);
        $this->db->where('admin_id', $admin_id);
        $this->db->from('send_tbl');
        $query = $this->db->count_all_results();
        return $query;
    }

    public function record_count_sent() {

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $this->db->where('send_archive', 0);
        $this->db->where('send_type', 1);
        $this->db->where('admin_id', $admin_id);
        $this->db->from('send_tbl');
        $query = $this->db->count_all_results();
        return $query;
    }

    public function record_count_archive() {
        
        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $this->db->where('send_archive', 1);
        $this->db->where('admin_id', $admin_id);
        $this->db->from('send_tbl');
        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_floor() {
    
        $query = $this->db->get('floor_tbl');
        return $query;
    }

    public function get_room() {
        $query = $this->db->get('room_tbl');
        return $query;
    }

    public function get_msg_inbox($limit, $start) {

        $this->db->limit($limit, $start);

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $this->db->from('send_tbl');
        $this->db->order_by('send_id', 'desc');
        $this->db->join('msg_tbl','msg_tbl.msg_id=send_tbl.msg_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=send_tbl.tenant_id', 'LEFT');
        $this->db->where('admin_id', $admin_id);
        $this->db->where('send_archive', 0);
        $this->db->where('send_type', 0);
    
		$query = $this->db->get();
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            } return $data;

        } return false;
        
    }

    public function get_msg_sent($limit, $start) {

        $this->db->limit($limit, $start);

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $this->db->from('send_tbl');
        $this->db->order_by('send_id', 'desc');
        $this->db->join('msg_tbl','msg_tbl.msg_id=send_tbl.msg_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=send_tbl.tenant_id', 'LEFT');
        $this->db->where('admin_id', $admin_id);
        $this->db->where('send_archive', 0);
        $this->db->where('send_type', 1);
    
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            } return $data;

        } return false;
        
    }

    public function get_msg_archive($limit, $start) {

        $this->db->limit($limit, $start);

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $this->db->from('send_tbl');
        $this->db->order_by('send_id', 'desc');
        $this->db->join('msg_tbl','msg_tbl.msg_id=send_tbl.msg_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=send_tbl.tenant_id', 'LEFT');
        $this->db->where('admin_id', $admin_id);
        $this->db->where('send_archive', 1);
    
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            } return $data;

        } return false;
        
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

        $output = '<option value="">Select Tenant</option>';

            foreach ($query->result() as $row1) {

                $output .= '<option value="'.$row1->tenant_id.'">'. $row1->tenant_fname.' '. $row1->tenant_lname .'</option>';
                $tenant_id = $this->session->set_userdata('tenant_id', $row1->tenant_id);

            }

            return $output;
    }

    public function send_msg($msg_subject, $msg_body) {

        $data = array(
            'msg_subject' => $msg_subject,
            'msg_body' => $msg_body,
            'msg_status' => 0
        );

        $this->db->insert('msg_tbl', $data);

    }

    public function send_msg1($value, $msg_id) {

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $data1 = array(
            'send_type' => 1,
            'send_status' => 0,
            'send_archive' => 0,
            'msg_id' => $msg_id,
            'admin_id' => $admin_id,
            'tenant_id' => $value
        );

        $this->db->insert('send_tbl', $data1);

    }

    public function reply_msg($tenant_id, $send_id, $msg_subject, $msg_body) {

        $this->db->set('send_status', 1);
        $this->db->where('send_id', $send_id);
        $this->db->update('send_tbl');

        $data = array(
            'msg_subject' => $msg_subject,
            'msg_body' => $msg_body,
            'msg_status' => 0
        );

        $this->db->insert('msg_tbl', $data);
        
        $msg_id = $this->db->insert_id();
        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

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

    public function archive_msg($value) {

        $this->db->set('send_archive', 1);
        $this->db->where('send_id', $value);
        $this->db->update('send_tbl');

    }

    public function restore_msg($value) {

        $this->db->set('send_archive', 0);
        $this->db->where('send_id', $value);
        $this->db->update('send_tbl');

    }

    public function delete_msg($value) {

        $this->db->set('send_archive', 2);
        $this->db->where('send_id', $value);
        $this->db->update('send_tbl');

    }

    public function deleteall_msg() {

        $this->db->set('send_archive', 2);
        $this->db->where('send_archive', 1);
        $this->db->update('send_tbl');

    }

}
?>