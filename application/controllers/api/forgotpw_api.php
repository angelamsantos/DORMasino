<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class Forgotpw_api extends REST_Controller {
       
     function sendemail($email, $key) {

            //Load email library
            $this->load->library('email');
        
            //SMTP & mail configuration
            $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'dormasino20182019@gmail.com',
                'smtp_pass' => 'dormasino123',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );
            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
        
            //Email content
        
            $to_email = $email; 
        
            $htmlContent = '<h1>DORMasino Mobile Forgot Password</h1>';
            $htmlContent .= '<p>Hi, Dormasino Tenant. Someone has recently tried to reset your DORMasino password. 
            click <a href="http://localhost/Dormasino/index.php/Forgotpw_mobile/sendpass/'.$key.'">here</a> to reset your password </p>';
            
        
            $this->email->to($to_email);
            $this->email->from('dormasino20182019@gmail.com','DORMasino');
            $this->email->subject('DORMasino Reset Password');
            $this->email->message($htmlContent);
        
            //Send email
            if ($this->email->send()) {
    
                $this->session->set_userdata('email', $email);
                return true;
                
            } else {
    
                return false;
                
            }
        }
       
        function requestpwchange_post()
        {
            
           // Get the post data
        $email =$this->input->post('email');
        
        
   
        if(!empty($email)){
            //search data
     
            // Check if any user exists with the given credentials
            $this->db->select('tenant_fname');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_email=', $email);
            $user=$this->db->get();
            $details=$user->result();

            
            
            if($details){
                // Set the response and exit
                // $this->response([
                //     'status' => 'Connected',
                //     'message' => 'User login successful.',
                //     'data'=> $details
                //     //add api key to be passed to others
                // ], REST_Controller::HTTP_OK);
                $date=new DateTime();
                $key= md5(md5($email.$date->format('Y-m-d:H:i:s')));
                $data=array(
                    'tenant_key'=> $key,
                );
                $this->db->where('tenant_email=', $email);
                $this->db->update('tenant_tbl', $data);




                   $mailstatus=$this->sendemail($email,$key);

                   
                   if($mailstatus){

                    $this->response([
                        'status' => 'Connected',
                        'message' => 'Email has been sent. Please check your email.'
                        //return api key
                    ], REST_Controller::HTTP_OK);
                    }else{
                        $this->response([
                            'status' => 'Connected',
                            'message' => 'Email has not been sent. Please Check your internet connection.'
                            //return api key
                        ], REST_Controller::HTTP_OK);
                    }



            }else if($details==null){
                $this->response([
                    'status' => 'Connected',
                    'message' => 'The email does not match any records. Please try again.'
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
                'message' => 'Please enter you email.'
                
            ], REST_Controller::HTTP_OK);
        }
    }
}



