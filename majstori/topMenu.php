<?php
  session_start();
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


  }
?>
