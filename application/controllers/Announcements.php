<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');
        $this->load->model('Announcements_model');
    }

    public function validate_login() {

        $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    }

    public function index(){

        $this->validate_login();

        $config = array();
        $config["base_url"] = base_url() . "index.php/Announcements/index";
        $config['total_rows'] = $this->Announcements_model->record_count();
        $config['per_page'] = 5;
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

        $data['ann']=$this->Announcements_model->get_ann($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('sidebar_view');
        $this->load->view('announcements_view', $data);

    }

    public function do_upload() {

        $this->validate_login();

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $data = array(
            'ann_title' => $this->input->post('title'),
            'ann_content' => $this->input->post('content'),
            'ann_status' => 1,
            'admin_id' => $admin_id
        );

        $file = $_FILES["file"]["name"];
        $file_ext = pathinfo($file, PATHINFO_EXTENSION);
        $file_ext1 = strtolower($file_ext);

        $img = $_FILES["img"]["name"];
        $img_ext = pathinfo($img, PATHINFO_EXTENSION);
        $img_ext1 = strtolower($img_ext);

        if (empty($file) && empty($img)) {

            $this->Announcements_model->publish($data);

            $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Announcement posted!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Announcements/index');

        } else if (!empty($file) && !empty($img)) {

            $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not posted. Could not upload both an image and a file!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Announcements/index');

        } else {

            if (!empty($file) && 
                $file_ext1 == "xls" || $file_ext1 == "xlsx" || $file_ext1 == "pdf" ||
                $file_ext1 == "doc" || $file_ext1 == "docx") {

                date_default_timezone_set("Asia/Manila");
                $date = date("m-d-Y");
                $path = "./assets/uploads/documents/".$date."/";
        
                $conf = array(
                    'upload_path' => "./assets/uploads/documents/".$date."/",
                    'allowed_types' => "xls|xlsx|docx|doc|pdf",
                    'overwrite' => FALSE,
                    'max_size' => "10000", // Can be set to particular file size , here it is 10 MB
                    'max_height' => "768",
                    'max_width' => "1024"
                );

                $this->load->library('upload', $conf);

                if (!is_dir("assets/uploads/documents/".$date."/")) {

                    mkdir($path, 0777, true);
                    
                }

                    if (!$this->upload->do_upload('file')) {

                        $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not posted. File size is invalid!</center></div>';
                        $this->session->set_flashdata('msg', $msg);

                        redirect('Announcements/index');

                    } else {

                        $upload_data = $this->upload->data();

                        $file_name = $upload_data['file_name'];

                        $path .= $file_name;

                        $this->Announcements_model->publish($data);
                        $this->Announcements_model->publishFile($path);

                        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Announcement posted!</center></div>';
                        $this->session->set_flashdata('msg', $msg);

                        redirect('Announcements/index');

                    }

            } else if (!empty($img) &&
                $img_ext1 == "png" || $img_ext1 == "gif" ||
                $img_ext1 == "jpg" || $img_ext1 == "jpeg") {

                    date_default_timezone_set("Asia/Manila");
                    $date = date("m-d-Y");
                    $path = "./assets/uploads/images/".$date."/";
            
                    $conf = array(
                        'upload_path' => "./assets/uploads/images/".$date."/",
                        'allowed_types' => "png|gif|jpg|jpeg|PNG|GIF|JPG|JPEG",
                        'overwrite' => FALSE,
                        'max_size' => "5000", // Can be set to particular file size , here it is 5 MB
                    );
    
                    $this->load->library('upload', $conf);
    
                    if (!is_dir("assets/uploads/images/".$date."/")) {
    
                        mkdir($path, 0777, true);
                        
                    }
    
                        if (!$this->upload->do_upload('img')) {
    
                            $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not posted. File size is invalid!</center></div>';
                            $this->session->set_flashdata('msg', $msg);
    
                            redirect('Announcements/index');
    
                        } else {
    
                            $upload_data = $this->upload->data();
    
                            $file_name = $upload_data['file_name'];
    
                            $path .= $file_name;
    
                            $this->Announcements_model->publish($data);
                            $this->Announcements_model->publishImg($path);
    
                            $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Announcement posted!</center></div>';
                            $this->session->set_flashdata('msg', $msg);
    
                            redirect('Announcements/index');
    
                        }

            } else {

                $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not posted. File extension is invalid!</center></div>';
                $this->session->set_flashdata('msg', $msg);

                redirect('Announcements/index');

            }
        }
        
    }

    public function delete() {

        $ann_id = $this->input->post('ann_id');

        $this->Announcements_model->delete_ann($ann_id);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>The announcement has been deleted! </center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Announcements/index');

    }

    public function edit() {

        $ann_id = $this->input->post('ann_id');
        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $data = array(
            'ann_title' => $this->input->post('edit_title'),
            'ann_content' => $this->input->post('edit_content'),
            'ann_status' => 1,
            'admin_id' => $admin_id
        );

        $file = $_FILES["file"]["name"];
        $file_ext = pathinfo($file, PATHINFO_EXTENSION);
        $file_ext1 = strtolower($file_ext);

        $img = $_FILES["img"]["name"];
        $img_ext = pathinfo($img, PATHINFO_EXTENSION);
        $img_ext1 = strtolower($img_ext);

        if (empty($file) && empty($img)) {

            $this->Announcements_model->edit_ann($ann_id);
            $this->Announcements_model->publish($data);

            $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Announcement edited!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Announcements/index');

        } else if (!empty($file) && !empty($img)) {

            $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not edited. Could not upload both an image and a file!</center></div>';
            $this->session->set_flashdata('msg', $msg);

            redirect('Announcements/index');

        } else {

            if (!empty($file) && 
                $file_ext1 == "xls" || $file_ext1 == "xlsx" || $file_ext1 == "pdf" ||
                $file_ext1 == "doc" || $file_ext1 == "docx") {

                date_default_timezone_set("Asia/Manila");
                $date = date("m-d-Y");
                $path = "./assets/uploads/documents/".$date."/";
        
                $conf = array(
                    'upload_path' => "./assets/uploads/documents/".$date."/",
                    'allowed_types' => "xls|xlsx|docx|doc|pdf",
                    'overwrite' => FALSE,
                    'max_size' => "10000", // Can be set to particular file size , here it is 10 MB
                    'max_height' => "768",
                    'max_width' => "1024"
                );

                $this->load->library('upload', $conf);

                if (!is_dir("assets/uploads/documents/".$date."/")) {

                    mkdir($path, 0777, true);
                    
                }

                    if (!$this->upload->do_upload('file')) {

                        $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not edited. File size is invalid!</center></div>';
                        $this->session->set_flashdata('msg', $msg);

                        redirect('Announcements/index');

                    } else {

                        $upload_data = $this->upload->data();

                        $file_name = $upload_data['file_name'];

                        $path .= $file_name;

                        $this->Announcements_model->edit_ann($ann_id);
                        $this->Announcements_model->publish($data);
                        $this->Announcements_model->publishFile($path);

                        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Announcement edited!</center></div>';
                        $this->session->set_flashdata('msg', $msg);

                        redirect('Announcements/index');

                    }

            } else if (!empty($img) &&
                $img_ext1 == "png" || $img_ext1 == "gif" ||
                $img_ext1 == "jpg" || $img_ext1 == "jpeg") {

                    date_default_timezone_set("Asia/Manila");
                    $date = date("m-d-Y");
                    $path = "./assets/uploads/images/".$date."/";
            
                    $conf = array(
                        'upload_path' => "./assets/uploads/images/".$date."/",
                        'allowed_types' => "png|gif|jpg|jpeg|PNG|GIF|JPG|JPEG",
                        'overwrite' => FALSE,
                        'max_size' => "5000", // Can be set to particular file size , here it is 5 MB
                    );
    
                    $this->load->library('upload', $conf);
    
                    if (!is_dir("assets/uploads/images/".$date."/")) {
    
                        mkdir($path, 0777, true);
                        
                    }
    
                        if (!$this->upload->do_upload('img')) {
    
                            $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not edited. File size is invalid!</center></div>';
                            $this->session->set_flashdata('msg', $msg);
    
                            redirect('Announcements/index');
    
                        } else {
    
                            $upload_data = $this->upload->data();
    
                            $file_name = $upload_data['file_name'];
    
                            $path .= $file_name;
    
                            $this->Announcements_model->edit_ann($ann_id);
                            $this->Announcements_model->publish($data);
                            $this->Announcements_model->publishImg($path);
    
                            $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>Announcement edited!</center></div>';
                            $this->session->set_flashdata('msg', $msg);
    
                            redirect('Announcements/index');
    
                        }

            } else {

                $msg = '<div class="alert alert-danger" style="font-size:15px;margin:0px"><center>Announcement not edited. File extension is invalid!</center></div>';
                $this->session->set_flashdata('msg', $msg);

                redirect('Announcements/index');

            }
        }

    }

    public function remove() {

        $ann_id = $this->input->post('remove_id');
        
        $this->Announcements_model->remove_attach($ann_id);

        $msg = '<div class="alert alert-success" style="font-size:15px;margin:0px"><center>The file attachment has been removed! </center></div>';
        $this->session->set_flashdata('msg', $msg);

        redirect('Announcements/index');

    }

}
?>
