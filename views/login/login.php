<!-- navbar -->
<?php include('./views/partials/header.php'); ?>

<?php if (isset($_GET['nouser']) && $_GET['nouser']) { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    No user exists! please recheck the email
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>

<!-- login form -->
<div class="main-formbg">
  <div class="container">
    <div class="row">
      <div class="form-bg col-lg-5 m-auto">
        <div class="text-center">
          <h3 class="form-header">
            Login Here
          </h3>
          <p class="sub-header">Let's take one step to eliminate your sickness</p>
        </div>
        <form class="form mt-4" action="/login" method="POST">
          <!-- Email input -->
          <div class="form-outline mb-2">
            <label class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" />
            <!-- php here -->
            <span class="text-color">
              <?php
              if (isset($_SESSION['invalidemail'])) {
              ?>
                <style>
                  .text-color {
                    color: red;
                  }
                </style>
              <?php
                echo $_SESSION['invalidemail'];
                unset($_SESSION['invalidemail']);
              }
              ?>
            </span>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" />
            <!-- php here -->
            <span class="text-color">
              <?php
              if (isset($_SESSION['invalidpassword'])) {
              ?>
                <style>
                  .text-color {
                    color: red;
                  }
                </style>
              <?php
                echo $_SESSION['invalidpassword'];
                unset($_SESSION['invalidpassword']);
              }
              ?>
            </span>
          </div>

          <!-- 2 column grid layout for inline styling -->
          <div class="row mb-4 m-auto text-center">
            <div class="col-lg-12">
              <!-- Simple link -->
              <a href="#!">Forgot password?</a>
            </div>
          </div>

          <!-- Submit button -->
          <div class="col-lg-6 m-auto text-center">
            <button name="button" type="submit" class="submit-btn m-auto btn-block">Sign in</button>
          </div>
        </form>
        <!-- line -->
        <div class="line"></div>
        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a href="/registration">Register</a></p>
          <p>Follow us @</p>
          <a class="icon-btn mx-1">
            <i class="fab fa-facebook-f"></i>
          </a>

          <a class="icon-btn mx-1">
            <i class="fab fa-google"></i>
            <a>

              <a class="icon-btn mx-1">
                <i class="fab fa-twitter"></i>
                <a>

                  <a class="icon-btn mx-1">
                    <i class="fab fa-github"></i>
                  </a>
        </div>
      </div>

    </div>
  </div>

</div>

<?php include_once './views/partials/footer.php'; ?>