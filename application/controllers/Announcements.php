<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('announcements_model');
        $this->load->library('pagination');
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
        $data['links'] = $this->pagination->create_links();

        $this->validate_login();

        $this->load->view('sidebar_view');
        $this->load->view('announcements_view', $data);

    }

    public function process() {

        $admin_id = $this->session->userdata['login_success']['info']['admin_id'];

        $data = array(
            'ann_title' => $this->input->post('title'),
            'ann_content' => $this->input->post('content'),
            'admin_id' => $admin_id
        );

        $this->announcements_model->publish($data);

        redirect('Announcements/index');

    }
}
?>
