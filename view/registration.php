<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Registration | PHP Motors</title>
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
      <h1 class="sign-title">Register</h1>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <div id="login-form">

        <form class="login" action="/phpmotors/accounts/index.php" method="post">
          <label class="top">First Name: <input type="text" name="clientFirstname" id="clientFirstname" autofocus <?php
              if (isset($clientFirstname)) {
                  echo "value='$clientFirstname'";
              } ?> required></label>

          <label class="top">Last Name: <input type="text" name="clientLastname" id="clientLastname" required <?php
              if (isset($clientLastname)) {
                  echo "value='$clientLastname'";
                } ?>></label>

          <label class="top">Email: <input type="email" name="clientEmail" id="clientEmail" placeholder="email@gmail.com"  <?php
              if(isset($clientEmail)){
                echo "value='$clientEmail'";
             }
              ?> required></label>

          <label class="top">Password:
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <input type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="clientPassword" required></label>

          <input type="submit" name="submit" value="Register" class="sign-button">
          <input type="hidden" name="action" value="register">
        </form>
      </div>
    </main>


    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>