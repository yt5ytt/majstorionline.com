<?php
  session_start();
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
  include("../db/db_connect.php");
  include("../function.php");

  $korespondent = $_GET["korespondent"];

  $brisi = $db -> query("delete from inbox_$ident where korespondent='$korespondent'");

?>

  <script type="text/javascript">
    window.location.href = "inbox.php";
  </script>
