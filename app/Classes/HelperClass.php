<?php


namespace App\Classes;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HelperClass
{
    public $email;
    public $password;
    public $token;

    /**
     * Helper constructor.
     * @param $email
     * @param $password
     * @param $token
     */
    public function __construct($email,$password,$token)
    {
        $this->email = $email;
        $this->password = $password;
        $this->token = $token;
    }

    function get_Password()
    {
        return $this->password;
    }

    function get_email()
    {
        return $this->email;
    }

    public function checkTenantPassword($password)
    {
        if (Hash::check('tenant', $password)) {
            return true;
        } else {
            return false;
        }
    }
    public function returnPassword($password)
    {
        if ($this->checkTenantPassword($password)) {
            return 'tenant';
        }
    }
    public function isTenant(){
        if ($this->checkTenantPassword(Auth::user()->getAuthPassword())){
            return true;
        }else{
            return false;
        }
    }


}

