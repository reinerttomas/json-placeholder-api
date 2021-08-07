<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Photo;

use ReinertTomas\Utils\Arrays;

class PhotoResponse
{
    private int $id;
    private int $albumId;
    private string $title;
    private string $url;
    private string $thumbnailUrl;

    public function __construct(array $data)
    {
        Arrays::keyExistsThrowable($data, 'id');
        Arrays::keyExistsThrowable($data, 'albumId');
        Arrays::keyExistsThrowable($data, 'title');
        Arrays::keyExistsThrowable($data, 'url');
        Arrays::keyExistsThrowable($data, 'thumbnailUrl');

        $this->id = $data['id'];
        $this->albumId = $data['albumId'];
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
}
