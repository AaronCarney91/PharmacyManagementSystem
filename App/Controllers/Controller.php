<?php

namespace App\Controllers;

abstract class Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return $this->view("index");
    }

    protected function view($view_name, $data = [])
    {
        //Where to look for Controllers form. E.G LoginController opens View/Login/index.php
        $view_file = 'Views/' . $this->viewFolder() . '/' . $view_name . '.php';

        //Does file exist?
        if(!file_exists($view_file)) {
            throw new \Exception("View: " . $view_file . " does not exist.");
        }

        // Loop over our data properties and set them as sessions vars
        // for the view to utilise.
        foreach($data as $key => $value) {
            if(!isset($key)) {
                throw new \Exception("No identifier applied to data variable: " . $value);
            }

            $_SESSION[$key] = $value;
        }

        //Open file in view file path.
        return require_once($view_file);
    }

    protected function redirect($controller, $method)
    {
        $uri = '/index.php?controller='.$controller.'&method='.$method;
        header('Location:'.$uri);
    }

    //Returns PHP data to be used in Javascript
    protected function json_response($data)
    {
        echo json_encode($data);
    }

    abstract protected function viewFolder();
    

}

?>