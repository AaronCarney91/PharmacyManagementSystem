<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Drug;

class DrugController extends Controller
{
    private $drug;

    public function __construct()
    {
        $this->drug = new Drug();
    }

    //Fetches details of name selected from drop down menu
    public function show($name)
    {
        $drug = $this->drug->fetchRow($name);
        return $this->json_response($drug);
    }

    protected function viewFolder()
    {
        return "Drug";
    }
}