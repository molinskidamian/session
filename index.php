  <?php
require_once './config.cfg.php';


if(isset($_GET['page'])){
  switch ($_GET['page']) {
    case 'start':
      $pageTitle = 'Strona główna';
      $pageDescription = 'Opis - '.$pageTitle;
      $url = './Controller/start.php';
      break;
    case 'gallery':
      $pageTitle = 'Galeria';
      $pageDescription = 'Opis - '.$pageTitle;
      $url = './Controller/gallery.php';
      break;
    case 'login':
      $pageTitle = 'Strona logowania';
      $pageDescription = 'Opis - '.$pageTitle;
      $url = './Controller/login.php';
      break;
    case 'logout':
      $pageTitle = 'Strona wylogowywania';
      $pageDescription = 'Opis - '.$pageTitle;
      $url = './Controller/logout.php';
      break;
    case 'register':
      $pageTitle = 'Strona rejestyracji użytkownika';
      $pageDescription = 'Opis - '.$pageTitle;
      $url = './Controller/register.php';
      break;
    case 'contact':
      $pageTitle = 'Strona kontaktowa';
      $pageDescription = 'Opis - '.$pageTitle;
      $url = './Controller/contact.php';
      break;

    default:
      $pageTitle = 'Strona główna - default';
      $pageDescription = 'Opis - '.$pageTitle;
      $url = './Controller/start.php';
      break;
  }
} else {
  $pageTitle = 'Strona główna - default';
  $pageDescription = 'Opis - '.$pageTitle;
  $url = './Controller/start.php';
}

include_once './Layout/standard/header.php';
include_once $url;
include_once './Layout/standard/footer.php';

  ?>
