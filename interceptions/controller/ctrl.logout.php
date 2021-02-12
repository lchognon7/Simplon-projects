<?php

  // session start & close !
  include("ctrl.session-start.php");
  include("ctrl.session-close.php");

  // display goodbye
  include("view/view.html.php");
  include("view/view.logout.php");
  exit;