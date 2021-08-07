<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Album;

use ReinertTomas\Utils\Arrays;

class AlbumResponse
{
    private int $id;
    private int $userId;
    private string $title;

    public function __construct(array $data)
    {
        Arrays::keyExistsThrowable($data, 'id');
        Arrays::keyExistsThrowable($data, 'userId');
        Arrays::keyExistsThrowable($data, 'title');

        $this->id = $data['id'];
        $this->userId = $data['userId'];
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
}
