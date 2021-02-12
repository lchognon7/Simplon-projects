<?php

  $page = new HTMLPage();
  $page->css[] = "assets/css/style.css";
  $page->title = "Login";
  $page->bodyClass = "layout-center addon-alert";
  $page->body  = 
     "<main>" . PHP_EOL
    ."<h1>Login</h1>" . PHP_EOL
    ."<div class='alert fail' id='bad-or-expired-session'>Bad or expired session</div>" . PHP_EOL
    ."<div class='alert fail' id='misspelled-email-or-password'>Misspelled email or password</div>" . PHP_EOL
    ."<div class='alert fail' id='missing-email-or-password'>Missing email or password</div>" . PHP_EOL
    ."<form method='post' action='?login-checkin'>" . PHP_EOL
    ."<input type='email' name='email' placeholder='email@adress.com' required>" . PHP_EOL
    ."<input type='password' name='password' placeholder='Type your password ...' required>" . PHP_EOL
    ."<input type='submit'>" . PHP_EOL
    ."</form>" . PHP_EOL
    ."</main>";
  echo $page;