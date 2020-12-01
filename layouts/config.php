<?php

require 'db_credentials.php';

ob_start(); 
// session_start();

if(!isset($_SESSION)) { 
    session_start(); 
} 

$mysqli  = new mysqli(
    DB_SERVER, 
    DB_USERNAME, 
    DB_PASS, 
    DB_NAME
);

if(!$mysqli) {
    die("error" . $mysqli->connect->error);
} 

// $account = new Account($mysqli);

