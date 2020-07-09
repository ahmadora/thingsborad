<?php

use Illuminate\Support\Facades\Hash;

class Helper
{
    public $name;
    public $color;

    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    function get_Password()
    {
        return $this->password;
    }

    function get_email()
    {
        return $this->email;
    }

    public function checkAdminPassword($password)
    {
        if (Hash::check('sysadmin', $password)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkTenantPassword($password)
    {
        if (Hash::check('tenant', $password)) {
            return false;
        } else {
            return true;
        }
    }

    public function returnPassword($password)
    {
        if (checkAdminPassword('sysadmin', $password)) {
            return 'sysadmin';
        } else {
            if (!checkTenantPassword('tenant', $password)) {
                return 'tenant';
            }
        }
    }
}
