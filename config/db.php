<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'password');
define('DATABASE', 'drugstore');

$db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$db) {
    echo "db not connected";
}

?>
