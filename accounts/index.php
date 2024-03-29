<?php

//Accounts Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the accounts model
require_once '../model/reviews-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Create or access a Session
session_start();

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
  case 'login':
    include '../view/login.php';
    break;
  case 'registration':
    include '../view/registration.php';
    break;
  case 'register':
    // Filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_EMAIL);
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // Check for an existing email address
    $existingEmail = checkExistingEmail($clientEmail);

    if($existingEmail){
      $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
    }

    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/registration.php';
      exit; 
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

    // Check and report the result
    if($regOutcome === 1){
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
      header('Location: /phpmotors/accounts/?action=login');
      exit;
    } else {
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registration.php';
      exit;
    }
    break;
  case 'Login':
    // Filter and store the data
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientEmail = checkEmail($clientEmail);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $passwordCheck = checkPassword($clientPassword);
    
    // Run basic checks, return if errors
    if (empty($clientEmail) || empty($passwordCheck)) {
     $message = '<p class="notice">Please provide a valid email address and password.</p>';
     include '../view/login.php';
     exit;
    }
      
    // A valid password exists, proceed with the login process
    // Query the client data based on the email address
    $clientData = getClient($clientEmail);
    // Compare the password just submitted against
    // the hashed password for the matching client
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
    // If the hashes don't match create an error
    // and return to the login view
    if(!$hashCheck) {
      $message = '<p class="notice">Please check your password and try again.</p>';
      include '../view/login.php';
      exit;
    }
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    // Remove the password from the array
    // the array_pop function removes the last
    // element from an array
    array_pop($clientData);
    // Store the array into the session
    $_SESSION['clientData'] = $clientData;
    // Send them to the admin view
    $reviewsByClient = getReviewsByClient($_SESSION['clientData']['clientId']);
    if(empty($reviewsByClient)){
      $noreviews = "<p>You do not have reviews</p>";
      }else{
        $reviewsByClientDisplay = buildReviewsByClietnDisplay($reviewsByClient);
      }
    include '../view/admin.php';
    exit;
  case 'logout':
    $_SESSION['loggedin'] = FALSE;
    session_destroy();
    include '../view/home.php';
  case 'updateAccount':
    include '../view/client-update.php';
    break;
  case 'updateInfo':
    // Filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
    $clientData = getClient($clientEmail);
    // Run basic checks, return if errors
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
      $message = '<p class="notice">Please complete all the fields.</p>';
      include '../view/client-update.php';
      exit;
      }

    if($_SESSION['clientData']['clientEmail'] != $clientEmail){
      // Check for an existing email address
      $existingEmail = checkExistingEmail($clientEmail);
      if($existingEmail){
        $message = '<p class="notice">That email address already exists. Try a different one</p>';
        include '../view/client-update.php';
        exit;
      }    
    }
    $clientId = $_SESSION['clientData']['clientId'];
    // Send the data to the model
    $updateResult = updateInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);  
    
    $clientData = getClient($clientEmail);
    $_SESSION['clientData'] = $clientData;
    // Check and report the result
    if($updateResult){
      $message = "<p class='notify'>Congratulations, your information account was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/accounts/');
      exit;
    } else {
      $message = "<p>Error. Your account was not updated.</p>";
      include '../view/client-update.php';
      exit;
    }
    break;
  case 'updateAccountPassword':
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $checkPassword = checkPassword($clientPassword);
    // Check for missing data
    if(empty($checkPassword)){
      $message = '<p>Please check password requirements.</p>';
      include '../view/client-update.php';
      exit; 
    }
    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    $clientId = $_SESSION['clientData']['clientId'];

    // Send the data to the model
    $regOutcome = updatePassword($hashedPassword, $clientId);

    // Check and report the result
    if($regOutcome === 1){
      $message = "<p class='notify'>Congratulations, your password was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/accounts/');
      exit;
    } else {
      $message = "<p>Error. Your password was not updated.</p>";
      include '../view/client-update.php';
      exit;
    }
    break;
  default:
    $reviewsByClient = getReviewsByClient($_SESSION['clientData']['clientId']);
    if(empty($reviewsByClient)){
      $noreviews = "<p>You do not have reviews</p>";
    }else{
      $reviewsByClientDisplay = buildReviewsByClietnDisplay($reviewsByClient);
    }
    include '../view/admin.php';
  }
?>