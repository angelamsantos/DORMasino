<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends CI_Model {
    
    public function get_reqs() {

        $this->db->from('req_tbl');
        $this->db->order_by('req_id', 'desc');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=req_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=req_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');

        $query = $this->db->get();
        return $query;
    
    }

    public function complete($id) {

        $this->db->set('req_status', 1);
        $this->db->where('req_id', $id);
        $this->db->update('req_tbl');

    }

}
