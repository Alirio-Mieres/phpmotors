<?php

/*
*Accounts Model
*/ 


//Register a new client
function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword){
 $db = phpmotorsConnect();

 $sql = 'INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword)
      VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';

  $stmt = $db ->prepare($sql);

  $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
  $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
  $stmt->bindValue(':clientEmail', $clientEmail, PDO:: PARAM_STR);
  $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);

  $stmt ->execute();

  $rowsChanged = $stmt->rowCount();

  $stmt->closeCursor();

  return $rowsChanged;
}

//Check for existing email address
function checkExistingEmail($clientEmail) {
  $db = phpmotorsConnect();
  $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :clientEmail';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();

  if(empty($matchEmail)) {
    return 0;
    //echo 'Nothing found';
  } 
  
  else{
    return 1;
    //echo 'Match found';
  }
}

// Get client data based on an email address
function getClient($clientEmail){
  $db = phpmotorsConnect();
  $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
 }
?>