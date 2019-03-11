<?php

class Connection
{
    public static function make($config)
    {
        try {
            return $pdo = new PDO('mysql:host='.$config['dbhost'].';dbname='.$config['dbname'], $config['dbuser'], $config['dbpass']);
        } catch (PDOException $e) {
            $config['error'] = $e->getMessage();
            include_once __DIR__ . '/../../app/views/error.view.php';
            die();
        }
    }
}
