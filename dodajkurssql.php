<?php
require 'formalogowania/bazadanych.php';

session_start();
if (isset($_SESSION['KontoUid'])){
  $uzytkownik = $_SESSION['KontoUid'];
}
else {
  echo "NIC TU NIE MA";
}


//$datakursu = date('Y-m-d\TH:i', strtotime($_POST['terminkursu']));
$nazwakursu = ($_POST['nazwakursu']);
$godzinykursu = ($_POST['godzinykursu']);
$tryb = ($_POST['tryb']);
$cenakursu = ($_POST['cenakursu']);
$datakursu = ($_POST['terminkursu']);
$opiskursu = ($_POST['opiskursu']);




$zapytanie = "INSERT INTO Termin (data_terminu) VALUES ('$datakursu')";
$zapytanie1 = "INSERT INTO Kurs (id_nauczyciel, id_termin, id_tryb, nazwa_kursu, godziny_kursu, opis_kursu, cena_kursu)
VALUES ((SELECT id_nauczyciel FROM Nauczyciel WHERE nazwisko_nauczyciela='$uzytkownik'), (SELECT id_termin FROM Termin WHERE data_terminu='$datakursu'), (SELECT id_tryb FROM Tryb WHERE nazwa_trybu='$tryb'), '$nazwakursu', '$godzinykursu', '$opiskursu', '$cenakursu')";
if (mysqli_query($polaczenie, $zapytanie)) {
  echo '<div style="color: blue; font-size: 120px; text-align: center;"> POMYŚLNIE DODANO KURS' . $nazwakursu . '</div>';
  header( "refresh:6; url=http://localhost/DMprojekt/strona.php" );
} else {
  echo "Error: " . $zapytanie . "<br>" . mysqli_error($polaczenie);
}
if (mysqli_query($polaczenie, $zapytanie1)) {
  echo '<div style="color: blue; font-size: 120px; text-align: center;"> ! </div>';
  header( "refresh:6; url=http://localhost/DMprojekt/strona.php" );
} else {
  echo "Error: " . $zapytanie . "<br>" . mysqli_error($polaczenie);
}

mysqli_close($polaczenie);
?>
