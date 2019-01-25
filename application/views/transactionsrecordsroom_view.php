<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DORMasino</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link href="<?php echo base_url(); ?>/assets/css/selectize.bootstrap4.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
</head>


    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Transactions</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><?php echo  date("D, j M Y"); ?> &nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div class="row"
                    style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    
                </div>
                <div class="row" style="margin-top: 10px;margin-left: 0px;margin-right: 0px;">
                    <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;">
                        
                        <div id="table_view" class="table-responsive" style="width:100%;">
                            <table class="table" id="example" style="font-size:14px;">
                                <thead class="logs">
                                    <tr style="text-align:center">
                                        <th style="padding-right: 0px;padding-left: 0px;">Reference Number</th>
                                        <th style="padding-right: 0px;padding-left: 0px;">Room No</th>
                                        <th style="padding-right: 0px;padding-left: 0px;">Tenant Name</th>
                                        <th style="padding-right: 0px;padding-left: 0px;">Transaction Type</th>
                                        <th style="padding-right: 0px;padding-left: 0px;">Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                         
                                        <tr>
                                            <td style="text-align:center;">R20180001</td>
                                            <td style="text-align:center;">301</td>
                                            <td style="text-align:center;">Arvin Dela Cruz</td>
                                            <td style="text-align:center;">Rent</td>
                                            <td style="text-align:center;">01-01-2018</td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center;">R20180001</td>
                                            <td style="text-align:center;">301</td>
                                            <td style="text-align:center;">Arvin Dela Cruz</td>
                                            <td style="text-align:center;">Rent</td>
                                            <td style="text-align:center;">01-01-2018</td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center;">R20180001</td>
                                            <td style="text-align:center;">301</td>
                                            <td style="text-align:center;">Arvin Dela Cruz</td>
                                            <td style="text-align:center;">Rent</td>
                                            <td style="text-align:center;">01-01-2018</td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center;">R20180001</td>
                                            <td style="text-align:center;">301</td>
                                            <td style="text-align:center;">Arvin Dela Cruz</td>
                                            <td style="text-align:center;">Rent</td>
                                            <td style="text-align:center;">01-01-2018</td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center;">R20180001</td>
                                            <td style="text-align:center;">301</td>
                                            <td style="text-align:center;">Arvin Dela Cruz</td>
                                            <td style="text-align:center;">Rent</td>
                                            <td style="text-align:center;">01-01-2018</td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center;">R20180001</td>
                                            <td style="text-align:center;">301</td>
                                            <td style="text-align:center;">Arvin Dela Cruz</td>
                                            <td style="text-align:center;">Rent</td>
                                            <td style="text-align:center;">01-01-2018</td>
                                        </tr>
                                    
                                </tbody>
                            </table>
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