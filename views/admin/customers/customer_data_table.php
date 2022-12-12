<?php
require_once './config/db.php';

$stmt = $db->prepare("select * from users, customers where users.user_id = customers.customer_id");
$stmt->execute();

$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();


if (count($result) > 0) {
    for ($i = 0; $i < count($result); $i++) {
        $curr = $result[$i];
        echo "<tr id='" . $curr['user_id'] . "'>";
        echo "<td>" . $curr['user_id'] . "</td>";
        echo "<td>" . $curr['fname'] . "</td>";
        echo "<td>" . $curr['lname'] . "</td>";
        echo "<td>" . $curr['email'] . "</td>";
        echo "<td>" . $curr['phone'] . "</td>";
        echo "<td>" . $curr['house'] . "</td>";
        echo "<td>" . $curr['city'] . "</td>";
        echo "<td>" . $curr['street'] . "</td>";
        echo "<td>";
        echo "<button class='btn btn-primary' onclick='update(" . $curr['user_id'] . ")' style='margin: 10px;'>Update</button>";
        echo "<form action='/admin-delete-customer' method='post' style='display: inline-block;'><input type='hidden' name='user_id' value='" . $curr['customer_id'] . "'><button class='btn btn-danger' type='submit' name='delete'>Delete</button></form>";
        echo "</td>";
        echo "</tr>";
    }
}
