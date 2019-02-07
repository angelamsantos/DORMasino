<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');
        $this->load->model('announcements_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index(){

        $config = array();
        $config["base_url"] = base_url() . "index.php/Announcements/index";
        $config['total_rows'] = $this->announcements_model->record_count();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['ann']=$this->announcements_model->get_ann($config['per_page'], $page);
        // $data['ann_id']=$this->announcements_model->get_ann_id();
        $data['links'] = $this->pagination->create_links();

        $this->validate_login();

        $this->load->view('sidebar_view');
        $this->load->view('announcements_view', $data);

    }

    public function do_upload() {

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $data = array(
            'ann_title' => $this->input->post('title'),
            'ann_content' => $this->input->post('content'),
            'admin_id' => $admin_id
        );

        date_default_timezone_set("Asia/Manila");
        $date = date("m-d-Y");
        $path = "./assets/uploads/documents/".$date."/";
      
        $conf = array(
            'upload_path' => "./assets/uploads/documents/".$date."/",
            'allowed_types' => "xls|docx|doc|pdf",
            'overwrite' => FALSE,
            'max_size' => "20971520", // Can be set to particular file size , here it is 20 MB
            'max_height' => "768",
            'max_width' => "1024"
        );

        $this->load->library('upload', $conf);

        if (!is_dir("assets/uploads/documents/".$date."/")) {

            mkdir($path, 0777, true);
            
        }

            if (!$this->upload->do_upload()) {

                $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not posted. File size or extension is invalid!</center></div>';
                $this->session->set_flashdata('msg', $msg);

                redirect('Announcements/index');

            } else {

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];

                $path .= $file_name;

                $this->announcements_model->publish($data);
                $this->announcements_model->publishFile($path);

                $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Announcement posted!</center></div>';
                $this->session->set_flashdata('msg', $msg);

                redirect('Announcements/index');

            }
        }

}
?>
