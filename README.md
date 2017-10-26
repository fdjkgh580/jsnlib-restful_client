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
````

````php 
$result = $client->get('method', 
[
    'Say' => 'Hello World'
]);

````

````php 
$result = $client->post('method', 
[
    [
        'name'     => 'upl[]',
        'contents' => fopen('demo/demo.mp4', 'r')
    ],

], true);

````
