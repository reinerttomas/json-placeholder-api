<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\User;

use ReinertTomas\JsonPlaceholderApi\User\Attribute\Address;
use ReinertTomas\JsonPlaceholderApi\User\Attribute\Company;
use ReinertTomas\JsonPlaceholderApi\User\Attribute\Geolocation;
use ReinertTomas\JsonPlaceholderApi\Utils\Arrays;
use ReinertTomas\JsonPlaceholderApi\Utils\Parser;

class UserResponse
{
    private int $id;
    private string $name;
    private string $username;
    private string $email;
    private Address $address;
    private string $phone;
    private string $website;
    private Company $company;

    public function __construct(array $data)
    {
        $this->checkResponse($data);

        $address = $data['address'];
        $company = $data['company'];

        $this->checkAddress($address);
        $this->checkCompany($company);

        $this->id = Parser::parseInt($data['id']);
        $this->name = Parser::parseString($data['name']);
        $this->username = Parser::parseString($data['username']);
        $this->email = Parser::parseString($data['email']);
        $this->setAddress($address);
        $this->phone = Parser::parseString($data['phone']);
        $this->website = Parser::parseString($data['website']);
        $this->setCompany($company);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    private function checkResponse(array $data): void
    {
        Arrays::checkIndexExists($data, 'id');
        Arrays::checkIndexExists($data, 'name');
        Arrays::checkIndexExists($data, 'username');
        Arrays::checkIndexExists($data, 'email');
        Arrays::checkIndexExists($data, 'address');
        Arrays::checkIndexExists($data, 'phone');
        Arrays::checkIndexExists($data, 'website');
        Arrays::checkIndexExists($data, 'company');
    }

    private function checkAddress(array $data): void
    {
        Arrays::checkIndexExists($data, 'street');
        Arrays::checkIndexExists($data, 'suite');
        Arrays::checkIndexExists($data, 'city');
        Arrays::checkIndexExists($data, 'zipcode');
        Arrays::checkIndexExists($data, 'geo');

        $geolocation = $data['geo'];

        Arrays::checkIndexExists($geolocation, 'lat');
        Arrays::checkIndexExists($geolocation, 'lng');
    }

    private function checkCompany(array $data): void
    {
        Arrays::checkIndexExists($data, 'name');
        Arrays::checkIndexExists($data, 'catchPhrase');
        Arrays::checkIndexExists($data, 'bs');
    }

    private function setAddress(array $data): void
    {
        $geolocation = new Geolocation(
            Parser::parseFloat($data['geo']['lat']),
            Parser::parseFloat($data['geo']['lng']),
        );

        $this->address = new Address(
            Parser::parseString($data['street']),
            Parser::parseString($data['suite']),
            Parser::parseString($data['city']),
            Parser::parseString($data['zipcode']),
            $geolocation,
        );
    }

    private function setCompany(array $data): void
    {
        $this->company = new Company(
            Parser::parseString($data['name']),
            Parser::parseString($data['catchPhrase']),
            Parser::parseString($data['bs']),
        );
    }
}
