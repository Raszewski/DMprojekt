<?php

 if (isset($_POST['login-submit'])) {

   require 'bazadanych.php';

   $mailuid = $_POST['mailuid'];
   $password = $_POST['pwd'];

   if (empty($mailuid) || empty($password)) {
     header("Location: ../strona.php?error=pustedane");
     exit();
   }
   else {
     $sql = "SELECT * FROM Konto WHERE nazwa_konta=? OR email_konta=?;";
     $stmt = mysqli_stmt_init($polaczenie);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("Location: ../strona.php?error=problemzsql");
       exit();
     }
     else {

       mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       if ($row = mysqli_fetch_assoc($result)) {

        if ($password !== $row['haslo_konta']) {
            header("Location: ../strona.php?error=zlehaslo");
            exit();
          }
          else if($password == $row['haslo_konta']) {

            session_start();
            $_SESSION['KontoId'] = $row['id_konto'];
            $_SESSION['KontoUid'] = $row['nazwa_konta'];

            header("Location: ../strona.php?login=sukces");
            exit();

          }
         else {

           header("Location: ../strona.php?error=zlehaslo");
           exit();

         }
       }
       else {
         header("Location: ../strona.php?error=brakuzytkownika");
         exit();
       }
     }
   }
 }
 else {
   header("Location: ../strona.php");
   exit();
 }
 ?>
