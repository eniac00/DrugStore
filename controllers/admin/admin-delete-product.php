<?php

require_once './config/db.php';


if (isset($_GET['delete'])) {
    $stmt = $db->prepare("DELETE FROM `products` WHERE `product_id`= ?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    $stmt->close();
    header("location:/admin-products");
}