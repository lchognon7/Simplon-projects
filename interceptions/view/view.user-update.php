<?php

  $page = new HTMLPage();
  $page->css[] = "assets/css/style.css";
  $page->title = "Update User";
  $page->bodyClass = "layout-center addon-menu";
  include("view/view.backoffice-menu.php");
  $page->body .= 
     "<main>" . PHP_EOL
    ."<h1>Update User</h1>" . PHP_EOL
    ."<form method='post' action='?user-update-checkin'>" . PHP_EOL
    ."<input value='" . $result["user_id"] . "' type='hidden' name='id'>" . PHP_EOL
    ."<input value='" . $result["user_email"] . "' type='email' name='email' placeholder='email@adress.com' required>" . PHP_EOL
    ."<input type='password' name='password' placeholder='Type a new password ...' required>" . PHP_EOL
    ."<input type='submit' value='Update'>" . PHP_EOL
    ."</form>" . PHP_EOL
    ."</main>";
  echo $page;