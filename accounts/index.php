<?php
//This is the acounts controller
require_once '../library/connections.php';
require_once '../model/main-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';


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

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'login':
    include '../view/login.php';
    break;

  case 'registration':
    include "../view/registration.php";
    break;

  case 'register':
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
    $clientLastname = filter_input(INPUT_POST, 'clientLastname');
    $clientEmail = filter_input(INPUT_POST, 'clientEmail');
    $clientPassword = filter_input(INPUT_POST, 'clientPassword');


    //Cheking for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)) {
      $message = '<p class="registration-error">Please provide information for all empty form fields.</p>';
      include '../view/registration.php';
      exit;
    }
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

    if ($regOutcome === 1) {
      $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
      include '../view/login.php';
      exit;
    } else {
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registrarion.php';
      exit;
    }

    break;

  default:

    break;
}
