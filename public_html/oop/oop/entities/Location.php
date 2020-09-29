<?php
class Location {
  protected float $latitude;
  protected float $longitude;
  
  public function __construct(float $latitude, float $longitude)
  {
    $this->latitude = $latitude;
    $this->longitude = $longitude;
  }
}