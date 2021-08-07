<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Post;

use ReinertTomas\Utils\Arrays;

class PostResponse
{
    private int $id;
    private int $userId;
    private string $title;
    private string $body;

    public function __construct(array $data)
    {
        Arrays::keyExistsThrowable($data, 'id');
        Arrays::keyExistsThrowable($data, 'userId');
        Arrays::keyExistsThrowable($data, 'title');
        Arrays::keyExistsThrowable($data, 'body');

        $this->id = $data['id'];
        $this->userId = $data['userId'];
        $this->title = $data['title'];
        $this->body = $data['body'];
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

    public function getBody(): string
    {
        return $this->body;
    }
}
