<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");

    $login = $this->session->userdata('login_success');
        if (!isset ($login)) {
            redirect('Login');
        }

    $admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
    $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];
    $abill = $this->session->userdata['login_success']['info']['adcontrol_bills'];
    $aann = $this->session->userdata['login_success']['info']['adcontrol_ann'];
    $amsg = $this->session->userdata['login_success']['info']['adcontrol_msg'];
    $alog = $this->session->userdata['login_success']['info']['adcontrol_logs'];

?>
<html>

<head profile="<?php echo base_url(); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/dormasino-favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DORMasino</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Tabbed-Panel.css">

    <link href="<?php echo base_url(); ?>/assets/css/selectize.bootstrap4.css" rel="stylesheet" type="text/css">
    
    
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <!-- <script src="<?php // echo base_url(); ?>assets/js/datatable.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <style>
            a[data-toggle="collapse"].sidebar:after
            {
                font-family: 'Ionicons';
                content: "\f35f"; 
                float: right;
                margin-right:10px;
                color: #b0c5d8;
                font-size: 20px;
                line-height: 22px;
            /*     
                -webkit-transform: rotate(-90deg);
                -moz-transform:    rotate(-90deg);
                -ms-transform:     rotate(-90deg);
                -o-transform:      rotate(-90deg);
                transform:         rotate(-90deg); */
            }
            a[data-toggle="collapse"].collapsed.sidebar:after
            {
                -webkit-transform: rotate(-90deg);
                -moz-transform:    rotate(-90deg);
                -ms-transform:     rotate(-90deg);
                -o-transform:      rotate(-90deg);
                transform:         rotate(-90deg);
            }
    </style>
</head>
<body style="font-family: Roboto, sans-serif;background-color: #ffffff;">
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color: #11334f;/*border-right: 3px solid #49a221;*/">
            <div class="d-xl-flex justify-content-xl-start align-items-xl-center" style="padding-left: 8px;padding-top: 20px; padding-bottom:30px;border-bottom:1px solid #c7c7c7;background-color: #11334f;"><img src="<?php echo base_url(); ?>/assets/img/logowhite.png" style="width: 206px;height: 33px;margin-top: 21px;"></div>
    

            <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Home/index'); ?>" ><i class="fas fa-home"></i>&nbsp; &nbsp; &nbsp;Home</a></p>
        <?php if($adir[0] == 1 || $adir[1] == 1 || $adir[2] == 1 || $adir[3] == 1 || $adir[4] == 1 || $adir[5] == 1
                || $adir[6] == 1 || $adir[7] == 1 || $adir[8] == 1 || $adir[9] == 1 || $adir[10] == 1 || $adir[11] == 1 ) { ?>    
            <?php if(current_url() == site_url('Directories/index') || 
                     current_url() == site_url('Directories/show_tenants') || 
                     current_url() == site_url('Directories/rooms') || 
                     current_url() == site_url('Directories/admin')) { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;margin-bottom: 0px;padding-left: 17.5px;"><a data-toggle="collapse" class="sidebar" href="#manage-collapse" id="menu-active"><i class="fas fa-database"></i>&nbsp; &nbsp; &nbsp;Manage Directories </a></p>
                <div id="manage-collapse" class="collapse show" >
                    <ul class="list-group">
                    
                    <?php if($adir[0] == 1 || $adir[1] == 1 || $adir[2] == 1 || $adir[3] == 1) { ?>
                        <?php if(current_url() == site_url('Directories/show_tenants') || current_url() == site_url('Directories/index')) { ?>
                            <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/index'); ?>" style="color: #b3e5fc;"><i class="fa fa-user"></i>&nbsp; &nbsp; &nbsp; Tenants</a></span></li>
                        <?php } else { ?>
                            <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/index'); ?>" ><i class="fa fa-user"></i>&nbsp; &nbsp; &nbsp; Tenants</a></span></li>
                        <?php } ?>
                    <?php } if($adir[4] == 1 || $adir[5] == 1 || $adir[6] == 1 || $adir[7] == 1 ) {  ?>
                        <?php if(current_url() == site_url('Directories/rooms')) { ?>
                            <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/rooms'); ?>" style="color: #b3e5fc;" ><i class="fas fa-door-open"></i>&nbsp; &nbsp; Rooms</a></span></li>
                        <?php } else { ?>
                            <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/rooms'); ?>" ><i class="fas fa-door-open"></i>&nbsp; &nbsp; Rooms</a></span></li>
                        <?php } ?>
                    <?php } if($adir[8] == 1 || $adir[9] == 1 || $adir[10] == 1 || $adir[11] == 1) {  ?>    
                        <?php if(current_url() == site_url('Directories/admin')) { ?>
                            <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/admin'); ?>" style="color: #b3e5fc;" ><i class="fas fa-lock"></i>&nbsp; &nbsp; &nbsp; Admin</a></span></li>
                        <?php } else { ?>
                            <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/admin'); ?>" ><i class="fas fa-lock"></i>&nbsp; &nbsp; &nbsp; Admin</a></span></li>
                        <?php } ?>
                    <?php } ?>
                    </ul>
                </div>
            <?php } else { ?> 
                <p style="margin-top: 15px;margin-bottom: 0px;padding-left: 20px;"><a data-toggle="collapse" href="#manage-collapse2" class="collapsed sidebar"><i class="fas fa-database"></i>&nbsp; &nbsp; &nbsp;Manage Directories</a></p>
                <div id="manage-collapse2" class="collapse" data-parent="#sidebar-wrapper">
                    <ul class="list-group">
                    <?php if($adir[0] == 1 || $adir[1] == 1 || $adir[2] == 1 || $adir[3] == 1) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/index'); ?>" ><i class="fa fa-user"></i>&nbsp; &nbsp; &nbsp; Tenants</a></span></li>
                    <?php } if($adir[4] == 1 || $adir[5] == 1 || $adir[6] == 1 || $adir[7] == 1) {  ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/rooms'); ?>" ><i class="fas fa-door-open"></i>&nbsp; &nbsp; Rooms </a></span></li>
                    <?php } if($adir[8] == 1 || $adir[9] == 1 || $adir[10] == 1 || $adir[11] == 1) {  ?>    
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Directories/admin'); ?>" ><i class="fas fa-lock"></i>&nbsp; &nbsp; &nbsp; Admin </a></span></li>
                    <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        <?php } ?>
            
        <?php if($abill[0] == 1 || $abill[2] == 1  || $abill[4] == 1  ) { ?>  
            <?php if(current_url() == site_url('Transactions/index') ||
                     current_url() == site_url('Transactions/show_tenants') || 
                     current_url() == site_url('Transactions/records_room') || 
                     current_url() == site_url('Transactions/payments')) { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;margin-bottom: 0px;padding-left: 17.5px;">
                <a href="#bills-collapse" id="menu-active" data-toggle="collapse" class="sidebar"><i class="fa fa-calculator"></i>&nbsp; &nbsp; &nbsp;Bills</a></p>
                <div id="bills-collapse" class="collapse show" >
                    <ul class="list-group">
                    <?php if($abill[0] == 1) { ?>
                     <?php if(current_url() == site_url('Transactions/index') || current_url() == site_url('Transactions/show_tenants') ) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a id="menu-active" href="<?php echo site_url('Transactions/index'); ?>" style="color: #b3e5fc;"><i class="fa fa-pencil"></i>&nbsp; &nbsp; &nbsp;Update Bills</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Transactions/index'); ?>" ><i class="fa fa-pencil"></i>&nbsp; &nbsp; &nbsp;Update Bills</a></span></li>
                    <?php }
                     } if($abill[2] == 1) { ?> 
                     <?php if(current_url() == site_url('Transactions/payments')) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a id="menu-active" href="<?php echo site_url('Transactions/payments'); ?>" style="color: #b3e5fc;" ><i class="icon ion-cash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Payments</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Transactions/payments'); ?>" ><i class="icon ion-cash"></i>&nbsp; &nbsp;&nbsp;Payments</a></span></li>
                    <?php }
                     } if($abill[4] == 1) { ?> 
                     <?php if(current_url() == site_url('Transactions/records_room')) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a id="menu-active" href="<?php echo site_url('Transactions/records_room'); ?>" style="color: #b3e5fc;" ><i class="fas fa-file"></i>&nbsp; &nbsp;&nbsp;&nbsp;Transaction Records</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Transactions/records_room'); ?>" ><i class="fas fa-file"></i>&nbsp; &nbsp;&nbsp; Transaction Records</a></span></li>
                     <?php } 
                    }?>
                    
                    </ul>
                </div>
           <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a class="collapsed sidebar" href="#bills-collapse2" data-toggle="collapse" ><i class="fa fa-calculator"></i>&nbsp; &nbsp; &nbsp;Bills</a></p>
                <div id="bills-collapse2" class="collapse" data-parent="#sidebar-wrapper">
                    <ul class="list-group">
                    <?php if($abill[0] == 1 || $abill[1] == 1) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Transactions/index'); ?>" ><i class="fa fa-pencil"></i>&nbsp; &nbsp; &nbsp;Update Bills</a></span></li>
                    <?php } if($abill[2] == 1 || $abill[3] == 1) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Transactions/payments'); ?>" ><i class="icon ion-cash"></i>&nbsp; &nbsp;&nbsp;Payments</a></span></li>
                    <?php } if($abill[4] == 1) { ?> 
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Transactions/records_room'); ?>" ><i class="fas fa-file"></i>&nbsp; &nbsp;&nbsp; Transaction Records</a></span></li>
                    <?php } ?>
                    </ul>
                </div>
        <?php } 
        } ?>

        <?php if($aann[0] == 1) { ?> 
            <?php if(current_url() == site_url('Announcements/index') || current_url() == site_url('Announcements/index')) { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a id="menu-active" href="<?php echo site_url('Announcements/index'); ?>"><i class="fa fa-bullhorn"></i>&nbsp; &nbsp; &nbsp;Announcements</a></p>
            <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Announcements/index'); ?>"><i class="fa fa-bullhorn"></i>&nbsp; &nbsp; &nbsp;Announcements</a></p>
        <?php } 
        }?>   

        <?php if($amsg[0] == 1 || $amsg[1] == 1 || $amsg[2] == 1 || $amsg[3] == 1 || $amsg[4] == 1 || $amsg[5] == 1 || $amsg[6] == 1 || $amsg[7] == 1 || $amsg[8] == 1 ) { ?> 
            <?php if(current_url() == site_url('Messages/index') || current_url() == site_url('Messages/sent') || current_url() == site_url('Messages/archive') || current_url() == site_url('Requests/index')) { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a data-toggle="collapse" class="sidebar" id="menu-active" href="#message-collapse"><i class="fa fa-envelope"></i>&nbsp; &nbsp; &nbsp;Messages</a></p>
               
                <div id="message-collapse" class="collapse show">
                    <ul class="list-group">
                    <?php if($amsg[0] == 1 ) { ?>
                     <?php if(current_url() == site_url('Messages/index') || current_url() == site_url('Messages/sent') || current_url() == site_url('Messages/archive')) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Messages/index'); ?>" style="color: #b3e5fc;"><i class="la la-comments"></i>&nbsp; &nbsp; &nbsp;Messages</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Messages/index'); ?>" ><i class="la la-comments"></i>&nbsp; &nbsp; &nbsp;Messages</a></span></li>
                     <?php }
                     } if($amsg[6] == 1 ) { ?>
                     <?php if(current_url() == site_url('Requests/index')) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Requests/index'); ?>" style="color: #b3e5fc;" ><i class="la la-list-alt"></i>&nbsp; &nbsp; &nbsp;Requests</a></span></li>
                     <?php } else { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Requests/index'); ?>" ><i class="la la-list-alt"></i>&nbsp; &nbsp; &nbsp;Requests</a></span></li>
                     <?php } 
                    }?>
                    </ul>
                </div>
            
            <?php } else { ?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="#message-collapse2" data-toggle="collapse" class="collapsed sidebar"><i class="fa fa-envelope"></i>&nbsp; &nbsp; &nbsp;Messages</a></p>
                <div id="message-collapse2" class="collapse" data-parent="#sidebar-wrapper">
                    <ul class="list-group">
                    <?php if($amsg[0] == 1 ) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Messages/index'); ?>"><i class="la la-comments"></i>&nbsp; &nbsp; &nbsp;Messages</a></span></li>
                    <?php }
                    if($amsg[6] == 1 ) { ?>
                        <li class="list-group-item" style="padding-top: 3px;padding-bottom: 3px;padding-left: 53px;background-color: #11334f;border: none;"><span>&nbsp;<a href="<?php echo site_url('Requests/index'); ?>"><i class="la la-list-alt"></i>&nbsp; &nbsp; &nbsp;Requests</a></span></li>
                    <?php } ?>
                    </ul>
                </div>
        <?php } 
        }?>
        <?php if($alog[0] == 1) { ?> 
            <?php  if(current_url() == site_url('Logs/index')) { ?>
                <p class="menu-active menu-side" style="margin-top: 15px;;margin-bottom: 0px;padding-left: 17.5px;"><a id="menu-active" href="<?php echo site_url('Logs/index'); ?>"><i class="fa fa-address-book-o"></i>&nbsp; &nbsp; &nbsp;Visitor Logs</a></p>
            <?php } else {?>
                <p style="margin-top: 15px;font-size: 20px;margin-bottom: 0px;padding-left: 20px;"><a href="<?php echo site_url('Logs/index'); ?>"><i class="fa fa-address-book-o"></i>&nbsp; &nbsp; &nbsp;Visitor Logs</a></p>
            <?php } 
        }?>

            <?php if(current_url() == site_url('Settings/index')) { ?>
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