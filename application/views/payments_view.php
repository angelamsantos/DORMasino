<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $login = $this->session->userdata('login_success');
    if (!isset ($login)) {
        redirect('Login');
    }

$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];


?>
<style>
.form-control {
    font-size: 14px;
    height:35px;
}
</style>
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
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Directories</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('message'))) echo $this->session->flashdata('message');?>
                    </div>
            </div>
            <div class="row" style="margin-top: 5px;margin-left:0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                    
                    <div id="table_view" class="table-responsive" style="width:100%; ">
                        <table class="table" id="example" style="font-size:14px;">
                            <thead class="logs">
                                <tr style="text-align:center">
                                    <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Name of Tenant</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Contract Period</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">No of months to pay</th>
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
                                        <td style="text-align:center"><?php echo $tenant->contract_start ." to ". $due ; ?></td>
                                        <?php if($datediff->days < 30 && $datediff->days > 10 ) { ?>
                                             <td style="color: orange;text-align:center"><?php echo $datediff->days ." days"; ?></td>
                                        <?php } else if ($datediff->days <= 10) { ?>
                                            <td style="color: red;text-align:center"><?php echo $datediff->days ." days"; ?></td>
                                        <?php } else { ?>
                                            <td style="text-align:center"><?php echo $datediff->days ." days"; ?></td>
                                        <?php } ?>
                                       
                                        <td style="text-align:center;">
                                            <button title="Open Rent" type="button" id="edit-tenant" data-toggle="modal" data-target="#Rent<?php echo $tenant->dir_id; ?>" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                <i class="fas fa-key" style="font-size:17px;color:#0645AD;"></i>
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button title="Change contract" type="button" id="edit-tenant" data-target="#Water<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
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
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Rental Bill</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <form>
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
                                                <input class="form-control" type="hidden" name="rl" value="<?php echo $tenant->tenant_lname;?>">
                                                <input class="form-control" type="hidden" name="ri" value="<?php echo $tenant->tenant_id;?>">
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Receipt No</label></div>
                                                <div class="col"><input class="form-control" type="text" name="rrn" placeholder="Enter receipt no" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Payment for the month of</label></div>
                                                <div class="col">
                                                    <select class="form-control" name="rm">
                                                        <option value="0">Cash</option>
                                                        <option value="1">Check</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Due</label></div>
                                                <div class="col"><input class="form-control" type="text" style="text-align:right" value="3, 500.00" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">To pay</label></div>
                                                <div class="col">
                                                    <select class="form-control" name="rt" id="rt<?php echo $tenant->dir_id; ?>">
                                                    
                                                        <option value="0">Cash</option>
                                                        <option value="1">Check</option>
                                                   
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check No</label></div>
                                                <div class="col"><input class="form-control" name="rcn" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Bank</label></div>
                                                <div class="col"><input class="form-control" name="rcb" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group rcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check Date</label></div>
                                                <div class="col"><input class="form-control" name="rcd" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" name="ra" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#CBill" style="background-color: #bdedc1;color: #11334f;border: none;">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="modal fade" role="dialog" tabindex="-1" id="CBill">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Confirm Billing Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Reference Number</label></div>
                                                <div class="col"><input class="form-control d-xl-flex" type="text" value="R20180001" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col"><input class="form-control d-xl-flex" type="text" value="301" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                                <div class="col"><input class="form-control" type="text" value="Arvin" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                                <div class="col"><input class="form-control" type="text" value="Dela Cruz" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Type of Transaction</label></div>
                                                <div class="col">
                                                    <select class="form-control" disabled>
                                                        <option selcted>Rent Bill</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Due</label></div>
                                                <div class="col"><input class="form-control" type="text" style="text-align:right"  value="3, 500.00" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" type="text" style="text-align:right"  value="3, 500.00" disabled></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Save and send E-receipt</button></div>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($dir->result() as $tenant) { ?>
                    <div class="modal fade" role="dialog" tabindex="-1" id="Water<?php echo $tenant->dir_id; ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Water Bill</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <form>
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
                                                <input class="form-control" type="hidden" name="wf" value="<?php echo $tenant->tenant_fname;?>">
                                                <input class="form-control" type="hidden" name="wl" value="<?php echo $tenant->tenant_lname;?>">
                                                <input class="form-control" type="hidden" name="wi" value="<?php echo $tenant->tenant_id;?>">
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Receipt No</label></div>
                                                <div class="col"><input class="form-control" type="text" name="wrn" placeholder="Enter receipt no" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Payment for the month of</label></div>
                                                <div class="col">
                                                    <select class="form-control" name="wm">
                                                        <option selcted>Rent Bill</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Due</label></div>
                                                <div class="col"><input class="form-control" type="text" style="text-align:right" value="3, 500.00" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">To pay</label></div>
                                                <div class="col">
                                                    <select class="form-control" name="wt" id="wt<?php echo $tenant->dir_id; ?>">
                                                        <option value="0">Cash</option>
                                                        <option value="1">Check</option>
                                                   
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check No</label></div>
                                                <div class="col"><input class="form-control" name="wcn" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Bank</label></div>
                                                <div class="col"><input class="form-control" name="wcb" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group wcheck<?php echo $tenant->dir_id; ?>">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Check Date</label></div>
                                                <div class="col"><input class="form-control" name="wcd" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" name="wa" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#CBill" style="background-color: #bdedc1;color: #11334f;border: none;">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/selectize.js"></script>
    <script>
        $(document).ready(function(){
            <?php foreach($dir->result() as $selectize) { ?>
                $('#etroom_number<?php echo $selectize->dir_id; ?>').selectize({
                maxItems: 1
            });
            <?php } ?>
            
        });
    </script>
</body>

</html>