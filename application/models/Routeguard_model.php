<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routeguard_model extends CI_Model {

    public function view_ann() {

        $aann = $this->session->userdata['login_success']['info']['adcontrol_ann'];

        if ($aann[0] == 0) {
            redirect('Home');
        }

    }

    public function index_dir() {

        $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];

        if ($adir[0] == 0 && $adir[1] == 0 && $adir[2] == 0 && $adir[3] == 0) {
            redirect('Home');
        }

    }

    public function view_tenant() {

        $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];

        if ($adir[3] == 0) {
            redirect('Home');
        }

    }

    public function view_room() {

        $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];

        if ($adir[4] == 0 && $adir[5] == 0 && $adir[6] == 0 && $adir[7] == 0) {
            redirect('Home');
        }

    }

    public function view_admin() {

        $adir = $this->session->userdata['login_success']['info']['adcontrol_dir'];

        if ($adir[8] == 0 && $adir[9] == 0 && $adir[10] == 0 && $adir[11] == 0) {
            redirect('Home');
        }

    }

    public function update_bills() {

        $abills = $this->session->userdata['login_success']['info']['adcontrol_bills'];

        if ($abills[0] == 0) {
            redirect('Home');
        }

    }

    public function payments() {

        $abills = $this->session->userdata['login_success']['info']['adcontrol_bills'];

        if ($abills[2] == 0) {
            redirect('Home');
        }

    }

    public function view_transactions() {

        $abills = $this->session->userdata['login_success']['info']['adcontrol_bills'];

        if ($abills[4] == 0) {
            redirect('Home');
        }

    }

    public function view_msgs() {

        $amsg = $this->session->userdata['login_success']['info']['adcontrol_msg'];

        if ($amsg[0] == 0) {
            redirect('Home');
        }

    }

    public function view_reqs() {

        $amsg = $this->session->userdata['login_success']['info']['adcontrol_msg'];

        if ($amsg[6] == 0) {
            redirect('Home');
        }

    }

    public function view_vlogs() {

        $alogs = $this->session->userdata['login_success']['info']['adcontrol_logs'];

        if ($alogs[0] == 0) {
            redirect('Home');
        }

    }

}