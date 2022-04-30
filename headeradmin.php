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



            <li><a href="usunkurs.php">Usuń Kurs</a></li>
            <li><a href="usunkonto.php">Usuń Konto</a></li>
          </ul>
            <div class="login">

              <?php
              if (isset($_SESSION['KontoUid'])) {
                echo  '            <form action="formalogowania/wylogowanie.php" method="post">
                              <button type="submit" class="wylogowanie-buttonn" name="logout-submit">Wyloguj</button>
                            </form>';
              }

               ?>

            </div>

          </nav>
        </header>
