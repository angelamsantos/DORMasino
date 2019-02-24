<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class Requests_api extends REST_Controller {
       
        function getRequest_post()
        {
            
           // Get the post data
      
        
   //check api key is correct
        
            //search data   
            $email =$this->input->post('key');
            
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_email=',$email);
            $confirm=$this->db->get();
            $confirmdetails=$confirm->result();


            
            
// //select  from req_tbl 
// left join tenant_tbl on tenant_tbl.tenant_id=req_tbl.tenant_id

            
            if($confirmdetails){
                
               
                $this->db->select('req_tbl.*,tenant_tbl.*');
                $this->db->from('req_tbl');
                $this->db->join('tenant_tbl','tenant_tbl.tenant_id=req_tbl.tenant_id','left');
                $this->db->where('tenant_tbl.tenant_email=',$email);
                $this->db->order_by('req_date','DESC');
    
    
              
                $user=$this->db->get();
                
                $details=$user->result();


                // Set the response and exit
                $this->response([
                    'status' => 'Connected',
                    
                    'message' =>'API key verified' ,
                    'data'=>$details
                    
                    
                ], REST_Controller::HTTP_OK);

            }else if($confirmdetails==null){
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
    function sendRequest_post(){
        $email =$this->input->post('key');
        $reqtype=$this->input->post('reqtype');
        $notes=$this->input->post('notes');
            
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_email=',$email);
            $confirm=$this->db->get();
            $confirmdetails=$confirm->row();


            
            


            
            if($confirmdetails){
                
                $data = array(
                    'req_type'=>$reqtype,
                    'req_notes'=>$notes,
                    'req_status'=>0,
                    'tenant_id'=>$confirmdetails->tenant_id
                );
            
                $this->db->insert('req_tbl',$data);
                


                // Set the response and exit
                $this->response([
                    'status' => 'Connected',
                    
                    'message' =>'API key verified' ,
                    'status' => 'Request has been sent.'
                    
                    
                ], REST_Controller::HTTP_OK);

            }else if($confirmdetails==null){
                $this->response([
                    'status' => 'Connected',
                    'message' => 'Error: API key does not match',
                    'status' =>'Request has not been sent. Please try again.'
                    
                ], REST_Controller::HTTP_OK);

            }

            else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
    }
     function completeRequest_post(){
        
         $email=$this->input->post('key');
            $complete=$this->input->post('complete');
            // Check if any user exists with the given credentials
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->join('guardian_tbl','tenant_tbl.tenant_id=guardian_tbl.tenant_id', 'LEFT');
            $this->db->where('tenant_email=', $email);
            $user=$this->db->get();
            $details=$user->row();

            $id=$details->tenant_id;
            
             if($details){
                  $data=array(
                            'req_status'=> 3,
                        );
                        $this->db->where('req_id=', $complete);
                        $this->db->update('req_tbl', $data);
                        
                        
                        
                        $this->response([
                        'status' => 'Connected',
                        
                        'message' =>'API key verified' ,
                        'prompt'  => 'Task is completed!',
                        
                        
                        
                         ], REST_Controller::HTTP_OK);
                        
             }else if($details==null){
                $this->response([
                    'status' => 'Connected',
                    'message' => 'Error: API key does not match'
                    
                ], REST_Controller::HTTP_OK);

            }
            
            
        
    }
}
   