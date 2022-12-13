<?php include_once './views/admin/is_admin_check.php'; ?>
<?php include_once './views/partials/header.php'; ?>
<?php require_once './config/db.php';

?>


<div class="admin-dashboard" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="container">
        <div class="row mb-4">
            <h3 class="header text-center">Welcome <?php echo ucwords($_SESSION['name']); ?></h3>
            <p class="text-center mb-4">Please navigate yourself from below</p>
        </div>
        <div class="row">
            <div class="col-lg-4 m-auto">
                <!-- php here -->
                <?php
                $query = "select * from customers";

                $result = mysqli_query($db, $query);
                $row = mysqli_num_rows($result);
                ?>

                <div class="product-card my-2" style="margin: 0px 20px; padding-left: 10px; padding-right:10px; box-shadow:  rgba(78, 82, 87, 0.2) 0px 8px 24px; border-radius: 10px;">
                    <div class="card border-0  mb-2">
                        <div class="card-body px-4  py-4">
                            <div class="card-text px-2 text-start pb-4">
                                <i class="far fa-user me-4" style="font-weight:400; font-size:60px; color: #059377; float: left;"></i>
                                <h5 class="sub-header card-title" style="line-height: 30px; align: text-transform: capitalize;"><?php echo $row; ?> Registered Customers</h5>
                            </div>
                            <form action="/admin-customers" class="text-center">
                                <button type="submit" class="submit-btn m-auto mb-2 btn-block">View Users</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 m-auto">
                <!-- php here -->
                <?php
                $query1 = "select * from products where stock > 0";
                $query2 = "select * from products where stock = 0";

                $result1 = mysqli_query($db, $query1);
                $result2 = mysqli_query($db, $query2);

                $row1 = mysqli_num_rows($result1);
                $row2 = mysqli_num_rows($result2);

                ?>
                <div class="product-card my-2" style="margin: 0px 20px; padding-left: 10px; padding-right:10px; box-shadow:  rgba(78, 82, 87, 0.2) 0px 8px 24px; border-radius: 10px;">
                    <div class="card border-0  mb-2">
                        <div class="card-body px-4  py-4">
                            <div class="card-text px-2 text-start pb-4">
                                <i class="far fa-syringe  me-4" style="font-weight:400; font-size:60px; color: #059377; float: left;"></i>

                                <h5 class="sub-header card-title" style="line-height: 30px; align: text-transform: capitalize;"> <?php echo $row1; ?> In Stock</h5>
                                <h5 class="sub-header card-title" style="line-height: 30px;  align: text-transform: capitalize;"> <?php echo $row2; ?> Out Of Stock</h5>
                            </div>
                            <form action="/admin-products" class="text-center">
                                <button type="submit" class="submit-btn m-auto mb-2 btn-block">View Products</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- row ends here  -->
        </div>
        <div class="row pt-4">
            <div class="col-lg-4 m-auto">
                <!-- php here -->
                <?php
                $query = "select sum(profit) as total_profits from transactions";

                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);
                $sum = $row['total_profits'];
                ?>

                <div class="product-card my-2" style="margin: 0px 20px; padding-left: 10px; padding-right:10px; box-shadow:  rgba(78, 82, 87, 0.2) 0px 8px 24px; border-radius: 10px;">
                    <div class="card border-0  mb-2">
                        <div class="card-body px-4  py-4">
                            <div class="card-text px-2 text-start pb-4">
                                <i class="far fa-sack-dollar me-4" style="font-weight:400; font-size:60px; color: #059377; float: left;"></i>
                                <h5 class="sub-header card-title" style="line-height: 30px; align: text-transform: capitalize;"> <?php echo $sum; ?> TK </h5>
                                <h5 class="sub-header card-title" style="line-height: 30px;  align: text-transform: capitalize;">Profit was made</h5>
                            </div>
                            <form action="/admin-products" class="text-center">
                                <button type="submit" class="submit-btn m-auto mb-2 btn-block">View Products</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 m-auto">
                <?php
                $stmt = $db->prepare("SElECT * FROM `orders` WHERE NOT EXISTS (SELECT * FROM `approves` WHERE `approves`.`order_id` = `orders`.`order_id`)");
                $stmt->execute();
                $no_of_rows = $stmt->get_result()->num_rows;
                $stmt->close();
                ?>
                <div class="product-card my-2" style="margin: 0px 20px; padding-left: 10px; padding-right:10px; box-shadow:  rgba(78, 82, 87, 0.2) 0px 8px 24px; border-radius: 10px;">
                    <div class="card border-0  mb-2">
                        <div class="card-body px-4  py-4">
                            <div class="card-text px-2 text-start pb-4">
                                <i class="far fa-check-circle me-4" style="font-weight:400; font-size:60px; color: #059377; float: left;"></i>
                                <h5 class="sub-header card-title" style="line-height: 30px; align: text-transform: capitalize;"><?php echo $no_of_rows; ?></h5>
                                <h5 class="sub-header card-title" style="line-height: 30px; align: text-transform: capitalize;">Unapproved orders </h5>
                            </div>
                            <form action="/admin-orders" class="text-center">
                                <button type="submit" class="submit-btn m-auto mb-2 btn-block">View Orders</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row ends here  -->
        </div>
    </div>
</div>




<?php include_once './views/partials/footer.php'; ?>