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
                <div class="col d-flex d-sm-flex d-md-flex d-xl-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end" style="margin-top: 0px;padding-right: 0px;"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddAdmin" style="background-color: #28a745;color: #ffffff;border: none;">Add Admin</button></div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('message'))) echo $this->session->flashdata('message');?>
                    </div>
                    
                    
                
                
            </div>
            <div class="row" style="margin-top: 20px;margin-left:0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                    
                    <div id="table_view" class="table-responsive" style="width:100%; ">
                  
                    <table class="table" id="example">
                        <thead class="logs">
                            <tr style="text-align:center">
                                <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Employee No</th>
                                <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Full Name</th>
                                <th style="padding-right: 0px;padding-left: 0px;width: 18%;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <tr>
                                <td>10001</td>
                                <td>Thomasian Residences</td>
                                <td style="text-align:center;"> 
                                <button title="Edit user" data-target="#EditUser<?php //echo //$tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="padding:0px 3px;">
                                                    <i class="fa fa-edit" style="font-size: 14px"></i>
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button title="Deactivate user" name="delete" data-target="#ModalDeac<?php //echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-danger" style="padding:0px 3px;">
                                                    <i class="fa fa-ban" style="font-size: 14px"></i>
                                                </button>
                                </td>
                            </tr>
                            <tr>
                                <td>10002</td>
                                <td>Ms. Katrina G. Lim</td>
                                <td style="text-align:center;"> 
                                <button title="Edit user" data-target="#EditUser<?php //echo //$tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="padding:0px 3px;">
                                                    <i class="fa fa-edit" style="font-size: 14px"></i>
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button title="Deactivate user" name="delete" data-target="#ModalDeac<?php //echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-danger" style="padding:0px 3px;">
                                                    <i class="fa fa-ban" style="font-size: 14px"></i>
                                                </button>
                                </td>    
                            </tr>
                        </tbody>
                    </table>
                
                    </div>
                </div>
                
            </div>
                                        
           

            <?php  
               
                // foreach ($dir->result() as $deac)  
                // {  
            ?>
                <div id="ModalDeac<?php //echo $deac->dir_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Deactivate Admin</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            
                            <form method="POST" name="deactivate_tenant" action="<?php //echo site_url('Directories/deactivate_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                            <div class="modal-body text-center">
                                    <p style="font-size: 17px;">Are you sure you want to deactivate admin <?php //echo $deac->tenant_fname." ".$deac->tenant_lname; ?>?</p>
                                    <input type="hidden" name="dtenant_id" value="<?php //echo $deac->tenant_id; ?>" >
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php //}  
                
                // foreach ($dir->result() as $activate)  
                // {  
            ?>
                <div id="ModalActivate<?php// echo $activate->dir_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Activate User</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                                <form method="POST" name="activate_tenant" action="<?php //echo site_url('Directories/activate_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                        <p style="font-size: 17px;">Are you sure you want to activate Admin <?php //echo $activate->tenant_fname." ".$activate->tenant_lname; ?>?</p>
                                        <input type="hidden" name="atenant_id" value="<?php //echo $activate->tenant_id; ?>" >
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" name="activate_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php //}  ?>
            <div class="modal fade" role="dialog" tabindex="-1" id="AddAdmin">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                    <h4 class="modal-title">Admin Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                <div class="col"><input class="form-control" type="text" placeholder="Enter first name"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                <div class="col"><input class="form-control" type="text" placeholder="Enter last name"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Contact No</label></div>
                                <div class="col"><input class="form-control" type="text" placeholder="Enter contact number"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Privileges</label></div>
                                <div class="col-xl-8"><label style="font-weight: normal;margin-top: 9px;">Directories</label>
                                    <div class="d-xl-flex align-items-xl-center">
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View</label></div>
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Edit</label></div>
                                    </div><label>Bills</label>
                                    <div class="d-xl-flex align-items-xl-center">
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View</label></div>
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Edit</label></div>
                                    </div><label>Announcements</label>
                                    <div class="d-xl-flex align-items-xl-center">
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View</label></div>
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Edit</label></div>
                                    </div><label>Messages</label>
                                    <div class="d-xl-flex align-items-xl-center">
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View</label></div>
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Edit</label></div>
                                    </div><label>Visitor Logs</label>
                                    <div class="d-xl-flex align-items-xl-center">
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View</label></div>
                                        <div class="form-check" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Edit</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;border: none;color: #11334f;">Save</button></div>
            </div>
        </div>
    </div>

            
          
        </div>
    </div>
    </div>
    
    
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/selectize.js"></script>
    
</body>

</html>