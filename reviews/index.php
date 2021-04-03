<?php

//Reviews Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles model
require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads model
require_once '../model/uploads-model.php';
// Get the reviews model
require_once '../model/reviews-model.php';

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

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
}

if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

 switch ($action){
  case 'newReview':
    //Filter and store the data
    $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_STRING);
    $clientId = $_SESSION['clientData']['clientId'];

    // Check for missing data
    if(empty($reviewText)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      $_SESSION['message'] = $message;
      header("location: /phpmotors/vehicles/?action=vehicle&invId=$invId");
      exit; 
    }

    // Send the data to the model
    $regOutcome = newReview($reviewText, $invId, $clientId);

    // Check and report the result
    if($regOutcome === 1){
      $message = "<p>Your review has been created.</p>";
      $_SESSION['message'] = $message;
      header("location: /phpmotors/vehicles/?action=vehicle&invId=$invId");
      exit;
    } else {
      $message = "<p>Sorry, adding your review failed. Please try again.</p>";
      $_SESSION['message'] = $message;
      header("location: /phpmotors/vehicles/?action=vehicle&invId=$invId");
      exit;
    }
    break;
  case 'editR':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
    $reviewInfo = getReviewInfo($reviewId);
    include '../view/review-update.php';
    exit;
    break;
  case 'updateReview':
    //Filter and store the data
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
    // Check for missing data
    if(empty($reviewText)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/review-update.php';
      exit; 
    }
          
    // Send the data to the model
    $updateResult = updateReview($reviewId, $reviewText);
          
    // Check and report the result
    if($updateResult){
      $message = "<p class='notify'>Congratulations, the review was successfully updated.</p>";
      include '../accounts/index.php';
      exit;
    } else {
    $message = "<p>Error. the review was not updated.</p>";
      include '../view/review-update.php';
      exit;
    }
    break;
  case 'deleteR':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
    $reviewInfo = getReviewInfo($reviewId);
    include '../view/review-delete.php';
    exit;
    break;
  case 'deleteReview':
    //Filter and store the data
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
          
    // Send the data to the model
    $deleteResult = deleteReview($reviewId);
            
    // Check and report the result
    if($deleteResult){
      $message = "<p class='notify'>Congratulations, the review was successfully deleted.</p>";
      include '../accounts/index.php';
      exit;
    } else {
      $message = "<p class='notify'>Sorry, the review was not deleted.</p>";
      include '../accounts/index.php';
      exit;
    }	
    break;   
  default:
    $classificationList = buildClassificationList($classifications);
    include '../view/vehicle-management.php';
 }

?>