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
            $email=$this->input->post('key');
            $query=$this->input->post('sort');
            // Check if any user exists with the given credentials
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->join('guardian_tbl','tenant_tbl.tenant_id=guardian_tbl.tenant_id', 'LEFT');
            $this->db->where('tenant_email=', $email);
            $user=$this->db->get();
            $details=$user->row();

            $id=$details->tenant_id;

            // select water_tbl.*, dir_tbl.*, tenant_tbl.tenant_email,room_tbl.room_tcount from dir_tbl
            //  LEFT JOIN water_tbl on water_tbl.room_id=dir_tbl.room_id 
            //  LEFT JOIN room_tbl on room_tbl.room_id=water_tbl.room_id

            //  left join tenant_tbl on dir_tbl.tenant_id=tenant_tbl.tenant_id 
            //  WHERE tenant_tbl.tenant_email="delacruz.arvin04@gmail.com" 
            //  AND water_tbl.water_status=1
            
            if($details){

                if($query=="wp"){
                    $this->db->select('water_tbl.*, tenant_tbl.*');
                    $this->db->from('water_tbl');
                    $this->db->join('tenant_tbl','water_tbl.tenant_id=tenant_tbl.tenant_id','LEFT');
                    $this->db->where('tenant_tbl.tenant_id=', $details->tenant_id);
                    $this->db->where('water_tbl.water_status=', 1);
                    $this->db->order_by('water_due','DESC');

                    $bills=$this->db->get();
                    $data=$bills->result();
                }else if($query=="wu"){ 
                    $this->db->select('water_tbl.*, tenant_tbl.*');
                    $this->db->from('water_tbl');
                    $this->db->join('tenant_tbl','water_tbl.tenant_id=tenant_tbl.tenant_id','LEFT');
                    $this->db->where('tenant_tbl.tenant_id=', $details->tenant_id);
                    $this->db->where('water_tbl.water_status=', 0);
                    $this->db->order_by('water_due','DESC');
                $bills=$this->db->get();
                $data=$bills->result();
                }else if($query=="ru"){
                    $this->db->select('rent_tbl.*, tenant_tbl.*');
                    $this->db->from('rent_tbl');
                    $this->db->join('tenant_tbl','rent_tbl.tenant_id=tenant_tbl.tenant_id','LEFT');
                    $this->db->where('tenant_tbl.tenant_id=', $details->tenant_id);
                    $this->db->where('rent_tbl.rent_status=', 0);
                    $this->db->order_by('rent_due','DESC');
                $bills=$this->db->get();
                $data=$bills->result();

                }else if($query=="rp"){
                    $this->db->select('rent_tbl.*, tenant_tbl.*');
                    $this->db->from('rent_tbl');
                    $this->db->join('tenant_tbl','rent_tbl.tenant_id=tenant_tbl.tenant_id','LEFT');
                    $this->db->where('tenant_tbl.tenant_id=', $details->tenant_id);
                    $this->db->where('rent_tbl.rent_status=', 1);
                    $this->db->order_by('rent_due','DESC');
                $bills=$this->db->get();
                $data=$bills->result();

                }else if($query=="rwu"){
                    $search="SELECT water_tbl.water_id, water_tbl.water_total, water_tbl.water_due,water_tbl.water_status,'water' as type,(@cnt := @cnt + 1) AS rowNumber from water_tbl left join tenant_tbl on water_tbl.tenant_id=tenant_tbl.tenant_id where tenant_tbl.tenant_id=? AND water_tbl.water_status=0 UNION 
                    SELECT rent_tbl.rent_id,rent_tbl.rent_total,rent_tbl.rent_due,rent_tbl.rent_status,'rent' as type, (@cnt := @cnt + 1) AS rowNumbers from rent_tbl left join tenant_tbl on rent_tbl.tenant_id=tenant_tbl.tenant_id where tenant_tbl.tenant_id=? AND rent_tbl.rent_status=0 ORDER by water_due";
                   
                    $data=$this->db->query($search, array($id,$id))->result();
                    }else if($query=="rwp"){
                        $search="SELECT water_tbl.water_id, water_tbl.water_total, water_tbl.water_due,water_tbl.water_status,'water' as type,(@cnt := @cnt + 1) AS rowNumber from water_tbl left join tenant_tbl on water_tbl.tenant_id=tenant_tbl.tenant_id where tenant_tbl.tenant_id=? AND water_tbl.water_status=1 UNION 
                        SELECT rent_tbl.rent_id,rent_tbl.rent_total,rent_tbl.rent_due,rent_tbl.rent_status,'rent' as type, (@cnt := @cnt + 1) AS rowNumbers from rent_tbl left join tenant_tbl on rent_tbl.tenant_id=tenant_tbl.tenant_id where tenant_tbl.tenant_id=? AND rent_tbl.rent_status=1 ORDER by water_due";
                   
                    $data=$this->db->query($search, array($id,$id))->result();


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
