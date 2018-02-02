<?php

/* Author Steven Lockey
 Basic Function allocater */


ini_set('display_errors',1);
error_reporting(E_ALL);

require("helperclasses/Interpreter.php");
require("helperclasses/MainController.php");
require("controllers/template.php");
require("models/static.php");
require("models/guncomp.php");
require("models/contact.php");
require_once("helperclasses/database.php");

$interpreter = new Interpretor($_GET);
//foreach($_GET as $key => $value){
//echo($key . ": " . $value . "\n" );
//}
$controller = $interpreter->CreateController();

$controller->ExecuteAction();





?>
