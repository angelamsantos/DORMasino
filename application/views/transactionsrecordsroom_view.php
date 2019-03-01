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
<style>
    .export {
        margin-bottom: 20px;
    }
</style>
<script>
        $(document).ready(function () {
            $('#rent').dataTable( {
                "ordering": false,
                responsive: true,
                dom: "<'row'<'col-md-6'B>>" +
                "<'row'<'col-md-6'l><'col-md-6'f>>" +
                "<'row'<'col-md-12't><'col-md-12'ip>>",
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                    className: 'btn btn-success export',
                    filename: "Rent Transactions (<?php echo date('m-d-Y'); ?>)",
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        },
                        columns: [0,1,2,3]
                    }
                }]
            });
            $('#water').dataTable( {
                "ordering": false,
                responsive: true,
                dom: "<'row'<'col-md-6'B>>" +
                "<'row'<'col-md-6'l><'col-md-6'f>>" +
                "<'row'<'col-md-12't><'col-md-12'ip>>",
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                    className: 'btn btn-success export',
                    filename: "Water Transactions (<?php echo date('m-d-Y'); ?>)",
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        },
                        columns: [0,1,2,3]
                    }
                }]
            });
            $('#advance').dataTable( {
                "ordering": false,
                responsive: true,
                dom: "<'row'<'col-md-6'B>>" +
                "<'row'<'col-md-6'l><'col-md-6'f>>" +
                "<'row'<'col-md-12't><'col-md-12'ip>>",
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                    className: 'btn btn-success export',
                    filename: "Water Transactions (<?php echo date('m-d-Y'); ?>)",
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        },
                        columns: [0,1,2,3]
                    }
                }]
            });
            $('#deposit').dataTable( {
                "ordering": false,
                responsive: true,
                dom: "<'row'<'col-md-6'B>>" +
                "<'row'<'col-md-6'l><'col-md-6'f>>" +
                "<'row'<'col-md-12't><'col-md-12'ip>>",
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                    className: 'btn btn-success export',
                    filename: "Water Transactions (<?php echo date('m-d-Y'); ?>)",
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        },
                        columns: [0,1,2,3]
                    }
                }]
            });
        });

        
        
    </script>

    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Transactions</p>
                    <p class="d-none d-lg-block align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    
                </div>
                <!-- <div class="row" style="margin-top: 10px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;"> -->
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs panel-heading">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Rent</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Water</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Advance</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4">Deposit</a></li>
                        </ul>
                        <div class="tab-content panel-body">
                            <div class="tab-pane active" role="tabpanel" id="tab-1" style="padding-top:20px;padding-bottom:20px">
                                <div id="table_view" class="table-responsive mx-auto" style="width:98%;">
                                    <table class="table" id="rent" style="font-size:14px;">
                                        <thead class="logs">
                                            <tr style="text-align:center">
                                                <th style="padding-right: 0px;padding-left: 0px;">Receipt Number</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Room No</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Tenant Name</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Amount Paid</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Type</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Mode</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($rtrans->result() as $r) { ?>
                                                
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $r->rtrans_rno ;?></td>
                                                    <td style="text-align:center;"><?php echo $r->room_number ;?></td>
                                                    <td style="text-align:center;"><?php echo $r->tenant_fname.' '.$r->tenant_lname;?></td>
                                                    <td style="text-align:center;"><?php echo number_format($r->rtrans_amount,2);?></td>
                                                    <td style="text-align:center;"><?php if($r->rtrans_isfull == 1){ echo "Full"; } else { echo "Partial"; }?></td>
                                                    <td style="text-align:center;"><?php if($r->rtrans_mode == 0){ echo "Cash"; } else { echo "Check"; }?></td>
                                                    <td style="text-align:center;"><?php echo $r->rtrans_date ;?></td>
                                                    <!-- <td style="text-align:center;"> <button id="edit-room" data-target="#EditRent<?php //echo $r->rtrans_id ;?>" data-toggle="modal" class="btn btn-primary" style="border-radius:90px 90px 90px 90px;padding:0px 8px;margin-right:0px">
                                                    <i class="icon ion-edit" style="font-size: 19px;color:#0645AD;"></i>
                                                    </button></td> -->
                                                </tr>

                                                
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2" style="padding-top:20px;padding-bottom:20px">
                                <div id="table_view" class="table-responsive mx-auto" style="width:98%;">
                                    <table class="table" id="water" style="font-size:14px;">
                                        <thead class="logs">
                                            <tr style="text-align:center">
                                                <th style="padding-right: 0px;padding-left: 0px;">Receipt Number</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Room No</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Tenant Name</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Amount Paid</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Type</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Mode</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($wtrans->result() as $w) { ?>
                                                
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $w->wtrans_rno ;?></td>
                                                    <td style="text-align:center;"><?php echo $w->room_number ;?></td>
                                                    <td style="text-align:center;"><?php echo $w->tenant_fname.' '.$w->tenant_lname;?></td>
                                                    <td style="text-align:center;"><?php echo number_format($w->wtrans_amount, 2);?></td>
                                                    <td style="text-align:center;"><?php if($w->wtrans_isfull == 1){ echo "Full"; } else { echo "Partial"; }?></td>
                                                    <td style="text-align:center;"><?php if($w->wtrans_mode == 0){ echo "Cash"; } else { echo "Check"; }?></td>
                                                    <td style="text-align:center;"><?php echo $w->wtrans_date ;?></td>
                                                </tr>

                                                
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3" style="padding-top:20px;padding-bottom:20px">
                                <div id="table_view" class="table-responsive mx-auto" style="width:98%;">
                                    <table class="table" id="advance" style="font-size:14px;">
                                        <thead class="logs">
                                            <tr style="text-align:center">
                                                <th style="padding-right: 0px;padding-left: 0px;">Receipt Number</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Room No</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Tenant Name</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Amount Paid</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Type</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Mode</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($atrans->result() as $a) { ?>
                                                
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $a->atrans_rno ;?></td>
                                                    <td style="text-align:center;"><?php echo $a->room_number ;?></td>
                                                    <td style="text-align:center;"><?php echo $a->tenant_fname.' '.$a->tenant_lname;?></td>
                                                    <td style="text-align:center;"><?php echo number_format($a->atrans_amount,2);?></td>
                                                    <td style="text-align:center;"><?php if($a->atrans_isfull == 1){ echo "Full"; } else { echo "Partial"; }?></td>
                                                    <td style="text-align:center;"><?php if($a->atrans_mode == 0){ echo "Cash"; } else { echo "Check"; }?></td>
                                                    <td style="text-align:center;"><?php echo $a->atrans_date ;?></td>
                                                </tr>

                                                
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-4" style="padding-top:20px;padding-bottom:20px">
                                <div id="table_view" class="table-responsive mx-auto" style="width:98%;">
                                    <table class="table" id="deposit" style="font-size:14px;">
                                        <thead class="logs">
                                            <tr style="text-align:center">
                                                <th style="padding-right: 0px;padding-left: 0px;">Receipt Number</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Room No</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Tenant Name</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Amount Paid</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Type</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Mode</th>
                                                <th style="padding-right: 0px;padding-left: 0px;">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($dtrans->result() as $d) { ?>
                                                
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $d->dtrans_rno ;?></td>
                                                    <td style="text-align:center;"><?php echo $d->room_number ;?></td>
                                                    <td style="text-align:center;"><?php echo $d->tenant_fname.' '.$d->tenant_lname;?></td>
                                                    <td style="text-align:center;"><?php echo number_format($d->dtrans_amount, 2);?></td>
                                                    <td style="text-align:center;"><?php if($d->dtrans_isfull == 1){ echo "Full"; } else { echo "Partial"; }?></td>
                                                    <td style="text-align:center;"><?php if($d->dtrans_mode == 0){ echo "Cash"; } else { echo "Check"; }?></td>
                                                    <td style="text-align:center;"><?php echo $d->dtrans_date ;?></td>
                                                </tr>

                                                
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- </div>
                        
                    </div> -->

                    
                    <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                        <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
                    </footer>

            

            </div>
        </div>
    </div>
    
    
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
        <script src='<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js'></script>
        <script src='<?php echo base_url(); ?>assets/js/buttons.flash.min.js'></script>
        <script src='<?php echo base_url(); ?>assets/js/buttons.html5.min.js'></script>
        <script src='<?php echo base_url(); ?>assets/js/buttons.print.min.js'></script>
        <script src='<?php echo base_url(); ?>assets/js/jszip.min.js'></script>
</body>

</html>