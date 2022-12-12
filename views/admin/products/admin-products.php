<?php include_once './views/admin/is_admin_check.php'; ?>
<?php include_once './views/partials/header.php'; ?>
<?php include_once './views/admin/products/notification.php'; ?>


<div class="container mb-5">
    <div class="d-grid gap-2 mt-5">
        <button type="button" class="submit-btn m-auto btn-block" data-bs-toggle="modal" data-bs-target="#openAddProduct">Add Product</button>
    </div>
    <br>
    <br>

    <table id="data-table" class="table table-bordered display wrap" width=100%>
        <thead>
            <th>Product_id</th>
            <th>Product_name</th>
            <th>Generic_name</th>
            <th>Product_desc</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Expiration_date</th>
            <th>Company</th>
            <th>Product_image</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php include_once './views/admin/products/products_data_table.php'; ?>
        </tbody>
    </table>

</div>


<?php include_once './views/admin/products/admin-add-product.php'; ?>
<?php include_once './views/admin/products/admin-update-product.php'; ?>
<?php include_once './views/partials/footer.php'; ?>

<script src="./views/admin/products/admin-products.js"></script>