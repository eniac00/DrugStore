<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'bismillah');
define('DATABASE', 'quickmeds');

$db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$db) {
    echo "db not connected";
}

?>
