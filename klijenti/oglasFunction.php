<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  $username = $_SESSION["username"];
  include("../db/db_connect.php");
  ?>

      <title>Klijenti - Postavi Oglas</title>
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
                    <li><a href="#">POSTAVI OGLAS</a></li>
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

              if(@$_POST["ident"]){

                $ident = $_POST["ident"];
                $zanat = $_POST["zanat"];
                $lokacija = $_POST["lokacija"];
                $opisPosla = $_POST["opisPosla"];
                $rand = rand(1111111,9999999);
                $identOglasa = "oglas" . $rand;
                $dirLocation = "../img/slikeOglasa/" . $identOglasa;
                $directory = mkdir($dirLocation, 0777, true);
                chmod($dirLocation, 0777);

                if(!empty($_FILES["slika1"])){
                  $fileName1 = $_FILES['slika1']['name'];
                  $tempName1 = $_FILES['slika1']['tmp_name'];

                  move_uploaded_file($tempName1, "$dirLocation/$fileName1");
                }

                if(!empty($_FILES["slika2"])){
                  $fileName2 = $_FILES['slika2']['name'];
                  $tempName2 = $_FILES['slika2']['tmp_name'];

                  move_uploaded_file($tempName2, "$dirLocation/$fileName2");
                }

                if(!empty($_FILES["slika3"])){
                  $fileName3 = $_FILES['slika3']['name'];
                  $tempName3 = $_FILES['slika3']['tmp_name'];

                  move_uploaded_file($tempName3, "$dirLocation/$fileName3");
                }

                $oglas = "insert into oglasi (identoglasa, zanat, opis, slika1, slika2, slika3, klijent) values ('$identOglasa', '$zanat', '$opisPosla', '$fileName1', '$fileName2', '$fileName3', '$ident')";
                $unosOglasa = $db -> query($oglas);

                if($unosOglasa){
?>
                  <h2 class="oglas">Uspešno ste postavili vaš oglas!</h2>
<?php
                    $addTabela = "create table $identOglasa
                    (id int(5) not null auto_increment primary key,
                    vreme timestamp,
                    majstor varchar(20) not null,
                    ponuda text)";
                    $createTabela = $db -> query($addTabela);

                }

              }
?>
            </div>

          </div>
        </div>

  <?php
    include("footer.php");
  ?>
