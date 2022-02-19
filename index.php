<?php
//This is the main controller
 require_once 'library/connections.php';
 require_once 'model/main-model.php';
 require_once 'library/functions.php';


 $classifications = getClassifications();

 /*var_dump($classifications);
	exit;*/

  $navList = navList($classifications);
  /*echo $navList;
  exit;*/
  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL){
   $action = filter_input(INPUT_GET, 'action');
  }
  
  /*switch ($action){
    case 'something':
     
     break;
    
    default:
     include 'view/home.php';
   }*/
   switch ($action){
    case 'template':
     include "view/template.php";
     break;
    
    default:
     include 'view/home.php';
   }

?>