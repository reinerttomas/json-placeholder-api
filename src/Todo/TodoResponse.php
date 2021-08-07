<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Todo;

use ReinertTomas\Utils\Arrays;

class TodoResponse
{
    private int $id;
    private int $userId;
    private string $title;
    private bool $completed;

    public function __construct(array $data)
    {
        Arrays::keyExistsThrowable($data, 'id');
        Arrays::keyExistsThrowable($data, 'userId');
        Arrays::keyExistsThrowable($data, 'title');
        Arrays::keyExistsThrowable($data, 'completed');

        $this->id = $data['id'];
        $this->userId = $data['userId'];
        $this->title = $data['title'];
        $this->completed = $data['completed'];
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

    public function isCompleted(): bool
    {
        return $this->completed;
    }
}
