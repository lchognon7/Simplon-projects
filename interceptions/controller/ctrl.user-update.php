<?php

  // session start & portal
  include("ctrl.session-start.php");
  include("ctrl.session-portal.php");

  // still here = authenticated

  // grab the user id
  $sentId = filter_input(INPUT_GET, "user-update", FILTER_VALIDATE_INT);
  if($sentId === false) {
    header("Location: ?user-read-all#misspelled-id");
    exit;
  }

  // db start
  include("model/mod.pdo.php");
  include("model/mod.users.php");
  $usersObj = new UsersClass($pdo);
  $result = $usersObj->read($sentId); // try to "read" that id
  $pdo = NULL; // db close
  if($result) {
    // display
    include("view/view.html.php");
    include("view/view.user-update.php");
  } else {
    header("Location: ?user-read-all#id-does-not-exist");
  }
  exit;