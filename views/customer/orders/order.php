<?php

require_once './config/db.php';
include_once './views/customer/is_customer_check.php';

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header("location:/");
    die();
}

include_once 'views/partials/header.php';
?>

<div class="container mt-5">
    <main>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <?php echo "<span class='badge bg-primary rounded-pill'>" . count($_SESSION['cart']) . "</span>"; ?>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $total = 0;
                    $delivery = 60; // will fetch from the db Inshallah
                    $total += $delivery;
                    foreach ($_SESSION['cart'] as $key => $product) {
                        echo "<li class='list-group-item d-flex justify-content-between lh-sm'>";
                        echo "<div>";
                        echo "<h6 class='my-0'>" . $product['name'] . "</h6>";
                        echo "<small class='text-muted'>" . $product['quantity'] . " X " . $product['price'] . "</small>";
                        echo "</div>";
                        $curr = $product['quantity'] * $product['price'];
                        echo "<span class='text-muted'>" . $curr . "</span>";
                        $total += $curr;
                        echo "</li>";
                    }

                    $_SESSION['total'] = $total;
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
            <?php

            $stmt = $db->prepare("SELECT `fname`, `lname`, `email` FROM `users` INNER jOIN `customers` ON `users`.`user_id`=`customers`.`customer_id` and `customers`.`customer_id`=?");
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
            $stmt->close();

            $fname = $result['fname'];
            $lname = $result['lname'];
            $email = $result['email'];

            ?>

            <div class="col-md-7 col-lg-8 mb-5">
                <h4 class="mb-3">Delivery address</h4>
                <form action="order-post" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname; ?>" readonly>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname; ?>" readonly>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $email; ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" pattern="[+]{1}[0-9]{11,14}" class="form-control" id="phone" name="phone" placeholder="+880187xxxxxxx" required>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" required="" readonly>
                                <option value="Bangladesh">Bangladesh</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">District</label>
                            <select class="form-select" id="state" readonly>
                                <option value="">Dhaka</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="email" class="form-label">Prescription (PDF)</label>
                        <input type="file" class="form-control" accept="application/pdf" name="prescription" aria-label="file example">
                    </div>
                    <div class="col-lg-6 m-auto mt-3 text-center">
                        <button name="order-submit" type="submit" class="submit-btn m-auto btn-block">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php include_once 'views/partials/footer.php'; ?>