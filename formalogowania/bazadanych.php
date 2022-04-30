<?php

  $nazwaserwera = "localhost";
  $nazwauzytkownikabazy = "root";
  $haslobazy = "";
  $nazwabazy = "DMprojekt";

  $polaczenie = mysqli_connect($nazwaserwera, $nazwauzytkownikabazy, $haslobazy, $nazwabazy);

  if (!$polaczenie) {
    die("Nieudane polacznie: ".mysqli_connect_error());
  }

 ?>
