<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions_model extends CI_Model {

	public function __construct()
    {		
        		parent::__construct();  
                $this->load->database();
				$this->load->library('session');
    }

    public function get_floor() {
    
        $query = $this->db->get('floor_tbl');
    // print_r($query);
        return $query;
    }

    public function get_room() {
        $this->db->from('room_tbl');
        $this->db->join('floor_tbl', 'room_tbl.floor_id=floor_tbl.floor_id');
        $query = $this->db->get();
        return $query;
    }
    public function get_dir () {
		$this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
        $this->db->join('contract_tbl','contract_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('guardian_tbl','guardian_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
    
		$query = $this->db->get();
		return $query;


    }


    public function get_water () {
        $SELECT = "SELECT water_id, water_current, water_tbl.tenant_id, dir_tbl.room_id
                    FROM water_tbl 
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = water_tbl.tenant_id
                    WHERE water_id 
                    IN (SELECT MAX(water_id) 
                    from water_tbl 
                    GROUP by room_id)";
        $query = $this->db->query($SELECT);
        return $query;
    }

    public function get_diruv($r_id) {

		$this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
        $this->db->join('floor_tbl','floor_tbl.floor_id=room_tbl.floor_id', 'LEFT');
        $this->db->join('guardian_tbl','guardian_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('mother_tbl','mother_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('father_tbl','father_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('contract_tbl','contract_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
    
		$this->db->where('dir_tbl.room_id',$r_id);
		$query = $this->db->get();
		return $query;


    }

    public function get_dircount() {
        $this->db->select("room_tbl.room_id");
        $this->db->select("room_tbl.room_number");
        $this->db->select("count(dir_tbl.tenant_id) as num_tenants");
        $this->db->from("room_tbl");
        $this->db->join("dir_tbl", "room_tbl.room_id=dir_tbl.room_id", "LEFT"); 
        $this->db->group_by("room_tbl.room_id");
        $query = $this->db->get();
        return $query;
    }

    public function get_unpaidwater() {
        $SELECT = "SELECT water_tbl.*, dir_tbl.*, room_tbl.*, tenant_tbl.*
                    FROM water_tbl
                    LEFT JOIN tenant_tbl
                    ON tenant_tbl.tenant_id = water_tbl.tenant_id
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = water_tbl.tenant_id
                    LEFT JOIN room_tbl
                    ON room_tbl.room_id = dir_tbl.room_id
                    WHERE water_tbl.water_status = 0";
        $query = $this->db->query($SELECT);
        return $query;
    } 
    
    public function get_unpaidrent() {
        $SELECT = "SELECT rent_tbl.*, dir_tbl.*, room_tbl.*, tenant_tbl.*
                    FROM rent_tbl
                    LEFT JOIN tenant_tbl
                    ON tenant_tbl.tenant_id = rent_tbl.tenant_id
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = rent_tbl.tenant_id
                    LEFT JOIN room_tbl
                    ON room_tbl.room_id = dir_tbl.room_id
                    WHERE rent_tbl.rent_status = 0";
        $query = $this->db->query($SELECT);
        return $query;
    }


    public function insert_bill() {
        foreach ($this->input->post('tenant_id') as $value) {
            $data = array(
                'rent_rate' => $this->input->post('rent_rate'),
                'rent_extra' => $this->input->post('rent_extra'),
                'rent_total' => $this->input->post('rent_total'),
                'rent_balance' => $this->input->post('rent_total'),
                'rent_status' => 0, //0 for unpaid and 1 for paid
                'rent_due' => $this->input->post('rent_due'),
                'tenant_id' => $value,
            );
            print_r($data);
            $this->db->insert('rent_tbl', $data);

            $data1 = array(
                'water_provider' => $this->input->post('water_provider'),
                'water_previous' => $this->input->post('water_previous'),
                'water_current' => $this->input->post('water_current'),
                'water_cm' => $this->input->post('water_cm'),
                'water_total' => $this->input->post('water_total'),
                'water_balance' => $this->input->post('water_total'),
                'water_status' => 0,
                'water_due' => $this->input->post('water_due'),
                'tenant_id' => $value,
            );
            $this->db->insert('water_tbl', $data1);
        }
    }

    public function amount_due($month, $tenant, $room) {
        $a = 0;
        $b = array() ;
        $c = array() ;
        foreach($month as $m) {

            $this->db->from('water_tbl');
            $this->db->join('dir_tbl','dir_tbl.tenant_id=water_tbl.tenant_id', 'LEFT');
            $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
            $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
            $this->db->where('water_tbl.water_due', $m);
            $this->db->where('water_tbl.tenant_id', $tenant);
            $query = $this->db->get();

            
            
            

            foreach ($query->result() as $row1) {
                    $total = $row1->water_balance;
                    $id = $row1->water_id;
                    $arr = $row1->water_balance;
            } 
            $a = $a + $total;
            array_push($b, $id);
            array_push($c, $arr);


        }
            // $tenant_id = $this->session->set_userdata('tenant_id', $row1->tenant_id);
            return array(
                'wt' => $a,
                'wi' => $b,
                'wa' => $c,
                );
    }

    public function rent_due($month, $tenant, $room) {
        $a = 0;
        $b = array() ;
        $c = array() ;
        foreach($month as $m) {

            $this->db->from('rent_tbl');
            $this->db->join('dir_tbl','dir_tbl.tenant_id=rent_tbl.tenant_id', 'LEFT');
            $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
            $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
            $this->db->where('rent_tbl.rent_due', $m);
            $this->db->where('rent_tbl.tenant_id', $tenant);
            $q = $this->db->get();

            $rent = 'Amount due';

        

                foreach ($q->result() as $r) {
                        $rent = $r->rent_balance ;
                        $rid = $r->rent_id;
                        $rarr = $r->rent_balance;
                }   

                $a = $a + $rent;
                array_push($b, $rid);
                array_push($c, $rarr);
        }

        return array(
            'rt' => $a,
            'ri' => $b,
            'ra' => $c,
            );
            //return json_encode($a);
    }

    public function rent_payment() {
            $tenant_id = $this->input->post('rtenant_id');

            $SELECT = "SELECT tenant_tbl.tenant_fname, tenant_tbl.tenant_lname, room_tbl.room_number, tenant_tbl.tenant_email
                FROM tenant_tbl
                LEFT JOIN dir_tbl
                ON tenant_tbl.tenant_id = dir_tbl.tenant_id
                LEFT JOIN room_tbl
                ON dir_tbl.room_id = room_tbl.room_id
                WHERE tenant_tbl.tenant_id = ".$tenant_id." ";
                $query = $this->db->query($SELECT);

                $row = $query->row();
            $data4 = array(
                'a' => $row->tenant_fname,
                'b' => $row->tenant_lname,
                'c' => $row->room_number,
                'd' => date("m/d/Y"),
                'e' => $this->input->post('rm'),
                'f' => $row->tenant_email,
            );
            $rent=$this->input->post('rent_id');
           
            $rStr = $rent[0];
            $rArr = explode(',', $rStr);
            
            if(count($rArr) == 1) {
                $paid = $this->input->post('rtrans_amount');
                $due = $this->input->post('rtrans_due');
                
                $full;

                if ($paid < $due) {
                    $full = 0;
                } else if ($paid == $due) {
                    $full = 1;
                }
                
                foreach($rArr as $rs) {
                    $data = array(
                        'rtrans_mode' => $this->input->post('rtrans_mode'),
                        'rtrans_rno' => $this->input->post('rtrans_rno'),
                        'rtrans_amount' => $this->input->post('rtrans_amount'),
                        
                        'rtrans_isfull' => $full,
                        'rent_id' => $rs,
                        'tenant_id' => $this->input->post('rtenant_id'),
                    );

                    $this->db->insert('rtrans_tbl', $data);
                    $check = $this->db->insert_id();
                    $rent=$this->input->post('rent_id');
                    
                    $data2 = array(
                        'rent_paid' => 1,
                    );

                    $bal;
                    if ($paid < $due) {
                        $bal = $due - $paid;
                        $this->db->set('rent_balance', $bal);
                        $this->db->where('rent_id', $rs);
                        $this->db->update('rent_tbl');
                    } else if ($paid == $due) {
                        $bal = $due - $paid;
                        $this->db->set('rent_balance', $bal);
                        $this->db->set('rent_status', 1);
                        $this->db->where('rent_id', $rs);
                        $this->db->update('rent_tbl');
                    }
                }
                $data2 = array(
                    'rent_paid' => $paid,
                    'rent_payment' => $full,
                );

                    if ($this->input->post('rtrans_mode') == 1) {
                        $data3 = array(
                            'rcheck_no' => $this->input->post('rcheck_no'),
                            'rcheck_bank' => $this->input->post('rcheck_bank'),
                            'rcheck_date' => $this->input->post('rcheck_date'),
                            'rtrans_id' => $check,
                        );
                        $this->db->insert('rcheck_tbl', $data3);
                        return $arr = array_merge($data, $data2, $data4, $data3);
                    }

                    
                return $arr = array_merge($data, $data2, $data4);
            } else if(count($rArr) > 1) {
                
                $paid = $this->input->post('rtrans_amount');
                // $due = $this->input->post('rtrans_due');
                // $full;

                // if ($paid < $due) {
                //     $full = 0;
                // } else if ($paid == $due) {
                //     $full = 1;
                // }
                foreach($rArr as $re) {
                    $data = array(
                        'rtrans_mode' => $this->input->post('rtrans_mode'),
                        'rtrans_rno' => $this->input->post('rtrans_rno'),
                        'rtrans_amount' => $this->input->post('rtrans_amount'),
                        'rtrans_isfull' => 1,
                        'rent_id' => $re,
                        'tenant_id' => $this->input->post('rtenant_id'),
                    );

                    $this->db->insert('rtrans_tbl', $data);
                    $check = $this->db->insert_id();
                    $due = $this->input->post('rtrans_due');
                    $bal;
                    $bal = $due - $due;
                    $this->db->set('rent_balance', $bal);
                    $this->db->set('rent_status', 1);
                    $this->db->where('rent_id', $re);
                    $this->db->update('rent_tbl');
                    

                    $data2 = array(
                        'rent_paid' => $paid,
                        'rent_payment' => 1,
                    );

                    if ($this->input->post('rtrans_mode') == 1) {
                        $data3 = array(
                            'rcheck_no' => $this->input->post('rcheck_no'),
                            'rcheck_bank' => $this->input->post('rcheck_bank'),
                            'rcheck_date' => $this->input->post('rcheck_date'),
                            'rtrans_id' => $check,
                        );
                        $this->db->insert('rcheck_tbl', $data3);
                        return $arr = array_merge($data, $data2, $data4, $data3);
                    }
                }
                    
                return $arr = array_merge($data, $data2, $data4);
            }
        
        

        
    }
    
    public function water_payment() {
        $tenant_id = $this->input->post('wtenant_id');

        $SELECT = "SELECT tenant_tbl.tenant_fname, tenant_tbl.tenant_lname, room_tbl.room_number, tenant_tbl.tenant_email
            FROM tenant_tbl
            LEFT JOIN dir_tbl
            ON tenant_tbl.tenant_id = dir_tbl.tenant_id
            LEFT JOIN room_tbl
            ON dir_tbl.room_id = room_tbl.room_id
            WHERE tenant_tbl.tenant_id = ".$tenant_id." ";
            $query = $this->db->query($SELECT);

            $row = $query->row();

        $data4 = array(
            'a' => $row->tenant_fname,
            'b' => $row->tenant_lname,
            'c' => $row->room_number,
            'd' => date("m/d/Y"),
            'e' => $this->input->post('payment'),
            'f' => $row->tenant_email,
        );
        $water=$this->input->post('water_id');
        $wStr = $water[0];
        $wArr = explode(',', $wStr);
        
        
        if(count($wArr) == 1) {
            $paid = $this->input->post('wtrans_amount');
            $due = $this->input->post('wtrans_due');
            $full;
            

            if ($paid < $due) {
                $full = 0;
            }
            if ($paid == $due) {
                $full = 1;
            }
            foreach($wArr as $ws) {
                $data = array(
                    'wtrans_mode' => $this->input->post('wtrans_mode'),
                    'wtrans_rno' => $this->input->post('wtrans_rno'),
                    'wtrans_amount' => $this->input->post('wtrans_amount'),
                    'wtrans_isfull' => $full,
                    'water_id' => $ws, 
                    'tenant_id' => $this->input->post('wtenant_id'),
                );
                $this->db->insert('wtrans_tbl', $data);

        

                $bal;
                if ($paid < $due) {
                    $bal = $due - $paid;
                    $this->db->set('water_balance', $bal);
                    $this->db->where('water_id', $ws);
                    $this->db->update('water_tbl');
                } else if ($paid == $due) {
                    $bal = $due - $paid;
                    $this->db->set('water_balance', $bal);
                    $this->db->set('water_status', 1);
                    $this->db->where('water_id', $ws);
                    $this->db->update('water_tbl');
                }
            }

            $data2 = array(
                'water_paid' => $paid,
                'water_payment' => $full,
            );
                // $this->db->set('water_status', 1);
                // $this->db->where('water_id', $water);
                // $this->db->update('water_tbl');


            $check = $this->db->insert_id();
            if ($this->input->post('wtrans_mode') == 1) {
                
                $data3 = array(
                    'wcheck_no' => $this->input->post('wcheck_no'),
                    'wcheck_bank' => $this->input->post('wcheck_bank'),
                    'wcheck_date' => $this->input->post('wcheck_date'),
                    'wtrans_id' => $check,
                );
                $this->db->insert('wcheck_tbl', $data3);
                return $arr = array_merge($data, $data2, $data4, $data3);
            }

            
            return $arr = array_merge($data, $data2, $data4);
        } else if(count($wArr) > 1) {
            $paid = $this->input->post('wtrans_amount');
            $due = $this->input->post('wtrans_due');
            
            foreach($wArr as $wa) {

                $data = array(
                    'wtrans_mode' => $this->input->post('wtrans_mode'),
                    'wtrans_rno' => $this->input->post('wtrans_rno'),
                    'wtrans_amount' => $this->input->post('wtrans_amount'),
                    'wtrans_isfull' => 1,
                    'water_id' => $wa,
                    'tenant_id' => $this->input->post('wtenant_id'),
                );
                $this->db->insert('wtrans_tbl', $data);

            

                $bal;
                    $bal = $due - $due;
                    $this->db->set('water_balance', $bal);
                    $this->db->set('water_status', 1);
                    $this->db->where('water_id', $wa);
                    $this->db->update('water_tbl');
            }

                $data2 = array(
                    'water_paid' => $paid,
                    'water_payment' => 1,
                );
                // $this->db->set('water_status', 1);
                // $this->db->where('water_id', $water);
                // $this->db->update('water_tbl');


                $check = $this->db->insert_id();
                if ($this->input->post('wtrans_mode') == 1) {
                    
                    $data3 = array(
                        'wcheck_no' => $this->input->post('wcheck_no'),
                        'wcheck_bank' => $this->input->post('wcheck_bank'),
                        'wcheck_date' => $this->input->post('wcheck_date'),
                        'wtrans_id' => $check,
                    );
                    $this->db->insert('wcheck_tbl', $data3);
                    return $arr = array_merge($data, $data2, $data4, $data3);
                }

            
            return $arr = array_merge($data, $data2, $data4);
        }
       
        
        
    }
    public function get_rtrans () {
		$this->db->from('rtrans_tbl');
		$this->db->join('rent_tbl','rent_tbl.rent_id=rtrans_tbl.rent_id', 'LEFT');
        $this->db->join('rcheck_tbl','rcheck_tbl.rtrans_id=rtrans_tbl.rtrans_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=rtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=rtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
    
		$query = $this->db->get();
		return $query;


    }
    public function get_wtrans () {
		$this->db->from('wtrans_tbl');
		$this->db->join('water_tbl','water_tbl.water_id=wtrans_tbl.water_id', 'LEFT');
        $this->db->join('wcheck_tbl','wcheck_tbl.wtrans_id=wtrans_tbl.wtrans_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=wtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=wtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
    
		$query = $this->db->get();
		return $query;


    }

    public function send_mail_rent($to_email, $to_guardianemail) {

        //Load email library
        $this->load->library('email');
        $data = $this->rent_payment();
        //SMTP & mail configuration
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = 465;
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'dormasino20182019@gmail.com';
        $config['smtp_pass']    = 'dormasino123';
        $config['charset']    = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;


        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
    
        //Email content
    
        //$to_email = $data['f']; 
    
        $htmlContent = $this->load->view('rent_receipt', $data, TRUE);
        //$htmlContent = '<h1>DORMasino E-Receipt (Rent)</h1>';

        $this->email->to($to_email);
        $this->email->to($to_guardianemail);
        $list = array($to_email, $to_guardianemail);
        $this->email->to($list);
        $this->email->from('dormasino20182019@gmail.com','DORMasino');
        $this->email->subject('DORMasino E-Receipt (Rent)');
        $this->email->message($htmlContent);

        if ($this->email->send()) {
        //Success email Sent
            return true;
        } else {
        //Email Failed To Send
            return false;
        }
    }

    public function send_mail_water($to_email, $to_guardianemail) {

        //Load email library
        $this->load->library('email');
        $data = $this->water_payment();
        //SMTP & mail configuration
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = 465;
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'dormasino20182019@gmail.com';
        $config['smtp_pass']    = 'dormasino123';
        $config['charset']    = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;


        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
    
        //$to_email = $data['f']; 
    
        $htmlContent = $this->load->view('water_receipt', $data, TRUE);
        //$htmlContent = '<h1>DORMasino E-Receipt (Rent)</h1>';

        $this->email->to($to_email);
        $this->email->to($to_guardianemail);
        $list = array($to_email, $to_guardianemail);
        $this->email->to($list);
        $this->email->from('dormasino20182019@gmail.com','DORMasino');
        $this->email->subject('DORMasino E-Receipt (Water)');
        $this->email->message($htmlContent);

        if ($this->email->send()) {
        //Success email Sent
            return true;
        } else {
        //Email Failed To Send
            return false;
        }
    }

}
?>
