<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    date_default_timezone_set("Asia/Manila");
    $login = $this->session->userdata('login_success');
    if (!isset ($login)) {
        redirect('Login');
    }

$admin_fname = $this->session->userdata['login_success']['info']['admin_fname'];
$admin_id = $this->session->userdata['login_success']['info']['admin_id'];

$aann = $this->session->userdata['login_success']['info']['adcontrol_ann'];
    $a="";
    if($aann[1] == 1) { //add
        $a = "title='Publish announcement'";
    } else {
        $a = "disabled title='This feature is not available on your account.'";
    } 


?>
<html>
<head>
<style>
button.link {
    background:none!important;
    border:none; 
    padding:0!important;
    
    /*optional*/
    font-family:arial,sans-serif; /*input has OS specific font-family*/
    color:#069;
    text-decoration:underline;
    cursor:pointer;
}
    .btn-file {
    position: relative;
    overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;   
        cursor: inherit;
        display: block;
    }

    /* .pagination > li {
        color: black;
    }
    
    .page-item  {
        color:black;
    }
    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover {
        color:black;
    } */

    .page-link > a {
        color:black;
    }



</style>
</head>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Announcements</p>
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
                </div><a title="Click here to collapse" class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;width:5%;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row align-self-center" style="margin: 0px;margin-top: 0px;height: 57px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 0px;padding: 0px;">
                        <div class="card" style="width: 80%;">
                            <div class="card-header" style="background-image: none;background-color: #76b15b;padding-top: 8px;padding-bottom: 8px;">
                                <h6 class="mb-0">Announcements&nbsp;</h6>
                            </div>
                            <div class="card-body" style="background-color: #ffffff;padding-top: 10px;border: 1px solid #76b15b;">
                            <div class="col-xl-12" style="margin-top: 11px;padding:0px;">
	                            <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
                            </div><br>
                                <?php echo form_open_multipart('Announcements/do_upload');?>
                                <form id="form1" runat="server">
                                    <input type="text" class="form-control" name="title" placeholder="Title" style="font-size: 14px;" required><br>
                                    <textarea class="form-control" name="content" placeholder="Write something..." style="font-size: 14px;" required></textarea>
                                    <div class="form-row" style="margin: 0px;">
                                        <div class="col-xl-12 d-xl-flex justify-content-xl-end" style="margin-top: 6px;">

                                            <input type="text" id="bleh" class="form-control" style="font-size: 14px; background-color:#fff; border: none;" readonly />

                                            <button class="btn btn-primary d-xl-flex btn-file" type="button" id="attach" style="padding-bottom: 0px;padding-top: 5px;padding-right: 8px;padding-left: 10px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 0px;" title="Attach Image">
                                            <input type="file" name="img" size="20" value="img"  onchange="readURL(this); changeEventHandler(event);" />
                                            <i class="material-icons" style="font-size: 17px;color: #555555;">image</i>&nbsp;
                                            </button>

                                            <button class="btn btn-primary d-xl-flex justify-content-xl-end btn-file" type="button" id="attach" style="padding-bottom: 0px;padding-top: 7px;padding-right: 7px;padding-left: 12px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 10px;" title="Attach File">
                                            <input type="file" name="file" size="20" value="file"  onchange="changeEventHandler(event);"/>
                                            <i class="material-icons" style="font-size: 17px;color: #555555;">attach_file</i>&nbsp;
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex" style="justify: center">
                                    <img id="blah" class="mx-auto" style="width:25%; height:25%;" />
                                    </div>
                                    <div class="form-row" style="margin: 0px;">
                                        <div class="col-xl-12 d-xl-flex justify-content-xl-end" style="margin-top: 6px;">
                                        <button class="btn btn-primary" <?php echo $a; ?> type="submit" style="font-size: 14px;">Publish</button></div>
                                    </div>
                                    </form>
                                <div style="margin-top: 15px;border-top: 1px solid #c7c7c7;">
                                <?php

                                    if ($ann != NULL) {

                                        foreach ($ann as $row3) {

                                            $date_posted = $row3->date_posted;
                                            $post=date("M d, Y g:ia", strtotime($date_posted));
                                            $filetype = $row3->annfile_type;
                                            $status = $row3->ann_status;

                                            if ($status == 1) {

                                                if ($row3->admin_id == $admin_id) {

                                                    if ($filetype == "file") {

                                                        $filepath = $row3->annfile_path;
                                                        $filename = explode("/", $filepath);

                                                        echo '<div class="card" style="margin-top: 22px;background-color: #bdedc1;border:none">';
                                                        echo    '<div class="card-body">';
                                                        echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                        <button title="Edit announcement" type="button" class="btn btn-primary ml-auto" id="active_ann" data-toggle="modal" data-target="#Edit'.$row3->id.'" style="border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                            <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                        </button>
                                                                        <button title="Delete announcement" type="button" class="btn btn-primary" id="active_ann" data-toggle="modal" data-target="#Delete'.$row3->id.'" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                            <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                        </button>
                                                                    </p>';
                                                        echo        '<h6 class="card-title"><b>'. htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"><a title="Download file" href="../../'.$row3->annfile_path.'">'.$filename[5].'</a><br>';
                                                        echo        '<button class="link" type="button" title="Remove Attachment" style="font-size: 11px;" data-toggle="modal" data-target="#Remove'.$row3->id.'">*Remove Attachment</button></p>';
                                                        echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                    <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>';
                                                        echo        '</div>';
                                                        echo    '</div>';
                                                        echo '</div>';

                                                    } else if ($filetype == "image") {

                                                        echo '<div class="card" style="margin-top: 22px;background-color: #bdedc1;border:none">';
                                                        echo    '<div class="card-body">';
                                                        echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                        <button title="Edit announcement" type="button" class="btn btn-primary ml-auto" id="active_ann" data-toggle="modal" data-target="#Edit'.$row3->id.'" style="border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                            <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                        </button>
                                                                        <button title="Delete announcement" type="button" class="btn btn-primary" id="active_ann" data-toggle="modal" data-target="#Delete'.$row3->id.'" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                            <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                        </button>
                                                                    </p>';
                                                        echo        '<h6 class="card-title"><b>'.htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"><img src="'.base_url(), $row3->annfile_path.'" class="img-responsive" style="width:25%;height:25%;</a></p>';
                                                        echo        '<p class="card-text"><br><button class="link" type="button" title="Remove Attachment" style="font-size: 11px;" data-toggle="modal" data-target="#Remove'.$row3->id.'">*Remove Attachment</button></p>';
                                                        echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                    <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>';
                                                        echo        '</div>';
                                                        echo    '</div>';
                                                        echo '</div>';
                                                        
                                                    } else {
            
                                                        echo '<div class="card" style="margin-top: 22px;background-color: #bdedc1;border:none">';
                                                        echo    '<div class="card-body">';
                                                        echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                        <button title="Edit announcement" type="button" class="btn btn-primary ml-auto" id="active_ann" data-toggle="modal" data-target="#Edit'.$row3->id.'" style="border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                            <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                        </button>
                                                                        <button title="Delete announcement" type="button" class="btn btn-primary" id="active_ann" data-toggle="modal" data-target="#Delete'.$row3->id.'" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;">
                                                                            <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                        </button>
                                                                    </p>';
                                                        echo        '<h6 class="card-title"><b>'.htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                        echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                    <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>';
                                                        echo        '</div>';
                                                        echo    '</div>';
                                                        echo '</div>';

                                                    }
                                                    echo '</form>';

                                                } else {

                                                    if ($filetype == "file") {

                                                        $filepath = $row3->annfile_path;
                                                        $filename = explode("/", $filepath);

                                                        echo '<div class="card" style="margin-top: 22px;background-color: #bdedc1;border:none">';
                                                        echo    '<div class="card-body">';
                                                        echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                        <button title="Can only edit own announcement" type="button" class="btn btn-primary ml-auto" id="active_ann" data-toggle="modal" data-target="#Edit'.$row3->id.'" style="border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                            <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                        </button>
                                                                        <button title="Can only delete own announcement" type="button" class="btn btn-primary" id="active_ann" data-toggle="modal" data-target="#Delete'.$row3->id.'" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                            <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                        </button>
                                                                    </p>';
                                                        echo        '<h6 class="card-title"><b>'. htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"><a title="Download file" href="../../'.$row3->annfile_path.'">'.$filename[5].'</a><br>';
                                                        echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                    <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>';
                                                        echo        '</div>';
                                                        echo    '</div>';
                                                        echo '</div>';

                                                    } else if ($filetype == "image") {

                                                        echo '<div class="card" style="margin-top: 22px;background-color: #bdedc1;border:none">';
                                                        echo    '<div class="card-body">';
                                                        echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                        <button title="Can only edit own announcement" type="button" class="btn btn-primary ml-auto" id="active_ann" data-toggle="modal" data-target="#Edit'.$row3->id.'" style="border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                            <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                        </button>
                                                                        <button title="Can only delete own announcement" type="button" class="btn btn-primary" id="active_ann" data-toggle="modal" data-target="#Delete'.$row3->id.'" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                            <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                        </button>
                                                                    </p>';
                                                        echo        '<h6 class="card-title"><b>'. htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"><img src="'.base_url(), $row3->annfile_path.'" class="img-responsive" style="width:25%;height:25%;</a></p>';
                                                        echo        '<p class="card-text"><br></p>';
                                                        echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                    <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>';
                                                        echo        '</div>';
                                                        echo    '</div>';
                                                        echo '</div>';
                                                        
                                                    } else {
            
                                                        echo '<div class="card" style="margin-top: 22px;background-color: #bdedc1;border:none">';
                                                        echo    '<div class="card-body">';
                                                        echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                        <button title="Can only edit own announcement" type="button" class="btn btn-primary ml-auto" id="active_ann" data-toggle="modal" data-target="#Edit'.$row3->id.'" style="border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                            <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                        </button>
                                                                        <button title="Can only delete own announcement" type="button" class="btn btn-primary" id="active_ann" data-toggle="modal" data-target="#Delete'.$row3->id.'" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                            <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                        </button>
                                                                    </p>';
                                                        echo        '<h6 class="card-title"><b>'. htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                        echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                        echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                        echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                    <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>';
                                                        echo        '</div>';
                                                        echo    '</div>';
                                                        echo '</div>';

                                                    }
                                                    echo '</form>';

                                                }

                                            } else {

                                                if ($filetype == "file") {


                                                    $filepath = $row3->annfile_path;
                                                    $filename = explode("/", $filepath);

                                                    echo '<div class="card" title="The announcement has been edited/deleted." style="margin-top: 22px;background-color: #eeeeee;border:none">';
                                                    echo    '<div class="card-body">';
                                                    echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                    <button type="button" class="btn btn-primary ml-auto" id="ann" data-toggle="modal" data-target="#Edit" style="border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                        <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary" id="ann" data-toggle="modal" data-target="#Delete" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                        <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                    </button>
                                                                </p>';
                                                    echo        '<h6 class="card-title"><b>'. htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                    echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                    echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                    echo        '<p class="card-text" style="font-size: 14px;"><a title="Download file" href="../../'.$row3->annfile_path.'">'.$filename[5].'</a></p>';
                                                    echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>
                                                                </div>';
                                                    echo    '</div>';
                                                    echo '</div>';

                                                } else if ($filetype == "image") {
        
                                                    echo '<div class="card" title="The announcement has been edited/deleted." style="margin-top: 22px;background-color: #eeeeee;border:none">';
                                                    echo    '<div class="card-body">';
                                                    echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                    <button type="button" class="btn btn-primary ml-auto" id="ann" data-toggle="modal" data-target="#Edit" style="border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                        <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary" id="ann" data-toggle="modal" data-target="#Delete" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                        <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                    </button>
                                                                </p>';
                                                    echo        '<h6 class="card-title"><b>'. htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                    echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                    echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                    echo        '<p class="card-text" style="font-size: 14px;"><img src="'.base_url(), $row3->annfile_path.'" style="width:25%;height:25%;></p>';
                                                    echo        '<p class="card-text"><br></p>';
                                                    echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>
                                                                </div>';
                                                    echo    '</div>';
                                                    echo '</div>';
                                                    
                                                } else {
        
                                                    echo '<div class="card" title="The announcement has been edited/deleted." style="margin-top: 22px;background-color: #eeeeee;border:none">';
                                                    echo    '<div class="card-body">';
                                                    echo        '<p class="card-title" style="font-size: 14px;float: right;">'. $post .'
                                                                    <button type="button" class="btn btn-primary ml-auto" id="ann" data-toggle="modal" data-target="#Edit" style="border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                        <i class="icon ion-edit" style="font-size:14px;"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary" id="ann" data-toggle="modal" data-target="#Delete" style="margin-right:3px;border-radius:90px 90px 90px 90px;padding:0px 8px;" disabled>
                                                                        <i class="icon ion-trash-a" style="font-size:15px;"></i>
                                                                    </button>
                                                                </p>';
                                                    echo        '<h6 class="card-title"><b>'. htmlspecialchars($row3->ann_title) .'</b></h6>';
                                                    echo        '<p class="card-text" style="font-size: 14px;"></p>';
                                                    echo        '<p class="card-text" style="font-size: 14px;">'. htmlspecialchars($row3->ann_content) .'</p>';
                                                    echo        '<div class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column" >
                                                                <p class="card-text mr-xl-auto mr-lg-auto mr-md-auto mr-sm-auto mr-auto" style="font-size: 10px;">Posted by: '. $row3->admin_fname .' ' .$row3->admin_lname.' </p>
                                                                </div>';
                                                    echo    '</div>';
                                                    echo '</div>';

                                                }

                                            }
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
                                <?php 
                                if ($ann != NULL) {
                                    foreach ($ann as $del) { ?>
                                <div id="Delete<?php echo $del->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                                <h4 class="modal-title" style="color: #11334f;">Delete announcement</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                            <form method="POST" action="<?php echo site_url('Announcements/delete');?>">
                                            <div class="modal-body text-center">
                                                    <p style="font-size: 17px;">Are you sure you want to delete the announcement?</p>
                                                    <input type="hidden" name="ann_id" value="<?php echo $del->id; ?>" >
                                            </div>
                                                <div class="modal-footer"><button class="btn btn-primary" name="delete_ann" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } ?>
                                <!----END MODAL Delete-->
                                <!----MODAL Remove-->
                                <?php 
                                if ($ann != NULL) {
                                    foreach ($ann as $remove) { ?>
                                <div id="Remove<?php echo $remove->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                                <h4 class="modal-title" style="color: #11334f;">Remove attachment</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                            <form method="POST" action="<?php echo site_url('Announcements/remove');?>">
                                            <div class="modal-body text-center">
                                                    <p style="font-size: 17px;">Are you sure you want to remove the attachment?</p>
                                                    <input type="hidden" name="remove_id" value="<?php echo $remove->id; ?>" >
                                            </div>
                                                <div class="modal-footer"><button class="btn btn-primary" name="remove_ann" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Yes</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } ?>
                                <!----END MODAL Remove-->
                                <!----MODAL edit-->
                                <?php 
                                if ($ann != NULL) {
                                    foreach ($ann as $edit) {
                                        $filetype = $edit->annfile_type;
                                        $filepath = $edit->annfile_path;
                                        $filename = explode("/", $filepath); ?>
                                <div id="Edit<?php echo $edit->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-big" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                                <h4 class="modal-title" style="color: #11334f;">Edit announcement</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                <?php echo form_open_multipart('Announcements/edit');?>
                                            <div class="modal-body text-center">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-xl-12" style="text-align:left"><label class="col-form-label" style="font-weight: normal;">Title</label></div>
                                                        <div class="col-xl-12"><input name="edit_title" class="form-control" type="text" value="<?php echo $edit->ann_title ?>" required></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-xl-12" style="text-align:left"><label class="col-form-label" style="font-weight: normal;">Content</label></div>
                                                        <div class="col-xl-12"><textarea name="edit_content" class="form-control" row="2" type="text" required><?php echo $edit->ann_content ?></textarea></div>
                                                    </div>
                                                </div>
                                                <div class="form-row" style="margin: 0px;">
                                                    <div class="col-xl-12 d-xl-flex justify-content-xl-end" style="margin-top: 6px;">

                                                        <?php if ($filetype == "file" || $filetype == "image") { ?>
                                                            <input type="text" id="bleh2" class="form-control" value="<?php echo $filename[5]; ?>" style="font-size: 14px; background-color:#fff; border: none;" readonly />
                                                            <!-- <a title="Remove Attachment" style="color: #555555" href="<?php echo site_url('Announcements/remove') ?>">Remove Attachment</a> -->
                                                        <?php } else { ?>  
                                                            <input type="text" id="bleh2" class="form-control" value="" style="font-size: 14px; background-color:#fff; border: none;" readonly />
                                                        <?php } ?>

                                                        <button class="btn btn-primary d-xl-flex btn-file d-xl-flex" type="button" id="attach" style="padding-bottom: 0px;padding-top: 5px;padding-right: 8px;padding-left: 10px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 0px;" title="Attach Image">
                                                        <input type="file" name="img" size="20" value="img" onchange="changeEventHandler2(event);" />
                                                        <i class="material-icons" style="font-size: 17px;color: #555555;">image</i>&nbsp;
                                                        </button>

                                                        <button class="btn btn-primary d-xl-flex justify-content-xl-end btn-file" type="button" id="attach" style="padding-bottom: 0px;padding-top: 7px;padding-right: 7px;padding-left: 12px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;margin-left: 10px;" title="Attach File">
                                                        <input type="file" name="file" size="20" value="file" onchange="changeEventHandler2(event);"/>
                                                        <i class="material-icons" style="font-size: 17px;color: #555555;">attach_file</i>&nbsp;
                                                        </button>
                                                    
                                                    </div>
                                                </div>
                                                <input type="hidden" name="ann_id" value="<?php echo $edit->id; ?>" >
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" name="edit_ann" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } ?>
                                <!----END MODAL edit-->
                                
                                </div>
                                <div class="pull-right" style="margin-top: 15px;"><?php echo $links; ?></div>
                            
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
    
</div>

    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {

                    $('#blah').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>

        function changeEventHandler(event) {
            $('#bleh').attr('value', event.target.value);
        }

    </script>
    <script>

        function changeEventHandler2(event) {
            $('#bleh2').attr('value', event.target.value);
        }

</script>
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