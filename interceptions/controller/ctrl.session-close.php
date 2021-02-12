<?php

  // cleaning up everything
  if (!empty($_SESSION)) $_SESSION = [];
  if (isset($_COOKIE[session_name()])) setcookie(session_name(), "", time()-1, "/"); // cookie viré
  session_destroy();