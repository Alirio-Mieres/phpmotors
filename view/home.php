<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <meta name="description" content="Home Page by Alirio Mieres in CSE 340: Web Backend Development at Brigham Young University - Idaho">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="css/small.css">
  <link rel="stylesheet" href="css/medium.css">
  <link rel="stylesheet" href="css/large.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
  <div id="content">
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';
        
      ?>
    </header>

    <nav>
    <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; 
      echo $navList;
      ?>
    </nav>

    <main>
      <h1>Welcome to PHP Motors!</h1>
      <div class="banner-box">

        <div class="delorean-img">
          <img src="../phpmotors/images/delorean.jpg" alt="Delorean car images">
        </div>

        <section class="own-button">
          <h3>DMC Delorean</h3>
          <p>3 cup holders</p>
          <p>Superman doors</p>
          <p>Fuzzy dice !</p>
        </section>

        <div class="button-home">
          <a href="#"><img src="../phpmotors/images/site/own_today.png " alt="Own Today button"></a>
        </div>

      </div>

      <div class="final-section">
        <section class="delorean-reviews">
          <h3>DMC Delorean Reviews</h3>
          <ul>
            <li>"So fast its almost like traveling in time." (4/5)</li>
            <li>"Coolest ride on the road." (5/5)</li>
            <li>"I´m feeling Marty McFly!" (5/5)</li>
            <li>"The most futuristic ride of our day" (4.5/5)</li>
            <li>"80´s livin and I love it!" (5/5)</li>
          </ul>
        </section>

        <section class="delorean-upgrades">
          <h3>Delorean upgrades</h3>
          <div>
            <div class="background-upgrades">
              <img src="images/upgrades/flux-cap.png" alt="Flux Capacitor images">
            </div>
            <a href="#">Flux Capacitor</a>
          </div>

          <div>
            <div class="background-upgrades">
              <img src="images/upgrades/flame.jpg" alt="Flame Decals images" class="image-up">
            </div>
            <a href="#">Flame Decals</a>
          </div>
          <div>
            <div class="background-upgrades">
              <img src="images/upgrades/bumper_sticker.jpg" alt="Bumper Stickers images">
            </div>
            <a href="#">Bumper Stickers</a>
          </div>
          <div>
            <div class="background-upgrades">
              <img src="images/upgrades/hub-cap.jpg" alt="Hub Caps images">
            </div>
            <a href="#">Hub Caps</a>
          </div>
        </section>
      </div>
    </main>


    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>