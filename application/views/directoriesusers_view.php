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

                                                <button title="Edit user" data-target="#EditUser<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="padding:0px 3px;">
                                                    <i class="fa fa-edit" style="font-size: 14px"></i>
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button title="Deactivate user" name="delete" data-target="#ModalDeac<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-danger" style="padding:0px 3px;">
                                                    <i class="fa fa-ban" style="font-size: 14px"></i>
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
                </div>
                
            </div>
                                        
           

            <?php //}
            
           
            foreach($dir->result() as $editTenant){ ?>
            
            <div class="modal fade" role="dialog" tabindex="-1" id="EditUser<?php echo $editTenant->dir_id; ?>">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Edit Tenant Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:350px;">
                            <form action= method="POST" style="height:100%;overflow-y:scroll;overflow-x:hidden;">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col">
                                                 <select class="form-control selectize-multiple" name="etroom_number" id="etroom_number<?php echo $editTenant->dir_id; ?>" >
                                                                <option value="<?php echo $editTenant->room_id;?>" selected><?php echo $editTenant->room_number;?></option>
                                                                <?php  
                                                                    foreach ($room->result() as $etRoom)  
                                                                    {   
                                                                        //$ut_status = $row->$ut_status;
                                                                        //if( $row1->ut_status == "active") {
                                                                            echo "<option value='" . $etRoom->room_id ."'>". $etRoom->room_number;
                                                                            echo "</option>";
                                                                        //}
                                                                        
                                                                    }
                                                                ?>
                                                </select>
                                                <input name="etenant_id" class="form-control" type="hidden" value="<?php echo $editTenant->tenant_id; ?>" >
                                                       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                                <div class="col"><input name="etenant_fname" class="form-control" type="text" value="<?php echo $editTenant->tenant_fname; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                                <div class="col"><input name="etenant_lname" class="form-control" type="text" value="<?php echo $editTenant->tenant_lname; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Address</label></div>
                                                <div class="col"><textarea name="etenant_address" class="form-control" row="2" type="text" placeholder="<?php echo $editTenant->tenant_address; ?>" required></textarea></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Birthday</label></div>
                                                <div class="col"><input name="etenant_bday" class="form-control" type="date" value="<?php echo $editTenant->tenant_birthday; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input name="etenant_email" class="form-control" type="email" value="<?php echo $editTenant->tenant_email; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Facebook</label></div>
                                                <div class="col"><input name="etenant_fb" class="form-control" type="text" value="<?php echo $editTenant->tenant_fb; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Contact No</label></div>
                                                <div class="col"><input name="etenant_cno" class="form-control" type="number" value="<?php echo $editTenant->tenant_cno; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">School/Company</label></div>
                                                <div class="col"><input name="etenant_school" class="form-control" type="text" value="<?php echo $editTenant->tenant_school; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course</label></div>
                                                <div class="col"><input name="etenant_course" class="form-control" type="text" value="<?php echo $editTenant->tenant_course; ?>" required></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="emother_name" class="form-control" type="text" value="<?php echo $editTenant->mother_name; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="emother_mno" class="form-control" type="number" value="<?php echo $editTenant->mother_mno; ?>" required></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="efather_name" class="form-control" type="text" value="<?php echo $editTenant->father_name; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="efather_mno" class="form-control" type="number" value="<?php echo $editTenant->father_mno; ?>" required></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Person to contact in case of emergency</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="eguardian_name" class="form-control" type="text" value="<?php echo $editTenant->guardian_name; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Relationship</label></div>
                                                <div class="col"><input name="eguardian_rel" class="form-control" type="text" value="<?php echo $editTenant->guardian_rel; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input name="eguardian_email" class="form-control" type="email" value="<?php echo $editTenant->guardian_email; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="eguardian_mno" class="form-control" type="number" value="<?php echo $editTenant->guardian_mno; ?>" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Landline No</label></div>
                                                <div class="col"><input name="eguardian_lno" class="form-control" type="number" value="<?php echo $editTenant->guardian_lno; ?>" ></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Move-in Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Date of move-in</label></div>
                                                <div class="col"><input name="econtract_start" class="form-control" type="date" value="<?php echo $editTenant->contract_start; ?>"></div>
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
                foreach ($dir->result() as $deac)  
                {  
            ?>
                <div id="ModalDeac<?php echo $deac->dir_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Deactivate User</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            
                            <form method="POST" name="deactivate_tenant" action="<?php echo site_url('Directories/deactivate_tenant');?>" class="justify" style="width: 100%;margin: 0 auto;">
                            <div class="modal-body text-center">
                                    <p style="font-size: 17px;">Are you sure you want to deactivate tenant <?php echo $deac->tenant_fname." ".$deac->tenant_lname; ?>?</p>
                                    <input type="hidden" name="dtenant_id" value="<?php echo $deac->tenant_id; ?>" >
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

            
            <!-- Modal Add User -->
            <div class="modal fade" role="dialog" tabindex="-1" id="AddUser">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Add Tenant</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:350px;">
                            <form action="<?php echo site_url('Directories/create_tenant');?>" method="POST" style="height:100%;overflow-y:scroll;overflow-x:hidden;">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                        <h6 style="font-size:12px;color:#c7c7c7;">* Optional</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col">
                                                <input name="room_id" class="form-control" type="hidden" value="<?php echo $this->session->userdata['data']['r_id']; ?>" >
                                                <input name="room_number" class="form-control" type="text" value="<?php echo $this->session->userdata['data']['r_no']; ?>" disabled>
                                                       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                                <div class="col"><input name="tenant_fname" class="form-control" type="text" placeholder="Enter first name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                                <div class="col"><input name="tenant_lname" class="form-control" type="text" placeholder="Enter last name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Address</label></div>
                                                <div class="col"><textarea name="tenant_address" class="form-control" row="2" type="text" placeholder="Enter home address" required></textarea></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Birthday</label></div>
                                                <div class="col"><input name="tenant_bday" class="form-control" type="date" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input name="tenant_email" class="form-control" type="email" placeholder="Enter email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Facebook</label></div>
                                                <div class="col"><input name="tenant_fb" class="form-control" type="text" placeholder="Enter facebook account" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Contact No</label></div>
                                                <div class="col"><input name="tenant_cno" class="form-control" type="number" placeholder="Enter contact number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">School/Company</label></div>
                                                <div class="col"><input name="tenant_school" class="form-control" type="text" placeholder="Enter school or company" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course</label></div>
                                                <div class="col"><input name="tenant_course" class="form-control" type="text" placeholder="Enter course" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Special Medical Instructions *</label></div>
                                                <div class="col"><textarea name="tenant_medical" class="form-control" row="2" type="text" placeholder="Enter special medical instructions" required></textarea></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="mother_name" class="form-control" type="text" placeholder="Enter mother's full name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="mother_mno" class="form-control" type="number" placeholder="Enter mother's mobile number" required></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="father_name" class="form-control" type="text" placeholder="Enter father's full name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="father_mno" class="form-control" type="number" placeholder="Enter fathers's mobile number" required></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Person to contact in case of emergency</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="guardian_name" class="form-control" type="text" placeholder="Enter guardian's full name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Relationship</label></div>
                                                <div class="col"><input name="guardian_rel" class="form-control" type="text" placeholder="Enter relationship to the guardian" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input name="guardian_email" class="form-control" type="email" placeholder="Enter guardian's email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="guardian_mno" class="form-control" type="number" placeholder="Enter guardian's mobile number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Landline No *</label></div>
                                                <div class="col"><input name="guardian_lno" class="form-control" type="number" placeholder="Enter guardian's landline number" ></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Move-in Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Date of move-in</label></div>
                                                <div class="col"><input name="contract_start" class="form-control" type="date"></div>
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