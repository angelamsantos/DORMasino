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
                    $('#tenantInfo<?php echo $edit->dir_id; ?>').show();
                    $('#editTenant<?php echo $edit->dir_id; ?>').hide();
                    $('#cancelEdit<?php echo $edit->dir_id; ?>').click(function(){
                            $('#tenantInfo<?php echo $edit->dir_id; ?>').show();
                            $('#editTenant<?php echo $edit->dir_id; ?>').hide();
                    });
                    $('#toggleEdit<?php echo $edit->dir_id; ?>').click(function(){
                            $('#tenantInfo<?php echo $edit->dir_id; ?>').hide();
                            $('#editTenant<?php echo $edit->dir_id; ?>').show();
                    });

                    $('#TenantInfo<?php echo $edit->dir_id; ?>').on('hidden.bs.modal', function () {
                            $('#tenantInfo<?php echo $edit->dir_id; ?>').show();
                            $('#editTenant<?php echo $edit->dir_id; ?>').hide();
                    })
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
                    <div class="col d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" style="margin-top: 0px;padding-right: 0px;padding-left:0px;">
                        <p class="mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size:14px;margin-bottom:0px;width:100%"><span><b>Legend: </b></span>&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-arrow-swap" style="font-size:19px;"></i> - Move Room &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-ios-calendar-outline" style="font-size:19px;"></i> - Change Contract &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-ios-redo" style="font-size:19px;"></i> - Reset Password
                        </p>
                    <button class="btn btn-primary ml-xl-auto ml-lg-auto ml-md-auto mr-sm-auto mr-auto " type="button" data-toggle="modal" data-target="#AddUser" style="background-color: #28a745;color: #ffffff;border: none;">Add User</button>
                    </div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
                    
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <a href="<?php echo site_url('Directories/index'); ?>" style="color: #11334f;font-size:16px;" title="Click here to go back"><b><i class="fa fa-chevron-circle-left"></i>&nbsp; &nbsp; Tenants of Room <?php echo $this->session->userdata['data']['room_no']; ?> </b></a>
                    </div>
                
                
            </div>
            <div class="row" style="margin-top: 20px;margin-left:0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                    
                    <div id="table_view" class="table-responsive" style="width:100%; ">
                    <form action="" method="POST" >
                        <table class="table" id="example" style="font-size:14px;" style="text-align:center">
                            <thead class="logs">
                                <tr style="text-align:center">
                                    <th style="text-align:left;width: 5%;padding-right:0px;">
                                    
                                    <div class="form-check-inline" style="margin-right:0px">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="chk_boxes my-auto" value="" style="margin-right:0px">
                                            <button class="btn btn-primary fas fa-user-times" name="delete" type="submit" id="delete" style="color:#D50000;border-radius:100px;padding:5px 2px 5px 4px;margin-right:0px;font-size:14px"
                                                title="Delete Tenant/s"></button>
                                        </label>
                                    </div>
                                    
                                    </th>
                                    <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Name of Tenant</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Contract Period</th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Days left  </th>
                                    <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Action</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <?php foreach ($dir->result() as $tenant) {
                                    
                                    $a = strtotime($tenant->contract_start);
                                    $due = date('Y-m-d', strtotime('+1 year' ,$a)); 
                                    $now = new DateTime(date("y-m-d")); // or your date as well
                                    $your_date = new DateTime($due);
                                    $datediff = $now->diff($your_date);
                                ?>
                                     
                                    <tr style="border-bottom:1px solid #c7c7c7">
                                        <td style="text-align:left">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="chk_boxes1" name="delete_arr[]" value="<?php echo $tenant->dir_id; ?>" style="margin-right:0px">
                                            </label>
                                        </div>

                                        </td>
                                        
                                        <td><?php echo $tenant->room_number; ?></td>
                                        <td><a style="color:#0645AD;font-weight:bold ;" class="info" title="Click to show tenant information" href="#TenantInfo<?php echo $tenant->dir_id; ?>" data-toggle="modal" data-target="#TenantInfo<?php echo $tenant->dir_id; ?>"><?php echo $tenant->tenant_fname ." ". $tenant->tenant_lname; ?></a></td>
                                        <td style="text-align:center"><?php echo $tenant->contract_start ." to ". $due ; ?></td>
                                        <?php if($datediff->days < 30 && $datediff->days > 10 ) { ?>
                                             <td style="color: orange;text-align:center"><?php echo $datediff->days ." days"; ?></td>
                                        <?php } else if ($datediff->days <= 10) { ?>
                                            <td style="color: red;text-align:center"><?php echo $datediff->days ." days"; ?></td>
                                        <?php } else { ?>
                                            <td style="text-align:center"><?php echo $datediff->days ." days"; ?></td>
                                        <?php } ?>
                                       
                                        <td style="text-align:center;">
                                                <button title="Move room" type="button" id="edit-tenant" data-toggle="modal" data-target="#MoveRoom<?php echo $tenant->dir_id; ?>" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                    <i class="icon ion-arrow-swap" style="font-size:19px;color:#0645AD;"></i>
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button title="Change contract" type="button" id="edit-tenant" data-target="#ChangeContract<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                    <i class="icon ion-ios-calendar-outline" style="font-size:19px;color:#0645AD;"></i>
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button title="Reset password" type="button" id="edit-tenant" data-target="#ResetPW<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                    <i class="icon ion-ios-redo" style="font-size:19px;color:#0645AD;"></i>
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                   
                                        
                                        </td>  
                                    </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </form>
                    <?php 

                                    if(isset($_POST['delete'])){//to run PHP script on submit
                                        if(!empty($_POST['delete_arr'])){
                                            $delete_count = count($_POST['delete_arr']);
                                        
                                            foreach($_POST['delete_arr'] as $selected){
                                                $deleteArr[] = $selected;
                                            }

                                            echo "<script>
                                                $(document).ready(function(){
                                                    $('#ModalDeac').modal('show');
                                                });
                                            </script>";
                                        }
                                    }

                                    ?>
                    </div>
                </div>
                
            </div>
                                        
           

            <?php 
            foreach($dir->result() as $tenantInfo){ ?>
            <div class="modal fade" role="dialog" tabindex="-1" id="TenantInfo<?php echo $tenantInfo->dir_id; ?>">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content" id="tenantInfo<?php echo $tenantInfo->dir_id; ?>">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;"><?php echo $tenantInfo->tenant_fname." ". $tenantInfo->tenant_lname; ?>: Tenant Information</h4>
                            <button title="Edit Information"  id="toggleEdit<?php echo $tenantInfo->dir_id; ?>" class="modal-tenant btn btn-primary ml-auto" style="border-radius:100px;padding:0px 8px;margin-right:0px">
                            <i class="fa fa-edit" style="font-size:16px;font-color:blue"></i>
                            </button> 
                        </div>
                            
                        <div class="modal-body" style="height:500px;">
                        
                        <form style="height:100%; overflow-y:scroll;overflow-x:hidden">
                        
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                       
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">Room No</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->room_number;?></label> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">First Name</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_fname; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Last Name</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_lname; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Address</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_address; ?></label></textarea></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Birthday</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_birthday; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Email</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_email; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Contact No</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_cno; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">School/Company</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_school; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Course</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->tenant_course; ?></label></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Move-in Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Date of move-in</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->contract_start; ?></label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Full Name</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->mother_name; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Mobile No</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->mother_mno; ?></label></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Full Name</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->father_name; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Mobile No</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->father_mno; ?></label></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Person to contact in case of emergency</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Full Name</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->guardian_name; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Relationship</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->guardian_rel; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Email</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->guardian_email; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Mobile No</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->guardian_mno; ?></label></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: bold;">Landline No</label></div>
                                                <div class="col"style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;"><?php echo $tenantInfo->guardian_lno; ?></label></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="button" data-dismiss="modal" style="background-color: #bdedc1;color: #11334f;border: none;" >Close</button></div>
                        </form>
                    </div>
                    <div class="modal-content" id="editTenant<?php echo $tenantInfo->dir_id; ?>">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;"><?php echo $tenantInfo->tenant_fname." ". $tenant->tenant_lname; ?>: Edit Tenant Information</h4>
                            <button onclick="edit()" id="cancelEdit<?php echo $tenantInfo->dir_id; ?>" class="ml-auto" style="border:none;background-color:transparent;font-size:14px;color:red">
                                Cancel Edit
                            </button>
                        </div>
                        <div class="modal-body" style="height:500px;">
                        
                        <form method="POST" action="<?php echo site_url('Directories/update_tenant');?>" style="height:100%; overflow-y:scroll;overflow-x:hidden">
                        
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                    
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                                <div class="col"><input name="etenant_fname" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your first name must contain only letters." value="<?php echo $tenantInfo->tenant_fname; ?>" required></div>
                                                <input name="etenant_id" class="form-control" type="hidden" value="<?php echo $tenantInfo->tenant_id; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                                <div class="col"><input name="etenant_lname" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your last name must contain only letters." value="<?php echo $tenantInfo->tenant_lname; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Address</label></div>
                                                <div class="col"><textarea name="etenant_address" class="form-control" row="2" type="text"  required><?php echo $tenantInfo->tenant_address; ?></textarea></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Birthday</label></div>
                                                <div class="col"><input name="etenant_bday" class="form-control" type="date" value="<?php echo $tenantInfo->tenant_birthday; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input name="etenant_email" class="form-control" type="email" value="<?php echo $tenantInfo->tenant_email; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Contact No</label></div>
                                                <div class="col"><input name="etenant_cno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" value="<?php echo $tenantInfo->tenant_cno; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">School/Company</label></div>
                                                <div class="col"><input name="etenant_school" class="form-control" type="text" pattern="[a-zA-Z- .'/]{2,30}" title="Your school or company must contain only letters." value="<?php echo $tenantInfo->tenant_school; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course</label></div>
                                                <div class="col"><input name="etenant_course" class="form-control" type="text" pattern="[a-zA-Z- .'/]{2,30}" title="Your course must contain only letters. N/A if not applicable." value="<?php echo $tenantInfo->tenant_course; ?>" required></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="emother_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your mother's name must contain only letters." value="<?php echo $tenantInfo->mother_name; ?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="emother_mno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" value="<?php echo $tenantInfo->mother_mno; ?>"></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="efather_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your father's name must contain only letters." value="<?php echo $tenantInfo->father_name; ?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="efather_mno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" value="<?php echo $tenantInfo->father_mno; ?>"></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Person to contact in case of emergency</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="eguardian_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your guardian's name must contain only letters." value="<?php echo $tenantInfo->guardian_name; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Relationship</label></div>
                                                <div class="col"><input name="eguardian_rel" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your relationship with the guardian must contain only letters." value="<?php echo $tenantInfo->guardian_rel; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input name="eguardian_email" class="form-control" type="email" value="<?php echo $tenantInfo->guardian_email; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="eguardian_mno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" value="<?php echo $tenantInfo->guardian_mno; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Landline No</label></div>
                                                <div class="col"><input name="eguardian_lno" class="form-control" type="tel" maxlength="7" pattern="[0-9]{7}" title="The telephone number should be 7 digits." value="<?php echo $tenantInfo->guardian_lno; ?>" ></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit"  style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <?php  
                }
                foreach ($dir->result() as $moveRoom)  
                {  
            ?>
            <div id="MoveRoom<?php echo $moveRoom->dir_id; ?>" class="modal fade" role="dialog" tabindex="-1">5
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Move Room</h4></div>
                        
                        <form method="POST" action="<?php echo site_url('Directories/mr_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                        <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">Tenant: <?php echo $tenantInfo->tenant_fname." ". $tenant->tenant_lname; ?></label></div>
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">Current Room</label></div>
                                        <div class="col-xl-12" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;font-size:16px"><?php echo $tenantInfo->room_number;?></label> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">New Room</label></div>
                                        <div class="col-xl-12">
                                            <select class="form-control selectize-multiple" style="font-size:14px" name="mr_roomno" id="etroom_number<?php echo $tenantInfo->dir_id; ?>" >
                                                            <option selected>Select Room</option>
                                                            <?php  
                                                                foreach ($room->result() as $etRoom)  
                                                                {   
                                                                    //$ut_status = $row->$ut_status;
                                                                    //if( $row1->ut_status == "active") {
                                                                        echo "<option value='" . $moveRoom->room_id ."'>". $moveRoom->room_number;
                                                                        echo "</option>";
                                                                    //}
                                                                    
                                                                }
                                                            ?>
                                            </select>
                                            <input name="mr_tenantid" class="form-control" type="hidden" value="<?php echo $tenantInfo->tenant_id; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <?php  
            }
            foreach ($dir->result() as $changeCon)  
            {  
            ?>
            <div id="ChangeContract<?php echo $changeCon->dir_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Edit Contract</h4></div>
                        
                        <form method="POST" action="<?php echo site_url('Directories/cc_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                        <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-row">
                                    <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">Tenant: <?php echo $tenantInfo->tenant_fname." ". $tenant->tenant_lname; ?></label></div>
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">Start of Contract</label></div>
                                        <div class="col-xl-12" style="font-weight: normal;"><input name="cc_start" class="form-control" type="date" value="<?php echo $changeCon->contract_start; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-12" style="font-weight: bold;"><label class="col-form-label" style="font-weight: bold;">New Contract</label></div>
                                        <div class="col-xl-12">
                                            <input name="cc_date" class="form-control" type="date">  
                                            <input name="cc_tenantid" class="form-control" type="hidden" value="<?php echo $changeCon->tenant_id; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <?php  
                }
                foreach ($dir->result() as $reset)  
                {  
            ?>
                <div id="ResetPW<?php echo $reset->dir_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Reset Password</h4></div>
                            
                            <form method="POST" name="reset_password" action="<?php echo site_url('Directories/rp_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                            <div class="modal-body text-center">
                                    <p style="font-size: 17px;">Are you sure you want to reset password of <?php echo $reset->tenant_fname." ".$reset->tenant_lname; ?>?</p>
                                    <input type="hidden" name="rp_tenantid" value="<?php echo $reset->tenant_id; ?>" >
                                    <input type="hidden" name="rp_pw" value="thores123" >
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                            </form>
                        </div>
                    </div>
                </div>                
            <?php }  
                
                foreach ($dir->result() as $activate)  
                {  
            ?>
                <div id="ModalActivate<?php echo $activate->dir_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Activate User</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                                <form method="POST" name="activate_tenant" action="<?php echo site_url('Directories/activate_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                        <p style="font-size: 17px;">Are you sure you want to activate tenant <?php echo $activate->tenant_fname." ".$activate->tenant_lname; ?>?</p>
                                        <input type="hidden" name="atenant_id" value="<?php echo $activate->tenant_id; ?>" >
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" name="activate_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php }  ?>

            <!----MODAL DEACTIVATE-->
            <div id="ModalDeac" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Deactivate User</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        
                        <form method="POST" name="deactivate_tenant" action="<?php echo site_url('Directories/deactivate_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                        <div class="modal-body text-center">
                                <?php if ($delete_count > 1 ) { ?>
                                <p style="font-size: 17px;">Are you sure you want to deactivate <?php echo $delete_count; ?> tenants?</p>
                                <?php } else { ?>
                                    <p style="font-size: 17px;">Are you sure you want to deactivate <?php echo $delete_count; ?> tenant?</p>
                                <?php } foreach($deleteArr as $a) { ?>
                                <input type="hidden" name="dtenant_id[]" value="<?php echo $a;  ?>" >
                                <?php } ?>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" name="delete_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <!----END MODAL DEACTIVATE-->
            
            <!-- Modal Add User -->
            <div class="modal fade" role="dialog" tabindex="-1" id="AddUser">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Add Tenant</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:500px;">
                           
                            <form id="form_adduser" action="<?php echo site_url('Directories/create_tenant');?>" method="POST" style="height:100%;overflow-y:scroll;overflow-x:hidden;">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                        <h6 style="font-size:12px;color:red;">* Required</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col">
                                                <input name="room_id" class="form-control" type="hidden" value="<?php echo $this->session->userdata['data']['room_id']; ?>" >
                                                <input name="room_number" class="form-control" type="text" value="<?php echo $this->session->userdata['data']['room_no']; ?>" disabled>
                                                       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_fname" class="form-control" type="text" placeholder="Enter first name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_lname" class="form-control" type="text" placeholder="Enter last name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Address<span style="color:red">*</span></label></div>
                                                <div class="col"><textarea name="tenant_address" class="form-control" row="2" type="text" placeholder="Enter home address" required></textarea></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Birthday<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_bday" class="form-control" type="date" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Email<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_email" class="form-control" type="email" placeholder="Enter email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Contact No<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_cno" class="form-control" type="number" placeholder="Enter contact number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">School/Company<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_school" class="form-control" type="text" placeholder="Enter school or company" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_course" class="form-control" type="text" placeholder="Enter course" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Special Medical Instructions </label></div>
                                                <div class="col"><textarea name="tenant_medical" class="form-control" row="2" type="text" placeholder="Enter special medical instructions" required></textarea></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="mother_name" class="form-control" type="text" placeholder="Enter mother's full name" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="mother_mno" class="form-control" type="number" placeholder="Enter mother's mobile number" ></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="father_name" class="form-control" type="text" placeholder="Enter father's full name" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="father_mno" class="form-control" type="number" placeholder="Enter fathers's mobile number" ></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Person to contact in case of emergency</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_name" class="form-control" type="text" placeholder="Enter guardian's full name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Relationship<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_rel" class="form-control" type="text" placeholder="Enter relationship to the guardian" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Email<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_email" class="form-control" type="email" placeholder="Enter guardian's email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_mno" class="form-control" type="number" placeholder="Enter guardian's mobile number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Landline No <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_lno" class="form-control" type="number" placeholder="Enter guardian's landline number" ></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Move-in Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Date of move-in<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="contract_start" class="form-control" type="date" required></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit"  style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End modal Add User-->
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/selectize/standalone/selectize.min.js"></script>
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