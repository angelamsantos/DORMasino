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

<script>
        $(document).ready(function () {
            $('#rent').dataTable( {
                "ordering": false
            });
            $('#water').dataTable( {
                "ordering": false
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
                                                <th style="padding-right: 0px;padding-left: 0px;">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($rtrans->result() as $r) { ?>
                                                
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $r->rtrans_rno ;?></td>
                                                    <td style="text-align:center;"><?php echo $r->room_number ;?></td>
                                                    <td style="text-align:center;"><?php echo $r->tenant_fname.' '.$w->tenant_lname;?></td>
                                                    <td style="text-align:center;"><?php echo $r->rtrans_date ;?></td>
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
                                                <th style="padding-right: 0px;padding-left: 0px;">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($wtrans->result() as $w) { ?>
                                                
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $w->wtrans_rno ;?></td>
                                                    <td style="text-align:center;"><?php echo $w->room_number ;?></td>
                                                    <td style="text-align:center;"><?php echo $w->tenant_fname.' '.$w->tenant_lname;?></td>
                                                    <td style="text-align:center;"><?php echo $w->wtrans_date ;?></td>
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
</body>

</html>