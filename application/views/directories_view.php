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

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;">
                    <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Directories</p>
                </div><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col" style="margin-top: 11px;padding-left: 36px;">
                        <div class="btn-group" role="group"><button class="btn btn-success" type="button" style="font-size: 14px;">Room View</button><button class="btn btn-info" type="button" style="width: 106.656px;background-color: #83c592;border-color: #83c592;font-size: 14px;">User View</button></div>
                    </div>
            </div>
            <div class="row" style="margin-top: 21px;margin-left: 0px;margin-right: 0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 36px;">

                    <div role="tablist" id="accordion-1" style="width: 100%;">
                    <?php  
                        
                        foreach ($floor->result() as $row)  
                        {
                    ?>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center mr-lg-auto align-items-xl-center mr-xl-auto mb-0">
                                    <a class="d-flex align-items-lg-center" data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-<?php echo $row->floor_number; ?>" href="div#accordion-1 .item-<?php echo $row->floor_number; ?>" style="font-size: 14px;width: 80%;">
                                        Floor <?php echo $row->floor_number ; ?>

                                    </a>
                                    <button class="btn btn-primary d-xl-flex ml-auto ml-lg-auto ml-xl-auto"
                                        type="button" id="room" style="padding-bottom: 0px;padding-top: 1px;padding-right: 0px;padding-left: 2.5px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom<?php echo $row->floor_number; ?>">
                                        <i class="fa fa-plus" style="font-size: 14px;color: #555555;width: 5%;"></i>&nbsp;
                                    </button>
                                </h5>
                            </div>
                            <div class="collapse item-<?php echo $row->floor_number; ?>" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <?php foreach ($room->result() as $row1)  
                                            {
                                                if ($row1->floor_id == $row->floor_id) {

                                                
                                        ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room <?php echo $row1->room_number; ?></h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser<?php echo $row1->room_id;?>"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <?php 
                                                if($dir->num_rows() == 0 ) {
                                                ?>
                                                
                                                    <p class="card-text" style="font-weight: normal;font-size: 14px;">No tenant yet.</p>
                                                <?php } else if($dir->num_rows() >= 1 ) {
                                                    foreach ($dir->result() as $row2)  
                                                    {
                                                        if ($row2->room_id == $row1->room_id) {
                                                            
                                                ?>
                                                    <p class="card-text" style="font-weight: normal;font-size: 14px;"><?php echo $row2->tenant_fname ." ". $row2->tenant_lname;?></p>
                                                        <?php }
                                                    } 
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
            </div>
                                        
            <?php 
           // foreach($room->result() as $row8){ 
                foreach($room->result() as $row6){ ?>
            
            <div class="modal fade" role="dialog" tabindex="-1" id="AddUser<?php echo $row6->room_id; ?>">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Add Tenant</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height:350px;">
                            <form action="<?php echo site_url('Directories/create_tenant');?>" method="POST" style="height:100%;overflow-y:scroll;overflow-x:hidden;">
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Tenant Information</h6>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col">
                                                <input name="floor_id" class="form-control" type="hidden" value="<?php echo $row6->floor_id; ?>" >
                                                <input name="room_id" class="form-control" type="hidden" value="<?php echo $row6->room_id; ?>" >
                                                <input name="room_number" class="form-control" type="text" value="<?php echo $row6->room_number; ?>" disabled>
                                                       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                                <div class="col"><input name="tenant_fname" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                                <div class="col"><input name="tenant_lname" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Address</label></div>
                                                <div class="col"><textarea name="tenant_address" class="form-control" row="2" type="text" placeholder="Enter tenant home address" required></textarea></div>
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
                                                <div class="col"><input name="tenant_email" class="form-control" type="email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Facebook</label></div>
                                                <div class="col"><input name="tenant_fb" class="form-control" type="text" placeholder="Enter tenant facebook account" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Contact No</label></div>
                                                <div class="col"><input name="tenant_cno" class="form-control" type="number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">School/Company</label></div>
                                                <div class="col"><input name="tenant_school" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course</label></div>
                                                <div class="col"><input name="tenant_course" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;font-size:14px;">Mother</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="mother_name" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="mother_mno" class="form-control" type="number" required></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Father</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="father_name" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="father_mno" class="form-control" type="number" required></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;font-size:14px;">Person to contact in case of emergency</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input name="guardian_name" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Relationship</label></div>
                                                <div class="col"><input name="guardian_rel" class="form-control" type="text" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input name="guardian_email" class="form-control" type="email" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Mobile No</label></div>
                                                <div class="col"><input name="guardian_mno" class="form-control" type="number" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Landline No</label></div>
                                                <div class="col"><input name="guardian_lno" class="form-control" type="number" ></div>
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

            <?php //}
            }
            
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
    </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>

</html>