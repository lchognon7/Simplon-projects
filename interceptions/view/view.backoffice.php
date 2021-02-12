<?php

  $page = new HTMLPage();
  $page->css[] = "assets/css/style.css";
  $page->title = "Back office";
  $page->bodyClass = "addon-menu";
  include("view/view.backoffice-menu.php");
  $page->body .= 
     "<main>" . PHP_EOL
    ."<h1>Back office</h1>" . PHP_EOL
    ."<p>Welcome in your delightful back office.</p>" . PHP_EOL
    ."</main>";
  echo $page;