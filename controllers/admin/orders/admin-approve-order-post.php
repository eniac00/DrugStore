<?php

require './config/db.php';


if (isset($_POST['approve'])) {
    $stmt = $db->prepare("INSERT INTO `approves` VALUES (?, ?)");
    $stmt->bind_param("ii", $_SESSION['user_id'], $_POST['order_id']);
    $stmt->execute();
    $stmt->close();
    header("location:/admin-orders");
}
