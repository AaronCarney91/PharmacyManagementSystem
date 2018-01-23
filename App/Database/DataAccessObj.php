<?php

namespace App\Database;

use App\Database\Database;

class DataAccessObj
{
    protected $db;
    protected $id;
    protected $table;
    protected $name;

    function __construct()
    {
        $this->db = new Database();
    }

    //Fetches Table for respective DAO, Staff fetches Staff table, Patient fetches Patient table.
    public function fetchTable()
    {
        $table = $this->db->runQuery("SELECT * FROM ".$this->table); // <<< Missing ' for some strange reason

        return $table;
    }

    //Fetches specific row belonging to the passed name
    public function fetchRow($name)
    {
        $row = $this->db->runQuery("SELECT * FROM ".$this->table." WHERE ".$this->name." = '$name'");
        return (object) $row[0];
    }

    //Returns the ID belonging to the passed name
    public function fetchId($name)
    {
        $patient_ids_array = $this->db->runQuery("SELECT ".$this->id." FROM ".$this->table." WHERE ".$this->name." = '$name'");

        return $patient_ids_array[0][$this->id];
    }


}

?>