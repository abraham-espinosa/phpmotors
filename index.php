<?php

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
// Get the functions library
require_once 'library/functions.php';

// Create or access a Session
session_start();

// Get the array of classifications
$classifications = getClassifications();

// var_dump($classifications);
//	exit;

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);
//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action){
  case 'something':
  break; 
default:
  include 'view/home.php';
}

?>