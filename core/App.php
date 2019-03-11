<?php

namespace App\Core;

class App
{
    protected static $registry;

    public function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }
    public function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception("No {$key} is bound in to the container.");
        }

        return static::$registry[$key];
    }
}
