<?php
class CruiseStop implements IJSONSerializible;
{
  private ShipPort $port;
  private DateTime $arrivalDateTime;
  private DateTime $departureDateTime;

  public function __construct(ShipPort $port, $arrivalDateTime = null, DateTime $departureDateTime = null)
  {
    $this->port = $port;
    if (isset($arrivalDateTime)) $this->arrivalDateTime = $arrivalDateTime;
    if (isset($departureDateTime)) $this->departureDateTime = $departureDateTime;
  }

  public function getCityAndCountry(): string
  {
    return $this->port->getCityAndCountry();
  }

  public function getCity(): string
  {
    return $this->port->getCity();
  }

  public function getFormattedArivalTime(): string
  {
    return isset($this->arrivalDateTime) ? $this->arrivalDateTime->format(DATE_FORMAT) : '';
  }

  public function getFormattedDepartureTime(): string
  {
    return isset($this->departureDateTime) ? $this->departureDateTime->format(DATE_FORMAT): '';
  }
}
