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
<head>
    

    <script>
        $(document).ready(function () {
            $('#table_id').dataTable( {
                "ordering": false
            });
        });
        
        $(document).ready(function () {
            $('#table_id2').dataTable( {
                "ordering": false
            });
        });

        $(document).ready(function () {
            $('#table_id3').dataTable( {
                "ordering": false
            });
        });

    </script>

</head>

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Requests</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div>
                <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
	                <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                </div>
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs panel-heading">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Room Cleaning</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Water/Food Delivery</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Borrowing</a></li>
                        </ul>
                        <div class="tab-content panel-body">
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <div id="table_view"  class="table-responsive" style="margin-top: 49px;">
                                    <table class="table" id="table_id" style="font-size:14px;text-align:center;">
                                    <thead class="logs">
                                        <tr>
                                            <th style="width: 9%;padding-right: 0px;padding-left: 0px;">Date</th>
                                            <th style="width: 8%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                            <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Tenant</th>
                                            <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Notes</th>
                                            <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Status</th>
                                        </tr>
                                    </thead>
                                        <tbody>

                                        <?php

                                            foreach ($reqs->result() as $row) {

                                                if($row->req_type == 0) {

                                                    $req_date = $row->req_date;
                                                    $date=date("m/d/Y", strtotime($req_date));
                                                    
                                                    echo "<tr >";
                                                        echo "<td>". $date ."</td>";
                                                        echo "<td>". $row->room_number ."</td>";
                                                        echo "<td>". $row->tenant_fname ." ". $row->tenant_lname ."</td>";
                                                        echo "<td>". $row->req_notes ."</td>";

                                                        if ($row->req_status == 1) {

                                                            $out ='<input type="hidden" name="req_id" value="'.$row->req_id.'" /><button class="btn btn-primary" type="submit" style="background-color: #28a745;color: #ffffff;border: none;" disabled>Completed</button>' ;
                                                            
                                                        } else {

                                                            $out = '<input type="hidden" name="req_id" value="'.$row->req_id.'" /><button class="btn btn-primary" type="submit" style="background-color: #28a745;color: #ffffff;border: none;">Complete</button>';
                                                        
                                                        }

                                                        echo "<td><form method='post' action='".site_url("Requests/process")."'>". $out ."</form></td>";
                                                    echo "</tr>";
                                                
                                                }
                                                
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">
                                <div id="table_view"  class="table-responsive" style="margin-top: 49px;">
                                    <table class="table" id="table_id2" style="font-size:14px;text-align:center;">
                                    <thead class="logs">
                                        <tr>
                                            <th style="width: 9%;padding-right: 0px;padding-left: 0px;">Date</th>
                                            <th style="width: 8%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                            <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Tenant</th>
                                            <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Notes</th>
                                            <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Status</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php

                                            foreach ($reqs->result() as $row) {

                                                if($row->req_type == 1) {

                                                    $req_date = $row->req_date;
                                                    $date=date("m/d/Y", strtotime($req_date));
                                                    
                                                    echo "<tr >";
                                                        echo "<td>". $date ."</td>";
                                                        echo "<td>". $row->room_number ."</td>";
                                                        echo "<td>". $row->tenant_fname ." ". $row->tenant_lname ."</td>";
                                                        echo "<td>". $row->req_notes ."</td>";

                                                        if ($row->req_status == 1) {

                                                            $out ='<input type="hidden" name="req_id" value="'.$row->req_id.'" /><button class="btn btn-primary" type="submit" style="background-color: #28a745;color: #ffffff;border: none;" disabled>Completed</button>' ;
                                                            
                                                        } else {

                                                            $out = '<input type="hidden" name="req_id" value="'.$row->req_id.'" /><button class="btn btn-primary" type="submit" style="background-color: #28a745;color: #ffffff;border: none;">Complete</button>';
                                                        
                                                        }

                                                        echo "<td><form method='post' action='".site_url("Requests/process")."'>". $out ."</form></td>";
                                                    echo "</tr>";
                                                
                                                }
                                                
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">
                                <div id="table_view"  class="table-responsive" style="margin-top: 49px;">
                                    <table class="table" id="table_id3" style="font-size:14px;text-align:center;">
                                    <thead class="logs">
                                        <tr>
                                            <th style="width: 9%;padding-right: 0px;padding-left: 0px;">Date</th>
                                            <th style="width: 8%;padding-right: 0px;padding-left: 0px;">Room No</th>
                                            <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Tenant</th>
                                            <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Notes</th>
                                            <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Status</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php

                                            foreach ($reqs->result() as $row) {

                                                if($row->req_type == 2) {

                                                    $req_date = $row->req_date;
                                                    $date=date("m/d/Y", strtotime($req_date));
                                                    
                                                    echo "<tr >";
                                                        echo "<td>". $date ."</td>";
                                                        echo "<td>". $row->room_number ."</td>";
                                                        echo "<td>". $row->tenant_fname ." ". $row->tenant_lname ."</td>";
                                                        echo "<td>". $row->req_notes ."</td>";

                                                        if ($row->req_status == 1) {

                                                            $out ='<input type="hidden" name="req_id" value="'.$row->req_id.'" /><button class="btn btn-primary" type="submit" style="background-color: #28a745;color: #ffffff;border: none;" disabled>Completed</button>' ;
                                                            
                                                        } else {

                                                            $out = '<input type="hidden" name="req_id" value="'.$row->req_id.'" /><button class="btn btn-primary" type="submit" style="background-color: #28a745;color: #ffffff;border: none;">Complete</button>';
                                                        
                                                        }

                                                        echo "<td><form method='post' action='".site_url("Requests/process")."'>". $out ."</form></td>";
                                                    echo "</tr>";
                                                
                                                }
                                                
                                            }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <footer class="footer" style="margin-top:120px;"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>
            </div>
        </div>
    </div>
</body>

</html>