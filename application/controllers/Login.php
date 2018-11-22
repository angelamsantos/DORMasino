<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        $this->load->library('session');
    }
    
    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $this->load->view('login_view', $data);
    }
    
    public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->login_validate();
        // Now we verify the result
        if(! $result){

           $msg = '<font color=yellow><center>Invalid username and/or password.</center></font><br />';
           $this->index($msg);
           
            // If user did not validate, then show them login page again
           
        }else{
            // If user did validate, 
            // Send them to members area
            $results = $this->login_model->login_checkstatus();

            if(! $results) {
                 $msg = '<font color=yellow><center>Your account has been deactivated</center></font><br />';
                $this->index($msg);
            } else {
                 $resultc = $this->login_model->login_checknew();
            
                if(! $resultc) {
                    redirect('ChangePass');
                } else {
                    redirect('Home');
                }
            }
        }        
    }
}
?>