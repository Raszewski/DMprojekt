<?php
  require "header.php";
 ?>


 <?php
   if($username = $_GET['username']) {
     if (isset($_SESSION['KontoUid'])) {
       echo '<div class="zalogo"> <h3>Jesteś zalogowany jako: ';
       echo $_SESSION['KontoUid'];
       echo '</h3> </div>';
       if ($_SESSION['KontoUid'] == 'administrator') {
         echo 'Jestes Administratorem!';
         header("Location: administrator.php?username={$_SESSION['KontoUid']}");

       }
       if ($_SESSION['KontoUid'] == 'kowalski') {
         echo 'Jestes Nauczycielem kowalski!';
         header("Location: nauczyciel.php?username={$_SESSION['KontoUid']}");
       }
       if ($_SESSION['KontoUid'] == 'musial') {
         echo 'Jestes Nauczycielem musial!';
         header("Location: nauczyciel.php?username={$_SESSION['KontoUid']}");
       }
     }
   }
?>
