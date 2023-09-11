<?php
session_start();

mb_internal_encoding("UTF-8");

/**
 * Automatically loads classes
 * @param string $class Name of the invoked class
 * @return void
 */
function autoloadFunction(string $class): void
{
	if (preg_match('/Controller$/', $class))
		require("controllers/" . $class . ".php");
	else
		require("models/" . $class . ".php");
}

//Autoload callback
spl_autoload_register("autoloadFunction");

//Database connection 
Db::connect("127.0.0.1", "root", "", "insurance_db");


//Rendering of the main view
$view = new MainViewController();
$view->process();
unset($_SESSION['message']);