<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
  include("../db/db_connect.php");
  include("../function.php");
?>

    <title>Majstori - Početna</title>
  </head>
  <body>
    <div id="main" role="main">
<?php
      include("topMenu.php");
?>
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
        </ul>
      </div>
      <div id="oglasi">
<?php
      if($_POST["ponudaPosao"]){

        $upit = "select * from majstori where email='$email' limit 1";
        $rez = $db -> query($upit);
        $obj = mysqli_fetch_object($rez);

        $identMajstora = $obj -> ident;
        $ime = $obj -> ime;
        $prezime = $obj -> prezime;
        $majstor = $ime . " " . $prezime;
        $server = $_SERVER['HTTP_HOST'];
        $identKlijenta = $_POST["klijent"];
        $identOglasa = $_POST["identOglasa"];
        $zanat = $_POST["zanat"];
        $ponuda = $_POST["ponudaPosao"];
        $tabela = "inbox_" . $identKlijenta;
        $link = "http://" . $server . "/klijenti/index.php?identOglasa=" . $identOglasa;
        $poruka = 'Majstor ' . $majstor . ' se javio na vaš oglas. Ponudu možete pogledati ... <a href="' . $link . '">OVDE</a>';

        $upis = $db -> query("insert into $identOglasa (majstor, ponuda) values ('$identMajstora', '$ponuda')");

        $slanjePoruke = $db -> query("insert into $tabela (korespondent, posiljalac, primalac, poruka) values ('$identMajstora', '$identMajstora', '$identKlijenta', '$poruka')");

        if($upis & $slanjePoruke){

?>
          <h3 class="nema">Uspešno ste konkurisali za ovaj posao. Pregledajte još oglasa po ovom kriterijumu</h3>

          <div class="link-box1 wrapper">
            <a class="submit" style="color: black;" href="pretraga.php?zanat=<?php echo $zanat; ?>"><?php echo $zanat; ?></a>
          </div>

<?php
        }else{
?>
          <h3 class="nema">Ponuda za ovaj posao nije poslata. Molimo vas, pokušajte ponovo!!!</h3>

          <div class="link-box1 wrapper">
            <a class="submit" style="color: black;" href="#" onclick="history.back(-1)">NAZAD</a>
          </div>

<?php
        }

      }elseif($_GET["identOglasa"]){
        $identOglasa = $_GET["identOglasa"];

        $upitKlijent = "select klijent from oglasi where identoglasa='$identOglasa'";
        $rezKlijent = $db -> query($upitKlijent);
        $objKlijent = mysqli_fetch_object($rezKlijent);
        $klijent = $objKlijent -> klijent;
        $zanat = $_GET["zanat"];
 ?>
        <h2>Ponudi uslugu</h2>
        <form class="ponudaPosao" action="ponuda.php" method="post">
          <label>
            <h3>Majstori ponudite svoje usluge na ovaj oglas. U svojoj ponudi možete da napišete kako ćete odraditi posao, koliko će da traje usluga i za koliku svotu novca biste odradili posao koji je u oglasu. Sva ostala komunikacija će se kasnije odvijati preko poruka na sajtu.</h3>
          </label>

          <textarea name="ponudaPosao" required></textarea>

          <input type="hidden" name="identOglasa" value="<?php echo $identOglasa; ?>">
          <input type="hidden" name="klijent" value="<?php echo $klijent; ?>">
          <input type="hidden" name="zanat" value="<?php echo $zanat; ?>">

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
