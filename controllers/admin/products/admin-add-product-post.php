<?php

require_once './config/db.php';

if (isset($_POST['add_product'])) {

    $product_name = $_POST['product_name'];
    $generic_name = $_POST['generic_name'];
    $company = $_POST['company'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $expiration_date = $_POST['expiration_date'];
    $file = $_FILES['product_img'];


    if ($product_name && $generic_name && $company && $product_desc && $price && $stock && $file && $expiration_date) {
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

        $stmt = $db->prepare("INSERT INTO `products` (product_name, generic_name, price, product_desc, expiration_date, company, stock, product_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsssis", $product_name, $generic_name, $price, $product_desc, $expiration_date, $company, $stock, $fileNameNew);
        $stmt->execute();
        $product_id = $stmt->insert_id;
        move_uploaded_file($fileTempName, $fileDest);
        if ($stmt->affected_rows === 0) {
            header("location:/admin-products?error=1");
            die();
        }

        $stmt->close();

        $stmt = $db->prepare("INSERT INTO `manages` (`admin_id`, `product_id`) VALUES (?, ?)");
        $stmt->bind_param("ii", $_SESSION['user_id'], $product_id);
        $stmt->execute();
        $stmt->close();

        header("location:/admin-products?success=1");

    } else {
        header("location:/admin-products?error=1");
        die();
    }
}
