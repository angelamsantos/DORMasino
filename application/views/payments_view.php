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
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
  
  $(document).ready(function(){
      <?php foreach($dir->result() as $edit) { ?>
          $('.rcheck<?php echo $edit->dir_id; ?>').hide();
          $('.wcheck<?php echo $edit->dir_id; ?>').hide();
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
                            <i class="icon ion-waterdrop" style="font-size:19px;"></i> - Water 
                        
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
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dir->result() as $tenant) {
                                    
                                    $a = strtotime($tenant->contract_start);
                                    $due = date('Y-m-d', strtotime('+1 year' ,$a)); 
                                    $now = new DateTime(date("y-m-d")); // or your date as well
                                    $your_date = new DateTime($due);
                                    $datediff = $now->diff($your_date);
                                ?>
                                
                                    <tr>
                                        
                                        <td><?php echo $tenant->room_number; ?></td>
                                        <td><?php echo $tenant->tenant_fname ." ". $tenant->tenant_lname; ?></td>

                                        <?php 
                                        $rentdue=0;
                                        foreach ($rent->result() as $r) {
                                            if ($r->tenant_id == $tenant->tenant_id) {
                                                if($r->rent_status == 0) {
                                                    $rentdue += $r->rent_balance;
                                                }}}
                                                ?>
                                        <td style="text-align:center"><?php echo number_format($rentdue,2) ; ?></td>
                                            

                                        <?php 
                                        $wdue=0;
                                        foreach ($water->result() as $wd) {
                                            if ($wd->tenant_id == $tenant->tenant_id) {
                                                if($wd->water_status == 0) {
                                                    $wdue += $wd->water_balance;
                                                }}}
                                                ?>
                                        <td style="text-align:center"><?php echo number_format($wdue,2) ; ?></td>
                                        <td style="text-align:center;">
                                            <button <?php if($abill[3] == 1) { echo 'title="Open Rent"'; } else { echo "disabled title='This feature is not available on your account.'" ;} ?> type="button" id="edit-tenant" data-toggle="modal" data-target="#Rent<?php echo $tenant->dir_id; ?>" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                <i class="fas fa-key" style="font-size:17px;color:#0645AD;"></i>
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button <?php if($abill[3] == 1) { echo 'title="Open Water"'; } else { echo "disabled title='This feature is not available on your account.'" ;} ?> type="button" id="edit-tenant" data-target="#Water<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                <i class="icon ion-waterdrop" style="font-size:19px;color:#0645AD;"></i>
                                            </button>
                                        </td>  
                                    </tr>
                                <?php } ?>
                                
                                
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
                                                <input class="form-control" type="hidden" name="rf" value="<?php echo $tenant->tenant_fname;?>">
                                                <input class="form-control" type="hidden" name="rtenant_id" id="r_tenantid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->tenant_id;?>">
                                                <input class="form-control" type="hidden" name="rr" id="r_roomid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->room_id;?>">
                                                <input class="form-control" type="hidden" name="rent_id[]" id="rid<?php echo $tenant->dir_id; ?>" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Receipt No</label></div>
                                                <div class="col"><input class="form-control" type="text" name="rtrans_rno" placeholder="Enter receipt no"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Payment for the month of</label></div>
                                                <div class="col">
                                                    <select class="form-control multiple-select" name="rm[]" id="rent_month<?php echo $tenant->dir_id; ?>">
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
                                                <div class="col"><input class="form-control" type="number" name="rtrans_due" style="text-align:right" id="rent_amount<?php echo $tenant->dir_id; ?>" value="" readonly>
                                                
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
                                                <div class="col"><input class="form-control" name="rcheck_no" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Bank</label></div>
                                                <div class="col"><input class="form-control" name="rcheck_bank" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check Date</label></div>
                                                <div class="col"><input class="form-control" name="rcheck_date" style="text-align:right"  type="date"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" name="rtrans_amount" style="text-align:right" type="number"></div>
                                                <input class="form-control" name="rtarns_arr[]" id="rArr<?php echo $tenant->dir_id; ?>" style="text-align:right" type="hidden">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <input type="hidden" name="to_email" value="<?php echo $tenant->tenant_email; ?>" />
                                    <input type="hidden" name="to_guardianemail" value="<?php echo $tenant->guardian_email; ?>" />
                                    <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save and send E-receipt</button></div>
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
                                                <input class="form-control" type="hidden" name="wi" id="w_roomid<?php echo $tenant->dir_id; ?>" value="<?php echo $tenant->room_id;?>">
                                                <input class="form-control" type="hidden" name="water_id[]" id="wid<?php echo $tenant->dir_id; ?>" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Receipt No</label></div>
                                                <div class="col"><input class="form-control" type="text" name="wtrans_rno" placeholder="Enter receipt no" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Payment for the month of</label></div>
                                                <div class="col">
                                                    <select class="form-control multiple-select" name="payment[]" id="sel_payment<?php echo $tenant->dir_id; ?>">
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
                                                <div class="col"><input class="form-control" name="wcheck_no" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Bank</label></div>
                                                <div class="col"><input class="form-control" name="wcheck_bank" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check Date</label></div>
                                                <div class="col"><input class="form-control" name="wcheck_date" style="text-align:right"  type="date"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" name="wtrans_amount" style="text-align:right" type="number"></div>
                                                <input class="form-control" name="wtarns_arr[]" id="wArr<?php echo $tenant->dir_id; ?>" style="text-align:right" type="hidden">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <input type="hidden" name="to_email" value="<?php echo $tenant->tenant_email; ?>" />
                                    <input type="hidden" name="to_guardianemail" value="<?php echo $tenant->guardian_email; ?>" />
                                    <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save and send E-receipt</button></div>
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
   
    <?php foreach($dir->result() as $paid) { ?>
    $("#amount_paid<?php echo $paid->dir_id; ?>").keyup(function() {
        if ($("#amount_paid<?php echo $paid->dir_id; ?>").val() < $("#rent_amount<?php echo $paid->dir_id; ?>").val()) {
            $("#paid<?php echo $paid->dir_id; ?>").text("Payment is partial.");
        } 
        if ($("#amount_paid<?php echo $paid->dir_id; ?>").val() == $("#rent_amount<?php echo $paid->dir_id; ?>").val()) {
            $("#paid<?php echo $paid->dir_id; ?>").val("Payment is full.");
        }
    });
    <?php } ?>

        $(document).ready(function(){
            <?php foreach($dir->result() as $d) { ?>
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
                                $('#wid<?php echo $d->dir_id; ?>').val(data.wi);
                                $('#wArr<?php echo $d->dir_id; ?>').val(data.wa);
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
                                $('#rid<?php echo $d->dir_id; ?>').val(data.ri);
                                $('#rArr<?php echo $d->dir_id; ?>').val(data.ra);
                            });
                        
                        }
                    });
                } else {
                    $('#rent_amount<?php echo $d->dir_id; ?>').val(0);
                }
            });

           
            <?php } ?>
        });

</script>
</body>

</html>