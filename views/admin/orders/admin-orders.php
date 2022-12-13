<?php include_once './views/admin/is_admin_check.php'; ?>
<?php include_once './views/partials/header.php'; ?>

<?php if (isset($_GET['stockout']) && $_GET['stockout']) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Failed to Approve</strong> stock out product_name = <?php echo $_GET['product_name']; ?> product_id = <?php echo $_GET['product_id']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<div id="view"></div>

<div class="container mt-5 mb-5">

    <br>
    <br>
    <table id="data-table" class="table table-bordered display wrap" width=100%>
        <thead>
            <th>Order Id</th>
            <th>Customer Id</th>
            <th>Order date</th>
            <th>Delivery Address</th>
            <th>Delivery Phone</th>
            <th>Grand Total</th>
            <th>Details</th>
            <th>Payment Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php include_once './views/admin/orders/orders_data_table.php'; ?>
        </tbody>
    </table>

</div>

<?php include_once './views/partials/footer.php'; ?>
<script src="./views/admin/orders/admin-orders.js"></script>