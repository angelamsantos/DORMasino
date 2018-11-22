<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Logs</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/dataTables.bootstrap4.min.css">
</head>

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;">
                    <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Visitor Logs</p>
                </div><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="row" style="margin: 0px;margin-top: 0px;">
                    <div class="col d-xl-flex justify-content-xl-end" style="margin-top: 0px;padding-left: 15px;"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalIn" style="background-color: #28a745;color: #ffffff;border: none;">Log visitor</button></div>
            </div>
            <div style="margin-top: 14px;">
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>Room Number</th>
                                <th>Person to Visit</th>
                                <th>Name of Visitor</th>
                                <th>Time In</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>606</td>
                                <td>Arvin Dela Cruz</td>
                                <td>Dave Fernandez</td>
                                <td>10:00</td>
                            </tr>
                            <tr>
                                <td>1006</td>
                                <td>Raffy Torres</td>
                                <td>Francis Gella</td>
                                <td>12:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="ModalIn">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                    <h4 class="modal-title">Visit Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Number</label></div>
                                <div class="col"><select class="form-control"><optgroup label="This is a group"><option value="1201" selected="">1201</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Person to visit</label></div>
                                <div class="col"><select class="form-control"><optgroup label="This is a group"><option value="1201" selected="">Angela Santos</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Name of visitor</label></div>
                                <div class="col"><input class="form-control" type="text" placeholder="Enter name of visitor"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;border: none;color: #11334f;">Time-in</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="ModalOut">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="height: 64px;background-color: #bdedc1;">
                    <h4 class="modal-title">Visit Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Room Number</label></div>
                                <div class="col"><select class="form-control"><optgroup label="This is a group"><option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Person to visit</label></div>
                                <div class="col"><select class="form-control"><optgroup label="This is a group"><option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin: 0px;">
                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: bold;">Name of visitor</label></div>
                                <div class="col"><input class="form-control" type="text"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="button">Time-out</button></div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/datatable.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>