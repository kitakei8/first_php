<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', '1qaz!QAZ');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);

try {
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //$db->exec("insert into users (name, score) values ('taguchi', 55)");
  //echo "user added!";

  $stmt = $db->prepare("insert into users (name, score) values (:name, :score)");

  $name = 'taguchi';
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);
  $score = 23;
  $stmt->bindValue(':score', $score, PDO::PARAM_INT);
  $stmt->execute();
  $score = 66;
  $stmt->bindValue(':score', $score, PDO::PARAM_INT);
  $stmt->execute();
  //$stmt->execute([':name'=>'fkoji', ':score'=>80]);
  //echo "inserted: " . $db->lastInsertId();


} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
