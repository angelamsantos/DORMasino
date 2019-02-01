<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class  details_api extends REST_Controller {
       
        function detail_post()
        {
            
           // Get the post data
      
        
   //check api key is correct
        
            //search data   
            $email=$this->input->post('email');
            // Check if any user exists with the given credentials
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_email=', $email)
            $user=$this->db->get();
            $details=$user->result();

            
            
            if($details){
                // Set the response and exit
                $this->response([
                    'status' => 'Connected',
                    
                    'message' =>'API key verified' ,
                    'data'=>$details
                    
                    
                ], REST_Controller::HTTP_OK);

            }else if($details==null){
                $this->response([
                    'status' => 'Connected',
                    'message' => 'Error: API key does not match'
                    
                ], REST_Controller::HTTP_OK);

            }

            else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        
    }
}
