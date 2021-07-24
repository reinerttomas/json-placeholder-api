<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Album;

use ReinertTomas\JsonPlaceholderApi\Utils\Arrays;
use ReinertTomas\JsonPlaceholderApi\Utils\Parser;

class AlbumResponse
{
    private int $id;
    private int $userId;
    private string $title;

    public function __construct(array $data)
    {
        $this->checkResponse($data);

        $this->id = Parser::parseInt($data['id']);
        $this->userId = Parser::parseInt($data['userId']);
        $this->title = $data['title'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    private function checkResponse(array $data): void
    {
        Arrays::checkIndexExists($data, 'id');
        Arrays::checkIndexExists($data, 'userId');
        Arrays::checkIndexExists($data, 'title');
    }
}
