<?php
  session_start();
  $email = $_SESSION["email"];
  include("../db/db_connect.php");
  include("../function.php");

  $identOglasa = $_GET["identOglasa"];

  if(@$_GET["naredba"] == "arhiviraj"){

    $upis = "update oglasi set status=0 where identoglasa='$identOglasa'";
    $db -> query($upis);

  }elseif(@$_GET["naredba"] == "aktiviraj"){

    $upis = "update oglasi set status=1 where identoglasa='$identOglasa'";
    $db -> query($upis);

  }elseif(@$_GET["naredba"] == "obrisi"){

    $db -> query("delete from oglasi where identoglasa='$identOglasa'");
    $db -> query("drop table '$identOglasa'");

  }
?>

<script type="text/javascript">
  window.location.href = "profile.php?identOglasa=<?php echo $identOglasa; ?>";
</script>
