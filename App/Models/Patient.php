<?php

namespace App\Models;

use App\Database\DataAccessObj;

class Patient extends DataAccessObj
{
    //Connects to database
    function __construct()
    {
        parent::__construct();
        $this->id = 'patid';
        $this->table = 'Patient';
        $this->name = 'patName';
    }

    //Returns Insert data into patient table
    public function register_patient($name, $dob, $address, $city, $postcode, $contact)
    {
        $this->db->addRow("INSERT INTO Patient(patName, patDoB, patAddress, patCity, patPostcode, patContact)
                              VALUES('$name', '$dob', '$address', '$city', '$postcode', '$contact')");
    }


}

?>