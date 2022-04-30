<?php
require 'formalogowania/bazadanych.php';

session_start();
if (isset($_SESSION['KontoUid'])){
  $uzytkownik = $_SESSION['KontoUid'];
}
else {
  echo "NIC TU NIE MA";
}


$nazwakursu = ($_POST['nazwakursu']);


$zapytanie = "INSERT INTO Zapisy (id_konto, id_kurs, potwierdzenie) VALUES ((SELECT id_konto FROM konto WHERE nazwa_konta='$uzytkownik'), (SELECT id_kurs FROM kurs WHERE nazwa_kursu='$nazwakursu'), 'Nie')";
if (mysqli_query($polaczenie, $zapytanie)) {
  echo '<div style="color: blue; font-size: 80px; text-align: center;"> GRATULACJE! <br> Pomyślnie udało Ci się zapisać na kurs! <br> Czekaj teraz na potwierdzenie nauczyciela <br> Jeśli kurs będzie potwierdzony <br> Nauczyciel skontaktuje się z Tobą mailowo. </div>';
  header( "refresh:20; url=http://localhost/DMprojekt/strona.php" );
} else {
  echo "Error: " . $zapytanie . "<br>" . mysqli_error($polaczenie);
}

mysqli_close($polaczenie);
?>
