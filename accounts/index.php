<?php
//This is the acounts controller
require_once '../library/connections.php';
require_once '../model/main-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';
require_once '../library/functions.php';

require_once '../model/reviews-model.php';

//Create or access a Session
session_start();

$classifications = getClassifications();

$navList = navList($classifications);

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
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));

    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    //check for existing email
    $existingEmail = checkExistingEmail($clientEmail);

    //Deal with existing email during registration
    if ($existingEmail) {
      $message = '<p>The email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
    }

    //Cheking for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
      $message = '<p class="registration-error">Please provide information for all empty form fields.</p>';
      include '../view/registration.php';
      exit;
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

    if ($regOutcome === 1) {
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
      header('Location: /phpmotors/accounts/?action=login');
      exit;
    } else {
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registrarion.php';
      exit;
    }

    break;

  case 'Login':
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
    if (!$hashCheck) {
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
    $reviews = getClientReviews($_SESSION['clientData']['clientId']);
    $reviewsDisplay = buildClientReviewsDisplay($reviews);
    // Send them to the admin view
    include '../view/admin.php';
    exit;
    break;

  case 'Logout':
    unset($_SESSION['clientData']);
    unset($_SESSION['loggedin']);
    unset($_SESSION['message']);
    session_destroy();
    header('Location: /phpmotors/');
    exit;
    break;

  case 'client':
    $invInfo = getClientById($_SESSION['clientData']['clientId']);
    include '../view/client-update.php';
    exit;
    break;


  case 'updateClient':
    $clientId = $_SESSION['clientData']['clientId'];
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientEmail = checkEmail($clientEmail);

    if ($clientEmail !== $_SESSION['clientData']['clientEmail'] && checkExistingEmail($clientEmail)) {
      $message = "<p class='errorMsg'>The new email address '$clientEmail' already exists. Please use a different email.</p>";
      // reset client email for stickyness
      $clientEmail = $_SESSION['clientData']['clientEmail'];
      include '../view/client-update.php';
      exit;
  }
    // Check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
      $message = '<p class="red">Please provide information for all empty form fields.</p>';
      include '../view/client-update.php';
      exit;
    }

    
    // Send the data to the model
    $regOutcome = updateClient($clientId, $clientFirstname, $clientLastname, $clientEmail);

    // Check and report the result
    if ($regOutcome === 1) {
      $clientData = getClientById($clientId);
      $_SESSION['clientData'] = $clientData;
      $message = "<h4 class='user-update'>The user information was updated successfully.</h4>";
      $_SESSION['message'] = $message;
      header('Location: /phpmotors/accounts/');
      exit;
    } else {
      $message = "<p>Sorry, updated failed. Please try again.</p>";
      include '../view/client-update.php';
      exit;
    }
    break;
    
  case 'updatePassword':
    $clientId = $_SESSION['clientData']['clientId'];
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
    $checkPassword = checkPassword($clientPassword);

    // Check for missing data
    if (empty($checkPassword)) {
      $message = '<p class="red">Please provide a valid new password</p>';
      include '../view/client-update.php';
      exit;
    }
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    // Send the data to the model
    $regOutcome = updatePassword($clientId, $hashedPassword);

    // Check and report the result
    if ($regOutcome === 1) {
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "<h4 class='user-update'>The password was updated successfully.</h4>";
      header('Location: /phpmotors/accounts');
      exit;
    } else {
      $message = "<p class='red'>Sorry, error updating password. Please try again.</p>";
      include '../view/client-update.php';
      exit;
    }
    break;

  default:
    // if (!$_SESSION['loggedin'] || !isset($_SESSION['clientData'])) {
    //   include '../view/login.php';
    // } else {
      $reviews = getClientReviews($_SESSION['clientData']['clientId']);
      $reviewsDisplay = buildClientReviewsDisplay($reviews);
      include '../view/admin.php';
    // }
    exit;
     break;
}
