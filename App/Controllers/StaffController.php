<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Staff;

class StaffController extends Controller
{
    private $staff;

    public function __construct()
    {
        $this->staff = new Staff();
    }

    //Fetches details of name selected from drop down menu
    public function show($name)
    {
        $staff = $this->staff->fetchRow($name);
        return $this->json_response($staff);
    }

    protected function viewFolder()
    {
        return "Staff";
    }
}