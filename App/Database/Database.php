<?php

namespace App\Database;

define('DB_DATA_SOURCE', 'mysql:host=localhost;dbname=pharmacy');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

use \PDO;

class Database
{
    private $connection;

    function __construct()
    {
        $this->connectToDB(DB_USERNAME, DB_DATA_SOURCE);
    }

    //Connect to Database
    function connectToDB($user, $database)
    {
        $this->connection = new PDO($database, $user);
    }

    //Run queries to fetch data
    function runQuery($q)
    {
        $rows = array();
        $query = $this->connection->query($q);

        while($row = $query->fetchall(PDO::FETCH_ASSOC))
        {
            $rows = $row;
        }

        return $rows;
    }

    //Run query to add data
    function addRow($q)
    {
        $this->connection->exec($q);
    }



}


?>