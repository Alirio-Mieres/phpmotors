<?php   
      if (!$_SESSION['loggedin']) {
      header('Location: /phpmotors/');
      exit; 
    }
      if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    }  
?>
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
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
 
    <h1><? echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?></h1>
    <h3>Your are logged in.</h3>
    <?php
      if (isset($message)) { 
      echo $message; 
      }
    ?>

    <ul class="detail">
      <li><label>First Name: </label><? echo $_SESSION['clientData']['clientFirstname']; ?></li>
      <li><label>Last Name: </label><? echo $_SESSION['clientData']['clientLastname']; ?></li>
      <li><label>Email: </label><? echo $_SESSION['clientData']['clientEmail']; ?></li>
    </ul>

    <section class="update-account">
    <h3>Account Manager</h3>
    <p>Use this link to update account information</p>
    <a href="/phpmotors/accounts?action=client">Update Account Information</a>
    </section>
    <? if($_SESSION['clientData']['clientLevel'] > 1){ ?>
      <section>
          <h2>Inventory Management</h2>
          <p>Use this link to manage the inventory.</p>
          <a class="alt-form-link" href="/phpmotors/vehicles/" title="Vehicle and car classification management">Vehicle Management</a>
          </section>
        <? } ?>

        <? if(isset($reviewsDisplay) && count($reviews)) { ?>
                <hr>
                <section class="table-container">
                <h2>My Reviews</h2>
                <table id="clientReviews">
                    <thead>
                        <tr>
                            <th>Make/Model</th>
                            <th>Review</th> 
                            <th>Modify</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? echo $reviewsDisplay; ?>
                    </tbody>
                </table>
              </section>
                <? } ?>
          
  </main>


  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
  </footer>
  </div>
</body>
</html>