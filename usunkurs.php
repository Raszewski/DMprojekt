<?php
  require "headeradmin.php";
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
 .wylogowanie-buttonn {
   position: fixed;
   left: 90%;
   top: 30%;
 }

 </style>

 <?php
     $nazwakonta = isset($_GET['nazwakonta']) ? $_GET['nazwakonta'] : '';
     $nazwakursu = isset($_GET['nazwakursu']) ? $_GET['nazwakursu'] : '';
     echo "Wpisz nazwę konta i kursu, którego kurs należy usunąć: ";
 ?>

 <form method="GET">
   <input type="text" name="nazwakonta" value="<?php echo $nazwakonta ?>" placeholder="Konto..." />
   <input type="text" name="nazwakonta" value="<?php echo $nazwakursu ?>" placeholder="Kurs..."/>
   <button type="submit">Usuń</button>
 </form>

 <?php
   if($nazwakonta && $nazwakursu) {
     require 'formalogowania/bazadanych.php';
     $zapytanie = "DELETE FROM kurs WHERE nazwa_kursu = '$nazwakursu' AND id_nauczyciel = (SELECT id_nauczyciel FROM Nauczyciel WHERE nazwisko_nauczyciela = '$nazwakonta');";
     if (mysqli_query($polaczenie, $zapytanie)) {
       echo "Usunięto kurs z bazy danych";
       header( "refresh:8; url=http://localhost/DMprojekt/strona.php" );
     } else {
       echo "BŁĄD <br>" . mysqli_error($polaczenie);
     }
     mysqli_close($polaczenie);
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
