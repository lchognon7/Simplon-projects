<?php

    // session must be started before ;)

    // do we already got an authenticated user here ?
    if (!isset($_SESSION["connected"])) {
      // nop
      // so, cleaning
      include("ctrl.session-close.php");
      // and redirecting now
      header("Location: ?login#bad-or-expired-session");
      exit;
    }