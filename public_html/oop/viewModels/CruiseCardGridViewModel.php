<?php

class CruiseCardGridViewModel
{
  private string $header;
  private array $cruises;

  public function __construct(string $header, array $cruises)
  {
    $this->header = $header;
    $this->cruises = $cruises;
  }

  public function render(): void
  {
    include 'views/cardGridView.php';
  }
}
