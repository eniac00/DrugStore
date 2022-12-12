<?php

require_once './config/db.php';

$stmt = $db->prepare("select * from orders");
$stmt->execute();

$result = $stmt->get_result();
$stmt->close();

while ($orders = $result->fetch_array(MYSQLI_ASSOC)) {
?>
    <tr>
        <td> <?php echo $orders['order_id']; ?> </td>
        <td> <?php echo $orders['customer_id']; ?> </td>
        <td> <?php echo $orders['order_date']; ?> </td>
        <td> <?php echo $orders['delivery_address']; ?> </td>
        <td> <?php echo $orders['delivery_phone']; ?> </td>
        <td> <?php echo $orders['grand_total']; ?> </td>
        <td class='text-center'><button class='btn btn-primary' onclick="view(<?php echo $orders['order_id']; ?>)">View</button></td>
        <td>
            <?php
            $stmt = $db->prepare("SELECT * FROM `transactions` WHERE `order_id`=?");
            $stmt->bind_param('i', $orders['order_id']);
            $stmt->execute();
            $tran = $stmt->get_result()->num_rows;
            $stmt->close();

            if ($tran === 1) { ?>

                <form action="" method="post" style='display: inline-block;'>
                    <input type="submit" name="delivered" class="btn btn-success disabled" value="PAID">
                </form>

            <?php } else { ?>

                <form action="" method="post" style='display: inline-block;'>
                    <input type="submit" name="delivered" class="btn btn-success disabled" value="UNPAID">
                </form>

            <?php } ?>


        </td>
        <td>
            <?php
            $stmt = $db->prepare("SELECT * FROM `approves` WHERE `order_id`=?");
            $stmt->bind_param('i', $orders['order_id']);
            $stmt->execute();
            $approve = $stmt->get_result()->num_rows;
            $stmt->close();

            if ($approve === 0) {
            ?>
                <form action="/admin-approve-order" method="post" style='display: inline-block;'>
                    <input type="hidden" name="order_id" value="<?php echo $orders['order_id'] ?>">
                    <input type="submit" name="approve" class="btn btn-primary" value="APPROVE">
                </form>

            <?php } else { ?>
                <form action="status.php" method="post" style='display: inline-block;'>
                    <input type="hidden" name="id" value="<?php echo $orders['order_id'] ?>">
                    <input type="submit" name="delivered" class="btn btn-success disabled" value="APPROVED">
                </form>
            <?php } ?>
        </td>
    </tr>
<?php } ?>