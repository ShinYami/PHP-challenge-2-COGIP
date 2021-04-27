<?php

namespace App\Models;

use PDO;
// pas touche et pt mettre des setattributte
abstract class Manager
{
    protected function dbConnect()
    {

        // //Get Heroku ClearDB connection information
        // $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        // $cleardb_server = $cleardb_url["host"];
        // $cleardb_username = $cleardb_url["user"];
        // $cleardb_password = $cleardb_url["pass"];
        // $cleardb_db = substr($cleardb_url["path"], 1);
        // $active_group = 'default';
        // $query_builder = TRUE;
        // // Connect to DB
        // $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

        $db = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_8c6c10e133dac38;charset=utf8', 'b9943ffa0ab6b3', '383c672b', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8']);
        return $db;
    }
}
