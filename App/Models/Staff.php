<?php

namespace App\Models;

use App\Database\DataAccessObj;

class Staff extends DataAccessObj
{
    //Sets table name to Staff and name to StaffName(Polymorphism, Repository Pattern)
    function __construct()
    {
        parent::__construct();
        $this->id = 'staffid';
        $this->table = 'Staff';
        $this->name = 'staffName';
    }

    //Returns pharmacy ID of logged in staff member
    public function fetchPharmacyId($name)
    {
        $id = $this->db->runQuery("SELECT pharmid FROM Staff WHERE staffName = '$name'");
        return $id[0]['pharmid'];
    }
}

?>