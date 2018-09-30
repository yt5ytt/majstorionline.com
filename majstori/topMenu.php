<?php
  $upitBroj = "select status from inbox_$ident where status=0";
  $rezBroj = $db -> query($upitBroj);
  $brojPoruka = $rezBroj -> num_rows;
?>
<nav>
  <ul>
    <li><a href="inbox.php">PORUKE <?php if($brojPoruka > 0){echo " ($brojPoruka)";} ?></a></li>
    <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
    <li><a href="logout.php">ODJAVI SE</a></li>
  </ul>
</nav>
