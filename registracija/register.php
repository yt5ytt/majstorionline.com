<?php
  include('../db/db_connect.php');
  include("header.php");
 ?>

    <title>Majstori Online - Registruj se</title>
  </head>
  <body>
    <div id="container">
      <div class="top-line">
          <div class="logo-nav wrapper">
            <div class="logo">
              <h2>MajstoriOnline<small>.com</small></h2>
            </div>

            <span class="nav_btn"><i class="fa fa-bars"></i></span>

            <nav>
              <ul class="nav">
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
                  <input id="password" class="login-text" type="password" name="passwd" placeholder="Lozinka" required>
                  <input id="confirm_password" class="login-text" type="password" name="passwd1" placeholder="Ponovi lozinku" required>
                  <input class="login-text" type="text" name="ime" placeholder="Ime" required>
                  <input class="login-text" type="text" name="prezime" placeholder="Prezime" required>
                  <?php
                    $sum = rand(11,99);
                   ?>
                  <input class="login-text" type="text" name="potvrda" placeholder="Potvrdite da niste robot: Upišite <?php echo $sum; ?> (OBAVEZNO)" required>
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
                <input id="password" class="login-text" type="password" name="passwd" placeholder="Lozinka" required>
                <input id="confirm_password" class="login-text" type="password" name="passwd1" placeholder="Ponovi lozinku" required>
                <input class="login-text" type="text" name="ime" placeholder="Ime" required>
                <input class="login-text" type="text" name="prezime" placeholder="Prezime" required>
                <textarea class="login-text" type="text" name="opis" placeholder="Kratak opis delatnosti"></textarea>
                <select class="login-text" name="delatnost">
                    <option value="#" selected>--Delatnost--</option>
                  <?php
                    $upit1 = "select * from glavni_zanat order by zanat asc";
                    $rez1 = $db -> query($upit1);
                    while($obj1 = mysqli_fetch_object($rez1)){
                      $zanat1 = $obj1 -> zanat;
                    ?>
                      <option value="<?php echo $zanat1; ?>"><?php echo $zanat1; ?></option>
                    <?php
                    }

                    $upit2 = "select * from pomocni_zanat order by zanat asc";
                    $rez2 = $db -> query($upit2);
                    while($obj2 = mysqli_fetch_object($rez2)){
                      $zanat2 = $obj2 -> zanat;
                    ?>
                      <option value="<?php echo $zanat2; ?>"><?php echo $zanat2; ?></option>
                    <?php
                    }
                  ?>
                </select>

                <?php
                  $sum = rand(11,99);
                 ?>
                <input class="login-text" type="text" name="potvrda" placeholder="Potvrdite da niste robot: Upišite <?php echo $sum; ?> (OBAVEZNO)" required>
                <input type="hidden" name="sum" value="<?php echo $sum; ?>" >
                <input type="hidden" name="korisnik" value="majstor">
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
