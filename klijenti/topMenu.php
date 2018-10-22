<?php
  $upitBroj = "select status from inbox_$ident where status=0";
  $rezBroj = $db -> query($upitBroj);
  $brojPoruka = $rezBroj -> num_rows;
?>
    <div class="top-line">
        <div class="logo-nav wrapper">
            <div class="logo">
              <h2 class="responsiveLogo">MajstoriOnline<small>.com</small></h2>
            </div>

            <span class="nav_btn"><i class="fa fa-bars"></i></span>

            <nav>
<?php
          if($ident){
?>
              <ul class="nav">
                <li class="responsive"><a href="index.php">POČETAK</a></li>
                <li><a href="inbox.php">PORUKE <?php if($brojPoruka > 0){echo " ($brojPoruka)";} ?></a></li>
                <li><a href="postavi_oglas.php">POSTAVI OGLAS</a></li>
                <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
                <li><a href="logout.php">ODJAVI SE</a></li>
              </ul>
<?php
          }else{
?>
              <ul class="nav">
                <li class="responsive"><a href="index.php">POČETAK</a></li>
                <li><a href="../index.php">NASLOVNA</a></li>
                <li><a href="../login.php">ULOGUJ SE</a></li>
                <li><a href="../registracija/register.php?korisnik=klijent">REGISTRUJ SE</a></li>
              </ul>
<?php


          }
?>

        </nav>
      </div>
  </div><!--kraj diva top-line-->

<?php
  /*session_start();
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
  $upitBroj = "select status from inbox_$ident where status=0";
  $rezBroj = $db -> query($upitBroj);
  $brojPoruka = $rezBroj -> num_rows;

  if($ident){
?>
    <nav>
      <ul>
        <li><a href="inbox.php">PORUKE <?php if($brojPoruka > 0){echo " ($brojPoruka)";} ?></a></li>
        <li><a href="postavi_oglas.php">POSTAVI OGLAS</a></li>
        <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
        <li><a href="logout.php">ODJAVI SE</a></li>
      </ul>
    </nav>
<?php
  }else{
?>
    <nav>
      <ul>
        <li><a href="../index.php">NASLOVNA</a></li>
        <li><a href="../login.php">ULOGUJ SE</a></li>
        <li><a href="../registracija/register.php?korisnik=klijent">REGISTRUJ SE</a></li>
      </ul>
    </nav>
<?php
}*/
?>
