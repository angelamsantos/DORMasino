<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directories_model extends CI_Model {

	public function __construct()
    {		
        		parent::__construct();  
                $this->load->database();
				$this->load->library('session');
    }

    public function get_floor() {
    
        $query = $this->db->get('floor_tbl');
        return $query;
    }

    public function get_room() {
        $this->db->from('room_tbl');
        $this->db->join('floor_tbl', 'room_tbl.floor_id=floor_tbl.floor_id');
        $query = $this->db->get();
        return $query;
    }

    public function get_admin() {
        $this->db->from('admin_tbl');
        $this->db->join('adcontrol_tbl', 'admin_tbl.admin_id=adcontrol_tbl.admin_id');
        $query = $this->db->get();
        
        return $query;
    }

    public function get_type() {
        $query = $this->db->get('type_tbl');
        return $query;
    }

    public function get_dir () {
		$this->db->from('dir_tbl');
		$this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
        $this->db->join('guardian_tbl','guardian_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('mother_tbl','mother_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('father_tbl','father_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('contract_tbl','contract_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
        $this->db->join('type_tbl','tenant_tbl.type_id=type_tbl.type_id', 'LEFT');
    
		//$this->db->where('taskassigned_tbl.u_id',$u_id);
		$query = $this->db->get();
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
        $this->db->join('type_tbl','tenant_tbl.type_id=type_tbl.type_id', 'LEFT');
		$this->db->where('dir_tbl.room_id',$r_id);
		$query = $this->db->get();
        return $query;
        


    }


    public function get_dircount() {
        $this->db->select("room_tbl.room_id");
        $this->db->select("room_tbl.room_number");
        $this->db->select("room_tbl.room_status");
        $this->db->select("room_tbl.room_tcount");
        $this->db->select("room_tbl.room_price");
        $this->db->select("floor_tbl.floor_number");
        $this->db->select('tenant_tbl.tenant_status');
        $this->db->select("count(dir_tbl.tenant_id) as num_tenants");
        $this->db->from("room_tbl");
        $this->db->join("floor_tbl", "floor_tbl.floor_id=room_tbl.floor_id", "LEFT");
        $this->db->join("dir_tbl", "room_tbl.room_id=dir_tbl.room_id", "LEFT"); 
        $this->db->join("tenant_tbl", "tenant_tbl.tenant_id=dir_tbl.tenant_id", "LEFT"); 
        $this->db->where('tenant_tbl.tenant_status', 1);
        $this->db->group_by("room_tbl.room_id");
        $query = $this->db->get();
        return $query;
    }
 
    public function get_dircount1() {
        $this->db->select("room_tbl.room_id");
        $this->db->select("room_tbl.room_number");
        $this->db->select("room_tbl.room_status");
        $this->db->select("room_tbl.room_tcount");
        $this->db->select("room_tbl.room_price");
        $this->db->select("floor_tbl.floor_number");
        $this->db->select("count(dir_tbl.tenant_id) as num_tenants");
        $this->db->from("room_tbl");
        $this->db->join("floor_tbl", "floor_tbl.floor_id=room_tbl.floor_id", "LEFT");
        $this->db->join("dir_tbl", "room_tbl.room_id=dir_tbl.room_id", "LEFT"); 
        $this->db->join("tenant_tbl", "tenant_tbl.tenant_id=dir_tbl.tenant_id", "LEFT"); 
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
    
    // public function get_floor2() {
    //     $this->db->from('floor_tbl');
	// 	$this->db->join('dir_tbl','dir_tbl.floor_id=floor_tbl.floor_id', 'LEFT');
    //     $this->db->join('room_tbl','room_tbl.room_id=dir_tbl.room_id', 'LEFT');
    //     $this->db->join('tenant_tbl','tenant_tbl.tenant_id=dir_tbl.tenant_id', 'LEFT');
	// 	//$this->db->where('taskassigned_tbl.u_id',$u_id);
	// 	$query = $this->db->get();
	// 	return $query;
    // }

    public function create_tenant($data) {
        $this->db->insert('tenant_tbl', $data);
    }

    public function create_tenantcontacts() {
        $tenant_id = $this->db->insert_id();
        $room_id = $this->input->post('room_id');
        $type_id = $this->input->post('type_id');
        $data1 = array(
            'guardian_name' => $this->input->post('guardian_name'),
            'guardian_rel' => $this->input->post('guardian_rel'),
            'guardian_email' => $this->input->post('guardian_email'),
            'guardian_mno' => $this->input->post('guardian_mno'),
            'guardian_lno' => $this->input->post('guardian_lno'),
            'tenant_id' => $tenant_id,
        );

        $this->db->insert('guardian_tbl', $data1);

        $data2 = array(
            'mother_name' => $this->input->post('mother_name'),
            'mother_mno' => $this->input->post('mother_mno'),
            'tenant_id' => $tenant_id,
        );

        $this->db->insert('mother_tbl', $data2);

        $data3 = array(
            'father_name' => $this->input->post('father_name'),
            'father_mno' => $this->input->post('father_mno'),
            'tenant_id' => $tenant_id,
        );
        
        $this->db->insert('father_tbl', $data3);

        $data4 = array(
            'tenant_id' => $tenant_id,
            'room_id' => $room_id,
            'type_id' => $type_id,
        );
        $this->db->insert('dir_tbl', $data4);

        $data5 = array(
            'tenant_id' => $tenant_id,
            'contract_start' => $this->input->post('contract_start'),
            'contract_movein' => $this->input->post('contract_movein'),
            'contract_status' => 1,
        );
        $this->db->insert('contract_tbl', $data5);

        $SELECT = "SELECT room_tbl.*
                FROM room_tbl
                WHERE room_tbl.room_id = ".$room_id." ";
                $query = $this->db->query($SELECT);
                $row = $query->row();
                $rt = $row->room_tcount;
                $rp = $row->room_price;

                $d;
                $status;
        if($type_id == 1) {        
            $this->db->select("room_tbl.room_id");
            $this->db->select("room_tbl.room_number");
            $this->db->select("room_tbl.room_tcount");
            $this->db->select("room_tbl.room_price");
            $this->db->select("room_tbl.room_extra");
            $this->db->select('tenant_tbl.tenant_status');
            $this->db->select("count(dir_tbl.tenant_id) as num_tenants");
            $this->db->from("room_tbl");
            $this->db->join("dir_tbl", "room_tbl.room_id=dir_tbl.room_id", "LEFT"); 
            $this->db->join("tenant_tbl", "tenant_tbl.tenant_id=dir_tbl.tenant_id", "LEFT"); 
            $this->db->where('tenant_tbl.tenant_status', 1);
            $this->db->where('dir_tbl.room_id', $room_id);
            $this->db->group_by("dir_tbl.room_id");
            $query1 = $this->db->get();
            $row1 = $query1->row();

            $nt = $row1->num_tenants;
            $extra = $row1->room_extra;
            if ($nt >= $rt) {
                $a = $nt - $rt;
              
                $c = $a * $extra;
                $e = $c + $rp;
                $d = ($e / ($nt)) * 2;
                //echo "hi";
                $status = 0;
            }
            if ($nt < $rt ) {
                $d = ($rp / $rt) * 2;
                //echo "hello";
                $status = 0;
            } 

            
            
        }  else if ($type_id == 2){
            $SELECT2 = "SELECT tenant_tbl.type_id, type_tbl.type_id, type_tbl.type_name, room_tbl.room_id, room_tbl.room_number
            from tenant_tbl
            LEFT JOIN type_tbl
            on tenant_tbl.type_id=type_tbl.type_id
            LEFT JOIN dir_tbl
            on dir_tbl.tenant_id = tenant_tbl.tenant_id
            LEFT JOIN room_tbl
            on room_tbl.room_id=dir_tbl.room_id
            WHERE room_tbl.room_id = ".$room_id."
            GROUP BY tenant_tbl.type_id";
            $query2 = $this->db->query($SELECT2);
            $row2 = $query2->row();

            if($row2->room_id){
                $d = 0;
                $status = 1;
            } else {
                $d = ($rp) * 2;
                $status = 0;
            }
            
        }      
        
        
    
        
        
        $data6 = array(
            'deposit_rate' => $d, 
            'deposit_balance' => $d, 
            'deposit_status' => $status,
            'tenant_id' => $tenant_id,  
        );

        $this->db->insert('deposit_tbl', $data6);
        $start = $this->input->post('contract_start');
        $movein = $this->input->post('contract_movein');
        $a;
        $s;
        $m;
        $datediff;
        if($start == $movein) {
            $a = $d / 2;
        } else if($start < $movein) {
            $a = $d / 2;
        } else if ($start > $movein) {
            $s = new DateTime($start);
            $m = new DateTime($movein);
            $datediff = $m->diff($s);
            $d = $d / 2;
            $a = $d + (($d / 30) * $datediff->days);
        }

        $data7 = array(
            'advance_rate' => $a, 
            'advance_balance' => $a, 
            'advance_status' => $status,
            'tenant_id' => $tenant_id,  
        );

        $this->db->insert('advance_tbl', $data7);
    }

    


    public function update_tenant($tenant_id) {
        $data1 = array(
            'tenant_email' => $this->input->post('etenant_email'),
            'tenant_fname' => $this->input->post('etenant_fname'),
            'tenant_lname' => $this->input->post('etenant_lname'),
            'tenant_address' => $this->input->post('etenant_address'),
            'tenant_birthday' => $this->input->post('etenant_bday'),
            'tenant_school' => $this->input->post('etenant_school'),
            'tenant_course' => $this->input->post('etenant_course'),
            'tenant_medical' => $this->input->post('etenant_medical'),
            'tenant_cno' => $this->input->post('etenant_cno'),
            'type_id' => $this->input->post('etype_id'),
        );

        $this->db->where('tenant_id', $tenant_id);
        $this->db->update('tenant_tbl', $data1);
        
        $data2 = array(
            'guardian_name' => $this->input->post('eguardian_name'),
            'guardian_rel' => $this->input->post('eguardian_rel'),
            'guardian_email' => $this->input->post('eguardian_email'),
            'guardian_mno' => $this->input->post('eguardian_mno'),
            'guardian_lno' => $this->input->post('eguardian_lno'),
        );

        $this->db->where('tenant_id', $tenant_id);
        $this->db->update('guardian_tbl', $data2);

        $data3 = array(
            'mother_name' => $this->input->post('emother_name'),
            'mother_mno' => $this->input->post('emother_mno'),
        );

        $this->db->where('tenant_id', $tenant_id);
        $this->db->update('mother_tbl', $data3);

        $data4 = array(
            'father_name' => $this->input->post('efather_name'),
            'father_mno' => $this->input->post('efather_mno'),
        );
        $this->db->where('tenant_id', $tenant_id);
        $this->db->update('father_tbl', $data4);

        // $data5 = array(
        //     'room_id' => $this->input->post('etroom_number'),
        // );
        // $this->db->where('tenant_id', $tenant_id);
        // $this->db->update('dir_tbl', $data5);

        // $data6 = array(
        //     'contract_start' => $this->input->post('econtract_start'),
        // );

        // $this->db->where('tenant_id', $tenant_id);
        // $this->db->update('contract_tbl', $data6);
    }
    public function mr_tenant($tenant_id) {
        $data5 = array(
            'room_id' => $this->input->post('mr_roomno'),
        );
            $this->db->where('tenant_id', $tenant_id);
            $this->db->update('dir_tbl', $data5);
    }

    public function cc_tenant($tenant_id) {
        $data5 = array(
            'contract_start' => $this->input->post('cc_date'),
        );
            $this->db->where('tenant_id', $tenant_id);
            $this->db->update('contract_tbl', $data5);
    }

    public function rp_tenant($tenant_id) {
        $data5 = array(
            'tenant_password' => md5($this->input->post('rp_pw')),
        );
            $this->db->where('tenant_id', $tenant_id);
            $this->db->update('tenant_tbl', $data5);
    }

    public function deactivate_tenant($tenant_id) {
        $status=0;
        foreach($tenant_id as $deac) {
            $this->db->set('tenant_status', $status);
            $this->db->where('tenant_id', $deac);
            $this->db->update('tenant_tbl');
        }
        
    }

    public function activate_tenant($tenant_id) {
        $status=1;
        $this->db->set('tenant_status', $status);
        $this->db->where('tenant_id', $tenant_id);
        $this->db->update('tenant_tbl');
    }

    public function fetch_room($floor_id) {

        $this->db->from('floor_tbl');
        $this->db->join('room_tbl','room_tbl.floor_id=floor_tbl.floor_id', 'LEFT');
        $this->db->where('floor_tbl.floor_id', $floor_id);
        $query = $this->db->get();

            foreach ($query->result() as $out) {
                        
                if (($out->room_number - ($out->floor_number * 100))  == 7) {

                    $output = "The floor is already full";

                } else if ($out->room_number != 0) {

                    $output = ($out->room_number) + 1 ; 

                } else {

                    $output = ($out->floor_number) * 100  + 1 ; 

                }
            }

        $floor_id = $this->session->set_userdata('floor_id', $floor_id);
        return $output;
    }

    public function record_room($data) {

        $this->db->insert('room_tbl', $data);

    }

    public function update_room($room_id) {

        $data = array(

            'room_price' => $this->input->post('update_roomprice'),
            'room_extra' => $this->input->post('update_roomextra'),
            'room_tcount' => $this->input->post('update_roomtcount')
            
        );

        $this->db->where('room_id', $room_id);
        $this->db->update('room_tbl', $data);

    }

    public function deactivate_room($room_id) {
        $status=0;
        $this->db->set('room_status', $status);
        $this->db->where('room_id', $room_id);
        $this->db->update('room_tbl');
    }

    public function activate_room($room_id) {
        $status=1;
        $this->db->set('room_status', $status);
        $this->db->where('room_id', $room_id);
        $this->db->update('room_tbl');
    }

    public function add_admin() {
        
        $data = array (
            'admin_email' => $this->input->post('email'),
            'admin_password' => md5("123456"),
            'admin_fname' => $this->input->post('fname'),
            'admin_lname' => $this->input->post('lname'),
            'admin_new' => "1",
            'admin_status' => "1",
            'admin_cno' => $this->input->post('cno'),
            'admin_attempts' => "0",

        );
        $this->db->insert('admin_tbl', $data);
        $admin = $this->db->insert_id();

        $dir = "";
        
        for($i=1;$i<=12;$i++){
            $a = $this->input->post('d'.$i);
            
            $dir.=$a;
        
        }

        $bill = "";
        
        for($j=1;$j<=5;$j++){
            $b = $this->input->post('p'.$j);
            
            $bill.=$b;
        
        }
        $ann = "";
        
        for($k=1;$k<=2;$k++){
            $c = $this->input->post('a'.$k);
            
            $ann.=$c;
        
        }
        $msg = "";
        
        for($l=1;$l<=9;$l++){
            $d = $this->input->post('m'.$l);
            
            $msg.=$d;
        
        }
        
        $vis = "";
        for($m=1;$m<=7;$m++){
            $e = $this->input->post('v'.$m);
            
            $vis.=$e;
        
        }
          
        $data2 = array(
            'adcontrol_dir' => $dir,
            'adcontrol_bills' => $bill,
            'adcontrol_ann' => $ann,
            'adcontrol_msg' => $msg,
            'adcontrol_logs' => $vis,
            'admin_id' => $admin,
        );
        // echo $dir.'<br />';
        // echo $bill.'<br />';
        // echo $ann.'<br />';
        // echo $msg.'<br />';
        // echo $vis.'<br />';
        $this->db->insert('adcontrol_tbl', $data2);
    }

    public function edit_admin() {
        $aid = $this->input->post('aid');
        $data = array (
            'admin_email' => $this->input->post('eemail'),
            'admin_fname' => $this->input->post('efname'),
            'admin_lname' => $this->input->post('elname'),
            'admin_empno' => $this->input->post('eempno'),
            'admin_cno' => $this->input->post('ecno'),

        );
        $this->db->where('admin_id', $aid);
        $this->db->update('admin_tbl', $data);

        $dir = "";
        
        for($i=1;$i<=12;$i++){
            $a = $this->input->post('ed'.$i);
            
            $dir.=$a;
        
        }

        $bill = "";
        
        for($j=1;$j<=5;$j++){
            $b = $this->input->post('ep'.$j);
            
            $bill.=$b;
        
        }
        $ann = "";
        
        for($k=1;$k<=2;$k++){
            $c = $this->input->post('ea'.$k);
            
            $ann.=$c;
        
        }
        $msg = "";
        
        for($l=1;$l<=9;$l++){
            $d = $this->input->post('em'.$l);
            
            $msg.=$d;
        
        }
        
        $vis = "";
        for($m=1;$m<=7;$m++){
            $e = $this->input->post('ev'.$m);
            
            $vis.=$e;
        
        }
          
        $data2 = array(
            'adcontrol_dir' => $dir,
            'adcontrol_bills' => $bill,
            'adcontrol_ann' => $ann,
            'adcontrol_msg' => $msg,
            'adcontrol_logs' => $vis,
        );

        $this->db->where('admin_id', $aid);
        $this->db->update('adcontrol_tbl', $data2);
    }

    public function deac_admin() {
        
       $id = $this->input->post('deac_id');
            $this->db->set('admin_status', 0);
            $this->db->where('admin_id', $id);
            $this->db->update('admin_tbl');
    
        echo $id;
    }

    public function act_admin() {
        $id = $this->input->post('act_id');
        $this->db->set('admin_status', 1);
        $this->db->where('admin_id', $id);
        $this->db->update('admin_tbl');
    }
}
?>