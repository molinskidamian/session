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
    self::userIsset();
    // self::addUserToDb();

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
      require './connect.db.php';
      $sql = 'INSERT INTO Users SET
        firstName = :firstName,
        lastName = :lastName,
        email = :email,
        password = :password,
        date = CURDATE()
        ';
      $s = $pdo->prepare($sql);
      $s->bindValue(':firstName', $_POST['firstName'], PDO::PARAM_STR);
      $s->bindValue(':lastName', $_POST['lastName'], PDO::PARAM_STR);
      $s->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
      $s->bindValue(':password', SHA1($_POST['password1']), PDO::PARAM_STR);
      $s->execute();
    } catch (PDOException $e) {
    echo '<p>'.$e->getMessage().' '.$e->getLine().'</p>';

    exit();
    }
  }

  private function userIsset(){
    require_once './connect.db.php';
    try {

      $sql = 'SELECT COUNT(email) FROM Users WHERE email = :email';
      $s = $pdo->prepare($sql);
      $s->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
      $s->execute();
      $result = $s->fetchAll();
      // var_dump($result);
      print_r($result);

      foreach ($result as $row) {
      $users[] = array(
      'id' => $row['id'],
      'email' => $row['email']
      );
        if($result['email'] != 0){
          echo '<p style="color: red;">takie konto już istnieje</p>';
        } else {
          echo '<p style="color: green;">Takiego konta jeszcze nie ma</p>';
        }
        // print_r(count($result));
      }
    } catch (PDOException $e){
        $errorMsg = $e->getMessage() . '<br>' . $e->getLine();
        echo '<p>'.$errorMsg.'</p>';
        exit();
      }
  }
}