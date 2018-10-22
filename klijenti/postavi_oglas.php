<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
?>

    <title>Klijenti - Postavi Oglas</title>
  </head>
  <body>
    <div id="main" role="main">
      <?php
        $upitProfil = "select * from klijenti where email='$email'";
        $rezProfil = $db -> query($upitProfil);
        while($objProfil = mysqli_fetch_object($rezProfil)){
          $ident = $objProfil -> ident;
          $_SESSION["username"] = $objProfil -> username;
        }
        include('topMenu.php');
      ?>
      <div class="top-banner">
        <div class="box">
          <div class="banner wrapper">
            <h1>MajstoriOnline<small>.com</small></h1>
          </div>
        </div>
      </div>

      <div id="body">
        <div class="body-box wrapper">
          <div class="sidebar">
            <ul>
              <li><a href="index.php">Početak</a></li>
            </ul>
          </div>

          <div class="main-box">

            <form class="postaviOglas" action="oglasFunction.php" method="post" enctype="multipart/form-data">
              <section class="row">
                <label for="zanat">POTREBAN</label>
                <select name="zanat">
  <?php
                $upitGlavni = "select * from glavni_zanat order by zanat asc";
                $rezGlavni = $db -> query($upitGlavni);
                while($objGlavni = mysqli_fetch_object($rezGlavni)){
                  $glavniZanat = $objGlavni -> zanat;
  ?>
                  <option value="<?php echo $glavniZanat; ?>"><?php echo $glavniZanat; ?></option>
  <?php
                }

                $upitPomocni = "select * from pomocni_zanat order by zanat asc";
                $rezPomocni = $db -> query($upitPomocni);
                while($objPomocni = mysqli_fetch_object($rezPomocni)){
                  $pomocniZanat = $objPomocni -> zanat;
  ?>
                  <option value="<?php echo $pomocniZanat; ?>"><?php echo $pomocniZanat; ?></option>
  <?php
                }
?>
                </select>
              </section>
              <section class="row">
                <label for="lokacija">LOKACIJA</label>
                <input type="text" name="lokacija" required>
              </section>

              <section class="row">
                <label class="opis" for="kratakOpis">KRATAK OPIS POTREBNOG POSLA</label>
                <textarea type="text" name="opisPosla"></textarea>
              </section>

              <section class="row">
                <label for="prvaSlika">SLIKA 1</label>
                <input type="file" name="slika1">
              </section>

              <section class="row">
                <label for="drugaSlika">SLIKA 2</label>
                <input type="file" name="slika2">
              </section>

              <section class="row">
                <label for="trecaSlika">SLIKA 3</label>
                <input type="file" name="slika3">
              </section>


              <input type="hidden" name="ident" value="<?php echo $ident; ?>">

              <section class="row">

                <button type="submit" name="button">OBJAVI POSAO</button>

              </section>

            </form>

          </div>


        </div>
      </div>

<?php
  include("footer.php");
?>
