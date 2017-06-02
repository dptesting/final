<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserClass
 */
class User {

    public $memberid;
    public $username;
    public $password;
    public $email;
    public $roleid;

    public function __construct($inMemberid = null, $inUsername = null, $inPassword = "", $inEmail = null, $inRoleid = null) {
        $this->memberid = $inMemberid;
        $this->username = $inUsername;
        $this->password = $inPassword;
        $this->email = $inEmail;
        $this->roleid = $inRoleid;
    }

}
