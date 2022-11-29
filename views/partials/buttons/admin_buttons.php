<div class="container">
    <button class="navbar-toggler" type="button">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fa fa-bars"></i>
    </button>

    <a class="navbar-brand" href="/"><i class="fal fa-heartbeat" style="font-weight:400; font-size:28px;"></i> QuickMeds</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

        <ul class="navbar-nav  col-lg-4">
            <li class="nav-item">
                <a class="nav-link" href="/admin-dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-products">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-orders">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-customers">Customers</a>
            </li>

        </ul>

        <ul class="navbar-nav ms-auto text-left col-lg-3">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome <?php echo $_SESSION['name']; ?>!</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>

    </div>
</div>