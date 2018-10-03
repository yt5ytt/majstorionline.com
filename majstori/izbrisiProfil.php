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
        <div class="profile-box wrapper">
          <?php include("sideMenu.php"); ?>

          <div id="inbox">
            <h2>IZBRIŠI PROFIL</h2>

            <div class="izmeniProfil">
<?php
            if(@$_GET["odgovor"] == "izbrisi"){

              $upit = "select * from oglasi";
              $rez = $db -> query($upit);
              while($obj = mysqli_fetch_object($rez)){
                $identOglasa = $obj -> identoglasa;
                $upitOglasi = "select majstor from $identOglasa";
                $rezOglasi = $db -> query($upitOglasa);
                while($objOglasi = mysqli_fetch_object($rezOglasi)){
                  $majstor = $objOglasi -> majstor;
                  if($majstor == $ident){
                    $db -> query("delete from $identOglasa where majstor='$ident'");
                  }
                }
              }
              $db -> query("drop table inbox_$ident");
              $db -> query("delete from majstori where ident='$ident'");
              session_destroy();

?>
              <script type="text/javascript">
                window.location.href = "../index.php";
              </script>
<?php

            }else{
?>

              <div class="podaci">

                <div class="naslov">
                  <h3><b>P A Ž NJ A ! ! !</b></h3>
                </div>
                <div class="telo">

                  <section>
                    Da li ste sigurni da želite da ukonite vaš profil. Svi vaši podaci i vaši postavljeni oglasi će biti obrisani.
                  </section>

                  <section class="dvaDugmeta">
                    <button class="submit" onclick="window.location='izbrisiProfil.php?odgovor=izbrisi'">Ukloni</button>
                    <button class="submit" onclick="window.location='profile.php'">Odustani</button>
                  </section>


                </div>

              </div><!--kraj diva .podaci-->
<?php
            }
?>


            </div><!--kraj diva .izmeniProfil-->

          </div><!--kraj diva #inbox-->

        </div>

      </div>

<?php
  include("footer.php");
?>
