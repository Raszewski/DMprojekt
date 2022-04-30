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

          
        </div>
          <ul class="menu">
            <li><a href="strona.php"><img src="logo.png" width=230px; height=50px;></a></li>
            <li><a href="konto.php">Moje kursy</a></li>
            <li><a href="kursy.php">Wszystkie kursy</a></li>
            <li><a href="materialy.php">Materiały do kursów</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
          </ul>
            <div class="login">

              <?php
              if (isset($_SESSION['KontoUid'])) {
                echo  '            <form action="formalogowania/wylogowanie.php" method="post">
                              <button type="submit" class="wylogowanie-button" name="logout-submit">Wyloguj</button>
                            </form>';
              }

               ?>

            </div>

          </nav>
        </header>
