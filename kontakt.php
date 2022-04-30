<?php
  require "header.php";
 ?>

      <main>

        <?php
          if (isset($_SESSION['KontoUid'])) {
          echo '<div class="message-center1">  Twórca projektu: <h1> Dawid Musiał </h1> <br> <br> Kontakt: <b> dawidmusial@gmail.com  </b> <br> <br> <br> Aby zyskać status nauczyciela na platformie <br> proszę skontaktować się z twórcą <br> lub <b> administratorem </b> pod adresem: <br> <b> administrator@gmail.com </b> </div>';
          }
          else {
            echo '<div class="message-center">Zaloguj lub zarejestruj się aby korzystać z serwisu </div>';
          }

         ?>
      </main>
