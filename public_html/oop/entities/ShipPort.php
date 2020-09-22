<?php
class ShipPort extends Location implements IJSONSerializible;
{
  private string $name;
  private string $city;
  private string $country;

  public function __construct(string $name, string $city, string $country, float $latitude, float $longitude)
  {
    parent::__construct($latitude, $longitude);
    $this->name = $name;
    $this->city = $city;
    $this->country = $country;
  }

  public function getCityAndCountry(): string
  {
    return $this->city . ' | ' . $this->country;
  }

  public function getCity(): string
  {
    return $this->city;
  }
}
