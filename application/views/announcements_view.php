<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    date_default_timezone_set("Asia/Manila");
    $login = $this->session->userdata('login_success');
    if (!isset ($login)) {
        redirect('Login');
    }

$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];

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
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="row align-self-center" style="margin: 0px;margin-top: 0px;height: 57px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 0px;padding: 0px;">
                        <div class="card" style="width: 80%;">
                            <div class="card-header" style="background-image: none;background-color: #76b15b;padding-top: 8px;padding-bottom: 8px;">
                                <h6 class="mb-0">Announcements&nbsp;</h6>
                            </div>
                            <?php foreach($ann as $annrow) { ?>
                            <div class="card-body" style="background-color: #ffffff;padding-top: 10px;border: 1px solid #76b15b">
                                <?php echo form_open_multipart('Announcements/process');?>
                                <input type="hidden" name="ann_id" value="<?php echo $annrow->ann_id; ?>" />
                                    <input type="text" class="form-control" name="title" placeholder="Title" style="font-size: 14px;" required><br>
                                    <textarea class="form-control" name="content" placeholder="Write something..." style="font-size: 14px;" required></textarea>
                                    <div class="form-row" style="margin: 0px;">
                                        <div class="col-xl-12 d-xl-flex justify-content-xl-end" style="margin-top: 6px;">

                                            <button class="btn btn-primary d-xl-flex" type="button" id="attach" style="padding-bottom: 1.5px;padding-top: 7px;padding-right: 4px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 0px;" title="Attach Image">
                                            <i class="material-icons" style="font-size: 17px;color: #555555;">image</i>&nbsp;</button>
                                            <input type='file' name='userfile' size='20' />
                                            <button class="btn btn-primary d-xl-flex justify-content-xl-end" type="button" id="attach" style="padding-bottom: 0px;padding-top: 7px;padding-right: 3px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 0px;" title="Attach File">
                                            <i class="material-icons" style="font-size: 17px;color: #555555;">attach_file</i>&nbsp;</button>

                                        </div>
                                    </div>
                                    <div class="form-row" style="margin: 0px;">
                                        <div class="col-xl-12 d-xl-flex justify-content-xl-end" style="margin-top: 6px;"><button class="btn btn-primary" type="submit" id="publish" style="font-size: 14px;">Publish</button></div>
                                    </div>
                                </form>
                                <div style="margin-top: 15px;border-top: 1px solid #c7c7c7;">
                                <?php

                                    if ($ann != NULL) {

                                        foreach ($ann as $row3) {

                                            $date_posted = $row3->date_posted;
                                            $post=date("M d, Y g:ia", strtotime($date_posted));
                                            
                                            echo '<div class="card" style="margin-top: 22px;background-color: #eeeeee;border:none">';
                                            echo '';
                                            echo    '<div class="card-body" >';
                                           
                                            echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'</p>';
                                            echo        '<h6 class="card-title"><b>'. $row3->ann_title .'</b></h6>';
                                            echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                            echo        '<p class="card-text" style="font-size: 14px;">'. $row3->ann_content .'</p>';
                                            echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                        <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.'
                                                        </p>
                                                        <div class="ml-xl-auto ml-lg-auto ml-md-auto">
                                                            <button title="Delete announcement" type="button" class="btn btn-primary" id="ann" data-toggle="modal" data-target="#Delete" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                <i class="icon ion-trash-a" style="font-size:15px;"></i></button>
                                                            <button title="Edit announcement" type="button" class="btn btn-primary ml-auto" id="ann" data-toggle="modal" data-target="#Edit" style="    border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                <i class="icon ion-edit" style="font-size:14px;"></i></button></div></div>';
                                            echo    '</div>';
                                            echo '</div>';

                                        }

                                    } else {

                                        echo '<div class="card" style="margin-top: 22px;background-color: #eeeeee;border:none">';
                                        echo    '<div class="card-body">';
                                        echo        '<p class="card-text" style="font-size: 14px;"><center>No announcements yet.</center></p>';
                                        echo    '</div>';
                                        echo '</div>';

                                    }

                                ?>
                                 <!----MODAL Delete-->
                                 <div id="Delete" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                                <h4 class="modal-title" style="color: #11334f;">Delete announcement</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                            
                                            <form method="POST" name="delete_ann" action="" class="justify" style="width: 100%;margin: 0 auto;">
                                            <div class="modal-body text-center">
                                                    <p style="font-size: 17px;">Are you sure you want to delete announcement?</p>
                                                   
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" name="delete_ann" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!----END MODAL Delete-->
                                
                                <!----MODAL edit-->
                                <div id="Edit" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                                <h4 class="modal-title" style="color: #11334f;">Edit announcement</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                            
                                            <form method="POST" name="delete_ann" action="" class="justify" style="width: 100%;margin: 0 auto;">
                                            <div class="modal-body text-center">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col" style="text-align:left"><label class="col-form-label mr-auto" style="font-weight: bold;">Title</label></div>
                                                        <div class="col-xl-12"><input name="etenant_lname" class="form-control" type="text" value="" required></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col" style="text-align:left"><label class="col-form-label mr-auto" style="font-weight: bold;">Content</label></div>
                                                        <div class="col-xl-12"><textarea name="etenant_address" class="form-control" row="2" type="text"  required></textarea></div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" name="delete_ann" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!----END MODAL edit-->
                                </div>
                                <p class="card-text" style="color: blue;font-size: 20px;margin-bottom: 0px; text-align: right"><?php echo $links; ?></p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <footer class="footer"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;">
                        <p style="font-size: 12px;">Thomasian Residences&nbsp;<i class="fa fa-copyright"></i>&nbsp;2018</p>
                    </footer>
            </div>
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
</body>

</html>