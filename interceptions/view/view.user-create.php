<?php

  $page = new HTMLPage();
  $page->css[] = "assets/css/style.css";
  $page->title = "Create User";
  $page->bodyClass = "layout-center addon-menu";
  include("view/view.backoffice-menu.php");
  $page->body .= 
     "<main>" . PHP_EOL
    ."<h1>Create User</h1>" . PHP_EOL
    ."<form method='post' action='?user-create-checkin'>" . PHP_EOL
    ."<input type='email' name='email' placeholder='email@adress.com' required>" . PHP_EOL
    ."<input type='password' name='password' placeholder='Type a password ...' required>" . PHP_EOL
    ."<input type='submit' value='Create'>" . PHP_EOL
    ."</form>" . PHP_EOL
    ."</main>";
  echo $page;