<?php 
namespace Jsnlib\Restful;
/**
 * 簡化 GuzzleHttp 的動作
 * 例如 POST GET PUT DELETE 後的
 */
class Client
{
    protected $client;

    /**
     * 設定  
     * @param $config['base_uri'] 
     * ... 參考 http://docs.guzzlephp.org/en/latest/quickstart.html#making-a-request
     */
    public function __construct(array $config)
    {
        $this->client = new \GuzzleHttp\Client($config);
    }

    protected function response($response)
    {
        $status_code = $response->getStatusCode();
        $body = $response->getBody();
        $body_string = (string) $body;

        //decode json
        $decode = \json_decode($body_string);

        if (\is_object($decode))
        {
            $Ao = new \Jsnlib\Ao($body_string);
            return $Ao;            
        }
        // 若是文字
        else
        {
            return $body_string;
        }
    }

    // 500 level errors 參考 http://docs.guzzlephp.org/en/latest/quickstart.html?highlight=GuzzleHttp%5CException%5CServerException
    protected function GuzzleHttp_Exception_ServerException($e)
    {
        echo \GuzzleHttp\Psr7\str($e->getRequest());
        echo "<br><br>";
        echo \GuzzleHttp\Psr7\str($e->getResponse());
        die;
    }

    public function post($url = null, array $param = null, $ismultipart = false)
    {
        try
        {
            if ($ismultipart === false) 
            {
                $response = $this->client->request('POST', $url, 
                [
                    'form_params' => $param
                ]);
            }
            else 
            {
                $response = $this->client->request('POST', $url, 
                [
                    'multipart' => $param
                ]);   
            }

            return $this->response($response);
        }
        catch(\GuzzleHttp\Exception\ServerException $e)
        {
            $this->GuzzleHttp_Exception_ServerException($e);
        }
        
    }

    public function get($url = null, array $param = null)
    {
        try
        {
            $response = $this->client->request('GET', $url, 
            [
                'query' => $param
            ]);

            return $this->response($response);
        }
        catch(\GuzzleHttp\Exception\ServerException $e)
        {
            $this->GuzzleHttp_Exception_ServerException($e);
        }
    }


    public function put($url = null, array $param = null)
    {
        try
        {
            $response = $this->client->request('PUT', $url, 
            [
                'form_params' => $param
            ]);

            return $this->response($response);
        }
        catch(\GuzzleHttp\Exception\ServerException $e)
        {
            $this->GuzzleHttp_Exception_ServerException($e);
        }
    }

    public function delete($url = null, array $param = null)
    {
        try
        {
            $response = $this->client->request('DELETE', $url, 
            [
                'form_params' => $param
            ]);

            return $this->response($response);
        }
        catch(\GuzzleHttp\Exception\ServerException $e)
        {
            $this->GuzzleHttp_Exception_ServerException($e);
        }
    }

}