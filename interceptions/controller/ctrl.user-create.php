<?php

  // session start & portal
  include("ctrl.session-start.php");
  include("ctrl.session-portal.php");

  // still here = authenticated
  include("view/view.html.php");
  include("view/view.user-create.php");
  exit;