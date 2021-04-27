<?php

namespace App\Models;

use PDO;
// pas touche et pt mettre des setattributte
abstract class Manager
{
    protected function dbConnect()
    {

        //Get Heroku ClearDB connection information
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"], 1);
        $active_group = 'default';
        $query_builder = TRUE;
        // Connect to DB
        $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

        // $db = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', 'root27', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8']);
        return $conn;
    }
}
