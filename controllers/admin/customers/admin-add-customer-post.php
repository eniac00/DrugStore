<?php

require_once './config/db.php';

if (isset($_POST['add_customer'])) {

    $fname =  $_POST["fname"];
    $lname =  $_POST["lname"];
    $password =  $_POST["password"];
    $email =  $_POST["email"];
    $phone =  $_POST["phone"];
    $house =  $_POST["house"];
    $city =  $_POST["city"];
    $phone =  $_POST["street"];


    if ($fname && $lname && $password && $email && $phone && $house && $city && $phone) {


        $stmt = $db->prepare("INSERT INTO `users` (`fname`, `lname`, `email`, `phone`, `password`, `house`, `city`, `street`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fname, $lname, $email, $phone, $password, $house, $city, $phone);
        $stmt->execute();

        $customer_id = $stmt->insert_id;

        $stmt->close();

        $stmt = $db->prepare("INSERT INTO `customers` (`customer_id`) VALUES (?)");
        $stmt->bind_param("i", $customer_id);
        $stmt->execute();
        $stmt->close();
    }

    header("location:/admin-customers");
    die();
}
