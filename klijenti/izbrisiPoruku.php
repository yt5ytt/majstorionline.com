<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
  include("../db/db_connect.php");
  include("../function.php");

  $korespondent = $_GET["korespondent"];

  $brisi = $db -> query("delete from inbox_$ident where korespondent='$korespondent'");

?>

  <script type="text/javascript">
    window.history.back(-1);
  </script>
