<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DORMasino</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
</head>


        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Announcements</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="row align-self-center" style="margin: 0px;margin-top: 0px;height: 57px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 0px;padding: 0px;">
                        <div class="card" style="width: 80%;">
                            <div class="card-header" style="background-image: none;background-color: #76b15b;padding-top: 8px;padding-bottom: 8px;">
                                <h6 class="mb-0">Announcements&nbsp;</h6>
                            </div>
                            <div class="card-body" style="background-color: #ffffff;padding-top: 10px;border: 1px solid #76b15b">
                                <form><textarea class="form-control" placeholder="Write something..." style="font-size: 14px;"></textarea>
                                    <div class="form-row" style="margin: 0px;">
                                        <div class="col-xl-12 d-xl-flex justify-content-xl-end" style="margin-top: 6px;"><button class="btn btn-primary d-xl-flex" type="button" id="attach" style="padding-bottom: 1.5px;padding-top: 7px;padding-right: 4px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 0px;"
                                                title="Attach Image" data-toggle="modal" data-target="#AddUser"><i class="material-icons" style="font-size: 17px;color: #555555;">image</i>&nbsp;</button><button class="btn btn-primary d-xl-flex justify-content-xl-end"
                                                type="button" id="attach" style="padding-bottom: 0px;padding-top: 7px;padding-right: 3px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 0px;"
                                                title="Attach File" data-toggle="modal" data-target="#AddUser"><i class="material-icons" style="font-size: 17px;color: #555555;">attach_file</i>&nbsp;</button></div>
                                    </div>
                                    <div class="form-row" style="margin: 0px;">
                                        <div class="col-xl-12 d-xl-flex justify-content-xl-end" style="margin-top: 6px;"><button class="btn btn-primary" type="button" id="publish" style="font-size: 14px;">Publish</button></div>
                                    </div>
                                </form>
                                <div style="margin-top: 15px;border-top: 1px solid #c7c7c7;">
                                    <div class="card" style="margin-top: 22px;background-color: #eeeeee;border:none">
                                        <div class="card-body">
                                            <h6 class="card-title">October 1, 2018</h6>
                                            <p class="card-text" style="font-size: 14px;">Please inform your visitors to login and leave their ID before entering the premise. Thank you.</p>
                                        </div>
                                    </div>
                                    <div class="card" style="margin-top: 22px;background-color: #eeeeee;border:none">
                                        <div class="card-body">
                                            <h6 class="card-title">September 20, 2018</h6>
                                            <p class="card-text" style="font-size: 14px;">The dorm will strictly implement a 12am curfew effective October 1, 2018. Thank you.</p>
                                        </div>
                                    </div>
                                </div>
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
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
</body>

</html>