<?php

require_once __DIR__.'/router.php';


// all the get request goes through here
get('/', 'views/home.php');
post('/', 'views/home.php');

// registration
get('/registration', 'views/registration/registration.php');
post('/registration', 'controllers/registration-post.php');

// login
get('/login', 'views/login/login.php');
post('/login', 'controllers/login-post.php');

//logout
get('/logout', 'controllers/logout.php');

// customer
get('/customer-profile', 'views/customer/profile/customer-profile.php');
get('/customer-orders', 'views/customer/orders/customer-orders.php');


// customer-cart
get('/order', 'views/customer/orders/order.php');
post('/order-post', 'controllers/customer/order-post.php');
get('/customer-view-order', 'views/customer/orders/view-order.php');



// admin
get('/admin-dashboard', 'views/admin/admin-dashboard.php');
get('/admin-products', 'views/admin/products/admin-products.php');
get('/admin-customers', 'views/admin/customers/admin-customers.php');
get('/admin-orders', 'views/admin/orders/admin-orders.php');

post('/admin-add-product', 'controllers/admin/products/admin-add-product-post.php');
post('/admin-delete-product', 'controllers/admin/products/admin-delete-product-post.php');
post('/admin-update-product', 'controllers/admin/products/admin-update-product-post.php');

post('/admin-add-customer', 'controllers/admin/customers/admin-add-customer-post.php');
post('/admin-delete-customer', 'controllers/admin/customers/admin-delete-customer-post.php');
post('/admin-update-customer', 'controllers/admin/customers/admin-update-customer-post.php');

get('/admin-delete-order', 'controllers/admin/orders/admin-delete-order-post.php');
get('/admin-update-order', 'controllers/admin/orders/admin-update-order-post.php');

post('/admin-approve-order', 'controllers/admin/orders/admin-approve-order-post.php');
get('/admin-view-order', 'views/admin/orders/view-order.php');


// checkout
get('/checkout', 'controllers/checkout/checkout.php');
post('/checkout-success', 'controllers/checkout/success.php');
post('/checkout-fail', 'controllers/checkout/fail.php');
post('/checkout-cancel', 'controllers/checkout/cancel.php');


// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');
