<?php
include_once './Controller/location.php';

if(!isset($_POST['sub-login'])){
   if(isset($_SESSION['login'])){
     echo '<h3>Jestes juz zalogowany!</h3>';
     echo '<p>'.$_SESSION['login'].'</p>';
   } else {

     include_once './Views/loginForm.php';
   }
} else {
  echo '<p>Formularz został wysłany.</p>';
    $user = new User;
    $user->setLogin($_POST['login']);
    $user->setPassword($_POST['password']);
    $user->fintUserInDb();
    $user->setSession();
    header("Refresh:0");
}