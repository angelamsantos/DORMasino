<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements_model extends CI_Model { 

    public function record_count() {

        $query = $this->db->count_all('ann_tbl');
        return $query;
    }    

    public function get_ann($limit, $start) {

        $this->db->limit($limit, $start);

        $this->db->select('ann_tbl.ann_id AS id, date_posted, annfile_type, annfile_path, ann_title, ann_content, admin_fname, admin_lname, ann_status, admin_tbl.admin_id');
        $this->db->from('ann_tbl');
        $this->db->order_by('id', 'desc');
        $this->db->join('admin_tbl','admin_tbl.admin_id=ann_tbl.admin_id', 'LEFT');
        $this->db->join('annfile_tbl','annfile_tbl.ann_id=ann_tbl.ann_id', 'LEFT');

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            } return $data;

        } return false;
        
    }

    public function get_ann2() {

        $this->db->from('ann_tbl');
        $this->db->order_by('date_posted', 'desc');
        $query = $this->db->get();
        return $query;

    }

    public function publish($data) {

        $this->db->insert('ann_tbl', $data);

    }

    public function publishFile($path) {

        $ann_id = $this->db->insert_id();

        $data2 = array(

            'annfile_type' => "file",
            'annfile_path' => $path,
            'ann_id' => $ann_id

        );

        $this->db->insert('annfile_tbl', $data2);

    }

    public function publishImg($path) {

        $ann_id = $this->db->insert_id();

        $data2 = array(

            'annfile_type' => "image",
            'annfile_path' => $path,
            'ann_id' => $ann_id

        );

        $this->db->insert('annfile_tbl', $data2);

    }

    public function get_file() {

        $this->db->from('annfile_tbl');
        $query = $this->db->get();
        return $query;

    }

    public function delete_ann($ann_id) {

        $status=0;
        
        $this->db->set('ann_status', $status);
        $this->db->where('ann_id', $ann_id);
        $this->db->update('ann_tbl');
        
    }

    public function edit_ann($ann_id) {
        
        $data3 = array(

            'ann_status' => 0

        );

        $this->db->where('ann_id', $ann_id);
        $this->db->update('ann_tbl', $data3);
        
    }

    public function remove_attach($ann_id) {
        
        $data4 = array(

            'annfile_type' => ''

        );

        $this->db->where('ann_id', $ann_id);
        $this->db->update('annfile_tbl', $data4);
        
    }

}