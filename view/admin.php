<?php   
      if (!$_SESSION['loggedin']) {
      header('Location: /phpmotors/');
      exit; 
    }
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Page</title>
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
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
  </header>

  <nav>
     <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; 
       echo $navList;
      ?>
    </nav>

  <main>
    <div id="content">
    <h1><? echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?></h1>
    <h3>Your are logged in.</h3>
    <ul class="detail">
      <label >First Name: <li><? echo $_SESSION['clientData']['clientFirstname']; ?></li></label>
      <label >Last Name: <li><? echo $_SESSION['clientData']['clientLastname']; ?></li></label>
      <label >Email: <li><? echo $_SESSION['clientData']['clientEmail']; ?></li></label>
    </ul>
    <? if($_SESSION['clientData']['clientLevel'] > 1){ ?>
          <h2>Vehicles Management</h2>
          <p class="alt-form">Add classifications, add vehicles, or update vehicles: <a class="alt-form-link" href="/phpmotors/vehicles/" title="Vehicle and car classification management">Manage Vehicles</a></p>
        <? } ?>
        </div>
  </main>


  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
  </footer>
  </div>
</body>
</html>