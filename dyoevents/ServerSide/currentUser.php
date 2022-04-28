<?php

class currentUser
{
    public $userLogin;
    public $userPassword;

    public function __construct($login,$password)
    {
        $this->userLogin = $login;
        $this->userPassword = $password;

    }

    public function getUserLogin()
    {
        return $this->userLogin;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function logOut(){
        $this->userPassword = null;
        $this->userLogin = null;

    }

    public function checkIsUserLoggedIn(){
        if($this->userPassword != null && $this->userLogin != null ){
            return true;
        }
        return false;
    }

}