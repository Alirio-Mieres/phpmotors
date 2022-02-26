<?php
$classificationList = '<select name="classificationId" required>';
$classificationList .= '<option value="" selected>Choose Car Classification</option>';

foreach ($classifications as $classification) {
  $classificationList .= "<option value='$classification[classificationId]'";
  if(isset($classificationId)){
    if($classification['classificationId'] === $classificationId){
      $classificationList .= ' selected ';
    }
  }
 
  $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

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
  <title>Add Vehicle Page</title>
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
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>

    <nav>
      <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; 
      echo $navList;
      ?>
    </nav>

    <main>
      <h1 class="center">Add Vehicle</h1>

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
          <label class="top">Make<input type="text" id="invMake" name="invMake"<?php 
            if(isset($invMake)){echo "value='$invMake'";} ?>  required></label>

          <label class="top">Model<input type="text" id="invModel" name="invModel" <?php 
            if(isset($invMake)){echo "value='$invModel'";} ?>  required></label>

          <label class="top">Description<textarea id="invDescription" name="invDescription" rows="4" cols="40" required><?php if(isset($invMake)){echo $invDescription;}?></textarea></label>

          <label class="top">Image Path<input type="text" id="invImage" name="invImage" placeholder="/phpmotors/images/no-image.png" <?php 
            if(isset($invMake)){echo "value='$invImage'";} ?> required></label>

          <label class="top">Thumbnail Path<input type="text" id="invThumbnail" name="invThumbnail" placeholder="/phpmotors/images/no-image.png" <?php 
            if(isset($invMake)){echo "value='$invThumbnail'";} ?>  required></label>

          <label class="top">Price<input type="number" step=0.01 id="invPrice" name="invPrice"<?php 
              if(isset($invMake)){echo "value='$invPrice'";} ?>  required></label>

          <label class="top"># In Stock<input type="number" id="invStock" name="invStock"<?php 
              if(isset($invMake)){echo "value='$invStock'";} ?> required></label>

          <label class="top">Color<input type="text" id="invColor" name="invColor" <?php 
              if(isset($invMake)){echo "value='$invColor'";} ?> required></label>

          <input type="submit" name="submit" value="Add vehicle" class="sign-button">
          <input type="hidden" name="action" value="add-vehicle-page">
        </form>
      </div>
    </main>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>