
<?php
  if(!isset($_SESSION['login'])){
?>
    <ul class="main-user-menu">
      <li>
        <a href="index.php?page=register">Rejestracja</a>
      </li>
      <li>
        <a href="index.php?page=login">Logowanie</a>
      </li>
    </ul>
<?php
} else {
  ?>
  <ul class="main-user-menu">
      <li>
        <!-- <p>Jestes zalogowany jako <?php // echo $user->getLogin(); ?></p> -->
        <p>Jestes zalogowany jako <?php echo $_SESSION['login']; ?></p>
      </li>
      <li>
        <a href="index.php?page=logout">Wyloguj sie</a>
      </li>
    </ul>
    <?php
}