<?php

switch(current(explode('?', $_SERVER['REQUEST_URI']))) {
  case '/':
    $title = 'Home';
    break;
  case '/login':
    $title = 'Login';
    break;
  case '/registration':
    $title = 'Registration';
    break;
  case '/admin-dashboard':
    $title = 'Admin-Dashboard';
    break;
  case '/admin-products':
    $title = 'Admin-Products';
    break;
  case '/admin-orders':
    $title = 'Admin-Orders';
    break;
  case '/admin-customers':
    $title = 'Admin-Customers';
    break;
  case '/customer-profile':
    $title = 'Profile';
    break;
  case '/customer-orders':
    $title = 'Orders';
    break;
  default:
    $title = 'Error';
    break;
}
