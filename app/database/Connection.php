<?php

namespace App\App\Database;
use Exception;
use \PDO;

class Connection
{
    /**
     * @param $config
     * @return PDO|void
     */
    public static function make($config)
    {
        try
        {
            return new PDO(
                "{$config['CONNECTION']}:dbname={$config['NAME']};host={$config['HOST']}",
                $config['USERNAME'],
                $config['PASSWORD']
            );
        } catch (Exception $e) {
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            die();
        }
    }
}