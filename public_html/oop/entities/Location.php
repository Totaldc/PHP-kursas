<?php
class Location {
  private $latitude;
  private $longitude;
  
  public function __construct($latitude, $longitude)
  {
    $this->latitude = $latitude;
    $this->longitude = $longitude;
  }
}