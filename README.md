# restful_client

## 安裝
composer require jsnlib/restful_client


## 使用方式

````php 
require_once '../vendor/autoload.php';

$client = new \Jsnlib\Restful\Client(
[
    'base_uri' => 'http://dev.api.westamps.com/v1/'
]);

$result = $client->get('method', 
[
    'Say' => 'Hello World'
]);

````