<?php

class Connection
{
    public static function make($config)
    {
        try {
            return $pdo = new PDO('mysql:host='.$config['dbhost'].';dbname='.$config['dbname'], $config['dbuser'], $config['dbpass']);
        } catch (PDOException $e) {
            $config['error'] = $e->getMessage();
            include_once "views/error.html.php";
            die();
        }
    }
}
