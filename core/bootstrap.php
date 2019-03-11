<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('configLocal', require 'configLocal.php');

App::bind(
    'database',
    new QueryBuilder(
        Connection::make(App::get('config')['database'])
)
);

// var_dump(App::get('config')['database']);
// die();


//Here we can place helper functions and we also can place it in separate file and then require it here

 function view($name, $data=[])
 {
     extract($data);

     return require "app/views/{$name}.view.php";
 }

 function redirect($path)
 {
     header("Location: /{$path}");
 }
