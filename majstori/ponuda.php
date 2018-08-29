<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
  include("../function.php");
?>

    <title>Majstori - Početna</title>
  </head>
  <body>
    <div id="main" role="main">
      <div class="top-line">
          <div class="logo-nav wrapper">
              <div class="logo">

              </div>
              <nav>
                <ul>
                  <li><a href="#">PORUKE</a></li>
                  <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
                  <li><a href="logout.php">ODJAVI SE</a></li>
                </ul>
              </nav>
          </div>
      </div>
      <div class="top-banner">
        <div class="box">
          <div class="banner wrapper">
            <h1>MajstoriOnline<small>.com</small></h1>
          </div>
        </div>
      </div>
<?php
      $zanat = $_GET["zanat"];
?>

    <div class="pretraga-main wrapper">

      <div id="sidebar">
        <ul>
          <li><a href="index.php">Početak</a></li>
          <li><a href="#">Izmeni profil</a></li>
          <li><a href="#">Ukloni profil</a></li>
        </ul>
      </div>
      <div id="oglasi">
<?php
      if($_POST["ponudaPosao"]){

        $upit = "select * from majstori where email='$email' limit 1";
        $rez = $db -> query($upit);
        $obj = mysqli_fetch_object($rez);

        $identMajstora = $obj -> ident;
        $identOglasa = $_POST["identOglasa"];
        $ponuda = $_POST["ponudaPosao"];

        $upis = $db -> query("insert into $identOglasa (majstor, ponuda) values ('$identMajstora', '$ponuda')");

        if($upis){
          echo "Upisano!!!";
        }else{
          echo "Nije upisano!!!";
        }

      }elseif($_GET["identOglasa"]){
        $identOglasa = $_GET["identOglasa"];
 ?>
        <h2>Ponudi uslugu</h2>
        <form class="ponudaPosao" action="ponuda.php" method="post">
          <label>
            <h3>Majstori ponudite svoje usluge na ovaj oglas. U svojoj ponudi možete da napišete kako ćete odraditi posao, koliko će da traje usluga i za koliku svotu novca biste odradili posao koji je u oglasu. Sva ostala komunikacija će se kasnije odvijati preko poruka na sajtu.</h3>
          </label>

          <textarea name="ponudaPosao" required></textarea>

          <input type="hidden" name="identOglasa" value="<?php echo $identOglasa; ?>">

          <button type="submit" name="submit">PONUDI USLUGU</button>
        </form>
<?php

}

?>

      </div>
    </div>

<?php
  include("footer.php");
?>
