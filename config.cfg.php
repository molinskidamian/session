<?php
session_start();
ob_start();

function my_autoloader($className) {
    include 'class/' . $className . '.class.php';
};
spl_autoload_register('my_autoloader');

//  path to save images
define('UPLOAD_FILES', 'images/');

?>