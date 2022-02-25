<?php
//This is the acounts controller
require_once '../library/connections.php';
require_once '../model/main-model.php';
//Get the accounts model
require_once '../model/vehicles-model.php';
require_once '../library/functions.php';

//Create or access a Session
session_start();

$classifications = getClassifications();

/*var_dump($classifications);
	exit;*/

$navList = navList($classifications);

/*echo $navList;
  exit;*/

// $classificationList = '<select name="classificationId" required>';
// $classificationList .= '<option value="" selected>Choose Car Classification</option>';

// foreach ($classifications as $classification) {
//   $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
// }
// $classificationList .= '</select>';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}



switch ($action) {
  case 'add-classification':
    include '../view/add-classification.php';
    break;

  case 'add-vehicle':
    include '../view/add-vehicle.php';
    break;

  case 'add-classification-page':
    // Filter and store the data
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING));

    // Check for missing data
    if(empty($classificationName) || strlen($classificationName) > 30){
      $message = '<p class="warningMessage">Please provide information for all empty form fields.</p>';
      include '../view/add-classification.php';
      exit; 
  }


    // Send the data to the model
    $carOutcome = addClassificationName($classificationName);

    // Check and report the result
    if ($carOutcome === 1) {
      // include '../view/vehicle-man.php';
      header("Location: /phpmotors/vehicles");
      exit;
    } else {
      $message = "<p>Sorry, failed to add $classificationName to the database. Please try again.</p>";
      include '../view/add-classification.php';
      exit;
    }
    break;
  case 'add-vehicle-page':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId'));



    // Check for missing data
    if ($classificationId == 0) {       
      $message = '<p class="warningMessage">Please provide correct information for all empty form fields.</p>';
      //if(isset($classification)){echo "value='$classificationId'";}
      include '../view/add-vehicle.php';
      exit;
    } 

    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
      $message = '<p class="warningMessage">Please provide correct information for all empty form fields.</p>';
      include '../view/add-vehicle.php';
      exit;
    }

    // Send the data to the model
    $invOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

    // Check and report the result
    if ($invOutcome === 1) {
      $message = "<p class='success'>The $invMake $invModel was added successfully!</p>";
      include '../view/add-vehicle.php';
      exit;
    } else {
      $message = "<p class='warningMessage'>Sorry, $invMake $invModel failed to add the vehicle to the database. Please try again.</p>";
      include '../view/add-vehicle.php';
      exit;
    }

    break;
  default:
    include '../view/vehicle-man.php';
    break;
}
