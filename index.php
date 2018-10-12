<?php
  include("header.php");
 ?>

    <title>Majstori Online - Početna</title>
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
                  <li><a href="login.php">PRIJAVI SE</a></li>
                  <li><a href="registracija/register.php?korisnik=klijent">REGISTRUJ SE</a></li>
                </ul>
              </nav>
          </div>
      </div>

      <div class="middle-box wrapper">
        <div class="buttons">
          <div class="largeButton">
            <a href="registracija/spisakMajstora.php">
              (potreban ti je majstor)<br />
              <h2>OBJAVI<br />
              POSAO</h2>
            </a>
          </div>

          <div class="largeButton">
            <a href="registracija/pronadjiPosao.php">
              (majstori)<br />
              <h2>PRONAĐITE<br />
              POSAO</h2>
            </a>
          </div>

        </div>
      </div>






<?php
  include("footer.php");
?>
