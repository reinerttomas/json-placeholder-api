<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Tests;

use PHPUnit\Framework\TestCase;
use ReinertTomas\JsonPlaceholderApi\Photo\PhotoResponse;

class PhotoTest extends TestCase
{
    /**
     * @dataProvider photoProvider
     */
    public function testPhotoResponse(array $data): void
    {
        $response = new PhotoResponse($data);

        $this->assertEquals($data['id'], $response->getId());
        $this->assertEquals($data['albumId'], $response->getAlbumId());
        $this->assertEquals($data['title'], $response->getTitle());
        $this->assertEquals($data['url'], $response->getUrl());
        $this->assertEquals($data['thumbnailUrl'], $response->getThumbnailUrl());
    }

    public function photoProvider(): array
    {
        $photo1 = [
            'id' => 1,
            'albumId' => 1,
            'title' => 'accusamus beatae',
            'url' => 'https://via.placeholder.com/600/92c952',
            'thumbnailUrl' => 'https://via.placeholder.com/150/92c952',
        ];

        $photo2 = [
            'id' => 2,
            'albumId' => 2,
            'title' => 'reprehenderit est deserunt',
            'url' => 'https://via.placeholder.com/600/771796',
            'thumbnailUrl' => 'https://via.placeholder.com/150/771796',
        ];

        return [
            [$photo1],
            [$photo2],
        ];
    }
}
