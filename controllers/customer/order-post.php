<?php

require_once './config/db.php';

if (isset($_POST['order-submit'])) {
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $file = $_FILES['prescription'];

    if ($phone && $address && $file['name']) {

        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDest = './images/prescriptions/' . $fileNameNew;
            } else {
                header("location:/order");
                die();
            }
        } else {
            header("location:/order");
            die();
        }

        $stmt = $db->prepare("INSERT INTO `orders` (`customer_id`, `delivery_address`, `delivery_phone`, `grand_total`, `prescription_id`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issds", $_SESSION['user_id'], $address, $phone, $_SESSION['total'], $fileNameNew);
        $stmt->execute();
        $order_id = $stmt->insert_id;
        move_uploaded_file($fileTempName, $fileDest);
        $stmt->close();

        $stmt = $db->prepare("INSERT INTO `contains` (`order_id`, `product_id`, `quantity`) VALUES (?, ?, ?)");

        foreach ($_SESSION['cart'] as $key => $product) {
            $stmt->bind_param("iii", $order_id, $product['id'], $product['quantity']);
            $stmt->execute();
        }

        $stmt->close();

        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        header("location:/customer-orders");
        $_SESSION['order-success'] = 1;
    }

    if ($phone && $address && !$file['name']) {
        $stmt = $db->prepare("INSERT INTO `orders` (`customer_id`, `delivery_address`, `delivery_phone`, `grand_total`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issd", $_SESSION['user_id'], $address, $phone, $_SESSION['total']);
        $stmt->execute();

        $order_id = $stmt->insert_id;
        $stmt->close();

        $stmt = $db->prepare("INSERT INTO `contains` (`order_id`, `product_id`, `quantity`) VALUES (?, ?, ?)");

        foreach ($_SESSION['cart'] as $key => $product) {
            $stmt->bind_param("iii", $order_id, $product['id'], $product['quantity']);
            $stmt->execute();
        }

        $stmt->close();

        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        header("location:/customer-orders");
        $_SESSION['order-success'] = 1;
    }
} else {
    header("location:/404");
    die();
}
