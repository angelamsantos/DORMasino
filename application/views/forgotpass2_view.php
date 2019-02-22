<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
</style>

<head profile="<?php echo base_url(); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/dormasino-favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DORMasino</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>

<body style="background-color: #ffffff;">
    <div class="login-clean" style="background-color: rgba(0,0,0,0);padding-top: 50px;padding-bottom: 50px;">
        <form method="post" action="<?php echo site_url('Forgotpass/validation');?>" style="background-color: #90caf9;">
            <h2 class="sr-only">Forgot Password 2 Form</h2>
            <div class="illustration"><a href="<?php echo site_url('Login/index'); ?>"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/img/Untitled.png" style="background-color: transparent;width: 146px;height: 166px;border: 0px;"></a>
            <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Verification Code</p>
            </div>
            <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
            <div class="form-group d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center"
                style="border-bottom: 1px solid #dfe7f1;"><i class="fa fa-lock" style="font-size: 21px;"></i><input class="form-control" type="number" name="vcode" placeholder="Verification Code" style="background-color: transparent;" required>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #81C784;color: #000000;">Validate</button></div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>