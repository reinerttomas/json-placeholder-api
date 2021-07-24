<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\Utils;

use ReinertTomas\JsonPlaceholderApi\Exception\Exception;

class Arrays
{
    public static function checkIndexExists(array $array, string $index): void
    {
        if (!array_key_exists($index, $array)) {
            throw new Exception('Index ' . $index . ' not exist.');
        }
    }
}
