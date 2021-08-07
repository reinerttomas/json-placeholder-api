<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Photo;

use ReinertTomas\JsonPlaceholderApi\Exception\Exception;
use ReinertTomas\JsonPlaceholderApi\JsonPlaceholderClient;

class Photo
{
    private const ENDPOINT = '/photos';

    private JsonPlaceholderClient $httpClient;

    public function __construct(JsonPlaceholderClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(int $id): PhotoResponse
    {
        $response = $this->httpClient->get(self::ENDPOINT . '/' . $id);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error get photo %d. Status code %d', $id, $response->getStatusCode()),
            );
        }

        return new PhotoResponse($response->toArray());
    }

    /**
     * @return array<int, PhotoResponse>
     */
    public function list(): array
    {
        /** @var array<int, PhotoResponse> $photoResponses */
        $photoResponses = [];

        $response = $this->httpClient->get(self::ENDPOINT);

        if ($response->getStatusCode() !== 200) {
            throw new Exception(
                sprintf('Error list photo. Status code %d', $response->getStatusCode()),
            );
        }

        $postsArray = $response->toArray();

        foreach ($postsArray as $postArray) {
            $photoResponses[] = new PhotoResponse($postArray);
        }

        return $photoResponses;
    }
}
