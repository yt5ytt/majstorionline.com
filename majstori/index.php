<?php
  session_start();

  $email =  $_SESSION["email"];

  echo "Ovo je stranica za Majstora sa email adresom: " . $email;

 ?>
