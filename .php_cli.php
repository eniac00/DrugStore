<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|pdf)$/', $_SERVER['REQUEST_URI'])) {
    return false;    // serve the requested resource as-is.
}

include_once __DIR__.'/index.php';


