<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class  Bills_api extends REST_Controller {
       
        function bill_post()
        {
            
           // Get the post data
      
        
   //check api key is correct
        
            //search data   
            $email=$this->input->post('email');
            $query=$this->input->post('sort');
            // Check if any user exists with the given credentials
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->join('guardian_tbl','tenant_tbl.tenant_id=guardian_tbl.tenant_id', 'LEFT');
            $this->db->where('tenant_email=', $email);
            $user=$this->db->get();
            $details=$user->result();



            // select water_tbl.*, dir_tbl.*, tenant_tbl.tenant_email,room_tbl.room_tcount from dir_tbl
            //  LEFT JOIN water_tbl on water_tbl.room_id=dir_tbl.room_id 
            //  LEFT JOIN room_tbl on room_tbl.room_id=water_tbl.room_id

            //  left join tenant_tbl on dir_tbl.tenant_id=tenant_tbl.tenant_id 
            //  WHERE tenant_tbl.tenant_email="delacruz.arvin04@gmail.com" 
            //  AND water_tbl.water_status=1
            
            if($details){

                if($query=="wp"){
                    $this->db->select('water_tbl.*, dir_tbl.*, tenant_tbl.tenant_email,room_tbl.room_tcount');
                    $this->db->from('dir_tbl');
                    $this->db->join('water_tbl','water_tbl.room_id=dir_tbl.room_id','LEFT');
                    $this->db->join('room_tbl','room_tbl.room_id=water_tbl.room_id','LEFT');
                    $this->db->join('tenant_tbl','dir_tbl.tenant_id=tenant_tbl.tenant_id','LEFT');
                    $this->db->where('tenant_tbl.tenant_email=', $email);
                    $this->db->where('water_tbl.water_status=', 1);
                    $bills=$this->db->get();
                    $data=$bills->result();
                }else if($query=="wu"){ 
                $this->db->select('water_tbl.*, dir_tbl.*, tenant_tbl.tenant_email,room_tbl.room_tcount');
                $this->db->from('dir_tbl');
                $this->db->join('water_tbl','water_tbl.room_id=dir_tbl.room_id','LEFT');
                $this->db->join('room_tbl','room_tbl.room_id=water_tbl.room_id','LEFT');
                $this->db->join('tenant_tbl','dir_tbl.tenant_id=tenant_tbl.tenant_id','LEFT');
                $this->db->where('tenant_tbl.tenant_email=', $email);
                $this->db->where('water_tbl.water_status=', 0);
                $bills=$this->db->get();
                $data=$bills->result();
                }
                    
               




                // Set the response and exit
                $this->response([
                    'status' => 'Connected',
                    
                    'message' =>'API key verified' ,
                    'data'=>$data
                    
                    
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
