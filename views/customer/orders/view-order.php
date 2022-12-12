<?php
require_once './config/db.php';

if (isset($_GET['order_id'])) {
    $stmt = $db->prepare("select products.product_name, products.price, contains.quantity from contains inner join products on contains.product_id=products.product_id and contains.order_id=?");
    $stmt->bind_param("i", $_GET['order_id']);
    $stmt->execute();
    $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    $stmt = $db->prepare("select * from orders where order_id=?");
    $stmt->bind_param("i", $_GET['order_id']);
    $stmt->execute();
    $desc = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
    $stmt->close();
}

?>
<div class="modal fade" id="viewOrder" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalScrollableTitle">Your Order Contains</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <ul class="list-group mb-3">
                        <?php
                        $total = 0;
                        $delivery = 60; // will fetch from the db Inshallah
                        $total += $delivery;
                        foreach ($products as $key => $product) {
                            echo "<li class='list-group-item d-flex justify-content-between lh-sm'>";
                            echo "<div>";
                            echo "<h6 class='my-0'>" . $product['product_name'] . "</h6>";
                            echo "<small class='text-muted'>" . $product['quantity'] . " X " . $product['price'] . "</small>";
                            echo "</div>";
                            $curr = $product['quantity'] * $product['price'];
                            echo "<span class='text-muted'>" . $curr . "</span>";
                            $total += $curr;
                            echo "</li>";
                        }
                        ?>
                        <li class='list-group-item d-flex justify-content-between bg-light'>
                            <div class='text-success'>
                                <h6 class='my-0'>Delivery Charge (TK)</h6>
                            </div>
                            <span class='text-success'>60</span>
                        </li>
                        <li class='list-group-item d-flex justify-content-between'>
                            <span>Total (TK)</span>
                            <strong><?php echo $total; ?></strong>
                        </li>
                    </ul>
                </div>

                <div class="infos">
                    <h6 class="mb-2"><b>Delivery phone: </b><?php echo $desc['delivery_phone']; ?></h6>
                    <h6 class=""><b>Delivery address: </b><?php echo $desc['delivery_address']; ?></h6>
                </div>
                <?php if (!$desc['prescription_id'] == "") { ?>
                    <div class="mt-4 text-center">
                        <iframe src="./images/prescriptions/<?php echo $desc['prescription_id']; ?>#toolbar=0" height="500" width="400"></iframe>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>