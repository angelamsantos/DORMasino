<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class Messages_api extends REST_Controller {
       
        function getMessage_post()
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


            
            
            
            
            
            if($confirmdetails){
                
                $this->db->select('send_tbl.send_id,send_tbl.send_type,tenant_tbl.tenant_email,tenant_tbl.tenant_fname,tenant_tbl.tenant_lname, admin_tbl.admin_email, admin_tbl.admin_fname,admin_tbl.admin_lname,msg_tbl.*');
                $this->db->from('send_tbl ');
                $this->db->join('tenant_tbl','send_tbl.tenant_id=tenant_tbl.tenant_id','left');
                $this->db->join('admin_tbl','admin_tbl.admin_id=send_tbl.admin_id','left');
                $this->db->join('msg_tbl','send_tbl.msg_id=msg_tbl.msg_id ','left');
                $this->db->where('tenant_tbl.tenant_email=',$email);
                
                $this->db->order_by('msg_date','DESC');
    
    
              
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
}
   