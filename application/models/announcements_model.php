<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class announcements_model extends CI_Model { 

    public function get_ann() {
       
        $query = $this->db->get('ann_tbl');
       // print_r($query);
        return $query;
        
    }

    public function publish($data) {

        $this->db->insert('ann_tbl', $data);

    }

}