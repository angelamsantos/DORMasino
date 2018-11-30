<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
    <link href="<?php echo base_url(); ?>/assets/css/selectize.bootstrap4.css" rel="stylesheet" type="text/css">
    
    
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <!-- <script src="<?php// echo base_url(); ?>assets/js/datatable.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
</head>
<body style="font-family: Roboto, sans-serif;background-color: #ffffff;">
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color: #11334f;/*border-right: 3px solid #49a221;*/">
            <div class="d-xl-flex justify-content-xl-start align-items-xl-center" style="padding-left: 8px;background-color: #11334f;"><img src="<?php echo base_url(); ?>/assets/img/logowhite.png" style="width: 206px;height: 33px;margin-top: 21px;"></div>
            <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 12px;padding-bottom: 10px;color: rgb(255,255,255);border-bottom: 1px solid #c7c7c7;"><i class="fa fa-user-circle-o"></i>&nbsp; &nbsp;<?php echo $admin_fname ?></p>

            <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Home/index'); ?>"><i class="fas fa-home"></i>&nbsp; &nbsp; &nbsp;Home</a></p>

            <?php if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/index' || base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/show_tenants' || base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/rooms' || base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/admin') { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a href="#manage-collapse" id="menu-active" data-toggle="collapse"><i class="fas fa-database"></i>&nbsp; &nbsp; &nbsp;Manage Directories</a></p>
                <div id="manage-collapse" class="panel-collapse ">
                    <ul class="list-group">

                     <?php if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/show_tenants' || base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/index') { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/index'); ?>" style="color: #b3e5fc;"><i class="fa fa-user"></i>&nbsp; &nbsp; &nbsp;Tenants</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/index'); ?>" ><i class="fa fa-user"></i>&nbsp; &nbsp; &nbsp;Tenants</a></span></li>
                     <?php } if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/rooms') { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/rooms'); ?>" style="color: #b3e5fc;" ><i class="fas fa-door-open"></i>&nbsp; &nbsp; Rooms</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/rooms'); ?>" ><i class="fas fa-door-open"></i>&nbsp; &nbsp; Rooms</a></span></li>
                     <?php } if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Directories/admin') { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/admin'); ?>" style="color: #b3e5fc;" ><i class="fas fa-lock"></i>&nbsp; &nbsp; &nbsp;Admin</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/admin'); ?>" ><i class="fas fa-lock"></i>&nbsp; &nbsp; &nbsp;Admin</a></span></li>
                     <?php } ?>
                    </ul>
                </div>
            <?php } else {?> 
                <p  style="margin-top: 15px;;margin-bottom: 0px;padding-left: 20px;"><a href="#manage-collapse"  data-toggle="collapse"><i class="fas fa-database"></i>&nbsp; &nbsp; &nbsp;Manage Directories</a></p>
                <div id="manage-collapse" class="panel-collapse collapse">
            

                <ul class="list-group">
                    <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/index'); ?>" ><i class="fa fa-user"></i>&nbsp; &nbsp; &nbsp;Tenants</a></span></li>

                    <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/rooms'); ?>" ><i class="fas fa-door-open"></i>&nbsp; &nbsp; Rooms</a></span></li>
                    <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/admin'); ?>" ><i class="fas fa-lock"></i>&nbsp; &nbsp; &nbsp;Admin</a></span></li>
                </ul>
            </div>
            <?php } ?>
            

            <?php if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Transactions/index') { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a id="menu-active" href="<?php echo site_url('Transactions/index'); ?>"><i class="fa fa-calculator"></i>&nbsp; &nbsp; &nbsp;Bills</a></p>
            <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Transactions/index'); ?>"><i class="fa fa-calculator"></i>&nbsp; &nbsp; &nbsp;Bills</a></p>
            <?php } if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Announcements/index') { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a id="menu-active" href="<?php echo site_url('Announcements/index'); ?>"><i class="fa fa-bullhorn"></i>&nbsp; &nbsp; &nbsp;Announcements</a></p>
            <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Announcements/index'); ?>"><i class="fa fa-bullhorn"></i>&nbsp; &nbsp; &nbsp;Announcements</a></p>
            <?php } if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Messages/index') { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a id="menu-active" href="<?php echo site_url('Messages/index'); ?>"><i class="fa fa-envelope"></i>&nbsp; &nbsp; &nbsp;Messages</a></p>
            <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Messages/index'); ?>"><i class="fa fa-envelope"></i>&nbsp; &nbsp; &nbsp;Messages</a></p>
            <?php } if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Logs/index') { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a id="menu-active" href="<?php echo site_url('Logs/index'); ?>"><i class="fa fa-address-book-o"></i>&nbsp; &nbsp; &nbsp;Visitor Logs</a></p>
            <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Logs/index'); ?>"><i class="fa fa-address-book-o"></i>&nbsp; &nbsp; &nbsp;Visitor Logs</a></p>
            <?php } if(base_url(uri_string()) == 'http://localhost:80/Dormasino/Settings/index') { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a id="menu-active" href="<?php echo site_url('Settings/index'); ?>"><i class="fa fa-gear"></i>&nbsp; &nbsp; &nbsp;Settings</a></p>
            <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Settings/index'); ?>"><i class="fa fa-gear"></i>&nbsp; &nbsp; &nbsp;Settings</a></p>
            <?php } ?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Logout/index'); ?>"><i class="fa fa-sign-out"></i>&nbsp; &nbsp; &nbsp;Logout</a></p>
        </div>
<!--     
    <script src="<?php //echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php //echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php //echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>
</html> -->