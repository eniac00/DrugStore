<?php
require_once './config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $customer_id = $_POST['customer_id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $house = $_POST['house'];
  $city = $_POST['city'];
  $street = $_POST['street'];
  $password = $_POST['password'];


  if (!empty($fname)) {
    mysqli_query($db, "UPDATE `users` SET fname = '$fname' WHERE user_id = '$customer_id'");
  }

  if (!empty($lname)) {
    mysqli_query($db, "UPDATE `users` SET lname = '$lname' WHERE user_id = '$customer_id'");
  }

  if (!empty($password)) {
    mysqli_query($db, "UPDATE `users` SET `password` = '$password' WHERE user_id = '$customer_id'");
  }

  if (!empty($phone)) {
    mysqli_query($db, "UPDATE `users` SET phone = '$phone' WHERE user_id = '$customer_id'");
  }

  if (!empty($house)) {
    mysqli_query($db, "UPDATE `users` SET house = '$house' WHERE user_id = '$customer_id'");
  }
  if (!empty($city)) {
    mysqli_query($db, "UPDATE `users` SET city = '$city' WHERE user_id = '$customer_id'");
  }
  if (!empty($street)) {
    mysqli_query($db, "UPDATE `users` SET street = '$street' WHERE user_id = '$customer_id'");
  }
} else {
  echo "invalid entry";
}
header("Location:/customer-profile");
exit();
