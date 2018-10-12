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
                <h2>MajstoriOnline<small>.com</small></h2>
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

      <div class="middle-box wrapper">
        <div class="login-form">

          <div class="title">
            <h2>LOGIN</h2>
          </div>

            <form class="login-forma" action="login-function.php" method="post">
              <input class="login-text" type="email" name="email" placeholder="Email adresa" required>
              <input class="login-text" type="password" name="password" placeholder="Lozinka" required>
              <select class="login-text" name="kategorija">
                <option value="majstori">Majstor</option>
                <option value="klijenti">Klijent</option>
              </select>
              <input class="submit" type="submit" name="submit" value="ULOGUJ SE"><br />
              <a class="forgotten" href="zaboravljenaLozinka.php">Zaboravili ste lozinku?</a>
            </form>
            
        </div>
      </div>
<?php
  include("footer.php");
?>
