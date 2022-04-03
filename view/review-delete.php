<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><? echo $review['invMake'] . $review['invModel']; ?> | PHP Motors</title>
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
  
            <h1><? if(isset($review['invMake']) && isset($review['invModel'])){ 
	            echo "Delete Review for $review[invMake] $review[invModel]";} ?></h1>

            <h2><?  $date = date('d F, Y' , strtotime($review['reviewDate']));
                echo "Reviewed on $date";?></h2>

              <h3 class="alert">Deletes cannot be undone. Are you sure you want to delete this review?</h3>
            
              <div id="delete-container">
                <? if(isset($message)){echo $message;} ?>
                <form  method="post" action="/phpmotors/reviews/" name="deleteReview">

                  
                  <label class="top">Review Text</label><span class="text-delete"> <?
                      if(isset($review['reviewText'])){echo $review['reviewText'];}
                            ?></span> 

                    <input class="delete-button" type="submit" value="Delete Review" >

                    <input type="hidden" name="action" value="deleteReview">
                    <input type="hidden" name="reviewId" value="<? if(isset($review['reviewId'])){echo $review['reviewId'];} ?>">
                    <input type="hidden" name="clientId" value="<? if(isset($review['clientId'])){echo $review['clientId'];} ?>">
                </form>
            </div>
  </main>


  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
  </footer>
  </div>
</body>
</html>