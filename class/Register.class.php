<?php

class Register {
  private $email;
  private $password1;
  private $password2;
  private $passwordsTheSame;
  private $fieldsEmpty;

  public function __construct($email, $password1, $password2){
    $this->email = $email;
    $this->password1 = $password1;
    $this->password2 = $password2;
    self::checkTheSamePasswords();
    self::fieldsEmpty();

    if($this->passwordsTheSame === true && $this->fieldsEmpty === true){
      self::createAccount();
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
        return $this->passwordsTheSame = false;
    }
  }

  private function fieldsEmpty(){
    if(empty($this->email) || empty($this->password1) || empty($this->password2)){
      echo '<p style="color: red;">Wszystkie pola muszą być uzupełnione.</p>';
      return $this->fieldsEmpty = false;
    } else {
      echo '<p style="color: green;">Wszystkie pola są uzupełnione.</p>';
      return $this->fieldsEmpty = false;
    }
  }

  private function createAccount(){
    return '<p style="color: green;"><strong>Success!</strong> Zakładam konto!</p>';
  }
}