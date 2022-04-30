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
   if($username = $_GET['username']) {
     if (isset($_SESSION['KontoUid'])) {
       echo '<div class="zalogo"> <h3>Jesteś zalogowany jako: ';
       echo $_SESSION['KontoUid'];
       echo '</h3> </div>';
       if ($_SESSION['KontoUid'] == 'administrator') {
         echo ' <h2> Administrator ma dostęp to: <br> <br>

         Usunięcia Kursu na wypadek nieprawidłowości/prośby nauczyciela

         <br>
<br>
         Usunięcia dowolnego konta </h2>';

       }
     }
   }
?>
