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

        $this->db->from('ann_tbl');
        $this->db->order_by('date_posted', 'desc');
        $this->db->join('admin_tbl','admin_tbl.admin_id=ann_tbl.admin_id', 'LEFT');
        $this->db->join('annfile_tbl','annfile_tbl.ann_id=ann_tbl.ann_id', 'LEFT');

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            } return $data;

        } return false;
        
    }

    // public function get_ann_id() {

    //     $this->db->select('ann_id');
    //     $this->db->from('ann_tbl');
    //     $query = $this->db->get();
    //     return $query;

    // }

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

}