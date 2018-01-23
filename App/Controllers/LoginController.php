<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Staff;

class LoginController extends Controller
{
    //Staff DAO
    private $staff;

    public function __construct()
    {
        $this->staff = new Staff();
    }

    public function index()
    {
        //Retrieve the Staff table from the database
        $staff_list = $this->staff->fetchTable();

        //Send table to view method (Parent method)
        return $this->view("index", ['staff_list' => $staff_list]);
    }

    //Check that correct password was entered, staff DoB.
    public function authenticate()
    {
        //Assign posted data from Login/index.php
        $username = $_POST['staff'];
        $password = $_POST['password'];
        $staffRow = $this->staff->fetchRow($username);

        //Check Login details match. (Staff password == staff DoB)
        if($password == $staffRow->staffDoB)
        {
            //Correct Login, redirect to Home Controller's index method
            $_SESSION['user'] = $username;
            $this->redirect("home", "index");
        }
        else
        {
            echo 'Incorrect Login';
            //Return to Login Page
            $this->index();
        }
    }

    //Set View Folder to Login
    protected function viewFolder()
    {
        return "Login";
    }
}