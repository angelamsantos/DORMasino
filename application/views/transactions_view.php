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
    } else {
        $a = "disabled title='This feature is not available on your account.' ;";
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
                    <p class="d-none d-lg-block align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    
                </div>
                <div class="row mx-auto" style="margin-top: 10px;width:78%;">
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
                </div>    
                <div class="row mx-auto" style="margin-top: 10px;width:78%;">
                    <div class="col d-flex d-sm-flex d-md-flex d-xl-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end" style="margin-top: 0px;padding-right: 0px;">
                        <button class="btn btn-primary" <?php echo $a; ?> type="button" data-toggle="modal" data-target="#WaterSetting" style="background-color: #28a745;color: #ffffff;border: none;float:right;">Edit water setting</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;margin-left: 0px;margin-right: 0px;">
                
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;">
                        
                        <div id="table_view" class="table-responsive" style="width:80%;">
                            <table class="table" id="trans" style="font-size:14px;">
                                <thead class="logs">
                                    <tr style="text-align:center">
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">No of Tenants</th>
                                        <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Edit Billing Statement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($room->result() as $row) {
                                    
                                    ?>
                                    
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row->room_number; ?></td>
                                            <?php foreach($dir_count->result() as $d) {
                                                if ($d->room_number == $row->room_number) { ?>
                                                    <td style="text-align:center;"><?php echo $d->num_tenants; ?></td>
                                            <?php } } ?>
                                            
                                            
                                        
                                            <td style="text-align:center;">
                                                
                                                    <button <?php echo $a; ?> id="edit-room" data-target="#ModalBill<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                    <i class="icon ion-edit" style="font-size: 19px;color:#0645AD;"></i>
                                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;                                                                                   
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
            <!--Modal Billing statement -->
            <?php foreach ($room->result() as $row2) { ?>
            
        
            <div class="modal fade" role="dialog" tabindex="-1" id="ModalBill<?php echo $row2->room_id; ?>">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Edit Billing Statement: <?php echo $row2->room_number; ?></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                            <form method="POST" action="<?php echo site_url('Transactions/insert_bill');?>">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;">Basic Rent Charges</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Basic Rent Rate</label></div>
                                                <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format((int)$row2->room_price, 2); ?>" readonly></div>
                                                <input class="form-control" type="hidden" name="rent_rate" value="<?php echo $row2->room_price; ?>" >
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
                                                
                                                <input class="form-control" type="hidden" name="rrn" value="<?php echo $row2->room_number; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                                <div class="col"><input class="form-control" name="rc" type="text" value="<?php echo $row2->room_tcount; ?>" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {?>
                                                    <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Number of Tenants</label></div>
                                                    <div class="col"><input class="form-control" name="rnt" type="text" value="<?php echo $dc->num_tenants; ?>" readonly ></div>
                                                <?php }
                                                } ?>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Exceeded Capacity</label></div>
                                                            <div class="col"><input class="form-control" name="rex" type="text" value="Yes" readonly></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Exceeded Capacity</label></div>
                                                        <div class="col"><input class="form-control" type="text" name="rex" value="No" readonly  ></div>
                                                <?php } }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {
                                                            $excess = $dc->num_tenants -  $row2->room_tcount; ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Additional Tenants</label></div>
                                                            <div class="col"><input class="form-control" type="text" name="rat" value="<?php echo $excess ?>" readonly  ></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Additional Tenants</label></div>
                                                        <div class="col"><input class="form-control" type="text" name="rat" value="0" readonly ></div>
                                                <?php } }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {
                                                            $extra = ($dc->num_tenants -  $row2->room_tcount) * $row2->room_extra ; ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                                            <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format($extra, 2) ?>" readonly  ></div>
                                                            <input class="form-control" type="hidden" name="rent_extra" value="<?php echo $extra; ?>" >
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                                            <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format(0, 2) ?>" readonly ></div>
                                                        <input class="form-control" type="hidden" name="rent_extra" value="<?php echo 0; ?>" >
                                                <?php } }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                            <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {
                                                            $ex = ($dc->num_tenants -  $row2->room_tcount) * $row2->room_extra; 
                                                            $tr = $row2->room_price + $ex ;
                                                            $final = $tr / $dc->num_tenants ; ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Total Rent</label></div>
                                                            <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format($tr, 2) ?>" readonly  ></div>
                                                            <input class="form-control" type="hidden" name="rent_total" value="<?php echo $final; ?>" >
                                                        <?php } else if($dc->num_tenants > 0) { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Total Rent</label></div>
                                                        <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format((int)$row2->room_price, 2); ?>" readonly  ></div>
                                                        <input class="form-control" type="hidden" name="rent_total" value="<?php echo $row2->room_price / $dc->num_tenants; ?>" >
                                                        <?php } else if($dc->num_tenants = 0) { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Total Rent</label></div>
                                                        <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format((int)$row2->room_price, 2); ?>" readonly  ></div>
                                                        <input class="form-control" type="hidden" name="rent_total" value="<?php echo $row2->room_price; ?>" >
                                                <?php } }
                                            } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <?php 
                                                $rd = date('Y-m-d', strtotime('first day of next month'));
                                                ?>
                                                <div class="col"><input class="form-control" type="text" name="rent_due" value="<?php echo $rd ; ?>" readonly></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;">Utility Charges: Water</h6>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Provider</label></div>
                                                <div class="col"><input class="form-control" type="text" value="Maynilad" name="water_provider" readonly></div>
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
                                                </div>';
                                            }
                                            else {
                                                echo'<div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Previous Reading</label></div>
                                                <div class="col">
                                                    <input class="form-control" id="pre'.$row2->room_id.'" name="water_previous" style="text-align:right" type="number">
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
                                                <div class="col"><input class="form-control" id="cm<?php echo $row2->room_id; ?>" name="water_cm" type="number" style="text-align:right" value="<?php foreach($cm->result() as $cmm) { echo $cmm->wsetting_value; } ?>" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price of Water Bill</label></div>
                                                <div class="col"><input class="form-control" id="wb<?php echo $row2->room_id; ?>" name="" type="number" style="text-align:right" readonly></div>
                                            </div>
                                        </div>
                                        <?php foreach ($dir_count->result() as $nt) { 
                                                
                                                    if ($nt->room_id == $row2->room_id) {
                                                        $c = (int)$nt->num_tenants; ;?>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <input class="form-control" id="aa<?php echo $row2->room_id; ?>" value="<?php echo $c; ?>" type="hidden" style="text-align:right" readonly >
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Bill per tenant</label></div>
                                                <div class="col"><input class="form-control" id="pt<?php echo $row2->room_id; ?>" name="water_total" value="" type="number" style="text-align:right" readonly></div>
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
            <!--End Modal Billing statement-->  
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
            <div class="modal fade" role="dialog" tabindex="-1" id="BillConfirm">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Edit Billing Statement: <?php echo $rid; ?></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;">Basic Rent Charges</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Basic Rent Rate</label></div>
                                                <div class="col"><input class="form-control" name="rent_rate" style="text-align:right" type="text" value="<?php //echo //$rrt; ?>" readonly></div>
                                                <input class="form-control" type="hidden" name="room_id" value="<?php //echo //$rid; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                                <div class="col"><input class="form-control" name="rc" type="text" value="<?php //echo //$rc; ?>" readonly ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                            
                                                    <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Number of Tenants</label></div>
                                                    <div class="col"><input class="form-control" name="rnt" type="text" value="<?php //echo //$rnt; ?>" readonly></div>
                                                                                        
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Exceeded Capacity</label></div>
                                                            <div class="col"><input class="form-control" type="text"  value="<?php //echo// $rex; ?>" readonly ></div>
                                                    
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                            
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Additional Tenants</label></div>
                                                <div class="col"><input class="form-control" type="text"  value="<?php //echo //$rat ?>" readonly></div>
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                                <div class="col"><input class="form-control" style="text-align:right" name="rent_extra" type="text" value="<?php //echo //$rec ?>" readonly ></div>
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Total Rent</label></div>
                                                <div class="col"><input class="form-control" style="text-align:right" name="rent_total" type="text" value="<?php //echo //$rtr ?>" readonly ></div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                
                                                <div class="col"><input class="form-control" type="text" name="rent_due" value="<?php //echo //date('m/d/Y', strtotime('first day of next month')); ?>"readonly></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;">Utility Charges: Water</h6>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Provider</label></div>
                                                <div class="col"><input class="form-control" type="text" value="Maynilad" name="water_provider" readonly></div>
                                            </div>
                                        </div>
                                            
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Previous Reading</label></div>
                                                <div class="col">
                                                    <input class="form-control"  name="water_previous" style="text-align:right" type="number" value="<?php //echo //$pre; ?>" readonly>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Current Reading</label></div>
                                                <div class="col"><input class="form-control"  name="water_current" value="<?php //echo //$cur; ?>" style="text-align:right" type="number" style="text-align:right" required readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price per m<sup>3</sup></label></div>
                                                <div class="col"><input class="form-control" value="<?php $cm->wsetting_value; ?>" name="water_cm" type="number" style="text-align:right" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price of Water Bill</label></div>
                                                <div class="col"><input class="form-control" value="<?php //echo //$wb; ?>" name="water_bill" type="number" style="text-align:right" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Bill per tenant</label></div>
                                                <div class="col"><input class="form-control" value="<?php //echo //$pt; ?>" name="water_ptenant" value="" type="number" style="text-align:right" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <div class="col"><input class="form-control" type="date" value="<?php //echo //$wdt; ?>" name="water_due" required readonly></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" name="submitBill" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>

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
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">New rate</label></div>
                                        <div class="col-xl-12">
                                            <input name="wsetting_value" class="form-control" type="number" min="0">  
                                            
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
        $("#wb<?php echo $row3->room_id; ?>").val(($("#cur<?php echo $row3->room_id; ?>").val()-$("#pre<?php echo $row3->room_id; ?>").val())*$("#cm<?php echo $row3->room_id; ?>").val());
        $("#pt<?php echo $row3->room_id; ?>").val($("#wb<?php echo $row3->room_id; ?>").val() / $("#aa<?php echo $row3->room_id; ?>").val());
    });
    <?php } ?>
// });


</script>
</body>

</html>