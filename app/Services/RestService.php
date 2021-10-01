<?php

namespace App\Services;

use App\Exceptions\HaltException;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class RestService
{
    public Client $rest;

    public function __construct()
    {
        $this->rest = new Client;
    }

    /**
     * @param string $url
     * @param array $requestParams
     * @return ResponseInterface|null
     * @throws HaltException
     */
    public function get(string $url, array $requestParams = []): ?ResponseInterface
    {
        try {
            return $this->rest->get($url, $requestParams);
        } catch (Throwable $error) {
            throw new HaltException($error->getMessage());
        }
    }

    /**
     * @param string $url
     * @param array $requestParams
     * @return ResponseInterface|null
     * @throws HaltException
     */
    public function post(string $url, array $requestParams = []): ?ResponseInterface
    {
        try {
            return $this->rest->post($url, $requestParams);
        } catch (Throwable $error) {
            throw new HaltException($error->getMessage());
        }
    }
}
