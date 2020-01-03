<?php

namespace Zetgram;

use GuzzleHttp\Client as HttpClient;

class Api extends ApiAbstract
{
    /**
     * @var HttpClient
     */
    protected HttpClient $client;
    /**
     * @var string
     */
    protected string $token;

    protected const API_END_POINT = 'https://api.telegram.org/bot';

    protected string $api_url;

    public function __construct(HttpClient $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
        $this->api_url = self::API_END_POINT . $token . '/';
    }

    protected function sendRequest(string $uri, array $data = [])
    {
        if (empty($data)) {
            return $this->getRequest($uri);
        }
        return $this->postRequest($uri, $data);
    }

    protected function request($method, $data = [])
    {
        $uri = $this->api_url . $method;
        $response = $this->sendRequest($uri, $data);
        $body = $response->getBody()->getContents();
        return json_decode($body)->result;
    }

    protected function postRequest(string $uri, array $data)
    {
        return $this->client->request('POST', $uri, [
            'form_params' => $data
        ]);
    }

    protected function getRequest(string $uri)
    {
        return $this->client->request('GET', $uri);
    }
}
