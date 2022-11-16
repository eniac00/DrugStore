<?php

require_once './config/db.php';
include_once './views/partials/header.php';

// codes for add to cart

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "id");
        if (!in_array($_GET['id'], $session_array_id)) {
            $session_array = array(
                'id' => $_GET['id'],
                'name' => $_POST['hidden_name'],
                'price' => $_POST['hidden_price'],
                'quantity' => $_POST['quantity'],
            );
            $_SESSION['cart'][] = $session_array;
        }
    } else {
        $session_array = array(
            'id' => $_GET['id'],
            'name' => $_POST['hidden_name'],
            'price' => $_POST['hidden_price'],
            'quantity' => $_POST['quantity'],
        );
        $_SESSION['cart'][] = $session_array;
    }
}

// for delete from cart

if (isset($_GET['action'])) {
    if ($_GET['action'] == "clearall") {
        unset($_SESSION['cart']);
    }
    if ($_GET['action'] == "remove") {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
            }
            if (empty($_SESSION['cart'])) {
                unset($_SESSION["cart_item"]);
            }
        }
    }
}


?>

<!-- header  section-->
<?php
include_once './views/partials/header.php';
?>

<!-- banner section -->
<section id="banner-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="color:#fff;">
                <h2>
                    Find all the best medical services here!
                </h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa iusto saepe nemo officia.</p>
            </div>
        </div>
    </div>

</section>

<!-- store section -->
<section id="shop-bg">
    <div class="container">
        <div class="row text-center">
            <h3 class="header">Store</h3>
            <h6 class="sub-header">Lorem ipsum dolor, sit amet consectetur adipisicing.</h6>
        </div>

        <!-- ------------------------------------------- -->

        <!-- shop  -->
        <div class="row py-4 product-row">
            <!-- php and query for shop products here -->
            <?php
            $select = "SELECT * FROM products ORDER BY product_id ASC;";
            $results = mysqli_query($db, $select);

            // loop here
            if (mysqli_num_rows($results) > 0) {
                while ($row = mysqli_fetch_array($results)) {
            ?>

                    <!-- product card html here!!! break php tag!! -->

                    <div class="col-lg-4">
                        <form method="POST" action="/?id=<?php echo $row['product_id']; ?>">
                            <div class="product-card m-auto my-2" style="margin: 0px 20px; padding-left: 10px; padding-right:10px; box-shadow:  rgba(78, 82, 87, 0.2) 0px 8px 24px; border-radius: 10px;">
                                <div class="card border-0  mb-2">
                                    <div class="card-body text-center">
                                        <img src="../assets/images/<?php echo $row['product_image']; ?>" class="img-fluid img-responsive mt-2" style="vertical-align: middle;" alt="product-img">
                                    </div>
                                </div>
                                <h5 class="sub-header card-title" style="text-transform: capitalize;"><?php echo $row['product_name']; ?></h5>
                                <p class="description mt-2"><?php echo $row['description']; ?></p>
                                <p class="price text-center"><?php echo $row['price'] . 'tk'; ?></p>

                                <input type="number" name="quantity" value="1" step="1" class="form-control me-auto" style="display: inline-block; float: right;">
                                <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row['product_name']; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">

                                <div class="col-lg-6 m-auto text-center">
                                    <button type="submit" name="add_to_cart" class="add-product-btn mt-2 mb-4 m-auto btn-block">Add to cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <div class="fabs" onclick="toggleBtn()">
            <div class="action">
                <i class="fa fa-shopping-cart" data-bs-toggle="modal" data-bs-target="#CartModal"></i>
            </div>
        </div>

        <?php include_once './views/cart.php'; ?>

    </div> <!-- container end -->
</section>
<script>
    function toggleBtn() {
        console.log("pressed");
    }
</script>
<?php include_once './views/partials/footer.php'; ?>