<?php if (isset($_SESSION['order-success']) && $_SESSION['order-success']) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Successfully placed the order!</strong> now wait for the admin to approve then pay
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }
unset($_SESSION['order-success']); ?>

<?php if (isset($_SESSION['payment-success']) && $_SESSION['payment-success']) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Payment successful!!!</strong> will be delivered in 1 day
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }
unset($_SESSION['payment-success']); ?>

<?php if (isset($_SESSION['payment-fail']) && $_SESSION['payment-fail']) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Something bad happend</strong> please contact the admin
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }
unset($_SESSION['payment-fail']); ?>