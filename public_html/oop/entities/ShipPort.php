<?php

class ShipPort extends Location{
    private $name;
    private $city;
    private $country;



    public function __construct($name, $city, $country, $latitude, $longitude)
    {
        parent::__contruct($latitude, $longitude);
        $this->name = $name;
        $this->city = $city;
        $this->country = $country;
    }

}