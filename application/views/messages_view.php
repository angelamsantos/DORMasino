<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Messages</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/chat.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Community-ChatComments.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
</head>

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-md-flex d-xl-flex align-items-md-center justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;">
                    <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Messages</p>
                </div><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;margin-bottom: -6px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div>
                    <div class="card" style="height: 450px;overflow-y: scroll;">
                        <div class="card-body" style="padding: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;">
                            <h5 class="d-xl-flex align-items-xl-center card-title" style="margin: 0px;margin-right: 0px;margin-left: 0px;background-color: #76b15b;padding: 5px;">Messages<button class="btn btn-primary d-xl-flex ml-auto ml-lg-auto ml-xl-auto" type="button" id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;background-color: transparent;border: none;width: 16px;height: 16px;margin-top: 5px;"
                                    title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 17.5px;color: #555555;width: 5%;margin-top: 5px;"></i>&nbsp;</button></h5>
                            <div class="card" style="border-bottom: 1px solid #c7c7c7;">
                                <div class="card-body" style="padding: 10px;">
                                    <h5 class="card-title">Arvin Dela Cruz</h5>
                                    <h6 class="text-muted card-subtitle mb-2">October 1, 2018</h6>
                                    <p class="card-text" style="margin-bottom: -5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                </div>
                            </div>
                            <div class="card" style="border-bottom: 1px solid #c7c7c7;">
                                <div class="card-body" style="padding: 10px;">
                                    <h5 class="card-title">Dave Fernandez</h5>
                                    <h6 class="text-muted card-subtitle mb-2">September 27, 2018</h6>
                                    <p class="card-text" style="margin-bottom: -5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                </div>
                            </div>
                            <div class="card" style="border-bottom: 1px solid #c7c7c7;">
                                <div class="card-body" style="padding: 10px;">
                                    <h5 class="card-title">Francis Gella</h5>
                                    <h6 class="text-muted card-subtitle mb-2">September 15, 2018</h6>
                                    <p class="card-text" style="margin-bottom: -5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                </div>
                            </div>
                            <div class="card" style="border-bottom: 1px solid #c7c7c7;">
                                <div class="card-body" style="padding: 10px;">
                                    <h5 class="card-title">Angela Mae Santos</h5>
                                    <h6 class="text-muted card-subtitle mb-2">September 12, 2018</h6>
                                    <p class="card-text" style="margin-bottom: -5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                </div>
                            </div>
                            <div class="card" style="border-bottom: 1px solid #c7c7c7;">
                                <div class="card-body" style="padding: 10px;">
                                    <h5 class="card-title">Raffy Torres</h5>
                                    <h6 class="text-muted card-subtitle mb-2">September 10, 2018</h6>
                                    <p class="card-text" style="margin-bottom: -5px;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/chat.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
</body>

</html>