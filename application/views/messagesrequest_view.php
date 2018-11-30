<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Messages</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chat.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Community-ChatComments.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>

    <style>
    li p {
        font-size: 14px !important;
    }
    </style>
</head>

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Messages</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div>
                <div class="panel panel-default">
                        <ul class="nav nav-tabs panel-heading">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Room Cleaning</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Water/Food Delivery</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Borrowing</a></li>
                        </ul>
                        <div class="tab-content panel-body">
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <div id="table_view"  class="table-responsive" style="margin-top: 49px;">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Name of Tenant</th>
                                                <th>Room Number</th>
                                                <th>Date &nbsp;Requested</th>
                                                <th>Notes</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Arvin Dela Cruz</td>
                                                <td>606</td>
                                                <td>10-01-2018</td>
                                                <td>Aircon cleaning</td>
                                                <td class="d-xl-flex justify-content-xl-center"><button class="btn btn-primary d-xl-flex align-items-xl-center" type="button" style="padding-top: 3px;padding-bottom: 3px;padding-right: 6px;padding-left: 6px;"><i class="fa fa-edit"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>Dave Fernandez</td>
                                                <td>607</td>
                                                <td>09-28-2018</td>
                                                <td></td>
                                                <td class="d-xl-flex justify-content-xl-center"><button class="btn btn-primary d-xl-flex align-items-xl-center" type="button" style="padding-top: 3px;padding-bottom: 3px;padding-right: 6px;padding-left: 6px;"><i class="fa fa-edit"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>Francis Gella</td>
                                                <td>608</td>
                                                <td>09-15-2018</td>
                                                <td>Bathroom cleaning</td>
                                                <td class="d-xl-flex justify-content-xl-center"><button class="btn btn-primary d-xl-flex align-items-xl-center" type="button" style="padding-top: 3px;padding-bottom: 3px;padding-right: 6px;padding-left: 6px;"><i class="fa fa-edit"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>Angela Santos</td>
                                                <td>609</td>
                                                <td>09-02-2018</td>
                                                <td></td>
                                                <td class="d-xl-flex justify-content-xl-center"><button class="btn btn-primary d-xl-flex align-items-xl-center" type="button" style="padding-top: 3px;padding-bottom: 3px;padding-right: 6px;padding-left: 6px;"><i class="fa fa-edit"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">
                                <p>Second tab content.</p>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">
                                <p>Tab content.</p>
                            </div>
                        </div>
                    </div>
                <footer class="footer" style="margin-top:120px;"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>

</html>