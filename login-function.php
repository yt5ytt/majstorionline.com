<?php
  session_start();
  include("db/db_connect.php");
  include("header.php");
?>

    <title>Majstori Online - Login</title>
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
                  <li><a href="idejaSajta.php">IDEJA SAJTA</a></li>
                  <li><a href="index.php">POČETNA</a></li>
                  <li><a href="registracija/register.php?korisnik=klijent">REGISTRUJ SE</a></li>
                </ul>
              </nav>
          </div>
      </div>

      <div class="middle-box wrapper">
        <?php
          $email = $_POST["email"];
          $password = $_POST["password"];
          $kategorija = $_POST["kategorija"];

          $upit = "select ident, email, password from $kategorija where email='$email' limit 1";
          $rez = $db -> query($upit);
          $numRows = $rez -> num_rows;

          if($numRows == 0){
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
            while ($obj = mysqli_fetch_object($rez)) {
              $dbEmail = $obj -> email;
              $dbPass = $obj -> password;
              $ident = $obj -> ident;

              if($password != $dbPass){
        ?>
            <div class="conf-box wrapper">
              <div class="notification">
                <div class="title">
                  <h2>OBAVEŠTENJE</h2>
                </div>
                <div class="body">
                  <p>Pogrešili ste lozinku, pokušajte ponovo!</p>
                  <input type="submit" class="submit" onclick="history.back(-1)" value="NAZAD" />
                </div>
              </div>
            </div>
        <?php

              }else{

                $_SESSION["email"] = $email;
                $_SESSION["ident"] = $ident;
        ?>
          <script type="text/javascript">
            window.location.href = "<?php echo $kategorija;?>/index.php";
          </script>

        <?php

              }
            }
          }
        ?>
      </div>
<?php
  include("footer.php");
?>
