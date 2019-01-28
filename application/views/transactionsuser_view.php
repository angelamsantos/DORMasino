<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
.form-control {
    font-size: 14px;
    height:35px;
}
</style>
<script>
    

</script>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Directories</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                <div class="col d-flex d-sm-flex d-md-flex d-xl-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end" style="margin-top: 0px;padding-right: 0px;"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddUser" style="background-color: #28a745;color: #ffffff;border: none;">Add User</button></div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('message'))) echo $this->session->flashdata('message');?>
                    </div>
                    
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <a href="<?php echo site_url('Directories/index'); ?>" style="color: #11334f;font-size:16px;" title="Click here to go back"><b><i class="fa fa-chevron-circle-left"></i>&nbsp; &nbsp; Tenants of Room <?php echo $this->session->userdata['data']['room_no']; ?> </b></a>
                    </div>
                
                
            </div>
            <div class="row" style="margin-top: 20px;margin-left:0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                    
                    <div id="table_view" class="table-responsive" style="width:100%; ">
                        <table class="table" id="example" style="font-size:14px;">
                            <thead class="logs">
                                <tr style="text-align:center">
                                    <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Name of Tenant</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Contract Period</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Days left  </th>
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
                                            <?php 
                                                $status = $tenant->tenant_status;
                                                if ( $status == 1) { ?>

                                                <button title="Edit user" data-target="#Bill" data-toggle="modal" class="btn btn-primary" style="padding:0px 3px;">
                                                    <i class="fa fa-edit" style="font-size: 14px"></i>
                                                </button>

                                            <?php } else { ?>
                                                <button title="Activate user" data-target="#ModalActivate<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-success" style="padding:0px 3px;">
                                                <i class="fa fa-check" style="font-size: 14px"></i>
                                                </button>
                                            <?php } ?>
                                        
                                        </td>  
                                    </tr>
                                <?php } ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="Bill">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Billing Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <form>
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
                                                    <select class="form-control">
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
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                                <div class="col"><input class="form-control" style="text-align:right"  type="text"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#CBill" style="background-color: #bdedc1;color: #11334f;border: none;">Submit</button></div>
                            </div>
                        </div>
                    </div>

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
                </div>
                
            </div>
        </div>
    </div>
    </div>
    
    
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