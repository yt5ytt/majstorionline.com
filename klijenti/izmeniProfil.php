<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
  include("../db/db_connect.php");
?>

    <title>Klijenti - Izmeni Profil</title>
  </head>
  <body>
    <div id="main" role="main">
      <?php
        $upitProfil = "select * from klijenti where ident='$ident' limit 1";
        $rezProfil = $db -> query($upitProfil);
        while($objProfil = mysqli_fetch_object($rezProfil)){
          $username = $objProfil -> username;
          $password = $objProfil -> password;
          $ime = $objProfil -> ime;
          $prezime = $objProfil -> prezime;
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
        <div class="body-box wrapper">
          <div class="sidebar">
            <ul>
              <li><a href="index.php">Početak</a></li>
              <li><a href="#">Izmeni profil</a></li>
              <li><a href="#">Ukloni profil</a></li>
            </ul>
          </div>

          <div id="inbox">
            <h2>IZMENI PROFIL</h2>

            <div class="izmeniProfil">

              <div class="password">
                <div class="naslov">
                  <h3>IZMENITE LOZINKU</h3>
                </div>
                <div class="telo">
                  <form action="izmeniProfil.php" method="post">

                    <section>
                      <label>Lozinka: </label>
                      <input id="password" class="input" type="password" name="pass1" />
                    </section>

                    <section>
                      <label>Ponovite lozinku: </label>
                      <input id="confirm_password" class="input" type="password" name="pass2" />
                    </section>

                    <section>
                      <input class="submit" type="submit" name="lozinka" value="Izmeni lozinku">
                    </section>

<?php
                    if($_POST["lozinka"]){
                      $password = $_POST['pass1'];
                      $upit = "update klijenti set password='$password' where ident='$ident'";
                      $rez = $db -> query($upit);
                      if($rez){

                        echo "<section>Lozinka uspešno promenjena</section>";

                      }
                    }
?>

                  </form>
                </div>
              </div>

              <div class="podaci">

                <div class="naslov">
                  <h3>IZMENITE OSNOVNE PODATKE</h3>
                </div>
                <div class="telo">

<?php
                  if($_POST["podaci"]){
                    $username = $_POST['username'];
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $upit = "update klijenti set username='$username', ime='$ime', prezime='$prezime' where ident='$ident'";
                    $rez = $db -> query($upit);
                    if($rez){

                      echo "<section>Podaci uspešno promenjeni</section>";

                    }
?>
                    <section>
                      <button class="submit" onclick="window.location= 'profile.php'">Nazad</button>
                    </section>
<?php
                  }else{
?>

                  <form action="izmeniProfil.php" method="post">

                    <section>
                      <label>Korisničko ime: </label>
                      <input class="input" type="text" name="username" value="<?php echo $username; ?>" />
                    </section>

                    <section>
                      <label>Ime: </label>
                      <input class="input" type="text" name="ime" value="<?php echo $ime; ?>" />
                    </section>

                    <section>
                      <label>Prezime: </label>
                      <input class="input" type="text" name="prezime" value="<?php echo $prezime; ?>" />
                    </section>

                    <section>
                      <input class="submit" type="submit" name="podaci" value="Izmeni">
                    </section>

                  </form>

<?php
                  }
?>

                </div>

              </div>


            </div><!--kraj diva .izmeniProfil-->

          </div><!--kraj diva #inbox-->

        </div>

      </div>

<?php
  include("footer.php");
?>
