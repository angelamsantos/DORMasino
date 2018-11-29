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
</head>


    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Transactions</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    
                </div>
                <div class="row" style="margin-top: 10px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 0px;">
                        
                        <div id="table_view" class="table-responsive" style="width:100%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0);margin:-15px; padding:50px;">
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
                                            
                                                    <button title="Edit Billing Statement" data-target="#ModalBill<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="padding:0px 3px;">
                                                        <i class="fa fa-edit" style="font-size: 14px"></i>
                                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;                                                                                   
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
            <!--Modal Billing statement -->
            <?php foreach ($room->result() as $row2) { ?>
               
           
            <div class="modal fade" role="dialog" tabindex="-1" id="ModalBill<?php echo $row2->room_id; ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Edit Billing Statement: <?php echo $row2->room_number; ?></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                            <form>
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;">Basic Rent Charges</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Basic Rent Rate</label></div>
                                                <div class="col"><input class="form-control" type="text" value="<?php echo $row2->room_price; ?>" disabled=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                                <div class="col"><input class="form-control" type="text" value="<?php echo $row2->room_tcount; ?>" disabled="" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {?>
                                                    <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Number of Tenants</label></div>
                                                    <div class="col"><input class="form-control" type="text" value="<?php echo $dc->num_tenants; ?>" disabled=""  ></div>
                                                <?php }
                                                } ?>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Exceeded Capacity</label></div>
                                                            <div class="col"><input class="form-control" type="text" value="Yes" disabled=""  ></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Exceeded Capacity</label></div>
                                                        <div class="col"><input class="form-control" type="text" value="No" disabled=""  ></div>
                                                <?php } }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {
                                                            $excess = $dc->num_tenants -  $row2->room_tcount; ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Additional Tenants</label></div>
                                                            <div class="col"><input class="form-control" type="text" value="<?php echo $excess ?>" disabled=""  ></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Additional Tenants</label></div>
                                                        <div class="col"><input class="form-control" type="text" value="0" disabled=""  ></div>
                                                <?php } }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {
                                                            $extra = ($dc->num_tenants -  $row2->room_tcount) * 1500 ; ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                                            <div class="col"><input class="form-control" type="text" value="<?php echo $extra ?>" disabled=""  ></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                                        <div class="col"><input class="form-control" type="text" value="0" disabled=""  ></div>
                                                <?php } }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                            <?php foreach ($dir_count->result() as $dc) { 
                                                    if ($dc->room_id == $row2->room_id) {
                                                        if($dc->num_tenants > $row2->room_tcount) {
                                                            $ex = ($dc->num_tenants -  $row2->room_tcount) * 1500; 
                                                            $tr = $row2->room_price + $ex ; ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Total Rent</label></div>
                                                            <div class="col"><input class="form-control" type="text" value="<?php echo $tr ?>" disabled=""  ></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Total Rent</label></div>
                                                        <div class="col"><input class="form-control" type="text" value="0" disabled=""  ></div>
                                                <?php } }
                                            } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <div class="col"><input class="form-control" type="date"></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;">Utility Charges</h6>
                                        <h6 style="font-weight: bold;">Water&nbsp;</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Provider</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Reading</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price of Water Bill</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Bill per tenant</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <div class="col"><input class="form-control" type="date"></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;">Electricty</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Electricity Provider</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Reading</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price of Electricity Bill</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Electricity Bill per Tenant</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <div class="col"><input class="form-control" type="date"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                    </div>
                </div>
            </div>

            <?php } ?>
            <!--End Modal Billing statement-->  
            

            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>

</html>