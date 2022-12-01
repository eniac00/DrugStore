<?php require './views/partials/title.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo $title; ?></title>

  <link rel="icon" type="image/png" href="./assets/favicon.png" />
  <!-- custom style sheet link -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
</head>

</head>

<body class="d-flex flex-column min-vh-100">
  <div class="container-fluid">
    <!-- temporary navbar -->
    <div class="row header-bg">
      <nav class="navbar navbar-expand-lg">
        <?php
        if (isset($_SESSION['user_id']) && !$_SESSION['is_admin']) {
          include_once './views/partials/buttons/user_buttons.php';
        } else if (isset($_SESSION['user_id']) && $_SESSION['is_admin']) {
          include_once './views/partials/buttons/admin_buttons.php';
        } else {
          include_once './views/partials/buttons/default_buttons.php';
        }
        ?>
      </nav>
    </div>