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
        <div class="notification">

          <div class="title">
            <h2>OBAVEŠTENJE</h2>
          </div>

          <div class="body">
            <p>Da biste ste mogli da postavite oglas, prvo se morate registrovati kao klijent</p>
            <button class="submit" onclick="window.location='registracija/register.php?korisnik=klijent'">REGISTRUJ SE</button>
          </div>

        </div>
      </div>
<?php
  include("footer.php");
?>
