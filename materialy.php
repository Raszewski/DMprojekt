<?php
  require "header.php";
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
  echo "Wyszukaj materiały wpisując nazwę kursu: ";
?>

 <form method="GET">
   <input type="text" name="wyszukiwanie" value="<?php echo $wyszukiwanie ?>" />
   <button type="submit">Szukaj</button>
 </form>

<?php
  if($wyszukiwanie) {
    require 'formalogowania/bazadanych.php';

    $zapytanie = "SELECT * FROM materialy WHERE nazwa_kursu='$wyszukiwanie';";
    $rezultat = mysqli_query($polaczenie, $zapytanie);
    $rezultatwynik = mysqli_num_rows($rezultat);
    $array = array();
    echo "<table>";
    echo "<h2> Wyszukane materiały do kursów: </h2>";
    echo "<tr><td>" . 'Nazwa kursu' . "</td><td>" . 'Tytuł' . "</td><td>" . 'Imię Autora' . "</td><td>" . 'Nazwisko Autora' . "</td></tr>";
    if ($rezultatwynik > 0)
    {
     while ($wiersz = mysqli_fetch_assoc($rezultat)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $zapytanie
     {
       echo "<tr><td>" . $wiersz['nazwa_kursu'] . "</td><td>" . $wiersz['nazwa_literatury'] . "</td><td>" . $wiersz['imie_autora'] . "</td><td>" . $wiersz['nazwisko_autora'] . "</td></tr>";
       ;
  }
  }
  echo "</table>";

}
else {
  require 'formalogowania/bazadanych.php';

  $zapytanie = "SELECT * FROM materialy;";
  $rezultat = mysqli_query($polaczenie, $zapytanie);
  $rezultatwynik = mysqli_num_rows($rezultat);
  $array = array();
  echo "<table>";
  echo "<h2> Wszystkie materiały do kursów: </h2>";
  echo "<tr><td>" . 'Nazwa kursu' . "</td><td>" . 'Tytuł' . "</td><td>" . 'Imię Autora' . "</td><td>" . 'Nazwisko Autora' . "</td></tr>";
  if ($rezultatwynik > 0)
  {
   while ($wiersz = mysqli_fetch_assoc($rezultat)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $zapytanie
   {
     echo "<tr><td>" . $wiersz['nazwa_kursu'] . "</td><td>" . $wiersz['nazwa_literatury'] . "</td><td>" . $wiersz['imie_autora'] . "</td><td>" . $wiersz['nazwisko_autora'] . "</td></tr>";
     ;

}
}
echo "</table>";

}
?>
