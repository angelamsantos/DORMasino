<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    // function __construct(){
    //     parent::__construct();
	// 	$this->load->helper(array('form', 'url'));
	// 	$this->load->library('form_validation');
    //     $this->load->library('session');
    // }

    public function validate_login() {

        $login = $this->session->userdata('login_validated');
        if (isset ($login)) {

            redirect('Home');

        } 

    }
    
    public function index(){
        $this->validate_login();            // Validates if a user has already logged in
        $this->load->view('login_view');    // Load our view to be displayed to the user
    }
    
    public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->login_validate();
        // Now we verify the result
        if(! $result) {
            
            $admin = $this->input->post('username');
            $attempt = $this->session->userdata('attempt');
            $attempt++;
            $this->session->set_userdata('attempt', $attempt);

            $email = $this->input->post('username');

            date_default_timezone_set('Asia/Manila');
            $log = date("F j, Y, g:ia").": ". $email . " failed to log in to the system.".PHP_EOL;
            file_put_contents('syslogs/syslogs_login.txt', $log, FILE_APPEND); 

                if ($attempt == 3) {
                $msg = "Due to too many login attempts, your account is locked for 5 minutes";
                $this->index($msg);

                // gives UPDATE mytable SET field = field+1 WHERE id = 2
                $this->db->set('admin_attempts', 'admin_attempts+1', FALSE);
                $this->db->where('admin_email', $admin);
                $this->db->update('admin_tbl');

                $this->session->set_tempdata('penalty', true, 300);

                    // if($this->session->userdata['admin_attempts']['admin_attempts']) {

                    //     $this->session->set_tempdata('penalty', true, 300);

                    // } else {

                    //     $this->session->set_tempdata('penalty', false, 0);

                    // }
   

                } else {

                    $msg = '<div class="alert alert-danger" role="alert"><center>Incorrect email or password.</center></div>';
                    $this->session->set_flashdata('msg', $msg);

                    redirect('Login');

                }
           
            // If user did not validate, then show them login page again
           
        } else {

            $admin_id = $this->session->userdata['login_success']['info']['admin_id'];
            $result = $this->login_model->login_checkstatus($admin_id);

            if(! $result) {

                $msg = '<div class="alert alert-danger" role="alert">The account you entered is deactivated. </div>';
                $this->session->set_flashdata('msg', $msg);

            } else {

                 $admin_new = $this->session->userdata['login_success']['info']['admin_new'];
            
                if($admin_new == 1) {

                    $msg = '<div class="alert alert-warning" role="alert">Set up your password first! </div>';
                    $this->session->set_flashdata('msg', $msg);
                    redirect('ChangePass/index');

                } else {

                    $login_success = true;
				    $this->session->set_userdata('login_validated', $login_success); 

                    $email = $this->session->userdata['login_success']['info']['admin_email'];

                    date_default_timezone_set('Asia/Manila');
                    $log = date("F j, Y, g:ia").": ". $email . " successfully logged in to the system.".PHP_EOL;
                    file_put_contents('syslogs/syslogs_login.txt', $log, FILE_APPEND);  
                    
                    redirect('Home');

                }
            }
        }        
    }
}
?>