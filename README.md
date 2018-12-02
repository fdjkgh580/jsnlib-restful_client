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
$result = $client->post('method', 
[
    'Say' => 'Hello World'
]);
$result = $client->put('method', 
[
    'Say' => 'Hello World'
]);
$result = $client->patch('method', 
[
    'Say' => 'Hello World'
]);
$result = $client->delete('method', 
[
    'Say' => 'Hello World'
]);
````

### POST
文件上傳，如 video 有多筆
````php 
$result = $client->post('method', 
[
    [
        'name'     => 'video[]',
        'contents' => fopen('demo/demo.mp4', 'r')
    ],
], true);

````
