<div class="modal fade" id="openUpdateCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action='/admin-update-customer' method='post'>
                <input type='hidden' id='update_customer_id' name='customer_id'>
                    <div class="row g-3">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="update_fname" name="fname" placeholder="First Name" required>
                            <label for="fname">First Name</label>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="update_lname" name="lname" placeholder="Last Name" required>
                            <label for="lname">Last Name</label>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="update_email" name="email" placeholder="Email Address" required>
                            <label for="email">Email Address</label>
                        </div>
                    </div>
                    <!-- <div class="row g-3">
                        <div class="col form-floating mb-3">
                            <input type="password" class="form-control" id="update_password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                    </div> -->
                    <div class="row g-3">
                        <div class="col form-floating mb-3">
                            <input type="number" class="form-control" id="update_phone" name="phone" placeholder="Phone Number" required>
                            <label for="phone">Phone Number</label>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="update_house" name="house" placeholder="House" required>
                            <label for="house">House</label>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="update_city" name="city" placeholder="City" required>
                            <label for="city">City</label>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="update_street" name="street" placeholder="Street" required>
                            <label for="street">Street</label>
                        </div>
                    </div>
                    <div class="col-lg-6 m-auto text-center">
                        <button name="update_customer" type="submit" class="submit-btn m-auto btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>