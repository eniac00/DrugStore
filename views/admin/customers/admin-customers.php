<?php include_once './views/admin/is_admin_check.php'; ?>
<?php include_once './views/partials/header.php'; ?>


<div class="container mt-5 mb-5">
<div class="d-grid gap-2 mt-5">
        <button type="button" class="submit-btn m-auto btn-block" data-bs-toggle="modal" data-bs-target="#openAddCustomer">Add Customer</button>
    </div>
    <br>
    <br>

    <table id="data-table" class="table table-bordered display wrap" width=100%>
        <thead>
            <th>Customer_id</th>
            <th>FName</th>
            <th>LName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>House</th>
            <th>City</th>
            <th>Street</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php include_once './views/admin/customers/customer_data_table.php'; ?>
        </tbody>
    </table>

</div>

<?php include_once './views/admin/customers/admin-add-customer.php'; ?>
<?php include_once './views/admin/customers/admin-update-customer.php'; ?>
<?php include_once './views/partials/footer.php'; ?>
<script src="./views/admin/customers/admin-customers.js"></script>





