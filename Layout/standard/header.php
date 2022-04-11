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
    <li class="main-nav--point">
      <a class="main-nav--link" href="index.php?page=start">Strona główna</a>
    </li>
     <li class="main-nav--point">
      <a class="main-nav--link" href="index.php?page=gallery">Galeria</a>
    </li>
    <li class="main-nav--point">
      <a class="main-nav--link" href="index.php?page=contact">Kontakt</a>
    </li>
  </ul>

  <?php include_once './Controller/userMenu.php'; ?>

  </header>
  <div class="wrapper">