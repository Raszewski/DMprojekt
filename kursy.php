 <?php
   require "header.php";
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
     $zapytanie = "SELECT * FROM kursy WHERE nazwa_kursu='$wyszukiwanie';";
     $rezultat = mysqli_query($polaczenie, $zapytanie);
     $rezultatwynik = mysqli_num_rows($rezultat);
     $array = array();
     echo "<table>";
     echo "<h2> Kursy: </h2>";
     echo "<tr><td>" . 'Nazwa' . "</td><td>" . 'Ilość godzin' . "</td><td>" . 'Opis Kursu' . "</td><td>" . 'Cena' . "</td><td>" . 'Imie nauczyciela' . "</td><td>" . 'Nazwisko nauczyciela' . "</td><td>" . 'Opis nauczyciela' . "</td><td>" . 'Wykształcenie' . "</td><td>" . 'Termin' . "</td><td>" . 'Tryb' . "</td></tr>";
     if ($rezultatwynik > 0)
     {
      while ($wiersz = mysqli_fetch_assoc($rezultat)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $zapytanie
      {
        echo "<tr><td>" . $wiersz['nazwa_kursu'] . "</td><td>" . $wiersz['godziny_kursu'] . "</td><td>" . $wiersz['opis_kursu'] . "</td><td>" . $wiersz['cena_kursu'] . "</td><td>" . $wiersz['imie_nauczyciela'] . "</td><td>" . $wiersz['nazwisko_nauczyciela'] .
        "</td><td>" . $wiersz['opis_nauczyciela'] . "</td><td>" . $wiersz['nazwa_wyksztalcenia'] . "</td><td>" . $wiersz['data_terminu'] . "</td><td>" . $wiersz['nazwa_trybu'] . "</td></tr>";
        ;
   }
 }
 echo "</table>";
 }
 else {
   require 'formalogowania/bazadanych.php';
   $zapytanie = "SELECT * FROM kursy;";
   $rezultat = mysqli_query($polaczenie, $zapytanie);
   $rezultatwynik = mysqli_num_rows($rezultat);
   $array = array();
   echo "<table>";
   echo "<h2> Kursy: </h2>";
   echo "<tr><td>" . 'Nazwa' . "</td><td>" . 'Ilość godzin' . "</td><td>" . 'Opis Kursu' . "</td><td>" . 'Cena' . "</td><td>" . 'Imie nauczyciela' . "</td><td>" . 'Nazwisko nauczyciela' . "</td><td>" . 'Opis nauczyciela' . "</td><td>" . 'Wykształcenie' . "</td><td>" . 'Termin' . "</td><td>" . 'Tryb' . "</td></tr>";
   if ($rezultatwynik > 0)
   {
    while ($wiersz = mysqli_fetch_assoc($rezultat)) // mysqli_fetch_assoc - daje mi liczbę poszczególnych wierszy w bazie danych na postawie tego selecta na gorze do $zapytanie
    {
      echo "<tr><td>" . $wiersz['nazwa_kursu'] . "</td><td>" . $wiersz['godziny_kursu'] . "</td><td>" . $wiersz['opis_kursu'] . "</td><td>" . $wiersz['cena_kursu'] . "</td><td>" . $wiersz['imie_nauczyciela'] . "</td><td>" . $wiersz['nazwisko_nauczyciela'] .
      "</td><td>" . $wiersz['opis_nauczyciela'] . "</td><td>" . $wiersz['nazwa_wyksztalcenia'] . "</td><td>" . $wiersz['data_terminu'] . "</td><td>" . $wiersz['nazwa_trybu'] . "</td></tr>";
      ;

 }
 }
 echo "</table>";

 }
 ?>
 <div class="container">
 <form action="kurszapissql.php" method="post">
   <div class="row">
     <div class="col-25">
       <label for="nazwakursu" style="width: 100%; text-align: center; font-size: xx-large;">Zapisz się na kurs:</label>
     </div>
   <div class="col-75">
   <input type="text" id="nazwakursu" name="nazwakursu" maxlength="64" placeholder="Napisz tu nazwę kursu, na który chcesz się zapisać">
   <button type="submit">Zapisz się</button>
   </div>
   </div>
   </div>
 </form>
  <?php
    require "footer.php";
 ?>
