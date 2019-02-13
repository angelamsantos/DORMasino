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
    <script>

        $(document).ready(function(){
                $('#archive').hide();
                $('#sent').hide();
                $('#inbox').show();
                $('#btnInbox').click(function(){
                    $('#archive').hide();
                    $('#sent').hide();
                    $('#inbox').show();
                    $('#btnInbox').css('background-color', '#bdedc1');
                    $('#btnArchive').css('background-color', 'transparent');
                    $('#btnSent').css('background-color', 'transparent');
                });
                $('#btnSent').click(function(){
                    $('#archive').hide();
                    $('#inbox').hide();
                    $('#sent').show();
                    $('#btnSent').css('background-color', '#bdedc1');
                    $('#btnInbox').css('background-color', 'transparent');
                    $('#btnArchive').css('background-color', 'transparent');
                });
                $('#btnArchive').click(function(){
                    $('#inbox').hide();
                    $('#sent').hide();
                    $('#archive').show();
                    $('#btnArchive').css('background-color', '#bdedc1');
                    $('#btnInbox').css('background-color', 'transparent');
                    $('#btnSent').css('background-color', 'transparent');
                });

                $('.chk_boxes').click(function() {
                    $('.chk_boxes1').prop('checked', this.checked);
                });
        });
    </script>


    <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-flex d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;padding-right: 16px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0)">
                    <p class="d-flex align-items-center align-content-center align-items-sm-center align-items-md-center align-items-lg-center" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Messages</p>
                    <p class="d-flex align-self-center ml-auto" style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 16px;margin-bottom: 0px;"><i class="icon ion-person"></i>&nbsp; &nbsp;<?php echo $admin_fname ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo  date("D, j M Y"); ?>&nbsp;</p>
                </div><a class="btn btn-link d-xl-flex justify-content-xl-start" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div>
                    <div class="row" style="margin: 0px;">
                        <div class="col-2 col-sm-2 col-md-2 col-lg-3 col-xl-3" style="background-color: #ffffff;padding: 0px;">
                            <div class="row" style="margin: 0px;border-bottom: none;height: 46.5px;">
                                <div class="col d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="border: none;"><button data-toggle="modal" data-target="#New" class="btn btn-primary my-auto" type="button" style="border-radius: 90px 90px 90px 90px;background-color: #bdedc1;color: #11334f;width: 100%;border-color: transparent;"><i class="icon ion-ios-compose" style="font-size: 16px;"></i>&nbsp;New Message</button></div>
                            </div>
                            <ul class="list-group">
                                <a id="btnInbox" class="list-group-item" style="background-color: #bdedc1;"><span style="font-size: 15px;font-weight: bold;"><i class="fa fa-envelope" style="font-size: 13px;"></i>&nbsp; &nbsp;Inbox</span></a>
                                <a id="btnSent" class="list-group-item"><span style="font-size: 15px;font-weight: bold;"><i class="fa fa-send" style="font-size: 13px;"></i>&nbsp; &nbsp;Sent</span></a>
                                <a id="btnArchive" class="list-group-item"><span style="font-size: 15px;font-weight: bold;"><i class="fa fa-archive" style="font-size: 13px;"></i>&nbsp; &nbsp;Archive</span></a>
                            </ul>
                        </div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-9 col-xl-9" style="padding: 0px;">
                            <div id="inbox">
                                <div class="row" style="margin: 0px;border-bottom: none;height: 46.5px;">
                                    <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                                        style="border: none;">
                                        <h4 class="d-xl-flex justify-content-xl-center" style="font-size: 20px">Messages (Inbox)</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item" style="padding: 0px;">
                                        <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center flex-lg-row align-items-lg-center flex-xl-row align-items-xl-center" style="padding: 0px 15px;margin: 5px 0px;">
                                            <div class="form-check d-flex d-sm-flex d-md-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center mr-lg-auto align-items-xl-center mr-xl-auto" style="width: 10%;">
                                            <input class="form-check-input my-auto my-sm-auto my-md-auto my-lg-auto my-xl-auto" type="checkbox" id="formCheck-1">
                                            <label class="form-check-label" for="formCheck-1">
                                                <button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: transparent;border: none;height: 29px;width: 30.2188px;margin-right: 10px;margin-bottom: 0px;" title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="icon ion-android-archive" style="font-size: 24px;color: #555555;padding-left: 0px;margin-left: 4.8px;"></i>&nbsp;
                                                </button>
                                            </label>
                                        </div>
                                            <select
                                                class="align-self-stretch ml-auto ml-lg-auto ml-xl-auto" style="font-size: 14px;">
                                                <optgroup label="This is a group">
                                                    <option value="12" selected="">This is item 1</option>
                                                    <option value="13">This is item 2</option>
                                                    <option value="14">This is item 3</option>
                                                </optgroup>
                                                </select>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="sent">
                                <div class="row" style="margin: 0px;border-bottom: none;height: 46.5px;">
                                    <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                                        style="border: none;">
                                        <h4 class="d-xl-flex justify-content-xl-center" style="font-size: 20px">Messages (Sent)</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item" style="padding: 0px;">
                                    <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center flex-lg-row align-items-lg-center flex-xl-row align-items-xl-center" style="padding: 0px 15px;margin: 5px 0px;">
                                            <div class="form-check d-flex d-sm-flex d-md-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center mr-lg-auto align-items-xl-center mr-xl-auto" style="width: 10%;">
                                            <input class="form-check-input my-auto my-sm-auto my-md-auto my-lg-auto my-xl-auto" type="checkbox" id="formCheck-1">
                                            <label class="form-check-label" for="formCheck-1">
                                                <button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: transparent;border: none;height: 29px;width: 30.2188px;margin-right: 10px;margin-bottom: 0px;" title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="icon ion-android-archive" style="font-size: 24px;color: #555555;padding-left: 0px;margin-left: 4.8px;"></i>&nbsp;
                                                </button>
                                            </label>
                                        </div>
                                            <select
                                                class="align-self-stretch ml-auto ml-lg-auto ml-xl-auto" style="font-size: 14px;">
                                                <optgroup label="This is a group">
                                                    <option value="12" selected="">This is item 1</option>
                                                    <option value="13">This is item 2</option>
                                                    <option value="14">This is item 3</option>
                                                </optgroup>
                                                </select>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="archive">
                                <div class="row" style="margin: 0px;border-bottom: none;height: 46.5px;">
                                    <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                                        style="border: none;">
                                        <h4 class="d-xl-flex justify-content-xl-center" style="font-size: 20px">Messages (Archive)</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item" style="padding: 0px;">
                                    <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center flex-lg-row align-items-lg-center flex-xl-row align-items-xl-center" style="padding: 0px 15px;margin: 5px 0px;">
                                            <div class="form-check d-flex d-sm-flex d-md-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center mr-lg-auto align-items-xl-center mr-xl-auto" style="width: 10%;">
                                            <input class="form-check-input my-auto my-sm-auto my-md-auto my-lg-auto my-xl-auto" type="checkbox" id="formCheck-1">
                                            <label class="form-check-label" for="formCheck-1">
                                                <button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: transparent;border: none;height: 29px;width: 30.2188px;margin-right: 10px;margin-bottom: 0px;" title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="icon ion-android-archive" style="font-size: 24px;color: #555555;padding-left: 0px;margin-left: 4.8px;"></i>&nbsp;
                                                </button>
                                            </label>
                                        </div>
                                            <select
                                                class="align-self-stretch ml-auto ml-lg-auto ml-xl-auto" style="font-size: 14px;">
                                                <optgroup label="This is a group">
                                                    <option value="12" selected="">This is item 1</option>
                                                    <option value="13">This is item 2</option>
                                                    <option value="14">This is item 3</option>
                                                </optgroup>
                                                </select>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="d-flex" style="font-weight: bold;margin-bottom: 2px;">Arvin Dela Cruz</h6>
                                        <p style="color: #868e96;font-size: 12px;margin-bottom: 7px;">October 12, 2018</p>
                                        <p style="font-size: 14px;">Hi Ate, I will pay the rent tomorrow.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!----MODAL NEW MESSAGE-->
                        <div id="New" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                                        <h4 class="modal-title" style="color: #11334f;">New Message</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    
                                    <form method="POST" name="send_msg" action="" class="justify" style="width: 100%;margin: 0 auto;">
                                    <div class="modal-body text-center">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-12" style="text-align:left"><label class="col-form-label" style="font-weight: normal;">Send to:</label></div>
                                                <div class="col-xl-12">
                                                    <select name="room_id[]" id="sel_room"  class="form-control multiple-select" required>
                                                    <option value="">Select Room</option>
                                                    <?php

                                                        foreach ($room->result() as $row) {

                                                            echo '<option value="'. $row->room_id .'"> '. $row->room_number .' </option>';
                                                            
                                                        }

                                                    ?>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="col-xl-12">
                                                    <select name="tenant_id" id="sel_tenant" class="form-control multiple-select" required>
                                                    <option value="">Select Tenant</option>
                                                    </select>
                                                    <input type="text" id="sample">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-12" style="text-align:left"><label class="col-form-label" style="font-weight: normal;">Message</label></div>
                                                
                                                <div class="col-xl-12">
                                                    <input type="text" class="form-control" name="subject" placeholder="Subject" style="font-size: 14px; margin-bottom:10px;" required>
                                                    <textarea name="body" class="form-control" row="2" type="text" placeholder="Write something..."  required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-primary" name="send_msg" type="submit" style="background-color: #bdedc1;color: #11334f;border: none;">Send</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!----END MODAL NEW MESSAGE-->
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
            </div>
        </div>
    </div>
</body>

<script src="<?php echo base_url(); ?>/assets/js/selectize/standalone/selectize.min.js"></script>
<script>

$(document).ready(function(){
    $(document).ready(function() {
        $('#sel_room').selectize({
            maxItems: null,
            create: false,
        });
        $('#sel_tenant').selectize({
            maxItems: null,
            create: false,
        });
    });
    $('#sel_room').change(function(){
        var room_id = $('#sel_room').val();
    
        if(room_id != '') {
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/Messages/fetch_tenant",
                method:"POST",
                data:{room_id:room_id},
                success:function(data) {
                var tenant = $('#sel_tenant').html(data);
                $('#sample').val(data);
                }
            });
        } else {
            $('#sel_tenant').html('<option value="">Select Tenant</option>');
        }
    });
});

</script>

</html>