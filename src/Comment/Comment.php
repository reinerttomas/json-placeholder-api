<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Comment;

use ReinertTomas\JsonPlaceholderApi\Exception\Exception;
use ReinertTomas\JsonPlaceholderApi\JsonPlaceholderClient;

class Comment
{
    private const ENDPOINT = '/comments';

    private JsonPlaceholderClient $httpClient;

    public function __construct(JsonPlaceholderClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(int $id): CommentResponse
    {
        $response = $this->httpClient->get(self::ENDPOINT . '/' . $id);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error get comment %d. Status code %d', $id, $response->getStatusCode()),
            );
        }

        return new CommentResponse($response->toArray());
    }

    /**
     * @return array<int, CommentResponse>
     */
    public function list(): array
    {
        /** @var array<int, CommentResponse> $commentResponses */
        $commentResponses = [];

        $response = $this->httpClient->get(self::ENDPOINT);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error list comment. Status code %d', $response->getStatusCode()),
            );
        }

        $postsArray = $response->toArray();

        foreach ($postsArray as $postArray) {
            $commentResponses[] = new CommentResponse($postArray);
        }

        return $commentResponses;
    }
}
