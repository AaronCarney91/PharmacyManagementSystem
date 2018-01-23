<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Patient;

class PatientController extends Controller
{
    private $patient;

    public function __construct()
    {
        $this->patient = new Patient();
    }

    //Fetches details of name selected from drop down menu
    public function show($name)
    {
        $patient = $this->patient->fetchRow($name);
        return $this->json_response($patient);
    }

    protected function viewFolder()
    {
        return "Patient";
    }
}