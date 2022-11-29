<?php 
if (!isset($_SESSION['is_admin'])) {
    header("location:/login");
    die();
}

if (!$_SESSION['is_admin']) {
    header("location:/");
    die();
}

?>
<?php include_once './views/partials/header.php'; ?>
<?php include_once './controllers/admin/admin-delete-product.php'; ?>

<?php if (isset($_GET['success']) && $_GET['success']) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Success! add product successful
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<?php if (isset($_GET['error']) && $_GET['error']) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Error! unable to add product
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<div class="container" height=200px>

    <div class="d-grid gap-2 mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#openAddProduct">Add Product</button>
    </div>
    <br>
    <br>

    <table id="data-table" class="table table-bordered display nowrap" width=100%>
        <thead>
            <th>product_id</th>
            <th>product_name</th>
            <th>product_desc</th>
            <th>price</th>
            <th>stock</th>
            <th>company</th>
            <th>product_image</th>
            <th>action</th>
        <tbody>
            <?php include_once './views/admin/products/data_table.php'; ?>
        </tbody>
    </table>

</div>


<?php include_once './views/admin/products/admin-add-product.php'; ?>
<?php include_once './views/admin/products/admin-update-product.php'; ?>
<?php include_once './views/partials/footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#data-table').DataTable({
            responsive:true
        });
    });
</script>