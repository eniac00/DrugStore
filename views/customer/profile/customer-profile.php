<?php include_once './views/customer/is_customer_check.php'; ?>
<?php include_once './views/partials/header.php'; ?>
<link rel="stylesheet" href="./views/customer/profile/style.css">

<?php

require_once './config/db.php';

$findresult = mysqli_query($db, "SELECT * FROM users WHERE user_id='{$_SESSION['user_id']}'");

if ($res = mysqli_fetch_array($findresult)) {

    $fname = $res['fname'];
    $lname = $res['lname'];
    $phone = $res['phone'];
    $email = $res['email'];
    $city = $res['city'];
    $house = $res['house'];
    $street = $res['street'];
    $password = $res['password'];
}
?>

<?php
$select = mysqli_query($db, "SELECT * FROM `users` WHERE user_id = '{$_SESSION['user_id']}'");
if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
}
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-7 m-auto form-bg">
            <form class="form" action="/customer-profile-change-post" method="post">
                <h2 class="header py-4">User Profile</h2>
                <input type="hidden" name="customer_id" value="<?php echo $_SESSION['user_id']; ?>">
                <label>First Name</label>
                <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control" required>
                <label>Last Name</label>
                <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control" required>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" readonly>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" required>
                <label>Password</label>
                <input type="text" name="password" value="<?php echo $password; ?>" class="form-control" required>
                <label>City</label>
                <input type="text" name="city" value="<?php echo $city; ?>" class="form-control" required>
                <label>House</label>
                <input type="text" name="house" value="<?php echo $house; ?>" class="form-control" required>
                <label>Street</label>
                <input type="text" name="street" value="<?php echo $street; ?>" class="form-control" required>
                <br>
                <div class="btn-container">
                    <button type="submit" class="profile-button">UPDATE PROFILE</button>
                    <!-- <a href="/customer-change-password" class="button"><button type="button" class="profile-button"> CHANGE PASSWORD</button></a> -->
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once './views/partials/footer.php'; ?>