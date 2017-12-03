<?php
include('functions.php');
// Connecting to the MySQL database
$username = "bockcubilf1";
$password = "1hlArouk";

$databaseName = "db_fall17_bockcubilf1";
$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=' . $databaseName,$username,$password);

//Auto load

function autoloader($class){
    include 'classes/class.' . $class . '.php';
}
spl_autoload_register('autoloader');


// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

// if userID is not set in the session and current URL not login.php sent to to login page
if (!isset($_SESSION["userID"]) && $current_url != 'login.php') {
    header("Location: login.php");
    
}

