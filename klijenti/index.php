<?php
  session_start();

  $email =  $_SESSION["email"];

  echo "Ovo je stranica za Klijenta sa email adresom: " . $email;

 ?>
