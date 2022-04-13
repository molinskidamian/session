


<?php

include './Controller/location.php';

    try {
        include './connect.db.php';
        $sql = 'CREATE TABLE IF NOT EXISTS Users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            firstName VARCHAR(100),
            lastName VARCHAR(100),
            login VARCHAR(100),
            password VARCHAR(100),
            date DATE NOT NULL
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ENGINE=InnoDB';
        $pdo->exec($sql);
    } catch (PDOException $e) {
        echo '<p>'.$e->getMessage() . '<br>' . $e->getline().'</p>';
        exit();
    }
    echo 'Dodano tabelę Users do bazy danych.';

    try {
        $sql = 'INSERT INTO Users SET
            firstName = :firstName,
            lastName = :lastName,
            login = :login,
            password = :password,
            date = CURDATE()
        ';
        $s = $pdo->prepare($sql);
        $s->bindValue('firstName', 'Caleigh');
        $s->bindValue('lastName', 'Beer');
        $s->bindValue('login', 'Jerry.Kassulke');
        $s->bindValue('password', 'rTm4azhTketMeQ4');
        $s->execute();
    } catch (PDOException $e) {
    $errorMsg = $e->getMessage().' '.$e->getLine();
    include 'error.html.php';
    exit();
    }

    echo '<p class="success">Dodano użytkownika.</p>';

?>