<?php

  // get infos from the db
  include("model/mod.pdo.php");
  include("model/mod.users.php");
  $usersObj = new UsersClass($pdo);
  $usersArr = $usersObj->readall();

  // check the login
  // only if we have registered users
  if($usersArr) {
    $sentEmail    = $_POST["email"] ?? false;
    $sentPassword = $_POST["password"] ?? false;
    if($sentEmail && $sentPassword) {
      foreach ($usersArr as $user) {
        if (
          $sentEmail == $user["user_email"] &&
          password_verify($sentPassword, $user["user_password"])
        ) {
          // user authenticated
          // let's create a secure session
          // and redirect the user to the backoffice
          include("ctrl.session-start.php");
          $_SESSION["connected"] = $sentEmail;
          $pdo = NULL;
          header("Location: ?backoffice");
          exit;
        }
      }
      // still here ? so that user does not exist
      $pdo = NULL;
      header("Location: ?login#misspelled-email-or-password");
      exit;
    } else {
      // missing credential
      // so back to the login screen
      $pdo = NULL;
      header("Location: ?login#missing-email-or-password");
      exit;
    }
  } else {
    $pdo = NULL;
    exit("OOPS - the 'users' table is empty on the DB. No one can login anymore. GAME OVER, you lose.");
  }