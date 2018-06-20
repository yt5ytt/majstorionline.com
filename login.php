<?php
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

      <div class="middle-box">
        <div class="login-form">
          <div class="login-box">
            <h3>LOGIN</h3>
            <form class="login-forma" action="login-function.php" method="post">
              <input class="login-text" type="email" name="email" placeholder="Email adresa" required>
              <input class="login-text" type="password" name="password" placeholder="Lozinka" required>
              <select class="login-text" name="kategorija">
                <option value="majstori">Majstor</option>
                <option value="klijenti">Klijent</option>
              </select>
              <input class="submit" type="submit" name="submit" value="ULOGUJ SE"><br />
              <a class="forgotten" href="#">Zaboravili ste lozinku?</a>
            </form>
          </div>
        </div>
      </div>
<?php
  include("footer.php");
?>
