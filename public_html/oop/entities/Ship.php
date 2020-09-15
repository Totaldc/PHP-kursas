<?php

class Ship{
    private $brand;
    private $model;
    private $rooms;
    private $description;

    private $images;

    public function __construct($brand, $model, $rooms)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->rooms = $rooms;
    }
}