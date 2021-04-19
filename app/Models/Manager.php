<?php

namespace App\Models;

use PDO;
// pas touche et pt mettre des setattributte
abstract class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', 'root27');

        return $db;
    }
}
