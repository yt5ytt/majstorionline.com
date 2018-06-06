<?php
  include("header.php");
 ?>

    <title>Radna Akcija - Početna</title>
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
                  <li><a href="#">REGISTRUJ SE</a></li>
                </ul>
              </nav>
          </div>
      </div>

      <div class="middle-box">
        <div class="login-form">
          <div class="login-box">
            <h3>LOGIN</h3>
            <form class="login-forma" action="login.php" method="post">
              <input class="login-text" type="username" name="username" placeholder="Korisničko ime" required>
              <input class="login-text" type="password" name="password" placeholder="Lozinka" required>
              <input class="submit" type="submit" name="submit" value="ULOGUJ SE">
            </form>
          </div>
        </div>
      </div>
<?php
  include("footer.php");
?>
