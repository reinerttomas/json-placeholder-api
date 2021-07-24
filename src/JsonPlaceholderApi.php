<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi;

use JetBrains\PhpStorm\Pure;
use ReinertTomas\JsonPlaceholderApi\Post\Post;

final class JsonPlaceholderApi
{
    private JsonPlaceholderClient $jsonPlaceholderClient;

    #[Pure]
    public function __construct(array $httpApiConfig)
    {
        $this->jsonPlaceholderClient = new JsonPlaceholderClient($httpApiConfig['base_uri']);
    }

    #[Pure]
    public function post(): Post
    {
        return new Post($this->jsonPlaceholderClient);
    }
}
