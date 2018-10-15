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
            </ul>
          </div>
          <div id="inbox">
            <h2>CENTAR ZA PORUKE</h2>
            <?php
              $upit = "select korespondent, max(vreme) as t from inbox_$ident group by korespondent order by t desc";
              $rez = $db -> query($upit);
              $imaNema = $rez -> num_rows;
              if($imaNema == 0){
                echo "<h3 class='nema'>Nemate novih poruka</h3>";
              }else{
                while($obj = mysqli_fetch_object($rez)){
                  $majstor = $obj -> korespondent;
                  $upitMajstor = "select * from majstori where ident='$majstor' limit 1";
                  $rezMajstor = $db -> query($upitMajstor);
                  $objMajstor = mysqli_fetch_object($rezMajstor);
                  $ime = $objMajstor -> ime;
                  $prezime = $objMajstor -> prezime;
                  $upitUnread = "select * from inbox_$ident where korespondent='$majstor'";
                  $rezUnread = $db -> query($upitUnread);
                  $unreadNum = 0;
                  while($objUnread = mysqli_fetch_object($rezUnread)){
                    if($objUnread -> status != 0){
                      continue;
                    }else{
                      $unreadNum++;
                    }
                  }

                ?>
                  <section>
                    <em class="close"><a href="izbrisiPoruku.php?korespondent=<?php echo $majstor; ?>">&times;</a></em>
                    <a href="poruke.php?korespondent=<?php echo $majstor; ?>&imeMajstora=<?php echo $ime; ?>"><h3 style="<?php if($unreadNum != 0){echo "color: rgba(243, 248, 0, 1); font-weight: bolder";}; ?>">
                      <?php echo $ime . " " . $prezime . " ($unreadNum)"; ?>
                    </h3></a>
                      <?php
                        $upitPP = "select poruka from inbox_$ident where korespondent='$majstor' order by vreme desc limit 1";
                        $rezPP = $db -> query($upitPP);
                        $objPP = mysqli_fetch_object($rezPP);
                        $PP = $objPP -> poruka;
                        $nekiTekst = substr($PP, 0, 50);
                      ?>
                    <p><?php echo $nekiTekst . "...>>>"; ?></p>
                  </section>
                <?php
                }
              }
            ?>

          </div><!--kraj diva #inbox-->


        </div>
      </div>

<?php
  include("footer.php");
?>
