<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'bismillah');
define('DATABASE', 'drugstore');

$db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$db) {
    echo "db not connected";
}

?>
