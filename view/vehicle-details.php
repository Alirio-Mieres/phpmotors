<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><? echo $vehicle['invModel']; ?> | PHP Motors</title>
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
  <div id="content-details">
            <h1><? echo $vehicle['invMake'] . ' ' . $vehicle['invModel']; ?></h1>
            <? if(isset($message)){echo $message;} ?>
            <div class="car-details">
                <? if(isset($vehicleDisplay)){
                    echo $vehicleDisplay;
                } ?>
            </div>
            <hr>
            
            <div class="review-display">
            <? if(isset($reviewDisplay)){
                    echo $reviewDisplay;
                }?>
            </div>
  </div>
  </main>


  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
  </footer>
  </div>
</body>
</html>