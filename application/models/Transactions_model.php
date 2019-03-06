<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
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
        $SELECT = "SELECT water_id, water_current, water_due, room_id, isNew, water_previous, water_timestamp
                FROM water_tbl 
                WHERE water_id 
                IN (SELECT MAX(water_id) 
                from water_tbl 
                GROUP by room_id ORDER by room_id ASC)";
        $query = $this->db->query($SELECT);
        return $query;
    }

    public function edit_water() {
        $val = $this->input->post('wsetting_value');
        $this->db->set('wsetting_value', $val);
        $this->db->where('wsetting_name', 'cm');
        $this->db->update('wsetting_tbl');
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
        $this->db->select("room_tbl.room_extra");
        $this->db->select("count(dir_tbl.tenant_id) as num_tenants");
        $this->db->from("room_tbl");
        $this->db->join("dir_tbl", "room_tbl.room_id=dir_tbl.room_id", "LEFT"); 
        $this->db->group_by("room_tbl.room_id");
        $query = $this->db->get();
        return $query;
    }

    public function get_roomtype() {
        $SELECT2 = "SELECT room_tbl.room_id, room_tbl.room_number, room_tbl.room_extra, dir_tbl.dir_id, count(dir_tbl.tenant_id) as num_tenants, tenant_tbl.type_id, type_tbl.type_id, type_tbl.type_name
                    from room_tbl
                    LEFT JOIN dir_tbl
                    on room_tbl.room_id=dir_tbl.room_id
                    LEFT JOIN tenant_tbl
                    on dir_tbl.dir_id=tenant_tbl.tenant_id
                    LEFT JOIN type_tbl
                    on tenant_tbl.type_id=type_tbl.type_id
                    GROUP BY room_tbl.room_id
                    ";
            $query2 = $this->db->query($SELECT2);
            return $query2;
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

    public function get_unpaiddepo() {
        $SELECT = "SELECT deposit_tbl.*, dir_tbl.*, room_tbl.*, tenant_tbl.*
                    FROM deposit_tbl
                    LEFT JOIN tenant_tbl
                    ON tenant_tbl.tenant_id = deposit_tbl.tenant_id
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = deposit_tbl.tenant_id
                    LEFT JOIN room_tbl
                    ON room_tbl.room_id = dir_tbl.room_id
                    WHERE deposit_tbl.deposit_status = 0";
        $query = $this->db->query($SELECT);
        return $query;
    }

    public function get_unpaidadv() {
        $SELECT = "SELECT advance_tbl.*, dir_tbl.*, room_tbl.*, tenant_tbl.*
                    FROM advance_tbl
                    LEFT JOIN tenant_tbl
                    ON tenant_tbl.tenant_id = advance_tbl.tenant_id
                    LEFT JOIN dir_tbl
                    ON dir_tbl.tenant_id = advance_tbl.tenant_id
                    LEFT JOIN room_tbl
                    ON room_tbl.room_id = dir_tbl.room_id
                    WHERE advance_tbl.advance_status = 0";
        $query = $this->db->query($SELECT);
        return $query;
    }

    public function get_fee() {
        $query = $this->db->get('fee_tbl');
        return $query;
    }

    public function get_cm() {
        $query = $this->db->get('wsetting_tbl');
        return $query;
    }


    public function insert_bill() {
        foreach ($this->input->post('tenant_id') as $value) {
            

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
                'room_id' => $this->input->post('room_id'),
                'isNew' => $this->input->post('isNew'),
            );
            $this->db->insert('water_tbl', $data1);
        }
    }

    public function edit_bill() {
        foreach ($this->input->post('etenant_id') as $value) {

            $data1 = array(
                'water_provider' => $this->input->post('ewater_provider'),
                'water_previous' => $this->input->post('ewater_previous'),
                'water_current' => $this->input->post('ewater_current'),
                'water_cm' => $this->input->post('ewater_cm'),
                'water_total' => $this->input->post('ewater_total'),
                'water_balance' => $this->input->post('ewater_total'),
                'water_due' => $this->input->post('ewater_due'),
            );
            $this->db->where('tenant_id', $value);
            $this->db->update('water_tbl', $data1);
        }
    }

    public function insert_rent() {
        $SELECT2 = "SELECT room_tbl.*, dir_tbl.dir_id, count(dir_tbl.tenant_id) as num_tenants, tenant_tbl.type_id, type_tbl.type_id, type_tbl.type_name, type_tbl.type_rate
                    from room_tbl
                    LEFT JOIN dir_tbl
                    on room_tbl.room_id=dir_tbl.room_id
                    LEFT JOIN tenant_tbl
                    on dir_tbl.dir_id=tenant_tbl.tenant_id
                    LEFT JOIN type_tbl
                    on tenant_tbl.type_id=type_tbl.type_id
                    where tenant_tbl.tenant_status = 1
                    GROUP BY room_tbl.room_id
                    ";
        $query2 = $this->db->query($SELECT2);
        foreach($query2->result() as $room) {
            if($room->room_status == 1 && $room->num_tenants != 0) {
              
                    $rid = $room->room_id;
                    $price=$room->room_price;
                    $extra=$room->room_extra;
                    $capacity=$room->room_tcount;
                    $actual = $room->num_tenants;
                    $total = 0;
                    $te;
                    $pt;
                    if($capacity >= $actual){
                        $total = $price;
                    } else if ($actual > $capacity) {
                        $te = $actual - $capacity;
                        $ec = $te * $extra;
                        $total = $price + $ec;
                    }

                    if($room->type_id == 1) {
                        if($actual > $capacity) {
                            $pt = ($total + $room->type_rate)/ $actual;
                        } else if ($capacity >= $actual) {
                            $pt = ($total + $room->type_rate) / $capacity;
                        }
                        
                    } else if ($room->type_id == 2) {
                        $pt = $total / $actual;
                    }
                    $rd = date('Y-m-d', strtotime('first day of next month'));
                    $SELECT = "SELECT dir_tbl.tenant_id, contract_tbl.contract_start, tenant_tbl.tenant_status
                        from dir_tbl
                        left join contract_tbl
                        on dir_tbl.tenant_id = contract_tbl.tenant_id
                        left join tenant_tbl 
                        on dir_tbl.tenant_id =  tenant_tbl.tenant_id
                        where room_id = ".$rid." && tenant_tbl.tenant_status = 1";
                    $query = $this->db->query($SELECT);
                    foreach($query->result() as $tenant) {
                        
                            $data = array(
                                'rent_rate' => $price,
                                'rent_extra' => $extra,
                                'rent_total' => $pt,
                                'rent_balance' => $pt,
                                'rent_status' => 0, //0 for unpaid and 1 for paid
                                'rent_due' => date('Y-m-d', strtotime('first day of next month')),
                                'tenant_id' => $tenant->tenant_id,
                            );
                            //print_r($data);
                            //echo '\n';
                            $this->db->insert('rent_tbl', $data);
                        
                    }
                
            }
        }
    }

    public function latest_rent() {
        $SELECT = "SELECT max(rent_due) as rent_due
                    from rent_tbl
                    group by rent_due";
                $query = $this->db->query($SELECT);
                return $query;
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

    public function fee_due($fee, $tenant, $room) {
        $a = 0;
        $b = array() ;
        $c = array() ;
        $bal;
        foreach($fee as $f) {
            if($f == 1) {
                $this->db->from('advance_tbl');
                $this->db->join('dir_tbl','dir_tbl.tenant_id=advance_tbl.tenant_id', 'LEFT');
                $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
                $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
               // $this->db->where('advance_tbl.advance_status', 0);
                $this->db->where('advance_tbl.tenant_id', $tenant);
                $q = $this->db->get();

                foreach ($q->result() as $adv) { 
                    $fad = $adv->advance_balance;
                    $fid = $adv->advance_id;
                    $farr = $adv->advance_balance;
                }   

                $a = $a + $fad;
                array_push($b, $fid);
                array_push($c, $farr);
            }

            else if($f == 2) {
                $this->db->from('deposit_tbl');
                $this->db->join('dir_tbl','dir_tbl.tenant_id=deposit_tbl.tenant_id', 'LEFT');
                $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
                $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
               // $this->db->where('deposit_tbl.deposit_status', 0);
                $this->db->where('deposit_tbl.tenant_id', $tenant);
                $q = $this->db->get();

                foreach ($q->result() as $d) { 
                    $fad = $d->deposit_balance ;
                    $fid = $d->deposit_id;
                    $farr = $d->deposit_balance;
                }   

                $a = $a + $fad;
                array_push($b, $fid);
                array_push($c, $farr);
            }
        }

        return array(
            'ft' => $a,
            'fi' => $b,
            'fa' => $c,
            );
            //return json_encode($a);
    }

    public function rent_payment() {
            $tenant_id = $this->input->post('rtenant_id');
            $paid = $this->input->post('rtrans_amount');
            $due = $this->input->post('rtrans_due');
            $SELECT = "SELECT tenant_tbl.tenant_fname, tenant_tbl.tenant_lname, room_tbl.room_number, tenant_tbl.tenant_email
                FROM tenant_tbl
                LEFT JOIN dir_tbl
                ON tenant_tbl.tenant_id = dir_tbl.tenant_id
                LEFT JOIN room_tbl
                ON dir_tbl.room_id = room_tbl.room_id
                WHERE tenant_tbl.tenant_id = ".$tenant_id." ";
                $query = $this->db->query($SELECT);

                $row = $query->row();
            $g;
            if ($paid < $due) {
                $g = $paid;
            } else if ($paid >= $due) {
                $g = $due;
            }

            $data4 = array(
                'a' => $row->tenant_fname,
                'b' => $row->tenant_lname,
                'c' => $row->room_number,
                'd' => date("m/d/Y"),
                'e' => $this->input->post('rm'),
                'f' => $row->tenant_email,
                'g' => $g,
            );
            $rent=$this->input->post('rent_id');
           
            $rStr = $rent[0];
            $rArr = explode(',', $rStr);
            
            if(count($rArr) == 1) {
               
                
                $full;

                if ($paid < $due) {
                    $full = 0;
                } else if ($paid >= $due) {
                    $full = 1;
                }
                
                foreach($rArr as $rs) {
                    $data = array(
                        'rtrans_mode' => $this->input->post('rtrans_mode'),
                        'rtrans_rno' => $this->input->post('rtrans_rno'),
                        'rtrans_amount' => $g,
                        
                        'rtrans_isfull' => $full,
                        'rent_id' => $rs,
                        'tenant_id' => $this->input->post('rtenant_id'),
                        'room_id' => $this->input->post('rr'),
                    );

                    $this->db->insert('rtrans_tbl', $data);
                    $check = $this->db->insert_id();
                   // $rent=$this->input->post('rent_id');
                    

                    $bal;
                    if ($paid < $due) {
                        $bal = $due - $paid;
                        $this->db->set('rent_balance', $bal);
                        $this->db->where('rent_id', $rs);
                        $this->db->update('rent_tbl');
                    } else if ($paid >= $due) {
                        $bal = $due - $paid;
                        $this->db->set('rent_balance', $bal);
                        $this->db->set('rent_status', 1);
                        $this->db->where('rent_id', $rs);
                        $this->db->update('rent_tbl');
                    }
                }
                    
                        $data2 = array(
                            'rent_paid' => $due,
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
                $month = $this->input->post('rm');
                $mStr = $month[0];
                $mArr = explode(',', $mStr);
                $paid = $this->input->post('rtrans_amount');
                $due = $this->input->post('rtrans_due');
                $wscheme = array();
                $transArr = array();
               
                foreach($rArr as $re) {
                    $SELECT = "SELECT rent_tbl.*
                    FROM rent_tbl
                    WHERE rent_tbl.rent_id = ".$re." ";
                    $query = $this->db->query($SELECT);
                    $f;
                    $row = $query->row();
                    $rbal = $row->rent_balance;
                    $mo = $row->rent_due;
                    $wmo = date('F', strtotime($mo));
                    $bal;
                    $check;
                    if($paid >= $rbal) {
                        $data = array(
                            'rtrans_mode' => $this->input->post('rtrans_mode'),
                            'rtrans_rno' => $this->input->post('rtrans_rno'),
                            'rtrans_amount' => $rbal,
                            'rtrans_isfull' => 1,
                            'rent_id' => $re,
                            'tenant_id' => $this->input->post('rtenant_id'),
                            'room_id' => $this->input->post('rr'),
                        );

                        $this->db->insert('rtrans_tbl', $data);

                        $check = $this->db->insert_id();
                      
                        
                        $bal = $due - $due;
                        $this->db->set('rent_balance', $bal);
                        $this->db->set('rent_status', 1);
                        $this->db->where('rent_id', $re);
                        $this->db->update('rent_tbl');
                        

                        // $data2 = array(
                        //     'rent_paid' => $paid,
                        //     'rent_payment' => 1,
                        // );
                        $f = 1;
                    } else  if ($paid < $rbal && $paid > 0){
                        $data = array(
                            'rtrans_mode' => $this->input->post('rtrans_mode'),
                            'rtrans_rno' => $this->input->post('rtrans_rno'),
                            'rtrans_amount' => $paid,
                            'rtrans_isfull' => 0,
                            'rent_id' => $re,
                            'tenant_id' => $this->input->post('rtenant_id'),
                            'room_id' => $this->input->post('rr'),
                        );

                        $this->db->insert('rtrans_tbl', $data);
                        $check = $this->db->insert_id();

                        $bal = $rbal - $paid;
                        $this->db->set('rent_balance', $bal);
                        $this->db->set('rent_status', 0);
                        $this->db->where('rent_id', $re);
                        $this->db->update('rent_tbl');
                        
                        $f = 0;
                    } else if ($paid < 0) {
                        $data = array(
                            'rtrans_mode' => $this->input->post('rtrans_mode'),
                            'rtrans_rno' => $this->input->post('rtrans_rno'),
                            'rtrans_amount' => 0,
                            'rtrans_isfull' => 0,
                            'rent_id' => $re,
                            'tenant_id' => $this->input->post('rtenant_id'),
                            'room_id' => $this->input->post('rr'),
                        );
                        
                        $this->db->insert('rtrans_tbl', $data);
                        $check = $this->db->insert_id();
                        $this->db->set('water_balance', $rbal);
                        $this->db->set('water_status', 0);
                        $this->db->where('water_id', $re);
                        $this->db->update('water_tbl');

                        $f = 0;
                    }
                    $paid = $paid - $rbal;
                    array_push($transArr, $check);
                    array_push($wscheme, array("full" => $f, "month" => $wmo));
                    
                }
                $data['pay'] = $wscheme;
                if ($this->input->post('rtrans_mode') == 1) {
                    foreach($transArr as $ta) {
                        $data3 = array(
                            'rcheck_no' => $this->input->post('rcheck_no'),
                            'rcheck_bank' => $this->input->post('rcheck_bank'),
                            'rcheck_date' => $this->input->post('rcheck_date'),
                            'rtrans_id' => $ta,
                        );
                        $this->db->insert('rcheck_tbl', $data3);
                        
                    }
                    return $arr = array_merge($data, $data4, $data3);
                }

                return $arr = array_merge($data, $data4);
            }
        
        

        
    }
    
    public function water_payment() {
        $tenant_id = $this->input->post('wtenant_id');
        $paid = $this->input->post('wtrans_amount');
        $due = $this->input->post('wtrans_due');
        $g;
            if ($paid < $due) {
                $g = $paid;
            } else if ($paid >= $due) {
                $g = $due;
            }
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
            'g' => $g,
        );
        $water=$this->input->post('water_id');
        $wStr = $water[0];
        $wArr = explode(',', $wStr);
        

        
        
        if(count($wArr) == 1) {
            
            $full;
            

            if ($paid < $due) {
                $full = 0;
            }
            if ($paid >= $due) {
                $full = 1;
            }
            foreach($wArr as $ws) {
                $data = array(
                    'wtrans_mode' => $this->input->post('wtrans_mode'),
                    'wtrans_rno' => $this->input->post('wtrans_rno'),
                    'wtrans_amount' => $g,
                    'wtrans_isfull' => $full,
                    'water_id' => $ws, 
                    'tenant_id' => $this->input->post('wtenant_id'),
                    'room_id' => $this->input->post('ww'),
                );
                $this->db->insert('wtrans_tbl', $data);

                $check = $this->db->insert_id();

                $bal;
                if ($paid < $due) {
                    $bal = $due - $paid;
                    $this->db->set('water_balance', $bal);
                    $this->db->where('water_id', $ws);
                    $this->db->update('water_tbl');
                } else if ($paid >= $due) {
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
            $month = $this->input->post('payment');
            $mStr = $month[0];
            $mArr = explode(',', $mStr);
            // $paid = $this->input->post('wtrans_amount');
            // $due = $this->input->post('wtrans_due');
            $wscheme = array();
            $transArr = array();
            foreach($wArr as $wa) {
                $SELECT = "SELECT water_tbl.*
                FROM water_tbl
                WHERE water_tbl.water_id = ".$wa." ";
                $query = $this->db->query($SELECT);
                $f;
                $row = $query->row();
                $wbal = $row->water_balance;
                $mo = $row->water_due;
                $wmo = date('F', strtotime($mo));
                $bal;
                $check;
                if($paid >= $wbal) {
                    $data = array(
                        'wtrans_mode' => $this->input->post('wtrans_mode'),
                        'wtrans_rno' => $this->input->post('wtrans_rno'),
                        'wtrans_amount' => $wbal,
                        'wtrans_isfull' => 1,
                        'water_id' => $wa,
                        'tenant_id' => $this->input->post('wtenant_id'),
                        'room_id' => $this->input->post('ww'),
                    );
                    $this->db->insert('wtrans_tbl', $data);
                    $check = $this->db->insert_id();
                    $bal = $due - $due;
                    $this->db->set('water_balance', $bal);
                    $this->db->set('water_status', 1);
                    $this->db->where('water_id', $wa);
                    $this->db->update('water_tbl');

            

                    $f = 1;

                } else if ($paid < $wbal && $paid > 0) {
                    $data = array(
                        'wtrans_mode' => $this->input->post('wtrans_mode'),
                        'wtrans_rno' => $this->input->post('wtrans_rno'),
                        'wtrans_amount' => $paid,
                        'wtrans_isfull' => 0,
                        'water_id' => $wa,
                        'tenant_id' => $this->input->post('wtenant_id'),
                        'room_id' => $this->input->post('ww'),
                    );
                    $this->db->insert('wtrans_tbl', $data);
                    $check = $this->db->insert_id();

                    $bal = $wbal - $paid;
                    $this->db->set('water_balance', $bal);
                    $this->db->set('water_status', 0);
                    $this->db->where('water_id', $wa);
                    $this->db->update('water_tbl');

                    
                    $f = 0;
                    
                } else if ($paid <= 0 ) {
                    $data = array(
                        'wtrans_mode' => $this->input->post('wtrans_mode'),
                        'wtrans_rno' => $this->input->post('wtrans_rno'),
                        'wtrans_amount' => 0,
                        'wtrans_isfull' => 0,
                        'water_id' => $wa,
                        'tenant_id' => $this->input->post('wtenant_id'),
                        'room_id' => $this->input->post('ww'),
                    );
                    $this->db->insert('wtrans_tbl', $data);
                    $check = $this->db->insert_id();
                    
                    $this->db->set('water_balance', $wbal);
                    $this->db->set('water_status', 0);
                    $this->db->where('water_id', $wa);
                    $this->db->update('water_tbl');

                    $f = 0;
                }

                
                $paid = $paid - $wbal;
                array_push($transArr, $check);
                array_push($wscheme, array("full" => $f, "month" => $wmo));
              
                
                
            }
            $data['pay'] = $wscheme;
             
                if ($this->input->post('wtrans_mode') == 1) {
                    foreach($transArr as $ta) {
                    $data3 = array(
                        'wcheck_no' => $this->input->post('wcheck_no'),
                        'wcheck_bank' => $this->input->post('wcheck_bank'),
                        'wcheck_date' => $this->input->post('wcheck_date'),
                        'wtrans_id' => $check,
                    );
                    $this->db->insert('wcheck_tbl', $data3);
                    
                    }
                    return $arr = array_merge($data, $data4, $data3);
                }

            return $arr = array_merge($data, $data4);
        }
       
        
        
    }
    public function fee_payment() {
        $tenant_id = $this->input->post('ftenant_id');
        $ftype = $this->input->post('fee'); //advance or deposit
        $paid = $this->input->post('ftrans_amount');
        $due = $this->input->post('ftrans_due');
        $ftArr = array();
        foreach($ftype as $aa){
            array_push($ftArr, $aa);
        }
        $ad = "";
        if($ftArr[0] == 1) {
            $ad = "advance";
        } else if($ftArr[0] == 2) {
            $ad = "deposit";
        }

        $g;
        if ($paid < $due) {
            $g = $paid;
        } else if ($paid >= $due) {
            $g = $due;
        }

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
            'e' => $this->input->post('fee'),
            'f' => $row->tenant_email,
            'g' => $g,
            'h' => $ad,
            'i' => $this->input->post('ftrans_mode'),
            'j' => $this->input->post('ftrans_rno'),
        );
        $fee=$this->input->post('fee_id');
        $fStr = $fee[0];
        $fArr = explode(',', $fStr); // fee id
        

        if(count($fArr) == 1) {
            
            
            $full;

            if ($paid < $due) {
                $full = 0;
            } else if ($paid >= $due) {
                $full = 1;
            }

            if($ftArr[0] == 1) {
                foreach($fArr as $fs) {
                    $data = array(
                        'atrans_mode' => $this->input->post('ftrans_mode'),
                        'atrans_rno' => $this->input->post('ftrans_rno'),
                        'atrans_amount' => $g,
                        
                        'atrans_isfull' => $full,
                        'advance_id' => $fs,
                        'tenant_id' => $this->input->post('ftenant_id'),
                        'room_id' => $this->input->post('ff'),
                    );
    
                    $this->db->insert('atrans_tbl', $data);
                    $check = $this->db->insert_id();
                    
    
                    $bal;
                    if ($paid < $due) {
                        $bal = $due - $paid;
                        $this->db->set('advance_balance', $bal);
                        $this->db->where('advance_id', $fs);
                        $this->db->update('advance_tbl');
                    } else if ($paid >= $due) {
                        $bal = 0;
                        $this->db->set('advance_balance', $bal);
                        $this->db->set('advance_status', 1);
                        $this->db->where('advance_id', $fs);
                        $this->db->update('advance_tbl');
                    }
                }
                    $data2 = array(
                        'advance_paid' => $paid,
                        'advance_payment' => $full,
                    );
                
                    if ($this->input->post('ftrans_mode') == 1) {
                        $data3 = array(
                            'acheck_no' => $this->input->post('fcheck_no'),
                            'acheck_bank' => $this->input->post('fcheck_bank'),
                            'acheck_date' => $this->input->post('fcheck_date'),
                            'atrans_id' => $check,
                        );
                        $this->db->insert('fcheck_tbl', $data3);
                        return $arr = array_merge($data, $data2, $data4, $data3);
                    }
            } else if ($ftArr[0] == 2) {
                foreach($fArr as $fs) {
                    $data = array(
                        'dtrans_mode' => $this->input->post('ftrans_mode'),
                        'dtrans_rno' => $this->input->post('ftrans_rno'),
                        'dtrans_amount' => $g,
                        'dtrans_isfull' => $full,
                        'deposit_id' => $fs,
                        'tenant_id' => $this->input->post('ftenant_id'),
                        'room_id' => $this->input->post('ff'),
                    );
    
                    $this->db->insert('dtrans_tbl', $data);
                    $check = $this->db->insert_id();
                    
    
                    $bal;
                    if ($paid < $due) {
                        $bal = $due - $paid;
                        $this->db->set('deposit_balance', $bal);
                        $this->db->where('deposit_id', $fs);
                        $this->db->update('deposit_tbl');
                    } else if ($paid >= $due) {
                        $bal = 0;
                        $this->db->set('deposit_balance', $bal);
                        $this->db->set('deposit_status', 1);
                        $this->db->where('deposit_id', $fs);
                        $this->db->update('deposit_tbl');
                    }
                }
                    $data2 = array(
                        'deposit_paid' => $paid,
                        'deposit_payment' => $full,
                    );
                
                    if ($this->input->post('ftrans_mode') == 1) {
                        $data3 = array(
                            'dcheck_no' => $this->input->post('fcheck_no'),
                            'dcheck_bank' => $this->input->post('fcheck_bank'),
                            'dcheck_date' => $this->input->post('fcheck_date'),
                            'dtrans_id' => $check,
                        );
                        $this->db->insert('dcheck_tbl', $data3);
                        return $arr = array_merge($data, $data2, $data4, $data3);
                    }
            }
            
            return $arr = array_merge($data, $data2, $data4);
        } else if(count($fArr) > 1) {
            // $ftype = $this->input->post('fee'); //advance or deposit
            // $ftStr = $ftype[0];
            // $ftArr = explode(',', $ftStr);
            $paid = $this->input->post('ftrans_amount');
            $due = $this->input->post('ftrans_due');
            
            $wscheme = array();
            $transArr = array();
            $fin = 0;

            foreach($fArr as $fd) {
                 
                if($ftArr[$fin] == 1) {
                    $SELECT = "SELECT advance_tbl.*
                    FROM advance_tbl
                    WHERE advance_tbl.advance_id = ".$fd." ";
                    $query = $this->db->query($SELECT);
                    $f;
                    $row = $query->row();
                    $fbal = $row->advance_balance;
                    // $mo = $row->rent_due;
                    $wmo = "Advance";
                    $bal;
                    $check;
                    if($paid >= $fbal) {
                        $data = array(
                            'atrans_mode' => $this->input->post('ftrans_mode'),
                            'atrans_rno' => $this->input->post('ftrans_rno'),
                            'atrans_amount' => $fbal,
                            'atrans_isfull' => 1,
                            'advance_id' => $fd,
                            'tenant_id' => $this->input->post('ftenant_id'),
                            'room_id' => $this->input->post('ff'),
                        );

                        $this->db->insert('atrans_tbl', $data);

                        $check = $this->db->insert_id();
                    
                        
                        $bal = 0;
                        $this->db->set('advance_balance', $bal);
                        $this->db->set('advance_status', 1);
                        $this->db->where('advance_id', $fd);
                        $this->db->update('advance_tbl');
                        

                        // $data2 = array(
                        //     'rent_paid' => $paid,
                        //     'rent_payment' => 1,
                        // );
                        $f = 1;
                    } else  if ($paid < $fbal && $paid > 0){
                        $data = array(
                            'atrans_mode' => $this->input->post('ftrans_mode'),
                            'atrans_rno' => $this->input->post('ftrans_rno'),
                            'atrans_amount' => $paid,
                            'atrans_isfull' => 0,
                            'advance_id' => $fd,
                            'tenant_id' => $this->input->post('ftenant_id'),
                            'room_id' => $this->input->post('ff'),
                        );

                        $this->db->insert('atrans_tbl', $data);
                        $check = $this->db->insert_id();

                        $bal = $fbal - $paid;
                        $this->db->set('advance_balance', $bal);
                        $this->db->set('advance_status', 0);
                        $this->db->where('advance_id', $fd);
                        $this->db->update('advance_tbl');
                        
                        $f = 0;
                    } else if ($paid < 0) {
                        $data = array(
                            'atrans_mode' => $this->input->post('ftrans_mode'),
                            'atrans_rno' => $this->input->post('ftrans_rno'),
                            'atrans_amount' => 0,
                            'atrans_isfull' => 0,
                            'advance_id' => $fd,
                            'tenant_id' => $this->input->post('ftenant_id'),
                            'room_id' => $this->input->post('ff'),
                        );
                        
                        $this->db->insert('atrans_tbl', $data);
                        $check = $this->db->insert_id();
                        $this->db->set('advance_balance', $fbal);
                        $this->db->set('advance_status', 0);
                        $this->db->where('advance_id', $fd);
                        $this->db->update('advance_tbl');

                        $f = 0;
                    }
                    $paid = $paid - $fbal;
                    array_push($wscheme, array("full" => $f, "type" => $wmo));
                    $data['pay'] = $wscheme;
                    if ($this->input->post('ftrans_mode') == 1) {
                            $data3 = array(
                                'acheck_no' => $this->input->post('fcheck_no'),
                                'acheck_bank' => $this->input->post('fcheck_bank'),
                                'acheck_date' => $this->input->post('fcheck_date'),
                                'atrans_id' => $check,
                            );
                            $this->db->insert('rcheck_tbl', $data3);
                            return $arr = array_merge($data, $data4, $data3);
                    }
                        
                    
                } else if($ftArr[$fin] == 2) {
                    $SELECT = "SELECT deposit_tbl.*
                    FROM deposit_tbl
                    WHERE deposit_tbl.deposit_id = ".$fd." ";
                    $query = $this->db->query($SELECT);
                    $f;
                    $row = $query->row();
                    $fbal = $row->deposit_balance;
                    // $mo = $row->rent_due;
                    $wmo = "Deposit";
                    $bal;
                    $check;
                    if($paid >= $fbal) {
                        $data = array(
                            'dtrans_mode' => $this->input->post('ftrans_mode'),
                            'dtrans_rno' => $this->input->post('ftrans_rno'),
                            'dtrans_amount' => $fbal,
                            'dtrans_isfull' => 1,
                            'deposit_id' => $fd,
                            'tenant_id' => $this->input->post('ftenant_id'),
                            'room_id' => $this->input->post('ff'),
                        );

                        $this->db->insert('dtrans_tbl', $data);

                        $check = $this->db->insert_id();
                    
                        
                        $bal = 0;
                        $this->db->set('deposit_balance', $bal);
                        $this->db->set('deposit_status', 1);
                        $this->db->where('deposit_id', $fd);
                        $this->db->update('deposit_tbl');
                        

                        // $data2 = array(
                        //     'rent_paid' => $paid,
                        //     'rent_payment' => 1,
                        // );
                        $f = 1;
                    } else  if ($paid < $fbal && $paid > 0){
                        $data = array(
                            'dtrans_mode' => $this->input->post('ftrans_mode'),
                            'dtrans_rno' => $this->input->post('ftrans_rno'),
                            'dtrans_amount' => $paid,
                            'dtrans_isfull' => 0,
                            'deposit_id' => $fd,
                            'tenant_id' => $this->input->post('ftenant_id'),
                            'room_id' => $this->input->post('ff'),
                        );

                        $this->db->insert('dtrans_tbl', $data);
                        $check = $this->db->insert_id();

                        $bal = $fbal - $paid;
                        $this->db->set('deposit_balance', $bal);
                        $this->db->set('deposit_status', 0);
                        $this->db->where('deposit_id', $fd);
                        $this->db->update('deposit_tbl');
                        
                        $f = 0;
                    } else if ($paid < 0) {
                        $data = array(
                            'dtrans_mode' => $this->input->post('ftrans_mode'),
                            'dtrans_rno' => $this->input->post('ftrans_rno'),
                            'dtrans_amount' => 0,
                            'dtrans_isfull' => 0,
                            'deposit_id' => $fd,
                            'tenant_id' => $this->input->post('ftenant_id'),
                            'room_id' => $this->input->post('ff'),
                        );
                        
                        $this->db->insert('dtrans_tbl', $data);
                        $check = $this->db->insert_id();
                        $this->db->set('deposit_balance', $fbal);
                        $this->db->set('deposit_status', 0);
                        $this->db->where('deposit_id', $fd);
                        $this->db->update('deposit_tbl');

                        $f = 0;
                    }
                    $paid = $paid - $fbal;
                    array_push($wscheme, array("full" => $f, "type" => $wmo));
                    $data['pay'] = $wscheme;
                    if ($this->input->post('ftrans_mode') == 1) {
                            $data3 = array(
                                'acheck_no' => $this->input->post('fcheck_no'),
                                'acheck_bank' => $this->input->post('fcheck_bank'),
                                'acheck_date' => $this->input->post('fcheck_date'),
                                'atrans_id' => $check,
                            );
                            $this->db->insert('rcheck_tbl', $data3);
                            return $arr = array_merge($data, $data4, $data3);
                    
                    }
                       
                }
                $fin++;
            }
                

            return $arr = array_merge($data, $data4);
        }
    
    }


    public function get_rtrans () {
		$this->db->from('rtrans_tbl');
		$this->db->join('rent_tbl','rent_tbl.rent_id=rtrans_tbl.rent_id', 'LEFT');
        $this->db->join('rcheck_tbl','rcheck_tbl.rtrans_id=rtrans_tbl.rtrans_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=rtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=rtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=rtrans_tbl.room_id', 'LEFT');
    
		$query = $this->db->get();
		return $query;


    }
    public function get_wtrans () {
		$this->db->from('wtrans_tbl');
		$this->db->join('water_tbl','water_tbl.water_id=wtrans_tbl.water_id', 'LEFT');
        $this->db->join('wcheck_tbl','wcheck_tbl.wtrans_id=wtrans_tbl.wtrans_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=wtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=wtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=wtrans_tbl.room_id', 'LEFT');
    
		$query = $this->db->get();
		return $query;


    }

    public function get_atrans () {
		$this->db->from('atrans_tbl');
		$this->db->join('advance_tbl','advance_tbl.advance_id=atrans_tbl.advance_id', 'LEFT');
        $this->db->join('acheck_tbl','acheck_tbl.atrans_id=atrans_tbl.atrans_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=atrans_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=atrans_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=atrans_tbl.room_id', 'LEFT');
    
		$query = $this->db->get();
		return $query;


    }

    public function get_dtrans () {
		$this->db->from('dtrans_tbl');
		$this->db->join('deposit_tbl','deposit_tbl.deposit_id=dtrans_tbl.deposit_id', 'LEFT');
        $this->db->join('dcheck_tbl','dcheck_tbl.dtrans_id=dtrans_tbl.dtrans_id', 'LEFT');
        $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('dir_tbl','dir_tbl.tenant_id=dtrans_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dtrans_tbl.room_id', 'LEFT');
    
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

    public function send_mail_fee($to_email, $to_guardianemail) {

        //Load email library
        $this->load->library('email');
        $data = $this->fee_payment();
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
    
        $htmlContent = $this->load->view('fee_receipt', $data, TRUE);
        //$htmlContent = '<h1>DORMasino E-Receipt (Rent)</h1>';

        $this->email->to($to_email);
        $this->email->to($to_guardianemail);
        $list = array($to_email, $to_guardianemail);
        $this->email->to($list);
        $this->email->from('dormasino20182019@gmail.com','DORMasino');
        $this->email->subject('DORMasino E-Receipt (Advance and Deposit Fee)');
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
