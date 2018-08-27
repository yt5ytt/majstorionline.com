<?php
  function vreme($tempVreme){

    $time = explode(":", $tempVreme);
    $sat = $time[0];
    $minut = $time[1];

    $vreme = $sat . ":" . $minut;
    return $vreme;
  }

  function datum($tempDatum){
    $date = explode("-", $tempDatum);
    $dan = $date[2];
    $mesec = $date[1];
    $godina = $date[0];
    
    $datum = $dan . "." . $mesec . "." . $godina . ".";
    return $datum;
  }
 ?>
