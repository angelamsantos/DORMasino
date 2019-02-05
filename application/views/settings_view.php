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


        <div class="page-content-wrapper">
            <div class="container-fluid">
            <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Account Settings</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="mx-auto" style="width: 80%;">
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs panel-heading" style="padding-left: 0px;">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Email</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Password</a></li>
                        </ul>
                        <div class="tab-content d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center panel-body">
                            <div class="tab-pane active" role="tabpanel" id="tab-1" style="width: 100%;">
                                <form class="d-flex flex-column mx-auto" action="<?php echo site_url('settings/process_email') ?>" method="post" style="width: 80%;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                        <div class="col-12 col-xl-12"><label class="col-form-label">Current email</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control" type="email" name="email" readonly value="<?php echo $email ?>" style="font-size: 14px;"></div>
                                        
                                            <div class="col-12 col-xl-12"><label class="col-form-label">New email</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control" type="email" name="new_email" placeholder="Enter new email" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                                    <button class="btn btn-primary btn-sm d-xl-flex ml-auto" type="submit" name="save_email" value="save_email">Save</button>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="EmailSuccess">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                                    <h4 class="modal-title" style="color: #11334f;">Change Email</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                <div class="modal-body">
                                                    <h4 class="text-center">You have successfully changed your email.</h4>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Login</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2" style="width: 100%;">
                                <form class="d-flex flex-column mx-auto" action="<?php echo site_url('settings/process_password');?>" method="post" style="width: 60%;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">Old password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="password" name="old_password" placeholder="Enter old password" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">New password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="password" name="new_password" placeholder="Enter new password" minlength="6" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">Confirm new password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="password" name="confirm_password" placeholder="Re-enter new password" minlength="6" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                                    <button class="btn btn-primary btn-sm d-xl-flex ml-auto" type="submit" name="save_pass" value="save_pass">Save</button>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="PasswordSuccess">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                                    <h4 class="modal-title" style="color: #11334f;">Change Email</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                <div class="modal-body">
                                                    <h4 class="text-center">You have successfully changed your password.</h4>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Login</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>
            </div> 
            <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>     
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>

</html>