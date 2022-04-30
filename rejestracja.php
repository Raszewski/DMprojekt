<?php
  require "hedr.php";
 ?>

      <main>
        <div class="login1">
        <h1>Zarejestruj sie</h1>
        <form action="formalogowania/rejestracja.php" method="post">
          <input type="text" name="uid" placeholder="Podaj login">
          <input type="text" name="mail" placeholder="Podaj swój adres email">
          <input type="password" name="pwd" placeholder="Podaj hasło">
          <input type="password" name="pwd-repeat" placeholder="Powtórz hasło">
          <button type="submit" class="logowanie-button" name="signup-submit">Zarejestruj sie</button>
        </form>
      </div>
      </main>



 <?php
   require "footer.php";
  ?>
