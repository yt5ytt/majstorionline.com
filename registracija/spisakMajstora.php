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
          <h3>Ovo je lista registrovanih majstora na sajtu. Ako želite da ih kontaktirate, morate se registrovati</h3>

          <div class="trenutniPoslovi wrapper">
            <h3>Lista majstora</h3>
<?php
            if (isset($_GET['pageno'])) {
              $pageno = $_GET['pageno'];
            } else {
              $pageno = 1;
            }
            $no_of_records_per_page = 3;
            $offset = ($pageno-1) * $no_of_records_per_page;
            $total_pages_sql = "select count(*) from majstori";
            $result = $db -> query($total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            $upit = "select * from majstori limit $offset, $no_of_records_per_page";
            $rez = $db -> query($upit);
            while($obj = mysqli_fetch_object($rez)){
              $ime = $obj -> ime;
              $prezime = $obj -> prezime;
              $zanat = $obj -> delatnost;
              $opis = $obj -> opis;
?>
              <div class="jedanOglas">
                <h3><?php echo $ime . " " . $prezime; ?></h3>
                <small><i><?php echo $zanat; ?></i></small>
                <p><?php echo $opis; ?></p>
              </div>

<?php

            }

?>
            <div class="pagination">
<?php

            for($i = 1; $i <= $total_pages; $i++){
?>
              <a <?php if($i == $pageno){echo 'class=active';} ?> href="spisakMajstora.php?pageno=<?php echo $i; ?>"><?php echo $i; ?></a>
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
