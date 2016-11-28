<?php

$oauth_consumer_secret = 'bbbbbb';
$encode_a = rawurlencode($oauth_consumer_secret);

$oauth_token_secret = 'dddddd';
$encode_b = rawurlencode($oauth_token_secret);

$signature_key = $encode_a . '&' . $encode_b;

$request_method = rawurlencode('POST');
$request_url = rawurlencode('http://example.com/sample.php');

$params = array(
  'title' => 'AAA',
  'name' => 'BBB',
  'text' => 'CCC',
);

ksort($params);

foreach($params as $key => $value) {
  $params[$key] = rawurlencode($value);
}

$request_params = http_build_query($params, '', '&');
$request_params = rawurlencode($request_params);
$signature_data = $request_method .'&'. $request_url . '&' . $request_params;

$hash = hash_hmac('sha1', $signature_data, $signature_key, TRUE);
$signature = base64_encode($hash);
echo $signature;
