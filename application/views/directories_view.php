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
                </div><a title="Click here to collapse" class="btn btn-link d-xl-flex justify-content-xl-start"  role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" style="margin-top: 0px;padding-right: 0px;padding-left:0px;">
                        <p class="mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size:14px;margin-bottom:0px;width:100%"><span><b>Legend: </b></span>&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-eye" style="font-size:24px;"></i> - View Tenants &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fas fa-user-plus" style="font-size:16px;"></i> - Add Tenant
                           
                        </p>
                   
                    </div>
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
                                <div class="card-body">
                                    <div class="card-group" >
                                        <?php foreach ($room->result() as $row1)  
                                            {
                                                if ($row1->floor_id == $row->floor_id) {

                                                
                                        ?>
                                        <div class="card d-inline-block" style="max-width:290px;min-width:270px;border:1px solid #c7c7c7" >
                                            <div class="card-body" >
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
                                                        <?php echo $a; ?> data-toggle="modal" data-target="#NDA<?php echo $row1->room_id;?>"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                    
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Room Information:</p>
                                              
                                                <?php 
                                                $riArr = array();
                                                foreach($dir_count->result() as $dri) {
                                                    array_push($riArr, $dri->room_id);
                                                }
                                                //print_r($riArr);
                                                $aa = array_column($dir_count->result(), 'room_id');
                                               
                                                $bb = $row1->room_id;
                                                //echo $b; 
                                                if (in_array($bb, $riArr, true)) {
                                                  //echo "yes";
                                                //     foreach ($water->result() as $w) {
                                                //         if($w->room_id == $row2->room_id) {
                                                //             $wc = $w->water_current;
                                                //         }
                                                //     }
                                                    foreach ($dir_count->result() as $nt) {
                                                        if ($nt->room_id == $row1->room_id) { 
                                                        
                                                            ?> 


                                                            <p class="card-text" style="font-size: 14px;">Current number of tenants: <?php echo $nt->num_tenants;?></p>

                                                            
                                                                <?php $acc = $nt->num_tenants; if ((4 - $acc) > 0) { ?>
                                                                    <p class="card-text" style="font-size: 14px;">Number of tenants to accommodate: 
                                                                    <span style="color:green"> <?php echo ($row1->room_tcount - $acc); ?> </span></p>
                                                                <?php } else if ((4 - $acc) == 0) { ?>
                                                                    <p class="card-text" style="font-size: 14px;"><span style="color:red"> Room is already full. </span></p> 
                                                                <?php } else if ((4 - $acc) < 0) { ?>
                                                                    <p class="card-text" style="font-size: 14px;"><span style="color:red"> Room is already full. </span></p>
                                                                <?php } ?>
                                                        
                                                        
                                                            
                                                        
                                                    <?php  } 
                                                    } 
                                                } else { ?>
                                                <p class="card-text" style="font-size: 14px;">Current number of tenants: 0</p>

                                                <p style="font-size: 14px;border:1px solid black">Number of tenants to accommodate: 
                                                <span style="color:green"> <?php echo $row1->room_tcount; ?></span></p>
                                                <?php } ?>
                                                <p style="font-size: 14px;margin-top:2px;" >
                                                <?php 
                                                    $m = 0;
                                                    $f = 0;
                                                    $numt= 0;
                                                    $age = 0;
                                                    foreach ($dir->result() as $ov) { 
                                                    if($ov->room_id == $row1->room_id) {
                                                        if($ov->tenant_status ==  1) {
                                                            if($ov->tenant_sex == "M") {
                                                                $m++;
                                                            } else if($ov->tenant_sex == "F") {
                                                                $f++;
                                                            }
                                                            $age += $ov->tenant_age;
                                                            $numt++;
                                                    } } } 
                                                    echo"Male: ".$m."<br>Female: ".$f;
                                                    echo"<br>Average age: ".$age / $numt;
                                                    ?>
                                                    
                                                </p>

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
                    
                </div>
                
            </div>
            <?php 
           
            foreach($room->result() as $row7){ ?>
            
            <div class="modal fade" role="dialog" tabindex="-1" id="NDA<?php echo $row7->room_id; ?>">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;"><?php echo $row7->room_number; ?>:Terms and Conditions</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:500px;">   
                            <form id="form_nda" action="" method="POST" style="font-size:14px;padding-left: 35px; padding-right:50px;height:100%;overflow-y:scroll;overflow-x:hidden;">
                                <b>To create an account in DORMasino, you’ll need to agree to the Terms of Service below.<br/> 
                                In addition, when you create an account, we process your information as described in our Privacy Policy, including these key points:</b><br/><br/>

                                <b>Data we process when you use DORMasino</b><br/>

                                - We store information you give us like your name, address, birthday, email, contact number, school/company and course.<br/>
                                - We process your transaction records, messages and information your visitors.<br/><br/><br/>


                                <b>Why we process it</b><br/>
                                - Improve the quality of our services regarding the documenting of your electricity, water, and transactions. <br/>
                                - Improve security against data fraud.<br/><br/><br/>

                                <b>You’re in control</b><br/>
                                Depending on your account settings, some of this data may be associated with your DORMasino Account and we treat this data as personal information.<br/><br/><br/>

                                <b>Privacy</b><br/>
                                -The management is the only one to view process the information collected on this system. <br/>
                                -The management have the access to/collect information that you voluntarily submit to us via signing up the website.<br/>
                                -We will not make profit to this information to anyone.<br/>
                                -We will make sure that the information you submit to us is encrypted and transmitted to us in a secure way. You can verify this by looking at the lock icon <br/>
                                in the address bar and looking for "https" at the beginning of the address of the Web page. <br/><br/><br/>


                                <b>By clicking "I agree and continue" means you are agreeing to DORMasino's Terms of Service.</b>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit" name="agree<?php echo $row7->room_id; ?>" style="background-color: #bdedc1;color: #11334f;border: none;">I Agree and Continue</button></div>
                        </form>
                    </div>
                </div>
            </div>                      
            <?php 
            }
            foreach($room->result() as $row8){
                if(isset($_POST["agree".$row8->room_id])) {//to run PHP script on submit
                        echo "<script>
                            $(document).ready(function(){
                                $('#AddUser".$row8->room_id."').modal('show');
                            });
                        </script>";
                }
            }
            

            foreach($room->result() as $row6){ ?>
            
            <div class="modal fade" role="dialog" tabindex="-1" id="AddUser<?php echo $row6->room_id; ?>">
                <div class="modal-dialog modal-lg modal-big" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;"><?php echo $row6->room_number; ?>: Add Tenant</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:500px;">   
                            <form id="form_adduser<?php echo $row6->room_id; ?>" action="<?php echo site_url('Directories/create_tenant');?>" method="POST" style="height:100%;overflow-y:scroll;overflow-x:hidden;">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                        <h6 style="font-size:12px;color:red">* Required</h6>
                                        
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_fname" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="First name must contain only letters." placeholder="Enter first name" required></div>
                                                <input name="floor_id" class="form-control" type="hidden" value="<?php echo $row6->floor_id; ?>" >
                                                <input name="room_id" class="form-control" type="hidden" value="<?php echo $row6->room_id; ?>" >
                                                <input name="room_number" class="form-control" type="hidden" value="<?php echo $row6->room_number; ?>">
                                                    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_lname" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Last name must contain only letters." placeholder="Enter last name" required></div>
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
                                                <div class="col"><input name="tenant_bday" class="form-control" type="date" max=<?php echo date('Y-m-d'); ?> required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Sex<span style="color:red">*</span></label></div>
                                                <div class="col">
                                                    <select class="form-control" name="tenant_sex">
                                                        <option selected disabled>Select sex</option>
                                                        <option value="F">Female</option>
                                                        <option value="F">Male</option>
                                                    </select>
                                                </div>
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
                                                <div class="col"><input name="tenant_school" class="form-control" type="text" pattern="[a-zA-Z- .'/]{2,30}" title="School or company must contain only letters." placeholder="Enter school or company" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course<span style="color:red">*</span></label></div>
                                                <div class="col"><input name="tenant_course" class="form-control" type="text" pattern="[a-zA-Z- .'/]{2,30}" title="Course must contain only letters. N/A if not applicable." placeholder="Enter course" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Special Medical Instructions</label></div>
                                                <div class="col"><textarea name="tenant_medical" class="form-control" row="2" type="text" placeholder="Enter special medical instructions" ></textarea></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name </label></div>
                                                <div class="col"><input name="mother_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Mother's name must contain only letters." placeholder="Enter mother's full name" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No </label></div>
                                                <div class="col"><input name="mother_mno" class="form-control" type="tel" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" title="The contact number should be 11 digits. e.g. 09xxxxxxxxx" placeholder="Enter mother's mobile number" ></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name </label></div>
                                                <div class="col"><input name="father_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Father's name must contain only letters." placeholder="Enter father's full name"></div>
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
                                                <div class="col"><input name="guardian_name" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Guardian's name must contain only letters." placeholder="Enter guardian's full name" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Relationship <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="guardian_rel" class="form-control" type="text" pattern="[a-zA-Z- .ñ]{2,30}" title="Relationship with the guardian must contain only letters." placeholder="Enter relationship to the guardian" required></div>
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
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Start of contract <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="contract_start" class="form-control" type="date" min=<?php echo date('yyyy-mm-dd'); ?> title="The date must be <?php echo date('d/m/Y'); ?> or later" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Date of move-in <span style="color:red">*</span></label></div>
                                                <div class="col"><input name="contract_movein" class="form-control" type="date" min=<?php echo date('yyyy-mm-dd'); ?> title="The date must be <?php echo date('d/m/Y'); ?> or later" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Type of tenant <span style="color:red">*</span></label></div>
                                                <div class="col">
                                                    <?php 
                                                        
                                                            foreach($rtype->result() as $rt) {
                                                                if($rt->room_id == $row6->room_id) {
                                                                    if($rt->type_name) {
                                                                    echo '<input name="type_id" class="form-control" type="hidden" value="'.$rt->type_id.'">';
                                                                    echo '<input name="type_name" class="form-control" type="text" value="'.$rt->type_name.'" disabled>';
                                                                    } else  {
                                                                        echo'<select class="form-control" name="type_id" >
                                                                                <option selected disabled>Select tenant type</option>';
                                                                            foreach($type->result() as $t) { 
                                                                            echo '<option value="'.$t->type_id.'">'.$t->type_name.'</option>';
                                                                            }
                                                                        echo '</select>';
                                                                    }
                                                                }
                                                            }
                                                    ?>
                                                    
                                                </div>
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
        <?php foreach($room->result() as $r){ ?>
        $('#AddUser<?php echo $r->room_id; ?>').on('hidden.bs.modal', function () {
            window.location.href = "index";
        })
        <?php } ?>
    </script>

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