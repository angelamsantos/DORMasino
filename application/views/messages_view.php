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


    <style>
    li p {
        font-size: 14px !important;
    }
    </style>


        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Messages</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div>
                    <div class="row" style="margin: 0px;border: 1px solid #c7c7c7;border-bottom:none;">
                        <div class="col d-xl-flex justify-content-xl-end align-items-xl-center" style="padding: 0px 15px;">
                            <div class="form-check" style="width: 10%;"><input class="form-check-input" type="checkbox" id="formCheck-1"><select><option selected disabled>Filter</option><option>Month</option><option>Year</option></select></div><span><i class="fa fa-archive"></i>&nbsp;Archive</span></div>
                    </div>
                    <div class="row" style="border: 1px solid #c7c7c7;margin: 0px;border-top:none;">
                        <div class="col-xl-2" style="background-color: #ffffff;padding: 0px;">
                            <ul class="list-group">
                                <li class="list-group-item" style="background-color: #bdedc1;"><span style="font-size: 15px;font-weight: bold;"><i class="fa fa-envelope" style="font-size: 13px;"></i>&nbsp; &nbsp;Inbox</span></li>
                                <li class="list-group-item"><span style="font-size: 15px;font-weight: bold;"><i class="fa fa-archive" style="font-size: 13px;"></i>&nbsp; &nbsp;Archive</span></li>
                            </ul>
                        </div>
                        <div class="col" style="padding: 0px;">
                            <ul class="list-group">
                                <li class="list-group-item" >
                                    <h5 class="d-flex" style="font-weight: bold;height: 31px;">Arvin Dela Cruz</h5>
                                    <p style="color: #868e96;">October 12, 2018</p>
                                    <p>Hi Ate, I will pay the rent tomorrow.</p>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="d-flex" style="font-weight: bold;height: 31px;">Dave Fernandez</h5>
                                    <p style="color: #868e96;">October 9, 2018</p>
                                    <p>The noise from the next door bothers me a lot.</p>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="d-flex" style="font-weight: bold;height: 31px;">Angela Santos</h5>
                                    <p style="color: #868e96;">October 2, 2018</p>
                                    <p>What is the contact number of the admin?</p>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="d-flex" style="font-weight: bold;height: 31px;">Francis Gella</h5>
                                    <p style="color: #868e96;">September 27, 2018</p>
                                    <p>What time is the curfew?</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="Archive">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                    <h4 class="modal-title" style="color: #11334f;">Archive Message</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <h5 class="d-xl-flex justify-content-xl-center">Are you sure you want to archive message?</h5>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
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
</body>

</html>