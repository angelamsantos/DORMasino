<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$login = $this->session->userdata('login_success');
if (!isset ($login)) {
    redirect('Login');
}

$page = $_SERVER['PHP_SELF'];
$sec = "3";

$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
$amsg = $this->session->userdata['login_success']['info']['adcontrol_msg'];
    $a="";
    if($amsg[8] == 1) { //archive
        $a = "title='Approve/Reject request'";
    } else {
        $a = "disabled title='This feature is not available on your account.'";
    }

?>
<html>
<head>
<meta http-equiv="refresh" content="300" />

    <script>

        $(document).ready(function () {
            $('#table_id').dataTable( {
                "ordering": false
            });
        });

    </script>
    

</head>

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Requests</p>
                    <p class="d-none d-lg-block align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div>
                <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
	                <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                </div>
                                <div id="table_view"  class="table-responsive" style="margin-top: 30px;">
                                    <table class="table" id="table_id" style="font-size:14px;text-align:center;">
                                    <thead class="logs">
                                        <tr>
                                            <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Date and Time</th>
                                            <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Room No.</th>
                                            <th style="width: 15%;padding-right: 0px;padding-left: 0px;">Tenant</th>
                                            <th style="width: 15%;padding-right: 0px;padding-left: 0px;">Service</th>
                                            <th style="width: 15%;padding-right: 0px;padding-left: 0px;">Notes</th>
                                            <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Status</th>
                                        </tr>
                                    </thead>
                                        <tbody>

                                        <?php

                                            foreach ($reqs->result() as $row) {

                                                    $req_date = $row->req_date;
                                                    $date=date("m/d/Y h:ia", strtotime($req_date));

                                                    if ($row->req_type == 0) {

                                                        $service = "Room Service";

                                                    } else if ($row->req_type == 1) {

                                                        $service = "Delivery";

                                                    } else if ($row->req_type == 2) {

                                                        $service = "Borrowing";

                                                    }
                                                    
                                                    echo "<tr >";
                                                        echo "<td>". $date ."</td>";
                                                        echo "<td>". $row->room_number ."</td>";
                                                        echo "<td>". $row->tenant_fname ." ". $row->tenant_lname ."</td>";
                                                        echo "<td>". $service ."</td>";
                                                        echo "<td>". htmlspecialchars($row->req_notes) ."</td>";

                                                        if ($row->req_status == 0) {

                                                            $out = '<button '.$a.' class="btn btn-primary" type="button" id="norefresh" data-toggle="modal" data-target="#Request'.$row->req_id.'" style="background-color: #f4f142;color: #ffffff;border: none;">Pending</button>';
                                                            
                                                        } else if ($row->req_status == 1) {
                                                            
                                                            $out ='<p style="color:#45ba3d">Approved</p>' ;
                                                            
                                                        } else if ($row->req_status == 2) {
                                                            
                                                            $out ='<p style="color:#ef1f1f">Rejected</p>';
                                                            
                                                        } else {

                                                            $out ='<p>Completed</p>' ;
                                                        }

                                                        echo "<td><form method='post' action='".site_url("Requests/complete")."'>". $out ."</form></td>";
                                                    echo "</tr>";
                                                
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                        <!--START APPROVE MODAL -->
                        <?php foreach ($reqs->result() as $row1) { ?>
                        <div id="Request<?php echo $row1->req_id ?>" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                        <h4 class="modal-title" style="color: #11334f;">Approve Request</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    
                                    <form method="POST" name="archive_inbox" action="<?php echo site_url('Requests/approve');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                            <p style="font-size: 17px;">Do you want to reject or approve the request?</p>
                                            <input type="hidden" name="req_id" value="<?php echo $row1->req_id ?>" />
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn btn-primary" name="requestBtn" value="reject" type="submit" style="background-color: #c7c7c7;color: #11334f;border: none;">Reject</button>
                                        <button class="btn btn-primary" name="requestBtn" value="approve" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Approve</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!--END APPROVE MODAL -->

                <footer class="footer" style="margin-top:120px;"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>


</html>