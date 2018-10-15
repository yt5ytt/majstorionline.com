<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
  include("../function.php");
?>

    <title>Klijent Profil</title>
  </head>
  <body>
    <div id="main" role="main">
      <?php
        $upitProfil = "select * from klijenti where email='$email'";
        $rezProfil = $db -> query($upitProfil);
        while($objProfil = mysqli_fetch_object($rezProfil)){
          $ident = $objProfil -> ident;
          $username = $objProfil -> username;
          $ime = $objProfil -> ime;
          $prezime = $objProfil -> prezime;
          $adresa = $objProfil -> adresa;
          $grad = $objProfil -> grad;
          $telefon1 = $objProfil -> telefon1;
          $telefon2 = $objProfil -> telefon2;
        }
      ?>
      <div class="top-line">
          <div class="logo-nav wrapper">
              <div class="logo">

              </div>

                <?php include('topMenu.php'); ?>

          </div>
      </div>
      <div class="top-banner">
        <div class="box">
          <div class="banner wrapper">
            <h1>MajstoriOnline<small>.com</small></h1>
          </div>
        </div>
      </div>

      <div id="body">
        <div class="body-box wrapper">
          <?php include("sideMenu.php"); ?>
          <div class="main-box">
            <div class="profile-box">
              <h2><?php echo "Korisničko ime: " . $username; ?></h2>
              <h3><?php echo "Klijent: " . $ime . " " . $prezime; ?></h3>
              <p><?php echo "Email adresa: " . $email; ?></p>
            </div>

          </div><!--kraj diva .main-box-->
        </div>

      </div>



<?php
  include("footer.php");
?>
