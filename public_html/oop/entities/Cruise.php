<?php

class Cruise
{
  // Primary props
  private $startDateTime;
  private $finishDateTime;
  private $startLocation;
  private $finishLocation;
  private $price;
  // Secondary props
  private $ship;
  private $stops;
  private $advImages;

  public function __construct($startDateTime, $finishDateTime, $startLocation, $finishLocation, $price)
  {
    $this->startDateTime = $startDateTime;
    $this->finishDateTime = $finishDateTime;
    $this->startLocation = $startLocation;
    $this->finishLocation = $finishLocation;
    $this->price = $price;
    $this->stops = [];
    $this->advImages = [];
  }

  /**
   * Sets ship for Cruise object
   * 
   * @param Ship $ship instance of Ship class, which will be set for Cruise object
   */
  public function setShip($ship)
  {
    $this->ship = $ship;
  }

  /**
   * Sets stops of the cruise
   * 
   * @param array $stops an array of ShipPort objects
   */
  public function setStops($stops)
  {
    foreach ($stops as $cruiseStop) {
      if (!($cruiseStop instanceof CruiseStop)) throw new Exception("Stop must be an instance of ShipPort class.");
      $this->stops[] = $cruiseStop;
    }
  }

  /**
   * Adds image to advertisment image array 
   * 
   * @param string $imgPath img to be added to advertisment image array.
   */
  public function addImage($imgPath)
  {
    $this->advImages[] = $imgPath;
  }
}
