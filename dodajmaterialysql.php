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
$imieautora = ($_POST['imieautora']);
$nazwiskoautora = ($_POST['nazwiskoautora']);
$tytul = ($_POST['tytul']);



$zapytanie = "INSERT INTO Autor (imie_autora, nazwisko_autora) VALUES ('$imieautora', '$nazwiskoautora')";
$zapytanie1 = "INSERT INTO Literatura (id_autor, id_kurs, nazwa_literatury)
VALUES ((SELECT id_autor FROM Autor WHERE nazwisko_autora='$nazwiskoautora'), (SELECT id_kurs FROM Kurs WHERE nazwa_kursu='$nazwakursu'), '$tytul')";
if (mysqli_query($polaczenie, $zapytanie)) {
  echo '<div style="color: blue; font-size: 120px; text-align: center;"> MATERIAŁY ZOSTAŁY <br> </div>';
  header( "refresh:6; url=http://localhost/DMprojekt/strona.php" );
} else {
  echo "Error: " . $zapytanie . "<br>" . mysqli_error($polaczenie);
}
if (mysqli_query($polaczenie, $zapytanie1)) {
  echo '<div style="color: blue; font-size: 120px; text-align: center;"> DODANE DO BAZY DANYCH </div>';
  header( "refresh:6; url=http://localhost/DMprojekt/strona.php" );
} else {
  echo "Error: " . $zapytanie . "<br>" . mysqli_error($polaczenie);
}

mysqli_close($polaczenie);
?>
