<?php

  $page->body =
   "<header>" . PHP_EOL
  ."<a href=\"#menu\"><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>menu</title><path d='M32 96v64h448V96H32zm0 128v64h448v-64H32zm0 128v64h448v-64H32z' /></svg></a>" . PHP_EOL
  ."</header>" . PHP_EOL
  ."<nav class=\"menu\" id=\"menu\">" . PHP_EOL
  ."<ul>" . PHP_EOL
  ."<li><a href=\"?user-read-all\">Users</a></li>" . PHP_EOL
  ."<li><a href=\"?logout\">Logout</a></li>" . PHP_EOL
  ."</ul>" . PHP_EOL
  ."<a class=\"menu-close\" href=\"\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\"><title>cancel</title><path d=\"M256 16a240 240 0 100 480 240 240 0 000-480zm0 60a180 180 0 110 360 180 180 0 010-360zm-80.6 60l-3 .3c-18.4 3.4-45.4 34.7-33.5 46.6l73.2 73.1-73.2 73.2c-14.6 14.6 29.3 58.5 44 43.9l73.1-73.2 73.2 73.2c14.6 14.6 58.5-29.3 43.9-44l-73.2-73 73.2-73.2c14.6-14.6-29.3-58.5-44-43.9L256 212.2 182.8 139c-2-2-4.5-3-7.4-3z\"/></svg></a>" . PHP_EOL
  ."</nav>" . PHP_EOL;