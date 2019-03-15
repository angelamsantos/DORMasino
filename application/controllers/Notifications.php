<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->model('Notifications_model');
    }

    public function fetch_notif($limit=10, $start=0) {

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        if ($this->input->post('view') != '') {

            // $this->Messages_model->seen_notif();
            $this->db->set('notif_status', 1);
            $this->db->where('notif_status', 0);
            $this->db->where('admin_id', $admin_id);
            $this->db->update('notif_tbl');

        }

        // $this->Messages_model->get_notif();
        $this->db->limit($limit, $start);
        $this->db->from('notif_tbl');
        $this->db->order_by('notif_id', 'desc');
        $this->db->where('admin_id', $admin_id);
    
        $query = $this->db->get();
        $output = '';
        
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row ) {

                if ($row->notif_type == 0) {

                    $output .= '
                    <a href="'.site_url('Messages/index').'">
                        <li style="color: #11334f;font-family: ABeeZee, sans-serif;margin-left: 5px;">
                            <strong>'.$row->notif_subject.'</strong><br />
                            <small><em>'.$row->notif_body.'</em></small>
                        </li>    
                    </a>
                    <hr>
                    <li class="divider"></li>
                    ';

                } else {

                    $output .= '
                    <a href="'.site_url('Requests/index').'">
                        <li style="color: #11334f;font-family: ABeeZee, sans-serif;margin-left: 5px;">
                            <strong>'.$row->notif_subject.'</strong><br />
                            <small><em>'.$row->notif_body.'</em></small>
                        </li>    
                    </a>
                    <hr>
                    <li class="divider"></li>
                    ';

                }

            }

        } else {

            $output .= '<li style=""><a href="#" style="color: #11334f;font-family: ABeeZee, sans-serif;margin-left: 5px;" class="text-bold text-italic">No notifications</a></li>';

        }

        $this->Notifications_model->get_notif($output, $admin_id);

    }

}