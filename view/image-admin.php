<?php
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Management | PHP Motors</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="../css/small.css">
  <link rel="stylesheet" href="../css//medium.css">
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
      <h1 class="sign-title">Image Management</h1>
      <p class="sign-title">Choose one of the options below:</p>
      <h2 class="sign-title">Add New Vehicle Image</h2>
      <?php
      if (isset($message)) {
        echo $message;
      } ?>
    <div id="login-form">
      <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data" class="login">
        <label for="invItem">Vehicle</label>
        <?php echo $prodSelect; ?>
        <fieldset>
          <p>Is this the main image for the vehicle?</p>
          <label for="priYes" class="pImage">Yes <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1"></label>
          
          <label for="priNo" class="pImage">No <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0"></label>
          
        </fieldset>
        <label>Upload Image:</label>
        <input type="file" name="file1" class="upload-image">
        <input type="submit" class="sign-button" value="Upload">
        <input type="hidden" name="action" value="upload">
      </form>
     </div>
      <hr>
      <h2>Existing Images</h2>
      <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
      <?php
      if (isset($imageDisplay)) {
        echo $imageDisplay;
      } ?>
    </main>


    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>
<?php unset($_SESSION['message']); ?>