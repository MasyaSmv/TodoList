<?php

use App\App\App;
use App\App\Database\QueryBuilder;
use App\App\Database\Connection;

require '../vendor/autoload.php';
require '../Helpers/Help.php';

App::bind('app', require '../config/app.php');
App::bind('DB', new QueryBuilder(Connection::make(App::get('app')['DB'])));