<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="stylesheet" href="./layout/standard/css/style.css">
</head>
<body>
  <header>
      <ul class="main-nav">
    <li>
      <a href="index.php?page=start">Strona główna</a>
    </li>
    <li>
      <a href="index.php?page=contact">Kontakt</a>
    </li>
  </ul>

  <ul class="main-user-menu">
    <li>
      <a href="index.php?page=register">Rejestracja</a>
    </li>
    <li>
      <a href="index.php?page=login">Logowanie</a>
    </li>
  </ul>
  </header>