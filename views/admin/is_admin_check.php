<?php
if (!isset($_SESSION['is_admin'])) {
    header("location:/login");
    die();
}

if (!$_SESSION['is_admin']) {
    header("location:/");
    die();
}
