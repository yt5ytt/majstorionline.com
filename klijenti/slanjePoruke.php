<?php
  session_start();
  include("header.php");
  $email = $_SESSION["email"];
  $ident = $_SESSION["ident"];
  include("../db/db_connect.php");
  include("../function.php");

  $korespondent = $_POST["primalac"];
  $poruka = $_POST["tekst"];

  $upisi = "insert into inbox_$ident (korespondent, posiljalac, primalac, poruka, status) values ('$korespondent', '$ident', '$korespondent', '$poruka', '1')";
  $rezUpisi = $db -> query($upisi);

  $posalji = "insert into inbox_$korespondent (korespondent, posiljalac, primalac, poruka) values ('$ident', '$ident', '$korespondent', '$poruka')";
  $rezPosalji = $db -> query($posalji);

?>

  <script type="text/javascript">
    window.history.go(-1);
  </script>
