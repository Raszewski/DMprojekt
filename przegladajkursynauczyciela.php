<?php
  require "headernauczyciela.php";
  if (isset($_SESSION['KontoUid'])){
    $uzytkownik = $_SESSION['KontoUid'];
  }
  else {
    echo "NIC TU NIE MA";
  }
 ?>
 <style>

 .lista tr, td
 {
   text-align:center;
   font-family: Georgia;
   font-size: 17px;
   list-style-type: none;
   margin: 6px;
   padding: 3px;
   outline: 3px solid blue;
 }
 button[type=submit] {
   background-color: #0000e6;
   color: white;
   padding: 10px 30px;
   border: none;
   border-radius: 6px;
   cursor: pointer;
 }
 button[type=submit]:hover {
   background-color: #8f00b3;
   cursor: pointer;
 }
 </style>
<?php
  $wyszukiwanie = isset($_GET['wyszukiwanie']) ? $_GET['wyszukiwanie'] : '';
  echo "Wyszukaj kurs: ";
?>

 <form method="GET">
   <input type="text" name="wyszukiwanie" value="<?php echo $wyszukiwanie ?>" />
   <button type="submit">Szukaj</button>
 </form>

<?php
  if($wyszukiwanie) {
    require 'formalogowania/bazadanych.php';
    $zapytanie = "SELECT * FROM zapisnauczyciel WHERE nazwisko_nauczyciela='$uzytkownik' AND nazwa_kursu='$wyszukiwanie';";
    $rezultat = mysqli_query($polaczenie, $zapytanie);
    $rezultatwynik = mysqli_num_rows($rezultat);
    $array = array();
    echo "<table>";
    echo "<h2> Kursy, które dodałem i zapisy studentów: </h2>";
    echo "<tr><td>" . 'Nazwa' . "</td><td>" . 'Nazwisko Nauczyciela' . "</td><td>" . 'Ilość godzin' . "</td><td>" . 'Termin' . "</td><td>" . 'Tryb' . "</td><td>" . 'Student' . "</td><td>" . 'Email Studenta' . "</td><td>" . 'Zapis potwierdzony' . "</td></tr>";
    if ($rezultatwynik > 0)
    {
     while ($wiersz = mysqli_fetch_assoc($rezultat)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $zapytanie
     {
       echo "<tr><td>" . $wiersz['nazwa_kursu'] . "</td><td>" . $wiersz['nazwisko_nauczyciela'] . "</td><td>" . $wiersz['godziny_kursu'] . "</td><td>" . $wiersz['data_terminu'] . "</td><td>" . $wiersz['nazwa_trybu'] . "</td><td>" . $wiersz['nazwa_konta'] .
       "</td><td>" . $wiersz['email_konta'] .
       "</td><td>" . $wiersz['potwierdzenie'] . "</td></tr>";
       ;
  }
  }
  echo "</table>";
}
else {
  require 'formalogowania/bazadanych.php';
  $zapytanie = "SELECT * FROM zapisnauczyciel WHERE nazwisko_nauczyciela='$uzytkownik';";
  $rezultat = mysqli_query($polaczenie, $zapytanie);
  $rezultatwynik = mysqli_num_rows($rezultat);
  $array = array();
  echo "<table>";
  echo "<h2> Kursy, które dodałem i zapisy studentów: </h2>";
  echo "<tr><td>" . 'Nazwa' . "</td><td>" . 'Nazwisko Nauczyciela' . "</td><td>" . 'Ilość godzin' . "</td><td>" . 'Termin' . "</td><td>" . 'Tryb' . "</td><td>" . 'Student' . "</td><td>" . 'Email Studenta' . "</td><td>" . 'Zapis potwierdzony' . "</td></tr>";
  if ($rezultatwynik > 0)
  {
   while ($wiersz = mysqli_fetch_assoc($rezultat)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $zapytanie
   {
     echo "<tr><td>" . $wiersz['nazwa_kursu'] . "</td><td>" . $wiersz['nazwisko_nauczyciela'] . "</td><td>" . $wiersz['godziny_kursu'] . "</td><td>" . $wiersz['data_terminu'] . "</td><td>" . $wiersz['nazwa_trybu'] . "</td><td>" . $wiersz['nazwa_konta'] .
     "</td><td>" . $wiersz['email_konta'] .
     "</td><td>" . $wiersz['potwierdzenie'] . "</td></tr>";
     ;
}
}
echo "</table>";

}
?>

<div class="container">
<form action="potwierdznauczycielsql.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="nazwakursu" style="width: 100%;font-size: large;">Potwierdź uczestnictwo w kursie dla studenta; Nazwa kursu:</label>
    </div>
  <div class="col-75">
  <input type="text" id="nazwakursu" name="nazwakursu" maxlength="64" placeholder="Napisz tu nazwę kursu, który chcesz potwierdzić">
  </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="nazwastudenta" style=" font-size: large;">Student:</label>
    </div>
  <div class="col-75">
  <input type="text" id="nazwastudenta" name="nazwastudenta" maxlength="64" placeholder="Napisz tu nazwę studenta, któremu chcesz potwierdzić uczestnictwo">
  <button type="submit">Potwierdź</button>
  </div>
  </div>
  </div>
</form>
