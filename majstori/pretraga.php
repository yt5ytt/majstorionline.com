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

    <div class="body-box wrapper">
      <h2>Pretraga po kategoriji <?php echo $zanat; ?></h2>
    </div>

    <div class="pretraga-main wrapper">
<?php
      $upit = "select * from oglasi where zanat='$zanat' order by vreme desc";
      $rez = $db -> query($upit);
      while($obj = mysqli_fetch_object($rez)) {
        $tempTime = $obj -> vreme;

        echo vreme($tempTime) . "<br />";

        /*$tempDate = explode(" ", $tempTime);
        $tempDatum = $tempDate[0];
        $tempVreme = $tempDate[1];*/


        //echo $datum;

        //echo $dan. "." . $mesec . "." . $godina. ". " . $sat . ":" . $minut . "<br />";

      }
 ?>
    </div>

    <div class="link-box1 wrapper">
      <a class="submit" href="#" onclick="history.back(-1)">Nazad</a>
    </div>

<?php
  include("footer.php");
?>
