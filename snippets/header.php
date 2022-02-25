<div id="top-header">
  <div class="img-logo">
  <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo"  id="logo">
  </div>
  <?php 
  if (isset($cookieFirstname)) {
        echo "<span>Welcome, $cookieFirstname</span>";
      } 
      ?>
  
  <div id="login"> <a href="/phpmotors/accounts/index.php?action=login">My Account</a> </div>

</div>