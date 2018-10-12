<?php
  include("header.php");
  include("db/db_connect.php");
?>

    <title>Majstori Online - Login</title>
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
                  <li><a href="index.php">POČETNA</a></li>
                  <li><a href="registracija/register.php?korisnik=klijent">REGISTRUJ SE</a></li>
                </ul>
              </nav>
          </div>
      </div>

      <div class="middle-box">
        <div class="login-form">
<?php
          if(@$_POST["submitLozinka"]){

            $email = $_POST["email"];
            $upitMajstori = "select email from majstori where email='$email'";
            $rezMajstori = $db -> query($upitMajstori);
            $majstori = $rezMajstori -> num_rows;
            $upitKlijenti = "select email from klijenti where email='$email'";
            $rezKlijenti = $db -> query($upitKlijenti);
            $klijenti = $rezKlijenti -> num_rows;
            if($majstori === 0 AND $klijenti === 0){

?>
              <div class="conf-box wrapper">
                <div class="notification">
                  <div class="title">
                    <h2>OBAVEŠTENJE</h2>
                  </div>
                  <div class="body">
                    <p>Korisnik sa ovom email adresom ne postoji, pokušajte ponovo!</p>
                    <input type="submit" class="submit" onclick="history.back(-1)" value="NAZAD" />
                  </div>
                </div>
              </div>

<?php
            }else{

              $subject = "MajstoriOnline.com - Reset lozinke za logovanje";
              $rand = rand(1111,9999);
              $novaLozinka = "mo" . $rand;
              $db -> query("update majstori set password='$novaLozinka' where email='$email'");
              $db -> query("update klijenti set password='$novaLozinka' where email='$email'");
              $poruka = "
              Poštovani,\n
              tražili ste da resetujete svoju lozinku na našem sajtu. Nova lozinka za ovu email adresu će biti:\n\
              $novaLozinka\n
              Ukoliko imate registrovan nalog i kao klijent i kao majstor sa istom email adresom, lozinka će biti resetovana na oba naloga.\n
              S'poštovanjem\n
              MajstoriOnline.com
              ";
              $zaglavlje = "From: MajstoriOnline.com";

              mail($email, $subject, $poruka, $zaglavlje);
?>
              <div class="conf-box wrapper">
                <div class="notification">
                  <div class="title">
                    <h2>OBAVEŠTENJE</h2>
                  </div>
                  <div class="body">
                    <p>Poruka sa novom lozinkom je poslata na vašu email adresu. Znajte da ako imate registrovan nalog i kao majstor i kao klijent sa istom email adresom, promena će važiti za oba naloga. Vašu lozinku možete ponovo promeniti u odeljku profila vašeg naloga.</p>
                    <input type="submit" class="submit" onclick="location.href='login.php'" value="NAZAD" />
                  </div>
                </div>
              </div>
<?php
            }

          }else{
?>



              <div class="title">
                <h2>Unesite svoju email adresu</h2>
              </div>

              <form class="login-forma" action="zaboravljenaLozinka.php" method="post">
                <input class="login-text" type="email" name="email" placeholder="Email adresa" required>
                <input class="submit" type="submit" name="submit" value="POŠALJI"><br />
              </form>


<?php
          }

?>
        </div>
      </div>
<?php
  include("footer.php");
?>
