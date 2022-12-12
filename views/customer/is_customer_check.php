<?php
if (isset($_SESSION['is_admin']) && $$_SESSION['is_admin']) {
    header("location:/404");
    die();
}

if (!isset($_SESSION['user_id']) || !isset($_SESSION['name'])) {
    header("location:/login");
    die();
}
