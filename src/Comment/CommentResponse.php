<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Comment;

use ReinertTomas\JsonPlaceholderApi\Utils\Arrays;
use ReinertTomas\JsonPlaceholderApi\Utils\Parser;

class CommentResponse
{
    private int $id;
    private int $postId;
    private string $name;
    private string $email;
    private string $body;

    public function __construct(array $data)
    {
        $this->checkResponse($data);

        $this->id = Parser::parseInt($data['id']);
        $this->postId = Parser::parseInt($data['postId']);
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

    private function checkResponse(array $data): void
    {
        Arrays::checkIndexExists($data, 'id');
        Arrays::checkIndexExists($data, 'postId');
        Arrays::checkIndexExists($data, 'name');
        Arrays::checkIndexExists($data, 'email');
        Arrays::checkIndexExists($data, 'body');
    }
}
