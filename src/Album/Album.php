<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Album;

use ReinertTomas\JsonPlaceholderApi\Exception\Exception;
use ReinertTomas\JsonPlaceholderApi\JsonPlaceholderClient;

class Album
{
    private const ENDPOINT = '/albums';

    private JsonPlaceholderClient $httpClient;

    public function __construct(JsonPlaceholderClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(int $id): AlbumResponse
    {
        $response = $this->httpClient->get(self::ENDPOINT . '/' . $id);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error get album %d. Status code %d', $id, $response->getStatusCode()),
            );
        }

        return new AlbumResponse($response->toArray());
    }

    /**
     * @return array<int, AlbumResponse>
     */
    public function list(): array
    {
        /** @var array<int, AlbumResponse> $albumResponses */
        $albumResponses = [];

        $response = $this->httpClient->get(self::ENDPOINT);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error list album. Status code %d', $response->getStatusCode()),
            );
        }

        $postsArray = $response->toArray();

        foreach ($postsArray as $postArray) {
            $albumResponses[] = new AlbumResponse($postArray);
        }

        return $albumResponses;
    }
}
