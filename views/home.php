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
            <h6 class="sub-header mb-4">Find your products here.</h6>
        </div>

        <!-- ------------------------------------------- -->

        <div class="row">
            <div class="col-lg-6 display_cart">

            </div>
            <form action="/" method="GET">
                <div class="search-box m-auto col-lg-3 mt-2 mb-4">
                    <input type="text" placeholder="Search" name="str" value="">
                    <button type="submit"> <i class="fas fa-search"></i> </button>
                </div>
            </form>

        </div>
        <!-- shop  -->
        <div class="row py-4 product-row">
            <?php

            if (isset($_GET['str'])) {

                $str = mysqli_real_escape_string($db, $_GET['str']);

                if ($str != '') {
                    $query = "SELECT * FROM products WHERE product_name like '%$str%' or description like '%$str%' ORDER BY product_id ASC;";
                    $results = mysqli_query($db, $query);

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
                                        <p class="description"><?php echo $row['description']; ?></p>
                                        <p class="price text-center"><?php echo $row['price'] . 'tk'; ?></p>

                                        <div class="m-auto col-3">
                                            <div class="inc_dec">
                                                <input class="m-auto text-center" name="quantity" type="number" min="1" max="100" step="1" value="1" id="quantity">
                                            </div>
                                        </div>

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
                } else {
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
                                        <p class="description"><?php echo $row['description']; ?></p>
                                        <p class="price text-center"><?php echo $row['price'] . 'tk'; ?></p>

                                        <div class="m-auto col-3">
                                            <div class="inc_dec">
                                                <input class="m-auto text-center" name="quantity" type="number" min="1" max="100" step="1" value="1" id="quantity">
                                            </div>
                                        </div>

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
                }
            } else {
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
                                    <p class="description"><?php echo $row['description']; ?></p>
                                    <p class="price text-center"><?php echo $row['price'] . 'tk'; ?></p>

                                    <div class="m-auto col-3">
                                        <div class="inc_dec">

                                            <input class="m-auto text-center" name="quantity" type="number" min="1" max="100" step="1" value="1" id="quantity">

                                        </div>
                                    </div>

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
            }

            ?>
        </div>

        <div class="fabs">
            <div class="action">
                <i class="fa fa-shopping-cart" data-bs-toggle="modal" data-bs-target="#CartModal"></i>
            </div>
        </div>

    </div> <!-- container end -->
</section>

<?php include_once './views/partials/footer.php'; ?>
<?php include_once './views/cart.php'; ?>