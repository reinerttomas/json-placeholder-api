<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class JsonPlaceholderResponse
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function getBody(): StreamInterface
    {
        return $this->response->getBody();
    }

    public function getContents(): string
    {
        return $this->getBody()->getContents();
    }

    public function toArray(): array
    {
        return json_decode($this->getContents(), true);
    }
}
