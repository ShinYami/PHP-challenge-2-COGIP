<?php

namespace App\Models;

use PDO;
// pas touche et pt mettre des setattributte
abstract class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
        ]);

        return $db;
    }
}
