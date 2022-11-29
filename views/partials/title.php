<?php

$uri = $_SERVER['REQUEST_URI'];

if (preg_match("/admin-products$/i", $uri) || preg_match("/\?/i", $uri)) {
  $title = "Admin-Products";
} else if (preg_match("/\/$/i", $uri) || preg_match("/\?/i", $uri)) {
  $title = "Home";
} else if (preg_match("/login/i", $uri)) {
  $title = "Login";
} else if (preg_match("/registration/i", $uri)) {
  $title = "Registration";
} else if (preg_match("/admin-dashboard/i", $uri)) {
  $title = "Admin-dashboard";
} else if (preg_match("/admin-products/i", $uri)) {
  $title = "Admin-Products";
} else {
  $title = "Error";
}
