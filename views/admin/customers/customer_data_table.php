<?php
require_once './config/db.php';

$stmt = $db->prepare("SELECT * FROM `users` INNER JOIN `customers` ON `users`.`user_id`=`customers`.`customer_id`");
$stmt->execute();

$result = $stmt->get_result();
$stmt->close();

while($customer = $result->fetch_array(MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $customer['customer_id'] . "</td>";
    echo "<td>" . $customer['fname'] . "</td>";
    echo "<td>" . $customer['lname'] . "</td>";
    echo "<td>" . $customer['email'] . "</td>";
    echo "<td>" . $customer['phone'] . "</td>";
    echo "<td>" . $customer['house'] . "</td>";
    echo "<td>" . $customer['city'] . "</td>";
    echo "<td>" . $customer['street'] . "</td>";
    echo "<td><form action='/admin-delete-customer' method='post' style='display: inline-block;'><input type='hidden' name='product_id' value='".$customer['product_id']."'><button class='btn btn-danger' type='submit' name='delete'>Delete</button></form></td>";
    echo "</tr>";
}





