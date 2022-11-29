<?php
require_once './config/db.php';

$stmt = $db->prepare("SELECT * from `products`");
//$stmt->bind_param();
$stmt->execute();

$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();


if (count($result)>0) {
    for($i=0; $i<count($result); $i++) {
        $curr = $result[$i];
        echo "<tr>";
        echo "<td>".$curr['product_id']."</td>";
        echo "<td>".$curr['product_name']."</td>";
        echo "<td>".$curr['product_desc']."</td>";
        echo "<td>".$curr['price']."</td>";
        echo "<td>".$curr['stock']."</td>";
        echo "<td>".$curr['company']."</td>";
        echo "<td><img src='./images/products/".$curr['product_image']."' height=100 width=100></td>";
        echo "<td><a href='/admin-products?update=".$curr['product_id']."' class='btn btn-success me-2'>update</a>";
        echo "<a href='/admin-products?delete=".$curr['product_id']."' class='btn btn-danger' role='button' type='button'>Delete</a>";
        echo "</tr>";
    }
}


