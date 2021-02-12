<?php

  $page = new HTMLPage();
  $page->css[] = "assets/css/style.css";
  $page->title = "Users";
  $page->bodyClass = "layout-center addon-menu addon-alert";
  include("view/view.backoffice-menu.php");
  $page->body .= 
     "<main>" . PHP_EOL
    ."<h1>User management</h1>" . PHP_EOL
    ."<div class='alert success' id='user-created'>New user added</div>" . PHP_EOL
    ."<div class='alert success' id='user-updated'>User has been updated</div>" . PHP_EOL
    ."<div class='alert success' id='user-deleted'>User has been deleted</div>" . PHP_EOL
    ."<div class='alert fail' id='no-db-row-affected'>Database has not been affected</div>" . PHP_EOL
    ."<div class='alert fail' id='missing-variables'>Some variables are missing</div>" . PHP_EOL
    ."<a class='button' href='?user-create'>Create</a>" . PHP_EOL;
  if ($usersAll) {
    $page->body .= "<table>" . PHP_EOL;
    foreach ($usersAll as $key => $value) {
      $id = $value["user_id"];
      $page->body .=
         "<tr>" . PHP_EOL
        ."<td>" . $key . "</td>" . PHP_EOL
        ."<td><span class='mobile'>" . strShorter($value["user_email"], 14) . "</span><span class='desktop'>" . strShorter($value["user_email"], 26) . "</span></td>" . PHP_EOL
        ."<td><a href='?user-delete=$id' title='delete' class='confirm' data-confirm='Are you sure you want to delete that user ?'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 477.9 477.9'><title>delete</title><path d='M444 68H324V51c0-28-23-51-51-51h-68c-28 0-51 23-51 51v17H34a17 17 0 100 34h19l32 360c1 9 9 16 17 16h273c9 0 17-7 18-16l32-360h19a17 17 0 100-34zM188 51c0-9 7-17 17-17h68c9 0 17 8 17 17v17H188V51zm-16 359h-1c-9 0-17-7-17-16l-17-239a17 17 0 1134-3l17 239c0 10-7 18-16 19zm84-17a17 17 0 11-34 0V154a17 17 0 1134 0v239zm85-238l-17 239c0 9-8 16-17 16h-1c-9-1-17-9-16-19l17-239a17 17 0 1134 3z'/></svg></a></td>" . PHP_EOL
        ."<td><a href='?user-update=$id' title='edit'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 477.9 477.9'><title>edit</title><path d='M393 239c-10 0-18 8-18 17v171c0 9-7 17-17 17H51c-9 0-17-8-17-17V85c0-9 8-17 17-17h205a17 17 0 100-34H51C23 34 0 57 0 85v342c0 28 23 51 51 51h307c29 0 52-23 52-51V256c0-9-8-17-17-17z'/><path d='M459 19a65 65 0 00-93 0L142 244l-5 7-34 102a17 17 0 0022 22l102-35c3 0 5-2 7-4l225-224c25-26 25-67 0-93z'/></svg></a></td>" . PHP_EOL
        ."</tr>" . PHP_EOL;
    }
    $page->body .= "</table>" . PHP_EOL;
    $page->bodyLastCall = "<script src='assets/js/confirm.js'></script>";
  } else {
    $page->body .= "<p>We don't have any user here.<br>But you <em>really</em> should create a user right now, because you may not be able to login next time</p>" . PHP_EOL;
  }
  $page->body .= "</main>";
  echo $page;