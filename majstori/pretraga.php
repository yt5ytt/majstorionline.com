<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
  include("../function.php");
?>

    <title>Majstori - Početna</title>
  </head>
  <body>
    <div id="main" role="main">
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
<?php
      $zanat = $_GET["zanat"];
?>

    <div class="pretraga-main wrapper">

      <div id="sidebar">
        <ul>
          <li><a href="index.php">Početak</a></li>
          <li><a href="#">Izmeni profil</a></li>
          <li><a href="#">Ukloni profil</a></li>
        </ul>
      </div>
      <div id="oglasi">
        <h2>Pretraga po kategoriji <?php echo $zanat; ?></h2>

        <?php
          if(@$_GET["zanat"]){

            $upit = "select * from oglasi where zanat='$zanat' order by vreme desc";
            $rez = $db -> query($upit);
            while($obj = mysqli_fetch_object($rez)) {
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

              if($status == 0){
                continue;
              }

              $upitKlijent = "select * from klijenti where ident='$klijent' limit 1";
              $rezKlijent = $db -> query($upitKlijent);
              $objKlijent = mysqli_fetch_object($rezKlijent);
                $ime = $objKlijent -> ime;
                $prezime = $objKlijent -> prezime;
        ?>
        <a href="pretraga.php?identOglasa=<?php echo $identOglasa; ?>">
          <div class="oglas">
            <div class="oglas-naslov">
              <h2>POTREBAN <?php echo $zanat; ?></h2>
              <small class="vreme"><i>Postavljeno: <?php echo $datum . " " . $vreme; ?></i></small>
            </div>
            <div class="oglas-opis">
              <p>
                <?php
                  $uzorak = substr($obj -> opis, 0 ,250);
                  $brojSlova = strlen($opis);
                  if(250 < $brojSlova){
                    $deo = $uzorak . " ... <em class='more'>dalje</em>";
                    echo $deo;
                  }else{
                    echo $uzorak;
                  }
                ?>
              </p>
              <div class="oglasavac">
                <h3><em>Postavio: <?php echo $ime . " " . $prezime; ?></em></h3>
              </div>
            </div>
          </div>
        </a>


        <?php
            }
          }elseif($_GET["identOglasa"]){
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

            $upitKlijent = "select * from klijenti where ident='$klijent' limit 1";
            $rezKlijent = $db -> query($upitKlijent);
            $objKlijent = mysqli_fetch_object($rezKlijent);
              $ime = $objKlijent -> ime;
              $prezime = $objKlijent -> prezime;
        ?>
          <div class="jedanoglas">
            <div class="ponudi">
              <a class="submit" href="ponuda.php?identOglasa=<?php echo $identOglasa; ?>">Ponudi uslugu</a>
            </div>
            <div class="oglas-naslov">
              <h2>POTREBAN <?php echo $zanat; ?></h2>
              <small class="vreme"><i>Postavljeno: <?php echo $datum . " " . $vreme; ?></i></small>
            </div>
            <div class="oglas-opis">
              <p>
                <?php echo $opis; ?>
              </p>
              <div class="oglasavac">
                <h3><em>Postavio: <?php echo $ime . " " . $prezime; ?></em></h3>
              </div>
            </div>

            <div class="oglas-slike">

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

           </div><!--kraj diva oglas-slike-->
         </div><!--kraj diva .jedanoglas-->
        <?php
          }

        ?>

      </div><!--kraj diva id="oglasi"-->
    </div>

    <div class="link-box1 wrapper">
      <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>
    </div>

<?php
  include("footer.php");
?>
