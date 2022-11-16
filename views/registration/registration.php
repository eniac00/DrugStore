<!-- navbar -->
<?php include_once('./views/partials/header.php'); ?>
<!-- registration form -->

<div class="main-formbg">
  <div class="container">
    <div class="row ">
      <div class="form-bg col-lg-6 m-auto">
        <h3 class="form-header text-center">
          Register Here
        </h3>
        <p class="sub-header text-center">“The beginning is always NOW.”</p>
        <form class="form mt-4" action="/registration" method="POST">
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-2">
            <div class="col">
              <div class="form-outline">
                <label class="form-label">First name</label>
                <input name="fname" type="text" class="form-control" />

                <!-- php here -->
                <span class="text-color">
                  <?php
                  if (isset($_SESSION['invalidfirstname'])) {
                  ?>
                    <style>
                      .text-color {
                        color: red;
                      }
                    </style>
                  <?php
                    echo $_SESSION['invalidfirstname'];
                    unset($_SESSION['invalidfirstname']);
                  }
                  ?>
                </span>


              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label">Last name</label>
                <input name="lname" type="text" class="form-control" />
                <!-- php here -->
                <span class="text-color">
                  <?php
                  if (isset($_SESSION['invalidlastname'])) {
                  ?>
                    <style>
                      .text-color {
                        color: red;
                      }
                    </style>
                  <?php
                    echo $_SESSION['invalidlastname'];
                    unset($_SESSION['invalidlastname']);
                  }
                  ?>
                </span>
              </div>
            </div>
          </div>

          <!-- Phonw input -->
          <div class="form-outline mb-2">
            <label class="form-label">Phone number</label>
            <input name="phone" type="text" class="form-control" />
            <!-- php here -->
            <span class="text-color">
              <?php
              if (isset($_SESSION['invalidphone'])) {
              ?>
                <style>
                  .text-color {
                    color: red;
                  }
                </style>
              <?php
                echo $_SESSION['invalidphone'];
                unset($_SESSION['invalidphone']);
              }
              ?>
            </span>

          </div>

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



          <!-- Submit button -->
          <div class="m-auto text-center">
            <button name="button" type="submit" class="submit-btn btn-block mb-4">Sign up</button>
          </div>

        </form>
        <!-- line -->
        <div class="line"></div>

        <div class="text-center">
          <p>Already a member? <a href="/login">Login</a></p>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include_once './views/partials/footer.php'; ?>