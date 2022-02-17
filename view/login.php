<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Login | PHP Motors</title>
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
      <h1 class="sign-title">Sign in</h1>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <div id="login-form">
      <form  class="login">
        <label class="top">Email: <input type="email" name="email" placeholder="email@gmail.com"  autofocus <?php
              if(isset($clientEmail)){
                echo "value='$clientEmail'";
             }
              ?> required></label>
        <label class="top">Password: 
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
        <input type="password"  name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"></label>
        <input type="submit" value="Sign-in" class="sign-button">
        <input type="hidden" name="action" value="Login">
        <a href="/phpmotors/accounts/index.php?action=registration" class="not-member">Not a member yet?</a>
      </form>
      </div>
    </main>


    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>