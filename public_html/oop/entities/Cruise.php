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
  private $images;

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
   * @param array $stops an array of CruiseStop objects
   */
  public function setStops($stops)
  {
    foreach ($stops as $cruiseStop) {
      if (!($cruiseStop instanceof CruiseStop))
        throw new Exception("Stop must be an instance of CruiseStop class.");
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

  /**
   * Renders Cruise as a card
   */
  public function renderAsCard()
  {
?>
    <div class="card">
      <img class="card__image" src="<?= $this->advImages[0] ?>" />
      <div class="card__content">
        <div class="card__destination">Roma - Athens</div>
        <div class="card__date">
        <div><span class="card_date_prefix">Arrival</span><?= $this->startDateTime->format(DATE_FORMAT) ?></div>
          <div><span class="card_date_prefix">Departure</span><?= $this->finishDateTime->format(DATE_FORMAT) ?></div>
        </div>
        <ul>
        <li>
        <span><?php print $this->startLocation->getCityAndCountry() ?></span>
        </li>
        <?php foreach($this->stops as $stop): ?>
        <li>
        <span><?php print $stop->getCityAndCountry() ?></span>
        </li>
        <?php endforeach; ?>
        <li>
        <span><?php print $this->finishLocation->getCityAndCountry() ?></span>
        </li>
        </ul>
      </div>
    </div>
  <?php
  }

  /**
   * Renders Cruise as a section
   */
  public function renderAsSection()
  {
  }
}
