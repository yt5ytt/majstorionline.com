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

      <div class="middle-box" style="color: white;">
        <?php
          $email = $_POST["email"];
          $password = $_POST["password"];
          $kategorija = $_POST["kategorija"];

          $upit = "select ident, email, password from $kategorija where email='$email'";
          $rez = $db -> query($upit);
          $numRows = $rez -> num_rows;

          if($numRows == 0){
        ?>
            <div class="conf-box wrapper">
              <h2>Korisnik sa ovom email adresom ne postoji, pokušajte ponovo!</h2><br />
              <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>

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
            <h2>Pogrešili ste lozinku, pokušajte ponovo!</h2><br />
            <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>

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
