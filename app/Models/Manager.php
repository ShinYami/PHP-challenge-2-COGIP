<?php

namespace App\Models;

use PDO;
// pas touche et pt mettre des setattributte
abstract class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', 'root27', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
        ]);

        return $db;
    }
}
