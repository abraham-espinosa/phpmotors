<?php

//The actual email address will be returned if it is judged to be "valid" or NULL indicating
//the email does not appear to be a valid address.
function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
}

// Build a navigation bar using the $classifications
function buildNavigation($classifications){
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName="
        .urlencode($classification['classificationName']).
        "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
}

// Build a display of vehicles within an unordered list
function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
     $dv .= '<li>';
     $dv .= "<a href='/phpmotors/vehicles/?action=vehicle&invId="
     .urlencode($vehicle['invId']).
     "' title='View our $vehicle[invModel] vehicle'><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
     $dv .= '<hr>';
     $dv .= "<a href='/phpmotors/vehicles/?action=vehicle&invId="
     .urlencode($vehicle['invId']).
     "' title='View our $vehicle[invModel] vehicle'><h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
     $dv .= "<span>$vehicle[invPrice]</span>";
     $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

// Build a display of vehicles within an unordered list
function buildVehiclesDisplayId($vehicleDetails){
    $dv = '<div id="detailsvehicle">';
    $dv .= "<h1>$vehicleDetails[invMake] $vehicleDetails[invModel]</h1>";
    $dv .= "<img src='$vehicleDetails[invImage]' alt='Image of $vehicleDetails[invMake] $vehicleDetails[invModel] on phpmotors.com'>";
    $price = "$" . number_format($vehicleDetails['invPrice']);
    $dv .= "<span class='price'>Price: $price</span>";
    $dv .= "<h2>$vehicleDetails[invMake] $vehicleDetails[invModel] Details</h2>";
    $dv .= "<span>$vehicleDetails[invDescription]</span>";
    $dv .= "<span>Color: $vehicleDetails[invColor]</span>";
    $dv .= "<span># in Stock: $vehicleDetails[invStock]</span>";
    $dv .= '</div>';
    return $dv;
}

?>