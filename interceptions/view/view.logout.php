<?php

  $page = new HTMLPage();
  $page->css[] = "assets/css/style.css";
  $page->title = "Logout";
  $page->bodyClass = "layout-center text-center";
  $page->body  = 
     "<main>" . PHP_EOL
    ."<h1>Logout</h1>" . PHP_EOL
    ."<p>You have successfully been disconnected, see ya !</p>" . PHP_EOL
    ."</main>";
  echo $page;