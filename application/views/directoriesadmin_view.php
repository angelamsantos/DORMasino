<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    $admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
    $admin_id = $this->session->userdata['login_success']['info']['admin_id'];
    $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];
    $abill = $this->session->userdata['login_success']['info']['adcontrol_bills'];
    $aann = $this->session->userdata['login_success']['info']['adcontrol_ann'];
    $amsg = $this->session->userdata['login_success']['info']['adcontrol_msg'];
    $alog = $this->session->userdata['login_success']['info']['adcontrol_logs'];
    $a="";
    $b="";
    $c="";
    $d="";
    if($adir[8] == 1) { //add
        $a = "title='Add Admin'";
    } else {
        $a = "disabled title='This feature is not available on your account'";
    } 
    
    if($adir[8] == 1) { //edit
        $b = "title='Edit Admin'";
    } else {
        $b = "disabled title='This feature is not available on your account'";
    }
    
    if($adir[10] == 1) { //delete
        $c = "title='Deactivate/Activate Admin'";
    } else {
        $c = "disabled title='This feature is not available on your account'";
    } 

?>
<style>
.form-control {
    font-size: 14px;
    height:35px;
}
</style>
<script>
    $(document).ready(function(){
        $(document).ready(function () {
            $('#admin').dataTable( {
            "ordering": false
        });
        });

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
                    &nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                <div class="col d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" style="margin-top: 0px;padding-right: 0px;padding-left:0px;">
                        <p class="mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size:14px;margin-bottom:0px;width:100%"><span><b>Legend: </b></span>&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-edit" style="font-size:19px;"></i> - Edit Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-minus-circled" style="font-size:19px;"></i> - Deactivate Admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="ion-android-checkmark-circle" style="font-size:19px;"></i> - Activate Admin
                           
                        </p>
                        <button <?php echo $a; ?> class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddAdmin" style="background-color: #28a745;color: #ffffff;border: none;">Add Admin</button>
                    </div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
                    
                    
                
                
            </div>
            <div class="row" style="margin-top: 20px;margin-left:0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                    
                <div id="table_view" class="table-responsive" style="width:100%; ">
                  
                    <table class="table" id="admin" style="font-size:14px;" style="text-align:center">
                        <thead class="logs">
                            <tr style="text-align:center">
                                <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Full Name</th>
                                <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Email</th>
                                <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Contact No</th>
                                <th style="padding-right: 0px;padding-left: 0px;width: 18%;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                        <?php if($adir[11] == 1) { ?>
                            <?php foreach($admin->result() as $at) { 
                                if($at->admin_id != $admin_id) {?>
                                
                                <tr>
                                    <td><?php echo $at->admin_fname.' '.$at->admin_lname; ?></td>
                                    <td><?php echo $at->admin_email; ?></td>
                                    <td><?php echo $at->admin_cno; ?></td>
                                    <td style="text-align:center;"> 
                                    <?php if($at->admin_status == 1) {?>
                                        <button <?php echo $b; ?> type="button" id="edit-room" data-target="#Edit<?php echo $at->admin_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                            <i class="icon ion-edit" style="font-size: 19px;color:#0645AD;"></i>
                                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button <?php echo $c; ?>  type="button" id="edit-room" name="delete" data-target="#ModalDeac<?php echo $at->admin_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                            <i class="icon ion-minus-circled" style="font-size: 19px; color:#0645AD;"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button <?php echo $c; ?> type="button" id="edit-room" name="delete" data-target="#ModalActivate<?php echo $at->admin_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                            <i class="ion-android-checkmark-circle" style="font-size: 19px; color:#0645AD;"></i>
                                        </button>
                                    <?php } ?>
                                    </td>
                                </tr>
                            <?php } } ?>
                        <?php } else  { ?>
                                <tr>
                                    <td style="text-align:center;" colspan="5"><i>Cannot view admins.</i></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                
                    </div>
                </div>
                
            </div>
                                        
           

            <?php  
               
                 foreach ($admin->result() as $deac)  
                 {  
            ?>
                <div id="ModalDeac<?php echo $deac->admin_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Deactivate Admin</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            
                            <form method="POST" name="deactivate_tenant" action="<?php echo site_url('Directories/deactivate_admin');?>" class="justify" style="width: 100%;margin: 0 auto;">
                            <div class="modal-body text-center">
                                    <p style="font-size: 17px;">Are you sure you want to deactivate admin <?php echo $deac->admin_fname." ".$deac->admin_lname; ?>?</p>
                                    <input type="hidden" name="deac_id" value="<?php echo $deac->admin_id; ?>" >
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }  
                
                 foreach ($admin->result() as $activate)  
                 {  
            ?>
                <div id="ModalActivate<?php echo $activate->admin_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Activate User</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                                <form method="POST" name="activate_tenant" action="<?php echo site_url('Directories/activate_admin');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                        <p style="font-size: 17px;">Are you sure you want to activate Admin <?php echo $activate->admin_fname." ".$activate->admin_lname; ?>?</p>
                                        <input type="hidden" name="act_id" value="<?php echo $activate->admin_id; ?>" >
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" name="activate_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php }  ?>
            <div class="modal fade" role="dialog" tabindex="-1" id="AddAdmin">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title">Admin Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="font-size:14px;">
                            <form method="POST" action="<?php echo site_url('Directories/add_admin');?>">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label style="font-weight: normal;">First Name</label><input class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="The first name must contain only letters." name="fname" placeholder="Enter first name"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label style="font-weight: normal;">Last Name</label><input class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="The last name must contain only letters." name="lname" placeholder="Enter last name"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label style="font-weight: normal;">Contact No</label><input class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" name="cno" placeholder="Enter contact number"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label style="font-weight: normal;">Email</label><input class="form-control" type="email" name="email" placeholder="Enter email address"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row" style="margin: 0px;">
                                        <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Privileges</label></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="panel panel-default" style="font-size:14px;">
                                                <ul class="nav nav-tabs panel-heading">
                                                    <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tabb-1">Directories</a></li>
                                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tabb-2">Bills</a></li>
                                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tabb-3">Announcements</a></li>
                                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tabb-4">Messages</a></li>
                                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tabb-5">Visitor Logs</a></li>
                                                </ul>
                                                <div class="tab-content panel-body">
                                                    <div class="tab-pane active align-content-center" role="tabpanel" id="tabb-1" style="font-size: 14px;">
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
                                                                        <td>Activate/Deactivate</td>
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
                                                    <div class="tab-pane" role="tabpanel" id="tabb-2">
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
                                                    <div class="tab-pane" role="tabpanel" id="tabb-3" style="font-size:14px; padding-top:20px;padding-bottom:20px;">
                                                        <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="width: 203px;"><input type="hidden" name="a1" value="0"><input class="form-check-input" name="a1" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View announcements</label></div>
                                                        <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto"
                                                            style="margin-top: 20px;width: 203px;"><input type="hidden" name="a2" value="0"><input class="form-check-input" type="checkbox" id="formCheck-1" name="a2" value="1"><label class="form-check-label" for="formCheck-1">Publish announcements</label></div>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="tabb-4">
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
                                                                        <td class="text-center"><input type="hidden" name="m7" value="0">
                                                                            <div class="form-check"><input class="form-check-input rq" name="m7" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Receive</td>
                                                                        <td class="text-center"><input type="hidden" name="m2" value="0">
                                                                            <div class="form-check"><input class="form-check-input gm" name="m2" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                        </td>
                                                                        <td class="text-center"><input type="hidden" name="m8" value="0">
                                                                            <div class="form-check"><input class="form-check-input rq" name="m8" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
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
                                                                        <td>Restore</td>
                                                                        <td class="text-md-center"><input type="hidden" name="m5" value="0">
                                                                            <div class="form-check"><input class="form-check-input gm" name="m5" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                        </td>
                                                                        <td class="text-md-center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Delete</td>
                                                                        <td class="text-md-center"><input type="hidden" name="m6" value="0">
                                                                            <div class="form-check"><input class="form-check-input gm" name="m6" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                        </td>
                                                                        <td class="text-md-center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Approve</td>
                                                                        <td class="text-md-center"></td>
                                                                        <td class="text-md-center"><input type="hidden" name="m9" value="0">
                                                                            <div class="form-check"><input class="form-check-input rq" name="m9" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="tabb-5" style="font-size:14px; padding-top:15px;padding-bottom:20px;"><input type="hidden" name="v1" value="0"><input type="hidden" name="v2" value="0">
                                                        <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="margin-top: 20px;width: 203px;"><input class="form-check-input" name="v1" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View Visitor Logs</label></div>
                                                        <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="margin-top: 20px;width: 203px;"><input class="form-check-input" name="v2" value="1" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Log Visitor</label></div>
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

            <?php foreach($admin->result() as $admin) {?>
                <div class="modal fade" role="dialog" tabindex="-1" id="Edit<?php echo $admin->admin_id;?>">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title"> Edit Admin Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body" style="font-size:14px;">
                                <form method="POST" action="<?php echo site_url('Directories/edit_admin');?>">
                                    <div class="form-row">
                                        <div class="col"><input class="form-control" type="hidden" name="aid" value="<?php echo $admin->admin_id;?>">
                                            <div class="form-group"><label style="font-weight: normal;">First Name</label><input class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="The first name must contain only letters." name="efname" value="<?php echo $admin->admin_fname;?>"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label style="font-weight: normal;">Last Name</label><input class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="The last name must contain only letters." name="elname" value="<?php echo $admin->admin_lname;?>" ></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label style="font-weight: normal;">Contact No</label><input class="form-control" type="text" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" name="ecno" value="<?php echo $admin->admin_cno;?>"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label style="font-weight: normal;">Email</label><input class="form-control" type="email" name="eemail" value="<?php echo $admin->admin_email;?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Privileges</label></div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="panel panel-default" style="font-size:14px;">
                                                    <ul class="nav nav-tabs panel-heading">
                                                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab1<?php echo $admin->admin_id;?>">Directories</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2<?php echo $admin->admin_id;?>">Bills</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3<?php echo $admin->admin_id;?>">Announcements</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4<?php echo $admin->admin_id;?>">Messages</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-5<?php echo $admin->admin_id;?>">Visitor Logs</a></li>
                                                    </ul>
                                                    <div class="tab-content panel-body">
                                                        <div class="tab-pane active align-content-center" role="tabpanel" id="tab1<?php echo $admin->admin_id;?>" style="font-size: 14px;">
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
                                                                                <input type="hidden" name="ed1" value="0">
                                                                                <div class="form-check"><input class="dt form-check-input" type="checkbox"  name="ed1" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[0]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                            <input type="hidden" name="ed5" value="0">
                                                                                <div class="form-check"><input class="form-check-input dr" type="checkbox" name="ed5" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[4]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"> <input type="hidden" name="ed9" value="0">
                                                                                <div class="form-check"><input class="form-check-input da" type="checkbox" name="ed9" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[8]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Edit</td>
                                                                            <td class="text-center"> <input type="hidden" name="ed2" value="0">
                                                                                <div class="form-check"><input class="form-check-input dt" type="checkbox" name="ed2" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[1]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"> <input type="hidden" name="ed6" value="0">
                                                                                <div class="form-check"><input class="form-check-input dr" type="checkbox"   name="ed6" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[5]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"> <input type="hidden" name="ed10" value="0">
                                                                                <div class="form-check"><input class="form-check-input da" type="checkbox"   name="ed10" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[9]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Activate/Deactivate</td>
                                                                            <td class="text-md-center"> <input type="hidden" name="ed3" value="0">
                                                                                <div class="form-check"><input class="form-check-input dt" type="checkbox"   name="ed3" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[2]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"> <input type="hidden" name="ed7" value="0">
                                                                                <div class="form-check"><input class="form-check-input dr" type="checkbox"   name="ed7" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[6]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"> <input type="hidden" name="ed11" value="0">
                                                                                <div class="form-check"><input class="form-check-input da" type="checkbox"   name="ed11" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[10]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>View</td>
                                                                            <td class="text-md-center"> <input type="hidden" name="ed4" value="0">
                                                                                <div class="form-check"><input class="form-check-input dt" type="checkbox"   name="ed4" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[3]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"> <input type="hidden" name="ed8" value="0">
                                                                                <div class="form-check"><input class="form-check-input dr" type="checkbox"   name="ed8" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[7]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"> <input type="hidden" name="ed12" value="0">
                                                                                <div class="form-check"><input class="form-check-input da" type="checkbox"   name="ed12" id="formCheck-1" value="1" <?php if($admin->adcontrol_dir[11]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-2<?php echo $admin->admin_id;?>">
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
                                                                            <td class="text-md-center"><input type="hidden" name="ep1" value="0">
                                                                                <div class="form-check"><input class="form-check-input bl" type="checkbox" name="ep1"  id="formCheck-1" value="1" <?php if($admin->adcontrol_bills[0]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"><input type="hidden" name="ep3" value="0">
                                                                                <div class="form-check"><input class="form-check-input py" type="checkbox" name="ep3" id="formCheck-1" value="1" <?php if($admin->adcontrol_bills[2]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"><input type="hidden" name="ep5" value="0">
                                                                                <div class="form-check"><input class="form-check-input tr" type="checkbox" name="ep5" id="formCheck-1" value="1" <?php if($admin->adcontrol_bills[4]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Update</td>
                                                                            <td class="text-center"><input type="hidden" name="ep2" value="0">
                                                                                <div class="form-check"><input class="form-check-input bl" type="checkbox" name="ep2" id="formCheck-1" value="1" <?php if($admin->adcontrol_bills[1]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"><input type="hidden" name="ep4" value="0">
                                                                                <div class="form-check"><input class="form-check-input py" type="checkbox" name="ep4" id="formCheck-1" value="1" <?php if($admin->adcontrol_bills[3]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-3<?php echo $admin->admin_id;?>" style="font-size:14px; padding-top:20px;padding-bottom:20px;">
                                                            <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="width: 203px;"><input type="hidden" name="ea1" value="0"><input class="form-check-input" name="ea1" value="1" <?php if($admin->adcontrol_ann[0]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View announcements</label></div>
                                                            <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto"
                                                                style="margin-top: 20px;width: 203px;"><input type="hidden" name="ea2" value="0"><input class="form-check-input" type="checkbox" id="formCheck-1" name="ea2" value="1" <?php if($admin->adcontrol_ann[1]==1) { echo "checked"; }?>><label class="form-check-label" for="formCheck-1">Publish announcements</label></div>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-4<?php echo $admin->admin_id;?>">
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
                                                                            <td class="text-center"><input type="hidden" name="em1" value="0">
                                                                                <div class="form-check"><input class="form-check-input gm" name="em1" value="1" <?php if($admin->adcontrol_msg[0]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"><input type="hidden" name="em7" value="0">
                                                                                <div class="form-check"><input class="form-check-input rq" name="em7" value="1" <?php if($admin->adcontrol_msg[6]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Receive</td>
                                                                            <td class="text-center"><input type="hidden" name="em2" value="0">
                                                                                <div class="form-check"><input class="form-check-input gm" name="em2" value="1" <?php if($admin->adcontrol_msg[1]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"><input type="hidden" name="em8" value="0">
                                                                                <div class="form-check"><input class="form-check-input rq" name="em8" value="1" <?php if($admin->adcontrol_msg[7]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Archive</td>
                                                                            <td class="text-center"><input type="hidden" name="em3" value="0">
                                                                                <div class="form-check"><input class="form-check-input gm" name="em3" value="1" <?php if($admin->adcontrol_msg[2]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-center"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Send</td>
                                                                            <td class="text-md-center"><input type="hidden" name="em4" value="0">
                                                                                <div class="form-check"><input class="form-check-input gm" name="em4" value="1" <?php if($admin->adcontrol_msg[3]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"></td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td>Restore</td>
                                                                            <td class="text-md-center"><input type="hidden" name="em5" value="0">
                                                                                <div class="form-check"><input class="form-check-input gm" name="em5" value="1" <?php if($admin->adcontrol_msg[4]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Delete</td>
                                                                            <td class="text-md-center"><input type="hidden" name="em6" value="0">
                                                                                <div class="form-check"><input class="form-check-input gm" name="em6" value="1" <?php if($admin->adcontrol_msg[5]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                            <td class="text-md-center"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Approve</td>
                                                                            <td class="text-md-center"></td>
                                                                            <td class="text-md-center"><input type="hidden" name="em9" value="0">
                                                                                <div class="form-check"><input class="form-check-input rq" name="em9" value="1" <?php if($admin->adcontrol_msg[8]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-5<?php echo $admin->admin_id;?>" style="font-size:14px; padding-top:15px;padding-bottom:20px;"><input type="hidden" name="ev1" value="0"><input type="hidden" name="ev2" value="0">
                                                            <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="margin-top: 20px;width: 203px;"><input class="form-check-input" name="ev1" value="1" <?php if($admin->adcontrol_logs[0]==1) { echo "checked"; }?>  type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">View Visitor Logs</label></div>
                                                            <div class="form-check d-flex d-xl-flex align-content-center flex-wrap mx-auto" style="margin-top: 20px;width: 203px;"><input class="form-check-input" name="ev2" value="1" <?php if($admin->adcontrol_logs[1]==1) { echo "checked"; }?> type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Log Visitor</label></div>
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
            <?php } ?>

            
        
        </div>
        <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>
    </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/selectize/standalone/selectize.min.js"></script>

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