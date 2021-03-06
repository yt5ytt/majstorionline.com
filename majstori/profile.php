<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
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
        include("topMenu.php");
      ?>
      <div class="top-banner">
        <div class="box">
          <div class="banner wrapper">
            <h1>MajstoriOnline<small>.com</small></h1>
          </div>
        </div>
      </div>

      <div id="body">
        <div class="profile-box wrapper">

          <?php include("sideMenu.php"); ?>

          <div class="profile-main">
            <h1><?php echo $username; ?></h1>
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

        <div class="responsiveSidebar">
          <ul>
            <li><a href="izmeniProfil.php">Izmeni profil</a></li>
            <li><a href="izbrisiProfil.php">Ukloni profil</a></li>
          </ul>
        </div>

      </div>

<?php
  include("footer.php");
?>
