<?php 
//This is the reviews controller
require_once '../library/connections.php';
require_once '../model/main-model.php';
//Get the accounts model
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

//Create or access a Session
session_start();

$classifications = getClassifications();

$navList = navList($classifications);



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'review':
      $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
      $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_VALIDATE_INT));
      $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT));

      if (empty($reviewText)) {
          $message = '<p class="alert">Reviews cannot be empty.</p>';
      } else if (empty($invId) || empty($clientId)) {
          $message = '<p class="alert">Sorry, reviewing failed.</p>';
      } else {
          $result = addReview($reviewText, $invId, $clientId);
          if ($result < 1) {
              $message = '<p class="alert">Sorry, reviewing failed. Try again.</p>';
          } else{
              $message = '<p class="alert">Thanks for the review, it is displayed below.</p>';
          }
      }
          
      // Store message to session
      $_SESSION['message'] = $message;
      // Redirect to vehicle details
      header("location: /phpmotors/vehicles/?action=details&invId=$invId");
      break;

  case 'edit':
      $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT));
      $review = getSpecificReview($reviewId);

      $_SESSION['message'] = "";
      if (!count($review)) {
          $_SESSION['message'] = '<p class="alert">The review could not be found.</p>';
          header('location: /phpmotors/accounts/');
          exit;
      } else if ($_SESSION['clientData']['clientId'] !== $review['clientId']) {
          $_SESSION['message'] = '<p class="alert">That review belongs to another user, please try again.</p>';
          header('location: /phpmotors/accounts/');
          exit;
      }

      include '../view/review-update.php';
      exit;
      break;
  case 'updateReview':
      $reviewId = trim(filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT));
      $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
      $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT));

      if (empty($reviewText)) {
          $message = '<p class="alert">Reviews cannot be empty.</p>';
      } else if (empty($reviewId) || $_SESSION['clientData']['clientId'] !== $clientId) {
          $message = '<p class="alert">Sorry, updating the review failed. Please make sure you are logged in and try again.</p>';
      } else {
          $today = new DateTime("now", new DateTimeZone('America/Denver'));
          $result = updateReview($reviewId, $reviewText, $today->format('Y-m-d H:i:s'));
          if ($result < 1) {
              $message = '<p class="alert">Sorry, updating the review failed. Please make sure you are logged in and try again.</p>';
          } else {
              $message = '<p class="alert">Review successfully updated.</p>';
          }
      }

      // Store message to session
      $_SESSION['message'] = $message;
      // Redirect to client admin page
      
      header("location: /phpmotors/accounts/");
      break;
  case 'remove':
      $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT));
      $review = getSpecificReview($reviewId);

      $_SESSION['message'] = "";
      if (!count($review)) {
          $_SESSION['message'] = '<p class="alert">The review could not be found.</p>';
          header('location: /phpmotors/accounts/');
          exit;
      } else if ($_SESSION['clientData']['clientId'] !== $review['clientId']) {
          $_SESSION['message'] = '<p class="alert">That review belongs to another user, please try again.</p>';
          header('location: /phpmotors/accounts/');
          exit;
      }

      include '../view/review-delete.php';
      exit;
      break;
  case 'deleteReview':
      $reviewId = trim(filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT));
      $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT));

      if (empty($reviewId) || $_SESSION['clientData']['clientId'] !== $clientId) {
          $message = '<p class="alert">Sorry, deleting the review failed.</p>';
      } else {
          $result = deleteReview($reviewId);
          if ($result < 1) {
              $message = '<p class="alert">Sorry, deleting the review failed.</p>';
          } else {
              $message = '<p class="alert">Review successfully deleted.</p>';
          }
      }

      // Store message to session
      $_SESSION['message'] = $message;
      // Redirect to client admin page
      header("location: /phpmotors/accounts/");
      break;
  default:
      if ($_SESSION['loggedin']) {
          header("location: /phpmotors/accounts/");
          exit;
      } else {
          header("location: /phpmotors/");
          exit;
      }
      break;
}

?>