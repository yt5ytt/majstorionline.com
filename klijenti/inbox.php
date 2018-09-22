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
              <li><a href="pretraga.php">Pretraga</a></li>
              <li><a href="logout.php">Odjavi se</a></li>
            </ul>
          </div>
          <div id="inbox">
            <h2>CENTAR ZA PORUKE</h2>
            <?php
              $upit = "select korespondent, max(vreme) as t from inbox_$ident group by korespondent order by t desc";
              $rez = $db -> query($upit);
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
                  <h3>
                    <?php echo $ime . " " . $prezime; ?>
                    <small>
                      <?php
                        if($unreadNum == 0){
                          echo "(Nemate novih poruka)";
                        }elseif($unreadNum == 1){
                          echo "(Imate 1 novu poruku)";
                        }elseif($unreadNum > 1){
                          echo "(Imate " . $unreadNum . " novih poruka)";
                        }
                      ?>
                    </small>
                  </h3>
                </section>
              <?php
              }
            ?>

          </div>


        </div>
      </div>

<?php
  include("footer.php");
?>
