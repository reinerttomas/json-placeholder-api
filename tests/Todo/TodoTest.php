<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Tests\Todo;

use PHPUnit\Framework\TestCase;
use ReinertTomas\JsonPlaceholderApi\Todo\TodoResponse;

class TodoTest extends TestCase
{
    /**
     * @dataProvider todoProvider
     */
    public function testCommentResponse(array $data): void
    {
        $response = new TodoResponse($data);

        $this->assertEquals($data['id'], $response->getId());
        $this->assertEquals($data['userId'], $response->getUserId());
        $this->assertEquals($data['title'], $response->getTitle());
        $this->assertEquals($data['completed'], $response->isCompleted());
    }

    public function todoProvider(): array
    {
        $todo1 = [
            'id' => 1,
            'userId' => 1,
            'title' => 'accusamus beatae',
            'completed' => true,
        ];

        $todo2 = [
            'id' => 2,
            'userId' => 2,
            'title' => 'reprehenderit est deserunt',
            'completed' => false,
        ];

        return [
            [$todo1],
            [$todo2],
        ];
    }
}
