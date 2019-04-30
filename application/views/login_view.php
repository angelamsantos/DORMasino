<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('SITE_KEY', '6Lfuf5MUAAAAABoc7IZ8bZ6dNLguxAjDfu3vTvSP');
define('SECRET_KEY', '6Lfuf5MUAAAAAMoMs_XgiLCf5lpnEVGzvmMCfdHB');

    if($this->input->post()) {
        function getCaptcha($SecretKey) {

            $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
            $Return = json_decode($Response);
            return $Return;

        }

        $Return = getCaptcha($this->input->post('g-recaptcha-response'));
        // var_dump($Return);

        if ($Return->success == true && $Return->score > 0.5) {

            $msg = '<div class="alert alert-success" role="alert"><center>Login success</center></div>';
            $this->session->set_flashdata('msg', $msg);

        } else {

            $msg = '<div class="alert alert-danger" role="alert"><center>Failed to validate reCAPTCHA. <br>Refresh the page.</center></div>';
            $this->session->set_flashdata('msg', $msg);

        }

    }

?>
<html>

<head profile="<?php echo base_url(); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/dormasino-favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DORMasino</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'Login'})
        .then(function(token) {
            // console.log(token);
            document.getElementById('g-recaptcha-response').value=token;
        });
    });
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    </script>
    <script>
    document.onkeydown = function(e) {
        if(event.keyCode == 123) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
            return false;
        }
    }
    </script>
</head>

<body style="background-color: #ffffff;" oncontextmenu="return false;">
    <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0px;">
                    <div class="row" style="width: 100%;margin: 0px;height: 100%;">
                        <div class="col-6 d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center align-items-xl-center" style="padding: 0px;background-color: #F5F5F5;">
                            <h2 class="text-center" style="font-family: ABeeZee, sans-serif;">Welcome to Thomasian Residences! For inquiries, please click the link below:</h2><a href="#" style="font-size: 31px;">https://thomasianresidences.com/wp/<br></a></div>
                        <div class="col-6" style="padding: 0px;">
                            <div class="container" style="position: relative;padding: 0px;"><img src="assets/img/thores.jpg" style="height: 569px;position: relative;width: 100%;"><button class="btn btn-primary close" type="button" data-dismiss="modal" aria-label="Close" style="position: absolute;top: 8px;right: 16px;margin: -7px;"><span aria-hidden="true">x</span></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-clean" style="background-color: rgba(0,0,0,0);padding-top: 50px;padding-bottom: 50px;">
        <form method="post" action="<?php echo site_url('Login/process');?>" style="background-color: #90caf9;">
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/img/Untitled.png" style="background-color: transparent;width: 146px;height: 166px;border: 0px;"></div>
            <?php if(! is_null($this->session->flashdata('msg'))) echo $this->session->flashdata('msg');?>
            <div class="form-group d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center"
                style="border-bottom: 1px solid #dfe7f1;"><i class="fa fa-user" style="font-size: 21px;"></i>
                <input class="form-control" type="email" name="username" placeholder="Email" style="background-color: transparent;">
            </div>

            <div class="form-group d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center"
                style="border-bottom: 1px solid #dfe7f1;"><i class="fa fa-lock" style="font-size: 21px;"></i><input class="form-control" type="password" name="password" placeholder="Password" style="background-color: transparent;">
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #81C784;color: #000000;">Log In</button></div><a href="<?php echo site_url('Forgotpass/index') ?>" class="forgot">Forgot your password?</a></form>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>