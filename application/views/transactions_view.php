<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$login = $this->session->userdata('login_success');
if (!isset ($login)) {
    redirect('Login');
}

$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
$abill = $this->session->userdata['login_success']['info']['adcontrol_bills'];
    $a="";
    if($abill[1] == 1) { //add
        $a = "title='Edit Billing Statement'";
        $b = "title='Create Billing Statement'";
        $c = "";
    } else {
        $a = "disabled title='This feature is not available on your account.' ;";
        $b = "disabled title='This feature is not available on your account.' ;";
        $c = "disabled title='This feature is not available on your account.' ;";
    } 


?>

<html>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
</style>

    <script>

        $(document).ready(function () {
            $('#trans').dataTable( {
                "aLengthMenu": [[7, 14, 21, -1], [7, 14, 21, "All"]],
                "pageLength": 7,
            });
        }); 

</script>

    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Update Bills</p>
                    <p class="d-none d-lg-block align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;">
                    <!-- Notification nav -->
                    <ul class="nav navbar-nav navbar-right" style="margin-left: 20px">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle notification" data-toggle="dropdown" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;">
                                        <span class="fa fa-bell" style="font-size:16px;"></span>
                                        <span class="label label-pill label-danger badge count" style="border-radius:10px;"></span> 
                                    </a>
                                    <ul class="dropdown-menu notif"></ul>
                                </li>
                            </ul>
                    <!-- Notification nav -->
                    &nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    
                </div>
                <div class="row mx-auto" style="margin-top: 10px;width:100%;">
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
                </div>    
                <div class="row mx-auto" style="margin-top: 10px;width:100;">
                    <div class="col d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" style="margin-top: 0px;padding-right: 0px;padding-left:0px;">
                            <p class="mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size:14px;margin-bottom:0px;width:100%"><span><b>Legend: </b></span>&nbsp;&nbsp;&nbsp;
                                <i class="icon ion-android-add-circle" style="font-size:19px;"></i> - Create Bill &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="icon ion-edit" style="font-size:19px;"></i> - Edit Bill
                                
                            </p>
                        <?php 
                            $btnSend="Send rent bill";
                            foreach($latest->result() as $rl) {
                                if(!empty($rl)){
                                    $rcurdate = date('m-Y', strtotime('first day of next month'));
                                    $rdate = date('m-Y', strtotime($rl->rent_due));

                                    if($rcurdate == $rdate) {
                                        $btnSend = "disabled title='Rent bill for ".date('F', strtotime('first day of next month'))." has been sent'";
                                    } 
                                }
                            }

                        ?>
                        
                        <button class="btn btn-primary ml-xl-auto ml-lg-auto ml-md-auto mr-sm-auto mr-auto " <?php echo $c; //echo $btnSend; ?> type="button" data-toggle="modal" data-target="#RentBill" style="background-color: #28a745;color: #ffffff;border: none;float:right;">Send Rent Bill</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary ml-xl-auto ml-lg-auto ml-md-auto mr-sm-auto mr-auto " <?php echo $a; ?> type="button" data-toggle="modal" data-target="#WaterSetting" style="background-color: #28a745;color: #ffffff;border: none;float:right;">Edit water setting</button>
                    </div>
                </div>
                
                <div id="RentBill" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Send Rent Bill</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            
                            <form method="POST" action="<?php echo site_url('Transactions/insert_rent');?>" class="justify" style="width: 100%;margin: 0 auto;">
                            <div class="modal-body text-center">
                                    <p style="font-size: 17px;">Are you sure you want to send rent bill for the month of <?php echo date('F', strtotime('first day of next month')) ?>?</p>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;margin-left: 0px;margin-right: 0px;padding:0px;">
                
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding:0px;">
                        
                        <div id="table_view" class="table-responsive" style="width:100%;">
                            <table class="table" id="trans" style="font-size:14px;">
                                <thead class="logs">
                                    <tr style="text-align:center">
                                        <th style="width: 15%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                        <th style="width: 20%;padding-right: 0px;padding-left: 0px;">No of Tenants</th>
                                        <th style="width: 25%;padding-right: 0px;padding-left: 0px;">Type of Tenants</th>
                                        <th style="width: 20%;padding-right: 0px;padding-left: 0px;">Water Bill</th>
                                        <th style="width: 20%;padding-right: 0px;padding-left: 0px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($room->result() as $row) {
                                    
                                    ?>
                                    
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row->room_number; ?></td>
                                            <?php 
                                                $riArr = array();
                                             
                                                foreach($dir_count->result() as $dri) {
                                                    array_push($riArr, $dri->room_id);
                                                }
                                                //print_r($riArr);
                                                $aa = array_column($dir_count->result(), 'room_id');
                                               
                                                $bb = $row->room_id;
                                                //echo $b; 
                                                if (in_array($bb, $riArr, true)) {
                                                  //echo "yes";
                                                //     foreach ($water->result() as $w) {
                                                //         if($w->room_id == $row2->room_id) {
                                                //             $wc = $w->water_current;
                                                //         }
                                                //     }
                                                $e = "";
                                                    foreach ($dir_count->result() as $d) {
                                                        if ($d->room_id == $row->room_id) { 
                                                        
                                                            ?> 
                                                    <td style="text-align:center;"><?php echo $d->num_tenants; ?></td>
                                            <?php } } } else { $e = "disabled";?>
                                            
                                                <td style="text-align:center;"><?php echo 0; ?></td>
                                            <?php } ?>
                                            <?php 
                                                foreach($rtype->result() as $rt) {
                                                    if($rt->room_id == $row->room_id) {
                                                        if($rt->type_name) {
                                                        echo '<td style="text-align:center;">'.$rt->type_name.'</td>';
                                                        } else  {
                                                            echo '<td style="text-align:center;">No tenants yet</td>';
                                                        }

                                                    }
                                                }
                                            ?>

                                            <?php 
                                                $aa = array_column($water->result(), 'room_id');
                                                
                                                $bb = $row->room_id;
                                                $wstatus;
                                                if (in_array($bb, $aa, true)) {
                                                    foreach ($water->result() as $set) {
                                                        $curdate = date('m-Y');
                                                        $wdue = $set->water_due;
                                                        $wdate = date('m-Y', strtotime('-1 month', strtotime($wdue)));
                                                        if($set->room_id == $row->room_id) {
                                                            if($curdate == $wdate) {
                                                                echo '<td style="text-align:center;">Sent</td>';
                                                                
                                                                
                                                            } else {
                                                                echo '<td style="text-align:center;">Not yet sent</td>';
                                                            
                                                            }
                                                        } 
                                                    }
                                                } else {
                                                    echo '<td style="text-align:center;">Not yet sent</td>';
                                                }
                                            ?>
                                        
                                            <td style="text-align:center;">
                                            <?php 
                                                $aa = array_column($water->result(), 'room_id');
                                                
                                                $bb = $row->room_id;
                                                $wstatus;
                                                if (in_array($bb, $aa, true)) {
                                                    foreach ($water->result() as $set) {
                                                        $curdate = date('m-Y');
                                                        $wdate = date('m-Y', strtotime($set->water_timestamp));
                                                        if($set->room_id == $row->room_id) {
                                                            if($curdate == $wdate || $curdate > $wdate || $curdate < $wdate) {   
                                                                echo '<button '.$a.' id="edit-room" data-target="#EditBill'.$row->room_id.'" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                                <i class="icon ion-edit" style="font-size: 19px;color:#0645AD;"></i>
                                                                </button>';    
                                                            } else {
                                                                echo '<button '.$b."".$e.'  id="edit-room" data-target="#ModalBill'.$row->room_id.'" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                                <i class="icon ion-android-add-circle" style="font-size: 19px;color:#0645AD;"></i>
                                                                </button>'; 
                                                            } 
                                                        } 
                                                    }
                                                } else {
                                                    echo '<button '.$b."".$e.'   id="edit-room" data-target="#ModalBill'.$row->room_id.'" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                    <i class="icon ion-android-add-circle" style="font-size: 19px;color:#0645AD;"></i>
                                                    </button>'; 
                                                } 
                                                ?>                                                                               
                                            </td>  
                                        </tr>
                                    <?php } ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                        <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
                    </footer>
                </div>
            <!-- Create Modal Billing statement -->
            <?php foreach ($room->result() as $row2) { ?>
            
        
            <div class="modal fade" role="dialog" tabindex="-1" id="ModalBill<?php echo $row2->room_id; ?>">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Create Billing Statement: <?php echo $row2->room_number; ?></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                            <form method="POST" action="<?php echo site_url('Transactions/insert_bill');?>">
                                <div class="form-row">
                                    
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;">Utility Charges: Water</h6>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Provider</label></div>
                                                <div class="col"><input class="form-control" type="text" value="Maynilad" name="water_provider" readonly></div>
                                                <input class="form-control" type="hidden" name="room_id" value="<?php echo $row2->room_id; ?>" >
                                                <?php 
                                                    $roomTenants = array();

                                                    foreach ($dir->result() as $t) {
                                                        if($t->room_id == $row2->room_id) {
                                                            array_push($roomTenants, $t->tenant_id);
                                                        }
                                                    }
                                                    
                                                    foreach($roomTenants as $rt) {
                                                        echo '<input class="form-control" type="hidden" name="tenant_id[]" value="'.$rt.'" >';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                            
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                            <?php $a = array_column($water->result(), 'room_id');
                                            //print_r($a);
                                            $b = $row2->room_id;
                                           // echo $b; 
                                            if (in_array($b, $a, true)) {
                                              //  echo "yes";
                                                foreach ($water->result() as $w) {
                                                    if($w->room_id == $row2->room_id) {
                                                        $wc = $w->water_current;
                                                    }
                                                }

                                                echo'<div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Previous Reading</label></div>
                                                <div class="col">
                                                    <input class="form-control" id="pre'.$row2->room_id.'" name="water_previous" style="text-align:right" type="number" value="'.$wc.'" readonly>
                                                    <input class="form-control" name="isNew" style="text-align:right" type="hidden" value="0">
                                                </div>';
                                            }
                                            else {
                                                echo'<div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Previous Reading</label></div>
                                                <div class="col">
                                                    <input class="form-control" id="pre'.$row2->room_id.'" name="water_previous" style="text-align:right" type="number">
                                                    <input class="form-control" name="isNew" style="text-align:right" type="hidden" value="1">
                                                </div>';
                                            }
                                            ?>
                                                
                                                
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Current Reading</label></div>
                                                <div class="col"><input class="form-control" id="cur<?php echo $row2->room_id; ?>" name="water_current" style="text-align:right" type="number" style="text-align:right" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price per m<sup>3</sup></label></div>
                                                <div class="col"><input class="form-control" id="cm<?php echo $row2->room_id; ?>" name="water_cm" type="number" style="text-align:right" value="<?php foreach($cm->result() as $cmm) { echo number_format($cmm->wsetting_value, 2); } ?>" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price of Water Bill</label></div>
                                                <div class="col"><input class="form-control" id="wbn<?php echo $row2->room_id; ?>" name="" type="text" style="text-align:right" readonly></div>
                                                <input class="form-control" id="wb<?php echo $row2->room_id; ?>" name="" type="hidden" style="text-align:right" readonly>
                                            </div>
                                        </div>
                                        <?php foreach ($dir_count->result() as $nt) { 
                                                
                                                    if ($nt->room_id == $row2->room_id) {
                                                        $c = (int)$nt->num_tenants; ;?>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <input class="form-control" id="aa<?php echo $row2->room_id; ?>" value="<?php echo $c; ?>" type="hidden" style="text-align:right" readonly >
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Bill per tenant</label></div>
                                                <div class="col"><input class="form-control" id="ptn<?php echo $row2->room_id; ?>" name="water_total" value="" type="text" style="text-align:right" readonly></div>
                                                <input class="form-control" id="pt<?php echo $row2->room_id; ?>" name="water_total" value="" type="hidden" style="text-align:right" readonly>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <div class="col"><input class="form-control" type="date" name="water_due" required></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary"  type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>

            <?php } ?>
            <!--End Create Modal Billing statement--> 
            <!-- Edit Modal Billing statement -->
            <?php foreach ($room->result() as $row2) { ?>
            
        
            <div class="modal fade" role="dialog" tabindex="-1" id="EditBill<?php echo $row2->room_id; ?>">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Edit Billing Statement: <?php echo $row2->room_number; ?></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                            <form method="POST" action="<?php echo site_url('Transactions/edit_bill');?>">
                                <div class="form-row">
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;">Utility Charges: Water</h6>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Provider</label></div>
                                                <div class="col"><input class="form-control" type="text" value="Maynilad" name="ewater_provider" readonly></div>
                                                <?php 
                                                    $roomTenants = array();

                                                    foreach ($dir->result() as $t) {
                                                        if($t->room_id == $row2->room_id) {
                                                            array_push($roomTenants, $t->tenant_id);
                                                        }
                                                    }
                                                    
                                                    foreach($roomTenants as $rt) {
                                                        echo '<input class="form-control" type="hidden" name="etenant_id[]" value="'.$rt.'" >';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                            
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                            <?php $a = array_column($water->result(), 'room_id');
                                            //print_r($a);
                                            $b = $row2->room_id;
                                           // echo $b; 
                                           $previous="";
                                           $due;
                                            if (in_array($b, $a, true)) {
                                              //  echo "yes";
                                                foreach ($water->result() as $w) {
                                                    if($w->room_id == $row2->room_id) {
                                                        if($w->isNew == 1) {
                                                            $wc = $w->water_previous;
                                                            
                                                            $previous = "value='".number_format($wc, 2)."'";
                                                        }
                                                        else {  
                                                            $wc = $w->water_previous;
                                                            $previous = "value='".number_format($wc, 2)."' readonly";
                                                        }
                                                        $curval = $w->water_current;
                                                        $due = $w->water_due;
                                                    }
                                                }

                                                //echo'<div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Previous Reading</label></div>
                                                //<div class="col">
                                                  //  <input class="form-control" id="pre'.$row2->room_id.'" name="water_previous" style="text-align:right" type="number" value="'.$wc.'" readonly>
                                                //</div>';
                                            }
                                            // else {
                                                
                                            // }
                                            echo'<div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Previous Reading</label></div>
                                                <div class="col">
                                                    <input class="form-control" id="epre'.$row2->room_id.'" name="ewater_previous" style="text-align:right" type="number" '.$previous.'>
                                                </div>';
                                            ?>
                                                
                                                
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Current Reading</label></div>
                                                <div class="col"><input class="form-control" value="<?php echo number_format($curval, 2);?>" id="ecur<?php echo $row2->room_id; ?>" name="ewater_current" style="text-align:right" type="number" style="text-align:right" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price per m<sup>3</sup></label></div>
                                                <div class="col"><input class="form-control" id="ecm<?php echo $row2->room_id; ?>" name="ewater_cm" type="number" style="text-align:right" value="<?php foreach($cm->result() as $cmm) { echo number_format($cmm->wsetting_value , 2); } ?>" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price of Water Bill</label></div>
                                                <div class="col"><input class="form-control" id="ewb<?php echo $row2->room_id; ?>" name="" type="number" style="text-align:right" readonly></div>
                                            </div>
                                        </div>
                                        <?php foreach ($dir_count->result() as $nt) { 
                                                
                                                    if ($nt->room_id == $row2->room_id) {
                                                        $c = (int)$nt->num_tenants; ;?>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <input class="form-control" id="eaa<?php echo $row2->room_id; ?>" value="<?php echo $c; ?>" type="hidden" style="text-align:right" readonly >
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Bill per tenant</label></div>
                                                <div class="col"><input class="form-control" id="ept<?php echo $row2->room_id; ?>" name="ewater_total" value="" type="number" style="text-align:right" readonly></div>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <div class="col"><input class="form-control" type="date" name="ewater_due" value="<?php echo $due;?>" required></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary"  type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>

            <?php } ?>
            <!--End Edit Modal Billing statement-->   
            <?php 
                // if (isset($_POST['submitBill']) ) {
                //     $rrt= $_POST['rrt'];
                //     $rid = $_POST['rid'];
                //     $rc = $_POST['rc'];
                //     $rnt = $_POST['rnt'];
                //     $rex = $_POST['rex'];
                //     $rat = $_POST['rat'];
                //     $rec = $_POST['rec'];
                //     $rtr = $_POST['rtr'];
                //     $rdt = $_POST['rdt'];

                //     $wwp = $_POST['wwp'];
                //     $pre = $_POST['pre'];
                //     $cur = $_POST['cur'];
                //     $cm = $_POST['cm'];
                //     $wb = $_POST['wb'];
                //     $pt = $_POST['pt'];
                //     $wdt = $_POST['wdt'];

                
                    
                    //echo "<script>
                        // $(document).ready(function(){
                            //   $('#BillConfirm').modal('show');
                            //});
                        //</script>";
                    //}
            ?>                                                
            

            <div id="WaterSetting" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Water Setting</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        
                        <form method="POST" action="<?php echo site_url('Transactions/edit_water');?>" class="justify" style="width: 100%;margin: 0 auto;">
                        <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">Current rate per m<sup>3</sup></label></div>
                                        <div class="col-xl-12" style="font-weight: normal;"><input name="" class="form-control" type="number" value="<?php foreach($cm->result() as $cmm) { echo number_format($cmm->wsetting_value, 2); } ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;" required>New rate</label></div>
                                        <div class="col-xl-12">
                                            <input name="wsetting_value" class="form-control" type="number" min="0" placeholder="Enter new rate of water">  
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script>

// $(document).ready(function () {
    <?php foreach($room->result() as $row3) { ?>
    $("#cur<?php echo $row3->room_id; ?>").keyup(function() {
        var wb = ($("#cur<?php echo $row3->room_id; ?>").val()-$("#pre<?php echo $row3->room_id; ?>").val())*$("#cm<?php echo $row3->room_id; ?>").val();
        var pt = (wb / $("#aa<?php echo $row3->room_id; ?>").val());
        $("#wb<?php echo $row3->room_id; ?>").val(wb);
        $("#pt<?php echo $row3->room_id; ?>").val(pt);
        var res1 = addCommas(wb);
        var res2 = addCommas(pt);
        $("#wbn<?php echo $row3->room_id; ?>").val(res1);
        $("#ptn<?php echo $row3->room_id; ?>").val(res2);
    });

    
   // $("#ecur<?php echo $row3->room_id; ?>").keyup(function() {
        $("#ewb<?php echo $row3->room_id; ?>").val(($("#ecur<?php echo $row3->room_id; ?>").val()-$("#epre<?php echo $row3->room_id; ?>").val())*$("#ecm<?php echo $row3->room_id; ?>").val());
        $("#ept<?php echo $row3->room_id; ?>").val($("#ewb<?php echo $row3->room_id; ?>").val() / $("#eaa<?php echo $row3->room_id; ?>").val());
    //});
    $("#ecur<?php echo $row3->room_id; ?>").keyup(function() {
        $("#ewb<?php echo $row3->room_id; ?>").val(($("#ecur<?php echo $row3->room_id; ?>").val()-$("#epre<?php echo $row3->room_id; ?>").val())*$("#ecm<?php echo $row3->room_id; ?>").val());
        $("#ept<?php echo $row3->room_id; ?>").val($("#ewb<?php echo $row3->room_id; ?>").val() / $("#eaa<?php echo $row3->room_id; ?>").val());
    });
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return (x1 + x2);
    }
    <?php } ?>
// });


</script>

    <script>
        $(document).ready(function(){
        
            function load_unseen_notification(view = '') {
                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/Notifications/fetch_notif",
                    method:"POST",
                    data:{view:view},
                    dataType:"json",
                    success:function(data) {

                        $('.dropdown-menu').html(data.notification);
                        if(data.unseen_notification > 0) {

                            $('.count').html(data.unseen_notification);

                        }
                        
                    }
                });
            }
            
            load_unseen_notification();
            
            $(document).on('click', '.dropdown-toggle', function(){

                $('.count').html('');
                load_unseen_notification('yes');

            });
            
            setInterval(function(){ 
                load_unseen_notification();; 
            }, 5000);
        
        });
    </script>

</body>

</html>