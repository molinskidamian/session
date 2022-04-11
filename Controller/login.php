<?php
include_once './Controller/location.php';

if(!isset($_POST['login'])){
  include_once './Views/loginForm.php';
} else {
  echo '<p>Formularz został wysłany.</p>';
}