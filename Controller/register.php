<?php
  include_once './Controller/location.php';

  if(!isset($_SESSION['id'])){
    // if NOT login
    if(isset($_POST['sub-register'])){
      echo '<p>Wysyłam formularz rejestracyjnydo sprawdzenia.</p>';
      $user = new Register($_POST['email'], $_POST['password1'], $_POST['password2']);
      return true;
    }
    include_once './Views/registerForm.php';
  } else {
    echo '<p>Masz już konto</p>';
  }
?>