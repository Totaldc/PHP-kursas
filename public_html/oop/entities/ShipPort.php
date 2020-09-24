<?php
class ShipPort extends Location implements IJSONSerialiazible
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

  public static function createFromAssocArr(array $arr): object
  {
    return (object)[];
  }

  public function getCityAndCountry(): string
  {
    return $this->city . ' | ' . $this->country;
  }

  public function getCity(): string
  {
    return $this->city;
  }

  //  Interface methods

  public function toAssocArr(): array{
    return [
      "name" => $this->name,
      "city" => $this->city,
      "country" => $this->country
    ];
  }

  public function toJSON(): string
  {
    return json_encode($this->toAssocArr());
  }
}
