<?php

require_once(__DIR__ . '/config.php');

use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth(
  CONSUMER_KEY,
  CONSUMER_SECRET,
  ACCESS_TOKEN,
  ACCESS_TOKEN_SECRET);
//$content = $connection->get("account/verify_credentials");

$media = $connection->upload("media/upload", [
  'media' => __DIR__ . '/sakura.png'
]);

$res = $connection->post("statuses/update", [
  'status' => 'botから画像投稿のテストです！',
  'media_ids' => $media->media_id
]);

if ($connection->getLastHttpCode() === 200) {
    echo 'Success!' . PHP_EOL;
} else {
    echo 'Error!' . $res->errors[0]->messages . PHP_EOL;
}
