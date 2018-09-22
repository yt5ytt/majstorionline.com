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
            </div>

            <div class="postavljeni">

            <?php
              if(@$_GET["identOglasa"]){
                $identOglasa = $_GET["identOglasa"];
                $upit = "select * from oglasi where identOglasa='$identOglasa' limit 1";
                $rez = $db -> query($upit);
                $obj = mysqli_fetch_object($rez);
                $tempTime = $obj -> vreme;
                $tempDate = explode(" ", $tempTime);
                $tempDatum = $tempDate[0];
                $tempVreme = $tempDate[1];
                $datum = datum($tempDatum);
                $vreme = vreme($tempVreme);
                $zanat = $obj -> zanat;
                $identOglasa = $obj -> identoglasa;
                $opis = nl2br($obj -> opis);
                $slika1 = $obj -> slika1;
                $slika2 = $obj -> slika2;
                $slika3 = $obj -> slika3;
                $klijent = $obj -> klijent;
                $status = $obj -> status;

                $upitKlijent = "select * from klijenti where ident='$klijent' limit 1";
                $rezKlijent = $db -> query($upitKlijent);
                $objKlijent = mysqli_fetch_object($rezKlijent);
                  $ime = $objKlijent -> ime;
                  $prezime = $objKlijent -> prezime;
            ?>
            <div class="jedanoglas-box">
              <div class="jedanoglas">
                <div class="oglas-naslov">
                  <h2>POTREBAN <?php echo $zanat; ?></h2>
                  <small class="vreme"><i>Postavljeno: <?php echo $datum . " " . $vreme; ?></i></small>
                </div>
                <div class="oglas-opis">
                  <p>
                    <?php echo $opis; ?>
                  </p>
                </div>

                <div class="oglas-slike">

                <?php
                  if(@$slika1 or @$slika2 or @$slika3){
                ?>

                  <!-- Container for the image gallery -->
                  <div class="container">

                   <!-- Full-width images with number text -->
                <?php if(@$slika1){ ?>
                   <div class="mySlides">
                     <div class="numbertext">1 / 3</div>
                       <img src="../img/slikeOglasa/<?php echo $identOglasa; ?>/<?php echo $slika1; ?>" style="width:100%">
                   </div>
                <?php } ?>

                <?php if(@$slika2){ ?>

                   <div class="mySlides">
                     <div class="numbertext">2 / 3</div>
                       <img src="../img/slikeOglasa/<?php echo $identOglasa; ?>/<?php echo $slika2; ?>" style="width:100%">
                   </div>
                <?php } ?>

                <?php if(@$slika3){ ?>

                   <div class="mySlides">
                     <div class="numbertext">3 / 3</div>
                       <img src="../img/slikeOglasa/<?php echo $identOglasa; ?>/<?php echo $slika3; ?>" style="width:100%">
                   </div>
                <?php } ?>

                   <!-- Next and previous buttons -->
                <?php if(@$slika1 OR @$slika2 OR @$slika3){ ?>
                   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                   <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <?php } ?>

                   <!-- Image text -->
                <?php if(@$slika1 OR @$slika2 OR @$slika3){ ?>
                   <div class="caption-container">
                     <p id="caption"></p>
                   </div>
                <?php } ?>

                   <!-- Thumbnail images -->
                   <div class="row">
                <?php if(@$slika1){ ?>
                     <div class="column">
                       <img class="demo cursor" src="../img/slikeOglasa/<?php echo $identOglasa; ?>/<?php echo $slika1; ?>" style="width:100%" onclick="currentSlide(1)" alt="POTREBAN <?php echo $zanat; ?>">
                     </div>
                <?php } ?>
                <?php if(@$slika2){ ?>
                     <div class="column">
                       <img class="demo cursor" src="../img/slikeOglasa/<?php echo $identOglasa; ?>/<?php echo $slika2; ?>" style="width:100%" onclick="currentSlide(2)" alt="POTREBAN <?php echo $zanat; ?>">
                     </div>
                <?php } ?>
                <?php if(@$slika3){ ?>
                     <div class="column">
                       <img class="demo cursor" src="../img/slikeOglasa/<?php echo $identOglasa; ?>/<?php echo $slika3; ?>" style="width:100%" onclick="currentSlide(3)" alt="POTREBAN <?php echo $zanat; ?>">
                     </div>
                <?php } ?>
                   </div>
                  </div>
                <?php
                  }else{

                    echo "<h2>Nema postavljenih slika!!!</h2>";

                  }
                ?>

               </div><!--kraj diva oglas-slike-->

             </div><!--kraj diva .jedanoglas-->

             <div class="dugmici">
              <ul>
                <li class="status">
                  <?php
                    if(@$status == 1){
                      ?>
                        <p style="color: green;">A K T I V A N</p>
                      <?php
                    }elseif(@$status == 0){
                      ?>
                        <p style="color: red;">NEAKTIVAN</p>
                      <?php
                    }
                  ?>
                </li>
                <?php
                  if(@$status == 1){
                    ?>
                      <li><a href="oglasStatus.php?identOglasa=<?php echo $identOglasa; ?>&naredba=arhiviraj">Arhiviraj</a></li>
                    <?php
                  }elseif(@$status == 0){
                    ?>
                      <li><a href="oglasStatus.php?identOglasa=<?php echo $identOglasa; ?>&naredba=aktiviraj">Aktiviraj</a></li>
                    <?php
                  }
                 ?>
                <li><a href="oglasStatus.php?identOglasa=<?php echo $identOglasa; ?>&naredba=obrisi" style="color: red;">Obriši</a></li>
              </ul>
             </div>
           </div><!--kraj diva jedanoglas-box-->

             <div class="ponude">

               <?php
                $upitOglas = "select * from $identOglasa order by vreme desc";
                $rezOglas = $db -> query($upitOglas);
                while($objOglas = mysqli_fetch_object($rezOglas)){
                  $majstor = $objOglas -> majstor;
                  $ponuda = $objOglas -> ponuda;
                  $tempTime = $objOglas -> vreme;
                  $tempDate = explode(" ", $tempTime);
                  $tempDatum = $tempDate[0];
                  $tempVreme = $tempDate[1];
                  $datum = datum($tempDatum);
                  $vreme = vreme($tempVreme);
                  $upitMajstor = "select * from majstori where ident='$majstor'";
                  $rezMajstor = $db -> query($upitMajstor);
                  $objMajstor = mysqli_fetch_object($rezMajstor);
                  $ime = $objMajstor -> ime;
                  $prezime = $objMajstor -> prezime;
                  $name = $ime . " " . $prezime;
                  $zanat = $objMajstor -> delatnost;
                  $opisDelatnosti = $objMajstor -> opis;

               ?>

               <div class="jedna-ponuda">

               <div class="ponude-box">
                 <h2><?php echo $name; ?></h2>
                 <small><?php echo $zanat . " / Postavljeno: " . $datum . " " . $vreme; ?></small><br /><br /><br />
                 <h3>PONUDA</h3><br />
                 <p><?php echo $ponuda; ?></p><br /><br /><br />
                 <h3>OPIS DELATNOSTI KOJU OBAVLJA</h3><br />
                 <p><?php echo $opisDelatnosti; ?></p>
               </div>

               <div class="dugmici">

                 <ul>
                   <li><a href="#">Pošalji poruku</a></li>
                 </ul>

               </div>

             </div><!--kraj diva jedna-ponuda-->

              <?php
                }
              ?>

             </div><!--kraj diva ponude-->


             <?php
              }else{

            ?>

              <h1>Postavljeni oglasi</h1>

              <?php
                $upit = "select * from oglasi where klijent='$ident' order by vreme desc";
                $rez = $db -> query($upit);
                while($obj = mysqli_fetch_object($rez)){
                  $tempTime = $obj -> vreme;
                  $tempDate = explode(" ", $tempTime);
                  $tempDatum = $tempDate[0];
                  $tempVreme = $tempDate[1];
                  $datum = datum($tempDatum);
                  $vreme = vreme($tempVreme);
                  $zanat = $obj -> zanat;
                  $identOglasa = $obj -> identoglasa;
                  $opis = nl2br($obj -> opis);
                  $slika1 = $obj -> slika1;
                  $slika2 = $obj -> slika2;
                  $slika3 = $obj -> slika3;

              ?>
              <div class="red">
                <a href="profile.php?identOglasa=<?php echo $identOglasa; ?>">
                  <div class="oglas">
                    <div class="oglas-naslov">
                      <h2>POTREBAN <?php echo $zanat; ?></h2>
                      <small class="vreme"><i>Postavljeno: <?php echo $datum . " " . $vreme; ?></i></small>
                    </div>
                    <div class="oglas-opis">
                      <p>
                        <?php
                          $uzorak = substr($obj -> opis, 0 ,150);
                          $brojSlova = strlen($opis);
                          if(150 < $brojSlova){
                            $deo = $uzorak . " ... <em class='more'>dalje</em>";
                            echo $deo;
                          }else{
                            echo $uzorak;
                          }
                        ?>
                      </p>
                    </div>
                  </div>
                </a>
              </div>


              <?php
              }
                }
              ?>

            </div><!--kraj diva .postavljeni-->


          </div>
        </div>

      </div>



<?php
  include("footer.php");
?>
