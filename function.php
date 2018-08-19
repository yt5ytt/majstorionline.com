<?php
  function vreme($tempTime){

    $tempDate = explode(" ", $tempTime);
    $tempDatum = $tempDate[0];
    $tempVreme = $tempDate[1];

    $date = explode("-", $tempDatum);
    $dan = $date[2];
    $mesec = $date[1];
    $godina = $date[0];

    $time = explode(":", $tempVreme);
    $sat = $time[0];
    $minut = $time[1];

    $vreme = $dan . "." . $mesec . "." . $godina . ". " . $sat . ":" . $minut;
    return $vreme;

  }
 ?>
