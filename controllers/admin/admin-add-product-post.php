<?php

require_once './config/db.php';

if (isset($_POST['add_product'])) {

    $product_name = $_POST['product_name'];
    $gen_name = $_POST['gen_name'];
    $company = $_POST['company'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $file = $_FILES['product_image'];


    if ($product_name && $gen_name && $company && $product_desc && $price && $stock && $file) {
        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        // $fileType = $file['type'];
        $fileExt = explode('.', $fileName);

        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDest = './images/products/' . $fileNameNew;
            } else {
                header("location:/admin-products?error=1");
                die();
            }
        } else {
            header("location:/admin-products?error=1");
            die();
        }

        $stmt = $db->prepare("INSERT INTO `products` (product_name, product_desc, price, stock, company, gen_name, product_image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdisss", $product_name, $product_desc, $price, $stock, $company, $gen_name, $fileNameNew);
        $stmt->execute();
        move_uploaded_file($fileTempName, $fileDest);
        if ($stmt->affected_rows === 0) {
            header("location:/admin-products?error=1");
            die();
        }
        $stmt->close();
        header("location:/admin-products?success=1");
    } else {
        header("location:/admin-products?error=1");
        die();
    }
}
