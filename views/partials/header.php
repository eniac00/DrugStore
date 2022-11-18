<?php
if (preg_match("/\/$/i", $_SERVER['REQUEST_URI']) || preg_match("/\?/i", $_SERVER['REQUEST_URI'])) {$title = "Home";}
else if (preg_match("/login/i", $_SERVER['REQUEST_URI'])) {$title = "Login";}
else if (preg_match("/registration/i", $_SERVER['REQUEST_URI'])) {$title = "Registration";}
else {$title = "Error";}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title><?php echo $title; ?></title>

  <!-- custom style sheet link -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- bootstrap cdn -->
  <link rel="stylesheet" href="./assets/bootstrap-5.2.2/css/bootstrap.min.css">
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
        <a class="navbar-brand" href="/">Mayer Doa Drug store</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav ms-auto text-left mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/registration">Registration</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
