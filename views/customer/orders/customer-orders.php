<?php include_once './views/customer/is_customer_check.php'; ?>
<?php include_once './views/partials/header.php'; ?>

<?php include_once './views/customer/orders/notification.php'; ?>

<div class="container">

    <div class="d-grid gap-2 mt-5 text-center">
        <h3>The Orders of <?php echo $_SESSION['name'] ?></h3>
        <hr>
    </div>
    <br>
    <br>

    <table id="data-table" class="table table-bordered display wrap" width=100%>
        <thead>
            <th class='text-center'>Order_id</th>
            <th class='text-center'>Date</th>
            <th class='text-center'>Grand_total</th>
            <th class='text-center'>Summary</th>
            <th class='text-center'>Pay</th>
        </thead>
        <tbody>
            <?php include_once './views/customer/orders/orders_data_table.php'; ?>
        </tbody>
    </table>
</div>

<?php include_once './views/partials/footer.php'; ?>
<script src="./views/customer/orders/customer-orders.js"></script>