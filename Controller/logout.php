<?php

if(isset($_SESSION['login'])){
  $_SESSION = array();
  session_destroy();
}

// $homeUrl = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
// $homeUrl = 'index.php';
$homeUrl = './index.php?page=start';
header('Location: ' . $homeUrl);