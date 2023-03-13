<?php

namespace App\App;

class App
{
    protected static $registry = [];

    /**
     * @param $key
     * @param $val
     * @return void
     */
    public static function bind($key, $val)
    {
        static::$registry[$key] = $val;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return static::$registry[$key];
    }
}