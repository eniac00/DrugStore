<?php

require_once __DIR__.'/router.php';


// all the get request goes through here
get('/', 'views/home.php');
get('/login', 'views/login/login.php');
get('/registration', 'views/registration/registration.php');
get('/logout', 'controllers/logout.php');

// admin
get('/admin-dashboard', 'views/admin/admin-dashboard.php');
get('/admin-products', 'views/admin/products/admin-products.php');


// all the post request goes through here
post('/', 'views/home.php');
post('/registration', 'controllers/registration-post.php');
post('/login', 'controllers/login-post.php');
post('/admin-add-product', 'controllers/admin/admin-add-product-post.php');

// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');
