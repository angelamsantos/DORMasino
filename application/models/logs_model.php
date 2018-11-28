<?php
//hi //hello
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logs_model extends CI_Model { 

    public function get_room_number() {

        $query = $this->db->query("SELECT room_number FROM room_tbl");
        return $query;

    }

    public function get_tenant_name() {

        $query1 = $this->db->query("SELECT tenant_name FROM room_tbl WHERE room_number == ''");
        return $query1;

    }

}
?>