<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    date_default_timezone_set("Asia/Manila");
    $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    $admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
    <link href="<?php echo base_url(); ?>/assets/css/selectize.bootstrap4.css" rel="stylesheet" type="text/css">
    
   

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#table_id').dataTable( {
                "ordering": false
            });
        });
        $(document).ready( function() {
            $('.main_menu').click(function(){
                $(this).next().toggleClass('display_block');
            });

            $('.light').click(function() {
            $('.content').toggleClass('night');
            return false;
        });
        });
    </script>

</head>

        <div class="page-content-wrapper">
            <div class="container-fluid d-flex flex-column">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Visitor Logs</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                
                <div class="row" style="margin: 0px;margin-top: 0px;">
                    <div class="col d-flex d-sm-flex d-md-flex d-xl-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end" style="margin-top: 0px;padding-right: 0px;"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalIn" style="background-color: #28a745;color: #ffffff;border: none;">Log visitor</button></div>
                    <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
	                    <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                    </div>
                </div>
            <div style="margin-top: 14px;">
                <div class="table-responsive">
                
                    <table class="table" id="table_id" style="font-size:14px;text-align:center;">
                        <thead class="logs">
                            <tr>
                                <th style="width: 9%;padding-right: 0px;padding-left: 0px;">Date</th>
                                <th style="width: 8%;padding-right: 0px;padding-left: 0px;">Room</th>
                                <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Person to Visit</th>
                                <th style="width: 13%;padding-right: 0px;padding-left: 0px;">Name of Visitor</th>
                                <th style="width: 10%;padding-right: 0px;padding-left: 0px;">Relation</th>
                                <th style="width: 11%;padding-right: 0px;padding-left: 0px;">Purpose</th>
                                <th style="width: 12%;padding-right: 0px;padding-left: 0px;">ID Presented</th>
                                <th style="width: 9%;padding-right: 0px;padding-left: 0px;">Time In</th>
                                <th style="width: 9%;padding-right: 0px;padding-left: 0px;">Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            foreach ($vlogs->result() as $row2) {
 
                                $time_in = $row2->vlogs_in;
                                $intime=date("g:ia", strtotime($time_in));
                                $indate=date("M d, Y", strtotime($time_in));
                                
                                echo "<tr >";
                                    echo "<td>". $indate ."</td>";
                                    echo "<td>". $row2->room_number ."</td>";
                                    echo "<td>". $row2->tenant_fname ." ". $row2->tenant_lname ."</td>";
                                    echo "<td>". $row2->vlogs_name ."</td>";
                                    echo "<td>". $row2->vlogs_relation ."</td>";
                                    echo "<td>". $row2->vlogs_purpose ."</td>";
                                    echo "<td>". $row2->vlogs_id_presented ."</td>";
                                    echo "<td>". $intime ."</td>";
                                    
                                    $time_out = $row2->vlogs_out;
                                    $id = $row2->vlogs_id;

                                    if ($time_out != "0000-00-00 00:00:00") {

                                        $out=date("g:ia", strtotime($time_out));
                                        
                                    } else {
                                        $out='<input type="hidden" name="name_id" value="'.$id.'" /><button class="btn btn-primary" type="submit" style="background-color: #28a745;color: #ffffff;border: none;">Time out'.$id.'</button>';
                                      
                                    }

                                    echo "<td><form method='post' action='".site_url("Logs/out")."'>". $out ."</form></td>";
                                echo "</tr>";
                                
                            }
                            
                        ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>
        </div>
    </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="ModalIn">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                    <h4 class="modal-title">Visitor Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <form method="post" action="<?php echo site_url('Logs/process'); ?>">
                <div class="modal-body">
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Number</label></div>
                                <div class="col">
                                <select name="room_id" id="sel_room"  class="form-control single-select" required>
                                <option value="">Select Room</option>  
                                <?php

                                    foreach ($room->result() as $row) {

                                        echo '<option value="'. $row->room_id .'"> '. $row->room_number .' </option>';
                                        
                                    }

                                ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Person to visit</label></div>
                                <div class="col">
                                <select name="sel_tenant" id="sel_tenant" class="form-control d-xl-flex" required>
                                <option value="">Select Tenant</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Name of visitor</label></div>
                                <div class="col"><input class="form-control" type="text" name="vlogs_name" placeholder="Enter name of visitor" required></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Relation</label></div>
                                <div class="col"><input class="form-control" type="text" name="vlogs_relation" placeholder="Enter relation to tenant" required></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Purpose</label></div>
                                <div class="col"><input class="form-control" type="text" name="vlogs_purpose" placeholder="Enter purpose of visit" required></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">ID Presented</label></div>
                                <div class="col"><input class="form-control" type="text" name="vlogs_id_presented" placeholder="Enter ID presented" required></div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;border: none;color: #11334f;">Time-in</button></div>
            </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/selectize/standalone/selectize.min.js"></script>
    <script>

        $(document).ready(function(){
            $(document).ready(function() {
                $('#sel_room').selectize({
                    create: false,
                });
            });
            $('#sel_room').change(function(){
                var room_id = $('#sel_room').val();
             
                if(room_id != '') {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Logs/fetch_tenant",
                        method:"POST",
                        data:{room_id:room_id},
                        success:function(data) {
                        $('#sel_tenant').html(data);
                        }
                    });
                } else {
                    $('#sel_tenant').html('<option value="">Select Tenant</option>');
                }
            });
        });

    </script>

</body>

</html>