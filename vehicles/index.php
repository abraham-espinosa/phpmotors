<?php

//Accounts Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles model
require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';

// Create or access a Session
session_start();

// Get the array of classifications
$classifications = getClassifications1();

// var_dump($classifications);
//	exit;

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);
//echo $navList;
//exit;

// Build a select list using the $classifications array
//$selectList = '<select name="classificationId">';
//$selectList .= "<option value='' disabled selected>Choose Car Classification</option>";
//foreach ($classifications as $classification) {
//  $selectList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
//}
//$selectList .= '</select>';

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
}

if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

 switch ($action){
  case 'add-classification':
    include '../view/add-classification.php';
    break;
  case 'add-vehicle':
    include '../view/add-vehicle.php';
    break;
  case 'new-classification':
    //Filter and store the data
    $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING);

    // Check for missing data
    if(empty($classificationName)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/add-classification.php';
      exit; 
    }

    // Send the data to the model
    $regOutcome = newClassification($classificationName);

    // Check and report the result
    if($regOutcome === 1){
      header('Location: index.php');
      exit;
    } else {
      $message = "<p>Sorry, adding $classificationName failed. Please try again.</p>";
      include '../view/add-classification.php';
      exit;
    }
    break;
  case 'new-vehicle':
    //Filter and store the data
    $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_STRING);
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_VALIDATE_FLOAT);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_VALIDATE_FLOAT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
  
    // Check for missing data
    if(empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)){
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/add-vehicle.php';
    exit; 
    }
  
    // Send the data to the model
    $regOutcome = newVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
  
    // Check and report the result
    if($regOutcome === 1){
      $message = "<p>Your new vehicle has been created.</p>";
      include '../view/add-vehicle.php';
      exit;
    } else {
      $message = "<p>Sorry, adding new vehicle failed. Please try again.</p>";
      include '../view/add-vehicle.php';
      exit;
    }
      break;
  default:    
    include '../view/vehicle-management.php';
 }

?>