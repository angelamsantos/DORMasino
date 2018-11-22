<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Account Settings</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Tabbed-Panel.css">
</head>


        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-md-flex d-xl-flex align-items-md-center justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;">
                    <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Account Settings</p>
                </div><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="mx-auto" style="width: 80%;">
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs panel-heading" style="padding-left: 0px;padding-top: 0px;">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Email</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Password</a></li>
                        </ul>
                        <div class="tab-content panel-body">
                            <div class="tab-pane active d-xl-flex justify-content-xl-center" role="tabpanel" id="tab-1">
                                <form style="width: 80%;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-xl-3"><label class="col-form-label">Enter new email</label></div>
                                            <div class="col"><input class="form-control" type="email" placeholder="Enter email" style="font-size: 14px;"></div>
                                        </div>
                                    </div><button class="btn btn-primary btn-sm d-xl-flex ml-auto" type="button">Save</button></form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
</body>

</html>