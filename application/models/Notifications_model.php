<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications_model extends CI_Model {

    public function get_notif($output) {

        $this->db->where('notif_status', 0);
        $this->db->from('notif_tbl');
        $count = $this->db->count_all_results();

        $data = array(

            'notification'   => $output,
            'unseen_notification' => $count

        );

        echo json_encode($data);

    }

}