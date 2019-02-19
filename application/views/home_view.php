<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
    $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];
    $abills = $this->session->userdata['login_success']['info']['adcontrol_bills'];
    $aann = $this->session->userdata['login_success']['info']['adcontrol_ann'];
    $amsg = $this->session->userdata['login_success']['info']['adcontrol_msg'];
    $alogs = $this->session->userdata['login_success']['info']['adcontrol_logs'];
?>
<html>

<head profile="<?php echo base_url(); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/dormasino-favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DORMasino</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>
<style>
    h3 {
        color: #000000;
    }
</style>

<body style="font-family: Roboto, sans-serif;background-color: #ECEFF1;">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color: #90caf9;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="padding-top: 0px;padding-bottom: 0px;margin-right: 10px;"><img src="<?php echo base_url(); ?>/assets/img/logowhite.png" style="width: 229px;height: 42px;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-user-circle-o" style="font-size: 21px;"></i>&nbsp;<?php echo $admin_fname; ?></a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="<?php echo site_url('Logout/index'); ?>">Logout</a></div>
                    </li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="page-content-wrapper">
        <div class="container-fluid justify-content-center">

        <?php
        $a="";
        $b="";
        $c="";
        $d="";
        $e="";
        if($adir[3] == 1 || $adir[7] == 1 || $adir[11] == 1 ) { 
            $a = "";
        } else {
            $a = "disabled title='This feature is not available for your account.'";
        } 
        
        if($abills[0] == 1 || $abills[2] == 1 || $abills[4] == 1 ) { 
            $b = "";
        } else {
            $b = "disabled title='This feature is not available for your account.'";
        }

        if($aann[0] == 1) { 
            $c = "";
        } else {
            $c = "disabled title='This feature is not available for your account.'";
        }
        if($amsg[0] == 1 || $amsg[4] == 1  ) {
            $d = "";
        } else {
            $d = "disabled title='This feature is not available for your account.'";
        }
        if($alogs[0] == 1) {
            $e = "";
        } else {
            $e = "disabled title='This feature is not available for your account.'";
        }
        ?>
            <div class="row d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center mx-auto flex-sm-column align-items-sm-center flex-md-column align-items-md-center flex-lg-row justify-content-lg-center flex-xl-row justify-content-xl-center align-items-xl-center"
                id="home-menu" style="margin-top: 9px;margin-right: 0px;margin-left: 0px;width: 95%;">
                <div class="col-12 col-sm-7 col-md-8 col-lg-3 col-xl-3 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-column align-items-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center service"
                    style="background-color: #5dc2fe;padding:0px;"><button <?php echo $a; ?> class="btn btn-primary btn-home" onclick="location.href='<?php echo site_url('Directories/index'); ?>'" type="button" style="background-color: transparent;border: none;width:100%;height:100%;padding: 20px; "><img src="<?php echo base_url(); ?>/assets/img/user.png" width="120">
                    <h3>Directories</h3></button>
                </div>
                <div class="col-12 col-sm-7 col-md-8 col-lg-3 col-xl-3 d-flex d-sm-flex d-md-flex d-xl-flex flex-column align-items-center align-items-sm-center align-items-md-center justify-content-xl-center align-items-xl-center service" style="background-color: #5dc2fe;padding: 0px;">
                    <button <?php echo $b; ?> class="btn btn-primary btn-home" type="button" onclick="location.href='<?php echo site_url('Transactions/index'); ?>'" style="background-color: transparent;border: none;width:100%;height:100%;padding: 20px; "><img src="<?php echo base_url(); ?>/assets/img/bills.png" width="120">
                    <h3>Bills</h3></button>
                </div>
                <div class="col-12 col-sm-7 col-md-8 col-lg-3 col-xl-3 d-flex d-sm-flex d-md-flex d-xl-flex flex-column align-items-center align-items-sm-center align-items-md-center justify-content-xl-center align-items-xl-center service" style="background-color: #5dc2fe;padding: 0px;">
                    <button <?php echo $c; ?> class="btn btn-primary btn-home" type="button" onclick="location.href='<?php echo site_url('Announcements/index'); ?>'" style="background-color: transparent;border: none;width:100%;height:100%;padding: 20px; "><img src="<?php echo base_url(); ?>/assets/img/request.png" width="120">
                    <h3>Announcements</h3></button>
                </div>
            </div>
            <div class="row d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center mx-auto flex-sm-column align-items-sm-center flex-md-column align-items-md-center flex-lg-row justify-content-lg-center flex-xl-row justify-content-xl-center align-items-xl-center"
                id="home-menu" style="margin-top: 9px;margin-right: 0px;margin-left: 0px;width: 95%;">
                <div class="col-12 col-sm-7 col-md-8 col-lg-3 col-xl-3 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-column align-items-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center service"
                    style="background-color: #5dc2fe;padding: 0px;"><button <?php echo $d; ?> onclick="location.href='<?php echo site_url('Messages/index'); ?>'" class="btn btn-primary btn-home" type="button" style="background-color: transparent;border: none;width:100%;height:100%;padding: 20px;"><img src="<?php echo base_url(); ?>/assets/img/chat.png" width="120">
                    <h3>Messages</h3></button>
                </div>
                <div class="col-12 col-sm-7 col-md-8 col-lg-3 col-xl-3 d-flex d-sm-flex d-md-flex d-xl-flex flex-column align-items-center align-items-sm-center align-items-md-center justify-content-xl-center align-items-xl-center service" style="background-color: #5dc2fe;padding: 0px;">
                    <button <?php echo $e; ?> class="btn btn-primary btn-home" type="button" onclick="location.href='<?php echo site_url('Logs/index'); ?>'" style="background-color: transparent;border: none;width:100%;height:100%;padding: 20px; "><img src="<?php echo base_url(); ?>/assets/img/login.png" width="120">
                    <h3>Visitor Logs</h3></button>
                </div>
                <div class="col-12 col-sm-7 col-md-8 col-lg-3 col-xl-3 d-flex d-sm-flex d-md-flex d-xl-flex flex-column align-items-center align-items-sm-center align-items-md-center justify-content-xl-center align-items-xl-center service" style="background-color: #5dc2fe;padding: 0px;">
                <button class="btn btn-primary btn-home" type="button" onclick="location.href='<?php echo site_url('Settings/index'); ?>'" style="background-color: transparent;border: none;width:100%;height:100%;padding: 20px; "><img src="<?php echo base_url(); ?>/assets/img/settings.png" width="120">
                    <h3>Settings</h3></button>
                </div>
            </div>
            <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>

</html>