<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syslogs_model extends CI_Model {

    public function login() {

        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $path = "./logs/Login/";

        if (!is_dir("logs/Login/")) {

            mkdir($path, 0777, true);
            
        }

        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $sysdate = date("Y-m-d h:i:s");
        $msg = "logged on to the system.";

        $log = $sysdate." -- ". $email . " " . $msg.PHP_EOL;
        file_put_contents($path.$date.'-login.txt', $log, FILE_APPEND); 

    }

    public function logout() {

        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $path = "./logs/Logout/";

        if (!is_dir("logs/Logout/")) {

            mkdir($path, 0777, true);
            
        }

        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $sysdate = date("Y-m-d h:i:s");
        $msg = "logged out of the system.";

        $log = $sysdate." -- ". $email . " " . $msg.PHP_EOL;
        file_put_contents($path.$date.'-logout.txt', $log, FILE_APPEND); 

    }

    public function add_tenant() {

        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $path = "./logs/Directories/";

        if (!is_dir("logs/Directories/")) {

            mkdir($path, 0777, true);
            
        }

        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $sysdate = date("Y-m-d h:i:s");
        $msg = "added a tenant";

        $log = $sysdate." -- ". $email . " " . $msg.PHP_EOL;
        file_put_contents($path.$date.'-directories.txt', $log, FILE_APPEND); 

    }

    public function edit_tenant() {

        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $path = "./logs/Directories/";

        if (!is_dir("logs/Directories/")) {

            mkdir($path, 0777, true);
            
        }

        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $sysdate = date("Y-m-d h:i:s");
        $msg = "edited a tenant's information";

        $log = $sysdate." -- ". $email . " " . $msg.PHP_EOL;
        file_put_contents($path.$date.'-directories.txt', $log, FILE_APPEND); 

    }

    public function move_tenant() {

        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $path = "./logs/Directories/";

        if (!is_dir("logs/Directories/")) {

            mkdir($path, 0777, true);
            
        }

        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $sysdate = date("Y-m-d h:i:s");
        $msg = "moved a tenant to another room";

        $log = $sysdate." -- ". $email . " " . $msg.PHP_EOL;
        file_put_contents($path.$date.'-directories.txt', $log, FILE_APPEND); 

    }

    public function changecontract_tenant() {

        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $path = "./logs/Directories/";

        if (!is_dir("logs/Directories/")) {

            mkdir($path, 0777, true);
            
        }

        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $sysdate = date("Y-m-d h:i:s");
        $msg = "changed the contract of a tenant";

        $log = $sysdate." -- ". $email . " " . $msg.PHP_EOL;
        file_put_contents($path.$date.'-directories.txt', $log, FILE_APPEND); 

    }

    public function resetpass_tenant() {

        date_default_timezone_set('Asia/Manila');
        $date = date("m-d-Y");
        $path = "./logs/Directories/";

        if (!is_dir("logs/Directories/")) {

            mkdir($path, 0777, true);
            
        }

        $email = $this->session->userdata['login_success']['info']['admin_email'];
        $sysdate = date("Y-m-d h:i:s");
        $msg = "reset a password of a tenant";

        $log = $sysdate." -- ". $email . " " . $msg.PHP_EOL;
        file_put_contents($path.$date.'-directories.txt', $log, FILE_APPEND); 

    }

}