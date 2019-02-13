<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class Announce_api extends REST_Controller {
       
        function announce_post()
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

            // Check if any user exists with the given credentials
            $this->db->select('ann_tbl.*, admin_tbl.admin_fname, admin_tbl.admin_lname, annfile_tbl.annfile_id ,annfile_tbl.annfile_path, annfile_tbl.annfile_type ');
            $this->db->from('ann_tbl');
            $this->db->order_by('date_posted', 'desc');
            $this->db->join('annfile_tbl','ann_tbl.ann_id=annfile_tbl.ann_id', 'LEFT');
		    $this->db->join('admin_tbl','admin_tbl.admin_id=ann_tbl.admin_id', 'LEFT');
            
            $user=$this->db->get();
            
            $details=$user->result();
            
            
            
            
            if($confirmdetails){
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
    function specific_post()
    {
        
       // Get the post data
  
       $email =$this->input->post('key');
            
       $this->db->select('*');
       $this->db->from('tenant_tbl');
       $this->db->where('tenant_email=',$email);
       $confirm=$this->db->get();
       $confirmdetails=$confirm->result();
//check api key is correct
    
        //search data   
        $annid =$this->input->post('id');
        
        

        // Check if any user exists with the given credentials
        $this->db->select('ann_tbl.*, admin_tbl.admin_fname, admin_tbl.admin_lname, annfile_tbl.annfile_id ,annfile_tbl.annfile_path, annfile_tbl.annfile_type ');
        $this->db->from('ann_tbl');
        $this->db->where('ann_tbl.ann_id=', $annid);
        $this->db->join('annfile_tbl','ann_tbl.ann_id=annfile_tbl.ann_id', 'LEFT');
        $this->db->join('admin_tbl','admin_tbl.admin_id=ann_tbl.admin_id', 'LEFT');
        
        
        $user=$this->db->get();
        
        $details=$user->result();
        
        
        
        
        if($confirmdetails){
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
