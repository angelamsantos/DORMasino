<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $old_email = $this->session->userdata['login_success']['info']['admin_email'];
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Tabbed-Panel.css">
</head>


        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-md-flex d-xl-flex align-items-md-center justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;">
                    <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Account Settings</p>
                </div><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="mx-auto" style="width: 80%;">
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs panel-heading" style="padding-left: 0px;">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">First Tab</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Second Tab</a></li>
                        </ul>
                        <div class="tab-content d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center panel-body">
                            <div class="tab-pane active" role="tabpanel" id="tab-1" style="width: 100%;">
                                <form class="d-flex flex-column mx-auto" action="<?php echo site_url('settings/process');?>" style="width: 80%;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                        <div class="col-12 col-xl-12"><label class="col-form-label">Your old email</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control" type="email" name="old_email" readonly value="<?php echo $old_email ?>" style="font-size: 14px;"></div>
                                        
                                            <div class="col-12 col-xl-12"><label class="col-form-label">New email</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control" type="email" placeholder="Enter email" style="font-size: 14px;"></div>
                                        </div>
                                        <?php echo '<center><p><h4 style="font-family:Roboto, sans-serif;color:rgb(255,0,0);font-size:16px;margin-left:0px;margin-bottom:1px;">'.$msg.'</h4></p></center>' ?>
                                    </div><button class="btn btn-primary btn-sm d-xl-flex ml-auto" type="button" data-toggle="modal" data-target="#EmailSuccess">Save</button></form>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2" style="width: 100%;">
                                <form class="d-flex flex-column mx-auto" style="width: 60%;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">Old password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="email" placeholder="Enter old password" style="font-size: 14px;"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">New password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="email" placeholder="Enter new password" style="font-size: 14px;"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">Confirm new password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="email" placeholder="Re-enter new password" style="font-size: 14px;"></div>
                                        </div>
                                    </div><button class="btn btn-primary btn-sm d-xl-flex ml-auto" type="button" data-toggle="modal" data-target="#PasswordSuccess">Save</button></form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="EmailSuccess">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Change Email</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <h4 class="text-center">You have successfully changed your email.</h4>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;" data-dismiss="modal">Ok</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="PasswordSuccess">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Change Email</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <h4 class="text-center">You have successfully changed your password.</h4>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;" data-dismiss="modal">Ok</button></div>
                            </div>
                        </div>
                    </div>
            </div>
                
                
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>

</html>