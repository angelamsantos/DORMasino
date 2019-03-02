<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){

        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model('Login_model');
        $this->load->model('Syslogs_model');

    }

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

        // Validate the user can login
        $result = $this->Login_model->login_validate();
        // Now we verify the result
        if(! $result) {
            
            $admin_email = $this->input->post('username');

            $attempts = $this->session->userdata('attempts');
            $attempts++;
            $this->session->set_userdata('attempts', $attempts);

                if ($attempts >= 5) {

                    //set cookie
                    $cookie= array(
                        'name'   => 'Cookie',
                        'value'  => 'Login Attempts Cookie',
                        'expire' => '300',
                    );
                    $this->input->set_cookie($cookie);

                    // gives UPDATE mytable SET field = field+1 WHERE id = 2
                    $this->db->set('admin_attempts', 1);
                    $this->db->where('admin_email', $admin_email);
                    $this->db->update('admin_tbl');
                    $attempts = 0;

                    $msg = '<div class="alert alert-danger" role="alert"><center>Due to too many attempts, the account has been locked for 5 minutes.</center></div>';
                    $this->session->set_flashdata('msg', $msg);

                    redirect('Login/index');

                } else {

                    $msg = '<div class="alert alert-danger" role="alert"><center>Incorrect email or password.</center></div>';
                    $this->session->set_flashdata('msg', $msg);

                    redirect('Login/index');

                }

        } else {

            $admin_id = $this->session->userdata['login_success']['info']['admin_id'];
            $result = $this->Login_model->login_checkstatus($admin_id);

            if(! $result) {

                $msg = '<div class="alert alert-danger" role="alert"><center>The account you entered is deactivated.</center></div>';
                $this->session->set_flashdata('msg', $msg);

                redirect('Login/index');

            } else {

                $admin_new = $this->session->userdata['login_success']['info']['admin_new'];
                $admin_attempts = $this->session->userdata['login_success']['info']['admin_attempts'];
            
                if($admin_new == 1) {

                    $msg = '<div class="alert alert-warning" role="alert"><center>Set up your password first!</center> </div>';
                    $this->session->set_flashdata('msg', $msg);

                    redirect('Changepass/index');

                } else {

                    if ($admin_attempts == 1) {

                        if ($this->input->cookie('Cookie')) {

                            $msg = '<div class="alert alert-danger" role="alert"><center>Due to too many attempts, the account has been locked for 5 minutes.</center></div>';
                            $this->session->set_flashdata('msg', $msg);
                
                            redirect('Login/index');

                        } else {

                            $admin_email = $this->input->post('username');

                            $this->db->set('admin_attempts', 0);
                            $this->db->where('admin_email', $admin_email);
                            $this->db->update('admin_tbl');
    
                            $login_success = true;
                            $this->session->set_userdata('login_validated', $login_success); 
    
                            $this->Syslogs_model->login(); 
                            
                            redirect('Home');

                        }

                    } else {

                        $login_success = true;
                        $this->session->set_userdata('login_validated', $login_success); 

                        $this->Syslogs_model->login(); 
                        
                        redirect('Home');

                    }
                }
            }
        }        
    }
}
?>