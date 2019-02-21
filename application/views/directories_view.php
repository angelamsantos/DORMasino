<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    $admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
    $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];
    $a="";
    $b="";
    if($adir[0] == 1) { 
        $a = "title='Add Tenant'";
    } else {
        $a = "disabled title='This feature is not available on your account'";
    } 

    if($adir[3] == 1) { 
        $b = "title='View Tenants'";
    } else {
        $b = "disabled title='This feature is not available on your account'";
    } 

?>
<style>
.form-control {
    font-size: 14px;
    height:35px;
}

    #panel[aria-expanded="false"]:before
    {
        font-family: 'Ionicons';
        content: "\f363"; 
        float: right;
        margin-right:10px;
        color: #b0c5d8;
        font-size: 20px;
        line-height: 22px;
/*         
        -webkit-transform: rotate(-90deg);
        -moz-transform:    rotate(-90deg);
        -ms-transform:     rotate(-90deg);
        -o-transform:      rotate(-90deg);
        transform:         rotate(-90deg); */
    }
    #panel[aria-expanded=""]:before
    {
        -webkit-transform: rotate(90deg);
        -moz-transform:    rotate(90deg);
        -ms-transform:     rotate(90deg);
        -o-transform:      rotate(90deg);
        transform:         rotate(90deg);
    }


</style>
<script>
    
   
    $(document).ready(function () {
         $('#example').dataTable();
    });

</script>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Directories</p>
                    <p class="d-none d-lg-block align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a title="Click here to collapse" class="btn btn-link d-xl-flex justify-content-xl-start"  role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
                        <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
                
                
            </div>
            <div class="row" style="margin-top: 10px;margin-left: 0px;margin-right: 0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                    <div id="room_view" style="width: 100%;display:block;">
                    <div role="tablist" id="accordion-1" >
                        <?php  
                            
                            foreach ($floor->result() as $row)  
                            {
                        ?>
                        <div class="card mx-auto">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-row justify-content-start align-items-start justify-content-sm-start align-items-sm-start justify-content-md-start align-items-md-start align-items-lg-start mr-lg-start align-items-xl-start mr-xl-auto mb-0">
                                    <a id="panel" class="d-flex align-items-lg-center" data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-<?php echo $row->floor_number; ?>" href="div#accordion-1 .item-<?php echo $row->floor_number; ?>" style="font-size: 14px;width: 80%;">
                                        Floor <?php echo $row->floor_number ; ?>

                                    </a>
                                </h5>
                            </div>
                            <div class="collapse item-<?php echo $row->floor_number; ?>" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body mx-auto">
                                    <div class="card-group">
                                        <?php foreach ($room->result() as $row1)  
                                            {
                                                if ($row1->floor_id == $row->floor_id) {

                                                
                                        ?>
                                        <div class="card d-inline-block" style="max-width:290px;min-width:270px;border:1px solid #c7c7c7" >
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-9 col-lg-8" style="padding: 0px;">
                                                        <h6 style="font-weight: bold;">Room <?php echo $row1->room_number; ?></h6>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-2" style="padding: 0px;">
                                                    <form action="<?php echo site_url('Directories/getRoom');?>" method="POST">
                                                    <input type="hidden" value="<?php echo $row1->room_id; ?>" name="show_rid">
                                                    <input type="hidden" value="<?php echo $row1->room_number; ?>" name="show_rno">
                                                    <button class="btn btn-primary d-xl-flex ml-auto" type="submit" id="user" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;height: 29px;width: 30.2188px;"
                                                    <?php echo $b; ?> ><i class="icon ion-eye" style="font-size: 24px;color: #555555;padding-left: 0px;margin-left: 4.8px;"></i>&nbsp;</button>
                                                    </form>
                                                    </div>
                                                    <div class="col-xl-1 col-lg-2"
                                                        style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                        <?php echo $a; ?> data-toggle="modal" data-target="#AddUser<?php echo $row1->room_id;?>"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                    
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Room Information:</p>
                                                <?php foreach ($dir_count->result() as $nt) {
                                                    if ($nt->room_id == $row1->room_id) { ?>
                                                        <p class="card-text" style="font-size: 14px;">Current number of tenants: <?php echo $nt->num_tenants;?></p>

                                                        
                                                            <?php $acc = $nt->num_tenants; if ((4 - $acc) > 0) { ?>
                                                                <p class="card-text" style="font-size: 14px;">Number of tenants to accommodate: 
                                                                <span style="color:green"> <?php echo (4 - $acc); ?> </span></p>
                                                            <?php } else if ((4 - $acc) == 0) { ?>
                                                                <p class="card-text" style="font-size: 14px;"><span style="color:red"> Room is already full. </span></p> 
                                                            <?php } else if ((4 - $acc) < 0) { ?>
                                                                <p class="card-text" style="font-size: 14px;"><span style="color:red"> Room is already full. </span></p>
                                                            <?php }  ?>
                                                        
                                                        
                                                    
                                                <?php }
                                                } ?>
                                                
                                               
                                            </div>
                                        </div>
                                            <?php } 
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    </div>
                    <div id="table_view" class="table-responsive" style="width:100%;display:none; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0);margin:-15px; padding:15px;">
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

                                                <button hidden title="Edit user" data-target="#EditUser<?php echo $tenant->dir_id; ?>" data-toggle="modal" class="btn btn-primary" style="padding:0px 3px;">
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
                                        
            <?php 
           
            foreach($room->result() as $row6){ ?>
            
            <div class="modal fade" role="dialog" tabindex="-1" id="AddUser<?php echo $row6->room_id; ?>">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;"><?php echo $row6->room_number; ?>: Add Tenant</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:500px;">
                            
                            <form id="form_adduser" action="<?php echo site_url('Directories/create_tenant');?>" method="POST" style="height:100%;overflow-y:scroll;overflow-x:hidden;">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                        <h6 style="font-size:12px;color:red">* Required</h6>
                                        
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_fname" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your first name must contain only letters." placeholder="Enter first name" required></div>
                                                <input name="floor_id" class="form-control" type="hidden" value="<?php echo $row6->floor_id; ?>" >
                                                <input name="room_id" class="form-control" type="hidden" value="<?php echo $row6->room_id; ?>" >
                                                <input name="room_number" class="form-control" type="hidden" value="<?php echo $row6->room_number; ?>">
                                                    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_lname" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your last name must contain only letters." placeholder="Enter last name" required></div>
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
                                                <div class="col"><input name="tenant_cno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" placeholder="Enter contact number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">School/Company<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_school" class="form-control" type="text" pattern="[a-zA-Z- .'/]{2,30}" title="Your school or company must contain only letters." placeholder="Enter school or company" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_course" class="form-control" type="text" pattern="[a-zA-Z- .'/]{2,30}" title="Your course must contain only letters. N/A if not applicable." placeholder="Enter course" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Special Medical Instructions</label></div>
                                                <div class="col"><textarea name="tenant_medical" class="form-control" row="2" type="text" placeholder="Enter special medical instructions" ></textarea></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name </label></div>
                                                <div class="col"><input name="mother_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your mother's name must contain only letters." placeholder="Enter mother's full name" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No </label></div>
                                                <div class="col"><input name="mother_mno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" placeholder="Enter mother's mobile number" ></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name </label></div>
                                                <div class="col"><input name="father_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your father's name must contain only letters." placeholder="Enter father's full name"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No </label></div>
                                                <div class="col"><input name="father_mno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" placeholder="Enter father's mobile number"></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Person to contact in case of emergency</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your guardian's name must contain only letters." placeholder="Enter guardian's full name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Relationship <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_rel" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Your relationship with the guardian must contain only letters." placeholder="Enter relationship to the guardian" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Email <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_email" class="form-control" type="email" placeholder="Enter guardian's email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_mno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" placeholder="Enter guardian's mobile number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Landline No </label></div>
                                                <div class="col"><input name="guardian_lno" class="form-control" type="tel" maxlength="7" pattern="[0-9]{7}" title="The telephone number should be 7 digits." placeholder="Enter guardian's landline number" ></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Move-in Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Date of move-in <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="contract_start" class="form-control" type="date" min=<?php echo date('d/m/Y'); ?> title="The date must be <?php echo date('d/m/Y'); ?> or later" required></div>
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

            <?php //}
            } 
           
            foreach($dir->result() as $editTenant){ ?>
            
            <div class="modal fade" role="dialog" tabindex="-1" id="EditUser<?php echo $editTenant->dir_id; ?>">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Edit Tenant Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:350px;">
                            <form action="<?php echo site_url('Directories/update_tenant');?>" method="POST" style="height:100%;overflow-y:scroll;overflow-x:hidden;">
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
                                    <p style="font-size: 17px;">Are you sure you want to deactivate tenant <?php echo $deac->tenant_fname." ".$deac->tenant_lname; ?> ?</p>
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
                                        <p style="font-size: 17px;">Are you sure you want to activate tenant <?php echo $activate->tenant_fname." ".$activate->tenant_lname; ?> ?</p>
                                        <input type="hidden" name="atenant_id" value="<?php echo $activate->tenant_id; ?>" >
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" name="activate_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php } 
                     
            foreach($floor->result() as $row4) { ?>

            
            <div class="modal fade" role="dialog" tabindex="-1" id="AddRoom<?php echo $row4->floor_number; ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Add Room</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Floor</label></div>
                                        <div class="col"><input class="form-control d-xl-flex" type="text" value="<?php echo $row4->floor_number; ?>" disabled=""></div>
                                    </div>
                                </div>
                                <?php 
                                $a = 0;
                                foreach($room->result() as $row5) {
                                    if($row5->floor_id ==  $row4->floor_id) {
                                        $a = $room->last_row();
                                    }
                                } ?>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                        <div class="col"><input class="form-control d-xl-flex" type="text" value="<?php 
                                        if(empty($a->room_number)) {
                                            echo ($row4->floor_number) * 100 + 1 ;
                                        } else {
                                            if(($a->room_number - ($row4->floor_number * 100))  == 12) {
                                                echo ($a->room_number) + 2 ; 
                                            } else {
                                                echo ($a->room_number) + 1 ; 
                                            }
                                        }
                                        ?>" disabled=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Price</label></div>
                                        <div class="col"><input class="form-control" type="text" placeholder="Enter price of room"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                        <div class="col"><input class="form-control" type="text" placeholder="Enter number of people"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
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