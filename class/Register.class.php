<?php

class Register {
  private $email;
  private $password1;
  private $password2;
  private $passwordsTheSame;
  private $fieldsEmpty;
  private $userIsset;

  public function __construct($email, $password1, $password2){
    $this->email = $email;
    $this->password1 = $password1;
    $this->password2 = $password2;
    self::checkTheSamePasswords();
    self::fieldsEmpty();

    if($this->passwordsTheSame === true && $this->fieldsEmpty === true){
      self::createAccount();
      // var_dump($this->passwordsTheSame);
      // var_dump($this->fieldsEmpty);
    } else {
      // var_dump($this->passwordsTheSame);
      // var_dump($this->fieldsEmpty);
      // echo '<p>Coś nie tak</p>';
      self::showRegisterForm();
    }

  }

  private function checkTheSamePasswords() {
    if($this->password1 === $this->password2 && !empty($this->password1) && !empty($this->password2)){
      echo '<p style="color: green;">Hasła są takie same.</p>';
      return $this->passwordsTheSame = true;
    } else {
        if(empty($this->email) || empty($this->password1) || empty($this->password2)){
          return '<p>Pola są puste</p>';
        }
        echo '<p style="color: red;">Hasła różnią się od siebie.</p>';
        self::showRegisterForm();
        return $this->passwordsTheSame = false;
    }
  }

  private function fieldsEmpty(){
    if(empty($this->email) || empty($this->password1) || empty($this->password2)){
      echo '<p style="color: red;">Wszystkie pola muszą być uzupełnione.</p>';
      self::showRegisterForm();
      return $this->fieldsEmpty = false;
    } else {
      if($this->password1 !== $this->password2){
        return $this->fieldsEmpty = false;
      } else {
        echo '<p style="color: green;">Wszystkie pola są uzupełnione.</p>';
        return $this->fieldsEmpty = true;
      }

    }
  }

  private function createAccount(){
    echo '<p style="color: green;"><strong>Success!</strong> Zakładam konto!</p>';
  }

  private function showRegisterForm(){
    include_once './Views/registerForm.php';
  }

  private function addUserToDb(){
    try {
      require_once './connect.db.php';
      $sql = 'INSERT INTO Users SET
        firstName = :firstName,
        lastName = :lastName,
        email = :email,
        password = :password,
        date = CURDATE()
        ';
      $s = $pdo->prepare($sql);
      $s->bindValue(':firstName', $_POST['firstName']);
      $s->bindValue(':lastName', $_POST['lastName']);
      $s->bindValue(':email', $_POST['email']);
      $s->bindValue(':password', $_POST['password1']);
      $s->execute();
    } catch (PDOException $e) {
    $errorMsg = $e->getMessage().' '.$e->getLine();
    include 'error.html.php';
    exit();
    }
  }

  private function userIsset(){
    try {
      require_once './connect.db.php';
      $sql = 'SELECT email FROM Users WHERE email = :email';
      $s = $pdo->query($sql);
      $s->bindValue(':email', $_POST['email']);
      $result = $s->execute();
      if(array_sum($result) != 0){
        echo '<p>Konto już istnieje</p>';

        return $this->userIsset = false;
      }
    } catch (PDOException $e){
      $errorMsg = $e->getMessage() . '<br>' . $e->getLine();
      echo '<p>'.$errorMsg.'</p>';
      exit();
    }

  }
}