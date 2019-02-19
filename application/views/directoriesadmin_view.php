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
        $('.tenant').click(function() {
            $('.dt').prop('checked', this.checked);
        });
        $('.room').click(function() {
            $('.dr').prop('checked', this.checked);
        });
        $('.admin').click(function() {
            $('.da').prop('checked', this.checked);
        });
        $('.bill').click(function() {
            $('.bl').prop('checked', this.checked);
        });
        $('.pay').click(function() {
            $('.py').prop('checked', this.checked);
        });
        $('.trans').click(function() {
            $('.tr').prop('checked', this.checked);
        });
        $('.msg').click(function() {
            $('.gm').prop('checked', this.checked);
        });
        $('.req').click(function() {
            $('.rq').prop('checked', this.checked);
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
                <div class="col d-flex d-sm-flex d-md-flex d-xl-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end" style="margin-top: 0px;padding-right: 0px;"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddAdmin" style="background-color: #28a745;color: #ffffff;border: none;">Add Admin</button></div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                    <h4 class="modal-title">Admin Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body" style="font-size:14px;">
                    <form method="POST" action="<?php echo site_url('Directories/add_admin');?>">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label style="font-weight: normal;">First Name</label><input class="form-control" type="text" name="fname" placeholder="Enter first name"></div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label style="font-weight: normal;">Last Name</label><input class="form-control" type="text" name="lname" placeholder="Enter last name"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label style="font-weight: normal;">Contact No</label><input class="form-control" type="text" name="cno" placeholder="Enter contact number"></div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label style="font-weight: normal;">Email</label><input class="form-control" type="email" name="email" placeholder="Enter email address"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label style="font-weight: normal;">Employee No</label><input class="form-control" type="text" name="empno" placeholder="Enter employee number"></div>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Privileges</label></div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="panel panel-default" style="font-size:14px;">
                                        <ul class="nav nav-tabs panel-heading">
                                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Directories</a></li>
                                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Bills</a></li>
                                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Announcements</a></li>
                                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4">Messages</a></li>
                                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-5">Visitor Logs</a></li>
                                        </ul>
                                        <div class="tab-content panel-body">
                                            <div class="tab-pane active align-content-center" role="tabpanel" id="tab-1" style="font-size: 14px;">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead style="background-color: #ffffff;">
                                                            <tr>
                                                                <th style="width: 115px;"></th>
                                                                <th class="text-xl-center d-xl-flex justify-content-xl-center">
                                                                    <div class="form-check"><input class="tenant form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Tenants</label></div>
                                                                </th>
                                                                <th class="text-center">
                                                                    <div class="form-check"><input class="form-check-input room" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Rooms</label></div>
                                                                </th>
                                                                <th class="text-center">
                                                                    <div class="form-check"><input class="form-check-input admin" type="checkbox"  id="formCheck-1"><label class="form-check-label" for="formCheck-1">Admin</label></div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Add</td>
                                                                <td class="text-center">
                                                                    <input type="hidden" name="d1" value="0">
                                                                    <div class="form-check"><input class="dt form-check-input" type="checkbox"  name="d1" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center">
                                                                <input type="hidden" name="d5" value="0">
                                                                    <div class="form-check"><input class="form-check-input dr" type="checkbox" name="d5" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"> <input type="hidden" name="d9" value="0">
                                                                    <div class="form-check"><input class="form-check-input da" type="checkbox" name="d9" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Edit</td>
                                                                <td class="text-center"> <input type="hidden" name="d2" value="0">
                                                                    <div class="form-check"><input class="form-check-input dt" type="checkbox" name="d2" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"> <input type="hidden" name="d6" value="0">
                                                                    <div class="form-check"><input class="form-check-input dr" type="checkbox"   name="d6" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"> <input type="hidden" name="d10" value="0">
                                                                    <div class="form-check"><input class="form-check-input da" type="checkbox"   name="d10" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Delete</td>
                                                                <td class="text-md-center"> <input type="hidden" name="d3" value="0">
                                                                    <div class="form-check"><input class="form-check-input dt" type="checkbox"   name="d3" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-md-center"> <input type="hidden" name="d7" value="0">
                                                                    <div class="form-check"><input class="form-check-input dr" type="checkbox"   name="d7" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-md-center"> <input type="hidden" name="d11" value="0">
                                                                    <div class="form-check"><input class="form-check-input da" type="checkbox"   name="d11" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>View</td>
                                                                <td class="text-md-center"> <input type="hidden" name="d4" value="0">
                                                                    <div class="form-check"><input class="form-check-input dt" type="checkbox"   name="d4" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-md-center"> <input type="hidden" name="d8" value="0">
                                                                    <div class="form-check"><input class="form-check-input dr" type="checkbox"   name="d8" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-md-center"> <input type="hidden" name="d12" value="0">
                                                                    <div class="form-check"><input class="form-check-input da" type="checkbox"   name="d12" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="tab-2">
                                                <div class="table-responsive">
                                                    <table class="table table-striped" style="font-size:14px;">
                                                        <thead style="background-color: #ffffff;">
                                                            <tr>
                                                                <th style="width: 115px;"></th>
                                                                <th class="text-xl-center d-xl-flex justify-content-xl-center">
                                                                    <div class="form-check"><input class="form-check-input bill" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Update Bills</label></div>
                                                                </th>
                                                                <th class="text-center">
                                                                    <div class="form-check"><input class="form-check-input pay" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Payments</label></div>
                                                                </th>
                                                                <th class="text-center">
                                                                    <div class="form-check"><input class="form-check-input trans" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Transaction Records</label></div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>View</td>
                                                                <td class="text-md-center"><input type="hidden" name="p1" value="0">
                                                                    <div class="form-check"><input class="form-check-input bl" type="checkbox" name="p1"  id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-md-center"><input type="hidden" name="p3" value="0">
                                                                    <div class="form-check"><input class="form-check-input py" type="checkbox" name="p3" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-md-center"><input type="hidden" name="p5" value="0">
                                                                    <div class="form-check"><input class="form-check-input tr" type="checkbox" name="p5" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Update</td>
                                                                <td class="text-center"><input type="hidden" name="p2" value="0">
                                                                    <div class="form-check"><input class="form-check-input bl" type="checkbox" name="p2" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"><input type="hidden" name="p4" value="0">
                                                                    <div class="form-check"><input class="form-check-input py" type="checkbox" name="p4" id="formCheck-1" value="1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="tab-3" style="font-size:14px; padding-top:20px;padding-bottom:20px;">
                                                <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="width: 203px;"><input type="hidden" name="a1" value="0"><input class="form-check-input" name="a1" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View announcements</label></div>
                                                <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto"
                                                    style="margin-top: 20px;width: 203px;"><input type="hidden" name="a2" value="0"><input class="form-check-input" type="checkbox" id="formCheck-1" name="a2" value="1"><label class="form-check-label" for="formCheck-1">Publish announcements</label></div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="tab-4">
                                                <div class="table-responsive" style="font-size:14px;">
                                                    <table class="table table-striped">
                                                        <thead style="background-color: #ffffff;">
                                                            <tr>
                                                                <th style="width: 115px;"></th>
                                                                <th class="text-xl-center d-xl-flex justify-content-xl-center">
                                                                    <div class="form-check"><input class="form-check-input msg" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">General Messages</label></div>
                                                                </th>
                                                                <th class="text-center">
                                                                    <div class="form-check"><input class="form-check-input req" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Requests</label></div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>View</td>
                                                                <td class="text-center"><input type="hidden" name="m1" value="0">
                                                                    <div class="form-check"><input class="form-check-input gm" name="m1" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"><input type="hidden" name="m5" value="0">
                                                                    <div class="form-check"><input class="form-check-input rq" name="m5" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Receive</td>
                                                                <td class="text-center"><input type="hidden" name="m2" value="0">
                                                                    <div class="form-check"><input class="form-check-input gm" name="m2" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"><input type="hidden" name="m6" value="0">
                                                                    <div class="form-check"><input class="form-check-input rq" name="m6" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Archive</td>
                                                                <td class="text-center"><input type="hidden" name="m3" value="0">
                                                                    <div class="form-check"><input class="form-check-input gm" name="m3" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Send</td>
                                                                <td class="text-md-center"><input type="hidden" name="m4" value="0">
                                                                    <div class="form-check"><input class="form-check-input gm" name="m4" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                                <td class="text-md-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Complete</td>
                                                                <td class="text-md-center"></td>
                                                                <td class="text-md-center"><input type="hidden" name="m7" value="0">
                                                                    <div class="form-check"><input class="form-check-input rq" name="m7" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="tab-5" style="font-size:14px; padding-top:15px;padding-bottom:20px;">
                                                <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="margin-top: 20px;width: 203px;"><input type="hidden" name="v1" value="0"><input class="form-check-input" name="v1" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View Visitor Logs</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;border: none;color: #11334f;">Save</button></div>
                </form>
            </div>
        </div>
    </div>

            
          
        </div>
    </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/selectize/standalone/selectize.min.js"></script>
    
</body>

</html>