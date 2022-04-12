<?php

class Session {

    private $login;
    private $password;

    public function setLogin($login){
        $this->login = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
    }

    public function setPassword($password){
        $this->password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    }

    public function getLogin(){
        return $this->login;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setSession(){
        $_SESSION['login'] = $this->login;
        $_SESSION['password'] = $this->password;
    }

        public function getSessionLogin(){
        return $_SESSION['login'];
    }

    public function getSessionPassword(){
        return $_SESSION['password'];
    }
}