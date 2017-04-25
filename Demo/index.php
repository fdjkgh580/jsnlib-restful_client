<?php 
require_once '../vendor/autoload.php';

$client = new \Jsnlib\Restful\Client(
[
    'base_uri' => 'http://dev.api.westamps.com/v1/'
]);

$result = $client->get('method', 
[
    'Say' => 'Hello World'
]);

print_r($result);