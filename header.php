<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Witaj.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>

      <header>
        <nav>
          <div class="header">
          <div class="logo">

          <!--a><img src="logo.jpg"></a-->
        </div>
          <ul class="menu">
            <li><a href="strona.php"><img src="logo.png" width=230px; height=50px;></a></li>
            <li><a href="mojekursy.php">Moje kursy</a></li>
            <li><a href="kursy.php">Wszystkie kursy (zapisz się)</a></li>
            <li><a href="materialy.php">Materiały do kursów</a></li>
            <li><a href="kontakt.php">Informacje i kontakt</a></li>
          </ul>
            <div class="login">

              <?php
              if (isset($_SESSION['KontoUid'])) {
                echo  '       <div class="wylogowanie">
                              <form action="formalogowania/wylogowanie.php" method="post">
                              <button type="submit" class="wylogowanie-button" name="logout-submit">Wyloguj się</button>
                            </form> </div>';
              }
              else {
                echo '<div class="message-center1">   Logowanie </div>';
                echo '            <form action="formalogowania/logowanie.php" method="post">
                              <input type="text" name="mailuid" placeholder="Podaj swój login lub adres email">
                              <input type="password" name="pwd" placeholder="Podaj hasło">
                              <button type="submit" class="logowanie-button" name="login-submit">Zaloguj się</button>
                            </form>
                            <div class="rejestracja"> <ul class="menus"> <li> <a href="rejestracja.php">Rejestracja</a> </li> </ul> </div>';
              }
               ?>

            </div>

          </nav>
        </header>
