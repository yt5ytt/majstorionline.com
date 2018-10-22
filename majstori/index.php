<?php
  session_start();
  include("header.php");
  @$email = $_SESSION["email"];
  @$ident = $_SESSION["ident"];
  include("../db/db_connect.php");
?>

    <title>Majstori - Početna</title>
  </head>
  <body>
    <div id="main" role="main">
      <?php
        $upitProfil = "select * from majstori where email='$email'";
        $rezProfil = $db -> query($upitProfil);
        while($objProfil = mysqli_fetch_object($rezProfil)){
          $ident = $objProfil -> ident;
          $_SESSION["username"] = $objProfil -> username;
        }

        include("topMenu.php");
      ?>

      <div class="top-banner">
        <div class="box">
          <div class="banner wrapper">
            <h1>MajstoriOnline<small>.com</small></h1>
          </div>
        </div>
      </div>

      <div id="body">
        <div class="wrapper">

<?php
        $upitGlavni = "select * from glavni_zanat order by zanat asc";
        $rezGlavni = $db -> query($upitGlavni);
        while($objGlavni = mysqli_fetch_object($rezGlavni)){
          $zanatGlavni = $objGlavni -> zanat;
?>
            <div class="link-box">
              <div class="link">
                <a href="pretraga.php?zanat=<?php echo $zanatGlavni; ?>"><?php echo $zanatGlavni; ?></a>
              </div>
            </div>


<?php

        }

        $upitPomocni = "select * from pomocni_zanat order by zanat asc";
        $rezPomocni = $db -> query($upitPomocni);
        while($objPomocni = mysqli_fetch_object($rezPomocni)){
          $zanatPomocni = $objPomocni -> zanat;
?>
            <div class="link-box">
              <div class="link">
                <a href="pretraga.php?zanat=<?php echo $zanatPomocni; ?>"><?php echo $zanatPomocni; ?></a>
              </div>
            </div>


<?php
        }
?>
        </div>
      </div>

<?php
  include("footer.php");
?>
