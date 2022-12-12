<?php

require_once './config/db.php';

// echo $_POST['update_customer'];

if (isset($_POST['update_customer'])) {


    $customer_id = $_POST['customer_id'];
    $fname =  $_POST["fname"];
    $lname =  $_POST["lname"];
    $email =  $_POST["email"];
    $phone =  $_POST["phone"];
    $house =  $_POST["house"];
    $city =  $_POST["city"];
    $street =  $_POST["street"];


    $stmt = $db->prepare("UPDATE `users` SET fname=?, lname=?, email=?, phone=?, house=?, city=?,street=? WHERE user_id=?");
    $stmt->bind_param("sssssssi", $fname, $lname, $email, $phone, $house, $city, $street, $customer_id);
    $stmt->execute();
    $stmt->close();
    header("location:/admin-customers");

    die();
}
