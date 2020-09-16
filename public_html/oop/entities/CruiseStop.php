<?php
class CruiseStop{
    private $port;
    private $arrivalDateTime;
    private $departureDateTime;

    
    public function __construct($port, $arrivalDateTime, $departureDateTime)
    {
        $this->port = $port;
        $this->arrivalDateTime = $arrivalDateTime;
        $this->departureDateTime = $departureDateTime;
    }


}