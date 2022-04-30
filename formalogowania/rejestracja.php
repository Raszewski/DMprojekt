<?php
if (isset($_POST['signup-submit'])) {

  require 'bazadanych.php';
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordrepeat = $_POST['pwd-repeat'];

  if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
    header("Location: ../rejestracja.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../rejestracja.php?error=invalidmailuid");
    exit();
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../rejestracja.php?error=invalidmail&uidee=".$username);
    exit();
  }
  elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../rejestracja.php?error=invaliduid&mail=".$email);
    exit();
  }
  elseif ($password !== $passwordrepeat) {
    header("Location: ../rejestracja.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else {
    $sql ="SELECT nazwa_konta FROM Konto WHERE nazwa_konta=?";
    $stmt = mysqli_stmt_init($polaczenie);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../rejestracja.php?error=sqlerror");
      exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
      header("Location: ../rejestracja.php?error=usertaken&mail=".$email);
      exit();
    }
      else {
        $sql ="INSERT INTO Konto (nazwa_konta, email_konta, haslo_konta) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($polaczenie);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../rejestracja.php?error=sqlerror");
          exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
        mysqli_stmt_execute($stmt);
        header("Location: ../rejestracja.php?signup=success");
        exit();
      }

      }
  }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($polaczenie);
}
else {
  header("Location: ../rejestracja.php");
  exit();

}


 ?>
