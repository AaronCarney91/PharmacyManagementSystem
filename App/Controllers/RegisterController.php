<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Patient;

class RegisterController extends Controller
{

    private $patient;

    public function __construct()
    {
        $this->patient = new Patient();
    }

    //Assign data passed from Register Form to variables and insert them into the patient table
    public function register($data)
    {
        $data = $data["request"];

        $name = $data['name'];
        $dob = $data['dob'];
        $address = $data['address'];
        $city = $data['city'];
        $postcode = $data['postcode'];
        $contact = $data['contact'];

        //WRITE CHECKS FOR CORRECT DATA TYPES
        $this->patient->register_patient($name, $dob, $address, $city, $postcode, $contact);
    }

    protected function viewFolder()
    {
        return "Register";
    }
}