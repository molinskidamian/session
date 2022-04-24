<?php

class Register {
  private $email;
  private $password1;
  private $password2;
  private $firstName;
  private $lastName;
  private $fieldsCompleted;
  private $userInDb;

  public function __construct($email, $password1, $password2){
    $this->email = $email;
    $this->password1 = $password1;
    $this->password2 = $password2;

    self::checkFields();

    if( $this->fieldsCompleted === true ){

      self::saveUserInDb();
    } else {
      echo '<p style="color: red"><strong>__constructor: </strong>Wystąpił błąd.</p>';
    }
  }

  private function passwordsTheSame(){
    if($this->password1 === $this->password2){
      return true;
    } else {
      return false;
    }
  }

  private function passwordLength(){
    return strlen($this->password1);
  }

  private function checkFields(){
    if(empty($this->email) && empty($this->password1) && empty($this->password2)){
      echo '<p style="color: red;"><strong>fieldsCompleted: </strong>Wszystkie pola nie zostały uzupełnione.</p>';
      $this->fieldsCompleted = false;
    } else {
      if(self::passwordsTheSame() === true){
        if(self::passwordLength() >= 6){
          $this->fieldsCompleted = true;
        } else {
          echo '<p><strong>passwordsTheSame(): </strong>Hasło jest zbyt krótkie</p>';
        }
      } else {
        echo '<p style="color: red">Hasła różnią się od siebie.</p>';
      }
    }
  }

  private function checkIssetInDb(){
    /* Stwórz metodę sprawdzającą, czy taki użytkownik istnieje w db. Jeśli nie to - $this->userInDb = false. Pamiętaj aby dodać ten warunke do metody saveUserInDb() */


    /** Wykorzystaj może ANY */
    try {
      include './connect.db.php';
      $sql = 'SELECT email FROM Users WHERE email = :email';
      $s = $pdo->prepare($sql);
      $s->bindValue(':email', $this->email);
    } catch (PDOException $e){
      $errorMsg = $e->getMessage() . '<br>' . $e->getLine();
      include 'error.html.php';
      exit();
    }

    foreach ($result as $row) {
      $users[] = array(
      'id' => $row['id'],
      'name' => $row['name']
    );
    }
  }

  private function saveUserInDb(){
    echo '<p style="color: green"><strong>saveUserInDb: </strong>Zapisuję użytkownika w bazie danych.</p>';

    try {
      include './connect.db.php';
      $sql = 'INSERT INTO Users SET
        firstName = :firstName,
        lastName = :lastName,
        email = :email,
        password = :password,
        date = CURDATE()
        ';
      $s = $pdo->prepare($sql);
      $s->bindValue('firstName', $_POST['firstName']);
      $s->bindValue('lastName', $_POST['lastName']);
      $s->bindValue('email', $_POST['email']);
      $s->bindValue('password', $_POST['password1']);
      $s->execute();
    } catch (PDOException $e) {
    echo '<p style="color: green;">'.$e->getMessage().' '.$e->getLine().'</p>';
    exit();
    }
  }
}