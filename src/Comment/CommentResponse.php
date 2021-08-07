<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Comment;

use ReinertTomas\Utils\Arrays;

class CommentResponse
{
    private int $id;
    private int $postId;
    private string $name;
    private string $email;
    private string $body;

    public function __construct(array $data)
    {
        Arrays::keyExistsThrowable($data, 'id');
        Arrays::keyExistsThrowable($data, 'postId');
        Arrays::keyExistsThrowable($data, 'name');
        Arrays::keyExistsThrowable($data, 'email');
        Arrays::keyExistsThrowable($data, 'body');

        $this->id = $data['id'];
        $this->postId = $data['postId'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->body = $data['body'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
