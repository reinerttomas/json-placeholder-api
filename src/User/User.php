<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\User;

use ReinertTomas\JsonPlaceholderApi\Exception\Exception;
use ReinertTomas\JsonPlaceholderApi\JsonPlaceholderClient;

class User
{
    private const ENDPOINT = '/users';

    private JsonPlaceholderClient $httpClient;

    public function __construct(JsonPlaceholderClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(int $id): UserResponse
    {
        $response = $this->httpClient->get(self::ENDPOINT . '/' . $id);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error get user %d. Status code %d', $id, $response->getStatusCode()),
            );
        }

        return new UserResponse($response->toArray());
    }

    public function list(): array
    {
        /** @var array<int, UserResponse> $userResponses */
        $userResponses = [];

        $response = $this->httpClient->get(self::ENDPOINT);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error user list. Status code %d', $response->getStatusCode()),
            );
        }

        $postsArray = $response->toArray();

        foreach ($postsArray as $postArray) {
            $userResponses[] = new UserResponse($postArray);
        }

        return $userResponses;
    }
}