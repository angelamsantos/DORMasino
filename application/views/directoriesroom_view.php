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
$c="";
$d="";
if($adir[4] == 1) { //add
    $a = "title='Add Tenant'";
} else {
    $a = "disabled title='This feature is not available on your account'";
} 

if($adir[5] == 1) { //edit
    $b = "title='Edit Room'";
} else {
    $b = "disabled title='This feature is not available on your account'";
}

if($adir[6] == 1) { //delete
    $c = "title='Deactivate/Activate Room'";
    $d = "title='Deactivating is disabled. The room is still occupied.'";
} else {
    $c = "disabled title='This feature is not available on your account'";
} 

?>
<html>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
</style>

    <script>

    $(document).ready(function () {
        $('#room_datatable').dataTable( {
            "aLengthMenu": [[7, 14, 21, -1], [7, 14, 21, "All"]],
            "pageLength": 7,
            "ordering": false
        });
    });

    </script>


    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Rooms</p>
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
                    &nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" style="margin-top: 0px;padding-right: 0px;padding-left:0px;">
                        <p class="mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size:14px;margin-bottom:0px;width:100%"><span><b>Legend: </b></span>&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-edit" style="font-size:19px;"></i> - Edit Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-minus-circled" style="font-size:19px;"></i> - Deactivate Room &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="icon ion-android-checkmark-circle" style="font-size:19px;"></i> - Activate Room
                        
                        </p>
                    <button <?php echo $a; ?> class="btn btn-primary ml-xl-auto ml-lg-auto ml-md-auto mr-sm-auto mr-auto " type="button" data-toggle="modal" data-target="#AddRoom" style="background-color: #28a745;color: #ffffff;border: none;">Add Room</button>
                    </div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
	                    <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;margin-left:0px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                        
                        <div id="table_view" class="table-responsive" style="width:100%;">
                            <table class="table" id="room_datatable" style="font-size:14px;">
                                <thead class="logs">
                                    <tr style="text-align:center">
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Floor No</th>
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Capacity</th>
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Price</th>
                                        <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($adir[7] == 1) { ?>
                                    <?php foreach ($dir_count1->result() as $row) {
                                       
                                    ?>
                                         
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row->floor_number; ?></td>
                                            <td style="text-align:center;"><?php echo $row->room_number; ?></td>
                                            <td style="text-align:center;"><?php echo $row->room_tcount; ?></td>
                                            <td style="text-align:center;"><?php echo "Php ".number_format($row->room_price, 2); ?></td>
                                            
                                           
                                            <td style="text-align:center;">
                                                <?php 

                                                    $status = $row->room_status;
                                                    $capacity = $row->num_tenants;

                                                    if ( $status == 1) { ?>

                                                            <button <?php echo $b; ?> type="button" id="edit-room" data-target="#EditRoom<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                                <i class="icon ion-edit" style="font-size: 19px;color:#0645AD;"></i>
                                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                                            <?php if ($capacity == 0) { ?>

                                                                <button <?php echo $c; ?>  type="button" id="edit-room" name="delete" data-target="#ModalDeac<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                                    <i class="icon ion-minus-circled" style="font-size: 19px; color:#0645AD;"></i>
                                                                </button>
 
                                                            <?php } else { ?>

                                                                <button <?php echo $d; ?> id="edit-room" name="delete" data-target="#ModalDeac<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px" disabled>
                                                                <i class="icon ion-minus-circled" style="font-size: 19px;"></i>
                                                                </button>

                                                            <?php } ?>

                                                <?php } else { ?>
                                                    <button <?php echo $c; ?>  type="button" id="edit-room" name="delete" data-target="#Act<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                        <i class="icon ion-android-checkmark-circle" style="font-size: 19px; color:#0645AD;"></i>
                                                    </button>
                                                <?php } ?>                                                                                 
                                            </td>  
                                        </tr>
                                    <?php } ?>
                                <?php } else  { ?>
                                    <tr>
                                        <td style="text-align:center;" colspan="5"><i>Cannot view rooms.</i></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/homelogo.png" style="width: 158px;">
                        <p style="font-size: 12px;">DORMasino&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
                    </footer>
                </div>
            <!--Modal Add Room -->
                <div class="modal fade" role="dialog" tabindex="-1" id="AddRoom">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Add Room</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <form action="<?php echo site_url('Directories/add_room');?>" method="POST">
                                    <div class="form-group">
                                        <div class="form-row">
                                            
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Floor</label></div>
                                            <div class="col">

                                                <select name="floor_id" id="sel_floor" class="form-control d-xl-flex" required>

                                                    <option value="">Select Floor</option>
                                                    <?php

                                                        foreach ($floor->result() as $row4) {

                                                            echo '<option value="'. $row4->floor_id .'"> '. $row4->floor_number .' </option>';
                                                            
                                                        }

                                                    ?>

                                                </select>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                            <div class="col"><input name="arRoomNo" id="sel_room" class="form-control d-xl-flex" type="text" value="Room number" readonly="readonly" required />
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Price</label></div>
                                            <div class="col"><input name="arRoomPrice"  class="form-control" type="number" placeholder="Enter price of room" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                            <div class="col"><input name="arRoomExtra"  class="form-control" type="number" placeholder="Enter price of extra charge" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                            <div class="col"><input name="arRoomTcount"  class="form-control" type="number" placeholder="Enter number of people" min="3" required></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            <!--End Modal Add Room -->  
            <!--Modal Edit Room -->
            <?php foreach($room->result() as $rmedit) { ?>
                <div class="modal fade" role="dialog" tabindex="-1" id="EditRoom<?php echo $rmedit->room_id; ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Edit Room Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <form action="<?php echo site_url('Directories/update_room');?>" method="POST">
                                <input type="hidden" name="room_id" value="<?php echo $rmedit->room_id; ?>" />
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Floor</label></div>
                                            <div class="col"><input  class="form-control d-xl-flex" type="text" value="<?php echo $rmedit->floor_number; ?>" readonly="readonly"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                            <div class="col"><input name="edit_roomno" class="form-control d-xl-flex" type="text" value="<?php echo $rmedit->room_number; ?>" readonly="readonly"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Price</label></div>
                                            <div class="col"><input name="update_roomprice"  style="text-align:right;" class="form-control" type="number" value="<?php echo $rmedit->room_price; ?>" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                            <div class="col"><input name="update_roomextra" style="text-align:right;"  class="form-control" type="number" value="<?php echo $rmedit->room_extra; ?>" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                            <div class="col"><input name="update_roomtcount" class="form-control" type="number" value="<?php echo $rmedit->room_tcount; ?>" required></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
            <!--End Modal Edit Room -->  
            <?php  
                
                foreach ($room->result() as $deac)  
                {  
            ?>
                <div id="ModalDeac<?php echo $deac->room_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Deactivate Room</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            
                            <form method="POST" name="deactivate_tenant" action="<?php echo site_url('Directories/deactivate_room');?>" class="justify" style="width: 100%;margin: 0 auto;">
                            <input type="hidden" name="droom_id" value="<?php echo $deac->room_id; ?>" />
                            <div class="modal-body text-center">
                                    <p style="font-size: 17px;">Are you sure you want to deactivate room <?php echo $deac->room_number; ?>?</p>
                                    <input type="hidden" name="dtenant_id" value="<?php echo $deac->room_id; ?>" >
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" name="delete_room" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
                
                foreach ($room->result() as $activate)  
                {  
            ?>
                <div id="Act<?php echo $activate->room_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Activate Room</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                                <form method="POST" name="activate_tenant" action="<?php echo site_url('Directories/activate_room');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                <input type="hidden" name="aroom_id" value="<?php echo $activate->room_id; ?>" />
                                    <div class="modal-body text-center">
                                        <p style="font-size: 17px;">Are you sure you want to activate room <?php echo $activate->room_number;  ?>?</p>
                                        <input type="hidden" name="atenant_id" value="<?php echo $activate->room_id;  ?>" >
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" name="activate_user" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            

            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script>

        $(document).ready(function(){
            $('#sel_floor').change(function(){
                var floor_id = $('#sel_floor').val();
             
                if(floor_id != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Directories/fetch_room",
                        method:"POST",
                        data:{floor_id:floor_id},
                        success:function(data) {
                        $('#sel_room').val(data);
                        }
                    });
                } else {
                    $('#sel_room').val('Room number');
                }
            });
        });

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