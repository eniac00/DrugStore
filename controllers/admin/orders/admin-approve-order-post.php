<?php

require './config/db.php';


if (isset($_POST['approve'])) {

    $stmt = $db->prepare("SELECT `products`.`product_name`, `contains`.`quantity`, `products`.`stock`, `products`.`product_id`, `products`.`product_name` FROM `contains` INNER JOIN `products` ON `contains`.`product_id` = `products`.`product_id` AND `contains`.`order_id` = ?");
    $stmt->bind_param("i", $_POST['order_id']);
    $stmt->execute();
    $products = $stmt->get_result();
    $stmt->close();

    while ($product = $products->fetch_array(MYSQLI_ASSOC)) {
        if ($product['quantity'] > $product['stock']) {
            header("location:/admin-orders?stockout=1&product_id='{$product['product_id']}'&product_name='{$product['product_name']}'");
            die();
        }
    }


    $stmt = $db->prepare("SELECT `product_id`, `quantity` FROM `contains` WHERE `order_id` = ?");
    $stmt->bind_param("i", $_POST['order_id']);
    $stmt->execute();
    $products = $stmt->get_result();
    $stmt->close();

    $stmt = $db->prepare("UPDATE `products` SET `stock` = `stock` - ? WHERE `product_id` = ?");

    while ($product = $products->fetch_array(MYSQLI_ASSOC)) {
        $stmt->bind_param("ii", $product['quantity'], $product['product_id']);
        $stmt->execute();
    }

    $stmt->close();

    $stmt = $db->prepare("INSERT INTO `approves` VALUES (?, ?)");
    $stmt->bind_param("ii", $_SESSION['user_id'], $_POST['order_id']);
    $stmt->execute();
    $stmt->close();
    header("location:/admin-orders");
    die();
}
