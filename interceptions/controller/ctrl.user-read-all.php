<?php

  // session start & portal
  include("ctrl.session-start.php");
  include("ctrl.session-portal.php");

  // still here = authenticated

  // get infos from the db
  include("model/mod.pdo.php");
  include("model/mod.users.php");
  $usersObj = new UsersClass($pdo);
  $usersAll = $usersObj->readall();

  // we're about to need this
  function strShorter($str, $maxLength) {
    if (strlen($str) > $maxLength)
      return substr($str, 0, $maxLength) . "…";
    else
      return $str;
  }
  
  // display
  include("view/view.html.php");
  include("view/view.user-read-all.php");
  exit;