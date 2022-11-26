<?php
if (preg_match("/\/$/i", $_SERVER['REQUEST_URI']) || preg_match("/\?/i", $_SERVER['REQUEST_URI'])) {
  $title = "Home";
} else if (preg_match("/login/i", $_SERVER['REQUEST_URI'])) {
  $title = "Login";
} else if (preg_match("/registration/i", $_SERVER['REQUEST_URI'])) {
  $title = "Registration";
} else {
  $title = "Error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo $title; ?></title>

  <link rel="icon" type="image/png" href="./assets/favicon.png"/>
  <!-- custom style sheet link -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

</head>

<body>

  <!-- temporary navbar -->
  <div class="row header-bg">
    <nav class="navbar navbar-expand-lg">
      <div class="container">

        <button class="navbar-toggler" type="button">
          <!-- <span class="navbar-toggler-icon"></span> -->
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="/"><i class="fal fa-heartbeat" style="font-weight:400; font-size:28px;"></i> QuickMeds</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav  col-lg-4">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Checkout</a>
            </li>

          </ul>

          <ul class="navbar-nav ms-auto text-left col-lg-3">
            <?php
            if (isset($_SESSION['name'])) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="#">Welcome <?php echo $_SESSION['name']; ?>!</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
            <?php
            } else {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/registration">Registration</a>
              </li>
            <?php
            }
            ?>

          </ul>
        </div>

      </div>
    </nav>
  </div>