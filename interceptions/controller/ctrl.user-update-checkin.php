<?php

  // session start & portal
  include("ctrl.session-start.php");
  include("ctrl.session-portal.php");

  // still here = authenticated

  // grab the updated user informations
  $sentId       = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
  $sentEmail    = $_POST["email"] ?? false;
  $sentPassword = $_POST["password"] ?? false;

  // update the db
  if($sentId !== false && $sentEmail && $sentPassword) {
    include("model/mod.pdo.php");
    include("model/mod.users.php");
    $usersObj = new UsersClass($pdo);
    $sentPassword = password_hash($sentPassword, PASSWORD_DEFAULT); // recommended for password storage
    $result = $usersObj->update($sentId, $sentEmail, $sentPassword, 1);
    $pdo = NULL; // bye db
    if($result) {
      // added to the db
      // user should now be listed on the users page
      header("Location: ?user-read-all#user-updated");
    } else {
      // not added to the db, try again
      header("Location: ?user-create#no-db-row-affected");
    }
  } else {
    // missing information, so we go back
    header("Location: ?user-create#missing-variables");
  }

exit;