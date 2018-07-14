<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
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
              <nav>
                <ul>
                  <li><a href="#">PORUKE</a></li>
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
              <li><a href="#">Izmeni profil</a></li>
              <li><a href="#">Ukloni profil</a></li>
            </ul>
          </div>
          <div class="main-box">
            <div class="profile-box">
              <h1><?php echo $username; ?><small><?php echo "(" . $ident . ")"; ?></small></h1>
              <h3><?php echo $ime . " " . $prezime; ?></h3>
              <p><?php echo $email; ?></p>
              <p><?php echo $adresa; ?></p>
              <h3><?php echo $grad; ?></h3>
              <h3><?php echo $telefon1; ?></h3>
<?php
              if($telefon2 != ""){
?>
              <h3><?php echo $telefon2; ?></h3>

<?php
              }
?>
            </div>
          </div>
        </div>

      </div>

<?php
  include("footer.php");
?>
