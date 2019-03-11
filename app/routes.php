<?php

$router->get('', 'PagesController@home');
$router->get('parser', 'CreateController@create');
$router->get('index', 'GetAllController@index');
