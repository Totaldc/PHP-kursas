<?php

class Cruise
{
  // Pagrindinės savybės
  private $startDateTime;
  private $finishDateTime;
  private $startLocation;
  private $finishLocation;
  private $price;
  // Kitos svarbios savybės
  private $ship;
private $stops;
  private $countries;
  // Šalutinės savybės
  private $advImages;
  
  public function __construct($startDateTime, $finishDateTime, $startLocation, $finishLocation, $price){
    $this->startDateTime = $startDateTime;
    $this->finishDateTime = $finishDateTime;
    $this->startLocation = $startLocation;
    $this->finishLocation = $finishLocation;
    $this->price = $price;
  }

  public function setShip($ship){
      $this->ship = $ship; 

  }


}
