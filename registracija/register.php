<?php
  include("header.php");
 ?>

    <title>Majstori Online - Registruj se</title>
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
              if($_GET["korisnik"] == "klijent"){

                //Ovde ide forma za klijenta
            ?>
              <div class="reg-head">
                <ul>
                  <li class="active"><a href="register.php?korisnik=klijent">Registruj klijenta</a></li>
                  <li><a href="register.php?korisnik=majstor">Registruj majstora</a></li>
                </ul>
              </div>
              <div class="reg-body">
                <form action="reg-function.php" method="post">
                  <input class="login-text" type="text" name="username" placeholder="Korisničko ime" required>
                  <input class="login-text" type="email" name="email" placeholder="Email" required>
                  <input class="login-text" type="text" name="passwd" placeholder="Lozinka" required>
                  <input class="login-text" type="text" name="passwd1" placeholder="Ponovi lozinku" required>
                  <input class="login-text" type="text" name="ime" placeholder="Ime" required>
                  <input class="login-text" type="text" name="prezime" placeholder="Prezime" required>
                  <input class="login-text" type="text" name="adresa" placeholder="Adresa" required>
                  <input class="login-text" type="text" name="grad" placeholder="Grad" required>
                  <input class="login-text" type="text" name="telefon" placeholder="Kontakt telefon" required>
                  <input class="login-text" type="text" name="telefon1" placeholder="Drugi kontakt telefon (opciono)">
                  <?php
                    $num1 = rand(1,9);
                    $num2 = rand(1,9);
                    $sum = $num1 + $num2;
                   ?>
                  <input class="login-text" type="text" name="potvrda" placeholder="Potvrdite da niste robot: Koliko je <?php echo $num1; ?> + <?php echo $num2; ?> (OBAVEZNO)" required>
                  <input type="hidden" name="sum" value="<?php echo $sum; ?>" >
                  <input type="hidden" name="korisnik" value="klijent">
                  <input class="submit" type="submit" name="submit" value="REGISTRUJ SE">
                </form>
              </div>
              <br />

            <?php
              }elseif($_GET["korisnik"] == "majstor"){

                //Ovde ide forma za majstora

            ?>

            <div class="reg-head">
              <ul>
                <li><a href="register.php?korisnik=klijent">Registruj klijenta</a></li>
                <li class="active"><a href="register.php?korisnik=majstor">Registruj majstora</a></li>
              </ul>
            </div>
            <div class="reg-body">
              <form action="reg-function.php" method="post">
                <input class="login-text" type="username" name="username" placeholder="Korisničko ime" required>
                <input class="login-text" type="email" name="email" placeholder="Email" required>
                <input class="login-text" type="text" name="passwd" placeholder="Lozinka" required>
                <input class="login-text" type="text" name="passwd1" placeholder="Ponovi lozinku" required>
                <input class="login-text" type="text" name="ime" placeholder="Ime" required>
                <input class="login-text" type="text" name="prezime" placeholder="Prezime" required>
                <input class="login-text" type="text" name="adresa" placeholder="Adresa" required>
                <input class="login-text" type="text" name="telefon" placeholder="Kontakt telefon" required>
                <input class="login-text" type="text" name="telefon1" placeholder="Drugi kontakt telefon (opciono)">
                <?php
                  $num1 = rand(1,9);
                  $num2 = rand(1,9);
                  $sum = $num1 + $num2;
                 ?>
                <input class="login-text" type="text" name="potvrda" placeholder="Potvrdite da niste robot: Koliko je <?php echo $num1; ?> + <?php echo $num2; ?> (OBAVEZNO)">
                <input type="hidden" name="sum" value="<?php echo $sum; ?>" >
                <input class="submit" type="submit" name="submit" value="REGISTRUJ SE">
              </form>
            </div>
            <br />

            <?php

              }
            ?>

          </div>
        </div>
      </div>
<?php
  include("footer.php");
?>
