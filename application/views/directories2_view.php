<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 54px;margin-right: -15px;margin-left: -15px;background-color: #90caf9;padding-left: 16px;">
                    <p style="color: #11334f;font-family: ABeeZee, sans-serif;font-size: 24px;margin-bottom: 0px;">Directories</p>
                </div><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle" style="margin-left: -19px;"><i class="fa fa-bars" style="padding: 21px;font-size: 23px;padding-top: 6px;padding-bottom: 6px;padding-right: 9px;padding-left: 9px;"></i></a>
                <div
                    class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;">
                    <div class="col" style="margin-top: 11px;padding-left: 36px;">
                        <div class="btn-group" role="group"><button class="btn btn-success" type="button" style="font-size: 14px;">Room View</button><button class="btn btn-info" type="button" style="width: 106.656px;background-color: #83c592;border-color: #83c592;font-size: 14px;">User View</button></div>
                    </div>
            </div>
            <div class="row" style="margin-top: 21px;margin-left: 0px;margin-right: 0px;">
                <div class="col d-xl-flex justify-content-xl-center" style="margin-top: 11px;padding-left: 36px;">
                    <div role="tablist" id="accordion-1" style="width: 100%;">
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center mr-lg-auto align-items-xl-center mr-xl-auto mb-0"><a class="d-flex align-items-lg-center" data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-1" href="div#accordion-1 .item-1" style="font-size: 14px;width: 80%;">3rd Floor</a><button class="btn btn-primary d-xl-flex ml-auto ml-lg-auto ml-xl-auto"
                                        type="button" id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Room" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;width: 5%;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse show item-1" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-2" href="div#accordion-1 .item-2" style="font-size: 14px;width: 95%;">4th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="div#accordion-1 .item-3" style="font-size: 14px;width: 95%;">5th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-4" href="div#accordion-1 .item-4" style="font-size: 14px;width: 95%;">6th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-4" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-5" href="div#accordion-1 .item-5" style="font-size: 14px;width: 95%;">7th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-5" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-6" href="div#accordion-1 .item-6" style="font-size: 14px;width: 95%;">8th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-6" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-7" href="div#accordion-1 .item-7" style="font-size: 14px;width: 95%;">9th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-7" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-8" href="div#accordion-1 .item-8" style="font-size: 14px;width: 95%;">10th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-8" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-9" href="div#accordion-1 .item-9" style="font-size: 14px;width: 95%;">11th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-9" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" style="padding-top: 9px;padding-bottom: 9px;">
                                <h5 class="d-xl-flex flex-row align-items-xl-center mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-10" href="div#accordion-1 .item-10" style="font-size: 14px;width: 95%;">12th Floor</a><button class="btn btn-primary d-xl-flex ml-auto" type="button"
                                        id="room" style="padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;width: 16px;height: 16px;"
                                        title="Add Tenant" data-toggle="modal" data-target="#AddRoom"><i class="icon-plus" style="font-size: 16px;color: #555555;"></i>&nbsp;</button></h5>
                            </div>
                            <div class="collapse item-10" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 301</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Angela Santos</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Dave Fernandez</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Francis Gella</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Arvin Dela Cruz</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 302</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Raffy Torres</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alex Falcutila</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Ashley Diaz</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Janjan Medina</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" style="margin: 0px;">
                                                    <div class="col-xl-10" style="padding: 0px;">
                                                        <h6>Room 303</h6>
                                                    </div>
                                                    <div class="col-xl-2" style="padding: 0px;"><button class="btn btn-primary d-xl-flex ml-auto" type="button" id="user" style="padding-bottom: 0px;padding-top: 7px;padding-right: 0px;padding-left: 8px;line-height: 22px;font-size: 14px;border-radius: 100px;margin-top: 0px;background-color: none;border: none;"
                                                            title="Add Tenant" data-toggle="modal" data-target="#AddUser"><i class="fas fa-user-plus" style="font-size: 15px;color: #555555;"></i>&nbsp;</button></div>
                                                </div>
                                                <p class="card-text" style="font-weight: bold;font-size: 14px;">Tenants:</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Cathleen Bernabe</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Veronica Tungol</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Andrea Mateo</p>
                                                <p class="card-text" style="font-weight: normal;font-size: 14px;">Alwyn Santos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="AddUser">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Add Tenant</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <form>
                                <div class="form-row">
                                    <div class="col" style="padding-right: 20px;padding-left: 20px;">
                                        <h6 style="font-weight: bold;">Tenant Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                                <div class="col"><select class="form-control"><optgroup label="This is a group"><option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">First Name</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Last Name</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Birthday</label></div>
                                                <div class="col"><input class="form-control" type="date"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Contact No</label></div>
                                                <div class="col"><input class="form-control" type="number"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Course</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="padding-left: 20px;padding-right: 20px;">
                                        <h6 style="font-weight: bold;">Guardian Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Full Name</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Email</label></div>
                                                <div class="col"><input class="form-control" type="email"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label d-xl-flex" style="font-weight: normal;">Contact No</label></div>
                                                <div class="col"><input class="form-control" type="number"></div>
                                            </div>
                                        </div>
                                        <h6 style="font-weight: bold;">Move-in Information</h6>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Date of move-in</label></div>
                                                <div class="col"><input class="form-control" type="date"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Amount paid</label></div>
                                                <div class="col"><input class="form-control" type="text"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="AddRoom">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 58px;background-color: #bdedc1;">
                            <h4 class="modal-title" style="color: #11334f;">Add Room</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-4" style="font-weight: normal;"><label class="col-form-label" style="font-weight: normal;">Room No</label></div>
                                        <div class="col"><input class="form-control d-xl-flex" type="text" value="304" disabled=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Price</label></div>
                                        <div class="col"><input class="form-control" type="text" placeholder="Enter price of room"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-4"><label class="col-form-label" style="font-weight: normal;">Room Capacity</label></div>
                                        <div class="col"><input class="form-control" type="text" placeholder="Enter number of people"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="button" style="background-color: #bdedc1;color: #11334f;border: none;">Save</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/Sidebar-Menu.js"></script>
</body>

</html>