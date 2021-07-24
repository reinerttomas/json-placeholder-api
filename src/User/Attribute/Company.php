<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\User\Attribute;

class Company
{
    private string $name;
    private string $catchPhrase;
    private string $bs;

    public function __construct(
        string $name,
        string $catchPhrase,
        string $bs,
    ) {
        $this->name = $name;
        $this->catchPhrase = $catchPhrase;
        $this->bs = $bs;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCatchPhrase(): string
    {
        return $this->catchPhrase;
    }

    public function getBs(): string
    {
        return $this->bs;
    }
}
