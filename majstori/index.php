<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Majstori - Dashboard</title>
  </head>
  <body>
    <?php

      $email =  $_SESSION["email"];

      echo "<h1>Ovo je stranica za Majstora sa email adresom: " . $email . "</h1>";
      echo "<h1>MajstoriOnline<small>.com</small></h1>"

     ?>
  </body>
</html>
