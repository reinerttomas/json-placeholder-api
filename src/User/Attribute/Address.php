<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\User\Attribute;

class Address
{
    private string $street;
    private string $suite;
    private string $city;
    private string $zipcode;
    private Geolocation $geolocation;

    public function __construct(
        string $street,
        string $suite,
        string $city,
        string $zipcode,
        Geolocation $geolocation,
    ) {
        $this->street = $street;
        $this->suite = $suite;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->geolocation = $geolocation;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getSuite(): string
    {
        return $this->suite;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function getGeolocation(): Geolocation
    {
        return $this->geolocation;
    }
}
