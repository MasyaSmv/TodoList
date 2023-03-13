<?php
require './../app/bootstrap.php';
use App\App\Router;
use App\App\Request;

try {
    Router::load('../routes/web.php')->direct(Request::uri(), Request::method());
} catch (Exception $e) {
}
