<?php

require_once __DIR__.'/router.php';


// all the get request goes through here
get('/', 'views/home.php');
get('/login', 'views/login/login.php');
get('/registration', 'views/registration/registration.php');

// all the post request goes through here
post('/', 'views/home.php');
post('/registration', 'controllers/registration-post.php');
post('/login', 'controllers/login-post.php');

// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');
