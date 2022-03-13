<?php
function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_SANITIZE_EMAIL);
  return $valEmail;
}

  // Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword) {
 $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
 return preg_match($pattern, $clientPassword);
}


//Function for the navList
function navList($classifications){
  $navList = '<ul class="nav">';
  $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
  foreach ($classifications as $classification) {
    // $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName="  .urlencode($classification['classificationName'])."' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
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
// function will build a display of vehicles within an unordered list.
 function buildVehiclesDisplay($vehicles) {
  $dv = '<ul id="inv-display">';
  foreach ($vehicles as $vehicle) {
      $dv .= '<li class="car-list">';
      $dv .= '<div class="car-image">';
      $dv .= "<a href='/phpmotors/vehicles/?action=details&invId=$vehicle[invId]' title='$vehicle[invModel] Details'>";
      $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
      $dv .= '</a>';
      $dv .= '</div>';
      $dv .= '<hr>';
      $dv .= '<div class="infoCar">';
      $dv .= "<a  href='/phpmotors/vehicles/?action=details&invId=$vehicle[invId]' title='$vehicle[invModel] Details'>";
      $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
      $dv .= '</a>';
      $dv .= '<span>$' . number_format($vehicle['invPrice'], 2) . '</span>';
      $dv .= '</div>';
      $dv .= '</li>';
  }
  $dv .= '</ul>';
  return $dv;
}


function buildVehicleDetailDisplay($vehicle) {
  // MAIN IMAGE
  $dv = '<div class="car-image-container">';
  $dv .= "<img class='car-image' src='$vehicle[invImage]' alt='$vehicle[invMake] $vehicle[invModel]'>";
  $dv .= '<p>Price: $' . number_format($vehicle['invPrice'], 2) . '</p>';
  $dv .= '</div>';
  // HEADER
  $dv .= '<div class="car-info-container">';
  $dv .= "<strong class='car-name'>$vehicle[invMake] $vehicle[invModel] Details</strong>";
  $dv .= "<p>$vehicle[invDescription]</p>";
  $dv .= "<p>Color:  $vehicle[invColor]</p>";
  $dv .= "<p># In stock: $vehicle[invStock]</p>";
  $dv .= '</div>';
  // DESCRIPTION
  return $dv;
}
?>