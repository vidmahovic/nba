<?php

namespace CartHook\Entities\Resources;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Class ApiResource
 *
 * @package \CartHook\Entities\Resources
 */
class ApiResource extends Resource
{
    const PARAMS_OPT = 'params';
    const METHOD_OPT = 'method';

    protected static $validRequestMethods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];

    public function fetch(string $source, array $options = []) : array
    {
        $requestMethod = $this->parseRequestMethod($options);
        $requestBody = $this->parseRequestParams($options);
        $requestType = $this->resolveRequestType($requestMethod);

        $client = new Client;
        $response = $client->request($requestMethod, $source, [
            $requestType => $requestBody,
            'timeout' => 20,
            'headers' => ['Referrer' => $this->applyReferrer(), 'Accept' => 'application/json', 'User-Agent' => $this->applyUserAgent()]
        ]);

        if($this->isJson($response)) {
            return $this->parseJson((string) $response->getBody());
        }

        return [];

    }


    private function parseRequestMethod(array $options) : string
    {
        if(array_key_exists(static::METHOD_OPT, $options) && $this->validMethod($options[static::METHOD_OPT])) {
            return strtoupper($options[static::METHOD_OPT]);
        }

        return 'GET';
    }

    private function validMethod(string $method) : bool {
        return in_array(strtoupper($method), static::$validRequestMethods);
    }

    private function parseRequestParams(array $options) : array {
        return array_key_exists(static::PARAMS_OPT, $options) ? $options[static::PARAMS_OPT] : [];
    }

    private function isJson(Response $response)
    {
        $contentTypes = $response->getHeader('content-type');
        return count(array_filter($contentTypes, function($contentType) {
            return strpos($contentType, 'application/json') !== false;
        })) > 0;
    }

    private function resolveRequestType($requestMethod)
    {
        return $requestMethod === 'GET' ? 'query' : 'json';
    }

    private function applyReferrer() {
        return "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36";
    }

    private function applyUserAgent() {
        return "http://stats.nba.com/scores/";
    }
}
