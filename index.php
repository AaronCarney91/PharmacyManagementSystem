<?php
session_start();

require __DIR__ . "/vendor/autoload.php";

use App\Controllers\Controller;

// Get the controller from the URL and instantiate it for use.
$url_ctrl = $_REQUEST['controller'];

if(empty($url_ctrl)) {
    throw new Exception("No controller string passed.");
}

$url_ctrl = ucfirst(strip_tags(stripslashes($url_ctrl))); //Capitalise 1st character of Controller
$ctrl_name = $url_ctrl."Controller"; //Concatenate passed controller with "Controller" E.G LoginController, HomeController.
$ctrl_filename = $ctrl_name.".php"; //Concatenate file extension to Controller name, .php

//Check that Controller exists
if (file_exists("App/Controllers/".$ctrl_filename)) {

    // The controller exists, lets instantiate it and move on.
    $controller = 'App\\Controllers\\'.$ctrl_name;
    $controller = new $controller();

    //Was a method passed?
    $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : '';

    // If blank, default to index.
    if(empty($method)) {
        $method = 'index';
    }

    // Check if the controller has the above method.
    if (!method_exists($controller, $method)) {
        throw new Exception("Controller method: ".$method." not supplied.");
    }

    // Get any parameters from the url.
    $params = isset($_REQUEST['params']) ? $_REQUEST['params'] : '';

    //If parameters passed, pass them.
    if(!empty($params)) {
        return $controller->$method($params);
    }

    // Pass any post request to the method if exists.
    if(isset($_POST)) {
        return $controller->$method($_POST);
    }

    // return the method call.
    return $controller->$method();
}

//If Controller cannot be found
echo "404 - not found";

?>