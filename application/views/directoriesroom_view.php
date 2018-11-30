<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DORMasino</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link href="<?php echo base_url(); ?>/assets/css/selectize.bootstrap4.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
</head>


    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Rooms</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-flex d-sm-flex d-md-flex d-xl-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end" style="margin-top: 0px;padding-right: 0px;"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddRoom" style="background-color: #28a745;color: #ffffff;border: none;">Add Room</button></div>
                </div>
                <div class="row" style="margin-top: 20px;margin-left:0px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                        
                        <div id="table_view" class="table-responsive" style="width:100%;">
                            <table class="table" id="example" style="font-size:14px;">
                                <thead class="logs">
                                    <tr style="text-align:center">
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Floor No</th>
                                        <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                        <th style="width: 18%;padding-right: 0px;padding-left: 0px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($room->result() as $row) {
                                       
                                    ?>
                                         
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row->floor_number; ?></td>
                                            <td style="text-align:center;"><?php echo $row->room_number; ?></td>
                                            
                                            
                                           
                                            <td style="text-align:center;">
                                                <?php 
                                                    $status = $row->room_status;
                                                    if ( $status == 1) { ?>

                                                    <button title="Edit Room" data-target="#EditRoom<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="padding:0px 3px;">
                                                        <i class="fa fa-edit" style="font-size: 14px"></i>
                                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button title="Deactivate user" name="delete" data-target="#ModalDeac<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-danger" style="padding:0px 3px;">
                                                        <i class="fa fa-ban" style="font-size: 14px"></i>
                                                    </button>

                                                <?php } else { ?>
                                                    <button title="Activate user" data-target="#ModalActivate<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-success" style="padding:0px 3px;">
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
                    <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                        <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
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
                                                <select class="form-control d-xl-flex" name="arFloor" placeholder="Select region" id="region">
                                                    <option selected="Select floor number" disabled>Select floor number</option>
                                                    <?php foreach($dir->result() as $arFloor) { 
                                                            echo "<option value='" . $arFloor->floor_id ."'>". $arFloor->floor_number;
                                                            echo "</option>";
                                                     } ?>
                                                </select>
                                            </div>
                                           
                                            </div>
                                    </div>
                                    <?php 
                                    // $a = 0;
                                    // foreach($room->result() as $row5) {
                                    //     if($row5->floor_id ==  $row4->floor_id) {
                                    //         $a = $room->last_row();
                                    //     }
                                    // } ?>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                            <div class="col"><input name="arRoomNo" class="form-control d-xl-flex" placeholder="Enter room number" type="text" value="<?php 
                                            // if(empty($a->room_number)) {
                                            //     echo ($row4->floor_number) * 100 + 1 ;
                                            // } else {
                                            //     if(($a->room_number - ($row4->floor_number * 100))  == 12) {
                                            //         echo ($a->room_number) + 2 ; 
                                            //     } else {
                                            //         echo ($a->room_number) + 1 ; 
                                            //     }
                                            // }
                                            ?>" ></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Price</label></div>
                                            <div class="col"><input name="arRoomPrice"  class="form-control" type="text" placeholder="Enter price of room"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                            <div class="col"><input name="arRoomTcount"  class="form-control" type="text" placeholder="Enter number of people"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
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
                                <h4 class="modal-title" style="color: #11334f;">Edit Room</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <form action="<?php echo site_url('Directories/update_room');?>" method="POST">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Floor</label></div>
                                            <div class="col"><input  class="form-control d-xl-flex" type="text" value="<?php echo $rmedit->floor_number; ?>" disabled></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                            <div class="col"><input name="edit_roomno" class="form-control d-xl-flex" type="text" value="<?php echo $rmedit->room_number; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Price</label></div>
                                            <div class="col"><input name="edit_roomprice"  class="form-control" type="text" value="<?php echo $rmedit->room_price; ?>" ></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                            <div class="col"><input name="edit_roomtcpunt" class="form-control" type="text" value="<?php echo $rmedit->room_tcount; ?>"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                        </div>
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
                            <div class="modal-body text-center">
                                    <p style="font-size: 17px;">Are you sure you want to deactivate Room <?php echo $deac->room_number; ?>?</p>
                                    <input type="hidden" name="dtenant_id" value="<?php echo $deac->room_id; ?>" >
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" name="delete_room" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }  
                
                foreach ($dir->result() as $activate)  
                {  
            ?>
                <div id="ModalActivate<?php echo $activate->room_id; ?>" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Activate Room</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                                <form method="POST" name="activate_tenant" action="<?php echo site_url('Directories/activate_room');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                        <p style="font-size: 17px;">Are you sure you want to activate tenant <?php echo $deac->room_number;  ?>?</p>
                                        <input type="hidden" name="atenant_id" value="<?php echo $deac->room_id;  ?>" >
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
</body>

</html>