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
$nazwastudenta = ($_POST['nazwastudenta']);

$zapytanie = "UPDATE zapisnauczyciel SET potwierdzenie = 'Tak' WHERE nazwa_kursu = '$nazwakursu' AND nazwa_konta = '$nazwastudenta'";
if (mysqli_query($polaczenie, $zapytanie)) {
  echo '<div style="color: blue; font-size: 80px; text-align: center;"> GRATULACJE! <br> <br> Pomyślnie udało Ci się potwierdzić kurs! <br> </div>';
  header( "refresh:20; url=http://localhost/DMprojekt/strona.php" );
} else {
  echo "Error: " . $zapytanie . "<br>" . mysqli_error($polaczenie);
}

mysqli_close($polaczenie);
?>
