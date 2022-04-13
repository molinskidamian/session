<?php
try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';port='.DB_PORT.';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    //  test: to delete
    echo '<p style="color: red;">Nie można nawiązać połączenia z bazą danych.<br>' . $e->getMessage() . '<br>' . $e->getLine(). '</p>';
    exit();
}

echo '<p style="color: green;">Połączono z bazą danych.</p>';