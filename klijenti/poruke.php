<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
  include("../db/db_connect.php");
  include("../function.php");

?>

    <title>Klijenti - Početna</title>
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
      ?>
      <div class="top-line">
          <div class="logo-nav wrapper">
              <div class="logo">

              </div>

              <?php include('topMenu.php'); ?>

          </div>
      </div>
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
              <li><a href="logout.php">Odjavi se</a></li>
            </ul>
          </div>
          <div id="inbox">
            <h2>CENTAR ZA PORUKE</h2>
              <?php
                $majstor = $_GET["korespondent"];
                $imeMajstora = $_GET["imeMajstora"];
                $db -> query("update inbox_$ident set status=1 where korespondent='$majstor'");
                $upit = "select * from inbox_$ident where korespondent='$majstor'";
                $rez = $db -> query($upit);
                $brojPoruka = $rez -> num_rows;
                if($brojPoruka == 0){
              ?>
                <div class="nemaPoruka">
                  <h3>Nema poruka prema korisniku <strong><?php echo $imeMajstora; ?></strong>. Budite prvi koji će poslati poruku.</h3>
                </div>
              <?php
                }else{
              ?>
                <div class="nemaPoruka">
                  <h3>Poruke korisnika <?php echo $imeMajstora; ?></h3>
                </div>
              <?php
                }

                while($obj = mysqli_fetch_object($rez)){
                  $posiljalac = $obj -> posiljalac;
                  $primalac = $obj -> primalac;
                  $poruka = $obj -> poruka;
                  $tempTime = $obj -> vreme;
                  $tempDate = explode(" ", $tempTime);
                  $tempDatum = $tempDate[0];
                  $tempVreme = $tempDate[1];
                  $datum = datum($tempDatum);
                  $vreme = vreme($tempVreme);
              ?>
                <section>

                  <div class="fromTo" style="<?php
                  if($ident == $primalac){echo 'float: left; text-align: justify; background-color: rgba(252, 0, 0, 0.05); border: 1px solid red;';}elseif($ident == $posiljalac){echo 'float: right; text-align: justify; background-color: rgba(7, 201, 0, 0.05); border: 1px solid green;';} ?>">
              <?php
                if($ident == $primalac){
              ?>
                  <p><?php echo "<strong>" . $imeMajstora. "</strong> piše"; ?></p>
              <?php
                }elseif($ident == $posiljalac){
              ?>
                <p><?php echo "<strong>Vi</strong> pišete"; ?></p>
              <?php
                }
              ?>

                    <small><?php echo $datum . " " . $vreme; ?></small><br />
                    <p><?php echo $poruka; ?></p>
                  </div>
                </section>
              <?php
                }
              ?>

            <form class="posaljiLinija" action="slanjePoruke.php" method="post">
              <input class="tekst" type="text" name="tekst" required autofocus>
              <input class="button" type="submit" name="submit" value="Pošalji">
              <input type="hidden" name="primalac" value="<?php echo $majstor; ?>">
            </form>



          </div><!--kraj diva #inbox-->


        </div>
      </div>

      <script type="text/javascript">

        window.scrollTo(0,document.body.scrollHeight);

      </script>
