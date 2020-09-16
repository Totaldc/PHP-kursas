<?php
class Ship
{
  // Primary props
  private $brand;
  private $model;
  private $rooms;
  // Secondary props
  private $description;
  private $images;

  public function __construct($brand, $model, $rooms)
  {
    $this->brand = $brand;
    $this->model = $model;
    $this->rooms = array_fill(0, $rooms, [
      'spaces' => 2,
      'type' => 'C',
      'taken' => false
    ]);
  }
}
