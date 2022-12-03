<?php
if (!isset($_SESSION['user_id']) || !isset($_SESSION['name'])) {
    header("location:/login");
    die();
}
