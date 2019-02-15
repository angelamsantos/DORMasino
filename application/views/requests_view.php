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
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Requests</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
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
</body>

</html>