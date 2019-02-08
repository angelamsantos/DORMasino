<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class  newpw_api extends REST_Controller {
       
        function newpw_post()
        {
            
           // Get the post data
      
        
   //check api key is correct
        
            //search data   
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $confpw=$this->input->post('confpw');
            $newpw=$this->input->post('newpw');
            // Check if any user exists with the given credentials
            $this->db->select('tenant_password');
            $this->db->from('tenant_tbl');
            
            $this->db->where('tenant_email=', $email);
            $this->db->where('tenant_password=', md5($password));
            $user=$this->db->get();
            $details=$user->result();
            
            if($details){

                if($newpw==$confpw){
                    if(strlen($newpw)>=6){
                        $data=array(
                            'tenant_password'=> md5($confpw),
                        );
                        $this->db->where('tenant_email=', $email);
                        $this->db->update('tenant_tbl', $data);
    
                    
                    $this->response([
                        'status' => 'Connected',
                        
                        'message' =>'API key verified' ,
                        'prompt'  => 'Change Password Successful!',
                        
                        
                        
                    ], REST_Controller::HTTP_OK);


                    }else if(strlen($newpw)<6){

                        $this->response([
                            'status' => 'Connected',
                            
                            'message' =>'API key verified' ,
                            'prompt'  => 'Please try again.Password must be atleast 6 characters.',
                            
                            
                            
                        ], REST_Controller::HTTP_OK);



                    }
                   
            }else{
                $this->response([
                    'status' => 'Connected',
                    
                    'message' =>'API key verified' ,
                    'prompt' => 'Change Password Failed. Please Try Again.',
                    
                    
                    
                ], REST_Controller::HTTP_OK);
            }

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




function usernew_post()
{
    
   // Get the post data


//check api key is correct

    //search data   
    $email=$this->input->post('email');
    $confpw=$this->input->post('confpw');
    $newpw=$this->input->post('newpw');
    // Check if any user exists with the given credentials
    $this->db->select('tenant_password');
    $this->db->from('tenant_tbl');
    
    $this->db->where('tenant_email=', $email);
    $user=$this->db->get();
    $details=$user->result();
    
    if($details){
        if($newpw==$confpw){
            $data=array(
                'tenant_password'=> md5($confpw),
                'tenant_new' => 0
            );
            $this->db->where('tenant_email=', $email);
            $this->db->update('tenant_tbl', $data);

        
        $this->response([
            'status' => 'Connected',
            
            'message' =>'API key verified' ,
            'prompt'  => 'Change Password Successful!',
            
            
            
        ], REST_Controller::HTTP_OK);
    }else{
        $this->response([
            'status' => 'Connected',
            
            'message' =>'API key verified' ,
            'prompt' => 'Change Password Failed. Please Try Again.',
            
            
            
        ], REST_Controller::HTTP_OK);
    }

    }else if($details==null){
        $this->response([
            'status' => 'Connected',
            'message' => 'Error: API key does not match'
            
        ], REST_Controller::HTTP_OK);

    }

    

}
}
