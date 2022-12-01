<?php

require_once './config/db.php';

if (isset($_POST['update_product'])) {

    $product_id = $_POST['product_id'];

    $product_name = $_POST['product_name'];
    $generic_name = $_POST['generic_name'];
    $company = $_POST['company'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $expiration_date = $_POST['expiration_date'];
    // $file = $_FILES['product_img'];


    $stmt = $db->prepare("UPDATE `products` SET product_name=?, generic_name=?, price=?, product_desc=?, expiration_date=?, company=?, stock=? WHERE product_id=?");
    $stmt->bind_param("ssdsssii", $product_name, $generic_name, $price, $product_desc, $expiration_date, $company, $stock, $product_id);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {
        header("location:/admin-products?error=1");
        die();
    }

    $stmt->close();
    header("location:/admin-products?update=1");
}
