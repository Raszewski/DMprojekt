<?php
require 'formalogowania/bazadanych.php';
session_start();
if (isset($_SESSION['KontoUid'])){
  $uzytkownik = $_SESSION['KontoUid'];
}
else {
  echo "NIC TU NIE MA";
}

$imienauczyciela = $_POST['imienauczyciela'];
$nazwiskonauczyciela = $_POST['nazwiskonauczyciela'];
$wyksztalcenienauczyciela = $_POST['wyksztalcenienauczyciela'];
$opisnauczyciela = $_POST['opisnauczyciela'];

$zapytanie ="INSERT INTO Nauczyciel (id_wyksztalcenie, imie_nauczyciela, nazwisko_nauczyciela, opis_nauczyciela)
VALUES ((SELECT id_wyksztalcenie FROM Wyksztalcenie WHERE nazwa_wyksztalcenia='$wyksztalcenienauczyciela'), '$imienauczyciela', '$nazwiskonauczyciela', '$opisnauczyciela')";

if (mysqli_query($polaczenie, $zapytanie)) {
  echo '<div style="color: blue; font-size: 120px; text-align: center;"> Dane zostały dodane do bazy danych! </div>';
  header( "refresh:6; url=http://localhost/DMprojekt/strona.php" );
} else {
  echo "Error: " . $zapytanie . "<br>" . mysqli_error($polaczenie);
}

mysqli_close($polaczenie);
?>
