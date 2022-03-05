<?php
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2) {
  header('Location: /phpmotors/');
  exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="../css/small.css">
  <link rel="stylesheet" href="../css/medium.css">
  <link rel="stylesheet" href="../css/large.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
  <div id="content">
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';?>
    </header>

    <nav>
      <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; 
      echo $navList;
      ?>
    </nav>

    <main>
    <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>

      <?php 
      if (isset($message)){
        echo $message;
      }
      ?>

      <div id="login-form">
        <form class="login" action="/phpmotors/vehicles/index.php" method="post">
          <?php
          echo $classificationList;
          ?>
          <label class="top">Make<input type="text" readonly id="invMake" name="invMake"<?php 
            if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>  required></label>

          <label class="top">Model<input type="text" readonly id="invModel" name="invModel" <?php 
            if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>  required></label>

          <label class="top">Description<textarea id="invDescription" readonly name="invDescription" rows="4" cols="40" required><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea></label>

          <input type="submit" name="submit" value="Delete Vehicle" class="sign-button">
           
          <input type="hidden" name="action" value="deleteVehicle">
          <input type="hidden" name="invId" value="
            <?php if(isset($invInfo['invId'])){echo $invInfo['invId'];} ?>">
        </form>
      </div>
    </main>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
    </footer>
  </div>
</body>
</html>