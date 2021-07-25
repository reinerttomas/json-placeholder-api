<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Photo;

use ReinertTomas\JsonPlaceholderApi\Utils\Arrays;
use ReinertTomas\JsonPlaceholderApi\Utils\Parser;

class PhotoResponse
{
    private int $id;
    private int $albumId;
    private string $title;
    private string $url;
    private string $thumbnailUrl;

    public function __construct(array $data)
    {
        $this->checkResponse($data);

        $this->id = Parser::parseInt($data['id']);
        $this->albumId = Parser::parseInt($data['albumId']);
        $this->title = $data['title'];
        $this->url = $data['url'];
        $this->thumbnailUrl = $data['thumbnailUrl'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAlbumId(): int
    {
        return $this->albumId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getThumbnailUrl(): string
    {
        return $this->thumbnailUrl;
    }

    private function checkResponse(array $data): void
    {
        Arrays::checkIndexExists($data, 'id');
        Arrays::checkIndexExists($data, 'albumId');
        Arrays::checkIndexExists($data, 'title');
        Arrays::checkIndexExists($data, 'url');
        Arrays::checkIndexExists($data, 'thumbnailUrl');
    }
}
