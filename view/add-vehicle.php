<!DOCTYPE html>
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
          <label class="top">Make<input type="text" id="invMake" name="invMake"  ></label>
          <label class="top">Model<input type="text" id="invModel" name="invModel" ></label>
          <label class="top">Description<textarea id="invDescription" name="invDescription" rows="4" cols="40" ></textarea></label>
          <label class="top">Image Path<input type="text" id="invImage" name="invImage" value="/phpmotors/images/no-image.png" ></label>
          <label class="top">Thumbnail Path<input type="text" id="invThumbnail" name="invThumbnail" value="/phpmotors/images/no-image.png" ></label>
          <label class="top">Price<input type="number" id="invPrice" name="invPrice" ></label>
          <label class="top"># In Stock<input type="number" id="invStock" name="invStock" ></label>
          <label class="top">Color<input type="text" id="invColor" name="invColor" ></label>
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