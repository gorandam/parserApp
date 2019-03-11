<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\Router;

use App\Core\Request;

Router::load('app/routes.php') // Here we register routes
    ->direct(Request::uri(), Request::method()); // Here we direct routes, and as uri we need to figure out type of request and with this we tell routes is this get request or post request
