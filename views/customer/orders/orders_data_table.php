<?php

require_once './config/db.php';



$stmt = $db->prepare("SELECT `order_id`, `order_date`, `grand_total` FROM `orders` WHERE `customer_id`=?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$stmt = $db->prepare("WITH jt AS (SELECT approves.order_id, transactions.transaction_id FROM approves LEFT JOIN transactions ON approves.order_id=transactions.order_id) SELECT * FROM jt WHERE order_id=?");

foreach ($result as $key => $value) {
    echo "<tr>";
    echo "<td class='text-center'>" . $value['order_id'] . "</td>";
    echo "<td class='text-center'>" . $value['order_date'] . "</td>";
    echo "<td class='text-center'>" . $value['grand_total'] . "</td>";
    echo "<td class='text-center'><button class='btn btn-primary' onclick='view(".$value['order_id'].")'>View</button></td>";

    $stmt->bind_param("i", $value['order_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<td class='text-center'>";
    if ($result->num_rows === 1) {
        if ($result->fetch_array(MYSQLI_ASSOC)['transaction_id'] != NULL) {
            echo "<button href='#' class='btn btn-success disabled' role='button' aria-disabled='true'>Paid</button>";
        } else {

            echo "<form action='/checkout' method='get' style='display: inline-block;'><input type='hidden' name='order_id' value='" . $value['order_id'] . "'><button class='btn btn-success' type='submit'>Pay</button></form>";
        }
    } else {
        echo "<button href='#' class='btn btn-danger disabled' role='button' aria-disabled='true'>Not Approved</button>";
    }

    echo "</td>";
    echo "</tr>";
}

$stmt->close();
