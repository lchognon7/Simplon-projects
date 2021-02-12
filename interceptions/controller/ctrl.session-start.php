<?php

  // enforcing session cookie
  @ini_set("session.cookie_httponly", 1); // XSS resistance
  @ini_set("session.cookie_samesite", "Strict"); // CSRF resistance
  session_name("enjoy-your-stay-on-earth"); // say hello at humanize.me if you like my code
  session_start(); // now we initiate the session
  session_regenerate_id(); // session hijack resistance