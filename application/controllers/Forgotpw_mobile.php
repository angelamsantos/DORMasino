<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpw_mobile extends CI_Controller{
    function sendemail($email, $password) {

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
    
        $htmlContent = '<h1>You have successfully reset your password!</h1>';
        $htmlContent .= '<p>Good Day! You have successfully reset your password. 
        Please try logging in with your new password:'.$password.'</p>';
        
    
        $this->email->to($to_email);
        $this->email->from('dormasino20182019@gmail.com','DORMasino');
        $this->email->subject('Password Has been reset');
        $this->email->message($htmlContent);
    
        //Send email
        if ($this->email->send()) {

            $this->session->set_userdata('email', $email);
            return true;
            
        } else {

            return false;
            
        }
    }


    public function sendpass() {

        $key= $this->uri->segment(3);

        if(!empty($key)){
        $this->db->select('tenant_email');
            $this->db->from('tenant_tbl');
            $this->db->where('tenant_key=', $key);
            $user=$this->db->get();
            $details=$user->result_array();

         

            if($details){
                $number = random_string('numeric', 6);
                $email= $details[0]['tenant_email'];
                $date=new DateTime();
                $key= md5($email.$date->format('Y-m-d:H:i:s'));
               
                $data=array(
                    'tenant_password'=> md5($number),
                    'tenant_key' =>$key,
                    'tenant_new' => 1

                );

                $this->db->where('tenant_email=', $email);
                $this->db->update('tenant_tbl', $data);

                $status=$this->sendemail($email, $number);
                echo "<script>window.close();</script>";
            }else{

                echo "Page load failed. Please refresh the page and try again.";
            }

        

        }

        
    }
}
?>