<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Post;

use ReinertTomas\JsonPlaceholderApi\Exception\Exception;
use ReinertTomas\JsonPlaceholderApi\JsonPlaceholderClient;

class Post
{
    private const ENDPOINT = '/posts';

    private JsonPlaceholderClient $httpClient;

    public function __construct(JsonPlaceholderClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(int $id): PostResponse
    {
        $response = $this->httpClient->get(self::ENDPOINT . '/' . $id);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error get post %d. Status code %d', $id, $response->getStatusCode()),
            );
        }

        return new PostResponse($response->toArray());
    }

    /**
     * @return array<int, PostResponse>
     */
    public function list(): array
    {
        /** @var array<int, PostResponse> $postResponses */
        $postResponses = [];

        $response = $this->httpClient->get(self::ENDPOINT);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error list post. Status code %d', $response->getStatusCode()),
            );
        }

        $postsArray = $response->toArray();

        foreach ($postsArray as $postArray) {
            $postResponses[] = new PostResponse($postArray);
        }

        return $postResponses;
    }
}
