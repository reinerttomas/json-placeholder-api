<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Client\ClientExceptionInterface;
use ReinertTomas\JsonPlaceholderApi\Exception\Exception;

final class JsonPlaceholderClient
{
    private string $baseUri;
    private ?Client $client = null;

    public function __construct(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function get(string $uri, array $options = []): JsonPlaceholderResponse
    {
        $options['Content-type'] = 'application/json; charset=utf-8';

        return $this->request('GET', $uri, $options);
    }

    public function post(string $uri, array $data, array $options = []): JsonPlaceholderResponse
    {
        $options['Content-type'] = 'application/json; charset=utf-8';
        $options[RequestOptions::JSON] = $data;

        return $this->request('POST', $uri, $options);
    }

    public function put(string $uri, array $data, array $options = []): JsonPlaceholderResponse
    {
        $options['Content-type'] = 'application/json; charset=utf-8';
        $options[RequestOptions::JSON] = $data;

        return $this->request('PUT', $uri, $options);
    }

    public function delete(string $uri, array $options = []): JsonPlaceholderResponse
    {
        $options['Content-type'] = 'application/json; charset=utf-8';

        return $this->request('DELETE', $uri, $options);
    }

    public function request(string $method, string $uri, array $options = []): JsonPlaceholderResponse
    {
        try {
            $response = $this->getClient()->request($method, $uri, $options);
        } catch (ClientExceptionInterface $e) {
            throw new Exception($e->getMessage());
        }

        return new JsonPlaceholderResponse($response);
    }

    private function getClient(): Client
    {
        if ($this->client === null) {
            $this->client = new Client(['base_uri' => $this->baseUri]);
        }

        return $this->client;
    }
}
