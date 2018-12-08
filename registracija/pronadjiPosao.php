<?php
  include("header.php");
  include("../db/db_connect.php");
  include("../function.php");
 ?>

    <title>Majstori Online - Početna</title>
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
                  <li><a href="../login.php">PRIJAVI SE</a></li>
                  <li><a href="register.php?korisnik=klijent">REGISTRUJ SE</a></li>
                </ul>
              </nav>
          </div>
      </div>

      <div class="middle-box">
        <div class="pronadjiPosao wrapper">
          <h3>Ovo je lista objavljenih poslova. Ako želite da konkurišete za neki posao, morate se registrovati</h3>

          <div class="trenutniPoslovi wrapper">
            <h3>Trenutno aktivni poslovi</h3>
<?php
            if (isset($_GET['pageno'])) {
              $pageno = $_GET['pageno'];
            } else {
              $pageno = 1;
            }
            $no_of_records_per_page = 3;
            $offset = ($pageno-1) * $no_of_records_per_page;
            $total_pages_sql = "select count(*) from oglasi";
            $result = $db -> query($total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            $upit = "select * from oglasi order by vreme desc limit $offset, $no_of_records_per_page";
            $rez = $db -> query($upit);
            while($obj = mysqli_fetch_object($rez)){
              $tempTime = $obj -> vreme;
              $tempDate = explode(" ", $tempTime);
              $tempDatum = $tempDate[0];
              $tempVreme = $tempDate[1];
              $datum = datum($tempDatum);
              $vreme = vreme($tempVreme);
              $zanat = $obj -> zanat;
              $opis = $obj -> opis;
              $status = $obj -> status;

              if($status == 0){
                continue;
              }
?>
              <div class="jedanOglas">
                <h3>Potreban <?php echo $zanat; ?></h3>
                <small><i>Postavljeno: <?php echo $datum . " u " . $vreme; ?></i></small>
                <p><?php echo $opis; ?></p>
              </div>

<?php

            }

?>
            <div class="pagination">
<?php

            for($i = 1; $i <= $total_pages; $i++){
?>
              <a <?php if($i == $pageno){echo 'class=active';} ?> href="pronadjiPosao.php?pageno=<?php echo $i; ?>"><?php echo $i; ?></a>
<?php
            }

?>
            </div>

          </div>
        </div>

      </div><!--kraj diva .middle-box-->

<?php
  include("footer.php");
?>
