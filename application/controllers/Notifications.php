<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->model('Notifications_model');
    }

    public function fetch_notif($limit=10, $start=0) {

        if ($this->input->post('view') != '') {

            // $this->Messages_model->seen_notif();
            $this->db->set('notif_status', 1);
            $this->db->where('notif_status', 0);
            $this->db->update('notif_tbl');

        }

        // $this->Messages_model->get_notif();
        $this->db->limit($limit, $start);
        $this->db->from('notif_tbl');
        $this->db->order_by('notif_id', 'desc');
    
        $query = $this->db->get();
        $output = '';
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row ) {

                $output .= '
                <li>
                    <a href="#">
                        <strong>'.$row->notif_subject.'</strong><br />
                        <small><em>'.$row->notif_body.'</em></small>
                    </a>
                </li>
                <li class="divider"></li>
                ';

            }

        } else {

            $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';

        }

        $this->Notifications_model->get_notif($output);

}

}