<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi;

use JetBrains\PhpStorm\Pure;
use ReinertTomas\JsonPlaceholderApi\Album\Album;
use ReinertTomas\JsonPlaceholderApi\Comment\Comment;
use ReinertTomas\JsonPlaceholderApi\Photo\Photo;
use ReinertTomas\JsonPlaceholderApi\Post\Post;
use ReinertTomas\JsonPlaceholderApi\Todo\Todo;
use ReinertTomas\JsonPlaceholderApi\User\User;

final class JsonPlaceholderApi
{
    private JsonPlaceholderClient $jsonPlaceholderClient;

    #[Pure]
    public function __construct(array $httpApiConfig)
    {
        $this->jsonPlaceholderClient = new JsonPlaceholderClient($httpApiConfig['base_uri']);
    }

    #[Pure]
    public function album(): Album
    {
        return new Album($this->jsonPlaceholderClient);
    }

    #[Pure]
    public function comment(): Comment
    {
        return new Comment($this->jsonPlaceholderClient);
    }

    #[Pure]
    public function post(): Post
    {
        return new Post($this->jsonPlaceholderClient);
    }

    #[Pure]
    public function photo(): Photo
    {
        return new Photo($this->jsonPlaceholderClient);
    }

    #[Pure]
    public function todo(): Todo
    {
        return new Todo($this->jsonPlaceholderClient);
    }

    #[Pure]
    public function user(): User
    {
        return new User($this->jsonPlaceholderClient);
    }
}
