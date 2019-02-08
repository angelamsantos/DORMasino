<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$login = $this->session->userdata('login_success');
if (!isset ($login)) {
    redirect('Login');
}

$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];

?>
<html>




    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Transactions</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    
                </div>
                <div class="row" style="margin-top: 10px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;">
                        
                        <div id="table_view" class="table-responsive" style="width:80%;">
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
                                            <td style="text-align:center;">
                                                <form action="<?php echo site_url('Transactions/getRoom');?>" method="POST">
                                                    <input type="hidden" value="<?php echo $row->room_id; ?>" name="show_rid">
                                                    <input type="hidden" value="<?php echo $row->room_number; ?>" name="show_rno">
                                                <button value="<?php echo $row->room_id; ?>"  type="submit" style="background:transparent; border:0px"> 
                                                    <?php echo $row->room_number; ?>
                                                </button>
                                                </form>
                                            </td>
                                            
                                            
                                           
                                            <td style="text-align:center;">
                                                
                                                    <button title="Edit Billing Statement" id="edit-room" data-target="#ModalBill<?php echo $row->room_id; ?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                    <i class="icon ion-edit" style="font-size: 19px;color:#0645AD;"></i>
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
                <div class="modal-dialog modal-lg modal-big" role="document">
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
                                                <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format($row2->room_price, 2); ?>" disabled=""></div>
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
                                                            <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format($extra, 2) ?>" disabled=""  ></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Extra Charge</label></div>
                                                        <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format(0, 2) ?>" disabled=""  ></div>
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
                                                            <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format($tr, 2) ?>" disabled=""  ></div>
                                                        <?php } else { ?>
                                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Total Rent</label></div>
                                                        <div class="col"><input class="form-control" style="text-align:right" type="text" value="<?php echo number_format($row2->room_price, 2); ?>" disabled=""  ></div>
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
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;">Utility Charges: Water</h6>
                                        
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Provider</label></div>
                                                <div class="col"><input class="form-control" type="text" disabled></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Previous Reading</label></div>
                                                <div class="col"><input class="form-control" type="text" disabled></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Current Reading</label></div>
                                                <div class="col"><input class="form-control" type="number" style="text-align:right" required></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price per m<sup>3</sup></label></div>
                                                <div class="col"><input class="form-control" type="number" style="text-align:right" disabled></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Price of Water Bill</label></div>
                                                <div class="col"><input class="form-control" type="number" style="text-align:right" disabled></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Water Bill per tenant</label></div>
                                                <div class="col"><input class="form-control" type="number" style="text-align:right" disabled></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Due Date</label></div>
                                                <div class="col"><input class="form-control" type="date" required></div>
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
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>