<?php

require_once './config/db.php';

if (isset($_POST['delete'])) {
    // $stmt = $db->prepare("DELETE FROM `customers` WHERE `customer_id`= ?");
    // $stmt->bind_param("i", $_POST['customer_id']);
    // $stmt->execute();
    // $stmt->close();

    // $stmt = $db->prepare("DELETE FROM `transactions` WHERE `customer_id`= ?");
    // $stmt->bind_param("i", $_POST['customer_id']);
    // $stmt->execute();
    // $stmt->close();

    $stmt = $db->prepare("DELETE FROM `users` WHERE `user_id`= ?");
    $stmt->bind_param("i", $_POST['user_id']);
    $stmt->execute();
    $stmt->close();
    header("location:/admin-customers");
}