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
<?php if (isset($_GET['delete']) && $_GET['delete']) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Successfully deleted the product!!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<?php if (isset($_GET['update']) && $_GET['update']) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Successufully updated product details!!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>