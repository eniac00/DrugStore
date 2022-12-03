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
        echo "<tr id='".$curr['product_id']."'>";
        echo "<td>".$curr['product_id']."</td>";
        echo "<td>".$curr['product_name']."</td>";
        echo "<td>".$curr['generic_name']."</td>";
        echo "<td class='text-truncate'>".$curr['product_desc']."</td>";
        echo "<td>".$curr['price']."</td>";
        echo "<td>".$curr['stock']."</td>";
        echo "<td>".$curr['expiration_date']."</td>";
        echo "<td>".$curr['company']."</td>";
        echo "<td><img src='./images/products/".$curr['product_img']."' height=80 width=100></td>";
        echo "<td>";
        echo "<button class='btn btn-primary' onclick='update(".$curr['product_id'].")' style='margin: 10px;'>Update</button>";
        echo "<form action='/admin-delete-product' method='post' style='display: inline-block;'><input type='hidden' name='product_id' value='".$curr['product_id']."'><button class='btn btn-danger' type='submit' name='delete'>Delete</button></form>";
        echo "</td>";
        echo "</tr>";
    }
}


