<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class user_api extends REST_Controller {
       
        function test_post()
        {
            
           // Get the post data
        $email =$this->input->post('email');
        $password = $this->input->post('password');    
        
   
        if(!empty($email) && !empty($password)){
            //search data
     
            // Check if any user exists with the given credentials
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_email=', $email);
            $this->db->where('tenant_password=',md5($password));
            $this->db->where('tenant_status=',1);
            $user=$this->db->get();
            $details=$user->result();

            
            
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $details
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        
        
        
            
        }
    }
}
