<?php

 class User {
   private $logn;
   private $password;


   public function __constructor($login, $password) {
    $this->login = $login;
    $this->password = $password;
   }
 }

 $user1 = new User();