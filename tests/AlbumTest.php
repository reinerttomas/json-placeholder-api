<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Tests;

use PHPUnit\Framework\TestCase;
use ReinertTomas\JsonPlaceholderApi\Album\AlbumResponse;

class AlbumTest extends TestCase
{
    /**
     * @dataProvider albumProvider
     */
    public function testAlbumResponse(array $data): void
    {
        $response = new AlbumResponse($data);

        $this->assertEquals($data['id'], $response->getId());
        $this->assertEquals($data['userId'], $response->getUserId());
        $this->assertEquals($data['title'], $response->getTitle());
    }

    public function albumProvider(): array
    {
        $album1 = [
            'id' => 1,
            'userId' => 1,
            'title' => 'Lorem Ipsum',
        ];

        $album2 = [
            'id' => 2,
            'userId' => 2,
            'title' => 'lorem ipsum.',
        ];

        return [
            [$album1],
            [$album2],
        ];
    }
}
