<?php

require_once "./config/db.php";


if (isset($_GET['update'])) {
    $stmt = $db->prepare("SELECT * from `products` WHERE `product_id` = ?");
    $stmt->bind_param('i', $_GET['update']);
    $stmt->execute();
    $result = $stmt->fetch();
    echo $result['product_name'];
    $stmt->close();
}
