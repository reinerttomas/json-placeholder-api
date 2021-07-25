<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Todo;

use ReinertTomas\JsonPlaceholderApi\Exception\Exception;
use ReinertTomas\JsonPlaceholderApi\JsonPlaceholderClient;

class Todo
{
    private const ENDPOINT = '/todos';

    private JsonPlaceholderClient $httpClient;

    public function __construct(JsonPlaceholderClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(int $id): TodoResponse
    {
        $response = $this->httpClient->get(self::ENDPOINT . '/' . $id);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error get todo %d. Status code %d', $id, $response->getStatusCode()),
            );
        }

        return new TodoResponse($response->toArray());
    }

    public function list(): array
    {
        /** @var array<int, TodoResponse> $todoResponses */
        $todoResponses = [];

        $response = $this->httpClient->get(self::ENDPOINT);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error list todo. Status code %d', $response->getStatusCode()),
            );
        }

        $postsArray = $response->toArray();

        foreach ($postsArray as $postArray) {
            $todoResponses[] = new TodoResponse($postArray);
        }

        return $todoResponses;
    }
}
