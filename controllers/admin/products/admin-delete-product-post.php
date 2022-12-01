<?php

require_once './config/db.php';

if (isset($_POST['delete'])) {
    $stmt = $db->prepare("DELETE FROM `products` WHERE `product_id`= ?");
    $stmt->bind_param("i", $_POST['product_id']);
    $stmt->execute();
    $stmt->close();
    header("location:/admin-products?delete=1");
}