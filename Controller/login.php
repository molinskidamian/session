<?php
include_once './Controller/location.php';
// include_once './class/User.class.php';

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
    echo '<p>Login: '.$user->getLogin().'</p>';
    echo '<p>Password: '.$user->getPassword().'</p>';
    $user->setSession();
    echo '<p>Session Login: '.$user->getSessionLogin().'</p>';
    echo '<p>Session Password: '.$user->getSessionPassword().'</p>';
    var_dump($_SESSION);
    print_r($_SESSION);

    if(isset($_SESSION['login'])){
      echo '<p>Uytkownik jest zalogowany jako '.$user->getSessionLogin().'</p>';
      echo '<p>Ale pamietaj! zawsze mozesz sie <a href="index?page=logout">wylogowac</a>!</p>';
    }
}