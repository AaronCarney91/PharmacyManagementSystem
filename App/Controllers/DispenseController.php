<?php


namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\Drug;


class DispenseController extends Controller
{
    private $patient;
    private $staff;
    private $drug;

    public function __construct()
    {
        $this->patient = new Patient();
        $this->staff = new Staff();
        $this->drug = new Drug();
    }

    //Called from the dispense_jquery file, retrieves ID's of names passed from dispense form and inserts them into database
    public function dispense($data)
    {
        $data = $data["request"];

        $patient = $data['patient'];
        $patid = $this->patient->fetchId($patient);

        $drug = $data['drug'];
        $drugid = $this->drug->fetchId($drug);
        $quantity = $data['quantity'];
//        //$price = $this->drug->fetchDrugPrice($drug); //Needs to be set to two decimal places
        $total = $this->drug->fetchTotalPrice($drug, $quantity);

        $staffid = $this->staff->fetchId($_SESSION['user']);
        $pharmid = $this->staff->fetchPharmacyId($_SESSION['user']);

        $this->drug->addToDispense($patid, $staffid, $pharmid, $drugid, $quantity, $total, 1);
        $this->drug->addToPayment($patid, $staffid, $total);

        return $this->json_response($total);

    }

    protected function viewFolder()
    {
        return "Dispense";
    }
}