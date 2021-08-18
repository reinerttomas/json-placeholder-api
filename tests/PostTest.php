<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Tests;

use PHPUnit\Framework\TestCase;
use ReinertTomas\JsonPlaceholderApi\Post\PostResponse;

class PostTest extends TestCase
{
    /**
     * @dataProvider postProvider
     */
    public function testPostResponse(array $data): void
    {
        $response = new PostResponse($data);

        $this->assertEquals($data['id'], $response->getId());
        $this->assertEquals($data['userId'], $response->getUserId());
        $this->assertEquals($data['title'], $response->getTitle());
        $this->assertEquals($data['body'], $response->getBody());
    }

    public function postProvider(): array
    {
        $post1 = [
            'id' => 1,
            'userId' => 1,
            'title' => 'accusamus beatae',
            'body' => 'quia et suscipit',
        ];

        $post2 = [
            'id' => 2,
            'userId' => 2,
            'title' => 'reprehenderit est deserunt',
            'body' => 'est rerum tempore',
        ];

        return [
            [$post1],
            [$post2],
        ];
    }
}
