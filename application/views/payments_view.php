<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $login = $this->session->userdata('login_success');
    if (!isset ($login)) {
        redirect('Login');
    }

$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
$abill = $this->session->userdata['login_success']['info']['adcontrol_bills'];
    // $a="";
    // if($abill[2] == 1) { //add
    //     $a = "";
    // } else {
    //     $a = "visibility:hidden;";
    // } 


?>
<style>
.form-control {
    font-size: 14px;
    height:35px;
}

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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
  
  $(document).ready(function(){
      <?php foreach($dir->result() as $edit) { ?>
          $('.rcheck<?php echo $edit->dir_id; ?>').hide();
          $('.wcheck<?php echo $edit->dir_id; ?>').hide();
          $('.fcheck<?php echo $edit->dir_id; ?>').hide();
            $('#rt<?php echo $edit->dir_id; ?>').change(function () {
                if ($(this).val() == '1') {
                    $('.rcheck<?php echo $edit->dir_id; ?>').show();
                } else {
                    $('.rcheck<?php echo $edit->dir_id; ?>').hide();
                }
            });
            $('#wt<?php echo $edit->dir_id; ?>').change(function () {
                if ($(this).val() == '1') {
                    $('.wcheck<?php echo $edit->dir_id; ?>').show();
                } else {
                    $('.wcheck<?php echo $edit->dir_id; ?>').hide();
                }
            });
            $('#ft<?php echo $edit->dir_id; ?>').change(function () {
                if ($(this).val() == '1') {
                    $('.fcheck<?php echo $edit->dir_id; ?>').show();
                } else {
                    $('.fcheck<?php echo $edit->dir_id; ?>').hide();
                }
            });
         
       <?php } ?>
      
          $('.chk_boxes').click(function() {
              $('.chk_boxes1').prop('checked', this.checked);
          });
          
      
  });
</script>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Payments</p>
                    <p class="d-none d-lg-block align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" style="margin-top: 0px;padding-right: 0px;padding-left:0px;">
                        <p class="mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size:14px;margin-bottom:0px;width:100%"><span><b>Legend: </b></span>&nbsp;&nbsp;&nbsp;
                            <i class="fas fa-key" style="font-size:17px;"></i> - Rent &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-waterdrop" style="font-size:19px;"></i> - Water &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-locked" style="font-size:19px;"></i> - Deposit and Advance Fees 
                        
                        </p>
                    </div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
            </div>
            <div class="row" style="margin-top: 5px;margin-left:0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                    
                    <div id="table_view" class="table-responsive" style="width:100%; ">
                        <table class="table" id="example" style="font-size:14px; text-align:center;">
                            <thead class="logs">
                                <tr style="text-align:center">
                                    <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Name of Tenant</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Rent Bill</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Water Bill</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Deposit and Advance</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dir->result() as $tenant) {
                                    
                                    

                                    $rentdue=0;
                                    foreach ($rent->result() as $r) {
                                        if ($r->tenant_id == $tenant->tenant_id) {
                                            if($r->rent_status == 0) {
                                                $rentdue += $r->rent_balance;
                                            }}}
                                    $wdue=0;
                                    foreach ($water->result() as $wd) {
                                        if ($wd->tenant_id == $tenant->tenant_id) {
                                            if($wd->water_status == 0) {
                                                $wdue += $wd->water_balance;
                                            }}}
                                    
                                    $ddue=0;
                                    foreach ($deposit->result() as $dd) {
                                        if ($dd->tenant_id == $tenant->tenant_id) {
                                            if($dd->deposit_status == 0) {
                                                $ddue += $dd->deposit_balance;
                                            }}}

                                    $adue=0;
                                    foreach ($advance->result() as $ad) {
                                        if ($ad->tenant_id == $tenant->tenant_id) {
                                            if($ad->advance_status == 0) {
                                                $adue += $ad->advance_balance;
                                            }}}
                                    $fdue = $ddue + $adue;
                                    if($rentdue > 0 || $wdue > 0 || $fdue > 0) {
                                ?>
                                
                                    <tr>
                                        
                                        <td><?php echo $tenant->room_number; ?></td>
                                        <td><?php echo $tenant->tenant_fname ." ". $tenant->tenant_lname; ?></td>

                                        
                                        <td style="text-align:center"><?php echo number_format($rentdue,2) ; ?></td>
                                        <td style="text-align:center"><?php echo number_format($wdue,2) ; ?></td>
                                        <td style="text-align:center"><?php echo number_format($fdue,2) ; ?></td>
                                        <td style="text-align:center;">
                                            <button <?php if($abill[3] == 1) { echo 'title="Open Rent"'; }  else { echo "disabled title='This feature is not available on your account.'" ;} if($rentdue == 0) {echo "disabled";} ?> type="button" id="edit-tenant" data-toggle="modal" data-target="#Rent<?php echo $tenant->dir_id; ?>" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                <i class="fas fa-key" style="font-size:17px;color:#0645AD;"></i>
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button <?php if($abill[3] == 1) { echo 'title="Open Water"'; } else { echo "disabled title='This feature is not available on your account.'" ;} if($wdue == 0) {echo "disabled";} ?> type="button" id="edit-tenant" data-target="#Water<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                <i class="icon ion-waterdrop" style="font-size:19px;color:#0645AD;"></i>
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button <?php if($abill[3] == 1) { echo 'title="Open Fees"'; } else { echo "disabled title='This feature is not available on your account.'" ;} if($fdue == 0) {echo "disabled";} ?> type="button" id="edit-tenant" data-target="#Fees<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                <i class="icon ion-locked" style="font-size:19px;color:#0645AD;"></i>
                                            </button>
                                        </td>  
                                    </tr>
                                <?php  }
                            } ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <?php foreach ($dir->result() as $tenant) { ?>
                    <div class="modal fade" role="dialog" tabindex="-1" id="Rent<?php echo $tenant->dir_id; ?>">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Rental Bill</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                <form method="POST" action="<?php echo site_url('Transactions/rent_payment');?>">
                                    <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <label class="col-form-label" style="font-weight: bold;" id="rent_label<?php echo $tenant->dir_id; ?>">Please confirm payment details. Submitted payments cannot be edited.</label>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col"><input class="form-control d-xl-flex" type="text" name="rrr" value="<?php echo $tenant->room_number; ?>" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Tenant Name</label></div>
                                                <div class="col"><input class="form-control" type="text" value="<?php echo $tenant->tenant_fname." ".$tenant->tenant_lname; ?>" readonly></div>
                                                <input class="form-control" type="hidden" name="rf" value="<?php echo $tenant->tenant_fname;?>">
                                                <input class="form-control" type="hidden" name="rtenant_id" id="r_tenantid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->tenant_id;?>">
                                                <input class="form-control" type="hidden" name="rr" id="r_roomid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->room_id;?>">
                                                <input class="form-control" type="hidden" name="rent_id[]" id="rid<?php echo $tenant->dir_id; ?>" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Receipt No</label></div>
                                                <div class="col"><input class="form-control" type="text" name="rtrans_rno" id="rtrans_rno<?php echo $tenant->dir_id; ?>" placeholder="Enter receipt no" required>
                                                <span id="error_rent<?php echo $tenant->dir_id; ?>"></span> </div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Payment for the month of</label></div>
                                                <div class="col">
                                                    <select class="form-control multiple-select" name="rm[]" id="rent_month<?php echo $tenant->dir_id; ?>" required>
                                                        <option value="">Select month</option>
                                                        <?php foreach($rent->result() as $unrent) {
                                                                if($unrent->tenant_id == $tenant->tenant_id) {
                                                                    echo '<option value="'.$unrent->rent_due.'">'.date('F', strtotime($unrent->rent_due)).'</option>';
                                                                }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Due</label></div>
                                                <div class="col"><input class="form-control" type="number" name="rtrans_due" style="text-align:right" id="rent_amount<?php echo $tenant->dir_id; ?>" value="0" readonly>
                                                <input class="form-control" type="text"  style="text-align:right" id="rent_amountn<?php echo $tenant->dir_id; ?>" value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">To pay</label></div>
                                                <div class="col">
                                                    <select class="form-control" name="rtrans_mode" id="rt<?php echo $tenant->dir_id; ?>">
                                                    
                                                        <option value="0">Cash</option>
                                                        <option value="1">Check</option>
                                                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check No</label></div>
                                                <div class="col"><input class="form-control" name="rcheck_no" id="rcheck_no<?php echo $tenant->dir_id; ?>" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Bank</label></div>
                                                <div class="col"><input class="form-control" name="rcheck_bank"  id="rcheck_bank<?php echo $tenant->dir_id; ?>" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check Date</label></div>
                                                <div class="col"><input class="form-control" name="rcheck_date"  id="rcheck_date<?php echo $tenant->dir_id; ?>" style="text-align:right"  type="date"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" id="rent_paid<?php echo $tenant->dir_id; ?>" style="text-align:right" type="text" required></div>
                                                <input class="form-control" name="rtarns_arr[]" id="rArr<?php echo $tenant->dir_id; ?>" style="text-align:right" type="hidden">
                                                <input class="form-control" name="rtrans_amount" id="rent_paidd<?php echo $tenant->dir_id; ?>" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <input type="hidden" name="to_email" value="<?php echo $tenant->tenant_email; ?>" />
                                    <input type="hidden" name="to_guardianemail" value="<?php echo $tenant->guardian_email; ?>" />
                                    <div class="modal-footer">
                                    <button class="btn btn-primary" type="button" id="rentBtn<?php echo $tenant->dir_id; ?>" style="background-color: #bdedc1;color: #11334f;border: none;">Submit</button>
                                    <button class="btn btn-primary" type="button" id="rentBack<?php echo $tenant->dir_id; ?>" style="background-color: #c7c7c7;color: #11334f;border: none;">Back</button>
                                    <button class="btn btn-primary" type="submit" id="rentSend<?php echo $tenant->dir_id; ?>" style="background-color: #bdedc1;color: #11334f;border: none;">Save and send E-receipt</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php foreach ($dir->result() as $tenant) { ?>
                    <div class="modal fade" role="dialog" tabindex="-1" id="Water<?php echo $tenant->dir_id; ?>">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Water Bill</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                <form method="POST" action="<?php echo site_url('Transactions/water_payment');?>">
                                    <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                    <label class="col-form-label" style="font-weight: bold;" id="water_label<?php echo $tenant->dir_id; ?>">Please confirm payment details. Submitted payments cannot be edited.</label>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col"><input class="form-control d-xl-flex" type="text" name="wr" value="<?php echo $tenant->room_number; ?>" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Tenant Name</label></div>
                                                <div class="col"><input class="form-control" type="text" value="<?php echo $tenant->tenant_fname." ".$tenant->tenant_lname; ?>" disabled=""></div>
                                                <input class="form-control" type="hidden" name="wf"  value="<?php echo $tenant->tenant_fname;?>">
                                                <input class="form-control" type="hidden" name="wl" value="<?php echo $tenant->tenant_lname;?>">
                                                <input class="form-control" type="hidden" name="wtenant_id" id="w_tenantid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->tenant_id;?>">
                                                <input class="form-control" type="hidden" name="ww" id="w_roomid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->room_id;?>">
                                                <input class="form-control" type="hidden" name="water_id[]" id="wid<?php echo $tenant->dir_id; ?>" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Receipt No</label></div>
                                                <div class="col"><input class="form-control" type="text" name="wtrans_rno" id="wtrans_rno<?php echo $tenant->dir_id; ?>" placeholder="Enter receipt no" required>
                                                <span id="error_water<?php echo $tenant->dir_id; ?>"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Payment for the month of</label></div>
                                                <div class="col">
                                                    <select class="form-control multiple-select" name="payment[]" id="sel_payment<?php echo $tenant->dir_id; ?>" required>
                                                        <option value="">Select month</option>
                                                        <?php foreach($water->result() as $unpaid) {
                                                                if($unpaid->tenant_id == $tenant->tenant_id) {
                                                                    echo '<option value="'.$unpaid->water_due.'">'.date('F', strtotime($unpaid->water_due)).'</option>';
                                                                }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Due</label></div>
                                                <div class="col"><input class="form-control" type="number" style="text-align:right" name="wtrans_due" id="sel_amount<?php echo $tenant->dir_id; ?>" value="" readonly>
                                                <input class="form-control" type="text"  style="text-align:right" id="water_amountn<?php echo $tenant->dir_id; ?>" value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">To pay</label></div>
                                                <div class="col">
                                                    <select class="form-control" name="wtrans_mode" id="wt<?php echo $tenant->dir_id; ?>">
                                                        <option value="0">Cash</option>
                                                        <option value="1">Check</option>
                                                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check No</label></div>
                                                <div class="col"><input class="form-control" name="wcheck_no" id="wcheck_no<?php echo $tenant->dir_id; ?> style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Bank</label></div>
                                                <div class="col"><input class="form-control" name="wcheck_bank" id="wcheck_bank<?php echo $tenant->dir_id; ?> style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check Date</label></div>
                                                <div class="col"><input class="form-control" name="wcheck_date" id="wcheck_date<?php echo $tenant->dir_id; ?> style="text-align:right"  type="date"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" style="text-align:right" id="water_paid<?php echo $tenant->dir_id; ?>" type="text" required></div>
                                                <input class="form-control" name="wtarns_arr[]" id="wArr<?php echo $tenant->dir_id; ?>" style="text-align:right" type="hidden">
                                                <input class="form-control" name="wtrans_amount" id="water_paidd<?php echo $tenant->dir_id; ?>" style="text-align:right" type="hidden" required>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <input type="hidden" name="to_email" value="<?php echo $tenant->tenant_email; ?>" />
                                    <input type="hidden" name="to_guardianemail" value="<?php echo $tenant->guardian_email; ?>" />
                                    <div class="modal-footer">
                                    <button class="btn btn-primary" type="button" id="waterBtn<?php echo $tenant->dir_id; ?>" style="background-color: #bdedc1;color: #11334f;border: none;">Submit</button>
                                    <button class="btn btn-primary" type="button" id="waterBack<?php echo $tenant->dir_id; ?>" style="background-color: #c7c7c7;color: #11334f;border: none;">Back</button>
                                    <button class="btn btn-primary" type="submit" id="waterSend<?php echo $tenant->dir_id; ?>" style="background-color: #bdedc1;color: #11334f;border: none;">Save and send E-receipt</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php foreach ($dir->result() as $tenant) { ?>
                    <div class="modal fade" role="dialog" tabindex="-1" id="Fees<?php echo $tenant->dir_id; ?>">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Deposit and Advance Fees</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                <form method="POST" action="<?php echo site_url('Transactions/fees_payment');?>">
                                    <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                    <label class="col-form-label" style="font-weight: bold;" id="fee_label<?php echo $tenant->dir_id; ?>">Please confirm payment details. Submitted payments cannot be edited.</label>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col"><input class="form-control d-xl-flex" type="text" name="rr" value="<?php echo $tenant->room_number; ?>" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Tenant Name</label></div>
                                                <div class="col"><input class="form-control" type="text" value="<?php echo $tenant->tenant_fname." ".$tenant->tenant_lname; ?>" disabled=""></div>
                                                <input class="form-control" type="hidden" name="ff" value="<?php echo $tenant->tenant_fname;?>">
                                                <input class="form-control" type="hidden" name="ftenant_id" id="f_tenantid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->tenant_id;?>">
                                                <input class="form-control" type="hidden" name="ff" id="f_roomid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->room_id;?>">
                                                <input class="form-control" type="hidden" name="fee_id[]" id="fid<?php echo $tenant->dir_id; ?>" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Receipt No</label></div>
                                                <div class="col"><input class="form-control" type="text" name="ftrans_rno" id="ftrans_rno<?php echo $tenant->dir_id; ?>" placeholder="Enter receipt no" required>
                                                <span id="error_fee<?php echo $tenant->dir_id; ?>"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Payment for</label></div>
                                                <div class="col">
                                                    <select class="form-control multiple-select" name="fee[]" id="fad<?php echo $tenant->dir_id; ?>" required>
                                                        <option value="">Select fee</option>
                                                        <?php foreach($fee->result() as $f) {
                                                            if ($f->fee_id == 1) {
                                                                foreach ($advance->result() as $ad) {
                                                                    if ($ad->tenant_id == $tenant->tenant_id) {
                                                                        if($ad->advance_status == 0) {
                                                                            echo '<option value="'.$f->fee_id.'">'.$f->fee_name.'</option>';
                                                                        }}}
                                                            } else if ($f->fee_id == 2) {
                                                            foreach ($deposit->result() as $dd) {
                                                                if ($dd->tenant_id == $tenant->tenant_id) {
                                                                    if($dd->deposit_status == 0) {
                                                                        echo '<option value="'.$f->fee_id.'">'.$f->fee_name.'</option>';
                                                                    }}}
                        
                                                            }
                                                                    
                                                            
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Due</label></div>
                                                <div class="col"><input class="form-control" type="number" name="ftrans_due" style="text-align:right" id="fee_amount<?php echo $tenant->dir_id; ?>" value="" readonly>
                                                <input class="form-control" type="text"  style="text-align:right" id="fee_amountn<?php echo $tenant->dir_id; ?>" value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">To pay</label></div>
                                                <div class="col">
                                                    <select class="form-control" name="ftrans_mode" id="ft<?php echo $tenant->dir_id; ?>">
                                                    
                                                        <option value="0">Cash</option>
                                                        <option value="1">Check</option>
                                                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group fcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check No</label></div>
                                                <div class="col"><input class="form-control" name="fcheck_no" id="fcheck_no<?php echo $tenant->dir_id; ?>" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group fcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Bank</label></div>
                                                <div class="col"><input class="form-control" name="fcheck_bank" id="fcheck_bank<?php echo $tenant->dir_id; ?>" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group fcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check Date</label></div>
                                                <div class="col"><input class="form-control" name="fcheck_date" id="fcheck_date<?php echo $tenant->dir_id; ?>" style="text-align:right"  type="date"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" id="f_paid<?php echo $tenant->dir_id; ?>" style="text-align:right" type="text" required></div>
                                                <input class="form-control" name="ftarns_arr[]" id="fArr<?php echo $tenant->dir_id; ?>" style="text-align:right" type="hidden">
                                                <input class="form-control" name="ftrans_amount" id="f_paidd<?php echo $tenant->dir_id; ?>" style="text-align:right" type="hidden" required>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <input type="hidden" name="to_email" value="<?php echo $tenant->tenant_email; ?>" />
                                    <input type="hidden" name="to_guardianemail" value="<?php echo $tenant->guardian_email; ?>" />
                                    <div class="modal-footer">
                                    <button class="btn btn-primary" type="button" id="feeBtn<?php echo $tenant->dir_id; ?>" style="background-color: #bdedc1;color: #11334f;border: none;">Submit</button>
                                    <button class="btn btn-primary" type="button" id="feeBack<?php echo $tenant->dir_id; ?>" style="background-color: #c7c7c7;color: #11334f;border: none;">Back</button>
                                    <button class="btn btn-primary" type="submit" id="feeSend<?php echo $tenant->dir_id; ?>" style="background-color: #bdedc1;color: #11334f;border: none;">Save and send E-receipt</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
            </div>
        </div>
        <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/selectize/standalone/selectize.min.js"></script>
    <script>

         

        $(document).ready(function(){
            <?php foreach($dir->result() as $d) { ?>
            $('#rentBack<?php echo $d->dir_id; ?>').hide();
            $('#rentSend<?php echo $d->dir_id; ?>').hide();
            $('#rent_label<?php echo $d->dir_id; ?>').hide();
            $('#waterBack<?php echo $d->dir_id; ?>').hide();
            $('#waterSend<?php echo $d->dir_id; ?>').hide();
            $('#water_label<?php echo $d->dir_id; ?>').hide();
            $('#feeBack<?php echo $d->dir_id; ?>').hide();
            $('#feeSend<?php echo $d->dir_id; ?>').hide();
            $('#fee_label<?php echo $d->dir_id; ?>').hide();
            $('#sel_payment<?php echo $d->dir_id; ?>').selectize({
                maxItems: null,
                create: false,
            });
            $('#sel_payment<?php echo $d->dir_id; ?>').change(function(){
                var month = $('#sel_payment<?php echo $d->dir_id; ?>').val();
                var tenant = $('#w_tenantid<?php echo $d->dir_id; ?>').val();
                var room = $('#w_roomid<?php echo $d->dir_id; ?>').val();
                if(month != '' && tenant != '' && room != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Transactions/amount_due",
                        method:"POST",
                        // contentType: "application/json; charset=utf-8",
                        // dataType:'json',
                        data:{month:month, tenant:tenant, room:room},
                        success:function(data) {
                            $.each(data, function (i, obj) {
                                $('#sel_amount<?php echo $d->dir_id; ?>').val(data.wt);
                                $('#water_amountn<?php echo $d->dir_id; ?>').val(data.wn);   
                                $('#wid<?php echo $d->dir_id; ?>').val(data.wi); 
                                //$('#wArr<?php echo $d->dir_id; ?>').val(data.wa);
                            });
                        
                        }
                    });
                } else {
                    $('#sel_amount<?php echo $d->dir_id; ?>').val(0);
                }
            });
            
            $('#rent_month<?php echo $d->dir_id; ?>').selectize({
                maxItems: null,
                create: false,
            });
            $('#rent_month<?php echo $d->dir_id; ?>').change(function(){
                var m = $('#rent_month<?php echo $d->dir_id; ?>').val();
                var t = $('#r_tenantid<?php echo $d->dir_id; ?>').val();
                var r = $('#r_roomid<?php echo $d->dir_id; ?>').val();
                if(m != '' && t != '' && r != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Transactions/rent_due",
                        method:"POST",
                        data:{m:m, t:t, r:r},
                        // contentType: "application/json; charset=utf-8",
                        // dataType: "json",  
                        success:function(data) {
                            $.each(data, function (i, obj) {
                                $('#rent_amount<?php echo $d->dir_id; ?>').val(data.rt); 
                                $('#rent_amountn<?php echo $d->dir_id; ?>').val(data.rn);                               
                                $('#rid<?php echo $d->dir_id; ?>').val(data.ri);
                                $('#rArr<?php echo $d->dir_id; ?>').val(data.ra);
                            });
                        
                        }

                        
                    });
                } else {
                    $('#rent_amount<?php echo $d->dir_id; ?>').val(0);
                }
                    
            });

            $('#rtrans_rno<?php echo $d->dir_id; ?>').keyup(function(){
                var rno = $('#rtrans_rno<?php echo $d->dir_id; ?>').val();
                if(rno != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Transactions/check_rno",
                        method:"POST",
                        data:{rno:rno},
                        success:function(data) {
                            if(data == "yes") {
                                $('#error_rent<?php echo $d->dir_id; ?>').html('<label class="text-danger"><span style="font-size:14px"><i class="fa fa-times" aria-hidden="true"></i> Receipt number already in use.</span></label>');
                                $('#rentBtn<?php echo $d->dir_id; ?>').attr('disabled', 'disabled');
                            } else if (data == "no") {
                                $('#error_rent<?php echo $d->dir_id; ?>').html('<label class="text-success"><span style="font-size:14px"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Receipt number is available</span></label>');
                                $('#rentBtn<?php echo $d->dir_id; ?>').removeAttr("disabled");
                            }
                        }
                    });
                } else {
                    $('#error_rent<?php echo $d->dir_id; ?>').html("");
                }
            });

            $('#wtrans_rno<?php echo $d->dir_id; ?>').keyup(function(){
                var wno = $('#wtrans_rno<?php echo $d->dir_id; ?>').val();
                if(wno != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Transactions/check_wno",
                        method:"POST",
                        data:{wno:wno},
                        success:function(data) {
                            if(data == "yes") {
                                $('#error_water<?php echo $d->dir_id; ?>').html('<label class="text-danger"><span style="font-size:14px"><i class="fa fa-times" aria-hidden="true"></i> Receipt number already in use.</span></label>');
                                $('#waterBtn<?php echo $d->dir_id; ?>').attr('disabled', 'disabled');
                            } else if (data == "no") {
                                $('#error_water<?php echo $d->dir_id; ?>').html('<label class="text-success"><span style="font-size:14px"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Receipt number is available</span></label>');
                                $('#waterBtn<?php echo $d->dir_id; ?>').removeAttr("disabled");
                            }
                        }
                    });
                } else {
                    $('#error_water<?php echo $d->dir_id; ?>').html("");
                }
            });

            $('#ftrans_rno<?php echo $d->dir_id; ?>').keyup(function(){
                var fno = $('#ftrans_rno<?php echo $d->dir_id; ?>').val();
                if(fno != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Transactions/check_fno",
                        method:"POST",
                        data:{fno:fno},
                        success:function(data) {
                            if(data == "yes") {
                                $('#error_fee<?php echo $d->dir_id; ?>').html('<label class="text-danger"><span style="font-size:14px"><i class="fa fa-times" aria-hidden="true"></i> Receipt number already in use.</span></label>');
                                $('#feeBtn<?php echo $d->dir_id; ?>').attr('disabled', 'disabled');
                            } else if (data == "no") {
                                $('#error_fee<?php echo $d->dir_id; ?>').html('<label class="text-success"><span style="font-size:14px"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Receipt number is available</span></label>');
                                $('#feeBtn<?php echo $d->dir_id; ?>').removeAttr("disabled");
                            }
                        }
                    });
                } else {
                    $('#error_fee<?php echo $d->dir_id; ?>').html("");
                }
            });

            $('#rent_paid<?php echo $d->dir_id; ?>').keyup(function(event) {
                // 1.
                
                if (event.which >= 37 && event.which <= 40) {
                    event.preventDefault();
                }

                var currentVal = $(this).val();
                var testDecimal = testDecimals(currentVal);
                if (testDecimal.length > 1) {
                    console.log("You cannot enter more than one decimal point");
                    currentVal = currentVal.slice(0, -1);
                }
                $(this).val(replaceCommas(currentVal));

                var myStr = $(this).val();
                myStr = myStr.replace(/,/g, "");
                $('#rent_paidd<?php echo $d->dir_id; ?>').val(myStr);
            });
            $('#water_paid<?php echo $d->dir_id; ?>').keyup(function(event) {
                // 1.
                if (event.which >= 37 && event.which <= 40) {
                    event.preventDefault();
                }

                var currentVal = $(this).val();
                var testDecimal = testDecimals(currentVal);
                if (testDecimal.length > 1) {
                    console.log("You cannot enter more than one decimal point");
                    currentVal = currentVal.slice(0, -1);
                }
                $(this).val(replaceCommas(currentVal));

                var myStr = $(this).val();
                myStr = myStr.replace(/,/g, "");
                $('#water_paidd<?php echo $d->dir_id; ?>').val(myStr);
            });
            $('#f_paid<?php echo $d->dir_id; ?>').keyup(function(event) {
                // 1.
                if (event.which >= 37 && event.which <= 40) {
                    event.preventDefault();
                }

                var currentVal = $(this).val();
                var testDecimal = testDecimals(currentVal);
                if (testDecimal.length > 1) {
                    console.log("You cannot enter more than one decimal point");
                    currentVal = currentVal.slice(0, -1);
                }
                $(this).val(replaceCommas(currentVal));

                var myStr = $(this).val();
                myStr = myStr.replace(/,/g, "");
                $('#f_paidd<?php echo $d->dir_id; ?>').val(myStr);
            });

            function testDecimals(currentVal) {
                var count;
                currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g);
                return count;
            }

            function replaceCommas(yourNumber) {
                var components = yourNumber.toString().split(".");
                if (components.length === 1)
                    components[0] = yourNumber;
                components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                if (components.length === 2)
                    components[1] = components[1].replace(/\D/g, "");
                return components.join(".");
            }
            
            $('#fad<?php echo $d->dir_id; ?>').selectize({
                maxItems: null,
                create: false,
            });
            $('#fad<?php echo $d->dir_id; ?>').change(function(){
                var fee = $('#fad<?php echo $d->dir_id; ?>').val();
                var tenant = $('#f_tenantid<?php echo $d->dir_id; ?>').val();
                var room = $('#f_roomid<?php echo $d->dir_id; ?>').val();
                if(fee != '' && tenant != '' && room != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Transactions/fee_due",
                        method:"POST",
                        // contentType: "application/json; charset=utf-8",
                        // dataType:'json',
                        data:{fee:fee, tenant:tenant, room:room},
                        success:function(data) {
                            $.each(data, function (i, obj) {
                                $('#fee_amount<?php echo $d->dir_id; ?>').val(data.ft);
                                $('#fee_amountn<?php echo $d->dir_id; ?>').val(data.fn);   
                                $('#fid<?php echo $d->dir_id; ?>').val(data.fi); 
                                $('#fArr<?php echo $d->dir_id; ?>').val(data.fa);
                            });
                        
                        }
                    });
                } else {
                    $('#fee_amount<?php echo $d->dir_id; ?>').val(0);
                }
            });

            $("#rentBtn<?php echo $d->dir_id; ?>" ).click(function() {
                $('#rtrans_rno<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#rent_month<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#rt<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#rcheck_no<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#rcheck_bank<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#rcheck_date<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#rent_paid<?php echo $d->dir_id; ?>').prop('readonly', true);
                $("#rentBtn<?php echo $d->dir_id; ?>" ).hide();
                $("#rentBack<?php echo $d->dir_id; ?>" ).show();
                $("#rentSend<?php echo $d->dir_id; ?>" ).show();
                $("#rent_label<?php echo $d->dir_id; ?>" ).show();
            });

            $("#rentBack<?php echo $d->dir_id; ?>" ).click(function() {
                $('#rtrans_rno<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#rent_month<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#rt<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#rcheck_no<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#rcheck_bank<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#rcheck_date<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#rent_paid<?php echo $d->dir_id; ?>').prop('readonly', false);
                $("#rentBtn<?php echo $d->dir_id; ?>" ).show();
                $("#rentBack<?php echo $d->dir_id; ?>" ).hide();
                $("#rentSend<?php echo $d->dir_id; ?>" ).hide();
                $("#rent_label<?php echo $d->dir_id; ?>" ).hide();
            });

            $("#waterBtn<?php echo $d->dir_id; ?>" ).click(function() {
                $('#wtrans_rno<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#sel_payment<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#wt<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#wcheck_no<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#wcheck_bank<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#wcheck_date<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#water_paid<?php echo $d->dir_id; ?>').prop('readonly', true);
                $("#waterBtn<?php echo $d->dir_id; ?>" ).hide();
                $("#waterBack<?php echo $d->dir_id; ?>" ).show();
                $("#waterSend<?php echo $d->dir_id; ?>" ).show();
                $("#water_label<?php echo $d->dir_id; ?>" ).show();
            });

            $("#waterBack<?php echo $d->dir_id; ?>" ).click(function() {
                $('#wtrans_rno<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#sel_payment<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#wt<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#wcheck_no<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#wcheck_bank<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#wcheck_date<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#water_paid<?php echo $d->dir_id; ?>').prop('readonly', false);
                $("#waterBtn<?php echo $d->dir_id; ?>" ).show();
                $("#waterBack<?php echo $d->dir_id; ?>" ).hide();
                $("#waterSend<?php echo $d->dir_id; ?>" ).hide();
                $("#water_label<?php echo $d->dir_id; ?>" ).hide();
            });

            $("#feeBtn<?php echo $d->dir_id; ?>" ).click(function() {
                $('#ftrans_rno<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#fad<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#ft<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#fcheck_no<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#fcheck_bank<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#fcheck_date<?php echo $d->dir_id; ?>').prop('readonly', true);
                $('#f_paid<?php echo $d->dir_id; ?>').prop('readonly', true);
                $("#feeBtn<?php echo $d->dir_id; ?>" ).hide();
                $("#feeBack<?php echo $d->dir_id; ?>" ).show();
                $("#feeSend<?php echo $d->dir_id; ?>" ).show();
                $("#fee_label<?php echo $d->dir_id; ?>" ).show();
            });

            $("#feeBack<?php echo $d->dir_id; ?>" ).click(function() {
                $('#ftrans_rno<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#fad<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#ft<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#fcheck_no<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#fcheck_bank<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#fcheck_date<?php echo $d->dir_id; ?>').prop('readonly', false);
                $('#f_paid<?php echo $d->dir_id; ?>').prop('readonly', false);
                $("#feeBtn<?php echo $d->dir_id; ?>" ).show();
                $("#feeBack<?php echo $d->dir_id; ?>" ).hide();
                $("#feeSend<?php echo $d->dir_id; ?>" ).hide();
                $("#fee_label<?php echo $d->dir_id; ?>" ).hide();
            });
           
            <?php } ?>
        });
       

</script>
</body>

</html>