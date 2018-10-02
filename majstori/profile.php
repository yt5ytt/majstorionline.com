<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
?>

    <title>Majstori - Početna</title>
  </head>
  <body>
    <div id="main" role="main">
      <?php
        $upitProfil = "select * from majstori where email='$email'";
        $rezProfil = $db -> query($upitProfil);
        while($objProfil = mysqli_fetch_object($rezProfil)){
          $ident = $objProfil -> ident;
          $username = $objProfil -> username;
          $ime = $objProfil -> ime;
          $prezime = $objProfil -> prezime;
          $adresa = $objProfil -> adresa;
          $grad = $objProfil -> grad;
          $telefon = $objProfil -> telefon;
          $opis = $objProfil -> opis;
          $delatnost = $objProfil -> delatnost;
          $dodatnaDelatnost = $objProfil -> dodatna_delatnost;
        }
      ?>
      <div class="top-line">
          <div class="logo-nav wrapper">
              <div class="logo">

              </div>

              <?php include("topMenu.php"); ?>
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
        <div class="profile-box wrapper">
          <div id="sidebar">
            <ul>
              <li><a href="index.php">Početak</a></li>
              <li><a href="izmeniProfil.php">Izmeni profil</a></li>
              <li><a href="#">Ukloni profil</a></li>
            </ul>
          </div>
          <div class="profile-main">
            <h1><?php echo $username; ?><small><?php echo "(" . $ident . ")"; ?></small></h1>
            <h3><?php echo $ime . " " . $prezime . " - " . $delatnost; ?></h3>
            <p><?php echo $email; ?></p>
            <p><?php echo $adresa; ?></p>
            <h3><?php echo $grad; ?></h3>
            <h3><?php echo $telefon; ?></h3>
          </div>
          <div class="profile-side">
            <p><?php echo $dodatnaDelatnost; ?></p>
            <p><?php echo $opis; ?></p>
          </div>
        </div>

      </div>

<?php
  include("footer.php");
?>
