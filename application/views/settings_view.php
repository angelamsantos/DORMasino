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
                    <p class="d-none d-lg-block align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;">
                    <!-- Notification nav -->
                    <ul class="nav navbar-nav navbar-right" style="margin-left: 20px">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle notification" data-toggle="dropdown" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;">
                                        <span class="fa fa-bell" style="font-size:16px;"></span>
                                        <span class="label label-pill label-danger badge count" style="border-radius:10px;"></span> 
                                    </a>
                                    <ul class="dropdown-menu notif"></ul>
                                </li>
                            </ul>
                    <!-- Notification nav -->
                    &nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%" title="Click here to collapse"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
	                <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                </div>
                <div
                    class="mx-auto" style="width: 80%;">
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs panel-heading" style="padding-left: 0px;">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Email</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Password</a></li>
                        </ul>

                        <!--START EMAIL -->
                        <div class="tab-content d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center panel-body">
                            <div class="tab-pane active" role="tabpanel" id="tab-1" style="width: 100%;">
                                <form class="d-flex flex-column mx-auto" action="" method="post" style="width: 60%;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">Current email</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="email" name="email" value="<?php echo $email ?>" style="font-size: 14px;" readonly></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">New email</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="email" name="new_email" id="new_email" onchange="txtName_onchange()" placeholder="Enter new email" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-sm d-xl-flex ml-auto" name="emailchange" type="submit">Save</button>
                                </form>
                            </div>
                        <!--END EMAIL -->   

                        <?php   
                            if(isset($_POST['emailchange'])) {//to run PHP script on submit

                                echo "  <script>
                                            $(document).ready(function(){
                                                $('#email').modal('show');
                                            });
                                        </script>";
                            }
                        ?>

                        <!--START PASSWORD -->
                            <div class="tab-pane" role="tabpanel" id="tab-2" style="width: 100%;">
                                <form class="d-flex flex-column mx-auto" action="" method="post" style="width: 60%;margin-top: 20px;margin-bottom: 20px;">
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">Old password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="password" name="old_password" placeholder="Enter old password" minlength="6" title="Must not contain special characters and it should be at least 6 or more characters" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">New password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="password" name="new_password" placeholder="Enter new password" minlength="6" pattern="[A-Za-z0-9]+" title="Must not contain special characters and it should be at least 6 or more characters" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row" style="margin: 0px;">
                                            <div class="col-12 col-xl-12"><label class="col-form-label">Confirm new password</label></div>
                                            <div class="col-xl-12" style="padding: 0px;"><input class="form-control d-lg-flex" type="password" name="confirm_password" placeholder="Re-enter new password"  minlength="6" pattern="[A-Za-z0-9]+" title="Must not contain special characters and it should be at least 6 or more characters" style="font-size: 14px;" required></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-sm d-xl-flex ml-auto" name="passchange" type="submit">Save</button>
                                </form>
                            </div>
                        <!--END PASSWORD -->

                        <?php   
                            if(isset($_POST['passchange'])) {//to run PHP script on submit

                                echo "  <script>
                                            $(document).ready(function(){
                                                $('#password').modal('show');
                                            });
                                        </script>";
                            }
                        ?>

                        <!--START CHANGE EMAIL MODAL -->
                        <?php $new_email = $this->input->post('new_email') ?>
                        <div id="email" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                        <h4 class="modal-title" style="color: #11334f;">Change Email</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    
                                    <form method="POST" name="archive_inbox" action="<?php echo site_url('settings/process_email');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                            <p style="font-size: 17px;">Are you sure you want to change your email to <u><?php echo $new_email ?></u>?</p>
                                            <input type="hidden" name="new_email" value="<?php echo $new_email;  ?>" >
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-primary" name="save_email" value="save_email" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--END CHANGE EMAIL MODAL -->

                        <!--START CHANGE PASSWORD MODAL -->
                        <div id="password" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                        <h4 class="modal-title" style="color: #11334f;">Change Password</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    
                                    <form method="POST" action="<?php echo site_url('settings/process_password');?>" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                            <p style="font-size: 17px;">Are you sure you want to change your password?</p>
                                            <input type="hidden" name="old_password" value="<?php echo $this->input->post('old_password'); ?>" >
                                            <input type="hidden" name="new_password" value="<?php echo $this->input->post('new_password'); ?>" >
                                            <input type="hidden" name="confirm_password" value="<?php echo $this->input->post('confirm_password'); ?>" >
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-primary" type="submit" name="save_pass" value="save_pass" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--END CHANGE PASSWORD MODAL -->
                        </div>
                    </div>
            </div> 
            <footer class="footer" style="position:absolute; bottom:0;"><img src="<?php echo base_url(); ?>assets/img/homelogo.png" style="width: 158px;">
                <p style="font-size: 12px;">DORMasino&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
            </footer>     
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>

    <script>
        $(document).ready(function(){
        
            function load_unseen_notification(view = '') {
                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/Notifications/fetch_notif",
                    method:"POST",
                    data:{view:view},
                    dataType:"json",
                    success:function(data) {

                        $('.dropdown-menu').html(data.notification);
                        if(data.unseen_notification > 0) {

                            $('.count').html(data.unseen_notification);

                        }
                        
                    }
                });
            }
            
            load_unseen_notification();
            
            $(document).on('click', '.dropdown-toggle', function(){

                $('.count').html('');
                load_unseen_notification('yes');

            });
            
            setInterval(function(){ 
                load_unseen_notification();; 
            }, 5000);
        
        });
    </script>
    
</body>

</html>