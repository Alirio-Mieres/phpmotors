<?php
if (!$_SESSION['loggedin']) {
  header('location: /phpmotors/');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Management | PHP Motors</title>
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
      <h1 class="center">Manage Account</h1>
      <h3 class="center">Update Account</h3>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <div id="login-form">
        <form class='login' action="/phpmotors/accounts/index.php" method="POST">
          <label class="top">First Name <input type="text" id="clientFirstname" name="clientFirstname" required <?php if (isset($clientFirstname)) {
            echo "value='$clientFirstname'";
          } elseif (isset($invInfo['clientFirstname'])) {
            echo "value='$invInfo[clientFirstname]'";
          } ?>></label>

          <label class="top">First Name <input type="text" id="clientLastname" name="clientLastname" required <?php if (isset($clientLastname)) {
            echo "value='$clientLastname'";
          } elseif (isset($invInfo['clientLastname'])) {
            echo "value='$invInfo[clientLastname]'";
          } ?>></label>

          <label class="top">Email <input type="email" id="clientEmail" name="clientEmail" required <?php if (isset($clientEmail)) {
            echo "value='$clientEmail'";
          } elseif (isset($invInfo['clientEmail'])) {
            echo "value='$invInfo[clientEmail]'";
          } ?>></label>

          <input type="hidden" name="action" value="updateClient">
          <input class="sign-button" type="submit" value="Update Info">

        </form>

      </div>
      <h3 class="center">Update Password</h3>

      <div id="update-form">
        <form class="login" action="/phpmotors/accounts/index.php" method="POST">
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span><br>
        <br>
        <span>*note your original password will be changed</span>
          <label class="top">Password <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"></label>
          <input type="hidden" name="action" value="updatePassword">
          <input class="sign-button" type="submit" value="Update Password">
        </form>
      </div>
    </main>


    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>