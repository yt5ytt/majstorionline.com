<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
?>

    <title>Klijenti - Početna</title>
  </head>
  <body>
    <div id="main" role="main">
      <?php
        $upitProfil = "select * from klijenti where email='$email'";
        $rezProfil = $db -> query($upitProfil);
        while($objProfil = mysqli_fetch_object($rezProfil)){
          $ident = $objProfil -> ident;
          $_SESSION["username"] = $objProfil -> username;
        }
      ?>
      <div class="top-line">
          <div class="logo-nav wrapper">
              <div class="logo">

              </div>
              <nav>
                <ul>
                  <li><a href="#">PORUKE</a></li>
                  <li><a href="postavi_oglas.php">POSTAVI OGLAS</a></li>
                  <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
                  <li><a href="logout.php">ODJAVI SE</a></li>
                </ul>
              </nav>
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
          <div class="sidebar">
            <ul>
              <li><a href="index.php">Početak</a></li>
              <li><a href="pretraga.php">Pretraga</a></li>
              <li><a href="logout.php">Odjavi se</a></li>
            </ul>
          </div>
          <div class="main-box">
<?php
            $upitMajstori = "select * from majstori";
            $rezMajstori = $db -> query($upitMajstori);
            while($objMajstori = mysqli_fetch_object($rezMajstori)){
              $ident = $objMajstori -> ident;
              $mail = $objMajstori -> email;
              $ime = $objMajstori -> ime;
              $prezime = $objMajstori -> prezime;
              $adresa = $objMajstori -> adresa;
              $grad = $objMajstori -> grad;
              $telefon = $objMajstori -> telefon;
              $delatnost = $objMajstori -> delatnost;
              $opis = $objMajstori -> opis;
              $dodatnaDelatnost = $objMajstori -> dodatna_delatnost;
?>
            <div class="majstor-box">
              <div class="contact">
                <a href="#">Pošalji poruku</a>
              </div>
              <h3 class="naslov"><a href="#"><?php echo $ime . " " . $prezime; ?></a></h3><br />
              <h2><?php echo $delatnost; ?></h2><br />
              <p><?php echo "Mail adresa: <b>" . $mail . "</b>"; ?></p><br />
              <p><?php echo nl2br($opis); ?></p><br />
<?php
              if($dodatnaDelatnost != ""){
?>
              <p><?php echo $dodatnaDelatnost; ?></p><br />

<?php
              }
?>

            </div>

<?php
            }
?>
          </div>

        </div>
      </div>

<?php
  include("footer.php");
?>
