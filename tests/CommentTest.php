<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Tests;

use PHPUnit\Framework\TestCase;
use ReinertTomas\JsonPlaceholderApi\Comment\CommentResponse;

class CommentTest extends TestCase
{
    /**
     * @dataProvider commentProvider
     */
    public function testCommentResponse(array $data): void
    {
        $response = new CommentResponse($data);

        $this->assertEquals($data['id'], $response->getId());
        $this->assertEquals($data['postId'], $response->getPostId());
        $this->assertEquals($data['name'], $response->getName());
        $this->assertEquals($data['email'], $response->getEmail());
        $this->assertEquals($data['body'], $response->getBody());
    }

    public function commentProvider(): array
    {
        $comment1 = [
            'id' => 1,
            'postId' => 1,
            'name' => 'd labore ex et quam laborum',
            'email' => 'eliseo@gardner.biz',
            'body' => 'alias odio sit',
        ];

        $comment2 = [
            'id' => 2,
            'postId' => 2,
            'name' => 'odio adipisci rerum aut animi',
            'email' => 'nikita@garfield.biz',
            'body' => 'quia molestiae reprehenderit',
        ];

        return [
            [$comment1],
            [$comment2],
        ];
    }
}
