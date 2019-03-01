<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('Messages_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index() {

        $this->validate_login();

        $config = array();
        $config["base_url"] = base_url() . "index.php/Messages/index";
        $config['total_rows'] = $this->Messages_model->record_count_inbox();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pull-right">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        // $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['msg']=$this->Messages_model->get_msg($config['per_page'], $page);
        $data['floor']=$this->Messages_model->get_floor();
        $data['room']=$this->Messages_model->get_room();
        $data['dir']=$this->Messages_model->get_dir();
        $data['links'] = $this->pagination->create_links();

        $this->load->view('sidebar_view');
        $this->load->view('inbox_view', $data);

    }

    public function sent() {

        $this->validate_login();

        $config = array();
        $config["base_url"] = base_url() . "index.php/Messages/sent";
        $config['total_rows'] = $this->Messages_model->record_count_sent();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['msg']=$this->Messages_model->get_msg($config['per_page'], $page);
        $data['floor']=$this->Messages_model->get_floor();
        $data['room']=$this->Messages_model->get_room();
        $data['dir']=$this->Messages_model->get_dir();
        $data['links'] = $this->pagination->create_links();

        $this->load->view('sidebar_view');
        $this->load->view('sent_view', $data);

    }

    public function archive() {

        $this->validate_login();

        $config = array();
        $config["base_url"] = base_url() . "index.php/Messages/archive";
        $config['total_rows'] = $this->Messages_model->record_count_archive();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['msg']=$this->Messages_model->get_msg($config['per_page'], $page);
        $data['floor']=$this->Messages_model->get_floor();
        $data['room']=$this->Messages_model->get_room();
        $data['dir']=$this->Messages_model->get_dir();
        $data['links'] = $this->pagination->create_links();

        $this->load->view('sidebar_view');
        $this->load->view('archive_view', $data);

    }

    public function fetch_tenant() {

        $room_id = $this->input->post('room_id');

        foreach ($room_id as $value) {

                echo $this->Messages_model->fetch_tenant($value);

        }

        
    }

    public function send() {

        $msg_subject = $this->input->post('subject');
        $msg_body = $this->input->post('body');

        $this->Messages_model->send_msg($msg_subject, $msg_body);

        $tenant_id = $this->input->post('tenant_id');
        $msg_id = $this->db->insert_id();

        foreach ($tenant_id as $value) {

            echo $this->Messages_model->send_msg1($value, $msg_id);

        }

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Your message has been sent!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Messages/index');
        
    }

    public function reply() {

        $tenant_id = $this->input->post('tenant_id');
        $send_id = $this->input->post('send_id');
        $msg_subject = $this->input->post('subject');
        $msg_body = $this->input->post('body');

        $this->Messages_model->reply_msg($tenant_id, $send_id, $msg_subject, $msg_body);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Your reply has been sent!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Messages/index');

    }

    public function archive_inbox() {

        $send_id = $this->input->post('send_id');

        foreach ($send_id as $value) {

                echo $this->Messages_model->archive_msg($value);

        }

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>The message/s have been archived!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Messages/index');

    }

    public function archive_sent() {

        $send_id = $this->input->post('send_id');

        foreach ($send_id as $value) {

                echo $this->Messages_model->archive_msg($value);

        }

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>The message/s have been archived!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Messages/sent');

    }

    public function restore() {

        $send_id = $this->input->post('send_id');

        foreach ($send_id as $value) {

                echo $this->Messages_model->restore_msg($value);

        }

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>The message/s have been restored!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Messages/archive');

    }

    public function delete() {

        $send_id = $this->input->post('send_id');

        foreach ($send_id as $value) {

                echo $this->Messages_model->delete_msg($value);

        }

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>The message/s have been deleted!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Messages/archive');

    }

    public function deleteall() {

        $this->Messages_model->deleteall_msg();

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>The message/s have been deleted!</center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Messages/archive');

    }

}
?>
