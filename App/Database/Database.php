<?php

namespace App\Database;

define('DB_DATA_SOURCE', 'mysql:host='.config('database.host').';dbname='.config('database.dbname'));
define('DB_USERNAME', config('database.username'));
define('DB_PASSWORD', config('database.password'));

//define('DB_DATA_SOURCE', 'mysql:host=localhost;dbname=pharmacy;port=3306');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', 'password');

use \PDO;

class Database
{
    private $connection;

    function __construct()
    {
        $this->connectToDB(DB_USERNAME, DB_DATA_SOURCE, DB_PASSWORD);
    }

    //Connect to Database
    function connectToDB($user, $database, $password)
    {
        $params = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        $this->connection = new PDO($database, $user, $password, $params);
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