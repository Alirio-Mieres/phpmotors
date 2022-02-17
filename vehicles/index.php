<?php
//This is the acounts controller
require_once '../library/connections.php';
require_once '../model/main-model.php';
//Get the accounts model
require_once '../model/vehicles-model.php';


$classifications = getClassifications();

/*var_dump($classifications);
	exit;*/

$navList = '<ul class="nav">';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';
/*echo $navList;
  exit;*/

$classificationList = '<select name="classificationId">';
$classificationList .= '<option value="0" selected>Choose Car Classification</option>';


foreach ($classifications as $classification) {
  $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
}
$classificationList .= '</select>';


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
    $classificationName = filter_input(INPUT_POST, 'classificationName');

    // Check for missing data
    if (empty($classificationName)) {
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
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_VALIDATE_INT);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_VALIDATE_INT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
    $classificationId = filter_input(INPUT_POST, 'classificationId');



    // Check for missing data
    if ($classificationId == 0) {       
      $message = '<p class="warningMessage">Please provide correct information for all empty form fields.</p>';
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
