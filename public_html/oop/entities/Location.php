<?php
class Location {
  private float $latitude;
  private float $longitude;
  
  public function __construct(float $latitude, float $longitude)
  {
    $this->latitude = $latitude;
    $this->longitude = $longitude;
  }
}