<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Patient;
use App\Models\Drug;
use App\Models\Staff;

class HomeController extends Controller
{
    //Data Access Objects
    private $patient;
    private $drug;
    private $staff;

    public function __construct()
    {
        $this->patient = new Patient();
        $this->drug = new Drug();
        $this->staff = new Staff();
    }

    //Fetches all tables used in main form
    public function index()
    {
        //Fetch Tables from respective DAO's
        $pat_list = $this->patient->fetchTable();
        $drug_list = $this->drug->fetchTable();
        $staff_list = $this->staff->fetchTable();

        //Pass tables to view (parent method)
        return $this->view("index", ['pat_list' => $pat_list, 'drug_list' => $drug_list, 'staff_list' => $staff_list]);
    }

    //Set view folder to Home
    protected function viewFolder()
    {
       return "Home";
    }
}