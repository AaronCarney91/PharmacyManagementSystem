<?php

namespace App\Models;

use App\Database\DataAccessObj;

class Drug extends DataAccessObj
{
    //Connects to database
    function __construct()
    {
        parent::__construct();
        $this->id = 'id';
        $this->table = 'drugs';
        $this->name = 'drugName';
    }

    //Return category of selected drug.
    public function fetchDrugCategory($drug)
    {
        $category = $this->db->runQuery("SELECT c.category FROM category c, drug d WHERE d.catid = c.catid AND d.drugName =  '$drug' GROUP BY c.category");
        return $category;

    }

    //Returns form of selected drug.
    public function fetchDrugForm($drug)
    {
        $form = $this->db->runQuery("SELECT f.form FROM form f, drug d WHERE d.formid = f.formid AND d.drugName =  '$drug' GROUP BY f.form");
        return $form;
    }

    //Returns price of selected drug.
    public function fetchDrugPrice($name)
    {
        $price = $this->db->runQuery("SELECT price FROM Drug WHERE drugName = '$name'");
        return (object) $price[0];
    }

    //Returns total price (Price * quantity) of selected drug.
    public function fetchTotalPrice($name, $quantity)
    {
        $price = $this->db->runQuery("SELECT (price*'$quantity') AS 'price' FROM Drug WHERE drugName = '$name'");
        return $price[0]['price'];
    }

    //Insert data to Dispense Table
    public function addToDispense($patid, $staffid, $pharmid, $drugid, $packs, $price, $payid)
    {
        $this->db->addRow("INSERT INTO Dispensal(patid, staffid, pharmid, drugid, packs, price, payid, dispDate)
                              VALUES('$patid', '$staffid', '$pharmid', '$drugid', '$packs', '$price', '$payid', CURRENT_DATE ())");
    }

    //Insert data to payment table
    public function addToPayment($patid, $staffid, $price)
    {
        $this->db->addRow("INSERT INTO Dispensal(patid, staffid, price, payDate)
                              VALUES('$patid', '$staffid', '$price', CURRENT_DATE ())");
    }

}

?>