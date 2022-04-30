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
     echo "Wpisz nazwę konta, którą chcesz usunąć: ";
 ?>

 <form method="GET">
   <input type="text" name="nazwakonta" value="<?php echo $nazwakonta ?>" placeholder="Konto..."/>
   <button type="submit">Usuń</button>
 </form>

 <?php
   if($nazwakonta) {
     require 'formalogowania/bazadanych.php';
     $zapytanie = "DELETE FROM konto WHERE nazwa_konta = '$nazwakonta');";
     if (mysqli_query($polaczenie, $zapytanie)) {
       echo "Usunięto konto z bazy danych";
       header( "refresh:6; url=http://localhost/DMprojekt/strona.php" );
     } else {
       echo "BŁĄD <br>" . mysqli_error($polaczenie);
     }
     mysqli_close($polaczenie);
 }
 else {
   require 'formalogowania/bazadanych.php';

   $zapytanie = "SELECT * FROM konto;";
   $rezultat = mysqli_query($polaczenie, $zapytanie);
   $rezultatwyniki = mysqli_num_rows($rezultat);
   $array = array();
   echo "<table>";
   echo "<h1> Wszystkie konta w serwisie: </h1>";
   echo "<tr><td>" . 'Konto' . "</td><td>" . 'Email' . "</td><td>" . 'Hasło' . "</td></tr>";
   if ($rezultatwyniki > 0)
   {
    while ($wiersz = mysqli_fetch_assoc($rezultat))
      echo "<tr><td>" . $wiersz['nazwa_konta'] . "</td><td>" . $wiersz['email_konta'] . "</td><td>" . $wiersz['haslo_konta'] . "</td></tr>";
 }
 }
 echo "</table>";

 ?>
