<?php

  /*

  route

  */

  parse_str($_SERVER["QUERY_STRING"], $qs);
  $keys = array_keys($qs); // grab 'em all, if any
  $route = array_shift($keys); // first one
  switch ($route) {

    case "login":
      include("controller/ctrl.login.php");
      break;

    case "login-checkin":
      include("controller/ctrl.login-checkin.php");
      break;

    case "backoffice":
        include("controller/ctrl.backoffice.php");
        break;

    case "logout":
      include("controller/ctrl.logout.php");
      break;

    case "user-read-all":
      include("controller/ctrl.user-read-all.php");
      break;

    case "user-create":
      include("controller/ctrl.user-create.php");
      break;

    case "user-create-checkin":
      include("controller/ctrl.user-create-checkin.php");
      break;

    case "user-update":
      include("controller/ctrl.user-update.php");
      break;

    case "user-update-checkin":
      include("controller/ctrl.user-update-checkin.php");
      break;

    case "user-delete":
      include("controller/ctrl.user-delete.php");
      break;

    default:
      include("controller/ctrl.homepage.php");
      break;

  }

  /*

  EOF
  
  */

  exit;