<?php
class ShipPort extends Location
{
  private $name;
  private $city;
  private $country;

  public function __construct($name, $city, $country, $latitude, $longitude)
  {
    // Kviečia tėvinės klasės konstruktorių
    parent::__construct($latitude, $longitude);
    $this->name = $name;
    $this->city = $city;
    $this->country = $country;
  }


  public function getCityAndCountry()
  {
    return $this->city . '|' . $this->country;
  }

}
