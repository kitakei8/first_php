<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', '1qaz!QAZ');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);

class User {
  // public $id;
  // public $name;
  // public $score;
  public function show() {
    echo "$this->name ($this->score)";
  }
}

try {
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->beginTransaction();
  $db->exec("update users set score = score-10 where name = 'taguchi'");
  $db->exec("update users set score = score+10 where name = 'dotinstall'");
  $db->commit();

  // $stmt = $db->prepare("update users set score = :score where name = :name");
  // $stmt->execute([':score' => 100, ':name' => 'taguchi']);
  // echo 'row updated: ' . $stmt->rowCount();
  //
  // $stmt = $db->prepare("delete from users where name = :name");
  // $stmt->execute([':name' => 'dotinstall']);
  // echo 'row deleted: ' . $stmt->rowCount();
  // $stmt = $db->prepare("select score from users order by score desc limit ?");
  // $stmt->bindValue(1, 1, PDO::PARAM_INT);
  // $stmt->execute();

  // $stmt = $db->query("select * from users");
  // $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
  // foreach ($users as $user) {
  //   $user->show();
  // }
  // echo $stmt->rowCount() . " records found.";

  //$db->exec("insert into users (name, score) values ('taguchi', 55)");
  //echo "user added!";

  // $stmt = $db->prepare("insert into users (name, score) values (?, ?)");
  //
  // $name = 'taguchi';
  // $stmt->bindParam(1, $name, PDO::PARAM_STR);
  // $score = 23;
  // $stmt->bindParam(2, $score, PDO::PARAM_INT);
  // $stmt->execute();
  // $score = 66;
  // $stmt->execute();
  //$stmt->execute([':name'=>'fkoji', ':score'=>80]);
  //echo "inserted: " . $db->lastInsertId();


} catch (PDOException $e) {
  $db->rollback();
  echo $e->getMessage();
  exit;
}
