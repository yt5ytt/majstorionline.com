<?php
  include('../db/db_connect.php');
  include("header.php");
 ?>

    <title>Majstori Online - Registracija</title>
  </head>
  <body>
    <div id="container">
      <div class="top-line">
          <div class="logo-nav wrapper">
              <div class="logo">

              </div>
              <nav>
                <ul>
                  <li><a href="#">IDEJA SAJTA</a></li>
                  <li><a href="../index.php">POČETNA</a></li>
                  <li><a href="register.php?korisnik=klijent">REGISTRUJ SE</a></li>
                </ul>
              </nav>
          </div>
      </div>

      <div class="wrapper">
        <div class="register-box">
          <h1>REGISTRACIJA</h1><br />
          <p>Klikom na <strong>Registruj klijenta</strong> registrovaćete se kao klijent kome je potreban majstor za izvođenje radova, a klikom na <strong>Registruj majstora</strong> registrovaćete se kao majstor koji konkuriše za ponuđene poslove</p><br />

          <div class="reg-form">
            <?php

              if($_POST["submit"] AND $_POST["korisnik"] == "klijent"){

                //Ovde ide registrovanje klijenta

                $rand = rand(1111111, 9999999);
                $ident = "k" . $rand;
                $email = $_POST["email"];
                $password = $_POST["passwd"];
                $password1 = $_POST["passwd1"];
                $username = $_POST["username"];
                $ime = $_POST["ime"];
                $prezime = $_POST["prezime"];
                $adresa = $_POST["adresa"];
                $grad = $_POST["grad"];
                $telefon1 = $_POST["telefon"];
                $telefon2 = $_POST["telefon1"];
                $potvrda = $_POST["potvrda"];
                $sum = $_POST["sum"];

                $upit = "select email from klijenti";
                $rez = $db -> query($upit);
                while($check_mail = mysqli_fetch_object($rez)){

                  $check_email = $check_mail -> email;

                  if($email != $check_email){

                    continue;

                  }elseif($email == $check_email){

                    //Ovde kod za klijenta da email vec postoji

                  ?>
                    <div class="conf-box">
                      <h2>Klijent sa ovom email adresom već postoji, pokušajte ponovo!</h2><br />
                      <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>

                    </div>


                  <?php

                    goto Footer;

                  }

                }

                if($password != $password1){

                  //Ovde kod da potvrda passworda nije uspela
                  ?>
                    <div class="conf-box">
                      <h2>Niste oba puta upisali istu lozinku, pokušajte ponovo!</h2><br />
                        <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>
                    </div>


                  <?php

                }elseif($potvrda != $sum){

                  //Ovde kod da potvrda za robota nije uspela
                  ?>
                    <div class="conf-box">
                      <h2>Potvrda da niste robot nije uspela, pokušajte ponovo!</h2><br />
                        <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>
                    </div>


                  <?php

                }else{

                  //Ovde kod da registracija moze da se nastavi

                  $sql_upit = "insert into klijenti (ident, email, password, username, ime, prezime) values ('$ident', '$email', '$password', '$username', '$ime', '$prezime')";
                  $upis = $db -> query($sql_upit);

                  $addTabela = "create table inbox_$ident
                  (id int(5) not null auto_increment primary key,
                  vreme timestamp not null default current_timestamp,
                  korespondent varchar(20) not null,
                  posiljalac varchar(20) not null,
                  primala varchar(20) not null,
                  poruka text,
                  status int(1) not null default 0)";
                  $createTabela = $db -> query($addTabela);

                    if($upis AND $createTabela){

                    ?>
                      <div class="conf-box">
                        <h2>Uspešno ste se registrovali, sad se možete ulogovati!</h2><br />
                        <a class="submit" href="../login.php">Uloguj se</a>
                      </div>


                    <?php
                  }else{

                    echo "Doslo je negde do greske";

                  }
                }

            ?>


            <?php
          }elseif($_POST["submit"] AND $_POST["korisnik"] == "majstor"){

                //Ovde ide forma za majstora

                $rand = rand(1111111, 9999999);
                $ident = "m" . $rand;
                $email = $_POST["email"];
                $password = $_POST["passwd"];
                $password1 = $_POST["passwd1"];
                $username = $_POST["username"];
                $ime = $_POST["ime"];
                $prezime = $_POST["prezime"];
                $adresa = $_POST["adresa"];
                $grad = $_POST["grad"];
                $telefon = $_POST["telefon"];
                $opis = $_POST["opis"];
                $delatnost = $_POST["delatnost"];
                $potvrda = $_POST["potvrda"];
                $sum = $_POST["sum"];

                $upit = "select email from majstori";
                $rez = $db -> query($upit);
                while($check_mail = mysqli_fetch_object($rez)){

                  $check_email = $check_mail -> email;

                  if($email != $check_email){

                    continue;

                  }elseif($email == $check_email){

                    //Ovde kod za klijenta da email vec postoji

                  ?>
                    <div class="conf-box">
                      <h2>Majstor sa ovom email adresom već postoji, pokušajte ponovo!</h2><br />
                      <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>

                    </div>


                  <?php

                    goto Footer;

                  }

                }

                if($password != $password1){

                  //Ovde kod da potvrda passworda nije uspela
                  ?>
                    <div class="conf-box">
                      <h2>Niste oba puta upisali istu lozinku, pokušajte ponovo!</h2><br />
                        <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>
                    </div>


                  <?php

                }elseif($potvrda != $sum){

                  //Ovde kod da potvrda za robota nije uspela
                  ?>
                    <div class="conf-box">
                      <h2>Potvrda da niste robot nije uspela, pokušajte ponovo!</h2><br />
                        <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>
                    </div>


                  <?php

                }else{

                  //Ovde kod da registracija moze da se nastavi

                  $sql_upit = "insert into majstori (ident, email, password, username, ime, prezime, opis, delatnost) values ('$ident', '$email', '$password', '$username', '$ime', '$prezime', '$opis', '$delatnost')";
                  $upis = $db -> query($sql_upit);

                  $addTabela = "create table inbox_$ident
                  (id int(5) not null auto_increment primary key,
                  vreme timestamp not null default current_timestamp,
                  korespondent varchar(20) not null,
                  posiljalac varchar(20) not null,
                  primala varchar(20) not null,
                  poruka text,
                  status int(1) not null default 0)";
                  $createTabela = $db -> query($addTabela);

                    if($upis AND $addTabela){

                    ?>
                      <div class="conf-box">
                        <h2>Uspešno ste se registrovali, sad se možete ulogovati!</h2><br />
                        <a class="submit" href="../login.php">Uloguj se</a>
                      </div>


                    <?php
                  }else{

                    echo "Doslo je negde do greske";

                  }
                }

            ?>


            <?php

              }
            ?>

          </div>
        </div>
      </div>
<?php
Footer:
  include("footer.php");
?>
