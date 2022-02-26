<div id="top-header">
  <div class="img-logo">
  <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo"  id="logo">
  </div>

  
  <div id="login">
  <? if(!$_SESSION['loggedin'] || !isset($_SESSION['clientData'])){ ?>
                <a href="/phpmotors/accounts/?action=login" title="Login or Sign Up">My Account</a>
            <? } else { ?>
                <a href="/phpmotors/accounts/" title="View Account">Welcome <? echo $_SESSION['clientData']['clientFirstname']; ?></a> | <a href="/phpmotors/accounts/?action=Logout" title="Logout">Logout</a>
            <? } ?>

</div>