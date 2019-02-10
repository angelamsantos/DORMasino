<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class User_api extends REST_Controller {
       
        function test_post()
        {
            
           // Get the post data
        $email =$this->input->post('email');
        $password = $this->input->post('password');    
        
   
        if(!empty($email) && !empty($password)){
            //search data
     
            // Check if any user exists with the given credentials
            $this->db->select('tenant_fname,tenant_new,tenant_status');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_email=', $email);
            $this->db->where('tenant_password=',md5($password));
            $this->db->where('tenant_status=',1);
            $user=$this->db->get();
            $details=$user->result();

            
            
            if($details){
                // Set the response and exit
                $this->response([
                    'status' => 'Connected',
                    'message' => 'User login successful.',
                    'data'=> $details
                    //add api key to be passed to others
                ], REST_Controller::HTTP_OK);

            }else if($details==null){
                $this->response([
                    'status' => 'Connected',
                    'message' => 'You have entered Wrong Email/Password. Please try again.'
                    //return api key
                ], REST_Controller::HTTP_OK);

            }

            else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        
        
        
            
        }else{
            $this->response([
                'status' => 'Connected',
                'message' => 'Login Failed. Please Enter Your Credentials.'
                
            ], REST_Controller::HTTP_OK);
        }
    }
}
