<?php
class Cruise implements IJSONSerialiazible
{
  private float $price;
  private Ship $ship;
  private array $route;
  private array $images;

  public function __construct(CruiseStop $firstStop, CruiseStop $lastStop, float $price)
  {
    $this->price = $price;
    $this->route = [$firstStop, $lastStop];
    $this->images = [];
  }

  public static function createFromAssocArr(array $arr): object
  {
    return (object)[];
  }

  /**
   * Sets ship for Cruise object
   * 
   * @param Ship $ship instance of Ship class, which will be set for Cruise object
   */
  public function setShip(Ship $ship): void
  {
    $this->ship = $ship;
  }

  /**
   * Sets stops of the cruise
   * 
   * @param array $stops an array of CruiseStop objects
   */
  public function setRoute(array $stops): void
  {
    foreach ($stops as $cruiseStop) {
      if (!($cruiseStop instanceof CruiseStop))
        throw new Exception("Stop must be an instance of CruiseStop class.");
    }
    array_splice($this->route, 1, 0, $stops);
  }

  /**
   * Adds image to advertisment image array 
   * 
   * @param string $imgPath img to be added to advertisment image array.
   */
  public function addImage(string $imgPath): void
  {
    $this->images[] = $imgPath;
  }

  /**
   * Renders Cruise as a card
   */
  public function renderAsCard(): void
  {
?>
    <div class="card">
      <img class="card__image" src="<?= $this->images[0] ?>" />
      <div class="card__content">
        <div class="card__price"><?= $this->price ?> &euro;</div>
        <div class="card__destination"><?= $this->route[0]->getCity() ?> - <?= end($this->route)->getCity() ?></div>
        <hr>
        <div class="card__date">
          <div><span class="card_date_prefix">Arrival</span><?= $this->route[0]->getFormattedDepartureTime()  ?></div>
          <div><span class="card_date_prefix">Departure</span><?= end($this->route)->getFormattedArivalTime()  ?></div>
        </div>
        <hr>
        <div>Route</div>
        <ul class="card__route_list">
          <?php foreach ($this->route as $stop) : ?>
            <li><?= $stop->getCityAndCountry() ?></li>
          <?php endforeach; ?>
        </ul>
        <hr>
        <?= $this->ship->renderAsRow() ?>
      </div>
    </div>
<?php
  }

  /**
   * Renders Cruise as a section
   */
  public function renderAsSection(): void
  {
  }


  // Interface methods
  public function toJSON(): string
  {
    return json_encode($this->toAssocArr());
  }

  public function toAssocArr(): array
  {
    $assocArray = [
      "price" => $this->price,
      "ship" => $this->ship->toAssocArr(),
      "images" => $this->images,
      "route" => []
    ];
    foreach ($this->route as $stop) {
      $assocArray['route'][] = $stop->toAssocArr();
    }
    return $assocArray;
  }
}
