<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bills</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/fullcalendar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
</head>


    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-md-flex d-xl-flex align-items-md-center justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;">
                    <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Transactions</p>
                </div><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col" style="margin-top: 11px;padding-left: 23px;">
                        <div class="btn-group" role="group"><button class="btn btn-success" type="button" style="font-size: 14px;" data-toggle="modal" data-target="#Bill">Calendar View</button><button class="btn btn-info" type="button" style="width: 106.656px;background-color: #83c592;border-color: #83c592;font-size: 14px;">List View</button></div>
                    </div>
                </div>
                <div id="calendar"></div>
                <div class="modal fade" role="dialog" tabindex="-1" id="Bill">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                <h4 class="modal-title" style="color: #11334f;">Billing Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                            <div class="col"><input class="form-control d-xl-flex" type="text" value="301" disabled=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                            <div class="col"><input class="form-control" type="text" value="Arvin" disabled=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                            <div class="col"><input class="form-control" type="text" value="Dela Cruz" disabled=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Due</label></div>
                                            <div class="col"><input class="form-control" type="text" value="Php 3, 500 " disabled=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount Paid</label></div>
                                            <div class="col"><input class="form-control" type="text"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Settle Bill</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/calendar.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
</body>

</html>