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
            $sort=$this->input->post('sort');
            $this->db->select('*');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_email=',$email);

            $confirm=$this->db->get();
            $confirmdetails=$confirm->row();


            
            
            
            
            
            if($confirmdetails){
                if($sort=="inbox"){
                $this->db->select('send_tbl.*,tenant_tbl.tenant_email,tenant_tbl.tenant_fname,admin_tbl.admin_id,tenant_tbl.tenant_lname, admin_tbl.admin_email, admin_tbl.admin_fname,admin_tbl.admin_lname,msg_tbl.*');
                $this->db->from('send_tbl ');   
                $this->db->join('tenant_tbl','send_tbl.tenant_id=tenant_tbl.tenant_id','left');
                $this->db->join('admin_tbl','admin_tbl.admin_id=send_tbl.admin_id','left');
                $this->db->join('msg_tbl','send_tbl.msg_id=msg_tbl.msg_id ','left');
                $this->db->where('tenant_tbl.tenant_email=',$email);
                $this->db->where('send_tbl.send_type=',1);
                
                $this->db->order_by('msg_date','DESC');
                $user=$this->db->get();
                
                $details=$user->result();
                }else if($sort=="sent"){
                    $this->db->select('send_tbl.*,tenant_tbl.tenant_email,tenant_tbl.tenant_fname,tenant_tbl.tenant_lname, admin_tbl.admin_email,admin_tbl.admin_id, admin_tbl.admin_fname,admin_tbl.admin_lname,msg_tbl.*');
                    $this->db->from('send_tbl ');   
                    $this->db->join('tenant_tbl','send_tbl.tenant_id=tenant_tbl.tenant_id','left');
                    $this->db->join('admin_tbl','admin_tbl.admin_id=send_tbl.admin_id','left');
                    $this->db->join('msg_tbl','send_tbl.msg_id=msg_tbl.msg_id ','left');
                    $this->db->where('tenant_tbl.tenant_email=',$email);
                    $this->db->where('send_tbl.send_type=',0); 
                    $this->db->order_by('msg_date','DESC'); 
                    $user=$this->db->get();
                
                    $details=$user->result();
                }
                
              
               

               
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
    function sendMessage_post(){
        $email =$this->input->post('key');
        $subject=$this->input->post('subject');
        $notes=$this->input->post('notes');
        $to=$this->input->post('to');
        $broadcast=$this->input->post('broadcast');
        $this->db->select('*');
        $this->db->from('tenant_tbl');
        $this->db->where('tenant_email=',$email);

        $confirm=$this->db->get();
        $confirmdetails=$confirm->row();

            if($confirmdetails){

                if(!empty($subject)&&!empty($notes)){
                    if($broadcast=='false'){
                        $data = array(
                            'msg_subject'=>$subject,
                            'msg_body'=>$notes,
                            'msg_status'=>0,
                        );
                        
                    
                        $this->db->insert('msg_tbl',$data);
                       
                        $msg_id = $this->db->insert_id();
                        $data2=array(
                        'send_type'=>0,
                        'send_status'=>0,
                        'send_archive'=>0,
                        'msg_id'=>$msg_id,
                        'admin_id'=>$to,
                        'tenant_id'=>intval($confirmdetails->tenant_id),
                        );
                        $this->db->insert('send_tbl',$data2);
                        
                    $this->response([
                        'status' => 'Connected',
                        
                        'message' =>'API key verified' ,
                        'response'=>'Message has been sent.'
                        
                        
                    ], REST_Controller::HTTP_OK);
                    
                    }else if($broadcast==true){
                        $data = array(
                            'msg_subject'=>$subject,
                            'msg_body'=>$notes,
                            'msg_status'=>0,
                        );
                        $this->db->insert('msg_tbl',$data);
                    
                        $msg_id = $this->db->insert_id();
                        $this->db->select('*');
                        $this->db->from('admin_tbl');
                        $msgid=$this->db->get();
                        $result=$msgid->result();
                        foreach($result as $row){
                            $data=array(
                                'send_type'=>0,
                                'send_status'=>0,
                                'send_archive'=>0,
                                'msg_id'=>$msg_id,
                                'admin_id'=>$row->admin_id,
                                'tenant_id'=>intval($confirmdetails->tenant_id),
                                );
                                $this->db->insert('send_tbl',$data);

                        }

                         $this->response([
                        'status' => 'Connected',
                        
                        'message' =>'API key verified' ,
                        'response'=>'Message has been sent.'
                        
                        
                    ], REST_Controller::HTTP_OK);



                    }
                   



                }else{
                    $this->response([
                        'status' => 'Connected',
                        
                        'message' =>'API key verified' ,
                        'response'=>'Message has not been sent. Please try again.'
                        
                        
                    ], REST_Controller::HTTP_OK);
                }
               
            
            
            
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
 