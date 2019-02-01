<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class announcements_model extends CI_Model { 

    public function record_count() {

        $query = $this->db->count_all('ann_tbl');
        return $query;
    }    

    public function get_ann($limit, $start) {
       
        $this->db->limit($limit, $start);

        $this->db->from('ann_tbl');
        $this->db->order_by('date_posted', 'desc');
        $this->db->join('admin_tbl','admin_tbl.admin_id=ann_tbl.admin_id', 'LEFT');

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            } return $data;

        } return false;
        
    }

    public function publish($data) {

        $this->db->insert('ann_tbl', $data);

    }

}