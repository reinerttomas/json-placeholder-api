<?php
declare(strict_types=1);

namespace ReinertTomas\JsonPlaceholderApi\User;

use ReinertTomas\JsonPlaceholderApi\User\Attribute\Address;
use ReinertTomas\JsonPlaceholderApi\User\Attribute\Company;
use ReinertTomas\JsonPlaceholderApi\User\Attribute\Geolocation;
use ReinertTomas\Utils\Arrays;

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
        $this->check($data);

        $addressArray = $data['address'];
        $companyArray = $data['company'];

        $this->checkAddress($addressArray);
        $this->checkCompany($companyArray);

        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->setAddress($addressArray);
        $this->phone = $data['phone'];
        $this->website = $data['website'];
        $this->setCompany($companyArray);
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

    private function check(array $data): void
    {
        Arrays::keyExistsThrowable($data, 'id');
        Arrays::keyExistsThrowable($data, 'name');
        Arrays::keyExistsThrowable($data, 'username');
        Arrays::keyExistsThrowable($data, 'email');
        Arrays::keyExistsThrowable($data, 'address');
        Arrays::keyExistsThrowable($data, 'phone');
        Arrays::keyExistsThrowable($data, 'website');
        Arrays::keyExistsThrowable($data, 'company');
    }

    private function checkAddress(array $address): void
    {
        Arrays::keyExistsThrowable($address, 'street');
        Arrays::keyExistsThrowable($address, 'suite');
        Arrays::keyExistsThrowable($address, 'city');
        Arrays::keyExistsThrowable($address, 'zipcode');
        Arrays::keyExistsThrowable($address, 'geo');

        $geolocation = $address['geo'];

        Arrays::keyExistsThrowable($geolocation, 'lat');
        Arrays::keyExistsThrowable($geolocation, 'lng');
    }

    private function checkCompany(array $company): void
    {
        Arrays::keyExistsThrowable($company, 'name');
        Arrays::keyExistsThrowable($company, 'catchPhrase');
        Arrays::keyExistsThrowable($company, 'bs');
    }

    private function setAddress(array $address): void
    {
        $geolocation = new Geolocation(
            (float)$address['geo']['lat'],
            (float)$address['geo']['lng'],
        );

        $this->address = new Address(
            $address['street'],
            $address['suite'],
            $address['city'],
            $address['zipcode'],
            $geolocation,
        );
    }

    private function setCompany(array $company): void
    {
        $this->company = new Company(
            $company['name'],
            $company['catchPhrase'],
            $company['bs'],
        );
    }
}
