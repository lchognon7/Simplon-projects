<?php

  // load DB conf
  include("mod.conf.default.php");
  try {
    // initiate object from class
    $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
  } catch (PDOException $e) {
    $pdo = NULL; // close connexion
    exit("OOPS - DB error : " . $e->getMessage());
  }